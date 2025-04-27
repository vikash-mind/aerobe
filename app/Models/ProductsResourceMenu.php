<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsResourceMenu extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'products_resource_menus';
    protected $fillable = [
        'label',
        'status'
    ];
}
