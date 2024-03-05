<?php

namespace App\Http\Controllers\Api\Employee;

use App\Models\Location;
use App\Traits\TranslateTrait;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Employees\LocationService;
use App\Http\Resources\Employee\Location\LocationResource;
use App\Http\Resources\Employee\Location\LocationCollection;
use App\Http\Resources\Employee\Location\SingleLocationResource;
use App\Http\Requests\Api\Employee\Location\LocationStoreRequest;
use App\Http\Requests\Api\Employee\Location\LocationUpdateRequest;

class LocationController extends Controller
{
    use ApiResponseTrait, TranslateTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(LocationService $locationService)
    {
        return $this->apiResponse(LocationCollection::make($locationService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request, LocationService $locationService)
    {
        return $this->apiResponse(LocationResource::make($locationService->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return $this->apiResponse(SingleLocationResource::make($location), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationUpdateRequest $request, Location $location, LocationService $locationService)
    {
        return $this->apiResponse(LocationResource::make($locationService->update($location, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location, LocationService $locationService)
    {
        return $this->apiResponse($locationService->destroy($location), __('api/response_message.deleted_success'));
    }
}
