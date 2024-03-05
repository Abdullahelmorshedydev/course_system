<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\SettingsRequest;
use App\Services\Employees\SettingsService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    use ApiResponseTrait;

    public function index(SettingsService $settingsService)
    {
        return $this->apiResponse($settingsService->index(), __('api/response_message.data_retrieved'));
    }

    public function update(SettingsRequest $request, SettingsService $settingsService)
    {
        return $this->apiResponse($settingsService->update($request->validated()), __('api/response_message.updated_success'));
    }
}
