<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', function () {
    return view('dashboard.dash');
});

Route::middleware(['auth'])->group(function () {
        Route::middleware(['admin'])->group(function () {
        Route::resource('petugas', PetugasController::class);
    });
    Route::resource('user', UserController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('pelanggan', PelangganController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('penjualan', PenjualanController::class);
    
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
