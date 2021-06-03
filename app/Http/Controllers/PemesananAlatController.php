<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Mitra;
use DB;
use App\PemesananAlat;
use App\PembayaranAlat;
use Session;
use Carbon\Carbon;
class PemesananAlatController extends Controller
{

    public function alattani_list()
    {
    	$datas = DB::table('alat')
        ->join('mitra', 'mitra.id_mitra', '=', 'alat.id_mitra')
        ->select('mitra.*','alat.*')
        ->where('alat.kategori', 'Perontok Padi')
        ->get();

    	return view('penyewaan.alattani-list', compact('datas'));
    }

    public function alattani_traktor()
    {
    	$datas = DB::table('alat')
        ->join('mitra', 'mitra.id_mitra', '=', 'alat.id_mitra')
        ->select('mitra.*','alat.*')
        ->where('alat.kategori', 'Traktor')
        ->get();

    	return view('penyewaan.alattani-traktor', compact('datas'));
    }

    public function index($id_alat)
    {
        $waktupemesanan = PemesananAlat::whereRaw('created_at < now() - interval 1 day')->delete();
        // $tgldisable = DB::table('pemesanan_alat')->where('id_alat', $id_alat)->pluck('tanggal');
    	
        $tgl = array(
    		0=>"2020-06-25",
    		1=>"2020-06-18",
    		2=>"2020-06-30",
    	); 

    	$datas = Alat::find($id_alat);
        $mitra = DB::table('mitra')
        ->join('alamat', 'alamat.id_alamat', '=', 'mitra.id_alamat')
        ->select('mitra.*','alamat.*')
        ->where('mitra.id_mitra', session('id_mitra'))
        ->first();
    	
    	return view('penyewaan.formulirsewaalat', compact('datas', 'mitra','tgl','waktupemesanan'));
    }

    public function listpenyewaanPetani()
    {
        //pembayaran selesai, Menunggu Pembayaran, Ditolak
        $datas = DB::table('pembayaran_alat')
        ->join('pemesanan_alat', 'pemesanan_alat.id_pemesanan_alat', '=', 'pembayaran_alat.id_pemesanan_alat')
        ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
        ->join('mitra','pemesanan_alat.id_mitra', '=', 'mitra.id_mitra')
        ->select('pemesanan_alat.*','pembayaran_alat.*', 'alat.nama_alat', 'mitra.nama_mitra')
        ->where('mitra.id_mitra', session('id_mitra'))
        ->get();
        
            return view('penyewaan.penyewaan', compact('datas'));
    }
    public function pemesananalat_petani()
    {
        $datas = DB::table('pembayaran_alat')
        ->join('pemesanan_alat', 'pemesanan_alat.id_pemesanan_alat', '=', 'pembayaran_alat.id_pemesanan_alat')
        ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
        ->join('mitra','pemesanan_alat.id_mitra', '=', 'mitra.id_mitra')
        ->select('pemesanan_alat.*','pembayaran_alat.*', 'alat.nama_alat', 'mitra.nama_mitra')
        ->where('mitra.id_mitra', session('id_mitra'))
        
        ->get();

        return view('penyewaan.pemesananalat_petani',compact('datas'));
    }

     public function pemesananalat_diterima()
    { 
        $datas = DB::table('pembayaran_alat')
        ->join('pemesanan_alat', 'pemesanan_alat.id_pemesanan_alat', '=', 'pembayaran_alat.id_pemesanan_alat')
        ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
        ->join('mitra','pemesanan_alat.id_mitra', '=', 'mitra.id_mitra')
        ->select('pemesanan_alat.*','pembayaran_alat.*', 'alat.nama_alat', 'mitra.nama_mitra')
        ->where('alat.id_mitra', session('id_mitra'))
        ->where('pembayaran_alat.status_pembayaran', 'Diterima')
        ->get();

        return view('mitra.alat_tani.pemesananalat_diterima',compact('datas'));
    }

    public function pemesananalat_selesai()
    { 
        $datas = DB::table('pembayaran_alat')
        ->join('pemesanan_alat', 'pemesanan_alat.id_pemesanan_alat', '=', 'pembayaran_alat.id_pemesanan_alat')
        ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
        ->join('mitra','pemesanan_alat.id_mitra', '=', 'mitra.id_mitra')
        ->select('pemesanan_alat.*','pembayaran_alat.*', 'alat.nama_alat', 'mitra.nama_mitra')
        ->where('alat.id_mitra', session('id_mitra'))
        ->where('pembayaran_alat.status_pembayaran', 'Selesai')
        ->get();

        return view('mitra.alat_tani.pemesananalat_selesai',compact('datas'));
    }

    public function kelolapemesananalat()
    {
    	$datas = DB::table('pembayaran_alat')
        ->join('pemesanan_alat', 'pemesanan_alat.id_pemesanan_alat', '=', 'pembayaran_alat.id_pemesanan_alat')
        ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
        ->join('mitra','pemesanan_alat.id_mitra', '=', 'mitra.id_mitra') 
        ->select('pemesanan_alat.*','pembayaran_alat.*', 'alat.nama_alat', 'mitra.nama_mitra')
        ->where('alat.id_mitra', session('id_mitra'))
        ->where('pembayaran_alat.status_pembayaran', 'Menunggu Pembayaran Diterima')
        ->get();
        
    	return view('mitra.alat_tani.kelolapemesananalat',compact('datas'));
    }

    public function aksipesanalat(Request $request) {
        
        $request->validate([
            'luas_tanah'      => 'required', 
            'tanggal_sewa'           => 'required',
            
        ],
        [
            
            
            'luas_tanah.required'         => 'Luas tanah harus diisi',
            'tanggal_sewa.required'             => 'Tanggal harus diisi',
        
        ]);

        $data = new PemesananAlat();
        $data->id_pemesanan_alat = $request->id_pemesanan_alat;
        $data->tanggal_sewa = $request->tanggal_sewa;
        $data->tanggal_kembali = $request->tanggal_kembali;
        $data->alamat_lengkap = $request->alamat_lengkap;
        $data->luas_tanah = $request->luas_tanah;
        $data->id_mitra = $request->id_mitra;
        $data->id_alat = $request->id_alat;
          
        $hitung =  $data->Alat->harga * $data->luas_tanah;
        $interval = Carbon::parse($request->tanggal_sewa)->diffInDays($request->tanggal_kembali);
        $jumlah = $hitung * $interval;
        $data->total_harga = $jumlah;
        $data->save();
        
        return redirect('pembayaranAlat/'.$request->id_pemesanan_alat.'')->with('alert-success','Data berhasil disimpan, Silahkan Melakukan Pembayaran');
    }
    public function aksibayar($id)
    {
        $datas = PemesananAlat::find($id);
        return redirect('pembayaranAlat/'.$data->id_pemesanan_alat.'')->with('alert-success','Data berhasil disimpan, Silahkan Melakukan Pembayaran');
    }

   
   public function update(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran'         => 'required|string',
        ],
        [
            'status_pembayaran.required'            => 'Status Pembayaran harus dipilih',
            
        ]);
 
        $data = PembayaranAlat::findOrFail($id);
       
        $data->status_pembayaran = $request->input('status_pembayaran');
       
        $data->save();
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
