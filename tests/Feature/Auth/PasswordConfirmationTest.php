<?php

use App\Actions\Teams\CreateRolePermission;
use App\Concerns\TeamSessionKeys;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;

uses(RefreshDatabase::class);
pest()->group('feature');
test('confirm password screen can be rendered', function (): void {
    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    resolve(CreateRolePermission::class)->handle($user->ownedTeams->first());

    $this->actingAs($user)
        ->session([
            TeamSessionKeys::CURRENT_TEAM_ID->key() => $user->ownedTeams->first()->id,
        ])
        ->get(route('password.confirm'))
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page): Assert => $page
            ->component('auth/ConfirmPasswordPrompt')
        );

});

test('password confirmation requires authentication', function (): void {
    $response = $this->get(route('password.confirm'))
        ->assertRedirect(route('login'));
});
