<?php

namespace App\Models;

use App\Enums\WorkingPlaceEnum;
use App\Enums\WorkingTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeProfile extends Model
{
    use HasFactory;

    public static $img_path = 'uploads/employees/';

    protected $fillable = [
        'employee_id',
        'working_type',
        'working_hours',
        'working_place',
    ];

    protected $casts = [
        'working_type' => WorkingTypeEnum::class,
        'working_place' => WorkingPlaceEnum::class,
    ];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
