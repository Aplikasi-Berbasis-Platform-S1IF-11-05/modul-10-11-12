@if (session('success'))
    <div class="mb-5 rounded-xl border border-emerald-500/40 bg-emerald-900/20 p-3 text-sm text-emerald-300">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-5 rounded-xl border border-rose-500/40 bg-rose-900/20 p-3 text-sm text-rose-300">
        {{ session('error') }}
    </div>
@endif
