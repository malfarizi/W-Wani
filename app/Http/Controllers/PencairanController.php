<?php

namespace App\Http\Controllers;

use App\Pencairan;
use App\Pembayaran;
use DB;
use Illuminate\Http\Request;

class PencairanController extends Controller
{
    
    public function index()
    {

        $saldo = $datas = DB::table('pembayaran')
        ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
        ->select('pemesanan.*','pembayaran.*')
        //->where('produk.id_mitra', session('id_mitra'))
         ->where('pembayaran.status', 'Dikirim')
         ->sum('pemesanan.total_harga');
      
        $datas = DB::table('pencairan')
        ->join('mitra', 'mitra.id_mitra', '=', 'pencairan.id_mitra')
        ->select('pencairan.*','mitra.*')
        
         ->get();
       return view ('admin.saldo', compact('saldo','datas'));
    }

    public function create()
    {
        $saldo = $datas = DB::table('pembayaran')
        ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
        ->join('pemesanan_barang', 'pemesanan_barang.id_pemesanan_barang', '=', 'pemesanan.id_pemesanan')
        ->join('produk', 'pemesanan_barang.id_produk', '=', 'produk.id_produk')
        ->join('mitra','produk.id_mitra', '=', 'mitra.id_mitra') 
        ->select('pemesanan.*','pembayaran.*')
        ->where('produk.id_mitra', session('id_mitra'))
        ->where('pembayaran.status', 'Dikirim')
         ->sum('pemesanan.total_harga');
    //   dd($saldo);
        $datas = Pencairan::where('id_mitra', session('id_mitra'))->get();
       return view ('mitra.pencairan', compact('saldo','datas'));
    }

    public function store(Request $request)
    {
        $profit = $request->jumlah * 0.01;
        $status = "Menunggu Validasi";
        $data =[
            'id_mitra'           => $request->id_mitra,
            'jumlah'             => $request->jumlah,
            'status_pencairan'   => $status,
            'profit'             => $profit
        ];
        Pencairan::create($data);
        return redirect()->back()->with('success', 'Pencairan Berhasil diajukan');
    }

    public function update()
    {
        # code...
    }
  
}
