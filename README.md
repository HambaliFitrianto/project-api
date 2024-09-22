# Project API

## Deskripsi Proyek
Proyek ini adalah aplikasi API yang dibangun menggunakan Laravel dan MySQL. Aplikasi ini memiliki dua fitur utama: **Products** dan **Orders**, yang dirancang untuk memudahkan pengelolaan informasi produk dan pesanan.

### Fitur Utama

1. **Products**:
   - **Manajemen Produk**: API ini memungkinkan pengguna untuk menambahkan, memperbarui, dan menghapus produk dari sistem.
   - **Informasi Produk**: Setiap produk memiliki atribut seperti:
     - Nama produk
     - Harga produk
     - Stok yang tersedia
   - **Pengambilan Data**: Pengguna dapat mengambil daftar semua produk atau detail produk tertentu berdasarkan ID.

2. **Orders**:
   - **Manajemen Pesanan**: API ini memungkinkan pengguna untuk membuat dan mengelola pesanan yang mencakup produk yang dipesan.
   - **Detail Pesanan**: Setiap pesanan mencakup informasi seperti:
     - ID produk yang dipesan
     - Kuantitas produk
     - Total harga pesanan
   - **Pengambilan Data Pesanan**: Pengguna dapat mengambil semua pesanan atau detail pesanan tertentu berdasarkan ID.

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
   - Buka file `.env` dan sesuaikan konfigurasi database Anda. Berikut adalah contoh konfigurasi:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=api_project_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   **Catatan:** Anda dapat menyesuaikan nilai-nilai ini sesuai dengan kebutuhan dan pengaturan lingkungan pengembangan Anda.

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

Sekarang Anda dapat mengakses API di [http://127.0.0.1:8000/](http://127.0.0.1:8000/).