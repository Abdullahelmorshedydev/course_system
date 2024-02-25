<?php

namespace App\Repositories\Employee;

use Exception;
use App\Models\User;
use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Employees\EmployeeInterface;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository implements EmployeeInterface
{
    public function index(): array
    {
        $employees = User::where('role', UserRoleEnum::EMPLOYEE->value)->with('employeeProfile')->paginate();
        return $employees;
    }

    public function store($data): array
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

    public function show(Model $user): User
    {
        return $user;
    }
}
