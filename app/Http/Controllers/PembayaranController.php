<?php

namespace App\Http\Controllers;
use App\Pembayaran;
use Illuminate\Http\Request;
use App\Alat;
use App\Mitra;
use DB;
use App\PemesananAlat;
use App\PembayaranAlat;
use Session;

class PembayaranController extends Controller
{
    public function index()
    {
        $datas = Pembayaran::all();
        return view('mitra.produk.pembayaranProduk', compact('datas'));
    }
}
