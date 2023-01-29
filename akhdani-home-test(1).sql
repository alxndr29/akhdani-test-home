-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jan 2023 pada 14.13
-- Versi server: 5.7.33
-- Versi PHP: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akhdani-home-test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_provinsi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `luar_negeri` tinyint(1) NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`, `id_provinsi`, `created_at`, `updated_at`, `luar_negeri`, `latitude`, `longitude`, `deleted_at`) VALUES
(1, 'Surabaya', 3, '2023-01-29 05:29:03', '2023-01-29 05:34:13', 0, '-7.268481110463124', '112.72933959960939', NULL),
(2, 'Jember', 3, '2023-01-29 05:34:59', '2023-01-29 05:34:59', 0, '-8.191101627913403', '113.71536254882812', NULL),
(3, 'Banyuwangi', 3, '2023-01-29 05:35:30', '2023-01-29 05:35:30', 0, '-8.238673621756169', '114.3511962890625', NULL),
(4, 'Semarang', 1, '2023-01-29 05:37:59', '2023-01-29 05:37:59', 0, '-7.073636704289109', '110.4071044921875', NULL),
(5, 'Medan', 4, '2023-01-29 05:40:30', '2023-01-29 05:40:30', 0, '3.5079381900405084', '98.66271972656251', NULL),
(6, 'Dili', 5, '2023-01-29 05:41:33', '2023-01-29 05:41:33', 1, '-8.629903118263488', '125.59020996093751', NULL),
(7, 'Sidoarjo', 3, '2023-01-29 06:07:41', '2023-01-29 06:07:41', 0, '-7.470049274643692', '112.70736694335939', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perdin`
--

CREATE TABLE `perdin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kota_asal` bigint(20) UNSIGNED NOT NULL,
  `kota_tujuan` bigint(20) UNSIGNED NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak` double NOT NULL,
  `total_uang` double NOT NULL,
  `total_hari` int(11) NOT NULL,
  `status` enum('setuju','tolak','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perdin`
--

INSERT INTO `perdin` (`id`, `kota_asal`, `kota_tujuan`, `tanggal_awal`, `tanggal_akhir`, `keterangan`, `jarak`, `total_uang`, `total_hari`, `status`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 1, 2, '2023-01-29', '2023-01-31', 'Lorem ipsum', 149, 400000, 2, 'setuju', '2023-01-29 05:36:20', '2023-01-29 05:52:39', 6),
(2, 1, 4, '2023-01-29', '2023-01-31', 'lorem ipsum', 257, 500000, 2, 'tolak', '2023-01-29 05:38:30', '2023-01-29 05:52:42', 6),
(4, 1, 6, '2023-01-29', '2023-01-31', 'adawd', 1424, 1400000, 2, 'pending', '2023-01-29 05:42:32', '2023-01-29 05:42:32', 6),
(6, 1, 5, '2023-01-29', '2023-01-31', 'kkk', 1968, 600000, 2, 'pending', '2023-01-29 05:51:11', '2023-01-29 05:51:11', 6),
(7, 1, 7, '2023-01-29', '2023-01-31', 'dfgdf', 23, 0, 2, 'setuju', '2023-01-29 06:08:02', '2023-01-29 06:08:12', 6),
(8, 1, 7, '2023-01-29', '2023-02-09', 'jjj', 23, 0, 11, 'setuju', '2023-01-29 06:09:04', '2023-01-29 06:09:12', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pulau` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `id_pulau`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jawa Tengah', 3, '2023-01-29 05:28:12', '2023-01-29 05:28:12', NULL),
(2, 'Jawa Timur Edit', 3, '2023-01-29 05:28:19', '2023-01-29 05:28:28', '2023-01-29 05:28:28'),
(3, 'Jawa Timur', 3, '2023-01-29 05:28:36', '2023-01-29 05:28:36', NULL),
(4, 'Sumatra Utara', 2, '2023-01-29 05:39:58', '2023-01-29 05:39:58', NULL),
(5, 'Timor Leste', 4, '2023-01-29 05:41:19', '2023-01-29 05:41:19', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pulau`
--

CREATE TABLE `pulau` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pulau`
--

INSERT INTO `pulau` (`id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jawa Edit', '2023-01-29 05:27:38', '2023-01-29 05:27:54', '2023-01-29 05:27:54'),
(2, 'Sumatra', '2023-01-29 05:27:46', '2023-01-29 05:27:46', NULL),
(3, 'Jawa', '2023-01-29 05:27:59', '2023-01-29 05:27:59', NULL),
(4, 'Timor', '2023-01-29 05:40:51', '2023-01-29 05:40:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('pegawai','admin','divisi-sdm') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `deleted_at`) VALUES
(1, 'Alexander Evan', 'evan@evan.com', NULL, '$2y$10$M43CRPTDIkTXVEeGNt.79.sgOT6R53hcD7NIn2DXsMkuYD.Apvh0.', NULL, '2023-01-25 10:12:39', '2023-01-25 10:12:39', 'pegawai', NULL),
(2, 'Gusti Bagus', 'gusti@gusti.com', NULL, '$2y$10$lDN7rhCzcYXrSTPd.MlJq.vI98LPu4qv35VkzH/HEyLXAJyK/CQhW', NULL, '2023-01-25 11:09:39', '2023-01-25 11:09:39', 'pegawai', NULL),
(3, 'Aditya', 'aditya@aditya.com', NULL, '$2y$10$8a/gVWPkqJxyK3NQaBFdheKQTE8zAo3v8UuuGtVNilO9CWyByRusy', NULL, '2023-01-25 11:10:00', '2023-01-25 11:10:00', 'divisi-sdm', NULL),
(4, 'admin', 'admin@admin.com', NULL, '$2y$10$sZPIfJi06krI1UE28jcxLutTD3tt0yy1fpNzNZNK//pAIGC03LqPO', NULL, '2023-01-25 11:10:17', '2023-01-25 11:10:17', 'admin', NULL),
(5, 'Coba Admin Edit', 'cobaadminedit@cobaadminedit.com', NULL, '$2y$10$PrJkemTH.iTRsJ2ibes9m.vyzbBG1gLar4TldrDLjfb7/BhLEZiLK', NULL, '2023-01-29 05:11:43', '2023-01-29 05:24:06', 'divisi-sdm', NULL),
(6, 'Coba Pegawai', 'cobapegawai@cobapegawai.com', NULL, '$2y$10$GVZmKgEcuE02zihGrSNjnuUoNedRQVK2HvVv2k4rbt1LhHtPoIUiq', NULL, '2023-01-29 05:12:00', '2023-01-29 05:12:00', 'pegawai', NULL),
(7, 'Coba Div SDM', 'cobasdm@cobasdm.com', NULL, '$2y$10$1CfBjOOGusi1Fb/3xn/2FeOQZbQNeDSELWMiA7rnxcaPuHWf4brtq', NULL, '2023-01-29 05:12:18', '2023-01-29 05:12:18', 'divisi-sdm', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id_provinsi_foreign` (`id_provinsi`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `perdin`
--
ALTER TABLE `perdin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perdin_kota_asal_foreign` (`kota_asal`),
  ADD KEY `perdin_kota_tujuan_foreign` (`kota_tujuan`),
  ADD KEY `fk_perdin_users1_idx` (`id_user`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinsi_id_pulau_foreign` (`id_pulau`);

--
-- Indeks untuk tabel `pulau`
--
ALTER TABLE `pulau`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perdin`
--
ALTER TABLE `perdin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pulau`
--
ALTER TABLE `pulau`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `kota_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`);

--
-- Ketidakleluasaan untuk tabel `perdin`
--
ALTER TABLE `perdin`
  ADD CONSTRAINT `fk_perdin_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `perdin_kota_asal_foreign` FOREIGN KEY (`kota_asal`) REFERENCES `kota` (`id`),
  ADD CONSTRAINT `perdin_kota_tujuan_foreign` FOREIGN KEY (`kota_tujuan`) REFERENCES `kota` (`id`);

--
-- Ketidakleluasaan untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD CONSTRAINT `provinsi_id_pulau_foreign` FOREIGN KEY (`id_pulau`) REFERENCES `pulau` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
