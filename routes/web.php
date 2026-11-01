<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PdfController;

Route::get('/', function () {
    return view('home');
});

// ::::PRODUCTS::::
Route::middleware('auth', 'admin')->group(
    function () {
        Route::get('/products/create', [ProductController::class, 'create']);
        Route::get('/products/edit/{product}', [ProductController::class, 'edit']);
        Route::post('/products/store', [ProductController::class, 'store']);
        Route::put('/products/update/{product}', [ProductController::class, 'update']);
        Route::delete('/products/destroy/{product}', [ProductController::class, 'destroy']);
    }
);

Route::get('/products/show', [ProductController::class, 'index']) 
->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PDFs

Route::get('/pdf/products', [PdfController::class, 'productos']);