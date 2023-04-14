<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProViceChancellor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'desig',
        'short',
        'long',
        'img',
    ];
}
