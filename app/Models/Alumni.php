<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_id',
        'name',
        'batch',
        'img',
        'status',
    ];

    public function dept(){
        return $this->belongsTo(Department::class,'dept_id');
    }
}
