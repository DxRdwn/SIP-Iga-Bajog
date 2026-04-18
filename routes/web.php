<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes (Customer)
Route::get('/', [MenuController::class, 'user'])->name('home');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/struk/{id}', [OrderController::class, 'struk'])->name('order.struk');

// Protected Routes (Admin)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Orders
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/strukin/{id}', [OrderController::class, 'strukin'])->name('order.strukadmin');
    Route::get('/admin/orders/status/{id}', [OrderController::class, 'updateStatus'])->name('order.updateStatus');

    // Admin Catalog
    Route::resource('kategori', KategoriController::class)->names('admin.kategori')->except(['create', 'edit', 'update', 'show']);
    Route::resource('produk', ProdukController::class);

    // Admin Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';