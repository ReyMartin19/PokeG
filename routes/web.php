<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\BattleController;

Route::get('/', [PokemonController::class, 'index'])->name('pokedex.index');

//pokedex
Route::get('/battle', [PokemonController::class, 'battle'])->name('pokedex.battle');
Route::get('/cards', [PokemonController::class, 'cards'])->name('pokedex.cards');

//battle
Route::get('/battle/init', [BattleController::class, 'createQuickMatch'])->name('battle.init');
Route::get('/battle/arena', function() {
    return view('pokedex.battle.arena', ['state' => session('battle_state')]);
})->name('battle.arena');
Route::post('/battle/attack', [BattleController::class, 'attack'])->name('battle.attack');
