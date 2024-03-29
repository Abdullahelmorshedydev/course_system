<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Location extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'slug'];

    protected $fillable = [
        'name',
        'slug',
        'country_id',
    ];

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    public function country()
    {
        return $this->belongsTo(Location::class, 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(Location::class, 'country_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
