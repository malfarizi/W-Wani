<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $primaryKey = 'id_keranjang';

    protected $fillable = ['id_pembeli'];

    public function pembeli(){
    	return $this->belongsTo('App\Pembeli', 'id_pembeli');
    }
}
