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
        return $this->hasMany(Location::class, 'country_id', 'id');
    }

    public function cities()
    {
        return $this->belongsTo(Location::class, 'country_id', 'id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
