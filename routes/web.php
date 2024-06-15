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
use App\Http\Controllers\Admin\Anak\PrestasiAkademikAnakController;
use App\Http\Controllers\Admin\Anak\PrestasiAnakController;
use App\Http\Controllers\Admin\Dashboard\ProfileController;
use App\Http\Controllers\Admin\Dashboard\PengumumanController;
use App\Http\Controllers\Admin\Data\DataController;
use App\Http\Controllers\Admin\Donasi\DonasiUangController;
use App\Http\Controllers\Admin\Donasi\DonasiBarangController;
use App\Http\Controllers\Admin\Keuangan\ChartPemasukanPantiController;
use App\Http\Controllers\Admin\Keuangan\ChartPengeluaranAnakController;
use App\Http\Controllers\Admin\Keuangan\ChartPengeluaranPantiController;
use App\Http\Controllers\Admin\Keuangan\ChartPengeluaranTotalController;
use App\Http\Controllers\Admin\Keuangan\LaporanKeuanganController;
use App\Http\Controllers\Admin\Keuangan\PemasukanPantiController;
use App\Http\Controllers\Admin\Keuangan\PengeluaranAnakController;
use App\Http\Controllers\Admin\Keuangan\PengeluaranPantiController;
use App\Http\Controllers\Admin\Keuangan\PengeluaranTotalController;
use App\Http\Controllers\User\DonasiController;

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

// Route::get('/test2', function () {
//     return view('user.donation');
// });

Route::middleware('auth')->group(function(){
});
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
    Route::resource('prestasi-akademik-anak', PrestasiAkademikAnakController::class);
    Route::get('/data-pendidikan-anak', [DataController::class, 'educationData'])->name('pendidikan-anak.data');
    Route::get('/data-kesehatan-anak', [DataController::class, 'healthData'])->name('kesehatan-anak.data');
    Route::get('/data-prestasi-anak', [DataController::class, 'achievementData'])->name('prestasi-anak.data');
    Route::get('/data-pendidikan-akademik', [DataController::class, 'academicAchievementData'])->name('prestasi-akademik.data');
});

Route::prefix('keuangan')->group(function () {
    Route::resource('pemasukan-panti', PemasukanPantiController::class);
    Route::get('pemasukan-panti-chart-tahunan', [ChartPemasukanPantiController::class, 'chartTahunan'])->name('pemasukan-panti-chart.chartTahunan');
    Route::get('pemasukan-panti-chart-bulanan', [ChartPemasukanPantiController::class, 'chartBulanan'])->name('pemasukan-panti-chart.chartBulanan');
    Route::resource('pengeluaran-anak', PengeluaranAnakController::class);
    Route::resource('pengeluaran-panti', PengeluaranPantiController::class);
    Route::get('pengeluaran-total', [PengeluaranTotalController::class, 'index'])->name('pengeluaran-total.index');
    Route::get('pengeluaran-anak-chart-tahunan', [ChartPengeluaranAnakController::class, 'chartTahunan'])->name('pengeluaran-anak-chart.chartTahunan');
    Route::get('pengeluaran-anak-chart-bulanan', [ChartPengeluaranAnakController::class, 'chartBulanan'])->name('pengeluaran-anak-chart.chartBulanan');
    Route::get('pengeluaran-panti-chart-tahunan', [ChartPengeluaranPantiController::class, 'chartTahunan'])->name('pengeluaran-panti-chart.chartTahunan');
    Route::get('pengeluaran-panti-chart-bulanan', [ChartPengeluaranPantiController::class, 'chartBulanan'])->name('pengeluaran-panti-chart.chartBulanan');
    Route::get('pengeluaran-total-chart-tahunan', [ChartPengeluaranTotalController::class, 'chartTahunan'])->name('pengeluaran-total-chart.chartTahunan');
    Route::get('pengeluaran-total-chart-bulanan', [ChartPengeluaranTotalController::class, 'chartBulanan'])->name('pengeluaran-total-chart.chartBulanan');
    Route::get('laporan-keuangan-tahunan', [LaporanKeuanganController::class, 'laporanTahunan'])->name('laporan-keuangan.tahunan');
    Route::get('laporan-keuangan-tahunan-report', [LaporanKeuanganController::class, 'laporanTahunanReport'])->name('laporan-keuangan.tahunanReport');
    Route::get('download-laporan-tahunan-pdf', [LaporanKeuanganController::class, 'laporanTahunanPdf'])->name('download-laporan-tahunan');
    Route::get('laporan-keuangan-bulanan', [LaporanKeuanganController::class, 'laporanBulanan'])->name('laporan-keuangan.bulanan');
    Route::get('laporan-keuangan-bulanan-report', [LaporanKeuanganController::class, 'laporanBulananReport'])->name('laporan-keuangan.bulananReport');
    Route::get('download-laporan-bulanan-pdf', [LaporanKeuanganController::class, 'laporanBulananPdf'])->name('download-laporan-bulanan');

    Route::get('neraca-keuangan-tahunan', [LaporanKeuanganController::class, 'neracaTahunan'])->name('neraca-keuangan.tahunan');
    Route::get('neraca-keuangan-tahunan-report', [LaporanKeuanganController::class, 'neracaTahunanReport'])->name('neraca-keuangan.tahunanReport');
    Route::get('download-neraca-tahunan-pdf', [LaporanKeuanganController::class, 'neracaTahunanPdf'])->name('download-neraca-tahunan');
    Route::get('neraca-keuangan-bulanan', [LaporanKeuanganController::class, 'neracaBulanan'])->name('neraca-keuangan.bulanan');
    Route::get('neraca-keuangan-bulanan-report', [LaporanKeuanganController::class, 'neracaBulananReport'])->name('neraca-keuangan.bulananReport');
    Route::get('download-neraca-bulanan-pdf', [LaporanKeuanganController::class, 'neracaBulananPdf'])->name('download-neraca-bulanan');
});

Route::prefix('panti-asuhan-dharma-jati-II')->group(function () {
    Route::get('/home', function () {
        return view('user.landing-page');
    })->name('user.landing-page');
    Route::get('donasi', [DonasiController::class, 'index'])->name('user-donasi.index');
    Route::post('donasi-uang', [DonasiController::class, 'storeMoney'])->name('user-donasi-uang.store');
    Route::post('donasi-barang', [DonasiController::class, 'storeGoods'])->name('user-donasi-barang.store');
    Route::post('donasi-beasiswa', [DonasiController::class, 'storeSchoolarship'])->name('user-donasi-beasiswa.store');
    Route::post('berhasil-donasi', [DonasiController::class, 'success'])->name('user-donasi-uang.success');
});

Route::prefix('donasi')->group(function () {
    Route::resource('donasi-uang', DonasiUangController::class);
    Route::resource('donasi-barang', DonasiBarangController::class);
});

Route::prefix('dashboard')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile-panti.index');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile-panti.update');
    Route::resource('pengumuman', PengumumanController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



