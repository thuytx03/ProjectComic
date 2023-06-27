-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 04:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_comic`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_chapter` int(11) NOT NULL,
  `comic_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `view` int(10) NOT NULL DEFAULT 0,
  `coin_required` int(10) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `slug`, `number_chapter`, `comic_id`, `status`, `view`, `coin_required`, `created_at`, `updated_at`) VALUES
(19, 'Mở đầu', 'mo-dau-77', 1, 77, 1, 19, 100, '2023-03-27 07:14:35', '2023-04-07 00:54:08'),
(20, 'Bắt đầu', 'bat-dau-77', 2, 77, 1, 20, 100, '2023-03-27 07:15:07', '2023-04-07 13:51:36'),
(21, 'Mở đầu', 'mo-dau-70', 1, 70, 1, 0, 200, '2023-03-27 07:15:57', '2023-03-27 07:15:57'),
(22, 'Mở đầu', 'mo-dau-67', 1, 67, 1, 3, 0, '2023-03-27 07:45:51', '2023-04-06 14:47:54'),
(23, 'Mở đầu', 'mo-dau-76', 1, 76, 1, 0, 0, '2023-03-27 15:18:15', '2023-03-27 15:18:15'),
(24, 'Bắt đầu', 'bat-dau-74', 1, 74, 1, 0, 0, '2023-03-27 15:19:07', '2023-03-27 15:19:07'),
(25, 'Mở đầu', 'mo-dau-68', 1, 68, 1, 4, 0, '2023-03-30 00:25:34', '2023-04-08 00:34:43'),
(32, 'Chap 3', 'chap-3-77', 3, 77, 1, 1, 0, '2023-04-06 09:19:38', '2023-04-06 16:44:05'),
(33, 'Chap 4', 'chap-4-77', 4, 77, 1, 1, 0, '2023-04-06 09:20:06', '2023-04-07 15:21:24'),
(34, 'Chap 5', 'chap-5-77', 5, 77, 1, 2, 0, '2023-04-06 09:20:30', '2023-04-07 13:51:12'),
(35, 'Chap 6', 'chap-6-77', 6, 77, 1, 4, 0, '2023-04-06 09:21:09', '2023-04-06 15:42:49'),
(36, 'Chap 7', 'chap-7-77', 7, 77, 1, 3, 0, '2023-04-06 09:21:34', '2023-04-06 15:06:49'),
(37, 'Chap 8', 'chap-8-77', 8, 77, 1, 23, 0, '2023-04-06 09:22:01', '2023-04-08 00:45:15'),
(38, 'Mở đầu', 'mo-dau-75', 1, 75, 1, 1, 200, '2023-04-08 00:54:14', '2023-04-08 00:54:48'),
(39, 'after view', 'after-view-70', 2, 70, 1, 0, 100, '2023-04-08 01:01:01', '2023-04-08 01:01:15'),
(40, 'Chap 1', 'chap-1-69', 1, 69, 1, 1, 90, '2023-04-08 01:02:05', '2023-04-08 01:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_images`
--

CREATE TABLE `chapter_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter_images`
--

INSERT INTO `chapter_images` (`id`, `image`, `chapter_id`, `created_at`, `updated_at`) VALUES
(95, '1679901275_1_kctnu.jpg', 19, '2023-03-27 07:14:35', '2023-03-27 07:14:35'),
(96, '1679901275_2_q7nur.jpg', 19, '2023-03-27 07:14:35', '2023-03-27 07:14:35'),
(97, '1679901275_4.jpg', 19, '2023-03-27 07:14:35', '2023-03-27 07:14:35'),
(98, '1679901275_6.jpg', 19, '2023-03-27 07:14:35', '2023-03-27 07:14:35'),
(99, '1679901307_1_kctnu.jpg', 20, '2023-03-27 07:15:07', '2023-03-27 07:15:07'),
(100, '1679901307_18.jpg', 20, '2023-03-27 07:15:07', '2023-03-27 07:15:07'),
(101, '1679901307_19.jpg', 20, '2023-03-27 07:15:07', '2023-03-27 07:15:07'),
(102, '1679901307_20.jpg', 20, '2023-03-27 07:15:07', '2023-03-27 07:15:07'),
(103, '1679901357_18.jpg', 21, '2023-03-27 07:15:57', '2023-03-27 07:15:57'),
(104, '1679901357_19.jpg', 21, '2023-03-27 07:15:57', '2023-03-27 07:15:57'),
(105, '1679901357_20.jpg', 21, '2023-03-27 07:15:57', '2023-03-27 07:15:57'),
(106, '1679903151_18.jpg', 22, '2023-03-27 07:45:51', '2023-03-27 07:45:51'),
(107, '1679903151_19.jpg', 22, '2023-03-27 07:45:51', '2023-03-27 07:45:51'),
(108, '1679903151_20.jpg', 22, '2023-03-27 07:45:51', '2023-03-27 07:45:51'),
(109, '1679930295_1_kctnu.jpg', 23, '2023-03-27 15:18:15', '2023-03-27 15:18:15'),
(110, '1679930295_2_q7nur.jpg', 23, '2023-03-27 15:18:15', '2023-03-27 15:18:15'),
(111, '1679930295_4.jpg', 23, '2023-03-27 15:18:15', '2023-03-27 15:18:15'),
(112, '1679930295_6.jpg', 23, '2023-03-27 15:18:15', '2023-03-27 15:18:15'),
(113, '1679930347_1_kctnu.jpg', 24, '2023-03-27 15:19:07', '2023-03-27 15:19:07'),
(114, '1679930347_2_q7nur.jpg', 24, '2023-03-27 15:19:07', '2023-03-27 15:19:07'),
(115, '1679930347_4.jpg', 24, '2023-03-27 15:19:07', '2023-03-27 15:19:07'),
(116, '1679930347_18.jpg', 24, '2023-03-27 15:19:07', '2023-03-27 15:19:07'),
(117, '1679930347_19.jpg', 24, '2023-03-27 15:19:07', '2023-03-27 15:19:07'),
(118, '1679930347_20.jpg', 24, '2023-03-27 15:19:07', '2023-03-27 15:19:07'),
(129, '1680703352_4.jpg', 25, '2023-04-05 14:02:32', '2023-04-05 14:02:32'),
(130, '1680703352_6.jpg', 25, '2023-04-05 14:02:32', '2023-04-05 14:02:32'),
(131, '1680703352_18.jpg', 25, '2023-04-05 14:02:32', '2023-04-05 14:02:32'),
(132, '1680703352_19.jpg', 25, '2023-04-05 14:02:32', '2023-04-05 14:02:32'),
(133, '1680703352_20.jpg', 25, '2023-04-05 14:02:32', '2023-04-05 14:02:32'),
(134, '1680772778_18.jpg', 32, '2023-04-06 09:19:39', '2023-04-06 09:19:39'),
(135, '1680772779_19.jpg', 32, '2023-04-06 09:19:39', '2023-04-06 09:19:39'),
(136, '1680772779_20.jpg', 32, '2023-04-06 09:19:39', '2023-04-06 09:19:39'),
(137, '1680772806_1_kctnu.jpg', 33, '2023-04-06 09:20:06', '2023-04-06 09:20:06'),
(138, '1680772806_2_q7nur.jpg', 33, '2023-04-06 09:20:06', '2023-04-06 09:20:06'),
(139, '1680772806_4.jpg', 33, '2023-04-06 09:20:06', '2023-04-06 09:20:06'),
(140, '1680772806_18.jpg', 33, '2023-04-06 09:20:06', '2023-04-06 09:20:06'),
(141, '1680772806_19.jpg', 33, '2023-04-06 09:20:06', '2023-04-06 09:20:06'),
(142, '1680772806_20.jpg', 33, '2023-04-06 09:20:06', '2023-04-06 09:20:06'),
(143, '1680772830_1_kctnu.jpg', 34, '2023-04-06 09:20:30', '2023-04-06 09:20:30'),
(144, '1680772830_2_q7nur.jpg', 34, '2023-04-06 09:20:30', '2023-04-06 09:20:30'),
(145, '1680772830_4.jpg', 34, '2023-04-06 09:20:30', '2023-04-06 09:20:30'),
(146, '1680772830_6.jpg', 34, '2023-04-06 09:20:30', '2023-04-06 09:20:30'),
(147, '1680772869_1_kctnu.jpg', 35, '2023-04-06 09:21:09', '2023-04-06 09:21:09'),
(148, '1680772869_2_q7nur.jpg', 35, '2023-04-06 09:21:09', '2023-04-06 09:21:09'),
(149, '1680772869_4.jpg', 35, '2023-04-06 09:21:09', '2023-04-06 09:21:09'),
(150, '1680772869_6.jpg', 35, '2023-04-06 09:21:09', '2023-04-06 09:21:09'),
(151, '1680772869_18.jpg', 35, '2023-04-06 09:21:09', '2023-04-06 09:21:09'),
(152, '1680772869_19.jpg', 35, '2023-04-06 09:21:09', '2023-04-06 09:21:09'),
(153, '1680772869_20.jpg', 35, '2023-04-06 09:21:09', '2023-04-06 09:21:09'),
(154, '1680772869_anh2.jpg', 35, '2023-04-06 09:21:09', '2023-04-06 09:21:09'),
(155, '1680772894_1_kctnu.jpg', 36, '2023-04-06 09:21:34', '2023-04-06 09:21:34'),
(156, '1680772894_2_q7nur.jpg', 36, '2023-04-06 09:21:34', '2023-04-06 09:21:34'),
(157, '1680772894_4.jpg', 36, '2023-04-06 09:21:34', '2023-04-06 09:21:34'),
(158, '1680772894_18.jpg', 36, '2023-04-06 09:21:34', '2023-04-06 09:21:34'),
(159, '1680772894_19.jpg', 36, '2023-04-06 09:21:34', '2023-04-06 09:21:34'),
(160, '1680772894_20.jpg', 36, '2023-04-06 09:21:34', '2023-04-06 09:21:34'),
(161, '1680772921_1_kctnu.jpg', 37, '2023-04-06 09:22:01', '2023-04-06 09:22:01'),
(162, '1680772921_2_q7nur.jpg', 37, '2023-04-06 09:22:01', '2023-04-06 09:22:01'),
(163, '1680772921_4.jpg', 37, '2023-04-06 09:22:01', '2023-04-06 09:22:01'),
(164, '1680772921_18.jpg', 37, '2023-04-06 09:22:01', '2023-04-06 09:22:01'),
(165, '1680772921_19.jpg', 37, '2023-04-06 09:22:01', '2023-04-06 09:22:01'),
(166, '1680772921_20.jpg', 37, '2023-04-06 09:22:01', '2023-04-06 09:22:01'),
(167, '1680915254_18.jpg', 38, '2023-04-08 00:54:15', '2023-04-08 00:54:15'),
(168, '1680915255_19.jpg', 38, '2023-04-08 00:54:15', '2023-04-08 00:54:15'),
(169, '1680915255_20.jpg', 38, '2023-04-08 00:54:15', '2023-04-08 00:54:15'),
(170, '1680915661_18.jpg', 39, '2023-04-08 01:01:01', '2023-04-08 01:01:01'),
(171, '1680915661_19.jpg', 39, '2023-04-08 01:01:01', '2023-04-08 01:01:01'),
(172, '1680915661_20.jpg', 39, '2023-04-08 01:01:01', '2023-04-08 01:01:01'),
(173, '1680915725_18.jpg', 40, '2023-04-08 01:02:05', '2023-04-08 01:02:05'),
(174, '1680915725_19.jpg', 40, '2023-04-08 01:02:05', '2023-04-08 01:02:05'),
(175, '1680915725_20.jpg', 40, '2023-04-08 01:02:05', '2023-04-08 01:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_user`
--

CREATE TABLE `chapter_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `unlocked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter_user`
--

INSERT INTO `chapter_user` (`id`, `user_id`, `chapter_id`, `unlocked`, `created_at`, `updated_at`) VALUES
(1, 1, 19, 1, '2023-04-06 16:35:28', '2023-04-06 16:35:28'),
(2, 2, 32, 1, '2023-04-06 16:44:05', '2023-04-06 16:44:05'),
(3, 2, 19, 1, '2023-04-07 00:46:27', '2023-04-07 00:46:27'),
(4, 1, 20, 1, '2023-04-07 00:47:29', '2023-04-07 00:47:29'),
(5, 2, 37, 1, '2023-04-07 13:51:00', '2023-04-07 13:51:00'),
(6, 2, 34, 1, '2023-04-07 13:51:12', '2023-04-07 13:51:12'),
(7, 2, 33, 1, '2023-04-07 15:21:24', '2023-04-07 15:21:24'),
(8, 2, 25, 1, '2023-04-08 00:34:13', '2023-04-08 00:34:13'),
(9, 1, 38, 1, '2023-04-08 00:54:48', '2023-04-08 00:54:48'),
(10, 1, 40, 1, '2023-04-08 01:02:29', '2023-04-08 01:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE `comics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` decimal(10,0) DEFAULT 0,
  `status` int(11) NOT NULL,
  `vip` decimal(10,0) DEFAULT 0,
  `price` decimal(10,0) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comics`
--

INSERT INTO `comics` (`id`, `name`, `slug`, `cover_image`, `description`, `author`, `view`, `status`, `vip`, `price`, `created_at`, `updated_at`) VALUES
(62, 'Võ luyện đỉnh phong', 'vo-luyen-dinh-phong', 'comics/3AE60DpcIkf1DSeA2rNkhhFpQhRxrBztwQZlmZ8f.jpg', '<p>Truyện tranh <strong>V&otilde; luyện đỉnh phong</strong> được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>V&otilde; luyện đỉnh phong</strong>.</p>', 'Thuỷ', '0', 1, NULL, NULL, '2023-03-27 06:42:55', '2023-03-27 06:42:55'),
(63, 'Tiên tôn lạc vô cực', 'tien-ton-lac-vo-cuc', 'comics/5kEMYkUsy5jgoX7F16ilJQsPytAbzbcwaBuYaCor.jpg', '<p>Truyện tranh <strong>Ti&ecirc;n t&ocirc;n lạc v&ocirc; cực</strong>&nbsp;được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Ti&ecirc;n t&ocirc;n lạc v&ocirc; cực</strong>.</p>', 'Trịnh Thuỷ', '0', 1, NULL, NULL, '2023-03-27 06:43:43', '2023-03-27 06:43:43'),
(64, 'Mở đầu nữ đế làm chính cung', 'mo-dau-nu-de-lam-chinh-cung', 'comics/6EWv8EvRDv1Meky9M1kVFWv5HLJWRYV0DT4yFBOl.jpg', '<p>Truyện tranh <strong>Mở đầu nữ đế l&agrave;m ch&iacute;nh cung</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Mở đầu nữ đế l&agrave;m ch&iacute;nh cung</strong>.</p>', 'Thuỷ', '0', 1, '1', '1000', '2023-03-27 06:44:50', '2023-03-27 06:44:50'),
(65, 'Bách luyện thành thần', 'bach-luyen-thanh-than', 'comics/nptvWH9kSTGiye51b2WF7WMpoyw6O1UsdpJdhNQ2.jpg', '<p>Truyện tranh <strong>B&aacute;ch luyện th&agrave;nh thần&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>B&aacute;ch luyện th&agrave;nh thần</strong>.</p>', 'Trịnh Thuỷ', '0', 1, NULL, NULL, '2023-03-27 06:45:35', '2023-03-27 06:45:35'),
(66, 'Ta xuyên không mở một sơn trại', 'ta-xuyen-khong-mo-mot-son-trai', 'comics/S68k7edNUscUFNlKSpeZXhhlrYEz2DGVkzjdDI4h.jpg', '<p>Truyện tranh <strong>Ta xuy&ecirc;n kh&ocirc;ng mở một sơn trại&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyệnTa xuy&ecirc;n kh&ocirc;ng mở một sơn trại.</p>', 'thủy', '0', 1, NULL, NULL, '2023-03-27 06:46:15', '2023-03-27 06:46:15'),
(67, 'Đại vương tha mạng', 'dai-vuong-tha-mang', 'comics/7NlRFEJKqRzUumtu89Z25ebnWDyzy7zX1itqXvBN.jpg', '<p>Truyện tranh <strong>Đại vương tha mạng&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Đại vương tha mạng.</strong></p>', 'Trịnh Thuỷ', '0', 1, '1', '10000', '2023-03-27 06:47:19', '2023-03-27 06:47:19'),
(68, 'Toàn chức pháp sư', 'toan-chuc-phap-su', 'comics/0BpSkLcWtwxvYJszCv9qbusHFHLt4c8YUSGeLU1y.jpg', '<p>Truyện tranh <strong>To&agrave;n chức ph&aacute;p sư&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>To&agrave;n chức ph&aacute;p sư.</strong></p>', 'Trịnh Thuỷ', '0', 1, NULL, NULL, '2023-03-27 06:48:14', '2023-03-27 06:48:14'),
(69, 'Nguyên Tôn', 'nguyen-ton', 'comics/XlrPrjz5tti0W8paoiIabwQNbPOTpBsdX7ufJtt6.jpg', '<p>Truyện tranh <strong>Nguy&ecirc;n T&ocirc;n&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Nguy&ecirc;n T&ocirc;n.</strong></p>', 'Trịnh Thuỷ', '0', 1, '1', '2000', '2023-03-27 06:49:08', '2023-03-27 06:49:08'),
(70, 'Ta là tà đế', 'ta-la-ta-de', 'comics/6p4z8You19NaIHSw7Wrh0dw9h9vaM7x0V7FtCIIA.jpg', '<p>Truyện tranh <strong>Ta l&agrave; t&agrave; đế&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Ta l&agrave; t&agrave; đế.</strong></p>', 'Trịnh Thuỷ', '0', 1, '1', '10000', '2023-03-27 06:50:12', '2023-03-27 06:50:12'),
(71, 'Ta làm kiêu hùng tại dị giới', 'ta-lam-kieu-hung-tai-di-gioi', 'comics/la87RiD5KUwE5fGFyNmn6NSWMqFZ7qE2o5HRlE0C.jpg', '<p>Truyện tranh <strong>Ta l&agrave;m ki&ecirc;u h&ugrave;ng tại dị giới&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Ta l&agrave;m ki&ecirc;u h&ugrave;ng tại dị giới.</strong></p>', 'Trịnh Thuỷ', '0', 1, NULL, NULL, '2023-03-27 06:51:05', '2023-03-27 06:51:05'),
(72, 'Ta chỉ muốn an tĩnh chơi game', 'ta-chi-muon-an-tinh-choi-game', 'comics/umcdIEJnO80iPWymDrum91UYLtHHfSLOqeokGwMh.jpg', '<p>Truyện tranh <strong>Ta chỉ muốn an tĩnh chơi game&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Ta chỉ muốn an tĩnh chơi game.</strong></p>', 'Trịnh Thuỷ', '0', 1, NULL, NULL, '2023-03-27 06:56:56', '2023-03-27 06:56:56'),
(73, 'Vừa chơi đã có tài khoản vương giả', 'vua-choi-da-co-tai-khoan-vuong-gia', 'comics/S5Ewmzl6OYykOoxBXhINWqrE3gpNzLhcwYBvgZbM.jpg', '<p>Truyện tranh <strong>Vừa chơi đ&atilde; c&oacute; t&agrave;i khoản vương giả&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Vừa chơi đ&atilde; c&oacute; t&agrave;i khoản vương giả.</strong></p>', 'Xuân', '0', 1, '1', '10000', '2023-03-27 06:58:18', '2023-03-27 06:58:18'),
(74, 'Siêu phàm tiến hoá', 'sieu-pham-tien-hoa', 'comics/hLqa2oAu96tS39wrjZHbUQf1iGJdr0aGRhTnJa9m.jpg', '<p>Truyện tranh <strong>Si&ecirc;u ph&agrave;m tiến ho&aacute;&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Si&ecirc;u ph&agrave;m tiến ho&aacute;.</strong></p>', 'Trịnh Xuân Thuỷ', '0', 1, NULL, NULL, '2023-03-27 06:59:06', '2023-03-27 06:59:06'),
(75, 'Võ công tự động tu luyện tại ma môn', 'vo-cong-tu-dong-tu-luyen-tai-ma-mon', 'comics/qdgwDXGtbQk2TzlMz5Vh37FES8NjGa8Nl8iv0DQy.jpg', '<p>Truyện tranh <strong>V&otilde; c&ocirc;ng tự động tu luyện tại ma m&ocirc;n&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>V&otilde; c&ocirc;ng tự động tu luyện tại ma m&ocirc;n</strong><strong>.</strong></p>', 'Trịnh Thuỷ', '0', 1, '1', '2000', '2023-03-27 07:00:09', '2023-03-27 07:00:09'),
(76, 'Ta ở nhà 100 năm khi ra ngoài đã vô địch', 'ta-o-nha-100-nam-khi-ra-ngoai-da-vo-dich', 'comics/hx6JOhjvs8WYW4cSnFRPo4bCfJVmtsrVnbCj6TyV.jpg', '<p>Truyện tranh <strong>Ta ở nh&agrave; 100 năm khi ra ngo&agrave;i đ&atilde; v&ocirc; địch&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Ta ở nh&agrave; 100 năm khi ra ngo&agrave;i đ&atilde; v&ocirc; địch.</strong></p>', 'Trịnh Thuỷ', '0', 1, '1', '8000', '2023-03-27 07:01:30', '2023-03-27 07:01:30'),
(77, 'Học viện của con trai quỷ vương', 'hoc-vien-cua-con-trai-quy-vuong', 'comics/riaQeASYPp5HDxFm892SWqX0ufXL1J3rlkaACwPY.jpg', '<p>Truyện tranh <strong>Học viện của con trai quỷ vương&nbsp;</strong>được cập nhật nhanh v&agrave; đầy đủ nhất tại XuanThuy. Bạn đọc đừng qu&ecirc;n để lại b&igrave;nh luận v&agrave; chia sẻ, ủng hộ XuanThuy ra c&aacute;c chương mới nhất của truyện <strong>Học viện của con trai quỷ vương.</strong></p>', 'Trịnh Thuỷ', '0', 1, NULL, NULL, '2023-03-27 07:02:45', '2023-04-03 15:16:51');

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
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `comic_id`, `created_at`, `updated_at`) VALUES
(17, 2, 77, '2023-04-07 16:05:44', '2023-04-07 16:05:44'),
(19, 2, 65, '2023-04-08 00:45:35', '2023-04-08 00:45:35'),
(20, 2, 74, '2023-04-08 00:46:42', '2023-04-08 00:46:42'),
(21, 1, 77, '2023-04-08 00:48:21', '2023-04-08 00:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manhua', 'manhhua', 1, NULL, NULL),
(2, 'Manhwa', 'manhwa', 1, NULL, NULL),
(7, 'Cổ đại', 'co-dai', 1, '2023-03-21 23:21:05', '2023-03-21 23:21:05'),
(8, 'Tu tiên', 'tu-tien', 1, '2023-03-21 23:21:16', '2023-03-21 23:21:16'),
(9, 'Hiện đại', 'hien-dai', 1, '2023-03-21 23:21:30', '2023-03-21 23:21:30'),
(10, 'Học đường', 'hoc-duong', 1, '2023-03-21 23:21:39', '2023-03-21 23:21:39'),
(11, 'Drama', 'drama', 1, '2023-03-21 23:21:47', '2023-03-21 23:47:52'),
(12, 'Hành động', 'hanh-dong', 1, '2023-03-21 23:22:03', '2023-04-03 15:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `genre_comics`
--

CREATE TABLE `genre_comics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `comic_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre_comics`
--

INSERT INTO `genre_comics` (`id`, `genre_id`, `comic_id`, `created_at`, `updated_at`) VALUES
(131, 1, 62, NULL, NULL),
(132, 7, 62, NULL, NULL),
(133, 8, 62, NULL, NULL),
(134, 11, 62, NULL, NULL),
(135, 1, 63, NULL, NULL),
(136, 8, 63, NULL, NULL),
(137, 9, 63, NULL, NULL),
(138, 11, 63, NULL, NULL),
(139, 12, 63, NULL, NULL),
(140, 1, 64, NULL, NULL),
(141, 7, 64, NULL, NULL),
(142, 8, 64, NULL, NULL),
(143, 11, 64, NULL, NULL),
(144, 12, 64, NULL, NULL),
(145, 1, 65, NULL, NULL),
(146, 7, 65, NULL, NULL),
(147, 8, 65, NULL, NULL),
(148, 11, 65, NULL, NULL),
(149, 12, 65, NULL, NULL),
(150, 1, 66, NULL, NULL),
(151, 7, 66, NULL, NULL),
(152, 11, 66, NULL, NULL),
(153, 12, 66, NULL, NULL),
(154, 1, 67, NULL, NULL),
(155, 8, 67, NULL, NULL),
(156, 9, 67, NULL, NULL),
(157, 10, 67, NULL, NULL),
(158, 11, 67, NULL, NULL),
(159, 12, 67, NULL, NULL),
(160, 1, 68, NULL, NULL),
(161, 8, 68, NULL, NULL),
(162, 9, 68, NULL, NULL),
(163, 10, 68, NULL, NULL),
(164, 1, 69, NULL, NULL),
(165, 7, 69, NULL, NULL),
(166, 8, 69, NULL, NULL),
(167, 11, 69, NULL, NULL),
(168, 12, 69, NULL, NULL),
(169, 1, 70, NULL, NULL),
(170, 7, 70, NULL, NULL),
(171, 8, 70, NULL, NULL),
(172, 1, 71, NULL, NULL),
(173, 7, 71, NULL, NULL),
(174, 8, 71, NULL, NULL),
(175, 11, 71, NULL, NULL),
(176, 1, 72, NULL, NULL),
(177, 8, 72, NULL, NULL),
(178, 9, 72, NULL, NULL),
(179, 10, 72, NULL, NULL),
(180, 11, 72, NULL, NULL),
(181, 12, 72, NULL, NULL),
(182, 1, 73, NULL, NULL),
(183, 9, 73, NULL, NULL),
(184, 11, 73, NULL, NULL),
(185, 12, 73, NULL, NULL),
(186, 1, 74, NULL, NULL),
(187, 9, 74, NULL, NULL),
(188, 11, 74, NULL, NULL),
(189, 12, 74, NULL, NULL),
(190, 1, 75, NULL, NULL),
(191, 7, 75, NULL, NULL),
(192, 8, 75, NULL, NULL),
(193, 11, 75, NULL, NULL),
(194, 12, 75, NULL, NULL),
(195, 1, 76, NULL, NULL),
(196, 7, 76, NULL, NULL),
(197, 8, 76, NULL, NULL),
(198, 11, 76, NULL, NULL),
(199, 12, 76, NULL, NULL),
(200, 2, 77, NULL, NULL),
(201, 9, 77, NULL, NULL),
(202, 10, 77, NULL, NULL),
(203, 11, 77, NULL, NULL),
(204, 12, 77, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comic_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_20_141217_create_table_roles', 1),
(6, '2023_03_20_141353_create_table_genre', 1),
(7, '2023_03_21_160935_create_table_genre', 2),
(8, '2023_03_22_094724_create_table_comics', 3),
(13, '2023_03_22_095214_create_table_genre_comic', 4),
(14, '2023_03_22_100820_create_table_like', 4),
(19, '2023_03_24_015424_create_table_chapter', 5),
(21, '2023_03_24_055457_create_table_chapters', 6),
(22, '2023_03_24_055532_create_table_chapter_images', 6),
(23, '2023_03_24_150022_create_comic_genre_table', 7),
(24, '2023_04_06_232736_create_table_chapter_user', 8),
(25, '2023_04_07_204446_create_follow_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', NULL, NULL),
(2, 'Người đăng truyện', NULL, NULL),
(3, 'Khách hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coins` int(10) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `email_verified_at`, `password`, `number_phone`, `gender`, `coins`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 1, NULL, '$2y$10$EFwWCCuriA2ps5lKp3XTQ.RASc9GUYzuwm1T06vyEQdZeBsmouJ12', NULL, NULL, 99999310, NULL, NULL, '2023-04-08 01:02:29'),
(2, 'Thuỷ', 'thuytxph26691@fpt.edu.vn', 3, NULL, '$2y$10$EFwWCCuriA2ps5lKp3XTQ.RASc9GUYzuwm1T06vyEQdZeBsmouJ12', NULL, NULL, 0, NULL, NULL, '2023-04-07 00:46:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `chapters_slug_unique` (`slug`),
  ADD KEY `chapters_comic_id_foreign` (`comic_id`);

--
-- Indexes for table `chapter_images`
--
ALTER TABLE `chapter_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapter_images_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `chapter_user`
--
ALTER TABLE `chapter_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comics_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follows_comic_id_foreign` (`comic_id`),
  ADD KEY `follows_user_id_foreign` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genres_slug_unique` (`slug`);

--
-- Indexes for table `genre_comics`
--
ALTER TABLE `genre_comics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_comics_genre_id_foreign` (`genre_id`),
  ADD KEY `genre_comics_comic_id_foreign` (`comic_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_comic_id_foreign` (`comic_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_roles` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `chapter_images`
--
ALTER TABLE `chapter_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `chapter_user`
--
ALTER TABLE `chapter_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comics`
--
ALTER TABLE `comics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genre_comics`
--
ALTER TABLE `genre_comics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_comic_id_foreign` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chapter_images`
--
ALTER TABLE `chapter_images`
  ADD CONSTRAINT `chapter_images_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_comic_id_foreign` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `genre_comics`
--
ALTER TABLE `genre_comics`
  ADD CONSTRAINT `genre_comics_comic_id_foreign` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `genre_comics_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_comic_id_foreign` FOREIGN KEY (`comic_id`) REFERENCES `comics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
