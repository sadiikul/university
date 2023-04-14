<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RndPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_id',
        'title',
        'slug',
        'short',
        'desc',
        'topic',
        'thumb',
        'status',
        'meta_title',
        'meta_tag',
        'meta_desc',
    ];

    public function dept()
    {
        return $this->belongsTo(Department::class, 'dept_id');
    }
}
