@extends('layouts.guest')
@section('content')
<div class="w-full max-w-md p-8 bg-slate-900 border rounded-3xl">
    <h1 class="text-4xl text-center poke-font text-yellow-400 tracking-wider mb-2">TRAINER LOGIN</h1>
    <p class="text-center text-slate-400 text-sm mb-8 uppercase tracking-widest">Enter the Arena</p>
    @include('auth.partials.loginPartial')
    <p class="text-center mt-6 text-sm text-slate-500">
        New to PokeG? <a href="{{ route('register') }}" class="text-yellow-400 hover:underline">Create a Passport</a>
    </p>
</div>
@endsection