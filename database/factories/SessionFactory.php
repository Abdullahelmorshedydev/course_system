<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_id' => rand(1, 10),
            'session' => str_replace(' ', '', fake()->paragraph()),
            'date' => fake()->date(),
            'description' => ['en' => fake()->paragraph(), 'ar' => fake()->paragraph()],
        ];
    }
}
