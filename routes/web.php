<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\AktorController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\GrupsoalController;
use App\Http\Controllers\RegisterController;
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
Route::delete('/staff/{user:id}', [AktorController::class, 'destroy_staff'])->middleware(['auth'])->name('destroyStaff');

Route::get('/ketua', [AktorController::class, 'index_ketua'])->middleware(['auth'])->name('Ketua');
Route::get('/ketua/create', [AktorController::class, 'create_ketua'])->middleware(['auth'])->name('CreateKetua');
Route::post('/ketua/store', [AktorController::class, 'store_ketua'])->middleware(['auth'])->name('StoreKetua');
Route::delete('/ketua/{user:id}', [AktorController::class, 'destroy_ketua'])->middleware(['auth'])->name('destroyKetua');

// Route::get('/mahasiswa', [AktorController::class, 'index_mahasiswa'])->middleware(['auth'])->name('mahasiswa');
// Route::get('/mahasiswa/create', [AktorController::class, 'create_mahasiswa'])->middleware(['auth'])->name('Createmahasiswa');
// Route::post('/mahasiswa/store', [AktorController::class, 'store_mahasiswa'])->middleware(['auth'])->name('Storemahasiswa');

Route::get('/kelas', [KelasController::class,'index'])->middleware(['auth']);

Route::get('/kelas/create', [KelasController::class,'create'])->middleware(['auth']);

Route::post('/kelas/store', [KelasController::class,'store'])->middleware(['auth']);

Route::delete('/kelas/{kelas:slug}', [KelasController::class, 'destroy'])->middleware(['auth'])->name('destroyKetua');

Route::resource('/dosen', DosenController::class)->middleware('auth');

Route::delete('/dosen/{dosen:id}', [DosenController::class, 'destroy'])->middleware(['auth'])->name('destroyDosen');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware(['auth'])->name('Mahasiswa');

Route::delete('/mahasiswa/{user:id}', [MahasiswaController::class, 'destroy'])->middleware(['auth'])->name('MahasiswaHapus');

Route::post('/mahasiswa/store', [MahasiswaController::class,'store'])->middleware(['auth']);

Route::get('/mahasiswa/create/{kelas:slug}', [MahasiswaController::class, 'create'])->middleware(['auth'])->name('CreateKetua');

Route::get('/kelasmahasiswa', [KelasController::class, 'kelas_siswa'])->middleware(['auth']);

Route::resource('/modul', ModulController::class)->middleware('auth');

Route::delete('/modul/{modul:slug}', [ModulController::class, 'destroy'])->middleware(['auth'])->name('destroyModul');

Route::get('/grupsoal', [GrupsoalController::class, 'index'])->middleware(['auth'])->name('GrupSoal Modul');

Route::delete('/grupsoal/{grup_soal:slug}', [GrupsoalController::class, 'destroy'])->middleware(['auth'])->name('destroyGrupsoal');

Route::get('/kelas/{kelas:slug}',[KelasController::class, 'show'])->middleware(['auth']);

Route::get('/grupsoal/{modul:slug}', [GrupsoalController::class, 'index_grup'])->middleware(['auth']);

Route::get('/grupsoal/create/{modul:slug}', [GrupsoalController::class, 'create'])->middleware(['auth']);

Route::post('/grupsoal/store', [GrupsoalController::class, 'store'])->middleware(['auth']);

Route::get('/soal/{grup_soal:slug}', [SoalController::class,'index'])->middleware(['auth']);

Route::post('/soal/store', [SoalController::class, 'store'])->middleware(['auth']);

Route::delete('/soal/{soal:slug}', [SoalController::class, 'destroy'])->middleware(['auth'])->name('destroySoal');

Route::get('/soal/create/{grup_soal:slug}', [SoalController::class,'create'])->middleware(['auth']);

Route::resource('/ujian', UjianController::class)->middleware(['auth']);

Route::delete('/ujian/{ujian:slug}', [UjianController::class, 'destroy'])->middleware(['auth'])->name('destroyUjian');

Route::resource('/hasilujian', HasilujianController::class)->middleware(['auth']);

Route::get('/evaluasis', [EvaluasiController::class, 'index1'])->middleware(['auth'])->name('Evaluasis');
Route::get('/evaluasi', [EvaluasiController::class, 'index'])->middleware(['auth'])->name('Evaluasi');

Route::get('/tambah', [RegisterController::class, 'index'])->name('Register');

Route::get('/profile-admin', [AktorController::class, 'profile_admin'])->middleware(['auth'])->name('prodile');

Route::get('/mahasiswa-home', function() {
    return view('welcome');
})->middleware('auth')->name('mahasiswa-home');

Route::get('/dosen/create/checkSlug',[DosenController::class, 'checkslug'])->middleware(['auth']);

Route::get('/kelas/create/checkSlug',[KelasController::class, 'checkslug'])->middleware(['auth']);

Route::get('/modul/create/checkSlug',[ModulController::class, 'checkslug'])->middleware(['auth']);

Route::get('/ujian/create/checkSlug',[UjianController::class, 'checkslug'])->middleware(['auth']);

Route::get('/grupsoal/create/{modul:slug}/checkSlug', [GrupsoalController::class, 'checkslug'])->middleware(['auth']);

require __DIR__.'/auth.php';
