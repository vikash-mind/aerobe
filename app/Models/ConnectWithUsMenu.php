<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConnectWithUsMenu extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'connect_withus_menus';
    protected $fillable = [
        'label',
        'status'
    ];
}
