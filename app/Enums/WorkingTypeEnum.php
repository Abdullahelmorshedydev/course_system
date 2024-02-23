<?php

namespace App\Enums;

enum WorkingTypeEnum: int
{
    case FULLTIME = 1;
    case PARTTIME = 2;

    public static function values(): array
    {
        return [
            self::FULLTIME->value,
            self::PARTTIME->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::FULLTIME => __('api/enum.fulltime'),
            self::PARTTIME => __('api/enum.parttime'),
        };
    }
}