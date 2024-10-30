-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 01:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `pic`, `active`, `created_at`, `updated_at`) VALUES
(10, 'Adidas', 'brands/MfDzPu2KEHbyEnkt4CGQC0pZidnH4e0ILfiQA9sX.jpg', 1, '2024-09-29 23:33:35', '2024-10-29 02:24:25'),
(11, 'BlackBerry', 'brands/Zq3gUQdMCronN4IBMX809sKKocgbn8htVeG3KGIP.png', 1, '2024-09-29 23:33:51', '2024-09-29 23:33:51'),
(12, 'Nike.', 'brands/MZNZS8nqrnnRS8VkeKRKlONI8iE022imXDAoyenW.png', 1, '2024-09-29 23:34:46', '2024-09-30 00:05:30'),
(13, 'Reebok', 'brands/0bp0UTqE3cr2RHNfXClHhILUgnPdCwy6Q2bmrg9s.png', 1, '2024-09-29 23:35:34', '2024-09-29 23:35:34'),
(14, 'Puma', 'brands/imAN1ikwzCupDlWALz09EZ8AsnkfuQtGzHRnturi.png', 1, '2024-09-29 23:42:06', '2024-09-30 00:50:12'),
(15, 'Zara', 'brands/fGrM9wlC1gt7Rsu340Ymms90Q2PCbpDvC8pGcDFJ.jpg', 1, '2024-09-29 23:42:23', '2024-09-29 23:42:23'),
(18, 'Gucci', 'brands/5giEyaaulV1P6sRbyTmhNxUs3JKLjAXJJxhUyPZa.jpg', 1, '2024-10-05 11:58:00', '2024-10-05 11:58:00'),
(19, 'Mufti', 'brands/2kUJfFLQKtyHRK3ym7TTEy3NCUrU27JCINmVcEip.png', 1, '2024-10-05 11:59:43', '2024-10-05 11:59:43'),
(20, 'US Polo', 'brands/PcH4uoTbQiERvakhY0Nus2f5KxXRu3aFcIWgnVqq.jpg', 1, '2024-10-05 12:03:47', '2024-10-05 12:03:47'),
(21, 'Tommy Hilfiger', 'brands/IRIPqiC305Tm0RzKDpoFMP0miTIOWpozxzpULT0K.jpg', 1, '2024-10-05 12:04:42', '2024-10-05 12:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `qty`, `total`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(47, 6, 5400, 3, 40, '2024-10-29 06:53:04', '2024-10-29 06:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderStatus` varchar(100) DEFAULT 'Order is Placed',
  `paymentMode` varchar(15) DEFAULT 'COD',
  `paymentStatus` varchar(10) DEFAULT 'Pending',
  `subtotal` int(11) NOT NULL,
  `shipping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `orderStatus`, `paymentMode`, `paymentStatus`, `subtotal`, `shipping`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:05:20', '2024-10-28 02:05:20'),
(2, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:09:02', '2024-10-28 02:09:02'),
(3, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:11:54', '2024-10-28 02:11:54'),
(4, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:12:55', '2024-10-28 02:12:55'),
(5, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:20:49', '2024-10-28 02:20:49'),
(6, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:20:57', '2024-10-28 02:20:57'),
(7, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:30:29', '2024-10-28 02:30:29'),
(8, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:36:34', '2024-10-28 02:36:34'),
(9, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:40:26', '2024-10-28 02:40:26'),
(10, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:42:43', '2024-10-28 02:42:43'),
(11, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:44:41', '2024-10-28 02:44:41'),
(12, 'Order is Placed', 'COD', 'Pending', 0, 0, 0, 3, '2024-10-28 02:46:02', '2024-10-28 02:46:02'),
(13, 'Order is Placed', 'Net Banking', 'Pending', 0, 0, 0, 3, '2024-10-29 06:42:40', '2024-10-29 06:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_products`
--

CREATE TABLE `checkout_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `checkout_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkout_products`
--

INSERT INTO `checkout_products` (`id`, `qty`, `total`, `checkout_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 5, 40, '2024-10-28 02:20:49', '2024-10-28 02:20:49'),
(2, NULL, NULL, 5, 39, '2024-10-28 02:20:49', '2024-10-28 02:20:49'),
(3, NULL, NULL, 8, 42, '2024-10-28 02:36:34', '2024-10-28 02:36:34'),
(4, 1, 726, 9, 42, '2024-10-28 02:40:26', '2024-10-28 02:40:26'),
(5, 2, 1250, 10, 38, '2024-10-28 02:42:43', '2024-10-28 02:42:43'),
(6, 2, 1574, 11, 41, '2024-10-28 02:44:41', '2024-10-28 02:44:41'),
(7, 6, 5400, 12, 40, '2024-10-28 02:46:02', '2024-10-28 02:46:02'),
(8, 4, 3000, 13, 43, '2024-10-29 06:42:40', '2024-10-29 06:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Suhail Akhtar', 'suhailakhtar@123gmail.com', '8750083134', 'hello how are you', 'hdhdghg', 1, '2024-10-29 01:47:09', '2024-10-29 01:47:09'),
(2, 'Suhail Akhtar', 'suhailakhtar@123gmail.com', '8750083134', 'hello how are you', 'hdhdghg', 1, '2024-10-29 01:56:43', '2024-10-29 01:56:43'),
(3, 'Suhail Akhtar', 'suhailakhtar@123gmail.com', '8750083134', 'hello how are you', 'hdhdghg', 1, '2024-10-29 01:58:11', '2024-10-29 01:58:11'),
(4, 'Suhail Akhtar', 'suhailakhtar@123gmail.com', '8750083134', 'hello how are you', 'hdhdghg', 1, '2024-10-29 02:00:13', '2024-10-29 02:00:13'),
(5, 'Suhail Akhtar', 'suhailakhtar@123gmail.com', '8750083134', 'hello how are you', 'hdhdghg', 1, '2024-10-29 02:00:41', '2024-10-29 02:00:41'),
(6, 'Suhail Akhtar', 'suhailakhtar@123gmail.com', '8750083134', 'hello how are you', 'hdhdghg', 1, '2024-10-29 02:06:31', '2024-10-29 02:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maincategories`
--

CREATE TABLE `maincategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maincategories`
--

INSERT INTO `maincategories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(6, 'Male', 1, '2024-10-05 12:06:04', '2024-10-05 12:06:04'),
(7, 'Female', 1, '2024-10-05 12:06:24', '2024-10-05 12:06:24'),
(8, 'Kids', 1, '2024-10-08 05:25:02', '2024-10-08 05:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2024_09_26_125523_create_subcategories_table', 3),
(13, '2024_09_26_125554_create_brands_table', 3),
(14, '2024_09_25_073028_create_maincategories_table', 4),
(15, '2024_09_26_125625_create_products_table', 4),
(16, '2024_09_26_125644_create_testimonials_table', 4),
(17, '2024_09_26_131755_create_product_images_table', 4),
(18, '2024_10_21_170928_create_carts_table', 5),
(22, '2024_10_21_170953_create_wishlists_table', 6),
(23, '2024_10_21_171013_create_checkouts_table', 6),
(24, '2024_10_21_171032_create_checkout_products_table', 6),
(25, '2024_10_28_073825_create_checkout_products_table', 7),
(26, '2024_10_28_092031_create_newsletters_table', 8),
(27, '2024_10_28_092121_create_contacts_table', 8),
(28, '2024_10_29_091927_add_column_to_newsletters', 9);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`, `active`) VALUES
(1, 'suhailakhtar@123gmail.com', '2024-10-28 23:24:04', '2024-10-29 04:13:01', 1),
(2, 'suhailakhtar@12gmail.com', '2024-10-29 00:33:25', '2024-10-29 04:15:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(30) NOT NULL,
  `size` varchar(10) NOT NULL,
  `basePrice` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `finalPrice` int(11) NOT NULL,
  `stock` tinyint(1) DEFAULT 1,
  `StockQuantity` int(11) DEFAULT NULL,
  `description` text DEFAULT '',
  `maincategory_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `color`, `size`, `basePrice`, `discount`, `finalPrice`, `stock`, `StockQuantity`, `description`, `maincategory_id`, `subcategory_id`, `brand_id`, `created_at`, `updated_at`, `active`) VALUES
(27, 'Male Shirt Tommy Hilfiger', 'Green Check', '50', 4500, 90, 450, 1, 50, 'Tommy Hilfiger offers many men\'s shirts, including casual and dress styles. Popular options include their regular fit Oxford shirts, often priced between Rs2500 and Rs1800 after discounts, and slim-fit poplin shirts, ideal for casual and dressy occasions. You can find long-sleeve and short-sleeve designs, and colors range from classic whites and blues to vibrant reds, greens, and multi-color patterns. Price ranges typically fall between Rs3000 to Rs5500, depending on the material and style', 6, 12, 21, '2024-10-05 12:22:59', '2024-10-05 13:02:24', 1),
(28, 'Male T-shirt Adidas', 'Black', '36', 1200, 50, 600, 1, 10, 'Tommy Hilfiger offers a variety of stylish men\'s shirts, including casual, business, and dress options. Some key styles include\r\nAvailable in a range of colors, including classic blue, white, black, red, and navy, Tommy Hilfiger\'s shirts are designed for everyday wear and formal occasions alike​(', 6, 10, 10, '2024-10-05 12:29:04', '2024-10-09 02:31:44', 1),
(29, 'Male Jeans Slim Fit', 'Black', '40', 5500, 20, 4400, 1, 20, 'Designed for the modern man, these slim-fit jeans offer a sleek and stylish silhouette without compromising on comfort. Crafted from high-quality, durable denim with just the right amount of stretch, they provide a tailored fit that moves with you throughout the day. Featuring a mid-rise waist, classic five-pocket design, and a variety of washes, these jeans are perfect for both casual outings and dressed-up occasions. The slim fit tapers through the legs, giving a sharp, polished look that pairs effortlessly with t-shirts, shirts, and jackets.', 6, 9, 13, '2024-10-05 12:34:52', '2024-10-05 12:52:59', 1),
(30, 'Male Trouser Polo', 'Black', '30', 4500, 45, 2475, 1, 10, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 6, 11, 20, '2024-10-05 12:40:27', '2024-10-09 02:30:16', 1),
(31, 'Female Jeans Slim Fit', 'Black', '36', 4500, 45, 2475, 1, 10, 'Slim-fit jeans for women offer a sleek and modern silhouette, designed to hug the body from the waist to the ankle for a flattering, streamlined look. Crafted from a soft, stretchable fabric blend, these jeans provide both comfort and flexibility, perfect for everyday wear. Their versatile design pairs effortlessly with any outfit, whether you\'re dressing up for a night out or keeping it casual. With various washes and finishes, these slim-fit jeans are the ultimate wardrobe staple, offering timeless style with a contemporary edge.', 7, 12, 19, '2024-10-05 13:16:31', '2024-10-05 13:16:31', 1),
(32, 'Female Shirt Gucci', 'Blue', '30', 1500, 40, 900, 1, 10, 'Gucci offers a wide range of luxurious and stylish female shirts. Are you looking for a specific type, like a casual blouse, formal wear, or a statement piece? Let me know if you need any fashion advice or details on particular styles!', 7, 12, 18, '2024-10-06 03:21:36', '2024-10-08 12:46:08', 1),
(34, 'Kids Tshirt Tommy Hilfiger', 'Red', '20', 1050, 25, 787, 1, 19, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 8, 12, 21, '2024-10-06 04:45:22', '2024-10-27 03:15:22', 1),
(35, 'Kids Tshirt Polo', 'light Grey', '30', 3500, 25, 2625, 1, 15, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 8, 10, 20, '2024-10-06 04:48:44', '2024-10-27 03:15:22', 1),
(36, 'Iron Man Tshirt Male', 'Black', '20', 4500, 25, 3375, 1, 25, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 6, 10, 13, '2024-10-06 05:00:30', '2024-10-08 12:06:10', 1),
(37, 'Male Shirt Gucci', 'Blue', '28', 1500, 50, 750, 1, 15, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 6, 12, 18, '2024-10-06 05:02:49', '2024-10-09 02:14:43', 1),
(38, 'Female Jeans US Polo', 'Green Check', '30', 1250, 50, 625, 1, 28, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 7, 9, 20, '2024-10-06 05:04:30', '2024-10-28 02:42:43', 1),
(39, 'Female Shirt Zara', 'Blue', '35', 1260, 25, 945, 0, 0, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 7, 12, 15, '2024-10-06 05:06:01', '2024-10-28 02:20:49', 1),
(40, 'Male Jacket  Zara', 'Grey', '40', 1200, 25, 900, 1, 10, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 6, 13, 15, '2024-10-06 05:09:19', '2024-10-28 02:46:02', 1),
(41, 'Kids T-Shirt For mufti', 'Green Check', '20', 1050, 25, 787, 1, 23, 'Trousers are worn on the hips or waist and are often held up by buttons, elastic, a belt or suspenders (braces). Unless elastic, and especially for men, trousers usually provide a zippered or buttoned fly. Jeans usually feature side and rear pockets with pocket openings placed slightly below the waist band.', 8, 10, 19, '2024-10-06 05:10:47', '2024-10-28 02:44:41', 1),
(42, 'Kids Shirt Zara', 'Green Check', '20', 1320, 45, 726, 1, 4, 'Are you looking for specific types or brands of kids\' t-shirts, or would you like general recommendations. Let me know if you\'re interested in any particular styles, designs, or sizes.', 8, 12, 14, '2024-10-08 12:31:46', '2024-10-28 02:40:26', 1),
(43, 'Female Shirt Reebok', 'Black', '35', 1000, 25, 750, 1, 6, 'Are you looking for specific types or brands of kids\' t-shirts, or would you like general recommendations. Let me know if you\'re interested in any particular styles, designs, or sizes.', 7, 12, 13, '2024-10-09 02:01:25', '2024-10-29 06:42:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `product_id`, `active`, `created_at`, `updated_at`) VALUES
(62, 'products/lH74AsnEPkRkItnp1nujCKS93ZHO3bopdsrHYxeO.jpg', 27, 1, '2024-10-05 12:22:59', '2024-10-05 12:22:59'),
(63, 'products/SsVgq4rGTbIkcZYoKW3hGVdUSVpmjFrqgEEBKYNS.jpg', 27, 1, '2024-10-05 12:22:59', '2024-10-05 12:22:59'),
(64, 'products/roKTdjDrNRPY8o7VbLlZcYkESlWdjfpRzjgnSQov.jpg', 27, 1, '2024-10-05 12:22:59', '2024-10-05 12:22:59'),
(65, 'products/8CLcWUuru6GOlqOJ1ZCNgjBjy57dA2ZZygwPH3uW.jpg', 27, 1, '2024-10-05 12:22:59', '2024-10-05 12:22:59'),
(66, 'products/a0p6fP8vxugN3P4MxLcWN1tbef3WnzKRNUvc257J.jpg', 28, 1, '2024-10-05 12:29:04', '2024-10-05 12:29:04'),
(67, 'products/5BDRO25gJqTGTyIjl8pzIrmabG2JcfFoUBNwdOuP.jpg', 28, 1, '2024-10-05 12:29:04', '2024-10-05 12:29:04'),
(68, 'products/lxw5X3TEVYe7JJGbUapeavBLoRgaHA1aQYT4RKkQ.jpg', 28, 1, '2024-10-05 12:29:04', '2024-10-05 12:29:04'),
(69, 'products/LsT5oUG1r96HpkKTwCllOxJgtlaPGyVTP871SStK.jpg', 28, 1, '2024-10-05 12:29:04', '2024-10-05 12:29:04'),
(70, 'products/PrFooxGfVOxTLIsNSlbd5h4J3sqWZ7yEWZ3Gmqx3.jpg', 29, 1, '2024-10-05 12:34:52', '2024-10-05 12:34:52'),
(71, 'products/5ndzzCSoPX2U4kBDOUzLXkJgfIxCAD4fOSn0iFMD.jpg', 29, 1, '2024-10-05 12:34:52', '2024-10-05 12:34:52'),
(72, 'products/dPEshhTgQxWDJiFKjh9VTQc8uCLCxI1SwBHim69x.jpg', 29, 1, '2024-10-05 12:34:52', '2024-10-05 12:34:52'),
(73, 'products/6KeUEEVgCplbQaP6ojtWOaeBhbwke5PU7pDOJidz.jpg', 29, 1, '2024-10-05 12:34:52', '2024-10-05 12:34:52'),
(74, 'products/3Z6fC5F6fTiPV6ByjWisT5GbkaoAuQuEsgOb4usp.jpg', 30, 1, '2024-10-05 12:40:27', '2024-10-05 12:40:27'),
(75, 'products/u3Ny5bpjIIOxTYyEKUiuwpjklg0AWMFyNT1eSeZF.jpg', 30, 1, '2024-10-05 12:40:27', '2024-10-05 12:40:27'),
(76, 'products/wzHWGh7q0G7GefKSZCDAp3DT0eVNFIFuv9APHsPB.jpg', 30, 1, '2024-10-05 12:40:27', '2024-10-05 12:40:27'),
(77, 'products/bHyyR7CHD2bsOzNCW1qnDpNVAy4gFaa2QZOVKxtP.jpg', 30, 1, '2024-10-05 12:40:27', '2024-10-05 12:40:27'),
(78, 'products/QpYpyk4yEA536FZ7K8jB1DKGyMKO14Thkt6hhtrK.jpg', 31, 1, '2024-10-05 13:16:31', '2024-10-05 13:16:31'),
(79, 'products/kueyxvhU4sIR5iLhopCn9k2J9hRstRgeUwsM60No.jpg', 31, 1, '2024-10-05 13:16:31', '2024-10-05 13:16:31'),
(80, 'products/QJImxpBi2buDzOwbuT4mjPg4a0fsqlcTgF0zndoD.jpg', 31, 1, '2024-10-05 13:16:31', '2024-10-05 13:16:31'),
(81, 'products/R1Izkv85UuyDG3NBXUm3uDW7h6C8SfU6Z85BOvg7.jpg', 31, 1, '2024-10-05 13:16:31', '2024-10-05 13:16:31'),
(102, 'products/jOKg52SBgYw5UZkGbdVUWIDe4IxRNMOcO6vQOpKe.jpg', 36, 1, '2024-10-06 05:00:30', '2024-10-06 05:00:30'),
(103, 'products/FUhTIZgNNU7YQq6g05CyBJeFXToOS8pps3G0Liuj.jpg', 36, 1, '2024-10-06 05:00:30', '2024-10-06 05:00:30'),
(105, 'products/UWzBpVpqZeyV8tHJwOC7cySVTb2e9kJoC8s48DvC.jpg', 36, 1, '2024-10-06 05:00:30', '2024-10-06 05:00:30'),
(106, 'products/ZpYtMeUAFlEGBzQKv1r44G0b4IWnOlocrKNENpdG.jpg', 37, 1, '2024-10-06 05:02:49', '2024-10-06 05:02:49'),
(129, 'products/KmB6j0JqjlkLVP2uMtGAND64oa92JPUhrR2F2ctt.jpg', 41, 1, '2024-10-08 12:11:01', '2024-10-08 12:11:01'),
(130, 'products/Du1Zi3WFFDVk0uKjmpOrLFV8Er7D8bjWAqUMnHQa.jpg', 41, 1, '2024-10-08 12:11:01', '2024-10-08 12:11:01'),
(131, 'products/9lDIs7tRw3N2M1wgIstzSrvO3A3mo3T47hmQJH1y.jpg', 41, 1, '2024-10-08 12:11:01', '2024-10-08 12:11:01'),
(132, 'products/USPUjnrfW8pfT64GBe2hPXy61rFuAnoqIEeTGOyv.jpg', 41, 1, '2024-10-08 12:11:01', '2024-10-08 12:11:01'),
(133, 'products/GjPQf0txphlzQ1eMR12m0sfycfVech0ivudMTvNs.jpg', 35, 1, '2024-10-08 12:14:42', '2024-10-08 12:14:42'),
(134, 'products/ZJ1sQ09xb5ICrGjlH8sN1altgIWLwSE8htpVJFoK.jpg', 35, 1, '2024-10-08 12:14:42', '2024-10-08 12:14:42'),
(135, 'products/B89nLCS9GCnsOSstOsdgpdDW8f7W3oPD8weqsbeh.jpg', 35, 1, '2024-10-08 12:14:42', '2024-10-08 12:14:42'),
(136, 'products/QnFMlKUcwTE3wKG8KkqCPDvra05Dy8nc8O8ZehZ3.jpg', 35, 1, '2024-10-08 12:14:42', '2024-10-08 12:14:42'),
(142, 'products/Si1qBucmZk0V4QiXhmKR0eTy8chEy9nRaEYmG9V2.jpg', 34, 1, '2024-10-08 12:19:36', '2024-10-08 12:19:36'),
(143, 'products/qrYI8vISuNuScfbRgPXffxDgmyOYu9bdRPu6nflM.jpg', 34, 1, '2024-10-08 12:19:36', '2024-10-08 12:19:36'),
(144, 'products/SPlkPel0WZTfjhEssG9iB1jHLbop8Tl4xrclQtux.jpg', 34, 1, '2024-10-08 12:19:36', '2024-10-08 12:19:36'),
(145, 'products/h021hiWInbgL11EimdHoPnbP5zsopaC9q8JKLPlY.jpg', 34, 1, '2024-10-08 12:27:40', '2024-10-08 12:27:40'),
(147, 'products/Gp8HyKbK6edMaVhjwEsZOynJsYs7rvBkmAKoJbVG.jpg', 42, 1, '2024-10-08 12:33:26', '2024-10-08 12:33:26'),
(148, 'products/PpE9jtdIwaHKagWqgxokfHprv6NcfyjgRN20xPkv.jpg', 32, 1, '2024-10-08 12:38:17', '2024-10-08 12:38:17'),
(149, 'products/urzCVBpLPxxwG4ZhsYtUQ7jjj998gF8xRujOufvo.jpg', 32, 1, '2024-10-08 12:38:17', '2024-10-08 12:38:17'),
(150, 'products/OTLBFbZ08SWIAxAGhVc9ZHBwDYQpa42VcEoQWHdx.jpg', 32, 1, '2024-10-08 12:38:17', '2024-10-08 12:38:17'),
(151, 'products/VblVElhP0l2ae7SxILBm3dVB4b7jUfulwOOgbCMD.jpg', 32, 1, '2024-10-08 12:38:17', '2024-10-08 12:38:17'),
(152, 'products/SSOcYGMcjcZGQXwU8aQctDISfZt9swkKxfKPRTjl.jpg', 39, 1, '2024-10-08 12:39:21', '2024-10-08 12:39:21'),
(153, 'products/W3VLFgIrGXSnIL9HZpyR2pmPOjIVhoilxY7puK0E.jpg', 39, 1, '2024-10-08 12:39:21', '2024-10-08 12:39:21'),
(154, 'products/nOijBU6iFIPKY3lJDjaXtxde61pfzEzU05AzvaMy.jpg', 39, 1, '2024-10-08 12:39:21', '2024-10-08 12:39:21'),
(155, 'products/4H9HbLHrQM2w5RHzNBGizUt3d6jywthNt0Hw7EkJ.jpg', 39, 1, '2024-10-08 12:39:21', '2024-10-08 12:39:21'),
(156, 'products/cdm4hq1vhtsrTpXW2D7MtXUooNKN3rJzgyI65rf7.jpg', 38, 1, '2024-10-08 12:41:27', '2024-10-08 12:41:27'),
(157, 'products/bYeULTnDeO9OSRbOjVaTWE0f02LLg7zxfpscSj8a.jpg', 38, 1, '2024-10-08 12:41:27', '2024-10-08 12:41:27'),
(158, 'products/4myk44IcQHgEYGuYK0EtNNfYERiM7U3PUa7VEr12.jpg', 38, 1, '2024-10-08 12:41:27', '2024-10-08 12:41:27'),
(159, 'products/4jLQz1DRUmAHMXMjveBxv5S8NFZi6q1frXaM5fiW.jpg', 38, 1, '2024-10-08 12:41:27', '2024-10-08 12:41:27'),
(162, 'products/CvhtBt3nIb5p1mz59shEcG24gcSI13AhTawbuAv3.jpg', 43, 1, '2024-10-09 02:03:45', '2024-10-09 02:03:45'),
(163, 'products/ATCxODtg0TtfLtiMldRZAVPB0UJWVITm1bGIVVoz.jpg', 43, 1, '2024-10-09 02:10:31', '2024-10-09 02:10:31'),
(164, 'products/b5kVhQ2QbCSEOLmU9qIaKQ4r6N7UlVJvRLQGEn5Q.jpg', 40, 1, '2024-10-09 02:19:23', '2024-10-09 02:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(9, 'Jeans', 1, '2024-10-05 11:53:58', '2024-10-05 11:53:58'),
(10, 'T-shirt', 1, '2024-10-05 11:54:21', '2024-10-05 11:54:21'),
(11, 'Trouser', 1, '2024-10-05 11:54:31', '2024-10-05 11:54:31'),
(12, 'Shirt', 1, '2024-10-05 11:54:43', '2024-10-05 11:54:43'),
(13, 'jacket', 1, '2024-10-09 02:21:08', '2024-10-09 02:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `message`, `pic`, `active`, `created_at`, `updated_at`) VALUES
(3, 'Suhail Akhtar', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable', 'testimonials/DuHJxGrkqBCH6Hui1iB12rmsZLFQFuh6Ekbl8Exx.png', 1, '2024-10-06 09:55:13', '2024-10-07 11:48:42'),
(4, 'Shamim Akhtar', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable', 'testimonials/atUdspuBQnJlv5xhkfNVRLZ8vynovuDsHG5UtWeX.jpg', 1, '2024-10-07 06:42:50', '2024-10-08 04:09:26'),
(5, 'Afsar Hayat', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable', 'testimonials/7D2el64IUHnWG19IoEa1gXBcorJEghU9WidgPzru.jpg', 1, '2024-10-07 11:49:33', '2024-10-07 11:49:33'),
(6, 'Suraj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'testimonials/HR30nqDOmmZiNMbc2IIdhhrmwP30fZrmh8yFhR9g.jpg', 1, '2024-10-07 12:04:39', '2024-10-07 12:04:39'),
(7, 'Deepak Singh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'testimonials/uQMEZ7b5XsNkpDZkX4SrpARCja9wy8O3TBlsb3IK.jpg', 1, '2024-10-07 12:13:36', '2024-10-07 12:13:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `role` varchar(10) DEFAULT 'Buyer',
  `address` varchar(100) DEFAULT '',
  `pin` varchar(10) DEFAULT '',
  `city` varchar(50) DEFAULT '',
  `state` varchar(50) DEFAULT '',
  `pic` varchar(100) DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `address`, `pin`, `city`, `state`, `pic`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Suhail Akhtar', 'suhailakhtar@123gmail.com', NULL, 'Buyer', '', '', '', '', '', NULL, '$2y$12$rfgPSn5StX1QFiMwHnQc/.e.njdCL4KDCc.FyLaMPxmz37fKjGCQO', NULL, '2024-09-20 10:29:31', '2024-09-20 10:29:31'),
(2, 'Suhail Akhtar', 'suhailakhtar123@gmail.com', NULL, 'Buyer', '', '', '', '', '', NULL, '$2y$12$jUBGL9nj4bUitLoxrsSt9eWPtawzQiZYxi2O0Qpron.qvfgi8relG', NULL, '2024-09-24 09:45:13', '2024-09-24 09:45:13'),
(3, 'suhail akhtar', 'suhailakhtar12@gmail.com', '8750083134', 'Buyer', 'Noida Sector 15', '201301', 'Noida', 'UP', 'users/ZxgKb9Ayxz0uLjFDCFeJ6xhsJa60bv0hCiUCLsda.jpg', NULL, '$2y$12$Tg8jh3QtBfvaKPTsMknujuVprtULLRWz04J69xhu.eNey2PODjQ6e', NULL, '2024-09-24 10:30:05', '2024-10-21 03:08:03');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_index` (`user_id`),
  ADD KEY `carts_product_id_index` (`product_id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_user_id_index` (`user_id`);

--
-- Indexes for table `checkout_products`
--
ALTER TABLE `checkout_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkout_products_checkout_id_index` (`checkout_id`),
  ADD KEY `checkout_products_product_id_index` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `maincategories`
--
ALTER TABLE `maincategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maincategories_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`) USING HASH;

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_maincategory_id_index` (`maincategory_id`),
  ADD KEY `products_subcategory_id_index` (`subcategory_id`),
  ADD KEY `products_brand_id_index` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_index` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_name_unique` (`name`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_index` (`user_id`),
  ADD KEY `wishlists_product_id_index` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `checkout_products`
--
ALTER TABLE `checkout_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maincategories`
--
ALTER TABLE `maincategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkout_products`
--
ALTER TABLE `checkout_products`
  ADD CONSTRAINT `checkout_products_checkout_id_foreign` FOREIGN KEY (`checkout_id`) REFERENCES `checkouts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checkout_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_maincategory_id_foreign` FOREIGN KEY (`maincategory_id`) REFERENCES `maincategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
