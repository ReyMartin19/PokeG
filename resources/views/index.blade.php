@extends('layouts.app')
@section('content')
<div class="flex flex-col">
    <div class="z-10 text-white flex items-center justify-center max-w-7xl m-8"> 
        <div class="z-10 px-4 text-center">
            <h1 class="text-6xl md:text-8xl pokemon-font text-yellow-400 drop-shadow-lg mb-4 ">
                WELCOME BACK, TRAINER.
            </h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto">
        <form action="{{ route('pokedex.index') }}" method="GET" class="mb-8 flex flex-wrap gap-4 justify-center">
            <input type="text" name="search" placeholder="Search Pokemon..." 
                   value="{{ request('search') }}"
                   class="border p-2 rounded w-64">
        </form>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8">
            @foreach($pokemon->take(4) as $p)
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
    </div>
</div>
@endsection