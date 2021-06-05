<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Mitra;
use App\Alat;
use App\Pencairan;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $saldo = $datas = DB::table('pembayaran')
        ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
        ->select('pemesanan.*','pembayaran.*')
         ->where('pembayaran.status', 'Dikirim')
         ->sum('pemesanan.total_harga');
      
        $profit = Pencairan::where('status_pencairan','Diterima')->sum('profit');
        
       
        $trm = Mitra::where('status','Diterima')->count();
        $blm = Mitra::where('status','Belum Diterima')->count();
    	return view('admin.dashboard', compact('trm','blm','profit','saldo'));
   
    }
     public function dashboardmitra()
    {
       
    	return view('mitra.dashboardmitra');
   
    }
    public function admin()
    {
    	return view('admin.admin');
    }
}
