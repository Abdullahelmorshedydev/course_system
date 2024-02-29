<?php

namespace App\Enums;

enum CourseStatusEnum: int
{
    case ACTIVE = 1;
    case DESACTIVE = 2;

    public static function values(): array
    {
        return [
            self::ACTIVE->value,
            self::DESACTIVE->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::ACTIVE => __('api/enum.active'),
            self::DESACTIVE => __('api/enum.desactive'),
        };
    }
}