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

Route::prefix('pembeli')->group(function(){
    Route::post('/login', 'API\PembeliController@login');
    Route::get('/getById/{id}', 'API\PembeliController@show');
    Route::post('/add', 'API\PembeliController@store');
    Route::put('/edit/{id}', 'API\PembeliController@update');
});

Route::prefix('alamat')->group(function(){
    Route::get('/getById/{id}', 'API\AlamatApiController@show');
    Route::post('/add', 'API\AlamatApiController@store');
    Route::put('/edit',' API\AlamatApiController@update');
});