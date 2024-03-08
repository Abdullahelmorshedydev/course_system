<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\GroupInterface;
use App\Traits\ApiResponseTrait;

class GroupService
{
    use ApiResponseTrait;

    private $groupRepoInterface;

    public function __construct(GroupInterface $groupRepoInterface)
    {
        $this->groupRepoInterface = $groupRepoInterface;
    }

    public function index()
    {
        return $this->groupRepoInterface->index();
    }

    public function store($data)
    {
        return $this->groupRepoInterface->store($data);
    }

    public function update($group, $data)
    {
        return $this->groupRepoInterface->update($group, $data);
    }

    public function destroy($group)
    {
        return $this->groupRepoInterface->destroy($group);
    }
}
