<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsOfUsePage extends Model
{
    use HasFactory;
    protected $table = 'terms_of_use_page';
    protected $fillable = [
        'header_heading',
        'header_title',
        'header_image',
        'header_desc',

        'terms_desc',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
