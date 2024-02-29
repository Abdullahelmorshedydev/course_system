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

    private $generalSettingsService;

    public function __construct(SettingsService $generalSettingsService)
    {
        $this->generalSettingsService = $generalSettingsService;
    }
    
    public function index()
    {
        return $this->apiResponse($this->generalSettingsService->index(), __('api/response_message.data_retrieved'));
    }

    public function update(SettingsRequest $request)
    {
        return $this->apiResponse($this->generalSettingsService->update($request->validated()), __('api/response_message.updated_success'));
    }
}
