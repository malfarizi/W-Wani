<?php

namespace App\Http\Controllers\API;

use App\Produk;
use App\DetailKeranjang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailKeranjangApiController extends Controller
{
    public function store(Request $request)
    {
        $data  = DetailKeranjang::where($request->only('id_produk'))
                                ->where($request->only('id_keranjang'));
        if($data->exists()){
            $newQty = $data->value('qty') + $request->qty;
            $update = $data->update(['qty' => $newQty]);
            return response()->json([
                'error' => 0,
                'message' => 'Data berhasil disimpan'
            ]);
            
        }else{
            $create = DetailKeranjang::create([
                'qty'           => $request->qty,
                'subtotal'      => $request->subtotal,
                'id_produk'     => $request->id_produk, 
                'id_keranjang'  => $request->id_keranjang,
            ]);
            return response()->json([
                'error' => 0,
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }

    public function getByUser($id)
    {
        $data = DetailKeranjang::where('id_keranjang', $id)
                    ->with('produk.mitra.alamat.kota')
                    ->get();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $data = DetailKeranjang::find($id);
	$produk = Produk::find($data->id_produk);
	$produk->update(['qty' => $produk->qty + $data->qty]);

        try{
            $data->delete();
            return response()->json([
                'error'     => 0,
                'message'   => 'Data berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error'     => 1,
                'message'   => 'Data gagal dihapus'
            ]); 
        }
    }
}
