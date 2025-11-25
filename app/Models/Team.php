<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jurager\Teams\Models\Team as BaseTeam;

/**
 *  App\Models\Team
 *
 * @property Contacts $contactsByTeam
 * @property bool     $default
 * @property string   $name
 * @property string   $user_id
 * @property string   $id
 */
class Team extends BaseTeam
{
    use HasUuids;

    protected $fillable = ['user_id', 'name', 'default'];

    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @return BelongsTo<Contacts, $this>
     */
    public function contactsByTeam(): BelongsTo
    {
        return $this->belongsTo(Contacts::class, 'team_id', 'id');
    }

    protected function casts(): array
    {
        return [
            'default' => 'boolean',
        ];
    }
}
