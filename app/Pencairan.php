<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencairan extends Model
{
    protected $table = 'pencairan';

    protected $fillable = ['jumlah','id_mitra','status_pencairan','profit'];
}
