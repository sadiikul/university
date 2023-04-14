<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_id',
        'img',
        'status',
        'show',
    ];

    public function dept(){
        return $this->belongsTo(Department::class,'dept_id');
    }
}
