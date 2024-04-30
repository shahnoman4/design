-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 01:39 PM
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
-- Database: `hitek_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', 'superadmin', NULL, '$2y$10$Zses5wxSoSmYX3CTW.fP0ucxX8vxAeGgnJFGWbZ3Qd1nnkM1mcToS', NULL, '2023-05-18 05:52:52', '2023-05-18 05:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `building_deatil`
--

CREATE TABLE `building_deatil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `location_detail` varchar(255) NOT NULL,
  `electricity_consunption` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `building_deatil`
--

INSERT INTO `building_deatil` (`id`, `building_name`, `location_detail`, `electricity_consunption`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Towers', 'any', '20', 'arabic.PNG', '2024-01-29 06:44:44', '2024-01-29 06:58:46', NULL),
(2, 'New building', 'new location', '50', 'adds.PNG', '2024-01-29 07:06:11', '2024-01-29 07:06:17', '2024-01-29 07:06:17'),
(3, 'New building', 'new location', '40', 'adds.PNG', '2024-01-29 07:06:45', '2024-01-29 07:06:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(44, '2014_10_12_000000_create_users_table', 1),
(45, '2014_10_12_100000_create_password_resets_table', 1),
(46, '2019_08_19_000000_create_failed_jobs_table', 1),
(47, '2020_07_24_184706_create_permission_tables', 1),
(48, '2020_09_12_043205_create_admins_table', 1),
(49, '2023_04_28_094125_create_customer_groups_table', 1),
(50, '2023_04_28_171159_create_customers_table', 1),
(51, '2023_05_01_092110_create_items_table', 1),
(52, '2023_05_01_092803_create_units_table', 1),
(53, '2023_05_03_065320_create_revenues_table', 1),
(54, '2023_05_03_071234_create_revenue_items_table', 1),
(55, '2023_05_06_093155_create_vessels_table', 1),
(56, '2023_05_06_093412_create_service_types_table', 1),
(57, '2023_05_14_062627_create_vessel_in_outs_table', 1),
(58, '2023_05_18_102220_create_taxes_table', 1),
(59, '2024_01_29_111154_create_building_deatil', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(2, 'dashboard.edit', 'admin', 'dashboard', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(3, 'admin.create', 'admin', 'admin', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(4, 'admin.view', 'admin', 'admin', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(5, 'admin.edit', 'admin', 'admin', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(6, 'admin.delete', 'admin', 'admin', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(7, 'admin.approve', 'admin', 'admin', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(8, 'role.create', 'admin', 'role', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(9, 'role.view', 'admin', 'role', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(10, 'role.edit', 'admin', 'role', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(11, 'role.delete', 'admin', 'role', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(12, 'role.approve', 'admin', 'role', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(13, 'profile.view', 'admin', 'profile', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(14, 'profile.edit', 'admin', 'profile', '2023-05-18 05:52:52', '2023-05-18 05:52:52'),
(15, 'vessel.create', 'admin', 'vessel', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(16, 'vessel.view', 'admin', 'vessel', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(17, 'vessel.edit', 'admin', 'vessel', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(18, 'vessel.delete', 'admin', 'vessel', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(19, 'unit.create', 'admin', 'unit', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(20, 'unit.view', 'admin', 'unit', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(21, 'unit.edit', 'admin', 'unit', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(22, 'unit.delete', 'admin', 'unit', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(23, 'serviceType.create', 'admin', 'serviceType', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(24, 'serviceType.view', 'admin', 'serviceType', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(25, 'serviceType.edit', 'admin', 'serviceType', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(26, 'serviceType.delete', 'admin', 'serviceType', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(27, 'indirect.quotation.view', 'admin', 'indirect revenue', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(28, 'indirect.invoice.view', 'admin', 'indirect revenue', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(29, 'indirect.revenue.create', 'admin', 'indirect revenue', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(30, 'indirect.revenue.detail', 'admin', 'indirect revenue', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(31, 'direct.quotation.view', 'admin', 'direct revenue', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(32, 'direct.invoice.view', 'admin', 'direct revenue', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(33, 'direct.revenue.create', 'admin', 'direct revenue', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(34, 'direct.revenue.detail', 'admin', 'direct revenue', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(35, 'item.create', 'admin', 'item', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(36, 'item.view', 'admin', 'item', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(37, 'item.edit', 'admin', 'item', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(38, 'item.delete', 'admin', 'item', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(39, 'customer.group.create', 'admin', 'customer group', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(40, 'customer.group.view', 'admin', 'customer group', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(41, 'customer.group.edit', 'admin', 'customer group', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(42, 'customer.group.delete', 'admin', 'customer group', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(43, 'customer.create', 'admin', 'customer', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(44, 'customer.view', 'admin', 'customer', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(45, 'customer.edit', 'admin', 'customer', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(46, 'customer.delete', 'admin', 'customer', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(47, 'tax.view', 'admin', 'tax', '2023-05-18 05:52:53', '2023-05-18 05:52:53'),
(48, 'tax.edit', 'admin', 'tax', '2023-05-18 05:52:53', '2023-05-18 05:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2023-05-18 05:52:52', '2023-05-18 05:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1);

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
(1, 'Maniruzzaman Akash', 'manirujjamanakash@gmail.com', NULL, '$2y$10$KhL9SVXOUg96TqMx.YpdBeO8A2U9rT1YYiafsr4bipY9yW8DfBWOq', NULL, '2023-05-18 05:52:52', '2023-05-18 05:52:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `building_deatil`
--
ALTER TABLE `building_deatil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `building_deatil`
--
ALTER TABLE `building_deatil`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
