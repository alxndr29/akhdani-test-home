-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Jan 2023 pada 19.15
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
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `nama`, `id_provinsi`, `created_at`, `updated_at`, `luar_negeri`, `latitude`, `longitude`) VALUES
(5, 'Surabaya', 7, '2023-01-25 08:46:06', '2023-01-25 08:48:28', 0, '-7.08045084645532', '113.31436157226564'),
(6, 'Semarang', 6, '2023-01-25 08:48:53', '2023-01-25 08:48:53', 0, '-7.006852803970465', '110.42495727539064');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_01_24_092029_create_pulau_table', 1),
(5, '2023_01_24_092049_create_provinsi_table', 1),
(6, '2023_01_24_092118_create_kota_table', 1),
(7, '2023_01_24_092135_create_perdin_table', 1),
(8, '2023_01_24_092717_alter_users_table', 1),
(9, '2023_01_24_094542_create_kota_perdin_table', 1),
(10, '2023_01_25_152424_alter_kota_table', 2);

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
(2, 5, 6, '2023-01-26', '2023-01-28', 'lorem ipsum', 319, 500000, 2, 'setuju', '2023-01-25 09:43:25', '2023-01-25 10:58:34', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pulau` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `id_pulau`, `created_at`, `updated_at`) VALUES
(3, 'Kalimantan Timur', 4, '2023-01-25 05:45:45', '2023-01-25 05:48:38'),
(4, 'Jawa Barat', 1, '2023-01-25 06:52:50', '2023-01-25 06:52:50'),
(6, 'Jawa Tengah', 1, '2023-01-25 06:53:02', '2023-01-25 06:53:02'),
(7, 'Jawa Timur', 1, '2023-01-25 07:32:10', '2023-01-25 07:32:10'),
(8, 'DKI Jakarta', 1, '2023-01-25 07:32:15', '2023-01-25 07:32:15'),
(9, 'Kalimantan Tengah', 4, '2023-01-25 07:32:23', '2023-01-25 07:32:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pulau`
--

CREATE TABLE `pulau` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pulau`
--

INSERT INTO `pulau` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Jawa', '2023-01-25 05:29:54', '2023-01-25 05:29:54'),
(2, 'Flores', '2023-01-25 05:29:58', '2023-01-25 05:29:58'),
(3, 'Bali', '2023-01-25 05:30:02', '2023-01-25 05:30:02'),
(4, 'Kalimantan', '2023-01-25 05:45:20', '2023-01-25 05:45:20'),
(5, 'Sumatra', '2023-01-25 05:45:25', '2023-01-25 05:45:25'),
(6, 'Papua', '2023-01-25 05:45:30', '2023-01-25 05:45:30');

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
  `role` enum('pegawai','admin','divisi-sdm') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Alexander Evan', 'evan@evan.com', NULL, '$2y$10$M43CRPTDIkTXVEeGNt.79.sgOT6R53hcD7NIn2DXsMkuYD.Apvh0.', NULL, '2023-01-25 10:12:39', '2023-01-25 10:12:39', 'pegawai'),
(2, 'Gusti Bagus', 'gusti@gusti.com', NULL, '$2y$10$lDN7rhCzcYXrSTPd.MlJq.vI98LPu4qv35VkzH/HEyLXAJyK/CQhW', NULL, '2023-01-25 11:09:39', '2023-01-25 11:09:39', 'pegawai'),
(3, 'Aditya', 'aditya@aditya.com', NULL, '$2y$10$8a/gVWPkqJxyK3NQaBFdheKQTE8zAo3v8UuuGtVNilO9CWyByRusy', NULL, '2023-01-25 11:10:00', '2023-01-25 11:10:00', 'divisi-sdm'),
(4, 'admin', 'admin@admin.com', NULL, '$2y$10$sZPIfJi06krI1UE28jcxLutTD3tt0yy1fpNzNZNK//pAIGC03LqPO', NULL, '2023-01-25 11:10:17', '2023-01-25 11:10:17', 'admin');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `perdin`
--
ALTER TABLE `perdin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pulau`
--
ALTER TABLE `pulau`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
