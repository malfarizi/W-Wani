<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Mitra;
use DB;
use App\PembayaranAlat;
use Session;
class PemesananAlatController extends Controller
{

    public function alattani_list()
    {
    	$datas = Alat::all();

    	
    	return view('penyewaan.alattani-list', compact('datas'));
    }
    public function index($id_alat)
    {
    	$datas = Alat::find($id_alat);
        $mitra = DB::table('mitra')
        ->join('alamat', 'alamat.id_alamat', '=', 'mitra.id_alamat')
        ->select('mitra.*','alamat.*')
        ->where('mitra.id_mitra', session('id_mitra'))
        ->first();
    	
    	return view('penyewaan.formulirsewaalat', compact('datas', 'mitra'));
    }


     public function pemesananalat_diterima()
    {
        $datas = DB::table('pembayaran_alat')
            ->join('pemesanan_alat', 'pemesanan_alat.id_pemesanan_alat', '=', 'pembayaran_alat.id_pemesanan_alat')
            ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
            ->join('mitra','pemesanan_alat.id_mitra', '=', 'mitra.id_mitra')
            ->select('pemesanan_alat.*','pembayaran_alat.*', 'alat.*', 'mitra.*')
            ->where('alat.id_mitra', session('id_mitra'))
            ->where('pembayaran_alat.status', 'Diterima')
            ->get();

            
        
        return view('mitra.alat_tani.kelolapemesananalat',compact('datas'));
    }

    public function kelolapemesananalat()
    {
    	$datas = DB::table('pembayaran_alat')
    		->join('pemesanan_alat', 'pemesanan_alat.id_pemesanan_alat', '=', 'pembayaran_alat.id_pemesanan_alat')
            ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
            ->join('mitra','pemesanan_alat.id_mitra', '=', 'mitra.id_mitra')
    		->select('pemesanan_alat.*','pembayaran_alat.*', 'alat.*', 'mitra.*')
    		->where('alat.id_mitra', session('id_mitra'))
            ->where('pembayaran_alat.status', 'Belum Diterima')
    		->get();
        
    	return view('mitra.alat_tani.kelolapemesananalat',compact('datas'));
    }

   public function update(Request $request, $id)
    {
        $request->validate([
            'status'         => 'required|string',
        ],
        [
            'status.required'            => 'Status harus dipilih',
            
        ]);

        $data = $request->only('status');
        PembayaranAlat::whereIdPembayaranAlat($id)->update($data);
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = PembayaranAlat::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
