<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumb',
        'meta_title',
        'meta_tag',
        'meta_desc',
        'status',
    ];

    public function program()
    {
        return $this->hasMany(ProgramList::class, 'dept_id', 'id')->where('status', 1);
    }
}
