<?php

namespace App\Repositories\Employee;

use App\Interfaces\Employees\ModuleInterface;
use App\Models\Attendance;

class AttendanceRepository implements ModuleInterface
{
    public function index()
    {
        return Attendance::paginate();
    }

    public function store($data)
    {
        return Attendance::create($data);
    }

    public function update($attendance, $data)
    {
        $attendance->update($data);
        return $attendance;
    }

    public function destroy($attendance)
    {
        return $attendance->delete();
    }
}
