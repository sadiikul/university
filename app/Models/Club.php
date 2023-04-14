<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'desc',
        'thumb',
        'status',
        'meta_title',
        'meta_tag',
        'meta_desc',
    ];
}
