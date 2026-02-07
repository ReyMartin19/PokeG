<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Configuration\Middleware as ConfigurationMiddleware;

Route::get('/', function () {
    return view('index');
})->middleware('guest');

Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/pokedex', [PokemonController::class, 'index'])->name('pokedex.index');

//auth
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');