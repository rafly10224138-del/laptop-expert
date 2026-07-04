-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2026 at 08:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop_expert`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id_laptop` int(11) NOT NULL,
  `nama_laptop` varchar(150) NOT NULL,
  `kategori` enum('Ringan','Menengah','Berat') NOT NULL,
  `harga` int(11) NOT NULL,
  `spesifikasi` text NOT NULL,
  `kelebihan` text NOT NULL,
  `kekurangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id_laptop`, `nama_laptop`, `kategori`, `harga`, `spesifikasi`, `kelebihan`, `kekurangan`, `created_at`) VALUES
(1, 'Lenovo IdeaPad Slim 3', 'Ringan', 5800000, 'AMD Ryzen 3, RAM 8 GB, SSD 512 GB', 'Harga terjangkau dan SSD cepat.', 'Layar masih menggunakan TN panel.', '2026-07-04 05:55:51'),
(2, 'Asus VivoBook 14', 'Ringan', 6500000, 'Intel Core i3, RAM 8 GB, SSD 512 GB', 'Ringan dan baterai awet.', 'Kurang cocok untuk gaming atau rendering.', '2026-07-04 05:55:51'),
(3, 'Acer Aspire 5 Slim RTX', 'Menengah', 10500000, 'Intel Core i5, RAM 16 GB, SSD 512 GB, RTX 2050', 'Memiliki GPU diskrit untuk editing ringan.', 'Bodi masih menggunakan bahan plastik.', '2026-07-04 05:55:51'),
(4, 'MacBook Air M1', 'Menengah', 12000000, 'Apple M1, RAM 8 GB, SSD 256 GB', 'Layar bagus, baterai awet, cocok untuk desain.', 'RAM dan storage tidak dapat di-upgrade.', '2026-07-04 05:55:51'),
(5, 'Asus TUF Gaming F15', 'Berat', 13500000, 'Intel Core i5, RAM 16 GB, SSD 512 GB, RTX 3050', 'Performa tinggi untuk rendering dan gaming.', 'Bobot berat dan adaptor besar.', '2026-07-04 05:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_konsultasi`
--

CREATE TABLE `riwayat_konsultasi` (
  `id_riwayat` int(11) NOT NULL,
  `kategori_kebutuhan` enum('Ringan','Menengah','Berat') NOT NULL,
  `budget` int(11) NOT NULL,
  `jumlah_rekomendasi` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_konsultasi`
--

INSERT INTO `riwayat_konsultasi` (`id_riwayat`, `kategori_kebutuhan`, `budget`, `jumlah_rekomendasi`, `created_at`) VALUES
(1, 'Ringan', 7500000, 2, '2026-07-04 06:05:53'),
(2, 'Ringan', 6500000, 2, '2026-07-04 07:37:27'),
(3, 'Menengah', 1000000, 0, '2026-07-04 07:40:29'),
(4, 'Menengah', 10000000, 2, '2026-07-04 07:40:35'),
(5, 'Menengah', 100000000, 4, '2026-07-04 07:48:04'),
(6, 'Menengah', 7000000, 2, '2026-07-04 15:35:45'),
(7, 'Berat', 25000000, 5, '2026-07-04 15:36:47'),
(8, 'Menengah', 11000000, 3, '2026-07-04 15:57:57'),
(9, 'Ringan', 5000000, 0, '2026-07-04 16:00:45'),
(10, 'Ringan', 7500000, 2, '2026-07-04 16:01:02'),
(11, 'Ringan', 8000000, 2, '2026-07-04 16:13:10'),
(12, 'Ringan', 6500000, 2, '2026-07-04 16:25:49'),
(13, 'Ringan', 6800000, 2, '2026-07-04 16:40:59'),
(14, 'Berat', 10000000, 2, '2026-07-04 17:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id_laptop`);

--
-- Indexes for table `riwayat_konsultasi`
--
ALTER TABLE `riwayat_konsultasi`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id_laptop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `riwayat_konsultasi`
--
ALTER TABLE `riwayat_konsultasi`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
