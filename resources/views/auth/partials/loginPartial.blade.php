<form action="{{ route('login.post') }}" method="POST" class="space-y-6">
    @csrf
    <div>
        <label class="text-xs font-bold text-white uppercase">Email Address</label>
        <input type="email" name="email" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
    </div>

    <div>
        <label class="text-xs font-bold text-white   uppercase">Password</label>
        <input type="password" name="password" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
    </div>

    <button type="submit" class="w-full bg-red-600 hover:bg-red-500 text-white font-bold py-4 rounded-xl shadow-lg transition-all transform active:scale-95">
        START ADVENTURE
    </button>
</form>