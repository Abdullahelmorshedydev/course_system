<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'slug'];

    protected $fillable = [
        'name',
        'slug',
        'instructor_id',
        'mentor_id',
        'start_date',
        'end_date',
        'course_id',
        'max_students',
        'number_of_students',
        'status',
    ];

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
