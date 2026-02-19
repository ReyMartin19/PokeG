@extends('layouts.app')
@section('content')
<div class="flex flex-col gap-7 mt-10">
    <div>
        <form action="{{ route('pokedex.cards') }}" method="GET" class="flex justify-between">
            <input type="text" name="search" placeholder="Search Pokemon..." 
                value="{{ request('search') }}"
                class="border p-2 pl-4 rounded-4xl w-100">
            <div>
                <select name="type" class="border p-2 rounded">
                    <option value="" class="text-black">All Types</option>
                    @foreach(['fire', 'water', 'grass', 'electric', 'psychic', 'ice', 'dragon', 'dark', 'fairy', 'normal', 'fighting', 'flying', 'poison', 'ground', 'rock', 'bug', 'ghost', 'steel'] as $type)
                        <option class="text-black" value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
                
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Filter</button>
                <a href="{{ route('pokedex.cards') }}" class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">Reset</a>
            </div>
        </form>
        <div>

        </div>
    </div>
   <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8">
        @foreach($pokemon as $p)
            <div class="bg-white p-4 rounded-xl shadow-md text-center border-t-4 border-red-500 hover:scale-105 transition-transform">
                <span class="text-gray-400 text-sm font-bold">#{{ $p->pokeapi_id }}</span>
                <img src="{{ $p->sprite_url }}" alt="{{ $p->name }}" class="mx-auto w-24 h-24">
                <h2 class="text-xl font-bold text-black capitalize">{{ $p->name }}</h2>
                <div class="flex justify-center gap-1 mt-2">
                    <span class="px-2 py-1 text-xs rounded text-black bg-gray-200">{{ $p->type_1 }}</span>
                    @if($p->type_2)
                        <span class="px-2 py-1 text-xs rounded text-black bg-gray-200">{{ $p->type_2 }}</span>
                    @endif
                </div>
                <div class="mt-3 text-sm text-gray-600">
                    <p>HP: {{ $p->hp }} | ATK: {{ $p->attack }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div>
        {{ $pokemon->links() }}
    </div>
</div>
@endsection