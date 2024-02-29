<?php

namespace App\Http\Controllers\Api\Employee;

use App\Models\Major;
use Illuminate\Http\Request;
use App\Traits\TranslateTrait;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Employees\MajorService;
use App\Http\Resources\Employee\Major\MajorResource;
use App\Http\Resources\Employee\Major\MajorCollection;
use App\Http\Resources\Employee\Major\SingleMajorResource;
use App\Http\Requests\Api\Employee\Major\MajorStoreRequest;
use App\Http\Requests\Api\Employee\Major\MajorUpdateRequest;

class MajorController extends Controller
{
    use ApiResponseTrait, TranslateTrait;

    private $majorService;

    public function __construct(MajorService $majorService)
    {
        $this->majorService = $majorService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->apiResponse(new MajorCollection($this->majorService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorStoreRequest $request)
    {
        return $this->apiResponse(MajorResource::make($this->majorService->store($request->all())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        return $this->apiResponse(SingleMajorResource::make($major), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorUpdateRequest $request, Major $major)
    {
        return $this->apiResponse(MajorResource::make($this->majorService->update($major, $request->all())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        return $this->apiResponse($this->majorService->destroy($major), __('api/response_message.deleted_success'));
    }
}
