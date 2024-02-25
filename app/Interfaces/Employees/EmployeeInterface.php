<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface EmployeeInterface
{
    public function index(): array;
    public function store(array $data): array;
    public function show(Model $user): Model;
    // public function update(object $object, array $data): array;
    // public function delete(object $object): bool;
}