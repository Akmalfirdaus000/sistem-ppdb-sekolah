<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\AdminPPDBController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminDokumenController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\LaporanKepalaController;

// ------------------------------
// Route Umum (Welcome & Auth)
// ------------------------------

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login/action', 'login_action')->name('login.action');

    Route::get('register', 'register')->name('register');
    Route::post('register/action', 'register_action')->name('register.action');

    Route::get('logout', 'logout')->name('logout');
});

// ------------------------------
// Route Siswa (Autentikasi & Prefix: siswa)
// ------------------------------

Route::middleware(['auth', 'siswa'])->prefix('siswa')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'siswa_dashboard'])->name('siswa.dashboard');

    // Persyaratan PPDB
    Route::get('/ppdb/persyaratan', function () {
        return view('siswa.ppdb.persyaratan');
    })->name('siswa.ppdb.persyaratan');

    // Formulir Pendaftaran PPDB
    Route::get('/pendaftaran-ppdb', [PPDBController::class, 'index'])->name('siswa.ppdb.index');
    Route::get('/pendaftaran-ppdb/form', [PPDBController::class, 'create'])->name('siswa.ppdb.form');
    Route::post('/pendaftaran-ppdb/store', [PPDBController::class, 'store'])->name('siswa.ppdb.store');
    Route::get('/siswa/ppdb/cetak', [PPDBController::class, 'cetak'])->name('siswa.ppdb.cetak');


    // Dokumen
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('siswa.dokumen.index');
    Route::get('/dokumen/{user_id}/{tipe}', [DokumenController::class, 'show'])->name('siswa.dokumen.show');
    Route::get('/dokumen/{user_id}', [DokumenController::class, 'edit'])->name('siswa.dokumen.edit');
    Route::put('/dokumen/update/{user_id}', [DokumenController::class, 'update'])->name('siswa.dokumen.update');

    // Status Pendaftaran
    Route::get('/status-pendaftaran', [PendaftaranController::class, 'index'])->name('siswa.statusPendaftaran.index');

    // Profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('siswa.profil.index');
    Route::put('/profil/update/{id}', [ProfilController::class, 'update'])->name('siswa.profil.update');
    Route::put('/profil/update-dokumen/{user_id}', [ProfilController::class, 'updateDokumen'])->name('siswa.profil.updateDokumen');
});

// ------------------------------
// Route Admin (Autentikasi & Prefix: admin)
// ------------------------------

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin.dashboard');

    // Manajemen Pengguna
    Route::get('/admin/pengguna', [AdminController::class, 'index'])->name('admin.pengguna.index');
    Route::get('/admin/pengguna/add', [AdminController::class, 'create'])->name('admin.pengguna.add');
    Route::post('/admin/pengguna', [AdminController::class, 'store'])->name('admin.pengguna.store');
    Route::get('/admin/pengguna/{user}/edit', [AdminController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('/admin/pengguna/{user}', [AdminController::class, 'update'])->name('admin.pengguna.update');
    Route::delete('/admin/pengguna/{user}', [AdminController::class, 'destroy'])->name('admin.pengguna.destroy');

    // PPDB
    Route::get('/ppdb', [AdminPPDBController::class, 'index'])->name('admin.ppdb.index');
    Route::get('/ppdb/{id}/{tipe?}', [AdminPPDBController::class, 'show'])->name('admin.ppdb.show');
    Route::get('/ppdb/export', [AdminPPDBController::class, 'export'])->name('admin.ppdb.export');
    Route::post('/admin/ppdb/update-status/{id}', [AdminPPDBController::class, 'updateStatus'])->name('admin.ppdb.updateStatus');

    // Dokumen
    Route::get('/admin/dokumen-pengguna', [AdminDokumenController::class, 'index'])->name('admin.dokumen.index');

    // Laporan
    Route::get('/admin/laporan', [AdminLaporanController::class, 'index'])->name('admin.laporan.index');

    // Hasil Seleksi
    Route::get('/siswa-diterima', [AdminController::class, 'diterimaIndex'])->name('admin.diterima.index');
    Route::get('/siswa-cadangan', [AdminController::class, 'cadanganIndex'])->name('admin.cadangan.index');
    Route::get('/siswa-ditolak', [AdminController::class, 'ditolakIndex'])->name('admin.ditolak.index');
});
use App\Http\Controllers\PendaftarKepalaController;
use App\Http\Controllers\PengumumanKepalaController;

// Group route untuk kepala sekolah
Route::prefix('kepala')
    ->middleware(['auth']) // Tambah 'role:kepala' jika kamu sudah buat middleware-nya
    ->name('kepala.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'kepala_dashboard'])->name('dashboard');

        // 🔽 Tambahkan ini untuk pengumuman
        Route::get('/pengumuman', [PengumumanKepalaController::class, 'index'])->name('pengumuman.index');
        Route::get('/pengumuman/create', [PengumumanKepalaController::class, 'create'])->name('pengumuman.create');
        Route::post('/pengumuman', [PengumumanKepalaController::class, 'store'])->name('pengumuman.store');
        Route::get('/pengumuman/{id}/edit', [PengumumanKepalaController::class, 'edit'])->name('pengumuman.edit');
        Route::put('/pengumuman/{id}', [PengumumanKepalaController::class, 'update'])->name('pengumuman.update');
        Route::delete('/pengumuman/{id}', [PengumumanKepalaController::class, 'destroy'])->name('pengumuman.destroy');

          Route::get('/pendaftar', [PendaftarKepalaController::class, 'index'])->name('pendaftar.index');
        Route::get('/pendaftar/{id}', [PendaftarKepalaController::class, 'show'])->name('pendaftar.show');
        Route::get('/laporan', [LaporanKepalaController::class, 'index'])->name('laporan.index');
    });

