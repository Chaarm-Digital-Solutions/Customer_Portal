<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'data' => $this->collection->map(function ($user)
            {
                return [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'current_team_id' => $user->current_team_id,
                    'profile_photo_path' => $user->profile_photo_path,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ];
            }),
            'meta' => [
                'total_users' => $this->collection->count(),
            ]
        ];
    }
}
