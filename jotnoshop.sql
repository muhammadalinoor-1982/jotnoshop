-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 12:48 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jotnoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `image`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(4, 'Jotno Feed', 'active', '20.12.2022_1671519835_3567_JOTNO_BRAND_jotno00.png', 'Aupu', NULL, '2022-12-20 01:03:55', '2022-12-20 01:03:55'),
(5, 'Jotno Food', 'inactive', '24.12.2022_1671853263_2129_JOTNO_BRAND_90x90.png', 'Aupu', NULL, '2022-12-23 21:41:03', '2022-12-23 21:41:03'),
(6, 'Microflash', 'active', NULL, 'Aupu', NULL, '2022-12-23 21:41:51', '2022-12-23 21:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `status`, `image`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(6, 'Jotno Feed', NULL, 'active', NULL, 'Aupu', NULL, '2022-12-26 04:25:47', '2022-12-26 04:25:47'),
(8, 'Fish Feed', 'Jotno Feed', 'active', NULL, 'Aupu', NULL, '2022-12-26 04:28:19', '2022-12-26 04:28:19'),
(9, 'Jotno Food', 'Select Parent', 'active', NULL, 'Aupu', NULL, '2022-12-26 04:29:34', '2022-12-26 04:29:34'),
(10, 'Turmeric powder', 'Jotno Food', 'active', NULL, 'Aupu', NULL, '2022-12-26 05:00:54', '2022-12-26 05:00:54'),
(11, 'Cattle Feed', 'Jotno Feed', 'active', NULL, 'Aupu', 'Aupu', '2022-12-26 05:02:00', '2022-12-26 05:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(1, 'Green', 'active', 'Aupu', NULL, '2022-12-23 21:34:14', '2022-12-23 21:34:14'),
(2, 'Red', 'inactive', 'Aupu', NULL, '2022-12-23 21:34:29', '2022-12-23 21:34:29'),
(3, 'Blue', 'active', 'Aupu', NULL, '2022-12-23 21:34:41', '2022-12-23 21:34:41'),
(4, 'Yellow', 'active', 'Aupu', NULL, '2022-12-23 21:34:55', '2022-12-23 21:34:55'),
(5, 'Orrange', 'inactive', 'Aupu', NULL, '2022-12-23 21:35:11', '2022-12-23 21:35:11'),
(6, 'White', 'active', 'Aupu', NULL, '2022-12-23 21:35:40', '2022-12-23 21:35:40'),
(7, 'Black', 'inactive', 'Aupu', NULL, '2022-12-23 21:35:54', '2022-12-23 21:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `main_carousels`
--

CREATE TABLE `main_carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event` enum('special','social','cultural','occasional','festival') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_carousels`
--

INSERT INTO `main_carousels` (`id`, `name`, `tag`, `heading`, `description`, `link`, `image`, `event`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(1, 'TEST', 'TEST', 'TEST', '<p>TEST<br></p>', 'TEST', '24.01.2023_1674534974_6330_JOTNO_CAROUSEL_long.png', 'cultural', 'active', 'Aupu', 'Aupu', '2023-01-23 00:09:25', '2023-01-23 22:36:14'),
(2, 'www', 'www', 'www', '<p>www<br></p>', 'www', '24.01.2023_1674535258_1693_JOTNO_CAROUSEL_jar.png', 'social', 'active', 'Aupu', 'Aupu', '2023-01-23 21:34:20', '2023-01-23 22:40:58'),
(3, 'ttt', 'ttt', 'ttt', '<p>ttt<br></p>', 'ttt', '24.01.2023_1674534783_8574_JOTNO_CAROUSEL_moshla.png', 'cultural', 'active', 'Aupu', 'Aupu', '2023-01-23 21:55:37', '2023-01-23 22:33:03'),
(4, 'bbbb', 'bbbb', 'bbbb', '<p>bbbb<br></p>', 'bbbb', '24.01.2023_1674534594_9353_JOTNO_CAROUSEL_re_form_gray.png', 'social', 'active', 'Aupu', 'Aupu', '2023-01-23 21:56:05', '2023-01-23 22:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_12_19_103227_create_categories_table', 2),
(5, '2022_12_20_044553_create_brands_table', 3),
(6, '2022_12_21_051048_create_sizes_table', 4),
(7, '2022_12_21_070356_create_colors_table', 5),
(8, '2022_12_22_040759_create_weights_table', 6),
(9, '2023_01_03_041922_create_products_table', 7),
(10, '2023_01_03_042025_create_product_sizes_table', 7),
(11, '2023_01_03_042051_create_product_colors_table', 7),
(12, '2023_01_03_042142_create_product_weights_table', 7),
(13, '2023_01_03_042224_create_product_related_images_table', 7),
(14, '2023_01_08_093043_create_product_related_images_table', 8),
(15, '2023_01_23_041709_create_main_carousels_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_id` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `disc_price` double DEFAULT NULL,
  `category_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `overview` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `custom_id`, `name`, `slug`, `quantity`, `price`, `disc_price`, `category_id`, `brand_id`, `description`, `overview`, `image`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(2, 'JNSP-001', 'Coriander Powder', 'coriander-powder', NULL, 120, 110, 'Jotno Food', 'Jotno Food', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '24.01.2023_1674537387_5091_JOTNO_PRODUCT_Coriander Powder.png', 'active', 'Aupu', 'Aupu', '2023-01-18 03:38:34', '2023-01-23 23:17:01'),
(3, 'JNSP-002', 'Chili Powder', 'chili-powder', NULL, 250, NULL, 'Jotno Food', 'Jotno Food', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,<br></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '24.01.2023_1674537308_637_JOTNO_PRODUCT_Chili Powder.png', 'active', 'Aupu', 'Aupu', '2023-01-18 03:41:49', '2023-01-23 23:15:08'),
(4, 'JNSP-003', 'Cumin Powder', 'cumin-powder', 111, 150, 190, 'Jotno Food', 'Microflash', '<p>rwherhh</p>', '<p>frwetrhyrh</p>', '24.01.2023_1674537630_1405_JOTNO_PRODUCT_Cumin Powder.png', 'active', 'Aupu', 'Aupu', '2023-01-23 23:20:30', '2023-01-24 02:06:28'),
(5, 'JNSP-004', 'Turmeric Powder', 'turmeric-powder', 444, 118, NULL, 'Jotno Food', 'Microflash', '<p>rrrrrrrrrrrrrrrrr</p>', '<p>rrrrrrrrrrrrrrrrrrrrrrrr</p>', '24.01.2023_1674549278_6265_JOTNO_PRODUCT_Turmeric Powder.png', 'active', 'Aupu', NULL, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(6, 'JNSP-005', 'ssssssss', 'ssssssss', 222, 210, 200, 'Fish Feed', 'Jotno Feed', '<p>sssssssssssssssssssssssss</p>', '<p>sssssssssssssssssssssss</p>', '24.01.2023_1674549484_330_JOTNO_PRODUCT_Chili Powder.png', 'active', 'Aupu', 'Aupu', '2023-01-24 02:38:04', '2023-01-25 22:33:13'),
(7, 'JNSP-006', 'ggggggggg', 'ggggggggg', 10, 800, 670, 'Fish Feed', 'Microflash', '<p>ggggggggg<br></p>', '<p>ggggggggg<br></p>', '24.01.2023_1674549615_3107_JOTNO_PRODUCT_Turmeric Powder.png', 'active', 'Aupu', 'Aupu', '2023-01-24 02:40:15', '2023-01-25 22:32:51'),
(8, 'JNSP-007', 'ghsrtjrysuet', 'ghsrtjrysuet', 9, 420, NULL, 'Fish Feed', 'Jotno Feed', '<p>Cattle Feed<br></p>', '<p>Cattle Feed<br></p>', '24.01.2023_1674557301_7001_JOTNO_PRODUCT_Cattle Feed.png', 'active', 'Aupu', 'Aupu', '2023-01-24 04:48:21', '2023-01-25 05:40:39'),
(9, 'JNSP-008', 'Fish Feed', 'fish-feed', 66, 98, 45, 'Fish Feed', 'Jotno Feed', '<p>Fish Feed<br></p>', '<p>Fish Feed<br></p>', '24.01.2023_1674557548_8464_JOTNO_PRODUCT_Fish Feed.png', 'active', 'Aupu', NULL, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(10, 'JNSP-009', 'dgdsgsga', 'dgdsgsga', 80, 55, 20, 'Fish Feed', 'Jotno Feed', '<p>sgsgagg</p>', '<p>sgehrhyhr</p>', '24.01.2023_1674557655_556_JOTNO_PRODUCT_Cattle Feed.png', 'active', 'Aupu', NULL, '2023-01-24 04:54:15', '2023-01-24 04:54:15'),
(11, 'JNSP-010', 'fgsdgadsga', 'fgsdgadsga', 65, 54, 78, 'Cattle Feed', 'Jotno Feed', '<p>fdgsdgag</p>', '<p>aggwgwaegrr</p>', '24.01.2023_1674557878_810_JOTNO_PRODUCT_Fish Feed.png', 'active', 'Aupu', NULL, '2023-01-24 04:57:58', '2023-01-24 04:57:58'),
(12, 'JNSP-011', 'dsgfagasgsa', 'dsgfagasgsa', NULL, 54, NULL, 'Jotno Feed', 'Jotno Feed', NULL, NULL, '24.01.2023_1674558007_3503_JOTNO_PRODUCT_Cattle Feed.png', 'active', 'Aupu', NULL, '2023-01-24 05:00:07', '2023-01-24 05:00:07'),
(13, 'JNSP-012', 'rghrhstjrjs', 'rghrhstjrjs', NULL, 56, NULL, 'Cattle Feed', 'Jotno Feed', NULL, NULL, '24.01.2023_1674558101_8317_JOTNO_PRODUCT_Cattle Feed.png', 'active', 'Aupu', NULL, '2023-01-24 05:01:41', '2023-01-24 05:01:41'),
(14, 'JNSP-013', 'fffffff', 'fffffff', NULL, 150, NULL, 'Cattle Feed', 'Jotno Feed', '<p>fffffff<br></p>', '<p>fffffff<br></p>', '25.01.2023_1674619032_2571_JOTNO_PRODUCT_Moshur Daal.png', 'active', 'Aupu', NULL, '2023-01-24 21:57:12', '2023-01-24 21:57:12'),
(15, 'JNSP-014', 'hgksudbjgvk', 'hgksudbjgvk', NULL, 158, NULL, 'Cattle Feed', 'Jotno Food', '<p>hgksudbjgvk<br></p>', '<p>hgksudbjgvk<br></p>', '25.01.2023_1674619277_9174_JOTNO_PRODUCT_Brown Rice.png', 'active', 'Aupu', NULL, '2023-01-24 22:01:17', '2023-01-24 22:01:17'),
(16, 'JNSP-015', 'hysedhedhed', 'hysedhedhed', NULL, 87, NULL, 'Jotno Feed', 'Jotno Food', NULL, NULL, '25.01.2023_1674619365_1077_JOTNO_PRODUCT_Ata.png', 'active', 'Aupu', 'Aupu', '2023-01-24 22:02:45', '2023-01-25 22:31:11'),
(17, 'JNSP-016', 'hhsdhahd', 'hhsdhahd', NULL, 785, NULL, 'Jotno Feed', 'Jotno Food', NULL, NULL, '25.01.2023_1674619415_8980_JOTNO_PRODUCT_Chal.png', 'active', 'Aupu', 'Aupu', '2023-01-24 22:03:35', '2023-01-25 22:30:48'),
(18, 'JNSP-017', 'dzhdndg', 'dzhdndg', NULL, 65, NULL, 'Jotno Feed', 'Jotno Feed', NULL, NULL, '25.01.2023_1674619483_137_JOTNO_PRODUCT_Chal.png', 'active', 'Aupu', 'Aupu', '2023-01-24 22:04:43', '2023-01-25 22:30:12'),
(19, 'JNSP-018', 'hsdhha', 'hsdhha', NULL, 56, NULL, 'Jotno Feed', 'Jotno Feed', NULL, NULL, '25.01.2023_1674619517_7615_JOTNO_PRODUCT_Ghee.png', 'active', 'Aupu', 'Aupu', '2023-01-24 22:05:17', '2023-01-25 22:29:07'),
(20, 'JNSP-019', 'hdshsds', 'hdshsds', NULL, 458, 350, 'Cattle Feed', 'Jotno Feed', NULL, NULL, '26.01.2023_1674707720_8044_JOTNO_PRODUCT_Moshur Daal.png', 'active', 'Aupu', 'Aupu', '2023-01-25 22:35:20', '2023-01-25 22:36:11'),
(21, 'JNSP-020', 'Chili', 'chili', NULL, 85, 30, 'Jotno Food', 'Jotno Food', NULL, NULL, '26.01.2023_1674707839_416_JOTNO_PRODUCT_Chili Powder.png', 'active', 'Aupu', 'Aupu', '2023-01-25 22:37:19', '2023-01-25 22:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(10, 4, 3, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(11, 4, 4, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(12, 4, 5, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(13, 5, 1, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(14, 5, 2, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(15, 5, 3, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(25, 9, 1, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(26, 9, 3, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(27, 9, 4, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(28, 8, 2, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(29, 8, 3, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(30, 8, 4, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(31, 7, 1, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(32, 7, 3, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(33, 7, 6, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(34, 6, 4, '2023-01-25 22:33:13', '2023-01-25 22:33:13'),
(35, 6, 6, '2023-01-25 22:33:13', '2023-01-25 22:33:13'),
(36, 6, 7, '2023-01-25 22:33:13', '2023-01-25 22:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_related_images`
--

CREATE TABLE `product_related_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `related_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_related_images`
--

INSERT INTO `product_related_images` (`id`, `product_id`, `related_image`, `created_at`, `updated_at`) VALUES
(4, 2, '18.01.2023_1674034714_3971_JOTNO_PRODUCT_RI_5B558506.png', '2023-01-18 03:38:34', '2023-01-18 03:38:34'),
(5, 3, '18.01.2023_1674034909_4772_JOTNO_PRODUCT_RI_1411203-16.gif', '2023-01-18 03:41:49', '2023-01-18 03:41:49'),
(6, 3, '18.01.2023_1674034909_2744_JOTNO_PRODUCT_RI_download (2).jpeg', '2023-01-18 03:41:49', '2023-01-18 03:41:49'),
(7, 3, '18.01.2023_1674034909_2407_JOTNO_PRODUCT_RI_IMG-20210523-WA0008-300x300.jpg', '2023-01-18 03:41:49', '2023-01-18 03:41:49'),
(8, 5, '24.01.2023_1674549278_2210_JOTNO_PRODUCT_RI_Capture.JPG', '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(9, 5, '24.01.2023_1674549278_3369_JOTNO_PRODUCT_RI_e649a9a14be4ab5ea512c04a81e4e074.jpg', '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(10, 5, '24.01.2023_1674549278_1762_JOTNO_PRODUCT_RI_eaa90bc022f8a8c807fc9aa0e516d772.jpg', '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(11, 6, '24.01.2023_1674549484_235_JOTNO_PRODUCT_RI_2ecf8eecfeb7bada1c006ecbd71108c1.jpg', '2023-01-24 02:38:04', '2023-01-24 02:38:04'),
(12, 6, '24.01.2023_1674549484_7766_JOTNO_PRODUCT_RI_40cb6084c1262ac9a0e2df20243e07af.jpg', '2023-01-24 02:38:04', '2023-01-24 02:38:04'),
(13, 6, '24.01.2023_1674549484_5904_JOTNO_PRODUCT_RI_b150954263b20ee9a8ac15158a07436a.jpg', '2023-01-24 02:38:04', '2023-01-24 02:38:04'),
(14, 8, '24.01.2023_1674557301_5039_JOTNO_PRODUCT_RI_080e896ca5a01ee027e0b2fd680bb1f3.jpg', '2023-01-24 04:48:21', '2023-01-24 04:48:21'),
(15, 8, '24.01.2023_1674557301_8941_JOTNO_PRODUCT_RI_270f49658057a75c1593f3d5baa5f22f.jpg', '2023-01-24 04:48:21', '2023-01-24 04:48:21'),
(16, 8, '24.01.2023_1674557301_4258_JOTNO_PRODUCT_RI_343c4abb0a7a6b294b9f647183487efe.jpg', '2023-01-24 04:48:21', '2023-01-24 04:48:21'),
(17, 8, '24.01.2023_1674557301_7812_JOTNO_PRODUCT_RI_a620358c63142672fb782d73f19d7c2b.jpg', '2023-01-24 04:48:21', '2023-01-24 04:48:21'),
(18, 9, '24.01.2023_1674557548_1269_JOTNO_PRODUCT_RI_8ba4fcc1e920be0e1c1321f2342a810a.jpg', '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(19, 9, '24.01.2023_1674557548_9625_JOTNO_PRODUCT_RI_bc63adb38be2eb1a2e4d6b92518d72e5.jpg', '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(20, 9, '24.01.2023_1674557548_4290_JOTNO_PRODUCT_RI_c99fab3160256fee2c4fe1742be40ce7.jpg', '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(21, 10, '24.01.2023_1674557655_7144_JOTNO_PRODUCT_RI_a4851b1a779f3689a6d2dd3003c44e11.jpg', '2023-01-24 04:54:15', '2023-01-24 04:54:15'),
(22, 10, '24.01.2023_1674557655_1704_JOTNO_PRODUCT_RI_eaa90bc022f8a8c807fc9aa0e516d772.jpg', '2023-01-24 04:54:15', '2023-01-24 04:54:15'),
(23, 10, '24.01.2023_1674557655_2139_JOTNO_PRODUCT_RI_ffc249a5f4f94e4462e0f31e892cbcb4.jpg', '2023-01-24 04:54:15', '2023-01-24 04:54:15'),
(24, 11, '24.01.2023_1674557878_3069_JOTNO_PRODUCT_RI_9393883437061e7a54832e0b3f8365b8.jpg', '2023-01-24 04:57:58', '2023-01-24 04:57:58'),
(25, 11, '24.01.2023_1674557878_9966_JOTNO_PRODUCT_RI_a4851b1a779f3689a6d2dd3003c44e11.jpg', '2023-01-24 04:57:58', '2023-01-24 04:57:58'),
(26, 11, '24.01.2023_1674557878_9934_JOTNO_PRODUCT_RI_a620358c63142672fb782d73f19d7c2b.jpg', '2023-01-24 04:57:58', '2023-01-24 04:57:58'),
(27, 12, '24.01.2023_1674558007_4160_JOTNO_PRODUCT_RI_aacb007fbeadbb710a6c2b99384e921e.jpg', '2023-01-24 05:00:07', '2023-01-24 05:00:07'),
(28, 12, '24.01.2023_1674558007_4832_JOTNO_PRODUCT_RI_Capture.JPG', '2023-01-24 05:00:07', '2023-01-24 05:00:07'),
(29, 12, '24.01.2023_1674558007_801_JOTNO_PRODUCT_RI_e649a9a14be4ab5ea512c04a81e4e074.jpg', '2023-01-24 05:00:07', '2023-01-24 05:00:07'),
(30, 13, '24.01.2023_1674558101_567_JOTNO_PRODUCT_RI_2e855a2e0e09d871886a7559ac3310bf.jpg', '2023-01-24 05:01:41', '2023-01-24 05:01:41'),
(31, 13, '24.01.2023_1674558101_1835_JOTNO_PRODUCT_RI_516183f5c7a94494c0376ad10bf126b0.jpg', '2023-01-24 05:01:41', '2023-01-24 05:01:41'),
(32, 13, '24.01.2023_1674558101_4227_JOTNO_PRODUCT_RI_bd5a5e7a73794901f41ab5faba4fdea4.jpg', '2023-01-24 05:01:41', '2023-01-24 05:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(10, 4, 2, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(11, 4, 3, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(12, 4, 4, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(13, 5, 2, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(14, 5, 3, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(15, 5, 4, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(27, 9, 2, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(28, 9, 3, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(29, 9, 4, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(30, 9, 5, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(31, 8, 1, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(32, 8, 2, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(33, 8, 3, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(34, 8, 4, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(35, 7, 1, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(36, 7, 2, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(37, 7, 3, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(38, 6, 1, '2023-01-25 22:33:13', '2023-01-25 22:33:13'),
(39, 6, 3, '2023-01-25 22:33:13', '2023-01-25 22:33:13'),
(40, 6, 6, '2023-01-25 22:33:13', '2023-01-25 22:33:13'),
(41, 6, 7, '2023-01-25 22:33:13', '2023-01-25 22:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_weights`
--

CREATE TABLE `product_weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `weight_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_weights`
--

INSERT INTO `product_weights` (`id`, `product_id`, `weight_id`, `created_at`, `updated_at`) VALUES
(11, 3, 1, '2023-01-23 23:15:08', '2023-01-23 23:15:08'),
(12, 3, 2, '2023-01-23 23:15:08', '2023-01-23 23:15:08'),
(13, 3, 3, '2023-01-23 23:15:08', '2023-01-23 23:15:08'),
(18, 2, 2, '2023-01-23 23:17:01', '2023-01-23 23:17:01'),
(19, 2, 3, '2023-01-23 23:17:01', '2023-01-23 23:17:01'),
(20, 2, 4, '2023-01-23 23:17:01', '2023-01-23 23:17:01'),
(21, 2, 5, '2023-01-23 23:17:01', '2023-01-23 23:17:01'),
(31, 4, 3, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(32, 4, 4, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(33, 4, 7, '2023-01-24 02:06:28', '2023-01-24 02:06:28'),
(34, 5, 3, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(35, 5, 4, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(36, 5, 5, '2023-01-24 02:34:38', '2023-01-24 02:34:38'),
(47, 9, 1, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(48, 9, 2, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(49, 9, 4, '2023-01-24 04:52:28', '2023-01-24 04:52:28'),
(50, 11, 1, '2023-01-24 04:57:58', '2023-01-24 04:57:58'),
(51, 11, 2, '2023-01-24 04:57:58', '2023-01-24 04:57:58'),
(52, 11, 4, '2023-01-24 04:57:58', '2023-01-24 04:57:58'),
(53, 8, 3, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(54, 8, 4, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(55, 8, 5, '2023-01-25 05:40:39', '2023-01-25 05:40:39'),
(56, 7, 4, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(57, 7, 6, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(58, 7, 8, '2023-01-25 22:32:51', '2023-01-25 22:32:51'),
(59, 6, 4, '2023-01-25 22:33:13', '2023-01-25 22:33:13'),
(60, 6, 8, '2023-01-25 22:33:13', '2023-01-25 22:33:13'),
(61, 6, 9, '2023-01-25 22:33:13', '2023-01-25 22:33:13'),
(62, 6, 10, '2023-01-25 22:33:13', '2023-01-25 22:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(1, 'Small', 'active', 'Aupu', NULL, '2022-12-23 21:37:24', '2022-12-23 21:37:24'),
(2, 'Medium', 'inactive', 'Aupu', NULL, '2022-12-23 21:37:38', '2022-12-23 21:37:38'),
(3, 'Large', 'active', 'Aupu', NULL, '2022-12-23 21:37:50', '2022-12-23 21:37:50'),
(4, 'XL', 'inactive', 'Aupu', NULL, '2022-12-23 21:38:16', '2022-12-23 21:38:16'),
(5, 'XXL', 'active', 'Aupu', NULL, '2022-12-23 21:38:28', '2022-12-23 21:38:28'),
(6, 'XX', 'inactive', 'Aupu', NULL, '2022-12-23 21:39:44', '2022-12-23 21:39:44'),
(7, 'XXX', 'active', 'Aupu', NULL, '2022-12-23 21:39:59', '2022-12-23 21:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custom_id` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` bigint(20) DEFAULT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `role` enum('super_admin','admin','manager','supervisor','operator','dealer','wholesaler','retailer','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `image` text COLLATE utf8mb4_unicode_ci,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `custom_id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `verification_code`, `nationality`, `country`, `nid`, `gender`, `status`, `role`, `image`, `creator`, `updater`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'JNS-0001', 'Aupu', 'aupuchowdhhhury@gmail.com', '01316206254', NULL, '$2y$10$UuVwsoZg3aUAjNNi7sAFN.L4/amlNdGNTFh2aOw7Z3/6vdcjV6RPm', '240086', NULL, NULL, NULL, NULL, 'active', 'customer', NULL, NULL, NULL, 'RKdzhShKcD7CO1VZxRqOAba5AG1io9Ssu47feBfMSHgGoxBmtfEOYgQ8pZiA', '2022-12-04 03:42:01', '2022-12-10 23:41:21'),
(2, 'JNS-0002', 'Aupu', 'aupuchowdhury@live.com', '01672674422', NULL, '$2y$10$U61Z9TM.8bXOM9GIPHEuhORFo4NvnskTkZ/Z3ILzIbb8E5ITsRgpW', '794704', NULL, NULL, NULL, NULL, 'active', 'super_admin', NULL, NULL, NULL, NULL, '2022-12-04 04:02:28', '2022-12-04 04:03:36'),
(6, 'JNS-0003', 'David', 'david@jotno.com', '7687546857', NULL, '$2y$10$cZu.ft4UIX1aEd7NTbotxOA0bJwL3zD/QlvTGkt88.cjDK9PRBHvu', '107993', NULL, NULL, NULL, NULL, 'inactive', 'customer', NULL, NULL, 'Aupu', NULL, '2022-12-08 00:58:34', '2022-12-20 02:43:21'),
(7, 'JNS-0004', 'testabc', 'test@test.com', '78568464311', NULL, '$2y$10$.K.1j3YO6vjFHDXliME5u.WphYWCejVIT7q4HSJSOHhZ5gGIb9ZoO', NULL, NULL, NULL, NULL, NULL, 'active', 'manager', '12.12.2022_1670822091_605_JOTNO_pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg', 'Aupu', 'Aupu', NULL, '2022-12-11 23:14:52', '2022-12-11 23:24:40'),
(8, 'JNS-0005', 'ptest', 'ptest@ptest.com', '252525525', NULL, '$2y$10$a3vA2OxtZfgSyv/Wtl/0T.DhmHy.HJI1Zos8JWk3To.JhOSsXXvT.', '237083', NULL, NULL, NULL, NULL, 'inactive', 'customer', NULL, NULL, 'Aupu', NULL, '2022-12-11 23:27:22', '2022-12-20 02:44:14'),
(9, 'JNS-0006', 'eee', 'eee@eee.com', '1472583691', NULL, '$2y$10$qU2wRzsZ7SbHAfKLveUXBuNhLpU0OX4KccZxXaijq7HgNfhj2kVuC', '769297', NULL, NULL, NULL, NULL, 'active', 'customer', NULL, NULL, NULL, 'UWqT75MoVilJW4mW2yiAZ8rKJgx5W85VXhXUF61QptRAvepSDBUajmQ851Jn', '2022-12-24 04:06:41', '2022-12-24 05:03:53'),
(10, 'JNS-0007', 'abc', 'abc@abc.com', '422625788', NULL, '$2y$10$YP3IMpybTjf6nGF5dywH1.ThgQP8djf9h1IURrVfW2p9O67ZMWeZO', '749063', NULL, NULL, NULL, NULL, 'active', 'customer', NULL, NULL, NULL, NULL, '2022-12-26 00:04:05', '2022-12-26 00:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updater` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `name`, `status`, `creator`, `updater`, `created_at`, `updated_at`) VALUES
(1, '250 GM', 'inactive', 'Aupu', 'Aupu', '2022-12-23 21:28:48', '2022-12-23 21:30:05'),
(2, '500 GM', 'active', 'Aupu', NULL, '2022-12-23 21:29:45', '2022-12-23 21:29:45'),
(3, '1 Kilo', 'active', 'Aupu', NULL, '2022-12-23 21:30:45', '2022-12-23 21:30:45'),
(4, '2 Kilo', 'inactive', 'Aupu', NULL, '2022-12-23 21:31:24', '2022-12-23 21:31:24'),
(5, '1.5 Kilo', 'active', 'Aupu', NULL, '2022-12-23 21:31:54', '2022-12-23 21:31:54'),
(6, '2.5 Kilo', 'inactive', 'Aupu', NULL, '2022-12-23 21:32:12', '2022-12-23 21:32:12'),
(7, '3 Kilo', 'active', 'Aupu', NULL, '2022-12-23 21:32:33', '2022-12-23 21:32:33'),
(8, '3.5 Kilo', 'inactive', 'Aupu', NULL, '2022-12-23 21:32:51', '2022-12-23 21:32:51'),
(9, '4 Kilo', 'active', 'Aupu', NULL, '2022-12-23 21:33:12', '2022-12-23 21:33:12'),
(10, '4.5 Kilo', 'inactive', 'Aupu', NULL, '2022-12-23 21:33:25', '2022-12-23 21:33:25'),
(11, '5 Kilo', 'active', 'Aupu', NULL, '2022-12-23 21:33:44', '2022-12-23 21:33:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_carousels`
--
ALTER TABLE `main_carousels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_carousels_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_related_images`
--
ALTER TABLE `product_related_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_weights`
--
ALTER TABLE `product_weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `weights_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_carousels`
--
ALTER TABLE `main_carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_related_images`
--
ALTER TABLE `product_related_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_weights`
--
ALTER TABLE `product_weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;