<?php

namespace App\Repositories\Employee;

use Exception;
use App\Models\User;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Employees\ModuleInterface;

class EmployeeRepository implements ModuleInterface
{
    public function index()
    {
        return User::where('role', UserRoleEnum::EMPLOYEE->value)->with('employeeProfile')->paginate();
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $employee = User::create($data);
            $employee->employeeProfile()->create($data);
            DB::commit();
            return $employee;
        } catch (Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                $e->getMessage(),
            ]);
        }
    }

    public function update($employee, $data)
    {
        try {
            DB::beginTransaction();
            $employee->update($data);
            $employee->employeeProfile()->update([
                'salary' => $data['salary'],
                'status' => $data['status'],
                'working_type' => $data['working_type'],
                'working_hours' => $data['working_hours'],
                'working_place' => $data['working_place'],
            ]);
            DB::commit();
            return $employee;
        } catch (Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                $e->getMessage(),
            ]);
        }
    }

    public function destroy($employee)
    {
        return $employee->delete();
    }
}
