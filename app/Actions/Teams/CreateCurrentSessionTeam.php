<?php

namespace App\Actions\Teams;

use App\Models\Team;

class CreateCurrentSessionTeam
{
    public function handle(Team $team): void
    {
        session()->put('current_team_id', $team->id);
        session()->put('current_team_name', $team->name);
        session()->put('current_team', $team);

    }
}
