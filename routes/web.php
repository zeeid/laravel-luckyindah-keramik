<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', [LaporanController::class, 'index']); // Halaman Utama
Route::get('/export-excel', [LaporanController::class, 'exportExcel'])->name('export.excel');

Route::controller(MahasiswaController::class)
    ->prefix('mahasiswa')        // URL diawali dengan /mahasiswa
    ->name('mahasiswa.')         // Nama route diawali dengan mahasiswa.
    ->group(function () {
        
        // Custom Route (Ditaruh diatas agar tidak tertimpa route ID)
        Route::get('/export-excel', 'exportExcel')->name('export.excel');

        // Standard CRUD Routes
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

Route::controller(MataKuliahController::class)
->prefix('matakuliah')       // URL diawali dengan /matakuliah
->name('matakuliah.')        // Nama route diawali dengan matakuliah.
->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

Route::controller(KrsController::class)
    ->prefix('krs')              // URL diawali dengan /krs
    ->name('krs.')               // Nama route diawali dengan krs.
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        
        // Route khusus untuk Edit & Delete dengan 2 Parameter (M# dan Kode MK)
        Route::get('/{m_id}/{kode_mk}/edit', 'edit')->name('edit');
        Route::put('/{m_id}/{kode_mk}', 'update')->name('update');
        Route::delete('/{m_id}/{kode_mk}', 'destroy')->name('destroy');
    });