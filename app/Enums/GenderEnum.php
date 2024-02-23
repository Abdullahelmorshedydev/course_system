<?php

namespace App\Enums;

enum GenderEnum: int
{
    case MALE = 1;
    case FEMALE = 2;

    public static function values(): array
    {
        return [
            self::MALE->value,
            self::FEMALE->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::MALE => __('api/enum.male'),
            self::FEMALE => __('api/enum.female'),
        };
    }
}