<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
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
            'name' => $this->name,
            'release_date' => $this->release_date,
            'genre' => $this->genre,
            'publisher' => $this->publisher,
            'is_multiplayer' => $this->is_multiplayer,
            'is_favorite' => $this->is_favorite,
            'description' => $this->description,
            'user' => $this->user->toResource(),
        ];
    }
}
