<?php

namespace Database\Seeders;

use Exception;
use App\Models\User;
use App\Enums\GenderEnum;
use App\Enums\UserRoleEnum;
use App\Enums\UserStatusEnum;
use App\Enums\WorkingTypeEnum;
use App\Enums\WorkingPlaceEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();
        User::factory(10)->create();
        $user = User::create([
            'name' => 'morshedy',
            'email' => 'morshedy@gmail.com',
            'phone' => '0199100199',
            'gender' => GenderEnum::MALE->value,
            'password' => Hash::make('morshedy'),
            'role' => UserRoleEnum::EMPLOYEE->value,
            'location_id' => 1,
        ]);

        $user->employeeProfile()->create([
            'salary' => 10000,
            'status' => UserStatusEnum::ACTIVE->value,
            'working_type' => WorkingTypeEnum::FULLTIME->value,
            'working_hours' => 10,
            'working_place' => WorkingPlaceEnum::OFFICE->value,
        ]);
    }
}
