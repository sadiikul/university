<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_id',
        'img',
    ];

    public function dept(){
        return $this->belongsTo(Department::class,'dept_id');
    }
}
