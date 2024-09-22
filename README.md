```markdown
# Project API

## Deskripsi Proyek
Proyek ini adalah aplikasi API yang dibangun menggunakan Laravel dan MySQL. Aplikasi ini memiliki dua fitur utama: **Products** dan **Orders**.

- **Products**: Mengelola informasi produk, termasuk nama, harga, dan stok.
- **Orders**: Mengelola pesanan yang mencakup produk yang dipesan, kuantitas, dan informasi lainnya.

## Gambar Proyek

### Halaman Utama
![Halaman Utama](images/halaman_utama.jpeg)
Halaman utama aplikasi ini memberikan gambaran umum tentang fitur-fitur yang tersedia dan memungkinkan pengguna untuk menavigasi ke bagian lain dari aplikasi.

### Halaman Produk
![Halaman Produk](images/halaman_produk.jpeg)
Halaman produk ini menampilkan daftar semua produk yang tersedia. Di sini, pengguna dapat melihat informasi produk, termasuk nama, harga, dan jumlah stok yang ada.

### Halaman Pesanan
![Halaman Pesanan](images/halaman_pesanan.jpeg)
Halaman pesanan ini menunjukkan daftar semua pesanan yang telah dibuat. Pengguna dapat melihat detail pesanan, termasuk produk yang dipesan dan kuantitas masing-masing.

## Prerequisites
Pastikan Anda memiliki hal berikut sebelum memulai:
- PHP 8.2.4
- Composer
- MySQL

## Instalasi
Ikuti langkah-langkah di bawah ini untuk menginstal proyek:

1. **Clone repositori ini:**
   - Jalankan perintah berikut di terminal Anda:
   ```bash
   git clone https://github.com/HambaliFitrianto/project-api.git
   ```

2. **Masuk ke direktori proyek:**
   - Setelah proses cloning selesai, masuk ke direktori proyek:
   ```bash
   cd project-api
   ```

3. **Install dependensi menggunakan Composer:**
   - Install semua dependensi yang diperlukan dengan perintah:
   ```bash
   composer install
   ```

4. **Salin file `.env.example` menjadi `.env`:**
   - Buat file `.env` berdasarkan contoh yang tersedia:
   ```bash
   cp .env.example .env
   ```

5. **Generate key aplikasi:**
   - Jalankan perintah berikut untuk menggenerate key aplikasi:
   ```bash
   php artisan key:generate
   ```

6. **Sesuaikan konfigurasi database di file `.env`:**
   - Buka file `.env` dan sesuaikan konfigurasi database Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_anda
   DB_USERNAME=username_anda
   DB_PASSWORD=password_anda
   ```

7. **Jalankan migrasi untuk membuat tabel di database:**
   - Jalankan perintah migrasi untuk membuat tabel:
   ```bash
   php artisan migrate
   ```

8. **Jalankan server lokal:**
   - Terakhir, jalankan server lokal dengan perintah:
   ```bash
   php artisan serve
   ```

Sekarang Anda dapat mengakses API di [http://localhost:8000](http://localhost:8000).
```