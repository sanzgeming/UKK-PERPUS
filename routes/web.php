<?php

use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AnggotaController;
use App\Http\Controllers\admin\JenisAnggotaController;
use App\Http\Controllers\admin\DdcController;
use App\Http\Controllers\admin\FormatsController;
use App\Http\Controllers\admin\RakController;
use App\Http\Controllers\admin\PenerbitController;
use App\Http\Controllers\admin\PengarangController;
use App\Http\Controllers\admin\PustakaController;
use App\Http\Controllers\admin\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\WelcomeController;


// Routes untuk mengelola Jenis Anggota
Route::prefix('admin')->group(function () {
    Route::resource('anggota', AnggotaController::class);
    Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
    Route::delete('/anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
    Route::resource('jenisanggota', JenisAnggotaController::class);
    Route::resource('rak', RakController::class);
    Route::resource('ddc', DdcController::class);
    Route::resource('formats', FormatsController::class);
    Route::resource('penerbit', PenerbitController::class);
    Route::resource('pengarang', PengarangController::class);
    Route::resource('pustaka', PustakaController::class);
    Route::resource('transaksi', TransaksiController::class);
});

// Routes untuk mengelola Pustaka



Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('logout', function() {
    Auth::logout();
    return redirect()->route('welcome');
})->name('logout');

Route::middleware(['checkRole:Y'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
});

Route::get('/user/buku', [UserController::class, 'indexBuku'])->name('user.buku.index');

Route::get('/user/dashboard', function () {
    return view('user.index');
})->name('user.index');

Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.detail');
Route::post('/buku/{id}/reservasi', [ReservasiController::class, 'create'])->name('buku.formReservasi');
Route::post('/buku/reservasi', [ReservasiController::class, 'store'])->name('buku.storeReservasi');
Route::get('/transaksi', [ReservasiController::class, 'transaksi'])->name('buku.transaksi');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');