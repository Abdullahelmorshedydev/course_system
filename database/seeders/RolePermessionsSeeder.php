<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermessionsSeeder extends Seeder
{
    /**
     * List of applications to add.
     */
    private $permissions = [
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'attendance-list',
        'attendance-create',
        'attendance-edit',
        'attendance-delete',
        'course-list',
        'course-create',
        'course-edit',
        'course-delete',
        'employee-list',
        'employee-create',
        'employee-edit',
        'employee-delete',
        'feedback-list',
        'feedback-create',
        'feedback-edit',
        'feedback-delete',
        'group-list',
        'group-create',
        'group-edit',
        'group-delete',
        'location-list',
        'location-create',
        'location-edit',
        'location-delete',
        'major-list',
        'major-create',
        'major-edit',
        'major-delete',
        'session-list',
        'session-create',
        'session-edit',
        'session-delete',
        'task-list',
        'task-create',
        'task-edit',
        'task-delete',
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
        'setting-list',
        'setting-create',
        'setting-edit',
        'setting-delete',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Admin']);

        $strudentRole = Role::create(['name' => 'Student']);

        // $role = Role::where('name', 'Admin')->first();

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user = User::where('id', 21)->first();

        $user->assignRole([$role->id]);
    }
}
