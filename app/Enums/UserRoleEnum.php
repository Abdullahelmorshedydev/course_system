<?php

namespace App\Enums;

enum UserRoleEnum: int
{
    case EMPLOYEE = 1;
    case STUDENT = 2;

    public static function values(): array
    {
        return [
            self::EMPLOYEE->value,
            self::STUDENT->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::EMPLOYEE => __('api/enum.employee'),
            self::STUDENT => __('api/enum.student'),
        };
    }
}