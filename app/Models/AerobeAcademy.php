<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AerobeAcademy extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'aerobe_academies';
    protected $fillable = [
        'title',
        'image',
        'category_id',
        'country_id',
        'short_description',
        'long_description',
        'status'
    ];

    protected $casts = [
        'country_id' => 'array', // Automatically converts JSON to array when retrieved
    ];
}
