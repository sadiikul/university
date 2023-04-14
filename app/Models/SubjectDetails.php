<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'name',
        'desc',
        'credit',
        'prere',
    ];

    public function program()
    {
        return $this->belongsTo(ProgramList::class, 'program_id');
    }
}
