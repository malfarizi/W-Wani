<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mitra;
use App\Alamat;
use App\Kota;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MitraController extends Controller
{

    public function registerMitra()
    {
       
        $kota = Kota::all();
         return view('registermitra', compact('kota'));
    }

    
	public function Postregister(Request $request )
    {
        //calon mitra, mitra
        $request->validate([
            'no_rek'    => 'required|numeric',
            'nama'      => 'required|regex:/^[a-zA-Z\s]*$/',
            'alamat_lengkap'    => 'required',
            'email'     => 'required|email',
            'no_telp'   => 'required|numeric',
            'foto'      => 'file|required|image:jpeg,jpg,png|max:2048',
            'id_kota'   => 'required',
            'nama_bank' =>  'required',
            'password' =>  'required',
        ],
        [
            'id_kota'               =>"Kota Tidak Boleh Kosong",
            'numeric'               => "Format Harus Berupa Angka",
            'nama.required'         => 'Nama Tidak Boleh Kosong',
            'alamat_lengkap.required'       => 'Alamat Tidak Boleh Kosong',
            'email.required'        => 'Email Tidak Boleh Kosong',
            'no_telp.required'    => 'No Ponsel Tidak Boleh Kosong',
            'foto.required'         => 'foto Tidak Boleh Kosong',
            'nama.regex'            => 'Format Nama Salah',
            'foto.uploaded'         => 'Ukuran File Melebihi Batas 2 MB',
            'foto.image'            => 'File Harus Berupa jpeg, jpg, png',
            'nama_bank'             => "Bank Tidak Boleh Kosong",
            'password'             => "Password Tidak Boleh Kosong",
            ]);
            
            
            $alamat = [
                'id_kota' => $request->id_kota,
                'alamat_lengkap' => $request->alamat
            ];
            
            $id_alamat =  Alamat::create($alamat);
        $status = 'Calon Mitra';
        $level = 'Mitra';
        $registermitra = [
            'nama_mitra' =>$request->nama_mitra,
            'email' =>$request->email,
            'password' =>$request->password, 
            'jk' =>$request->jk,
            'no_telp' =>$request->no_telp,
            'foto' =>$request->foto,
            'status' =>$status,
            'level' =>$level,
            'no_rek' =>$request->no_rek,
            'nama_rekening' =>$request->nama_rekening,
            'nama_bank' =>$request->nama_bank,
            'id_alamat' => $request->$id_alamat
        ];
        
        Mitra::create($registermitra);
        
    	return view('registerMitra')->back()->with('success', 'Data Berhasil Disimpan');
    }
    
    public function registerVendor()
    {
       
        $kota = Kota::all();
         return view('registervendor', compact('kota'));
    }

    public function PostregisterVendor(Request $request )
    {
        //calon mitra, mitra
        $request->validate([
            'no_rek'    => 'required|numeric',
            'nama'      => 'required|regex:/^[a-zA-Z\s]*$/',
            'alamat_lengkap'    => 'required',
            'email'     => 'required|email',
            'no_telp'   => 'required|numeric',
            'foto'      => 'file|required|image:jpeg,jpg,png|max:2048',
            'id_kota'   => 'required',
            'nama_bank' =>  'required',
            'password' =>  'required',
        ],
        [
            'id_kota'               =>"Kota Tidak Boleh Kosong",
            'numeric'               => "Format Harus Berupa Angka",
            'nama.required'         => 'Nama Tidak Boleh Kosong',
            'alamat_lengkap.required'       => 'Alamat Tidak Boleh Kosong',
            'email.required'        => 'Email Tidak Boleh Kosong',
            'no_telp.required'    => 'No Ponsel Tidak Boleh Kosong',
            'foto.required'         => 'foto Tidak Boleh Kosong',
            'nama.regex'            => 'Format Nama Salah',
            'foto.uploaded'         => 'Ukuran File Melebihi Batas 2 MB',
            'foto.image'            => 'File Harus Berupa jpeg, jpg, png',
            'nama_bank'             => "Bank Tidak Boleh Kosong",
            'password'             => "Password Tidak Boleh Kosong",
        ]);


        $alamat = [
            'id_kota' => $request->id_kota,
            'alamat_lengkap' => $request->alamat
        ];
        
        $id_alamat =  Alamat::create($alamat);
        $status = 'Calon Vendor';
        $level = 'Vendor';
        $registervendor = [
            'nama_mitra' =>$request->nama_mitra,
            'email' =>$request->email,
            'password' =>$request->password, 
            'jk' =>$request->jk,
            'no_telp' =>$request->no_telp,
            'foto' =>$request->foto,
            'status' =>$status,
            'level' =>$level,
            'no_rek' =>$request->no_rek,
            'nama_rekening' =>$request->nama_rekening,
            'nama_bank' =>$request->nama_bank,
            'id_alamat' => $request->$id_alamat
        ];

        Mitra::create($registervendor);

    	return view('registerVendor')->back()->with('success', 'Data Berhasil Disimpan');
    }

    public function calonmitra()
    {
         $datas = DB::table('mitra')
            ->join('alamat', 'alamat.id_alamat', '=', 'mitra.id_mitra')
            ->select('mitra.*','alamat.*')
            ->where('mitra.status', 'Belum Diterima')
            ->get();
    	return view('admin.mitra.calonmitra', compact('datas'));
    }

    public function mitra(){

        $datas = DB::table('mitra')
            ->join('alamat', 'alamat.id_alamat', '=', 'mitra.id_mitra')
            ->select('mitra.*','alamat.*')
            ->where('mitra.status', 'Diterima')
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
        $level = session('level');
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
            session()->put('level', $mitra->level);
            if($level == 'Vendor'){
                return redirect()->to('dashboardmitra');
            }
             elseif($level == 'Petani'){
                return redirect()->to('/');
            }
        }else{
            return redirect()->back()->withErrors(
                ['Email atau password anda salah']
            );
        }
        
    }
    
    public function logout(){
        auth()->guard('mitra')->logout();
        session()->flush();
        return redirect('/');
    }

    public function delete($id)
    {
        $data = Mitra::findOrFail($id);
        try {
            $data->delete();
            return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data Gagal Dihapus');
        }
    }
}
