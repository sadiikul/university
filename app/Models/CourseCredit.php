<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'area',
        'no',
        'hour',
    ];

    public function program()
    {
        return $this->belongsTo(ProgramList::class, 'program_id');
    }
}
