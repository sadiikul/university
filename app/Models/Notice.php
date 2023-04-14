<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_id',
        'title',
        'type',
        'content_type',
        'file',
        'text',
        'status',
    ];

    public function dept()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
