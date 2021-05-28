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
        'id_kategori', 
        'satuan',
        'harga',
        'qty',
        'berat',
        'foto',
        'id_mitra',
        'id_kategori'
    ];

    public function kategori(){
        return $this->belongsTo('App\Kategori', 'id_kategori');
     }

    public function mitra(){
       return $this->belongsTo('App\Mitra', 'id_mitra');
    }

}

   
