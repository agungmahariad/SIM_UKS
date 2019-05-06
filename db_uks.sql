-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 02:19 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uks`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_25_044858_create_tbl_logins_table', 1),
(4, '2018_06_27_074920_create_tbl_rayons_table', 1),
(5, '2018_06_27_203813_create_tbl_rombels_table', 1),
(6, '2018_06_27_210521_create_tbl_jurusans_table', 1),
(7, '2018_06_27_222538_create_tbl_siswas_table', 1),
(8, '2018_07_03_132106_create_tbl_obats_table', 1),
(9, '2018_07_03_143521_create_tbl_pasiens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusans`
--

CREATE TABLE `tbl_jurusans` (
  `id_jurusan` int(10) UNSIGNED NOT NULL,
  `jurusan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_jurusans`
--

INSERT INTO `tbl_jurusans` (`id_jurusan`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Rekayasa Perangkat Lunak (RPL)', NULL, '2018-07-03 14:58:37'),
(2, 'Administrasi Perkantoran (APK)', NULL, NULL),
(3, 'Teknik Jaringan dan Komputer (TKJ)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logins`
--

CREATE TABLE `tbl_logins` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_logins`
--

INSERT INTO `tbl_logins` (`name`, `username`, `password`, `created_at`, `updated_at`) VALUES
('Agung Mahariyad', 'admin', 'admin123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obats`
--

CREATE TABLE `tbl_obats` (
  `id_obat` int(10) UNSIGNED NOT NULL,
  `obat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stok` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kegunaan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_obats`
--

INSERT INTO `tbl_obats` (`id_obat`, `obat`, `stok`, `kegunaan`, `expire`, `created_at`, `updated_at`) VALUES
(3, 'Panadol', '10', 'mengatasi pusing kepala', '2018-08-17', NULL, '2018-08-16 09:15:23'),
(4, 'Promag', '10', 'Mengatasi mag', '2019-05-24', NULL, '2019-04-24 08:08:36'),
(5, 'obat 1', '10', 'sss', '2019-05-24', NULL, '2019-04-24 08:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasiens`
--

CREATE TABLE `tbl_pasiens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `obat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_obat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `bulan` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_pasiens`
--

INSERT INTO `tbl_pasiens` (`id`, `nis`, `nama`, `keterangan`, `obat`, `jumlah_obat`, `tanggal_masuk`, `bulan`, `created_at`, `updated_at`) VALUES
(3, '11605323', 'Agung Mahariyad', 'sakit', 'Panadol', '1', '2018-07-04', 'July', NULL, NULL),
(4, '11605522', 'Firman', 'sakit', 'Panadol', '10', '2018-07-04', 'July', NULL, NULL),
(6, '11605323', 'Agung Mahariyad', 'Terlalu ringan banget', 'obat 1', '5', '2019-04-24', 'April', NULL, NULL),
(7, '11605522', 'Firman', 'Terlalu ringan', 'Panadol', '2', '2019-04-25', 'April', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rayons`
--

CREATE TABLE `tbl_rayons` (
  `id_rayon` int(10) UNSIGNED NOT NULL,
  `rayon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pembimbing` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_rayons`
--

INSERT INTO `tbl_rayons` (`id_rayon`, `rayon`, `pembimbing`, `created_at`, `updated_at`) VALUES
(2, 'Ciawi 1', 'Bu ini', NULL, NULL),
(3, 'Ciawi 2', 'Bu itu', NULL, NULL),
(4, 'Ciawi 3', 'Bapak ini', NULL, NULL),
(5, 'Ciawi 4', 'Bapak itu', NULL, NULL),
(6, 'Ciawi 5', 'Bu Amanda', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rombels`
--

CREATE TABLE `tbl_rombels` (
  `id_rombel` int(10) UNSIGNED NOT NULL,
  `rombel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_siswa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_rombels`
--

INSERT INTO `tbl_rombels` (`id_rombel`, `rombel`, `jumlah_siswa`, `created_at`, `updated_at`) VALUES
(1, 'RPL XI-1', '41', NULL, '2018-07-03 14:51:10'),
(2, 'RPL XI-2', '40', NULL, NULL),
(3, 'RPL XI-3', '40', NULL, NULL),
(4, 'RPL XI-4', '41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswas`
--

CREATE TABLE `tbl_siswas` (
  `nis` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rombel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rayon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_siswas`
--

INSERT INTO `tbl_siswas` (`nis`, `nama`, `jurusan`, `rombel`, `rayon`, `created_at`, `updated_at`) VALUES
('11605323', 'Agung Mahariyad', 'Rekayasa Perangkat Lunak (RPL)', 'RPL XI-4', 'Ciawi 5', NULL, NULL),
('11605522', 'Firman', 'Rekayasa Perangkat Lunak (RPL)', 'RPL XI-4', 'Ciawi 5', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_jurusans`
--
ALTER TABLE `tbl_jurusans`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_obats`
--
ALTER TABLE `tbl_obats`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tbl_pasiens`
--
ALTER TABLE `tbl_pasiens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rayons`
--
ALTER TABLE `tbl_rayons`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Indexes for table `tbl_rombels`
--
ALTER TABLE `tbl_rombels`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_jurusans`
--
ALTER TABLE `tbl_jurusans`
  MODIFY `id_jurusan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_obats`
--
ALTER TABLE `tbl_obats`
  MODIFY `id_obat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_pasiens`
--
ALTER TABLE `tbl_pasiens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_rayons`
--
ALTER TABLE `tbl_rayons`
  MODIFY `id_rayon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_rombels`
--
ALTER TABLE `tbl_rombels`
  MODIFY `id_rombel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
