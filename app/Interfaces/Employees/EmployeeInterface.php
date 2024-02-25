<?php 

namespace App\Interfaces\Employees;

interface EmployeeInterface
{
    public function index();
    public function store(array $data);
    public function show(object $user);
    // public function update(object $object, array $data): array;
    // public function delete(object $object): bool;
}