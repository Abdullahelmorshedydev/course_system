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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.permission:employee-list'], ['only' => ['index']]);
        $this->middleware(['check.permission:employee-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.permission:employee-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.permission:employee-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(EmployeeService $employeeService)
    {
        return $this->apiResponse(new EmployeeCollection($employeeService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request, EmployeeService $employeeService)
    {
        return $this->apiResponse(EmployeeResource::make($employeeService->store($request->validated())), __('api/response_message.created_success'));
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
    public function update(EmployeeUpdateRequest $request, User $employee, EmployeeService $employeeService)
    {
        return $this->apiResponse(EmployeeResource::make($employeeService->update($employee, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee, EmployeeService $employeeService)
    {
        return $this->apiResponse($employeeService->destroy($employee), __('api/response_message.deleted_success'));
    }
}
