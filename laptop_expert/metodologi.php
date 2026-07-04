<?php
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Metodologi | LAPTOP EXPERT</title>

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
    <link
    rel="stylesheet"
    href="https://unpkg.com/aos@2.3.4/dist/aos.css"
>
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <main class="container py-5" style="margin-top: 90px; max-width: 1100px;">

        <section class="mb-5">
            <span class="badge text-bg-success mb-3">
                METODOLOGI SISTEM
            </span>

            <h1 class="fw-bold">Cara Kerja Sistem</h1>

            <p class="text-muted col-lg-8">
                LAPTOP-EXPERT menggunakan metode forward chaining untuk menghasilkan
                rekomendasi laptop berdasarkan fakta yang dimasukkan oleh pengguna.
            </p>
        </section>

        <section class="row g-4 mb-5">

            <div class="col-md-4">
                <article class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge text-bg-success fs-6">01</span>
                            <h5 class="fw-bold mb-0">Input Pengguna</h5>
                        </div>

                        <p class="text-muted mb-0">
                            Pengguna memilih kategori kebutuhan laptop dan memasukkan
                            budget maksimal yang dimiliki.
                        </p>

                    </div>
                </article>
            </div>

            <div class="col-md-4">
                <article class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge text-bg-success fs-6">02</span>
                            <h5 class="fw-bold mb-0">Pencocokan Rule</h5>
                        </div>

                        <p class="text-muted mb-0">
                            Sistem mencocokkan fakta pengguna dengan aturan IF–THEN
                            yang tersimpan pada basis pengetahuan.
                        </p>

                    </div>
                </article>
            </div>

            <div class="col-md-4">
                <article class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">

                        <div class="d-flex align-items-center gap-3 mb-3">
                            <span class="badge text-bg-success fs-6">03</span>
                            <h5 class="fw-bold mb-0">Hasil Rekomendasi</h5>
                        </div>

                        <p class="text-muted mb-0">
                            Laptop yang memenuhi kategori kebutuhan dan batas budget
                            akan ditampilkan sebagai rekomendasi.
                        </p>

                    </div>
                </article>
            </div>

        </section>

        <section class="card border-0 shadow-sm mb-5">
            <div class="card-body p-4 p-md-5">

                <h2 class="fw-bold mb-4">Alur Forward Chaining</h2>

                <div class="row g-4 align-items-center">

                    <div class="col-md-3">
                        <div class="border rounded-3 p-3 h-100">
                            <i class="bi bi-person-fill text-success fs-3"></i>

                            <h6 class="fw-bold mt-3">Fakta</h6>

                            <p class="small text-muted mb-0">
                                Kebutuhan dan budget pengguna.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-1 text-center">
                        <i class="bi bi-arrow-right fs-3 text-success"></i>
                    </div>

                    <div class="col-md-4">
                        <div class="border rounded-3 p-3 h-100">
                            <i class="bi bi-diagram-3-fill text-success fs-3"></i>

                            <h6 class="fw-bold mt-3">Rule IF–THEN</h6>

                            <p class="small text-muted mb-0">
                                Sistem mengecek aturan yang sesuai dengan fakta.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-1 text-center">
                        <i class="bi bi-arrow-right fs-3 text-success"></i>
                    </div>

                    <div class="col-md-3">
                        <div class="border rounded-3 p-3 h-100">
                            <i class="bi bi-laptop-fill text-success fs-3"></i>

                            <h6 class="fw-bold mt-3">Rekomendasi</h6>

                            <p class="small text-muted mb-0">
                                Laptop yang paling sesuai.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <h2 class="fw-bold mb-4">Contoh Proses Penalaran</h2>

                <div class="border rounded-3 p-4 mb-3">
                    <span class="badge text-bg-secondary mb-2">FAKTA</span>

                    <p class="mb-0">
                        Kebutuhan pengguna = Menengah<br>
                        Budget pengguna = Rp12.000.000
                    </p>
                </div>

                <div class="border rounded-3 p-4 mb-3">
                    <span class="badge text-bg-success mb-2">ATURAN</span>

                    <p class="mb-0">
                        IF kebutuhan = Menengah AND budget ≥ Rp10.500.000<br>
                        THEN rekomendasi = Acer Aspire 5 Slim RTX
                    </p>
                </div>

                <div class="border border-success rounded-3 p-4">
                    <span class="badge text-bg-success mb-2">KESIMPULAN</span>

                    <p class="mb-0">
                        Sistem menampilkan Acer Aspire 5 Slim RTX sebagai salah satu
                        laptop yang sesuai dengan kebutuhan pengguna.
                    </p>
                </div>

            </div>
        </section>

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