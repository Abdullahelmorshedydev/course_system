<?php

namespace App\Repositories\Employee;

use Exception;
use App\Models\Major;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Employees\MajorInterface;
use Illuminate\Validation\ValidationException;

class MajorRepository implements MajorInterface
{
    public function index()
    {
        $majors = Major::paginate();
        return $majors;
    }

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $major = Major::create($data);
            DB::commit();
            return $major;
        } catch (Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                $e->getMessage(),
            ]);
        }
    }

    public function update($major, $data)
    {
        try {
            DB::beginTransaction();
            $major->update($data);
            DB::commit();
            return $major;
        } catch (Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                $e->getMessage(),
            ]);
        }
    }

    public function destroy($major)
    {
        try{
            $major->delete();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
