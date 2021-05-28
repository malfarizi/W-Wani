<?php

namespace App\Http\Controllers\API;

use App\DetailKeranjang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailKeranjangApiController extends Controller
{
    public function store(Request $request)
    {
        $create = DetailKeranjang::create([
            'qty'           => $request->qty,
            'subtotal'      => $request->subtotal,
            'id_produk'     => $request->id_produk, 
            'id_keranjang'  => $request->id_keranjang,
        ]);
        return response()->json($create);
    }

    public function getByUser($id)
    {
        $data = DetailKeranjang::where('id_keranjang', $id)
                    ->with('produk')
                    ->get();
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $data = DetailKeranjang::findOrFail($id);
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
