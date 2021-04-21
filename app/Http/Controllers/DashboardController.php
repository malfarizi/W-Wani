<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
        public function dashboard()
    {
    	return view('admin.dashboard');
   
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
