<?php

namespace App\Http\Controllers\Api\Employee;

use App\Models\Location;
use App\Traits\TranslateTrait;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Employees\LocationService;
use App\Http\Resources\Employee\Location\LocationResource;
use App\Http\Resources\Employee\Location\LocationCollection;
use App\Http\Requests\Api\Employee\Location\LocationStoreRequest;
use App\Http\Requests\Api\Employee\Location\LocationUpdateRequest;

class LocationController extends Controller
{
    use ApiResponseTrait, TranslateTrait;

    private $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->apiResponse(new LocationCollection($this->locationService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request)
    {
        $data = $request->validated();
        $data['name'] = TranslateTrait::translate($data['name_en'], $data['name_ar']);
        $data['slug'] = TranslateTrait::translate($data['name_en'], $data['name_ar'], true);
        return $this->apiResponse(LocationResource::make($this->locationService->store($data)), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return $this->apiResponse(LocationResource::make($location), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationUpdateRequest $request, Location $location)
    {
        $data = $request->validated();
        $data['name'] = TranslateTrait::translate($data['name_en'], $data['name_ar']);
        $data['slug'] = TranslateTrait::translate($data['name_en'], $data['name_ar'], true);
        return $this->apiResponse(LocationResource::make($this->locationService->update($location, $data)), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        return $this->apiResponse($this->locationService->destroy($location), __('api/response_message.deleted_success'));
    }
}
