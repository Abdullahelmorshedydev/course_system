<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use App\Http\Requests\Api\Auth\LoginRequest;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function login(LoginRequest $request, AuthService $authService)
    {
        return $this->apiResponse(LoginResource::make($authService->login($request->validated())), __('api/response_message.login_success'));
    }

    public function logout(AuthService $authService)
    {
        return $this->apiResponse($authService->logout(), __('api/response_message.logout_success'));
    }
}
