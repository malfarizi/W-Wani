<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KeranjangApiController extends Controller
{
    public function store(Request $request)
    {
        $create = App\Keranjang::create($request->only('id_pembeli'));
        return response()->json($create);
    }

    public function destroy($id)
    {
        //
    }
}
