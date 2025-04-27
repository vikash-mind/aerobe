<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportPage extends Model
{
    use HasFactory;
    protected $table = 'support_page';
    protected $fillable = [
        'header_heading',
        'header_title',
        'header_image',
        'header_desc',

        'support_desc',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
