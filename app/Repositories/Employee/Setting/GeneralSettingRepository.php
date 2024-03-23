<?php

namespace App\Repositories\Employee\Setting;

use App\Enums\SettingGroupEnum;
use App\Interfaces\Employees\Setting\GeneralSettingInterface;
use App\Models\Setting;

class GeneralSettingRepository implements GeneralSettingInterface
{
    public function index()
    {
        return Setting::where('group', SettingGroupEnum::GENERAL)->get();
    }

    public function update($data)
    {
        foreach ($data as $key => $value) {
            Setting::where('key', $key)->update([
                'value' => $value,
            ]);
        }
        return Setting::where('group', SettingGroupEnum::GENERAL)->get();
    }
}
