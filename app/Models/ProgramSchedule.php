<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'semester',
        'year',
        'course',
        'credit',
    ];

    public function program()
    {
        return $this->belongsTo(ProgramList::class, 'program_id');
    }
}
