<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\Feedback\FeedbackStoreRequest;
use App\Http\Requests\Api\Employee\Feedback\FeedbackUpdateRequest;
use App\Http\Resources\Employee\Feedback\FeedbackCollection;
use App\Http\Resources\Employee\Feedback\FeedbackResource;
use App\Http\Resources\Employee\Feedback\SingleFeedbackResource;
use App\Models\Feedback;
use App\Services\Employees\FeedbackService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(FeedbackService $feedbackService)
    {
        return $this->apiResponse(FeedbackCollection::make($feedbackService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedbackStoreRequest $request, FeedbackService $feedbackService)
    {
        return $this->apiResponse(FeedbackResource::make($feedbackService->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        return $this->apiResponse(SingleFeedbackResource::make($feedback), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeedbackUpdateRequest $request, Feedback $feedback, FeedbackService $feedbackService)
    {
        return $this->apiResponse(FeedbackResource::make($feedbackService->update($feedback, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback, FeedbackService $feedbackService)
    {
        return $this->apiResponse($feedbackService->destroy($feedback), __('api/response_message.deleted_success'));
    }
}
