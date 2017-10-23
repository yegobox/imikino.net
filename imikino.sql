-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 04:35 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imikino`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `phone`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'Igor Kwizera', 'barthos@gmail.com', '0784456890', 'Icyuki hano ni hatari hahahahahah', 1, 16, '2017-10-08 06:23:05', '2017-10-19 10:51:43'),
(2, 'Jay Lee', 'nigorjeanluc@gmail.com', '0784456890', 'Umu papa wumulazy kbs. Umu papa wumulazy kbs. Umu papa wumulazy kbs. Umu papa wumulazy kbs. Umu papa wumulazy kbs. Umu papa wumulazy kbs. Umu papa wumulazy kbs.', 1, 16, '2017-10-10 18:04:43', '2017-10-19 10:56:16'),
(3, 'Kwizera', 'imikino4@gmail.com', '0789330069', 'bimeze bite basaza?', 1, 23, '2017-10-15 07:23:41', '2017-10-19 10:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` int(11) NOT NULL,
  `readed` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `counter`, `readed`, `created_at`, `updated_at`) VALUES
(1, 'Jean-Luc', 'jean@gmail.com', '0789660036', '<p>Jay Mc The number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one.</p>', 1, 1, '2017-09-28 12:45:36', '2017-09-28 12:45:36'),
(2, 'Jean-Luc', 'jean@gmail.com', '0789660036', '<p>Jay Mc The number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one. Number one.</p>', 1, 1, '2017-09-28 12:47:16', '2017-09-28 12:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `journalists`
--

CREATE TABLE `journalists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journalists`
--

INSERT INTO `journalists` (`id`, `name`, `phone`, `email`, `job_title`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Robert', '0789666003', 'robert@gmail.com', 'Reporter', 'kingrob', NULL, '2017-10-14 07:16:37', '2017-10-14 07:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Rwanda', '2017-09-30 09:06:54', '2017-09-30 09:06:54'),
(3, 'Africa', '2017-09-30 10:27:56', '2017-09-30 10:27:56'),
(4, 'England', '2017-10-01 04:00:09', '2017-10-01 04:00:09'),
(5, 'France', '2017-10-01 04:00:22', '2017-10-01 04:00:22'),
(6, 'Spain', '2017-10-01 04:23:48', '2017-10-01 04:23:48'),
(7, 'Italy', '2017-10-01 04:24:03', '2017-10-01 04:24:03'),
(8, 'Germany', '2017-10-01 04:24:24', '2017-10-01 04:24:24'),
(9, 'America', '2017-10-01 04:24:45', '2017-10-01 04:24:45'),
(10, 'Asia', '2017-10-01 04:24:59', '2017-10-01 04:24:59'),
(11, 'Other', '2017-10-01 04:25:11', '2017-10-01 04:25:11'),
(12, 'Egypt', '2017-10-12 08:53:54', '2017-10-12 08:53:54');

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
(1, '2017_09_28_141843_create_contacts_table', 1),
(2, '2017_09_30_065815_create_posts_table', 2),
(3, '2017_09_30_094552_add_sport_id_to_posts', 3),
(4, '2017_09_30_103008_add_location_id_to_posts', 4),
(5, '2017_09_30_103349_add_location_id_to_posts', 5),
(6, '2017_09_30_104744_create_locations_table', 6),
(7, '2017_09_30_104927_create_sports_table', 7),
(8, '2017_10_01_061542_add_name_to_sports', 8),
(9, '2017_10_01_061732_add_name_to_sports', 9),
(10, '2017_10_02_152527_create_tags_table', 10),
(11, '2017_10_02_153902_create_post_tag_table', 11),
(12, '2017_10_05_075601_add_image_col_to_posts', 12),
(13, '2017_10_08_065908_create_comments_table', 13),
(14, '2017_10_08_073458_add_phone_to_comments_table', 14),
(15, '2017_10_09_111144_create_post_sport_table', 15),
(16, '2017_10_09_191542_add_views_col_to_posts_table', 16),
(17, '2017_10_15_100721_add_author_col_to_posts_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `author`, `image`, `sport_id`, `location_id`, `created_at`, `updated_at`, `views`) VALUES
(1, 'Another one', '<p>I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one.</p>', 'wine-up-wine-down-body1', 'Kwizera Yamini', '1507209508.jpg', 1, 2, '2017-09-30 06:02:12', '2017-10-15 08:25:20', '20'),
(2, 'Another one', '\r\n<p>I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one. I''m the only one.</p>\r\n', 'wine-up-wine-down-body2', 'Kwizera Yamini', '1507209467.JPG', 1, 2, '2017-09-30 06:03:47', '2017-10-15 08:25:53', '38'),
(3, 'Like Pato', '<p>Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings. Rankings.</p>', 'wine-up-wine-down-body3', 'Kwizera Yamini', '1507209348.jpg', 1, 2, '2017-09-30 09:04:23', '2017-10-15 08:25:01', '22'),
(4, 'NBA mu rwanda', '\r\n<p>NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda. NBA mu rwanda.</p>\r\n', 'wine-up-wine-down-body4', 'Kwizera Yamini', '1507209292.jpg', 3, 4, '2017-10-01 04:55:05', '2017-10-15 08:24:39', '18'),
(5, 'Ipi', '\r\n<p><strong>jhdjfhjdjfjdf</strong></p>\r\n<h1><em>hfghdfghfghd</em></h1>\r\n', 'wine-up-wine-down-body5', 'Kwizera Yamini', '1507191669.jpg', 2, 4, '2017-10-03 03:26:58', '2017-10-15 08:24:17', '19'),
(7, 'Igor the Master', '<p>Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. </p>', 'wine-up-wine-down-body6', 'Kwizera Yamini', '1507205560.jpg', 1, 9, '2017-10-05 02:27:51', '2017-10-15 08:23:29', '18'),
(8, 'Igor the Master', '<p>Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. </p>', 'wine-up-wine-down-body7', 'Kwizera Yamini', '1507205489.jpg', 1, 9, '2017-10-05 02:27:59', '2017-10-15 08:23:50', '18'),
(9, 'Igor the Master', '\r\n<p>Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. </p>\r\n', 'wine-up-wine-down-body8', 'Kwizera Yamini', '1507205372.jpg', 1, 9, '2017-10-05 02:32:33', '2017-10-15 08:23:10', '18'),
(10, 'Igor the Master', '\r\n<p>Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. </p>\r\n', 'wine-up-wine-down-body9', 'Kwizera Yamini', '1507201199.jpg', 1, 3, '2017-10-05 02:37:00', '2017-10-15 08:22:49', '19'),
(14, 'Many strides have been made in advancing IoT technology in industrial applications Many strides have been made in advancing IoT technology in industrial applications', '\r\n<p style="text-align:justify;">A jamming attacker (also known as jammer) attempts to emit a radio signal for interfering with</p>\r\n<p style="text-align:justify;">the desired communications between legitimate CUs. As shown in Fig. 1, after identifying an</p>\r\n<p style="text-align:justify;">available spectrum opportunity in the observation and reasoning stages, a legitimate CU would</p>\r\n<p style="text-align:justify;">be scheduled to transmit its signal to its intended destination over the detected spectrum hole.</p>\r\n<p style="text-align:justify;">Due to the broadcast nature of radio propagation, a jammer can easily disrupt the legitimate</p>\r\n<p style="text-align:justify;">transmissions between CUs by sending a radio interference with sufficiently high power. If a</p>\r\n<p style="text-align:justify;">jammer is present to interfere with the cognitive transmission, the received signal strength (RSS)</p>\r\n<p style="text-align:justify;">and bit error rate (BER) experienced at the desired destination would significantly increase,</p>\r\n<p style="text-align:justify;">which can thus be considered as appropriate indicators for detecting the jamming attack. For</p>\r\n<p style="text-align:justify;">example, an unusually high RSS (or an excessive BER) may indicate the presence of a jammer.</p>\r\n<p style="text-align:justify;">Additionally, spread spectrum is considered as an effective means of defending against jamming</p>\r\n<p style="text-align:justify;">attacks. The main spread spectrum techniques include the frequency hopping spread spectrum</p>\r\n<p style="text-align:justify;">(FHSS) and direct-sequence spread spectrum (DSSS). A jamming attacker (also known as jammer) attempts to emit a radio signal for interfering with</p>\r\n<p style="text-align:justify;">the desired communications between legitimate CUs. As shown in Fig. 1, after identifying an</p>\r\n<p style="text-align:justify;">available spectrum opportunity in the observation and reasoning stages, a legitimate CU would</p>\r\n<p style="text-align:justify;">be scheduled to transmit its signal to its intended destination over the detected spectrum hole.</p>\r\n<p style="text-align:justify;">Due to the broadcast nature of radio propagation, a jammer can easily disrupt the legitimate</p>\r\n<p style="text-align:justify;">transmissions between CUs by sending a radio interference with sufficiently high power. If a</p>\r\n<p style="text-align:justify;">jammer is present to interfere with the cognitive transmission, the received signal strength (RSS)</p>\r\n<p style="text-align:justify;">and bit error rate (BER) experienced at the desired destination would significantly increase,</p>\r\n<p style="text-align:justify;">which can thus be considered as appropriate indicators for detecting the jamming attack. For</p>\r\n<p style="text-align:justify;">example, an unusually high RSS (or an excessive BER) may indicate the presence of a jammer.</p>\r\n<p style="text-align:justify;">Additionally, spread spectrum is considered as an effective means of defending against jamming</p>\r\n<p style="text-align:justify;">attacks. The main spread spectrum techniques include the frequency hopping spread spectrum</p>\r\n<p style="text-align:justify;">(FHSS) and direct-sequence spread spectrum (DSSS). A jamming attacker (also known as jammer) attempts to emit a radio signal for interfering with</p>\r\n<p style="text-align:justify;">the desired communications between legitimate CUs. As shown in Fig. 1, after identifying an</p>\r\n<p style="text-align:justify;">available spectrum opportunity in the observation and reasoning stages, a legitimate CU would</p>\r\n<p style="text-align:justify;">be scheduled to transmit its signal to its intended destination over the detected spectrum hole.</p>\r\n<p style="text-align:justify;">Due to the broadcast nature of radio propagation, a jammer can easily disrupt the legitimate</p>\r\n<p style="text-align:justify;">transmissions between CUs by sending a radio interference with sufficiently high power. If a</p>\r\n<p style="text-align:justify;">jammer is present to interfere with the cognitive transmission, the received signal strength (RSS)</p>\r\n<p style="text-align:justify;">and bit error rate (BER) experienced at the desired destination would significantly increase,</p>\r\n<p style="text-align:justify;">which can thus be considered as appropriate indicators for detecting the jamming attack. For</p>\r\n<p style="text-align:justify;">example, an unusually high RSS (or an excessive BER) may indicate the presence of a jammer.</p>\r\n<p style="text-align:justify;">Additionally, spread spectrum is considered as an effective means of defending against jamming</p>\r\n<p style="text-align:justify;">attacks. The main spread spectrum techniques include the frequency hopping spread spectrum</p>\r\n<p style="text-align:justify;">(FHSS) and direct-sequence spread spectrum (DSSS). A jamming attacker (also known as jammer) attempts to emit a radio signal for interfering with</p>\r\n<p style="text-align:justify;">the desired communications between legitimate CUs. As shown in Fig. 1, after identifying an</p>\r\n<p style="text-align:justify;">available spectrum opportunity in the observation and reasoning stages, a legitimate CU would</p>\r\n<p style="text-align:justify;">be scheduled to transmit its signal to its intended destination over the detected spectrum hole.</p>\r\n<p style="text-align:justify;">Due to the broadcast nature of radio propagation, a jammer can easily disrupt the legitimate</p>\r\n<p style="text-align:justify;">transmissions between CUs by sending a radio interference with sufficiently high power. If a</p>\r\n<p style="text-align:justify;">jammer is present to interfere with the cognitive transmission, the received signal strength (RSS)</p>\r\n<p style="text-align:justify;">and bit error rate (BER) experienced at the desired destination would significantly increase,</p>\r\n<p style="text-align:justify;">which can thus be considered as appropriate indicators for detecting the jamming attack. For</p>\r\n<p style="text-align:justify;">example, an unusually high RSS (or an excessive BER) may indicate the presence of a jammer.</p>\r\n<p style="text-align:justify;">Additionally, spread spectrum is considered as an effective means of defending against jamming</p>\r\n<p style="text-align:justify;">attacks. The main spread spectrum techniques include the frequency hopping spread spectrum</p>\r\n<p style="text-align:justify;">(FHSS) and direct-sequence spread spectrum (DSSS). A jamming attacker (also known as jammer) attempts to emit a radio signal for interfering with</p>\r\n<p style="text-align:justify;">the desired communications between legitimate CUs. As shown in Fig. 1, after identifying an</p>\r\n<p style="text-align:justify;">available spectrum opportunity in the observation and reasoning stages, a legitimate CU would</p>\r\n<p style="text-align:justify;">be scheduled to transmit its signal to its intended destination over the detected spectrum hole.</p>\r\n<p style="text-align:justify;">Due to the broadcast nature of radio propagation, a jammer can easily disrupt the legitimate</p>\r\n<p style="text-align:justify;">transmissions between CUs by sending a radio interference with sufficiently high power. If a</p>\r\n<p style="text-align:justify;">jammer is present to interfere with the cognitive transmission, the received signal strength (RSS)</p>\r\n<p style="text-align:justify;">and bit error rate (BER) experienced at the desired destination would significantly increase,</p>\r\n<p style="text-align:justify;">which can thus be considered as appropriate indicators for detecting the jamming attack. For</p>\r\n<p style="text-align:justify;">example, an unusually high RSS (or an excessive BER) may indicate the presence of a jammer.</p>\r\n<p style="text-align:justify;">Additionally, spread spectrum is considered as an effective means of defending against jamming</p>\r\n<p style="text-align:justify;">attacks. The main spread spectrum techniques include the frequency hopping spread spectrum</p>\r\n<p style="text-align:justify;">(FHSS) and direct-sequence spread spectrum (DSSS). </p>\r\n', 'wine-up-wine-down-body10', 'Kwizera Yamini', '1507196082.JPG', 1, 4, '2017-10-05 05:58:59', '2017-10-15 08:22:24', '62'),
(15, 'Nigga''s been hating on me', '<p>Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. Abana biba batahe. </p>', 'wine-up-wine-down-body11', NULL, '1507208417.jpg', 1, 2, '2017-10-05 11:00:18', '2017-10-05 11:00:18', '21'),
(16, 'Wine your body', '\r\n<p>1.Amafoto agomba gutandukana aya mobile akaza ari aya mobile fresh n''aya machine ukayatubura.</p>\r\n<p>2.comments ziloadinge  inshya gusa kwa admin kandi zibe displayed munkuru mugihe admin yazemeye.</p>\r\n<p>3.Edit y''inkuru ntgo imeze fresh</p>\r\n<p>4.Share ya social media zose ntgo imeze neza</p>\r\n<p>5.Follow us on different social medias ntgo zarangiye.</p>\r\n<p>6.Ads kuri mobile ni ukuzivanamo.</p>\r\n', 'wine-up-wine-down-body12', 'Kwizera Yamini', '1507445149.jpg', 1, 5, '2017-10-08 04:45:50', '2017-10-15 08:21:39', '41'),
(17, 'Bend down pause', '<p>1.Amafoto agomba gutandukana aya mobile akaza ari aya mobile fresh n''aya machine ukayatubura.</p>\r\n<p>2.comments ziloadinge  inshya gusa kwa admin kandi zibe displayed munkuru mugihe admin yazemeye.</p>\r\n<p>3.Edit y''inkuru ntgo imeze fresh</p>\r\n<p>4.Share ya social media zose ntgo imeze neza</p>\r\n<p>5.Follow us on different social medias ntgo zarangiye.</p>\r\n<p>6.Ads kuri mobile ni ukuzivanamo.</p>', 'wine-up-wine-down-body13', 'Kwizera Yamini', '1507467280.JPG', 3, 7, '2017-10-08 04:49:00', '2017-10-15 08:21:18', '23'),
(18, 'Swimming Pool Swimming Pool Swimming Pool Swimming Pool Swimming Pool Swimming Pool Swimming Pool.', '<p>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah </p>\r\n<p> </p>', 'wine-up-wine-down-body14', 'Kwizera Yamini', '1507540475.JPG', 5, 11, '2017-10-08 10:58:21', '2017-10-15 08:20:58', '26'),
(20, 'Uko Rugby mu Rwanda ihagaze', '\r\n<p style="text-align:justify;">Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. Ubindi ubundi. </p>\r\n', 'wine-up-wine-down-body15', 'Kwizera Yamini', '1507539929.jpg', 4, 2, '2017-10-09 07:05:30', '2017-10-15 08:20:41', '21'),
(21, 'Cricket', '\r\n<p style="text-align:justify;">Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. </p>\r\n', 'wine-up-wine-down-body16', 'Kwizera Yamini', '1507542481.jpg', 7, 2, '2017-10-09 07:48:02', '2017-10-15 08:20:23', '23'),
(22, 'Cycling', '\r\n<p style="text-align:justify;">Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. </p>\r\n', 'wine-up-wine-down-body17', 'Kwizera Yamini', '1507542538.jpg', 8, 2, '2017-10-09 07:48:59', '2017-10-15 08:20:03', '18'),
(23, 'Athletics', '<p style="text-align:justify;">Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. </p>', 'wine-up-wine-down-body18', 'Kwizera Yamini', '1507542676.jpg', 9, 2, '2017-10-09 07:51:17', '2017-10-15 08:19:46', '28'),
(24, 'Swimming', '\r\n<p style="text-align:justify;">Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. Jay is genius. </p>\r\n', 'wine-up-wine-down-body19', 'Kwizera Yamini', '1507548544.JPG', 6, 2, '2017-10-09 07:53:44', '2017-10-15 08:19:28', '30'),
(25, 'jsghjdfshdf', '\r\n<p>Happy day. New day. HaHappy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day. Happy day. New day.</p>\r\n', 'dhfdgfhgdgfhgf', 'Kwizera Yamini', '1508062270.jpg', 1, 2, '2017-10-15 08:11:10', '2017-10-15 08:19:13', '1'),
(26, 'hkjhdkhdfjkdf', '<p>gfhfhjcbnczxvzcbnzcvbxcv</p>', 'vfgfghsfhdfdghfs', 'Kwizera Yamini', '1508063738.JPG', 1, 2, '2017-10-15 08:35:39', '2017-10-15 08:35:39', '4');

-- --------------------------------------------------------

--
-- Table structure for table `post_sport`
--

CREATE TABLE `post_sport` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `sport_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(4, 5, 3),
(5, 14, 3),
(6, 14, 2),
(7, 14, 4),
(8, 9, 4),
(9, 8, 3),
(10, 8, 4),
(11, 15, 3),
(12, 4, 3),
(13, 2, 2),
(14, 16, 4),
(15, 17, 2),
(16, 17, 3),
(17, 17, 4),
(18, 18, 5),
(22, 20, 9),
(23, 21, 7),
(24, 22, 7),
(25, 25, 7),
(26, 26, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Football', '2017-10-01 04:18:51', '2017-10-01 04:18:51'),
(2, 'Volleyball', '2017-10-01 04:19:18', '2017-10-01 04:19:18'),
(3, 'Basketball', '2017-10-01 04:19:28', '2017-10-01 04:19:28'),
(4, 'Rugby', '2017-10-01 04:25:42', '2017-10-01 04:25:42'),
(5, 'Handball', '2017-10-01 04:25:57', '2017-10-01 04:25:57'),
(6, 'Swimming', '2017-10-01 04:26:07', '2017-10-01 04:26:07'),
(7, 'Cricket', '2017-10-01 04:26:19', '2017-10-01 04:26:19'),
(8, 'Cycling', '2017-10-01 04:26:31', '2017-10-01 04:26:31'),
(9, 'Athletic sports', '2017-10-01 04:26:55', '2017-10-01 04:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Premier League', '2017-10-03 02:56:34', '2017-10-08 10:59:57'),
(3, 'Ligue 1', '2017-10-03 03:00:07', '2017-10-05 06:13:25'),
(4, 'FIFA', '2017-10-05 04:14:03', '2017-10-05 05:43:29'),
(5, 'FA Cup', '2017-10-08 10:55:45', '2017-10-08 10:55:45'),
(6, 'Man.Utd', '2017-10-08 11:29:10', '2017-10-15 06:27:45'),
(7, 'Rayon sports', '2017-10-08 11:32:50', '2017-10-08 11:32:50'),
(8, 'apr fc', '2017-10-08 11:32:59', '2017-10-08 11:32:59'),
(9, 'Team Rwanda Rugby', '2017-10-09 07:02:13', '2017-10-09 07:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nigor Jean-Luc', 'nigorjeanluc@gmail.com', '$2y$10$VHU/nxjQ3AwrClgIWqJGJ..papxnQfq6GmQ7kXlifzFXa6P0hSa1m', 'QIoftHCPYfJiKHrhzYGDtwCOTMqOKQk3Vga7AUaAujqqG5TaAbJUQOd8S6Kh', '2017-09-29 07:48:14', '2017-09-29 07:48:14'),
(2, 'Kwizera Yamini', 'erceramurcus@gmail.com', '$2y$10$au5f/lAbiyPD.s45EVB2Be2JfqTucvOIE7OX6kIjxYWoR5lEoPSe.', 'wSK7OYo0DVP1hV89icXs4JG0I4ADMZ2byhCIyBXopGtsyg6L6OHK70J8uXcH', '2017-10-15 07:54:15', '2017-10-15 07:54:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journalists`
--
ALTER TABLE `journalists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_sport`
--
ALTER TABLE `post_sport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_sport_post_id_foreign` (`post_id`),
  ADD KEY `post_sport_sport_id_foreign` (`sport_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `journalists`
--
ALTER TABLE `journalists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `post_sport`
--
ALTER TABLE `post_sport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_sport`
--
ALTER TABLE `post_sport`
  ADD CONSTRAINT `post_sport_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_sport_sport_id_foreign` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
