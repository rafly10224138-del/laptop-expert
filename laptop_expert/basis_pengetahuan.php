<?php
require 'config/database.php';

$query = "SELECT * FROM laptops ORDER BY harga ASC";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Data laptop gagal diambil: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Basis Pengetahuan | LAPTOP EXPERT</title>

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
                KNOWLEDGE BASE
            </span>

            <h1 class="fw-bold">Basis Pengetahuan</h1>

            <p class="text-muted col-lg-8">
                Halaman ini menampilkan data laptop yang tersimpan pada basis
                pengetahuan sistem. Data tersebut digunakan untuk menghasilkan
                rekomendasi berdasarkan kebutuhan dan budget pengguna.
            </p>
        </section>

        <section class="row g-4">

            <?php if (mysqli_num_rows($result) > 0) : ?>

                <?php while ($laptop = mysqli_fetch_assoc($result)) : ?>

                    <div class="col-md-6 col-lg-4">
                        <article class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">

                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <span class="badge text-bg-success">
                                        <?php echo htmlspecialchars($laptop['kategori']); ?>
                                    </span>

                                    <i class="bi bi-laptop fs-4 text-success"></i>
                                </div>

                                <h5 class="fw-bold">
                                    <?php echo htmlspecialchars($laptop['nama_laptop']); ?>
                                </h5>

                                <h6 class="text-success fw-bold mb-3">
                                    Rp <?php echo number_format($laptop['harga'], 0, ',', '.'); ?>
                                </h6>

                                <p class="small text-muted mb-3">
                                    <strong>Spesifikasi:</strong><br>
                                    <?php echo htmlspecialchars($laptop['spesifikasi']); ?>
                                </p>

                                <hr>

                                <p class="small mb-2">
                                    <strong>Kelebihan:</strong><br>
                                    <?php echo htmlspecialchars($laptop['kelebihan']); ?>
                                </p>

                                <p class="small mb-0">
                                    <strong>Kekurangan:</strong><br>
                                    <?php echo htmlspecialchars($laptop['kekurangan']); ?>
                                </p>

                            </div>
                        </article>
                    </div>

                <?php endwhile; ?>

            <?php else : ?>

                <div class="col-12">
                    <div class="alert alert-warning">
                        Data laptop belum tersedia di database.
                    </div>
                </div>

            <?php endif; ?>

        </section>

        <section class="card border-0 shadow-sm mt-5">
            <div class="card-body p-4">

                <h4 class="fw-bold mb-4">
                    <i class="bi bi-diagram-3-fill text-success"></i>
                    Aturan IF–THEN Sistem
                </h4>

                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Aturan</th>
                                <th>Rekomendasi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    IF kebutuhan ringan AND budget ≥ Rp5.800.000
                                </td>
                                <td>Lenovo IdeaPad Slim 3</td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>
                                    IF kebutuhan ringan AND budget ≥ Rp6.500.000
                                </td>
                                <td>Asus VivoBook 14</td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>
                                    IF kebutuhan menengah AND budget ≥ Rp10.500.000
                                </td>
                                <td>Acer Aspire 5 Slim RTX</td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>
                                    IF kebutuhan menengah AND budget ≥ Rp12.000.000
                                </td>
                                <td>MacBook Air M1</td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>
                                    IF kebutuhan berat AND budget ≥ Rp13.500.000
                                </td>
                                <td>Asus TUF Gaming F15</td>
                            </tr>
                        </tbody>
                    </table>
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