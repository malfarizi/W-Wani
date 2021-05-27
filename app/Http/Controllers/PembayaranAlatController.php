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

class PembayaranAlatController extends Controller
{
    public function pembayaranalat($id)
    {
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

        $datas = PemesananAlat::find($id);
          
    	return view('penyewaan.pembayaranAlat', compact('datas','waktu', 'vendor'));
    }

    public function aksibayaralat(Request $request){

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
        return redirect('pemesananmitra');
    }

}
