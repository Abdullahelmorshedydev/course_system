<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ['en' => fake()->name, 'ar' => fake()->name],
            'slug' => ['en' => str_replace(' ', '-', fake()->name), 'ar' => str_replace(' ', '-', fake()->name)],
            'country_id' => null,
        ];
    }
}
