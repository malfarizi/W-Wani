<?php

namespace App\Http\Controllers\API;

use App\Pemesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PemesananApiController extends Controller
{

    public function store(Request $request)
    {
	$data = [
            'id_pembeli' => $request->id_pembeli,
            'etd' => $request->etd,
            'service' => 'REG',
            'total_harga' => $request->total_harga,  
            'alamat_lengkap' => $request->alamat_lengkap,
            'kurir' => 'jne',
            'tanggal' => date('Y-m-d'),
        ];

        $create = Pemesanan::create($data);

	return response()->json(['error' => 0, 'id_pemesanan' => $create->id_pemesanan, 'message' => 'Data berhasil disimpan']);
    }
}
