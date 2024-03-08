<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\MajorInterface;

class MajorService
{
    private $majorRepoInterface;

    public function __construct(MajorInterface $majorRepoInterface)
    {
        $this->majorRepoInterface = $majorRepoInterface;
    }

    public function index()
    {
        return $this->majorRepoInterface->index();
    }

    public function store($data)
    {
        return $this->majorRepoInterface->store($data);
    }

    public function update($major, $data)
    {
        return $this->majorRepoInterface->update($major, $data);
    }

    public function destroy($major)
    {
        return $this->majorRepoInterface->destroy($major);
    }
}
