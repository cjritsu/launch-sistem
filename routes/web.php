<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Models\User;

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
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/notify', [App\Http\Controllers\Surat_Izin::class, 'notify']);
Auth::routes();

Route::resource('/dashboard', 'App\Http\Controllers\HomeController');
Route::resource('/history', 'App\Http\Controllers\HistoryController');
Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markRead');
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:Admin']], function() {
        Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
        Route::get('/user_search', 'App\Http\Controllers\UserController@search')->name('user_search');
    });

    Route::group(['middleware' => ['permission:create-profile']], function() {
        Route::resource('karyawan', 'App\Http\Controllers\KaryawanController', ['except' => ['show']]);
        Route::put('karyawan/{id}/edit', 'App\Http\Controllers\KaryawanController@update')->name('karyawan.update');
        Route::put('/karyawan_reset', 'App\Http\Controllers\KaryawanController@reset')->name('karyawan_reset');
        Route::get('/karyawan_search', 'App\Http\Controllers\KaryawanController@search')->name('karyawan_search');
    });

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
    Route::resource('surat_cuti', 'App\Http\Controllers\Surat_Cuti');
    Route::resource('surat_izin', 'App\Http\Controllers\Surat_Izin');
    Route::put('surat_absen/{id}/edit', 'App\Http\Controllers\PengajuanAbsenController@update')->name('surat_absen.update');
    Route::resource('surat_absen', 'App\Http\Controllers\PengajuanAbsenController');
    Route::get('/absen_search', 'App\Http\Controllers\PengajuanAbsenController@search')->name('absen_search');
    Route::get('/cuti_search', 'App\Http\Controllers\Surat_Cuti@search')->name('cuti_search');
    Route::get('/izin_search', 'App\Http\Controllers\Surat_Izin@search')->name('izin_search');
});

Route::group(['middleware' => ['role:Admin']], function() {
    Route::resource('/jenis_cuti', 'App\Http\Controllers\AdminController');
    Route::delete('/jenis_cuti_delete', 'App\Http\Controllers\AdminController@destroy')->name('cuti_destroy');

    Route::get('/jenis_izin', 'App\Http\Controllers\AdminController@index_izin')->name('jenis_izin');
    Route::post('/jenis_izin_store', 'App\Http\Controllers\AdminController@store_izin')->name('jenis_store');
    Route::delete('/jenis_izin_delete', 'App\Http\Controllers\AdminController@destroy_izin')->name('izin_destroy');

    Route::get('/unit', 'App\Http\Controllers\AdminController@index_unit')->name('unit');
    Route::post('/unit_store', 'App\Http\Controllers\AdminController@store_unit')->name('store_unit');
    Route::delete('/unit_delete', 'App\Http\Controllers\AdminController@destroy_unit')->name('unit_destroy');

    Route::get('/jabatan', 'App\Http\Controllers\AdminController@index_jabatan')->name('jabatan');
    Route::post('/jabatan_store', 'App\Http\Controllers\AdminController@store_jabatan')->name('store_jabatan');
    Route::delete('/jabatan_delete', 'App\Http\Controllers\AdminController@destroy_jabatan')->name('jabatan_destroy');

    Route::get('/status_karyawan', 'App\Http\Controllers\AdminController@index_status_karyawan')->name('sts_karya');
    Route::post('/status_karyawan_store', 'App\Http\Controllers\AdminController@store_status_karyawan')->name('store_sts_karya');
    Route::delete('/status_karyawan_delete', 'App\Http\Controllers\AdminController@destroy_status_karyawan')->name('sts_karya_destroy');

    Route::get('/roles_and_permission', 'App\Http\Controllers\AdminController@index_rp')->name('rp');
    Route::post('/rp_store', 'App\Http\Controllers\AdminController@store_rp')->name('store_rp');
    Route::put('/rp_update', 'App\Http\Controllers\AdminController@update_rp')->name('update_rp');
    Route::delete('/rp_delete', 'App\Http\Controllers\AdminController@destroy_rp')->name('rp_destroy');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
