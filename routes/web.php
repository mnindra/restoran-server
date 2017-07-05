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

Route::group(['middleware' => 'guest'], function ()
{
    Route::get('/register', 'RegisterController@showRegistrationForm');
    Route::post('/register', 'RegisterController@register');
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login');
});

Route::group(['middleware' => 'petugas'], function ()
{
    Route::get('/', function () {
        return view('beranda');
    });

    Route::get('/beranda', function () {
        return view('beranda');
    });

    Route::get('/logout', 'LoginController@logout');

    // Petugas Route
    Route::get('/petugas', 'PetugasController@index');
    Route::get('/petugas/create', 'PetugasController@create');
    Route::post('/petugas/create', 'PetugasController@store');
    Route::delete('/petugas/delete/{id}', 'PetugasController@destroy');
    Route::get('/petugas/edit/{id}', 'PetugasController@edit');
    Route::put('/petugas/edit/{id}', 'PetugasController@update');

    // Kategori Route
    Route::get('/kategori', 'KategoriController@index');
    Route::post('/kategori/create', 'KategoriController@store');
    Route::put('/kategori/edit/{id}', 'KategoriController@update');
    Route::delete('/kategori/delete/{id}', 'KategoriController@destroy');

    // Menu Route
    Route::get('/menu', 'MenuController@index');
    Route::get('/menu/create', 'MenuController@create');
    Route::post('/menu/create', 'MenuController@store');
    Route::get('/menu/edit/{id}', 'MenuController@edit');
    Route::put('/menu/edit/{id}', 'MenuController@update');
    Route::delete('/menu/delete/{id}', 'MenuController@destroy');

    // Meja Route
    Route::get('/meja', 'MejaController@index');
    Route::post('/meja/create', 'MejaController@store');
    Route::put('/meja/edit/{id}', 'MejaController@update');
    Route::delete('/meja/delete/{id}', 'MejaController@destroy');

    // Pemesanan Route
    Route::get('/pemesanan', 'PemesananController@index');
    Route::get('/pemesanan/{id}', 'PemesananController@show');
    Route::post('/pemesanan/create', 'PemesananController@store');
    Route::put('/pemesanan/edit/{id}', 'PemesananController@update');
    Route::delete('/pemesanan/delete/{id}', 'PemesananController@destroy');
});
