<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfilesResource extends JsonResource
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
                'user_id' => $this->user_id,
                'pokemon_theme_id' => $this->pokemon_theme_id,
                'display_name' => $this->display_name,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'full_name' => $this->full_name,
                'gender' => $this->gender,
                'address' => $this->address,
            ]
        ];
    }
}
