<?php

namespace App\Repositories\Employee;

use App\Models\Major;
use App\Interfaces\Employees\MajorInterface;

class MajorRepository implements MajorInterface
{
    public function index()
    {
        $majors = Major::paginate();
        return $majors;
    }

    public function store($data)
    {
        $major = Major::create($data);
        return $major;
    }

    public function update($major, $data)
    {
        $major->update($data);
        return $major;
    }

    public function destroy($major)
    {
        $major->delete();
        return true;
    }
}
