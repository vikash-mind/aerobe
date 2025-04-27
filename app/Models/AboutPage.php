<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;
    protected $table = 'about_page';
    protected $fillable = [
        'header_heading',
        'header_title',
        'header_image',
        'header_desc',
        
        'about_image',
        'about_desc',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
