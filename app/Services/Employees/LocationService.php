<?php

namespace App\Services\Employees;

use App\Interfaces\Employees\LocationInterface;

class LocationService
{
    private $locationRepoInterface;

    public function __construct(LocationInterface $locationRepoInterface)
    {
        $this->locationRepoInterface = $locationRepoInterface;
    }

    public function index()
    {
        return $this->locationRepoInterface->index();
    }

    public function store($data)
    {
        return $this->locationRepoInterface->store($data);
    }

    public function update($location, $data)
    {
        return $this->locationRepoInterface->update($location, $data);
    }

    public function destroy($location)
    {
        return $this->locationRepoInterface->destroy($location);
    }
}
