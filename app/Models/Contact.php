<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_phone_title',
        'second_phone_title',
        'email_title',
        'email',
        'first_phone',
        'second_phone',
        'third_phone',
        'fourth_phone',
        'first_address_title',
        'second_address_title',
        'third_address_title',
        'first_address',
        'second_address',
        'third_address',
    ];
}
