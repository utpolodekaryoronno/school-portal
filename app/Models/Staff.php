<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Staff extends User
{
    protected $fillable = [
        'name',
        'username',
        'email',
        'phone',
        'password',
        'role',
        'photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
