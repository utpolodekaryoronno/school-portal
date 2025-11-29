<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Admin extends User
{
    protected $fillable = [
        'name',
        'email',
        'photo',
        'password'
    ];

    protected $hidden =[
        'password',
        'remember_token'
    ];
}
