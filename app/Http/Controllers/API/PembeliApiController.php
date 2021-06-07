<?php

namespace App\Http\Controllers\API;

use App\Pembeli;
use App\Keranjang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembeliApiController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $auth = auth()->guard('pembeli');
        $credentials = [
            'email'  => $email,
            'password'  => $password
        ];

        if($auth->attempt($credentials)) {
            $pembeli   = Pembeli::with('alamat.kota.provinsi')->where('email', $email)->first();
	    $keranjang = Keranjang::whereIdPembeli($pembeli->id_pembeli)->value('id_keranjang');

            return response()->json([
                'error'   => 0,
                'message'   => 'Login berhasil',
		'user'      => $pembeli,
		'keranjang' => $keranjang
            ]);
        }
        else {
            return response()->json([
                'error'   => 1, 
                'message' => 'Gagal Login'
            ]);
        }
    }

    public function store(Request $request)
    {
        $data = [ 
            'nama_pembeli'  => $request->nama_pembeli,
            'email'         => $request->email,
            'password'      => $request->password, 
            'jk'            => $request->jk,
            'no_telp'       => $request->no_telp,
            'foto'          => '',
            'id_alamat'     => $request->id_alamat
        ];
        
        $create = Pembeli::create($data);
        
        if($create){
            return response()->json([
		'message' => 'Data berhasil disimpan', 
		'data' => $create
	    ]);
        }
    }

    public function show($id){
        return response()->json(Pembeli::where('id_pembeli', $id)->first());
    }

    public function update(Request $request, $id)
    {
        $data = [ 
            'no_telp'       => $request->no_telp,
            'foto'          => $request->foto,
            'id_alamat'     => $request->id_alamat
        ];
        
        $update = Pembeli::where('id_pembeli', $id)->update($data);
        
        if($update){
            return response()->json([
                'error'   => 0, 
                'message' => 'Data berhasil disimpan'
            ]);
        }
    }
}
