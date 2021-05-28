<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranAlatController extends Controller
{
    public function index($id_alat)
    {
    	$datas = Alat::find($id_gedung);

    	dd($datas);
    	return view('penyewaan.formulirpenyewaan')
    }
}
