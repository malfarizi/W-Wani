<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Mitra;
use App\Alat;

use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $trm = Mitra::where('status','Diterima')->count();
        $blm = Mitra::where('status','Belum Diterima')->count();
    	return view('admin.dashboard', compact('trm','blm'));
   
    }
     public function dashboardmitra()
    {
       
    	return view('mitra.dashboardmitra');
   
    }
    public function admin()
    {
    	return view('admin.admin');
    }
}
