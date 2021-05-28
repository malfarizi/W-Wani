<?php

namespace App\Http\Controllers\API;

use App\DetailKeranjang;
use App\PemesananBarang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemesananBarangApiController extends Controller
{
    public function create($id)
    {
        $state = ['id_keranjang', $id];
        $datas = DetailKeranjang::where($state)->get();
        foreach ($datas as $data) {
            $create = PemesananBarang::create([
                'qty'           => $data->qty,
                'subtotal'      => $data->subtotal,
                'id_produk'     => $data->id_produk, 
                'id_keranjang'  => $data->id_keranjang,
            ]);
            //dd($create);
        }
        DetailKeranjang::where($state)->delete();
        return response()->json(PemesananBarang::where($state)->get());
    }
}
