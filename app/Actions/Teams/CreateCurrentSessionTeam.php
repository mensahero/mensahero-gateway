<?php

namespace App\Actions\Teams;

use App\Models\Team;

class CreateCurrentSessionTeam
{
    /**
     * @param Team $team
     *
     * @return void
     */
    public function handle(Team $team): void
    {
        session([
            'current_team_id'   => (string) $team->id,
            'current_team_name' => (string) $team->name,
            'current_team'      => $team,
        ]);

    }
}
