<?php

use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PendaftarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAlamatController;
use App\Http\Controllers\DataOrtuController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\HalamanDepanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HalamanDepanController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'handleLogin'])->name('handle.login');
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'handleRegister']);
});

Route::group(['middleware' => ['auth:web,siswa']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/change-password', [ChangePasswordController::class, 'index']);
    Route::put('/change-password', [ChangePasswordController::class, 'update']);
});


Route::group(['middleware' => ['auth:siswa']], function () {
    Route::get('/datadiri', [DataSiswaController::class, 'index']);
    Route::put('/datadiri', [DataSiswaController::class, 'update']);

    Route::get('/dataalamat', [DataAlamatController::class, 'index']);
    Route::put('/dataalamat', [DataAlamatController::class, 'update']);

    Route::get('/dataorangtua', [DataOrtuController::class, 'index']);
    Route::put('/dataorangtua', [DataOrtuController::class, 'update']);

    Route::get('/berkas', [BerkasController::class, 'siswa']);
    Route::put('/berkas', [BerkasController::class, 'update']);

    Route::get('/pengumuman', [PengumumanController::class, 'index']);
    Route::get('/print', [PengumumanController::class, 'print']);
});


Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/pendaftar', [PendaftarController::class, 'index']);
    Route::get('/pendaftar/diterima', [PendaftarController::class, 'halamanDiterima']);
    Route::get('/pendaftar/dicadangkan', [PendaftarController::class, 'halamanDicadangkan']);
    Route::get('/pendaftar/ditolak', [PendaftarController::class, 'halamanDitolak']);

    Route::get('/pendaftar/data/{id}', [PendaftarController::class, 'lihatData']);
    Route::get('/pendaftar/berkas/{id}', [PendaftarController::class, 'lihatBerkas']);

    Route::put('/pendaftar/terima/{id}', [PendaftarController::class, 'terimaPendaftar']);
    Route::put('/pendaftar/cadangkan/{id}', [PendaftarController::class, 'cadangkanPendaftar']);
    Route::put('/pendaftar/tolak/{id}', [PendaftarController::class, 'tolakPendaftar']);

    Route::delete('/pendaftar/{id}', [PendaftarController::class, 'hapusPendaftar']);
});

Route::group(['middleware' => ['auth:web', 'isAdmin']], function () {
    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::get('/petugas/create', [PetugasController::class, 'create']);
    Route::post('/petugas', [PetugasController::class, 'store']);
    Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit']);
    Route::put('/petugas/{id}/update', [PetugasController::class, 'update']);
    Route::delete('/petugas/{id}/delete', [PetugasController::class, 'destroy']);

    Route::get('/pengaturan', [PengaturanController::class, 'index']);
    Route::put('/pengaturan', [PengaturanController::class, 'update']);
});
