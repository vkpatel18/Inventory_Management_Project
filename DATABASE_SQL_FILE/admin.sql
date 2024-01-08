-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 07:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'fruits', '2023-12-19 23:54:05', '2023-12-19 23:54:05'),
(4, 'mobiles', '2023-12-20 05:54:35', '2023-12-20 05:54:35'),
(5, 'vegitables', '2023-12-20 05:55:04', '2023-12-20 05:55:04'),
(6, 'cricket', '2023-12-20 05:55:56', '2023-12-20 05:55:56'),
(7, 'football', '2023-12-20 05:56:08', '2023-12-20 05:56:08'),
(8, 'electonics', '2023-12-20 06:43:46', '2023-12-20 06:43:46'),
(9, 'bhavik', '2023-12-20 23:22:17', '2023-12-20 23:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_11_29_100946_create_users_table', 1),
(5, '2023_11_30_064129_create_products_table', 2),
(6, '2023_12_05_095856_rename_product_text_in_products_table', 3),
(7, '2023_12_05_100213_rename_product_text_to_tax_in_products_table', 4),
(8, '2023_12_05_101625_update_product_text_column', 5),
(9, '2023_12_08_090329_create_products_table', 6),
(10, '2023_12_08_094620_create_products_table', 7),
(11, '2023_12_08_095439_create_products_table', 8),
(12, '2023_12_08_095627_create_products_table', 9),
(13, '2023_12_11_052302_create_taxes_table', 10),
(14, '2023_12_11_052315_create_units_table', 10),
(15, '2023_12_12_044653_create_units_table', 11),
(16, '2023_12_12_060707_create_stocks_table', 12),
(17, '2023_12_18_045342_create_products_table', 13),
(18, '2023_12_18_060808_create_products_table', 14),
(19, '2023_12_18_063247_create_suppliers_table', 15),
(20, '2023_12_19_055006_create_purchases_table', 16),
(21, '2023_12_20_045625_create_categories_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
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
  `name` varchar(191) NOT NULL,
  `sku` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `product_purchase_rate` decimal(10,2) NOT NULL,
  `tax_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hsn_code` varchar(191) NOT NULL,
  `type` varchar(191) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `description`, `product_purchase_rate`, `tax_id`, `unit_id`, `hsn_code`, `type`, `image`, `created_at`, `updated_at`) VALUES
(7, 'Dragonfruit', 'aa', 'aa', 32.00, 10, 7, '232323', '', NULL, NULL, NULL),
(8, 'Lime', 'aa', 'aa', 32.00, 10, 7, '232323', '', NULL, NULL, NULL),
(9, 'Kiwi', 'aa', 'aa', 32.00, 10, 7, '232323', '', NULL, NULL, NULL),
(10, 'Papaya', 'aa', 'aa', 32.00, 10, 7, '232323', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `product_id`, `category_id`, `supplier_id`, `cost_price`, `quantity`, `expiry_date`, `created_at`, `updated_at`) VALUES
(10, 8, 3, 6, 100.00, 1000, '2023-12-21', '2023-12-20 01:20:00', '2023-12-20 06:02:47'),
(12, 10, 5, 7, 1200.00, 780, '2023-12-20', '2023-12-20 06:00:37', '2023-12-20 06:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(5, 7, 76, 546.00, '2023-12-20 01:23:30', '2023-12-20 01:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `gst_number` varchar(191) NOT NULL,
  `pan_number` varchar(191) NOT NULL,
  `address` text NOT NULL,
  `credit_line` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `first_name`, `last_name`, `company_name`, `gst_number`, `pan_number`, `address`, `credit_line`, `created_at`, `updated_at`) VALUES
(5, 'rakesh bhai', 'parmar', 'dsfdsf', '4545435', '543545', '543543', 5345435.00, '2023-12-18 04:07:11', '2023-12-20 05:56:33'),
(6, 'raju bhai', 'modi', 'lll', 'lllllllll', 'llllllll', 'zzzzzzzzzzzzzz', 456.00, '2023-12-18 05:34:15', '2023-12-20 05:56:44'),
(7, 'mahesh bhai', 'joshi', 'cns tech', '344343', '2344243432', 'ahmedabad', 10.00, '2023-12-20 05:58:01', '2023-12-20 05:58:01'),
(8, 'raj bhai', 'sharma', 'bvm infotech', '24342434', '2344322334', 'vadodara', 11.00, '2023-12-20 05:59:43', '2023-12-20 05:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `rate` decimal(8,2) NOT NULL,
  `type` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `name`, `rate`, `type`, `created_at`, `updated_at`) VALUES
(10, 'on buyer', 435.00, 'fix_amount', '2023-12-11 05:44:36', '2023-12-11 06:10:53'),
(12, 'on seller', 546566.00, 'fix_amount', '2023-12-11 06:03:29', '2023-12-11 06:03:29'),
(13, 'on broker', 465.00, 'percentage', '2023-12-11 06:14:54', '2023-12-11 06:14:54'),
(14, 'on dealer', 543.00, 'percentage', '2023-12-11 06:16:00', '2023-12-11 06:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `description`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 'aaa', '5345', 345, 35345.00, '2023-12-11 23:59:01', '2023-12-12 00:06:37'),
(5, 'bbb', '5345', 345, 35345.00, '2023-12-11 23:59:01', '2023-12-15 05:12:36'),
(6, 'ccc', '5345', 345, 35345.00, '2023-12-11 23:59:01', '2023-12-15 05:13:31'),
(7, 'ddd', '5345', 345, 35345.00, '2023-12-11 23:59:01', '2023-12-12 00:06:37'),
(8, 'eee', '5345', 345, 35345.00, '2023-12-11 23:59:01', '2023-12-12 00:06:37'),
(9, 'fff', '5345', 345, 35345.00, '2023-12-11 23:59:01', '2023-12-12 00:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$o300/ZrKjO08WmHscEK9kuAqgURcvb3Icct4cmiM19HCLOf.FOmDO', '2023-11-29 04:48:53', '2023-11-29 04:48:53'),
(2, 'karan', 'karan@gmail.com', '$2y$12$5cL646NotDooeyi76wVRlOi.PYzeo7Q8t8vvkyAgkgbYFvUOleZ9i', '2023-11-29 05:34:38', '2023-11-29 05:34:38'),
(3, 'yash', 'yash@gmail.com', '$2y$12$IA1LhGlXZz9W9eIuLT9jK.hGyB6yhasAgvbCWOGqpRY2gBezaPQYC', '2023-11-29 05:46:51', '2023-11-29 05:46:51'),
(4, 'cns tech', 'cnstech@gmail.com', '$2y$12$rizrehsQkaB2104x/KHMi.zqTmCaCifJo14ay7fY0VxN/QlGbYwHm', '2023-11-29 05:49:07', '2023-11-29 05:49:07'),
(5, 'monik', 'monik@gmail.com', '$2y$12$rPszs8n8HmBEAg1PdU5BYe531QrW4uMUYInHoSr9a0Gp9DxMnguOa', '2023-11-30 22:38:18', '2023-11-30 22:38:18'),
(19, 'dsds', 'admin@gmail.com1', '$2y$12$2mygIQFKmwA8RSFRIu/.8OJQNOYBGQfWedEkqdz1IQrfWW9fhI3vK', '2023-12-04 02:04:19', '2023-12-04 02:04:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `products_tax_id_foreign` (`tax_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `taxes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
