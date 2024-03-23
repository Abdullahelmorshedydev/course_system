<?php

namespace App\Http\Controllers\Api\Employee\Setting;

use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Employees\Setting\LinkSettingService;
use App\Http\Requests\Api\Employee\Setting\LinkSettingRequest;

class LinkSettingController extends Controller
{
    use ApiResponseTrait;
    
    public function index(LinkSettingService $settingsService)
    {
        return $this->apiResponse($settingsService->index(), __('api/response_message.data_retrieved'));
    }

    public function update(LinkSettingRequest $request, LinkSettingService $settingsService)
    {
        return $this->apiResponse($settingsService->update($request->validated()), __('api/response_message.updated_success'));
    }
}
