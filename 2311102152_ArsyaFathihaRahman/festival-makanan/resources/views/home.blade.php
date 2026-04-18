<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Festival Makanan Ngawi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #fff0f5;
    font-family: 'Segoe UI', sans-serif;
}

/* NAVBAR */
.navbar {
    background: #ff4d88;
}

/* HERO */
.hero {
    background: linear-gradient(90deg, #ff4d88, #ff99cc);
    color: white;
    padding: 70px;
    text-align: center;
}

.search-box {
    max-width: 500px;
    margin: auto;
}

/* CARD */
.card {
    border-radius: 15px;
    overflow: hidden;
    transition: 0.3s;
    border: none;
}

.card:hover {
    transform: translateY(-5px);
}

/* HEADER CARD (GANTI GAMBAR) */
.card-header-custom {
    height: 120px;
    background: linear-gradient(90deg, #ff4d88, #ff99cc);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    color: white;
}

/* BADGE */
.badge {
    background: #ff4d88;
}

/* FOOTER */
.footer {
    background: #ff4d88;
    color: white;
    padding: 20px;
    text-align: center;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4">
    <span class="navbar-brand">🍓 Festival Makanan</span>

    <ul class="navbar-nav flex-row ms-auto gap-3">
        <li class="nav-item"><a class="nav-link text-white" href="/">Home</a></li>
    </ul>

    <a href="/create" class="btn btn-light ms-3">+ Tambah</a>
</nav>

<!-- HERO -->
<div class="hero">
    <h1>Festival Makanan Ngawi 🍜</h1>
    <p>Kuliner viral, enak, dan kekinian 💖</p>

    <div class="search-box mt-3">
        <input type="text" class="form-control" placeholder="Cari makanan...">
    </div>
</div>

<!-- CONTENT -->
<div class="container mt-5">

    <!-- POPULER -->
    <h3 class="mb-4">🔥 Makanan Terpopuler</h3>

    <div class="row">
        @foreach($products as $p)
        <div class="col-md-4 mb-4">
            <div class="card shadow">

                <!-- GANTI GAMBAR JADI HEADER -->
                <div class="card-header-custom">
                    🍜
                </div>

                <div class="card-body">
                    <h5>{{ $p->name }}</h5>

                    <p class="text-muted">Rp {{ number_format($p->price) }}</p>

                    <p>⭐ 4.5 (120 review)</p>

                    <span class="badge">Kuliner</span>

                    <p class="text-muted mt-2">📍 Ngawi</p>

                    <p>👨‍🍳 By: UMKM Lokal</p>

                    <div class="mt-3 d-flex gap-2">
                        <button class="btn btn-outline-danger btn-sm">❤️</button>
                        <a href="#" class="btn btn-outline-dark btn-sm">Detail</a>
                        <a href="/delete/{{ $p->id }}" class="btn btn-danger btn-sm">Hapus</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>

    <!-- TERBARU -->
    <h3 class="mb-4 mt-5">🆕 Menu Terbaru</h3>

    <div class="row">
        @foreach($products as $p)
        <div class="col-md-4 mb-4">
            <div class="card shadow">

                <div class="card-header-custom">
                    🍽️
                </div>

                <div class="card-body">
                    <h5>{{ $p->name }}</h5>
                    <p class="text-muted">Rp {{ number_format($p->price) }}</p>

                    <div class="mt-3">
                        <a href="#" class="btn btn-outline-dark btn-sm">Detail</a>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

<!-- FOOTER -->
<div class="footer mt-5">
    <p>© 2026 Festival Makanan Ngawi 💖 | By Arsya</p>
</div>

</body>
</html>