<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoritesResource extends JsonResource
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
            "attributes" => [
                'pokemon_id' => $this->pokemon_id,
                'pokemon_url' => $this->pokemon_url,
            ]
        ];
    }
}
