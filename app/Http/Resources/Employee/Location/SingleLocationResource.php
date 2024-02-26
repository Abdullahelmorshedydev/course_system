<?php

namespace App\Http\Resources\Employee\Location;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleLocationResource extends JsonResource
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
            'slug' => $this->slug,
            'country' => $this->country ? $this->country->name : __('api/enum.country'),
            'cities' => $this->cities,
        ];
    }
}
