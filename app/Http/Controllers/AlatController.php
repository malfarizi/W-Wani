<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
    	return view('mitra.alat_tani.alattani');
    }
    public function kelolapemesananalat()
    {
    	return view('mitra.alat_tani.kelolapemesananalat');
    }
}
