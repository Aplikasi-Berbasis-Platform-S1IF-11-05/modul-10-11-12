<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NgawiFest - Dasbor Digitalisasi</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        body { background-color: #f4f7f6; font-family: 'Inter', sans-serif; color: #334155; }
        h1, h2, h3, h4, h5, h6, .navbar-brand { font-family: 'Poppins', sans-serif; }
        .navbar { background: rgba(255, 255, 255, 0.95) !important; backdrop-filter: blur(10px); border-bottom: 1px solid #e2e8f0; }
        .navbar-brand { color: #0f172a !important; font-size: 1.4rem; letter-spacing: -0.5px; }
        .navbar-brand span { color: #3b82f6; }
        .nav-link { color: #64748b !important; font-weight: 500; transition: color 0.3s; }
        .nav-link:hover, .nav-link.active { color: #0f172a !important; font-weight: 600; }
        .hero-section { background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); color: white; padding: 4.5rem 0; border-radius: 0 0 2.5rem 2.5rem; margin-bottom: 3rem; box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.5); }
        .card-menu { border: none; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); transition: all 0.3s ease; background: #fff; overflow: hidden; }
        .card-menu:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); }
        .card-menu img { height: 220px; object-fit: cover; }
        .price-tag { color: #059669; background: #d1fae5; padding: 6px 12px; border-radius: 8px; font-weight: 600; font-size: 0.95rem; display: inline-block; }
        .dash-container { background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; }
        .table > thead th { color: #64748b; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px; font-weight: 600; border-bottom: none; padding: 1rem; }
        .table > tbody td { vertical-align: middle; border-bottom: 1px solid #f1f5f9; padding: 1rem; color: #334155; }
        .img-thumb { width: 48px; height: 48px; object-fit: cover; border-radius: 10px; }
        .btn { border-radius: 8px; font-weight: 500; padding: 0.5rem 1rem; transition: all 0.2s; }
        .btn-primary { background-color: #3b82f6; border: none; }
        .btn-primary:hover { background-color: #2563eb; transform: translateY(-2px); }
        .action-btn { padding: 6px 12px; border-radius: 6px; font-size: 0.85rem; }
        .modal-content { border-radius: 20px; border: none; overflow: hidden; }
        .modal-header { border-bottom: 1px solid #f1f5f9; padding: 1.5rem; }
        .modal-body { padding: 1.5rem; }
        .modal-footer { border-top: 1px solid #f1f5f9; padding: 1.5rem; }
        .form-control { border-radius: 8px; border: 1px solid #e2e8f0; padding: 0.75rem 1rem; background-color: #f8fafc; }
        .form-control:focus { background-color: #fff; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1); }
        .form-label { font-size: 0.9rem; color: #475569; font-weight: 500; }
    </style>
</head>
<body>

    @include('partials.navbar')

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>