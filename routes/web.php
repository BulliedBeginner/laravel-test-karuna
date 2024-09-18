<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;

Route::get('/', [productsController::class, 'index'])->name('products.index');

// products view routes
Route::get('/create', function () { return view('products.create'); })->name('products.create');
Route::get('/show/{id}', action: [ProductsController::class, 'show'])->name('products.show');

// products API
Route::post('/create', [productsController::class, 'create'])->name('products.create');
Route::get('/edit/{id}', action: [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/edit/{id}', [productsController::class, 'update'])->name('products.update');
Route::delete('/delete/{id}', [productsController::class, 'delete'])->name('products.delete');
Route::get('/products/search', [ProductsController::class, 'search'])->name('products.search');