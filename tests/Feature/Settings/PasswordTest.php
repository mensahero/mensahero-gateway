<?php

use App\Actions\Teams\CreateRolePermission;
use App\Concerns\TeamSessionKeys;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('password update page is rendered', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this
        ->actingAs($user)
        ->withSession([
            'auth.password_confirmed_at'            => Date::now()->unix(),
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get(route('settings.password.edit'))
        ->assertStatus(200);
});

test('password can be updated', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this
        ->actingAs($user)
        ->withSession([
            'auth.password_confirmed_at'            => Date::now()->unix(),
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->from(route('settings.password.edit'))
        ->put(route('settings.password.update'), [
            'current_password'      => 'password',
            'password'              => 'Admin1$trat0R',
            'password_confirmation' => 'Admin1$trat0R',
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('settings.password.edit'));
});

test('correct password must be provided to update the password', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this
        ->actingAs($user)
        ->withSession([
            'auth.password_confirmed_at'            => Date::now()->unix(),
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->from(route('settings.password.edit'))
        ->put(route('settings.password.update'), [
            'current_password'      => 'wrong-password',
            'password'              => 'Admin1$trat0R',
            'password_confirmation' => 'Admin1$trat0R',
        ])
        ->assertSessionHasErrors(['current_password'])
        ->assertRedirect(route('settings.password.edit'));
});
