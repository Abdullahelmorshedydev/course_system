<?php

namespace App\Repositories\Employee;

use App\Interfaces\Employees\TaskInterface;
use App\Models\Task;

class TaskRepository implements TaskInterface
{
    public function index()
    {
        return Task::paginate();
    }

    public function store($data)
    {
        return Task::create($data);
    }

    public function update($task, $data)
    {
        $task->update($data);
        return $task;
    }

    public function destroy($task)
    {
        return $task->delete();
    }
}
