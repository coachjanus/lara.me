<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\BrandController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'index']);

Route::get('/admin/brands', [BrandController::class, 'index']);

Route::get('/admin/brands/create', [BrandController::class, 'create']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands.index');

    Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');

    Route::post('/admin/brands/store', [BrandController::class, 'store'])->name('admin.brands.store');
});
