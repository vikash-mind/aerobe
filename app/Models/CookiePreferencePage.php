<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookiePreferencePage extends Model
{
    use HasFactory;
    protected $table = 'cookie_preference_page';
    protected $fillable = [
        'header_heading',
        'header_title',
        'header_image',
        'header_desc',
        
        'cookie_preference_desc',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
