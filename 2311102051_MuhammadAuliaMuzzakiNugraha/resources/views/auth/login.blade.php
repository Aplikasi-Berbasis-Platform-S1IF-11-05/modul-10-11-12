<x-guest-layout>
    <h1 class="brand-title text-2xl font-bold text-slate-100">Login Admin</h1>
    <p class="mt-2 text-sm text-muted">
        Masuk ke panel admin untuk mengelola kategori dan produk Festival Makanan Ngawi Timur.
    </p>

    <x-auth-session-status class="mt-4 mb-4 rounded-xl border border-emerald-500/30 bg-emerald-900/25 p-3 text-sm text-emerald-300" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="mt-5 space-y-5">
        @csrf

        <div>
            <label for="email" class="mb-2 block text-sm font-semibold text-slate-200">Email</label>
            <input
                id="email"
                class="input-field"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="user@example.com"
            >
            @error('email')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-semibold text-slate-200">Password</label>
            <input
                id="password"
                class="input-field"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Masukkan password"
            >
            @error('password')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <label for="remember_me" class="flex items-center gap-2 text-sm text-slate-300">
            <input id="remember_me" type="checkbox" class="h-4 w-4 rounded border-slate-600 bg-slate-900 text-rose-600" name="remember">
            <span>Ingat saya</span>
        </label>

        <button type="submit" class="btn-crimson w-full">Masuk ke Admin Panel</button>

        <div class="flex items-center justify-between text-sm">
            <a href="{{ route('home') }}" class="text-muted hover:text-slate-100">Kembali ke Beranda</a>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-muted hover:text-slate-100">
                    Lupa password?
                </a>
            @endif
        </div>

        @if (Route::has('register'))
            <div class="rounded-xl border border-slate-700/70 bg-slate-900/30 p-3 text-center text-sm text-slate-300">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-semibold text-rose-400 hover:text-rose-300">Daftar akun baru</a>
            </div>
        @endif
    </form>
</x-guest-layout>
