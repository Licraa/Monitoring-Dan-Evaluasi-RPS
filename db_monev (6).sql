-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2024 pada 20.36
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
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'gpm', 'site gpm'),
(2, 'dosen', 'site dosen'),
(4, 'admin', 'manage-user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 4),
(1, 4),
(2, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 8),
(2, 7),
(2, 25),
(4, 10),
(4, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(5, '::1', 'admin123@gmail.com', 2, '2024-10-28 07:34:02', 1),
(6, '::1', 'raja@gmail.com', 3, '2024-10-28 11:01:21', 1),
(7, '::1', 'raja@gmail.com', 3, '2024-10-28 11:11:39', 1),
(8, '::1', 'raja@gmail.com', 3, '2024-10-28 11:12:07', 1),
(9, '::1', 'raja@gmail.com', 3, '2024-10-28 11:15:12', 1),
(10, '::1', 'raja@gmail.com', 3, '2024-10-28 11:15:49', 1),
(11, '::1', 'raja@gmail.com', 3, '2024-10-28 11:16:42', 1),
(12, '::1', 'raja@gmail.com', 3, '2024-10-28 11:18:46', 1),
(13, '::1', 'raja@gmail.com', 3, '2024-10-28 11:20:02', 1),
(14, '::1', 'raja@gmail.com', 3, '2024-10-28 11:23:24', 1),
(15, '::1', 'raja@gmail.com', 3, '2024-10-28 11:24:30', 1),
(16, '::1', 'admin111@gmail.com', 4, '2024-10-28 11:25:13', 1),
(17, '::1', 'raja@gmail.com', 3, '2024-10-28 11:31:49', 1),
(18, '::1', 'raja@gmail.com', 3, '2024-10-28 11:33:59', 1),
(19, '::1', 'raja@gmail.com', 3, '2024-10-28 12:41:42', 1),
(20, '::1', 'raja@gmail.com', 3, '2024-10-28 13:27:14', 1),
(21, '::1', 'raja@gmail.com', 3, '2024-10-28 13:27:17', 1),
(22, '::1', 'raja@gmail.com', 3, '2024-10-28 13:27:27', 1),
(23, '::1', 'raja@gmail.com', 3, '2024-10-28 16:06:37', 1),
(24, '::1', 'raja@gmail.com', 3, '2024-10-28 16:12:40', 1),
(25, '::1', 'raja@gmail.com', 3, '2024-10-28 17:27:47', 1),
(26, '::1', 'raja@gmail.com', 3, '2024-10-28 17:43:20', 1),
(27, '::1', 'dosen', NULL, '2024-10-28 18:47:56', 0),
(28, '::1', 'dosen', NULL, '2024-10-28 18:48:19', 0),
(29, '::1', 'dosen123@gmail.com', 5, '2024-10-28 18:48:26', 1),
(30, '::1', 'admin123', NULL, '2024-10-28 19:10:30', 0),
(31, '::1', 'admin', NULL, '2024-10-28 19:10:40', 0),
(32, '::1', 'gpm@gmail.com', 6, '2024-10-28 19:11:55', 1),
(33, '::1', 'gpm', NULL, '2024-10-28 19:22:08', 0),
(34, '::1', 'gpm@gmail.com', 6, '2024-10-28 19:22:17', 1),
(35, '::1', 'dosen@gmail.com', 7, '2024-10-28 19:56:12', 1),
(36, '::1', 'gpm', NULL, '2024-10-28 19:56:23', 0),
(37, '::1', 'gpm', NULL, '2024-10-28 19:56:31', 0),
(38, '::1', 'gpm@gmail.com', 8, '2024-10-28 19:56:44', 1),
(39, '::1', 'gpm@gmail.com', 8, '2024-10-28 20:00:26', 1),
(40, '::1', 'dosen@gmail.com', 7, '2024-10-28 20:00:38', 1),
(41, '::1', 'gpm@gmail.com', 8, '2024-10-28 20:19:01', 1),
(42, '::1', 'dosen@gmail.com', 7, '2024-10-28 20:20:51', 1),
(43, '::1', 'gpm@gmail.com', 8, '2024-10-28 20:21:54', 1),
(44, '::1', 'gpm@gmail.com', 8, '2024-10-28 20:51:05', 1),
(45, '::1', 'dosen@gmail.com', 7, '2024-10-28 20:51:23', 1),
(46, '::1', 'gpm@gmail.com', 8, '2024-10-28 20:54:56', 1),
(47, '::1', 'gpm@gmail.com', 8, '2024-10-28 20:56:08', 1),
(48, '::1', 'dosen@gmail.com', 7, '2024-10-28 20:56:44', 1),
(49, '::1', 'gpm@gmail.com', 8, '2024-10-29 07:34:26', 1),
(50, '::1', 'dosen@gmail.com', 7, '2024-10-29 07:59:34', 1),
(51, '::1', 'dosen@gmail.com', 7, '2024-10-29 08:02:18', 1),
(52, '::1', 'gpm', NULL, '2024-10-29 08:02:34', 0),
(53, '::1', 'gpm@gmail.com', 8, '2024-10-29 08:02:41', 1),
(54, '::1', 'dosen@gmail.com', 7, '2024-10-29 08:03:37', 1),
(55, '::1', 'gpm@gmail.com', 8, '2024-10-29 08:22:24', 1),
(56, '::1', 'dosen@gmail.com', 7, '2024-10-29 12:15:12', 1),
(57, '::1', 'dosen@gmail.com', 7, '2024-10-29 12:16:28', 1),
(58, '::1', 'dosen', NULL, '2024-10-29 12:31:20', 0),
(59, '::1', 'dosen@gmail.com', 7, '2024-10-29 12:31:27', 1),
(60, '::1', 'gpm@gmail.com', 8, '2024-10-29 12:55:56', 1),
(61, '::1', 'dosen@gmail.com', 7, '2024-10-29 12:56:11', 1),
(62, '::1', 'gpm@gmail.com', 8, '2024-10-29 12:59:03', 1),
(63, '::1', 'gpm@gmail.com', 8, '2024-10-29 12:59:22', 1),
(64, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:12:30', 1),
(65, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:14:23', 1),
(66, '::1', 'dosen@gmail.com', 7, '2024-10-29 13:15:24', 1),
(67, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:21:02', 1),
(68, '::1', 'dosen', NULL, '2024-10-29 13:23:20', 0),
(69, '::1', 'dosen@gmail.com', 7, '2024-10-29 13:23:31', 1),
(70, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:24:48', 1),
(71, '::1', 'gpm', NULL, '2024-10-29 13:25:39', 0),
(72, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:25:44', 1),
(73, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:26:46', 1),
(74, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:28:33', 1),
(75, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:33:10', 1),
(76, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:34:17', 1),
(77, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:35:05', 1),
(78, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:36:06', 1),
(79, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:37:06', 1),
(80, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:38:35', 1),
(81, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:40:59', 1),
(82, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:50:34', 1),
(83, '::1', 'gpm@gmail.com', 8, '2024-10-29 13:58:08', 1),
(84, '::1', 'dosen', NULL, '2024-10-29 13:58:23', 0),
(85, '::1', 'dosen@gmail.com', 7, '2024-10-29 13:58:32', 1),
(86, '::1', 'gpm@gmail.com', 8, '2024-10-29 14:00:09', 1),
(87, '::1', 'dosen@gmail.com', 7, '2024-10-29 14:00:23', 1),
(88, '::1', 'gpm@gmail.com', 8, '2024-10-29 16:39:57', 1),
(89, '::1', 'gpm@gmail.com', 8, '2024-10-29 16:50:41', 1),
(90, '::1', 'gpm@gmail.com', 8, '2024-10-29 19:10:00', 1),
(91, '::1', 'admin@gmail.com', 9, '2024-10-29 19:50:18', 1),
(92, '::1', 'admin@gmail.com', 9, '2024-10-29 20:02:34', 1),
(93, '::1', 'gpm', NULL, '2024-10-29 20:02:54', 0),
(94, '::1', 'gpm@gmail.com', 8, '2024-10-29 20:03:01', 1),
(95, '::1', 'admin@gmail.com', 9, '2024-10-29 20:04:01', 1),
(96, '::1', 'admin@gmail.com', 10, '2024-10-29 20:39:25', 1),
(97, '::1', 'admin@gmail.com', 10, '2024-10-29 20:42:45', 1),
(98, '::1', 'gpm@gmail.com', 8, '2024-10-29 20:43:07', 1),
(99, '::1', 'dosen@gmail.com', 7, '2024-11-02 05:32:43', 1),
(100, '::1', 'gpm@gmail.com', 8, '2024-11-02 05:32:56', 1),
(101, '::1', 'admin@gmail.com', 10, '2024-11-02 05:33:05', 1),
(102, '::1', 'admin@gmail.com', 10, '2024-11-02 05:34:03', 1),
(103, '::1', 'dosen', NULL, '2024-11-02 05:34:34', 0),
(104, '::1', 'dosen@gmail.com', 7, '2024-11-02 05:34:46', 1),
(105, '::1', 'gpm', NULL, '2024-11-02 05:35:43', 0),
(106, '::1', 'gpm', NULL, '2024-11-02 05:35:54', 0),
(107, '::1', 'gpm@gmail.com', 8, '2024-11-02 05:36:03', 1),
(108, '::1', 'gpm@gmail.com', 8, '2024-11-02 05:38:48', 1),
(109, '::1', 'dosen@gmail.com', 7, '2024-11-02 05:39:15', 1),
(110, '::1', 'dosen@gmail.com', 7, '2024-11-04 05:05:56', 1),
(111, '::1', 'admin@gmail.com', 10, '2024-11-04 05:06:35', 1),
(112, '::1', 'dosen@gmail.com', 7, '2024-11-04 12:29:15', 1),
(113, '::1', 'gpm@gmail.com', 8, '2024-11-04 12:29:26', 1),
(114, '::1', 'admin@gmail.com', 10, '2024-11-04 12:29:40', 1),
(115, '::1', 'admin@gmail.com', 10, '2024-11-04 12:30:03', 1),
(116, '::1', 'admin', NULL, '2024-11-04 17:19:46', 0),
(117, '::1', 'dosen@gmail.com', 7, '2024-11-04 17:19:54', 1),
(118, '::1', 'admin@gmail.com', 10, '2024-11-04 17:20:10', 1),
(119, '::1', 'gpm@gmail.com', 8, '2024-11-04 17:23:40', 1),
(120, '::1', 'admin@gmail.com', 10, '2024-11-04 17:24:40', 1),
(121, '::1', 'admin@gmail.com', 10, '2024-11-04 17:35:09', 1),
(122, '::1', 'admin', NULL, '2024-11-04 17:39:30', 0),
(123, '::1', 'admin@gmail.com', 10, '2024-11-04 17:39:41', 1),
(124, '::1', 'admin@gmail.com', 10, '2024-11-04 17:42:48', 1),
(125, '::1', 'dosen@gmail.com', 7, '2024-11-04 17:44:44', 1),
(126, '::1', 'admin@gmail.com', 10, '2024-11-04 17:48:15', 1),
(127, '::1', 'dosen@gmail.com', 7, '2024-11-04 17:51:46', 1),
(128, '::1', 'dosen@gmail.com', 7, '2024-11-04 17:53:08', 1),
(129, '::1', 'dosen@gmail.com', 7, '2024-11-04 17:55:37', 1),
(130, '::1', 'dosen@gmail.com', 7, '2024-11-04 17:56:03', 1),
(131, '::1', 'admin', NULL, '2024-11-05 03:30:32', 0),
(132, '::1', 'admin@gmail.com', 10, '2024-11-05 03:30:39', 1),
(133, '::1', 'dosen@gmail.com', 7, '2024-11-05 03:30:58', 1),
(134, '::1', 'admin@gmail.com', 10, '2024-11-05 03:32:05', 1),
(135, '::1', 'admin', NULL, '2024-11-05 03:32:37', 0),
(136, '::1', 'admin@gmail.com', 10, '2024-11-05 03:32:45', 1),
(137, '::1', 'dosen@gmail.com', 7, '2024-11-05 03:39:40', 1),
(138, '::1', 'gpm@gmail.com', 8, '2024-11-05 03:40:03', 1),
(139, '::1', 'gpm@gmail.com', 8, '2024-11-05 03:45:39', 1),
(140, '::1', 'gpm@gmail.com', 8, '2024-11-05 06:23:29', 1),
(141, '::1', 'gpm@gmail.com', 8, '2024-11-05 06:44:41', 1),
(142, '::1', 'admin@gmail.com', 10, '2024-11-05 12:41:55', 1),
(143, '::1', 'admin@gmail.com', 10, '2024-11-05 12:42:41', 1),
(144, '::1', 'admin@gmail.com', 10, '2024-11-05 12:48:22', 1),
(145, '::1', 'admin@gmail.com', 10, '2024-11-05 12:48:33', 1),
(146, '::1', 'admin@gmail.com', 10, '2024-11-05 12:50:15', 1),
(147, '::1', 'admin@gmail.com', 10, '2024-11-05 14:20:00', 1),
(148, '::1', 'admin@gmail.com', 10, '2024-11-05 14:49:47', 1),
(149, '::1', 'admin@gmail.com', 10, '2024-11-05 14:55:34', 1),
(150, '::1', 'admin@gmail.com', 10, '2024-11-05 14:58:43', 1),
(151, '::1', 'admin@gmail.com', 10, '2024-11-07 05:12:06', 1),
(152, '::1', 'admin', NULL, '2024-11-07 07:26:03', 0),
(153, '::1', 'admin@gmail.com', 10, '2024-11-07 07:26:09', 1),
(154, '::1', 'admin@gmail.com', 10, '2024-11-07 09:45:12', 1),
(155, '::1', 'admin@gmail.com', 10, '2024-11-07 12:08:08', 1),
(156, '::1', 'admin@gmail.com', 10, '2024-11-07 12:40:57', 1),
(157, '::1', 'admin@gmail.com', 10, '2024-11-08 04:38:11', 1),
(158, '::1', 'admin@gmail.com', 10, '2024-11-08 17:28:43', 1),
(159, '::1', 'admin@gmail.com', 10, '2024-11-09 06:07:52', 1),
(160, '::1', 'admin@gmail.com', 10, '2024-11-09 11:36:37', 1),
(161, '::1', 'admin2', NULL, '2024-11-09 12:43:06', 0),
(162, '::1', 'admin@gmail.com', 10, '2024-11-09 12:43:18', 1),
(163, '::1', 'raja', NULL, '2024-11-09 12:44:32', 0),
(164, '::1', 'admin@gmail.com', 10, '2024-11-10 07:10:57', 1),
(165, '::1', 'raja', NULL, '2024-11-10 07:24:25', 0),
(166, '::1', 'admin@gmail.com', 10, '2024-11-10 07:24:33', 1),
(167, '::1', 'admin@gmail.com', 10, '2024-11-10 07:31:38', 1),
(168, '::1', 'raja@gmail.com', 16, '2024-11-10 07:34:12', 1),
(169, '::1', 'admin@gmail.com', 10, '2024-11-10 07:38:34', 1),
(170, '::1', 'admin2@gmail.com', 17, '2024-11-10 07:41:25', 1),
(171, '::1', 'azza@gmail.com', 18, '2024-11-10 07:43:04', 1),
(172, '::1', 'admin@gmail.com', 10, '2024-11-10 07:43:23', 1),
(173, '::1', 'admin@gmail.com', 10, '2024-11-10 11:48:03', 1),
(174, '::1', 'admin@gmail.com', 10, '2024-11-10 17:27:59', 1),
(175, '::1', 'admin@gmail.com', 10, '2024-11-11 05:47:03', 1),
(176, '::1', 'admin@gmail.com', 10, '2024-11-11 10:17:35', 1),
(177, '::1', 'raja', NULL, '2024-11-11 10:25:12', 0),
(178, '::1', 'raja', NULL, '2024-11-11 10:25:24', 0),
(179, '::1', 'admin@gmail.com', 10, '2024-11-11 10:25:40', 1),
(180, '::1', 'raja', NULL, '2024-11-11 10:26:16', 0),
(181, '::1', 'raja', NULL, '2024-11-11 10:26:26', 0),
(182, '::1', 'admin@gmail.com', 10, '2024-11-11 10:26:34', 1),
(183, '::1', 'rajaraja@gmail.com', 20, '2024-11-11 10:27:36', 1),
(184, '::1', 'admin@gmail.com', 10, '2024-11-11 10:27:50', 1),
(185, '::1', 'raja raja', NULL, '2024-11-11 10:28:07', 0),
(186, '::1', 'admin@gmail.com', 10, '2024-11-11 10:33:47', 1),
(187, '::1', 'rajaraja', NULL, '2024-11-11 10:34:53', 0),
(188, '::1', 'rajaraja@gmail.com', 21, '2024-11-11 10:35:01', 1),
(189, '::1', 'admin@gmail.com', 10, '2024-11-11 10:35:14', 1),
(190, '::1', 'analisa@gmail.com', 22, '2024-11-11 10:39:45', 1),
(191, '::1', 'admin@gmail.com', 10, '2024-11-11 10:39:55', 1),
(192, '::1', 'raja', NULL, '2024-11-11 10:47:56', 0),
(193, '::1', 'raja@gmail.com', 23, '2024-11-11 10:48:03', 1),
(194, '::1', 'admin@gmail.com', 10, '2024-11-11 10:48:13', 1),
(195, '::1', 'admin@gmail.com', 10, '2024-11-12 06:43:51', 1),
(196, '::1', 'dosen', NULL, '2024-11-12 06:45:59', 0),
(197, '::1', 'dosen@gmail.com', 7, '2024-11-12 06:46:09', 1),
(198, '::1', 'admin', NULL, '2024-11-18 19:40:19', 0),
(199, '::1', 'admin', NULL, '2024-11-18 19:40:27', 0),
(200, '::1', 'admin@gmail.com', 10, '2024-11-18 19:40:37', 1),
(201, '::1', 'admin@gmail.com', 10, '2024-11-20 08:57:45', 1),
(202, '::1', 'admin@gmail.com', 10, '2024-11-24 09:57:43', 1),
(203, '::1', 'admin@gmail.com', 10, '2024-11-24 11:46:30', 1),
(204, '::1', 'dosen', NULL, '2024-11-26 03:37:59', 0),
(205, '::1', 'dosen@gmail.com', 7, '2024-11-26 03:38:07', 1),
(206, '::1', 'admin@gmail.com', 10, '2024-11-26 03:39:05', 1),
(207, '::1', 'dosen@gmail.com', 7, '2024-11-26 03:40:47', 1),
(208, '::1', 'dosen@gmail.com', 7, '2024-11-26 03:46:01', 1),
(209, '::1', 'dosen@gmail.com', 7, '2024-11-26 03:50:29', 1),
(210, '::1', 'dosen@gmail.com', 7, '2024-11-26 03:55:28', 1),
(211, '::1', 'dosen@gmail.com', 7, '2024-11-26 03:59:12', 1),
(212, '::1', 'dosen@gmail.com', 7, '2024-11-26 07:59:02', 1),
(213, '::1', 'dosen@gmail.com', 7, '2024-11-26 08:44:59', 1),
(214, '::1', 'dosen@gmail.com', 7, '2024-11-26 08:48:24', 1),
(215, '::1', 'dosen@gmail.com', 7, '2024-11-26 11:28:05', 1),
(216, '::1', 'dosen@gmail.com', 7, '2024-11-26 11:48:30', 1),
(217, '::1', 'dosen@gmail.com', 7, '2024-11-26 13:32:38', 1),
(218, '::1', 'dosen@gmail.com', 7, '2024-11-26 13:44:20', 1),
(219, '::1', 'admin@gmail.com', 10, '2024-11-26 13:49:59', 1),
(220, '::1', 'dosen@gmail.com', 7, '2024-11-26 13:50:54', 1),
(221, '::1', 'gpm@gmail.com', 8, '2024-11-26 14:08:47', 1),
(222, '::1', 'dosen@gmail.com', 7, '2024-11-26 14:09:12', 1),
(223, '::1', 'dosen@gmail.com', 7, '2024-11-27 20:04:09', 1),
(224, '::1', 'admin@gmail.com', 10, '2024-12-01 08:06:06', 1),
(225, '::1', 'dosen@gmail.com', 7, '2024-12-01 08:06:15', 1),
(226, '::1', 'gpm@gmail.com', 8, '2024-12-01 08:06:27', 1),
(227, '::1', 'dosen@gmail.com', 7, '2024-12-01 08:07:41', 1),
(228, '::1', 'admin@gmail.com', 10, '2024-12-01 11:16:27', 1),
(229, '::1', 'dosen@gmail.com', 7, '2024-12-01 19:12:42', 1),
(230, '::1', 'dosen@gmail.com', 7, '2024-12-01 19:14:14', 1),
(231, '::1', 'dosen@gmail.com', 7, '2024-12-01 19:15:39', 1),
(232, '::1', 'dosen@gmail.com', 7, '2024-12-02 08:54:12', 1),
(233, '::1', 'dosen@gmail.com', 7, '2024-12-02 08:57:17', 1),
(234, '::1', 'dosen@gmail.com', 7, '2024-12-02 09:00:29', 1),
(235, '::1', 'dosen@gmail.com', 7, '2024-12-02 09:51:44', 1),
(236, '::1', 'admin@gmail.com', 10, '2024-12-02 14:39:55', 1),
(237, '::1', 'dosen@gmail.com', 7, '2024-12-02 17:21:50', 1),
(238, '::1', 'dosen@gmail.com', 7, '2024-12-03 09:44:13', 1),
(239, '::1', 'admin', NULL, '2024-12-03 16:06:14', 0),
(240, '::1', 'dosen@gmail.com', 7, '2024-12-03 16:06:19', 1),
(241, '::1', 'dosen@gmail.com', 7, '2024-12-03 19:48:30', 1),
(242, '::1', 'dosen@gmail.com', 7, '2024-12-03 19:56:33', 1),
(243, '::1', 'dosen@gmail.com', 7, '2024-12-03 20:01:39', 1),
(244, '::1', 'raja@gmail.com', 25, '2024-12-03 20:10:33', 1),
(245, '::1', 'dosen@gmail.com', 7, '2024-12-03 20:15:10', 1),
(246, '::1', 'dosen@gmail.com', 7, '2024-12-04 06:21:35', 1),
(247, '::1', 'raja', NULL, '2024-12-04 06:27:18', 0),
(248, '::1', 'raja', NULL, '2024-12-04 06:27:32', 0),
(249, '::1', 'raja@gmail.com', 25, '2024-12-04 06:27:39', 1),
(250, '::1', 'dosen@gmail.com', 7, '2024-12-04 06:35:42', 1),
(251, '::1', 'dosen@gmail.com', 7, '2024-12-04 07:40:41', 1),
(252, '::1', 'dosen@gmail.com', 7, '2024-12-04 18:11:34', 1),
(253, '::1', 'dosen', NULL, '2024-12-04 18:14:12', 0),
(254, '::1', 'dosen@gmail.com', 7, '2024-12-04 18:14:19', 1),
(255, '::1', 'dosen@gmail.com', 7, '2024-12-05 08:19:50', 1),
(256, '::1', 'dosen@gmail.com', 7, '2024-12-05 11:35:55', 1),
(257, '::1', 'dosen@gmail.com', 7, '2024-12-06 18:54:00', 1),
(258, '::1', 'gpm@gmail.com', 8, '2024-12-08 18:03:29', 1),
(259, '::1', 'dosen@gmail.com', 7, '2024-12-08 18:14:36', 1),
(260, '::1', 'dosen@gmail.com', 7, '2024-12-09 17:16:18', 1),
(261, '::1', 'dosen@gmail.com', 7, '2024-12-10 03:37:34', 1),
(262, '::1', 'gpm@gmail.com', 8, '2024-12-10 03:42:13', 1),
(263, '::1', 'gpm', NULL, '2024-12-10 04:01:28', 0),
(264, '::1', 'dosen@gmail.com', 7, '2024-12-10 04:01:37', 1),
(265, '::1', 'gpm@gmail.com', 8, '2024-12-10 08:27:36', 1),
(266, '::1', 'gpm@gmail.com', 8, '2024-12-10 19:36:00', 1),
(267, '::1', 'gpm@gmail.com', 8, '2024-12-11 07:38:45', 1),
(268, '::1', 'admin', NULL, '2024-12-11 07:41:32', 0),
(269, '::1', 'admin@gmail.com', 10, '2024-12-11 07:41:39', 1),
(270, '::1', 'dosen@gmail.com', 7, '2024-12-11 07:45:05', 1),
(271, '::1', 'gpm@gmail.com', 8, '2024-12-11 07:54:46', 1),
(272, '127.0.0.1', 'admin@gmail.com', 10, '2024-12-11 16:40:21', 1),
(273, '127.0.0.1', 'dosen@gmail.com', 7, '2024-12-11 16:41:08', 1),
(274, '::1', 'gpm@gmail.com', 8, '2024-12-11 17:34:27', 1),
(275, '::1', 'dosen@gmail.com', 7, '2024-12-11 17:41:14', 1),
(276, '::1', 'gpm@gmail.com', 8, '2024-12-11 17:44:43', 1),
(277, '::1', 'dosen@gmail.com', 7, '2024-12-11 20:35:08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(3, 'dosen-access', 'khusus dosen'),
(4, 'gpm-access', 'khusus gpm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bap`
--

CREATE TABLE `bap` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `kode_mk` varchar(20) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bap`
--

INSERT INTO `bap` (`id`, `user_id`, `tanggal`, `kode_mk`, `tempat`, `created_at`, `updated_at`) VALUES
(3, 7, '2024-12-13', 'UNV12002', 'senggarang', '2024-12-04 02:27:41', '2024-12-05 05:47:45'),
(4, 7, '2024-12-13', 'INF12001', 'senggarang', '2024-12-04 02:31:33', '2024-12-04 02:31:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bap_catatan`
--

CREATE TABLE `bap_catatan` (
  `id` int(11) NOT NULL,
  `bap_id` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bap_catatan`
--

INSERT INTO `bap_catatan` (`id`, `bap_id`, `catatan`, `urutan`) VALUES
(4, 4, 'bagus', 1),
(14, 3, 'bagus', 0),
(15, 3, 'saya menambah ini', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_rps`
--

CREATE TABLE `daftar_rps` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `kode_mk` varchar(15) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `link_rps` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_rps`
--

INSERT INTO `daftar_rps` (`id`, `user_id`, `kode_mk`, `jurusan_id`, `tahun_ajaran`, `semester`, `kelas`, `link_rps`, `created_at`, `updated_at`) VALUES
(12, 7, 'FST12001', 1, '2024/2025', 'Ganjil', '12', 'https://docs.google.com/document/d/1-neYBih6WBxiXhdG-Ooo_eCS9TqRSBFB/edit?usp=drive_link&ouid=115892866959518709254&rtpof=true&sd=true', '2024-12-03 09:08:51', '2024-12-03 09:08:51'),
(14, 7, 'INF12001', 1, '2024/2025', 'Ganjil', '12', 'https://docs.google.com/document/d/1-neYBih6WBxiXhdG-Ooo_eCS9TqRSBFB/edit?usp=drive_link&ouid=115892866959518709254&rtpof=true&sd=true', '2024-12-03 09:48:29', '2024-12-03 09:48:29'),
(16, 7, 'INF12004', 1, '2024/2025', 'Ganjil', '12', 'https://docs.google.com/document/d/1-neYBih6WBxiXhdG-Ooo_eCS9TqRSBFB/edit?usp=drive_link&ouid=115892866959518709254&rtpof=true&sd=true', '2024-12-03 09:50:35', '2024-12-03 09:50:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fakultas`, `keterangan`) VALUES
(1, 'FTTK', 'FAKULTAS TEKNIK DAN TEKNOLOGI KEMARITIMAN'),
(2, 'FEBM', 'FAKULTAS EKONOMI DAN BISNIS MARITIM'),
(3, 'FIKP', 'FAKULTAS ILMU KELAUTAN DAN PERIKANAN'),
(4, 'FKIP', 'FAKULTAS KEGURUAN DAN ILMU PENDIDIKAN'),
(5, 'FISIP', 'FAKULTAS ILMU SOSIAL DAN ILMU POLITIK'),
(6, 'FK', 'FAKULTAS KEDOKTERAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `fakultas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `fakultas_id`) VALUES
(1, 'TEKNIK INFORMATIKA', 1),
(2, 'TEKNIK ELEKTRO', 1),
(3, 'TEKNIK PERKAPALAN', 1),
(4, 'KIMIA', 1),
(5, 'TEKNIK INDUSTRI', 1),
(6, 'AKUNTANSI', 2),
(7, 'MANAJEMEN', 2),
(8, 'BISNIS DIGITAL', 2),
(9, 'KEWIRAUSAHAAN', 2),
(10, 'ILMU KELAUTAN', 3),
(11, 'MANAJEMEN SUMBERDAYA PERAIRAN', 3),
(12, 'TEKNOLOGI HASIL PERIKANAN', 3),
(13, 'SOSIAL EKONOMI PERIKANAN', 3),
(14, 'PENDIDIKAN BAHASA DAN SASTRA INDONESIA', 4),
(15, 'PENDIDIKAN BAHASA INGGRIS', 4),
(16, 'PENDIDIKAN MATEMATIKA', 4),
(17, 'PENDIDIKAN BIOLOGI', 4),
(18, 'PENDIDIKAN KIMIA', 4),
(19, 'PENDIDIKAN PROFESI GURU (PROFESI)', 4),
(20, 'ILMU PEMERINTAHAN', 5),
(21, 'ADMINISTRASI PUBLIK', 5),
(22, 'SOSIOLOGI', 5),
(23, 'ILMU HUKUM', 5),
(24, 'HUBUNGAN INTERNASIONAL', 5),
(25, 'KAJIAN FILM, TELEVISI, DAN MEDIA', 5),
(26, 'KEDOKTERAN', 6),
(27, 'PENDIDIKAN PROFESI DOKTER', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(15) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_mk`, `nama_mk`, `id_jurusan`) VALUES
('FST12001', 'PENGANTAR TEKNOLOGI INFORMASI', 1),
('INF11001', 'DASAR PEMROGRAMAN', 1),
('INF11002', 'ORGANISASI DAN ARSITEKTUR KOMPUTER', 1),
('INF11004', 'SISTEM BASIS DATA', 1),
('INF11005', 'PEMROGRAMAN BERORIENTASI OBJEK', 1),
('INF11006', 'SISTEM OPERASI', 1),
('INF11007', 'STRUKTUR DATA', 1),
('INF11008', 'ANALISIS DAN PERANCANGAN PERANGKAT LUNAK', 1),
('INF11009', 'KECERDASAN BUATAN', 1),
('INF11031', 'SISTEM TERDISTRIBUSI', 1),
('INF12001', 'KALKULUS', 1),
('INF12002', 'ALJABAR LINEAR', 1),
('INF12003', 'TEORI BAHASA FORMAL DAN OTOMATA', 1),
('INF12004', 'MATEMATIKA DISKRIT', 1),
('INF12007', 'METODOLOGI PENELITIAN', 1),
('UNV12001', 'AGAMA', 1),
('UNV12002', 'PANCASILA', 1),
('UNV12003', 'KEWARGANEGARAAN', 1),
('UNV12004', 'BAHASA INDONESIA', 1),
('UNV12005', 'BAHASA INGGRIS', 1),
('UNV12006', 'PENGANTAR ILMU TEKNOLOGI KEMARITIMAN', 1),
('UNV12007', 'TAMADUN DAN TUNJUK AJAR MELAYU', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1730080845, 1);

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unsur_rps`
--

CREATE TABLE `unsur_rps` (
  `id_unsur` int(11) NOT NULL,
  `unsur` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `unsur_rps`
--

INSERT INTO `unsur_rps` (`id_unsur`, `unsur`, `keterangan`) VALUES
(1, 'ini bisa edit?', 'bisa'),
(3, 'ini unsur ke tiga', 'iya ini ke 3'),
(7, 'tambah unsur 3', 'tambah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `fakultas_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `fakultas_id`, `jurusan_id`) VALUES
(7, 'dosen@gmail.com', 'dosen', '$2y$10$/NOqVvEh/yRqOfYR5Af2Pe/WSdv4ypPc1hhEEe8KaifwkcM/P170e', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-10-28 19:31:17', '2024-10-28 19:31:17', NULL, NULL, NULL),
(8, 'gpm@gmail.com', 'gpm', '$2y$10$.h/6F2LxnYz8Ibpgf25RkOmLN9fng4OSNJfxI0jWQluDuXJ3Sa.BG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-10-28 19:31:50', '2024-10-28 19:31:50', NULL, NULL, NULL),
(10, 'admin@gmail.com', 'admin', '$2y$10$mbGs3wf/ZUQmFKyg1fF38ufU1CF9Katn1RblaOKtmCTcnYZxoNRRK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-10-29 20:37:48', '2024-10-29 20:37:48', NULL, NULL, NULL),
(17, 'admin2@gmail.com', 'admin2', '$2y$10$9AtXVVylg5i2wpTPzB8Tle975g3T24V6ZNhiH1ggAjd7wckNUz/aO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-11-10 07:40:35', '2024-11-10 07:40:35', NULL, NULL, NULL),
(25, 'raja@gmail.com', 'raja', '$2y$10$Er9V8u09kTyjjJApmEhEt./H/qnxwkmJxU.S8jZ9gV.n1dNt1sx4.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-11-18 19:42:56', '2024-11-18 19:42:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_details`
--

CREATE TABLE `users_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `fakultas_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `nama`, `nidn`, `fakultas_id`, `jurusan_id`) VALUES
(6, 17, 'ini admin 2', '2010201002', 1, 1),
(14, 25, 'raja aryansahputra', '2201020070', 1, 18);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `bap`
--
ALTER TABLE `bap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bap_user_id_foreign` (`user_id`),
  ADD KEY `bap_kode_mk_foreign` (`kode_mk`);

--
-- Indeks untuk tabel `bap_catatan`
--
ALTER TABLE `bap_catatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bap_catatan_bap_id_foreign` (`bap_id`);

--
-- Indeks untuk tabel `daftar_rps`
--
ALTER TABLE `daftar_rps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_mk` (`kode_mk`),
  ADD KEY `fk_kode_mata_kuliah_` (`kode_mk`),
  ADD KEY `fk_jurusan_id_` (`jurusan_id`),
  ADD KEY `fk_user_id_rps` (`user_id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakultas_id` (`fakultas_id`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`),
  ADD KEY `fk_mata_kuliah_jurusan` (`id_jurusan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review_rps`
--
ALTER TABLE `review_rps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daftar_rps` (`daftar_rps_id`),
  ADD KEY `fk_unsur` (`unsur_id`);

--
-- Indeks untuk tabel `unsur_rps`
--
ALTER TABLE `unsur_rps`
  ADD PRIMARY KEY (`id_unsur`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fakultas_id` (`fakultas_id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fakultas_id` (`fakultas_id`),
  ADD KEY `fk_jurusan_id` (`jurusan_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `bap`
--
ALTER TABLE `bap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bap_catatan`
--
ALTER TABLE `bap_catatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `daftar_rps`
--
ALTER TABLE `daftar_rps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `review_rps`
--
ALTER TABLE `review_rps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unsur_rps`
--
ALTER TABLE `unsur_rps`
  MODIFY `id_unsur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bap`
--
ALTER TABLE `bap`
  ADD CONSTRAINT `bap_kode_mk_foreign` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`),
  ADD CONSTRAINT `bap_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bap_catatan`
--
ALTER TABLE `bap_catatan`
  ADD CONSTRAINT `bap_catatan_bap_id_foreign` FOREIGN KEY (`bap_id`) REFERENCES `bap` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `daftar_rps`
--
ALTER TABLE `daftar_rps`
  ADD CONSTRAINT `fk_daftar_rps_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode_mata_kuliah_` FOREIGN KEY (`kode_mk`) REFERENCES `mata_kuliah` (`kode_mk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id_rps` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `fk_mata_kuliah_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review_rps`
--
ALTER TABLE `review_rps`
  ADD CONSTRAINT `fk_daftar_rps` FOREIGN KEY (`daftar_rps_id`) REFERENCES `daftar_rps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_unsur` FOREIGN KEY (`unsur_id`) REFERENCES `unsur_rps` (`id_unsur`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `users_details`
--
ALTER TABLE `users_details`
  ADD CONSTRAINT `fk_fakultas_id` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_jurusan_id` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
