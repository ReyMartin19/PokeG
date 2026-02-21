<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\BattleController;

Route::get('/', [PokemonController::class, 'index'])->name('pokedex.index');

//pokedex
Route::get('/battle', [PokemonController::class, 'battle'])->name('pokedex.battle');
Route::get('/cards', [PokemonController::class, 'cards'])->name('pokedex.cards');
