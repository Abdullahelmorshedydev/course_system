<?php

namespace App\Services\Employees;

use App\Traits\ApiResponseTrait;
use App\Repositories\Employee\CourseRepository;

class CourseService
{
    use ApiResponseTrait;

    private $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        return $this->courseRepository->index();
    }

    public function store($data)
    {
        return $this->courseRepository->store($data);
    }

    public function update($course, $data)
    {
        return $this->courseRepository->update($course, $data);
    }

    public function destroy($course)
    {
        return $this->courseRepository->destroy($course);
    }
}
