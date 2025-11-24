<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jurager\Teams\Models\Team as BaseTeam;

class Team extends BaseTeam
{
    use HasUuids;

    protected $fillable = ['user_id', 'name', 'default'];

    public function isDefault(): bool
    {
        $this->default;
    }

    /**
     * @return BelongsTo<Contacts, $this>
     */
    public function contactsByTeam(): BelongsTo
    {
        return $this->belongsTo(Contacts::class, 'team_id', 'id');
    }
}
