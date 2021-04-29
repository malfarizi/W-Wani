<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';

    protected $primaryKey = 'id';

    protected $fillable = [
        'email', 
        'nama_admin',
        'password',
        'jk',
        'no_telp',
        'foto', 
    ];

    protected $hidden = ['password', 'remember_token'];

    public $timestamps = false;

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
