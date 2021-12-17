<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';

    protected $primaryKey = 'id_alat';

    protected $guarded = ['id_alat'];

    public function mitra(){
    	return $this->belongsTo('App\Mitra', 'id_mitra');
    }

}
