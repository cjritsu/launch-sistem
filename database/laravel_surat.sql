-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 07:58 PM
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

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Kepala Unit', 'App\\Models\\Pengajuan_Cuti', NULL, 1, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-01 08:51:56', '2022-12-01 08:51:56'),
(2, 'default', 'Kepala Unit', 'App\\Models\\Pengajuan_Absen', NULL, 1, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-01 10:19:10', '2022-12-01 10:19:10'),
(3, 'default', 'Kepala Unit', 'App\\Models\\SuratIzin', NULL, 1, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-01 10:20:29', '2022-12-01 10:20:29'),
(4, 'default', 'HRD', 'App\\Models\\Pengajuan_Cuti', NULL, 1, 'App\\Models\\User', 3, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-01 10:21:26', '2022-12-01 10:21:26'),
(5, 'default', 'HRD', 'App\\Models\\SuratIzin', NULL, 1, 'App\\Models\\User', 3, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-01 10:22:50', '2022-12-01 10:22:50'),
(6, 'default', 'HRD', 'App\\Models\\Pengajuan_Absen', NULL, 1, 'App\\Models\\User', 3, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-01 10:23:10', '2022-12-01 10:23:10'),
(7, 'default', 'Wakil Rektorat', 'App\\Models\\Pengajuan_Cuti', NULL, 1, 'App\\Models\\User', 5, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-01 10:23:38', '2022-12-01 10:23:38'),
(8, 'default', 'HRD', 'App\\Models\\SuratIzin', NULL, 5, 'App\\Models\\User', 3, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-01 12:09:19', '2022-12-01 12:09:19'),
(9, 'default', 'Kepala Unit', 'App\\Models\\SuratIzin', NULL, 7, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 11:42:29', '2022-12-02 11:42:29'),
(10, 'default', 'HRD', 'App\\Models\\SuratIzin', NULL, 7, 'App\\Models\\User', 3, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 11:42:49', '2022-12-02 11:42:49'),
(11, 'default', 'Wakil Rektorat', 'App\\Models\\SuratIzin', NULL, 7, 'App\\Models\\User', 5, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 11:43:12', '2022-12-02 11:43:12'),
(12, 'default', 'Wakil Rektorat', 'App\\Models\\SuratIzin', NULL, 7, 'App\\Models\\User', 5, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 11:49:53', '2022-12-02 11:49:53'),
(13, 'default', 'Wakil Rektorat', 'App\\Models\\SuratIzin', NULL, 7, 'App\\Models\\User', 5, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 11:50:30', '2022-12-02 11:50:30'),
(14, 'default', 'Wakil Rektorat', 'App\\Models\\SuratIzin', NULL, 7, 'App\\Models\\User', 5, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 11:51:15', '2022-12-02 11:51:15'),
(15, 'default', 'Wakil Rektorat', 'App\\Models\\SuratIzin', NULL, 7, 'App\\Models\\User', 5, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 11:59:31', '2022-12-02 11:59:31'),
(16, 'default', 'Kepala Unit', 'App\\Models\\SuratIzin', NULL, 6, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 12:16:34', '2022-12-02 12:16:34'),
(17, 'default', 'Kepala Unit', 'App\\Models\\SuratIzin', NULL, 6, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 12:16:51', '2022-12-02 12:16:51'),
(18, 'default', 'Kepala Unit', 'App\\Models\\SuratIzin', NULL, 6, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 12:17:44', '2022-12-02 12:17:44'),
(19, 'default', 'Kepala Unit', 'App\\Models\\SuratIzin', NULL, 6, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 12:19:03', '2022-12-02 12:19:03'),
(20, 'default', 'Kepala Unit', 'App\\Models\\SuratIzin', NULL, 6, 'App\\Models\\User', 4, '{\"customProperty\":\"customValue\"}', NULL, '2022-12-02 12:19:13', '2022-12-02 12:19:13');

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
(1, 'Staff BSTI', NULL, NULL),
(2, 'Staff Assistant Lab', NULL, NULL),
(3, 'Staff Biro SDM UBD', NULL, NULL),
(4, 'Kepala Unit BSTI', NULL, NULL),
(5, 'Kepala Biro Rektorat', NULL, NULL);

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
(1, 1, 'Buddha', 'Jakarta', '2022-11-30', '087181418282', 'Taman Cibodas', 1, 1, 2, '2022-11-30 12:43:47', '2022-11-30 12:43:47'),
(2, 2, 'Kristen', 'Bandung', '2022-11-30', '087181418181', 'Villa Melati Mas', 1, 2, 2, '2022-11-30 12:43:47', '2022-11-30 12:43:47'),
(3, 3, 'Islam', 'Tangerang', '2022-11-30', '08718141777', 'Suka Bumi', 4, 3, 2, '2022-11-30 12:43:47', '2022-11-30 12:43:47'),
(4, 4, 'Khonghucu', 'Tangerang', '2022-11-30', '08718121777', 'Karawaci', 1, 4, 2, '2022-11-30 12:43:47', '2022-11-30 12:43:47'),
(5, 5, 'Katholik', 'Tangerang', '2022-11-30', '087787409290', 'Tiga Raksa', 6, 5, 2, '2022-11-30 12:43:47', '2022-11-30 12:43:47');

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
(1002, '2022_09_25_071842_create_departemens_table', 3),
(1004, '2022_09_25_071909_create_roles_table', 3),
(1005, '2022_09_25_071910_create_users_table', 3),
(1327, '2020_11_20_100001_create_log_table', 4),
(2068, '2014_10_12_100000_create_password_resets_table', 5),
(2069, '2019_08_19_000000_create_failed_jobs_table', 5),
(2070, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(2071, '2022_09_24_091533_create_status_cutis_table', 5),
(2072, '2022_09_25_063432_create_unit__kerjas_table', 5),
(2073, '2022_09_25_071842_create_jabatans_table', 5),
(2074, '2022_09_25_071857_create_jenis_cutis_table', 5),
(2075, '2022_09_25_071918_create_pegawais_table', 5),
(2076, '2022_09_25_071937_create_pengajuan__cutis_table', 5),
(2077, '2022_10_04_102879_create_status_karyawans_table', 5),
(2078, '2022_10_05_103800_create_karyawans_table', 5),
(2079, '2022_10_06_063647_create_permission_tables', 5),
(2080, '2022_10_07_071910_create_users_table', 5),
(2081, '2022_10_26_084941_add_jatah_cuti', 5),
(2082, '2022_10_31_070500_create_jenis__izins_table', 5),
(2083, '2022_10_31_070503_pengajuan_izins', 5),
(2084, '2022_11_08_064521_create_activity_log_table', 5),
(2085, '2022_11_08_064522_add_event_column_to_activity_log_table', 5),
(2086, '2022_11_08_064523_add_batch_uuid_column_to_activity_log_table', 5),
(2087, '2022_11_08_065353_create_pengajuan__absens_table', 5),
(2088, '2022_12_02_140815_create_notifications_table', 6);

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
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 3);

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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('5a0e4c7b-5596-42bc-b7a4-32c3e11f3d9f', 'App\\Notifications\\IncomingReport', 'App\\Models\\User', 2, '{\"id\":1,\"user_id\":2,\"name\":\"Staff San\",\"surat\":\"Tidak Masuk\"}', NULL, '2022-12-02 12:19:14', '2022-12-02 12:19:14');

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
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kp` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_hrd` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `status_rek` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_izins`
--

INSERT INTO `pengajuan_izins` (`id`, `user_id`, `unit_kerja_id`, `jenis_izin_id`, `tanggal_izin_awal`, `tanggal_izin_akhir`, `tanggal_masuk`, `keterangan`, `status_kp`, `status_hrd`, `status_rek`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2022-12-05', '2022-12-06', '2022-12-08', 'sdfsdgs', 2, 3, 1, '2022-12-01 07:02:37', '2022-12-01 10:22:50'),
(5, 4, 1, 1, '2022-12-05', '2022-12-07', '2022-12-08', 'safafsdf', 2, 3, 1, '2022-12-01 11:57:52', '2022-12-01 12:09:18'),
(6, 2, 1, 1, '2022-12-05', '2022-12-05', '2022-12-06', 'Mau Izin', 3, 1, 1, '2022-12-02 07:40:07', '2022-12-02 12:19:13'),
(7, 2, 1, 1, '2022-12-06', '2022-12-08', '2022-12-09', 'asfsga', 2, 2, 3, '2022-12-02 11:19:14', '2022-12-02 11:59:30');

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

--
-- Dumping data for table `pengajuan__absens`
--

INSERT INTO `pengajuan__absens` (`id`, `user_id`, `unit_kerja_id`, `tanggal_absen_awal`, `tanggal_absen_akhir`, `tanggal_berita`, `tinggalin_absen`, `tanggal_masuk`, `keterangan`, `image`, `surat_dokter`, `status_kp`, `status_rek`, `status_hrd`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2022-11-23', '2022-11-25', '2022-10-26', 'Andika', '2022-11-28', 'Sakit', NULL, 'Tidak Ada', 2, 1, 2, '2022-12-01 08:45:41', '2022-12-01 10:23:10');

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
(2, 2, 1, 1, '2022-12-05', '2022-12-06', '2022-12-07', 'Sibuk nonton Mysta balik', 2, 1, 1, 1, '2022-12-02 07:36:51', NULL);

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
(1, 'create-users', 'web', '2022-11-30 12:43:42', '2022-11-30 12:43:42'),
(2, 'edit-users', 'web', '2022-11-30 12:43:42', '2022-11-30 12:43:42'),
(3, 'delete-users', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(4, 'create-profile', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(5, 'edit-profile', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(6, 'delete-profile', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(7, 'create-surat', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(8, 'edit-surat', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(9, 'delete-surat', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(10, 'validasi-surat', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(11, 'validasi-kp', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(12, 'validasi-hrd', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(13, 'validasi-rek', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43'),
(14, 'full-access', 'web', '2022-11-30 12:43:43', '2022-11-30 12:43:43');

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
(1, 'Admin', 'web', '2022-11-30 12:43:41', '2022-11-30 12:43:41'),
(2, 'Staff', 'web', '2022-11-30 12:43:41', '2022-11-30 12:43:41'),
(3, 'Kepala Unit', 'web', '2022-11-30 12:43:41', '2022-11-30 12:43:41'),
(4, 'Rektorat', 'web', '2022-11-30 12:43:41', '2022-11-30 12:43:41'),
(5, 'HRD', 'web', '2022-11-30 12:43:42', '2022-11-30 12:43:42');

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
(14, 1);

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
(1, 'BSTI', NULL, NULL),
(2, 'Assistant Lab', NULL, NULL),
(3, 'Admin', NULL, NULL),
(4, 'SDM', NULL, NULL),
(5, 'BAA', NULL, NULL),
(6, 'Rektorat', NULL, NULL),
(7, 'BAK', NULL, NULL),
(8, 'BPH', NULL, NULL),
(9, 'Fakultas Bisnis', NULL, NULL),
(10, 'Fakultas Humaniora', NULL, NULL),
(11, 'Fakultas Sains', NULL, NULL),
(12, 'OB', NULL, NULL),
(13, 'LP3KM', NULL, NULL),
(14, 'LPM', NULL, NULL),
(15, 'Marketing', NULL, NULL),
(16, 'Perpustakaan', NULL, NULL),
(17, 'PDPT', NULL, NULL),
(18, 'Satpam', NULL, NULL),
(19, 'Training Center', NULL, NULL),
(20, 'Umum', NULL, NULL),
(21, 'Wakil Rektorat III', NULL, NULL);

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
(1, 'Admin Admin', 'admin@email.com', '2022-11-30 12:43:45', 'admin', '$2y$10$M2AuG/ghrcmXw8XggoAKcODAH0MQ/ph/V4TUFu6y5CkIwAdEtyVj2', 1, NULL, '2022-11-30 12:43:45', '2022-11-30 12:43:45', 12),
(2, 'Staff San', 'staff@email.com', '2022-11-30 12:43:45', 'staff', '$2y$10$Lufc20nPzSTjgzHpZiaLQemr88eMe2/c22FtIyFnvVkniT/Ria90m', 2, NULL, '2022-11-30 12:43:46', '2022-11-30 12:43:46', 12),
(3, 'HRD Sama', 'hrd@email.com', '2022-11-30 12:43:46', 'hrd', '$2y$10$NhiUkJK8/PzJnxBAICOVXOnRzsy6DKWMfIJVU3Kil1jEvbNCR0JO6', 5, NULL, '2022-11-30 12:43:46', '2022-11-30 12:43:46', 12),
(4, 'Hime Sama', NULL, NULL, 'kunit', '$2y$10$/HOxmWL.UkQ32Dzd8QX5z.EJ96ABydD5e75y5Ky9l116eX8WZ19gC', 3, NULL, '2022-11-30 12:43:46', '2022-11-30 12:43:46', 12),
(5, 'Hamba', 'rektor@email.com', '2022-11-30 12:43:46', 'rektorat', '$2y$10$vB1qpO24rwkJE/hqbjtdeOEN09wDJgBkMrZDcFxFECfdSLGhDTtKO', 4, NULL, '2022-11-30 12:43:46', '2022-11-30 12:43:46', 12);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2089;

--
-- AUTO_INCREMENT for table `pengajuan_izins`
--
ALTER TABLE `pengajuan_izins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajuan__absens`
--
ALTER TABLE `pengajuan__absens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajuan__cutis`
--
ALTER TABLE `pengajuan__cutis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
