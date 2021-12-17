<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pembeli extends Authenticatable
{
    use notifiable;

    protected $table = 'pembeli';
    
    protected $primaryKey = 'id_pembeli';
    
    protected $guarded = ['id_pembeli'];

    protected $hidden = ['password'];
    
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function alamat(){
        return $this->belongsTo('App\Alamat', 'id_alamat');
    }
}
