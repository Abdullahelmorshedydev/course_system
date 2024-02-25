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
        $user = $this->employee->store($request->validated());
        return $this->apiResponse(new EmployeeResource($user), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = $this->employee->show($user);
        dd($user);
        return $this->apiResponse(new EmployeeResource($user), __('api/response_message.data_retrieved'));
        // return $this->employee->show($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
