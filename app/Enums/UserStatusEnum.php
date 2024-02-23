<?php

namespace App\Enums;

enum UserStatusEnum: int
{
    case DESACTIVE = 1;
    case ACTIVE = 2;

    public static function values(): array
    {
        return [
            self::DESACTIVE->value,
            self::ACTIVE->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::DESACTIVE => __('api/enum.desactive'),
            self::ACTIVE => __('api/enum.active'),
        };
    }
}