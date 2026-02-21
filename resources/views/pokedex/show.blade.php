@extends('layouts.app')

@section('content')
<div class="mt-10 max-w-4xl mx-auto">
    <a href="/" class="text-gray-500 mb-5 block">← Back to Pokedex</a>

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col md:flex-row">
        <div class="bg-gray-100 p-10 flex flex-col items-center justify-center">
            <img src="{{ $pokemon->sprite_url }}" class="w-64 h-64 object-contain">
            <div class="flex gap-2 mt-4">
                <span class="px-4 py-1 rounded-full bg-red-500 text-white">{{ $pokemon->type_1 }}</span>
                @if($pokemon->type_2)
                    <span class="px-4 py-1 rounded-full bg-blue-500 text-white">{{ $pokemon->type_2 }}</span>
                @endif
            </div>
        </div>

        <div class="p-10 flex-1">
            <h1 class="text-4xl font-bold capitalize mb-4 text-black">{{ $pokemon->name }}</h1>
            
            <div class="space-y-4">
                <div>
                    <p class="text-gray-500 text-sm">HP ({{ $pokemon->hp }})</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-500 h-2.5 rounded-full" style="width: {{ ($pokemon->hp / 255) * 100 }}%"></div>
                    </div>
                </div>
                <div>
                    <p class="text-gray-500 text-sm">Attack ({{ $pokemon->attack }})</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-red-500 h-2.5 rounded-full" style="width: {{ ($pokemon->attack / 190) * 100 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection