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
 
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','LandingPageController@index');
Route::get('daftar','LandingPageController@daftar');



Route::get('dashboard','DashboardController@dashboard');


Route::get('rajaongkir', 'RajaOngkirController@apiRajaOngkir');

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
Route::get('registerMitra','MitraController@registerMitra');
Route::post('registerPost','MitraController@Postregister');
Route::get('registerVendor','MitraController@registerVendor');
Route::post('registerPostVendor','MitraController@Postregister');
//======================Verifikasi Mitra===================
Route::get('dashboardmitra','DashboardController@dashboardmitra');
Route::get('mitra','MitraController@mitra');
Route::get('calonmitra','MitraController@calonmitra');
Route::put('editMitra/{id}','MitraController@update');
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

//====================== Produk =========================
Route::get('produk_admin','ProdukController@produk_admin');
Route::get('produk','ProdukController@index');
Route::post('addProduk', 'ProdukController@create');
Route::put('editProduk/{id}','ProdukController@update');
Route::delete('deleteProduk/{id}','ProdukController@delete');
//====================== Kelola Pemesanan Alat Tani=========================
Route::get('kelolapemesananalat','PemesananAlatController@kelolapemesananalat');
Route::get('pemesananalat-diterima','PemesananAlatController@pemesananalat_diterima');
Route::put('editPemesananAlat/{id}','PemesananAlatController@update');
Route::delete('deletePemesananAlat/{id}','PemesananAlatController@delete');


Route::get('alattani-list','PemesananAlatController@alattani_list');
Route::get('FormulirSewaAlat/{id}','PemesananAlatController@index');
