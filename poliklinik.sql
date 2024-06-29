-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2024 pada 05.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `no_antrian` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`, `created_at`, `updated_at`) VALUES
(6, 2, 2, 'Pusing', 1, '2024-06-05 22:25:14', '2024-06-05 22:25:14'),
(7, 2, 3, 'Pusing', 1, '2024-06-17 07:23:49', '2024-06-17 07:23:49'),
(8, 2, 3, 'Test', 2, '2024-06-17 07:32:41', '2024-06-17 07:32:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_periksa` int(10) UNSIGNED NOT NULL,
  `id_obat` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2024-06-12 21:50:59', '2024-06-12 21:50:59'),
(7, 2, 2, '2024-06-12 21:50:59', '2024-06-12 21:50:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `id_poli` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `alamat`, `no_hp`, `id_poli`, `created_at`, `updated_at`) VALUES
(2, 'dr. Daniel A', 'Jl Citra Pesona', '08990727766', 2, NULL, '2024-06-12 21:47:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `aktif`, `created_at`, `updated_at`) VALUES
(2, 2, 'Kamis', '13:00:00', '17:00:00', 'T', '2024-06-05 21:47:48', '2024-06-28 19:22:59'),
(3, 2, 'Senin', '00:30:00', '23:30:00', 'T', '2024-06-17 07:31:03', '2024-06-28 19:07:43'),
(4, 2, 'Selasa', '11:30:00', '14:30:00', 'T', '2024-06-14 20:30:33', '2024-06-28 19:07:43'),
(5, 2, 'Rabu', '15:30:00', '20:30:00', 'T', '2024-06-14 20:30:44', '2024-06-28 19:07:43'),
(6, 2, 'Jumat', '10:30:00', '13:30:00', 'T', '2024-06-14 20:30:55', '2024-06-28 19:07:43'),
(7, 2, 'Sabtu', '15:07:00', '20:07:00', 'Y', '2024-06-28 19:07:24', '2024-06-28 19:23:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_05_30_021400_create_pasiens_table', 1),
(3, '2024_05_30_021402_create_polis_table', 1),
(4, '2024_05_30_021403_create_dokters_table', 1),
(5, '2024_05_30_021404_create_jadwal_periksas_table', 1),
(6, '2024_05_30_021508_create_daftar_polis_table', 1),
(7, '2024_05_30_021509_create_periksas_table', 1),
(8, '2024_05_30_021530_create_obats_table', 1),
(9, '2024_05_30_021539_create_detail_periksas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_obat` blob NOT NULL,
  `kemasan` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 0x4f424820436f6d6269, 'Botol 20ml', 20000, '2024-05-29 23:48:41', '2024-05-29 23:50:30'),
(2, 0x4f424820546964616b20436f6d6269, '50 Ml', 50000, '2024-06-06 02:42:09', '2024-06-06 02:42:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ktp` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_rm` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `alamat`, `no_ktp`, `no_hp`, `no_rm`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'Jl Citra Pesona', '3374121030003', '08990727766', '202405-1', '2024-05-30 00:01:01', '2024-05-30 00:01:01'),
(2, 'Daniel Alexander', 'Jl Semarang', '3374', '08990727766', '202405-2', '2024-05-30 00:53:25', '2024-05-30 00:53:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_daftar_poli` int(10) UNSIGNED NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL,
  `biaya_periksa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya_periksa`, `created_at`, `updated_at`) VALUES
(2, 6, '2024-06-06 16:49:00', 'Flu Saja', 150000, '2024-06-06 02:49:10', '2024-06-12 21:50:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poli`
--

CREATE TABLE `poli` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_poli` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Anak', 'Anak', NULL, NULL),
(2, 'Umum', 'Umum', '2024-05-29 23:40:00', '2024-05-29 23:46:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftar_poli_id_pasien_foreign` (`id_pasien`),
  ADD KEY `daftar_poli_id_jadwal_foreign` (`id_jadwal`);

--
-- Indeks untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_periksa_id_periksa_foreign` (`id_periksa`),
  ADD KEY `detail_periksa_id_obat_foreign` (`id_obat`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter_id_poli_foreign` (`id_poli`);

--
-- Indeks untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_periksa_id_dokter_foreign` (`id_dokter`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periksa_id_daftar_poli_foreign` (`id_daftar_poli`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `daftar_poli_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`),
  ADD CONSTRAINT `daftar_poli_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Ketidakleluasaan untuk tabel `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `detail_periksa_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `detail_periksa_id_periksa_foreign` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`);

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Ketidakleluasaan untuk tabel `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `jadwal_periksa_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);

--
-- Ketidakleluasaan untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_id_daftar_poli_foreign` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
