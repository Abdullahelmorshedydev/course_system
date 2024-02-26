<?php

namespace App\Services\Employees;

use App\Repositories\Employee\LocationRepository;

class LocationService
{
    private $locationRepository;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function index()
    {
        return $this->locationRepository->index();
    }

    public function store($data)
    {
        return $this->locationRepository->store($data);
    }

    public function update($location, $data)
    {
        return $this->locationRepository->update($location, $data);
    }

    public function destroy($location)
    {
        return $this->locationRepository->destroy($location);
    }
}
