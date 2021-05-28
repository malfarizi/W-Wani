<?php

namespace App\Http\Controllers\API;

use App\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukApiController extends Controller
{
    public function getAll()
    {
	    $data = Produk::with('mitra.alamat', 'kategori')->get();
    	return response()->json($data);    
    }
    public function getByKategori($id)
    {
	    $data = Produk::whereIdKategori($id)
                    ->with('mitra.alamat', 'kategori')
                    ->get();
                    
        return response()->json($data);
    }
}
