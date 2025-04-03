<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews');
    Route::get('/website', [WebsiteController::class, 'index'])->name('admin.website');
    Route::get('/riwayat/produk', [RiwayatController::class, 'produk'])->name('admin.riwayat.produk');
    Route::get('/riwayat/ulasan', [RiwayatController::class, 'ulasan'])->name('admin.riwayat.ulasan');
});
