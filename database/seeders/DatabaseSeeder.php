<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // LocationTableSeeder::class,
            // UserTableSeeder::class,
            // EmployeeProfileTableSeeder::class,
            // MajorTableSeeder::class,
            // SettingsTableSeeder::class,
            // CourseTableSeeder::class,
            // GroupTableSeeder::class,
            SessionTableSeeder::class,
        ]);
    }
}
