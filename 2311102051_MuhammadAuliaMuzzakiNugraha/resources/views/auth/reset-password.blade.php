<x-guest-layout>
    <h1 class="brand-title text-2xl font-bold text-slate-100">Reset Password</h1>
    <p class="mt-2 text-sm text-muted">
        Buat password baru untuk akun admin Anda agar dapat kembali masuk ke panel pengelolaan.
    </p>

    <form method="POST" action="{{ route('password.store') }}" class="mt-5 space-y-5">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="mb-2 block text-sm font-semibold text-slate-200">Email</label>
            <input
                id="email"
                class="input-field"
                type="email"
                name="email"
                value="{{ old('email', $request->email) }}"
                required
                autofocus
                autocomplete="username"
            >
            @error('email')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="mb-2 block text-sm font-semibold text-slate-200">Password Baru</label>
            <input
                id="password"
                class="input-field"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Masukkan password baru"
            >
            @error('password')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-200">Konfirmasi Password Baru</label>
            <input
                id="password_confirmation"
                class="input-field"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Ulangi password baru"
            >
            @error('password_confirmation')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-crimson w-full">Simpan Password Baru</button>

        <div class="flex items-center justify-between text-sm">
            <a href="{{ route('home') }}" class="text-muted hover:text-slate-100">Kembali ke Beranda</a>
            <a href="{{ route('login') }}" class="text-muted hover:text-slate-100">Kembali ke Login</a>
        </div>
    </form>
</x-guest-layout>
