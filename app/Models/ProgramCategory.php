<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function list()
    {
        return $this->hasMany(ProgramList::class, 'cate_id', 'id')->where('status', 1);
    }
}
