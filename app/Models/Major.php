<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'slug'];

    protected $fillable = [
        'name',
        'slug',
        'major_id',
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

    public function majors()
    {
        return $this->hasMany(Major::class);
    }
}
