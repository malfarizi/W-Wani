<?php

namespace App\Http\Controllers\API;

use App\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukApiController extends Controller
{
    public function getAll()
    {
	    $data = Produk::with('mitra.alamat.kota', 'kategori')->get();
    	return response()->json($data);    
    }
    
    public function getByKategori($id)
    {
	    $data = Produk::whereIdKategori($id)
                    ->with('mitra.alamat.kota', 'kategori')
                    ->get();
                    
        return response()->json($data);
    }

    public function update(Request $request, $id){
        $data   = Produk::find($id);
	    $newQty =  $data->qty - $request->qty;
        $update = $data->update(['qty' => $newQty]);
	    if($update){
            return response()->json([
                'error' => 0, 
                'data' => $data->first(),
                'message' => 'Data berhasil diubah'
            ]);
        }
    }
}
