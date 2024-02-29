<?php

namespace App\Http\Resources\Employee\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'description' => $this->description,
            'price' => $this->price,
            'discount' => $this->discount,
            'discount_type' => $this->discount_type,
            'duration' => $this->duration,
            'duration_type' => $this->duration_type,
            'major' => $this->major->name,
            'status' => $this->status,
        ];
    }
}
