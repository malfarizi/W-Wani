<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Produk;
class LandingPageController extends Controller
{
    public function index()
    {
    	$produk = Produk::all();
    	$datas = Alat::where('status', 'Tersedia')->get();
    	return view('landing_page.utama', compact('datas','produk'));
    }
}
