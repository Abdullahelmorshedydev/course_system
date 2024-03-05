<?php

namespace App\Services\Employees;

use App\Traits\ApiResponseTrait;
use App\Repositories\Employee\AttendanceRepository;

class AttendanceService
{
    use ApiResponseTrait;

    private $attendanceRepository;

    public function __construct(AttendanceRepository $attendanceRepository)
    {
        $this->attendanceRepository = $attendanceRepository;
    }

    public function index()
    {
        return $this->attendanceRepository->index();
    }

    public function store($data)
    {
        return $this->attendanceRepository->store($data);
    }

    public function update($attendance, $data)
    {
        return $this->attendanceRepository->update($attendance, $data);
    }

    public function destroy($attendance)
    {
        return $this->attendanceRepository->destroy($attendance);
    }
}
