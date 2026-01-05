<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::get('/', [LaporanController::class, 'index']); // Halaman Utama
Route::get('/export-excel', [LaporanController::class, 'exportExcel'])->name('export.excel');