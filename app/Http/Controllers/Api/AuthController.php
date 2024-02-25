<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LoginResource;
use App\Http\Requests\Api\Auth\LoginRequest;

class AuthController extends Controller
{
    use ApiResponseTrait;

    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->authService->login($request->validated());
            return $this->apiResponse(new LoginResource($user), __('api/response_message.login_success'));
        } catch (Exception $e) {
            return $this->apiResponse([], $e->getMessage(), [], 422);
        }
    }
    
    public function logout()
    {
        try {
            $this->authService->logout();
            return $this->apiResponse([], __('api/response_message.logout_success'));
        } catch (Exception $e) {
            return $this->apiResponse([], $e->getMessage(), [], 401);
        }
    }
}
