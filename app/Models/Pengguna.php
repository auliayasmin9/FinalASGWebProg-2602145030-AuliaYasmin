<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Pengguna as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Pengguna extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'hobbies',
        'instagram_username',
        'mobile_number',
    ];

    protected $casts = [
        'hobbies' => 'array',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
