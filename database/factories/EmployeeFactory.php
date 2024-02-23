<?php

namespace Database\Factories;

use App\Enums\EmployeeRoleEnum;
use App\Enums\GenderEnum;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('morshedy'),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'date_of_birth' => fake()->date(),
            'gender' => fake()->randomElement(GenderEnum::cases()),
            'location_id' => rand(6, 10),
            'role' => fake()->randomElement(EmployeeRoleEnum::cases()),
            'salary' => 10000,
        ];
    }
}
