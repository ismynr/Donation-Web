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

Route::get('/home', function () {
    if (Auth::check()) {
        if ( Auth::user()->isPengurus() ) {
                return redirect('/pengurus');
        }  else if ( Auth::user()->isDonatur() ) {
                return redirect('/donatur');
        }  else if ( Auth::user()->isAdmin() ) {
                return redirect('/admin');
        }  else if ( Auth::user()->isUser() ){
                return redirect('/user');
        }
    }
    return view('welcome');
});

Route::get('/contact', 'HomeController@contact');
// Route::get('/guest', 'GuestController@index');

Auth::routes(['verify' => true]);

/**
 * 
 * Middleware Auth User Yang Belum Punya Role SETELAH REGISTRASI
 */
Route::group(['middleware' => ['auth', 'user', 'verified'], 'prefix' => 'user'], function () {
    Route::get('/', 'UserController@index')->name('user.dashboard');
    Route::post('/store', 'UserController@store')->name('user.store');
});


/**
 * 
 * Middleware Auth User Admin
 */
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\HomeAdminController@index')->name('admin.dashboard');
});

 
/**
 * 
 * Middleware Auth User Pengurus
 */
Route::group(['middleware' => ['auth', 'pengurus'], 'prefix' => 'pengurus'], function () {
    Route::get('/', 'Pengurus\HomePengurusController@index')->name('pengurus.dashboard');
    Route::resource('donasi', 'Pengurus\DonasiController');
    Route::resource('category', 'Pengurus\CategoryController');
    Route::resource('penerima', 'Pengurus\PenerimaController');
    Route::resource('pengurus', 'Pengurus\PengurusController');
    Route::resource('donatur', 'Pengurus\DonaturController');
    Route::get('donatur-lis', 'Pengurus\DonaturController@getDonatur')->name('donatur.list');

    // JSON Route
    Route::get('donasi/cari/category', 'Pengurus\DonasiController@loadDataCategory')->name('donasi.cari.category');
    Route::get('donasi/cari/penerima', 'Pengurus\DonasiController@loadDataPenerima')->name('donasi.cari.penerima');
    Route::get('donasi/cari/donatur', 'Pengurus\DonasiController@loadDataDonatur')->name('donasi.cari.donatur');   
    
});


/**
 * 
 * Middleware Auth User Donatur
 */
Route::group(['middleware' => ['auth', 'donatur'], 'prefix' => 'donatur'], function () {
    Route::get('/', 'Donatur\HomeDonaturController@index')->name('donatur.dashboard');
});

