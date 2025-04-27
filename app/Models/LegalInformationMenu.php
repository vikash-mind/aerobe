<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LegalInformationMenu extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'legal_information_menus';
    protected $fillable = [
        'label',
        'status'
    ];
}
