<?php

namespace App\Actions\Teams;

use App\Models\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            'name'    => Str::of($attribute['name'])->trim()->endsWith('Team') ? ucwords((string) $attribute['name']) : ucwords((string) $attribute['name']).' Team',
            'default' => $markAsDefault,
        ]));
    }
}
