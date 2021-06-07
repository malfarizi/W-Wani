<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'no_resi',
        'status',
        'foto',
        'id_pemesanan',
        'created_at'   
    ];

    public function pemesanan(){
    	return $this->belongsTo('App\Pemesanan', 'id_pemesanan');
    }
}
