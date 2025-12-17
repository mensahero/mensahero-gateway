<?php

namespace App\Events\Team;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TeamCreatedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(public readonly Team $team, public readonly User $owner, public bool $default = false) {}
}
