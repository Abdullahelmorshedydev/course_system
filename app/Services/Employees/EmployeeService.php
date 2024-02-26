<?php

namespace App\Services\Employees;

use App\Traits\ApiResponseTrait;
use App\Repositories\Employee\EmployeeRepository;

class EmployeeService
{
    use ApiResponseTrait;

    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        return $this->employeeRepository->index();
    }

    public function store($data)
    {
        return $this->employeeRepository->store($data);
    }

    public function update($employee, $data)
    {
        return $this->employeeRepository->update($employee, $data);
    }

    public function destroy($employee)
    {
        return $this->employeeRepository->destroy($employee);
    }
}
