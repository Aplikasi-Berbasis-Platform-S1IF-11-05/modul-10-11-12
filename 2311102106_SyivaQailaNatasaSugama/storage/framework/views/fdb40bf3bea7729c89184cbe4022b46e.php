<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Festival Kuliner Ngawi'); ?></title>
    <style>
        :root {
            --bg: #fff8ef;
            --paper: #ffffff;
            --text: #1f1a16;
            --muted: #6d5e52;
            --accent: #e35b22;
            --accent-2: #ffcf4a;
            --line: #eadac8;
            --danger: #9d2d2d;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 0% 0%, #ffd585 0%, transparent 35%),
                radial-gradient(circle at 100% 0%, #ffc0a0 0%, transparent 30%),
                radial-gradient(circle at 50% 100%, #ffe4bb 0%, transparent 40%),
                var(--bg);
            min-height: 100vh;
        }

        .container {
            width: min(1100px, 92%);
            margin: 0 auto;
            padding: 24px 0 56px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .brand {
            font-weight: 800;
            letter-spacing: 0.4px;
            font-size: 1.1rem;
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .btn {
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 10px 14px;
            text-decoration: none;
            color: var(--text);
            background: #fff;
            cursor: pointer;
            font-weight: 600;
        }

        .btn.primary {
            background: linear-gradient(135deg, var(--accent), #c64616);
            border-color: transparent;
            color: #fff;
        }

        .btn.danger {
            background: var(--danger);
            color: #fff;
            border-color: transparent;
        }

        .card {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(58, 26, 8, 0.08);
        }

        .grid {
            display: grid;
            gap: 16px;
        }

        .grid.cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid.cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 12px;
        }

        input, textarea {
            width: 100%;
            border: 1px solid var(--line);
            border-radius: 10px;
            padding: 10px 12px;
            font: inherit;
            background: #fff;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .help {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .error {
            margin: 0;
            color: #a33131;
            font-size: 0.85rem;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 14px;
            background: #ecfbe7;
            border: 1px solid #bddfb1;
            color: #2f6a23;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            border-bottom: 1px solid var(--line);
            padding: 12px 8px;
            vertical-align: top;
        }

        .inline-form {
            display: inline;
        }

        @media (max-width: 900px) {
            .grid.cols-3,
            .grid.cols-2 {
                grid-template-columns: 1fr;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <header class="topbar">
        <div class="brand">Festival Kuliner Ngawi Timur</div>
        <nav class="nav">
            <a class="btn" href="<?php echo e(url('/')); ?>">Halaman Depan</a>
            <a class="btn primary" href="<?php echo e(route('products.index')); ?>">Kelola Produk</a>
        </nav>
    </header>

    <?php echo $__env->yieldContent('content'); ?>
</div>
</body>
</html>
<?php /**PATH D:\Master\Telkom University Purwokerto\Semester 6\Aplikasi Berbasis Platform\Praktikum\Joki\Kayla\Modul11-13\resources\views/layouts/app.blade.php ENDPATH**/ ?>