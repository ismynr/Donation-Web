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
Auth::routes(['verify' => true]);

/**
 * 
 * Middleware Auth User Yang Belum Punya Role SETELAH REGISTRASI DAN VERIFIKASI
 */
Route::group(['middleware' => ['auth', 'user', 'verified'], 'prefix' => 'user', 'as' => 'user.'], 
    function () {
        Route::get('/', 'UserController@index')->name('dashboard');
        Route::post('/store', 'UserController@store')->name('store');
});


/**
 * 
 * Middleware Auth User Admin
 */
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], 
    function () {
        Route::get('/', 'Admin\HomeAdminController@index')->name('dashboard');
        Route::resource('pengurus', 'Admin\ManagePengurusController');
        Route::resource('donatur', 'Admin\ManageDonaturController');
        Route::resource('user', 'Admin\ManageUserController');
        Route::resource('profile', 'Admin\ProfileAdminController');
});

 
/**
 * 
 * Middleware Auth User Pengurus
 */
Route::group(['middleware' => ['auth', 'pengurus'], 'prefix' => 'pengurus', 'as' => 'pengurus.'], 
    function () {
        Route::get('/', 'Pengurus\HomePengurusController@index')->name('dashboard');
        Route::resource('donasi', 'Pengurus\DonasiController');
        Route::resource('category', 'Pengurus\CategoryController');
        Route::resource('penerima', 'Pengurus\PenerimaController');
        Route::resource('donatur', 'Pengurus\DonaturController');
        Route::resource('layanan_public', 'Pengurus\LayananPublicController');
        Route::resource('profile', 'Pengurus\ProfilePengurusController');

        // JSON Route
        Route::get('donasi/cari/category', 'Pengurus\DonasiController@loadDataCategory')->name('donasi.cari.category');
        Route::get('donasi/cari/penerima', 'Pengurus\DonasiController@loadDataPenerima')->name('donasi.cari.penerima');
        Route::get('donasi/cari/donatur', 'Pengurus\DonasiController@loadDataDonatur')->name('donasi.cari.donatur');   
});


/**
 * 
 * Middleware Auth User Donatur
 */
Route::group(['middleware' => ['auth', 'donatur'], 'prefix' => 'donatur', 'as' => 'donatur.'], 
    function () {
        Route::get('/', 'Donatur\HomeDonaturController@index')->name('dashboard');
        Route::resource('donasi', 'Donatur\ManageDonasiController');
        Route::resource('layanan_public', 'Donatur\LayananPublicController');
        Route::resource('profile', 'Donatur\ProfileDonaturController');

        // JSON Route
        Route::get('donasi/cari/category', 'Donatur\ManageDonasiController@loadDataCategory')->name('donasi.cari.category');
        Route::get('donasi/cari/penerima', 'Donatur\ManageDonasiController@loadDataPenerima')->name('donasi.cari.penerima');
});

