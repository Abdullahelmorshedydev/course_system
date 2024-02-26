<?php

namespace App\Repositories\Employee;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Employees\LocationInterface;
use App\Models\Location;

class LocationRepository implements LocationInterface
{
    public function index()
    {
        $locations = Location::paginate();
        return $locations;
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $location = Location::create($data);
            DB::commit();
            return $location;
        } catch (Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                $e->getMessage(),
            ]);
        }
    }

    public function update($location, $data)
    {
        try {
            DB::beginTransaction();
            $location->update($data);
            DB::commit();
            return $location;
        } catch (Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                $e->getMessage(),
            ]);
        }
    }

    public function destroy($location)
    {
        try{
            $location->delete();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
