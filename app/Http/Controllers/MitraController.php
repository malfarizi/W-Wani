<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mitra;
use App\Alamat;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MitraController extends Controller
{
	public function register()
    {
    	return view('pendaftaranmitra');
    }

    public function calonmitra()
    {
         $datas = DB::table('mitra')
            ->join('alamat', 'alamat.id_alamat', '=', 'mitra.id_mitra')
            ->select('mitra.*','alamat.*')
            ->where('mitra.level', 'Calon Mitra')
            ->get();
    	return view('admin.mitra.calonmitra', compact('datas'));
    }

    public function mitra(){

        $datas = DB::table('mitra')
            ->join('alamat', 'alamat.id_alamat', '=', 'mitra.id_mitra')
            ->select('mitra.*','alamat.*')
            ->where('mitra.level', 'Mitra')
            ->get();
    
        return view('admin.mitra.mitra', compact('datas'));
    }

     public function update(Request $request, $id)
    {

        $data = $request->only('level','status');
        Mitra::whereIdMitra($id)->update($data);
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }

    public function loginmitra()
    {
    	return view('loginmitra');
    }

    public function loginMitraPost(Request $request){
        $auth = auth()->guard('mitra');

        $credentials = $request->only('email', 'password');

        $validator = Validator::make($request->all(),
            [
                'email'  => 'required|string|exists:admins',
                'password'  => 'required|string',
            ], 
            [
                'email.exists'    => 'Akun tidak terdaftar',   
                'email.required'  => 'Email tidak boleh kosong',
                'password.required'  => 'Password tidak boleh kosong'
            ],
        );

        if ($auth->attempt($credentials)) {
            $mitra = Mitra::where('email', $request->email)->first();
            session()->put('mitra', $mitra);
            session()->put('id_mitra', $mitra->id_mitra);
            session()->put('nama_mitra', $mitra->nama_mitra);
            return redirect()->intended('dashboardmitra');
        }else{
            return redirect()->back()->withErrors(
                ['Email atau password anda salah']
            );
        }
    }

    public function logout(){
        auth()->guard('mitra')->logout();
        session()->flush();
        return redirect('loginmitra');
    }
}
