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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'cekadmin'])->group(function () {
    Route::get('/pulau', 'PulauController@index')->name('pulau.index');
    Route::get('/pulau/edit/{id}', 'PulauController@edit')->name('pulau.edit');
    Route::post('/pulau/store', 'PulauController@store')->name('pulau.store');
    Route::put('pulau/update/{id}', 'PulauController@update')->name('pulau.update');
    Route::delete('pulau/delete/{id}', 'PulauController@delete')->name('pulau.delete');

    Route::get('/provinsi', 'ProvinsiController@index')->name('provinsi.index');
    Route::get('/provinsi/getprovinsi/{id}', 'ProvinsiController@getProvinsi')->name('provinsi.getProvinsi');
    Route::get('/provinsi/edit/{id}', 'ProvinsiController@edit')->name('provinsi.edit');
    Route::post('/provinsi/store', 'ProvinsiController@store')->name('provinsi.store');
    Route::put('provinsi/update/{id}', 'ProvinsiController@update')->name('provinsi.update');
    Route::delete('provinsi/delete/{id}', 'ProvinsiController@delete')->name('provinsi.delete');

    Route::get('/kota', 'KotaController@index')->name('kota.index');
    Route::get('/kota/edit/{id}', 'KotaController@edit')->name('kota.edit');
    Route::post('/kota/store', 'KotaController@store')->name('kota.store');
    Route::put('kota/update/{id}', 'KotaController@update')->name('kota.update');
    Route::delete('kota/delete/{id}', 'KotaController@delete')->name('kota.delete');

    Route::get('/masteruser', 'UserController@index')->name('masteruser.index');
    Route::get('/masteruser/edit/{id}', 'UserController@edit')->name('masteruser.edit');
    Route::post('/masteruser/store', 'UserController@store')->name('masteruser.store');
    Route::put('/masteruser/update/{id}', 'UserController@update')->name('masteruser.update');
    Route::delete('/masteruser/delete/{id}', 'UserController@destroy')->name('masteruser.deltete');
});
Route::middleware(['auth', 'cekpegawai'])->group(function () {
    Route::get('user', 'PerdinController@indexPegawai')->name('user.index');
    Route::post('user/store', 'PerdinController@storePegawai')->name('user.store');
});
Route::middleware(['auth', 'cekdivisi'])->group(function () {
    Route::get('divisisdm', 'PerdinController@indexDivisiSdm')->name('divisisdm.index');
    Route::get('divisisdm/setuju/{id}', 'PerdinController@setuju')->name('divisisdm.setuju');
    Route::get('divisisdm/tolak/{id}', 'PerdinController@tolak')->name('divisisdm.tolak');
});
