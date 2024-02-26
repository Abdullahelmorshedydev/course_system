<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public static $img_path = 'uploads/settings/';

    protected $fillable = [
        'key',
        'value',
    ];
}
