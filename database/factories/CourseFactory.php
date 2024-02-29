<?php

namespace Database\Factories;

use App\Enums\DiscountTypeEnum;
use App\Enums\DurationTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'description' => ['en' => fake()->text(100), 'ar' => fake()->text(100)],
            'price' => 1000,
            'discount' => 1,
            'discount_type' => fake()->randomElement(DiscountTypeEnum::cases()),
            'duration' => 1,
            'duration_type' => fake()->randomElement(DurationTypeEnum::cases()),
            'major_id' => rand(1, 10),
        ];
    }
}
