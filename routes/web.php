<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Models\Pemasukan;
use GuzzleHttp\Middleware;

require __DIR__.'/auth.php';


Route::get('/seed', [RekapController::class, 'seed'])->name('seed')->middleware('guest');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/rekap/{tahun}', [RekapController::class, 'index'])->name('rekap');
    Route::get('/rekap-excel', [RekapController::class, 'rekap'])->name('rekap-excel');

    Route::group(['prefix' => 'pemasukan'], function()
    {
        Route::get('/', [PemasukanController::class, 'index'])->name('pemasukan.index');
        Route::get('/create', [PemasukanController::class, 'create'])->name('pemasukan.create')->middleware('superadmin');
        Route::post('/store', [PemasukanController::class, 'store'])->name('pemasukan.store')->middleware('superadmin');
        Route::delete('/destroy/{id}', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy')->middleware('superadmin');
        Route::get('/edit/{id}', [PemasukanController::class, 'edit'])->name('pemasukan.edit')->middleware('superadmin');
        Route::put('/update/{id}', [PemasukanController::class, 'update'])->name('pemasukan.update')->middleware('superadmin');

        Route::get('/drop', [PemasukanController::class, 'drop'])->name('pemasukan.drop')->middleware('superadmin');
        Route::get('/export-excel', [PemasukanController::class, 'export'])->name('pemasukan.export');
    });

    Route::group(['prefix' => 'pengeluaran'], function()
    {
        Route::get('/', [PengeluaranController::class, 'index'])->name('pengeluaran.index');
        Route::get('/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create')->middleware('superadmin');
        Route::post('/store', [PengeluaranController::class, 'store'])->name('pengeluaran.store')->middleware('superadmin');
        Route::delete('/destroy/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy')->middleware('superadmin');
        Route::get('/edit/{id}', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
        Route::put('/update/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update')->middleware('superadmin');

        Route::get('/drop', [PengeluaranController::class, 'drop'])->name('pengeluaran.drop')->middleware('superadmin');
        Route::get('/export-excel', [PengeluaranController::class, 'export'])->name('pengeluaran.export');
    });
});