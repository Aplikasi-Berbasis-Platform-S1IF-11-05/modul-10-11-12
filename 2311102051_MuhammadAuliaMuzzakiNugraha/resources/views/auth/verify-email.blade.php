<x-guest-layout>
    <h1 class="brand-title text-2xl font-bold text-slate-100">Verifikasi Email</h1>
    <p class="mt-2 text-sm text-muted">
        Sebelum melanjutkan, silakan verifikasi email Anda melalui tautan yang sudah dikirimkan ke inbox.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="mt-4 mb-4 rounded-xl border border-emerald-500/30 bg-emerald-900/25 p-3 text-sm text-emerald-300">
            Tautan verifikasi baru telah dikirim ulang ke email Anda.
        </div>
    @endif

    <div class="mt-5 space-y-3">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit" class="btn-crimson w-full">Kirim Ulang Email Verifikasi</button>
        </form>

        <div class="flex items-center justify-between text-sm">
            <a href="{{ route('home') }}" class="text-muted hover:text-slate-100">Kembali ke Beranda</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-muted hover:text-slate-100">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
