<?php

namespace App\Http\Controllers\API;

use DB;
use App\Pembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranApiController extends Controller
{
    public function get($id){
        $data = DB::table('pembayaran')
                    ->join('pemesanan', 'pembayaran.id_pemesanan', '=', 'pemesanan.id_pemesanan')
                    ->join('pemesanan_barang', 'pemesanan_barang.id_pemesanan', '=', 'pemesanan.id_pemesanan')
                    ->join('produk', 'pemesanan_barang.id_produk', '=', 'produk.id_produk')
                    ->select('pembayaran.status', 'pembayaran.no_resi',  'pemesanan.id_pemesanan', 
                        'pemesanan.id_pembeli', 'pemesanan_barang.subtotal', 
                        'pemesanan_barang.qty', 'produk.nama_produk', 'produk.foto'
                    )
                    ->where('pemesanan.id_pembeli', $id)
                    ->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
	$data = [
            'id_pemesanan' => $request->id_pemesanan,
            'foto' => $request->foto,
            'status' => 'Menunggu validasi'
        ];

        $create = Pembayaran::create($data);

        return response()->json([
            'error' => 0,
            'data' => $create,
            'messgae' => 'Data berhasil disimpan'
        ]);
    }

    public function uploadImage(Request $request)
    {
        if($request->hasFile('image')) {
            $name = time()."_".$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/foto_bukti'), $name);
        }
        return response()->json(['message' => 'Foto berhasil diupload']);

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $interval = Carbon\Carbon::now()->subHours(24);
        Pembayaran::where('created_at', '<', $interval)->where('foto', NULL)->delete();
    }
}
