<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Pesanan</h1>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Produk</th>
                    <th>Kuantitas</th>
                    <th>Tanggal Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    @if($order->products->isEmpty())
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td colspan="3" class="text-center">Tidak ada produk</td>
                        </tr>
                    @else
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $order->created_at->format('d-m-Y H:i') }}</td> <!-- Format tanggal -->
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <a href="/" class="btn btn-primary">Kembali</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
