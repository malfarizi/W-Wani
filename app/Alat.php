<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';

    protected $primaryKey = 'id_alat';

    protected $fillable = [
        'status',
        'desc',
        'foto', 
        'harga',
        'nama_alat',
        'kategori',
        'id_mitra'
    ];

    public function mitra(){
    	return $this->belongsTo('App\Mitra', 'id_mitra');
    }

}
