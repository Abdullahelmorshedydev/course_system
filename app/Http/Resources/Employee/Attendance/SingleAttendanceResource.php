<?php

namespace App\Http\Resources\Employee\Attendance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleAttendanceResource extends JsonResource
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
            'user' => $this->user->name,
            'session' => $this->session->date,
            'evaluate' => $this->evaluate,
        ];
    }
}
