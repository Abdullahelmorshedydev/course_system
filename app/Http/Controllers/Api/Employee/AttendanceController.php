<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\Attendance\AttendanceStoreRequest;
use App\Http\Requests\Api\Employee\Attendance\AttendanceUpdateRequest;
use App\Http\Resources\Employee\Attendance\AttendanceCollection;
use App\Http\Resources\Employee\Attendance\AttendanceResource;
use App\Http\Resources\Employee\Attendance\SingleAttendanceResource;
use App\Models\Attendance;
use App\Services\Employees\AttendanceService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.permission:attendance-list'], ['only' => ['index']]);
        $this->middleware(['check.permission:attendance-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.permission:attendance-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.permission:attendance-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(AttendanceService $attendanceService)
    {
        return $this->apiResponse(AttendanceCollection::make($attendanceService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttendanceStoreRequest $request, AttendanceService $attendanceService)
    {
        return $this->apiResponse(AttendanceResource::make($attendanceService->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        return $this->apiResponse(SingleAttendanceResource::make($attendance), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttendanceUpdateRequest $request, Attendance $attendance, AttendanceService $attendanceService)
    {
        return $this->apiResponse(AttendanceResource::make($attendanceService->update($attendance, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance, AttendanceService $attendanceService)
    {
        return $this->apiResponse($attendanceService->destroy($attendance), __('api/response_message.deleted_success'));
    }
}
