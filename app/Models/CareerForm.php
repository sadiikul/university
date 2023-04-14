<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'name',
        'email',
        'phone',
        'address',
        'joining_date',
        'expected_salary',
        'experience',
        'message',
        'portfolio_link',
        'cover',
        'resume',
        'status',
    ];

    public function post(){
        return $this->belongsTo(CareerPost::class,'post_id');
    }
}
