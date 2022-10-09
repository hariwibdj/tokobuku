<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\XenditController;
use App\Http\Controllers\HomeController;


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
    return view('home');
});

Auth::routes();

Route::controller(HomeController::class)->prefix('buku')->group(function () {
    Route::get('/', 'index')->name('bukus');
    Route::get('/{bukuID}', 'checkout')->name('checkout');
    Route::post('/{bukuID}', 'actCheckout')->name('actCheckout');
    Route::get('/transaction/{bootcampTransactionID}', 'detail')->name('detail');
});

Route::get('/buku-tambah',[BukuController::class,'create'])->name('tambah');
Route::get('/buku',[BukuController::class,'index']);
Route::post('/buku',[BukuController::class,'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::controller(XenditController::class)->group(function () {
    Route::post('/xendit-callback', 'XenditCallback');
    Route::post('/xendit-callback-ewallets', 'XenditCallbackEwallet');
});
