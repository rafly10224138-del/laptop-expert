<?php
session_start();

$riwayat = $_SESSION['riwayat_konsultasi'] ?? [];

$kebutuhanLabel = [
    1 => 'Ringan',
    2 => 'Menengah',
    3 => 'Berat'
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Konsultasi | LAPTOP EXPERT</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <main class="container py-5" style="margin-top: 30px; max-width: 1000px;">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <span class="text-success fw-semibold">
                    <i class="bi bi-clock-history"></i>
                    Data Tersimpan Sementara
                </span>

                <h1 class="fw-bold mt-2 mb-2">Riwayat Konsultasi</h1>

                <p class="text-muted mb-0">
                    Berikut daftar konsultasi yang telah dilakukan pada sesi ini.
                </p>
            </div>

            <a href="konsultasi.php" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i>
                Konsultasi Baru
            </a>
        </div>

        <?php if (!empty($riwayat)) : ?>

            <div class="row g-4">

                <?php foreach (array_reverse($riwayat) as $item) : ?>

                    <?php
                    $kategori = $kebutuhanLabel[$item['kebutuhan']] ?? '-';
                    $budget = number_format($item['budget'], 0, ',', '.');
                    $jumlahRekomendasi = count($item['rekomendasi'] ?? []);
                    ?>

                    <div class="col-md-6">
                        <article class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">

                                <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                    <span class="badge text-bg-success">
                                        <?php echo htmlspecialchars($kategori); ?>
                                    </span>

                                    <small class="text-muted">
                                        <i class="bi bi-calendar3"></i>
                                        <?php echo htmlspecialchars($item['tanggal'] ?? '-'); ?>
                                    </small>
                                </div>

                                <h5 class="fw-bold mb-3">Data Konsultasi</h5>

                                <div class="mb-3">
                                    <small class="text-muted d-block">Budget Maksimal</small>
                                    <strong>Rp <?php echo $budget; ?></strong>
                                </div>

                                <div class="mb-4">
                                    <small class="text-muted d-block">Hasil Rekomendasi</small>
                                    <strong>
                                        <?php echo $jumlahRekomendasi; ?> laptop ditemukan
                                    </strong>
                                </div>

                                <a
                                    href="hasil.php?riwayat=<?php echo $item['id']; ?>"
                                    class="btn btn-outline-success w-100"
                                >
                                    <i class="bi bi-eye me-1"></i>
                                    Lihat Hasil
                                </a>

                            </div>
                        </article>
                    </div>

                <?php endforeach; ?>

            </div>

        <?php else : ?>

            <section class="card border-0 shadow-sm">
                <div class="card-body text-center p-5">

                    <i class="bi bi-clock-history text-success" style="font-size: 56px;"></i>

                    <h4 class="fw-bold mt-3">Belum Ada Riwayat Konsultasi</h4>

                    <p class="text-muted mb-4">
                        Kamu belum melakukan konsultasi. Mulai konsultasi untuk mendapatkan
                        rekomendasi laptop sesuai kebutuhanmu.
                    </p>

                    <a href="konsultasi.php" class="btn btn-success px-4">
                        <i class="bi bi-search me-1"></i>
                        Mulai Konsultasi
                    </a>

                </div>
            </section>

        <?php endif; ?>

    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>