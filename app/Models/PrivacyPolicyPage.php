<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicyPage extends Model
{
    use HasFactory;
    protected $table = 'privacy_policy_page';
    protected $fillable = [
        'header_heading',
        'header_title',
        'header_image',
        'header_desc',

        'privacy_desc',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
