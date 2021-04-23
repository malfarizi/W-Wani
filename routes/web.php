<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard','DashboardController@dashboard');
Route::get('dashboardmitra','DashboardController@dashboardmitra');

Route::get('rajaongkir', 'RajaOngkirController@apiRajaOngkir');

//======================Login Admin===================
Route::get('loginadmin','LoginController@loginadmin')->name('login');
//======================Login Mitra===================
Route::get('loginmitra','LoginController@loginmitra');

//======================Pendaftaran Mitra=================== 
Route::get('pendaftaranmitra','MitraController@pendaftaranmitra');
//======================Verifikasi Mitra===================
Route::get('mitra','MitraController@mitra');
Route::get('calonmitra','MitraController@calonmitra');
Route::post('addCalonmitra', 'MitraController@create');
Route::put('editCalonmitra/{id}','MitraController@update');
Route::delete('deleteCalonmitra/{id}','MitraController@delete');

//====================== Kategori ===================
Route::get('kategori','KategoriController@index');
Route::post('addkategori', 'KategoriController@create');
Route::put('editKategori/{id}','KategoriController@update');
Route::delete('deleteKategori/{id}','KategoriController@delete');

//======================Crud Admin ===================
Route::get('admin','AdminController@admin');
Route::post('loginAdmin', 'AdminController@login');
Route::get('logout', 'AdminController@logout');

Route::middleware('auth:admin')->group(function(){
    
});

//====================== Penyewaan Alat ===================

//====================== Alat Tani=========================
Route::get('alattani','AlatController@index');
Route::post('addAlattani', 'AlatController@create');
Route::put('editAlattani/{id}','AlatController@update');
Route::delete('deleteAlattani/{id}','AlatController@delete');

//====================== Kelola Pemesanan Alat Tani=========================
Route::get('kelolapemesananalat','AlatController@kelolapemesananalat');
