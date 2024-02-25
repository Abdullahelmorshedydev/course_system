<?php

namespace App\Services\Employees;

use Exception;
use App\Models\User;
use App\Enums\UserRoleEnum;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Employees\EmployeeInterface;
use App\Http\Resources\Employee\EmployeeResource;
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

    public function store(array $data)
    {
        $user = $this->employeeRepository->store($data);
        return $user;
    }

    public function show($employee)
    {
        return $this->employeeRepository->show($employee);
        // return $this->apiResponse(new EmployeeResource($employee), __('api/response_message.data_retrieved'));
    }
}
