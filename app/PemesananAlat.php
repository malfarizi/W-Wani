<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananAlat extends Model
{
    protected $table = 'pemesanan_alat';

    protected $primaryKey = 'id_pemesanan_alat';

    protected $guarded = ['id_pemesanan_alat'];

    public function alat(){
    	return $this->belongsTo('App\Alat', 'id_alat');
    }

    public function mitra(){
    	return $this->belongsTo('App\Mitra', 'id_mitra');
    }
}
