<?php

namespace App\Enums;

enum SettingGroupEnum: int
{
    case FILES = 1;
    case GENERAL = 2;
    case LINKS = 3;

    public static function values(): array
    {
        return [
            self::FILES->value,
            self::GENERAL->value,
            self::LINKS->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::FILES => __('api/enum.files'),
            self::GENERAL => __('api/enum.general'),
            self::LINKS => __('api/enum.links'),
        };
    }
}