<form action="{{ route('register.post') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="text-xs font-bold text-white uppercase">Name</label>
        <input type="text" name="name" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
    </div>

    <div>
        <label class="text-xs font-bold text-white uppercase">Email</label>
        <input type="email" name="email" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="text-xs font-bold text-white uppercase">Password</label>
            <input type="password" name="password" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
        </div>
        <div>
            <label class="text-xs font-bold text-white uppercase">Confirm</label>
            <input type="password" name="password_confirmation" required class="w-full bg-slate-800 border-none rounded-xl p-3 focus:ring-2 focus:ring-yellow-400 outline-none mt-1">
        </div>
    </div>

    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl shadow-lg transition-all transform mt-4">
        BECOME A MASTER
    </button>
</form>