<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function admin(){
        $datas = Admin::where('email', session('email'))->get();
    	return view('admin.admin', compact('datas'));
    }


    public function loginadmin(){
        return view('loginadmin');
    }

    public function loginAdminPost(Request $request){
        $auth = auth()->guard('admin');

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
            $admin = Admin::where('email', $request->email)->first();
            session()->put('admin', $admin);
            session()->put('id', $admin->id);
            session()->put('email', $admin->email);
            session()->put('nama_admin', $admin->nama_admin);
            return redirect('dashboard')->with('success', 'Selamat Datang');
        }else{
            return redirect()->back()->withErrors(
                ['Email atau password anda salah']
            );
        }
    }

    public function update(Request $request, $id){
        
        $data = Admin::findOrFail($id);
        $data->no_telp = $request->input('no_telp');
        $data->jk = $request->input('jk');
        $data->nama_admin = $request->input('nama_admin');
        $data->save();
        return redirect()->back()->with('success', 'Data berhasil diubah');
    }

    public function logout(){
        auth()->guard('admin')->logout();
        session()->flush();
        return redirect('loginadmin');
    }
}
