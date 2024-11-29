<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Formulario de login
Route::post('/login', [AuthController::class, 'login']); // Procesar login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Formulario de registro
Route::post('/register', [AuthController::class, 'register']); // Procesar registro

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
