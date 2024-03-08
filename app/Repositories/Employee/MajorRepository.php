<?php

namespace App\Repositories\Employee;

use App\Models\Major;
use App\Interfaces\Employees\MajorInterface;

class MajorRepository implements MajorInterface
{
    public function index()
    {
        return Major::paginate();
    }

    public function store($data)
    {
        return Major::create($data);
    }

    public function update($major, $data)
    {
        $major->update($data);
        return $major;
    }

    public function destroy($major)
    {
        return $major->delete();
    }
}
