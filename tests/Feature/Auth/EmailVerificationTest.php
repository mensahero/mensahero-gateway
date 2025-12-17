<?php

use App\Actions\Teams\CreateRolePermission;
use App\Concerns\TeamSessionKeys;
use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    Event::fake();
});

pest()->group('feature');

test('email verification screen can be rendered', function (): void {
    $user = User::factory()->unverified()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get(route('verification.notice'))
        ->assertStatus(200);
});

test('email can verified', function (): void {
    $user = User::factory()->unverified()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $this->actingAs($user)
        ->session([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get($verificationUrl)
        ->assertRedirect(route('dashboard', absolute: false).'?verified=1');

    Event::assertDispatched(Verified::class);
    $this->assertTrue($user->fresh()->hasVerifiedEmail());

});

test('email is not verified with invalid hash', function (): void {
    $user = User::factory()
        ->unverified()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($user)
        ->session([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get($verificationUrl);

    Event::assertNotDispatched(Verified::class);
    $this->assertFalse($user->fresh()->hasVerifiedEmail());
});

test('email is not verified with invalid user id', function (): void {
    $user = User::factory()
        ->unverified()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => 123, 'hash' => sha1($user->email)]
    );

    $this->actingAs($user)
        ->session([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get($verificationUrl);

    Event::assertNotDispatched(Verified::class);
    $this->assertFalse($user->fresh()->hasVerifiedEmail());
});

test('verified user is redirected to dashboard from verification prompt', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this->actingAs($user)
        ->session([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get(route('verification.notice'))
        ->assertRedirect(route('dashboard', absolute: false));

    Event::assertNotDispatched(Verified::class);
});

test('verified user visiting verification link is redirected without firing event again', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $this->actingAs($user)
        ->session([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get($verificationUrl)
        ->assertRedirect(route('dashboard', absolute: false).'?verified=1');

    Event::assertNotDispatched(Verified::class);
    $this->assertTrue($user->fresh()->hasVerifiedEmail());
});
