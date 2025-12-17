<?php

use App\Broadcasting\TeamChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('User.{id}', fn ($user, $id) => (int) $user->id === (int) $id);

Broadcast::channel('Team.{team}', TeamChannel::class);
