<?php

use App\Http\Controllers\Teams\InviteController;
use App\Http\Controllers\Teams\TeamsController;

Route::get(config('teams.invitations.routes.url'), [InviteController::class, 'inviteAccept'])
    ->middleware([
        config('teams.invitations.routes.middleware'),
        'signed',
    ])
    ->name('teams.invitations.accept');

Route::middleware('auth')->prefix('teams')->group(function () {

    Route::get('/getAllTeams', [TeamsController::class, 'getTeams'])
        ->name('teams.getAllTeams');

    Route::post('/session/team', [TeamsController::class, 'setCurrentTeam'])
        ->name('teams.setCurrentTeam');

    Route::get('/session/team', [TeamsController::class, 'getCurrentTeam'])
        ->name('teams.getCurrentTeam');

});
