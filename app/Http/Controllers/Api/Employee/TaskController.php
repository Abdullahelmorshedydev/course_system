<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\Task\TaskStoreRequest;
use App\Http\Requests\Api\Employee\Task\TaskUpdateRequest;
use App\Http\Resources\Employee\Task\SingleTaskResource;
use App\Http\Resources\Employee\Task\TaskCollection;
use App\Http\Resources\Employee\Task\TaskResource;
use App\Models\Task;
use App\Services\Employees\TaskService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.permission:task-list'], ['only' => ['index']]);
        $this->middleware(['check.permission:task-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.permission:task-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.permission:task-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(TaskService $taskService)
    {
        return $this->apiResponse(TaskCollection::make($taskService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request, TaskService $taskService)
    {
        return $this->apiResponse(TaskResource::make($taskService->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return $this->apiResponse(SingleTaskResource::make($task), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task, TaskService $taskService)
    {
        return $this->apiResponse(TaskResource::make($taskService->update($task, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, TaskService $taskService)
    {
        return $this->apiResponse($taskService->destroy($task), __('api/response_message.deleted_success'));
    }
}
