<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', action: [MenuController::class, 'user']);
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');


Route::middleware('auth')->group(function () {
    // ADmin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/order', [OrderController::class, 'index']);
    // routes/web.php
    

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/produk', [MenuController::class, 'index']);
    Route::resource('produk', ProdukController::class);
    Route::resource('kategori', KategoriController::class)->names('admin.kategori')->except(['create', 'edit', 'update', 'show']);
    // routes/web.php
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');

    

    Route::get('/admin/orders/status/{id}', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';