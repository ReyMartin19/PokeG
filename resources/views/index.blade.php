@extends('layouts.app')
@section('content')
<div class="flex flex-col mt-10">
    <div class="z-10 text-white flex items-center justify-center max-w-7xl m-8"> 
        <div class="z-10 px-4 text-center">
            <h1 class="text-6xl md:text-8xl pokemon-font text-yellow-400 drop-shadow-lg mb-4 ">
                WELCOME TRAINER.
            </h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-8">
            @include('components.pokeCards')
        </div>
    </div>
</div>
@endsection