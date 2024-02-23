<?php

namespace Database\Seeders;

use App\Models\Location;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->delete();
        Location::factory(5)->create();
        Location::factory(5)->create([
            'name' => ['en' => fake()->name, 'ar' => fake()->name],
            'slug' => ['en' => fake()->name, 'ar' => fake()->name],
            'country_id' => rand(1, 5),
        ]);
    }
}
