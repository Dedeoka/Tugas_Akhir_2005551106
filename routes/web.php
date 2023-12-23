<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Master\KategoriBarangController;
use App\Http\Controllers\Admin\Master\KategoriPemasukanController;
use App\Http\Controllers\Admin\Master\KategoriPengeluaranController;
use App\Http\Controllers\Admin\Master\KategoriProgramController;
use App\Http\Controllers\Admin\Master\KategoriPenyakitController;
use App\Http\Controllers\Admin\Master\SekolahController;
use App\Http\Controllers\Admin\Anak\DataAnakController;
use App\Http\Controllers\Admin\Anak\KesehatanAnakController;
use App\Http\Controllers\Admin\Anak\PendidikanAnakController;
use App\Http\Controllers\Admin\Anak\PrestasiAnakController;
use App\Http\Controllers\Admin\Keuangan\ChartPengeluaranAnakController;
use App\Http\Controllers\Admin\Keuangan\PengeluaranAnakController;
use App\Http\Controllers\Admin\Keuangan\PengeluaranPantiController;
use App\Http\Controllers\Admin\Keuangan\PengeluaranTotalController;

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

// Route::get('/test', function () {
//     return view('admin.keuangan.pengeluaran-total');
// });

Route::prefix('master-data')->group(function () {
    Route::resource('daftar-sekolah', SekolahController::class);
    Route::resource('kategori-barang', KategoriBarangController::class);
    Route::resource('kategori-pemasukan', KategoriPemasukanController::class);
    Route::resource('kategori-pengeluaran', KategoriPengeluaranController::class);
    Route::resource('kategori-penyakit', KategoriPenyakitController::class);
    Route::resource('kategori-program', KategoriProgramController::class);
});

Route::prefix('anak-asuh')->group(function () {
    Route::resource('data-anak', DataAnakController::class);
    Route::resource('kesehatan-anak', KesehatanAnakController::class);
    Route::resource('pendidikan-anak', PendidikanAnakController::class);
    Route::resource('prestasi-anak', PrestasiAnakController::class);
});

Route::prefix('keuangan')->group(function () {
    Route::resource('pengeluaran-anak', PengeluaranAnakController::class);
    Route::resource('pengeluaran-panti', PengeluaranPantiController::class);
    Route::get('pengeluaran-total', [PengeluaranTotalController::class, 'index'])->name('pengeluaran-total.index');
    Route::get('pengeluaran-anak-chart', [ChartPengeluaranAnakController::class, 'index'])->name('pengeluaran-anak-chart.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
