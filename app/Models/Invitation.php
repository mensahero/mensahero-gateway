<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jurager\Teams\Models\Invitation as BaseInvitation;

class Invitation extends BaseInvitation
{
    use HasUuids;

}
