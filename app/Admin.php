<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token'];

    public $timestamps = false;

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
