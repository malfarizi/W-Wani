<?php

namespace App\Http\Controllers\API;

use App\Pembayaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembayaranApiController extends Controller
{
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $interval = Carbon\Carbon::now()->subHours(24);
        Pembayaran::where('created_at', '<', $interval)->where('foto', NULL)->delete();
    }
}
