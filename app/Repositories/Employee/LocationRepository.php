<?php

namespace App\Repositories\Employee;

use App\Interfaces\Employees\ModuleInterface;
use App\Models\Location;

class LocationRepository implements ModuleInterface
{
    public function index()
    {
        $locations = Location::paginate();
        return $locations;
    }

    public function store($data)
    {
        $location = Location::create($data);
        return $location;
    }

    public function update($location, $data)
    {
        $location->update($data);
        return $location;
    }

    public function destroy($location)
    {
        $location->delete();
        return true;
    }
}
