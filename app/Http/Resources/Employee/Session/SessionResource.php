<?php

namespace App\Http\Resources\Employee\Session;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            'group' => $this->group->name,
            'session' => $this->session,
            'date' => $this->date,
            'description' => $this->description,
        ];
    }
}
