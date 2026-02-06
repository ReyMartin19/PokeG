<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Request $request)
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
        $pokemon = $query->paginate(20)->withQueryString();

        return view('pokedex.index', compact('pokemon'));
    }
}