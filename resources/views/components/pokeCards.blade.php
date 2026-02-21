@foreach($pokemon as $p)
    <a href="{{ route('pokemon.show', $p->id) }}">
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
    </a>
@endforeach