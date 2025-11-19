<?php

namespace App\Actions\Modules\Contacts;

use App\Models\Contacts;
use Illuminate\Support\Facades\DB;
use Throwable;

class DeleteContacts
{
    /**
     * @param array|string $ids
     *
     * @throws Throwable
     *
     * @return mixed
     */
    public function handle(array|string $ids): mixed
    {
        return DB::transaction(fn () => Contacts::query()->whereIn('id', $ids)->delete());
    }
}
