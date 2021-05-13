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
            return response()->json($create);
        } 
    }

    public function show($id)
    {
        return response()->json(Alamat::where('id_pembeli', $id)->first());
    }

    public function update(Request $request, $id)
    {
        $data   = $request->only('id_kota', 'alamat_lengkap');
        $update = Alamat::where('id_alamat')->update($data);
        if($update){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }
}
