<?php

namespace App\Http\Controllers\Api\Employee\Setting;

use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Employees\Setting\FileSettingService;
use App\Http\Requests\Api\Employee\Setting\FileSettingRequest;

class FileSettingController extends Controller
{
    use ApiResponseTrait;
    
    public function index(FileSettingService $settingsService)
    {
        return $this->apiResponse($settingsService->index(), __('api/response_message.data_retrieved'));
    }

    public function update(FileSettingRequest $request, FileSettingService $settingsService)
    {
    
        return $this->apiResponse($settingsService->update($request->validated()), __('api/response_message.updated_success'));
    }
}
