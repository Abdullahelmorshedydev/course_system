<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login($data)
    {
        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => [__('api/response_message.invalid_credentials')],
            ]);
        }
        $user['token'] = $user->createToken('Api Token Of ' . $user->name)->plainTextToken;
        return $user;
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();
        return true;
    }
}
