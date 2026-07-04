# Laptop Expert

Laptop Expert adalah website sistem pakar rekomendasi laptop untuk mahasiswa. Sistem memberikan rekomendasi berdasarkan kategori kebutuhan dan budget menggunakan metode Forward Chaining.

## Fitur
- Rekomendasi laptop berdasarkan kebutuhan dan budget
- Metode Forward Chaining
- Halaman konsultasi
- Hasil rekomendasi laptop
- Riwayat konsultasi
- Tampilan responsif menggunakan Bootstrap

## Teknologi
- PHP Native
- MySQL
- Bootstrap 5
- XAMPP
- phpMyAdmin

## Cara Menjalankan Proyek

1. Download atau clone repository ini.
2. Simpan folder proyek ke:

   ```text
   C:\xampp\htdocs\
Jalankan Apache dan MySQL melalui XAMPP.

Buka phpMyAdmin melalui:

http://localhost/phpmyadmin

Buat database dengan

laptop_expert

Impor file berikut ke phpMyAdmin:

database/laptop_expert.sql

Buat koneksi file database baru pada:

config/database.php

Isi file tersebut sesuai konfigurasi lokal:

<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'laptop_expert';

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die('Koneksi database gagal: ' . mysqli_connect_error());
}

Jalankan website melalui browser:

http://localhost/laptop_expert/

5. Terakhir, buka repository GitHub kamu lalu salin link halaman repository. Link itulah yang bisa kamu kirim ke dosen atau masukkan ke laporan, contohnya:

```text
https://github.com/username-kamu/laptop-expert
