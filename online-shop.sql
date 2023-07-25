-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 24, 2023 at 04:50 PM
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
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `category`, `coupon`, `product`, `blog`, `orders`, `other`, `report`, `role`, `return_orders`, `contact`, `comment`, `setting`, `stock`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '+380954841127', 'admin@gmail.com', '2023-06-12 08:03:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, '2023-06-12 08:03:50', NULL),
(6, 'Joey', '+380991755315', 'joey@gmail.com', NULL, '$2y$10$znZW7PewqYltBPctlQnIueAwe9BAYaGylBsOZe8nPRprX8wkf5mey', NULL, NULL, NULL, NULL, NULL, NULL, '0', '1', '1', '1', '0', '1', '1', '0', '1', '1', '0', '0', '1', 2, '2023-07-03 11:11:53', '2023-07-04 10:33:42');

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
(3, '2023-06-19 05:42:07', '2023-06-19 05:42:07'),
(4, '2023-07-13 08:48:33', '2023-07-13 08:48:33');

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
(6, 3, 'uk', 'Технології'),
(7, 4, 'en', 'Sport'),
(8, 4, 'uk', 'Спорт');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'HP', 'hp', '2023-06-12 05:34:27', '2023-06-12 05:34:27'),
(2, 'Samsung', 'samsung', '2023-06-12 05:34:49', '2023-06-12 05:34:49'),
(3, 'Bose', 'bose', '2023-06-12 05:45:22', '2023-06-12 05:45:22'),
(4, 'Dell', 'dell', '2023-06-12 05:52:40', '2023-06-12 05:52:40'),
(5, 'Clarks', 'clarks', '2023-06-12 05:53:15', '2023-06-12 05:53:15'),
(6, 'Lego', 'lego', '2023-06-12 05:53:39', '2023-06-12 05:53:39'),
(7, 'Apple', 'apple', '2023-06-12 05:53:54', '2023-06-12 05:53:54'),
(8, 'Marshall', 'marshall', '2023-06-12 07:06:30', '2023-06-12 07:06:30'),
(9, 'Ecco', 'ecco', '2023-06-12 07:07:46', '2023-06-12 07:07:46'),
(10, 'Xiaomi', 'xiaomi', '2023-06-12 07:08:27', '2023-06-12 07:08:27'),
(11, 'Sony', 'sony', '2023-06-12 07:09:04', '2023-06-12 07:09:04'),
(12, 'Everlane', 'everlane', '2023-06-12 07:09:27', '2023-06-12 07:09:27'),
(13, 'Canon', 'canon', '2023-06-12 07:10:48', '2023-06-12 07:10:48'),
(14, 'Casio', 'casio', '2023-06-12 07:11:06', '2023-06-12 07:11:06'),
(15, 'Hugo Boss', 'hugo-boss', '2023-06-12 07:12:11', '2023-06-12 07:12:11'),
(16, 'Levi`s', 'levis', '2023-06-12 07:12:37', '2023-06-12 07:12:37'),
(17, 'Nikon', 'nikon', '2023-06-12 07:13:15', '2023-06-12 07:13:15'),
(18, 'H&M', 'h-m', '2023-06-12 07:14:26', '2023-06-12 07:14:26'),
(19, 'Under Armour', 'under-armour', '2023-06-12 07:14:50', '2023-06-12 07:14:50'),
(20, 'Colin`s', 'colins', '2023-06-12 07:15:27', '2023-06-12 07:15:27'),
(21, 'GAP', 'gap', '2023-06-12 07:16:02', '2023-06-12 07:16:02'),
(22, 'Nike', 'nike', '2023-06-12 07:18:00', '2023-06-12 07:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'mens-fashion', '2023-06-12 05:18:10', '2023-06-12 05:18:10'),
(2, 'womens-fashion', '2023-06-12 05:18:28', '2023-06-12 05:18:28'),
(3, 'everything-for-children', '2023-06-12 05:20:01', '2023-06-12 05:20:01'),
(4, 'watches', '2023-06-12 05:20:43', '2023-06-12 05:20:43'),
(5, 'electronics', '2023-06-12 05:21:09', '2023-06-12 05:21:09'),
(6, 'health', '2023-06-12 05:21:25', '2023-06-12 05:21:25'),
(7, 'beauty', '2023-06-12 05:21:39', '2023-06-12 05:21:39'),
(8, 'sport', '2023-06-12 05:22:09', '2023-06-12 05:22:09'),
(9, 'tourist-equipment', '2023-06-12 05:22:34', '2023-06-12 05:22:34'),
(10, 'home-living', '2023-06-12 05:22:49', '2023-06-12 05:22:49');

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
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'STAR88', '5', '2023-06-26 06:46:16', '2023-06-26 06:46:16');

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
(102, 'App\\Models\\Admin\\Product', 25, '318be23f-a941-4ef6-b895-f99b307009a9', 'products/imageThree', 'FJ085_BD_A1', '1687163855.jpg', 'image/jpeg', 'media', 'media', 221136, '[]', '[]', '{\"thumb\": true}', '[]', 3, '2023-06-19 05:37:35', '2023-06-19 05:37:35'),
(107, 'App\\Models\\User', 7, '825ca8e0-a0e5-4b53-ab6e-04edca2a62fd', 'users/avatar', '1688651944', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-06 10:59:04', '2023-07-06 10:59:05'),
(108, 'App\\Models\\User', 8, '87da3a84-2b76-4469-b21d-d3c0f4b42167', 'users/avatar', '1688651968', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-06 10:59:28', '2023-07-06 10:59:29'),
(109, 'App\\Models\\User', 9, '78d58f2b-f429-4ac0-ab12-fc940e4e07d0', 'users/avatar', '1688729511', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 08:31:51', '2023-07-07 08:31:53'),
(110, 'App\\Models\\User', 10, '82ce7121-f15e-4315-a73b-438aa68eb509', 'users/avatar', '1688730182', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 08:43:02', '2023-07-07 08:43:03'),
(111, 'App\\Models\\User', 11, '616aa844-7413-4fd5-86e8-e6b8d9ba675e', 'users/avatar', '1688730234', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 08:43:54', '2023-07-07 08:43:55'),
(112, 'App\\Models\\User', 12, '9c567d1c-52c1-4aca-af42-d579943a18ee', 'users/avatar', '1688730418', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 08:46:58', '2023-07-07 08:47:00'),
(113, 'App\\Models\\User', 13, '9a994f99-8070-4246-9dcb-1b413d9e18b7', 'users/avatar', '1688730618', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 08:50:18', '2023-07-07 08:50:20'),
(114, 'App\\Models\\User', 14, 'a18adb42-215f-42dc-9571-f8bab45e09be', 'users/avatar', '1688730886', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 08:54:46', '2023-07-07 08:54:48'),
(115, 'App\\Models\\User', 15, 'd94fa4e7-8cf7-468b-86c9-497949e2519e', 'users/avatar', '1688731068', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 08:57:48', '2023-07-07 08:57:49'),
(116, 'App\\Models\\User', 16, '712bf118-0ca3-4c16-afc2-830476c5139d', 'users/avatar', '1688731251', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:00:51', '2023-07-07 09:00:52'),
(117, 'App\\Models\\User', 17, '5f55d52f-2d67-4ee3-8793-d320a56c662c', 'users/avatar', '1688731371', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:02:51', '2023-07-07 09:02:52'),
(118, 'App\\Models\\User', 18, '87b0cb6b-eee1-4162-bbad-a06721ed1f34', 'users/avatar', '1688731395', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:03:15', '2023-07-07 09:03:16'),
(119, 'App\\Models\\User', 19, 'c7d34e77-4f38-46dd-a2b7-94685aff809a', 'users/avatar', '1688731497', 'AAcHTteWV5yE-ZWbeH5rmZ3At4uYYb7dRY-hfGCNfzTZsdfq=s96-c.png', 'image/png', 'media', 'media', 1563, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:04:57', '2023-07-07 09:04:58'),
(120, 'App\\Models\\User', 20, '5525e4c7-98da-44d1-bbf3-9505806e9967', 'users/avatar', '1688731618', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:06:58', '2023-07-07 09:07:00'),
(121, 'App\\Models\\User', 21, '01ae682b-2ff9-4c49-a492-e547c092ad0e', 'users/avatar', '1688731668', 'AAcHTteWV5yE-ZWbeH5rmZ3At4uYYb7dRY-hfGCNfzTZsdfq=s96-c.png', 'image/png', 'media', 'media', 1563, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:07:48', '2023-07-07 09:07:49'),
(122, 'App\\Models\\User', 22, '64dc989c-e3fc-464d-8be7-5381ae0f7df6', 'users/avatar', '1688732161', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:16:01', '2023-07-07 09:16:02'),
(123, 'App\\Models\\User', 23, 'd5e4779a-bbc6-4b2a-ab6c-a7c38e2bee2c', 'users/avatar', '1688732365', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:19:25', '2023-07-07 09:19:26'),
(124, 'App\\Models\\User', 24, '8913771b-e945-4263-96f8-a425ec8c6fec', 'users/avatar', '1688732705', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:25:05', '2023-07-07 09:25:06'),
(125, 'App\\Models\\User', 25, '6998cc28-432b-466f-ab77-28e2d2f56d7c', 'users/avatar', '1688732746', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:25:46', '2023-07-07 09:25:48'),
(126, 'App\\Models\\User', 26, '7ebac32c-4733-4c99-b62c-70a3143214d9', 'users/avatar', '1688732866', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:27:46', '2023-07-07 09:27:47'),
(127, 'App\\Models\\User', 27, '21040ca3-71a4-4e2d-8aab-fcd958010dbc', 'users/avatar', '1688732993', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:29:53', '2023-07-07 09:29:54'),
(128, 'App\\Models\\User', 28, '298d279a-4676-46a9-9823-3c6d13debf7d', 'users/avatar', '1688733036', 'AAcHTtfnxlFMlqUg_pGCzcn9WkVKDX5shuGyaJ--p4_ndRAI=s96-c.png', 'image/png', 'media', 'media', 422, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:30:36', '2023-07-07 09:30:37'),
(129, 'App\\Models\\User', 29, '0211f4ad-a344-451e-bd5e-16c806909cec', 'users/avatar', '1688733344', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:35:44', '2023-07-07 09:35:45'),
(130, 'App\\Models\\User', 30, '20cd9d23-d434-4370-a565-b0954a8288f5', 'users/avatar', '1688733362', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:36:02', '2023-07-07 09:36:03'),
(131, 'App\\Models\\User', 31, '2fe33c87-104e-492a-9873-99f40081b09a', 'users/avatar', '1688733785', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:43:05', '2023-07-07 09:43:06'),
(132, 'App\\Models\\User', 32, '98f0e23d-b53e-4abb-bc36-dd92c8fee208', 'users/avatar', '1688733852', 'picture.jpeg', 'image/jpeg', 'media', 'media', 1327, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:44:12', '2023-07-07 09:44:13'),
(133, 'App\\Models\\User', 33, 'eaddddb3-d0a8-4a46-9026-9f302503c3e2', 'users/avatar', '1688733868', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-07 09:44:28', '2023-07-07 09:44:29'),
(134, 'App\\Models\\User', 34, 'b94d22cf-6ab9-421e-b038-4c259c71a69a', 'users/avatar', '1689065118', 'AAcHTtcje936HPBBCRuUZLZNNKmh5A5bePtf9EJtlHOA9a3fIY8=s96-c.jpeg', 'image/jpeg', 'media', 'media', 5962, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-11 05:45:18', '2023-07-11 05:45:21'),
(135, 'App\\Models\\Admin\\Category', 1, 'bbde96a1-8973-4abb-b53e-ca03fa32ebd5', 'categories', 'mens_fashion', '1689240472.png', 'image/png', 'media', 'media', 15386, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:27:52', '2023-07-13 06:27:52'),
(136, 'App\\Models\\Admin\\Category', 2, '3a22526d-629e-48f6-88d4-40596b6ef1a1', 'categories', 'womens-fashion01', '1689240487.png', 'image/png', 'media', 'media', 16242, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:28:07', '2023-07-13 06:28:07'),
(137, 'App\\Models\\Admin\\Category', 3, '34ee7789-ca15-49eb-9b1c-1e4a2e117f81', 'categories', 'everything for children', '1689240509.png', 'image/png', 'media', 'media', 22442, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:28:29', '2023-07-13 06:28:29'),
(138, 'App\\Models\\Admin\\Category', 4, 'bc5c874d-634b-4646-8ba2-9aa03bef59d8', 'categories', 'Watches', '1689240524.png', 'image/png', 'media', 'media', 21810, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:28:44', '2023-07-13 06:28:44'),
(139, 'App\\Models\\Admin\\Category', 5, '69b18b09-9a39-4384-a903-5517e95241f1', 'categories', 'Electronics', '1689240535.png', 'image/png', 'media', 'media', 14400, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:28:55', '2023-07-13 06:28:55'),
(140, 'App\\Models\\Admin\\Category', 6, '6fc92100-cdcd-4cd0-ac48-7e08892b630a', 'categories', 'health', '1689240548.png', 'image/png', 'media', 'media', 11211, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:29:08', '2023-07-13 06:29:08'),
(141, 'App\\Models\\Admin\\Category', 7, '705f910e-296e-4c8d-bbb8-530159ddedf6', 'categories', 'beauty', '1689240566.png', 'image/png', 'media', 'media', 17089, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:29:26', '2023-07-13 06:29:26'),
(142, 'App\\Models\\Admin\\Category', 8, '27969146-3625-4111-8680-72371924a900', 'categories', 'sport', '1689240580.png', 'image/png', 'media', 'media', 13595, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:29:40', '2023-07-13 06:29:40'),
(143, 'App\\Models\\Admin\\Category', 9, '68904fb8-7452-481e-a864-1ab7b504d3e1', 'categories', 'tourist_equip01', '1689240593.png', 'image/png', 'media', 'media', 18837, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:29:53', '2023-07-13 06:29:53'),
(144, 'App\\Models\\Admin\\Category', 10, 'de0041f7-ba2d-40df-a00b-624354f60f4f', 'categories', 'home-and-living', '1689240608.png', 'image/png', 'media', 'media', 9261, '[]', '[]', '[]', '[]', 1, '2023-07-13 06:30:08', '2023-07-13 06:30:08'),
(145, 'App\\Models\\Admin\\Post', 1, 'f30379c9-c07d-4856-805f-894b9b4b67df', 'posts', '1', '1689249062.jpg', 'image/jpeg', 'media', 'media', 307061, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-07-13 08:51:02', '2023-07-13 08:51:03'),
(146, 'App\\Models\\Admin\\Post', 2, '1122804e-971c-4056-8f97-64035be4c031', 'posts', '11', '1689249487.jpg', 'image/jpeg', 'media', 'media', 120038, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-07-13 08:58:07', '2023-07-13 08:58:08'),
(147, 'App\\Models\\Admin\\Post', 3, '4cac5f4b-f383-4321-a4e0-b0ba10996eb8', 'posts', 'running-shoes-art', '1689250361.jpg', 'image/jpeg', 'media', 'media', 275531, '[]', '[]', '{\"thumb\": true}', '[]', 1, '2023-07-13 09:12:41', '2023-07-13 09:12:41'),
(148, 'App\\Models\\User', 1, 'a395a447-c0c8-4940-bf1a-f4da29c81100', 'users/avatar', 'x495', '1689495460.jpg', 'image/jpeg', 'media', 'media', 38488, '[]', '[]', '{\"thumb\": true, \"thumb-mid\": true}', '[]', 1, '2023-07-16 05:17:40', '2023-07-16 05:17:42');

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
(33, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(49, '2023_06_25_162144_create_orders_table', 3),
(50, '2023_06_25_162530_create_order_details_table', 3),
(51, '2023_06_25_162610_create_shipping_table', 3),
(52, '2023_06_29_070457_create_seo_table', 4),
(53, '2023_07_04_135236_create_site_contacts_table', 5),
(57, '2023_07_10_115249_create_contacts_table', 6),
(58, '2023_07_13_130700_create_recently_viewed_products_table', 7),
(59, '2023_07_17_083249_create_page_seos_table', 8);

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amount` float DEFAULT NULL,
  `balance_transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `shipping` float DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_type`, `payment_id`, `paying_amount`, `balance_transaction`, `order_id`, `subtotal`, `shipping`, `vat`, `total`, `status`, `return_order`, `month`, `date`, `year`, `status_code`, `created_at`, `updated_at`) VALUES
(1, '1', 'stripe', 'card_1NNCZhGSnHOOWddHg5soUpwu', 14000, 'txn_3NNCZiGSnHOOWddH08Lfgd3l', '649967127846f', 125, 10, 5, 140, '3', '0', 'June', '26-06-23', '2023', '1', NULL, '2023-07-05 08:30:47'),
(2, '1', 'stripe', 'card_1NNCeEGSnHOOWddHkz975FRt', 7300, 'txn_3NNCeFGSnHOOWddH16FN5kIX', '6499682b527d8', 58, 10, 5, 73, '3', '2', 'June', '26-06-23', '2023', '2', NULL, '2023-07-05 11:51:28'),
(3, '1', 'stripe', 'card_1NNtSDGSnHOOWddHGIBt3vwb', 14000, 'txn_3NNtSGGSnHOOWddH31xCrwHB', '649beaeedb3ca', 125, 10, 5, 140, '4', '0', 'June', '28-06-23', '2023', '3', NULL, '2023-06-28 08:49:44'),
(4, '1', 'stripe', 'card_1NNtYcGSnHOOWddHho6l45uz', 11500, 'txn_3NNtYdGSnHOOWddH27FrzAnX', '649bec7c1f180', 100, 10, 5, 115, '1', '0', 'June', '28-06-23', '2023', '4', NULL, '2023-06-28 09:41:53'),
(5, '1', 'stripe', 'card_1NOI2gGSnHOOWddH4koZaCLR', 32000, 'txn_3NOI2iGSnHOOWddH2JzEMXHu', '649d5c2278826', 305, 10, 5, 320, '3', '2', 'June', '29-06-23', '2023', '662919', NULL, '2023-07-09 15:53:03'),
(6, '1', 'stripe', 'card_1NOZnUGSnHOOWddHYOgJmiOM', 3500, 'txn_3NOZnWGSnHOOWddH1ZmN33dE', '649e66bccc722', 20, 10, 5, 35, '3', '0', 'June', '30-06-23', '2023', '652799', NULL, '2023-07-09 15:49:57'),
(7, '3', 'stripe', 'card_1NQsFlGSnHOOWddHkLtJXDkR', 10000, 'txn_3NQsFmGSnHOOWddH3y6YWajP', '64a6c1ce9b7c4', 85, 10, 5, 100, '0', '0', 'July', '06-07-23', '2023', '140590', NULL, NULL),
(8, '1', 'stripe', 'card_1NSd7kGSnHOOWddHFaQmGt9a', 9500, 'txn_3NSd7nGSnHOOWddH0Rq1f6Yj', '64ad24914ace9', 80, 10, 5, 95, '0', '0', 'July', '11-07-23', '2023', '828058', NULL, NULL),
(9, '1', 'stripe', 'card_1NSdBoGSnHOOWddHaLrLdqiE', 13500, 'txn_3NSdBqGSnHOOWddH0l2mjgIG', '64ad258d9304a', 120, 10, 5, 135, '0', '0', 'July', '11-07-23', '2023', '965892', NULL, NULL),
(10, '1', 'paypal', 'PAYID-MSXIOPA2T113742YF710524P', 110, '0XL01732RH792714B', NULL, 95, 10, 5, 110, '0', '0', 'July', '12-07-23', '2023', '940202', NULL, NULL),
(11, '1', 'paypal', 'PAYID-MSXJNKQ1HS922577U624984M', 110, '8GN38135616902640', NULL, 95, 10, 5, 110, '0', '0', 'July', '12-07-23', '2023', '528732', NULL, NULL),
(12, '1', 'paypal', 'PAYID-MSXJRXA87706341BE3167615', 110, '2NE05698M5792251S', NULL, 95, 10, 5, 110, '0', '0', 'July', '12-07-23', '2023', '694481', NULL, NULL),
(13, '1', 'paypal', 'PAYID-MSXJRXA87706341BE3167615', 110, '2NE05698M5792251S', NULL, 95, 10, 5, 110, '0', '0', 'July', '12-07-23', '2023', '492058', NULL, NULL),
(14, '1', 'paypal', 'PAYID-MSXKBLI9WY458439G5030917', 110, '3RW65718PB286644P', NULL, 95, 10, 5, 110, '0', '0', 'July', '12-07-23', '2023', '958690', NULL, NULL),
(15, '1', 'paypal', 'PAYID-MSXKBLI9WY458439G5030917', 110, '3RW65718PB286644P', NULL, 95, 10, 5, 110, '0', '0', 'July', '12-07-23', '2023', '316370', NULL, NULL),
(16, '1', 'paypal', 'PAYID-MSXKH3A0BJ33679LG8638825', 110, '2B064049TJ5836402', NULL, 95, 10, 5, 110, '0', '0', 'July', '12-07-23', '2023', '691494', NULL, NULL),
(17, '1', 'paypal', 'PAYID-MSXKKGA0CX91174VC265070S', 110, '01W131240D913913W', NULL, 95, 10, 5, 110, '0', '0', 'July', '12-07-23', '2023', '761311', NULL, NULL),
(18, '1', 'paypal', 'PAYID-MSXLCEA4N224553K0604894P', 95, '64K22390S68808507', NULL, 80, 10, 5, 95, '0', '0', 'July', '12-07-23', '2023', '837464', NULL, NULL),
(19, '1', 'paypal', 'PAYID-MSXLEUQ72916387TH306071Y', 95, '62273255EG037650P', NULL, 80, 10, 5, 95, '0', '0', 'July', '12-07-23', '2023', '886930', NULL, NULL),
(20, '1', 'paypal', 'PAYID-MSXLH6I5G252673PL701060Y', 75, '9BU20574TC385450M', NULL, 60, 10, 5, 75, '0', '0', 'July', '12-07-23', '2023', '128756', NULL, NULL),
(21, '1', 'paypal', 'PAYID-MSXLJ3Q1AX17068AB3079342', 40, '4B619590D37329809', NULL, 25, 10, 5, 40, '0', '0', 'July', '12-07-23', '2023', '302861', NULL, NULL),
(23, '1', 'stripe', 'card_1NT3w2GSnHOOWddHFLyVE45U', 80, 'txn_3NT3w3GSnHOOWddH31r91qi9', '64aeb726d4cbb', 65, 10, 5, 80, '0', '0', 'July', '12-07-23', '2023', '448774', NULL, NULL),
(24, '1', 'paypal', 'PAYID-MSXLO4Q9SB841982U042552F', 135, '8XY447459G855274D', NULL, 120, 10, 5, 135, '0', '0', 'July', '12-07-23', '2023', '739514', NULL, NULL),
(25, '1', 'stripe', 'card_1NT40WGSnHOOWddHKqPfvm8Y', 105, 'txn_3NT40XGSnHOOWddH2MLA6QR6', '64aeb83cc41b7', 90, 10, 5, 105, '0', '0', 'July', '12-07-23', '2023', '902192', NULL, NULL),
(26, '1', 'paypal', 'PAYID-MSXLUWQ7TF04072KX4960245', 220, '3CX40476MW660414G', NULL, 205, 10, 5, 220, '0', '0', 'July', '12-07-23', '2023', '456761', NULL, NULL),
(27, '1', 'oncash', NULL, NULL, NULL, NULL, 85, 10, 5, 100, '0', '0', 'July', '13-07-23', '2023', '566833', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `single_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `qty`, `single_price`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, '12', 'DuraTech Renegade FLEX Duck Jacket', 'black', 'XL', '1', '125', '125', NULL, NULL),
(2, 2, '9', 'Active Waist Relaxed Fit Jeans', 'indigo', 'XL', '1', '40', '40', NULL, NULL),
(3, 2, '5', 'Short Sleeve Henley T-Shirt', 'sand', 'XL', '1', '23', '23', NULL, NULL),
(4, 3, '22', 'Women\'s Perfect Shape Skinny Fit Jean Capri', 'indigo blue', '10', '1', '45', '45', NULL, NULL),
(5, 3, '10', 'Relaxed Fit Duck Carpenter Pants', 'rinsed-brown', 'XL', '1', '40', '40', NULL, NULL),
(6, 3, '23', 'Women\'s Relaxed Fit Straight Leg Cargo Pants', 'rinsed green leaf', '12', '1', '40', '40', NULL, NULL),
(7, 4, '8', 'Skateboarding Double Knee Pants', 'olive', 'XL', '2', '50', '100', NULL, NULL),
(8, 5, '11', 'Performance Workwear Insulated Jacket', 'brown', 'M', '1', '305', '305', NULL, NULL),
(9, 6, '6', 'Short Sleeve Heathered T-Shirt', 'heather', 'XL', '1', '20', '20', NULL, NULL),
(10, 7, '24', 'Women\'s Performance Workwear Softshell Jacket', 'black', 'L', '1', '85', '85', NULL, NULL),
(11, 8, '10', 'Relaxed Fit Duck Carpenter Pants', 'rinsed-brown', 'XL', '1', '40', '40', NULL, NULL),
(12, 8, '6', 'Short Sleeve Heathered T-Shirt', 'burgundy', 'XL', '2', '20', '40', NULL, NULL),
(13, 9, '25', 'Women\'s DuraTech Renegade Insulated Jacket', 'brown', 'L', '1', '120', '120', NULL, NULL),
(14, 17, '9', 'Active Waist Relaxed Fit Jeans', 'indigo', 'XL', '1', '40', '40', NULL, NULL),
(15, 17, '13', 'Duck Canvas Hooded Shirt Jacket', 'navy', 'XL', '1', '55', '55', NULL, NULL),
(16, 19, '23', 'Women\'s Relaxed Fit Straight Leg Cargo Pants', 'rinsed green leaf', '10', '1', '40', '40', NULL, NULL),
(17, 19, '19', 'Women’s Long Sleeve Chambray Roll-Tab Work Shirt', 'light-blue', 'L', '1', '40', '40', NULL, NULL),
(18, 20, '9', 'Active Waist Relaxed Fit Jeans', 'indigo', 'L', '1', '40', '40', NULL, NULL),
(19, 20, '6', 'Short Sleeve Heathered T-Shirt', 'heather', 'XL', '1', '20', '20', NULL, NULL),
(20, 21, '18', 'Women\'s Striped Cropped T-Shirt', 'honey stripe', 'L', '1', '25', '25', NULL, NULL),
(21, 22, '24', 'Women\'s Performance Workwear Softshell Jacket', 'black', 'XXL', '1', '85', '85', NULL, NULL),
(22, 23, '20', 'Women\'s Cropped Cargo Pants', 'black', '30', '1', '65', '65', NULL, NULL),
(23, 24, '25', 'Women\'s DuraTech Renegade Insulated Jacket', 'brown', 'XL', '1', '120', '120', NULL, NULL),
(24, 25, '22', 'Women\'s Perfect Shape Skinny Fit Jean Capri', 'indigo blue', '12', '2', '45', '90', NULL, NULL),
(25, 26, '23', 'Women\'s Relaxed Fit Straight Leg Cargo Pants', 'rinsed green leaf', '14', '2', '40', '80', NULL, NULL),
(26, 26, '12', 'DuraTech Renegade FLEX Duck Jacket', 'black', 'XL', '1', '125', '125', NULL, NULL),
(27, 27, '24', 'Women\'s Performance Workwear Softshell Jacket', 'black', 'L', '1', '85', '85', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_seos`
--

CREATE TABLE `page_seos` (
  `id` bigint UNSIGNED NOT NULL,
  `pageable_id` bigint UNSIGNED DEFAULT NULL,
  `pageable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `google_analytics` text COLLATE utf8mb4_unicode_ci,
  `bing_analytics` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_seos`
--

INSERT INTO `page_seos` (`id`, `pageable_id`, `pageable_type`, `page_url`, `page_title`, `meta_author`, `meta_keywords`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'http://localhost:8000', 'OneSport Ecommerce - Premium Sports Products for Performance & Lifestyle', 'OneSport Company', 'sports products, athletic gear, fitness equipment, sportswear, online shopping, premium quality, sporting goods, athletic apparel, fitness gadgets, training tools, sporty fashion, exercise accessories, best sports brands, competitive prices.', 'Elevate your performance with OneSport ecommerce\'s premium sports \r\nproducts - gear, fitness equipment, sportswear, and more. Shop now &\r\n embrace an active lifestyle!', NULL, NULL, '2023-07-19 04:29:54', '2023-07-19 10:14:57'),
(2, NULL, NULL, 'http://localhost:8000/cart/show', 'Your Winning Cart: Shop Premium Sports Products at OneSport Ecommerce', 'OneSport Company', NULL, 'Explore OneSport ecommerce\'s cart page. Your journey to peak performance starts here. Shop\r\n now and gear up for success!', NULL, NULL, '2023-07-19 04:36:13', '2023-07-19 09:48:10'),
(3, NULL, NULL, 'http://localhost:8000/blog/posts', 'OneSport Blog: Unleash Your Athletic Potential with Expert Insights & Trending Topics', 'OneSport Company', NULL, 'Discover the OneSport blog for sports enthusiasts. Explore \r\ntrending topics, expert tips, and product reviews to enhance your \r\nathletic journey. Fuel your passion with our comprehensive content.', NULL, NULL, '2023-07-19 04:39:09', '2023-07-19 09:48:22'),
(4, NULL, NULL, 'http://localhost:8000/contact-page', 'Contact OneSport Ecommerce: Reach Out for Top-Notch Sporting Support', 'OneSport Company', NULL, 'Get in touch with OneSport ecommerce\'s dedicated team today. Whether you\r\n have questions about products, orders, or need assistance, we\'re here \r\nto help. Reach out and experience top-notch customer support for your \r\nsporting needs. Contact us now and take the first step towards a \r\nseamless shopping experience.', NULL, NULL, '2023-07-19 04:40:49', '2023-07-19 09:48:36');

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
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `slug`, `author`, `created_at`, `updated_at`) VALUES
(1, 4, 'should-the-training-series-become-a-routine', 'Andrew Nagy', '2023-07-13 08:51:01', '2023-07-18 06:58:59'),
(2, 4, 'preparation-for-the-marathon', 'Ashley Mateo', '2023-07-13 08:58:05', '2023-07-18 06:59:16'),
(3, 4, 'the-best-running-shoes-2023', 'Tyler Chin', '2023-07-13 09:12:38', '2023-07-18 06:59:23');

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

--
-- Dumping data for table `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `full_text`) VALUES
(1, 1, 'en', 'Should the training series become a routine?', '<p>A daily run or push-up challenge can be a serious motivator and lead to rapid progress—if you do it right. Here\'s how.<br><br>Most likely, you have heard of such a phenomenon as a continuous series of training (workout streaks). Doing the same activity day after day for a period of time hasn\'t been popular for years — 30 days of squats, a month of planks, a 5K challenge every day — but the pandemic and the popularization of \"workouts at home\" have given them a lot of meaning.<br><br>The good side of series<br><br>One thing that characterizes the series is responsibility. A short-term, time-based task will take your mind off of what you\'re going to do and allow you to think less. And, importantly, it has a well-defined end point. According to Jim Afremow, Ph.D., sports psychologist and author of The Mind of a Champion, this deadline is extremely important. \"A lot of gyms use such limited programs because, like any other goal, part of making it measurable and attainable is defining the end point,\" he says. \"Then you create milestones and process goals.\" The series, by the way, is also a great opportunity for regular social media activity to stay good and honest until the end.<br><br>If you are new to training, the series may just be a routine for you. \"A challenge can give you the motivation to start being more physically active,\" says Tom Cowan, an exercise physiologist in London. And your new motivational boost is likely to bring many additional benefits. \"Sets can build momentum quickly and help you build the habit of making exercise a regular part of your daily schedule,\" explains Cowan. \"By doing the same movement for a few weeks, you should be able to see an improvement in your ability to do it.\" Consistency is what always works.<br><br>The downsides of doing something every day<br><br>While your body gets better at your selection skills, it also takes the brunt of a lot of repetitive work. You can easily experience one of the dreaded “toos”: too much, too hard, too fast. And not taking a day to recover will only increase your chances of fatigue and injury, says Cowan. You also increase your risk of injury if your body isn\'t properly prepared to begin with (say, you do up to 30 push-ups a day for 30 days before you even get in shape). Then there\'s a plateau: your body understands what you\'re doing, stops struggling, and stops adapting. Conventional wisdom suggests you probably have three to five weeks before it kicks in, so that\'s something to consider if you\'re making the monthly commitment, which is a common goal for the series.<br><br>In addition to physical obstacles, there is mental fatigue. Doing the same workout every day can eventually sap your motivation, says Afremou. That\'s not good if you\'re hoping for long-term progress.<br></p>'),
(2, 1, 'uk', 'Чи має тренувальна серія стати рутиною?', '<p>Щоденна серія пробіжок або челендж з віджимань може бути серйозною мотивацією та призвести до швидкого прогресу — якщо ви робите це правильно. Ось як.<br><br>Швидше за все, ви чули про таке явище як  безперервна серія тренувань (workout streaks). Виконання однієї і тієї ж діяльності день за днем протягом певного періоду часу було мало популярним протягом багатьох років — 30 днів присідань, місяць планки, челендж на 5 км щодня — але пандемія та популяризація «тренувань вдома» додали їм великої значущості.<br><br>Гарна сторона серій<br><br>Одна річ, якою характеризується серія — це відповідальність. Короткострокове завдання, яке залежить від часу, позбавить вас від роздумів про те, що ви робитимете, і дасть вам змогу думати менше. І, що важливо, він має чітко визначену кінцеву точку. На думку Джима Афремоу, доктора філософії, фахівця зі спортивної психології та автора «Розуму чемпіона», цей дедлайн грає  надзвичайно важливу роль. «Багато тренажерних залів використовують такі обмежені програми, тому що, як і будь-яка інша мета, частина її вимірності та досяжності полягає у визначенні кінцевої точки», — каже він. «Потім ви створюєте віхи та обробляєте цілі». Серія, до речі, також є чудовою можливістю для регулярної активності у соціальних мереж, щоб залишатися хорошими та чесними до кінця.<br><br>Якщо ви новачок у тренуваннях, серія може бути для вас просто рутиною. «Поставлене завдання може дати вам мотивацію почати бути більш фізично активними», — каже Том Коуен, фізіолог із фізичних вправ із Лондона. І ваш новий мотиваційний поштовх, швидше за все, принесе безліч додаткових переваг. «Серії можуть швидко набрати імпульс і допомогти вам виробити звичку робити вправи загалом щоденною частиною свого розкладу», — пояснює Коуен. «Виконуючи один і той самий рух протягом кількох тижнів, ви зможете побачити покращення своєї здатності виконувати його». Послідовність – те що завжди працює.<br><br>Негативні сторони того, щоб робити щось щодня<br><br>У той час як ваше тіло стає кращим у ваших навичках вибору, воно також несе на собі тягар великої кількості повторюваної роботи. Ви можете легко зіштовхнутись із одним жахливих «занадто»: занадто багато, занадто сильно, занадто швидко. І якщо ви не витратите день на відновлення, це лише посилить ваші шанси на втому та травму, каже Кован. Ви також підвищуєте ризик отримання травми, якщо ваше тіло не підготується належним чином для початку (скажімо, ви робите до 30 віджимань на день протягом 30 днів, перш ніж навіть наберете форму). Потім настає плато: ваше тіло розуміє, що ви робите, більше не відчуває труднощів і перестає адаптуватися. Традиційна мудрість припускає, що у вас, ймовірно, є від трьох до п’яти тижнів, перш ніж це почнеться, тому це варто враховувати, якщо ви виконуєте місячне зобов’язання, що є звичайною ціллю для серії.<br><br>Окрім фізичних перешкод, існує розумова втома. Виконання одного і того ж тренування щодня може врешті-решт підірвати вашу мотивацію, каже Афремоу. Це не дуже добре, якщо ви сподіваєтеся на довгостроковий прогрес.<br></p>'),
(3, 2, 'en', 'Preparation for the marathon', '<p>You have practically prepared for the race, so all that remains is to make the most of the last days before the competition.<br><br>Now that you\'ve done the bulk of the hard work—long runs, recovery runs, strength training—finish your training plan right with these expert tips to help you go the distance with confidence, whether it\'s your first big race or your 20th.<br><br>1. Respect the cone<br><br>A typical marathon training plan lasts 16 weeks (although some are longer or shorter) and begins reducing weekly training mileage two to three weeks before the event, says Jason Fitzgerald, USA Track and Field\'s certified track and field coach, head strength coach and host of The Strength Podcast Running Podcast. This is called \"tapering,\" and it allows you to get the adaptation you want from your last long run (also your longest run) while still giving your body plenty of time to recover, he explains. He warns that by this two- to three-week period, you may begin to lose some of your aerobic fitness. But the tapering isn\'t just about your miles, Fitzgerald says. You should also cut back on aerobic cross-training (such as cycling) and strength training during this period, he says. You don\'t have to stop completely, but the workouts will be shorter and the effort will be lower.<br><br>2. Do a dress rehearsal<br><br>Test everything you plan to race—shirt, shorts, socks, and especially shoes—before race day. \"It\'s important that you wear whatever you\'re going to wear for the marathon at least two or three times during training and during marathon-like runs, such as long runs,\" says Fitzgerald. This way, you are much less likely to get irritated or painful blisters. A good rule of thumb is to dress as if the temperature outside is a few degrees warmer than it really is. Remember that you can shed clothes in the first few kilometers during the warm-up, says Fitzgerald.<br><br>3. Load your carbs carefully<br><br>As a marathon runner, you\'re probably unfamiliar with the term \"carb loading.\" Carbohydrates are stored as glycogen and are the body\'s most readily available energy source, so many runners eat more carbohydrates than usual before a race to replenish their glycogen stores. But many people misunderstand the strategy: sorry, carb-loading doesn\'t mean devouring loaves of bread, plates of spaghetti, and bowls of cereal in the weeks leading up to the race.<br><br>Instead, you need a more structured approach. About three to four days before an event, shift your meal pattern to 70 or 75 percent carbs while still leaving room for protein and healthy fats, says Ryan Maciel, RD, head performance coach at Precision Nutrition. If you just carb up the night before a race, you\'ll probably feel sluggish the next day, and it won\'t really increase your glycogen stores. Your body can\'t do this overnight, he says.<br><br>Also, practice carb-loading in the days leading up to some of your longest runs so you know what will work for you, says Monique Ryan, RDN, a sports nutritionist who consults with professional athletes and endurance teams. That way, you won\'t face any surprises before you get to the starting line.<br><br>4. Early hydration<br><br>To get the most out of your workouts, you need to drink well all the time, and especially in the weeks leading up to your event, Maciel says. \"Drinking water the night before a race doesn\'t make up for not being hydrated enough on all the other days,\" he says. In other words, if you worked out slightly dehydrated, you simply wouldn\'t be in the shape you could have been if you\'d been drinking more fluids. During a race, the idea is to replace sweat as you lose it. \"You should drink 700-900 ml of water per hour of running,\" says Maciel. Marathons usually have hydration stations along the course so you don\'t have to worry about carrying fluids with you, and most offer water and a sports drink. Check the map ahead of time to see how far apart these stations are and then plan your hydration strategy accordingly. Finally, make sure you know what\'s going on at the event and road test a specific sports drink in training so that on race day, if you\'re craving electrolytes, you\'ll know the drink agrees with your stomach.</p><p>5. Pack things the night before<br><br>On race morning, you might wake up at 4 or 5 a.m., nervous about the run and getting to the starting village. One way to de-stress is to lay out everything you need before you go to bed. This includes clothing, shoes, headphones, energy gels and chews, hydration, bib and pins, warm items, an extra phone charger. Many athletes say the act itself can be a calming pre-race ritual.<br><br>6. Do not focus on sleep<br><br>Of course, a great night\'s sleep before a race is ideal, but the odds are slim, says Cheri Mach, MD, a physician scientist at UCSF\'s Center for Human Performance and a member of the Nike Performance Council, who specializes in the sleep and performance of elite athletes. Anxiety and worry about what is about to happen often hinder even experienced runners. One way to promote restful sleep is to lean into your usual bedtime routine, whether it\'s reading a book, journaling, stretching, or anything else that helps you relax and signal your body that it\'s time to sleep, says Dr. Mach. “If your mind is racing, extend your bedtime to help process your thoughts. And if you can\'t fall asleep after 45 minutes in bed, get up, do a sleep reset - read, stretch, do another activity in another room - then when you feel more tired, go back to bed. Don\'t lie there for hours trying to fall asleep,\" she says. If you just can\'t get a good night\'s rest, don\'t panic. One sleepless night won\'t derail your preparation. \"The sleep you get in the days and weeks leading up to the competition is the most important \" says Dr. Mach. That\'s why she recommends prioritizing sleep the week before the race. \"At least seven hours a night, but aim for eight to 10 hours, especially if you\'ve accumulated a sleep deficit from chronic sleep deprivation,\" she says. .<br><br><br>7. Know what you will be eating the morning of the race<br><br>If you can wake up early enough to eat breakfast at least two hours before you start running, eat a normal, well-balanced meal, Maciel says, with more than half (up to 75 percent) of your calories coming from carbohydrates, a quarter from protein, and the rest - from healthy fats. Think banana and nut butter toast and maybe a hard-boiled egg on the side. If you don\'t want to get up so early, eat a mini version of this meal an hour before you start running. Or you can go on a streak, Maciel says. Be sure to include a good source of complex carbohydrates, such as whole grains. Complex carbs take longer to break down, which means fuel needs to hit your bloodstream during your run, right when you need it. For a smoothie, combine oats, peanut butter, berries, and cow\'s or alternative milk. Avoid foods that contain fat or fiber or are excessively fatty, Maciel says. They take longer to digest, which can strain your stomach and cause bowel problems while running. Whatever you eat, you need to be sure that the food will work for you. \"You don\'t want to try anything new before a race,\" cautions Maciel. \"You have to do what you\'ve been practicing for the last few months of training.\"<br><br>8. Fuel Smart During (and After) Your Run<br><br>It is extremely necessary to replenish fuel reserves. Skip it and you\'ll deplete your glycogen stores after two or so hours of running, which in a marathon can mean half the race. \"You\'re going to hit the wall,\" Ryan says, and you won\'t be able to keep up the pace. To avoid this, Ryan says to eat 30 to 60 grams of carbs per hour. You\'ll also want to consume 250 to 500 milligrams of sodium per hour, Maciel adds. You can get gels, gummies, sports drinks, and/or salty snacks with carbohydrates. Again, use your longer runs to experiment with different fueling options. What works for one runner may not necessarily work for you. Once you cross the finish line — congratulations, by the way! — eat a whole, balanced meal within an hour or two, says Maciel. This will help your body start the recovery process and preserve muscle mass.<br><br>9. Remember your breathing<br><br>As you run, focus on deep breaths that inflate your belly on the inhale and contract the belly back on the exhale, says Belisa Vranich, PsyD, clinical psychologist and author of Breathing for Warriors. This method of belly breathing opens up more room in your lungs for oxygen and helps you breathe more efficiently because you can get the same amount of oxygen in one breath as you would from several shallow breaths, Vranich says. When you take deeper breaths and exhales, you deliver more oxygen to your muscles when they need it most, allowing you to maintain or pick up pace. \"Breath control can also slow your heart rate,\" adds Chris Bennett, Nike\'s senior director of global running.<br></p>'),
(4, 2, 'uk', 'Підготовка до марафону', '<p>Ви практично підготувались до забігу, а отже залишилось лише по максимуму використати останні дні перед змаганням.<br><br>Тепер, коли ви виконали основну частину важкої роботи – довгі пробіжки, відновлювальні пробіжки, силові тренування — правильно завершіть свій план тренувань за допомогою цих експертних порад, які допоможуть впевнено пройти дистанцію, будь то ваша перша велика гонка чи 20-та.<br><br>1. Поважайте конус<br><br>Типовий план марафонських тренувань триває 16 тижнів (хоча деякі з них довші або коротші) і починає скорочувати щотижневий тренувальний кілометраж за два-три тижні до заходу, каже Джейсон Фіцджеральд, сертифікований тренер з легкої атлетики США, головний тренер силового бігу та ведучий подкасту The Strength Running Podcast. Це називається «конусом», і це дає вам можливість отримати бажану адаптацію з останньої тривалої пробіжки (також найдовшої пробіжки), одночасно даючи вашому тілу достатньо часу для відновлення, пояснює він. Він попереджає, що до цього двох-тритижневого періоду ви можете почати втрачати частину аеробної форми. Але звуження стосується не лише ваших миль, каже Фіцджеральд. Ви також повинні скоротити аеробні крос-тренування (наприклад, їзда на велосипеді) і силові тренування в цей період, говорить він. Вам не потрібно повністю зупинятись, але тренування будуть короткими, а зусилля меншими.<br><br>2. Зробіть генеральну репетицію<br><br>Протестуйте все, що плануєте на перегонах — футболку, шорти, шкарпетки і особливо взуття — перед днем змагань. «Важливо, щоб ви носили все, що збираєтеся носити під час марафону, принаймні два-три рази під час тренувань і під час пробіжок, схожих на сам марафон, наприклад, під час тривалого бігу», — каже Фіцджеральд. Таким чином, у вас набагато менше шансів отримати подразнення або хворобливі пухирі. Хорошим правилом є одягатися так, ніби на вулиці температура на декілька градусів тепліше, ніж є насправді. Пам\'ятайте, що ви можете скинути одяг у перші кілька кілометрів під час розігріву, каже Фіцджеральд.<br><br>3. Обережно завантажуйте вуглеводи<br><br>Як марафонець, ви, мабуть, не знайомі з терміном «вуглеводне завантаження». Вуглеводи зберігаються у вигляді глікогену і є найбільш доступним джерелом енергії в організмі, тому багато бігунів їдять більше вуглеводів, ніж зазвичай, перед забігом, щоб поповнити свої запаси глікогену. Але багато людей розуміють стратегію неправильно: вибачте, що завантаження вуглеводами не означає поглинання буханців хліба, тарілок спагетті та мисок пластівців протягом тижнів до перегонів.<br><br>Замість цього вам потрібен більш структурований підхід. Приблизно за три-чотири дні до заходу змініть вигляд їжі на 70 або 75 відсотків вуглеводів, все ще залишаючи місце для білків і здорових жирів, каже Райан Масіел, RD, головний тренер з продуктивності харчування Precision Nutrition. Якщо ви просто вийдете на вуглеводи в ніч перед гонкою, ви, ймовірно, відчуєте себе млявим на наступний день, і це насправді не збільшить ваші запаси глікогену. Ваше тіло не може зробити це за одну ніч, каже він.<br><br>Також практикуйте завантаження вуглеводів у дні, що передують деяким з ваших найдовших пробіжок, щоб ви знали, що буде працювати для вас, каже Монік Райан, RDN, спортивний дієтолог, який консультує професійних спортсменів і команди на витривалість. Таким чином, ви не зіткнетеся з будь-якими сюрпризами, перш ніж потрапити на стартову лінію.<br><br>4. Рання гідратація<br><br>Щоб отримати максимальну віддачу від тренувань, ви повинні добре пити весь час, і особливо за тижні до вашої події, каже Масіель. \"Вживання води в ніч перед гонкою не компенсує недостатню гідратацію в усі інші дні\", - говорить він. Іншими словами, якщо ви тренувалися, злегка зневоднені, у вас просто не буде фізичної форми, яку ви могли б мати, якби приймали більше рідини. Під час гонки ідея полягає в тому, щоб замінити піт, коли ви його втрачаєте. \"Ви повинні пити від 700-900 мл води на годину бігу\", - говорить Масіель. Марафони, як правило, мають станції гідратації вздовж траси, тому вам не доведеться турбуватися про носіння рідини з собою, і більшість пропонують воду та спортивний напій. Заздалегідь подивіться на карту, щоб побачити, наскільки далеко одна від одної знаходяться ці станції, а потім відповідно сплануйте свою стратегію гідратації. Нарешті, переконайтеся, що ви знаєте, що відбувається на заході, і проведіть дорожні випробування конкретного спортивного напою на тренуваннях, щоб у день гонки, якщо ви жадаєте електролітів, ви будете знати, що напій погоджується з вашим шлунком.</p><p> 5. Пакуйте речі напередодні ввечері<br><br>Вранці гонки ви можете прокидатися о 4 або 5 ранку, нервувати через біг і про те, щоб дістатися до стартового селища. Один із способів усунення стресу: розкладіть все, що вам знадобиться, перш ніж лягати спати. Сюди входять одяг, взуття, навушники, енергетичні гелі та жування, гідратація, нагрудник і шпильки, теплі речі, додатковий зарядний пристрій для телефону. Багато спортсменів кажуть, що сам акт може бути заспокійливим ритуалом перед забігом.<br><br>6. Не зациклюйтеся на сні<br><br>Звичайно, відмінний нічний сон перед гонкою є ідеальним, але шанси на це дуже малі, каже Чері Мах, доктор медичних наук, вчений-лікар в Центрі людської продуктивності UCSF і член Ради з продуктивності Nike, який спеціалізується на сні і виступах елітних спортсменів. Тривога і хвилювання з приводу того, що має статися, часто заважають навіть досвідченим бігунам. Один із способів сприяти спокійному сну - це схилятися до свого звичайного режиму засинання, будь то читання книги, запис у щоденнику, розтяжка або що-небудь інше, що допомагає вам розслабитися і сигналізувати своєму тілу, що пора спати, каже доктор Мах. «Якщо ваш розум мчить наввипередки, продовжте час підготовки до сну, щоб допомогти обробити свої думки. І якщо ви не можете заснути після 45 хвилин у ліжку, встаньте, зробіть скидання сну - читайте, розтягуйтеся, робіть іншу діяльність в іншій кімнаті - тоді, коли ви відчуєте себе більш втомленими, поверніться в ліжко. Не лежіть там годинами, намагаючись заснути\", - каже вона. Якщо ви просто не можете добре відпочити вночі, не лякайтеся. Одна безсонна ніч не порушить вашу підготовку. \"Сон, який ви отримуєте в дні і тижні, що передують змаганням, є найважливішим\", - говорить доктор Мах. Ось чому вона рекомендує віддати пріоритет сну за тиждень до гонки. \"Принаймні сім годин на добу, але прагніть до восьми-10 годин, особливо якщо у вас накопичився дефіцит сну через хронічний недостатній сон\", - говорить вона.<br><br>7. Знайте, що ви будете їсти вранці гонки<br><br>Якщо ви можете прокинутися досить рано, щоб поснідати принаймні за дві години до того, як приступите до бігу, прийміть нормальну, добре збалансовану їжу, каже Масіель, причому більше половини (до 75 відсотків) калорій надходить з вуглеводів, чверть з білка, а решта - з корисних жирів. Подумайте про тост з банановим і горіховим маслом і, можливо, звареним круто яйцем збоку. Якщо ви не хочете вставати так рано, з\'їжте міні-версію цієї їжі за годину до початку бігу. Або ви можете піти на смузі, каже Масіель. Обов\'язково включіть хороше джерело складних вуглеводів, таких як цільні зерна. Складні вуглеводи потребують більше часу на розчеплення, а це означає, що паливо повинно потрапляти в кров під час бігу, саме тоді, коли вам потрібно. Для коктейлю поєднуйте овес, арахісове масло, ягоди та коров\'яче або альтернативне молоко. Уникайте продуктів, які містять жир або клітковину або надмірно жирні, каже Масіель. Вони перетравлюються довше, що може перенапружити ваш шлунок і викликати проблеми з кишечником під час бігу. Що б ви не їли, ви повинні бути впевнені, що їжа буде працювати для вас. «Ви не хочете пробувати нічого нового перед гонкою», - застерігає Масіель. «Ви повинні робити те, що практикували протягом останніх кількох місяців тренувань».<br><br>8. Заправляйтеся розумно під час бігу (і після)<br><br>Поповнити запаси палива вкрай необхідно. Пропустіть його, і ви виснажите свої запаси глікогену після двох або близько того годин бігу, що в марафоні може означати половину забігу. «Ти вдаришся об стіну», - каже Райан, і ти не зможеш утримати темп. Щоб уникнути цього, Райан каже, що потрібно приймати від 30 до 60 грамів вуглеводів на годину. Ви також захочете споживати від 250 до 500 міліграмів натрію на годину, додає Масіель. Ви можете отримати як гелі, гумки, спортивні напої, так і / або солоні закуски з вмістом вуглеводів. Знову ж таки, використовуйте свої тривалі пробіжки, щоб поекспериментувати з різними варіантами заправки. Те, що працює для одного бігуна, не обов\'язково буде працювати для вас. Після того, як ви перетнете фінішну лінію — вітаємо, до речі! — їжте повноцінну, збалансовану їжу протягом години або двох, — каже Масіель. Це допоможе вашому тілу запустити процес відновлення і зберегти м\'язову масу.<br><br>9. Пам\'ятайте про своє дихання<br><br>Під час бігу сконцентруйтеся на глибоких вдихах, які надувають живіт на вдиху і скорочують живіт назад на видиху, каже Беліса Вранич, PsyD, клінічний психолог і автор книги «Дихання для воїнів». Цей метод дихання животом відкриває більше місця в легенях для кисню і допомагає дихати більш ефективно, оскільки ви можете отримати таку ж кількість кисню за один вдих, як і від декількох неглибоких вдихів, говорить Вранич. Коли ви робите більш глибокі вдихи і видихи, ви доставляєте більше кисню до своїх м\'язів, коли вони цього найбільше потребують, що дозволяє вам підтримувати або набирати темп. «Контроль дихання також може уповільнити частоту серцевих скорочень», - додає Кріс Беннетт, старший директор Nike з глобального бігу. <br></p>'),
(5, 3, 'en', 'The Best Running Shoes 2023', '<p>What to look for in running shoes<br><br>Depending on what kind of running you\'re doing—whether it\'s speedwork, a trail run, or a straightforward jog—you\'ll need to make sure the shoe you wear is well-equipped with adequate grip or cushion or airiness. Across the board, however, you should consider the following for all of the best running shoes.<br><br>Upper: If it\'s not part of the shoe\'s sole, then we\'re talking about the upper. Whether it\'s Nike\'s Flyknit or Adidas\' Primeknit, each brand has crafted a material that makes for the “best” kind of upper. Besides being breathable and lightweight, you should also make sure your upper is durable for miles and miles of pavement-pounding so you never have to wonder what your big toe is doing peeking out from the toebox. <br>Midsole: Squeezed between the upper and the sole is the midsole, a hefty chunk of foam that provides the cushion for a smooth ride. Runners generally will have specific desires for their midsole, like if they want to mimic the sensation running on a cloud or they actually want to feel some of the feedback from the ground.<br><br>Outsole: Here\'s the part of the shoe that actually makes contact with the road. Road outsoles tend to consist of smooth, grippy rubber, while trail runners will have chunkier lugs for traction on slippery dirt and treacherous inclines. <br><br>Ankle collar: The cushiony part of the shoe that pads your ankle is known as the ankle collar. It\'ll keep your foot securely planted in your shoe, but you\'ll need to actually try out a shoe to sense whether that ankle collar will rub your Achilles tendon raw by lap five. <br><br>Heel-to-toe drop: When you\'re standing still, the height distance between your heel and the front of your foot is considered the heel-to-toe drop. Picking the right ratio (which is measured in millimeters, typically between eight to 12 millimeters) is all about personal preference, and you\'ll only really get a feel for it during a test run. If you\'re not heading into a store in-person to test out the shoe, you\'ll need to take a beat after you buy a shoe to determine whether your running stride feels natural and comfortable, and you can feel out your preferred heel-to-toe drop from there.<br><br>So, whether you\'re training to run a marathon or just want to hop on the treadmill every now and then, here are the best running shoes for every kind of activity.<br><br>The Best Nice, Normal Road Running Shoes: Brooks Ghost 15<br>Brooks Ghost 15<br>$140 at REI<br><br>Weight: 10.1 oz<br>Heel-to-Toe Drop: 12 mm<br><br>Finding the best running shoe for you is usually all about fit, and the Ghost 15 comes in narrow, medium, wide, and extra wide, making this the most inclusive shoe on this list. The midsole is also broadly appealing, ensuring a soft landing and cushiony rides for everyday running, no matter the surface. The Ghost 15 is just barely heavier than the last iteration of this model, but with improved cushioning and a more structured, breathable, and better-fitting upper, so it\'ll be worth the measly extra .2 ounces, and won\'t feel as squishy as a purposely-built “fat” shoe. If you\'re new to the whole pavement-pounding thing, this is a great place to start. <br>The Best Maximalist Running Shoes: Hoka Bondi 8<br>Hoka Bondi 8<br>$165 at REI<br><br>Weight: 10.8 oz<br>Heel-to-Toe Drop: 4 mm<br><br>For the smoothest of rides, whether you\'re an advanced runner or a newbie, the Bondi 8s are an excellent pair of trainers. They\'re firmer than they look—we awarded these running shoes a Fitness Award last year because of just how natural they feel to stride in. But a big part of the appeal of any Hoka shoe is always going to be its super-plush, supportive midsoles. And with a wide range of sizes available, the Bondi 8s can suit practically everyone and every foot. <br>The Best Running Shoes for Racing: Nike Vaporfly NEXT% 2<br>Nike Vaporfly NEXT% 2<br>$250 at Nike<br><br>Weight: 6.9 oz<br>Heel-to-Toe Drop: 8 mm<br><br>With the Nike Vaporfly NEXT% 2, you\'ll feel like the shoes are literally launching you forward on the road, because they are. Running is in the middle of a revolution: A new generation of so-called \"supershoes\" that actually make you faster are hitting the market. And anecdotally speaking, the model most pros and serious amateurs are choosing is the Vaporfly Next%. The shoe\'s lightweight construction won\'t weigh you down, while the full-length carbon fiber plate adds stability. But the real star of the show is Nike\'s ZoomX foam, which returns a little energy back to your legs. </p><p>The Best Everyday Running Shoes: Asics Gel-Kayano 29 <br>Asics Gel-Kayano 29<br>$160 at Asics<br><br>Weight: 10.5 oz<br>Heel-to-Toe Drop: 10 mm<br><br>In 2022, we called the Asics Gel-Kayano 14 the “sneaker of the moment,” but when it comes to actual running chops, we think the current Gel-Kayano 29s have a greater edge. This durable model features exceptionally breathable and stretchy upper for long-distance runs. Special cushioning in the midsole is designed to help soften landings, while baked-in stability features ensure a stable and comfortable run. This shoe is a workhorse, and we know because they carried one of our editors through a marathon last year. The Gel-Kayano 29s might not be as exciting as some other running shoes or technology on this list, but hell, you\'d be hard-pressed to find something as proven and reliable.<br>The Best Ultra-Cushioned Running Shoes: New Balance FuelCell SuperComp Trainer<br>New Balance FuelCell SuperComp trainer<br>$180 at New Balance<br><br>Weight: 11.3 oz<br>Heel-to-Toe Drop: 8 mm<br><br>Another Fitness Award winner from 2022, the FuelCell SuperComp Trainers feature an aggressively rockered shape and soft foam that makes it feel like you\'re floating while you\'re running. These trainers fall on the heavier end of things, but that sturdiness coupled with New Balance\'s baked-in running tech have a propelling effect that helps to alleviate some of the weight you\'re feeling on your foot. They\'re pretty ideal for longer runs on hard surfaces. <br>The Best Trail-Running Shoes: Salomon Speedcross 6<br>Salomon Speedcross 6<br>$140 at REI<br><br>Weight: 1 lb 5 oz<br>Heel-to-Toe Drop: 10 mm<br><br>Salomon has found a way to balance its style and athletic bona fides, so much so that you\'d be forgiven for forgetting that it also makes great trail running shoes like the Speedcross 6. The latest model of the Speedcross has lost a little weight, and an updated outsole grips wet surfaces like Spider-Man\'s hands on a skyscraper. For especially muddy conditions, the Mud Contagrip ribber outsoles make light work out of those messy situations, while the high-rebound midsoles help you go farther more easily and comfortably.<br>The Best Supportive Running Shoes: Nike React Infinity Run 3<br>Nike React Infinity Run Flyknit 3<br>$160 at REI<br><br>Weight: 10.2 oz<br>Heel-to-Toe Drop: 8 mm<br><br>If you overpronate, you\'re going to want these sneakers. The React Infinity Run 3s double down on arch support and cushioning around the heel and ankle to help correct potentially detrimental running strides. The 3s don\'t have the same dramatic rocker shape as other super-cushiony running shoes, but the foam rocker does give runners a little more pep in their step, in addition to energy rebound and added stability. As with the lightweight Flyknit upper, you can be sure your foot won\'t overheat on those long-distance hauls.<br></p>'),
(6, 3, 'uk', 'Найкраще бігове взуття 2023 року', '<p>Що шукати в кросівках для бігу<br><br>Залежно від того, яким типом бігу ви займаєтеся — швидкісною роботою, бігом по дорозі чи простою пробіжкою — вам потрібно переконатися, що взуття, яке ви носите, має відповідне зчеплення, подушку чи легкість. Однак у цілому ви повинні враховувати наступне, щоб вибрати найкраще бігове взуття.<br><br>Верх: якщо це не частина підошви взуття, тоді ми говоримо про верх. Будь то Flyknit від Nike чи Primeknit від Adidas, кожен бренд створив матеріал, який створює «найкращий» вид верху. Окрім того, що ваш верх дихає та легкий, ви також повинні переконатися, що ваш верх витримає милі та милі ударів по тротуару, щоб вам ніколи не доводилося дивуватися, що робить ваш великий палець на нозі, визираючи з підпальців.<br>Проміжна підошва: між верхом і підошвою затиснута проміжна підошва, чималий шматок піни, який забезпечує амортизацію для плавної їзди. Бігуни, як правило, мають особливе бажання щодо своєї проміжної підошви, наприклад, чи хочуть вони імітувати відчуття бігу по хмарі або вони справді хочуть відчути зворотний зв’язок від землі.<br><br>Підошва: це та частина взуття, яка фактично контактує з дорогою. Дорожня підошва, як правило, складається з гладкої, чіпкої гуми, тоді як трейл-раннери матимуть товстіші виступи для зчеплення на слизькій землі та підступних схилах.<br><br>Комір для щиколотки: м’яка частина взуття, яка прокладає вашу щиколотку, відома як комір для щиколотки. Це надійно закріпить вашу ногу у взутті, але вам потрібно буде випробувати взуття, щоб відчути, чи комір щиколотки натиратиме ахіллове сухожилля на п’ятому колі.<br><br>Падіння з п’яти на носок: коли ви стоїте на місці, відстань по висоті між п’ятою та передньою частиною стопи вважається падінням з п’яти на носок. Вибір правильного співвідношення (яке вимірюється в міліметрах, зазвичай від 8 до 12 міліметрів) залежить від особистих уподобань, і ви зможете відчути це лише під час тестового запуску. Якщо ви не збираєтеся відвідувати магазин особисто, щоб перевірити взуття, вам потрібно буде спробувати після того, як ви купите взуття, щоб визначити, чи ваш крок під час бігу є природним і зручним, і ви можете намацати каблук, якому ви віддаєте перевагу. -до ніг падіння звідти.<br><br>Отже, незалежно від того, чи ви тренуєтеся бігти марафон чи просто хочете час від часу заскочити на бігову доріжку, ось найкраще бігове взуття для всіх видів діяльності.<br><br>Найкраще гарне, звичайне шосейне взуття: Brooks Ghost 15<br>Брукс Привид 15<br>140 доларів на REI<br><br>Вага: 10,1 унції<br>Висота від п\'яти до пальця: 12 мм<br><br>Вибір найкращого кросівки для бігу зазвичай залежить від розміру, і Ghost 15 доступний у вузьких, середніх, широких і екстрашироких кросівках, що робить це найпопулярніше взуття в цьому списку. Проміжна підошва також загалом приваблива, забезпечуючи м’яке приземлення та зручність під час щоденного бігу, незалежно від поверхні. Ghost 15 ледве важчий за останню ітерацію цієї моделі, але з покращеною амортизацією та більш структурованим, дихаючим і краще прилягаючим верхом, тож він коштуватиме мізерних додаткових 0,2 унції та не відчуватиметься. такий м’який, як навмисно виготовлений «товстий» черевик. Якщо ви новачок у цій справі стукання тротуарів, це чудове місце для початку.<br>Найкраще максималістичне бігове взуття: Hoka Bondi 8<br>Хока Бонді 8<br>165 доларів на REI<br><br>Вага: 10,8 унцій<br>Висота від п\'яти до пальця: 4 мм<br><br>Bondi 8s — чудова пара кросівок для максимально плавної їзди, незалежно від того, досвідчений ви бігун чи новачок. Вони міцніші, ніж здаються — минулого року ми нагородили ці кросівки Fitness Award за те, наскільки вони природні, коли вони взуваються. Але великою частиною привабливості будь-якого взуття Hoka завжди буде його супер-плюш, підтримуюча проміжна підошва. Завдяки широкому асортименту доступних розмірів Bondi 8s підійдуть практично для кожної ноги.<br>Найкраще бігове взуття для перегонів: Nike Vaporfly NEXT% 2<br>Nike Vaporfly NEXT% 2<br>250 доларів у Nike<br><br>Вага: 6,9 унцій<br>Висота від п\'яти до пальця: 8 мм<br><br>З Nike Vaporfly NEXT% 2 ви відчуєте, що взуття буквально запускає вас вперед на дорозі, тому що це так. Біг — це революція: на ринок виходить нове покоління так званих «супервзуттів», які дійсно роблять вас швидшими. І якщо говорити анекдотично, то модель, яку обирають більшість професіоналів і серйозних любителів, це Vaporfly Next%. Легка конструкція взуття не обтяжуватиме вас, а пластина з вуглецевого волокна на всю довжину додає стабільності. Але справжньою зіркою шоу є піна ZoomX від Nike, яка повертає трохи енергії вашим ногам.</p><p>Найкращі кросівки для щоденного бігу: Asics Gel-Kayano 29<br>Asics Gel-Kayano 29<br>$160 в Asics<br><br>Вага: 10,5 унцій<br>Висота від п\'яти до пальця: 10 мм<br><br>У 2022 році ми назвали Asics Gel-Kayano 14 «кросівками моменту», але коли справа доходить до реальних тренувань для бігу, ми вважаємо, що нинішні Gel-Kayano 29s мають більшу перевагу. Ця міцна модель має надзвичайно дихаючий і еластичний верх для бігу на довгі дистанції. Спеціальна амортизація в проміжній підошві розроблена, щоб допомогти пом’якшити приземлення, а вбудовані функції стабілізації забезпечують стабільний і комфортний біг. Це взуття — робоча конячка, і ми знаємо про це, тому що вони провели одного з наших редакторів через марафон минулого року. Gel-Kayano 29s може бути не таким захоплюючим, як інші кросівки чи технології в цьому списку, але, чорт забирай, вам буде важко знайти щось настільки ж перевірене та надійне.<br>Найкращі бігові кросівки з ультра-м’якістю: кросівки New Balance FuelCell SuperComp<br>Тренажер New Balance FuelCell SuperComp<br>180 доларів США в New Balance<br><br>Вага: 11,3 унції<br>Висота від п\'яти до пальця: 8 мм<br><br>Ще один переможець фітнес-премії 2022 року, кросівки FuelCell SuperComp мають агресивну форму та м’яку піну, що створює відчуття, ніби ви парите під час бігу. Ці кросівки важчі, але ця міцність у поєднанні з вбудованою технікою бігу New Balance мають стимулюючий ефект, який допомагає трохи зменшити вагу, яку ви відчуваєте на нозі. Вони ідеальні для тривалих пробіжок по твердій поверхні.<br>Найкраще взуття для трейл-ранінгу: Salomon Speedcross 6<br>Salomon Speedcross 6<br>140 доларів на REI<br><br>Вага: 1 фунт 5 унцій<br>Висота від п\'яти до пальця: 10 мм<br><br>Salomon знайшов спосіб настільки збалансувати свій стиль і спортивну чесність, що вам буде прощено забути, що він також робить чудові кросівки для трейлу, такі як Speedcross 6. Остання модель Speedcross трохи схудла, а оновлена підошва тримається мокрих поверхонь, як руки Людини-павука на хмарочосі. Для особливо брудних умов ребриста підошва Mud Contagrip полегшує роботу в таких брудних ситуаціях, а проміжна підошва з високим відскоком допомагає вам йти далі легше та комфортніше.<br>Найкраще підтримуюче бігове взуття: Nike React Infinity Run 3<br>Nike React Infinity Run Flyknit 3<br>160 доларів на REI<br><br>Вага: 10,2 унції<br>Висота від п\'яти до пальця: 8 мм<br><br>Якщо ви надмірно пронаціонуєте, ви захочете ці кросівки. React Infinity Run 3s подвоює підтримку склепіння та амортизацію навколо п’яти та щиколотки, щоб допомогти виправити потенційно шкідливі кроки під час бігу. Кросівки 3s не мають такої ефектної форми, як інші бігові кросівки з надзвичайно м’якими подушками, але пінопластовий рокер надає бігунам трохи більше бадьорості в їхньому кроку, на додаток до відскоку енергії та додаткової стабільності. Як і у випадку з легким верхом Flyknit, ви можете бути впевнені, що ваша нога не перегріється під час далеких перевезень.<br></p>');

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
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `slug`, `code`, `quantity`, `product_details`, `color`, `size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `buyone_getone`, `trend`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, NULL, 'heavyweight-long-sleeve-t-shirt', '100001', 123, NULL, NULL, 'M,L,XL,XXL', '35', NULL, 'https://youtu.be/N5ctY9nPt9o123', 1, 0, 0, 0, 0, 0, 0, 1, '2023-06-12 09:08:44', '2023-07-18 06:50:08'),
(2, 1, 1, 21, NULL, 'long-sleeve-pocket-t-shirt', '100002', 132, NULL, NULL, 'M,L,XL,XXL', '23', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 1, 0, 1, 1, '2023-06-12 09:32:06', '2023-07-18 06:50:34'),
(3, 1, 1, 15, NULL, 'long-sleeve-t-shirt', '100003', 128, NULL, NULL, 'M,L,XL,XXL', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 1, 1, 1, 0, 0, 1, 0, 1, '2023-06-12 09:53:42', '2023-07-18 06:50:43'),
(4, 1, 1, 18, NULL, 'long-sleeve-henley-t-shirt', '100004', 134, NULL, NULL, 'M,L,XL,XXL', '34', '28', 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 0, 1, 0, 0, 1, 1, '2023-06-12 10:36:31', '2023-07-18 06:50:52'),
(5, 1, 1, 20, NULL, 'short-sleeve-henley-t-shirt', '100005', 143, NULL, NULL, 'M,L,XL,XXL', '23', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 0, 1, 0, 1, 1, 1, '2023-06-12 10:45:55', '2023-07-18 06:51:15'),
(6, 1, 1, 22, NULL, 'short-sleeve-heathered-t-shirt', '100006', 127, NULL, NULL, 'M,L,XL,XXL', '20', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 1, 1, 1, 1, '2023-06-12 10:56:05', '2023-07-18 06:51:26'),
(7, 1, 2, 21, NULL, 'relaxed-fit-straight-leg-duck-carpenter-pants', '100007', 125, NULL, NULL, 'M,L,XL,XXL', '43', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 0, 0, 1, 1, 1, 1, '2023-06-12 11:14:52', '2023-07-18 06:51:38'),
(8, 1, 2, 12, NULL, 'skateboarding-double-knee-pants', '100008', 135, NULL, NULL, 'M,L,XL,XXL', '50', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-12 11:27:23', '2023-07-18 06:52:29'),
(9, 1, 2, 12, NULL, 'active-waist-relaxed-fit-jeans', '100009', 136, NULL, NULL, 'M,L,XL,XXL', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 1, 1, 1, '2023-06-12 11:36:51', '2023-07-18 06:52:40'),
(10, 1, 2, 20, NULL, 'relaxed-fit-duck-carpenter-pants', '100010', 127, NULL, NULL, 'M,L,XL,XXL,XXXL', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 1, 1, 1, '2023-06-19 02:20:45', '2023-07-18 06:52:48'),
(11, 1, 3, 16, NULL, 'performance-workwear-insulated-jacket', '100011', 24, NULL, NULL, 'M,L,XL,XXL,XXXL', '305', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 1, 0, 1, 1, 1, '2023-06-19 02:31:09', '2023-07-18 06:53:13'),
(12, 1, 3, 18, NULL, 'duratech-renegade-flex-duck-jacket', '100012', 30, NULL, NULL, 'M,L,XL,XXL,XXXL', '125', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 1, 1, 1, 0, 1, '2023-06-19 02:38:19', '2023-07-18 06:53:25'),
(13, 1, 3, 20, NULL, 'duck-canvas-hooded-shirt-jacket', '100013', 34, NULL, NULL, 'S,M,L,XL,XXL,XXXL', '55', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 1, 1, 0, 1, '2023-06-19 03:02:06', '2023-07-18 06:53:37'),
(14, 2, 4, 18, NULL, 'womens-cooling-long-sleeve-pocket-t-shirt', '100014', 124, NULL, NULL, 'XS,S,M,L,XL,XXL', '25', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-19 03:12:07', '2023-07-18 06:53:52'),
(15, 2, 4, 20, NULL, 'womens-henley-long-sleeve-shirt', '100015', 126, NULL, NULL, 'S,M,L,XL', '25', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-19 03:20:30', '2023-07-18 06:54:11'),
(16, 2, 4, 16, NULL, 'womens-heavyweight-henley', '100016', 125, NULL, NULL, 'S,M,L,XL', '35', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 0, 0, 1, 1, '2023-06-19 03:30:40', '2023-07-18 06:54:36'),
(17, 2, 4, 18, NULL, 'womens-long-sleeve-thermal-shirt', '100017', 125, NULL, NULL, 'XS,S,M,L,XL', '30', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 1, 0, 1, 1, '2023-06-19 03:53:26', '2023-07-18 06:54:51'),
(18, 2, 4, 20, NULL, 'womens-striped-cropped-t-shirt', '100018', 118, NULL, NULL, 'XS,S,M,L,XL', '25', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-19 04:03:25', '2023-07-18 06:55:05'),
(19, 2, 4, 16, NULL, 'womens-long-sleeve-chambray-roll-tab-work-shirt', '100019', 112, NULL, NULL, 'XS,S,M,L,XL', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 0, 1, 1, '2023-06-19 04:47:05', '2023-07-18 06:55:19'),
(20, 2, 5, 20, NULL, 'womens-cropped-cargo-pants', '100020', 127, NULL, NULL, '26,27,28,29,30,32,34', '65', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 1, 1, 0, 1, '2023-06-19 04:57:38', '2023-07-18 06:55:32'),
(21, 2, 5, 21, NULL, 'womens-cargo-jogger-pants', '100021', 135, NULL, NULL, '24,25,26,27,28,29,30,31,32,34', '60', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 0, 1, 1, 1, '2023-06-19 05:03:33', '2023-07-18 06:56:01'),
(22, 2, 5, 12, NULL, 'womens-perfect-shape-skinny-fit-jean-capri', '100022', 117, NULL, NULL, '2,4,6,8,10,12,14', '45', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 0, 1, 1, 1, '2023-06-19 05:10:43', '2023-07-18 06:56:13'),
(23, 2, 5, 20, NULL, 'womens-relaxed-fit-straight-leg-cargo-pants', '100023', 123, NULL, NULL, '4,6,8,10,12,14,16', '40', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 1, 1, 0, 1, 1, 1, 1, '2023-06-19 05:18:43', '2023-07-18 06:56:35'),
(24, 2, 6, 22, NULL, 'womens-performance-workwear-softshell-jacket', '100024', 18, NULL, NULL, 'S,L,XXL', '85', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 1, 0, 1, 0, 1, '2023-06-19 05:25:57', '2023-07-18 06:56:48'),
(25, 2, 6, 21, NULL, 'womens-duratech-renegade-insulated-jacket', '100025', 15, NULL, NULL, 'S,M,L,XL,XXL', '120', NULL, 'https://www.youtube.com/watch?v=HxCcKzRAGWk', 0, 0, 1, 0, 1, 0, 1, 1, '2023-06-19 05:37:32', '2023-07-18 06:56:58');

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
(7, 4, 'en', 'Long Sleeve Henley T-Shirt', '<p>Built to last longer and feel better, this Long Sleeve Henley is the kind of shirt that’ll never see the bottom of a drawer or the back of a closet. Wherever they’re put to the test, Heavyweight Henleys are as hardworking as they come.<br><br>    Traditional fit lets you move with comfort and ease<br>    Heavyweight fabric is durable, but soft—comfortable in any season<br>    Built to last with taped neck and shoulder seams that won\'t unravel<br>    Tag-free neck prevents chafing and irritation<br>    Chest pocket with pencil divider keeps necessities handy<br>    3-button closure at neck<br>    Jersey Knit, 100% Cotton<br>    Chocolate Brown<br><br><br></p>', 'brown,black,sand'),
(8, 4, 'uk', 'Футболка з Довгим Рукавом Henley', '<p>Ця сорочка з довгим рукавом Henley, створена для того, щоб служити довше та відчувати себе краще, — це той тип сорочки, який ніколи не побачить дна шухляди чи задньої стінки шафи. Де б їх не випробовували, Heavyweight Henley такі ж працьовиті.<br><br>     Традиційна посадка дозволяє рухатися з комфортом і легкістю<br>     Важка тканина міцна, але м\'яка, комфортна в будь-який сезон<br>     Створений для довговічності з проклеєними швами горловини та плечей, які не розпускаються<br>     Шия без ярликів запобігає натиранню та подразненню<br>     Нагрудна кишеня з перегородкою для олівців дозволяє зберігати необхідні речі під рукою<br>     Застібка на горловині на 3 ґудзики<br>     Трикотаж джерсі, 100% бавовна<br>     Шоколадно-коричневий<br></p>', 'коричневий,чорний,пісочний'),
(9, 5, 'en', 'Short Sleeve Henley T-Shirt', '<p>Buttoned up or buttoned down, the choice is yours. The hardworking Heavyweight Henley T-Shirt is a classic that’s tough enough to handle full days on the job. Made from heavyweight cotton that’s ultra-durable and soft, it’ll quickly become a year-round staple tee.<br><br>    Relaxed fit lets you move comfortably and freely<br>    Tag-free label prevents chaffing and irritation<br>    Taped neck and shoulder seams won’t unravel<br>    Chest pocket with pencil divider keeps necessities handy<br>    3-button closure at neck<br>    Jersey Knit, 100% Cotton<br>    Desert Sand<br></p>', 'sand,gray,navy'),
(10, 5, 'uk', 'Футболка з Коротким Рукавом Henley', '<p>На ґудзиках чи на ґудзиках – вибір за вами. Працьовита футболка Heavyweight Henley — це класика, яка достатньо міцна, щоб витримати цілими днями на роботі. Виготовлена з надміцної та м’якої бавовни, вона швидко стане основною футболкою протягом усього року.<br><br>     Невимушений крій дозволяє рухатися комфортно та вільно<br>     Етикетка без міток запобігає натиранню та подразненню<br>     Проклеєні горловина і плечові шви не розпускаються<br>     Нагрудна кишеня з перегородкою для олівців дозволяє зберігати необхідні речі під рукою<br>     Застібка на горловині на 3 ґудзики<br>     Трикотаж джерсі, 100% бавовна<br>     Пісок пустелі<br></p>', 'пісочний,сірий,синій'),
(11, 6, 'en', 'Short Sleeve Heathered T-Shirt', '<p>Made to stand the test of time, this heavyweight tee might be half cotton, half polyester, but it\'s 100% dependable. The soft, heathered color along with the logo\'d chest pocket kicks its classic look up a notch.<br><br>    Traditional fit lets you move with comfort and ease<br>    Heavyweight fabric is durable, but soft, comfortable in any season<br>    Single dyed to give it a softer, worn-in look<br>    Built to last with taped neck and shoulder seams that won\'t unravel<br>    Tag-free neck prevents chafing and irritation<br>    Chest pocket with logo<br>    Made of 50% cotton, 50% polyester<br>    Fern Heather<br><br><br></p>', 'heather,burgundy,blue'),
(12, 6, 'uk', 'Верескова Футболка з Коротким Рукавом', '<p>Створена, щоб витримати випробування часом, ця важка футболка може бути наполовину бавовняною, наполовину поліестеровою, але вона надійна на 100%. М\'який, вересковий колір разом із нагрудною кишенею з логотипом підносить класичний вигляд на новий рівень.<br><br>     Традиційна посадка дозволяє рухатися з комфортом і легкістю<br>     Важка тканина міцна, але м\'яка, комфортна в будь-який сезон<br>     Однократно пофарбований, щоб надати йому більш м’який, потертий вигляд<br>     Створений для довговічності з проклеєними швами горловини та плечей, які не розпускаються<br>     Шия без ярликів запобігає натиранню та подразненню<br>     Нагрудна кишеня з логотипом<br>     Склад: 50% бавовна, 50% поліестер<br>     Папороть Верес<br></p>', 'вересовий,бордовий,синій'),
(13, 7, 'en', 'Relaxed Fit Straight Leg Duck Carpenter Pants', '<p>See why the Relaxed Fit Heavyweight Duck Carpenter Pants are a 5-Star customer favorite. The easy fit deals with boots and bending, while pockets and loops take care of all your tools. Extra heavyweight Duck canvas will stand up to tough jobs, but the broken-in garment-washed feel will keep its shape wash after wash.<br><br>    Sits slightly below waist; straight leg<br>    Relaxed fit leaves room in the seat and thighs for all-day comfort on the job; designed to fit over boots<br>    Garment-washed fabric for softness and to resist shrinking<br>    Two tool pockets; hammer loop<br>    Reinforced seams; rivets at stress points to help prevent ripping; yoke, seat and side seams triple-stitched for added toughness<br>    12 oz. Heavyweight Duck, 100% Cotton<br>    Brass rivets prevent rips at stress points<br>    Garment washed for softness and shrinkage control<br>    Fits over boots<br>    Rinsed Chocolate Brown<br></p>', 'brown,black,sand'),
(14, 7, 'uk', 'Легкі Штани Прямого Крою Duck Carpenter', '<p>Дізнайтеся, чому штани Relaxed Fit Heavyweight Duck Carpenter Pants є улюбленими 5-зірковими покупцями. Легка посадка справляється з черевиками та згинанням, а кишені та петлі подбають про всі ваші інструменти. Надзвичайно важке полотно Duck витримає важкі роботи, але відчуття, що випрали поламаний одяг, збереже свою форму після прання.<br><br>     Сидить трохи нижче талії; пряма нога<br>     Легка посадка залишає простір у сидінні та стегнах для комфорту протягом усього дня; призначений для одягання поверх черевиків<br>     Тканина, випрана для одягу, забезпечує м’якість і стійкість до усадки<br>     дві кишені для інструментів; молоткова петля<br>     Посилені шви; заклепки в місцях напруги, щоб запобігти розриву; кокетка, сидіння та бокові шви потрійні для додаткової міцності<br>     12 унцій Важка качка, 100% бавовна<br>     Латунні заклепки запобігають розривам у місцях напруги<br>     Одяг прали для м’якості та контролю усадки<br>     Підходить поверх чобіт<br>     Промитий шоколадно-коричневий<br></p>', 'коричневий,чорний,пісочний'),
(15, 8, 'en', 'Skateboarding Double Knee Pants', '<p class=\"flex\"><span itemprop=\"description\">A true double knee pant \r\nwith contrast stitching in a moisture wicking polyester blend that \r\ncommands durability and poise in a class all its own. Regular fit high \r\nrise, and updated front button enclosure including red thread tape at \r\nthe zipper provides the style and security necessary to attack any \r\nobstacle the streets can dish.</span></p><ul class=\"pdp-list\"><li>Regular fit, high rise</li><li>Moisture wicking</li><li>Double knee</li><li>7.25 oz 65% Recycled Polyester/35% Cotton</li><li class=\"pdp-list-color\">Olive Green </li></ul>', 'olive,brown,gray'),
(16, 8, 'uk', 'Штани для Скейтбордингу з Подвійними Колінами', '<p>Справжні штани з подвійними колінами з контрастною прострочкою із вологопоглинаючої суміші поліестеру, яка забезпечує довговічність і врівноваженість у своєму класі. Звичайна висока посадка та оновлена передня застібка на ґудзиках із червоною стрічкою на блискавці забезпечують стиль і безпеку, необхідні для боротьби з будь-якою перешкодою, яку можуть подолати вулиці.<br><br>     Звичайний крій, висока посадка<br>     Відведення вологи<br>     Подвійне коліно<br>     7,25 унцій 65% переробленого поліестеру/35% бавовни<br>     Оливково-зелений<br></p>', 'оливковий,коричневий,сірий'),
(17, 9, 'en', 'Active Waist Relaxed Fit Jeans', '<p>The Flex Active Waist 5-Pocket Relaxed Fit Jeans are the perfect mix of performance denim and total comfort. Built strong and soft, the flex denim fabric and active waist stretch with you, so you can move effortlessly on the job. When you need to feel comfortable and move freely, this is the pair to reach for time and again.<br><br>    Sits slightly below the waist; straight leg<br>    Relaxed fit leaves room in the seat and thighs for all-day comfort on the job<br>    Active waist stretches with you, so you never feel restricted<br>    Flex fabric lets you move easily and comfortably<br>    Rivets reinforce all stress points to prevent tearing<br>    Classic, 5-pocket styling offers plenty of storage<br>    Button closure and zip fly with sturdy brass zipper<br>    10.9 oz. Stretch Denim, 74% Cotton/25% Polyester/1% Spandex<br>    Rinsed Indigo Blue<br></p>', 'indigo'),
(18, 9, 'uk', 'Джинси Вільного Крою З Активною Талією', '<p>Джинси Flex Active Waist 5-Pocket Relaxed Fit Jeans — це ідеальне поєднання ефективного деніму та повного комфорту. Створена міцною та м’якою, гнучка джинсова тканина та активна талія тягнуться разом з вами, щоб ви могли легко рухатися на роботі. Коли вам потрібно почуватися комфортно та вільно рухатися, це пара, до якої можна тягнутися знову й знову.<br><br>     Сидить трохи нижче талії; пряма нога<br>     Легка посадка залишає простір у сидінні та стегнах для комфорту протягом усього дня<br>     Активна талія тягнеться разом з вами, тому ви ніколи не відчуваєте обмежень<br>     Гнучка тканина дозволяє пересуватися легко та комфортно<br>     Заклепки зміцнюють усі точки напруги, щоб запобігти розриву<br>     Класичний дизайн із 5 кишенями пропонує багато місця для зберігання<br>     Застібка на ґудзики та блискавка з міцною латунною блискавкою<br>     10,9 унцій Еластичний денім, 74% бавовна/25% поліестер/1% спандекс<br>     Промитий синій індиго<br></p>', 'індиго'),
(19, 10, 'en', 'Relaxed Fit Duck Carpenter Pants', '<p>Feel confident in your jeans with Dickies\' Relaxed Fit Duck Carpenter Pants. Made into durable duck fabric from 100% cotton, this pant is surprisingly lightweight and comfortable. The garment-washed design provides softness and shrinkage control. Anywhere you go, your tools can come with you due to the classic pocket styling, along with a utility pocket and hammer loop.<br><br>    Sits slightly below waist; extra room in seat and thigh; straight leg<br>    9 oz. Duck, 100% Cotton<br>    Utility pocket<br>    Hammer loop<br>    Lightweight duck fabric<br>    Garment washed for softness and shrinkage control<br>    Rinsed Brown<br></p>', 'rinsed-brown,rinsed-timber-brown,olive'),
(20, 10, 'uk', 'Легкі Штани Duck Carpenter', '<p>Відчуйте себе впевнено в своїх джинсах із штанами Dickies Relaxed Duck Carpenter Pants. Виготовлені з міцної качиної тканини зі 100% бавовни, ці штани напрочуд легкі та зручні. Дизайн одягу, який можна прати, забезпечує м’якість і контроль усадки. Куди б ви не пішли, ваші інструменти завжди будуть із вами завдяки класичному стилю кишені разом із зручною кишенею та петлею для молотка.<br><br>     Сидить трохи нижче талії; додаткове місце в сидінні та стегнах; пряма нога<br>     9 унцій Качка, 100% бавовна<br>     Утилітна кишеня<br>     Молоткова петля<br>     Легка качача тканина<br>     Одяг прали для м’якості та контролю усадки<br>     Прополосканий коричневий<br></p>', 'світло-коричневий,деревно-коричневий,олива'),
(21, 11, 'en', 'Performance Workwear Insulated Jacket', '<p>Perform at your best in extreme working conditions with Performance Workwear Insulated Jacket. Designed to protect and function through the toughest tasks, you\'ll achieve long-lasting wearability through the Cordura® nylon advanced abrasion-resistant construction that features a zippered Toolbox Pocket™ for reliable storage. Completely seam-sealed and waterproof, you\'ll gain even more protection from the integrated Hood Shield™ that supplies added warmth while protecting you from dust and debris<br><br>    Regular fit<br>    Double closure front placket with full zip and snap fastening; Seam-sealed and waterproof<br>    Cordura® nylon advanced abrasion-resistant panels: shoulder yoke and front pockets<br>    Integrated Hood Shield™ for added warmth and protection from dust and debris<br>    3-piece hood; Kangaroo front pockets with zipper fastening<br>    Zippered Toolbox Pocket™ for reliable storage; Back side entry glove pocket; Drop tail hem<br>    Ergonomic elbow for added movement; Silicon cuff adjuster<br>    7 oz. 100% Nylon Plain Weave with DWR<br>    Brown Duck<br><br><br></p>', 'brown,black'),
(22, 11, 'uk', 'Утеплена Куртка Performance Workwear', '<p>Працюйте якнайкраще в екстремальних умовах роботи з утепленою курткою Performance Workwear Workwear. Створений для захисту та функціонування під час найскладніших завдань, ви досягнете довготривалої зносостійкості завдяки покращеній зносостійкій конструкції з нейлону Cordura®, яка має кишеню Toolbox Pocket™ на блискавці для надійного зберігання. Повністю герметичний і водонепроникний, ви отримаєте ще більше захисту завдяки інтегрованому Hood Shield™, який забезпечує додаткове тепло, захищаючи вас від пилу та сміття<br><br>     Звичайна посадка<br>     Подвійна передня планка з повною блискавкою та застібкою на кліп; Герметичний і водонепроникний<br>     Удосконалені нейлонові панелі Cordura®, стійкі до стирання: плечова кокетка та передні кишені<br>     Вбудований Hood Shield™ для додаткового тепла та захисту від пилу та сміття<br>     капюшон з 3 частин; Передні кишені кенгуру на блискавці<br>     Zippered Toolbox Pocket™ для надійного зберігання; Зворотна бічна кишеня для рукавичок; Подол хвоста<br>     Ергономічний лікоть для додаткового руху; Силіконовий регулятор манжети<br>     7 унцій 100% нейлон полотняного переплетення з DWR<br>     коричнева качка<br></p>', 'коричневий,чорний'),
(23, 12, 'en', 'DuraTech Renegade FLEX Duck Jacket', '<p>Rise to the demands of your workday without sacrificing ultimate protection in Duratech Renegade FLEX Duck Jacket. The highly durable and triple needle reinforced Duck fabric construction comes equipped with FLEX technology for mobility and comfort, as well as a Durable Water Repellent finish to safeguard you from rainy weather. The patented SafeCinch™ internal mechanism provides the benefit of adjusting the drawcords through the interior of the front pockets, preventing you from getting caught up as you navigate the most protective cinched fit. Complete with a drop tail hem for added coverage, a hidden storm cuff for superior warmth and a zippered storm flap to defend against the elements, there\'s nothing this jacket isn\'t prepared to face.<br><br>    Regular fit<br>    FLEX fabric for ease of movement and added comfort<br>    Durable Water Repellent (DWR) finish<br>    Patented SafeCinch internal mechanism eliminates hood drawstrings while elevating safety<br>    Storm flap with zipper closure; Triple needle reinforced seams; Reinforcements in key wear down areas<br>    Chest pocket with secure pocket flap; Zippered security pocket; Interior pocket to secure valuables<br>    Underarm mobility gussets; Elbow darts for articulation and movement; Drop tail hem for added coverage<br>    9 oz. Duck, 63% Cotton/35% Polyester/2% Spandex<br>    Black<br><br><br></p>', 'black,brown'),
(24, 12, 'uk', 'Куртка DuraTech Renegade FLEX Duck', '<p>Виконуйте вимоги свого робочого дня, не жертвуючи найкращим захистом у куртці Duratech Renegade FLEX Duck. Надзвичайно міцна конструкція тканини Duck, зміцнена трьома голками, оснащена технологією FLEX для мобільності та комфорту, а також міцним водовідштовхувальним покриттям, яке захистить вас від дощової погоди. Запатентований внутрішній механізм SafeCinch™ забезпечує перевагу регулювання шнурів через внутрішню частину передніх кишень, запобігаючи тому, щоб вас застрягли під час навігації з найбільш захисним затягуванням. Ця куртка має низький край для додаткового покриття, приховану штормову манжету для чудового тепла та штормовий клапан на блискавці для захисту від негоди.<br><br>     Звичайна посадка<br>     Тканина FLEX для зручності рухів і додаткового комфорту<br>     Міцне водовідштовхувальне покриття (DWR).<br>     Запатентований внутрішній механізм SafeCinch усуває застібки на капюшоні, підвищуючи безпеку<br>     штормовий клапан із застібкою-блискавкою; Шви з потрійною голкою; Підсилення в ключових зонах зносу<br>     Нагрудна кишеня з надійним клапаном; Захистна кишеня на блискавці; Внутрішня кишеня для зберігання цінних речей<br>     ластовиці під пахвами; Ліктьові дротики для артикуляції та руху; Занижений край для додаткового покриття<br>     9 унцій Качка, 63% бавовна/35% поліестер/2% спандекс<br>     чорний<br></p>', 'коричневий,чорний'),
(25, 13, 'en', 'Duck Canvas Hooded Shirt Jacket', '<p>You don\'t stop when it\'s damp or chilly. The Hooded Shirt Jacket keeps up with you, no matter the weather. Rugged canvas Duck is upgraded with water-repelling treatments, and the jersey hood adds warmth like your favorite sweatshirt. Multiple warming pockets give you everything you need in a single easy-on layer.<br><br>    Relaxed fit lets you move comfortably and freely<br>    Durable water repellent technology makes water bead up and roll off fabric<br>    Three-piece hood for a closer fit, with soft jersey lining<br>    Full zip closure with snap plackets to resist wind<br>    Chest pockets; side pockets with fleece to warm hands<br>    Lining: 4x4 quilted taffeta to slide on easily<br>    8.1 oz. Brushed Duck; 100% Cotton<br>    Dark Navy<br><br><br></p>', 'navy,brown,black,gray'),
(26, 13, 'uk', 'Куртка-сорочка З Полотняної Тканини З Капюшоном', '<p>Ви не зупиняєтеся, коли сиро чи холодно. Куртка-сорочка з капюшоном не відстає від вас, незважаючи на погоду. Міцна тканина Duck покращена водовідштовхувальним покриттям, а капюшон із трикотажу додає тепла, як ваш улюблений світшот. Кілька теплих кишень — це все, що вам потрібно, в одному легкому шарі.<br><br>     Невимушений крій дозволяє рухатися комфортно та вільно<br>     Надійна водовідштовхувальна технологія змушує воду згортати та скочувати тканину<br>     Капюшон із трьох частин для щільнішої посадки, підкладка з м’якого трикотажу<br>     Повна застібка-блискавка з планками для захисту від вітру<br>     Нагрудні кишені; бічні кишені з флісом для зігрівання рук<br>     Підкладка: стьобана тафта 4x4 для легкого ковзання<br>     8,1 унції щітова качка; 100% бавовна<br>     Темно-синій<br></p>', 'синій,коричневий,чорний,сірий'),
(27, 14, 'en', 'Women\'s Cooling Long Sleeve Pocket T-Shirt', '<p>Hard work knows no bounds, and neither does Women\'s Long Sleeve Cooling Temp-iQ® Performance T-Shirt. Worn to workout, in the yard or any job site is perfect for this performance tee made with a regular fit for less constriction. The Jersey material stays soft to the touch so you’ll keep comfortable while you’re working hard. You’ll also have advanced temperature control as the Temp-iQ intelligent cooling technology wicks away sweat to keep you cool and dry. Topping it all off, this shirt has stain release, making it very easy to care for no matter how dirty it gets.<br><br>    Regular fit<br>    Temp-iQ intelligent cooling for advanced temperature control<br>    Easy care, stain release<br>    Moisture wicking<br>    Reflective logo at hem<br>    185 gsm. Jersey, 50% Cotton/50% Polyester<br>    Machine wash<br>    Navy<br><br><br></p>', 'navy,blue,orange,yellow,gray'),
(28, 14, 'uk', 'Жіноча Прохолодна Футболка З Кишенями І Довгим Рукавом', '<p>Важка праця не знає меж, як і жіноча футболка з довгим рукавом Cooling Temp-iQ® Performance. Ця ефективна футболка ідеально підходить для тренування, у дворі чи на будь-якій іншій роботі. Вона має звичайну посадку для меншого звуження. Джерсі залишається м’яким на дотик, тому вам буде комфортно під час важкої роботи. Ви також матимете вдосконалений контроль температури, оскільки інтелектуальна технологія охолодження Temp-iQ відводить піт, щоб ви залишалися прохолодними та сухими. На довершення до всього ця сорочка має захист від плям, тому за нею дуже легко доглядати, незалежно від того, наскільки вона брудна.<br><br>     Звичайна посадка<br>     Інтелектуальне охолодження Temp-iQ для розширеного контролю температури<br>     Легкий догляд, видалення плям<br>     Відведення вологи<br>     Світловідбиваючий логотип на подолі<br>     185 г/кв.м. Джерсі, 50% бавовна/50% поліестер<br>     Машинне прання<br>     Синій<br></p>', 'синій,блакитний,помаранчевий,жовтий,сірий'),
(29, 15, 'en', 'Women\'s Henley Long Sleeve Shirt', '<p>A classic design that pulls its weight wherever the job takes you. This Women\'s Long Sleeve Henley Shirt lets you get the job done in total comfort, featuring a soft and durable rib-knit fabric that takes the chill out of colder days. It\'s finished with a button-front Henley neckline for a timeless touch.<br><br>    Slim fit lets you move comfortably and freely<br>    Made with 1x1 rib knit for great fit and all-day comfort<br>    Taped neck and shoulder seams won\'t unravel<br>    3-button closure<br>    Extended sizes available<br>    180 gsm. Rib Knit, 60% Polyester/40% Cotton<br>    Orchid<br></p>', 'denim,graphite,black,orchid'),
(30, 15, 'uk', 'Жіноча Сорочка З Довгим Рукавом Henley', '<p>Класичний дизайн, який тягне свою вагу, куди б ви не прийшли. Ця жіноча сорочка з довгим рукавом на пуговицах дає змогу виконувати роботу з повним комфортом завдяки м’якій і міцній трикотажній тканині в рубчик, яка позбавляє від холоду в холодні дні. Він закінчений вирізом на ґудзиках спереду для вічного штриху.<br><br>     Тонкий крій дозволяє рухатися комфортно та вільно<br>     Виготовлені з трикотажу в рубчик 1x1 для чудової посадки та комфорту протягом усього дня<br>     Проклеєні горловина і плечові шви не розпускаються<br>     Застібка на 3 кнопки<br>     Доступні збільшені розміри<br>     180 г/кв.м. Трикотаж в рубчик, 60% поліестер/40% бавовна<br>     Орхідея<br></p>', 'денім,графіт,чорний,орхідея'),
(31, 16, 'en', 'Women\'s Heavyweight Henley', '<p>Layering solutions come easy in Women\'s Heavyweight Henley. The comfortable cotton jersey construction is backed by moisture wicking technology to keep you cool and dry no matter how hard you\'re working. The rib knit neckline and patchwork shoulder seams up the ante on comfort while reducing chaffing as you move about your day. Complete with reinforced seams and a front chest pocket with pencil division, you\'ll achieve function and purpose in this everyday henley that is built to go the distance.<br><br>    Moisture wicking<br>    Four button placket for easy layering<br>    Rib knit neckline for comfort and retention<br>    Reinforced seams with shoulder inset to reduce shoulder chaffing<br>    Chest pocket with pencil division<br>    Solid: 203 gsm. Jersey, 100% Cotton<br>    Heathered: 203 gsm. Jersey 60% Cotton/40% Polyester<br>    Extended sizes available<br>    Oatmeal<br><br><br></p>', 'outmeal,black'),
(32, 16, 'uk', 'Жіноча Heavyweight Henley', '<p>ішення для багатошаровості в Жіночій Heavyweight Henley. Зручна конструкція з бавовняного трикотажу підтримується технологією відводу вологи, щоб зберегти вам прохолоду та сухість незалежно від того, наскільки важко ви працюєте. Трикотажне декольте в рубчик і клаптеві плечові шви підвищують комфорт, одночасно зменшуючи натирання під час щоденних пересувань. У комплекті з посиленими швами та передньою нагрудною кишенею з роздільною олівцем ви досягнете функції та мети в цьому повсякденному пупсі, створеному, щоб йти на відстань.<br><br>     Відведення вологи<br>     Планка з чотирма ґудзиками для зручності багатошаровості<br>     Трикотажний виріз у рубчик для комфорту та утримання<br>     Посилені шви з плечовими вставками для зменшення натирання плечей<br>     Нагрудна кишеня з поділом для олівців<br>     Твердий: 203 г/кв.м. Джерсі, 100% бавовна<br>     Нагрітий: 203 г/кв.м. Джерсі 60% бавовна/40% поліестер<br>     Доступні збільшені розміри<br>     вівсянка<br></p>', 'вівсяний,чорний'),
(33, 17, 'en', 'Women’s Long Sleeve Thermal Shirt', '<p>Don\'t linger when it comes to layers. Long Sleeve Crew Neck Thermal Shirt is serious about keeping you warm. The smart design features matching rib knit neck and cuffs. Even our label is dyed to match at the hem for concise layerability. With your utmost comfort in mind, the silhouette is completely tagless and guaranteed to keep you free from chaffing.<br><br>    Thermal knit<br>    Long sleeve<br>    Tagless<br>    Rib knit neck and cuffs<br>    73% Cotton/27% Polyester<br>    Extended Sizes Available<br>    Machine wash<br>    Dusty Violet<br></p>', 'dusty violet,graphite,black,navy'),
(34, 17, 'uk', 'Жіноча Термосорочка З Довгим Рукавом', '<p>Не зволікайте, коли справа доходить до шарів. Термічна сорочка з круглим вирізом і довгим рукавом серйозно зігріє вас. Елегантний дизайн має відповідну трикотажну горловину та манжети. Навіть наша етикетка пофарбована відповідно до краю для лаконічної багатошаровості. Дбаючи про ваш максимальний комфорт, цей силует повністю позбавлений міток і гарантовано позбавить вас від потертостей.<br><br>     Термотрикотаж<br>     Довгий рукав<br>     Без тегів<br>     Горловина і манжети трикотажні<br>     73% бавовна/27% поліестер<br>     Доступні збільшені розміри<br>     Машинне прання<br>     Запилений Фіолет<br></p>', 'запилений фіолет,графіт,чорний,синій'),
(35, 18, 'en', 'Women\'s Striped Cropped T-Shirt', '<p>This casual striped women’s t-shirt offers a slim fit silhouette and cropped length that’s easy to style with overalls and high-waisted styles. The fitted t-shirt is finished with a merrowed hem and sleeve detail.<br><br>    Slim fit<br>    Cropped length<br>    Merrowed hem<br>    190 gsm. 97% Cotton/3% Spandex Yarn Dye Rib<br>    Honey Stripe<br><br><br></p>', 'honey stripe,purple rose stripe'),
(36, 18, 'uk', 'Жіноча Укорочена Футболка в Смужку', '<p>Ця повсякденна жіноча футболка в смужку має приталений силует і укорочену довжину, яку легко поєднувати з комбінезонами та фасонами з високою талією. Облягаюча футболка оздоблена зрізаним подолом і рукавами.<br><br>     Приталений<br>     Стрижена довжина<br>     Меровий поділ<br>     190 г/кв.м. 97% бавовна/3% спандекс пряжа Dye Rib<br>     Медова смужка<br></p>', 'медова смужка,фіолетова смужка'),
(37, 19, 'en', 'Women’s Long Sleeve Chambray Roll-Tab Work Shirt', '<p>Putting in hours on your craft or taking command of your worksite—just like you, this Women\'s Long Sleeve Chambray Roll-Tab Work Shirt does it all. Engineered for comfort and mobility, it features a pre-washed, cotton-blend fabric that\'s as easy to care for as it is to wear. This versatile work shirt feels supremely soft, with roll-tab sleeves that let you roll your sleeves up to get the job done in style.<br><br>    Relaxed fit maximizes mobility<br>    Stretch fabric lets you move easily and comfortably<br>    Washed chambray feels soft to the touch<br>    Roll-tab sleeves for all-season wear and versatility<br>    Dual chest pockets with button closures and pencil divider keep essentials secure and organized<br>    Metal buttons for durability<br>    Extended sizes available<br>    6.25 oz. Stretch Chambray, 88% Cotton/10% Polyester/2% Elastane<br>    Machine wash<br>    Stonewashed Light Blue<br></p>', 'light-blue'),
(38, 19, 'uk', 'Жіноча Робоча Сорочка з Довгими Рукавами з Шамбре', '<p>Витрачуйте години на свій ремесло або керуйте своїм робочим місцем — так само, як і ви, ця жіноча робоча сорочка з довгими рукавами з шамбре з перекручуванням робить усе це. Створений для комфорту та мобільності, він має попередньо випрану тканину із суміші бавовни, яку так само легко доглядати, як і носити. Ця універсальна робоча сорочка на дотик надзвичайно м’яка, має рукави з закочуванням, які дозволяють закатати рукава, щоб виконувати роботу стильно.<br><br>     Розслаблена посадка забезпечує максимальну мобільність<br>     Еластична тканина дозволяє пересуватися легко і комфортно<br>     Вимите шамбре м\'яке на дотик<br>     Рукави-закачки для всесезонного носіння та універсальності<br>     Подвійні нагрудні кишені із застібками на ґудзиках і перегородкою для олівців надійно та впорядковано забезпечують найнеобхідніше<br>     Металеві кнопки для довговічності<br>     Доступні збільшені розміри<br>     6,25 унції Стрейч-Шамбре, 88% бавовна/10% поліестер/2% еластан<br>     Машинне прання<br>     Світло-блакитний<br></p>', 'світло-блакитний'),
(39, 20, 'en', 'Women\'s Cropped Cargo Pants', '<p>Women\'s Cropped Cargo Pants deliver all the utility of a traditional cargo pant paired with perfectly feminine styling. Sturdy with a bit of stretch, nothing is going to stop you from showing up for every adventure.<br><br>    Relaxed fit; High rise<br>    Pieced lower leg panels<br>    Cargo pockets<br>    Contour waistband<br>    Back pockets with flaps<br>    Cuffed hem<br>    Belt included<br>    Inseam: 27.5\"<br>    8.25 oz. Twill, 98% Cotton/2% Spandex<br>    Ink Navy<br></p>', 'black,purple,pink,navy'),
(40, 20, 'uk', 'Жіночі Укорочені Штани Карго', '<p>Жіночі укорочені штани карго забезпечують усю корисність традиційних штанів карго в поєднанні з ідеально жіночим стилем. Міцний і трохи еластичний, ніщо не завадить вам з’являтися в кожній пригоді.<br><br>     Розслаблена посадка; Високий підйом<br>     Відрізні нижні панелі<br>     Карго кишені<br>     Контурний пояс<br>     Задні кишені з клапанами<br>     Поділ з манжетами<br>     Пояс в комплекті<br>     Внутрішній шов: 27,5\"<br>     8,25 унції Твіл, 98% бавовна/2% спандекс<br>     Темно-синій<br></p>', 'чорний,фіолетовий,рожевий,темно-синій'),
(41, 21, 'en', 'Women\'s Cargo Jogger Pants', '<p>Women\'s Cargo Jogger Pants are the essential that you\'ve been looking for this season. Featuring a true jogger fit and plenty of practical pocketing, these pants are ready to tackle anything that is thrown your way. With elastic along the back waist, you\'ll achieve a comfortable custom fit for easy all-day wearability and straightforward styling that will last through every season.<br><br>    High rise; Flat front<br>    Tack button closure<br>    Dual front slash pockets with bartacks at opening<br>    Patch pockets at rear with woven logo label<br>    Dual cargo pockets with hook and loop closure<br>    Elastic at back waistband and ankle hem<br>    Extended Sizes Available<br>    Inseam: 31\"<br>    8.25 oz. Twill, 98% Cotton/2% Spandex<br>    Deep Lake<br></p>', 'deep lake,black,brown,sand'),
(42, 21, 'uk', 'Жіночі Штани-джоггери Карго', '<p>Жіночі штани-джоггери карго — те, що ви шукали цього сезону. Завдяки справжньому спортивному крою та багатьом практичним кишеням, ці штани готові впоратися з будь-яким завданням. Завдяки гумці вздовж талії ззаду ви досягнете зручного індивідуального крою для легкого носіння протягом усього дня та простого стилю, який триватиме протягом будь-якого сезону.<br><br>     Високий підйом; Плоский фронт<br>     Застібка на кнопці<br>     Подвійні передні прорізні кишені із закріпками на відкриванні<br>     Накладні кишені ззаду з тканим логотипом<br>     Подвійні кишені-карго із застібкою на липучку<br>     Гумка на поясі ззаду та по нижній частині щиколотки<br>     Доступні збільшені розміри<br>     Внутрішній шов: 31\"<br>     8,25 унції Твіл, 98% бавовна/2% спандекс<br>     Озеро Глибоке<br></p>', 'глибоке озеро,чорний,коричневий,пісочний'),
(43, 22, 'en', 'Women\'s Perfect Shape Skinny Fit Jean Capri', '<p>Your flawless workday fit is finally attainable in Women\'s Perfect Shape Capri Pants. You can say goodbye to the days spent pulling up a gapping waistband or sagging knees. Perfect Shape Denim are designed with Cone\'s S Gene® technology, delivering superior stretch and recovery through a soft performance denim that won\'t give out over time. Plus, the flex tummy panel offers added support that flattens and smooths to provide a slender silhouette. With a generous 46% stretch, you\'ll comfortably tackle any task while this skirt holds its shape and yours. No-show pocketing allows for a clean construction while keeping all that you carry under wraps. In addition to functional utility, you\'ll also find a back vent that aids with ease of movement. The reinforced double needle stitching makes this durable work capri a go-to for every task you need to tackle. You\'ll gain long-lasting wear and tear in this abrasion tested denim; where fit, function and feel combine to create effortless perfection.<br><br>    Skinny leg<br>    Extended Sizes Available<br>    Flex tummy control panel slims your silhouette<br>    Patented Cone S-Gene® premium technology<br>    46% holds its shape and yours<br>    No show pocket facing<br>    Minimal exterior branding - no red logo label<br>    Back vent for ease of movement<br>    9.25 oz. Denim, 89% Cotton/8% Polyester/3% Spandex<br>    Indigo Blue<br></p>', 'indigo blue'),
(44, 22, 'uk', 'Жіночі Джинсові Капрі Ідеальної Форми в Обтяжку', '<p>Жіночі штани-капрі Perfect Shape нарешті стануть вашою бездоганною посадкою на робочий день. Ви можете попрощатися з днями, витраченими на те, щоб підтягнути пояс або провислі коліна. Perfect Shape Denim розроблено за технологією Cone S Gene®, що забезпечує чудову еластичність і відновлення завдяки м’якій джинсовій тканині, яка з часом не послаблюється. Крім того, гнучка панель для живота забезпечує додаткову підтримку, яка вирівнюється та розгладжує, створюючи стрункий силует. Завдяки розтяжності 46% ви з комфортом впораєтеся з будь-яким завданням, а ця спідниця тримає форму та тримає вашу форму. Неявка в кишені дозволяє створити чисту конструкцію, зберігаючи при цьому все, що ви носите. На додаток до функціональної зручності, ви також знайдете задню вентиляцію, яка полегшує рух. Завдяки посиленому шву подвійною голкою ці міцні капрі ідеально підходять для будь-якого завдання, яке вам потрібно впоратися. Ви отримаєте тривалий знос у цьому денімі, перевіреному на стирання; де придатність, функціональність і відчуття поєднуються, щоб створити досконалість без зусиль.<br><br>     Худа нога<br>     Доступні збільшені розміри<br>     Гнучка панель керування животиком вирівнює ваш силует<br>     Запатентована преміальна технологія Cone S-Gene®<br>     46% тримає форму і вашу<br>     Без видимої сторони кишені<br>     Мінімальний зовнішній брендинг – відсутність червоного логотипу<br>     Вентиляційний отвір на спині для зручності пересування<br>     9,25 унції Денім, 89% бавовна/8% поліестер/3% спандекс<br>    Синій індиго<br></p>', 'синій індиго'),
(45, 23, 'en', 'Women\'s Relaxed Fit Straight Leg Cargo Pants', '<p>A modern update on a timeless workwear staple, these Women\'s Relaxed Fit Cargo Pants take inspiration from the classic, military style, fit for all-day comfort and durable enough to endure any project or worksite. Featuring a soft fabric in 100% brushed cotton, they have a contour waistband that ensures a perfect fit, so there are no gaps at the back when you\'re making moves.<br><br>    Sits slightly below the waist; straight leg<br>    Relaxed fit leaves room in the seat and thighs for all-day comfort on the job<br>    Breathable, brushed cotton is ideal for hot temperatures<br>    Contoured flex waistband for comfort and coverage<br>    Bellowed cargo pockets with hook and loop closures, plus back flap pockets with snap closures keep your personal items secure<br>    Seven convenient pockets provide plenty of secure storage<br>    Regular 32-inch length<br>    7.2 oz. Twill, 100% Cotton<br>    Rinsed Green Leaf<br></p>', 'rinsed green leaf,brown,sand,black'),
(46, 23, 'uk', 'Жіночі Прямі Брюки Карго Вільного Крою', '<p>Сучасне оновлення позачасового робочого одягу, ці жіночі штани карго вільного крою черпають натхнення з класичного військового стилю, підходять для комфорту протягом усього дня та достатньо міцні, щоб витримати будь-який проект або робоче місце. Виготовлені з м’якої тканини зі 100% полірованої бавовни, вони мають контурний пояс, який забезпечує ідеальну посадку, тому на спині немає щілин, коли ви робите рухи.<br><br>     Сидить трохи нижче талії; пряма нога<br>     Легка посадка залишає простір у сидінні та стегнах для комфорту протягом усього дня<br>     Повітропроникна, начесана бавовна ідеально підходить для спекотних температур<br>     Контурний гнучкий пояс для комфорту та покриття<br>     Кишені-карго з рельєфом із застібками на липучках, а також задні кишені з клапаном із застібками забезпечують безпеку ваших особистих речей<br>     Сім зручних кишень забезпечують надійне зберігання<br>     Звичайна довжина 32 дюйми<br>     7,2 унції Твіл, 100% бавовна<br>     Промитий зелений лист<br></p>', 'промитий зелений лист,коричневий,пісочний,чорний'),
(47, 24, 'en', 'Women\'s Performance Workwear Softshell Jacket', '<p>Don\'t let the weather stop you from performing at your best. Women\'s Performance Workwear Softshell Jacket provides enhanced wind protection with a bonded fleece lining for extra warmth. The finish is water repellent to keep you working your hardest. An attached, fully adjustable hood is there for when you need it the most. Abrasion elbow patches with ergonomic shaping provide enhanced mobility while FLEX fabric throughout the main body maximizes comfort and provides an extra layer of durability. Not short on utility, this piece provides hidden zipper pockets and zippered sleeve pockets with reflective trim throughout. A drop tail hem provides added coverage from the elements giving you unyielding protection all day long.<br><br>    Enhanced wind protection<br>    Fleece lining<br>    Abrasion-resistant, nylon elbow patches<br>    Built-up neck with bungees for extra protection<br>    Reflective trims; Reflective zippered sleeve pockets<br>    Attached, fully adjustable hood<br>    Hidden zipper pockets; Zipper front closure<br>    Durable Water Repellent finish, 8000mm Waterproof/800mvp Breathable; Softshell: Polyester/ Elastane, with Bonded Microfleece<br>    Machine wash<br>    Black<br><br><br></p>', 'black'),
(48, 24, 'uk', 'Жіноча Спортивна Куртка Softshell', '<p>Не дозволяйте погоді заважати вам виступати якнайкраще. Жіноча спортивна куртка Softshell забезпечує покращений захист від вітру завдяки підкладці з флісу для додаткового тепла. Оздоблення є водовідштовхувальним, щоб ви могли працювати якнайкраще. Прикріплений, повністю регульований капюшон доступний, коли вам це потрібно найбільше. Ергономічні накладки на лікті забезпечують підвищену мобільність, а тканина FLEX по всій частині корпусу забезпечує максимальний комфорт і забезпечує додатковий шар міцності. У цьому виробі є приховані кишені на блискавках і нарукавні кишені зі світловідбиваючим оздобленням. Низький край забезпечує додаткове покриття від елементів, забезпечуючи непохитний захист протягом усього дня.<br><br>     Посилений захист від вітру<br>     Підкладка з флісу<br>     Стійкі до стирання нейлонові налокітники<br>     Вбудована шия з банджі для додаткового захисту<br>     Світловідбиваючі накладки; Світловідбиваючі кишені на рукавах на блискавці<br>     Прикріплений, повністю регульований капюшон<br>     Приховані кишені на блискавці; Застібка спереду на блискавку<br>     Міцне водовідштовхувальне покриття, 8000 мм водонепроникний/800mvp дихаючий; Софтшелл: поліестер/еластан із мікрофлісом<br>     Машинне прання<br>     чорний<br></p>', 'чорний'),
(49, 25, 'en', 'Women\'s DuraTech Renegade Insulated Jacket', '<p>Rise to the demands of your workday without sacrificing ultimate protection in Dickies Women\'s Duratech Renegade Insulated Jacket. The highly durable and triple needle reinforced Duck fabric construction comes equipped with FLEX technology for superior mobility and comfort, as well as a Durable Water Repellent finish to safeguard you from rainy weather while on the job. The patented SafeCinch™ internal mechanism provides the benefit of adjusting the drawcords through the interior of the front pockets, preventing you from getting caught up as you navigate the workday. Complete with a drop tail hem for added coverage, a hidden storm cuff for superior warmth and a zippered storm flap to defend against the elements, there\'s nothing this jacket isn\'t prepared to face.<br><br>    High hip length, fits slightly closer to body to enhance mobility<br>    FLEX fabric for ease of movement and added comfort; Durable Water Repellent (DWR) finish<br>    Patented SafeCinch internal mechanism eliminates hood drawstrings while elevating safety<br>    Storm flap with zipper closure; Hidden storm cuffs to keep you warm and dry<br>    Reinforcements in key wear down areas; Triple needle reinforced seams<br>    Chest pocket with secure pocket flap; Zippered security pocket; Interior pocket to secure valuables<br>    Underarm mobility gussets; Elbow darts for articulation and movement; Drop tail hem for added coverage<br>    Body: 9 oz. Duck, 63% Cotton/35% Polyester/2% Spandex; Lining: 160 gsm. 100% Polyester Fill<br>    Brown<br></p>', 'brown,black,gray,green'),
(50, 25, 'uk', 'Жіноча Утеплена Куртка DuraTech Renegade', '<p>Виконуйте вимоги свого робочого дня, не жертвуючи найкращим захистом у жіночій утепленій куртці Duratech Renegade. Високоміцна конструкція тканини Duck, армована трьома голками, оснащена технологією FLEX для чудової мобільності та комфорту, а також міцним водовідштовхувальним покриттям, яке захистить вас від дощової погоди під час роботи. Запатентований внутрішній механізм SafeCinch™ забезпечує перевагу регулювання тягових шнурів через внутрішню частину передніх кишень, запобігаючи тому, щоб ви не заплуталися під час робочого дня. Ця куртка має низький край для додаткового покриття, приховану штормову манжету для чудового тепла та штормовий клапан на блискавці для захисту від негоди.<br><br>     Висока довжина стегна, прилягає трохи ближче до тіла, щоб підвищити рухливість<br>     Тканина FLEX для зручності рухів і додаткового комфорту; Міцне водовідштовхувальне покриття (DWR).<br>     Запатентований внутрішній механізм SafeCinch усуває застібки на капюшоні, підвищуючи безпеку<br>     штормовий клапан із застібкою-блискавкою; Приховані штормові манжети для збереження тепла та сухості<br>     Підсилення в ключових зонах зносу;Шви з потрійною голкою<br>     Нагрудна кишеня з надійним клапаном; Захистна кишеня на блискавці; Внутрішня кишеня для зберігання цінних речей<br>     ластовиці під пахвами; Ліктьові дротики для артикуляції та руху; Занижений край для додаткового покриття<br>     Тіло: 9 унцій. Качка, 63% бавовна/35% поліестер/2% спандекс; Підкладка: 160 г/кв.м. Наповнювач 100% поліестер<br>     коричневий<br></p>', 'коричневий,чорний,сірий,зелений');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed_products`
--

CREATE TABLE `recently_viewed_products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `google_analytics` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bing_analytics` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Starlight Ecommerce', 'Laravel Ecommerce Shop', 'ecommerce shop', '<p>Starlight Ecommerce Description</p>', '<p>Ecommerce Google Code<br></p>', '<p>Ecommerce Bing Code<br></p>', '2023-06-29 07:13:46', '2023-06-29 07:10:04');

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
('3JEYAntugQSxXgG88KiG3iKYY0k0i5JJO3RJlbz8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'ZXlKcGRpSTZJbFpIWjFObmQzbEJiRmhaZW0wNWRUZGpUV055VGtFOVBTSXNJblpoYkhWbElqb2liME16VERaVFpYUnFkMGhuYUZGMVFqVk5lVXBwWlZoM2NEbFRiRUZ4TjA5aVptbEhSRGcyY25wa2IzWk5kMHBTVm5VeWNtTm1hbTVsYlcxa2NVNTJUR2xCUm1jMlJrNU5kbGRJT1dFM2JpOUJjbHB1V1ZoYU5FdHhTM1ZSV25VdlQycHRRMk5qU21wb1ozZEZNa0puTTNvMlREUlFWVGN6UWpCT2VVSnlSVzFWUWl0bVlucDZWSGRVZERFeFUwcGFRV3B5T1ROc1JEZHVRM1JTVDNaR2IzTkZTamR0WlhvMFdXWmlXQ3RrVFZwQllWWkNVbGxtY2xjdlRFTmtSV1ZITHpKWmVXRkphUzhyV0d4eGN6TlBPRkpPUldoamJsbFFOMFF4YjB3eVVFbG1PVGx5WVVWeFJFWkpaRVJFTkRCVlF6bG5kREZCSzJOUVRHcEtVbTk2VW5JemRqUm1ObEpFYmtWdVR6TldSWGxSYUdkVWVWRTlQU0lzSW0xaFl5STZJakZqTldJd1pqSXhZV0V6TlRVMk4ySXhORE0zWXpRek1qSXpNVGxtTVdZMVpqRTBaV1kzTURKallqZGpPVE5rT0RFM09UWmhaVGN3WW1SaFpEbGtOVFlpTENKMFlXY2lPaUlpZlE9PQ==', 1690193779),
('Ag5lbFqIL535ynmNpYx9aEa4sKbkes4JtTAHL1i8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'ZXlKcGRpSTZJbEZUVFhreE5GWnJRaTl3WWt4eVlrOTVTR0o2TlZFOVBTSXNJblpoYkhWbElqb2lNMXBVWW1rdlJqTktiRXhuTkhOMWRIWXdWbmhRUWtwcGJ6bDZlVWszY0daNUwzaE5SSHBPYlhKV1VFZ3dSVGhKVm5WUVFXbDFOa1pOWnpsa2VrbFhZbkpPVG01UFJFc3hZMUJRVDFORWMwcHdkR04xYVRSdVdGRTFSblpEVW1ReGRuUTRURkZLUlRsUU1HMHlhM0J6WkV0Q2F6RXhWV1Y0WkUxTk0wOURTVkZqS3pCeFFXdDNTRmwwYUhFeldHYzRWVkpIT0d0d1duZDNURFJqT0VsQ1ZIUjJVRWs1UlVScFozcE5kVVZCUkRCT2VHeFhkVXg2V0dSRU5uVnFTV1ZQUkhscFNqRjRVVzVyTW5Fd1RHWk5SekV5Wm5RNFYxRm5WeXRSVm5SVk5sZFNWV2MzVDNacE1WVjNRVnB4VHpOSWMyVkhPV1JOUkU5U1UwaDNlalUyYnlJc0ltMWhZeUk2SWpBMk5qWTROV1F3T0dJellXWmxaV000WVRNM01HTXpaR014T1dKak9EVXhaR00wTXpkbU9HVmhNREZoWWpGa09HSmpNMk16TTJJME1EazFPRFJpWTJVaUxDSjBZV2NpT2lJaWZRPT0=', 1690205646),
('jrejCRipw7lbtadx8O6TEtCnnIxhcyv3KyFzV0S8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'ZXlKcGRpSTZJazlaVm01c1FrWjNaSFJ6WlRCT2NURmphMmxDUmtFOVBTSXNJblpoYkhWbElqb2lUSFpoWlRaUmNWRkpiMjF4VGtnMGFteEtjWEo0YlVKdU1rRjBTRFp0ZFdsQlQwSjBUV1YzTUZKV05FczFTMk5LVkhsRVJDOTRhakJ2Ykc1MU0yMXFNSGgyUWxVMVZpOUdSRzR5WlN0UU1FSnhWMFJGZEhWcGVIVk5ZMFJFTHpZMGMyb3dLMDEwTkd0eGNFMTVZakZFUzFKdmRXMVFXV1owVVVWSFRFRkdjM2RKUjFGR2JrOXFWRWN5TTJSU1IxRnlTa3RZT0ZWemFXdDBibEZVY25GMVFTczRNbXRYVlRaRE1EZENiV3hDU1dodFNEZ3pOMk5UUjNkQ2RGSklWMWRWTURZNE5EQk9VWGx3Ym1NM1JrcEROM1J6TW1NM1VIQklNbmd2WkhoRVYyMXdNekpqUzJrNFkzTmtNbFZrTWtsUFNsVjJTWFJUVG5GaU1qQjVZbTFYT0ZZeGMxWnZRME4zTlZoTGVEUjBPRkp0V1V0Q1RXZFlPSFo1VG5nelEwOHpkek00TW5SMGRuRnBLMk1yUVRkdkszaFBPUzk2Y0haVGRVNW9SWGRKVlVoT2FsRkRaSFJ6VXpaSlYyaHRSa1ZqVDNaWVoyWjRPVzFtUm5RM1JqTTRiWEpYYUZJdlEyTXlUalZCYTNKNlZFUnVNa3RCTDFVNWRpODFVMUIyU21GMklpd2liV0ZqSWpvaU56RmxaV1l4T0Raa1lUazBNekkyWVRJd05tRm1aVEUxWTJRNVpqZ3paakZqTVdaaFlUVXlOREJoTWpVeFkyTmxPRGxrTnpnMFpEVTVaR1ExWWpFeU5DSXNJblJoWnlJNklpSjk=', 1690196761),
('QhMfMYWqUFkz6gXZhiiWbFC2czMAy6QHzbsoRfKf', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'ZXlKcGRpSTZJbXhOUlVnclJtWm5ZV3hDV204d2FXaFFXVTgwTTFFOVBTSXNJblpoYkhWbElqb2ljemRTYUU1cllUUjBla2hvVWt0T1FVeDZOalptYmtOdVNFbzFNalpOVm10bVFqVTJZVEZyTTNBNU16QnhORTFNTDBnemVHZE1kR0YzV1ROaWNFb3JaV04wVm04elpVMXFNVTlvU0RoNFRqSnFUaTlEYW1WSVdVZzBaRGxKSzFJNVZtdG9TMFZMYW1ScmExaFJkM1paVG5KVFNFY3pURk5SY1RaSmFuWlFkVkZTV0VWelJUbEJTMnA1WkZkcmRsZzRjM0JxTWpkSlptOWpjbUZETXpWMWNFTjZTa0V4UzFFME5VUldVa3MxSzNsbVNGcGpTR1p4VG05Wk1FSXdMM1ozTjJKNU0xWXlkeXM0TjNoTGJuUkRiRmhrYmtsUlFtOVRNMjlxU0RKRGFGZGxkMVZzZGpaQmVVaHFVbm8wVld4b1NITmlkVkpNZDI5bksxWXpiVFpIV2tsT05GaEdaSFIyYURScGFrOTZMelkxZG5ack0wZERZVTFqTlZoWVdsUlFNMnhyU0RrM1pISjRWVUZyZEZKRWVFTlFSVTVMZUVOak9IVllNVVpxVFZFNGNsaHFWSGxIYVRWdGVUSm5ZMGhtYW5WUU0wVjFkWFZUY0ZCU2ExY3pWRTVCUTFCak4zRmtNeXR2YlZGNUt6aHlOVlJOVjJrMVpsTnhTM2Q0VUdjMWJFUjNjeXRwU0VwRGVuZzBWVWc0Tmt4NFkwRnFkejA5SWl3aWJXRmpJam9pT0Roak1ERXdNR1ZpTXpoa09XRTFNRGxsTm1abE9HWmpNekUwTTJKa1pURmxZelUyTnpFeE1UZ3lOV1F3WkRWaE9UVXpZemxtTVdGbFl6QmpPRFpqWmlJc0luUmhaeUk2SWlKOQ==', 1690194928),
('wucWeIMHvmoURMG5FNy1JSzOFQ6KBcIDgdvq7XDN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'ZXlKcGRpSTZJamx0Y0RsQ09GUXJOak42VjJnelEzUTFUbFp4YjJjOVBTSXNJblpoYkhWbElqb2llbXhRV1VneVpHcE1MMDUyWkdzelUwbFFUemhOZGl0VVdVMHhkMVZNYmpsdVIxQXpXVTk1WjJKbE9FUk9iWEJSUVRSMlVVWm1aMjFhT1ZGcFNHZEVVMUZPY0RoeGEzSXhXVFZ6UlZCeFZrdGtWRVp3TldNd01XdENZVmxaUjNGU0wwUm1LME5rWjNONmF6UlpPVVZpVDJkcFZuaEJUSE5rWkZORlNsZDBkVE5KTDNkcVRGaG5kMFY2VmpGSVduaGhSa2hRTlRWaGIzUjRTR0Y0WTBSSFYzbFZVM3BuU1U4MlJWQlROa3R1VGxSbVpXZzFiRVZ1YzNaaGJYVnRaRWx4TWpGRmFGVlNTWFoxT0hFemFsbFFWR0U0UkROQ1VGRnJVbFJVSzNWd2NYSXJUSEY1T0dkdGFrdGFjbFlyYWtwUEx6RmhTREp5YlZKR2F6a3dUVFIxTjNkamJ6aFFkVlpKV0VoWk9GVnpLM2RzYlU5amRHYzlQU0lzSW0xaFl5STZJbU0wTVRJMFlUTXhaVE14WTJWallUWmhOR0ZpWmpjNE9UVmlOREUzWXpnNU1tSXdaVFZrTnpOak1XTXhZVGc1TW1KbVlqbGhNekl6WkdabVpUZzNabUlpTENKMFlXY2lPaUlpZlE9PQ==', 1690194928),
('zpnCMcwutsHUqarnCGykHlXyLO0Hvo52p6SfYFxD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0', 'ZXlKcGRpSTZJbmxYUzBWc2FVVm1TWFZrYWpaUlZrbEdSMnBZZVhjOVBTSXNJblpoYkhWbElqb2lkbEYxT0VOeFJUUmtjbGxvSzJaWE1sQlBWamxsZVdaak5IRndSRXR1ZFdweFZtVkdNVVpoZW1kSlducHpRV3R6ZEdWclRrZG9jVGhOU25CV0wwVnpZVzFzTm1KM1EydFRRakI0VGpGelpWbGthelJWYVU1NWEyVmxhMHgwYzBaM1VIaExWRE51VVhGWVZreDFabFZaT0ROVU4xSndkbmxKUWxaVWF6TnhiV3g0UlhSdlVuZFpObXN2SzNsWGNGRkthRE5IUTA5MmFUVm5aV0V5TVZjNFJYb3ZabEEwZVM5S1FWUTVaa05YTVhGdVdVSlRVRGxJYUZCR1ZYRnBaa2x1YjJOMFVXdzBRMUZuZEdGRVluUmtTR1ZrU21kaE1ETlpabmRzTDBOM1dYUlJTRzVaYzFveFMzSnhaelVyTjFWQ2FHTlBTRFJOT1RnMVV6ZFJjemRVYnpsUUwxVkdabHByVG5aWWVsaHNMMms0UzBGcU5GRk1OREZOYm1wUVNFWTNUbFZhVm1SNlNEUjBkMkV3VTFaU1MybEtXRXhJZVVsQlIzQjJkV3RVTDFVaUxDSnRZV01pT2lJME5tUmxaR015TXpnMVpUQTFNRGt3TUdJeVlqZzNaREUwWkRFME16UmxZamd5TmpFeE5qVTBZakZqTURRelkyRmhaakU1WVRVMk4yVm1aRGRsTkRZM0lpd2lkR0ZuSWpvaUluMD0=', 1690206564);

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
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `shipping_name`, `shipping_phone`, `shipping_email`, `shipping_address`, `shipping_city`, `created_at`, `updated_at`) VALUES
(1, '1', 'Bruce Willis', '(310) 854-8100', 'bruce.willis@gmail.com', 'Rogers & Cowan, 1840 Century Park East, 18th Floor, Los Angeles CA 90067, USA', 'Los Angeles', NULL, NULL),
(2, '2', 'Bruce Willis', '(310) 854-8100', 'bruce.willis@gmail.com', 'Rogers & Cowan, 1840 Century Park East, 18th Floor, Los Angeles CA 90067, USA', 'Los Angeles', NULL, NULL),
(3, '3', 'Bruce Willis', '(310) 854-8100', 'bruce.willis@gmail.com', 'Rogers & Cowan, 1840 Century Park East, 18th Floor, Los Angeles CA 90067, USA', 'Los Angeles', NULL, NULL),
(4, '4', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(5, '5', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(6, '6', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(7, '7', 'Bruce Willis', '(310) 854-8100', 'bruce.willis@gmail.com', 'Rogers & Cowan, 1840 Century Park East, 18th Floor, Los Angeles CA 90067, USA', 'Los Angeles', NULL, NULL),
(8, '8', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(9, '9', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(10, '17', 'Bruce Willis', '(310) 854-8100', 'bruce.willis@gmail.com', 'Rogers & Cowan, 1840 Century Park East, 18th Floor, Los Angeles CA 90067, USA', 'Los Angeles', NULL, NULL),
(11, '19', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(12, '20', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(13, '21', 'Bruce Willis', '(310) 854-8100', 'bruce.willis@gmail.com', 'Rogers & Cowan, 1840 Century Park East, 18th Floor, Los Angeles CA 90067, USA', 'Los Angeles', NULL, NULL),
(14, '22', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(15, '23', 'Bruce Willis', '(310) 854-8100', 'bruce.willis@gmail.com', 'Rogers & Cowan, 1840 Century Park East, 18th Floor, Los Angeles CA 90067, USA', 'Los Angeles', NULL, NULL),
(16, '24', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(17, '25', 'Bruce Willis', '(310) 854-8100', 'bruce.willis@gmail.com', 'Rogers & Cowan, 1840 Century Park East, 18th Floor, Los Angeles CA 90067, USA', 'Los Angeles', NULL, NULL),
(18, '26', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL),
(19, '27', 'Chandler Bing', '+380991755316', 'chandler@gmail.com', 'Grove Street, West Village, Manhattan, New York City, USA', 'New York City', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_contacts`
--

CREATE TABLE `site_contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_contacts`
--

INSERT INTO `site_contacts` (`id`, `phone_one`, `phone_two`, `company_email`, `company_name`, `company_address`, `fb`, `youtube`, `instagram`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '+380954841127', '+380991755316', 'info@onesport.com', 'OneSport', 'Fokker Logistics Park, building 59, Fokkerweg 300, 1438 AN Oude Meer', '#', '#', '#', '#', NULL, '2023-07-04 12:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'gents-shirts', '2023-06-12 05:23:44', '2023-06-12 05:23:44'),
(2, 1, 'gents-pants', '2023-06-12 05:24:06', '2023-06-12 05:24:06'),
(3, 1, 'gents-outerwear', '2023-06-12 05:24:27', '2023-06-12 05:24:27'),
(4, 2, 'womens-shirts', '2023-06-12 05:24:52', '2023-06-12 05:24:52'),
(5, 2, 'womens-pants', '2023-06-12 05:25:28', '2023-06-12 05:25:28'),
(6, 2, 'womens-outerwear', '2023-06-12 05:26:09', '2023-06-12 05:26:09'),
(7, 3, 'child-dress-footwear', '2023-06-12 05:26:51', '2023-06-12 05:26:51'),
(8, 3, 'baby-food', '2023-06-12 05:27:10', '2023-06-12 05:27:10'),
(9, 3, 'toys', '2023-06-12 05:27:30', '2023-06-12 05:27:30'),
(10, 4, 'gents-watches', '2023-06-12 05:28:04', '2023-06-12 05:28:04'),
(11, 4, 'womens-watches', '2023-06-12 05:28:21', '2023-06-12 05:28:21'),
(12, 4, 'kids-watches', '2023-06-12 05:28:37', '2023-06-12 05:28:37'),
(13, 5, 'audio-video', '2023-06-12 05:29:33', '2023-06-12 05:29:33'),
(14, 5, 'computers-laptops', '2023-06-12 05:29:53', '2023-06-12 05:29:53'),
(15, 10, 'room-decoration', '2023-06-12 05:31:20', '2023-06-12 05:31:20'),
(16, 10, 'appliances', '2023-06-12 05:31:32', '2023-06-12 05:31:32'),
(17, 10, 'light-and-lamps', '2023-06-12 05:31:48', '2023-06-12 05:31:48'),
(18, 10, 'security', '2023-06-12 05:32:00', '2023-06-12 05:32:00'),
(19, 5, 'smartphones-tablets', '2023-07-13 06:59:13', '2023-07-13 06:59:13');

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
(25, 13, 'en', 'Audio & Video'),
(26, 13, 'uk', 'Аудіо та Відео'),
(27, 14, 'en', 'Computers & Laptops'),
(28, 14, 'uk', 'Комп\'ютери та Лептопи'),
(29, 15, 'en', 'Room Decoration'),
(30, 15, 'uk', 'Декор для Кімнат'),
(31, 16, 'en', 'Appliances'),
(32, 16, 'uk', 'Побутова Техніка'),
(33, 17, 'en', 'Light and Lamps'),
(34, 17, 'uk', 'Освітлення та Лампи'),
(35, 18, 'en', 'Security'),
(36, 18, 'uk', 'Безпека'),
(37, 19, 'en', 'Smartphones & Tablets'),
(38, 19, 'uk', 'Смартфони та Планшети');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `provider`, `provider_id`, `email_verified_at`, `password`, `slug`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Chandler', '+380991755316', 'chandler@gmail.com', NULL, NULL, '2023-06-19 08:34:06', '$2y$10$3RX9TP7iHwfDQ/uvrpQTCe421.XC/Po/.ihgGzwZ5/JxITqfkHOn2', 'chandler-1', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-19 08:13:43', '2023-07-18 06:34:39');

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
(10, 1, 2, '2023-07-24 10:04:38', '2023-07-24 10:04:38'),
(11, 1, 11, '2023-07-24 10:04:44', '2023-07-24 10:04:44');

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_seos`
--
ALTER TABLE `page_seos`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recently_viewed_products_user_id_foreign` (`user_id`),
  ADD KEY `recently_viewed_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_contacts`
--
ALTER TABLE `site_contacts`
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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_category_translations`
--
ALTER TABLE `blog_category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `page_seos`
--
ALTER TABLE `page_seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `site_contacts`
--
ALTER TABLE `site_contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subcategory_translations`
--
ALTER TABLE `subcategory_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Constraints for table `recently_viewed_products`
--
ALTER TABLE `recently_viewed_products`
  ADD CONSTRAINT `recently_viewed_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recently_viewed_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategory_translations`
--
ALTER TABLE `subcategory_translations`
  ADD CONSTRAINT `subcategory_translations_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
