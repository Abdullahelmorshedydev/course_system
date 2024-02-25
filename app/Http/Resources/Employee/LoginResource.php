<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            'phone' => $this->phone,
            'password' => $this->password,
            'date_of_birth' => $this->birth_of_date,
            'gender' => $this->gender,
            'role' => $this->role,
            'location_id' => $this->location_id,
            'profile' => $this->employeeProfile,
            'token' => $this->token,
        ];
    }
}
