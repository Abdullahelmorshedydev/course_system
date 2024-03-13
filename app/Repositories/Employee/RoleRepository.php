<?php

namespace App\Repositories\Employee;

use App\Interfaces\Employees\RoleInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface
{
    public function index()
    {
        return Role::paginate();
    }

    public function store($data)
    {
        return Role::create($data)->syncPermissions($data['permissions']);
    }

    public function update($role, $data)
    {
        $role->update($data);
        $role->syncPermissions($data['permissions']);
        return $role;
    }

    public function destroy($role)
    {
        return $role->delete();
    }
}
