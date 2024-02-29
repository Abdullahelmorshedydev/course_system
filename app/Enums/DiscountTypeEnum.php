<?php

namespace App\Enums;

enum DiscountTypeEnum: int
{
    case FIXED = 1;
    case PERCENT = 2;

    public static function values(): array
    {
        return [
            self::FIXED->value,
            self::PERCENT->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::FIXED => __('api/enum.fixed'),
            self::PERCENT => __('api/enum.percent'),
        };
    }
}