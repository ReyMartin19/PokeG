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
        <div class="bg-yellow-300 p-3 rounded-2xl">
            <a href="{{ route('login') }}" class="px-4 py-2 text-black hover:bg-red-500 rounded-lg transition-colors">Login</a>
            <a href="{{ route('register') }}" class="ml-4 px-4 py-2 text-black hover:bg-blue-500 rounded-lg transition-colors">Register</a>
        </div>
    </nav>

    <div class="absolute inset-0 opacity-20 flex justify-center items-center pointer-events-none">
        <div class="w-[500px] h-[500px] bg-red-500 rounded-full blur-[120px]"></div>
        <div class="w-[500px] h-[500px] bg-blue-500 rounded-full blur-[120px]"></div>
    </div>

    <div class="z-10 text-white min-h-screen flex items-center justify-center max-w-7xl mx-auto"> 
        @yield('content')
    </div>
    
    <footer class="p-10 text-center text-gray-500 border-t border-gray-800">
        <p>© {{ date('Y') }} PokeG - Powered by Laravel & PokeAPI</p>
    </footer>

</body>
</html>