<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jurager\Teams\Models\Ability as BaseAbility;

class Ability extends BaseAbility
{
    use HasUuids;

}
