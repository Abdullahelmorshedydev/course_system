<?php

namespace App\Services\Employees;

use App\Enums\UserRoleEnum;
use App\Http\Resources\Employee\EmployeeResource;
use App\Interfaces\Employees\EmployeeInterface;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Exception;
use Illuminate\Support\Facades\DB;

class EmployeeService implements EmployeeInterface
{
    use ApiResponseTrait;

    public function index()
    {
        return $this->apiResponse(User::where('role', UserRoleEnum::EMPLOYEE->value)->with('employeeProfile')->paginate(), __('api/response_message.data_retrieved'));
    }

    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            
            $user = User::create($data);
            $user->employeeProfile()->create($data);

            DB::commit();
            return $this->apiResponse(new EmployeeResource($user), __('api/response_message.created_success'));
        } catch (Exception $e) {
            DB::rollBack();
            return $this->apiResponse([], $e->getMessage(),[]);
        }
    }

    public function show($employee)
    {
        try {
            return $this->apiResponse(new EmployeeResource($employee), __('api/response_message.data_retrieved'));
        } catch (Exception $e) {
            return $this->apiResponse([], $e->getMessage(),[], 417);
        }
    }
}
