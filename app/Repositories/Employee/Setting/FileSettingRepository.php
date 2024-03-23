<?php

namespace App\Repositories\Employee\Setting;

use App\Models\Setting;
use App\Enums\SettingGroupEnum;
use App\Interfaces\Employees\Setting\FileSettingInterface;
use App\Traits\FilesTrait;

class FileSettingRepository implements FileSettingInterface
{
    use FilesTrait;

    public function index()
    {
        return Setting::where('group', SettingGroupEnum::FILES)->get();
    }

    public function update($data)
    {
        dd($data);
        foreach ($data as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            FilesTrait::delete($setting->value);
            $newPath = FilesTrait::store($value, Setting::ImgPath);
            $setting->update([
                'value' => $newPath,
            ]);
        }
        return Setting::where('group', SettingGroupEnum::FILES)->get();
    }
}
