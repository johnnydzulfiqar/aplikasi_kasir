<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TransaksiController;
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
    return view('auth.login');
});

Auth::routes();


// Route::group(['middleware' => ['role:admin']], function () {
//     if (auth()->user()) {
//         auth()->user()->assignRole('admin');
//     }
//     return view('adminkasir.index');
// });

// Route::get('user-page', function () {
//     return 'Halaman untuk User';
// })->middleware('role:user')->name('user.page');

// Route::group(['middleware' => ['role:admin']], function () {
//     Route::resource('admin-kasir', ['as' => 'admin-kasir', 'uses' => KasirController::class]);
// });

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('barang', 'App\Http\Controllers\BarangController');
        Route::resource('transaksi', 'App\Http\Controllers\TransaksiController');
        // Route::get('/transaksi/cetak', [App\Http\Controllers\TransaksiController::class, 'cetak'])->name('cetak');
        Route::resource('user', 'App\Http\Controllers\UserController');
    });
    Route::group(['middleware' => ['role:user']], function () {
        Route::resource('kasir', 'App\Http\Controllers\KasirController');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
