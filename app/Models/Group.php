<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jurager\Teams\Models\Group as BaseGroup;

class Group extends BaseGroup
{
    use HasUuids;

}
