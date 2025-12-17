<?php

namespace App\Listeners\Team;

use App\Actions\Teams\CreateRolePermission;
use App\Events\Team\TeamCreatedEvent;

class TeamRolesPermissionListener
{
    public function __construct() {}

    public function handle(TeamCreatedEvent $event): void
    {
        // create the permission and role
        resolve(CreateRolePermission::class)->handle($event->team);

    }
}
