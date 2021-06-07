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
        ->join('pemesanan', 'pembayaran.id_pemesanan', '=', 'pemesanan.id_pemesanan')
        ->join('pembeli', 'pemesanan.id_pembeli', '=', 'pembeli.id_pembeli')
        ->join('alamat', 'pembeli.id_alamat', '=', 'alamat.id_alamat')
        ->join('kota', 'alamat.id_kota', '=', 'kota.id_kota')
        ->join('provinsi', 'kota.id_provinsi', '=', 'provinsi.id_provinsi')
        ->join('pemesanan_barang', 'pemesanan_barang.id_pemesanan', '=', 'pemesanan.id_pemesanan')
        ->join('produk', 'pemesanan_barang.id_produk', '=', 'produk.id_produk')
        ->join('mitra', 'mitra.id_mitra', '=', 'produk.id_mitra')
        ->select('pembayaran.*', 'pemesanan_barang.qty','pembeli.nama_pembeli','pemesanan.tanggal','pemesanan.kurir','pembeli.id_alamat','alamat.*','kota.*','provinsi.*',
        'produk.nama_produk','pemesanan.total_harga','produk.satuan', 
        )
        ->where('produk.id_mitra', session('id_mitra'))
        ->get();
        
        //dd($datas);
        return view('mitra.produk.kelolapemesananproduk', compact('datas'));
    }

    public function cetakpembayaranproduk($created_at)
    {
        
        // $datas = Pembayaran::all();
        $datas = DB::table('pembayaran')
        ->join('pemesanan', 'pembayaran.id_pemesanan', '=', 'pemesanan.id_pemesanan')
        ->join('pembeli', 'pemesanan.id_pembeli', '=', 'pembeli.id_pembeli')
        ->join('alamat', 'pembeli.id_alamat', '=', 'alamat.id_alamat')
        ->join('kota', 'alamat.id_kota', '=', 'kota.id_kota')
        ->join('provinsi', 'kota.id_provinsi', '=', 'provinsi.id_provinsi')
        ->join('pemesanan_barang', 'pemesanan_barang.id_pemesanan', '=', 'pemesanan.id_pemesanan')
        ->join('produk', 'pemesanan_barang.id_produk', '=', 'produk.id_produk')
        ->join('mitra', 'mitra.id_mitra', '=', 'produk.id_mitra')
        ->select('pembayaran.*', 'pemesanan_barang.qty','pembeli.nama_pembeli','pemesanan.tanggal','pemesanan.kurir','pembeli.id_alamat','alamat.*','kota.*','provinsi.*',
        'produk.nama_produk','pemesanan.total_harga',
        )
        ->where('produk.id_mitra', session('id_mitra'))
        ->get();
        //dd($datas);
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
