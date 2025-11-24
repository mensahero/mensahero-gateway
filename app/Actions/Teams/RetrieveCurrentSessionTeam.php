<?php

namespace App\Actions\Teams;

use App\Models\Team;

class RetrieveCurrentSessionTeam
{
    public function handle(): Team
    {
        return Team::query()->where('id', session('current_team_id'))->first();
    }
}
