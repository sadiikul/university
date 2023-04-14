<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyndicateMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'designation',
        'position',
        'img',
        'desc',
        'status'
    ];
}
