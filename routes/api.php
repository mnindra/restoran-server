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

// Menu Route
Route::get('menu', 'Api\MenuController@index');
Route::get('menu/{id}', 'Api\MenuController@show');

// Pemesanan Route
Route::get('pemesanan/{id_meja}', 'Api\PemesananController@index');
Route::post('pemesanan', 'Api\PemesananController@store');
Route::put('pemesanan/{id}', 'Api\PemesananController@update');
Route::delete('pemesanan/{id}', 'Api\PemesananController@destroy');

// Detail Pemesanan Route
Route::get('detail_pemesanan/{id_pemesanan}', 'Api\DetailPemesananController@index');
Route::post('detail_pemesanan', 'Api\DetailPemesananController@store');
Route::put('detail_pemesanan/{id}', 'Api\DetailPemesananController@update');
Route::delete('detail_pemesanan/{id}', 'Api\DetailPemesananController@destroy');

// Login Route
Route::post('login', 'Api\LoginController@login');
