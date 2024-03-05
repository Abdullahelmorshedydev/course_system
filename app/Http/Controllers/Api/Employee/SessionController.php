<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\Session\SessionStoreRequest;
use App\Http\Requests\Api\Employee\Session\SessionUpdateRequest;
use App\Http\Resources\Employee\Session\SessionCollection;
use App\Http\Resources\Employee\Session\SessionResource;
use App\Http\Resources\Employee\Session\SingleSessionResource;
use App\Models\Session;
use App\Services\Employees\SessionService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(SessionService $sessionService)
    {
        return $this->apiResponse(SessionCollection::make($sessionService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionStoreRequest $request, SessionService $sessionService)
    {
        return $this->apiResponse(SessionResource::make($sessionService->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Session $session)
    {
        return $this->apiResponse(SingleSessionResource::make($session), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SessionUpdateRequest $request, Session $session, SessionService $sessionService)
    {
        return $this->apiResponse(SessionResource::make($sessionService->update($session, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session, SessionService $sessionService)
    {
        return $this->apiResponse($sessionService->destroy($session), __('api/response_message.deleted_success'));
    }
}
