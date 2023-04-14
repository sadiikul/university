<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_id',
        'program_id',
        'name',
        'email',
        'designation',
        'position',
        'from',
        'status',
        'desc',
        'img',
        'publication',
        'achievements'
    ];

    public function dept()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
