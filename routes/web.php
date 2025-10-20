<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoProductoController;


Route::get('/', function () {
    return view('login');
})->name('login');


Route::post('/login', function () {
    return redirect()->route('dashboard');
})->name('login.post');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('productos', ProductoController::class);
Route::resource('tipoproductos', TipoProductoController::class);
