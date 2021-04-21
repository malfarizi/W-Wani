<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'etd',
        'service',
        'total_harga', 
        'alamat_lengkap',
        'kurir',
        'tanggal'
        'id_pembeli'
    ];

    public function pembeli(){
    	return $this->belongsTo('App\Pembeli', 'id_pembeli');
    }
}
