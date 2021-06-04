<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Mitra;
use App\Alat;
use App\Produk;

use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $trm = Mitra::where('status','Diterima')->count();
        $blm = Mitra::where('status','Belum Diterima')->count();
    	return view('admin.dashboard', compact('trm','blm'));
   
    }
     public function dashboardmitra()
    {
        $alat = Alat::where('id_mitra', session('id_mitra'))->count();
        $produk = Produk::where('id_mitra', session('id_mitra'))->count();
    	return view('mitra.dashboardmitra', compact('alat', 'produk'));
   
    }
    public function admin()
    {
    	return view('admin.admin');
    }
}
