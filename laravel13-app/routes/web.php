<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductWebController;

// CRUD Kategori
Route::apiResource('categories', CategoryController::class);

// Produk
Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

// Menampilkan produk yang sudah dihapus
Route::get('/products/trashed', [ProductController::class, 'trashed']);

// Memulihkan produk
Route::post('/products/{id}/restore', [ProductController::class, 'restore']);

// Detail, edit, dan hapus produk
Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');

Route::put('/products/{id}', [ProductController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
    ->name('products.destroy');

// CRUD PRODUK BLADE
Route::get('/produk', [ProductWebController::class, 'index'])
    ->name('produk.index');

Route::get('/produk/create', [ProductWebController::class, 'create'])
    ->name('produk.create');

Route::post('/produk', [ProductWebController::class, 'store'])
    ->name('produk.store');

Route::get('/produk/{id}/edit', [ProductWebController::class, 'edit'])
    ->name('produk.edit');

Route::put('/produk/{id}', [ProductWebController::class, 'update'])
    ->name('produk.update');

Route::delete('/produk/{id}', [ProductWebController::class, 'destroy'])
    ->name('produk.destroy');