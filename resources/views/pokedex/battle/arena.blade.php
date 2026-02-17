@extends('layouts.app')

@section('content')
<div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-3 gap-8">
    
    <div class="mt-8 flex justify-center gap-2">
        @foreach($state['player']['cards'] as $index => $card)
            <div class="w-16 h-20 rounded-lg border {{ $index == $state['player']['active_index'] ? 'border-yellow-400 bg-slate-700' : 'border-slate-700 bg-slate-900 opacity-50' }} p-1 text-center">
                <img src="{{ $card['sprite_url'] }}" class="w-10 h-10 mx-auto">
                <p class="text-[8px] uppercase font-bold text-white">{{ $card['name'] }}</p>
                
                <div class="w-full bg-gray-800 h-1 mt-1 rounded-full">
                    <div class="bg-green-500 h-full" style="width: {{ ($card['hp'] / $card['hp'] ?? 100) * 100 }}%"></div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex flex-col justify-center space-y-4">
        <div class="bg-black/50 p-4 rounded-xl h-48 overflow-y-auto text-sm font-mono text-green-400 border border-slate-700">
            @foreach($state['log'] as $line)
                <p>> {{ $line }}</p>
            @endforeach
        </div>
        
        <form action="{{ route('battle.attack') }}" method="POST">
            @csrf
            <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-500 rounded-xl font-bold text-xl shadow-lg transition-transform active:scale-95">
                ATTACK!
            </button>
        </form>
    </div>

    <div class="mt-8 flex justify-center gap-2">
        @foreach($state['bot']['cards'] as $index => $card)
            <div class="w-16 h-20 rounded-lg border {{ $index == $state['bot']['active_index'] ? 'border-yellow-400 bg-slate-700' : 'border-slate-700 bg-slate-900 opacity-50' }} p-1 text-center">
                <img src="{{ $card['sprite_url'] }}" class="w-10 h-10 mx-auto">
                <p class="text-[8px] uppercase font-bold text-white">{{ $card['name'] }}</p>
                
                <div class="w-full bg-gray-800 h-1 mt-1 rounded-full">
                    <div class="bg-green-500 h-full" style="width: {{ ($card['hp'] / $card['hp'] ?? 100) * 100 }}%"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection