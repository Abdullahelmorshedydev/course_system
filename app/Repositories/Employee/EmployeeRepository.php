<?php

namespace App\Repositories\Employee;

use Exception;
use App\Models\User;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Employees\EmployeeInterface;

class EmployeeRepository implements EmployeeInterface
{
    public function index()
    {
        $employees = User::where('role', UserRoleEnum::EMPLOYEE->value)->with('employeeProfile')->paginate();
        return $employees;
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $user = User::create($data);
            $user->employeeProfile()->create($data);
            DB::commit();
            return $user;
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
            $employee->employeeProfile()->update($data);
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
        try{
            $employee->delete();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
