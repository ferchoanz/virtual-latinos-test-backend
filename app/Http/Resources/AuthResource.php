<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'token' => $this->token,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
                'email_verified_at' => Carbon::parse($this->user->email_verified_at)->format('m/d/Y H:i:s'),
                'createdAt' => Carbon::parse($this->user->created_at)->format('m/d/Y H:i:s'),
                'updatedAt' => Carbon::parse($this->user->updated_at)->format('m/d/Y H:i:s'),
            ]
        ];
    }
}
