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


Route::get('rajaongkir', 'RajaOngkirController@apiRajaOngkir');
Route::get('test', 'DummyController@test');

//======================Admin===================
Route::get('loginadmin','AdminController@loginadmin');
Route::post('loginAdminPost', 'AdminController@loginAdminPost');
Route::get('logoutadmin', 'AdminController@logout');
Route::get('admin', 'AdminController@admin');
Route::put('editAdmin/{id}', 'AdminController@update');
//======================Login Mitra===================
Route::get('loginmitra','MitraController@loginmitra');
Route::post('loginMitraPost', 'MitraController@loginMitraPost');
Route::get('logoutmitra', 'MitraController@logout');
//======================Pendaftaran Mitra=================== 
Route::get('register','MitraController@pendaftaranmitra');
//======================Verifikasi Mitra===================
Route::get('dashboardmitra','DashboardController@dashboardmitra');
Route::get('mitra','MitraController@mitra');
Route::put('editMitra/{id}','MitraController@update');

Route::get('calonmitra','MitraController@calonmitra');
// Route::put('editCalonmitra/{id}','MitraController@update');
Route::delete('deleteMitra/{id}','MitraController@delete');

//====================== Kategori ===================
Route::get('kategori','KategoriController@index');
Route::post('addKategori', 'KategoriController@create');
Route::put('editKategori/{id}','KategoriController@update');
Route::delete('deleteKategori/{id}','KategoriController@delete');


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
