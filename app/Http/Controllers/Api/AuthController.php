<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\LoginRequest;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if(!Auth::attempt($data)){
            return $this->apiResponse([], 'invalid creadintials', [], 401);
        }
        $user = User::where('email', $data['email'])->first();
        $user['token'] = $user->createToken('Api Token Of ' . $user->name)->plainTextToken;
        return $this->apiResponse($user, 'Login Success');
    }
    
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return $this->apiResponse([], 'Logout Success');
    }
}
