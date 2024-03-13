<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\EmployeeInterface;

class EmployeeService
{
    private $employeeRepoInterface;

    public function __construct(EmployeeInterface $employeeRepoInterface)
    {
        $this->employeeRepoInterface = $employeeRepoInterface;
    }

    public function index()
    {
        return $this->employeeRepoInterface->index();
    }

    public function store($data)
    {
        return $this->employeeRepoInterface->store($data);
    }

    public function update($employee, $data)
    {
        return $this->employeeRepoInterface->update($employee, $data);
    }

    public function destroy($employee)
    {
        return $this->employeeRepoInterface->destroy($employee);
    }
}
