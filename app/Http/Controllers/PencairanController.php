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
        // $datas = Pencairan::all();
        // return view ('admin.saldo');

        // $saldo = $datas = DB::table('pembayaran')
        // ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
        // ->select('pemesanan.*','pembayaran.*')
        // //->where('produk.id_mitra', session('id_mitra'))
        //  ->where('pembayaran.status', 'Dikirim')
        //  ->sum('pemesanan.total_harga');
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
        // $grand = $total_saldo - $profit;
        $grand = $total_saldo;
      
        $datas = DB::table('pencairan')
        ->join('mitra', 'mitra.id_mitra', '=', 'pencairan.id_mitra')
        ->select('pencairan.*','mitra.*')
        ->get();
      
       return view ('admin.saldo', compact('saldo','datas', 'grand','total_saldo'));
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
        $pencairan = Pencairan::where(['id_mitra' => session('id_mitra') ,'status_pencairan' => 'Diterima'])->sum('jumlah');
        $profit = Pencairan::where(['id_mitra' => session('id_mitra') ,'status_pencairan' => 'Diterima'])->sum('profit');
        $total_saldo = $saldo - ( $pencairan + $profit);
        $grand = $total_saldo - $profit;
        //dd($grand);
        $datas = Pencairan::where('id_mitra', session('id_mitra'))->get();
        //dd($datas);
       return view ('mitra.pencairan', compact('total_saldo','datas'));
    }

    public function store(Request $request)
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
        $pencairan = Pencairan::where(['id_mitra' => session('id_mitra') ,'status_pencairan' => 'Diterima'])->sum('jumlah');
          $profit = Pencairan::where(['id_mitra' => session('id_mitra') ,'status_pencairan' => 'Diterima'])->sum('profit');
        $total_saldo = $saldo - ( $pencairan + $profit);
        
         if ($request->jumlah > $total_saldo) {
             
            return redirect()->back()->with('error', 'Jumlah Pengajuan Melebihi Saldo Yang Ada');
         }
         else {
        $profit = $request->jumlah * 0.01;
        $cek = $request->jumlah + $profit;
        if ($cek > $total_saldo ) {
            return redirect()->back()->with('error', 'Saldo Tidak Mencukupi');
         }
       
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
        
    }

    public function update(Request $request, $id)
    { $data = $request->only('status_pencairan');
        Pencairan::whereid_pencairan($id)->update($data);
        return redirect()->back()->with('success', 'Data berhasil  diubah');
    }
  
}
