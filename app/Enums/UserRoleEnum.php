<?php

namespace App\Enums;

enum UserRoleEnum: int
{
    case EMPLOYEE = 1;
    case STUDENT = 2;
    case INSTRUCTOR = 3;
    case MENTOR = 4;

    public static function values(): array
    {
        return [
            self::EMPLOYEE->value,
            self::STUDENT->value,
            self::INSTRUCTOR->value,
            self::MENTOR->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::EMPLOYEE => __('api/enum.employee'),
            self::STUDENT => __('api/enum.student'),
            self::INSTRUCTOR => __('api/enum.instructor'),
            self::MENTOR => __('api/enum.mentor'),
        };
    }
}