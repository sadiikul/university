<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customize extends Model
{
    use HasFactory;

    protected $fillable = [
        'academics',
        'admission',
        'management',
        'seminar',
        'notice',
        'social_page',
        'news_event',
        'counter',
        'gallery',
        'clubs',
        'partner',
    ];
}
