<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mas Jakobi | Signature Kitchen & Grill</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #2c3e50;
            --accent-color: #e67e22;
            --light-bg: #f9f9f9;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--light-bg);
            color: var(--primary-color);
        }

        /* Navbar Premium */
        .navbar {
            padding: 20px 0;
            transition: all 0.3s;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            letter-spacing: 2px;
        }

        /* Elegant Hero Section */
        .hero {
            height: 80vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                        url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=1500&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
        }

        .hero-content h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 1.2rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        /* Menu Section */
        .section-padding { padding: 80px 0; }
        
        .menu-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
        }
        .menu-title::after {
            content: "";
            width: 50%;
            height: 2px;
            background: var(--accent-color);
            position: absolute;
            bottom: -10px;
            left: 25%;
        }

        /* Food Cards */
        .food-card {
            border: none;
            background: white;
            border-radius: 0; /* Minimalist sharp edges */
            transition: all 0.4s ease;
            margin-bottom: 30px;
        }

        .food-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        .img-container {
            overflow: hidden;
            height: 250px;
        }

        .food-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .food-card:hover img {
            transform: scale(1.1);
        }

        .card-body {
            padding: 25px;
            text-align: center;
        }

        .food-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .food-price {
            color: var(--accent-color);
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .btn-custom {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 0;
            padding: 10px 30px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background: var(--primary-color);
            color: white;
        }

        footer {
            background: #1a1a1a;
            color: #888;
            padding: 60px 0;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">MAS JAKOBI<span class="text-warning">.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-bold">
                    <li class="nav-item"><a class="nav-link px-3" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#menu">Our Menu</a></li>
                    <a href="{{ route('products.create') }}" class="btn btn-warning fw-bold px-4 shadow">
                        <i class="bi bi-plus-lg"></i> Tambah Menu Baru
                    </a>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container">
            <div class="hero-content">
                <p data-aos="fade-up">Authentic Gastronomy</p>
                <h1 data-aos="fade-up" data-aos-delay="200">The Art of Fine Dining</h1>
                <div class="mt-4">
                    <a href="#menu" class="btn btn-outline-light btn-lg rounded-0 px-5">Explore Menu</a>
                </div>
            </div>
        </div>
    </header>

    <section id="menu" class="section-padding text-center">
        <div class="container">
            <h2 class="menu-title">Daily Specials</h2>
            
            <div class="row mt-4">
                @forelse($products as $product)
                <div class="col-md-4">
                    <div class="food-card shadow-sm">
                        <div class="img-container">
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=800&q=80" alt="{{ $product->name }}">
                        </div>
                        <div class="card-body">
                            <h3 class="food-name">{{ $product->name }}</h3>
                            <p class="small text-muted mb-3">{{ Str::limit($product->description, 70) }}</p>
                            <div class="food-price">IDR {{ number_format($product->price, 0, ',', '.') }}</div>
                            <button class="btn btn-custom">View Detail</button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <p class="lead">Our chef is preparing something new. Stay tuned!</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="text-center">
        <div class="container">
            <h2 class="text-white mb-4">JAKOBI.</h2>
            <div class="mb-4">
                <a href="#" class="text-secondary mx-2"><i class="bi bi-instagram fs-4"></i></a>
                <a href="#" class="text-secondary mx-2"><i class="bi bi-facebook fs-4"></i></a>
                <a href="#" class="text-secondary mx-2"><i class="bi bi-twitter-x fs-4"></i></a>
            </div>
            <p class="mb-0 small">© 2026 Mas Jakobi Kitchen. Crafted for Mas Paris.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>