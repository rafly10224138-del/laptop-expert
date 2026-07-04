<?php
session_start();

if (!isset($_SESSION['hasil_konsultasi'])) {
    header('Location: konsultasi.php');
    exit;
}

$hasil = $_SESSION['hasil_konsultasi'];

$kebutuhanLabel = [
    1 => 'Ringan',
    2 => 'Menengah',
    3 => 'Berat'
];

$kebutuhan = $kebutuhanLabel[$hasil['kebutuhan']] ?? '-';
$budget = number_format($hasil['budget'], 0, ',', '.');
$rekomendasi = $hasil['rekomendasi'] ?? [];
$aturanAktif = $hasil['aturan_aktif'] ?? [];

/*
|--------------------------------------------------------------------------
| DAFTAR FOTO PRODUK
|--------------------------------------------------------------------------
| Nama di sebelah kiri harus sama dengan nama_laptop pada database.
| Folder gambar: assets/img/laptops/
*/

$daftarGambarLaptop = [
    'ASUS VivoBook 15' => 'asus-vivobook-15.png',
    'Asus VivoBook 15' => 'asus-vivobook-15.png',

    'Acer Aspire 5' => 'acer-aspire-5.png',

    'Lenovo IdeaPad Slim 3' => 'lenovo-ideapad-slim-3.png',
    'Lenovo Ideapad Slim 3' => 'lenovo-ideapad-slim-3.png',

    'HP 14s' => 'hp-14s.png',

    'Dell Inspiron 3520' => 'dell-inspiron-3520.png'
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hasil Rekomendasi | LAPTOP EXPERT</title>

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

    <link
        rel="stylesheet"
        href="https://unpkg.com/aos@2.3.4/dist/aos.css"
    >

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <main class="container py-5" style="margin-top: 90px; max-width: 1000px;">

        <section class="mb-4" data-aos="fade-up">
            <a href="konsultasi.php" class="text-success text-decoration-none">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Konsultasi
            </a>

            <h1 class="fw-bold mt-3">Hasil Rekomendasi</h1>

            <p class="text-muted mb-0">
                Berikut hasil analisis berdasarkan kebutuhan dan budget yang Anda masukkan.
            </p>
        </section>

        <section
            class="card border-0 shadow-sm mb-4"
            data-aos="fade-up"
            data-aos-delay="100"
        >
            <div class="card-body p-4">

                <h5 class="fw-bold mb-3">
                    <i class="bi bi-clipboard-check-fill text-success"></i>
                    Data Konsultasi
                </h5>

                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <small class="text-muted d-block">
                            Kategori Kebutuhan
                        </small>

                        <strong>
                            <?php echo htmlspecialchars($kebutuhan); ?>
                        </strong>
                    </div>

                    <div class="col-md-6">
                        <small class="text-muted d-block">
                            Budget Maksimal
                        </small>

                        <strong>
                            Rp <?php echo $budget; ?>
                        </strong>
                    </div>
                </div>

            </div>
        </section>

        <?php if (!empty($rekomendasi)) : ?>

            <section class="mb-5">

                <div
                    class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3"
                    data-aos="fade-up"
                    data-aos-delay="150"
                >
                    <div>
                        <h4 class="fw-bold mb-1">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            Laptop yang Direkomendasikan
                        </h4>

                        <p class="text-muted mb-0">
                            Rekomendasi dipilih berdasarkan kategori kebutuhan dan budget Anda.
                        </p>
                    </div>

                    <span class="badge text-bg-success">
                        <?php echo count($rekomendasi); ?> Laptop Ditemukan
                    </span>
                </div>

                <div class="row g-4">

                    <?php foreach ($rekomendasi as $index => $laptop) : ?>

                        <?php
                        $namaLaptop = $laptop['nama_laptop'] ?? 'Laptop Rekomendasi';

                        $gambarLaptop = $daftarGambarLaptop[$namaLaptop]
                            ?? 'asus-vivobook-15.png';
                        ?>

                        <div
                            class="col-md-6"
                            data-aos="fade-up"
                            data-aos-delay="<?php echo 180 + ($index * 80); ?>"
                        >
                            <article class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">

                                    <div class="laptop-image-wrapper mb-3">
                                        <img
                                            src="assets/img/laptops/<?php echo htmlspecialchars($gambarLaptop); ?>"
                                            alt="<?php echo htmlspecialchars($namaLaptop); ?>"
                                            class="laptop-image"
                                        >
                                    </div>

                                    <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                        <span class="badge text-bg-success">
                                            Sesuai Kebutuhan
                                        </span>

                                        <i class="bi bi-laptop fs-4 text-success"></i>
                                    </div>

                                    <h4 class="fw-bold">
                                        <?php echo htmlspecialchars($namaLaptop); ?>
                                    </h4>

                                    <h5 class="text-success fw-bold mb-3">
                                        Rp <?php echo number_format($laptop['harga'] ?? 0, 0, ',', '.'); ?>
                                    </h5>

                                    <?php if (!empty($laptop['spesifikasi'])) : ?>
                                        <div class="bg-light rounded-3 p-3 mb-3">
                                            <strong class="d-block mb-1">
                                                Spesifikasi
                                            </strong>

                                            <p class="text-muted small mb-0">
                                                <?php echo htmlspecialchars($laptop['spesifikasi']); ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <strong class="d-block mb-1">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                            Kelebihan
                                        </strong>

                                        <p class="text-muted mb-0">
                                            <?php echo htmlspecialchars($laptop['kelebihan'] ?? '-'); ?>
                                        </p>
                                    </div>

                                    <div>
                                        <strong class="d-block mb-1">
                                            <i class="bi bi-exclamation-circle-fill text-warning"></i>
                                            Kekurangan
                                        </strong>

                                        <p class="text-muted mb-0">
                                            <?php echo htmlspecialchars($laptop['kekurangan'] ?? '-'); ?>
                                        </p>
                                    </div>

                                </div>
                            </article>
                        </div>

                    <?php endforeach; ?>

                </div>

            </section>

        <?php else : ?>

            <section
                class="alert alert-warning border-0 shadow-sm mb-5"
                data-aos="fade-up"
                data-aos-delay="150"
            >
                <h5 class="fw-bold">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    Rekomendasi Belum Ditemukan
                </h5>

                <p class="mb-0">
                    Budget yang dimasukkan belum memenuhi harga minimum laptop
                    pada kategori kebutuhan yang dipilih. Silakan naikkan budget
                    atau pilih kategori kebutuhan yang lebih ringan.
                </p>
            </section>

        <?php endif; ?>

        <?php if (!empty($aturanAktif)) : ?>

            <section
                class="card border-0 shadow-sm"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-diagram-3-fill text-success"></i>
                        Aturan yang Digunakan Sistem
                    </h5>

                    <ul class="mb-0">

                        <?php foreach ($aturanAktif as $aturan) : ?>

                            <li class="mb-2">
                                <?php echo htmlspecialchars($aturan); ?>
                            </li>

                        <?php endforeach; ?>

                    </ul>

                </div>
            </section>

        <?php endif; ?>

        <div class="mt-4" data-aos="fade-up" data-aos-delay="250">
            <a href="konsultasi.php" class="btn btn-success px-4">
                <i class="bi bi-arrow-repeat"></i>
                Konsultasi Ulang
            </a>
        </div>

    </main>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 80,
            easing: 'ease-out-cubic'
        });
    </script>

</body>
</html>