<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mitra;
use DB;

class MitraController extends Controller
{
	public function pendaftaranmitra()
    {
    	return view('pendaftaranmitra');
    }

    public function calonmitra()
    {
    	return view('admin.mitra.calonmitra');
    }
     public function mitra()
    {
    	return view('admin.mitra.mitra');
    }
}
