-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 24 jan 2017 om 18:45
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opdracht`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `votes` bigint(20) NOT NULL,
  `posted_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `url`, `votes`, `posted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Scythe, the most-hyped board game of 2016, delivers', 'http://arstechnica.com/gaming/2016/07/scythe-the-most-hyped-board-game-of-2016-delivers/', 1, 'Robbert', '2017-01-15 01:23:43', '2017-01-15 01:23:43', NULL),
(2, 'Tips from the Pragmatic Programmer (2000)', 'https://pragprog.com/the-pragmatic-programmer/extracts/tips', 1, 'Robbert', '2017-01-15 01:24:02', '2017-01-15 01:24:02', NULL),
(3, 'Enhancing Download Protection in Firefox', 'https://blog.mozilla.org/security/2016/08/01/enhancing-download-protection-in-firefox/', 1, 'Robbert', '2017-01-15 01:24:17', '2017-01-15 01:24:17', NULL),
(4, 'YouTube''s road to HTTPS', 'https://youtube-eng.blogspot.com/2016/08/youtubes-road-to-https.html', 1, 'Robbert', '2017-01-15 01:24:34', '2017-01-15 02:11:56', '2017-01-15 02:11:56'),
(5, 'test', 'http://www.google.com', 1, 'Robbert', '2017-01-15 23:59:37', '2017-01-16 00:21:01', '2017-01-16 00:21:01'),
(6, 'robbert', 'http://www.google.com', 1, 'Robbert', '2017-01-16 00:22:55', '2017-01-16 00:23:16', '2017-01-16 00:23:16'),
(7, 'gtdf', 'https://youtube-eng.blogspot.com/2016/08/youtubes-road-to-https.html', 1, 'Robbert', '2017-01-16 00:23:33', '2017-01-16 00:45:14', '2017-01-16 00:45:14'),
(8, 'TITLE VAN DIT DING :)', 'http://www.google.com', 1, 'Robbert', '2017-01-16 00:45:28', '2017-01-16 00:45:33', '2017-01-16 00:45:33'),
(9, 'esd', 'http://www.google.com', 1, 'Robbert', '2017-01-16 00:46:17', '2017-01-16 00:51:26', '2017-01-16 00:51:26'),
(10, 'YouTube''s road to HTTPS', 'https://youtube-eng.blogspot.com/2016/08/youtubes-road-to-https.html', 1, 'Robbert', '2017-01-16 00:51:32', '2017-01-16 12:27:52', '2017-01-16 12:27:52'),
(11, 'te ', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:40:46', '2017-01-16 11:47:44', '2017-01-16 11:47:44'),
(12, 'etz', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:47:55', '2017-01-16 11:49:40', '2017-01-16 11:49:40'),
(13, 'dsqf', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:52:44', '2017-01-16 11:52:47', '2017-01-16 11:52:47'),
(14, 'qdsf ', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:53:34', '2017-01-16 11:53:37', '2017-01-16 11:53:37'),
(15, 'fqdsf', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:54:00', '2017-01-16 11:54:03', '2017-01-16 11:54:03'),
(16, 'qdsf', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:54:35', '2017-01-16 11:54:38', '2017-01-16 11:54:38'),
(17, 'dsfq', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:56:06', '2017-01-16 11:56:10', '2017-01-16 11:56:10'),
(18, 'etz sdq', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:56:16', '2017-01-16 11:57:39', '2017-01-16 11:57:39'),
(19, 'dsqf', 'http://www.google.com', 1, 'Robbert', '2017-01-16 11:57:46', '2017-01-16 12:25:05', '2017-01-16 12:25:05'),
(20, 'qdfs', 'http://www.google.com', 1, 'Robbert2', '2017-01-16 12:23:39', '2017-01-16 12:24:13', '2017-01-16 12:24:13'),
(21, 'h', 'http:///www.google.be', 1, 'Robbert', '2017-01-16 12:27:23', '2017-01-16 12:27:28', '2017-01-16 12:27:28'),
(22, 'sdf', 'http://www.google.be', 1, 'Robbert', '2017-01-16 12:27:41', '2017-01-16 12:27:47', '2017-01-16 12:27:47'),
(23, 'YouTube''s road to HTTPS', 'https://youtube-eng.blogspot.com/2016/08/youtubes-road-to-https.html', 1, 'Robbert', '2017-01-16 12:28:07', '2017-01-16 12:28:07', NULL),
(24, 'etz sdq ', 'http://www.google.com', 1, 'Robbert2', '2017-01-16 12:31:02', '2017-01-16 12:31:14', '2017-01-16 12:31:14'),
(25, 'test', 'http://www.google.com', 1, 'Robbert2', '2017-01-17 16:31:47', '2017-01-17 16:37:08', '2017-01-17 16:37:08'),
(26, 'qdsf c sqdf', 'http://www.google.com', 1, 'Robbert2', '2017-01-20 16:25:08', '2017-01-20 16:25:17', '2017-01-20 16:25:17'),
(27, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-21 21:44:47', '2017-01-22 20:39:49', '2017-01-22 20:39:49'),
(28, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-22 20:41:26', '2017-01-22 23:17:00', '2017-01-22 23:17:00'),
(29, 'qdsf', 'http://www.google.com', 0, 'Robbert2', '2017-01-22 23:17:06', '2017-01-22 23:42:16', '2017-01-22 23:42:16'),
(30, 'last test', 'http://www.google.com', 0, 'Robbert2', '2017-01-22 23:42:36', '2017-01-23 00:22:02', '2017-01-23 00:22:02'),
(31, 'ertsdqf', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 15:16:09', '2017-01-23 15:41:33', '2017-01-23 15:41:33'),
(32, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 18:24:59', '2017-01-23 19:57:22', '2017-01-23 19:57:22'),
(33, 'another test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 18:37:29', '2017-01-23 19:24:07', '2017-01-23 19:24:07'),
(34, 'ezsd', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:24:17', '2017-01-23 19:42:30', '2017-01-23 19:42:30'),
(35, 'does this go well?', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:36:49', '2017-01-23 19:42:10', '2017-01-23 19:42:10'),
(36, 'does this go well?', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:37:50', '2017-01-23 19:42:26', '2017-01-23 19:42:26'),
(37, 'ezr', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:41:19', '2017-01-23 19:42:14', '2017-01-23 19:42:14'),
(38, 'ezr', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:41:35', '2017-01-23 19:42:24', '2017-01-23 19:42:24'),
(39, 'etz sdq', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:42:38', '2017-01-23 19:42:41', '2017-01-23 19:42:41'),
(40, 'ht', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:42:48', '2017-01-23 19:44:03', '2017-01-23 19:44:03'),
(41, 'ht', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:44:09', '2017-01-23 19:45:08', '2017-01-23 19:45:08'),
(42, 'sdf', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:45:12', '2017-01-23 19:50:24', '2017-01-23 19:50:24'),
(43, 'sdf', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:45:23', '2017-01-23 19:50:19', '2017-01-23 19:50:19'),
(44, 'sdf', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:46:34', '2017-01-23 19:50:15', '2017-01-23 19:50:15'),
(45, 'sdf', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:50:06', '2017-01-23 19:50:30', '2017-01-23 19:50:30'),
(46, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:50:37', '2017-01-23 19:57:20', '2017-01-23 19:57:20'),
(47, 'test nieuw artikel', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:52:25', '2017-01-23 19:53:05', '2017-01-23 19:53:05'),
(48, 'again', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:53:13', '2017-01-23 19:57:17', '2017-01-23 19:57:17'),
(49, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 19:57:30', '2017-01-23 22:10:13', '2017-01-23 22:10:13'),
(50, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 20:17:40', '2017-01-23 20:18:13', '2017-01-23 20:18:13'),
(51, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 20:18:01', '2017-01-23 20:18:17', '2017-01-23 20:18:17'),
(52, 'ht', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 20:18:21', '2017-01-23 20:19:33', '2017-01-23 20:19:33'),
(53, 'test', 'http://www.google.be', 0, 'Robbert', '2017-01-23 21:42:00', '2017-01-23 22:03:48', '2017-01-23 22:03:48'),
(54, 'test', 'http://www.google;be', 0, 'Robbert', '2017-01-23 22:02:46', '2017-01-23 22:03:42', '2017-01-23 22:03:42'),
(55, 'test', 'http://www.google.com', 0, 'Robbert', '2017-01-23 22:08:01', '2017-01-23 23:01:46', '2017-01-23 23:01:46'),
(56, 'test', 'http://www.google.com', 0, 'Robbert', '2017-01-23 22:08:50', '2017-01-23 22:24:56', '2017-01-23 22:24:56'),
(57, 'te', 'http://www.google.be', 0, 'Robbert', '2017-01-23 22:25:05', '2017-01-23 22:55:19', '2017-01-23 22:55:19'),
(58, 'te', 'http://Www.google.be', 0, 'Robbert', '2017-01-23 22:54:32', '2017-01-23 22:55:16', '2017-01-23 22:55:16'),
(59, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 22:55:29', '2017-01-23 23:01:38', '2017-01-23 23:01:38'),
(60, 'te', 'http://www.google.be', 0, 'Robbert', '2017-01-23 23:01:59', '2017-01-23 23:02:30', '2017-01-23 23:02:30'),
(61, 'test2', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:02:38', '2017-01-23 23:03:05', '2017-01-23 23:03:05'),
(62, 'test2', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:02:46', '2017-01-23 23:03:00', '2017-01-23 23:03:00'),
(63, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:03:10', '2017-01-23 23:03:33', '2017-01-23 23:03:33'),
(64, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:03:37', '2017-01-23 23:04:21', '2017-01-23 23:04:21'),
(65, 'test2', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:04:24', '2017-01-23 23:08:48', '2017-01-23 23:08:48'),
(66, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:08:51', '2017-01-23 23:11:47', '2017-01-23 23:11:47'),
(67, 'fdgkjdfig', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:11:54', '2017-01-23 23:40:39', '2017-01-23 23:40:39'),
(68, 'te', 'http://www.google.be', 0, 'Robbert', '2017-01-23 23:24:08', '2017-01-23 23:35:00', '2017-01-23 23:35:00'),
(69, 'gt', 'http:///www.google.ge', 0, 'Robbert', '2017-01-23 23:27:54', '2017-01-23 23:34:56', '2017-01-23 23:34:56'),
(70, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:35:09', '2017-01-23 23:35:45', '2017-01-23 23:35:45'),
(71, 'ht', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:35:51', '2017-01-23 23:36:44', '2017-01-23 23:36:44'),
(72, 'test', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:40:44', '2017-01-23 23:44:51', '2017-01-23 23:44:51'),
(73, 'g', 'http://www.google.be', 0, 'Robbert', '2017-01-23 23:41:38', '2017-01-23 23:42:49', '2017-01-23 23:42:49'),
(74, 'ht', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:47:08', '2017-01-23 23:52:01', '2017-01-23 23:52:01'),
(75, 'tsfsd', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:51:26', '2017-01-23 23:52:25', '2017-01-23 23:52:25'),
(76, 'dfq', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:52:31', '2017-01-23 23:53:19', '2017-01-23 23:53:19'),
(77, 'SDQFQDSF', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:53:24', '2017-01-23 23:58:55', '2017-01-23 23:58:55'),
(78, 'sdfqs', 'http://www.google.com', 0, 'Robbert2', '2017-01-23 23:59:00', '2017-01-24 00:00:24', '2017-01-24 00:00:24'),
(79, 'rsdf', 'http://www.google.be', 0, 'Robbert', '2017-01-24 00:00:02', '2017-01-24 00:06:10', '2017-01-24 00:06:10'),
(80, 'dsg', 'http://www.google.be', 0, 'Robbert', '2017-01-24 00:06:21', '2017-01-24 00:06:58', '2017-01-24 00:06:58'),
(81, 'qsdf', 'http://www.google.be', 0, 'Robbert', '2017-01-24 00:07:06', '2017-01-24 00:08:39', '2017-01-24 00:08:39'),
(82, 'sdqf', 'http://www.google.be', 0, 'Robbert', '2017-01-24 00:08:48', '2017-01-24 00:11:06', '2017-01-24 00:11:06'),
(83, 'dfqgd', 'http://www.google.com', 0, 'Robbert2', '2017-01-24 00:11:12', '2017-01-24 16:42:51', '2017-01-24 16:42:51'),
(84, 'qsdf', 'https://youtube-eng.blogspot.com/2016/08/youtubes-road-to-https.html', 0, 'Robbert2', '2017-01-24 00:13:39', '2017-01-24 00:16:23', '2017-01-24 00:16:23');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'Robbert', 'comment 1', 1, '2017-01-15 01:24:51', '2017-01-15 01:25:41'),
(2, 'Robbert', 'comment 2', 1, '2017-01-15 01:24:54', '2017-01-15 01:25:52'),
(3, 'Robbert', 'comment 110', 2, '2017-01-15 01:25:03', '2017-01-16 11:03:15'),
(5, 'Robbert', 'fsd ', 7, '2017-01-16 00:39:29', '2017-01-16 00:40:50'),
(13, 'Robbert', 'df q', 12, '2017-01-16 11:48:16', '2017-01-16 11:48:16'),
(15, 'Robbert', 'qfds ', 19, '2017-01-16 12:08:18', '2017-01-16 12:08:18'),
(22, 'Robbert2', 'qf', 21, '2017-01-16 12:21:00', '2017-01-16 12:21:00'),
(30, 'Robbert2', 'df', 20, '2017-01-16 12:23:59', '2017-01-16 12:23:59'),
(34, 'Robbert', 'qdsf', 57, '2017-01-23 22:28:21', '2017-01-23 22:28:21');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2016_12_30_204857_articles', 2),
(11, '2017_01_04_152425_create_comments_table', 2),
(15, '2017_01_20_190006_create_votes', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('robbertluit@hotmail.com', 'ca9745b8e7c3d43fd504603dae2ffe76684a54d0c649fa6c856d35f36ec30fd1', '2017-01-13 22:21:07');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
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
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Robbert', 'robbertluit@hotmail.com', '$2y$10$XmWiGufiueQquu5o/HlKP.bTnEULgc9rmNxd1lmmJAetyiOp6aHoO', 'NUqVwqN7oHQtILpdUxq4dcXCGIhAGV7WxNQDwI3SgRDQeVhGX5AhyhSDVmSq', '2016-12-29 22:36:04', '2017-01-23 22:10:05'),
(2, 'Eddy', 'test@test.com', '$2y$10$A2n6uaqMHhH68ZIgBKsC4Oa1lHQFJr9Qwab78RQL57VuBgGpfm.OK', 'sHm6peWei85eJGWoQZlV3XGgDv2QKil9T0Tq7V8SNN25JZsb4gR9JQL5LOTN', '2016-12-29 22:44:15', '2017-01-03 22:41:13'),
(3, 'Robbert2', 'robbertluit2@hotmail.com', '$2y$10$4PfcA6Un0M5eQFZMluNXJulkNSv0m4Nhl0qV6AGnQozEP/JQqk9TO', 'rroAwZi5mcfHPefRp1LBKp9z00YKaJK7tEa2ojS22KolJz6yC66Px8jcoynJ', '2016-12-30 15:26:58', '2017-01-23 21:56:07'),
(4, 'Robberto', 'test2@test.com', '$2y$10$AwyF7pjjGp3n3x0WeqkZ7.pGQUPCpe/itVZ7n.3ziIZq9RmqLkBHO', '9Bfzls9Wug5ZAU0pOgGjxnrSrP8FvIsiWjTZu18dyJnZvB7qpEOOe3ZhyTJj', '2017-01-03 14:28:28', '2017-01-03 14:28:42'),
(5, 'TESTNAAM', 'xxx@hotmail.com', '$2y$10$/mGCl3K5NnJw6H/vln5jCOGnxX2hzpFHbzda/0jVV0qlv0Y1yXXQy', 'ui8141DXuIoWynmoBn2o160hwHiSWD9Z0JOdbQVOGGGoOWSL4qzjl1IIFGzO', '2017-01-07 23:02:47', '2017-01-08 01:29:15'),
(6, 'test', 't@t.com', '$2y$10$WKFovxDKaL/V8rc1m0J/qu29F7A90oT4d9qZUTIUWce5bCao.IHSC', 'zAlSmIch6XALJgXeOV7GnKNbA4VgCqLZB60hPhKdddzv5WwZ1Ooj6ECwE7Np', '2017-01-09 09:37:04', '2017-01-11 16:26:48'),
(7, 'AA', 'a@t.com', '$2y$10$TnuWmDoJX.vbhp.YLd/F3eSuiPI5NbBZAX2PWdcR5J/QLzm3.URKO', '6rFtLSeymAHUO9MnBu477O3SjzQUxqe7yO2SZuv2qI1fVpdLRcBnof8BHJ4b', '2017-01-10 11:58:40', '2017-01-10 13:00:04'),
(8, 'TEST', 'ttt@ttt.com', '$2y$10$ILQBIn8ncKEELpVBvNm4q.ZgNZLP6yiykOgdFQ/DkxtdLaKJW.fQ.', 'fNi3MGfxdE0xkpHZamA0JfZDCynQHxsSGaZSQuJghOaN4dAF5H9TQ2310GEo', '2017-01-11 14:43:04', '2017-01-11 16:09:26'),
(9, 'pascal', 'pascal@test.be', '$2y$10$9idDpQz82uqPUoGiFea0K.cll4IUfUmCcpQigugW0iPGEyZImLQQ6', 'u6OupKz8My1UDwnI77HS54QakbjWOzJpLdTHJ2u93H243zEnQIJQhaB7G13e', '2017-01-13 12:08:12', '2017-01-13 12:11:31');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `votes`
--

CREATE TABLE `votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `up_down` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voted_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `votes`
--

INSERT INTO `votes` (`id`, `up_down`, `voted_by`, `value`, `article_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 'up', 'Robbert2', 1, 32, '2017-01-23 18:27:07', '2017-01-23 19:24:00', NULL),
(17, 'up', 'Robbert2', 1, 1, '2017-01-23 18:33:59', '2017-01-23 23:46:55', NULL),
(18, 'up', 'Robbert2', 1, 2, '2017-01-23 18:34:07', '2017-01-23 23:47:00', NULL),
(19, 'up', 'Robbert2', 1, 3, '2017-01-23 18:59:53', '2017-01-23 22:44:59', NULL),
(20, 'down', 'Robbert2', -1, 23, '2017-01-23 18:59:55', '2017-01-24 00:12:17', NULL),
(22, 'up', 'Robbert2', 1, 46, '2017-01-23 19:50:37', '2017-01-23 19:51:03', NULL),
(23, 'down', 'Robbert2', -1, 47, '2017-01-23 19:52:25', '2017-01-23 19:52:46', NULL),
(24, 'down', 'Robbert2', -1, 48, '2017-01-23 19:53:13', '2017-01-23 19:56:15', NULL),
(25, 'down', 'Robbert2', -1, 49, '2017-01-23 19:57:30', '2017-01-23 21:53:55', NULL),
(53, 'down', 'Robbert', -1, 53, '2017-01-23 21:42:00', '2017-01-23 22:00:12', NULL),
(80, 'up', 'Robbert', 1, 55, '2017-01-23 22:08:02', '2017-01-23 22:43:18', NULL),
(86, 'down', 'Robbert', -1, 57, '2017-01-23 22:25:05', '2017-01-23 22:54:21', NULL),
(113, 'up', 'Robbert2', 1, 72, '2017-01-23 23:40:47', '2017-01-23 23:41:02', NULL),
(122, 'up', 'default', 1, 76, '2017-01-23 23:52:31', '2017-01-23 23:52:38', NULL),
(123, 'up', 'Robbert2', 1, 76, '2017-01-23 23:52:34', '2017-01-23 23:52:38', NULL),
(124, 'up', 'default', 1, 77, '2017-01-23 23:53:24', '2017-01-23 23:58:49', NULL),
(125, 'up', 'Robbert2', 1, 77, '2017-01-23 23:53:26', '2017-01-23 23:58:49', NULL),
(126, 'up', 'default', 1, 78, '2017-01-23 23:59:00', '2017-01-23 23:59:46', NULL),
(127, 'up', 'Robbert', 1, 78, '2017-01-23 23:59:24', '2017-01-23 23:59:46', NULL),
(128, 'up', 'default', 1, 79, '2017-01-24 00:00:02', '2017-01-24 00:05:59', NULL),
(129, 'down', 'Robbert', -1, 79, '2017-01-24 00:00:06', '2017-01-24 00:00:17', NULL),
(130, 'up', 'Robbert2', 1, 79, '2017-01-24 00:05:43', '2017-01-24 00:05:59', NULL),
(131, 'down', 'default', -1, 80, '2017-01-24 00:06:21', '2017-01-24 00:06:40', NULL),
(132, 'down', 'Robbert2', -1, 80, '2017-01-24 00:06:32', '2017-01-24 00:06:41', NULL),
(133, 'up', 'default', 0, 81, '2017-01-24 00:07:07', '2017-01-24 00:08:28', NULL),
(134, 'up', 'Robbert', 1, 81, '2017-01-24 00:07:08', '2017-01-24 00:08:28', NULL),
(135, 'down', 'default', -1, 82, '2017-01-24 00:08:48', '2017-01-24 00:10:13', NULL),
(136, 'down', 'Robbert', -1, 82, '2017-01-24 00:08:50', '2017-01-24 00:08:59', NULL),
(137, 'down', 'Robbert2', -1, 82, '2017-01-24 00:09:47', '2017-01-24 00:10:13', NULL),
(138, '', 'default', 0, 83, '2017-01-24 00:11:12', '2017-01-24 00:11:12', NULL),
(141, '', 'default', 0, 84, '2017-01-24 00:13:39', '2017-01-24 00:13:39', NULL),
(142, 'down', 'Robbert2', -1, 84, '2017-01-24 00:13:55', '2017-01-24 00:14:23', NULL),
(143, 'up', 'Robbert2', 1, 83, '2017-01-24 00:16:00', '2017-01-24 00:16:37', NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_title_index` (`title`),
  ADD KEY `articles_url_index` (`url`),
  ADD KEY `articles_posted_by_index` (`posted_by`);

--
-- Indexen voor tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexen voor tabel `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT voor een tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
