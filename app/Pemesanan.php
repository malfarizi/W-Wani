<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    
    protected $primaryKey = 'id_pemesanan';

    protected $guarded = ['id_pemesanan'];

    public function pembeli(){
    	return $this->belongsTo('App\Pembeli', 'id_pembeli');
    }
}
