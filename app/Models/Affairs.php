<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affairs extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desig',
        'email',
        'img',
        'status',
    ];
}
