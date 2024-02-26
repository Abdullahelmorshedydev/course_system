<?php

namespace App\Services\Employees;

use App\Repositories\Employee\MajorRepository;

class MajorService
{
    private $majorRepository;

    public function __construct(MajorRepository $majorRepository)
    {
        $this->majorRepository = $majorRepository;
    }

    public function index()
    {
        return $this->majorRepository->index();
    }

    public function store($data)
    {
        return $this->majorRepository->store($data);
    }

    public function update($major, $data)
    {
        return $this->majorRepository->update($major, $data);
    }

    public function destroy($major)
    {
        return $this->majorRepository->destroy($major);
    }
}
