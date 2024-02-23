<?php

namespace App\Http\Controllers\Api\Employee;

use App\Enums\EmployeeStatusEnum;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Employee\LoginResource;
use App\Http\Requests\Api\Employee\Auth\LoginRequest;
use App\Traits\ApiResponseTrait;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function login(LoginRequest $request)
    {
        try {
            $data = $request->validated();
            $employee = Employee::where('email', $data['email'])->first();
            if(Auth::guard('employee-api')->check($data) && $employee->status != EmployeeStatusEnum::ACTIVE->value){
                return $this->apiResponse([], 'Invalid Creadintials', [], 401);
            }
            $token = $employee->createToken($employee->name.'-AuthToken')->plainTextToken;
            return $this->apiResponse([
                'employee' => new LoginResource($employee),
                'token' => $token
            ], "login_successfully", [], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout()
    {
        auth('employee-api')->logout();
        return $this->apiResponse([], 'Successfully logged out');
    }
}
