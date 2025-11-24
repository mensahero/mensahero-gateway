<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Jurager\Teams\Models\Team as BaseTeam;

class Team extends BaseTeam
{
    use HasUuids;

    protected $fillable = ['user_id', 'name', 'default'];

    public function isDefault(): bool
    {
        $this->default;
    }
}
