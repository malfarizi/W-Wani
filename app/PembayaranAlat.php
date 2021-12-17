<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranAlat extends Model
{
    protected $table = 'pembayaran_alat';

    protected $primaryKey = 'id_pembayaran_alat';

    protected $guarded = ['id_pembayaran_alat'];

    public function pemesanana_alat(){
    	return $this->hasOne('App\PemesananAlat', 'id_pemesanan_alat');
    }
}
