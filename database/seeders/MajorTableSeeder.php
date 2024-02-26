<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MajorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->delete();
        Major::factory(5)->create();
        Major::factory(5)->create([
            'name' => ['en' => fake()->name, 'ar' => fake()->name],
            'slug' => ['en' => str_replace(' ', '-', fake()->name), 'ar' => str_replace(' ', '-', fake()->name)],
            'major_id' => rand(1, 5),
        ]);
    }
}
