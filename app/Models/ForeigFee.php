<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForeigFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'credit',
        'duration',
        'fee',
    ];

    public function program()
    {
        return $this->belongsTo(ProgramList::class)->select(['id', 'name']);
    }
}
