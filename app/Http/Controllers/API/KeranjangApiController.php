<?php

namespace App\Http\Controllers\API;

use App\Keranjang;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeranjangApiController extends Controller
{
    public function store(Request $request)
    {
        $create = Keranjang::create($request->only('id_pembeli'));
        return response()->json($create);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
