<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface AttendanceInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $attendance, array $data);
    public function destroy(Model $attendance);
}