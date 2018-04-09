<?php

namespace App\Models\Admin;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class admin  extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'name', 'email', 'password','phone','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
