<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\Module\ContactResource;
use App\Http\Resources\Teams\TeamsMenuResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Override;

/** @mixin User */
class UserResource extends JsonResource
{
    public static $wrap;

    /**
     * @param Request $request
     *
     * @return array
     */
    #[Override]
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'email'             => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
            'contacts'          => ContactResource::collection($this->whenLoaded('contacts')),
            'ownedTeams'        => TeamsMenuResource::collection($this->whenLoaded('ownedTeams')),
            'teams'             => TeamsMenuResource::collection($this->whenLoaded('teams')),
        ];
    }
}
