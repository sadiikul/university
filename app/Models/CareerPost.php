<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'job_type',
        'deadline',
        'description',
        'status',
    ];
}
