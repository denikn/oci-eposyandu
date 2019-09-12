-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2019 at 12:07 PM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eposyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cf_accesses`
--

CREATE TABLE `cf_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` smallint(6) NOT NULL,
  `parent_id` smallint(6) DEFAULT NULL,
  `url` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cf_roles`
--

CREATE TABLE `cf_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cf_roles`
--

INSERT INTO `cf_roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, NULL),
(2, 'kapus', 'Kepala Puskesmas', NULL, NULL),
(3, 'petugas', 'Petugas Puskesmas', NULL, NULL),
(4, 'kader', 'Kader Posyandu', NULL, NULL),
(5, 'ortu', 'Orang Tua Anak', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cf_users`
--

CREATE TABLE `cf_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cf_users`
--

INSERT INTO `cf_users` (`id`, `fullname`, `username`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$FoOKmtV6oJF4/5cGxZsyAeFtwIm7uA0EjwrsKo9vz6A9BciWXY0uq', 1, 1, NULL, NULL),
(2, 'Dian Sastro W', 'diansastro', '$2y$10$8tjSrBeZsC9b9H2IuEy2puQF6wclKSfIizPhejwSRJAS5WH8gVVAS', 5, 1, '2019-09-03 17:00:00', '2019-09-03 17:00:00'),
(8, 'Adhisty Zara S. K', 'adhistyzara', '$2y$10$6Q/59ucOyxaOGw7niWuumeBFoh5wIkBRe6yVPY1nYzhhCQ9zpLlFW', 5, 1, '2019-09-06 09:13:55', '2019-09-06 09:13:55'),
(9, 'Adhisty Zara S. K', 'eveanton', '$2y$10$1k74b7yW7ClklA36Rv8dYOj9dDuifIL/VqzXb.uheyKplpbP6327.', 5, 1, '2019-09-12 05:07:07', '2019-09-12 05:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_28_073639_create_cf_users_table', 1),
(2, '2019_08_28_101126_create_cf_roles_table', 1),
(3, '2019_08_28_103245_create_cf_accesses_table', 1),
(4, '2019_08_30_072700_create_ref_balita_table', 2),
(5, '2019_08_30_075552_create_ref_ortu_table', 2),
(6, '2019_09_04_072849_create_trx_pertumbuhan_table', 2),
(7, '2019_09_04_073844_create_trx_imunisasi_table', 2),
(8, '2019_09_04_074006_create_ref_imunisasi_table', 2),
(10, '2019_09_04_083505_create_ref_sex_table', 3),
(11, '2019_09_06_102055_create_ref_posyandu_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ref_balita`
--

CREATE TABLE `ref_balita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nika` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_rm` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex_id` smallint(6) NOT NULL DEFAULT '1',
  `pob` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `birth_weight` int(11) NOT NULL,
  `birth_height` int(11) NOT NULL,
  `head_circ` int(11) NOT NULL,
  `status` enum('normal','cesar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `ortu_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_balita`
--

INSERT INTO `ref_balita` (`id`, `nika`, `no_rm`, `name`, `sex_id`, `pob`, `dob`, `birth_weight`, `birth_height`, `head_circ`, `status`, `ortu_id`, `created_at`, `updated_at`) VALUES
(3, '1424167561786', '126415246552', 'Bimaji Harjunet SUsanto', 2, 'Sleman', '2019-08-22', 11, 50, 24, 'normal', 3, '2019-09-06 09:40:25', '2019-09-06 09:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `ref_imunisasi`
--

CREATE TABLE `ref_imunisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_imunisasi`
--

INSERT INTO `ref_imunisasi` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BCG', 'Vaksin BCG', NULL, NULL),
(2, 'DTP', 'Vaksin DTP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_ortu`
--

CREATE TABLE `ref_ortu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex_id` smallint(6) NOT NULL DEFAULT '1',
  `pob` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_ortu`
--

INSERT INTO `ref_ortu` (`id`, `nik`, `no_kk`, `name`, `sex_id`, `pob`, `dob`, `phone`, `email`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1050241708900001', '1050241708900001', 'Dian Sastro W', 3, 'Sleman', '1990-09-04', '82225550717', 'diansastro@gmail.com', 'Jl. Gatotkaca No.502, Pringgolayan, Banguntapan, Jeruklegi, Bantul Regency, Special Region of Yogyakarta 55198', 1, '2019-09-03 17:00:00', '2019-09-03 17:00:00'),
(3, '576417241241241', '781524124125', 'Adhisty Zara S. K', 2, 'Sleman', '1993-08-22', '081234567890', 'zara@jkt48.com', 'Lebakbulus, Jakarta Selatan', 8, '2019-09-06 09:13:55', '2019-09-06 09:13:55'),
(4, '576417241241241', '781524124125', 'Adhisty Zara S. K', 2, 'Sleman', '1993-08-22', '081234567890', 'zara@jkt48.com', 'Lebakbulus, Jakarta Selatan', 9, '2019-09-12 05:07:07', '2019-09-12 05:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `ref_posyandu`
--

CREATE TABLE `ref_posyandu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puskesmas_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_posyandu`
--

INSERT INTO `ref_posyandu` (`id`, `code`, `name`, `puskesmas_code`, `created_at`, `updated_at`) VALUES
(1, '123456', 'Posyandu Kutilang', 'P12345678', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_sex`
--

CREATE TABLE `ref_sex` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ref_sex`
--

INSERT INTO `ref_sex` (`id`, `name`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'Tidak Diketahui', 'U', NULL, NULL),
(2, 'Laki-laki', 'L', NULL, NULL),
(3, 'Perempuan', 'P', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trx_imunisasi`
--

CREATE TABLE `trx_imunisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visit_date` date NOT NULL,
  `imunisasi_id` smallint(6) NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trx_imunisasi`
--

INSERT INTO `trx_imunisasi` (`id`, `visit_date`, `imunisasi_id`, `place`, `created_at`, `updated_at`) VALUES
(1, '2019-12-22', 1, 'Posyandu Merpati', '2019-09-12 05:00:08', '2019-09-12 05:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `trx_pertumbuhan`
--

CREATE TABLE `trx_pertumbuhan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visit_date` date NOT NULL,
  `posyandu_id` smallint(6) NOT NULL,
  `balita_id` smallint(6) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `head_circ` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trx_pertumbuhan`
--

INSERT INTO `trx_pertumbuhan` (`id`, `visit_date`, `posyandu_id`, `balita_id`, `weight`, `height`, `head_circ`, `created_at`, `updated_at`) VALUES
(1, '2019-08-22', 1, 3, 20, 51, 12, '2019-09-06 10:07:14', '2019-09-06 10:07:14'),
(2, '2019-09-22', 1, 3, 20, 51, 12, '2019-09-06 10:07:33', '2019-09-06 10:07:33'),
(3, '2019-10-22', 1, 3, 20, 51, 12, '2019-09-06 10:07:39', '2019-09-06 10:07:39'),
(4, '2019-11-22', 1, 3, 20, 51, 12, '2019-09-06 10:07:43', '2019-09-06 10:07:43'),
(5, '2019-12-22', 1, 3, 20, 51, 12, '2019-09-06 10:07:48', '2019-09-06 10:07:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cf_accesses`
--
ALTER TABLE `cf_accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cf_roles`
--
ALTER TABLE `cf_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cf_users`
--
ALTER TABLE `cf_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_balita`
--
ALTER TABLE `ref_balita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_imunisasi`
--
ALTER TABLE `ref_imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_ortu`
--
ALTER TABLE `ref_ortu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_posyandu`
--
ALTER TABLE `ref_posyandu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref_sex`
--
ALTER TABLE `ref_sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_imunisasi`
--
ALTER TABLE `trx_imunisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_pertumbuhan`
--
ALTER TABLE `trx_pertumbuhan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cf_accesses`
--
ALTER TABLE `cf_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cf_roles`
--
ALTER TABLE `cf_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cf_users`
--
ALTER TABLE `cf_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ref_balita`
--
ALTER TABLE `ref_balita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_imunisasi`
--
ALTER TABLE `ref_imunisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ref_ortu`
--
ALTER TABLE `ref_ortu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ref_posyandu`
--
ALTER TABLE `ref_posyandu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_sex`
--
ALTER TABLE `ref_sex`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trx_imunisasi`
--
ALTER TABLE `trx_imunisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trx_pertumbuhan`
--
ALTER TABLE `trx_pertumbuhan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
