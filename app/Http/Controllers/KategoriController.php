<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
    	return view('admin.kategori.kategori');
    }
}
