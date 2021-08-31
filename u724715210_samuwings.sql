-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-08-2021 a las 18:28:49
-- Versión del servidor: 10.4.19-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u724715210_samuwings`
--
CREATE DATABASE IF NOT EXISTS `u724715210_samuwings` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u724715210_samuwings`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `android` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ios` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `about`
--

INSERT INTO `about` (`id`, `about_content`, `image`, `logo`, `footer_logo`, `favicon`, `fb`, `twitter`, `insta`, `android`, `ios`, `copyright`, `mobile`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Emprendimiento de comida rapida Samu Wings amor por la cocina', 'about-5fa8f1af82a9a.jpg', 'logo-5fa8f23623d32.png', 'footer-5fa8f2437276f.png', 'favicon-5fa8f27866397.png', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://play.google.com/store', 'https://www.apple.com/', 'Copyright Samuwings © 2021.All Rights Reserved.', '+ 593 983180524', 'bryanvera9393@gmail.com', 'Quito - Ecuador', '2021-07-29 05:04:44', '2020-11-09 13:59:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Yes , 2 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `addons`
--

INSERT INTO `addons` (`id`, `cat_id`, `item_id`, `name`, `price`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'Ensalada de lechuga', '2', 1, '2021-07-29 05:20:04', '2021-07-29 05:20:04'),
(2, 3, 2, 'porción de papas', '2', 1, '2021-07-29 05:21:07', '2021-08-23 18:43:10'),
(3, 7, 11, 'Ensaladaa Rusa', '2', 1, '2021-08-27 17:16:00', '2021-08-27 18:13:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'banner-6102329ee719c.jpeg', '2021-07-29 04:46:22', '2021-07-29 04:46:22'),
(2, 'banner-6102330704c5a.jpeg', '2021-07-29 04:46:33', '2021-07-29 04:48:07'),
(3, 'banner-61023332e72fb.jpeg', '2021-07-29 04:48:50', '2021-07-29 04:48:50'),
(4, 'banner-612951a41e7a2.jpeg', '2021-07-29 04:50:26', '2021-08-27 15:57:08'),
(5, 'banner-6102344f36175.png', '2021-07-29 04:50:29', '2021-07-29 04:53:35'),
(6, 'banner-61023395b25d6.png', '2021-07-29 04:50:31', '2021-07-29 04:50:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `addons_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Yes . 2 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Yes , 2 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'Drinks', 'category-610230fd5c0d6.jpeg', 1, '2021-07-29 04:39:25', '2021-07-29 04:39:25'),
(2, 'Mexican Food', 'category-6102310c392ba.jpeg', 1, '2021-07-29 04:39:40', '2021-07-29 04:39:40'),
(3, 'Alitas', 'category-6102311f23230.jpeg', 1, '2021-07-29 04:39:59', '2021-07-29 04:39:59'),
(4, 'De la casa', 'category-6102313fe02fe.jpeg', 1, '2021-07-29 04:40:31', '2021-07-29 04:40:31'),
(5, 'Hamburguesas', 'category-6102314e81c52.jpeg', 1, '2021-07-29 04:40:46', '2021-07-29 04:40:46'),
(6, 'Sanduches', 'category-612945b250036.jpeg', 2, '2021-08-27 15:06:10', '2021-08-27 15:06:30'),
(7, 'Sanduchess', 'category-6129637d234c0.jpeg', 1, '2021-08-27 17:13:17', '2021-08-27 18:13:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorite`
--

CREATE TABLE `favorite` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `favorite`
--

INSERT INTO `favorite` (`id`, `user_id`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2021-03-04 07:09:28', '2021-03-04 07:09:28'),
(5, 8, 7, '2021-08-27 17:18:32', '2021-08-27 17:18:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredients`
--

CREATE TABLE `ingredients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_status` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Yes , 2 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `cat_id`, `item_name`, `item_description`, `item_price`, `delivery_time`, `item_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cerveza Club', 'Bebida Alcoholica', '2', '15 minutos', 1, '2021-07-29 05:07:22', '2021-07-29 05:23:13'),
(2, 3, '6 alitas BBQ', 'Crocantes Alitas bañadas en tu salsa favorita', '9', '20', 1, '2021-07-29 05:09:31', '2021-08-27 18:13:15'),
(3, 3, '12 alitas + papas y bebida', '12 alitas bbq con tu salsa favorita, papas y bebida a elección', '18', '25 minutos', 1, '2021-07-29 05:11:47', '2021-07-29 05:23:21'),
(4, 4, 'Costillas BBQ', 'Deliciosas costillas bbq + papas y bebida', '14.5', '25', 1, '2021-07-29 05:12:57', '2021-07-29 05:12:57'),
(5, 1, 'Jugos naturales', 'Jugos naturales refrescantes', '2', '15', 1, '2021-07-29 05:14:11', '2021-07-29 05:14:11'),
(6, 1, 'Colas', 'Colas refrescantes', '1.5', '15', 1, '2021-07-29 05:15:25', '2021-07-29 05:15:25'),
(7, 2, 'Nachos con Queso y guacamole', 'Deliciosos nachos con queso y guacamole', '5', '15', 1, '2021-07-29 05:16:49', '2021-07-29 05:16:49'),
(8, 5, 'Hamburguesa simple', 'Carne jugosa al grill hecha hamburguesa + papas', '5', '15 minutos', 1, '2021-07-29 05:18:36', '2021-07-29 05:23:05'),
(9, 5, 'Hamburguesa doble', 'Hamburguesa con dos deliciosas y jugosas carnes + papas', '6', '15 minutos', 1, '2021-07-29 05:19:19', '2021-08-26 05:58:26'),
(10, 1, 'Mojito', 'Bebida alcoholica preparada con nuestro mejor ron blanco', '4.5', '15 minutos', 1, '2021-08-04 15:42:33', '2021-08-04 15:42:33'),
(11, 7, 'Choripan', 'Chorizo asado acompañado de un pan recien salido del horno', '4', '15', 1, '2021-08-27 17:14:28', '2021-08-27 17:14:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_images`
--

CREATE TABLE `item_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `item_images`
--

INSERT INTO `item_images` (`id`, `item_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'item-6102378ad8b4d.jpeg', '2021-07-29 05:07:22', '2021-07-29 05:07:22'),
(2, 2, 'item-6102380be85f1.jpeg', '2021-07-29 05:09:31', '2021-07-29 05:09:31'),
(3, 3, 'item-61023893a2a7d.png', '2021-07-29 05:11:47', '2021-07-29 05:11:47'),
(4, 4, 'item-610238d9c8086.jpeg', '2021-07-29 05:12:57', '2021-07-29 05:12:57'),
(5, 5, 'item-61023923d1c6e.jpeg', '2021-07-29 05:14:11', '2021-07-29 05:14:11'),
(6, 6, 'item-6102396d79ee4.jpeg', '2021-07-29 05:15:25', '2021-07-29 05:15:25'),
(7, 7, 'item-610239c126bcf.jpeg', '2021-07-29 05:16:49', '2021-07-29 05:16:49'),
(8, 8, 'item-61023a2c7afb7.jpeg', '2021-07-29 05:18:36', '2021-07-29 05:18:36'),
(9, 9, 'item-61023a57e040c.jpeg', '2021-07-29 05:19:19', '2021-07-29 05:19:19'),
(10, 10, 'item-610ab569bd3d7.jpeg', '2021-08-04 15:42:33', '2021-08-04 15:42:33'),
(11, 11, 'item-612963c69160a.jpeg', '2021-08-27 17:14:30', '2021-08-27 17:14:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_06_05_070854_create_categories_table', 2),
(7, '2020_06_05_103122_create_item_table', 3),
(9, '2020_06_05_110205_create_item_images_table', 4),
(10, '2020_06_05_125414_create_ingredients_table', 5),
(14, '2020_06_06_055110_create_cart_table', 6),
(16, '2020_06_07_051607_create_order_table', 7),
(18, '2020_06_07_063234_create_order_details_table', 8),
(19, '2020_06_16_094849_create_ratting_table', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(2, 'App\\User', 10),
(2, 'App\\User', 11),
(2, 'App\\User', 12),
(2, 'App\\User', 13),
(2, 'App\\User', 14),
(2, 'App\\User', 15),
(2, 'App\\User', 16),
(2, 'App\\User', 17),
(2, 'App\\User', 18),
(2, 'App\\User', 19),
(2, 'App\\User', 20),
(2, 'App\\User', 21),
(2, 'App\\User', 22),
(2, 'App\\User', 23),
(2, 'App\\User', 24),
(2, 'App\\User', 25),
(2, 'App\\User', 26),
(2, 'App\\User', 27),
(2, 'App\\User', 28),
(2, 'App\\User', 29),
(2, 'App\\User', 30),
(2, 'App\\User', 31),
(2, 'App\\User', 32),
(2, 'App\\User', 33),
(2, 'App\\User', 34),
(2, 'App\\User', 35),
(2, 'App\\User', 36),
(2, 'App\\User', 37),
(2, 'App\\User', 38),
(2, 'App\\User', 39),
(2, 'App\\User', 40),
(2, 'App\\User', 41),
(2, 'App\\User', 44),
(2, 'App\\User', 45),
(2, 'App\\User', 46),
(2, 'App\\User', 47),
(2, 'App\\User', 48),
(2, 'App\\User', 49),
(2, 'App\\User', 50),
(2, 'App\\User', 51),
(2, 'App\\User', 52),
(2, 'App\\User', 53),
(2, 'App\\User', 54),
(2, 'App\\User', 56),
(2, 'App\\User', 57),
(2, 'App\\User', 58),
(2, 'App\\User', 59),
(2, 'App\\User', 60),
(2, 'App\\User', 61),
(2, 'App\\User', 62),
(2, 'App\\User', 63),
(2, 'App\\User', 64),
(2, 'App\\User', 65),
(2, 'App\\User', 66),
(2, 'App\\User', 68),
(2, 'App\\User', 69),
(2, 'App\\User', 70),
(2, 'App\\User', 71),
(2, 'App\\User', 72),
(2, 'App\\User', 73),
(2, 'App\\User', 74),
(2, 'App\\User', 75),
(2, 'App\\User', 79),
(2, 'App\\User', 80),
(2, 'App\\User', 81),
(2, 'App\\User', 82),
(2, 'App\\User', 83),
(2, 'App\\User', 84),
(2, 'App\\User', 85),
(2, 'App\\User', 86),
(2, 'App\\User', 87),
(2, 'App\\User', 88),
(2, 'App\\User', 89),
(2, 'App\\User', 90),
(2, 'App\\User', 91),
(2, 'App\\User', 92),
(2, 'App\\User', 93),
(2, 'App\\User', 94),
(2, 'App\\User', 95),
(2, 'App\\User', 96),
(2, 'App\\User', 97),
(2, 'App\\User', 98),
(2, 'App\\User', 99),
(2, 'App\\User', 100),
(2, 'App\\User', 101),
(2, 'App\\User', 102),
(2, 'App\\User', 103),
(2, 'App\\User', 104),
(2, 'App\\User', 105),
(2, 'App\\User', 106),
(2, 'App\\User', 107),
(2, 'App\\User', 108),
(2, 'App\\User', 109),
(2, 'App\\User', 110),
(2, 'App\\User', 111),
(2, 'App\\User', 112),
(2, 'App\\User', 113),
(2, 'App\\User', 114),
(2, 'App\\User', 115),
(2, 'App\\User', 116),
(2, 'App\\User', 117),
(2, 'App\\User', 118),
(2, 'App\\User', 119),
(2, 'App\\User', 120),
(2, 'App\\User', 121),
(2, 'App\\User', 122),
(2, 'App\\User', 123),
(2, 'App\\User', 124),
(2, 'App\\User', 125),
(2, 'App\\User', 126),
(2, 'App\\User', 127),
(2, 'App\\User', 128),
(2, 'App\\User', 129),
(2, 'App\\User', 130),
(2, 'App\\User', 131),
(2, 'App\\User', 132),
(2, 'App\\User', 133),
(2, 'App\\User', 134),
(2, 'App\\User', 135),
(2, 'App\\User', 136),
(2, 'App\\User', 137),
(2, 'App\\User', 138),
(2, 'App\\User', 139),
(2, 'App\\User', 140),
(2, 'App\\User', 141),
(2, 'App\\User', 142);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `driver_id` int(11) DEFAULT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razorpay_payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_type` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Delivery , 2 = Pickup',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promocode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_pr` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amount` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_from` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `is_notification` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Unread , 2 = Read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order`
--

INSERT INTO `order` (`id`, `order_number`, `user_id`, `driver_id`, `order_total`, `razorpay_payment_id`, `payment_type`, `order_type`, `address`, `pincode`, `lat`, `lang`, `building`, `landmark`, `promocode`, `discount_amount`, `discount_pr`, `tax`, `tax_amount`, `delivery_charge`, `order_notes`, `order_from`, `status`, `is_notification`, `created_at`, `updated_at`) VALUES
(5, '4T4VXYRKMR', 3, NULL, '17.92', NULL, '0', 2, '', '', '', '', '', '', NULL, '0.00', '0', '12', '1.92', '0.00', NULL, NULL, 4, 2, '2021-08-04 05:27:02', '2021-08-27 20:01:42'),
(6, '3NWW8AC0WK', 6, NULL, '20.16', NULL, '0', 2, '', '', '', '', '', '', NULL, '0.00', '0', '12', '2.16', '0.00', NULL, NULL, 4, 2, '2021-08-04 06:02:35', '2021-08-27 20:01:42'),
(8, 'FXKNKC32Z0', 3, NULL, '10.08', NULL, '0', 2, '', '', '', '', '', '', NULL, '0.00', '0', '12', '1.08', '0.00', 'Agregar sevilletas', NULL, 4, 2, '2021-08-04 17:38:22', '2021-08-27 20:01:42'),
(9, 'JEQUFIC42B', 3, 2, '35.54', NULL, '0', 1, 'Guápulo, Quito, Ecuador', '170408', '-78.4758469', '-0.1994083', '1', 'Canchas', NULL, '0.00', '0', '12', '3.54', '2.50', 'Muchas salsas', NULL, 4, 2, '2021-08-26 23:48:57', '2021-08-27 20:01:42'),
(10, 'U7B8JWTW04', 8, 2, '31.06', NULL, '0', 1, 'Guápulo, Quito, Ecuador', '170408', '-78.4758469', '-0.1994083', '2 Piso 3', 'Bajando Por Las. Canchas', NULL, '0.00', '0', '12', '3.06', '2.50', 'No olvidar utensilios', NULL, 4, 2, '2021-08-27 19:46:34', '2021-08-27 20:01:42'),
(11, 'E1X4AQEN2Y', 8, 2, '27.70', NULL, '0', 1, 'La Tolita, Quito 170109, Ecuador', '170408', '-78.4771657', '-0.2069992', 'Piso 1', 'Bajar Por Las Canchas', NULL, '0.00', '0', '12', '2.70', '2.50', 'No olvidar cubiertos', NULL, 4, 2, '2021-08-27 19:55:11', '2021-08-27 20:01:42'),
(12, '4V6JHFF4N0', 4, 2, '18.18', NULL, '0', 1, 'La Tolita, Quito 170109, Ecuador', '170408', '-78.4771657', '-0.2069992', 'Piso 3', 'Al Fin De La Calle', NULL, '0.00', '0', '12', '1.68', '2.50', 'Agregar utensilios', NULL, 4, 1, '2021-08-27 20:05:25', '2021-08-27 20:07:32'),
(13, 'PDVZGGTSG0', 8, 2, '22.66', NULL, '0', 1, 'Cam. de Orellana, Quito, Ecuador', '170408', '-78.47714119999999', '-0.1997626', 'Piso 2', 'Al Final De La Calle', NULL, '0.00', '0', '12', '2.16', '2.50', 'Agregar utensilios', NULL, 4, 1, '2021-08-27 20:14:02', '2021-08-27 20:15:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addons_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `order_id`, `item_id`, `price`, `qty`, `item_notes`, `addons_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 5, '16', '8', NULL, NULL, '2021-08-04 05:27:02', '2021-08-04 05:27:02'),
(2, 6, 6, 1, '8.00', '4', NULL, NULL, '2021-08-04 06:02:35', '2021-08-04 06:02:35'),
(3, 6, 6, 7, '10.00', '2', NULL, NULL, '2021-08-04 06:02:35', '2021-08-04 06:02:35'),
(4, 3, 8, 2, '9.00', '1', NULL, NULL, '2021-08-04 17:38:22', '2021-08-04 17:38:22'),
(5, 3, 9, 7, '25', '5', NULL, NULL, '2021-08-26 23:48:57', '2021-08-26 23:48:57'),
(6, 3, 9, 10, '4.50', '1', NULL, NULL, '2021-08-26 23:48:57', '2021-08-26 23:48:57'),
(7, 8, 10, 6, '1.50', '1', NULL, NULL, '2021-08-27 19:46:34', '2021-08-27 19:46:34'),
(8, 8, 10, 3, '18.00', '1', 'Enviar salsas', NULL, '2021-08-27 19:46:34', '2021-08-27 19:46:34'),
(9, 8, 10, 11, '6.00', '1', 'Enviar servilleta', '3', '2021-08-27 19:46:34', '2021-08-27 19:46:34'),
(10, 8, 11, 10, '4.50', '1', NULL, NULL, '2021-08-27 19:55:11', '2021-08-27 19:55:11'),
(11, 8, 11, 3, '18.00', '1', 'Enviar salsas', NULL, '2021-08-27 19:55:11', '2021-08-27 19:55:11'),
(12, 4, 12, 6, '3.00', '2', NULL, NULL, '2021-08-27 20:05:25', '2021-08-27 20:05:25'),
(13, 4, 12, 2, '11.00', '1', 'Enviar salsas', '2', '2021-08-27 20:05:25', '2021-08-27 20:05:25'),
(14, 8, 13, 5, '2.00', '1', NULL, NULL, '2021-08-27 20:14:02', '2021-08-27 20:14:02'),
(15, 8, 13, 8, '5.00', '1', 'Agregar muchas salsas', NULL, '2021-08-27 20:14:02', '2021-08-27 20:14:02'),
(16, 8, 13, 2, '11.00', '1', NULL, '2', '2021-08-27 20:14:02', '2021-08-27 20:14:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pincode`
--

CREATE TABLE `pincode` (
  `id` bigint(20) NOT NULL,
  `pincode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pincode`
--

INSERT INTO `pincode` (`id`, `pincode`, `created_at`, `updated_at`) VALUES
(1, '170408', '2021-03-02 00:36:48', '2021-08-26 23:47:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privacypolicy`
--

CREATE TABLE `privacypolicy` (
  `id` int(11) NOT NULL,
  `privacypolicy_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `privacypolicy`
--

INSERT INTO `privacypolicy` (`id`, `privacypolicy_content`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>Pol&iacute;tica de Privacidad</strong>&nbsp;Estamos comprometidos con la protecci&oacute;n de la privacidad de todas aquellas personas que visiten,&nbsp;descarguen y registren sus datos en la aplicaci&oacute;n Samu Wings o soliciten los servicios desde nuestro sitio web.&nbsp;</p>\n\n<p>Cuando requiera de nuestros servicios al realizar un pedido en Samu Wings , a trav&eacute;s de nuestra aplicaci&oacute;n m&oacute;vil o sitio web, se le podr&aacute; solicitar informaci&oacute;n como su nombre, datos de contacto, direcci&oacute;n de recogida o entrega, y la informaci&oacute;n sobre una tarjeta de cr&eacute;dito o de d&eacute;bito.&nbsp;</p>\n\n<p>Al acceder a la informaci&oacute;n de la aplicaci&oacute;n Samu Wings&nbsp;a trav&eacute;s de nuestra aplicaci&oacute;n m&oacute;vil o sitio web, utilizando las rutas digitales de los m&oacute;viles como por ejemplo (pero no limitados a estos tipos) m&oacute;vil, tablet u otro dispositivo / tecnolog&iacute;a, incluyendo las aplicaciones m&oacute;viles, la recogida y utilizaci&oacute;n de sus datos se ajustar&aacute; a lo establecido en la presente Pol&iacute;tica de Privacidad.&nbsp;</p>', '2020-10-13 12:37:35', '2021-07-29 04:23:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocode`
--

CREATE TABLE `promocode` (
  `id` bigint(20) NOT NULL,
  `offer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Yes , 2 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `promocode`
--

INSERT INTO `promocode` (`id`, `offer_name`, `offer_code`, `offer_amount`, `description`, `is_available`, `created_at`, `updated_at`) VALUES
(1, 'Promo Bienvenida', 'descuento', '10', 'Por los primeros 10 días, increíble oferta!', 1, '2021-06-06 08:12:48', '2021-08-26 22:24:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratting`
--

CREATE TABLE `ratting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ratting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ratting`
--

INSERT INTO `ratting` (`id`, `user_id`, `ratting`, `comment`, `created_at`, `updated_at`) VALUES
(2, 3, '5', 'Exelente servicio', '2021-08-26 05:52:01', '2021-08-26 05:52:01'),
(3, 8, '5', 'Servicio excelente', '2021-08-27 17:18:54', '2021-08-27 17:18:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'web', '2020-04-15 01:28:19', '2020-04-15 01:28:19'),
(2, 'user', 'User', 'web', '2020-04-15 01:28:19', '2020-04-15 01:28:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `termscondition_content` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `terms`
--

INSERT INTO `terms` (`id`, `termscondition_content`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>T&eacute;rminos y Condiciones</strong>&nbsp;Es importante aclarar que todo usuario se compromete a pagar el precio del&nbsp;<em>domicilio</em>&nbsp;desde el momento en el que recibe el correo de confirmaci&oacute;n del&nbsp;<em>pedido</em>.</p>', '2020-10-13 12:37:35', '2021-07-29 04:24:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `day` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `always_close` int(11) NOT NULL DEFAULT 2 COMMENT '1 = Yes , 2 = No',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `time`
--

INSERT INTO `time` (`id`, `day`, `open_time`, `close_time`, `always_close`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '12:00am', '11:59pm', 2, '2021-05-06 09:49:35', '2021-05-07 09:49:35'),
(2, 'Tuesday', '12:00am', '11:59pm', 2, '2021-05-06 09:49:35', '2021-05-06 09:49:35'),
(3, 'Wednesday', '12:00am', '11:59pm', 2, '2021-05-06 09:49:35', '2021-05-06 09:49:35'),
(4, 'Thursday', '12:00am', '11:59pm', 2, '2021-05-06 09:49:35', '2021-05-06 09:49:35'),
(5, 'Friday', '12:00am', '11:59pm', 2, '2021-05-06 09:49:35', '2021-05-06 09:49:35'),
(6, 'Saturday', '12:00am', '11:59pm', 2, '2021-05-06 09:49:35', '2021-05-06 09:49:35'),
(7, 'Sunday', '12:00am', '11:59pm', 2, '2021-05-06 09:49:35', '2021-05-06 09:49:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `tax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_order_qty` int(11) DEFAULT NULL,
  `min_order_amount` int(11) DEFAULT NULL,
  `max_order_amount` int(11) DEFAULT NULL,
  `lat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_available` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Yes , 2 = No',
  `otp` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) DEFAULT NULL COMMENT '1 = Yes , 2 = No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `profile_image`, `password`, `type`, `tax`, `delivery_charge`, `max_order_qty`, `min_order_amount`, `max_order_amount`, `lat`, `lang`, `token`, `is_available`, `otp`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '', 'unknown.png', '$2y$10$RKFRI21R2SVyf/QMSj92H.srHuJXPWKk7VCbK8R3LJvRHuUobvjai', 1, '12', '2.5', 10, 7, 100, '-0.2042005', '-78.4749335', 'foUMSygnRN-FY7UL7bj9o5:APA91bGzcFEMDAUVfFL2UjeVoBihXlUXfTojGn6UcwSRiVhHonhw7TXUgI-Mq2zq0wUeBtiIkn7Gi6qPS_S4grn7C9bF4IxsP23hbs1B5jCjnl--6Aa_bK_OARj1Hb6drtCM7gb1MahS', 1, NULL, NULL, '2020-06-05 07:21:20', '2021-08-27 18:00:29'),
(2, 'Repartidor', 'edy.repartidor@gmail.com', '0987654321', 'unknown.png', '$2y$10$BHq2x6knw6kg71mt1N8/m.J43hVki9kX6Co3wY9p.QoqhXvTuVsZW', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dgAs7SVUQwmJjv5q0tCa2d:APA91bEfRYZ9sKwpKBM9I2qckSIxRFi1TU9nQdNTcO-SK31Yhv7mnK3C_tuxaMdDaGgyhnifrHF1Xs3iFBeIIIyhuLIBNrx5joaRKktB_M3YnnaXy8cTG5JeF2TSySqKHfefnX-IbV6-', 1, NULL, NULL, '2021-03-01 22:17:38', '2021-08-27 19:48:50'),
(3, 'Cliente', 'brayanvera93@outlook.com', '987012679', 'profile-61024022e7fac.jpg', '$2y$10$kfmGmQ7xnwh5qYdD2qCrPuRwivRt2JvnwKurn7zzaw7/cDHc3DYee', 2, NULL, NULL, NULL, NULL, NULL, '40.712776', '-74.005974', 'null', 1, NULL, 1, '2021-05-06 09:49:35', '2021-08-27 16:01:15'),
(4, 'Edy Vera', 'bryanvera9393@gmail.com', '0983180524', 'profile-6103b16025d9a.jpg', '$2y$10$TMSc/Skm8Zq.RJQOtLVDde8fcKI2DZTZVkiJpyWpzpar0cRJqzjFS', 2, NULL, NULL, NULL, NULL, NULL, '-0.225219', '-78.5248', 'null', 1, NULL, 1, '2021-03-01 23:39:25', '2021-08-27 20:00:58'),
(5, 'Jhon Vera', 'jhon0987012679@gmail.com', '0992765907', 'unknown.png', '$2y$10$Hg2hszr8sN5/M0jjiKsRsuwkVGz3UYIC7MyhGE22n5kR5iqWaK6JK', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '399657', 2, '2021-08-04 05:47:18', '2021-08-04 05:51:22'),
(6, 'Jhon Vera', 'jvera.mec@uisek.edu.ec', '0987012679', 'unknown.png', '$2y$10$EP.pGIm/qLAPeItLtONK7uAW0onbNkpf4p7CHl.21L7oc.JzhxchG', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dOQX8XsqTbCgOolCsJUzw_:APA91bG7CYl_KNYD4sJ-Q8CUDWKW-BwKy_5B6vk8CZuxQRvYq_u_YONKUeb00jvANYDZZFBThfVZmG4dtgTqR4161IzJJXTiwVFMWeGLnX66st2XOQ8uGVgi2S40eEYLWJ5GBrdJAObV', 1, NULL, 1, '2021-08-04 05:54:14', '2021-08-04 06:00:35'),
(7, 'Juan Vera', 'brayan_edj5442@hotmail.com', '0999850248', 'unknown.png', '$2y$10$JqFb5pjCmP6aGPjQNBp2x.JGtEICDZ3s9FtZ5FVtI1VSqeNBwy4Ra', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '895289', NULL, '2021-08-04 17:44:41', '2021-08-04 17:44:41'),
(8, 'Alexis Vera', 'eb.vera@hotmail.com', '0999123123', 'unknown.png', '$2y$10$VVhpNlfpOXlVEN7Rjp8wYu7fdpQeIR8YaSmMsgQGEDmc7bX1qQa.y', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'null', 1, NULL, 1, '2021-08-27 17:17:35', '2021-08-27 20:10:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_item_id_foreign` (`item_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredients_item_id_foreign` (`item_id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_images`
--
ALTER TABLE `item_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_images_item_id_foreign` (`item_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_item_id_foreign` (`item_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `privacypolicy`
--
ALTER TABLE `privacypolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promocode`
--
ALTER TABLE `promocode`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratting_user_id_foreign` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `item_images`
--
ALTER TABLE `item_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `privacypolicy`
--
ALTER TABLE `privacypolicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `promocode`
--
ALTER TABLE `promocode`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ratting`
--
ALTER TABLE `ratting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
