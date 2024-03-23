<?php

namespace App\Repositories\Employee\Setting;

use App\Models\Setting;
use App\Enums\SettingGroupEnum;
use App\Interfaces\Employees\Setting\LinkSettingInterface;

class LinkSettingRepository implements LinkSettingInterface
{
    public function index()
    {
        return Setting::where('group', SettingGroupEnum::LINKS)->get();
    }

    public function update($data)
    {
        foreach ($data as $key => $value) {
            Setting::where('key', $key)->update([
                'value' => $value,
            ]);
        }
        return Setting::where('group', SettingGroupEnum::LINKS)->get();
    }
}
