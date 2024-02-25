<?php

namespace App\Services;

use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Employee\LoginResource;
use Illuminate\Validation\ValidationException;

class AuthService implements AuthInterface
{
    use ApiResponseTrait;

    public function login($data)
    {
        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid Email or Password.'],
            ]);
        }
        $user['token'] = $user->createToken('Api Token Of ' . $user->name)->plainTextToken;
        $user = new LoginResource($user);
        return $this->apiResponse($user, 'Login Success');
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return $this->apiResponse([], 'Logout Success');
    }
}
