<?php

namespace App\Actions\Teams;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateTeams
{
    /**
     * @param array $attribute     ['name', 'user_id']
     * @param bool  $markAsDefault
     *
     * @throws Throwable
     *
     * @return Team
     */
    public function handle(array $attribute, bool $markAsDefault = false): Team
    {
        return DB::transaction(fn () => Team::query()->create([
            ...$attribute,
            'default' => $markAsDefault,
        ]));
    }
}
