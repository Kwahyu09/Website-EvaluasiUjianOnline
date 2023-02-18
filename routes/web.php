<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\AktorController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\GrupsoalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Grupsoal2Controller;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HasilujianController;
use App\Http\Controllers\DashboardHomeController;

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

Route::get('/', [DashboardHomeController::class, 'index'])->middleware(['auth'])->name('home');
Route::get('/admin', [AktorController::class, 'index_admin'])->middleware(['auth'])->name('Admin');
Route::get('/staff', [AktorController::class, 'index_staff'])->middleware(['auth'])->name('Staff');
Route::get('/staff/create', [AktorController::class, 'create_staff'])->middleware(['auth'])->name('CreateStaff');
Route::post('/staff/store', [AktorController::class, 'store_staff'])->middleware(['auth'])->name('StoreStaff');
Route::post('/staff/destroy', [AktorController::class, 'destroy_staff'])->middleware(['auth'])->name('destroyStaff');

Route::get('/ketua', [AktorController::class, 'index_ketua'])->middleware(['auth'])->name('Ketua');
Route::get('/ketua/create', [AktorController::class, 'create_ketua'])->middleware(['auth'])->name('CreateKetua');
Route::post('/ketua/store', [AktorController::class, 'store_ketua'])->middleware(['auth'])->name('StoreKetua');

// Route::get('/mahasiswa', [AktorController::class, 'index_mahasiswa'])->middleware(['auth'])->name('mahasiswa');
// Route::get('/mahasiswa/create', [AktorController::class, 'create_mahasiswa'])->middleware(['auth'])->name('Createmahasiswa');
// Route::post('/mahasiswa/store', [AktorController::class, 'store_mahasiswa'])->middleware(['auth'])->name('Storemahasiswa');

Route::resource('/kelas', KelasController::class)->middleware('auth');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware(['auth'])->name('Mahasiswa');

Route::resource('/modul', ModulController::class)->middleware('auth');

Route::get('/grupsoal', [GrupsoalController::class, 'index'])->middleware(['auth'])->name('GrupSoal Modul');

Route::resource('/grupsoal2', Grupsoal2Controller::class)->middleware(['auth']);

Route::resource('/soal', SoalController::class)->middleware(['auth']);

Route::resource('/ujian', UjianController::class)->middleware(['auth']);

Route::resource('/hasilujian', HasilujianController::class)->middleware(['auth']);

Route::get('/evaluasi', [EvaluasiController::class, 'index'])->middleware(['auth'])->name('Evaluasi');

Route::get('/tambah', [RegisterController::class, 'index'])->name('Register');

Route::get('/mahasiswa-home', function() {
    return view('welcome');
})->middleware('auth')->name('mahasiswa-home');

require __DIR__.'/auth.php';
