<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface EmployeeInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $employee, array $data);
    public function destroy(Model $object);
}