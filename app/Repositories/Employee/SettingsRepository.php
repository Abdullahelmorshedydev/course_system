<?php

namespace App\Repositories\Employee;

use App\Interfaces\Employees\SettingsInterface;
use App\Models\Setting;

class SettingsRepository implements SettingsInterface
{
    public function index()
    {
        $settings = Setting::get();
        return $settings;
    }

    public function update($data)
    {
        foreach ($data as $key => $value) {
            Setting::where('key', $key)->update([
                'value' => $value
            ]);
        }
        return $this->index();
    }
}
