<?php

namespace App\Http\Controllers\Api\Employee\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\Settings\GeneralSettingsRequest;
use App\Services\Employees\GeneralSettingsService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    use ApiResponseTrait;

    private $generalSettingsService;

    public function __construct(GeneralSettingsService $generalSettingsService)
    {
        $this->generalSettingsService = $generalSettingsService;
    }
    
    public function index()
    {
        return $this->apiResponse($this->generalSettingsService->index(), __('api/response_message.data_retrieved'));
    }

    public function update(GeneralSettingsRequest $request)
    {
        return $this->apiResponse($this->generalSettingsService->update($request->validated()), __('api/response_message.updated_success'));
    }
}
