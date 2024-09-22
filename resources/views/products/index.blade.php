<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">CRUD Produk</h1>

        <!-- Form untuk menambah produk -->
        <form action="{{ route('products.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nama Produk</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Harga</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="number" name="stock" id="stock" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>

        <!-- Tabel Daftar Produk -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <!-- Tombol Edit -->
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <!-- Form Hapus -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
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
