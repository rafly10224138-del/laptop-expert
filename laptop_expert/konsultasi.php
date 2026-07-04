<?php require 'config/database.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Konsultasi | LAPTOP EXPERT</title>

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

    <main class="container py-5" style="margin-top: 90px; max-width: 800px;">

        <section data-aos="fade-up">

            <a href="index.php" class="text-success text-decoration-none">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Beranda
            </a>

            <h1 class="fw-bold mt-3">Konsultasi Laptop</h1>

            <p class="text-muted mb-0">
                Isi kebutuhan penggunaan dan budget maksimal untuk mendapatkan
                rekomendasi laptop yang sesuai.
            </p>

        </section>

        <section
            class="card border-0 shadow-sm mt-4"
            data-aos="fade-up"
            data-aos-delay="100"
        >
            <div class="card-body p-4 p-md-5">

                <div class="d-flex align-items-center gap-3 mb-4">

                    <div
                        class="d-flex align-items-center justify-content-center rounded-circle"
                        style="width: 48px; height: 48px; background-color: #dcfce7;"
                    >
                        <i class="bi bi-cpu-fill fs-4 text-success"></i>
                    </div>

                    <div>
                        <h4 class="fw-bold mb-1">Formulir Konsultasi</h4>

                        <p class="text-muted small mb-0">
                            Sistem akan menganalisis jawaban Anda menggunakan aturan Forward Chaining.
                        </p>
                    </div>

                </div>

                <form
                    id="formKonsultasi"
                    action="proses_konsultasi.php"
                    method="POST"
                >

                    <div class="mb-4">

                        <label for="kebutuhan" class="form-label fw-semibold">
                            <i class="bi bi-laptop me-1 text-success"></i>
                            Kategori Kebutuhan
                        </label>

                        <select
                            class="form-select form-select-lg"
                            name="kebutuhan"
                            id="kebutuhan"
                            required
                        >
                            <option value="">-- Pilih kategori kebutuhan --</option>

                            <option value="1">
                                Ringan — tugas, browsing, Microsoft Office
                            </option>

                            <option value="2">
                                Menengah — coding, desain, editing ringan
                            </option>

                            <option value="3">
                                Berat — rendering, editing video, gaming
                            </option>
                        </select>

                        <small class="text-muted d-block mt-2">
                            Pilih kategori yang paling mendekati aktivitas utama Anda.
                        </small>

                    </div>

                    <div class="mb-4">

                        <label for="budget" class="form-label fw-semibold">
                            <i class="bi bi-wallet2 me-1 text-success"></i>
                            Budget Maksimal
                        </label>

                        <div class="input-group input-group-lg">

                            <span class="input-group-text bg-light">
                                Rp
                            </span>

                            <input
                                type="text"
                                class="form-control"
                                name="budget"
                                id="budget"
                                placeholder="Contoh: 6500000"
                                inputmode="numeric"
                                autocomplete="off"
                                required
                            >

                        </div>

                        <small class="text-muted d-block mt-2">
                            Masukkan angka tanpa titik atau koma. Contoh: 6500000
                        </small>

                    </div>

                    <div class="d-flex flex-wrap gap-3 align-items-center">

                        <button
                            type="submit"
                            id="btnProses"
                            class="btn btn-success px-4"
                        >
                            <i class="bi bi-search me-2"></i>
                            Dapatkan Rekomendasi
                        </button>

                        <a href="index.php" class="text-muted text-decoration-none">
                            Batal
                        </a>

                    </div>

                </form>

            </div>
        </section>

        <section
            class="row g-3 mt-4"
            data-aos="fade-up"
            data-aos-delay="180"
        >

            <div class="col-md-4">
                <div class="bg-light rounded-4 p-3 h-100">
                    <i class="bi bi-1-circle-fill text-success fs-4"></i>
                    <h6 class="fw-bold mt-2">Pilih Kebutuhan</h6>
                    <p class="text-muted small mb-0">
                        Tentukan tingkat aktivitas penggunaan laptop.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-light rounded-4 p-3 h-100">
                    <i class="bi bi-2-circle-fill text-success fs-4"></i>
                    <h6 class="fw-bold mt-2">Masukkan Budget</h6>
                    <p class="text-muted small mb-0">
                        Sistem menyesuaikan rekomendasi dengan budget maksimal.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="bg-light rounded-4 p-3 h-100">
                    <i class="bi bi-3-circle-fill text-success fs-4"></i>
                    <h6 class="fw-bold mt-2">Lihat Hasil</h6>
                    <p class="text-muted small mb-0">
                        Dapatkan rekomendasi laptop beserta aturan yang digunakan.
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
            easing: "ease-out-cubic"
        });
    </script>

    <script src="assets/js/main.js"></script>

</body>
</html>