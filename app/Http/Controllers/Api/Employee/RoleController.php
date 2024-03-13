<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Employee\Role\RoleStoreRequest;
use App\Http\Requests\Api\Employee\Role\RoleUpdateRequest;
use App\Http\Resources\Employee\Role\RoleCollection;
use App\Http\Resources\Employee\Role\RoleResource;
use App\Services\Employees\RoleService;
use App\Traits\ApiResponseTrait;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.permission:role-list'], ['only' => ['index']]);
        $this->middleware(['check.permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.permission:role-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(RoleService $roleService)
    {
        return $this->apiResponse(RoleCollection::make($roleService->index()), __('api/response_message.data_retrieved'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request, RoleService $roleService)
    {
        return $this->apiResponse(RoleResource::make($roleService->store($request->validated())), __('api/response_message.created_success'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, Role $role, RoleService $roleService)
    {
        return $this->apiResponse(RoleResource::make($roleService->update($role, $request->validated())), __('api/response_message.updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role, RoleService $roleService)
    {
        return $this->apiResponse($roleService->destroy($role), __('api/response_message.deleted_success'));
    }
}
