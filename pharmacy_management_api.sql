-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 12:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_management_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Sabbir', 'sabbir@gmail.com', '01953321402', 'Dhaka, BD', '2024-05-14 23:21:13', '2024-05-14 23:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `default_settings`
--

CREATE TABLE `default_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_email` varchar(255) NOT NULL,
  `app_phone` varchar(255) NOT NULL,
  `app_address` text NOT NULL,
  `app_currency` varchar(255) NOT NULL,
  `app_currency_symbol` varchar(255) NOT NULL,
  `app_timezone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `default_settings`
--

INSERT INTO `default_settings` (`id`, `app_name`, `app_email`, `app_phone`, `app_address`, `app_currency`, `app_currency_symbol`, `app_timezone`, `created_at`, `updated_at`) VALUES
(1, 'Pharmacy', 'info@email.com', '1234567890', '123, Street Name, City Name, Country Name', 'BDT', '৳', 'Asia/Dhaka', '2024-05-14 23:01:58', '2024-05-14 23:01:58');

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
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `power_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `rack_id` int(11) NOT NULL,
  `purchases_quantity` double(8,2) NOT NULL DEFAULT 0.00,
  `sales_quantity` double(8,2) NOT NULL DEFAULT 0.00,
  `purchases_price` double(8,2) NOT NULL DEFAULT 0.00,
  `sales_price` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `supplier_id`, `type_id`, `name`, `power_id`, `unit_id`, `rack_id`, `purchases_quantity`, `sales_quantity`, `purchases_price`, `sales_price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Napa', 1, 1, 1, 0.00, 0.00, 10.00, 12.00, '2024-05-14 23:08:44', '2024-05-14 23:08:44'),
(2, 2, 1, 'Napa Extend', 2, 2, 1, 0.00, 0.00, 21.00, 24.00, '2024-05-14 23:10:13', '2024-05-14 23:10:13'),
(3, 2, 2, 'Napa', 3, 3, 1, 0.00, 0.00, 31.00, 35.00, '2024-05-14 23:12:20', '2024-05-14 23:12:20'),
(4, 3, 1, 'Pantonix 20', 4, 4, 1, 0.00, 0.00, 88.00, 98.00, '2024-05-14 23:14:03', '2024-05-14 23:14:03'),
(5, 3, 1, 'Disopan 2', 5, 1, 1, 0.00, 0.00, 112.00, 125.00, '2024-05-14 23:15:03', '2024-05-14 23:15:03'),
(6, 1, 1, 'Indever 10', 6, 5, 1, 5.00, 5.00, 9.00, 10.00, '2024-05-14 23:17:30', '2024-05-14 23:45:44'),
(7, 1, 3, 'Hexisol 500', 7, 6, 1, 2.00, 2.00, 195.00, 215.00, '2024-05-14 23:19:29', '2024-05-14 23:45:44');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_11_171619_create_suppliers_table', 1),
(6, '2023_09_16_064932_create_powers_table', 1),
(7, '2023_09_16_064939_create_types_table', 1),
(8, '2023_09_16_065009_create_units_table', 1),
(9, '2023_09_16_112012_create_racks_table', 1),
(10, '2023_09_16_113114_create_medicines_table', 1),
(11, '2023_09_16_113348_create_customers_table', 1),
(12, '2023_09_19_061239_create_purchases_summeries_table', 1),
(13, '2023_09_19_061305_create_purchases_details_table', 1),
(14, '2023_09_19_061315_create_sales_summeries_table', 1),
(15, '2023_09_19_061323_create_sales_details_table', 1),
(16, '2024_05_14_101202_create_default_settings_table', 1);

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
-- Table structure for table `powers`
--

CREATE TABLE `powers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `powers`
--

INSERT INTO `powers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '500mg', '2024-05-14 23:07:31', '2024-05-14 23:07:31'),
(2, '665mg', '2024-05-14 23:09:19', '2024-05-14 23:09:19'),
(3, '120mg/5ml', '2024-05-14 23:11:45', '2024-05-14 23:11:45'),
(4, '20mg', '2024-05-14 23:13:15', '2024-05-14 23:13:15'),
(5, '2mg', '2024-05-14 23:14:32', '2024-05-14 23:14:32'),
(6, '10mg', '2024-05-14 23:16:46', '2024-05-14 23:16:46'),
(7, '500ml', '2024-05-14 23:18:46', '2024-05-14 23:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_details`
--

CREATE TABLE `purchases_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchases_summery_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `purchases_quantity` int(11) NOT NULL DEFAULT 0,
  `purchases_price` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases_details`
--

INSERT INTO `purchases_details` (`id`, `purchases_summery_id`, `medicine_id`, `purchases_quantity`, `purchases_price`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 5, 9.00, '2024-05-14 23:20:33', '2024-05-14 23:20:33'),
(2, 1, 7, 2, 195.00, '2024-05-14 23:20:33', '2024-05-14 23:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_summeries`
--

CREATE TABLE `purchases_summeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchases_invoice_no` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `grand_total` double(8,2) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases_summeries`
--

INSERT INTO `purchases_summeries` (`id`, `purchases_invoice_no`, `supplier_id`, `sub_total`, `discount`, `grand_total`, `payment_status`, `payment_amount`, `created_at`, `updated_at`) VALUES
(1, 'PI-1', 1, 435.00, 10.00, 425.00, 'Paid', 425.00, '2024-05-14 23:20:33', '2024-05-14 23:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'R1', '2024-05-14 23:07:59', '2024-05-14 23:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_summery_id` bigint(20) UNSIGNED NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `sales_quantity` int(11) NOT NULL DEFAULT 0,
  `sales_price` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`id`, `sales_summery_id`, `medicine_id`, `sales_quantity`, `sales_price`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 5, 10.00, '2024-05-14 23:45:44', '2024-05-14 23:45:44'),
(2, 1, 7, 2, 215.00, '2024-05-14 23:45:44', '2024-05-14 23:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `sales_summeries`
--

CREATE TABLE `sales_summeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_invoice_no` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `grand_total` double(8,2) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_summeries`
--

INSERT INTO `sales_summeries` (`id`, `sales_invoice_no`, `customer_id`, `sub_total`, `discount`, `grand_total`, `payment_status`, `payment_amount`, `created_at`, `updated_at`) VALUES
(1, 'SI-1', 1, 480.00, 0.00, 480.00, 'Unpaid', 0.00, '2024-05-14 23:45:44', '2024-05-14 23:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ACI Limited', 'supplier@gmail.com', '0123456789', 'Dhaka, BD', '2024-05-14 23:04:20', '2024-05-16 00:01:40'),
(2, 'Beximco Pharmaceuticals Ltd.', 'supplier@gmail.com', '0123456789', 'Dhaka, BD', '2024-05-14 23:04:40', '2024-05-14 23:06:45'),
(3, 'Incepta Pharmaceuticals Ltd.', 'supplier@gmail.com', '0123456789', 'Dhaka, BD', '2024-05-14 23:05:06', '2024-05-14 23:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', '2024-05-14 23:07:07', '2024-05-14 23:07:07'),
(2, 'Syrup', '2024-05-14 23:11:17', '2024-05-14 23:11:17'),
(3, 'Hand Rub', '2024-05-14 23:18:27', '2024-05-14 23:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `piece_in_unit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `piece_in_unit`, `created_at`, `updated_at`) VALUES
(1, '10 Tablets (1 Strip)', 10, '2024-05-14 23:07:49', '2024-05-14 23:07:49'),
(2, '12 Tablets (1 Strip)', 12, '2024-05-14 23:09:32', '2024-05-14 23:09:32'),
(3, '1 x 60ml bot', 1, '2024-05-14 23:11:56', '2024-05-14 23:11:56'),
(4, '14 Tablets (1 Strip)', 14, '2024-05-14 23:13:33', '2024-05-14 23:13:33'),
(5, '20 Tablets (1 Strip)', 20, '2024-05-14 23:17:00', '2024-05-14 23:17:00'),
(6, '1 x 500ml bot', 1, '2024-05-14 23:18:59', '2024-05-14 23:18:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@email.com', NULL, '$2y$10$zq7Clppyphjl8qc2AGW6vu0kNFjolnU47Qg5HLfiAqsj./9oKqG7i', NULL, '2024-05-14 23:01:58', '2024-05-14 23:01:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `default_settings`
--
ALTER TABLE `default_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `powers`
--
ALTER TABLE `powers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases_details`
--
ALTER TABLE `purchases_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_details_purchases_summery_id_foreign` (`purchases_summery_id`);

--
-- Indexes for table `purchases_summeries`
--
ALTER TABLE `purchases_summeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_details_sales_summery_id_foreign` (`sales_summery_id`);

--
-- Indexes for table `sales_summeries`
--
ALTER TABLE `sales_summeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `default_settings`
--
ALTER TABLE `default_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `powers`
--
ALTER TABLE `powers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchases_details`
--
ALTER TABLE `purchases_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchases_summeries`
--
ALTER TABLE `purchases_summeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_summeries`
--
ALTER TABLE `sales_summeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchases_details`
--
ALTER TABLE `purchases_details`
  ADD CONSTRAINT `purchases_details_purchases_summery_id_foreign` FOREIGN KEY (`purchases_summery_id`) REFERENCES `purchases_summeries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_sales_summery_id_foreign` FOREIGN KEY (`sales_summery_id`) REFERENCES `sales_summeries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
