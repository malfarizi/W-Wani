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
use PDF;

class PembayaranAlatController extends Controller
{
    public function pembayaranalat($id_pemesanan_alat)
    {
        $waktupemesanan = PemesananAlat::whereRaw('created_at < now() - interval 1 day')->delete();
    	$waktu = pembayaranalat::whereRaw('created_at < now() - interval 1 DAY')->update(
            [
                'status_pembayaran' => 'Ditolak'
            ] 
        );
        $vendor = DB::table('pemesanan_alat')
        ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
        ->join('mitra','alat.id_mitra', '=', 'mitra.id_mitra')
        ->select('pemesanan_alat.*', 'alat.*', 'mitra.*')
        ->where('mitra.level', '=', 'Vendor')
        ->first();

        $datas = PemesananAlat::find($id_pemesanan_alat);
          
          Carbon::setLocale('id');
        $besok = $datas->created_at->addDays(1)->format('l, d F Y H:i');
    	return view('penyewaan.pembayaranAlat', compact('datas','besok', 'vendor', 'waktu', 'waktupemesanan'));
    }

    public function cetakpembayaranalat($tanggal_bukti)
    { 
     
        $datas = DB::table('pembayaran_alat')
        ->join('pemesanan_alat', 'pemesanan_alat.id_pemesanan_alat', '=', 'pembayaran_alat.id_pemesanan_alat')
        ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
        ->join('mitra','pemesanan_alat.id_mitra', '=', 'mitra.id_mitra')
        ->select('pemesanan_alat.*','pembayaran_alat.*', 'alat.nama_alat', 'mitra.nama_mitra')
        ->where('alat.id_mitra', session('id_mitra'))
        ->where('pembayaran_alat.status_pembayaran', 'Selesai')
        ->where('pembayaran_alat.tanggal_bukti', $tanggal_bukti)
        ->get();

        $pdf = PDF::loadview('mitra.alat_tani.laporanalattani',['datas'=>$datas])->setPaper('a4', 'landscape');
                // return $pdf->download('laporan-pembayaranalat.pdf');
                return $pdf->stream();
    }
    public function cari(Request $request)
    {
        Carbon::setLocale('id');

        $query = $request->get('q');
        $datas = PemesananAlat::find($query);

        if (empty($datas)) {
            return redirect('pemesananmitra')->with('success','Nomor Pemesanan tidak ditemukan');
        }else{

            $waktu = pembayaranalat::whereRaw('created_at < now() - interval 1 DAY')->update(
                [
                    'status_pembayaran' => 'Ditolak'
                ] 
            );
            $vendor = DB::table('pemesanan_alat')
            ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
            ->join('mitra','alat.id_mitra', '=', 'mitra.id_mitra')
            ->select('pemesanan_alat.*', 'alat.*', 'mitra.*')
            ->where('mitra.level', '=', 'Vendor')
            ->first();
              
             
            $besok = $datas->created_at->addDays(1)->format('l, d F Y H:i');
            return view('penyewaan.pembayaranAlat', compact('datas','besok', 'vendor'));
        }
    }

    public function aksibayaralat(Request $request){

        $request->validate([
            'foto_bukti'      => 'required|file|image|mimes:jpeg,png,jpg|max:2048', 
            'id_pemesanan_alat'           => 'required|unique:pembayaran_alat',
            
        ],
        [
            
            
            'id_pemesanan_alat.unique'           => 'Sudah melakukan transaksi',
            'foto_bukti.required'             => 'Foto bukti harus diisi',
            'mimes'                           => 'Upload berupa gambar'
        
        ]);

        $date = Carbon::now();

        $data = new pembayaranalat();
        $data->id_pemesanan_alat = $request->id_pemesanan_alat;
        $data->tanggal_bukti = $date;
        $data->status_pembayaran = $request->status_pembayaran;

        $image      = $request->file('foto_bukti');
        $imageName  = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images/foto_bukti/'), $imageName);
        $data->foto_bukti = $imageName;
    
        $data->save();
        // dd($data);
        return redirect('pemesananmitra')->with('success', 'Data berhasil ditambah');
    }

}
