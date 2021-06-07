<?php

namespace App\Http\Controllers;
use App\Pembayaran;
use Illuminate\Http\Request;
use App\Pembeli;
use App\Mitra;
use DB;
use App\Pemesanan;
use App\PemesananBarang;
use Session;
use PDF;

class PembayaranController extends Controller
{
    public function index()
    {
        
        // $datas = Pembayaran::all();
        $datas = DB::table('pembayaran')
        ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
        ->join('pemesanan_barang', 'pemesanan_barang.id_pemesanan_barang', '=', 'pemesanan.id_pemesanan')
        ->join('produk', 'pemesanan_barang.id_produk', '=', 'produk.id_produk')
        ->join('mitra','produk.id_mitra', '=', 'mitra.id_mitra') 
        ->join('pembeli','pemesanan.id_pembeli', '=', 'pembeli.id_pembeli') 
        ->select('pemesanan.*','pembayaran.*', 'produk.*', 'pembeli.*')
        ->where('produk.id_mitra', session('id_mitra'))
        // ->where('pembayaran_alat.status_pembayaran', 'Menunggu Pembayaran Diterima')
        ->get();
        // dd($datas);
        return view('mitra.produk.kelolapemesananproduk', compact('datas'));
    }

    public function cetakpembayaranproduk($created_at)
    {
        
        // $datas = Pembayaran::all();
        $datas = DB::table('pembayaran')
        ->join('pemesanan', 'pemesanan.id_pemesanan', '=', 'pembayaran.id_pemesanan')
        ->join('pemesanan_barang', 'pemesanan_barang.id_pemesanan_barang', '=', 'pemesanan.id_pemesanan')
        ->join('produk', 'pemesanan_barang.id_produk', '=', 'produk.id_produk')
        ->join('mitra','produk.id_mitra', '=', 'mitra.id_mitra') 
        ->join('pembeli','pemesanan.id_pembeli', '=', 'pembeli.id_pembeli') 
        ->select('pemesanan.*','pembayaran.*', 'produk.*', 'pembeli.*')
        ->where('produk.id_mitra', session('id_mitra'))
        ->where('pembayaran.created_at', $created_at)
        // ->where('pembayaran_alat.status_pembayaran', 'Menunggu Pembayaran Diterima')
        ->get();
   
        $pdf = PDF::loadview('mitra.produk.laporanproduk',['datas'=>$datas]);
                // return $pdf->download('laporan-pembayaranproduk.pdf');
                return $pdf->stream();
        
        return view('mitra.produk.kelolapemesananproduk', compact('datas'));
    }
    public function update(Request $request, $id){
    
    	$data = Pembayaran::findOrFail($id);
        $data->no_resi = $request->input('no_resi');
        $data->status = $request->input('status');
        
        $data->save();
        return redirect()->back()->with('success', 'Data berhasil didubah');
    }

    public function delete($id)
    {
        $data = Pembayaran::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
