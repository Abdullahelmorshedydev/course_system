<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbackTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('feedback')->delete();
        Feedback::factory(10)->create();
    }
}
