<?php

use App\Actions\Teams\CreateRolePermission;
use App\Concerns\TeamSessionKeys;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Laravel\Fortify\Features;

uses(RefreshDatabase::class);

test('it can render two factor page', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    Features::twoFactorAuthentication([
        'confirm'         => true,
        'confirmPassword' => true,
    ]);

    $user = User::factory()->withoutTwoFactor()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this->actingAs($user)
        ->withSession([
            'auth.password_confirmed_at'            => time(),
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get(route('settings.two-factor.show'))
        ->assertInertia(fn (Assert $page): Assert => $page
            ->component('settings/TwoFactor')
            ->where('twoFactorEnabled', false)
        );
});

test('it requires password confirmation if enabled, when visiting the two factor page', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    Features::twoFactorAuthentication([
        'confirm'         => true,
        'confirmPassword' => true,
    ]);

    $this->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get(route('settings.two-factor.show'))
        ->assertRedirect(route('password.confirm'));
});

test('it doesnt require password confirmation if disabled when visiting two factor page ', function (): void {
    if (! Features::canManageTwoFactorAuthentication()) {
        $this->markTestSkipped('Two-factor authentication is not enabled.');
    }

    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    Features::twoFactorAuthentication([
        'confirm'         => true,
        'confirmPassword' => false,
    ]);

    $this->actingAs($user)
        ->withSession([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get(route('settings.two-factor.show'))
        ->assertOk()
        ->assertInertia(fn (Assert $page): Assert => $page
            ->component('settings/TwoFactor')
        );
});
