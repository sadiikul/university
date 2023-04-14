<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaiverSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'ssc',
        'hsc',
        'percentage'
    ];
}
