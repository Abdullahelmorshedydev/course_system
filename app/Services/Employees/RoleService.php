<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\RoleInterface;

class RoleService
{
    private $roleRepoInterface;

    public function __construct(RoleInterface $roleRepoInterface)
    {
        $this->roleRepoInterface = $roleRepoInterface;
    }

    public function index()
    {
        return $this->roleRepoInterface->index();
    }

    public function store($data)
    {
        return $this->roleRepoInterface->store($data);
    }

    public function update($role, $data)
    {
        return $this->roleRepoInterface->update($role, $data);
    }

    public function destroy($role)
    {
        return $this->roleRepoInterface->destroy($role);
    }
}
