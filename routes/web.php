<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BattleController;

Route::get('/', function () {
    return redirect()->route('pokedex.index');
});

//pokedex
Route::get('/pokedex', [PokemonController::class, 'index'])->middleware('auth')->name('pokedex.index');
Route::get('/battle', [PokemonController::class, 'battle'])->middleware('auth')->name('pokedex.battle');
Route::get('/cards', [PokemonController::class, 'cards'])->middleware('auth')->name('pokedex.cards');

//auth
Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//battle
Route::middleware('auth')->group(function () {
    Route::get('/battle/init', [BattleController::class, 'createQuickMatch'])->name('battle.init');
    Route::get('/battle/arena', function() {
        return view('pokedex.battle.arena', ['state' => session('battle_state')]);
    })->name('battle.arena');
    Route::post('/battle/attack', [BattleController::class, 'attack'])->name('battle.attack')->middleware('auth');
});