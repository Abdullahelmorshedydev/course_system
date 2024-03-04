<?php

namespace App\Repositories\Employee;

use App\Models\Group;
use App\Enums\CourseStatusEnum;
use App\Interfaces\Employees\GroupInterface;

class GroupRepository implements GroupInterface
{
    public function index()
    {
        return Group::where('status', CourseStatusEnum::ACTIVE->value)->paginate();
    }

    public function store($data)
    {
        return Group::create($data);
    }

    public function update($group, $data)
    {
        $group->update($data);
        return $group;
    }

    public function destroy($group)
    {
        return $group->delete();
    }
}
