<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
        public function loginadmin()
    {
    	return view('loginadmin');
    }
        public function loginmitra()
    {
    	return view('loginmitra');
    }
}
