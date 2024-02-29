<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->delete();
        $general = [
            'site_name' => 'Course System',
        ];

        $files = [
            'logo' => 'uploads/settings/logo.png',
        ];

        foreach ($general as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }

        foreach ($files as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }
}
