<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananAlat extends Model
{
    protected $table = 'pemesanan_alat';

    protected $primaryKey = 'id_pemesanan_alat';

    protected $fillable = [
        'luas_tanah',
        'tanggal',
        'total_harga', 
        'alamat_lengkap',
        'id_alat',
        'id_mitra'
    ];

    public function alat(){
    	return $this->belongsTo('App\Alat', 'id_alat');
    }

    public function mitra(){
    	return $this->belongsTo('App\Mitra', 'id_mitra');
    }
}
