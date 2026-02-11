@extends('layouts.app')

@section('content')
<div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-3 gap-8">
    
    <div class="bg-blue-900/20 p-6 rounded-3xl border-2 border-blue-500 text-center">
        <h3 class="text-xl font-bold mb-4">YOU</h3>
        @php $pCard = $state['player']['cards'][$state['player']['active_index']]; @endphp
        <img src="{{ $pCard['sprite_url'] }}" class="w-48 h-48 mx-auto">
        <h2 class="text-2xl font-black uppercase text-white">{{ $pCard['name'] }}</h2>
        <div class="w-full bg-gray-700 h-4 rounded-full mt-4 overflow-hidden">
            <div class="bg-green-500 h-full" style="width: 100%"></div>
        </div>
        <p class="text-xs mt-2">HP: {{ $pCard['hp'] }} / {{ $pCard['hp'] }}</p>
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

    <div class="bg-red-900/20 p-6 rounded-3xl border-2 border-red-500 text-center">
        <h3 class="text-xl font-bold mb-4">BOT</h3>
        @php $bCard = $state['bot']['cards'][$state['bot']['active_index']]; @endphp
        <img src="{{ $bCard['sprite_url'] }}" class="w-48 h-48 mx-auto">
        <h2 class="text-2xl font-black uppercase text-white">{{ $bCard['name'] }}</h2>
        <div class="w-full bg-gray-700 h-4 rounded-full mt-4 overflow-hidden">
            <div class="bg-red-500 h-full" style="width: 100%"></div>
        </div>
        <p class="text-xs mt-2">HP: {{ $bCard['hp'] }} / {{ $bCard['hp'] }}</p>
    </div>

</div>
@endsection