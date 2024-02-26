<?php

namespace App\Repositories\Employee;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Interfaces\Employees\Settings\GeneralSettingsInterface;
use App\Models\Setting;

class GeneralSettingsRepository implements GeneralSettingsInterface
{
    public function index()
    {
        $settings = Setting::paginate();
        return $settings;
    }

    public function update($data)
    {
        try {
            DB::beginTransaction();
            $settings = [];
            foreach ($data as $key => $value) {
                $settings[] = Setting::where('key', $key)->update(['value' => $value]);
            }
            DB::commit();
            return $settings;
        } catch (Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages([
                $e->getMessage(),
            ]);
        }
    }
}
