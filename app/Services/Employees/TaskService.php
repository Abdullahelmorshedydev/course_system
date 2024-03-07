<?php

namespace App\Services\Employees;

use App\Traits\ApiResponseTrait;
use App\Repositories\Employee\TaskRepository;

class TaskService
{
    use ApiResponseTrait;

    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        return $this->taskRepository->index();
    }

    public function store($data)
    {
        return $this->taskRepository->store($data);
    }

    public function update($task, $data)
    {
        return $this->taskRepository->update($task, $data);
    }

    public function destroy($task)
    {
        return $this->taskRepository->destroy($task);
    }
}
