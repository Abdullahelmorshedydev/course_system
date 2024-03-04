<?php

namespace App\Http\Resources\Employee\Group;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SingleGroupResource extends JsonResource
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
            'instructor' => $this->instructor->name,
            'mentor' => $this->mentor->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'course' => $this->course->name,
            'max_students' => $this->max_students,
            'number_of_students' => $this->number_of_students,
            'status' => $this->status,
        ];
    }
}
