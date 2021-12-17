<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamat';

    protected $primaryKey = 'id_alamat';

    protected $guarded = ['id_alamat'];

    public function kota(){
        return $this->belongsTo('App\Kota', 'id_kota');
    }
}
