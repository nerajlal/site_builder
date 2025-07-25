-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2025 at 11:55 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_footer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `header_footer_id`, `created_at`, `updated_at`) VALUES
(1, 'Rolex', 8, '2025-07-25 01:28:44', '2025-07-25 01:28:44'),
(2, 'Omega', 8, '2025-07-25 01:29:04', '2025-07-25 01:29:04'),
(3, 'Cartier', 8, '2025-07-25 01:29:30', '2025-07-25 01:29:30'),
(4, 'Patek Philippe', 8, '2025-07-25 01:30:04', '2025-07-25 01:30:04'),
(7, 'IWC', 8, '2025-07-25 02:44:05', '2025-07-25 02:44:05'),
(8, 'Audemars', 8, '2025-07-25 03:00:22', '2025-07-25 03:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_footer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `header_footer_id`, `created_at`, `updated_at`) VALUES
(1, 'Luxury Watches', 8, '2025-07-25 01:31:03', '2025-07-25 01:31:03'),
(2, 'Couple Watches', 8, '2025-07-25 01:31:44', '2025-07-25 01:31:44'),
(3, 'Mens Watches', 8, '2025-07-25 01:32:09', '2025-07-25 01:32:09'),
(4, 'Women Watches', 8, '2025-07-25 01:32:18', '2025-07-25 01:32:18'),
(5, 'Budget Watches', 8, '2025-07-25 02:44:18', '2025-07-25 02:44:18');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_footer_id` bigint UNSIGNED NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_sub` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_hours` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_building` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_line1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_line2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_us_header_footer_id_foreign` (`header_footer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `header_footer_id`, `contact_name`, `contact_sub`, `contact_phone`, `contact_hours`, `contact_email`, `contact_building`, `contact_line1`, `contact_line2`, `created_at`, `updated_at`) VALUES
(1, 8, 'Contact Us', 'Our watch specialists are available to assist you with any inquiries about our collection or services.', '+918547470675', 'Mon-Fri: 9AM-9PM', 'nerajneraj@gmail.com', 'Luxury Time', 'Luxuty Nagar', 'NewYork', '2025-07-24 20:36:55', '2025-07-24 21:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_footer`
--

DROP TABLE IF EXISTS `header_footer`;
CREATE TABLE IF NOT EXISTS `header_footer` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` tinyint(1) NOT NULL DEFAULT '0',
  `brands` tinyint(1) NOT NULL DEFAULT '0',
  `collections` tinyint(1) NOT NULL DEFAULT '0',
  `contact` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `footer_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `header_footer_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_footer`
--

INSERT INTO `header_footer` (`id`, `user_id`, `site_name`, `features`, `brands`, `collections`, `contact`, `created_at`, `updated_at`, `footer_text`) VALUES
(8, 1, 'LuxuryTime', 1, 1, 1, 1, '2025-07-24 08:15:08', '2025-07-24 21:42:43', 'The premier destination for discerning collectors of fine timepiece.');

-- --------------------------------------------------------

--
-- Table structure for table `home_settings`
--

DROP TABLE IF EXISTS `home_settings`;
CREATE TABLE IF NOT EXISTS `home_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_footer_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `main_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button1_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button2_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `home_settings_user_id_index` (`user_id`),
  KEY `home_settings_header_footer_id_foreign` (`header_footer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_settings`
--

INSERT INTO `home_settings` (`id`, `header_footer_id`, `user_id`, `main_text`, `sub_text`, `button1_text`, `button2_text`, `created_at`, `updated_at`) VALUES
(6, 8, 1, 'Precision Crafted Luxury Timepieces', 'Experience the pinnacle of Swiss watchmaking excellence', 'Discover Collections', 'Discover More', '2025-07-24 08:15:08', '2025-07-24 08:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_23_065102_create_user_accounts_table', 1),
(6, '2025_07_23_120029_create_user_profiles_table', 2),
(7, '2025_07_24_053613_create_header_footer_table', 3),
(8, '2025_07_24_060647_add_footer_text_to_header_footer_table', 4),
(9, '2025_07_24_070436_create_home_settings_table', 5),
(10, '2025_07_24_072143_add_user_id_to_home_settings_table', 6),
(11, '2025_07_24_103030_add_header_footer_id_to_home_settings_table', 7),
(12, '2025_07_24_125045_create_section1_table', 8),
(13, '2025_07_24_125048_create_section2_table', 8),
(14, '2025_07_24_134215_add_main_sub_columns_to_section2_table', 9),
(15, '2025_07_25_015709_create_testimonials_table', 10),
(16, '2025_07_25_015807_create_contact_us_table', 10),
(17, '2025_07_25_063742_create_brands_table', 11),
(18, '2025_07_25_063819_create_categories_table', 11),
(19, '2025_07_25_063849_create_products_table', 11),
(20, '2025_07_25_075859_add_image_url_to_products_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_footer_id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `header_footer_id`, `brand_id`, `category_id`, `price`, `quantity`, `image_url`, `created_at`, `updated_at`) VALUES
(4, 'Rolex Dirt', 8, 1, 1, 75000.00, 26, 'https://www.watchclub.com/upload/watches/originali/watch-club-rolex-cosmograph-daytona-116500ln-rolexwarrantyto2025-ref-116500ln-year-2020-15156-wb.png4.jpg', '2025-07-25 02:34:23', '2025-07-25 02:34:23'),
(5, 'Couple Gift', 8, 2, 2, 10000.00, 35, 'https://www.watchocart.in/wp-content/uploads/2024/12/wp-image-6763d0c888b4b.jpg', '2025-07-25 02:37:57', '2025-07-25 02:37:57'),
(6, 'Schaffhausen', 8, 7, 3, 75000.00, 42, 'https://www.gregoryjewellers.com.au/wp-content/uploads/2021/04/IW388102-2.jpg', '2025-07-25 02:59:23', '2025-07-25 02:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `section1`
--

DROP TABLE IF EXISTS `section1`;
CREATE TABLE IF NOT EXISTS `section1` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_footer_id` bigint UNSIGNED NOT NULL,
  `main_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature3_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature3_detail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section1_header_footer_id_foreign` (`header_footer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section1`
--

INSERT INTO `section1` (`id`, `header_footer_id`, `main_heading`, `sub_heading`, `feature1_heading`, `feature1_detail`, `feature2_heading`, `feature2_detail`, `feature3_heading`, `feature3_detail`, `created_at`, `updated_at`) VALUES
(3, 8, 'The Luxury Time Difference', 'Why discerning collectors choose our curated selection of timepieces', 'Authenticity Guaranteed', 'Every watch undergoes rigorous authentication by our Swiss-trained experts.', 'Authenticity Guaranteed', 'Every watch undergoes rigorous authentication by our Swiss-trained experts.', 'Authenticity Guaranteed', 'Every watch undergoes rigorous authentication by our Swiss-trained experts.', '2025-07-24 08:15:08', '2025-07-24 08:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `section2`
--

DROP TABLE IF EXISTS `section2`;
CREATE TABLE IF NOT EXISTS `section2` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_footer_id` bigint UNSIGNED NOT NULL,
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `main_text1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_text1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `section2_header_footer_id_foreign` (`header_footer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `section2`
--

INSERT INTO `section2` (`id`, `header_footer_id`, `image1`, `image2`, `image3`, `image4`, `image5`, `image6`, `created_at`, `updated_at`, `main_text1`, `sub_text1`) VALUES
(2, 8, 'https://www.realmenrealstyle.com/wp-content/uploads/2019/03/rolex-cosmograph-daytona-1.jpg', 'https://img.ctykit.com/cdn/nc-southpark/images/tr:w-1800/omega-seamaster-diver-blue-rose-gold-steel-21020422003-1.jpg', 'https://static.watchtime.com/wp-content/uploads/2018/09/Patek_Philippe_Nautilus_Ref_57111A_FI.jpg', 'https://d2j6dbq0eux0bg.cloudfront.net/images/38270005/3596966871.jpg', 'https://3.bp.blogspot.com/-N6rTIUS1WqI/WbxLuwcU6WI/AAAAAAAAaKA/EA0nYjJrfuAaElVatAr101qjp2fEyliMwCLcBGAs/s1600/IWC-Portugieser-Automatic-Blue-IW500710_b.jpg', 'https://d23x6d9cx8qezf.cloudfront.net/wp-content/uploads/2018/01/Audemars-Piguet-Royal-Oak-Extra-Thin-Tourbillon-Tapisserie-Evolutive-26522-SIHH-2018-4.jpg', '2025-07-24 08:15:08', '2025-07-24 08:19:46', 'Our Precious Brands', 'Partnering with the most revered names in horology');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `header_footer_id` bigint UNSIGNED NOT NULL,
  `testi_main` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testi_sub` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testi1` text COLLATE utf8mb4_unicode_ci,
  `testi_user1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testi2` text COLLATE utf8mb4_unicode_ci,
  `testi_user2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testi3` text COLLATE utf8mb4_unicode_ci,
  `testi_user3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `testimonials_header_footer_id_foreign` (`header_footer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `header_footer_id`, `testi_main`, `testi_sub`, `testi1`, `testi_user1`, `testi2`, `testi_user2`, `testi3`, `testi_user3`, `created_at`, `updated_at`) VALUES
(1, 8, 'User Testimonial', 'Experiences from our community of horology enthusiasts', 'The authentication process gave me complete confidence in my purchase. My Patek arrived in impeccable condition with all original papers.', 'James Wilson', 'Exceptional service from start to finish. My consultant helped me find the perfect Rolex Daytona that I\'d been searching for years.', 'Sarah Johnson', 'The after-sales service is unparalleled. When my watch needed servicing, they handled everything seamlessly.', 'Neraj Lal', '2025-07-24 20:36:55', '2025-07-24 20:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE IF NOT EXISTS `user_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_accounts_phone_unique` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, '8547470675', '$2y$12$7pCfwi7P083XsAALkQRCy.BQIXSTK50wRYA1qTFIWZAz2mUEMuQ7C', '2025-07-23 01:37:38', '2025-07-23 01:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_profiles_user_id_unique` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `last_name`, `email`, `address`, `created_at`, `updated_at`) VALUES
(2, 1, 'Neraj Lal', 'S', 'nerajnerajlal@gmail.com', 'lal bhavan Mukkoodu p.o Mulavana', '2025-07-24 01:02:14', '2025-07-24 05:25:21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
