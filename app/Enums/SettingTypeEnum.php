<?php

namespace App\Enums;

enum SettingTypeEnum: int
{
    case FILE = 1;
    case TEXT = 2;

    public static function values(): array
    {
        return [
            self::FILE->value,
            self::TEXT->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::FILE => __('api/enum.file'),
            self::TEXT => __('api/enum.text'),
        };
    }
}