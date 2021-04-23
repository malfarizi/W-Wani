<?php

namespace App\Http\Controllers\API;

use App\Kota;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KotaApiController extends Controller
{
    public function getAll()
    {
        return response()->json(Kota::all());
    }

    public function getById($id)
    {
        return response()->json(Kota::where('id_provinsi', $id)->get());
    }
}
