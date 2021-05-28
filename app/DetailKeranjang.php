<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKeranjang extends Model
{
    protected $table = 'detail_keranjang';

    protected $primaryKey = 'id_detail_keranjang';

    protected $fillable = [
        'qty',
        'subtotal',
        'id_produk', 
        'id_keranjang'
    ];

    public function produk(){
    	return $this->belongsTo('App\Produk', 'id_produk');
    }

    public function keranjang(){
    	return $this->belongsTo('App\Keranjang', 'id_keranjang');
    }
}
