<?php

namespace App\Repositories\Employee;

use App\Models\Course;
use App\Enums\CourseStatusEnum;
use App\Interfaces\Employees\CourseInterface;

class CourseRepository implements CourseInterface
{
    public function index()
    {
        return Course::where('status', CourseStatusEnum::ACTIVE->value)->paginate();
    }

    public function store($data)
    {
        return Course::create($data);
    }

    public function update($course, $data)
    {
        $course->update($data);
        return $course;
    }

    public function destroy($course)
    {
        return $course->delete();
    }
}
