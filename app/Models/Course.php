<?php

namespace App\Models;

use App\Enums\CourseStatusEnum;
use App\Enums\DiscountTypeEnum;
use App\Enums\DurationTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, HasTranslations;

    const ImgPath = 'uploads/courses/';

    public $translatable = ['name', 'slug', 'description'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'discount',
        'discount_type',
        'duration',
        'duration_type',
        'major_id',
        'status',
    ];

    protected $casts = [
        'discount_type' => DiscountTypeEnum::class,
        'duration_type' => DurationTypeEnum::class,
        'status' => CourseStatusEnum::class,
    ];

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
