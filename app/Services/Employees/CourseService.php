<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\CourseInterface;

class CourseService
{
    private $courseRepoInterface;

    public function __construct(CourseInterface $courseRepoInterface)
    {
        $this->courseRepoInterface = $courseRepoInterface;
    }

    public function index()
    {
        return $this->courseRepoInterface->index();
    }

    public function store($data)
    {
        return $this->courseRepoInterface->store($data);
    }

    public function update($course, $data)
    {
        return $this->courseRepoInterface->update($course, $data);
    }

    public function destroy($course)
    {
        return $this->courseRepoInterface->destroy($course);
    }
}
