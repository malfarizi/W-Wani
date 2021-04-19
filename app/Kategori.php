<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';

    protected $primaryKey = 'id_kategori';

    protected $fillable = ['id_kategori', 'nama_kategori'];

    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
}
