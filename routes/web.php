<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\KategoriBarangController;
use App\Http\Controllers\Admin\Master\KategoriPemasukanController;
use App\Http\Controllers\Admin\Master\KategoriPengeluaranController;
use App\Http\Controllers\Admin\Master\KategoriProgramController;
use App\Http\Controllers\Admin\Master\KategoriPenyakitController;
use App\Http\Controllers\Admin\Anak\DataAnakController;

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
    return view('welcome');
});

Route::prefix('master-data')->group(function () {
    Route::resource('kategori-barang', KategoriBarangController::class);
    Route::resource('kategori-pemasukan', KategoriPemasukanController::class);
    Route::resource('kategori-pengeluaran', KategoriPengeluaranController::class);
    Route::resource('kategori-program', KategoriProgramController::class);
    Route::resource('kategori-penyakit', KategoriPenyakitController::class);
});

Route::prefix('anak-asuh')->group(function () {
    Route::resource('data-anak', DataAnakController::class);
});

