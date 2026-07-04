<?php require 'config/database.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>LAPTOP EXPERT</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- AOS -->
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">

<!-- CSS -->
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<!-- NAVBAR -->
<?php include 'includes/navbar.php'; ?>

<!-- HERO -->
<?php include 'pages/hero.php'; ?>

<!-- COUNTER (INI YANG HILANG SEBELUMNYA) -->
<?php include 'pages/counter.php'; ?>

<!-- ABOUT -->
<?php include 'pages/about.php'; ?>

<!-- WORKFLOW -->
<?php include 'pages/workflow.php'; ?>

<!-- FEATURES -->
<?php include 'pages/features.php'; ?>

<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>


<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 1000,
    once: true,
    offset: 120,
    easing: 'ease-in-out'
});
</script>

</body>
</html>