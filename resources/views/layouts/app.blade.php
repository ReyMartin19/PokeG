<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokeG | Battle to be the Best</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .pokemon-font { font-family: 'Bangers', cursive; letter-spacing: 2px; }
        .hero-gradient { background: linear-gradient(135deg, #ee1515 0%, #2a75bb 100%); }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white font-sans">

    <nav class="flex justify-between items-center p-6 max-w-7xl mx-auto">
        <div class="text-3xl font-bold pokemon-font text-yellow-400"><a href="/">PokeG</a></div>
        <div>
            <a href="{{ route('pokedex.battle') }}" class="tab-btn px-6 py-3 text-lg font-semibold border-b-2 border-transparent hover:border-blue-500">
                Battle
            </a>
            <a href="{{ route('pokedex.cards') }}" class="tab-btn px-6 py-3 text-lg font-semibold border-b-2 border-transparent hover:border-blue-500">
                Cards
            </a>
        </div>
    </nav>

    <div class="absolute inset-0 opacity-20 flex justify-center items-center pointer-events-none">
        <div class="w-125 h-125 bg-red-500 rounded-full blur-[120px]"></div>
        <div class="w-125 h-125 bg-blue-500 rounded-full blur-[120px]"></div>
    </div>

    <div class="z-10 text-white min-h-screen flex justify-center max-w-7xl mx-auto"> 
        @yield('content')
    </div>
    
    <footer class="p-10 text-center text-gray-500 border-t border-gray-800">
        <p>© {{ date('Y') }} PokeG - Powered by Laravel & PokeAPI</p>
    </footer>
</body>
</html>

