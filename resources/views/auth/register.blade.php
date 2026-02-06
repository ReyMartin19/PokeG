@extends('layouts.auth')
@section('content')
<div class="w-full max-w-md p-8 bg-slate-900 border-2 border-blue-600 rounded-3xl shadow-[0_0_20px_rgba(37,99,235,0.3)]">
    <h1 class="text-4xl text-center poke-font text-yellow-400 tracking-wider mb-2">JOIN THE LEAGUE</h1>
    <p class="text-center text-slate-400 text-sm mb-8 uppercase tracking-widest">Register Your Trainer Name</p>

    <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="text-xs font-bold text-blue-500 uppercase">Full Name</label>
            <input type="text" name="name" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
        </div>

        <div>
            <label class="text-xs font-bold text-blue-500 uppercase">Email</label>
            <input type="email" name="email" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-xs font-bold text-blue-500 uppercase">Password</label>
                <input type="password" name="password" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
            </div>
            <div>
                <label class="text-xs font-bold text-blue-500 uppercase">Confirm</label>
                <input type="password" name="password_confirmation" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
            </div>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl shadow-lg transition-all transform mt-4">
            BECOME A MASTER
        </button>
    </form>

    <p class="text-center mt-6 text-sm text-slate-500">
        Already a member? <a href="{{ route('login') }}" class="text-yellow-400 hover:underline">Sign In</a>
    </p>
</div>
@endsection