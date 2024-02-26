<?php

namespace App\Http\Controllers\Api\Employee;

use Exception;
use App\Models\User;
use App\Enums\UserRoleEnum;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Employees\EmployeeService;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Requests\Api\Employee\Employee\EmployeeStoreRequest;
use App\Http\Requests\Api\Employee\Employee\EmployeeUpdateRequest;

class EmployeeController extends Controller
{
    use ApiResponseTrait;

    private $employee;

    public function __construct(EmployeeService $employee)
    {
        $this->employee = $employee;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->apiResponse($this->employee->index(), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        return $this->apiResponse(EmployeeResource::make($this->employee->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $employee)
    {
        return $this->apiResponse(EmployeeResource::make($employee), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, User $employee)
    {
        dd($request);
        return $this->apiResponse(EmployeeResource::make($this->employee->update($employee, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee)
    {
        return $this->apiResponse($this->employee->destroy($employee), __('api/response_message.deleted_success'));
    }
}
