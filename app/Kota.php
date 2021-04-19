<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $primaryKey = 'id_kota';

    protected $fillable = [
        'nama_kota',
        'tipe',
        'kodepos', 
        'id_provinsi'
    ];

    public $timestamps = false;

    public function provinsi(){
        return $this->hasOne('App\Provinsi', 'id_provinsi');
    }
}
