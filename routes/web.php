<?php

use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ProdukController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('produk')->name('produk.')->group(function () {
    Route::get('/', [ProdukController::class, 'index'])->name('index');
    Route::get('/create', [ProdukController::class, 'create'])->name('create');
    Route::post('/', [ProdukController::class, 'store'])->name('store');
    Route::get('/{id}', [ProdukController::class, 'show'])->name('show');
    Route::get('/data/{id}', [ProdukController::class, 'detail'])->name('detail');
    Route::get('/{id}/edit', [ProdukController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProdukController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProdukController::class, 'destroy'])->name('destroy');
});

Route::prefix('penjualan')->name('penjualan.')->group(function () {
    Route::get('/', [PenjualanController::class, 'index'])->name('index');
    Route::get('/export', [PenjualanController::class, 'export'])->name('export');
    Route::get('/create', [PenjualanController::class, 'create'])->name('create');
    Route::post('/', [PenjualanController::class, 'store'])->name('store');
    Route::get('/{id}', [PenjualanController::class, 'show'])->name('show');
    Route::get('/data/{id}', [PenjualanController::class, 'detail'])->name('detail');
    Route::get('/{id}/edit', [PenjualanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PenjualanController::class, 'update'])->name('update');
    Route::delete('/hapus/{id}', [PenjualanController::class, 'destroy'])->name('destroy');
});

Route::prefix('pos')->name('pos.')->group(function () {
    Route::get('/', [POSController::class, 'index'])->name('index');
    Route::post('/store', [POSController::class, 'store'])->name('store');
});

Route::post('/upload-gambar', [FileUploadController::class, 'upload'])->name('upload-gambar');