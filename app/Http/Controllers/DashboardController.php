<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Mitra;
use App\Alat;
use App\Pencairan;
use App\Produk;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        // $saldo = $datas = DB::table('pembayaran')
        // ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
        // ->select('pemesanan.*','pembayaran.*')
        //  ->where('pembayaran.status', 'Dikirim')
        //  ->sum('pemesanan.total_harga');
      
        // $profit = Pencairan::where('status_pencairan','Diterima')->sum('profit');
        $saldo = $datas = DB::table('pembayaran')
        ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
        ->join('pemesanan_barang', 'pemesanan_barang.id_pemesanan_barang', '=', 'pemesanan.id_pemesanan')
        ->join('produk', 'pemesanan_barang.id_produk', '=', 'produk.id_produk')
        ->join('mitra','produk.id_mitra', '=', 'mitra.id_mitra') 
        ->select('pemesanan.*','pembayaran.*')
        // ->where('produk.id_mitra', session('id_mitra'))
        ->where('pembayaran.status', 'Dikirim')
         ->sum('pemesanan.total_harga');
        $pencairan = Pencairan::where(['status_pencairan' => 'Diterima'])->sum('jumlah');
        $profit = Pencairan::where(['status_pencairan' => 'Diterima'])->sum('profit');
        $total_saldo = $saldo - ( $pencairan + $profit);
        $grand = $total_saldo;
      
        $datas = DB::table('pencairan')
        ->join('mitra', 'mitra.id_mitra', '=', 'pencairan.id_mitra')
        ->select('pencairan.*','mitra.*')
        ->get();
       
        $trm = Mitra::where('status','Diterima')->count();
        $blm = Mitra::where('status','Belum Diterima')->count();
    	return view('admin.dashboard', compact('trm','blm','profit','saldo', 'grand'));
   
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
