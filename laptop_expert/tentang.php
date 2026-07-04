<?php
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tentang | LAPTOP EXPERT</title>

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
                TENTANG SISTEM
            </span>

            <h1 class="fw-bold">Tentang LAPTOP-EXPERT</h1>

            <p class="text-muted col-lg-8">
                LAPTOP-EXPERT adalah aplikasi sistem pakar yang membantu pengguna
                memilih laptop berdasarkan kategori kebutuhan dan budget yang dimiliki.
                Sistem ini menggunakan metode rule-based dengan pendekatan
                forward chaining.
            </p>
        </section>

        <section class="row g-4 mb-5">

            <div class="col-md-4">
                <article class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">

                        <i class="bi bi-cpu fs-2 text-success"></i>

                        <h4 class="fw-bold mt-3">Sistem Pakar</h4>

                        <p class="text-muted mb-0">
                            Sistem meniru cara seorang ahli dalam memberikan
                            rekomendasi laptop berdasarkan pengetahuan yang telah
                            dimasukkan ke dalam basis pengetahuan.
                        </p>

                    </div>
                </article>
            </div>

            <div class="col-md-4">
                <article class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">

                        <i class="bi bi-database fs-2 text-success"></i>

                        <h4 class="fw-bold mt-3">Knowledge Base</h4>

                        <p class="text-muted mb-0">
                            Basis pengetahuan berisi data laptop, kategori penggunaan,
                            harga, spesifikasi, kelebihan, kekurangan, serta aturan
                            rekomendasi.
                        </p>

                    </div>
                </article>
            </div>

            <div class="col-md-4">
                <article class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">

                        <i class="bi bi-lightning-charge fs-2 text-success"></i>

                        <h4 class="fw-bold mt-3">Rule-Based</h4>

                        <p class="text-muted mb-0">
                            Sistem menggunakan aturan IF–THEN untuk mencocokkan
                            kebutuhan pengguna dengan laptop yang tersedia.
                        </p>

                    </div>
                </article>
            </div>

        </section>

        <section class="card border-0 shadow-sm mb-5">
            <div class="card-body p-4 p-md-5">

                <h2 class="fw-bold mb-3">
                    Metode Forward Chaining
                </h2>

                <p class="text-muted">
                    Forward chaining adalah metode penalaran yang dimulai dari fakta
                    atau data yang diberikan pengguna. Pada aplikasi ini, fakta berupa
                    kategori kebutuhan dan budget pengguna akan dibandingkan dengan
                    aturan IF–THEN yang tersedia.
                </p>

                <div class="row g-3 mt-2">

                    <div class="col-md-4">
                        <div class="border rounded-3 p-3 h-100">
                            <span class="badge text-bg-success mb-2">01</span>

                            <h6 class="fw-bold">Input Fakta</h6>

                            <p class="small text-muted mb-0">
                                Pengguna memilih kategori kebutuhan dan memasukkan
                                budget maksimal.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="border rounded-3 p-3 h-100">
                            <span class="badge text-bg-success mb-2">02</span>

                            <h6 class="fw-bold">Pencocokan Aturan</h6>

                            <p class="small text-muted mb-0">
                                Sistem membandingkan fakta pengguna dengan aturan
                                pada basis pengetahuan.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="border rounded-3 p-3 h-100">
                            <span class="badge text-bg-success mb-2">03</span>

                            <h6 class="fw-bold">Rekomendasi</h6>

                            <p class="small text-muted mb-0">
                                Laptop yang memenuhi aturan akan ditampilkan sebagai
                                hasil rekomendasi.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <h2 class="fw-bold mb-3">Contoh Aturan Sistem</h2>

                <div class="bg-light border rounded-3 p-4">

                    <p class="mb-2">
                        <strong>IF</strong> kebutuhan = Menengah
                        <strong>AND</strong> budget ≥ Rp10.500.000
                    </p>

                    <p class="mb-0">
                        <strong>THEN</strong> rekomendasi =
                        Acer Aspire 5 Slim RTX
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