<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranAlatController extends Controller
{
    public function postMitra()
    {
        return view('mitra.alat_tani.pembayaranAlat');
    }
}
