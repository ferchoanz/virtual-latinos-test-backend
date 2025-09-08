<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'department' => $this->department,
            'status' => $this->status,
            'createdAt' => Carbon::parse($this->created_at)->format('m/d/Y H:i:s'),
            'updatedAt' => Carbon::parse($this->updated_at)->format('m/d/Y H:i:s'),
        ];
    }
}
