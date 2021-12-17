<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mitra extends Authenticatable
{
    use notifiable;
    
    protected $table = 'mitra';

    protected $primaryKey = 'id_mitra';

    protected $guarded = ['id_mitra'];

    protected $hidden = ['password'];

    public $timestamps = false;

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function alamat(){
        return $this->belongsTo('App\Alamat', 'id_alamat');
    }

    public function alat(){
        return $this->hasMany('App\Alat', 'id_alat');
    }
}
