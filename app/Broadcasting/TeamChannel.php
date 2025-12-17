<?php

namespace App\Broadcasting;

use App\Models\Team;
use App\Models\User;

class TeamChannel
{
    public function __construct() {}

    /**
     * Authenticate the user's access to the channel.
     *
     * @param User $user
     * @param Team $team
     *
     * @return array|bool
     */
    public function join(User $user, Team $team): bool|array
    {
        return $team->hasUser($user);
    }
}
