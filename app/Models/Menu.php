<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'home',
        'home_status',
        'academic',
        'academic_status',
        'admission',
        'admission_status',
        'management',
        'management_status',
        'rnd',
        'rnd_status',
        'affair',
        'affair_status',
        'event',
        'event_status',
    ];
}
