<!-- 2311102010
Rakha Yudhistira
S1IF-11-05 -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Ngawi - Jakobi Resto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; }
        .navbar { background: #1a1a1a !important; border-bottom: 4px solid #d4af37; }
        .navbar-brand { font-weight: 700; color: #d4af37 !important; letter-spacing: 2px; }
        .nav-link { font-weight: 500; color: #fff !important; transition: 0.3s; }
        .nav-link:hover { color: #d4af37 !important; }
        .card { border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s; }
        .card:hover { transform: translateY(-10px); }
        .btn-primary { background-color: #d4af37; border: none; color: #1a1a1a; font-weight: 600; }
        .btn-primary:hover { background-color: #b8962e; }
        .price-tag { color: #27ae60; font-weight: 700; font-size: 1.2rem; }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
        <div class="container">
            <a class="navbar-brand" href="/">JAKOBI RESTO</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-link"><a class="nav-link" href="/">Festival Home</a></li>
                    <li class="nav-link"><a class="nav-link" href="/admin">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>