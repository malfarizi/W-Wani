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

Route::get('/','LandingPageController@index')->name('landingpage');
Route::get('daftar','LandingPageController@daftar');




Route::get('rajaongkir', 'RajaOngkirController@apiRajaOngkir');
Route::get('test', 'DummyController@test');

//======================Admin===================
Route::get('loginadmin','AdminController@loginadmin');
Route::post('loginAdminPost', 'AdminController@loginAdminPost');
Route::get('logoutadmin', 'AdminController@logout');

Route::put('editAdmin/{id}', 'AdminController@update');

//======================Saldo===================
Route::get('pencairan-saldo','PencairanController@index');
Route::get('pencairan','PencairanController@create');
Route::post('Aksipencairan','PencairanController@store');
Route::put('editpencairan/{id}','PencairanController@update');

//======================Login Mitra===================
Route::get('loginmitra','MitraController@loginmitra');
Route::post('loginMitraPost', 'MitraController@loginMitraPost');
Route::get('logoutmitra', 'MitraController@logout');

//======================Pendaftaran Mitra=================== 
Route::get('registerMitra','MitraController@registerMitra');
Route::post('registerPost','MitraController@registerPost');
Route::get('registerVendor','MitraController@registerVendor');
Route::post('registerPostVendor','MitraController@PostregisterVendor');
//======================Verifikasi Mitra===================

Route::get('mitra','MitraController@mitra');
Route::get('calonmitra','MitraController@calonmitra');
Route::put('editMitra/{id}','MitraController@update');  
Route::delete('deleteMitra/{id}','MitraController@delete');




Route::middleware('auth:admin')->group(function(){
    Route::get('dashboard','DashboardController@dashboard');
    Route::get('admin', 'AdminController@admin');
    Route::get('kategori','KategoriController@index');
    Route::post('addKategori', 'KategoriController@create');
    Route::put('editKategori/{id}','KategoriController@update');
    Route::delete('deleteKategori/{id}','KategoriController@delete'); 
});

Route::middleware('auth:mitra')->group(function(){
    Route::get('dashboardmitra','DashboardController@dashboardmitra');
    Route::get('profilmitra','MitraController@profilmitra');
    Route::put('editProfilmitra/{id}','MitraController@updateprofil');
    Route::get('alattani','AlatController@index');
    Route::post('addAlattani', 'AlatController@create');
    Route::put('editAlattani/{id}','AlatController@update');
    Route::delete('deleteAlattani/{id}','AlatController@delete');
});

//====================== Profil Mitra ===================

//====================== Alat Tani=========================


//====================== Produk =========================
Route::get('produk_admin','ProdukController@produk_admin');
Route::get('produk','ProdukController@index');
Route::post('addProduk', 'ProdukController@create');
Route::put('editProduk/{id}','ProdukController@update');
Route::delete('deleteProduk/{id}','ProdukController@delete');
//====================== Kelola Pemesanan Alat Tani=========================
Route::get('kelolapemesananalat','PemesananAlatController@kelolapemesananalat');
Route::get('pemesananalat-diterima','PemesananAlatController@pemesananalat_diterima');
Route::get('pemesananalat-selesai','PemesananAlatController@pemesananalat_selesai');
Route::get('pemesananalat-petani','PemesananAlatController@pemesananalat_petani');
Route::get('pemesananmitra', 'PemesananAlatController@listpenyewaanPetani');
Route::put('editPemesananAlat/{id}','PemesananAlatController@update');
Route::delete('deletePemesananAlat/{id}','PemesananAlatController@delete');

Route::get('pesananproduk','PembayaranController@index');
Route::get('cetaklaporanproduk/{tanggal_bukti}','PembayaranController@cetakpembayaranproduk');
Route::put('editPembayaran/{id}','PembayaranController@update');
Route::delete('deletePembayaran/{id}','PembayaranController@delete');

Route::get('alattani-list','PemesananAlatController@alattani_list');
Route::get('alattani-traktor','PemesananAlatController@alattani_traktor');
Route::get('FormulirSewaAlat/{id}','PemesananAlatController@index');
Route::post('aksipesanalat','PemesananAlatController@aksipesanalat');
Route::get('pembayaran/{id_pemesanan_alat}','PemesananAlatController@pembayaranalat');


Route::get('pembayaranProduk', 'PembayaranController@index');
Route::post('aksibayaralat','PembayaranAlatController@aksibayaralat');
Route::get('pembayaranAlat/{id_pemesanan_alat}','PembayaranAlatController@pembayaranalat');
Route::get('cetaklaporanalat/{tanggal_bukti}','PembayaranAlatController@cetakpembayaranalat');
Route::get('cari','PembayaranAlatController@cari');

