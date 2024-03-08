<?php 

namespace App\Interfaces\Employees;

use Illuminate\Database\Eloquent\Model;

interface TaskInterface
{
    public function index();
    public function store(array $data);
    public function update(Model $task, array $data);
    public function destroy(Model $task);
}