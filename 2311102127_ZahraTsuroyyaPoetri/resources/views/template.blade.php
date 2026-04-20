<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tugas Modul 11,12,13</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #ffe4ec, #fff6cc, #e0f7ff);
            background-attachment: fixed;
        }

        .header-box {
            width: 90%;
            max-width: 700px;
            margin: 40px auto 10px auto;
            background: rgba(255,255,255,0.6);
            backdrop-filter: blur(12px);
            padding: 20px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            
        }

        .header-box,
        .container {
            position: relative;
            z-index: 2;
        }

        .page-title {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
        }

        .page-desc {
            margin-top: 8px;
            font-size: 14px;
            color: #6b7280;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 30px auto;
        }

        .box {
            background: white;
            padding: 30px;
            border-radius: 16px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .section-box {
            width: 94%;
            background: rgba(255,255,255,0.65);
            backdrop-filter: blur(10px);
            padding: 14px 20px;
            border-radius: 14px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.06);
            text-align: center;
        }

        .section-title {
            margin: 0;
            font-size: 18px;
            font-weight: 600;
            background: linear-gradient(90deg, #ff7eb3, #ffb347);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-wrapper {
            margin-bottom: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            position: relative;
            z-index: 1;
            margin-top: 10px;
        }

        .card {
            background: white;
            padding: 18px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: 0.25s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .desc {
            color: #6b7280;
            font-size: 14px;
        }

        .price {
            margin-top: 8px;
            font-weight: 600;
            color: #f59e0b;
        }

        .actions {
            margin-top: 12px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            align-items: center;
        }

        .icon-btn {
            border: none;
            background: none;
            padding: 4px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
        }

        .icon-edit { color: #22c55e; }
        .icon-delete { color: #ef4444; }

        .icon-edit:hover {
            transform: scale(1.2);
            color: #16a34a;
        }

        .icon-delete:hover {
            transform: scale(1.2);
            color: #dc2626;
        }

        .floating-btn {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: linear-gradient(135deg, #ff7eb3, #ffb347);
            color: white;
            padding: 14px 18px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        form {
            width: 100%;
        }

        .form-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            position: relative;
            z-index: 2;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            z-index: 3;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            text-align: left;
            display: block;

        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-family: inherit;
            width: 100%;
            box-sizing: border-box;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, #ff7eb3, #ffb347);
            color: white;
            font-weight: 500;
            cursor: pointer;
        }

        .sparkle {
            position: fixed;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            opacity: 0.9;
            animation: fireworkFloat 8s linear infinite;
            filter: blur(0.5px);
        }

        .sparkle.red { background: #ff2d2d; }
        .sparkle.pink { background: #ff2dfc; }
        .sparkle.yellow { background: #ffcc00; }
        .sparkle.blue { background: #00bfff; }
        .sparkle.green { background: #00e676; }

        @keyframes fireworkFloat {
            0% {
                transform: translateY(0) translateX(0) scale(0.6);
                opacity: 0;
            }

            10% {
                opacity: 0.8;
            }

            25% {
                transform: translateY(-25vh) translateX(-10px);
            }

            50% {
                transform: translateY(-50vh) translateX(10px);
            }

            75% {
                transform: translateY(-75vh) translateX(-8px);
            }

            100% {
                transform: translateY(-110vh) translateX(5px) scale(0.8);
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <div class="header-box">
        <h1 class="page-title">Festival Kuliner Ngawi Barat</h1>
        <p class="page-desc">
            Jelajahi berbagai hidangan lezat dari restoran lokal dalam rangka Festival Kuliner Ngawi Barat, sebagai bagian dari upaya digitalisasi untuk mendukung pertumbuhan ekonomi daerah.
        </p>
    </div>

    <div class="container">
        @yield('content')
    </div>

    <div class="sparkle red" style="left:5%; animation-delay:0s;"></div>
    <div class="sparkle pink" style="left:10%; animation-delay:1s;"></div>
    <div class="sparkle yellow" style="left:15%; animation-delay:2s;"></div>
    <div class="sparkle blue" style="left:20%; animation-delay:3s;"></div>
    <div class="sparkle green" style="left:25%; animation-delay:4s;"></div>

    <div class="sparkle red" style="left:30%; animation-delay:1.5s;"></div>
    <div class="sparkle pink" style="left:35%; animation-delay:2.5s;"></div>
    <div class="sparkle yellow" style="left:40%; animation-delay:3.5s;"></div>
    <div class="sparkle blue" style="left:45%; animation-delay:4.5s;"></div>
    <div class="sparkle green" style="left:50%; animation-delay:0.5s;"></div>

    <div class="sparkle red" style="left:55%; animation-delay:2s;"></div>
    <div class="sparkle pink" style="left:60%; animation-delay:3s;"></div>
    <div class="sparkle yellow" style="left:65%; animation-delay:4s;"></div>
    <div class="sparkle blue" style="left:70%; animation-delay:1s;"></div>
    <div class="sparkle green" style="left:75%; animation-delay:2.2s;"></div>

    <div class="sparkle red" style="left:80%; animation-delay:3.2s;"></div>
    <div class="sparkle pink" style="left:85%; animation-delay:4.2s;"></div>
    <div class="sparkle yellow" style="left:90%; animation-delay:1.2s;"></div>
    <div class="sparkle blue" style="left:95%; animation-delay:2.8s;"></div>

</body>
</html>