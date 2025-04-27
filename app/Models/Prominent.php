<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prominent extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'prominents';
    protected $fillable = [
        'label',
        'country_id',
        'logo',
        'link',
        'status'
    ];
}
