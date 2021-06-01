<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriApiController extends Controller
{
    public function getAll()
    {
        return response()->json(\App\Kategori::all());
    }
}
