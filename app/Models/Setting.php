<?php

namespace App\Models;

use App\Enums\SettingGroupEnum;
use App\Enums\SettingTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    const ImgPath = 'uploads/settings/';

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
    ];

    protected $casts = [
        'type' => SettingTypeEnum::class,
        'group' => SettingGroupEnum::class,
    ];
}
