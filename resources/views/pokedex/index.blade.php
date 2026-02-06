<!DOCTYPE html>
<html>
<head>
    <title>PokeG - Pokedex</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-4xl font-bold mb-8 text-center text-red-600">PokeG Pokedex</h1>

        <form action="{{ route('pokedex.index') }}" method="GET" class="mb-8 flex flex-wrap gap-4 justify-center">
            <input type="text" name="search" placeholder="Search Pokemon..." 
                   value="{{ request('search') }}"
                   class="border p-2 rounded w-64">
            
            <select name="type" class="border p-2 rounded">
                <option value="">All Types</option>
                @foreach(['fire', 'water', 'grass', 'electric', 'psychic', 'ice', 'dragon', 'dark', 'fairy', 'normal', 'fighting', 'flying', 'poison', 'ground', 'rock', 'bug', 'ghost', 'steel'] as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                        {{ ucfirst($type) }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Filter</button>
            <a href="{{ route('pokedex.index') }}" class="bg-gray-300 px-6 py-2 rounded hover:bg-gray-400">Reset</a>
        </form>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach($pokemon as $p)
                <div class="bg-white p-4 rounded-xl shadow-md text-center border-t-4 border-red-500 hover:scale-105 transition-transform">
                    <span class="text-gray-400 text-sm font-bold">#{{ $p->pokeapi_id }}</span>
                    <img src="{{ $p->sprite_url }}" alt="{{ $p->name }}" class="mx-auto w-24 h-24">
                    <h2 class="text-xl font-bold capitalize">{{ $p->name }}</h2>
                    <div class="flex justify-center gap-1 mt-2">
                        <span class="px-2 py-1 text-xs rounded bg-gray-200">{{ $p->type_1 }}</span>
                        @if($p->type_2)
                            <span class="px-2 py-1 text-xs rounded bg-gray-200">{{ $p->type_2 }}</span>
                        @endif
                    </div>
                    <div class="mt-3 text-sm text-gray-600">
                        <p>HP: {{ $p->hp }} | ATK: {{ $p->attack }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $pokemon->links() }}
        </div>
    </div>

</body>
</html>