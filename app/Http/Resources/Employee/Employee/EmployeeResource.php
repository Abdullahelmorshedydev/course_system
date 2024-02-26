<?php

namespace App\Http\Resources\Employee\Employee;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'location' => $this->location->name,
            'role' => $this->role,
            'profile' => $this->employeeProfile,
        ];
    }
}
