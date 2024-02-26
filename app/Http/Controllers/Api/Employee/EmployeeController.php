<?php

namespace App\Http\Controllers\Api\Employee;

use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Employees\EmployeeService;
use App\Http\Resources\Employee\Employee\EmployeeResource;
use App\Http\Requests\Api\Employee\Employee\EmployeeStoreRequest;
use App\Http\Requests\Api\Employee\Employee\EmployeeUpdateRequest;
use App\Http\Resources\Employee\Employee\EmployeeCollection;

class EmployeeController extends Controller
{
    use ApiResponseTrait;

    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->apiResponse(new EmployeeCollection($this->employeeService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        return $this->apiResponse(EmployeeResource::make($this->employeeService->store($request->validated())), __('api/response_message.created_success'));
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
        dd($employee);
        return $this->apiResponse(EmployeeResource::make($this->employeeService->update($employee, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee)
    {
        return $this->apiResponse($this->employeeService->destroy($employee), __('api/response_message.deleted_success'));
    }
}
