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

    public function cards(Request $request)
    {
        // 1. Start a query
        $query = Pokemon::query();

        // 2. Filter by Name (if user typed something)
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // 3. Filter by Type (if user selected a type)
        if ($request->filled('type')) {
            $query->where(function($q) use ($request) {
                $q->where('type_1', $request->type)
                  ->orWhere('type_2', $request->type);
            });
        }

        // 4. Get results with Pagination (show 20 per page)
        $pokemon = $query->paginate(8)->withQueryString();

        return view('pokedex.cards', compact('pokemon'));
    }
}