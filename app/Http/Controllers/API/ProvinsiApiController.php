<?php

namespace App\Http\Controllers\API;

use App\Provinsi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProvinsiApiController extends Controller
{
    public function getAll()
    {
        return response()->json(Provinsi::all());
    }
}
