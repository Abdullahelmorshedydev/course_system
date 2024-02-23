<?php

namespace App\Enums;

enum EmployeeRoleEnum: int
{
    case EMPLOYEE = 1;

    public static function values(): array
    {
        return [
            self::EMPLOYEE->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::EMPLOYEE => __('api/enum.employee'),
        };
    }
}