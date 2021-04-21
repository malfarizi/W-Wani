<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'kategori', 
        'satuan',
        'harga',
        'qty',
        'berat',
        'photo',
        'id_mitra',
    ];


    public function mitra(){
       return $this->hasOne('App\Mitra', 'id_mitra');
	}
}

   
