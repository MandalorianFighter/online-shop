-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2023 at 12:22 PM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-06-12 08:03:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-12 08:03:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `created_at`, `updated_at`) VALUES
(1, '2023-06-19 05:41:26', '2023-06-19 05:41:26'),
(2, '2023-06-19 05:41:38', '2023-06-19 05:41:38'),
(3, '2023-06-19 05:42:07', '2023-06-19 05:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_translations`
--

CREATE TABLE `blog_category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_category_translations`
--

INSERT INTO `blog_category_translations` (`id`, `blog_category_id`, `locale`, `category_name`) VALUES
(1, 1, 'en', 'Education'),
(2, 1, 'uk', 'Освіта'),
(3, 2, 'en', 'Finance'),
(4, 2, 'uk', 'Фінанси'),
(5, 3, 'en', 'Technologies'),
(6, 3, 'uk', 'Технології');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'HP', '2023-06-12 05:34:27', '2023-06-12 05:34:27'),
(2, 'Samsung', '2023-06-12 05:34:49', '2023-06-12 05:34:49'),
(3, 'Bose', '2023-06-12 05:45:22', '2023-06-12 05:45:22'),
(4, 'Dell', '2023-06-12 05:52:40', '2023-06-12 05:52:40'),
(5, 'Clarks', '2023-06-12 05:53:15', '2023-06-12 05:53:15'),
(6, 'Lego', '2023-06-12 05:53:39', '2023-06-12 05:53:39'),
(7, 'Apple', '2023-06-12 05:53:54', '2023-06-12 05:53:54'),
(8, 'Marshall', '2023-06-12 07:06:30', '2023-06-12 07:06:30'),
(9, 'Ecco', '2023-06-12 07:07:46', '2023-06-12 07:07:46'),
(10, 'Xiaomi', '2023-06-12 07:08:27', '2023-06-12 07:08:27'),
(11, 'Sony', '2023-06-12 07:09:04', '2023-06-12 07:09:04'),
(12, 'Everlane', '2023-06-12 07:09:27', '2023-06-12 07:09:27'),
(13, 'Canon', '2023-06-12 07:10:48', '2023-06-12 07:10:48'),
(14, 'Casio', '2023-06-12 07:11:06', '2023-06-12 07:11:06'),
(15, 'Hugo Boss', '2023-06-12 07:12:11', '2023-06-12 07:12:11'),
(16, 'Levi`s', '2023-06-12 07:12:37', '2023-06-12 07:12:37'),
(17, 'Nikon', '2023-06-12 07:13:15', '2023-06-12 07:13:15'),
(18, 'H&M', '2023-06-12 07:14:26', '2023-06-12 07:14:26'),
(19, 'Under Armour', '2023-06-12 07:14:50', '2023-06-12 07:14:50'),
(20, 'Colin`s', '2023-06-12 07:15:27', '2023-06-12 07:15:27'),
(21, 'GAP', '2023-06-12 07:16:02', '2023-06-12 07:16:02'),
(22, 'Nike', '2023-06-12 07:18:00', '2023-06-12 07:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`) VALUES
(1, '2023-06-12 05:18:10', '2023-06-12 05:18:10'),
(2, '2023-06-12 05:18:28', '2023-06-12 05:18:28'),
(3, '2023-06-12 05:20:01', '2023-06-12 05:20:01'),
(4, '2023-06-12 05:20:43', '2023-06-12 05:20:43'),
(5, '2023-06-12 05:21:09', '2023-06-12 05:21:09'),
(6, '2023-06-12 05:21:25', '2023-06-12 05:21:25'),
(7, '2023-06-12 05:21:39', '2023-06-12 05:21:39'),
(8, '2023-06-12 05:22:09', '2023-06-12 05:22:09'),
(9, '2023-06-12 05:22:34', '2023-06-12 05:22:34'),
(10, '2023-06-12 05:22:49', '2023-06-12 05:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `category_name`) VALUES
(1, 1, 'en', 'Men`s Fashion'),
(2, 1, 'uk', 'Чоловічий Одяг'),
(3, 2, 'en', 'Women`s Fashion'),
(4, 2, 'uk', 'Жіночий Одяг'),
(5, 3, 'en', 'Everything for Children'),
(6, 3, 'uk', 'Все Для Дітей'),
(7, 4, 'en', 'Watches'),
(8, 4, 'uk', 'Наручні Годинники'),
(9, 5, 'en', 'Electronics'),
(10, 5, 'uk', 'Електроніка'),
(11, 6, 'en', 'Health'),
(12, 6, 'uk', 'Здоров\'я'),
(13, 7, 'en', 'Beauty'),
(14, 7, 'uk', 'Краса'),
(15, 8, 'en', 'Sport'),
(16, 8, 'uk', 'Спорт'),
(17, 9, 'en', 'Tourist Equipment'),
(18, 9, 'uk', 'Туристичне Спорядження'),
(19, 10, 'en', 'Home & Living'),
(20, 10, 'uk', 'Дім і Побут');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admin\\Brand', 1, '3c2cb55f-e268-4bbb-8cec-7d647be5cb2e', 'brands', 'hpi', '1686558867.png', 'image/png', 'media', 'media', 18459, '[]', '[]', '[]', '[]', 1, '2023-06-12 05:34:27', '2023-06-12 05:34:27'),
(2, 'App\\Models\\Admin\\Brand', 2, '3c655dca-0caf-4033-9afc-1dca7fb0327b', 'brands', 'samsung', '1686558889.png', 'image/png', 'media', 'media', 18119, '[]', '[]', '[]', '[]', 1, '2023-06-12 05:34:49', '2023-06-12 05:34:49'),
(3, 'App\\Models\\Admin\\Brand', 3, 'd27c65b6-1ffe-4521-8fcc-33c00e514a6b', 'brands', 'bose-1-282988', '1686559523.png', 'image/png', 'media', 'media', 2256, '[]', '[]', '[]', '[]', 1, '2023-06-12 05:45:23', '2023-06-12 05:45:23'),
(4, 'App\\Models\\Admin\\Brand', 4, '29be7dbb-d69a-4e07-982f-f32fbba7b77e', 'brands', 'Dell_Logo', '1686559961.png', 'image/png', 'media', 'media', 38225, '[]', '[]', '[]', '[]', 1, '2023-06-12 05:52:41', '2023-06-12 05:52:41'),
(5, 'App\\Models\\Admin\\Brand', 5, '404d4b5f-6ec4-4e6b-b37e-d009d16a9344', 'brands', 'clarks', '1686559995.png', 'image/png', 'media', 'media', 11023, '[]', '[]', '[]', '[]', 1, '2023-06-12 05:53:15', '2023-06-12 05:53:15'),
(6, 'App\\Models\\Admin\\Brand', 6, '78e00ecd-3c00-44df-9880-84dda59c1085', 'brands', 'lego-15-283648', '1686560019.png', 'image/png', 'media', 'media', 17470, '[]', '[]', '[]', '[]', 1, '2023-06-12 05:53:39', '2023-06-12 05:53:39'),
(7, 'App\\Models\\Admin\\Brand', 7, '861f0ab1-79d5-4b43-a19b-f9bfc76bef7d', 'brands', 'Apple-logo', '1686560034.png', 'image/png', 'media', 'media', 31135, '[]', '[]', '[]', '[]', 1, '2023-06-12 05:53:54', '2023-06-12 05:53:54'),
(8, 'App\\Models\\Admin\\Brand', 8, '9cdf8231-c744-45b2-9270-421f2b46e22a', 'brands', 'marshall-logo', '1686564390.png', 'image/png', 'media', 'media', 14410, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:06:31', '2023-06-12 07:06:31'),
(9, 'App\\Models\\Admin\\Brand', 9, '11ec2823-90d5-41d0-9aae-93d90201f64f', 'brands', 'ecco-1-202585', '1686564466.png', 'image/png', 'media', 'media', 4768, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:07:46', '2023-06-12 07:07:46'),
(10, 'App\\Models\\Admin\\Brand', 10, 'ea6f7031-134c-4ca3-af91-dd9719ec97a0', 'brands', 'Xiaomi_logo_', '1686564507.png', 'image/png', 'media', 'media', 11282, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:08:27', '2023-06-12 07:08:27'),
(11, 'App\\Models\\Admin\\Brand', 11, '0a06a1a9-31d1-44dd-908b-5b7cb293ab26', 'brands', 'index', '1686564545.png', 'image/png', 'media', 'media', 2062, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:09:05', '2023-06-12 07:09:05'),
(12, 'App\\Models\\Admin\\Brand', 12, 'fcef7e5b-e1cf-4d5a-8c49-4a15754b0f87', 'brands', 'sxxh0n2cthr91o1zb99f', '1686564567.png', 'image/png', 'media', 'media', 1894, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:09:27', '2023-06-12 07:09:27'),
(14, 'App\\Models\\Admin\\Brand', 14, 'f7fd52e2-86ad-42e8-88da-ff1f4965b17e', 'brands', 'Casio', '1686564666.png', 'image/png', 'media', 'media', 4572, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:11:06', '2023-06-12 07:11:06'),
(15, 'App\\Models\\Admin\\Brand', 15, 'fe5fef00-e8cd-4847-8e34-126e686e0d02', 'brands', 'hugo-boss6', '1686564731.png', 'image/png', 'media', 'media', 8656, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:12:11', '2023-06-12 07:12:11'),
(16, 'App\\Models\\Admin\\Brand', 16, 'a6379de1-a4b9-4527-a56d-6a4e0b206a94', 'brands', 'levis', '1686564758.png', 'image/png', 'media', 'media', 10405, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:12:38', '2023-06-12 07:12:38'),
(17, 'App\\Models\\Admin\\Brand', 17, 'c387bd34-8efd-4130-b4ff-50acb12d1b97', 'brands', 'nikon-1-282957', '1686564795.png', 'image/png', 'media', 'media', 37220, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:13:15', '2023-06-12 07:13:15'),
(18, 'App\\Models\\Admin\\Brand', 18, '934504d4-bca6-43f0-a53a-a4cdd30eea16', 'brands', 'hm-33', '1686564866.png', 'image/png', 'media', 'media', 8958, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:14:26', '2023-06-12 07:14:26'),
(19, 'App\\Models\\Admin\\Brand', 19, 'e00232fb-52e5-46f7-9d76-dcf22e4e52d0', 'brands', 'under-15-282154', '1686564890.png', 'image/png', 'media', 'media', 5947, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:14:50', '2023-06-12 07:14:50'),
(20, 'App\\Models\\Admin\\Brand', 20, 'cd70bc6c-204f-4a19-9467-73b7d039da98', 'brands', 'colins_245x245_dc9', '1686564927.png', 'image/png', 'media', 'media', 16304, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:15:27', '2023-06-12 07:15:27'),
(21, 'App\\Models\\Admin\\Brand', 21, 'ed98f0f2-146c-42e0-9863-a9bb6ffd3c11', 'brands', 'GAP', '1686564962.png', 'image/png', 'media', 'media', 5456, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:16:02', '2023-06-12 07:16:02'),
(23, 'App\\Models\\Admin\\Brand', 22, 'f8818ab3-c5d4-4e17-ad5e-6d28b3766375', 'brands', 'nike_PNG12', '1686565357.png', 'image/png', 'media', 'media', 541210, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:22:37', '2023-06-12 07:22:37'),
(25, 'App\\Models\\Admin\\Brand', 13, 'a47aac2c-9dbe-4dd9-93da-c8c1b6b21ab2', 'brands', '282316', '1686565604.png', 'image/png', 'media', 'media', 11617, '[]', '[]', '[]', '[]', 1, '2023-06-12 07:26:44', '2023-06-12 07:26:44'),
(26, 'App\\Models\\Admin\\Product', 1, '006af889-2ed5-4380-bb2a-ea821dcb4f23', 'products/imageOne', 'WL451_MB1_FR', '1686571725.png', 'image/png', 'media', 'media', 154512, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-12 09:08:45', '2023-06-12 09:08:47'),
(27, 'App\\Models\\Admin\\Product', 1, '9dbb9016-7847-4a5e-b3be-7ee53415d82c', 'products/imageTwo', 'WL451_MB1_BK', '1686571727.jpg', 'image/jpeg', 'media', 'media', 251462, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 09:08:47', '2023-06-12 09:08:47'),
(28, 'App\\Models\\Admin\\Product', 1, '46d715a6-ac9d-4b2f-86da-fab816cdc611', 'products/imageThree', 'WL451_MB1_A4', '1686571728.jpg', 'image/jpeg', 'media', 'media', 166636, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 09:08:48', '2023-06-12 09:08:48'),
(29, 'App\\Models\\Admin\\Product', 2, 'a19a8478-d5e6-4fc1-a2c3-8963ce1dddfa', 'products/imageOne', 'WL450_CH_FR', '1686573127.png', 'image/png', 'media', 'media', 137623, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-12 09:32:07', '2023-06-12 09:32:08'),
(30, 'App\\Models\\Admin\\Product', 2, 'e0befbd1-f41e-493a-b249-d0db50509064', 'products/imageTwo', 'WL450_CH_BK', '1686573128.jpg', 'image/jpeg', 'media', 'media', 208322, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 09:32:08', '2023-06-12 09:32:08'),
(31, 'App\\Models\\Admin\\Product', 2, 'ce4e34ca-4885-4505-b6f3-c1e64fb8fca4', 'products/imageThree', 'WL450_CH_A1', '1686573129.jpg', 'image/jpeg', 'media', 'media', 174544, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 09:32:09', '2023-06-12 09:32:09'),
(33, 'App\\Models\\Admin\\Product', 3, 'a8613196-b6f1-4ada-8e33-7b7b71b11690', 'products/imageTwo', 'WLR05_OG_BK', '1686574425.jpg', 'image/jpeg', 'media', 'media', 187167, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 09:53:45', '2023-06-12 09:53:45'),
(34, 'App\\Models\\Admin\\Product', 3, '54e7621e-f99d-4a85-96a6-d9a0a738a281', 'products/imageThree', 'WLR05_OG_A7', '1686574425.jpg', 'image/jpeg', 'media', 'media', 337853, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 09:53:45', '2023-06-12 09:53:46'),
(36, 'App\\Models\\Admin\\Product', 3, 'a4a7b22a-e08e-45fe-9c0d-22fdb5677e37', 'products/imageOne', 'WLR05_OG_FR', '1686576319.png', 'image/png', 'media', 'media', 140344, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 4, '2023-06-12 10:25:19', '2023-06-12 10:25:19'),
(37, 'App\\Models\\Admin\\Product', 4, '7abcac65-310c-4d4a-ae90-13089405b1cd', 'products/imageOne', 'WL451_CB_FR', '1686576993.png', 'image/png', 'media', 'media', 165154, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-12 10:36:33', '2023-06-12 10:36:33'),
(38, 'App\\Models\\Admin\\Product', 4, 'e6c03701-9cdc-4840-bd64-f8d95488ed71', 'products/imageTwo', 'WL451_CB_BK', '1686576994.jpg', 'image/jpeg', 'media', 'media', 219430, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 10:36:34', '2023-06-12 10:36:34'),
(39, 'App\\Models\\Admin\\Product', 4, 'ab41da58-4ccb-4890-a68e-63d479a04904', 'products/imageThree', 'WL451_CB_A1', '1686576994.jpg', 'image/jpeg', 'media', 'media', 174318, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 10:36:34', '2023-06-12 10:36:35'),
(40, 'App\\Models\\Admin\\Product', 5, '107ce221-a3e6-459b-b238-a00fe7f69440', 'products/imageOne', 'WS451_DS_FR', '1686577557.png', 'image/png', 'media', 'media', 126662, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-12 10:45:57', '2023-06-12 10:45:57'),
(41, 'App\\Models\\Admin\\Product', 5, 'b02e834b-8626-4c80-86f7-82a9806c2213', 'products/imageTwo', 'WS451_DS_BK', '1686577558.jpg', 'image/jpeg', 'media', 'media', 256565, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 10:45:58', '2023-06-12 10:45:58'),
(42, 'App\\Models\\Admin\\Product', 5, '2c12ea4c-3bf6-47ce-bbcd-2a0765eeb574', 'products/imageThree', 'WS451_DS_A1', '1686577559.jpg', 'image/jpeg', 'media', 'media', 190181, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 10:45:59', '2023-06-12 10:45:59'),
(43, 'App\\Models\\Admin\\Product', 6, '5adea8b3-b2a9-48b5-965b-64e93602390b', 'products/imageOne', 'WS450H_F2H_FR', '1686578167.png', 'image/png', 'media', 'media', 185990, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-12 10:56:07', '2023-06-12 10:56:09'),
(44, 'App\\Models\\Admin\\Product', 6, 'db8a4c0d-a7fe-4a05-8c02-a63596e253b7', 'products/imageTwo', 'WS450H_F2H_BK', '1686578170.jpg', 'image/jpeg', 'media', 'media', 230698, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 10:56:10', '2023-06-12 10:56:10'),
(45, 'App\\Models\\Admin\\Product', 6, '81350c43-6dac-4d34-a4ff-1b6035f5a67d', 'products/imageThree', 'WS450H_F2H_A1', '1686578171.jpg', 'image/jpeg', 'media', 'media', 194226, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 10:56:11', '2023-06-12 10:56:13'),
(46, 'App\\Models\\Admin\\Product', 7, '9004ae97-a49c-4839-b743-750624ac2014', 'products/imageOne', 'Relaxed Fit Straight Leg Heavyweight Duck Carpenter Pants', '1686579293.jpg', 'image/jpeg', 'media', 'media', 149215, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-12 11:14:53', '2023-06-12 11:14:54'),
(47, 'App\\Models\\Admin\\Product', 7, 'cfe189d1-ed32-4eeb-8f6c-51b5d7c5a33d', 'products/imageTwo', '1939_RCB_BK', '1686579295.jpg', 'image/jpeg', 'media', 'media', 142587, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 11:14:55', '2023-06-12 11:14:55'),
(48, 'App\\Models\\Admin\\Product', 7, 'd14e2c64-9841-477a-a074-75f76516e710', 'products/imageThree', '1939_RCB_A2', '1686579295.jpg', 'image/jpeg', 'media', 'media', 134095, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 11:14:55', '2023-06-12 11:14:56'),
(49, 'App\\Models\\Admin\\Product', 8, '669dcd75-d5ed-4e87-82d4-7893edbebfe7', 'products/imageOne', 'Skateboarding Double Knee Pants', '1686580044.jpg', 'image/jpeg', 'media', 'media', 142024, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-12 11:27:24', '2023-06-12 11:27:25'),
(50, 'App\\Models\\Admin\\Product', 8, '3386b31d-1329-4dcb-b02e-bcc797236b3e', 'products/imageTwo', 'WPSK96_OG_BK', '1686580046.jpg', 'image/jpeg', 'media', 'media', 144782, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 11:27:26', '2023-06-12 11:27:26'),
(51, 'App\\Models\\Admin\\Product', 8, '42cab643-1780-457e-bee2-8abfc045a600', 'products/imageThree', 'WPSK96_OG_A1', '1686580046.jpg', 'image/jpeg', 'media', 'media', 116690, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 11:27:26', '2023-06-12 11:27:27'),
(52, 'App\\Models\\Admin\\Product', 9, '61036159-b742-45dd-8b24-ccde428ee412', 'products/imageOne', 'DU220_SNB_FR', '1686580612.jpg', 'image/jpeg', 'media', 'media', 377227, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-12 11:36:52', '2023-06-12 11:36:53'),
(53, 'App\\Models\\Admin\\Product', 9, '6826a3d7-1729-4152-834d-f77817bec970', 'products/imageTwo', 'DU220_SNB_BK', '1686580613.jpg', 'image/jpeg', 'media', 'media', 363412, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-12 11:36:53', '2023-06-12 11:36:54'),
(54, 'App\\Models\\Admin\\Product', 9, '80db0159-432d-4783-8869-5a8e1dc7bda6', 'products/imageThree', 'DU220_SNB_A2', '1686580614.jpg', 'image/jpeg', 'media', 'media', 345478, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-12 11:36:54', '2023-06-12 11:36:54'),
(55, 'App\\Models\\Admin\\Product', 10, '73baa107-b264-47de-90e2-b097e9bb00ed', 'products/imageOne', 'DU250_RBD_FR', '1687152046.jpg', 'image/jpeg', 'media', 'media', 216597, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 02:20:46', '2023-06-19 02:20:47'),
(56, 'App\\Models\\Admin\\Product', 10, '1000acef-4068-48c6-b28e-33c37f9ebb18', 'products/imageTwo', 'DU250_RBD_BK', '1687152048.jpg', 'image/jpeg', 'media', 'media', 223257, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 02:20:48', '2023-06-19 02:20:48'),
(57, 'App\\Models\\Admin\\Product', 10, 'a9cce91f-5df7-4694-af62-5e12b9c53a19', 'products/imageThree', 'DU250_RBD_A2', '1687152049.jpg', 'image/jpeg', 'media', 'media', 211248, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 02:20:49', '2023-06-19 02:20:49'),
(58, 'App\\Models\\Admin\\Product', 11, '118c4c98-7bbd-4cc1-95b8-166957a02c2a', 'products/imageOne', 'TJ601_BD_FR', '1687152670.png', 'image/png', 'media', 'media', 231879, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 02:31:10', '2023-06-19 02:31:11'),
(59, 'App\\Models\\Admin\\Product', 11, '900b07e8-8c38-40e0-b48d-9ea4dcc93a86', 'products/imageTwo', 'TJ601_BD_BK', '1687152672.jpg', 'image/jpeg', 'media', 'media', 231817, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 02:31:12', '2023-06-19 02:31:13'),
(60, 'App\\Models\\Admin\\Product', 11, 'fe414b41-699f-4a9e-9c3e-c610396bab33', 'products/imageThree', 'TJ601_BD_A1', '1687152673.jpg', 'image/jpeg', 'media', 'media', 201646, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 02:31:13', '2023-06-19 02:31:13'),
(61, 'App\\Models\\Admin\\Product', 12, '3ed855f7-e20f-4157-ab43-ee0a56b6d440', 'products/imageOne', 'TJ702_BK_FR', '1687153100.png', 'image/png', 'media', 'media', 136599, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 02:38:20', '2023-06-19 02:38:21'),
(62, 'App\\Models\\Admin\\Product', 12, 'a7a90cfd-b7eb-46d1-af27-8b5e4ad5d0db', 'products/imageTwo', 'TJ702_BK_BK', '1687153101.jpg', 'image/jpeg', 'media', 'media', 191248, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 02:38:21', '2023-06-19 02:38:22'),
(63, 'App\\Models\\Admin\\Product', 12, '63a8d8c2-52db-40b0-8558-61ffff90ae0a', 'products/imageThree', 'TJ702_BK_A1', '1687153102.jpg', 'image/jpeg', 'media', 'media', 154393, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 02:38:22', '2023-06-19 02:38:23'),
(64, 'App\\Models\\Admin\\Product', 13, '15522a5e-80b4-4f10-9838-a34ecad0da66', 'products/imageOne', 'TJ213_DN_FR', '1687154528.png', 'image/png', 'media', 'media', 227886, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 03:02:08', '2023-06-19 03:02:09'),
(65, 'App\\Models\\Admin\\Product', 13, '85a595a0-4215-4641-b3f2-607e98346ab6', 'products/imageTwo', 'TJ213_DN_BK', '1687154529.jpg', 'image/jpeg', 'media', 'media', 251258, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 03:02:09', '2023-06-19 03:02:10'),
(66, 'App\\Models\\Admin\\Product', 13, '600df424-a3c8-4bda-ab8e-7b175a71c242', 'products/imageThree', 'TJ213_DN_A4', '1687154530.jpg', 'image/jpeg', 'media', 'media', 195952, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 03:02:10', '2023-06-19 03:02:11'),
(67, 'App\\Models\\Admin\\Product', 14, '3e27fa26-2cfc-44e1-afa5-d45cb997ad8e', 'products/imageOne', 'SLF400_DY2_FR', '1687155128.png', 'image/png', 'media', 'media', 164273, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 03:12:08', '2023-06-19 03:12:09'),
(68, 'App\\Models\\Admin\\Product', 14, 'c9e98231-dd2b-4ed9-9855-6129fefefb7f', 'products/imageTwo', 'SLF400_DY2_BK', '1687155129.jpg', 'image/jpeg', 'media', 'media', 211988, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 03:12:09', '2023-06-19 03:12:10'),
(69, 'App\\Models\\Admin\\Product', 14, '27a56609-8435-43ab-9b7b-479125576192', 'products/imageThree', 'SLF400_DY2_A1', '1687155130.jpg', 'image/jpeg', 'media', 'media', 158630, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 03:12:10', '2023-06-19 03:12:11'),
(70, 'App\\Models\\Admin\\Product', 15, '2d660ec2-e13b-424e-aa06-ac6f2ebdd298', 'products/imageOne', 'Women\'s Henley Long Sleeve Shirt', '1687155631.jpg', 'image/jpeg', 'media', 'media', 261132, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 03:20:31', '2023-06-19 03:20:32'),
(71, 'App\\Models\\Admin\\Product', 15, 'b9059cd3-2d6d-4873-9903-b725568aeffb', 'products/imageTwo', 'FL097_KDD_BK', '1687155632.jpg', 'image/jpeg', 'media', 'media', 253984, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 03:20:32', '2023-06-19 03:20:33'),
(72, 'App\\Models\\Admin\\Product', 15, '14f7c592-7b9a-4488-b814-653544b2bee8', 'products/imageThree', 'FL097_KDD_A1', '1687155633.jpg', 'image/jpeg', 'media', 'media', 195309, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 03:20:33', '2023-06-19 03:20:34'),
(73, 'App\\Models\\Admin\\Product', 16, '1113999c-0ab4-4175-93e6-11812d9b1307', 'products/imageOne', 'Women\'s Heavyweight Henley', '1687156241.png', 'image/png', 'media', 'media', 133859, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 03:30:41', '2023-06-19 03:30:43'),
(74, 'App\\Models\\Admin\\Product', 16, 'fa510504-1181-446d-83e4-edbbbd182f70', 'products/imageTwo', 'FL460_OT9_BK', '1687156243.jpg', 'image/jpeg', 'media', 'media', 217860, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 03:30:43', '2023-06-19 03:30:43'),
(75, 'App\\Models\\Admin\\Product', 16, 'a938e2e4-9988-4d4e-829b-31eff282b0e0', 'products/imageThree', 'FL460_OT9_A1', '1687156244.jpg', 'image/jpeg', 'media', 'media', 183586, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 03:30:44', '2023-06-19 03:30:44'),
(76, 'App\\Models\\Admin\\Product', 17, '49606edf-0505-48a4-a1d2-410eed7d6694', 'products/imageOne', 'FL198_SSD_FR', '1687157608.png', 'image/png', 'media', 'media', 202542, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 03:53:28', '2023-06-19 03:53:29'),
(77, 'App\\Models\\Admin\\Product', 17, '52ea2960-cfa1-4c2c-9155-e38dea9da175', 'products/imageTwo', 'FL198_SSD_BK', '1687157610.jpg', 'image/jpeg', 'media', 'media', 362858, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 03:53:30', '2023-06-19 03:53:30'),
(78, 'App\\Models\\Admin\\Product', 17, 'ec84d1ad-c319-45b3-aa90-398a274cff82', 'products/imageThree', 'FL198_SSD_A4', '1687157611.jpg', 'image/jpeg', 'media', 'media', 213785, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 03:53:31', '2023-06-19 03:53:31'),
(79, 'App\\Models\\Admin\\Product', 18, '5e652cbd-428b-439b-b18b-f594cf14a03d', 'products/imageOne', 'FSR51_GSN_FR', '1687158206.png', 'image/png', 'media', 'media', 140945, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 04:03:26', '2023-06-19 04:03:27'),
(80, 'App\\Models\\Admin\\Product', 18, '2a982325-59b0-40a9-8ff1-52318c8a7933', 'products/imageTwo', 'FSR51_GSN_BK', '1687158208.jpg', 'image/jpeg', 'media', 'media', 292619, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 04:03:28', '2023-06-19 04:03:28'),
(81, 'App\\Models\\Admin\\Product', 18, '3af8cf03-a6d9-46f0-88bf-9d9451186c73', 'products/imageThree', 'FSR51_GSN_A1', '1687158209.jpg', 'image/jpeg', 'media', 'media', 255613, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 04:03:29', '2023-06-19 04:03:29'),
(82, 'App\\Models\\Admin\\Product', 19, 'ef149aa5-3037-468f-b9a4-ece885e5699b', 'products/imageOne', 'FL501_LSW_FR', '1687160826.png', 'image/png', 'media', 'media', 220333, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 04:47:06', '2023-06-19 04:47:08'),
(83, 'App\\Models\\Admin\\Product', 19, '9b8709f4-8e11-44f9-9fd1-43709826aed4', 'products/imageTwo', 'FL501_LSW_BK', '1687160829.jpg', 'image/jpeg', 'media', 'media', 366792, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 04:47:09', '2023-06-19 04:47:10'),
(84, 'App\\Models\\Admin\\Product', 19, 'd00d16ba-87d7-4b72-8c2e-1fe946aa6117', 'products/imageThree', 'FL501_LSW_A1', '1687160831.jpg', 'image/jpeg', 'media', 'media', 285234, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 04:47:11', '2023-06-19 04:47:12'),
(85, 'App\\Models\\Admin\\Product', 20, 'e5f1fdc3-f5b5-4498-9b60-077d9353ee32', 'products/imageOne', 'Women\'s Cropped Cargo Pants', '1687161459.jpg', 'image/jpeg', 'media', 'media', 166882, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 04:57:39', '2023-06-19 04:57:40'),
(86, 'App\\Models\\Admin\\Product', 20, '7d948b4a-dcd8-4795-b552-c33179bfe010', 'products/imageTwo', 'FPR50_IK_BK', '1687161461.jpg', 'image/jpeg', 'media', 'media', 154262, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 04:57:41', '2023-06-19 04:57:41'),
(87, 'App\\Models\\Admin\\Product', 20, '2fe20d83-a1ee-4637-bfed-8f0cf8a6a108', 'products/imageThree', 'FPR50_IK_A1', '1687161461.jpg', 'image/jpeg', 'media', 'media', 138515, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 04:57:41', '2023-06-19 04:57:42'),
(88, 'App\\Models\\Admin\\Product', 21, '2943fd09-f14d-46c4-a34e-52cadbd672f5', 'products/imageOne', 'FPR54_DL2_FR', '1687161814.jpg', 'image/jpeg', 'media', 'media', 204989, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 05:03:34', '2023-06-19 05:03:36'),
(89, 'App\\Models\\Admin\\Product', 21, '02851d1c-a5d9-481a-b212-e855f6b5f780', 'products/imageTwo', 'FPR54_DL2_BK', '1687161816.jpg', 'image/jpeg', 'media', 'media', 212684, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 05:03:36', '2023-06-19 05:03:36'),
(90, 'App\\Models\\Admin\\Product', 21, 'e2b85ca4-5571-4e6c-8f2b-d78aaf27052a', 'products/imageThree', 'FPR54_DL2_A1', '1687161817.jpg', 'image/jpeg', 'media', 'media', 190365, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 05:03:37', '2023-06-19 05:03:37'),
(91, 'App\\Models\\Admin\\Product', 22, '90a37ece-a6bc-4607-9b1b-8cd1757644ab', 'products/imageOne', 'FR147_SNB_FR', '1687162244.jpg', 'image/jpeg', 'media', 'media', 356036, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 05:10:44', '2023-06-19 05:10:45'),
(92, 'App\\Models\\Admin\\Product', 22, '81569c21-199e-499f-ad3b-c56229218760', 'products/imageTwo', 'FR147_SNB_BK', '1687162245.jpg', 'image/jpeg', 'media', 'media', 367366, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 05:10:45', '2023-06-19 05:10:46'),
(93, 'App\\Models\\Admin\\Product', 22, 'e2e98cf0-31ad-45b9-883a-d6202722ebdb', 'products/imageThree', 'FR147_SNB_A1', '1687162246.jpg', 'image/jpeg', 'media', 'media', 280779, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 05:10:46', '2023-06-19 05:10:46'),
(94, 'App\\Models\\Admin\\Product', 23, '5cde9a69-2309-480a-a449-6840e8690ee2', 'products/imageOne', 'FP777_RGE_FR', '1687162724.jpg', 'image/jpeg', 'media', 'media', 183943, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 05:18:44', '2023-06-19 05:18:45'),
(95, 'App\\Models\\Admin\\Product', 23, 'f0c086ad-7c70-4f97-b7ad-ed07c27c0261', 'products/imageTwo', 'FP777_RGE_BK', '1687162726.jpg', 'image/jpeg', 'media', 'media', 147519, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 05:18:46', '2023-06-19 05:18:46'),
(96, 'App\\Models\\Admin\\Product', 23, 'fc4aedd6-e6ab-44ea-b9dd-262f7c06353f', 'products/imageThree', 'FP777_RGE_A1', '1687162726.jpg', 'image/jpeg', 'media', 'media', 168470, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 05:18:46', '2023-06-19 05:18:47'),
(97, 'App\\Models\\Admin\\Product', 24, '1bba9bbf-cd1a-4033-a07d-e89788e45731', 'products/imageOne', 'Women\'s Performance Workwear Softshell Jacket', '1687163159.png', 'image/png', 'media', 'media', 154381, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 05:25:59', '2023-06-19 05:26:00'),
(98, 'App\\Models\\Admin\\Product', 24, '372f2ef1-b2f8-4a66-861d-2b111a177d2f', 'products/imageTwo', 'SJF002_BK_BK', '1687163160.jpg', 'image/jpeg', 'media', 'media', 193789, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 05:26:00', '2023-06-19 05:26:01'),
(99, 'App\\Models\\Admin\\Product', 24, '9dd92511-ee2c-4704-b492-74ac0cc08ce8', 'products/imageThree', 'SJF002_BK_A1', '1687163161.jpg', 'image/jpeg', 'media', 'media', 177840, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 05:26:01', '2023-06-19 05:26:02'),
(100, 'App\\Models\\Admin\\Product', 25, 'a5a00180-1dd1-4987-a973-1386432718cc', 'products/imageOne', 'Women\'s DuraTech Renegade Insulated Jacket', '1687163853.png', 'image/png', 'media', 'media', 187672, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-06-19 05:37:33', '2023-06-19 05:37:34'),
(101, 'App\\Models\\Admin\\Product', 25, '0908fd49-c307-455e-b1dd-932d8009c304', 'products/imageTwo', 'FJ085_BD_BK', '1687163854.jpg', 'image/jpeg', 'media', 'media', 302849, '[]', '[]', '{\"thumb\": true}', '[]', 2, '2023-06-19 05:37:34', '2023-06-19 05:37:35'),
(102, 'App\\Models\\Admin\\Product', 25, '318be23f-a941-4ef6-b895-f99b307009a9', 'products/imageThree', 'FJ085_BD_A1', '1687163855.jpg', 'image/jpeg', 'media', 'media', 221136, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 05:37:35', '2023-06-19 05:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000001_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_02_04_104104_create_sessions_table', 1),
(11, '2023_02_04_105309_create_admins_table', 1),
(12, '2023_02_04_121726_add_two_factor_columns_to_admins_table', 1),
(13, '2023_02_08_174204_create_categories_table', 1),
(14, '2023_02_08_174637_create_brands_table', 1),
(15, '2023_02_11_134109_create_media_table', 1),
(16, '2023_02_14_160002_create_subcategories_table', 1),
(17, '2023_02_16_134043_create_coupons_table', 1),
(18, '2023_02_16_150743_create_newsletters_table', 1),
(19, '2023_02_17_080544_create_products_table', 1),
(20, '2023_02_23_090111_create_posts_table', 1),
(21, '2023_02_23_102657_create_blog_categories_table', 1),
(22, '2023_03_02_103658_create_wishlists_table', 1),
(23, '2023_03_12_103734_create_settings_table', 1),
(24, '2023_03_22_075325_create_post_translations_table', 1),
(25, '2023_03_23_092406_create_blog_category_translations_table', 1),
(26, '2023_03_23_120654_create_category_translations_table', 1),
(27, '2023_03_23_144718_create_subcategory_translations_table', 1),
(28, '2023_03_24_083837_create_product_translations_table', 1),
(29, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(30, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(31, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(32, '2016_06_01_000004_create_oauth_clients_table', 2),
(33, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'HUpgIFU3aeFK3DlOQ4BWp1Y0oWcrEjfi3PIDi6k9', NULL, 'http://localhost', 1, 0, 0, '2023-06-19 06:12:31', '2023-06-19 06:12:31'),
(2, NULL, 'Laravel Password Grant Client', 'dMw5av6iEbMCb74RgYuawiLLkmb180mg7NdggGDv', 'users', 'http://localhost', 0, 1, 0, '2023-06-19 06:12:32', '2023-06-19 06:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-06-19 06:12:31', '2023-06-19 06:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE `post_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `product_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int DEFAULT NULL,
  `hot_deal` int DEFAULT NULL,
  `best_rated` int DEFAULT NULL,
  `mid_slider` int DEFAULT NULL,
  `hot_new` int DEFAULT NULL,
  `buyone_getone` int DEFAULT NULL,
  `trend` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `code`, `quantity`, `product_details`, `color`, `size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `buyone_getone`, `trend`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, NULL, '100001', 123, NULL, NULL, 'M,L,XL,XXL', '35', NULL, 'https://youtu.be/N5ctY9nPt9o123', 1, 0, 0, 0, 0, 0, 0, 1, '2023-06-12 09:08:44', '2023-06-12 10:27:25'),
(2, 1, 1, 21, NULL, '100002', 132, NULL, NULL, 'M,L,XL,XXL', '23', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 1, 0, 1, 1, '2023-06-12 09:32:06', '2023-06-20 06:20:29'),
(3, 1, 1, 15, NULL, '100003', 128, NULL, NULL, 'M,L,XL,XXL', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 1, 1, 1, 0, 0, 1, 0, 1, '2023-06-12 09:53:42', '2023-06-12 09:53:42'),
(4, 1, 1, 18, NULL, '100004', 134, NULL, NULL, 'M,L,XL,XXL', '34', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 0, 1, 0, 0, 1, 1, '2023-06-12 10:36:31', '2023-06-12 10:36:31'),
(5, 1, 1, 20, NULL, '100005', 143, NULL, NULL, 'M,L,XL,XXL', '23', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 0, 1, 0, 1, 1, 1, '2023-06-12 10:45:55', '2023-06-12 10:45:55'),
(6, 1, 1, 22, NULL, '100006', 128, NULL, NULL, 'M,L,XL,XXL', '20', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 1, 1, 1, 1, '2023-06-12 10:56:05', '2023-06-12 10:56:05'),
(7, 1, 2, 21, NULL, '100007', 125, NULL, NULL, 'M,L,XL,XXL', '43', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 0, 0, 1, 1, 1, 1, '2023-06-12 11:14:52', '2023-06-12 11:14:52'),
(8, 1, 2, 12, NULL, '100008', 135, NULL, NULL, 'M,L,XL,XXL', '50', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-12 11:27:23', '2023-06-19 03:03:35'),
(9, 1, 2, 12, NULL, '100009', 136, NULL, NULL, 'M,L,XL,XXL', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 1, 1, 1, '2023-06-12 11:36:51', '2023-06-12 11:36:51'),
(10, 1, 2, 20, NULL, '100010', 127, NULL, NULL, 'M,L,XL,XXL,XXXL', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 1, 1, 1, '2023-06-19 02:20:45', '2023-06-19 02:21:25'),
(11, 1, 3, 16, NULL, '100011', 25, NULL, NULL, 'M,L,XL,XXL,XXXL', '305', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 1, 0, 1, 1, 1, '2023-06-19 02:31:09', '2023-06-19 02:31:09'),
(12, 1, 3, 18, NULL, '100012', 30, NULL, NULL, 'M,L,XL,XXL,XXXL', '125', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 1, 1, 1, 0, 1, '2023-06-19 02:38:19', '2023-06-19 02:39:12'),
(13, 1, 3, 20, NULL, '100013', 34, NULL, NULL, 'S,M,L,XL,XXL,XXXL', '55', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 1, 1, 0, 1, '2023-06-19 03:02:06', '2023-06-20 06:17:25'),
(14, 2, 4, 18, NULL, '100014', 124, NULL, NULL, 'XS,S,M,L,XL,XXL', '25', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-19 03:12:07', '2023-06-19 03:12:07'),
(15, 2, 4, 20, NULL, '100015', 126, NULL, NULL, 'S,M,L,XL', '25', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-19 03:20:30', '2023-06-19 03:20:30'),
(16, 2, 4, 16, NULL, '100016', 125, NULL, NULL, 'S,M,L,XL', '35', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 0, 0, 1, 1, '2023-06-19 03:30:40', '2023-06-19 03:30:40'),
(17, 2, 4, 18, NULL, '100017', 125, NULL, NULL, 'XS,S,M,L,XL', '30', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 1, 0, 1, 1, '2023-06-19 03:53:26', '2023-06-19 03:53:26'),
(18, 2, 4, 20, NULL, '100018', 118, NULL, NULL, 'XS,S,M,L,XL', '25', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-19 04:03:25', '2023-06-19 04:03:25'),
(19, 2, 4, 16, NULL, '100019', 112, NULL, NULL, 'XS,S,M,L,XL', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-19 04:47:05', '2023-06-19 04:47:05'),
(20, 2, 5, 20, NULL, '100020', 127, NULL, NULL, '26,27,28,29,30,32,34', '65', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 1, 1, 0, 1, '2023-06-19 04:57:38', '2023-06-19 04:57:38'),
(21, 2, 5, 21, NULL, '100021', 135, NULL, NULL, '24,25,26,27,28,29,30,31,32,34', '60', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 1, 1, 1, '2023-06-19 05:03:33', '2023-06-19 05:03:33'),
(22, 2, 5, 12, NULL, '100022', 117, NULL, NULL, '2,4,6,8,10,12,14', '45', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 0, 1, 1, 1, '2023-06-19 05:10:43', '2023-06-19 05:20:06'),
(23, 2, 5, 20, NULL, '100023', 123, NULL, NULL, '4,6,8,10,12,14,16', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 1, 1, 1, 1, '2023-06-19 05:18:43', '2023-06-20 06:17:49'),
(24, 2, 6, 22, NULL, '100024', 18, NULL, NULL, 'S,L,XXL', '85', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 1, 0, 1, 0, 1, '2023-06-19 05:25:57', '2023-06-19 05:25:57'),
(25, 2, 6, 21, NULL, '100025', 15, NULL, NULL, 'S,M,L,XL,XXL', '120', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 1, 0, 1, 1, '2023-06-19 05:37:32', '2023-06-19 05:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `locale`, `product_name`, `product_details`, `color`) VALUES
(1, 1, 'en', 'Heavyweight Long Sleeve T-Shirt', '<p>Built to last longer and feel better, this Long Sleeve Henley is the kind of shirt that’ll never see the bottom of a drawer or the back of a closet. Wherever they’re put to the test, Henleys are as hardworking as they come.<br><br>    Traditional fit lets you move with comfort and ease<br>    Heavyweight fabric is durable, but soft—comfortable in any season<br>    Built to last with taped neck and shoulder seams that won\'t unravel<br>    Tag-free neck prevents chafing and irritation<br>    Chest pocket with pencil divider keeps necessities handy<br>    3-button closure at neck<br>    Jersey Knit, 100% Cotton<br>    Madder Brown<br></p>', 'brown,navy,green'),
(2, 1, 'uk', 'Надважка Футболка з Довгим Рукавом', '<p>Ця сорочка з довгим рукавом Henley, створена для того, щоб служити довше та відчувати себе краще, — це той тип сорочки, який ніколи не побачить дна шухляди чи задньої стінки шафи. Де б їх не випробовували, Henley такі ж працьовиті.<br><br>     Традиційна посадка дозволяє рухатися з комфортом і легкістю<br>     Важка тканина міцна, але м\'яка, комфортна в будь-який сезон<br>     Створений для довговічності з проклеєними швами горловини та плечей, які не розпускаються<br>     Шия без ярликів запобігає натиранню та подразненню<br>     Нагрудна кишеня з перегородкою для олівців дозволяє зберігати необхідні речі під рукою<br>     Застібка на горловині на 3 ґудзики<br>     Трикотаж джерсі, 100% бавовна<br>     Меддер Браун<br></p>', 'рудий,синій,зелений'),
(3, 2, 'en', 'Long Sleeve Pocket T-Shirt', '<p class=\"flex\"><span itemprop=\"description\">Whether you\'re wearing it \r\nas a shirt or an undershirt, the roomy design and cotton jersey \r\nconstruction of Long Sleeve Heavyweight Crew Neck Tee is a best\r\n seller that will keep you comfortable all day. The long tail keeps you \r\ncovered in the back for anything—so you can wear on or off the job—while\r\n the chest pocket with pencil divider lets you store your must-have \r\naccessories.</span></p><ul class=\"pdp-list\"><li>Spacious fit with long tail</li><li>100% Heavyweight Cotton Jersey</li><li>Heather Gray: 90% Cotton/10% Polyester</li><li>Ash Gray: 99% Cotton/1% Polyester</li><li>Taped neck and shoulder seams won\'t unravel</li><li>Traditional chest pocket with pencil divider</li><li>Tagless label for non-chafing comfort</li><li class=\"pdp-list-color\">Charcoal Gray </li></ul>', 'gray,black,red'),
(4, 2, 'uk', 'Футболка з довгим рукавом і кишенькою', '<p>Незалежно від того, чи носите ви її як сорочку чи нижню сорочку, просторий дизайн і конструкція з бавовняного трикотажу Long Sleeve Heavyweight Crew Neck Tee є бестселером, який забезпечить вам комфорт протягом усього дня. Довгий хвіст захищає спину від чого завгодно, тому ви можете носити його як на роботі, так і поза ним, а нагрудна кишеня з перегородкою для олівців дозволяє зберігати необхідні аксесуари.<br><br>     Просторий крій з довгим хвостом<br>     100% важкий бавовняний трикотаж<br>     Heather Gray: 90% бавовна/10% поліестер<br>     Попелясто-сірий: 99% бавовна/1% поліестер<br>     Проклеєні горловина і плечові шви не розпускаються<br>     Традиційна нагрудна кишеня з перегородкою для олівців<br>     Етикетка без ярликів для комфорту без натирання<br>     Вугільно-сірий<br></p>', 'сірий,чорний,червоний'),
(5, 3, 'en', 'Long Sleeve T-Shirt', '<p>The very best part about a henley is that in all its simplicity, it manages to be so effortlessly stylish. So classic and so fresh, Long Sleeve Henley Shirt is constructed from ring spun cotton jersey that makes it extra durable and extremely soft. Logo is proudly screen printed at the front chest to show off your appreciation for authentic workwear.<br><br>    Relaxed fit<br>    Henley button placket<br>    Rib knit collar and cuffs<br>    Dickies screen print graphic at chest<br>    185 gsm. 100% Cotton Jersey<br>    Olive Green<br></p>', 'orange,black,olive'),
(6, 3, 'uk', 'Футболка з Довгим Рукавом', '<p>Найкраща частина хенлі полягає в тому, що при всій своїй простоті вона вдається бути такою легкою, стильною. Така класична та така свіжа сорочка Long Sleeve Henley виготовлена з бавовняного трикотажу кільцевого прядіння, що робить її надзвичайно міцною та надзвичайно м’якою. Логотип з гордістю нанесений трафаретним друком на передній частині грудей, щоб продемонструвати вашу вдячність за справжній робочий одяг.<br><br>     Розслаблений крій<br>     Планка на ґудзиках<br>     Комір і манжети в\'язані в рубчик<br>     Трафаретний друк на грудях<br>     185 г/кв.м. 100% бавовняний трикотаж<br>     Оливково-зелений<br></p>', 'оранжевий,чорний,оливковий'),
(7, 4, 'en', 'Long Sleeve Henley T-Shirt', '<p>Built to last longer and feel better, this Long Sleeve Henley is the kind of shirt that’ll never see the bottom of a drawer or the back of a closet. Wherever they’re put to the test, Heavyweight Henleys are as hardworking as they come.<br><br>&nbsp;&nbsp;&nbsp; Traditional fit lets you move with comfort and ease<br>&nbsp;&nbsp;&nbsp; Heavyweight fabric is durable, but soft—comfortable in any season<br>&nbsp;&nbsp;&nbsp; Built to last with taped neck and shoulder seams that won\'t unravel<br>&nbsp;&nbsp;&nbsp; Tag-free neck prevents chafing and irritation<br>&nbsp;&nbsp;&nbsp; Chest pocket with pencil divider keeps necessities handy<br>&nbsp;&nbsp;&nbsp; 3-button closure at neck<br>&nbsp;&nbsp;&nbsp; Jersey Knit, 100% Cotton<br>&nbsp;&nbsp;&nbsp; Chocolate Brown<br><br><br></p>', 'brown,black,sand'),
(8, 4, 'uk', 'Футболка з Довгим Рукавом Henley', '<p>Ця сорочка з довгим рукавом Henley, створена для того, щоб служити довше та відчувати себе краще, — це той тип сорочки, який ніколи не побачить дна шухляди чи задньої стінки шафи. Де б їх не випробовували, Heavyweight Henley такі ж працьовиті.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Традиційна посадка дозволяє рухатися з комфортом і легкістю<br>&nbsp;&nbsp;&nbsp;&nbsp; Важка тканина міцна, але м\'яка, комфортна в будь-який сезон<br>&nbsp;&nbsp;&nbsp;&nbsp; Створений для довговічності з проклеєними швами горловини та плечей, які не розпускаються<br>&nbsp;&nbsp;&nbsp;&nbsp; Шия без ярликів запобігає натиранню та подразненню<br>&nbsp;&nbsp;&nbsp;&nbsp; Нагрудна кишеня з перегородкою для олівців дозволяє зберігати необхідні речі під рукою<br>&nbsp;&nbsp;&nbsp;&nbsp; Застібка на горловині на 3 ґудзики<br>&nbsp;&nbsp;&nbsp;&nbsp; Трикотаж джерсі, 100% бавовна<br>&nbsp;&nbsp;&nbsp;&nbsp; Шоколадно-коричневий<br></p>', 'коричневий,чорний,пісочний'),
(9, 5, 'en', 'Short Sleeve Henley T-Shirt', '<p>Buttoned up or buttoned down, the choice is yours. The hardworking Heavyweight Henley T-Shirt is a classic that’s tough enough to handle full days on the job. Made from heavyweight cotton that’s ultra-durable and soft, it’ll quickly become a year-round staple tee.<br><br>&nbsp;&nbsp;&nbsp; Relaxed fit lets you move comfortably and freely<br>&nbsp;&nbsp;&nbsp; Tag-free label prevents chaffing and irritation<br>&nbsp;&nbsp;&nbsp; Taped neck and shoulder seams won’t unravel<br>&nbsp;&nbsp;&nbsp; Chest pocket with pencil divider keeps necessities handy<br>&nbsp;&nbsp;&nbsp; 3-button closure at neck<br>&nbsp;&nbsp;&nbsp; Jersey Knit, 100% Cotton<br>&nbsp;&nbsp;&nbsp; Desert Sand<br></p>', 'sand,gray,navy'),
(10, 5, 'uk', 'Футболка з Коротким Рукавом Henley', '<p>На ґудзиках чи на ґудзиках – вибір за вами. Працьовита футболка Heavyweight Henley — це класика, яка достатньо міцна, щоб витримати цілими днями на роботі. Виготовлена з надміцної та м’якої бавовни, вона швидко стане основною футболкою протягом усього року.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Невимушений крій дозволяє рухатися комфортно та вільно<br>&nbsp;&nbsp;&nbsp;&nbsp; Етикетка без міток запобігає натиранню та подразненню<br>&nbsp;&nbsp;&nbsp;&nbsp; Проклеєні горловина і плечові шви не розпускаються<br>&nbsp;&nbsp;&nbsp;&nbsp; Нагрудна кишеня з перегородкою для олівців дозволяє зберігати необхідні речі під рукою<br>&nbsp;&nbsp;&nbsp;&nbsp; Застібка на горловині на 3 ґудзики<br>&nbsp;&nbsp;&nbsp;&nbsp; Трикотаж джерсі, 100% бавовна<br>&nbsp;&nbsp;&nbsp;&nbsp; Пісок пустелі<br></p>', 'пісочний,сірий,синій'),
(11, 6, 'en', 'Short Sleeve Heathered T-Shirt', '<p>Made to stand the test of time, this heavyweight tee might be half cotton, half polyester, but it\'s 100% dependable. The soft, heathered color along with the logo\'d chest pocket kicks its classic look up a notch.<br><br>&nbsp;&nbsp;&nbsp; Traditional fit lets you move with comfort and ease<br>&nbsp;&nbsp;&nbsp; Heavyweight fabric is durable, but soft, comfortable in any season<br>&nbsp;&nbsp;&nbsp; Single dyed to give it a softer, worn-in look<br>&nbsp;&nbsp;&nbsp; Built to last with taped neck and shoulder seams that won\'t unravel<br>&nbsp;&nbsp;&nbsp; Tag-free neck prevents chafing and irritation<br>&nbsp;&nbsp;&nbsp; Chest pocket with logo<br>&nbsp;&nbsp;&nbsp; Made of 50% cotton, 50% polyester<br>&nbsp;&nbsp;&nbsp; Fern Heather<br><br><br></p>', 'heather,burgundy,blue'),
(12, 6, 'uk', 'Верескова Футболка з Коротким Рукавом', '<p>Створена, щоб витримати випробування часом, ця важка футболка може бути наполовину бавовняною, наполовину поліестеровою, але вона надійна на 100%. М\'який, вересковий колір разом із нагрудною кишенею з логотипом підносить класичний вигляд на новий рівень.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Традиційна посадка дозволяє рухатися з комфортом і легкістю<br>&nbsp;&nbsp;&nbsp;&nbsp; Важка тканина міцна, але м\'яка, комфортна в будь-який сезон<br>&nbsp;&nbsp;&nbsp;&nbsp; Однократно пофарбований, щоб надати йому більш м’який, потертий вигляд<br>&nbsp;&nbsp;&nbsp;&nbsp; Створений для довговічності з проклеєними швами горловини та плечей, які не розпускаються<br>&nbsp;&nbsp;&nbsp;&nbsp; Шия без ярликів запобігає натиранню та подразненню<br>&nbsp;&nbsp;&nbsp;&nbsp; Нагрудна кишеня з логотипом<br>&nbsp;&nbsp;&nbsp;&nbsp; Склад: 50% бавовна, 50% поліестер<br>&nbsp;&nbsp;&nbsp;&nbsp; Папороть Верес<br></p>', 'вересовий,бордовий,синій'),
(13, 7, 'en', 'Relaxed Fit Straight Leg Duck Carpenter Pants', '<p>See why the Relaxed Fit Heavyweight Duck Carpenter Pants are a 5-Star customer favorite. The easy fit deals with boots and bending, while pockets and loops take care of all your tools. Extra heavyweight Duck canvas will stand up to tough jobs, but the broken-in garment-washed feel will keep its shape wash after wash.<br><br>&nbsp;&nbsp;&nbsp; Sits slightly below waist; straight leg<br>&nbsp;&nbsp;&nbsp; Relaxed fit leaves room in the seat and thighs for all-day comfort on the job; designed to fit over boots<br>&nbsp;&nbsp;&nbsp; Garment-washed fabric for softness and to resist shrinking<br>&nbsp;&nbsp;&nbsp; Two tool pockets; hammer loop<br>&nbsp;&nbsp;&nbsp; Reinforced seams; rivets at stress points to help prevent ripping; yoke, seat and side seams triple-stitched for added toughness<br>&nbsp;&nbsp;&nbsp; 12 oz. Heavyweight Duck, 100% Cotton<br>&nbsp;&nbsp;&nbsp; Brass rivets prevent rips at stress points<br>&nbsp;&nbsp;&nbsp; Garment washed for softness and shrinkage control<br>&nbsp;&nbsp;&nbsp; Fits over boots<br>&nbsp;&nbsp;&nbsp; Rinsed Chocolate Brown<br></p>', 'brown,black,sand'),
(14, 7, 'uk', 'Легкі Штани Прямого Крою Duck Carpenter', '<p>Дізнайтеся, чому штани Relaxed Fit Heavyweight Duck Carpenter Pants є улюбленими 5-зірковими покупцями. Легка посадка справляється з черевиками та згинанням, а кишені та петлі подбають про всі ваші інструменти. Надзвичайно важке полотно Duck витримає важкі роботи, але відчуття, що випрали поламаний одяг, збереже свою форму після прання.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Сидить трохи нижче талії; пряма нога<br>&nbsp;&nbsp;&nbsp;&nbsp; Легка посадка залишає простір у сидінні та стегнах для комфорту протягом усього дня; призначений для одягання поверх черевиків<br>&nbsp;&nbsp;&nbsp;&nbsp; Тканина, випрана для одягу, забезпечує м’якість і стійкість до усадки<br>&nbsp;&nbsp;&nbsp;&nbsp; дві кишені для інструментів; молоткова петля<br>&nbsp;&nbsp;&nbsp;&nbsp; Посилені шви; заклепки в місцях напруги, щоб запобігти розриву; кокетка, сидіння та бокові шви потрійні для додаткової міцності<br>&nbsp;&nbsp;&nbsp;&nbsp; 12 унцій Важка качка, 100% бавовна<br>&nbsp;&nbsp;&nbsp;&nbsp; Латунні заклепки запобігають розривам у місцях напруги<br>&nbsp;&nbsp;&nbsp;&nbsp; Одяг прали для м’якості та контролю усадки<br>&nbsp;&nbsp;&nbsp;&nbsp; Підходить поверх чобіт<br>&nbsp;&nbsp;&nbsp;&nbsp; Промитий шоколадно-коричневий<br></p>', 'коричневий,чорний,пісочний'),
(15, 8, 'en', 'Skateboarding Double Knee Pants', '<p class=\"flex\"><span itemprop=\"description\">A true double knee pant \r\nwith contrast stitching in a moisture wicking polyester blend that \r\ncommands durability and poise in a class all its own. Regular fit high \r\nrise, and updated front button enclosure including red thread tape at \r\nthe zipper provides the style and security necessary to attack any \r\nobstacle the streets can dish.</span></p><ul class=\"pdp-list\"><li>Regular fit, high rise</li><li>Moisture wicking</li><li>Double knee</li><li>7.25 oz 65% Recycled Polyester/35% Cotton</li><li class=\"pdp-list-color\">Olive Green </li></ul>', 'olive,brown,gray'),
(16, 8, 'uk', 'Штани для Скейтбордингу з Подвійними Колінами', '<p>Справжні штани з подвійними колінами з контрастною прострочкою із вологопоглинаючої суміші поліестеру, яка забезпечує довговічність і врівноваженість у своєму класі. Звичайна висока посадка та оновлена передня застібка на ґудзиках із червоною стрічкою на блискавці забезпечують стиль і безпеку, необхідні для боротьби з будь-якою перешкодою, яку можуть подолати вулиці.<br><br>     Звичайний крій, висока посадка<br>     Відведення вологи<br>     Подвійне коліно<br>     7,25 унцій 65% переробленого поліестеру/35% бавовни<br>     Оливково-зелений<br></p>', 'оливковий,коричневий,сірий'),
(17, 9, 'en', 'Active Waist Relaxed Fit Jeans', '<p>The Flex Active Waist 5-Pocket Relaxed Fit Jeans are the perfect mix of performance denim and total comfort. Built strong and soft, the flex denim fabric and active waist stretch with you, so you can move effortlessly on the job. When you need to feel comfortable and move freely, this is the pair to reach for time and again.<br><br>&nbsp;&nbsp;&nbsp; Sits slightly below the waist; straight leg<br>&nbsp;&nbsp;&nbsp; Relaxed fit leaves room in the seat and thighs for all-day comfort on the job<br>&nbsp;&nbsp;&nbsp; Active waist stretches with you, so you never feel restricted<br>&nbsp;&nbsp;&nbsp; Flex fabric lets you move easily and comfortably<br>&nbsp;&nbsp;&nbsp; Rivets reinforce all stress points to prevent tearing<br>&nbsp;&nbsp;&nbsp; Classic, 5-pocket styling offers plenty of storage<br>&nbsp;&nbsp;&nbsp; Button closure and zip fly with sturdy brass zipper<br>&nbsp;&nbsp;&nbsp; 10.9 oz. Stretch Denim, 74% Cotton/25% Polyester/1% Spandex<br>&nbsp;&nbsp;&nbsp; Rinsed Indigo Blue<br></p>', 'indigo'),
(18, 9, 'uk', 'Джинси Вільного Крою З Активною Талією', '<p>Джинси Flex Active Waist 5-Pocket Relaxed Fit Jeans — це ідеальне поєднання ефективного деніму та повного комфорту. Створена міцною та м’якою, гнучка джинсова тканина та активна талія тягнуться разом з вами, щоб ви могли легко рухатися на роботі. Коли вам потрібно почуватися комфортно та вільно рухатися, це пара, до якої можна тягнутися знову й знову.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Сидить трохи нижче талії; пряма нога<br>&nbsp;&nbsp;&nbsp;&nbsp; Легка посадка залишає простір у сидінні та стегнах для комфорту протягом усього дня<br>&nbsp;&nbsp;&nbsp;&nbsp; Активна талія тягнеться разом з вами, тому ви ніколи не відчуваєте обмежень<br>&nbsp;&nbsp;&nbsp;&nbsp; Гнучка тканина дозволяє пересуватися легко та комфортно<br>&nbsp;&nbsp;&nbsp;&nbsp; Заклепки зміцнюють усі точки напруги, щоб запобігти розриву<br>&nbsp;&nbsp;&nbsp;&nbsp; Класичний дизайн із 5 кишенями пропонує багато місця для зберігання<br>&nbsp;&nbsp;&nbsp;&nbsp; Застібка на ґудзики та блискавка з міцною латунною блискавкою<br>&nbsp;&nbsp;&nbsp;&nbsp; 10,9 унцій Еластичний денім, 74% бавовна/25% поліестер/1% спандекс<br>&nbsp;&nbsp;&nbsp;&nbsp; Промитий синій індиго<br></p>', 'індиго'),
(19, 10, 'en', 'Relaxed Fit Duck Carpenter Pants', '<p>Feel confident in your jeans with Dickies\' Relaxed Fit Duck Carpenter Pants. Made into durable duck fabric from 100% cotton, this pant is surprisingly lightweight and comfortable. The garment-washed design provides softness and shrinkage control. Anywhere you go, your tools can come with you due to the classic pocket styling, along with a utility pocket and hammer loop.<br><br>    Sits slightly below waist; extra room in seat and thigh; straight leg<br>    9 oz. Duck, 100% Cotton<br>    Utility pocket<br>    Hammer loop<br>    Lightweight duck fabric<br>    Garment washed for softness and shrinkage control<br>    Rinsed Brown<br></p>', 'rinsed-brown,rinsed-timber-brown,olive'),
(20, 10, 'uk', 'Легкі Штани Duck Carpenter', '<p>Відчуйте себе впевнено в своїх джинсах із штанами Dickies Relaxed Duck Carpenter Pants. Виготовлені з міцної качиної тканини зі 100% бавовни, ці штани напрочуд легкі та зручні. Дизайн одягу, який можна прати, забезпечує м’якість і контроль усадки. Куди б ви не пішли, ваші інструменти завжди будуть із вами завдяки класичному стилю кишені разом із зручною кишенею та петлею для молотка.<br><br>     Сидить трохи нижче талії; додаткове місце в сидінні та стегнах; пряма нога<br>     9 унцій Качка, 100% бавовна<br>     Утилітна кишеня<br>     Молоткова петля<br>     Легка качача тканина<br>     Одяг прали для м’якості та контролю усадки<br>     Прополосканий коричневий<br></p>', 'світло-коричневий,деревно-коричневий,олива'),
(21, 11, 'en', 'Performance Workwear Insulated Jacket', '<p>Perform at your best in extreme working conditions with Performance Workwear Insulated Jacket. Designed to protect and function through the toughest tasks, you\'ll achieve long-lasting wearability through the Cordura® nylon advanced abrasion-resistant construction that features a zippered Toolbox Pocket™ for reliable storage. Completely seam-sealed and waterproof, you\'ll gain even more protection from the integrated Hood Shield™ that supplies added warmth while protecting you from dust and debris<br><br>&nbsp;&nbsp;&nbsp; Regular fit<br>&nbsp;&nbsp;&nbsp; Double closure front placket with full zip and snap fastening; Seam-sealed and waterproof<br>&nbsp;&nbsp;&nbsp; Cordura® nylon advanced abrasion-resistant panels: shoulder yoke and front pockets<br>&nbsp;&nbsp;&nbsp; Integrated Hood Shield™ for added warmth and protection from dust and debris<br>&nbsp;&nbsp;&nbsp; 3-piece hood; Kangaroo front pockets with zipper fastening<br>&nbsp;&nbsp;&nbsp; Zippered Toolbox Pocket™ for reliable storage; Back side entry glove pocket; Drop tail hem<br>&nbsp;&nbsp;&nbsp; Ergonomic elbow for added movement; Silicon cuff adjuster<br>&nbsp;&nbsp;&nbsp; 7 oz. 100% Nylon Plain Weave with DWR<br>&nbsp;&nbsp;&nbsp; Brown Duck<br><br><br></p>', 'brown,black'),
(22, 11, 'uk', 'Утеплена Куртка Performance Workwear', '<p>Працюйте якнайкраще в екстремальних умовах роботи з утепленою курткою Performance Workwear Workwear. Створений для захисту та функціонування під час найскладніших завдань, ви досягнете довготривалої зносостійкості завдяки покращеній зносостійкій конструкції з нейлону Cordura®, яка має кишеню Toolbox Pocket™ на блискавці для надійного зберігання. Повністю герметичний і водонепроникний, ви отримаєте ще більше захисту завдяки інтегрованому Hood Shield™, який забезпечує додаткове тепло, захищаючи вас від пилу та сміття<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Звичайна посадка<br>&nbsp;&nbsp;&nbsp;&nbsp; Подвійна передня планка з повною блискавкою та застібкою на кліп; Герметичний і водонепроникний<br>&nbsp;&nbsp;&nbsp;&nbsp; Удосконалені нейлонові панелі Cordura®, стійкі до стирання: плечова кокетка та передні кишені<br>&nbsp;&nbsp;&nbsp;&nbsp; Вбудований Hood Shield™ для додаткового тепла та захисту від пилу та сміття<br>&nbsp;&nbsp;&nbsp;&nbsp; капюшон з 3 частин; Передні кишені кенгуру на блискавці<br>&nbsp;&nbsp;&nbsp;&nbsp; Zippered Toolbox Pocket™ для надійного зберігання; Зворотна бічна кишеня для рукавичок; Подол хвоста<br>&nbsp;&nbsp;&nbsp;&nbsp; Ергономічний лікоть для додаткового руху; Силіконовий регулятор манжети<br>&nbsp;&nbsp;&nbsp;&nbsp; 7 унцій 100% нейлон полотняного переплетення з DWR<br>&nbsp;&nbsp;&nbsp;&nbsp; коричнева качка<br></p>', 'коричневий,чорний'),
(23, 12, 'en', 'DuraTech Renegade FLEX Duck Jacket', '<p>Rise to the demands of your workday without sacrificing ultimate protection in Duratech Renegade FLEX Duck Jacket. The highly durable and triple needle reinforced Duck fabric construction comes equipped with FLEX technology for mobility and comfort, as well as a Durable Water Repellent finish to safeguard you from rainy weather. The patented SafeCinch™ internal mechanism provides the benefit of adjusting the drawcords through the interior of the front pockets, preventing you from getting caught up as you navigate the most protective cinched fit. Complete with a drop tail hem for added coverage, a hidden storm cuff for superior warmth and a zippered storm flap to defend against the elements, there\'s nothing this jacket isn\'t prepared to face.<br><br>    Regular fit<br>    FLEX fabric for ease of movement and added comfort<br>    Durable Water Repellent (DWR) finish<br>    Patented SafeCinch internal mechanism eliminates hood drawstrings while elevating safety<br>    Storm flap with zipper closure; Triple needle reinforced seams; Reinforcements in key wear down areas<br>    Chest pocket with secure pocket flap; Zippered security pocket; Interior pocket to secure valuables<br>    Underarm mobility gussets; Elbow darts for articulation and movement; Drop tail hem for added coverage<br>    9 oz. Duck, 63% Cotton/35% Polyester/2% Spandex<br>    Black<br><br><br></p>', 'black,brown'),
(24, 12, 'uk', 'Куртка DuraTech Renegade FLEX Duck', '<p>Виконуйте вимоги свого робочого дня, не жертвуючи найкращим захистом у куртці Duratech Renegade FLEX Duck. Надзвичайно міцна конструкція тканини Duck, зміцнена трьома голками, оснащена технологією FLEX для мобільності та комфорту, а також міцним водовідштовхувальним покриттям, яке захистить вас від дощової погоди. Запатентований внутрішній механізм SafeCinch™ забезпечує перевагу регулювання шнурів через внутрішню частину передніх кишень, запобігаючи тому, щоб вас застрягли під час навігації з найбільш захисним затягуванням. Ця куртка має низький край для додаткового покриття, приховану штормову манжету для чудового тепла та штормовий клапан на блискавці для захисту від негоди.<br><br>     Звичайна посадка<br>     Тканина FLEX для зручності рухів і додаткового комфорту<br>     Міцне водовідштовхувальне покриття (DWR).<br>     Запатентований внутрішній механізм SafeCinch усуває застібки на капюшоні, підвищуючи безпеку<br>     штормовий клапан із застібкою-блискавкою; Шви з потрійною голкою; Підсилення в ключових зонах зносу<br>     Нагрудна кишеня з надійним клапаном; Захистна кишеня на блискавці; Внутрішня кишеня для зберігання цінних речей<br>     ластовиці під пахвами; Ліктьові дротики для артикуляції та руху; Занижений край для додаткового покриття<br>     9 унцій Качка, 63% бавовна/35% поліестер/2% спандекс<br>     чорний<br></p>', 'коричневий,чорний'),
(25, 13, 'en', 'Duck Canvas Hooded Shirt Jacket', '<p>You don\'t stop when it\'s damp or chilly. The Hooded Shirt Jacket keeps up with you, no matter the weather. Rugged canvas Duck is upgraded with water-repelling treatments, and the jersey hood adds warmth like your favorite sweatshirt. Multiple warming pockets give you everything you need in a single easy-on layer.<br><br>    Relaxed fit lets you move comfortably and freely<br>    Durable water repellent technology makes water bead up and roll off fabric<br>    Three-piece hood for a closer fit, with soft jersey lining<br>    Full zip closure with snap plackets to resist wind<br>    Chest pockets; side pockets with fleece to warm hands<br>    Lining: 4x4 quilted taffeta to slide on easily<br>    8.1 oz. Brushed Duck; 100% Cotton<br>    Dark Navy<br><br><br></p>', 'navy,brown,black,gray'),
(26, 13, 'uk', 'Куртка-сорочка З Полотняної Тканини З Капюшоном', '<p>Ви не зупиняєтеся, коли сиро чи холодно. Куртка-сорочка з капюшоном не відстає від вас, незважаючи на погоду. Міцна тканина Duck покращена водовідштовхувальним покриттям, а капюшон із трикотажу додає тепла, як ваш улюблений світшот. Кілька теплих кишень — це все, що вам потрібно, в одному легкому шарі.<br><br>     Невимушений крій дозволяє рухатися комфортно та вільно<br>     Надійна водовідштовхувальна технологія змушує воду згортати та скочувати тканину<br>     Капюшон із трьох частин для щільнішої посадки, підкладка з м’якого трикотажу<br>     Повна застібка-блискавка з планками для захисту від вітру<br>     Нагрудні кишені; бічні кишені з флісом для зігрівання рук<br>     Підкладка: стьобана тафта 4x4 для легкого ковзання<br>     8,1 унції щітова качка; 100% бавовна<br>     Темно-синій<br></p>', 'синій,коричневий,чорний,сірий'),
(27, 14, 'en', 'Women\'s Cooling Long Sleeve Pocket T-Shirt', '<p>Hard work knows no bounds, and neither does Women\'s Long Sleeve Cooling Temp-iQ® Performance T-Shirt. Worn to workout, in the yard or any job site is perfect for this performance tee made with a regular fit for less constriction. The Jersey material stays soft to the touch so you’ll keep comfortable while you’re working hard. You’ll also have advanced temperature control as the Temp-iQ intelligent cooling technology wicks away sweat to keep you cool and dry. Topping it all off, this shirt has stain release, making it very easy to care for no matter how dirty it gets.<br><br>&nbsp;&nbsp;&nbsp; Regular fit<br>&nbsp;&nbsp;&nbsp; Temp-iQ intelligent cooling for advanced temperature control<br>&nbsp;&nbsp;&nbsp; Easy care, stain release<br>&nbsp;&nbsp;&nbsp; Moisture wicking<br>&nbsp;&nbsp;&nbsp; Reflective logo at hem<br>&nbsp;&nbsp;&nbsp; 185 gsm. Jersey, 50% Cotton/50% Polyester<br>&nbsp;&nbsp;&nbsp; Machine wash<br>&nbsp;&nbsp;&nbsp; Navy<br><br><br></p>', 'navy,blue,orange,yellow,gray'),
(28, 14, 'uk', 'Жіноча Прохолодна Футболка З Кишенями І Довгим Рукавом', '<p>Важка праця не знає меж, як і жіноча футболка з довгим рукавом Cooling Temp-iQ® Performance. Ця ефективна футболка ідеально підходить для тренування, у дворі чи на будь-якій іншій роботі. Вона має звичайну посадку для меншого звуження. Джерсі залишається м’яким на дотик, тому вам буде комфортно під час важкої роботи. Ви також матимете вдосконалений контроль температури, оскільки інтелектуальна технологія охолодження Temp-iQ відводить піт, щоб ви залишалися прохолодними та сухими. На довершення до всього ця сорочка має захист від плям, тому за нею дуже легко доглядати, незалежно від того, наскільки вона брудна.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Звичайна посадка<br>&nbsp;&nbsp;&nbsp;&nbsp; Інтелектуальне охолодження Temp-iQ для розширеного контролю температури<br>&nbsp;&nbsp;&nbsp;&nbsp; Легкий догляд, видалення плям<br>&nbsp;&nbsp;&nbsp;&nbsp; Відведення вологи<br>&nbsp;&nbsp;&nbsp;&nbsp; Світловідбиваючий логотип на подолі<br>&nbsp;&nbsp;&nbsp;&nbsp; 185 г/кв.м. Джерсі, 50% бавовна/50% поліестер<br>&nbsp;&nbsp;&nbsp;&nbsp; Машинне прання<br>&nbsp;&nbsp;&nbsp;&nbsp; Синій<br></p>', 'синій,блакитний,помаранчевий,жовтий,сірий'),
(29, 15, 'en', 'Women\'s Henley Long Sleeve Shirt', '<p>A classic design that pulls its weight wherever the job takes you. This Women\'s Long Sleeve Henley Shirt lets you get the job done in total comfort, featuring a soft and durable rib-knit fabric that takes the chill out of colder days. It\'s finished with a button-front Henley neckline for a timeless touch.<br><br>&nbsp;&nbsp;&nbsp; Slim fit lets you move comfortably and freely<br>&nbsp;&nbsp;&nbsp; Made with 1x1 rib knit for great fit and all-day comfort<br>&nbsp;&nbsp;&nbsp; Taped neck and shoulder seams won\'t unravel<br>&nbsp;&nbsp;&nbsp; 3-button closure<br>&nbsp;&nbsp;&nbsp; Extended sizes available<br>&nbsp;&nbsp;&nbsp; 180 gsm. Rib Knit, 60% Polyester/40% Cotton<br>&nbsp;&nbsp;&nbsp; Orchid<br></p>', 'denim,graphite,black,orchid'),
(30, 15, 'uk', 'Жіноча Сорочка З Довгим Рукавом Henley', '<p>Класичний дизайн, який тягне свою вагу, куди б ви не прийшли. Ця жіноча сорочка з довгим рукавом на пуговицах дає змогу виконувати роботу з повним комфортом завдяки м’якій і міцній трикотажній тканині в рубчик, яка позбавляє від холоду в холодні дні. Він закінчений вирізом на ґудзиках спереду для вічного штриху.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Тонкий крій дозволяє рухатися комфортно та вільно<br>&nbsp;&nbsp;&nbsp;&nbsp; Виготовлені з трикотажу в рубчик 1x1 для чудової посадки та комфорту протягом усього дня<br>&nbsp;&nbsp;&nbsp;&nbsp; Проклеєні горловина і плечові шви не розпускаються<br>&nbsp;&nbsp;&nbsp;&nbsp; Застібка на 3 кнопки<br>&nbsp;&nbsp;&nbsp;&nbsp; Доступні збільшені розміри<br>&nbsp;&nbsp;&nbsp;&nbsp; 180 г/кв.м. Трикотаж в рубчик, 60% поліестер/40% бавовна<br>&nbsp;&nbsp;&nbsp;&nbsp; Орхідея<br></p>', 'денім,графіт,чорний,орхідея'),
(31, 16, 'en', 'Women\'s Heavyweight Henley', '<p>Layering solutions come easy in Women\'s Heavyweight Henley. The comfortable cotton jersey construction is backed by moisture wicking technology to keep you cool and dry no matter how hard you\'re working. The rib knit neckline and patchwork shoulder seams up the ante on comfort while reducing chaffing as you move about your day. Complete with reinforced seams and a front chest pocket with pencil division, you\'ll achieve function and purpose in this everyday henley that is built to go the distance.<br><br>&nbsp;&nbsp;&nbsp; Moisture wicking<br>&nbsp;&nbsp;&nbsp; Four button placket for easy layering<br>&nbsp;&nbsp;&nbsp; Rib knit neckline for comfort and retention<br>&nbsp;&nbsp;&nbsp; Reinforced seams with shoulder inset to reduce shoulder chaffing<br>&nbsp;&nbsp;&nbsp; Chest pocket with pencil division<br>&nbsp;&nbsp;&nbsp; Solid: 203 gsm. Jersey, 100% Cotton<br>&nbsp;&nbsp;&nbsp; Heathered: 203 gsm. Jersey 60% Cotton/40% Polyester<br>&nbsp;&nbsp;&nbsp; Extended sizes available<br>&nbsp;&nbsp;&nbsp; Oatmeal<br><br><br></p>', 'outmeal,black'),
(32, 16, 'uk', 'Жіноча Heavyweight Henley', '<p>ішення для багатошаровості в Жіночій Heavyweight Henley. Зручна конструкція з бавовняного трикотажу підтримується технологією відводу вологи, щоб зберегти вам прохолоду та сухість незалежно від того, наскільки важко ви працюєте. Трикотажне декольте в рубчик і клаптеві плечові шви підвищують комфорт, одночасно зменшуючи натирання під час щоденних пересувань. У комплекті з посиленими швами та передньою нагрудною кишенею з роздільною олівцем ви досягнете функції та мети в цьому повсякденному пупсі, створеному, щоб йти на відстань.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Відведення вологи<br>&nbsp;&nbsp;&nbsp;&nbsp; Планка з чотирма ґудзиками для зручності багатошаровості<br>&nbsp;&nbsp;&nbsp;&nbsp; Трикотажний виріз у рубчик для комфорту та утримання<br>&nbsp;&nbsp;&nbsp;&nbsp; Посилені шви з плечовими вставками для зменшення натирання плечей<br>&nbsp;&nbsp;&nbsp;&nbsp; Нагрудна кишеня з поділом для олівців<br>&nbsp;&nbsp;&nbsp;&nbsp; Твердий: 203 г/кв.м. Джерсі, 100% бавовна<br>&nbsp;&nbsp;&nbsp;&nbsp; Нагрітий: 203 г/кв.м. Джерсі 60% бавовна/40% поліестер<br>&nbsp;&nbsp;&nbsp;&nbsp; Доступні збільшені розміри<br>&nbsp;&nbsp;&nbsp;&nbsp; вівсянка<br></p>', 'вівсяний,чорний'),
(33, 17, 'en', 'Women’s Long Sleeve Thermal Shirt', '<p>Don\'t linger when it comes to layers. Long Sleeve Crew Neck Thermal Shirt is serious about keeping you warm. The smart design features matching rib knit neck and cuffs. Even our label is dyed to match at the hem for concise layerability. With your utmost comfort in mind, the silhouette is completely tagless and guaranteed to keep you free from chaffing.<br><br>&nbsp;&nbsp;&nbsp; Thermal knit<br>&nbsp;&nbsp;&nbsp; Long sleeve<br>&nbsp;&nbsp;&nbsp; Tagless<br>&nbsp;&nbsp;&nbsp; Rib knit neck and cuffs<br>&nbsp;&nbsp;&nbsp; 73% Cotton/27% Polyester<br>&nbsp;&nbsp;&nbsp; Extended Sizes Available<br>&nbsp;&nbsp;&nbsp; Machine wash<br>&nbsp;&nbsp;&nbsp; Dusty Violet<br></p>', 'dusty violet,graphite,black,navy'),
(34, 17, 'uk', 'Жіноча Термосорочка З Довгим Рукавом', '<p>Не зволікайте, коли справа доходить до шарів. Термічна сорочка з круглим вирізом і довгим рукавом серйозно зігріє вас. Елегантний дизайн має відповідну трикотажну горловину та манжети. Навіть наша етикетка пофарбована відповідно до краю для лаконічної багатошаровості. Дбаючи про ваш максимальний комфорт, цей силует повністю позбавлений міток і гарантовано позбавить вас від потертостей.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Термотрикотаж<br>&nbsp;&nbsp;&nbsp;&nbsp; Довгий рукав<br>&nbsp;&nbsp;&nbsp;&nbsp; Без тегів<br>&nbsp;&nbsp;&nbsp;&nbsp; Горловина і манжети трикотажні<br>&nbsp;&nbsp;&nbsp;&nbsp; 73% бавовна/27% поліестер<br>&nbsp;&nbsp;&nbsp;&nbsp; Доступні збільшені розміри<br>&nbsp;&nbsp;&nbsp;&nbsp; Машинне прання<br>&nbsp;&nbsp;&nbsp;&nbsp; Запилений Фіолет<br></p>', 'запилений фіолет,графіт,чорний,синій'),
(35, 18, 'en', 'Women\'s Striped Cropped T-Shirt', '<p>This casual striped women’s t-shirt offers a slim fit silhouette and cropped length that’s easy to style with overalls and high-waisted styles. The fitted t-shirt is finished with a merrowed hem and sleeve detail.<br><br>&nbsp;&nbsp;&nbsp; Slim fit<br>&nbsp;&nbsp;&nbsp; Cropped length<br>&nbsp;&nbsp;&nbsp; Merrowed hem<br>&nbsp;&nbsp;&nbsp; 190 gsm. 97% Cotton/3% Spandex Yarn Dye Rib<br>&nbsp;&nbsp;&nbsp; Honey Stripe<br><br><br></p>', 'honey stripe,purple rose stripe'),
(36, 18, 'uk', 'Жіноча Укорочена Футболка в Смужку', '<p>Ця повсякденна жіноча футболка в смужку має приталений силует і укорочену довжину, яку легко поєднувати з комбінезонами та фасонами з високою талією. Облягаюча футболка оздоблена зрізаним подолом і рукавами.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Приталений<br>&nbsp;&nbsp;&nbsp;&nbsp; Стрижена довжина<br>&nbsp;&nbsp;&nbsp;&nbsp; Меровий поділ<br>&nbsp;&nbsp;&nbsp;&nbsp; 190 г/кв.м. 97% бавовна/3% спандекс пряжа Dye Rib<br>&nbsp;&nbsp;&nbsp;&nbsp; Медова смужка<br></p>', 'медова смужка,фіолетова смужка'),
(37, 19, 'en', 'Women’s Long Sleeve Chambray Roll-Tab Work Shirt', '<p>Putting in hours on your craft or taking command of your worksite—just like you, this Women\'s Long Sleeve Chambray Roll-Tab Work Shirt does it all. Engineered for comfort and mobility, it features a pre-washed, cotton-blend fabric that\'s as easy to care for as it is to wear. This versatile work shirt feels supremely soft, with roll-tab sleeves that let you roll your sleeves up to get the job done in style.<br><br>&nbsp;&nbsp;&nbsp; Relaxed fit maximizes mobility<br>&nbsp;&nbsp;&nbsp; Stretch fabric lets you move easily and comfortably<br>&nbsp;&nbsp;&nbsp; Washed chambray feels soft to the touch<br>&nbsp;&nbsp;&nbsp; Roll-tab sleeves for all-season wear and versatility<br>&nbsp;&nbsp;&nbsp; Dual chest pockets with button closures and pencil divider keep essentials secure and organized<br>&nbsp;&nbsp;&nbsp; Metal buttons for durability<br>&nbsp;&nbsp;&nbsp; Extended sizes available<br>&nbsp;&nbsp;&nbsp; 6.25 oz. Stretch Chambray, 88% Cotton/10% Polyester/2% Elastane<br>&nbsp;&nbsp;&nbsp; Machine wash<br>&nbsp;&nbsp;&nbsp; Stonewashed Light Blue<br></p>', 'light-blue'),
(38, 19, 'uk', 'Жіноча Робоча Сорочка з Довгими Рукавами з Шамбре', '<p>Витрачуйте години на свій ремесло або керуйте своїм робочим місцем — так само, як і ви, ця жіноча робоча сорочка з довгими рукавами з шамбре з перекручуванням робить усе це. Створений для комфорту та мобільності, він має попередньо випрану тканину із суміші бавовни, яку так само легко доглядати, як і носити. Ця універсальна робоча сорочка на дотик надзвичайно м’яка, має рукави з закочуванням, які дозволяють закатати рукава, щоб виконувати роботу стильно.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Розслаблена посадка забезпечує максимальну мобільність<br>&nbsp;&nbsp;&nbsp;&nbsp; Еластична тканина дозволяє пересуватися легко і комфортно<br>&nbsp;&nbsp;&nbsp;&nbsp; Вимите шамбре м\'яке на дотик<br>&nbsp;&nbsp;&nbsp;&nbsp; Рукави-закачки для всесезонного носіння та універсальності<br>&nbsp;&nbsp;&nbsp;&nbsp; Подвійні нагрудні кишені із застібками на ґудзиках і перегородкою для олівців надійно та впорядковано забезпечують найнеобхідніше<br>&nbsp;&nbsp;&nbsp;&nbsp; Металеві кнопки для довговічності<br>&nbsp;&nbsp;&nbsp;&nbsp; Доступні збільшені розміри<br>&nbsp;&nbsp;&nbsp;&nbsp; 6,25 унції Стрейч-Шамбре, 88% бавовна/10% поліестер/2% еластан<br>&nbsp;&nbsp;&nbsp;&nbsp; Машинне прання<br>&nbsp;&nbsp;&nbsp;&nbsp; Світло-блакитний<br></p>', 'світло-блакитний'),
(39, 20, 'en', 'Women\'s Cropped Cargo Pants', '<p>Women\'s Cropped Cargo Pants deliver all the utility of a traditional cargo pant paired with perfectly feminine styling. Sturdy with a bit of stretch, nothing is going to stop you from showing up for every adventure.<br><br>&nbsp;&nbsp;&nbsp; Relaxed fit; High rise<br>&nbsp;&nbsp;&nbsp; Pieced lower leg panels<br>&nbsp;&nbsp;&nbsp; Cargo pockets<br>&nbsp;&nbsp;&nbsp; Contour waistband<br>&nbsp;&nbsp;&nbsp; Back pockets with flaps<br>&nbsp;&nbsp;&nbsp; Cuffed hem<br>&nbsp;&nbsp;&nbsp; Belt included<br>&nbsp;&nbsp;&nbsp; Inseam: 27.5\"<br>&nbsp;&nbsp;&nbsp; 8.25 oz. Twill, 98% Cotton/2% Spandex<br>&nbsp;&nbsp;&nbsp; Ink Navy<br></p>', 'black,purple,pink,navy'),
(40, 20, 'uk', 'Жіночі Укорочені Штани Карго', '<p>Жіночі укорочені штани карго забезпечують усю корисність традиційних штанів карго в поєднанні з ідеально жіночим стилем. Міцний і трохи еластичний, ніщо не завадить вам з’являтися в кожній пригоді.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Розслаблена посадка; Високий підйом<br>&nbsp;&nbsp;&nbsp;&nbsp; Відрізні нижні панелі<br>&nbsp;&nbsp;&nbsp;&nbsp; Карго кишені<br>&nbsp;&nbsp;&nbsp;&nbsp; Контурний пояс<br>&nbsp;&nbsp;&nbsp;&nbsp; Задні кишені з клапанами<br>&nbsp;&nbsp;&nbsp;&nbsp; Поділ з манжетами<br>&nbsp;&nbsp;&nbsp;&nbsp; Пояс в комплекті<br>&nbsp;&nbsp;&nbsp;&nbsp; Внутрішній шов: 27,5\"<br>&nbsp;&nbsp;&nbsp;&nbsp; 8,25 унції Твіл, 98% бавовна/2% спандекс<br>&nbsp;&nbsp;&nbsp;&nbsp; Темно-синій<br></p>', 'чорний,фіолетовий,рожевий,темно-синій'),
(41, 21, 'en', 'Women\'s Cargo Jogger Pants', '<p>Women\'s Cargo Jogger Pants are the essential that you\'ve been looking for this season. Featuring a true jogger fit and plenty of practical pocketing, these pants are ready to tackle anything that is thrown your way. With elastic along the back waist, you\'ll achieve a comfortable custom fit for easy all-day wearability and straightforward styling that will last through every season.<br><br>&nbsp;&nbsp;&nbsp; High rise; Flat front<br>&nbsp;&nbsp;&nbsp; Tack button closure<br>&nbsp;&nbsp;&nbsp; Dual front slash pockets with bartacks at opening<br>&nbsp;&nbsp;&nbsp; Patch pockets at rear with woven logo label<br>&nbsp;&nbsp;&nbsp; Dual cargo pockets with hook and loop closure<br>&nbsp;&nbsp;&nbsp; Elastic at back waistband and ankle hem<br>&nbsp;&nbsp;&nbsp; Extended Sizes Available<br>&nbsp;&nbsp;&nbsp; Inseam: 31\"<br>&nbsp;&nbsp;&nbsp; 8.25 oz. Twill, 98% Cotton/2% Spandex<br>&nbsp;&nbsp;&nbsp; Deep Lake<br></p>', 'deep lake,black,brown,sand'),
(42, 21, 'uk', 'Жіночі Штани-джоггери Карго', '<p>Жіночі штани-джоггери карго — те, що ви шукали цього сезону. Завдяки справжньому спортивному крою та багатьом практичним кишеням, ці штани готові впоратися з будь-яким завданням. Завдяки гумці вздовж талії ззаду ви досягнете зручного індивідуального крою для легкого носіння протягом усього дня та простого стилю, який триватиме протягом будь-якого сезону.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Високий підйом; Плоский фронт<br>&nbsp;&nbsp;&nbsp;&nbsp; Застібка на кнопці<br>&nbsp;&nbsp;&nbsp;&nbsp; Подвійні передні прорізні кишені із закріпками на відкриванні<br>&nbsp;&nbsp;&nbsp;&nbsp; Накладні кишені ззаду з тканим логотипом<br>&nbsp;&nbsp;&nbsp;&nbsp; Подвійні кишені-карго із застібкою на липучку<br>&nbsp;&nbsp;&nbsp;&nbsp; Гумка на поясі ззаду та по нижній частині щиколотки<br>&nbsp;&nbsp;&nbsp;&nbsp; Доступні збільшені розміри<br>&nbsp;&nbsp;&nbsp;&nbsp; Внутрішній шов: 31\"<br>&nbsp;&nbsp;&nbsp;&nbsp; 8,25 унції Твіл, 98% бавовна/2% спандекс<br>&nbsp;&nbsp;&nbsp;&nbsp; Озеро Глибоке<br></p>', 'глибоке озеро,чорний,коричневий,пісочний'),
(43, 22, 'en', 'Women\'s Perfect Shape Skinny Fit Jean Capri', '<p>Your flawless workday fit is finally attainable in Women\'s Perfect Shape Capri Pants. You can say goodbye to the days spent pulling up a gapping waistband or sagging knees. Perfect Shape Denim are designed with Cone\'s S Gene® technology, delivering superior stretch and recovery through a soft performance denim that won\'t give out over time. Plus, the flex tummy panel offers added support that flattens and smooths to provide a slender silhouette. With a generous 46% stretch, you\'ll comfortably tackle any task while this skirt holds its shape and yours. No-show pocketing allows for a clean construction while keeping all that you carry under wraps. In addition to functional utility, you\'ll also find a back vent that aids with ease of movement. The reinforced double needle stitching makes this durable work capri a go-to for every task you need to tackle. You\'ll gain long-lasting wear and tear in this abrasion tested denim; where fit, function and feel combine to create effortless perfection.<br><br>    Skinny leg<br>    Extended Sizes Available<br>    Flex tummy control panel slims your silhouette<br>    Patented Cone S-Gene® premium technology<br>    46% holds its shape and yours<br>    No show pocket facing<br>    Minimal exterior branding - no red logo label<br>    Back vent for ease of movement<br>    9.25 oz. Denim, 89% Cotton/8% Polyester/3% Spandex<br>    Indigo Blue<br></p>', 'indigo blue'),
(44, 22, 'uk', 'Жіночі Джинсові Капрі Ідеальної Форми в Обтяжку', '<p>Жіночі штани-капрі Perfect Shape нарешті стануть вашою бездоганною посадкою на робочий день. Ви можете попрощатися з днями, витраченими на те, щоб підтягнути пояс або провислі коліна. Perfect Shape Denim розроблено за технологією Cone S Gene®, що забезпечує чудову еластичність і відновлення завдяки м’якій джинсовій тканині, яка з часом не послаблюється. Крім того, гнучка панель для живота забезпечує додаткову підтримку, яка вирівнюється та розгладжує, створюючи стрункий силует. Завдяки розтяжності 46% ви з комфортом впораєтеся з будь-яким завданням, а ця спідниця тримає форму та тримає вашу форму. Неявка в кишені дозволяє створити чисту конструкцію, зберігаючи при цьому все, що ви носите. На додаток до функціональної зручності, ви також знайдете задню вентиляцію, яка полегшує рух. Завдяки посиленому шву подвійною голкою ці міцні капрі ідеально підходять для будь-якого завдання, яке вам потрібно впоратися. Ви отримаєте тривалий знос у цьому денімі, перевіреному на стирання; де придатність, функціональність і відчуття поєднуються, щоб створити досконалість без зусиль.<br><br>     Худа нога<br>     Доступні збільшені розміри<br>     Гнучка панель керування животиком вирівнює ваш силует<br>     Запатентована преміальна технологія Cone S-Gene®<br>     46% тримає форму і вашу<br>     Без видимої сторони кишені<br>     Мінімальний зовнішній брендинг – відсутність червоного логотипу<br>     Вентиляційний отвір на спині для зручності пересування<br>     9,25 унції Денім, 89% бавовна/8% поліестер/3% спандекс<br>    Синій індиго<br></p>', 'синій індиго'),
(45, 23, 'en', 'Women\'s Relaxed Fit Straight Leg Cargo Pants', '<p>A modern update on a timeless workwear staple, these Women\'s Relaxed Fit Cargo Pants take inspiration from the classic, military style, fit for all-day comfort and durable enough to endure any project or worksite. Featuring a soft fabric in 100% brushed cotton, they have a contour waistband that ensures a perfect fit, so there are no gaps at the back when you\'re making moves.<br><br>    Sits slightly below the waist; straight leg<br>    Relaxed fit leaves room in the seat and thighs for all-day comfort on the job<br>    Breathable, brushed cotton is ideal for hot temperatures<br>    Contoured flex waistband for comfort and coverage<br>    Bellowed cargo pockets with hook and loop closures, plus back flap pockets with snap closures keep your personal items secure<br>    Seven convenient pockets provide plenty of secure storage<br>    Regular 32-inch length<br>    7.2 oz. Twill, 100% Cotton<br>    Rinsed Green Leaf<br></p>', 'rinsed green leaf,brown,sand,black'),
(46, 23, 'uk', 'Жіночі Прямі Брюки Карго Вільного Крою', '<p>Сучасне оновлення позачасового робочого одягу, ці жіночі штани карго вільного крою черпають натхнення з класичного військового стилю, підходять для комфорту протягом усього дня та достатньо міцні, щоб витримати будь-який проект або робоче місце. Виготовлені з м’якої тканини зі 100% полірованої бавовни, вони мають контурний пояс, який забезпечує ідеальну посадку, тому на спині немає щілин, коли ви робите рухи.<br><br>     Сидить трохи нижче талії; пряма нога<br>     Легка посадка залишає простір у сидінні та стегнах для комфорту протягом усього дня<br>     Повітропроникна, начесана бавовна ідеально підходить для спекотних температур<br>     Контурний гнучкий пояс для комфорту та покриття<br>     Кишені-карго з рельєфом із застібками на липучках, а також задні кишені з клапаном із застібками забезпечують безпеку ваших особистих речей<br>     Сім зручних кишень забезпечують надійне зберігання<br>     Звичайна довжина 32 дюйми<br>     7,2 унції Твіл, 100% бавовна<br>     Промитий зелений лист<br></p>', 'промитий зелений лист,коричневий,пісочний,чорний'),
(47, 24, 'en', 'Women\'s Performance Workwear Softshell Jacket', '<p>Don\'t let the weather stop you from performing at your best. Women\'s Performance Workwear Softshell Jacket provides enhanced wind protection with a bonded fleece lining for extra warmth. The finish is water repellent to keep you working your hardest. An attached, fully adjustable hood is there for when you need it the most. Abrasion elbow patches with ergonomic shaping provide enhanced mobility while FLEX fabric throughout the main body maximizes comfort and provides an extra layer of durability. Not short on utility, this piece provides hidden zipper pockets and zippered sleeve pockets with reflective trim throughout. A drop tail hem provides added coverage from the elements giving you unyielding protection all day long.<br><br>&nbsp;&nbsp;&nbsp; Enhanced wind protection<br>&nbsp;&nbsp;&nbsp; Fleece lining<br>&nbsp;&nbsp;&nbsp; Abrasion-resistant, nylon elbow patches<br>&nbsp;&nbsp;&nbsp; Built-up neck with bungees for extra protection<br>&nbsp;&nbsp;&nbsp; Reflective trims; Reflective zippered sleeve pockets<br>&nbsp;&nbsp;&nbsp; Attached, fully adjustable hood<br>&nbsp;&nbsp;&nbsp; Hidden zipper pockets; Zipper front closure<br>&nbsp;&nbsp;&nbsp; Durable Water Repellent finish, 8000mm Waterproof/800mvp Breathable; Softshell: Polyester/ Elastane, with Bonded Microfleece<br>&nbsp;&nbsp;&nbsp; Machine wash<br>&nbsp;&nbsp;&nbsp; Black<br><br><br></p>', 'black'),
(48, 24, 'uk', 'Жіноча Спортивна Куртка Softshell', '<p>Не дозволяйте погоді заважати вам виступати якнайкраще. Жіноча спортивна куртка Softshell забезпечує покращений захист від вітру завдяки підкладці з флісу для додаткового тепла. Оздоблення є водовідштовхувальним, щоб ви могли працювати якнайкраще. Прикріплений, повністю регульований капюшон доступний, коли вам це потрібно найбільше. Ергономічні накладки на лікті забезпечують підвищену мобільність, а тканина FLEX по всій частині корпусу забезпечує максимальний комфорт і забезпечує додатковий шар міцності. У цьому виробі є приховані кишені на блискавках і нарукавні кишені зі світловідбиваючим оздобленням. Низький край забезпечує додаткове покриття від елементів, забезпечуючи непохитний захист протягом усього дня.<br><br>&nbsp;&nbsp;&nbsp;&nbsp; Посилений захист від вітру<br>&nbsp;&nbsp;&nbsp;&nbsp; Підкладка з флісу<br>&nbsp;&nbsp;&nbsp;&nbsp; Стійкі до стирання нейлонові налокітники<br>&nbsp;&nbsp;&nbsp;&nbsp; Вбудована шия з банджі для додаткового захисту<br>&nbsp;&nbsp;&nbsp;&nbsp; Світловідбиваючі накладки; Світловідбиваючі кишені на рукавах на блискавці<br>&nbsp;&nbsp;&nbsp;&nbsp; Прикріплений, повністю регульований капюшон<br>&nbsp;&nbsp;&nbsp;&nbsp; Приховані кишені на блискавці; Застібка спереду на блискавку<br>&nbsp;&nbsp;&nbsp;&nbsp; Міцне водовідштовхувальне покриття, 8000 мм водонепроникний/800mvp дихаючий; Софтшелл: поліестер/еластан із мікрофлісом<br>&nbsp;&nbsp;&nbsp;&nbsp; Машинне прання<br>&nbsp;&nbsp;&nbsp;&nbsp; чорний<br></p>', 'чорний');
INSERT INTO `product_translations` (`id`, `product_id`, `locale`, `product_name`, `product_details`, `color`) VALUES
(49, 25, 'en', 'Women\'s DuraTech Renegade Insulated Jacket', '<p>Rise to the demands of your workday without sacrificing ultimate protection in Dickies Women\'s Duratech Renegade Insulated Jacket. The highly durable and triple needle reinforced Duck fabric construction comes equipped with FLEX technology for superior mobility and comfort, as well as a Durable Water Repellent finish to safeguard you from rainy weather while on the job. The patented SafeCinch™ internal mechanism provides the benefit of adjusting the drawcords through the interior of the front pockets, preventing you from getting caught up as you navigate the workday. Complete with a drop tail hem for added coverage, a hidden storm cuff for superior warmth and a zippered storm flap to defend against the elements, there\'s nothing this jacket isn\'t prepared to face.<br><br>    High hip length, fits slightly closer to body to enhance mobility<br>    FLEX fabric for ease of movement and added comfort; Durable Water Repellent (DWR) finish<br>    Patented SafeCinch internal mechanism eliminates hood drawstrings while elevating safety<br>    Storm flap with zipper closure; Hidden storm cuffs to keep you warm and dry<br>    Reinforcements in key wear down areas; Triple needle reinforced seams<br>    Chest pocket with secure pocket flap; Zippered security pocket; Interior pocket to secure valuables<br>    Underarm mobility gussets; Elbow darts for articulation and movement; Drop tail hem for added coverage<br>    Body: 9 oz. Duck, 63% Cotton/35% Polyester/2% Spandex; Lining: 160 gsm. 100% Polyester Fill<br>    Brown<br></p>', 'brown,black,gray,green'),
(50, 25, 'uk', 'Жіноча Утеплена Куртка DuraTech Renegade', '<p>Виконуйте вимоги свого робочого дня, не жертвуючи найкращим захистом у жіночій утепленій куртці Duratech Renegade. Високоміцна конструкція тканини Duck, армована трьома голками, оснащена технологією FLEX для чудової мобільності та комфорту, а також міцним водовідштовхувальним покриттям, яке захистить вас від дощової погоди під час роботи. Запатентований внутрішній механізм SafeCinch™ забезпечує перевагу регулювання тягових шнурів через внутрішню частину передніх кишень, запобігаючи тому, щоб ви не заплуталися під час робочого дня. Ця куртка має низький край для додаткового покриття, приховану штормову манжету для чудового тепла та штормовий клапан на блискавці для захисту від негоди.<br><br>     Висока довжина стегна, прилягає трохи ближче до тіла, щоб підвищити рухливість<br>     Тканина FLEX для зручності рухів і додаткового комфорту; Міцне водовідштовхувальне покриття (DWR).<br>     Запатентований внутрішній механізм SafeCinch усуває застібки на капюшоні, підвищуючи безпеку<br>     штормовий клапан із застібкою-блискавкою; Приховані штормові манжети для збереження тепла та сухості<br>     Підсилення в ключових зонах зносу;Шви з потрійною голкою<br>     Нагрудна кишеня з надійним клапаном; Захистна кишеня на блискавці; Внутрішня кишеня для зберігання цінних речей<br>     ластовиці під пахвами; Ліктьові дротики для артикуляції та руху; Занижений край для додаткового покриття<br>     Тіло: 9 унцій. Качка, 63% бавовна/35% поліестер/2% спандекс; Підкладка: 160 г/кв.м. Наповнювач 100% поліестер<br>     коричневий<br></p>', 'коричневий,чорний,сірий,зелений');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eLMY3z6HK5ygdvvEbNYINTTRLifc00vvZqtnOfOk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiamZnbVhqVkJrRVZEMTI4WXFrcFhMekQ0YlJKdTEwWW9MRHZEWkloUiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3VzZXIvcGF5bWVudCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvdXNlci9wYXltZW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1687251252),
('SUU6nLXqornWJlYbzAzrEm36uxgR07Ngq7fU5BPQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiSjViVklSZlA0dHJTRUgwUUZaZElFUmUwbWltZWFVaW1DVkRZeVV3TyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQzUlg5VFA3aUh3ZkRRL3V2cnBRVENlNDIxLlhDL1BvLy5paGdHendaNS9KeElUcWZrSE9uMiI7czo0OiJjYXJ0IjthOjE6e3M6NzoiZGVmYXVsdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6Mjp7czozMjoiZGQ5Y2UwYTRiNzBhODg5MDMwZTA0YzNiZGE0MjdhZTgiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjoxMTp7czo1OiJyb3dJZCI7czozMjoiZGQ5Y2UwYTRiNzBhODg5MDMwZTA0YzNiZGE0MjdhZTgiO3M6MjoiaWQiO2k6NjtzOjM6InF0eSI7czoxOiIxIjtzOjQ6Im5hbWUiO3M6MzA6IlNob3J0IFNsZWV2ZSBIZWF0aGVyZWQgVC1TaGlydCI7czo1OiJwcmljZSI7ZDoyMDtzOjY6IndlaWdodCI7ZDoxO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoyOntzOjg6IgAqAGl0ZW1zIjthOjM6e3M6NToiY29sb3IiO3M6NzoiaGVhdGhlciI7czo0OiJzaXplIjtzOjI6IlhMIjtzOjU6ImltYWdlIjtzOjkwOiIvbWVkaWEvcHJvZHVjdHMvaW1hZ2VPbmUvYWE4OTkxMDc4MmU0YzZhNTgwMjBkOTVlNWJhNTBjYzIvY29udmVyc2lvbnMvMTY4NjU3ODE2Ny10aHVtYi5qcGciO31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NzoidGF4UmF0ZSI7aTowO3M6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0NjoiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGRpc2NvdW50UmF0ZSI7aTowO3M6ODoiaW5zdGFuY2UiO3M6NzoiZGVmYXVsdCI7fXM6MzI6IjA2Zjg1MTA3NWRkY2Q1MmVmMTUzYTliMWI4YTUyMjU2IjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6MTE6e3M6NToicm93SWQiO3M6MzI6IjA2Zjg1MTA3NWRkY2Q1MmVmMTUzYTliMWI4YTUyMjU2IjtzOjI6ImlkIjtpOjg7czozOiJxdHkiO3M6MToiMSI7czo0OiJuYW1lIjtzOjMxOiJTa2F0ZWJvYXJkaW5nIERvdWJsZSBLbmVlIFBhbnRzIjtzOjU6InByaWNlIjtkOjUwO3M6Njoid2VpZ2h0IjtkOjE7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjI6e3M6ODoiACoAaXRlbXMiO2E6Mzp7czo1OiJjb2xvciI7czo1OiJvbGl2ZSI7czo0OiJzaXplIjtzOjI6IlhMIjtzOjU6ImltYWdlIjtzOjkwOiIvbWVkaWEvcHJvZHVjdHMvaW1hZ2VPbmUvZjU4OGIzZDk1ZWMyOGJlZGVlMDc5Mjc1ZDI1M2QyOTAvY29udmVyc2lvbnMvMTY4NjU4MDA0NC10aHVtYi5qcGciO31zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fXM6NzoidGF4UmF0ZSI7aTowO3M6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0NjoiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGRpc2NvdW50UmF0ZSI7aTowO3M6ODoiaW5zdGFuY2UiO3M6NzoiZGVmYXVsdCI7fX1zOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7fX1zOjQ6ImxhbmciO3M6MjoidWsiO3M6MTk6InBhc3N3b3JkX2hhc2hfYWRtaW4iO3M6NjA6IiQyeSQxMCQ5MklYVU5wa2pPMHJPUTVieU1pLlllNG9Lb0VhM1JvOWxsQy8ub2cvYXQyLnVoZVdHL2lnaSI7fQ==', 1687252867),
('ZWulWJMj1ulY2icsI8oHRE0Ip7uiYTfRlxHYNJKR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWVWejVYYjB3Z3lQRUQ4SUtLWTBYOHU1ZWlQVVN5MDJuaWhvT2VsZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1687251254);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shop_name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '5', '10', 'OneClothes', 'info@oneclothes.com', '+380954841127', 'Ukraine, Kyiv', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-06-12 05:23:44', '2023-06-12 05:23:44'),
(2, 1, '2023-06-12 05:24:06', '2023-06-12 05:24:06'),
(3, 1, '2023-06-12 05:24:27', '2023-06-12 05:24:27'),
(4, 2, '2023-06-12 05:24:52', '2023-06-12 05:24:52'),
(5, 2, '2023-06-12 05:25:28', '2023-06-12 05:25:28'),
(6, 2, '2023-06-12 05:26:09', '2023-06-12 05:26:09'),
(7, 3, '2023-06-12 05:26:51', '2023-06-12 05:26:51'),
(8, 3, '2023-06-12 05:27:10', '2023-06-12 05:27:10'),
(9, 3, '2023-06-12 05:27:30', '2023-06-12 05:27:30'),
(10, 4, '2023-06-12 05:28:04', '2023-06-12 05:28:04'),
(11, 4, '2023-06-12 05:28:21', '2023-06-12 05:28:21'),
(12, 4, '2023-06-12 05:28:37', '2023-06-12 05:28:37'),
(13, 5, '2023-06-12 05:29:33', '2023-06-12 05:29:33'),
(14, 5, '2023-06-12 05:29:53', '2023-06-12 05:29:53'),
(15, 10, '2023-06-12 05:31:20', '2023-06-12 05:31:20'),
(16, 10, '2023-06-12 05:31:32', '2023-06-12 05:31:32'),
(17, 10, '2023-06-12 05:31:48', '2023-06-12 05:31:48'),
(18, 10, '2023-06-12 05:32:00', '2023-06-12 05:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_translations`
--

CREATE TABLE `subcategory_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategory_translations`
--

INSERT INTO `subcategory_translations` (`id`, `subcategory_id`, `locale`, `subcategory_name`) VALUES
(1, 1, 'en', 'Gent`s Shirts'),
(2, 1, 'uk', 'Чоловічі Сорочки'),
(3, 2, 'en', 'Gent`s Pants'),
(4, 2, 'uk', 'Чоловічі Штани'),
(5, 3, 'en', 'Gent`s Outerwear'),
(6, 3, 'uk', 'Чоловічий Верхній Одяг'),
(7, 4, 'en', 'Women`s Shirts'),
(8, 4, 'uk', 'Жіночі Сорочки'),
(9, 5, 'en', 'Women`s Pants'),
(10, 5, 'uk', 'Жіночі Штани'),
(11, 6, 'en', 'Women`s Outerwear'),
(12, 6, 'uk', 'Жіночий Верхній Одяг'),
(13, 7, 'en', 'Child Dress & Footwear'),
(14, 7, 'uk', 'Дитячий Одяг і Взуття'),
(15, 8, 'en', 'Baby Food'),
(16, 8, 'uk', 'Дитяче Харчування'),
(17, 9, 'en', 'Toys'),
(18, 9, 'uk', 'Іграшки'),
(19, 10, 'en', 'Gent`s Watches'),
(20, 10, 'uk', 'Чоловічі Годинники'),
(21, 11, 'en', 'Women`s Watches'),
(22, 11, 'uk', 'Жіночі Годинники'),
(23, 12, 'en', 'Kids Watches'),
(24, 12, 'uk', 'Дитячі Годинники'),
(25, 13, 'en', 'Audio'),
(26, 13, 'uk', 'Аудіо'),
(27, 14, 'en', 'Video'),
(28, 14, 'uk', 'Відео'),
(29, 15, 'en', 'Room Decoration'),
(30, 15, 'uk', 'Декор для Кімнат'),
(31, 16, 'en', 'Appliances'),
(32, 16, 'uk', 'Побутова Техніка'),
(33, 17, 'en', 'Light and Lamps'),
(34, 17, 'uk', 'Освітлення та Лампи'),
(35, 18, 'en', 'Security'),
(36, 18, 'uk', 'Безпека');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Chandler', '+380991755316', 'chandler@gmail.com', '2023-06-19 08:34:06', '$2y$10$3RX9TP7iHwfDQ/uvrpQTCe421.XC/Po/.ihgGzwZ5/JxITqfkHOn2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-19 08:13:43', '2023-06-19 08:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 9, '2023-06-19 08:36:16', '2023-06-19 08:36:16'),
(2, 1, 23, '2023-06-20 06:14:21', '2023-06-20 06:14:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_category_translations_blog_category_id_locale_unique` (`blog_category_id`,`locale`),
  ADD KEY `blog_category_translations_locale_index` (`locale`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  ADD KEY `post_translations_locale_index` (`locale`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory_translations`
--
ALTER TABLE `subcategory_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategory_translations_subcategory_id_locale_unique` (`subcategory_id`,`locale`),
  ADD KEY `subcategory_translations_locale_index` (`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subcategory_translations`
--
ALTER TABLE `subcategory_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  ADD CONSTRAINT `blog_category_translations_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`);

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `subcategory_translations`
--
ALTER TABLE `subcategory_translations`
  ADD CONSTRAINT `subcategory_translations_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
