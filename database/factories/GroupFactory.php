<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ['en' => fake()->name(), 'ar' => fake()->name()],
            'slug' => ['en' => str_replace(' ', '-', fake()->name()), 'ar' => str_replace(' ', '-', fake()->name())],
            'instructor_id' => 21,
            'mentor_id' => rand(10, 15),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'course_id' => rand(1, 6),
            'max_students' => 5,
            'number_of_students' => 2,
        ];
    }
}
