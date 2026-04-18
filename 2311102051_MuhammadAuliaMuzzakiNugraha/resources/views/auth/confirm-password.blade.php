<x-guest-layout>
    <h1 class="brand-title text-2xl font-bold text-slate-100">Konfirmasi Password</h1>
    <p class="mt-2 text-sm text-muted">
        Demi keamanan, masukkan kembali password Anda sebelum melanjutkan.
    </p>

    <form method="POST" action="{{ route('password.confirm') }}" class="mt-5 space-y-5">
        @csrf

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

        <button type="submit" class="btn-crimson w-full">Konfirmasi</button>

        <div class="text-center text-sm">
            <a href="{{ route('home') }}" class="text-muted hover:text-slate-100">Kembali ke Beranda</a>
        </div>
    </form>
</x-guest-layout>
