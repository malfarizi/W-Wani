<?php

namespace App\Http\Controllers;

use App\Pencairan;
use App\Pembayaran;
use Illuminate\Http\Request;

class PencairanController extends Controller
{
    
    public function index()
    {
        $datas = Pencairan::all();
        return view ('admin.saldo');
    }

    public function store(Request $request)
    {
        # code...
    }

    public function update()
    {
        # code...
    }
  
}
