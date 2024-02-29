<?php

namespace App\Models;

use App\Enums\UserStatusEnum;
use App\Enums\WorkingTypeEnum;
use App\Enums\WorkingPlaceEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeProfile extends Model
{
    use HasFactory;

    const ImgPath = 'uploads/employees/';

    protected $fillable = [
        'user_id',
        'salary',
        'status',
        'working_type',
        'working_hours',
        'working_place',
    ];

    protected $casts = [
        'working_type' => WorkingTypeEnum::class,
        'working_place' => WorkingPlaceEnum::class,
        'status' => UserStatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
