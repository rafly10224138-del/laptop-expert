<?php
session_start();

require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: konsultasi.php');
    exit;
}

$kebutuhan = isset($_POST['kebutuhan']) ? (int) $_POST['kebutuhan'] : 0;
$budget = isset($_POST['budget']) ? (int) $_POST['budget'] : 0;

$kategoriMap = [
    1 => 'Ringan',
    2 => 'Menengah',
    3 => 'Berat'
];

if (!isset($kategoriMap[$kebutuhan]) || $budget <= 0) {
    $_SESSION['pesan_error'] = 'Data konsultasi belum lengkap. Silakan isi kembali formulir.';
    header('Location: konsultasi.php');
    exit;
}

$kategori = $kategoriMap[$kebutuhan];

/*
|--------------------------------------------------------------------------
| Aturan Sistem Pakar
|--------------------------------------------------------------------------
| Kebutuhan ringan    : menampilkan laptop kategori Ringan
| Kebutuhan menengah  : menampilkan kategori Ringan dan Menengah
| Kebutuhan berat     : menampilkan semua kategori
|
| Semua rekomendasi tetap harus memiliki harga <= budget pengguna.
*/

if ($kebutuhan === 1) {
    $query = "
        SELECT *
        FROM laptops
        WHERE kategori = 'Ringan'
        AND harga <= ?
        ORDER BY harga ASC
    ";
} elseif ($kebutuhan === 2) {
    $query = "
        SELECT *
        FROM laptops
        WHERE kategori IN ('Ringan', 'Menengah')
        AND harga <= ?
        ORDER BY harga ASC
    ";
} else {
    $query = "
        SELECT *
        FROM laptops
        WHERE harga <= ?
        ORDER BY harga ASC
    ";
}

$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    die('Query rekomendasi gagal dibuat: ' . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, 'i', $budget);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$rekomendasi = [];

while ($laptop = mysqli_fetch_assoc($result)) {
    $rekomendasi[] = $laptop;
}

$aturanAktif = [];

if ($kebutuhan === 1) {
    $aturanAktif[] = 'IF kebutuhan = Ringan AND harga laptop ≤ budget THEN laptop kategori Ringan direkomendasikan.';
}

if ($kebutuhan === 2) {
    $aturanAktif[] = 'IF kebutuhan = Menengah AND harga laptop ≤ budget THEN laptop kategori Ringan atau Menengah direkomendasikan.';
}

if ($kebutuhan === 3) {
    $aturanAktif[] = 'IF kebutuhan = Berat AND harga laptop ≤ budget THEN laptop dari semua kategori dapat direkomendasikan.';
}

if (empty($rekomendasi)) {
    $aturanAktif[] = 'Tidak ditemukan laptop dengan harga yang sesuai dengan budget yang dimasukkan.';
}

$jumlahRekomendasi = count($rekomendasi);

$queryRiwayat = "
    INSERT INTO riwayat_konsultasi (
        kategori_kebutuhan,
        budget,
        jumlah_rekomendasi
    ) VALUES (?, ?, ?)
";

$stmtRiwayat = mysqli_prepare($conn, $queryRiwayat);

if ($stmtRiwayat) {
    mysqli_stmt_bind_param(
        $stmtRiwayat,
        'sii',
        $kategori,
        $budget,
        $jumlahRekomendasi
    );

    mysqli_stmt_execute($stmtRiwayat);
    mysqli_stmt_close($stmtRiwayat);
}

$_SESSION['hasil_konsultasi'] = [
    'kebutuhan' => $kebutuhan,
    'kategori' => $kategori,
    'budget' => $budget,
    'rekomendasi' => $rekomendasi,
    'aturan_aktif' => $aturanAktif
];

mysqli_stmt_close($stmt);

header('Location: hasil.php');
exit;