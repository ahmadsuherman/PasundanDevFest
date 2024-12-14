<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'roles',
        'bio',
        'links',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
