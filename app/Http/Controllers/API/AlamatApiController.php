<?php

namespace App\Http\Controllers\API;

use App\Alamat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlamatApiController extends Controller
{
    public function store(Request $request)
    {
        $data   = $request->only('id_kota', 'alamat_lengkap');
        $create = Alamat::create($data);
        
	    if($create){
	        return response()->json([
                'erorr'     => 0,
                'data'      => $create,
                'message'   => 'Data berhasil disimpan'
            ]);
	    } 
    }

    public function show($id)
    {
        return response()->json(Alamat::find($id)->first());
    }

    public function update(Request $request, $id)
    {
        $data   = $request->only('id_kota', 'alamat_lengkap');
	    $alamat = Alamat::with('kota')->where('id_alamat', $id);
        $update = $alamat->update($data);
        if($update){
            return response()->json([
                'error'   => 0, 
		        'data'    => Alamat::where('id_alamat', $id)->with('kota')->first(),
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }
}
