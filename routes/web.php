<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'frontendLanding'])->name('landing');
Route::get('/produk', [ProductController::class, 'frontendIndex'])->name('home');
Route::get('/product/{product}', [ProductController::class, 'frontendShow'])->name('product.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('supliers', \App\Http\Controllers\SuplierController::class);
    Route::resource('customers', \App\Http\Controllers\CustomerController::class);
    Route::get('transactions', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transactions.index');
});

require __DIR__.'/auth.php';
