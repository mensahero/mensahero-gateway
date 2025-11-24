<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jurager\Teams\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use HasUuids;

}
