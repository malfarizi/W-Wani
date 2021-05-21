<?php

namespace App\Http\Controllers;
use App\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $datas = Pembayaran::all();
        return view('mitra.produk.pembayaranProduk', compact('datas'));
    }
}
