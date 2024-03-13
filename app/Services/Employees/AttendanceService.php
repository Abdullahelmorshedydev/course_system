<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\AttendanceInterface;

class AttendanceService
{
    private $attendanceRepoInterface;

    public function __construct(AttendanceInterface $attendanceRepoInterface)
    {
        $this->attendanceRepoInterface = $attendanceRepoInterface;
    }

    public function index()
    {
        return $this->attendanceRepoInterface->index();
    }

    public function store($data)
    {
        return $this->attendanceRepoInterface->store($data);
    }

    public function update($attendance, $data)
    {
        return $this->attendanceRepoInterface->update($attendance, $data);
    }

    public function destroy($attendance)
    {
        return $this->attendanceRepoInterface->destroy($attendance);
    }
}
