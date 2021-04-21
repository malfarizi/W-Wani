<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PemesananBarang extends Model
{
    protected $table = 'pemesanan_barang';

    protected $primaryKey = 'id_pemesanan_barang';

    protected $fillable = [
        'qty',
        'subtotal',
        'id_produk',
        'id_pemesanan'
    ];

    public function produk(){
    	return $this->belongsTo('App\Produk', 'id_produk');
    }
    public function pemesanan(){
    	return $this->belongsTo('App\Pemesanan', 'id_pemesanan');
    }
}
