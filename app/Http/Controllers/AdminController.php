<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login(Request $request){
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
            return redirect()->intended('dashboard');
        }else{
            return redirect()->back()->withErrors(
                ['Email atau password anda salah']
            );
        }
    }

    public function update(Request $request, $id){
        $data = $request->only('foto', 'no_telp');
        Admin::where('id_admin', $id)->update('data');
        return redirect()->back();
    }

    public function logout(){
        auth()->guard('admin')->logout();
        session()->flush();
        return redirect()->route('login');
    }

    public function admin()
    {
    	return view('admin.admin');
    }
    //
}
