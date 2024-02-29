<?php

namespace App\Http\Controllers\Api\Employee;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Employees\CourseService;
use App\Http\Resources\Employee\Course\CourseResource;
use App\Http\Resources\Employee\Course\CourseCollection;
use App\Http\Resources\Employee\Course\SingleCourseResource;
use App\Http\Requests\Api\Employee\Course\CourseStoreRequest;
use App\Http\Requests\Api\Employee\Course\CourseUpdateRequest;

class CourseController extends Controller
{
    use ApiResponseTrait;

    private $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->apiResponse(new CourseCollection($this->courseService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseStoreRequest $request)
    {
        return $this->apiResponse(CourseResource::make($this->courseService->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return $this->apiResponse(SingleCourseResource::make($course), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
        return $this->apiResponse(CourseResource::make($this->courseService->update($course, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        return $this->apiResponse($this->courseService->destroy($course), __('api/response_message.deleted_success'));
    }
}
