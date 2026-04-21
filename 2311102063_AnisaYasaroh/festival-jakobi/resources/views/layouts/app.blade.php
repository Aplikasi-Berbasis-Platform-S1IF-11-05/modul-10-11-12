<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Kuliner</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #f6d365, #fda085);
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 0 0 20px 20px;
        }

        .navbar-brand {
            font-weight: 700;
            color: #ff7e5f !important;
        }

        .nav-link {
            color: #555 !important;
            font-weight: 500;
            margin-left: 15px;
        }

        .nav-link:hover {
            color: #ff7e5f !important;
        }

        /* BUTTON */
        .btn-main {
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            color: white;
            border: none;
            border-radius: 25px;
            transition: 0.3s;
        }

        .btn-main:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        /* CONTAINER */
        .main-wrapper {
            padding: 40px 20px;
        }

    </style>

    @stack('styles')
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg px-4 py-3">
    <div class="container-fluid">

        <a class="navbar-brand" href="/">
            Festival Makanan Restoran Mas Jakobi
        </a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navMenu">
            <a href="/" class="nav-link">Dashboard</a>
            <a href="/products" class="nav-link">Produk</a>
        </div>

    </div>
</nav>

<!-- CONTENT -->
<div class="main-wrapper container">
    @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

</body>
</html>