<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/rajaongkir/getCost/{origin}/{destination}/{weight}', 'RajaOngkirController@getCost');
Route::post('/rajaongkir/getCost', 'RajaOngkirController@getCost');

Route::get('/getProvinsi', 'API\ProvinsiApiController@getAll');

Route::get('/getKota', 'API\KotaApiController@getAll');
Route::get('/getKota/{id}', 'API\KotaApiController@getById');

Route::prefix('produk')->group(function() {
    Route::get('getAll', 'API\ProdukApiController@getAll');
    Route::get('getByKategori/{id}', 'API\ProdukApiController@getByKategori');
    Route::put('/edit/{id}', 'API\ProdukApiController@update');
});

Route::get('/kategori/getAll', 'API\KategoriApiController@getAll');

Route::prefix('keranjang')->group(function() {
    Route::post('/createCart', 'API\KeranjangApiController@store');
    Route::post('/addDetailCart', 'API\DetailKeranjangApiController@store');
    Route::delete('/deleteDetailCart/{id}', 'API\DetailKeranjangApiController@destroy');
    Route::get('/getByUser/{id}', 'API\DetailKeranjangApiController@getByUser');
});

Route::post('/pemesananBarang/add', 'API\PemesananBarangApiController@create');

Route::prefix('pemesanan')->group(function() {
    Route::post('/add', 'API\PemesananApiController@store');
    //Route::delete('delete', 'API\PemesananApiController@destroy');
});

Route::get('/pembayaran/daftarTransaksi/{id}', 'API\PembayaranApiController@get');
Route::post('/pembayaran/add', 'API\PembayaranApiController@store');
Route::post('/pembayaran/uploadBukti', 'API\PembayaranApiController@uploadImage');

Route::prefix('pembeli')->group(function(){
    Route::post('/login', 'API\PembeliApiController@login');
    Route::get('/getById/{id}', 'API\PembeliApiController@show');
    Route::post('/add', 'API\PembeliApiController@store');
    Route::put('/edit/{id}', 'API\PembeliApiController@update');
});

Route::prefix('alamat')->group(function(){
    Route::get('/getById/{id}', 'API\AlamatApiController@show');
    Route::post('/add', 'API\AlamatApiController@store');
    Route::put('/edit/{id}', 'API\AlamatApiController@update');
});
