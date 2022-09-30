-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 06:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alluser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminrole` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `phone`, `type`, `brand`, `category`, `product`, `slider`, `coupon`, `shipping`, `orders`, `cancel`, `return`, `review`, `stock`, `alluser`, `adminrole`, `reports`, `setting`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2021-02-02 15:36:52', '$2y$10$FlCYwRiWUURgZ4V181ql5eWGbRSodFdP/3eNzNZHg5s0Rp5zSGAUy', '5NsSgC61v2tpanS5bIM72HFJgaJXL1bW6HrchNaQv79trFgIsonb4KYI4CkR', NULL, '202204051038avatar-3.png', '081563977109', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2021-02-02 15:36:52', '2022-04-05 07:34:40'),
(2, 'Admin Satu', 'adminsatu@gmail.com', NULL, '$2y$10$FlCYwRiWUURgZ4V181ql5eWGbRSodFdP/3eNzNZHg5s0Rp5zSGAUy', NULL, NULL, '1737234301483117.png', '0895335490295', '2', '1', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL, NULL, '2022-07-02 02:55:35', '2022-07-02 02:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Adidasssss', 'adidasssss', 'upload/brands/1726963965772172.jpeg', NULL, '2022-03-11 19:55:52'),
(2, 'Fila', 'fila', 'upload/brands/1727014810233066.jpeg', NULL, NULL),
(3, 'Puma', 'puma', 'upload/brands/1727015064536309.jpeg', NULL, NULL),
(4, 'New Balance', 'new-balance', 'upload/brands/1727015080674006.jpeg', NULL, NULL),
(5, 'Champion', 'champion', 'upload/brands/1727015098947747.jpeg', NULL, NULL),
(6, 'Vans', 'vans', 'upload/brands/1727015114666469.jpeg', NULL, NULL),
(7, 'Nike', 'nike', 'upload/brands/1727015206510797.jpeg', NULL, NULL),
(8, 'Superga', 'superga', 'upload/brands/1727016955208126.jpeg', NULL, NULL),
(9, 'Reebok', 'reebok', 'upload/brands/1727016967705456.jpeg', NULL, NULL),
(10, 'Converse', 'converse', 'upload/brands/1727016992297404.jpeg', NULL, NULL),
(11, 'Kickers', 'kickers', 'upload/brands/1727017008381817.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Wanita', 'wanita', 'fa fa-female', NULL, '2022-03-12 22:16:27'),
(2, 'Pria', 'pria', 'fa fa-male', NULL, NULL),
(3, 'Anak-Anak', 'anak-anak', 'fa fa-child', NULL, NULL),
(4, 'Pria Wanita', 'pria-wanita', 'fa fa-male', NULL, '2022-04-21 00:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bandung', '2022-04-16 01:26:21', NULL),
(2, 1, 'Kabupaten Bandung', '2022-04-16 01:28:25', NULL),
(5, 3, 'Madura', '2022-04-16 16:25:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AKHIRBULAN', 20, '2022-04-01', 1, '2022-04-15 10:57:35', NULL),
(3, 'PENGGUNABARU', 30, '2023-04-30', 1, '2022-04-29 15:46:22', NULL),
(4, 'IEDFITRI1443H', 25, '2022-05-07', 1, '2022-04-29 17:24:07', '2022-04-29 17:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `province_id`, `city_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Pasirjambu', '2022-04-16 16:34:44', NULL),
(2, 1, 2, 'Ciwidey', '2022-04-16 16:35:00', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_02_055107_create_sessions_table', 1),
(7, '2022_04_02_061946_create_admins_table', 1),
(8, '2022_04_08_032611_create_brands_table', 1),
(9, '2022_04_09_103144_create_categories_table', 2),
(10, '2022_04_11_003229_create_sub_categories_table', 3),
(11, '2022_04_11_010701_create_sub_sub_categories_table', 4),
(12, '2022_04_11_011156_create_products_table', 5),
(13, '2022_04_11_011258_create_product_galleries_table', 6),
(14, '2022_04_11_011359_create_sliders_table', 7),
(15, '2022_04_11_011445_create_coupons_table', 8),
(16, '2022_04_11_011535_create_provinces_table', 9),
(17, '2022_04_11_011607_create_cities_table', 10),
(18, '2022_04_11_011639_create_districts_table', 11),
(19, '2022_04_28_173032_create_wishlists_table', 12),
(20, '2022_04_30_061124_create_orders_table', 13),
(21, '2022_04_30_192724_create_order_items_table', 14),
(22, '2022_05_06_091931_create_reviews_table', 15),
(23, '2022_05_06_092107_create_site_settings_table', 16),
(24, '2022_05_06_092204_create_seos_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poscode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `province_id`, `city_id`, `district_id`, `name`, `email`, `phone`, `poscode`, `address`, `payment_method`, `bukti_pembayaran`, `transaction_id`, `amount`, `resi`, `order_number`, `invoice_number`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_order`, `cancel_date`, `cancel_reason`, `return_order`, `return_date`, `return_reason`, `shipping_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 1, 'User', 'user@gmail.com', '081563977109', '40972', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas, 40972', 'Stripe', NULL, 'txn_3KvziQCN92UgdufC0aLoGUYu', '240000', NULL, '627385b0087e8', 'ESZ12704867', '05 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Selesai', '2022-05-05 01:07:16', '2022-06-04 14:35:06'),
(2, 1, 1, 2, 2, 'User', 'user@gmail.com', '081563977109', '40973', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas, 40973', 'Stripe', NULL, 'txn_3Kw1seCN92UgdufC0QuIVS0Y', '150000', NULL, '6273a6315ed41', 'ESZ38046433', '05 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, '2', '15 July 2022', 'Mau ubah metode pembayaran', NULL, NULL, NULL, 'Di konfirmasi', '2022-05-05 03:25:59', '2022-07-15 01:40:12'),
(3, 2, 1, 2, 1, 'Salsa Nur Maulani', 'salsa@gmail.com', '0895335490295', '40972', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas, 40972', 'Cash On Delivery', NULL, NULL, '150000', NULL, '79944577', 'ESZ54517974', '05 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Di konfirmasi', '2022-05-05 04:49:23', '2022-05-10 13:14:11'),
(4, 2, 1, 2, 1, 'Salsa Nur Maulani', 'salsa@gmail.com', '0895335490295', '40972', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas, 40972', 'Bank Transfer Manual', 'upload/orders/1731993537273294.jpg', NULL, '112500', NULL, '66735719', 'ESZ19169944', '05 May 2022', 'May', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Selesai', '2022-05-05 06:35:52', '2022-05-16 23:58:32'),
(5, 1, 1, 2, 2, 'User', 'user@gmail.com', '081563977109', '40972', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas, 40972', 'Cash On Delivery', NULL, NULL, '90000', NULL, '74752231', 'ESZ11051388', '17 June 2022', 'June', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Selesai', '2022-06-17 10:29:36', NULL),
(6, 1, 1, 2, 1, 'User', 'user@gmail.com', '081563977109', '40972', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas, 40972', 'Cash On Delivery', NULL, NULL, '100000', NULL, '55549555', 'ESZ66716519', '17 June 2022', 'June', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '15 July 2022', 'Ukuran sepatunya tidak sesuai kak, harusnya 39 yang dikirim ukuran 42', 'Selesai', '2022-06-17 10:54:52', '2022-07-15 01:44:36'),
(7, 4, 1, 2, 1, 'Caca', 'caca@gmail.com', '0813735435456', '40972', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas', 'Cash On Delivery', NULL, NULL, '360000', NULL, '29026927', 'ESZ89396993', '16 July 2022', 'July', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ditunda', '2022-07-16 07:05:29', NULL),
(8, 4, 1, 2, 1, 'Caca', 'caca@gmail.com', '0813735435456', '40972', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas', 'Cash On Delivery', NULL, NULL, '360000', NULL, '79510023', 'ESZ56778118', '16 July 2022', 'July', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ditunda', '2022-07-16 07:06:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'hitam', '36', '1', 120000.00, '2022-05-05 01:07:16', NULL),
(2, 1, 4, 'kuning', '36', '1', 200000.00, '2022-05-05 01:07:16', NULL),
(3, 2, 7, 'hitam', '36', '1', 150000.00, '2022-05-05 03:25:59', NULL),
(6, 3, 6, 'hitam', '36', '2', 100000.00, '2022-05-05 04:49:23', NULL),
(8, 4, 7, 'hitam', '36', '1', 150000.00, '2022-05-05 06:35:52', NULL),
(9, 5, 5, 'hitam', '36', '1', 90000.00, '2022-06-17 10:29:36', NULL),
(10, 6, 6, 'hitam', '36', '1', 100000.00, '2022-06-17 10:54:52', NULL),
(11, 7, 3, 'hitam', '36', '3', 120000.00, '2022-07-16 07:05:29', NULL),
(12, 8, 3, 'hitam', '36', '3', 120000.00, '2022-07-16 07:06:13', NULL);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_short_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_promo` int(11) DEFAULT NULL,
  `new_product` int(11) DEFAULT NULL,
  `new_arrival` int(11) DEFAULT NULL,
  `best_seller` int(11) DEFAULT NULL,
  `product_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tags`, `product_size`, `product_color`, `product_weight`, `product_price`, `product_discount`, `product_short_desc`, `product_long_desc`, `product_thumbnail`, `product_promo`, `new_product`, `new_arrival`, `best_seller`, `product_status`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 3, 2, 'Adidas Forum Low', 'adidas-forum-low', '2101202000001', '100', 'sneakers', '36,37,38', 'hitam,abu-abu,hijau,biru,putih', '500', '150000', '120000', 'Sebuah konsep re-imajinasi yang rendah dari klasik kultus 80-an, adidas Forum adalah ikon b-ball yang dibuat untuk jalanan.', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos culpa laborum quidem vero quisquam molestiae libero debitis dolorem aliquid tempore, iusto perferendis quasi ullam suscipit voluptas, quo hic repellat modi?z</p>', 'upload/products/thumbnail/1730602289666413.png', 1, 1, 1, 1, 1, '2022-04-23 18:24:18', '2022-04-23 18:24:18'),
(4, 1, 3, 3, 2, 'LOEWE ELN CLIMBING SHOE', 'loewe-eln-climbing-shoe', '2101202000002', '100', 'sneakers', '36,37,38', 'kuning', '700', '200000', NULL, 'Koleksi Eye/LOEWE/Nature baru dari Loewe memperkenalkan sepatu hiking yang mewah namun fungsional ini dalam warna kuning dan biru yang siap untuk musim gugur.', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos culpa laborum quidem vero quisquam molestiae libero debitis dolorem aliquid tempore, iusto perferendis quasi ullam suscipit voluptas, quo hic repellat modi?z</p>', 'upload/products/thumbnail/1730606358018527.png', 1, NULL, NULL, 1, 1, '2022-04-19 23:07:16', NULL),
(5, 1, 2, 8, 6, 'VANS UA HALF CAB 33 DX TAOS TAUPE & OATMEAL CROC', 'vans-ua-half-cab-33-dx-taos-taupe-&-oatmeal-croc', '2101202000003', '100', 'sneakers', '36,37,38', 'hitam,biru,merah', '500', '90000', NULL, 'Vans tetap setia pada estetika skate all-American dengan sepatu kets Half Cab 33 ini.', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos culpa laborum quidem vero quisquam molestiae libero debitis dolorem aliquid tempore, iusto perferendis quasi ullam suscipit voluptas, quo hic repellat modi?z</p>', 'upload/products/thumbnail/1730607400805777.png', NULL, NULL, NULL, 1, 1, '2022-04-23 18:24:01', '2022-04-23 18:24:01'),
(6, 6, 1, 9, 1, 'VANS UA OLD SKOOL 36 DX', 'vans-ua-old-skool-36-dx', '2101202000004', '99', 'sneakers', '36,37,38', 'hitam,biru,merah', '500', '100000', NULL, 'Old Skools angkatan laut klasik ini mengingatkan pada siluet asli - dengan beberapa pembaruan kontemporer.', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos culpa laborum quidem vero quisquam molestiae libero debitis dolorem aliquid tempore, iusto perferendis quasi ullam suscipit voluptas, quo hic repellat modi?z</p>', 'upload/products/thumbnail/1730610596525402.png', NULL, 1, NULL, NULL, 1, '2022-04-20 00:14:38', '2022-07-15 01:32:49'),
(7, 1, 2, 1, 7, 'ADIDAS FORUM MID', 'adidas-forum-mid', '2101202000005', '97', 'sneakers', '36,37,38', 'hitam,biru,merah', '700', '200000', '150000', 'adidas membawa Anda dengan mudah dari lapangan basket ke jalan-jalan kota dengan sepatu kets Forum ini. Pertama kali dirilis pada tahun \'84, pasangan putih dan hitam ini tetap berpegang pada desain aslinya', '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos culpa laborum quidem vero quisquam molestiae libero debitis dolorem aliquid tempore, iusto perferendis quasi ullam suscipit voluptas, quo hic repellat modi?z</p>', 'upload/products/thumbnail/1730610712820259.png', NULL, 1, NULL, 1, 1, '2022-04-23 18:23:34', '2022-05-16 23:58:32'),
(8, 10, 2, 3, 11, 'CONVERSE CHUCK TAYLOR 1970S HI', 'converse-chuck-taylor-1970s-hi', '2101202000006', '100', 'sneakers', '36,37,38', 'hitam,biru,merah', '500', '150000', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio eaque ab mollitia non quos quaerat ea, aliquam', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio eaque ab mollitia non quos quaerat ea, aliquam, sit tenetur modi pariatur vitae dolores quam molestiae voluptatibus iusto similique aspernatur asperiores.</p>', 'upload/products/thumbnail/1730950751207329.png', 1, NULL, NULL, NULL, 1, '2022-04-23 18:21:16', NULL),
(9, 4, 1, 1, 1, 'Pottery Low Sneakers', 'pottery-low-sneakers', '2101202000007', '100', 'sneakers', '36,37,38', 'hitam,biru,merah', '700', '200000', NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio eaque ab mollitia non quos quaerat ea, aliquam', '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio eaque ab mollitia non quos quaerat ea, aliquam, sit tenetur modi pariatur vitae dolores quam molestiae voluptatibus iusto similique aspernatur asperiores.</p>', 'upload/products/thumbnail/1730950846650861.png', NULL, NULL, NULL, 1, 1, '2022-04-23 18:22:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(7, 3, 'upload/products/product-gallery/1730602290261347.png', '2022-04-19 22:02:36', NULL),
(8, 3, 'upload/products/product-gallery/1730602290569644.png', '2022-04-19 22:02:36', NULL),
(9, 3, 'upload/products/product-gallery/1730602290943836.png', '2022-04-19 22:02:37', NULL),
(10, 3, 'upload/products/product-gallery/1730602291300434.png', '2022-04-19 22:02:37', NULL),
(11, 3, 'upload/products/product-gallery/1730602291750383.png', '2022-04-19 22:02:37', NULL),
(12, 3, 'upload/products/product-gallery/1730602292112239.png', '2022-04-19 22:02:38', NULL),
(13, 4, 'upload/products/product-gallery/1730606358779494.png', '2022-04-19 23:07:16', NULL),
(14, 4, 'upload/products/product-gallery/1730606359153711.png', '2022-04-19 23:07:16', NULL),
(15, 4, 'upload/products/product-gallery/1730606359538891.png', '2022-04-19 23:07:17', NULL),
(16, 4, 'upload/products/product-gallery/1730606359983516.png', '2022-04-19 23:07:17', NULL),
(17, 4, 'upload/products/product-gallery/1730606360857502.png', '2022-04-19 23:07:18', NULL),
(18, 5, 'upload/products/product-gallery/1730607401355621.png', '2022-04-19 23:23:50', NULL),
(19, 5, 'upload/products/product-gallery/1730607401947483.png', '2022-04-19 23:23:51', NULL),
(20, 5, 'upload/products/product-gallery/1730607402339288.png', '2022-04-19 23:23:52', NULL),
(21, 5, 'upload/products/product-gallery/1730607403470636.png', '2022-04-19 23:23:52', NULL),
(22, 6, 'upload/products/product-gallery/1730610597267542.png', '2022-04-20 00:14:38', NULL),
(23, 6, 'upload/products/product-gallery/1730610597624434.png', '2022-04-20 00:14:38', NULL),
(24, 6, 'upload/products/product-gallery/1730610598014035.png', '2022-04-20 00:14:39', NULL),
(25, 6, 'upload/products/product-gallery/1730610598334266.png', '2022-04-20 00:14:39', NULL),
(26, 6, 'upload/products/product-gallery/1730610598784934.png', '2022-04-20 00:14:40', NULL),
(27, 6, 'upload/products/product-gallery/1730610599141043.png', '2022-04-20 00:14:40', NULL),
(28, 6, 'upload/products/product-gallery/1730610599428037.png', '2022-04-20 00:14:40', NULL),
(29, 7, 'upload/products/product-gallery/1730610713093769.png', '2022-04-20 00:16:29', NULL),
(30, 7, 'upload/products/product-gallery/1730610713447231.png', '2022-04-20 00:16:29', NULL),
(31, 7, 'upload/products/product-gallery/1730610713725385.png', '2022-04-20 00:16:29', NULL),
(32, 7, 'upload/products/product-gallery/1730610714012356.png', '2022-04-20 00:16:29', NULL),
(33, 7, 'upload/products/product-gallery/1730610714401670.png', '2022-04-20 00:16:30', NULL),
(34, 8, 'upload/products/product-gallery/1730950753034883.png', '2022-04-23 18:21:16', NULL),
(35, 8, 'upload/products/product-gallery/1730950753395632.png', '2022-04-23 18:21:16', NULL),
(36, 8, 'upload/products/product-gallery/1730950753835973.png', '2022-04-23 18:21:17', NULL),
(37, 8, 'upload/products/product-gallery/1730950754228543.png', '2022-04-23 18:21:17', NULL),
(38, 8, 'upload/products/product-gallery/1730950754632674.png', '2022-04-23 18:21:17', NULL),
(39, 9, 'upload/products/product-gallery/1730950847013028.png', '2022-04-23 18:22:46', NULL),
(40, 9, 'upload/products/product-gallery/1730950847547602.png', '2022-04-23 18:22:46', NULL),
(41, 9, 'upload/products/product-gallery/1730950848043191.png', '2022-04-23 18:22:47', NULL),
(42, 9, 'upload/products/product-gallery/1730950848789680.png', '2022-04-23 18:22:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`, `created_at`, `updated_at`) VALUES
(1, 'Jawa  Barat', '2022-04-15 17:13:56', NULL),
(2, 'Jawa Tengah', '2022-04-15 17:14:03', NULL),
(3, 'Jawa  Timur', '2022-04-15 17:14:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(3, 6, 1, 'Keren sepatunya', '4', '1', '2022-07-15 01:48:19', '2022-07-15 01:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'salza ecommerce', 'Salza', 'ecommerce, salza, salza store', 'jual beli secara online', 'window.dataLayer = window.dataLayer || [];\r\n                                   function gtag(){dataLayer.push(arguments);}', '2022-06-17 06:38:30', '2022-06-17 07:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9DA9lkf2Jlcb5yeXgZrLU4OSeZAy8xcu5XSngJQq', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo3OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL29yZGVyLWRldGFpbHMvNyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJOYWkzbVYybkJIdWhwMUZ3bE52YWhBUGFiMnBFdDFDVXFqdzl1NGtDIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJEx1cy9qVkdsdllrQjRwa3h5dU5wS09vY0VENXJBNGpiQS9FZjRZcW5vTHoueWdQZXpiUWx1IjtzOjQ6ImNhcnQiO2E6MDp7fX0=', 1657980732);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `description`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/1727013687201165.png', 'SALZA adalah sebuah perusahaan yang bergerak di bidang jual beli secara online', '+6281563977109', '+6281563977109', 'esalza@gmail.com', 'SALZA COMPANY', 'Jl. Babakantiga No. 82 Ciwidey', '2022-06-15 09:55:14', '2022-06-15 10:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/sliders/1730189902126205.png', 'Produk Terbaru Adidas', 'Sepatu Adidas yang nyaman dipakai untuk menemani aktivitas anda', 1, NULL, NULL),
(3, 'upload/sliders/1730595341993220.png', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kasual', 'kasual', NULL, '2022-03-12 22:17:08'),
(2, 1, 'Klasik', 'klasik', NULL, NULL),
(3, 2, 'Klasik', 'klasik', NULL, NULL),
(4, 2, 'Kasual', 'kasual', NULL, NULL),
(5, 2, 'Sport', 'sport', NULL, NULL),
(6, 1, 'Sport', 'sport', NULL, NULL),
(7, 2, 'Formal', 'formal', NULL, NULL),
(8, 1, 'Formal', 'formal', NULL, NULL),
(9, 3, 'Formal', 'formal', NULL, '2022-03-12 22:23:32'),
(10, 3, 'Sepatu Bayi', 'sepatu-bayi', NULL, NULL),
(11, 4, 'Kasual', 'kasual', NULL, NULL),
(12, 4, 'Klasik', 'klasik', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name`, `subsubcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sneakers', 'sneakers', NULL, NULL),
(2, 3, 9, 'Sepatu Sekolah', 'sepatu-sekolah', NULL, '2022-03-12 22:23:57'),
(3, 2, 3, 'Boat', 'boat', NULL, '2022-03-12 22:27:05'),
(5, 1, 6, 'Trainers', 'trainers', NULL, NULL),
(6, 2, 4, 'Slip On', 'slip-on', NULL, NULL),
(7, 3, 9, 'Converse', 'converse', NULL, NULL),
(8, 2, 4, 'Sepatu Boot', 'sepatu-boot', NULL, NULL),
(9, 2, 7, 'Sepatu Oxford', 'sepatu-oxford', NULL, NULL),
(10, 2, 7, 'Sepatu Derby', 'sepatu-derby', NULL, NULL),
(11, 2, 3, 'Loafers', 'loafers', NULL, NULL),
(12, 1, 1, 'Ballerina Flats', 'ballerina-flats', NULL, NULL),
(13, 1, 1, 'Slip On', 'slip-on', NULL, NULL),
(14, 1, 2, 'Boots', 'boots', NULL, NULL),
(15, 1, 1, 'Canvas', 'canvas', NULL, NULL),
(16, 3, 9, 'Warrior', 'warrior', NULL, NULL),
(17, 3, 10, 'Slip On', 'slip-on', NULL, NULL),
(18, 3, 9, 'Sepatu Boot', 'sepatu-boot', NULL, NULL),
(19, 4, 11, 'Semi Formal', 'semi-formal', NULL, NULL),
(20, 4, 11, 'Sneakers', 'sneakers', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `last_seen`, `created_at`, `updated_at`) VALUES
(1, 'User', '081563977109', 'Kp. Cibodas Rt 01 / Rw 16 Desa Cibodas, 40972', 'user@gmail.com', NULL, '$2y$10$FlCYwRiWUURgZ4V181ql5eWGbRSodFdP/3eNzNZHg5s0Rp5zSGAUy', NULL, NULL, NULL, 'qME5LL2emMr2ChUuIrRZWhYgwLPtsiFEEtlEu8fYWpudzalzcytmHMiQiDc7', NULL, '202205061044avatar-3.png', '2022-07-16 14:01:08', '2021-02-02 14:54:02', '2022-07-16 07:01:08'),
(2, 'Salsa Nur Maulani', '0895335490295', NULL, 'salsa@gmail.com', NULL, '$2y$10$FlCYwRiWUURgZ4V181ql5eWGbRSodFdP/3eNzNZHg5s...', NULL, NULL, NULL, 'FQiS0AHu8FevoEc2iGWR2r0TAQYYXlCPNJL6UA8H5gMKiqJC5iitqVJ9OPQp', NULL, '202205051147avatar-10.png', '2022-06-17 09:37:32', '2022-04-05 20:23:54', '2022-05-05 04:47:28'),
(4, 'Caca', '0813735435456', NULL, 'caca@gmail.com', NULL, '$2y$10$Lus/jVGlvYkB4pkxyuNpKOocED5rA4jbA/Ef4YqnoLz.ygPezbQlu', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-16 14:12:12', '2022-07-15 22:32:12', '2022-07-16 07:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 1, 3, '2022-07-15 02:23:25', NULL),
(8, 1, 4, '2022-07-15 02:25:04', NULL),
(9, 1, 5, '2022-07-15 02:25:06', NULL),
(10, 1, 6, '2022-07-15 02:25:08', NULL);

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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
