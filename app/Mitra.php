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

    protected $fillable = [
        'nama_mitra',
        'email',
        'password', 
        'jk',
        'no_telp',
        'foto',
        'status',
        'level',
        'no_rek',
        'nama_rekening',
        'nama_bank',
        'id_alamat'
    ];
    protected $hidden = ['password', 'remember_token'];

    public $timestamps = false;

    public function alamat(){
        return $this->hasOne('App\Alamat', 'id_alamat');
    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
