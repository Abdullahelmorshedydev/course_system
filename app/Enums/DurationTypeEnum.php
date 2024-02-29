<?php

namespace App\Enums;

enum DurationTypeEnum: int
{
    case HOUR = 1;
    case MONTH = 2;

    public static function values(): array
    {
        return [
            self::HOUR->value,
            self::MONTH->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::HOUR => __('api/enum.hour'),
            self::MONTH => __('api/enum.month'),
        };
    }
}