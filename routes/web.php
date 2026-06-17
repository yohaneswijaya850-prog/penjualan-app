<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;

Route::get('/login',
    [AuthController::class,'loginForm'])
    ->name('login');

Route::post('/login',
    [AuthController::class,'login']);

Route::get('/logout',
    [AuthController::class,'logout']);

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/transaksi', function () {
    return view('transaksi');
})->middleware('auth');

Route::middleware('auth')->group(function(){

    Route::get(
        '/kategori',
        [CategoryController::class,'index']
    );

    Route::get(
        '/kategori/tambah',
        [CategoryController::class,'create']
    );

    Route::post(
        '/kategori/simpan',
        [CategoryController::class,'store']
    );

    Route::get(
        '/kategori/edit/{id}',
        [CategoryController::class,'edit']
    );

    Route::post(
        '/kategori/update/{id}',
        [CategoryController::class,'update']
    );

    Route::get(
        '/kategori/hapus/{id}',
        [CategoryController::class,'destroy']
    );

});