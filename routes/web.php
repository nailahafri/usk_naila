<?php

use App\Models\Buku;
use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Http\Controllers\LoginAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BukuDipinjamController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\AdminPustakawanController;

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


Route::middleware(['guest', 'guest:admin', 'guest:anggota'])->group(function () {
    Route::get('/login', function () {
        return view('login', [
            'title' => 'Login Anggota'
        ]);
    });

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    
    Route::get('/login/admin-pustakawan', function () {
        return view('login-admin', [
            'title' => 'Login Admin-Pustakawan'
        ]);
    });
    Route::post('/login/admin-pustakawan', [LoginAdmin::class, 'authenticate']);

});


Route::get('/', function () {
    if(Auth::guard('anggota')->check()) {
        return redirect('/buku-dipinjam');
    }
    return view('index', [
        'title' => 'Home'
    ]);
});


Route::middleware('auth:anggota')->group(function (){
    Route::get('/buku-dipinjam', [BukuDipinjamController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'anggota' => Anggota::count(),
            'admin' => Admin::count(),
            'buku' => Buku::count(),
            'kategori' => Kategori::count(),
            'peminjaman' => DetailPeminjaman::whereNull('f_tanggalkembali')->count(),
            'pengembalian' => DetailPeminjaman::whereNotNull('f_tanggalkembali')->count(),
        ]);
    });
    
    
    Route::post('/logout/admin', [LoginAdmin::class, 'logout']);
    
    Route::resource('/dashboard/entri-peminjaman', PeminjamanController::class)->parameters([
        'entri-peminjaman' => 'peminjaman'
    ]);
    
    Route::resource('/dashboard/entri-pengembalian', PengembalianController::class)->parameters([
        'entri-pengembalian' => 'peminjaman'
    ]); 
    
    Route::get('/dashboard/laporan', [LaporanController::class, 'index']);
    Route::get('/dashboard/laporan/cetak-pdf', [LaporanController::class, 'cetakpdf']);
    Route::get('/dashboard/laporan/cetak-pdfv', [LaporanController::class, 'cetakpdfview']);
    
    Route::middleware('can:admin')->group(function(){
        
        Route::resource('/dashboard/anggota', AnggotaController::class)->parameters([
            'anggota' => 'anggota'
        ]);
        
        Route::resource('/dashboard/buku', BukuController::class)->parameters([
            'buku'  => 'buku'
        ]);
        
        Route::resource('/dashboard/kategori', KategoriController::class)->parameters([
            'kategori'  => 'kategori'
        ]);
        
        Route::resource('/dashboard/admin-pustakawan', AdminPustakawanController::class)->parameters([
            'admin-pustakawan' => 'admin'
        ]);
    });
});