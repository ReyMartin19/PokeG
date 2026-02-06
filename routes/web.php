<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pokemon;
use App\Http\Controllers\PokemonController;

Route::get('/', function () {
    // Get random 10 pokemon
    $pokemon = Pokemon::inRandomOrder()->limit(20)->get();
    
    return view('welcome', ['pokemon' => $pokemon]);
});

Route::get('/pokedex', [PokemonController::class, 'index'])->name('pokedex.index');