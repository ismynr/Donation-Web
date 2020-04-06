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

/**
 * 
 * Middleware Auth User Admin
 */


/**
 * 
 * Middleware Auth User Pengurus
 */
Route::group(['middleware' => ['auth', 'pengurus'], 'prefix' => 'pengurus'], function () {
    Route::get('/', 'UsrPengurusController@index')->name('pengurus_dashboard');
    Route::resource('donasi', 'DonasiController');
    Route::resource('category', 'CategoryController');
    Route::resource('penerima', 'PenerimaController');
    Route::resource('pengurus', 'PengurusController');
    Route::resource('donatur', 'DonaturController');
    Route::get('donatur-lis', 'DonaturController@getDonatur')->name('donatur.list');

    // JSON Route
    Route::get('donasi/cari/category', 'DonasiController@loadDataCategory')->name('donasi.cari.category');
    Route::get('donasi/cari/penerima', 'DonasiController@loadDataPenerima')->name('donasi.cari.penerima');
    Route::get('donasi/cari/donatur', 'DonasiController@loadDataDonatur')->name('donasi.cari.donatur');
    
    // Hanya coba
    Route::get('data', function() {
        $model = App\Donasi::all();
        return DataTables::of($model)->make();
    });
});


/**
 * 
 * Middleware Auth User Donatur
 */
Route::group(['middleware' => ['auth', 'donatur'], 'prefix' => 'donatur'], function () {
    Route::get('/', 'UsrDonaturController@index')->name('donatur_dashboard');
});