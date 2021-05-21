<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Mitra;
use DB;
use App\PemesananAlat;
use App\PembayaranAlat;
use Session;
class PembayaranAlatController extends Controller
{
    public function pembayaranalat($id)
    {
    	$waktu = pembayaranalat::whereRaw('created_at < now() - interval 1 DAY')->update(
            [
                'status' => 'Ditolak'
            ]
        );
        $vendor = DB::table('pemesanan_alat')
       
        ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
        ->join('mitra','alat.id_mitra', '=', 'mitra.id_mitra')
        ->select('pemesanan_alat.*', 'alat.*', 'mitra.*')
        ->where('mitra.level', '=', 'Vendor')
        ->first();

        $datas = PemesananAlat::find($id);
        //  $vendor = PemesananAlat::where('')
        //  dd($datas);
    	return view('penyewaan.pembayaranAlat', compact('datas','waktu','vendor'));
    }

    // public function pembayaranalat($id)
    // {
    // 	$waktu = pembayaranalat::whereRaw('created_at < now() - interval 1 DAY')->update(
    //         [
    //             'status' => 'Ditolak'
    //         ]
    //     );
    //     $datas = DB::table('pemesanan_alat')
       
    //     ->join('alat', 'pemesanan_alat.id_alat', '=', 'alat.id_alat')
    //     ->join('mitra','alat.id_mitra', '=', 'mitra.id_mitra')
    //     ->select('pemesanan_alat.*', 'alat.*', 'mitra.*')
    //     ->where('mitra.level', '=', 'Vendor')
    //     ->get();

    //     //  $datas = PemesananAlat::find($id);
    //     //  $vendor = PemesananAlat::where('')
    //     //  dd($datas);
    // 	return view('penyewaan.pembayaranAlat', compact('datas','waktu'));
    // }
}
