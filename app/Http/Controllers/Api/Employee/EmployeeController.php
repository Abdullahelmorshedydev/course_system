<?php

namespace App\Http\Controllers\Api\Employee;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\Employee\EmployeeStoreRequest;
use App\Models\User;
use App\Services\Employees\EmployeeService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

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
        return $this->employee->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        return $this->employee->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->employee->show($user);
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
