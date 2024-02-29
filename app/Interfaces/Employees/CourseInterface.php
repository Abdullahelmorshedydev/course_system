<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface CourseInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $course, array $data);
    public function destroy(Model $course);
}