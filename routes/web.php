<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Dashboard & Financial Recap Analytics
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Product & Price Management
Route::resource('products', ProductController::class);
Route::patch('products/{product}/quick-price', [ProductController::class, 'quickUpdatePrice'])->name('products.quick-price');

// Invoice Generator & Management
Route::resource('invoices', InvoiceController::class);
Route::patch('invoices/{invoice}/status', [InvoiceController::class, 'updateStatus'])->name('invoices.update-status');

// CSRF Refresh & Session Keep-alive
Route::get('/csrf-token', function () {
    return response()->json([
        'csrf_token' => csrf_token(),
        'status'     => 'active',
        'timestamp'  => now()->toIso8601String(),
    ]);
})->name('csrf.token');

