<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Makanan Ngawi - Mas Jakobi</title>
    <style>
        body { font-family: sans-serif; background-color: #1a1a1a; color: #fff; padding: 20px; }
        .header { text-align: center; margin-bottom: 40px; }
        .product-grid { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
        .card { background: #333; padding: 20px; border-radius: 8px; width: 300px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border: 1px solid #444; }
        .price { color: #4ade80; font-weight: bold; font-size: 1.2em; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Festival Makanan Ngawi</h1>
        <p>Didukung oleh Jendral Ladesh | Dikelola oleh Mas Jakobi</p>
    </div>

    <div class="product-grid">
        @foreach($products as $product)
        <div class="card">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        </div>
        @endforeach
    </div>

</body>
</html>