<?php

namespace App\Http\Controllers\API;

use App\DetailKeranjang;
use App\PemesananBarang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemesananBarangApiController extends Controller
{
    public function create(Request $request)
    {
        $state = ['id_keranjang', $request->id_keranjang];
        $datas = DetailKeranjang::where('id_keranjang', $request->id_keranjang)->get();
        foreach ($datas as $data) {
            $create = PemesananBarang::create([
                'qty'           => $data->qty,
                'subtotal'      => $data->subtotal,
                'id_produk'     => $data->id_produk, 
                'id_pemesanan'  => $request->id_pemesanan,
            ]);
        }
        DetailKeranjang::where('id_keranjang', $request->id_keranjang)->delete();
	
        return response()->json(PemesananBarang::where('id_pemesanan', $request->id_pemesanan)->get());
    }
}
