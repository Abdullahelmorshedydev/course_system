<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\Group\GroupStoreRequest;
use App\Http\Requests\Api\Employee\Group\GroupUpdateRequest;
use App\Http\Resources\Employee\Group\GroupCollection;
use App\Http\Resources\Employee\Group\GroupResource;
use App\Http\Resources\Employee\Group\SingleGroupResource;
use App\Models\Group;
use App\Services\Employees\GroupService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.permission:group-list'], ['only' => ['index']]);
        $this->middleware(['check.permission:group-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.permission:group-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.permission:group-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(GroupService $groupService)
    {
        return $this->apiResponse(GroupCollection::make($groupService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupStoreRequest $request, GroupService $groupService)
    {
        return $this->apiResponse(GroupResource::make($groupService->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        return $this->apiResponse(SingleGroupResource::make($group), __('api/response_message.data_retrieved'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupUpdateRequest $request, Group $group, GroupService $groupService)
    {
        return $this->apiResponse(GroupResource::make($groupService->update($group, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group, GroupService $groupService)
    {
        return $this->apiResponse($groupService->destroy($group), __('api/response_message.deleted_success'));
    }
}
