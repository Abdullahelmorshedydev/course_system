<?php

namespace App\Enums;

enum WorkingPlaceEnum: int
{
    case OFFICE = 1;
    case REMOTELY = 2;

    public static function values(): array
    {
        return [
            self::OFFICE->value,
            self::REMOTELY->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::OFFICE => __('api/enum.office'),
            self::REMOTELY => __('api/enum.remotely'),
        };
    }
}