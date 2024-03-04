<?php

namespace App\Services\Employees;

use App\Traits\ApiResponseTrait;
use App\Repositories\Employee\GroupRepository;

class GroupService
{
    use ApiResponseTrait;

    private $groupRepository;

    public function __construct(GroupRepository $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function index()
    {
        return $this->groupRepository->index();
    }

    public function store($data)
    {
        return $this->groupRepository->store($data);
    }

    public function update($group, $data)
    {
        return $this->groupRepository->update($group, $data);
    }

    public function destroy($group)
    {
        return $this->groupRepository->destroy($group);
    }
}
