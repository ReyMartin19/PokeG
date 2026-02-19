<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Request $request)
    {
        $query = Pokemon::query();

        if ($request->has('search')) {
            // If searching, show matching results
            $pokemon = $query->where('name', 'like', '%' . $request->search . '%')->get();
        } else {
            // If not searching, show 4 random ones
            $pokemon = $query->inRandomOrder()->limit(4)->get();
        }

        return view('index', compact('pokemon'));
    }

    public function battle()
    {
        return view('pokedex.battle');
    }

    public function cards()
    {
        return view('pokedex.cards');
    }
}