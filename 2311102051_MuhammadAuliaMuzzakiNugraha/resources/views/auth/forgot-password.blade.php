<x-guest-layout>
    <h1 class="brand-title text-2xl font-bold text-slate-100">Lupa Password</h1>
    <p class="mt-2 text-sm text-muted">
        Masukkan email akun admin. Kami akan mengirimkan tautan reset password ke email tersebut.
    </p>

    <x-auth-session-status class="mt-4 mb-4 rounded-xl border border-emerald-500/30 bg-emerald-900/25 p-3 text-sm text-emerald-300" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="mt-5 space-y-5">
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
                placeholder="user@example.com"
            >
            @error('email')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-crimson w-full">Kirim Link Reset Password</button>

        <div class="flex items-center justify-between text-sm">
            <a href="{{ route('home') }}" class="text-muted hover:text-slate-100">Kembali ke Beranda</a>
            <a href="{{ route('login') }}" class="text-muted hover:text-slate-100">Kembali ke Login</a>
        </div>
    </form>
</x-guest-layout>
