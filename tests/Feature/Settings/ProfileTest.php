<?php

use App\Actions\Teams\CreateRolePermission;
use App\Concerns\TeamSessionKeys;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it can render profile page', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this
        ->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get(route('settings.account.edit'))
        ->assertOk();
});

test('it can update profile information', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this
        ->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->patch(route('settings.account.update'), [
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('settings.account.edit'));

    $user->refresh();

    $this->assertSame('Test User', $user->name);
    $this->assertSame('test@example.com', $user->email);
    $this->assertNull($user->email_verified_at);
});

test('it dont update the email and the email verification status when updating the profile name', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $response = $this
        ->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->patch(route('settings.account.update'), [
            'name'  => 'Test User',
            'email' => $user->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('settings.account.edit'));

    $this->assertNotNull($user->refresh()->email_verified_at);
});

test('it can delete their own account', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $response = $this
        ->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->delete(route('settings.account.destroy'), [
            'current_password' => 'password',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('home'));

    $this->assertGuest();
    $this->assertNull($user->fresh());
});

test('it doesnt requires password when deleting their own account if account is created via SSO and didnt reset password', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create([
            'password' => null,
        ]);

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $response = $this
        ->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->from(route('settings.account.edit'))
        ->delete(route('settings.account.destroy'));

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('home'));

    $this->assertGuest();
    $this->assertNull($user->fresh());
});

test('it requires password confirmation when deleting their own account', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $response = $this
        ->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->from(route('settings.account.edit'))
        ->delete(route('settings.account.destroy'), [
            'current_password' => 'wrong-password',
        ]);

    $response
        ->assertSessionHasErrors('current_password')
        ->assertRedirect(route('settings.account.edit'));

    $this->assertNotNull($user->fresh());
});
