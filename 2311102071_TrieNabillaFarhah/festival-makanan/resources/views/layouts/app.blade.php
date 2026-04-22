<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Festival Makanan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            width: 100%;
            overflow-x: hidden;
            font-family: 'Segoe UI', sans-serif;
            background: #f7f3ee;
        }

        a {
            text-decoration: none;
        }

                .buttons {
            display: flex;
            gap: 10px;
        }

        .btn-outline {
            padding: 12px 22px;
            border-radius: 25px;
            border: 1px solid #2d1e17;
            color: #2d1e17;
            display: inline-block;
        }

                .hero img {
            width: 350px;
            background: transparent;
        }
        
                .actions {
            margin-top: 15px;
        }

        .btn-edit {
            padding: 6px 12px;
            background: #fbc531;
            color: black;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-delete {
            padding: 6px 12px;
            background: #e84118;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            cursor: pointer;
        }

                .top-actions {
            margin-bottom: 20px;
        }

        .btn-add {
            padding: 10px 16px;
            background: #2d1e17;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
        }

        .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        }

        .top-actions {
            display: flex;
            gap: 10px;
        }

        .btn-dashboard {
            padding: 8px 14px;
            background: #353b48;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-add {
            padding: 8px 14px;
            background: #2d1e17;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }

        .icon-btn {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

.icon-btn.edit {
    background: #3e381e65;
    color: black;
}

.icon-btn.delete {
    background: #362021;
    color: white;
}

.icon-btn:hover {
    transform: scale(1.1);
}

    </style>
</head>
<body>

@yield('content')

</body>
</html>