<?php
session_start();

require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: konsultasi.php');
    exit;
}

/* =========================
   AMBIL DATA FORM
========================= */

$kebutuhan = isset($_POST['kebutuhan'])
    ? (int) $_POST['kebutuhan']
    : 0;

$budget = isset($_POST['budget'])
    ? (int) $_POST['budget']
    : 0;

$kategoriMap = [
    1 => 'Ringan',
    2 => 'Menengah',
    3 => 'Berat'
];

/* =========================
   VALIDASI DATA
========================= */

if (!isset($kategoriMap[$kebutuhan]) || $budget <= 0) {
    $_SESSION['pesan_error'] = 'Data konsultasi belum lengkap. Silakan isi kembali formulir.';

    header('Location: konsultasi.php');
    exit;
}

$kategori = $kategoriMap[$kebutuhan];

/* =========================
   ATURAN SISTEM PAKAR
========================= */

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

/* =========================
   AMBIL REKOMENDASI LAPTOP
========================= */

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

mysqli_stmt_close($stmt);

/* =========================
   ATURAN YANG AKTIF
========================= */

$aturanAktif = [];

if ($kebutuhan === 1) {
    $aturanAktif[] = 'IF kebutuhan = Ringan AND harga laptop ≤ budget THEN laptop kategori Ringan direkomendasikan.';
} elseif ($kebutuhan === 2) {
    $aturanAktif[] = 'IF kebutuhan = Menengah AND harga laptop ≤ budget THEN laptop kategori Ringan atau Menengah direkomendasikan.';
} else {
    $aturanAktif[] = 'IF kebutuhan = Berat AND harga laptop ≤ budget THEN laptop dari semua kategori dapat direkomendasikan.';
}

if (empty($rekomendasi)) {
    $aturanAktif[] = 'Tidak ditemukan laptop dengan harga yang sesuai dengan budget yang dimasukkan.';
}

/* =========================
   DATA HASIL KONSULTASI
========================= */

$hasilKonsultasi = [
    'id' => uniqid('konsultasi_', true),
    'tanggal' => date('d-m-Y H:i'),
    'kebutuhan' => $kebutuhan,
    'kategori' => $kategori,
    'budget' => $budget,
    'rekomendasi' => $rekomendasi,
    'aturan_aktif' => $aturanAktif
];

$_SESSION['hasil_konsultasi'] = $hasilKonsultasi;

/* =========================
   SIMPAN RIWAYAT KE SESSION
========================= */

if (!isset($_SESSION['riwayat_konsultasi'])) {
    $_SESSION['riwayat_konsultasi'] = [];
}

$_SESSION['riwayat_konsultasi'][] = $hasilKonsultasi;

/* =========================
   SIMPAN RIWAYAT KE DATABASE
========================= */

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

/* =========================
   PINDAH KE HALAMAN HASIL
========================= */

header('Location: hasil.php');
exit;
