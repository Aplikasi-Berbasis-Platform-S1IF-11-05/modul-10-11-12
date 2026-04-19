{{--Buswiryawan Raditya Boenyamin
2311102090 --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Festival Makanan - Restoran Jakobi')</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root { --red:#C0392B; --gold:#D4A017; --cream:#FDF6E3; --dark:#1A0A00; --brown:#5C3317; }
        body { font-family:'Lato',sans-serif; background:var(--cream); color:var(--dark); }

        header { background:var(--dark); color:var(--cream); text-align:center; padding:2.5rem 1rem 2rem; }
        header h1 { font-family:'Playfair Display',serif; font-size:clamp(1.8rem,5vw,3.5rem); font-weight:900; }
        header h1 span { color:var(--gold); }
        header p { margin-top:.5rem; font-size:13px; color:rgba(253,246,227,.6); letter-spacing:1px; }
        .header-divider { margin:1.2rem auto 0; width:60px; height:2px; background:var(--gold); }

        nav.top-nav { background:var(--brown); display:flex; justify-content:center; gap:1rem; padding:.6rem 1rem; }
        nav.top-nav a {
            color:var(--cream); text-decoration:none; font-size:13px; font-weight:700;
            letter-spacing:1px; text-transform:uppercase; padding:4px 14px; border-radius:4px; transition:background .2s;
        }
        nav.top-nav a:hover, nav.top-nav a.active { background:var(--red); }

        main { max-width:1200px; margin:0 auto; padding:2.5rem 1.5rem 4rem; }

        .alert { padding:.85rem 1.2rem; border-radius:8px; margin-bottom:1.5rem; font-size:14px; font-weight:700; }
        .alert-success { background:#E8F5E9; color:#2E7D32; border:1px solid #A5D6A7; }
        .alert-error   { background:#FFEBEE; color:#C62828; border:1px solid #EF9A9A; }

        footer { background:var(--dark); color:rgba(253,246,227,.5); text-align:center; padding:1.5rem; font-size:12px; }
        footer strong { color:var(--gold); }
    </style>
    @stack('styles')
</head>
<body>
<header>
    <div style="font-size:11px;letter-spacing:3px;text-transform:uppercase;color:var(--gold);margin-bottom:.75rem;border:1px solid var(--gold);display:inline-block;padding:3px 14px;">Festival Kuliner Ngawi</div>
    <h1>Restoran <span>Jakobi</span></h1>
    <p>Cita Rasa Asli &mdash; Ngawi Timur &bull; Sejak 1995</p>
    <div class="header-divider"></div>
</header>
<nav class="top-nav">
    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">&#8962; Menu</a>
    <a href="{{ route('products.create') }}" class="{{ request()->routeIs('products.create') ? 'active' : '' }}">+ Tambah Produk</a>
</nav>
<main>
    @if(session('success'))
        <div class="alert alert-success">&#10003; {{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $e) {{ $e }}<br> @endforeach
        </div>
    @endif
    @yield('content')
</main>
<footer>
    <p>Restoran Jakobi &mdash; Jl. Ngawi Timur No. 1, Ngawi &bull; Didukung Program Digitalisasi <strong>Ngawi Barat</strong></p>
</footer>
@stack('scripts')
</body>
</html>