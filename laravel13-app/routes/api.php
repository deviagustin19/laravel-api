<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// CRUD KATEGORI
Route::apiResource('categories', CategoryController::class);

// SUMMARY PRODUK
Route::get('/products/summary', [ProductController::class, 'summary']);

// CRUD PRODUK
Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/trashed', [ProductController::class, 'trashed']);
Route::post('/products/{id}/restore', [ProductController::class, 'restore']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
