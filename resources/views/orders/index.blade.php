<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media print {
            body {
                font-family: 'Courier New', Courier, monospace;
                font-size: 14px;
            }
            .d-print-none {
                display: none !important;
            }
            .table {
                border: none;
                width: 100%; /* Memastikan tabel menggunakan lebar penuh */
                table-layout: fixed; /* Memastikan lebar kolom tetap */
            }
            .table th, .table td {
                border: none;
                padding: 5px 0;
                text-align: center; /* Rata tengah untuk semua sel saat dicetak */
            }
            .total {
                font-weight: bold;
                font-size: 16px;
            }
            .print-title {
                font-weight: bold;
                font-size: 20px;
                margin-bottom: 20px;
                text-align: center;
            }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4 d-print-none">CRUD Pesanan</h1>

        <!-- Form untuk menambah pesanan -->
        <form action="{{ route('orders.store') }}" method="POST" class="mb-4 d-print-none">
            @csrf
            <div class="form-group">
                <label>Pilih Produk</label>
                <select name="product_id" class="form-control" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Kuantitas</label>
                <input type="number" name="quantity" min="1" class="form-control" placeholder="Jumlah" value="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </form>

        <!-- Tabel Daftar Pesanan -->
        <h2 class="print-title d-print-block text-center">Daftar Pesanan</h2>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Produk</th>
                    <th>Kuantitas</th>
                    <th>Total Harga</th>
                    <th class="d-print-none">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    @if($order->products->isEmpty())
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td colspan="3" class="text-center">Tidak ada produk</td>
                            <td class="d-print-none">
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @else
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>Rp {{ number_format($product->pivot->price * $product->pivot->quantity, 0, ',', '.') }}</td>
                                <td class="d-print-none">
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="text-right total">Total Harga:</td>
                    <td colspan="2" class="total">
                        Rp {{ number_format($orders->sum(function ($order) {
                            return $order->products->sum(function ($product) {
                                return $product->pivot->price * $product->pivot->quantity;
                            });
                        }), 0, ',', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>

        <div class="text-center mb-4 d-print-none">
            <a href="/" class="btn btn-primary">Kembali</a>
            <button class="btn btn-success" onclick="printOrder()">Cetak Struk</button>
        </div>
    </div>

    <script>
        function printOrder() {
            window.print();
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
