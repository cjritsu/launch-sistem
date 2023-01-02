-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 07:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departemens`
--

CREATE TABLE `departemens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(2, 'Staff Biro Sistem dan Teknologi Informatika', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(3, 'Staff Assistant Lab', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(4, 'Staff Biro SDM UBD', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(5, 'Kepala Biro Sistem dan Teknologi Informatika', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(6, 'Kepala Biro Rektorat', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(7, 'Kepala Bagian Development dan Training', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(8, 'Staff Development dan Training', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(9, 'Kepala Biro SDM', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(10, 'Staff Biro SDM UBD', '2022-12-30 02:52:26', '2022-12-30 02:52:26'),
(11, 'Kepala Badan Administrasi Akademik', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(12, 'Kepala Bagian Proses Pembelajaran', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(13, 'Staff Badan Administrasi Akademik', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(14, 'Kepala Bagian Pengelolaan Proses Pembelajaran', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(15, 'Staff Badan Administrasi Keuangan', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(16, 'Staff Finance', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(17, 'Kepala Accounting', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(18, 'Staff Accounting', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(19, 'Kepala Badan Administrasi Akademik', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(20, 'Supervisor Finance', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(21, 'Sekretaris', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(22, 'Kepala Keuangan & BPH & Kepala BPH', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(23, 'Staff BPH', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(24, 'Wakil Dekan Fakultas Bisnis', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(25, 'Dekan Fakultas Bisnis', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(26, 'Ketua Jurusan Manajemen', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(27, 'Ketua Jurusan D-3 Akuntansi', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(28, 'Ketua Jurusan Administrasi Niaga', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(29, 'Ketua Jurusan Akuntansi', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(30, 'Staff Kepala Tata Usaha Fakultas Bisnis', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(31, 'Kepala Tata Usaha Fakultas Bisnis', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(32, 'Staff PIC Pelaksanaan Tridharma Dosen Fakultas Bisnis', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(33, 'Ketua Jurusan D-3 Bahasa Inggris', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(34, 'Staff Fakultas Humaniora', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(35, 'Staff Admin Mata Kuliah Umum', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(36, 'Ketua Jurusan Sastra Inggris', '2022-12-30 02:52:27', '2022-12-30 02:52:27'),
(37, 'Dosen', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(38, 'Staff Kepala Tata Usaha Fakultas Humaniora', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(39, 'Koordinasi Penelitian', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(40, 'Kepala Tata Usaha Fakultas Humaniora', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(41, 'Ketua Jurusan Ilmu Komunikasi', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(42, 'Wakil Dekan Fakultas Sains', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(43, 'Staff Kepala Tata Usaha Fakultas Sains', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(44, 'Ketua Jurusan Teknik Perangkat Lunak', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(45, 'Koordinator Jurnal Fakultas Sains & Teknologi', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(46, 'PIC Fakultas Sains', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(47, 'Ketua Jurusan Teknik Industri', '2022-12-30 02:52:28', '2022-12-30 02:52:28'),
(48, 'Ketua Jurusan Sistem Informasi', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(49, 'Kepala Tata Usaha Fakultas Sains', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(50, 'Ketua Jurusan Teknik Informatika', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(51, 'Dekan Fakultas Sains', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(52, 'Ketua Jurusan Teknik Elektro', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(53, 'Office Boy', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(54, 'Office Girl', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(55, 'Kepala LP3KM', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(56, 'Sekretaris LP3KM', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(57, 'Kepala Bagian Publikasi dan Pengabdian Kepada Masyarakat', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(58, 'Kepala Lembaga Penjaminan Mutu', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(59, 'Staff Lembaga Penjamin Mutu', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(60, 'Staff Marketing', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(61, 'Supervisor Marketing', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(62, 'Kepala Perpustakaan UBD', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(63, 'Staff Perpustakaan', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(64, 'Kepala PDPT', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(65, 'Kepala Bagian Feeder Dikti', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(66, 'Kepala Bagian Sapto & Sister', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(67, 'Wakil Rektor I', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(68, 'Kepala Biro Rektorat', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(69, 'Wakil Rektor III', '2022-12-30 02:52:29', '2022-12-30 02:52:29'),
(70, 'Staff Administrasi Keuangan Rektorat', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(71, 'Rektor & Wakil Rektor II', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(72, 'Staff Administrasi dan IT Rektorat', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(73, 'Wakil Kepala Biro SDM Tenaga Pendidik', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(74, 'Staff Payroll', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(75, 'Satpam', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(76, 'Kepala Training Center', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(77, 'Kepala Perpustakaan Perguruan & Wakil Kepala Biro SDM PPS', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(78, 'Kepala Pembelian', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(79, 'Kepala Gudang', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(80, 'Kepala Bagian Umum', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(81, 'Supir', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(82, 'Ekspedisi', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(83, 'Staff Pembelian', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(84, 'Operator Telepon', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(85, 'Staff Umum', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(86, 'Tukang Kebon', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(87, 'Koordinator Maintenance', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(88, 'Maintence', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(89, 'Kepala Biro Kemahasiswaan', '2022-12-30 02:52:30', '2022-12-30 02:52:30'),
(90, 'Staff Biro Kemahasiswaan', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(91, 'Staff Kerjasama', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(92, 'Dekan Fakultas Humaniora', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(93, 'Ketua Tata Usaha Bidang Akademik', '2022-12-30 02:52:31', '2022-12-30 02:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cutis`
--

CREATE TABLE `jenis_cutis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_cutis`
--

INSERT INTO `jenis_cutis` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cuti Tahunan', NULL, NULL),
(2, 'Cuti Khusus', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis__izins`
--

CREATE TABLE `jenis__izins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis__izins`
--

INSERT INTO `jenis__izins` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tidak Masuk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_kerja_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `status_karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `user_id`, `agama`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `unit_kerja_id`, `jabatan_id`, `status_karyawan_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2022-12-30 02:53:06', '2022-12-30 02:53:06'),
(2, 2, NULL, NULL, NULL, NULL, NULL, 2, 5, 2, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(3, 3, NULL, NULL, NULL, NULL, NULL, 2, 7, 2, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(4, 4, NULL, NULL, NULL, NULL, NULL, 2, 2, 2, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(5, 5, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(6, 6, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(7, 7, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(8, 8, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(9, 9, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(10, 10, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(11, 11, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(12, 12, NULL, NULL, NULL, NULL, NULL, 2, 2, 1, '2022-12-30 02:53:07', '2022-12-30 02:53:07'),
(13, 13, NULL, NULL, NULL, NULL, NULL, 3, 9, 1, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(14, 14, NULL, NULL, NULL, NULL, NULL, 3, 10, 2, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(15, 15, NULL, NULL, NULL, NULL, NULL, 3, 75, 1, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(16, 16, NULL, NULL, NULL, NULL, NULL, 3, 76, 1, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(17, 17, NULL, NULL, NULL, NULL, NULL, 3, 9, 1, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(18, 18, NULL, NULL, NULL, NULL, NULL, 5, 72, 1, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(19, 19, NULL, NULL, NULL, NULL, NULL, 4, 12, 2, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(20, 20, NULL, NULL, NULL, NULL, NULL, 4, 12, 2, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(21, 21, NULL, NULL, NULL, NULL, NULL, 4, 13, 2, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(22, 22, NULL, NULL, NULL, NULL, NULL, 4, 14, 2, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(23, 23, NULL, NULL, NULL, NULL, NULL, 4, 13, 2, '2022-12-30 02:53:08', '2022-12-30 02:53:08'),
(24, 24, NULL, NULL, NULL, NULL, NULL, 4, 13, 2, '2022-12-30 02:53:09', '2022-12-30 02:53:09'),
(25, 25, NULL, NULL, NULL, NULL, NULL, 4, 13, 2, '2022-12-30 02:53:09', '2022-12-30 02:53:09'),
(26, 26, NULL, NULL, NULL, NULL, NULL, 4, 13, 1, '2022-12-30 02:53:09', '2022-12-30 02:53:09'),
(27, 27, NULL, NULL, NULL, NULL, NULL, 4, 13, 2, '2022-12-30 02:53:09', '2022-12-30 02:53:09'),
(28, 28, NULL, NULL, NULL, NULL, NULL, 6, 15, 2, '2022-12-30 02:53:09', '2022-12-30 02:53:09'),
(29, 29, NULL, NULL, NULL, NULL, NULL, 6, 16, 2, '2022-12-30 02:53:09', '2022-12-30 02:53:09'),
(30, 30, NULL, NULL, NULL, NULL, NULL, 6, 17, 2, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(31, 31, NULL, NULL, NULL, NULL, NULL, 6, 18, 2, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(32, 32, NULL, NULL, NULL, NULL, NULL, 6, 16, 2, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(33, 33, NULL, NULL, NULL, NULL, NULL, 6, 18, 2, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(34, 34, NULL, NULL, NULL, NULL, NULL, 6, 19, 1, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(35, 35, NULL, NULL, NULL, NULL, NULL, 6, 20, 2, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(36, 36, NULL, NULL, NULL, NULL, NULL, 7, 21, 2, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(37, 37, NULL, NULL, NULL, NULL, NULL, 7, 22, 1, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(38, 38, NULL, NULL, NULL, NULL, NULL, 7, 23, 2, '2022-12-30 02:53:10', '2022-12-30 02:53:10'),
(39, 39, NULL, NULL, NULL, NULL, NULL, 8, 24, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(40, 40, NULL, NULL, NULL, NULL, NULL, 8, 25, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(41, 41, NULL, NULL, NULL, NULL, NULL, 8, 26, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(42, 42, NULL, NULL, NULL, NULL, NULL, 8, 27, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(43, 43, NULL, NULL, NULL, NULL, NULL, 8, 28, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(44, 44, NULL, NULL, NULL, NULL, NULL, 8, 29, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(45, 45, NULL, NULL, NULL, NULL, NULL, 8, 30, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(46, 46, NULL, NULL, NULL, NULL, NULL, 8, 30, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(47, 47, NULL, NULL, NULL, NULL, NULL, 8, 30, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(48, 48, NULL, NULL, NULL, NULL, NULL, 8, 31, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(49, 49, NULL, NULL, NULL, NULL, NULL, 8, 30, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(50, 50, NULL, NULL, NULL, NULL, NULL, 8, 30, 2, '2022-12-30 02:53:11', '2022-12-30 02:53:11'),
(51, 51, NULL, NULL, NULL, NULL, NULL, 8, 32, 1, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(52, 52, NULL, NULL, NULL, NULL, NULL, 9, 33, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(53, 53, NULL, NULL, NULL, NULL, NULL, 9, 34, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(54, 54, NULL, NULL, NULL, NULL, NULL, 9, 37, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(55, 55, NULL, NULL, NULL, NULL, NULL, 9, 36, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(56, 56, NULL, NULL, NULL, NULL, NULL, 9, 37, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(57, 57, NULL, NULL, NULL, NULL, NULL, 9, 38, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(58, 58, NULL, NULL, NULL, NULL, NULL, 9, 39, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(59, 59, NULL, NULL, NULL, NULL, NULL, 9, 40, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(60, 60, NULL, NULL, NULL, NULL, NULL, 9, 92, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(61, 61, NULL, NULL, NULL, NULL, NULL, 9, 38, 1, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(62, 62, NULL, NULL, NULL, NULL, NULL, 9, 35, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(63, 63, NULL, NULL, NULL, NULL, NULL, 9, 41, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(64, 64, NULL, NULL, NULL, NULL, NULL, 10, 42, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(65, 65, NULL, NULL, NULL, NULL, NULL, 10, 43, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(66, 66, NULL, NULL, NULL, NULL, NULL, 10, 37, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(67, 67, NULL, NULL, NULL, NULL, NULL, 10, 43, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(68, 68, NULL, NULL, NULL, NULL, NULL, 10, 43, 2, '2022-12-30 02:53:12', '2022-12-30 02:53:12'),
(69, 69, NULL, NULL, NULL, NULL, NULL, 10, 44, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(70, 70, NULL, NULL, NULL, NULL, NULL, 10, 45, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(71, 71, NULL, NULL, NULL, NULL, NULL, 10, 46, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(72, 72, NULL, NULL, NULL, NULL, NULL, 10, 47, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(73, 73, NULL, NULL, NULL, NULL, NULL, 10, 48, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(74, 74, NULL, NULL, NULL, NULL, NULL, 10, 49, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(75, 75, NULL, NULL, NULL, NULL, NULL, 10, 93, 1, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(76, 76, NULL, NULL, NULL, NULL, NULL, 10, 43, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(77, 77, NULL, NULL, NULL, NULL, NULL, 10, 50, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(78, 78, NULL, NULL, NULL, NULL, NULL, 10, 51, 1, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(79, 79, NULL, NULL, NULL, NULL, NULL, 10, 52, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(80, 80, NULL, NULL, NULL, NULL, NULL, 11, 53, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(81, 81, NULL, NULL, NULL, NULL, NULL, 11, 53, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(82, 82, NULL, NULL, NULL, NULL, NULL, 11, 53, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(83, 83, NULL, NULL, NULL, NULL, NULL, 11, 53, 2, '2022-12-30 02:53:13', '2022-12-30 02:53:13'),
(84, 84, NULL, NULL, NULL, NULL, NULL, 11, 53, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(85, 85, NULL, NULL, NULL, NULL, NULL, 11, 53, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(86, 86, NULL, NULL, NULL, NULL, NULL, 11, 53, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(87, 87, NULL, NULL, NULL, NULL, NULL, 11, 54, 1, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(88, 88, NULL, NULL, NULL, NULL, NULL, 11, 54, 1, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(89, 89, NULL, NULL, NULL, NULL, NULL, 12, 55, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(90, 90, NULL, NULL, NULL, NULL, NULL, 12, 56, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(91, 91, NULL, NULL, NULL, NULL, NULL, 12, 57, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(92, 92, NULL, NULL, NULL, NULL, NULL, 13, 58, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(93, 93, NULL, NULL, NULL, NULL, NULL, 13, 59, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(94, 94, NULL, NULL, NULL, NULL, NULL, 13, 59, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(95, 95, NULL, NULL, NULL, NULL, NULL, 14, 60, 2, '2022-12-30 02:53:14', '2022-12-30 02:53:14'),
(96, 96, NULL, NULL, NULL, NULL, NULL, 14, 61, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(97, 97, NULL, NULL, NULL, NULL, NULL, 15, 62, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(98, 98, NULL, NULL, NULL, NULL, NULL, 15, 63, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(99, 99, NULL, NULL, NULL, NULL, NULL, 15, 63, 1, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(100, 100, NULL, NULL, NULL, NULL, NULL, 15, 63, 1, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(101, 101, NULL, NULL, NULL, NULL, NULL, 16, 64, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(102, 102, NULL, NULL, NULL, NULL, NULL, 16, 65, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(103, 103, NULL, NULL, NULL, NULL, NULL, 16, 66, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(104, 104, NULL, NULL, NULL, NULL, NULL, 5, 67, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(105, 105, NULL, NULL, NULL, NULL, NULL, 5, 68, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(106, 106, NULL, NULL, NULL, NULL, NULL, 5, 69, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(107, 107, NULL, NULL, NULL, NULL, NULL, 5, 70, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(108, 108, NULL, NULL, NULL, NULL, NULL, 5, 73, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(109, 109, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(110, 110, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(111, 111, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(112, 112, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(113, 113, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(114, 114, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(115, 115, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(116, 116, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:15', '2022-12-30 02:53:15'),
(117, 117, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(118, 118, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(119, 119, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(120, 120, NULL, NULL, NULL, NULL, NULL, 17, 76, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(121, 121, NULL, NULL, NULL, NULL, NULL, 17, 76, 1, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(122, 122, NULL, NULL, NULL, NULL, NULL, 17, 76, 1, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(123, 123, NULL, NULL, NULL, NULL, NULL, 18, 77, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(124, 124, NULL, NULL, NULL, NULL, NULL, 19, 78, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(125, 125, NULL, NULL, NULL, NULL, NULL, 19, 80, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(126, 126, NULL, NULL, NULL, NULL, NULL, 19, 81, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(127, 127, NULL, NULL, NULL, NULL, NULL, 19, 82, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(128, 128, NULL, NULL, NULL, NULL, NULL, 19, 83, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(129, 129, NULL, NULL, NULL, NULL, NULL, 19, 84, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(130, 130, NULL, NULL, NULL, NULL, NULL, 19, 85, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:16'),
(131, 131, NULL, NULL, NULL, NULL, NULL, 19, 86, 2, '2022-12-30 02:53:16', '2022-12-30 02:53:17'),
(132, 132, NULL, NULL, NULL, NULL, NULL, 19, 87, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(133, 133, NULL, NULL, NULL, NULL, NULL, 19, 83, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(134, 134, NULL, NULL, NULL, NULL, NULL, 19, 83, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(135, 135, NULL, NULL, NULL, NULL, NULL, 19, 83, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(136, 136, NULL, NULL, NULL, NULL, NULL, 19, 88, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(137, 137, NULL, NULL, NULL, NULL, NULL, 19, 89, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(138, 138, NULL, NULL, NULL, NULL, NULL, 19, 90, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(139, 139, NULL, NULL, NULL, NULL, NULL, 19, 90, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(140, 140, NULL, NULL, NULL, NULL, NULL, 19, 90, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(141, 141, NULL, NULL, NULL, NULL, NULL, 19, 90, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(142, 142, NULL, NULL, NULL, NULL, NULL, 19, 83, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(143, 143, NULL, NULL, NULL, NULL, NULL, 19, 83, 2, '2022-12-30 02:53:17', '2022-12-30 02:53:17'),
(144, 144, NULL, NULL, NULL, NULL, NULL, 20, 91, 2, '2022-12-30 02:53:18', '2022-12-30 02:53:18'),
(145, 145, NULL, NULL, NULL, NULL, NULL, 20, 92, 2, '2022-12-30 02:53:18', '2022-12-30 02:53:18'),
(146, 146, NULL, NULL, NULL, NULL, NULL, 20, 93, 2, '2022-12-30 02:53:18', '2022-12-30 02:53:18');

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
(292, '2022_08_06_063647_create_permission_tables', 2),
(1327, '2020_11_20_100001_create_log_table', 4),
(2588, '2014_10_12_100000_create_password_resets_table', 5),
(2589, '2019_08_19_000000_create_failed_jobs_table', 5),
(2590, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(2591, '2022_09_24_091533_create_status_cutis_table', 5),
(2592, '2022_09_25_063432_create_unit__kerjas_table', 5),
(2593, '2022_09_25_071842_create_departemens_table', 5),
(2594, '2022_09_25_071842_create_jabatans_table', 5),
(2595, '2022_09_25_071857_create_jenis_cutis_table', 5),
(2596, '2022_09_25_071909_create_roles_table', 5),
(2597, '2022_09_25_071910_create_users_table', 5),
(2598, '2022_09_25_071918_create_pegawais_table', 5),
(2599, '2022_09_25_071937_create_pengajuan__cutis_table', 5),
(2600, '2022_10_04_102879_create_status_karyawans_table', 5),
(2601, '2022_10_05_103800_create_karyawans_table', 5),
(2602, '2022_10_06_063647_create_permission_tables', 5),
(2603, '2022_10_07_071910_create_users_table', 5),
(2604, '2022_10_26_084941_add_jatah_cuti', 5),
(2605, '2022_10_31_070500_create_jenis__izins_table', 5),
(2606, '2022_10_31_070503_pengajuan_izins', 5),
(2607, '2022_11_08_064521_create_activity_log_table', 5),
(2608, '2022_11_08_064522_add_event_column_to_activity_log_table', 5),
(2609, '2022_11_08_064523_add_batch_uuid_column_to_activity_log_table', 5),
(2610, '2022_11_08_065353_create_pengajuan__absens_table', 5),
(2611, '2022_12_02_140815_create_notifications_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 25),
(2, 'App\\Models\\User', 26),
(2, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 28),
(2, 'App\\Models\\User', 29),
(2, 'App\\Models\\User', 30),
(2, 'App\\Models\\User', 31),
(2, 'App\\Models\\User', 32),
(2, 'App\\Models\\User', 33),
(2, 'App\\Models\\User', 35),
(2, 'App\\Models\\User', 36),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 39),
(2, 'App\\Models\\User', 41),
(2, 'App\\Models\\User', 42),
(2, 'App\\Models\\User', 43),
(2, 'App\\Models\\User', 44),
(2, 'App\\Models\\User', 45),
(2, 'App\\Models\\User', 46),
(2, 'App\\Models\\User', 47),
(2, 'App\\Models\\User', 48),
(2, 'App\\Models\\User', 49),
(2, 'App\\Models\\User', 50),
(2, 'App\\Models\\User', 51),
(2, 'App\\Models\\User', 52),
(2, 'App\\Models\\User', 53),
(2, 'App\\Models\\User', 54),
(2, 'App\\Models\\User', 55),
(2, 'App\\Models\\User', 56),
(2, 'App\\Models\\User', 57),
(2, 'App\\Models\\User', 58),
(2, 'App\\Models\\User', 59),
(2, 'App\\Models\\User', 61),
(2, 'App\\Models\\User', 62),
(2, 'App\\Models\\User', 63),
(2, 'App\\Models\\User', 64),
(2, 'App\\Models\\User', 65),
(2, 'App\\Models\\User', 66),
(2, 'App\\Models\\User', 67),
(2, 'App\\Models\\User', 68),
(2, 'App\\Models\\User', 69),
(2, 'App\\Models\\User', 70),
(2, 'App\\Models\\User', 71),
(2, 'App\\Models\\User', 72),
(2, 'App\\Models\\User', 73),
(2, 'App\\Models\\User', 74),
(2, 'App\\Models\\User', 75),
(2, 'App\\Models\\User', 76),
(2, 'App\\Models\\User', 77),
(2, 'App\\Models\\User', 79),
(2, 'App\\Models\\User', 80),
(2, 'App\\Models\\User', 81),
(2, 'App\\Models\\User', 82),
(2, 'App\\Models\\User', 83),
(2, 'App\\Models\\User', 84),
(2, 'App\\Models\\User', 85),
(2, 'App\\Models\\User', 86),
(2, 'App\\Models\\User', 87),
(2, 'App\\Models\\User', 88),
(2, 'App\\Models\\User', 90),
(2, 'App\\Models\\User', 91),
(2, 'App\\Models\\User', 93),
(2, 'App\\Models\\User', 94),
(2, 'App\\Models\\User', 95),
(2, 'App\\Models\\User', 96),
(2, 'App\\Models\\User', 98),
(2, 'App\\Models\\User', 99),
(2, 'App\\Models\\User', 100),
(2, 'App\\Models\\User', 102),
(2, 'App\\Models\\User', 103),
(2, 'App\\Models\\User', 104),
(2, 'App\\Models\\User', 106),
(2, 'App\\Models\\User', 107),
(2, 'App\\Models\\User', 108),
(2, 'App\\Models\\User', 109),
(2, 'App\\Models\\User', 110),
(2, 'App\\Models\\User', 111),
(2, 'App\\Models\\User', 112),
(2, 'App\\Models\\User', 113),
(2, 'App\\Models\\User', 114),
(2, 'App\\Models\\User', 115),
(2, 'App\\Models\\User', 116),
(2, 'App\\Models\\User', 117),
(2, 'App\\Models\\User', 118),
(2, 'App\\Models\\User', 119),
(2, 'App\\Models\\User', 120),
(2, 'App\\Models\\User', 121),
(2, 'App\\Models\\User', 122),
(2, 'App\\Models\\User', 124),
(2, 'App\\Models\\User', 125),
(2, 'App\\Models\\User', 126),
(2, 'App\\Models\\User', 128),
(2, 'App\\Models\\User', 129),
(2, 'App\\Models\\User', 130),
(2, 'App\\Models\\User', 131),
(2, 'App\\Models\\User', 132),
(2, 'App\\Models\\User', 133),
(2, 'App\\Models\\User', 134),
(2, 'App\\Models\\User', 135),
(2, 'App\\Models\\User', 136),
(2, 'App\\Models\\User', 137),
(2, 'App\\Models\\User', 138),
(2, 'App\\Models\\User', 139),
(2, 'App\\Models\\User', 140),
(2, 'App\\Models\\User', 141),
(2, 'App\\Models\\User', 142),
(2, 'App\\Models\\User', 143),
(2, 'App\\Models\\User', 145),
(2, 'App\\Models\\User', 146),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 34),
(3, 'App\\Models\\User', 37),
(3, 'App\\Models\\User', 40),
(3, 'App\\Models\\User', 60),
(3, 'App\\Models\\User', 78),
(3, 'App\\Models\\User', 89),
(3, 'App\\Models\\User', 92),
(3, 'App\\Models\\User', 97),
(3, 'App\\Models\\User', 101),
(3, 'App\\Models\\User', 105),
(3, 'App\\Models\\User', 123),
(3, 'App\\Models\\User', 127),
(3, 'App\\Models\\User', 144),
(4, 'App\\Models\\User', 18),
(5, 'App\\Models\\User', 13),
(5, 'App\\Models\\User', 14),
(5, 'App\\Models\\User', 15),
(5, 'App\\Models\\User', 16),
(5, 'App\\Models\\User', 17);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_izins`
--

CREATE TABLE `pengajuan_izins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unit_kerja_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_izin_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_izin_awal` date NOT NULL,
  `tanggal_izin_akhir` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `num_days` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kp` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_hrd` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_rek` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan__absens`
--

CREATE TABLE `pengajuan__absens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unit_kerja_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_absen_awal` date NOT NULL,
  `tanggal_absen_akhir` date NOT NULL,
  `tanggal_berita` date NOT NULL,
  `tinggalin_absen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surat_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kp` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_rek` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_hrd` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan__cutis`
--

CREATE TABLE `pengajuan__cutis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `unit_kerja_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_cuti_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_days` int(11) NOT NULL DEFAULT 0,
  `status_kp` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_rek` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_hrd` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan__cutis`
--

INSERT INTO `pengajuan__cutis` (`id`, `user_id`, `unit_kerja_id`, `jenis_cuti_id`, `tanggal_mulai`, `tanggal_akhir`, `tanggal_masuk`, `keterangan`, `num_days`, `status_kp`, `status_rek`, `status_hrd`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 1, '2023-01-02', '2023-01-06', '2023-01-09', 'asfaf', 5, 2, 2, 2, '2022-12-30 04:45:56', NULL),
(2, 3, 2, 1, '2022-12-27', '2022-12-30', '2023-01-02', 'safsdg', 4, 2, 2, 2, '2022-12-30 04:46:45', NULL),
(3, 4, 2, 1, '2023-01-02', '2023-01-13', '2023-01-16', 'adsafa', 12, 2, 2, 2, '2022-12-30 05:04:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'web', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(2, 'edit-users', 'web', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(3, 'delete-users', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(4, 'create-profile', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(5, 'edit-profile', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(6, 'delete-profile', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(7, 'create-surat', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(8, 'edit-surat', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(9, 'delete-surat', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(10, 'validasi-surat', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(11, 'validasi-kp', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(12, 'validasi-hrd', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(13, 'validasi-rek', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(14, 'full-access', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32'),
(15, 'reset_jatah_cuti', 'web', '2022-12-30 02:52:32', '2022-12-30 02:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(2, 'Staff', 'web', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(3, 'Kepala Unit', 'web', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(4, 'Rektorat', 'web', '2022-12-30 02:52:31', '2022-12-30 02:52:31'),
(5, 'HRD', 'web', '2022-12-30 02:52:31', '2022-12-30 02:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 5),
(5, 1),
(5, 2),
(5, 5),
(6, 1),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(9, 1),
(10, 1),
(10, 3),
(10, 4),
(10, 5),
(11, 1),
(11, 3),
(12, 1),
(12, 5),
(13, 1),
(13, 4),
(14, 1),
(15, 1),
(15, 5);

-- --------------------------------------------------------

--
-- Table structure for table `status_karyawans`
--

CREATE TABLE `status_karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_karyawans`
--

INSERT INTO `status_karyawans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Karyawan Kontrak', NULL, NULL),
(2, 'Karyawan Tetap', NULL, NULL),
(3, 'Keluar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_surat`
--

CREATE TABLE `status_surat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_surat`
--

INSERT INTO `status_surat` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', NULL, NULL),
(2, 'Diterima', NULL, NULL),
(3, 'Ditolak', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerjas`
--

CREATE TABLE `unit_kerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unit_kerjas`
--

INSERT INTO `unit_kerjas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-12-30 02:52:24', '2022-12-30 02:52:24'),
(2, 'BSTI', '2022-12-30 02:52:24', '2022-12-30 02:52:24'),
(3, 'SDM', '2022-12-30 02:52:24', '2022-12-30 02:52:24'),
(4, 'BAA', '2022-12-30 02:52:24', '2022-12-30 02:52:24'),
(5, 'Rektorat', '2022-12-30 02:52:24', '2022-12-30 02:52:24'),
(6, 'BAK', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(7, 'BPH', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(8, 'Fakultas Bisnis', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(9, 'Fakultas Humaniora', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(10, 'Fakultas Sains', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(11, 'OB', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(12, 'LP3KM', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(13, 'LPM', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(14, 'Marketing', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(15, 'Perpustakaan', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(16, 'PDPT', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(17, 'Satpam', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(18, 'Training center', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(19, 'Umum', '2022-12-30 02:52:25', '2022-12-30 02:52:25'),
(20, 'Wakil Rektorat III', '2022-12-30 02:52:25', '2022-12-30 02:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jatah_cuti` int(11) NOT NULL DEFAULT 12
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `nip`, `password`, `roles_id`, `remember_token`, `created_at`, `updated_at`, `jatah_cuti`) VALUES
(1, 'Admin Admin', NULL, NULL, 'admin', '$2y$10$VSb7LFhD9tg7hgtzqMX.xOw7C897jaoE6e8MR8wvbxWv7mZ9cH0.6', 1, NULL, '2022-12-30 02:52:34', NULL, 12),
(2, 'Amesanggeng Pataropura', NULL, NULL, '150050', '$2y$10$/2nDkIt9ecsw1gSVqgKyC.Jt6nsPBve8U4iNhTApc1A170ASuzU1K', 3, NULL, '2022-12-30 02:52:35', NULL, 12),
(3, 'Suwitno', NULL, NULL, '150054', '$2y$10$vZOjpEZcka0fK/iw58GoxuCgvZ2xCO5/bXy3Ze9IgLlf.FcptjVI6', 2, NULL, '2022-12-30 02:52:35', NULL, 12),
(4, 'Sevtian Ferdian', NULL, NULL, '150058', '$2y$10$Iio/JGNNk5hWlSUHfdSqx.9URYmnZ9k8onLA.R30kr3.xkoYp7x3u', 2, NULL, '2022-12-30 02:52:35', NULL, 12),
(5, 'Caroline Noviany', NULL, NULL, '200009', '$2y$10$rJTFfHkr8sLm/FAl9GumdOns3BJe5DS0dPI/OtpQWcKSpN1BBIvpK', 2, NULL, '2022-12-30 02:52:36', NULL, 12),
(6, 'Aryadewa Satyagraha', NULL, NULL, '220001', '$2y$10$f6I7i11ivOmfBiBqxI28lOqFLu8HQ457GGZ7OyvjVTijQaB76.yE.', 2, NULL, '2022-12-30 02:52:36', NULL, 12),
(7, 'Giordio Rico Prasetya', NULL, NULL, '220002', '$2y$10$DYZeOLC3jRgCXC5je3VxReUUUxbfPEGijvdh6g8wsQdo3MuYqJdnW', 2, NULL, '2022-12-30 02:52:36', NULL, 12),
(8, 'Andika', NULL, NULL, '220004', '$2y$10$M4tZA6VBnIBUemKuSHcSAuclzbijqyyFCCmwt6N91IHJdRyaH/aem', 2, NULL, '2022-12-30 02:52:36', NULL, 12),
(9, 'Oliver Ignatius Tarunay', NULL, NULL, '220005', '$2y$10$dAUeLeGu33WLMMwtVVmxJOl275ORcas8l94wX4wC1JNzHmjNHLXsG', 2, NULL, '2022-12-30 02:52:36', NULL, 12),
(10, 'Margaretha Natalya', NULL, NULL, '220009', '$2y$10$JLf/7dxAMnhWq/qDYrNsiO0V/bGbTEijCqyC6LxyoKPJQ19SNXHJK', 2, NULL, '2022-12-30 02:52:37', NULL, 12),
(11, 'Lidya Lunardi', NULL, NULL, '220011', '$2y$10$CjDRkSZAANN9GPs9QUj97.3O.MvBqo2.TgyZV4kwaL7wcXAY87Ggy', 2, NULL, '2022-12-30 02:52:37', NULL, 12),
(12, 'Johan Santoso', NULL, NULL, '220016', '$2y$10$2PobF95VVG.7tYajECwkm.QcPjlRJhVrm/o2va4Tm2r4qJEl2LIFW', 2, NULL, '2022-12-30 02:52:37', NULL, 12),
(13, 'Christine', NULL, NULL, '150003', '$2y$10$oKvO5ETffetP98sMf11SfeXf8tc3VgpDXo.ni3X4FyqDQGSye6qqW', 5, NULL, '2022-12-30 02:52:37', NULL, 12),
(14, 'Junus Kamarga', NULL, NULL, '170207', '$2y$10$KPLtsW8WdlrpfjwnoTwR0.Am8ywoZvffO.h1oUwBQ0WWxP4x1Fi4.', 3, NULL, '2022-12-30 02:52:38', NULL, 12),
(15, 'Tjong Se Fung', NULL, NULL, '150002', '$2y$10$6sibqOW1El6f34WV4J5OpOtrQ/gYkm4BzuDp3PA47zK2vuvaa9kuW', 5, NULL, '2022-12-30 02:52:38', NULL, 12),
(16, 'Tandy Awang', NULL, NULL, '150139', '$2y$10$HmEvRFLwM4TwmZRihX.YoOwKbU3uq0UHufUTfxR0bxcv4KAkzWK1G', 5, NULL, '2022-12-30 02:52:38', NULL, 12),
(17, 'Er Lie', NULL, NULL, '180007', '$2y$10$8Ap8XraZuhjOxy2Tn3qAUuxYaU2M9jfi0hdgigt8M4Y3PlODiZHjC', 5, NULL, '2022-12-30 02:52:38', NULL, 12),
(18, 'Limajatini', NULL, NULL, '150190', '$2y$10$0N0tX5DnA3o4jGLiJKmEvukKT2ry7YdHOWjXWCDaNc4JAVmZ06QXi', 4, NULL, '2022-12-30 02:52:38', NULL, 12),
(19, 'Fidellis Wato', NULL, NULL, '150062', '$2y$10$ESVOcU4UCq9vkGxpnUdXfuOpw.Y4H9MpNOR8nub2ywiUQS8PZJA92', 3, NULL, '2022-12-30 02:52:38', NULL, 12),
(20, 'Suhendar Janamarta', NULL, NULL, '150064', '$2y$10$dwFZqeOY7ZXp2vZL6j/m6O8hxccrVUOxSxD0rK/T85HUzf4iHJNTi', 2, NULL, '2022-12-30 02:52:39', NULL, 12),
(21, 'Devi Yanty', NULL, NULL, '150070', '$2y$10$7Uiik6hZIfcE/bXMfuSu/ewjYTAjhw6ksO1AIUxJaBGOFpJELutKy', 2, NULL, '2022-12-30 02:52:39', NULL, 12),
(22, 'Sugandha', NULL, NULL, '150071', '$2y$10$iUF/3te81xWulPmVGotKoe4zyArESCETCOBiRvtivOfA0VNbU86dS', 2, NULL, '2022-12-30 02:52:39', NULL, 12),
(23, 'Supriyadi', NULL, NULL, '150072', '$2y$10$CEHWzzjveCSHGzK258Dx1upnq1eg7CBmU8bhLU3DxB/6lUKqWz10i', 2, NULL, '2022-12-30 02:52:40', NULL, 12),
(24, 'Hanafia', NULL, NULL, '150074', '$2y$10$61LiVBFOiaiEg83PL/rk4Ogdf4MQgFMQw8DU0yYgds/oESEbF3iB2', 2, NULL, '2022-12-30 02:52:40', NULL, 12),
(25, 'Sonny Santosa', NULL, NULL, '150096', '$2y$10$xWvlB/DVe/lCG.em3txgxeyJvkkVtxbbSM5s.I4pJvZNn1/ADXHe6', 2, NULL, '2022-12-30 02:52:40', NULL, 12),
(26, 'Khelvin Mandala Putra', NULL, NULL, '150115', '$2y$10$ujjVnJ7sAVMkV5.IY5UWKu4nBquYONIYaKPEF8StuswCKnsaY1jSG', 2, NULL, '2022-12-30 02:52:40', NULL, 12),
(27, 'Susanti Aggraeni', NULL, NULL, '150116', '$2y$10$IadKoyInGBCmIc1X.XaeHeJ5Lj0WDKnVFNkZ2Yk.wjf81qzD/V/8q', 2, NULL, '2022-12-30 02:52:40', NULL, 12),
(28, 'Anik', NULL, NULL, '150048', '$2y$10$vDgFYQveE1leBUsatXjl1.6C2feJM2LvC28Wit/DECcPwuOa9TPEK', 2, NULL, '2022-12-30 02:52:40', NULL, 12),
(29, 'Tracya Devi, A.', NULL, NULL, '150075', '$2y$10$bkouc4/OGy2MEd5f46BtnOE9B63KJl3DwcScMkSCAoyPP7KQJX4xG', 2, NULL, '2022-12-30 02:52:41', NULL, 12),
(30, 'Hanny Pebriana', NULL, NULL, '150078', '$2y$10$iFNisdyUyLGaJgnu8KeB5uWbaDIljw9YKAIsCI7Fa4/wv5bwPuLou', 2, NULL, '2022-12-30 02:52:41', NULL, 12),
(31, 'Sima Eliana', NULL, NULL, '150134', '$2y$10$DN9CfkeKIa7IFXitwt9inOTwHsEfDdnDJEUV2xe4/1JN9WOyz4/ZW', 2, NULL, '2022-12-30 02:52:41', NULL, 12),
(32, 'Linah', NULL, NULL, '150155', '$2y$10$punT6Lt5ievSHlyj9j/HY.zrwuRHx4WGAVHrvTn/l7sRyl7mCbCEu', 2, NULL, '2022-12-30 02:52:41', NULL, 12),
(33, 'Yuliawati Yohanda', NULL, NULL, '150181', '$2y$10$jp5r3y3x7Lwb0OR7LsnCsedmcr4kL4wIx4MwdiUEkRB6DQIKmSsPm', 2, NULL, '2022-12-30 02:52:42', NULL, 12),
(34, 'Pintor Pangihutan Siahaan', NULL, NULL, '190005', '$2y$10$Tl.nx4FrH8VokxCyU2yBdOAgd8c1BNpZ2RfWTitXACyVkWbojtzJ6', 3, NULL, '2022-12-30 02:52:42', NULL, 12),
(35, 'Ineh Liman', NULL, NULL, '190012', '$2y$10$gzcjrAneXearC8OGB1JHOOFQIIMDWFXgMvyag.wQN9oxPndm0g4/C', 2, NULL, '2022-12-30 02:52:42', NULL, 12),
(36, 'Sugyanto', NULL, NULL, '150083', '$2y$10$iL4kciYGTmpMmWlRUF3tb.J9ClnAQqO0y0NRJxZEg5KdkRQwQzXSm', 2, NULL, '2022-12-30 02:52:42', NULL, 12),
(37, 'Sudaddy Lawita', NULL, NULL, '190006', '$2y$10$IONrmlbiCeElunqBrstH8ubryFinGMrQr4c4ipSjS4KS5ldH46LGS', 3, NULL, '2022-12-30 02:52:42', NULL, 12),
(38, 'Tedy', NULL, NULL, '220013', '$2y$10$xR0nD3esZVikQCE285b55.UrAVtTAPl1XXRjagtEHkZs3a2wazODu', 2, NULL, '2022-12-30 02:52:42', NULL, 12),
(39, 'Agus Kusnawan', NULL, NULL, '150025', '$2y$10$HXU0Rcj8lWc9luQlqyFokuOq2KnSC4qdGC.LhIGUiZLqXo3QSkNY2', 2, NULL, '2022-12-30 02:52:43', NULL, 12),
(40, 'Rr. Dian Aggraeni', NULL, NULL, '150026', '$2y$10$xbcdlsKiMr8MbRKUJf42j.XCnOnDEs5crCs4YED4dqEtfFfHKTpNC', 3, NULL, '2022-12-30 02:52:43', NULL, 12),
(41, 'Eso Hernawan', NULL, NULL, '150031', '$2y$10$r2Gj4vkLvzD1DQwexXGq1u8PlvWQruyRAzHQblQPMu.mFQ36Kxf76', 2, NULL, '2022-12-30 02:52:43', NULL, 12),
(42, 'Peng Wi', NULL, NULL, '150032', '$2y$10$zarKSWcy5T0JyWzSjFSL1O93vWLpZB55zC9uZFZcE7lzf/KCyEkKO', 2, NULL, '2022-12-30 02:52:43', NULL, 12),
(43, 'Andy', NULL, NULL, '150033', '$2y$10$y/z/WXtEh0jPRoamwfBkFuVIcijngzq9JUQFTICXVRxjV7rv4QqsS', 2, NULL, '2022-12-30 02:52:43', NULL, 12),
(44, 'Susanto Wibowo', NULL, NULL, '150036', '$2y$10$0MFicYbOgmu0zwWeberEYu3rRuRRNCtjZCL1V3hMIDU4QFd/MtAq2', 2, NULL, '2022-12-30 02:52:44', NULL, 12),
(45, 'Rina Sulistiyowati', NULL, NULL, '150037', '$2y$10$E8EgvWWAkEtOticc6M80.Oq4njWcgcwaW7nGJVS8PQMUhlObzV9XO', 2, NULL, '2022-12-30 02:52:44', NULL, 12),
(46, 'Metta Susanti', NULL, NULL, '150038', '$2y$10$BKQUYc/zVhXOBpDZrJx5nOgJMCtl3F2l2otN0n0yHfX9alaQH/Hr2', 2, NULL, '2022-12-30 02:52:44', NULL, 12),
(47, 'Triscna Juwita', NULL, NULL, '150039', '$2y$10$wFwU.cNyEvnpigzdIZ7MZOaXuiGgPeemWE8Dcf.kY9edelQFwTk.K', 2, NULL, '2022-12-30 02:52:44', NULL, 12),
(48, 'Sutandi', NULL, NULL, '150063', '$2y$10$dNIng5d5p.lLcWUNU5jyj.O4Qqn5JMfdxgjbXujNn2gbw3cyJaXIm', 2, NULL, '2022-12-30 02:52:45', NULL, 12),
(49, 'Eva Sainura', NULL, NULL, '150066', '$2y$10$T8mwm64PW3c4YHNGYJyv7e/PHZ6J4M.C/C1YwtUVQcPRL2fInaypm', 2, NULL, '2022-12-30 02:52:45', NULL, 12),
(50, 'Selfiyan', NULL, NULL, '150079', '$2y$10$cvh2rCJ6cAxcJ/llg79HnuJcwsO9Bf.YvwXv11x0z/O7br3TDPwm2', 2, NULL, '2022-12-30 02:52:45', NULL, 12),
(51, 'Rinintha Parameswari', NULL, NULL, '220003', '$2y$10$0wzAMFXWnRbKQCu5m04.lu1RFGJO5splLX0b21ZEICc3cti7w6v4.', 2, NULL, '2022-12-30 02:52:45', NULL, 12),
(52, 'Adrallisman', NULL, NULL, '150005', '$2y$10$MlPVmITaNAOY6.gI5zn3u.HTCLFjfoYEzdFOvfTfJ5fF3Budkpsqu', 2, NULL, '2022-12-30 02:52:45', NULL, 12),
(53, 'Maria Magdalena Oy', NULL, NULL, '150007', '$2y$10$8l/MpAjBsNw79tzLrXRGrO0nV6lwGXaF02kygO7nVgA3VdgXl3bqa', 2, NULL, '2022-12-30 02:52:45', NULL, 12),
(54, 'Sonya Ayu Kumala', NULL, NULL, '150008', '$2y$10$ZUoUuEzavTkJAcbvEJfnMOYj71cFn9feFvBtoDD5dSn8lvKT1/Zp.', 2, NULL, '2022-12-30 02:52:45', NULL, 12),
(55, 'Riris Mutiara Paulina Simamora', NULL, NULL, '150010', '$2y$10$UaPfI137./xzUlVNkoR4mOFHxc90pk8H3FbxYb7THdFlhNYMtOZm2', 2, NULL, '2022-12-30 02:52:46', NULL, 12),
(56, 'Hot Saut Halomoan', NULL, NULL, '150011', '$2y$10$DW0KYxdaEf2V1.oaBGwyNOR6drsaAuRfnbU4ZaKFBe9YCs2xt2QVa', 2, NULL, '2022-12-30 02:52:46', NULL, 12),
(57, 'Dhea Anastasia Kesmaningrum', NULL, NULL, '150012', '$2y$10$HNNc./HiGK2Eft/tOn6HueSl3hwzyKANlCv8YxCjSP.3j1FT5yhVK', 2, NULL, '2022-12-30 02:52:47', NULL, 12),
(58, 'Irpan Ali Rahman', NULL, NULL, '150015', '$2y$10$1ihU9L2CLbk0ldWot/9wuOXzujjsEq3z1QsgbPoGg3M9SQ7zh4osW', 2, NULL, '2022-12-30 02:52:47', NULL, 12),
(59, 'Shenny Ayunuri Beata', NULL, NULL, '150017', '$2y$10$Mj4oie.bih6PMfc7L8GJluccERDF/gsuJkGYsHmGWHwqy8z40uKYC', 2, NULL, '2022-12-30 02:52:47', NULL, 12),
(60, 'Dr Lilie Suratminto', NULL, NULL, '150143', '$2y$10$G1QU5VB1GpHnYzLWf6wPautkMhvrrbpt.e0KJPG8aHarO96o4qPoe', 3, NULL, '2022-12-30 02:52:47', NULL, 12),
(61, 'Frendy Dodo Chang', NULL, NULL, '150152', '$2y$10$XCFuD1pJJqUZCIm1U5DxkuTbzsD3gXdqV8diqG.K7FzmC7EJptHWy', 2, NULL, '2022-12-30 02:52:47', NULL, 12),
(62, 'Irawati Megalita', NULL, NULL, '150188', '$2y$10$nYahvAvfE10M2YjuWEJ9T.zSTDBkDiATJFaOefitAnF2dvLnZuiki', 2, NULL, '2022-12-30 02:52:47', NULL, 12),
(63, 'Galuh Kusuma Hapsari', NULL, NULL, '200003', '$2y$10$TBaT0J9swFUcAqRhBbnPKOfs6RtZKSWCHYN6TfU/W/eM2ejlB07/m', 2, NULL, '2022-12-30 02:52:48', NULL, 12),
(64, 'Rudy Arijanto', NULL, NULL, '150040', '$2y$10$mLNvXFz4zBdiSD.yN8bbmeSM0W29/PzMe7M0ieRM4GrF4Sj5yE55y', 2, NULL, '2022-12-30 02:52:48', NULL, 12),
(65, 'Desiyana Lasut', NULL, NULL, '150041', '$2y$10$PR/PvE79Jhd5/IKYnEzl8Oxfqt1Op.jh3JZ3MznYa55KVq2MSiv6i', 2, NULL, '2022-12-30 02:52:49', NULL, 12),
(66, 'Ramona Dyah Safitri', NULL, NULL, '150042', '$2y$10$SiORIaI6f2bmB5Z1OuKA3OhUUJSzu5hkvHJV1PfGKYCleWaVFv3dm', 2, NULL, '2022-12-30 02:52:49', NULL, 12),
(67, 'Edy', NULL, NULL, '150043', '$2y$10$NPcPTqFm2wRN5oWqxfDQjO5Ilo9KFUKUDe9gSUx9OA0w6WQ4af65W', 2, NULL, '2022-12-30 02:52:49', NULL, 12),
(68, 'Budi Gunawan', NULL, NULL, '150044', '$2y$10$styj8u3m.8aA0qDU3ki0kOTzupj.1bZNWqXiiQtPgz6JnFFVX3Nt6', 2, NULL, '2022-12-30 02:52:49', NULL, 12),
(69, 'Dram Renaldi', NULL, NULL, '150049', '$2y$10$aEWjTImqRS2RVt1biU9muOcKqLr7c3wNQjcGaxGIIkJh5GyG/Zf2e', 2, NULL, '2022-12-30 02:52:49', NULL, 12),
(70, 'Rino', NULL, NULL, '150056', '$2y$10$nh13fDO77MGQsS9oafFSHOtsjdl.tMvuJBGhMnTyb5gAMoDhPW78y', 2, NULL, '2022-12-30 02:52:50', NULL, 12),
(71, 'Jacob Febryadi Nithanel Dethan', NULL, NULL, '150077', '$2y$10$Ha8.x0Rxr7ecxKrGLrCtyOWyKR8apfasdq6WR1wqYEqBk71rh/7O2', 2, NULL, '2022-12-30 02:52:50', NULL, 12),
(72, 'Abidin', NULL, NULL, '150081', '$2y$10$x3kxmkPon/3rAoXpGiHkgOLb4OflCSVhvQllihMdzztt3DiWtNIaK', 2, NULL, '2022-12-30 02:52:50', NULL, 12),
(73, 'Benny Daniawan', NULL, NULL, '150101', '$2y$10$qGDUKfAPCdAlG0hzYqxsH.snUJTqeNlhhBmDnYQfM7Ti5MkyQiEky', 2, NULL, '2022-12-30 02:52:50', NULL, 12),
(74, 'Fenarly Junasan', NULL, NULL, '150121', '$2y$10$3CyCVzF7pBwGoB68ZXiSnuApJ2veYUBqWZ5K3qOEAN/kYoEHJq/Ka', 2, NULL, '2022-12-30 02:52:50', NULL, 12),
(75, 'Yakub', NULL, NULL, '150189', '$2y$10$KzaWwC9ETPqjzQs4N19ypeMlNUjo/9KMx7uQ6B0j5bttswhXcMH1O', 2, NULL, '2022-12-30 02:52:51', NULL, 12),
(76, 'Milan Susanto', NULL, NULL, '180001', '$2y$10$wMv3RDeeY5nIjw2b.j4/KOcUD5s5Tip2TFUPXbqH2psBThbBMo0x2', 2, NULL, '2022-12-30 02:52:51', NULL, 12),
(77, 'Hartana Wijaya', NULL, NULL, '180014', '$2y$10$gkis8TAWeo5HL3i06f0uWuT4Aer1Mu2vXGzR3TiuHmgkaz6tTV7JW', 2, NULL, '2022-12-30 02:52:52', NULL, 12),
(78, 'Ir. Amin Suyitno Dr. Eng', NULL, NULL, '1900010', '$2y$10$nSgU6we/eoYbqrDEWfOb7OCzbVMoOMHOWCHNBjTQ4vwSN9L9K118y', 3, NULL, '2022-12-30 02:52:52', NULL, 12),
(79, 'Fajar Gumilang', NULL, NULL, '220015', '$2y$10$8JApRKEqHHFUpDXPLlcmWeZ.eAy.eSaaRYvrCTFskL2m2MppEsOFK', 2, NULL, '2022-12-30 02:52:52', NULL, 12),
(80, 'Suhaeri', NULL, NULL, '150118', '$2y$10$GxS1HwTOxPHnD7VEKpMGi.0WCg6PHZkdGj.wLrJEAX1wJOoepZ5Am', 2, NULL, '2022-12-30 02:52:52', NULL, 12),
(81, 'Mulyadi', NULL, NULL, '150122', '$2y$10$tFvGoghjzuaOMvQI02xFQOf5OBFc3qhXBNg5tFyH05WjDDd.2ihUK', 2, NULL, '2022-12-30 02:52:52', NULL, 12),
(82, 'Ayang', NULL, NULL, '150133', '$2y$10$UkwkNLptMCNLnIyFqwpXOOKEhQaMJWmASDqRJ9bQOF4aF7OoH2bry', 2, NULL, '2022-12-30 02:52:53', NULL, 12),
(83, 'Rizky Komarullah', NULL, NULL, '150129', '$2y$10$S9kFqdvNXXRVGDHfa4nyDOOxYg7Nkl5QzWFJ1B3fHvIKEm2LjDKWa', 2, NULL, '2022-12-30 02:52:53', NULL, 12),
(84, 'Eki Sukarta', NULL, NULL, '150130', '$2y$10$nFFwmM3AMEYaNpNp2xkMzeLNJSEndOMmKNpQPDFN.Cn6f0EznxWFu', 2, NULL, '2022-12-30 02:52:53', NULL, 12),
(85, 'Hendri Muldianto', NULL, NULL, '150135', '$2y$10$6uNYjGOE1zxMkMNFpsK23O21DDrM2EnXKxo1DB7vmYSoKRlniq71q', 2, NULL, '2022-12-30 02:52:53', NULL, 12),
(86, 'Suhenda', NULL, NULL, '150136', '$2y$10$YFgaUhED4oXiO02XnL94pOWPNfrTEp6tq0ysNLyvd/ATtk0buJmy.', 2, NULL, '2022-12-30 02:52:53', NULL, 12),
(87, 'Dika Priskiati', NULL, NULL, '200004', '$2y$10$DGwfaF/B/M6vagEL6azHy.wW76EZSR/4KSaM87FEpI0S0nISdzmGC', 2, NULL, '2022-12-30 02:52:53', NULL, 12),
(88, 'Lilis Suhaeni', NULL, NULL, '200005', '$2y$10$ug1iyrlSqFW08gnnGrUEKe2IS95Z667ezD5iYgNz1cKWFjuK9Xnda', 2, NULL, '2022-12-30 02:52:54', NULL, 12),
(89, 'Sabam Simbolon', NULL, NULL, '150028', '$2y$10$LNh2bvPE1Cuas6MtpYYXt.OqCDJxGpgB99LChIvDhcg3S76QzSu2W', 3, NULL, '2022-12-30 02:52:54', NULL, 12),
(90, 'Etty Herijawati', NULL, NULL, '150029', '$2y$10$DfIwYFpPaiZF5IeT6IQB5.e1qIew9ANWBi4YSp8UE/IxXtp33v8s6', 2, NULL, '2022-12-30 02:52:54', NULL, 12),
(91, 'Yusuf Kurnia', NULL, NULL, '150057', '$2y$10$UV1bbqFIYMzFWL95NzDSke1BPDMRUejfAf88GspspZB0IXdu2Ai62', 2, NULL, '2022-12-30 02:52:54', NULL, 12),
(92, 'Yo Ceng Giap', NULL, NULL, '150051', '$2y$10$bSUFbSKUZGifM2L.Ih98Hu4h.cfDlXRVXwDWZsiyu36bJQSu4sz.K', 3, NULL, '2022-12-30 02:52:55', NULL, 12),
(93, 'Rina Aprilyanti', NULL, NULL, '150073', '$2y$10$Elk7GBlrmG/2W9dpTPijfe6CCuw/ICtWXvm7uJT0s7eJ6csBqq35S', 2, NULL, '2022-12-30 02:52:55', NULL, 12),
(94, 'Lia Dama Yanti', NULL, NULL, '150082', '$2y$10$CZEC9AU..j8vDsaKlcWqLODJDjDNz8a1tEbSneuuJJ1rC9a/94ACW', 2, NULL, '2022-12-30 02:52:55', NULL, 12),
(95, 'Arolda Januar ', NULL, NULL, '150111', '$2y$10$KZ3QpqYOCVkzq.1fJdg6N.Vtc6KlGKEZB94DxaSrKKhibt1.qms1q', 2, NULL, '2022-12-30 02:52:55', NULL, 12),
(96, 'Virgin Nella', NULL, NULL, '150113', '$2y$10$DCW7CnsJqKTKkgA7GyO14.dsuvKoivgw6uGfPHkWOSqaw6hTqQ60i', 2, NULL, '2022-12-30 02:52:56', NULL, 12),
(97, 'Iskandar', NULL, NULL, '150086', '$2y$10$gp0mMreivqzWWTsWznOEaOPO.D/MUJXLWNBOJ5wL/s4nHBqEedlCW', 3, NULL, '2022-12-30 02:52:56', NULL, 12),
(98, 'Haryanto', NULL, NULL, '150097', '$2y$10$eKJ2NBhZRqe0HPCeFIdraOXk6zhhhrVpjAwkK2EMe0buAe6qKJuf.', 2, NULL, '2022-12-30 02:52:56', NULL, 12),
(99, 'Rohman Syaifudin', NULL, NULL, '220008', '$2y$10$60bJDGkceYg7X.h0CtR1aOCsJpP8djLo8wPjUR6G8H4eJDcdL3JBG', 2, NULL, '2022-12-30 02:52:56', NULL, 12),
(100, 'Fathan Zalkafi', NULL, NULL, '220012', '$2y$10$5X3u3Qny1peLWqA7jEhpl.6i9GGmxT6gBeiiSbhF82nuDjymrGsGO', 2, NULL, '2022-12-30 02:52:56', NULL, 12),
(101, 'Aditya Hermawan', NULL, NULL, '150052', '$2y$10$PpNsQfIGp6vRsEbkJomALu4bSLD4ScyEIyaYQylXXT9IWgeTnmvuK', 3, NULL, '2022-12-30 02:52:57', NULL, 12),
(102, 'Ardiane Rossi Kurniawan Maranto', NULL, NULL, '150182', '$2y$10$eVqRqei5Dy0UGG09O7EruOG.xu4WU7ADSnIt2sht9TT75evsfHTiO', 2, NULL, '2022-12-30 02:52:57', NULL, 12),
(103, 'Junaedi', NULL, NULL, '190004', '$2y$10$xj/UCLyrIdVJSbQk0e.Cce.U51uHpxr1Xo8buopArb/GPv8W80b.O', 2, NULL, '2022-12-30 02:52:57', NULL, 12),
(104, 'Suryadi Winata', NULL, NULL, '150001', '$2y$10$K1D0rvRSa2ZZA1R66M8iUOx1exlYmhoGOTq8HFc.PkwioHtgAmRa.', 2, NULL, '2022-12-30 02:52:57', NULL, 12),
(105, 'Pujiarti', NULL, NULL, '150018', '$2y$10$5.LwCTb1hp.rCwPJiXGhvuWG.x2nnbRbVuWPtxkhZ32LRtgXXowmu', 3, NULL, '2022-12-30 02:52:57', NULL, 12),
(106, 'Sutrisna', NULL, NULL, '150027', '$2y$10$PMj0EOTIHMP2DH0AMv7c/.GlrSsXprOs5zJUmKD3wGk4Ni8lUPeAG', 2, NULL, '2022-12-30 02:52:57', NULL, 12),
(107, 'Ade Hadyantoro', NULL, NULL, '150065', '$2y$10$QsFet3Na2PiXGj53y4Nv.u/MeMa6V0JvgPf4s.4wbn94ClR8PJ9M.', 2, NULL, '2022-12-30 02:52:58', NULL, 12),
(108, 'Unif Riyanto', NULL, NULL, '180011', '$2y$10$kWBSdMae1GCcCnWLg/HkweBfJhdFyg8jboWS1duHFytMAxT1yaaze', 2, NULL, '2022-12-30 02:52:58', NULL, 12),
(109, 'Mahpudin', NULL, NULL, '150105', '$2y$10$0RcEmxhmP98MJplo.pumReZi0LxTMKYQ2TuH1/0pGrOoemG93wyLS', 2, NULL, '2022-12-30 02:52:58', NULL, 12),
(110, 'Kodaryanto', NULL, NULL, '150161', '$2y$10$pS6Ltyjajb59uSK1KU9lHuLCc89mrpH4aFDFfzNGu1YHs28XUWEIy', 2, NULL, '2022-12-30 02:52:58', NULL, 12),
(111, 'Abdul Rahman', NULL, NULL, '150162', '$2y$10$G3do.e/kxGggYarllkCl/.a4Iydg3D9I5Yu5.EVBNcIhtsHQKLmfe', 2, NULL, '2022-12-30 02:52:58', NULL, 12),
(112, 'Encung', NULL, NULL, '150164', '$2y$10$y20mUZJzdJBlRibWG7Q3WOgiFY8cNbgQkUZJSRTKYBaHrQLuSaQrW', 2, NULL, '2022-12-30 02:52:59', NULL, 12),
(113, 'Edi Rochyadi', NULL, NULL, '150165', '$2y$10$bBIyy8kiDSDnIm.sm.5Ul..EcEDqXeDG9flCYK/MedhQ5AyQfMrLS', 2, NULL, '2022-12-30 02:52:59', NULL, 12),
(114, 'Alexander Kia Lerek', NULL, NULL, '150166', '$2y$10$vocE6KpIYS8AdJ6hidMnke.2LlvIQi2zGBsze1sI2PMz99107D6Wm', 2, NULL, '2022-12-30 02:52:59', NULL, 12),
(115, 'Narli Atang', NULL, NULL, '150167', '$2y$10$21WW8XNWxwzAdwSyYT2BCOwcVyrRwTS6BtywA.2NXYXuwqHCfhtkS', 2, NULL, '2022-12-30 02:52:59', NULL, 12),
(116, 'Riswanto', NULL, NULL, '150168', '$2y$10$V6MPWkYSoow6t2ZZVK2TYO7fILhUPY7BnF2D8j4sqzhCO0H9pmBsS', 2, NULL, '2022-12-30 02:52:59', NULL, 12),
(117, 'Moh Surip', NULL, NULL, '150169', '$2y$10$8G0zPKCA8kOSUmbSGQ0bDemMuDCA3WJ7AQdyU.o/7hlfqpuh0nzZO', 2, NULL, '2022-12-30 02:53:00', NULL, 12),
(118, 'Saiful Ulum', NULL, NULL, '150172', '$2y$10$OhX5X7tCT2yMBR1I.Hv1c.TZBk.LF4uoazwe/JEAEzXbvj7fOHgri', 2, NULL, '2022-12-30 02:53:00', NULL, 12),
(119, 'Sri Dahlia', NULL, NULL, '150173', '$2y$10$9re6Qs/HSRFQXbKdza5lkeQLnJc8d2nTjGfVkpjOY6J9AUwC45uWW', 2, NULL, '2022-12-30 02:53:00', NULL, 12),
(120, 'Septiyana', NULL, NULL, '150174', '$2y$10$CLy09Z5ZaMsDvixwOd1Q3OPpV5Q1gqKeeFmHo49e.uNBZMWHrhFaW', 2, NULL, '2022-12-30 02:53:00', NULL, 12),
(121, 'Romanus D.S.W Rewa', NULL, NULL, '200007', '$2y$10$pybfUeQ5MrmHHlTXKvl2rO8PtLU5sHtG83iMZdFDKZWNLztXHCoqi', 2, NULL, '2022-12-30 02:53:00', NULL, 12),
(122, 'Agung Priatna', NULL, NULL, '200010', '$2y$10$f0YYBgQRhdLZIf.RvMiPx.e8bjNci1B1qHf4GkjDwJ1oGqV3gyJ6y', 2, NULL, '2022-12-30 02:53:01', NULL, 12),
(123, 'Riki', NULL, NULL, '150061', '$2y$10$NdawZMcfWjhrrm85ACTswOgdoalBe8CTX7nkx1HI.O1Jm2uRjL..2', 3, NULL, '2022-12-30 02:53:01', NULL, 12),
(124, 'Siprianus Wator', NULL, NULL, '150085', '$2y$10$EDxI5nUgwIybP4poCHD6Be4t3.12wIUWh5UcKzvahRIqqkno8kKAa', 2, NULL, '2022-12-30 02:53:01', NULL, 12),
(125, 'Hasan Daud', NULL, NULL, '150088', '$2y$10$3nsQA02GvZTvW0I95G74JOJ9JVikGrp.0YAKCIDhrIVwCwP4VBVgC', 2, NULL, '2022-12-30 02:53:01', NULL, 12),
(126, 'Rudy Kurnia', NULL, NULL, '150089', '$2y$10$xXpdHyq0JlfkjGmogMwlueNuvnRjV9oMIjfrz5q.zLYnBcw3E2aGG', 2, NULL, '2022-12-30 02:53:02', NULL, 12),
(127, 'Tjin Liam', NULL, NULL, '150090', '$2y$10$u2RF2PiQA03EaD.tdZYrGuvNhQZu/CmShHqwxU7SQ7HAfPHZSg5Mu', 3, NULL, '2022-12-30 02:53:02', NULL, 12),
(128, 'Suryadinata', NULL, NULL, '150093', '$2y$10$Xw3CLKD2pGCxbCfJ1zHOCOrXiDM0ZCuwafFyWUiPol34mrmW.ycW.', 2, NULL, '2022-12-30 02:53:02', NULL, 12),
(129, 'Tohari', NULL, NULL, '150094', '$2y$10$EYbCe39Di0AVWCSzOW/8Ue82oMqtADtSOAo9AjnBwNkpKV8oH39QS', 2, NULL, '2022-12-30 02:53:02', NULL, 12),
(130, 'Yanto', NULL, NULL, '150098', '$2y$10$st2UCFB.8iuLIPSth03GeuAR6Zv1NFH5yJ4AEgTElS..11GbtMsRC', 2, NULL, '2022-12-30 02:53:02', NULL, 12),
(131, 'Sri Wahyuni', NULL, NULL, '150099', '$2y$10$hNB2u6u8W1PuVu9lovtxf.bYa8/Z4tXS2PKoR.PCHTPzc9HYQ/L.G', 2, NULL, '2022-12-30 02:53:02', NULL, 12),
(132, 'Anwar Iwan', NULL, NULL, '150100', '$2y$10$AUvZSz5mSzmEj1TIwSmsMuRGYUeCMSu0O0kUhLKgzJixwVmsjUiou', 2, NULL, '2022-12-30 02:53:03', NULL, 12),
(133, 'Edi Wijaya', NULL, NULL, '150102', '$2y$10$m0vIyaCzcQmrA4Gej.lP3utk4nk.wb7P6oUsgrRzabB5GJQW0jnDu', 2, NULL, '2022-12-30 02:53:03', NULL, 12),
(134, 'Siswo Marsudi', NULL, NULL, '150103', '$2y$10$dfTO1ZFlxwCUkgjK1BNa.e5JJcGf/.7LCmOIOrmLGntY4l102opQq', 2, NULL, '2022-12-30 02:53:03', NULL, 12),
(135, 'Marjuki', NULL, NULL, '150104', '$2y$10$trELL75nx7Lj6LoFaGFpxeNUKkNAQFZGWFkGeNTjr4RoEvONDe0c2', 2, NULL, '2022-12-30 02:53:03', NULL, 12),
(136, 'Alfonsius Santos N', NULL, NULL, '150124', '$2y$10$UQ6M6Gtqy0XOOOkv3w.UR.p8DJOa2MAOqlwb9r2ICvUJFTRh3DSnG', 2, NULL, '2022-12-30 02:53:04', NULL, 12),
(137, 'Kin Siong', NULL, NULL, '150156', '$2y$10$aSZzqt2OzkyEDNJAS2BOyOM9magbeFag.n2gRLZyqPKTsORkyjSA2', 2, NULL, '2022-12-30 02:53:04', NULL, 12),
(138, 'Komarudin', NULL, NULL, '150157', '$2y$10$tvZ4hdv0BeJWUXevjS3s9eMgLJ4BqQGvuryUblUQKPiY9nuf9QsUO', 2, NULL, '2022-12-30 02:53:04', NULL, 12),
(139, 'Maryanto Toto', NULL, NULL, '150158', '$2y$10$s3Z5mJy0fGaCqHvxFAdeLeYldlAmf5j6rbasK80ARRi.0.JZ5Mvxi', 2, NULL, '2022-12-30 02:53:04', NULL, 12),
(140, 'Pohan Simanjuntak', NULL, NULL, '150159', '$2y$10$jNCRgMyoeIzOK/fyC3cqqec2AnUU2QgYi4oi14zmr20zmK61t6H4y', 2, NULL, '2022-12-30 02:53:04', NULL, 12),
(141, 'Giandi', NULL, NULL, '150160', '$2y$10$tDcEBcMJW4BCB.AeScjp9OzZXMcf6Te0KU9dqHsoJeAk8YCLipt.G', 2, NULL, '2022-12-30 02:53:05', NULL, 12),
(142, 'Uang Ali Rahman', NULL, NULL, '150178', '$2y$10$8OVoRfYib/n8m7TtERvz6OpoKnD.A1kIF.JX0nRp7h7NYwsDnmax6', 2, NULL, '2022-12-30 02:53:05', NULL, 12),
(143, 'Tohir', NULL, NULL, '180009', '$2y$10$.Fzzjh.v5U/6eb2AzS/.1uvgbkXNbsm/0.KwQpmgRRG7NqCHRHNC6', 2, NULL, '2022-12-30 02:53:05', NULL, 12),
(144, 'G. Widiyanto', NULL, NULL, '150020', '$2y$10$xdXxCUGes7sdkFg/.NEDA.JiFniRxpXQr.r7aUSX/5EQhMB.iNFWu', 3, NULL, '2022-12-30 02:53:05', NULL, 12),
(145, 'Chatrine Goutama', NULL, NULL, '150068', '$2y$10$LPWXhjUOkco4vKQ.PpaOd.YP.mtpkw1QJISr/znQMlt9xaQn9eHFm', 2, NULL, '2022-12-30 02:53:06', NULL, 12),
(146, 'Deki Sulistiyo', NULL, NULL, '150112', '$2y$10$rMkG15T3nndgJDuFlWslXeRIPiUPIHV8UC4OBQRtKq26t4A6Q5JYK', 2, NULL, '2022-12-30 02:53:06', NULL, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_cutis`
--
ALTER TABLE `jenis_cutis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis__izins`
--
ALTER TABLE `jenis__izins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawans_user_id_foreign` (`user_id`),
  ADD KEY `karyawans_unit_kerja_id_foreign` (`unit_kerja_id`),
  ADD KEY `karyawans_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `karyawans_status_karyawan_id_foreign` (`status_karyawan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengajuan_izins`
--
ALTER TABLE `pengajuan_izins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_izins_user_id_foreign` (`user_id`),
  ADD KEY `pengajuan_izins_unit_kerja_id_foreign` (`unit_kerja_id`),
  ADD KEY `pengajuan_izins_jenis_izin_id_foreign` (`jenis_izin_id`),
  ADD KEY `pengajuan_izins_status_kp_foreign` (`status_kp`),
  ADD KEY `pengajuan_izins_status_rek_foreign` (`status_rek`),
  ADD KEY `pengajuan_izins_status_hrd_foreign` (`status_hrd`);

--
-- Indexes for table `pengajuan__absens`
--
ALTER TABLE `pengajuan__absens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan__absens_user_id_foreign` (`user_id`),
  ADD KEY `pengajuan__absens_unit_kerja_id_foreign` (`unit_kerja_id`),
  ADD KEY `pengajuan__absens_status_kp_foreign` (`status_kp`),
  ADD KEY `pengajuan__absens_status_rek_foreign` (`status_rek`),
  ADD KEY `pengajuan__absens_status_hrd_foreign` (`status_hrd`);

--
-- Indexes for table `pengajuan__cutis`
--
ALTER TABLE `pengajuan__cutis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan__cutis_user_id_foreign` (`user_id`),
  ADD KEY `pengajuan__cutis_unit_kerja_id_foreign` (`unit_kerja_id`),
  ADD KEY `pengajuan__cutis_jenis_cuti_id_foreign` (`jenis_cuti_id`),
  ADD KEY `pengajuan__cutis_status_kp_foreign` (`status_kp`),
  ADD KEY `pengajuan__cutis_status_rek_foreign` (`status_rek`),
  ADD KEY `pengajuan__cutis_status_hrd_foreign` (`status_hrd`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `status_karyawans`
--
ALTER TABLE `status_karyawans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_surat`
--
ALTER TABLE `status_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `jenis_cutis`
--
ALTER TABLE `jenis_cutis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis__izins`
--
ALTER TABLE `jenis__izins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2612;

--
-- AUTO_INCREMENT for table `pengajuan_izins`
--
ALTER TABLE `pengajuan_izins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan__absens`
--
ALTER TABLE `pengajuan__absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan__cutis`
--
ALTER TABLE `pengajuan__cutis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_karyawans`
--
ALTER TABLE `status_karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_surat`
--
ALTER TABLE `status_surat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_kerjas`
--
ALTER TABLE `unit_kerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`),
  ADD CONSTRAINT `karyawans_status_karyawan_id_foreign` FOREIGN KEY (`status_karyawan_id`) REFERENCES `status_karyawans` (`id`),
  ADD CONSTRAINT `karyawans_unit_kerja_id_foreign` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerjas` (`id`),
  ADD CONSTRAINT `karyawans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan_izins`
--
ALTER TABLE `pengajuan_izins`
  ADD CONSTRAINT `pengajuan_izins_jenis_izin_id_foreign` FOREIGN KEY (`jenis_izin_id`) REFERENCES `jenis__izins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_izins_status_hrd_foreign` FOREIGN KEY (`status_hrd`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_izins_status_kp_foreign` FOREIGN KEY (`status_kp`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_izins_status_rek_foreign` FOREIGN KEY (`status_rek`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_izins_unit_kerja_id_foreign` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerjas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan_izins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan__absens`
--
ALTER TABLE `pengajuan__absens`
  ADD CONSTRAINT `pengajuan__absens_status_hrd_foreign` FOREIGN KEY (`status_hrd`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__absens_status_kp_foreign` FOREIGN KEY (`status_kp`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__absens_status_rek_foreign` FOREIGN KEY (`status_rek`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__absens_unit_kerja_id_foreign` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerjas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__absens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengajuan__cutis`
--
ALTER TABLE `pengajuan__cutis`
  ADD CONSTRAINT `pengajuan__cutis_jenis_cuti_id_foreign` FOREIGN KEY (`jenis_cuti_id`) REFERENCES `jenis_cutis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__cutis_status_hrd_foreign` FOREIGN KEY (`status_hrd`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__cutis_status_kp_foreign` FOREIGN KEY (`status_kp`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__cutis_status_rek_foreign` FOREIGN KEY (`status_rek`) REFERENCES `status_surat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__cutis_unit_kerja_id_foreign` FOREIGN KEY (`unit_kerja_id`) REFERENCES `unit_kerjas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengajuan__cutis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
