<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Employee;
use App\Enums\UserStatusEnum;
use App\Enums\WorkingTypeEnum;
use App\Enums\WorkingPlaceEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeProfile>
 */
class EmployeeProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'salary' => 10000,
            'status' => UserStatusEnum::ACTIVE->value,
            'working_type' => fake()->randomElement(WorkingTypeEnum::cases()),
            'working_hours' => 10,
            'working_place' => fake()->randomElement(WorkingPlaceEnum::cases()),
        ];
    }
}
