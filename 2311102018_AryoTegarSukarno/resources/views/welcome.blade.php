<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan - Restoran Jakobi</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            color: #333;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #003DA5 0%, #0052CC 50%, #FFD100 100%);
            color: white;
            text-align: center;
            padding: 80px 20px 50px;
            position: relative;
            overflow: hidden;
        }

        header h1 {
            font-size: 3.5rem;
            font-weight: 800;
            letter-spacing: 2px;
            position: relative;
            z-index: 1;
            animation: slideDown 0.8s ease-out;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        header p {
            font-size: 1.2rem;
            font-weight: 300;
            position: relative;
            z-index: 1;
            animation: slideDown 0.8s ease-out 0.2s backwards;
            margin-bottom: 20px;
        }

        .badge {
            display: inline-block;
            background: rgba(255,255,255,0.25);
            border: 2px solid #FFD100;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 600;
            position: relative;
            z-index: 1;
            animation: slideDown 0.8s ease-out 0.4s backwards;
            transition: all 0.3s ease;
        }

        .badge:hover {
            background: rgba(255,255,255,0.35);
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(255,209,0,0.3);
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        nav {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            padding: 20px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 15px rgba(0, 61, 165, 0.15);
        }

        nav a {
            display: inline-block;
            margin: 5px 10px;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            background: #f0f0f0;
            color: #003DA5;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            cursor: pointer;
        }

        nav a:hover, nav a.active {
            background: linear-gradient(135deg, #003DA5 0%, #0052CC 100%);
            color: #FFD100;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 61, 165, 0.3);
        }

        .section {
            max-width: 1200px;
            margin: 70px auto;
            padding: 0 20px;
        }

        .section-title {
            font-size: 2.2rem;
            font-weight: 800;
            color: #003DA5;
            margin-bottom: 50px;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: slideInLeft 0.6s ease-out;
            position: relative;
            padding-left: 20px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            width: 5px;
            height: 40px;
            background: linear-gradient(180deg, #FFD100 0%, #003DA5 100%);
            border-radius: 5px;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 61, 165, 0.12);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            animation: fadeInUp 0.6s ease-out;
            border: 2px solid #f0f0f0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 61, 165, 0.2);
            border: 2px solid #FFD100;
        }

        .card-img {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #003DA5 0%, #0052CC 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            position: relative;
            overflow: hidden;
        }

        .card-img::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { left: -100%; }
            50% { left: 100%; }
            100% { left: 100%; }
        }

        .card-body {
            padding: 25px;
        }

        .card-body h3 {
            font-size: 1.2rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 12px;
        }

        .card-body p {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 25px;
            background: #f8f8f8;
            border-top: 1px solid #eee;
        }

        .harga {
            font-size: 1.4rem;
            font-weight: 800;
            background: linear-gradient(135deg, #003DA5 0%, #FFD100 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .badge-kategori {
            font-size: 0.75rem;
            background: linear-gradient(135deg, #E8F2FF 0%, #FFF9E6 100%);
            color: #003DA5;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: 1px solid #FFD100;
        }

        footer {
            background: linear-gradient(180deg, #003DA5 0%, #0052CC 100%);
            color: white;
            text-align: center;
            padding: 50px 20px;
            margin-top: 80px;
            border-top: 3px solid #FFD100;
        }

        footer p {
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        footer strong {
            color: #FFD100;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            header h1 { font-size: 2rem; }
            header p { font-size: 1rem; }
            .section-title { font-size: 1.6rem; }
            .grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
            nav { padding: 15px 10px; }
            nav a { padding: 10px 18px; font-size: 0.8rem; margin: 4px 6px; }
        }
    </style>
</head>
<body>

<header>
    <h1>🍽️ Festival Makanan</h1>
    <p>Menikmati cita rasa terbaik dari Restoran Jakobi, Ngawi Timur</p>
    <span class="badge">🎉 Program Digitalisasi Ngawi Barat</span>
</header>

<nav>
    <a href="#semua" class="active">Semua Menu</a>
    @foreach($kategoris as $kat)
        <a href="#{{ Str::slug($kat) }}">{{ $kat }}</a>
    @endforeach
</nav>

@foreach($kategoris as $kat)
<div class="section" id="{{ Str::slug($kat) }}">
    <h2 class="section-title">
        @if($kat == 'Makanan Utama')
            🍛 Makanan Utama
        @elseif($kat == 'Minuman')
            🥤 Minuman Segar
        @elseif($kat == 'Cemilan')
            🍟 Cemilan Lezat
        @else
            🍽️ {{ $kat }}
        @endif
    </h2>
    <div class="grid">
        @foreach($produks->where('kategori', $kat) as $produk)
        <div class="card">
            <div class="card-img">
                @if($kat == 'Makanan Utama')
                    🍛
                @elseif($kat == 'Minuman')
                    🥤
                @elseif($kat == 'Cemilan')
                    🍟
                @else
                    🍽️
                @endif
            </div>
            <div class="card-body">
                <h3>{{ $produk->nama }}</h3>
                <p>{{ $produk->deskripsi }}</p>
            </div>
            <div class="card-footer">
                <span class="harga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                <span class="badge-kategori">{{ $produk->kategori }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach

<footer>
    <p>&copy; {{ date('Y') }} <strong>Festival Makanan - Restoran Jakobi</strong></p>
    <p style="margin-bottom: 15px;">✨ Bagian dari Program Digitalisasi 19.000 Lapangan Kerja · Ngawi Barat ✨</p>
    <p style="font-size: 0.85rem; color: rgba(255,255,255,0.5);">Cita rasa autentik yang menggugah selera</p>
</footer>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan - Restoran Jakobi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --primary: #c0392b;
            --primary-light: #e67e22;
            --dark: #1a1a1a;
            --gray: #f8f9fa;
            --text: #2c3e50;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 100%);
            color: var(--text);
            min-height: 100vh;
        }

        /* ANIMATED BACKGROUND */
        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            opacity: 0.05;
            animation: float 25s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0) rotate(0deg); }
            50% { transform: translateY(-100px) translateX(50px) rotate(180deg); }
        }

        /* HEADER */
        header {
            background: linear-gradient(135deg, rgba(192, 57, 43, 0.95) 0%, rgba(230, 126, 34, 0.95) 100%);
            backdrop-filter: blur(10px);
            color: white;
            text-align: center;
            padding: 80px 20px 60px;
            position: relative;
            overflow: hidden;
            border-bottom: 2px solid rgba(230, 126, 34, 0.5);
        }

        header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(230, 126, 34, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 4s infinite ease-in-out;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        header h1 {
            font-size: 3.5rem;
            letter-spacing: 3px;
            font-weight: 800;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
            text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            animation: slideDown 0.8s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        header p {
            font-size: 1.2rem;
            margin-top: 10px;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            animation: slideDown 0.8s ease-out 0.2s backwards;
            font-weight: 300;
        }

        .badge {
            display: inline-block;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
            border: 2px solid rgba(255,255,255,0.3);
            backdrop-filter: blur(10px);
            padding: 12px 24px;
            border-radius: 50px;
            margin-top: 20px;
            font-size: 0.9rem;
            position: relative;
            z-index: 1;
            animation: slideDown 0.8s ease-out 0.4s backwards;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .badge:hover {
            background: linear-gradient(135deg, rgba(255,255,255,0.25) 0%, rgba(255,255,255,0.15) 100%);
            transform: translateY(-3px);
        }

        /* NAV KATEGORI */
        nav {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav a {
            display: inline-block;
            margin: 8px 10px;
            padding: 12px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
            background: rgba(255,255,255,0.08);
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        nav a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        nav a:hover::before {
            left: 100%;
        }

        nav a:hover, nav a.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(192, 57, 43, 0.4);
            border: 2px solid rgba(255,255,255,0.2);
        }

        /* SECTION PRODUK */
        .section {
            max-width: 1300px;
            margin: 70px auto;
            padding: 0 20px;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: white;
            margin-bottom: 50px;
            position: relative;
            display: flex;
            align-items: center;
            gap: 15px;
            animation: slideInLeft 0.6s ease-out;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .section-title::before {
            content: '';
            width: 5px;
            height: 35px;
            background: linear-gradient(180deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 5px;
        }

        /* GRID PRODUK */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }

        .card {
            background: linear-gradient(135deg, rgba(255,255,255,0.08) 0%, rgba(255,255,255,0.03) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(230, 126, 34, 0.3) 0%, transparent 70%);
            border-radius: 50%;
            transition: all 0.6s ease;
        }

        .card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 60px rgba(192, 57, 43, 0.4), 0 0 40px rgba(230, 126, 34, 0.2);
            border: 1px solid rgba(230, 126, 34, 0.4);
            background: linear-gradient(135deg, rgba(255,255,255,0.12) 0%, rgba(255,255,255,0.06) 100%);
        }

        .card:hover::before {
            top: -20%;
            right: -20%;
        }

        .card-img {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #e67e22 0%, #c0392b 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            position: relative;
            overflow: hidden;
        }

        .card-img::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .card-body {
            padding: 25px;
            position: relative;
            z-index: 1;
        }

        .card-body h3 {
            font-size: 1.3rem;
            margin-bottom: 12px;
            color: white;
            font-weight: 700;
        }

        .card-body p {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 25px;
            background: rgba(0,0,0,0.2);
            border-top: 1px solid rgba(255,255,255,0.1);
            position: relative;
            z-index: 1;
        }

        .harga {
            font-size: 1.4rem;
            font-weight: 800;
            background: linear-gradient(135deg, #e67e22, #f39c12);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .badge-kategori {
            font-size: 0.8rem;
            background: linear-gradient(135deg, rgba(230, 126, 34, 0.3) 0%, rgba(192, 57, 43, 0.3) 100%);
            color: #f39c12;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 700;
            border: 1px solid rgba(230, 126, 34, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* FOOTER */
        footer {
            background: linear-gradient(180deg, rgba(20,20,20,0.8) 0%, rgba(10,10,10,0.95) 100%);
            backdrop-filter: blur(10px);
            color: rgba(255,255,255,0.6);
            text-align: center;
            padding: 50px 20px;
            margin-top: 80px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        footer strong {
            color: white;
            font-weight: 700;
        }

        footer p {
            font-size: 0.95rem;
            line-height: 1.8;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            header h1 { font-size: 2.2rem; }
            header p { font-size: 1rem; }
            .section-title { font-size: 1.6rem; }
            .grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
            nav a { padding: 10px 20px; font-size: 0.85rem; }
        }
    </link>
</head>
<body>

<div class="background-animation">
    <div class="bubble" style="width: 80px; height: 80px; left: 10%; top: 20%; animation-delay: 0s;"></div>
    <div class="bubble" style="width: 120px; height: 120px; left: 70%; top: 50%; animation-delay: 2s;"></div>
    <div class="bubble" style="width: 100px; height: 100px; left: 40%; top: 80%; animation-delay: 4s;"></div>
</div>

<header>
    <h1>🍽️ Festival Makanan</h1>
    <p>Menikmati cita rasa terbaik dari Restoran Jakobi, Ngawi Timur</p>
    <span class="badge">🎉 Program Digitalisasi Ngawi Barat</span>
</header>

<nav>
    <a href="#semua" class="active">Semua Menu</a>
    @foreach($kategoris as $kat)
        <a href="#{{ Str::slug($kat) }}">{{ $kat }}</a>
    @endforeach
</nav>

@foreach($kategoris as $kat)
<div class="section" id="{{ Str::slug($kat) }}">
    <h2 class="section-title">
        @if($kat == 'Makanan Utama') 🍛 Makanan Utama
        @elseif($kat == 'Minuman') 🥤 Minuman Segar
        @elseif($kat == 'Cemilan') 🍟 Cemilan Lezat
        @else 🍽️ {{ $kat }}
        @endif
    </h2>
    <div class="grid">
        @foreach($produks->where('kategori', $kat) as $produk)
        <div class="card">
            <div class="card-img">
                @if($kat == 'Makanan Utama') 🍛
                @elseif($kat == 'Minuman') 🥤
                @elseif($kat == 'Cemilan') 🍟
                @else 🍽️
                @endif
            </div>
            <div class="card-body">
                <h3>{{ $produk->nama }}</h3>
                <p>{{ $produk->deskripsi }}</p>
            </div>
            <div class="card-footer">
                <span class="harga">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                <span class="badge-kategori">{{ $produk->kategori }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endforeach

<footer>
    <p>&copy; {{ date('Y') }} <strong>Festival Makanan - Restoran Jakobi</strong></p>
    <p style="margin-top:12px; font-size:0.9rem;">✨ Bagian dari Program Digitalisasi 19.000 Lapangan Kerja · Ngawi Barat ✨</p>
    <p style="margin-top:15px; font-size:0.85rem; color: rgba(255,255,255,0.4);">Cita rasa autentik yang menggugah selera</p>
</footer>

</body>
</html>
