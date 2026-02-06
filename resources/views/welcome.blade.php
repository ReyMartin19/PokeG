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
</head>
<body class="bg-gray-900 text-white font-sans">

    <nav class="flex justify-between items-center p-6 max-w-7xl mx-auto">
        <div class="text-3xl font-bold pokemon-font text-yellow-400 italic">PokeG</div>
        <div class="space-x-6">
            <a href="/login" class="bg-yellow-400 text-black px-5 py-2 rounded-full font-bold hover:bg-yellow-300 transition">Login / Register</a>
        </div>
    </nav>

    <header class="relative h-[80vh] flex items-center justify-center text-center overflow-hidden">
        <div class="z-10 px-4">
            <h1 class="text-6xl md:text-8xl pokemon-font text-yellow-400 drop-shadow-lg mb-4">
                BATTLE. COLLECT. CONQUER.
            </h1>
            <p class="text-xl md:text-2xl text-gray-200 mb-8 max-w-2xl mx-auto">
                The ultimate browser-based Pokemon card battler. Use the power of the PokeAPI to build your dream team and climb the ranks.
            </p>
        </div>
        
        <div class="absolute inset-0 opacity-20 flex justify-center items-center pointer-events-none">
             <div class="w-[500px] h-[500px] bg-red-500 rounded-full blur-[120px]"></div>
             <div class="w-[500px] h-[500px] bg-blue-500 rounded-full blur-[120px]"></div>
        </div>
    </header>
    <footer class="p-10 text-center text-gray-500 border-t border-gray-800">
        <p>© {{ date('Y') }} PokeG - Powered by Laravel & PokeAPI</p>
    </footer>

</body>
</html>