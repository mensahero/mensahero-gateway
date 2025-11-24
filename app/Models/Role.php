<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jurager\Teams\Models\Role as BaseRole;

class Role extends BaseRole
{
    use HasUuids;

}
