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

Route::get('/getProvinsi', 'API\ProvinsiApiController@getAll');

Route::get('/getKota', 'API\KotaApiController@getAll');
Route::get('/getKota/{id}', 'API\KotaApiController@getById');

Route::get('/produk/getAll', 'API\ProdukApiController@getAll');
Route::get('/produk/getByKategori', 'API\ProdukApiController@getByKategori');

Route::get('/kategori/getAll', 'APi\KategoriApiController@getAll');

Route::prefix('keranjang')->group(function() {
    Route::post('/createCart', 'API\KeranjangApiController@store');
    Route::post('/addCart', 'API\DetailKeranjangApiController@store');
    Route::get('/getByUser/{id}', 'API\DetailKeranjangApiController@getByUser');
    Route::delete('/delete/{id}', 'API\DetailKeranjangApiController@destroy');
});

Route::get('/pemesananBarang/add/{id}', 'API\PemesananBarangApiController@create');

Route::prefix('pemesanan')->group(function() {
    Route::post('/add', 'API\PemesananApiController@store');
    Route::put('/uploadBuktiTF', 'API\PemesananApiController@update');
    //Route::delete('delete', 'API\PemesananApiController@destroy');
});

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
