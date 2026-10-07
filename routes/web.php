<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.process');
});




Route::middleware('auth')->group(function () {

    // Dashboard sementara
    Route::get('/', function () {
    $barangs = \App\Models\Barang::withSum('barangMasuk', 'jumlah')
        ->withSum('barangKeluar', 'jumlah')
        ->orderBy('nama_barang')
        ->get();

    $totalBarang = $barangs->count();

    $totalMasuk = $barangs->sum(function ($barang) {
        return (float) ($barang->barang_masuk_sum_jumlah ?? 0);
    });

    $totalKeluar = $barangs->sum(function ($barang) {
        return (float) ($barang->barang_keluar_sum_jumlah ?? 0);
    });

    $totalStok = $barangs->sum(function ($barang) {
        return (float) $barang->stock_awal
            + (float) ($barang->barang_masuk_sum_jumlah ?? 0)
            - (float) ($barang->barang_keluar_sum_jumlah ?? 0);
    });

    $stokRendah = $barangs->filter(function ($barang) {
        $available =
            (float) $barang->stock_awal
            + (float) ($barang->barang_masuk_sum_jumlah ?? 0)
            - (float) ($barang->barang_keluar_sum_jumlah ?? 0);

        return $available <= (float) $barang->min;
    })->count();

    return view('dashboard', compact(
        'barangs',
        'totalBarang',
        'totalMasuk',
        'totalKeluar',
        'totalStok',
        'stokRendah'
    ));
})->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Data Barang
    Route::resource('barang', BarangController::class);

    // Barang Masuk
    Route::resource('barang-masuk', BarangMasukController::class);

    // Barang Keluar
    Route::resource('barang-keluar', BarangKeluarController::class);
});