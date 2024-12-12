-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2024 pada 12.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monev`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `review_rps`
--

CREATE TABLE `review_rps` (
  `id` int(11) NOT NULL,
  `daftar_rps_id` int(11) NOT NULL,
  `unsur_id` int(11) NOT NULL,
  `status` enum('Belum diperiksa','Sesuai','Revisi') NOT NULL DEFAULT 'Belum diperiksa',
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `review_gpm` enum('Belum diperiksa','Sesuai','Revisi') NOT NULL DEFAULT 'Belum diperiksa',
  `review_kajur` enum('Belum diperiksa','Sesuai','Revisi') NOT NULL DEFAULT 'Belum diperiksa',
  `catatan_gpm` text DEFAULT NULL,
  `catatan_kajur` text DEFAULT NULL,
  `reviewer_role` enum('gpm','kajur') NOT NULL,
  `reviewer_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review_rps`
--

INSERT INTO `review_rps` (`id`, `daftar_rps_id`, `unsur_id`, `status`, `catatan`, `created_at`, `updated_at`, `review_gpm`, `review_kajur`, `catatan_gpm`, `catatan_kajur`, `reviewer_role`, `reviewer_id`) VALUES
(1, 12, 1, 'Sesuai', NULL, '2024-12-11 13:57:18', '2024-12-12 03:30:46', 'Sesuai', 'Sesuai', '', '', 'gpm', 8),
(2, 12, 3, 'Revisi', NULL, '2024-12-11 13:57:18', '2024-12-12 03:30:46', 'Revisi', 'Revisi', 'ini perlu di perbaiiki', 'kajurr', 'gpm', 8),
(3, 12, 7, 'Sesuai', NULL, '2024-12-11 13:57:18', '2024-12-12 03:30:46', 'Sesuai', 'Sesuai', '', '', 'gpm', 8),
(4, 14, 1, 'Sesuai', NULL, '2024-12-11 14:09:53', '2024-12-12 01:41:16', 'Sesuai', 'Belum diperiksa', '', NULL, 'gpm', 8),
(5, 14, 3, 'Revisi', NULL, '2024-12-11 14:09:53', '2024-12-12 01:41:16', 'Sesuai', 'Belum diperiksa', 'kkkkk', NULL, 'gpm', 8),
(6, 14, 7, 'Sesuai', NULL, '2024-12-11 14:09:53', '2024-12-12 01:41:16', 'Sesuai', 'Belum diperiksa', '', NULL, 'gpm', 8),
(7, 16, 1, 'Sesuai', NULL, '2024-12-12 01:12:05', '2024-12-12 01:20:49', 'Belum diperiksa', 'Belum diperiksa', '', NULL, 'gpm', 0),
(8, 16, 3, 'Sesuai', NULL, '2024-12-12 01:12:05', '2024-12-12 01:20:49', 'Belum diperiksa', 'Belum diperiksa', '', NULL, 'gpm', 0),
(9, 16, 7, 'Revisi', NULL, '2024-12-12 01:12:05', '2024-12-12 01:20:49', 'Belum diperiksa', 'Belum diperiksa', 'ini coba edit', NULL, 'gpm', 0),
(10, 12, 1, 'Sesuai', NULL, '2024-12-12 04:31:48', '2024-12-12 04:31:48', 'Belum diperiksa', 'Sesuai', NULL, '', 'gpm', 0),
(11, 12, 3, 'Sesuai', NULL, '2024-12-12 04:31:48', '2024-12-12 04:31:48', 'Belum diperiksa', 'Sesuai', NULL, '', 'gpm', 0),
(12, 12, 7, 'Revisi', NULL, '2024-12-12 04:31:48', '2024-12-12 04:31:48', 'Belum diperiksa', 'Revisi', NULL, 'lll', 'gpm', 0),
(13, 12, 1, 'Sesuai', NULL, '2024-12-12 04:33:21', '2024-12-12 04:33:21', 'Belum diperiksa', 'Sesuai', NULL, '', 'kajur', 0),
(14, 12, 3, 'Revisi', NULL, '2024-12-12 04:33:21', '2024-12-12 04:33:21', 'Belum diperiksa', 'Revisi', NULL, 'kkkkk', 'kajur', 0),
(15, 12, 7, 'Revisi', NULL, '2024-12-12 04:33:21', '2024-12-12 04:33:21', 'Belum diperiksa', 'Revisi', NULL, 'lkkk', 'kajur', 0),
(16, 14, 1, 'Sesuai', NULL, '2024-12-12 04:34:09', '2024-12-12 04:34:20', 'Belum diperiksa', 'Sesuai', NULL, 'bagus ini', 'kajur', 0),
(17, 14, 3, 'Sesuai', NULL, '2024-12-12 04:34:09', '2024-12-12 04:34:20', 'Belum diperiksa', 'Sesuai', NULL, '', 'kajur', 0),
(18, 14, 7, 'Sesuai', NULL, '2024-12-12 04:34:09', '2024-12-12 04:34:20', 'Belum diperiksa', 'Sesuai', NULL, '', 'kajur', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `review_rps`
--
ALTER TABLE `review_rps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daftar_rps` (`daftar_rps_id`),
  ADD KEY `fk_unsur` (`unsur_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `review_rps`
--
ALTER TABLE `review_rps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `review_rps`
--
ALTER TABLE `review_rps`
  ADD CONSTRAINT `fk_daftar_rps` FOREIGN KEY (`daftar_rps_id`) REFERENCES `daftar_rps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_unsur` FOREIGN KEY (`unsur_id`) REFERENCES `unsur_rps` (`id_unsur`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
