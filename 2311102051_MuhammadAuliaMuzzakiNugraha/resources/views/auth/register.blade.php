<x-guest-layout>
    <h1 class="brand-title text-2xl font-bold text-slate-100">Daftar Akun Admin</h1>
    <p class="mt-2 text-sm text-muted">
        Buat akun baru untuk mengelola kategori dan produk Festival Kuliner Ngawi Timur.
    </p>

    <form method="POST" action="{{ route('register') }}" class="mt-5 space-y-5">
        @csrf

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-slate-200">Nama Lengkap</label>
            <input
                id="name"
                class="input-field"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="Masukkan nama lengkap"
            >
            @error('name')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="mb-2 block text-sm font-semibold text-slate-200">Email</label>
            <input
                id="email"
                class="input-field"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                placeholder="nama@email.com"
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
                autocomplete="new-password"
                placeholder="Minimal 8 karakter"
            >
            @error('password')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-slate-200">Konfirmasi Password</label>
            <input
                id="password_confirmation"
                class="input-field"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Ulangi password"
            >
            @error('password_confirmation')
                <p class="mt-2 text-sm text-rose-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-crimson w-full">Daftarkan Akun</button>

        <div class="flex items-center justify-between text-sm">
            <a href="{{ route('home') }}" class="text-muted hover:text-slate-100">Kembali ke Beranda</a>
            <a href="{{ route('login') }}" class="text-muted hover:text-slate-100">Sudah punya akun?</a>
        </div>
    </form>
</x-guest-layout>
