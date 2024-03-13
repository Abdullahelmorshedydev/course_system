<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface RoleInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $role, array $data);
    public function destroy(Model $role);
}