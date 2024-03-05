<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendances')->delete();
        Attendance::factory(10)->create();
    }
}
