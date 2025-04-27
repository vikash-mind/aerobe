<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopPage extends Model
{
    use HasFactory;
    protected $table = 'shop_page';
    protected $fillable = [
        'banner_title',
        'banner_image',
        'banner_desc',

        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
