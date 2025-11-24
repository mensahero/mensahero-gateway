<?php

namespace App\Models\Concerns;

use App\Actions\Teams\CreateCurrentSessionTeam;
use App\Models\Team;
use Jurager\Teams\Traits\HasTeams as BaseHasTeams;

trait HasTeams
{
    use BaseHasTeams;

    public function markAsDefaultTeam(Team $team): void
    {
        $team->default = true;
        $team->save();
    }

    public function switchTeam(Team $team): void
    {
        app(CreateCurrentSessionTeam::class)->handle($team);
    }
}
