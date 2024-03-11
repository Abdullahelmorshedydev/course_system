<?php

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Traits\ApiResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsEmployee
{
    use ApiResponseTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role->value != UserRoleEnum::EMPLOYEE->value) {
            return $this->apiResponse([], __('api/response_message.unauthorize'), [], 401);
        }
        return $next($request);
    }
}
