<?php

namespace App\Http\Resources\Teams;

use App\Models\TeamInvitation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

/** @mixin TeamInvitation */
class InvitationMemberResource extends JsonResource
{
    public static $wrap = null;

    /**
     * @param Request $request
     *
     * @return array
     */
    #[Override]
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'email'      => $this->email,
            'role_id'    => $this->role_id,
            'created_at' => $this->created_at,
        ];
    }
}
