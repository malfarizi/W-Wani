<?php

namespace App\Http\Controllers;

use App\Pencairan;
use Illuminate\Http\Request;

class PencairanController extends Controller
{
    
    public function index()
    {
       return view ('admin.saldo');
    }

  
}
