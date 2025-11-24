<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jurager\Teams\Models\Membership as BaseMembership;

class Membership extends BaseMembership
{
    use HasUuids;

}
