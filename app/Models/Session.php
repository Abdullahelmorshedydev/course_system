<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Session extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['description'];

    protected $fillable = [
        'group_id',
        'session',
        'date',
        'description',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
