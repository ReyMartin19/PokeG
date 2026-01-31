<?php

use Illuminate\Support\Facades\Route;
use App\Models\Pokemon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-pokedex', function () {
    // Get random 10 pokemon
    $pokemon = Pokemon::inRandomOrder()->limit(10)->get();
    
    return view('test-pokedex', ['pokemon' => $pokemon]);
});