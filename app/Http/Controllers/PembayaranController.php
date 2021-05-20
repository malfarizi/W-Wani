<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Mitra;
use DB;
use App\PemesananAlat;
use App\PembayaranAlat;
use Session;

class PembayaranController extends Controller
{
    public function pembayaranalat($id_pemesanan_alat)
    {
        
        $datas = PemesananAlat::find($id_pemesanan_alat);
        // dd($datas);
    	return view('penyewaan.pembayaranAlat', compact('datas'));
    }
}
