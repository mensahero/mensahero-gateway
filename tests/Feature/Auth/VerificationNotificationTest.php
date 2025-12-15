<?php

use App\Models\Team;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

uses(RefreshDatabase::class);
beforeEach(function () {
    Notification::fake();
});

test('can send verification email notification', function (): void {

    $user = User::factory()->unverified()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    $this->actingAs($user)
        ->post(route('verification.send'))
        ->assertRedirect(route('home'));

    Notification::assertSentTo($user, VerifyEmail::class);
});

test('does not send verification notification if email is verified', function (): void {

    $user = User::factory()
        ->has(Team::factory()->state(fn (): array => ['default' => true]), 'ownedTeams')
        ->create();

    $this->actingAs($user)
        ->post(route('verification.send'))
        ->assertRedirect(route('dashboard', absolute: false));

    Notification::assertNothingSent();
});
