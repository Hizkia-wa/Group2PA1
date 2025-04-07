<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews');
    Route::get('/website', [WebsiteController::class, 'index'])->name('admin.website');
    Route::get('/riwayat/produk', [ProductController::class, 'produk'])->name('admin.riwayat.produk');
    Route::get('/riwayat/ulasan', [ProductController::class, 'ulasan'])->name('admin.riwayat.ulasan');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{ProductID}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{ProductID}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{ProductID}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/{ProductID}/view', [ProductController::class, 'show'])->name('admin.products.view');
    Route::get('/admin/products/{ProductID}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::delete('/admin/products/{ProductID}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::post('/riwayat/restore/{id}', [RiwayatController::class, 'restore'])->name('riwayat.restore');
    Route::delete('/riwayat/delete/{id}', [RiwayatController::class, 'forceDelete'])->name('riwayat.delete');
    });

