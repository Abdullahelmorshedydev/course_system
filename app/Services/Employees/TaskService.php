<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\TaskInterface;
use App\Traits\ApiResponseTrait;

class TaskService
{
    use ApiResponseTrait;

    private $taskRepoInterface;

    public function __construct(TaskInterface $taskRepoInterface)
    {
        $this->taskRepoInterface = $taskRepoInterface;
    }

    public function index()
    {
        return $this->taskRepoInterface->index();
    }

    public function store($data)
    {
        return $this->taskRepoInterface->store($data);
    }

    public function update($task, $data)
    {
        return $this->taskRepoInterface->update($task, $data);
    }

    public function destroy($task)
    {
        return $this->taskRepoInterface->destroy($task);
    }
}
