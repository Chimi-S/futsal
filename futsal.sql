-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 07:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'chimi.507.thinley@gmail.com', '2021-12-27 12:28:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZJWnDYP0EA3jV6WWsA6xh669NGJ29cFh9WLfPyvcP6tCIfD29TmF0GsNXNGV', NULL, '202112311046FB_IMG_1640747717286.jpg', '2021-12-27 12:28:17', '2021-12-31 04:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `bank_account_details`
--

CREATE TABLE `bank_account_details` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_code_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_account_details`
--

INSERT INTO `bank_account_details` (`id`, `account_number`, `qr_code_photo_path`, `created_at`, `updated_at`) VALUES
('a9172ade-caf8-4ae5-990f-88621376e8ec', '201959117', '202112280850201959117.jpg[1].jpg', '2021-12-28 02:50:42', '2021-12-28 02:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_slot_id` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `date`, `time_slot_id`, `created_at`, `updated_at`) VALUES
('1874b825-68e1-4344-a8fb-11ee94490d83', 1, '2022-01-04', '11d2c108-95f2-4c1e-8166-ba185d032fdc', '2021-12-31 04:41:00', '2021-12-31 04:41:00'),
('1eccc266-0352-457e-9dfb-45898e3a22af', 1, '2022-01-01', '626a1856-0762-4717-bf96-2cfcb5333640', '2021-12-30 12:33:43', '2021-12-30 12:33:43'),
('346ec559-23d5-4e55-a05e-1124128d1e85', 1, '2022-01-06', '626a1856-0762-4717-bf96-2cfcb5333640', '2021-12-31 06:39:04', '2021-12-31 06:39:04'),
('46654cd7-5ca0-4fb1-b37b-f477e43f4a5d', 1, '2022-01-07', 'cbf3bf68-936c-4843-ab8b-2bbf407901f2', '2022-01-01 10:01:32', '2022-01-01 10:01:32'),
('65d21f28-fe7e-4c9d-acd8-0aed1cac71e6', 1, '2022-01-03', '626a1856-0762-4717-bf96-2cfcb5333640', '2021-12-31 06:36:51', '2021-12-31 06:36:51'),
('7800ce07-65a9-410e-911f-464416fa1b0d', 1, '2022-01-01', '0ba624c9-f5dd-40d9-a4b2-5bfa144d3bd6', '2022-01-01 06:49:51', '2022-01-01 06:49:51'),
('8a453efc-040c-457a-8474-6a0be97868f5', 1, '2021-12-31', '03df6664-4771-4378-80c6-012ef27988f1', '2021-12-30 12:30:58', '2021-12-30 12:30:58'),
('d53362bd-c78f-4552-87ec-dc0a92f8d6ca', 1, '2022-01-01', 'db43017d-ded7-45b7-82da-9c54e272760a', '2022-01-01 09:52:03', '2022-01-01 09:52:03');

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
(1, '2014_10_11_060840_time_slot', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_11_22_060956_create_pricing_table', 1),
(8, '2021_11_27_032512_create_sessions_table', 1),
(9, '2021_11_27_040532_create_admins_table', 1),
(10, '2021_12_27_173508_create_booking_table', 1),
(11, '2021_12_28_065003_create_bank_account_details', 2),
(12, '2021_12_30_164318_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('chimithinley@outlook.com', '$2y$10$0YNPw2CUsOmn3AtAEwgztOl6OybHjy9cd72cY8jQoQM/bZYOkYWvy', '2021-12-31 05:13:03');

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
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pricing` decimal(10,2) NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `pricing`, `time`, `type`, `created_at`, `updated_at`) VALUES
('090d350c-caeb-472b-a388-ccd4696a5e20', '1200.00', 'Before 5:00 PM', 'WEEKENDS', '2021-12-30 12:56:12', '2021-12-30 12:56:12'),
('5eef267f-c9da-4b65-bdb9-ed078a5c85cb', '1000.00', 'Before 5:00 PM', 'WEEKDAYS', '2021-12-30 12:54:50', '2021-12-30 12:54:50'),
('766989d5-8a55-4b20-9247-d3153459134e', '1200.00', 'After 5:00 PM', 'WEEKDAYS', '2021-12-30 12:55:28', '2021-12-30 12:57:12'),
('9730eb7f-77c0-44ce-86d1-e68243457e41', '1200.00', 'After 5:00 PM', 'WEEKENDS', '2021-12-30 12:56:34', '2021-12-30 12:56:34'),
('d790e377-1a3f-4986-8424-3eb915b2a17a', '1200.00', 'After 5:00 PM', 'HOLIDAYS', '2021-12-30 12:58:11', '2021-12-30 12:58:11'),
('f194cc14-d0b4-4c06-9baf-02e55716f4ab', '1200.00', 'Before 5:00 PM', 'HOLIDAYS', '2021-12-30 12:57:54', '2021-12-30 12:57:54');

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
('BslJYmubuyPH0Q4KZOohmFxb3j1aG3Vs1UbZ4Y23', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IkxqN3RRVFoxY1JVa1VJUHJvV1hTSW1ZRjBuVlhERDlKbVdFT1JKRGUiO30=', 1641053236),
('q4tutRybkFi5Ow2jWgiPOFWV0gfv5xHRPX82J1Vn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.82 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZXdNem11cjh3UWF1UWY4a3FSR3dSWnNRQ3Y2R2tndUZkS0ZxSXNyZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcmljaW5nL3ZpZXciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1648658969),
('VvWox3FvTg8IHzSpohugWqVbyJzQkyLYVk2FNOZn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36 Edg/96.0.1054.62', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiemNKcTA3TDJsY1ViaTNkN3pGS3M2ajRNMlQzbTdid0RWa3djclVDSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkME1MTTJHYXRjbTRUY1g3cXJkSXdkdVByQjNvc05sLjJxTkFwL0MzeWJaZWlmMkl3UGIzaWkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDBNTE0yR2F0Y200VGNYN3FyZEl3ZHVQckIzb3NObC4ycU5BcC9DM3liWmVpZjJJd1BiM2lpIjt9', 1641052943),
('w6DytGDrw918ERc3G3YrZwcf0qA6AeQg3BRF56OU', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUDcyMzY2dlFxWkdJekQ0cE9mUzhrYkliWDBEYlNRMWg1TzZXM040SSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1641142883);

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `display_order` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `start_time`, `end_time`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
('03df6664-4771-4378-80c6-012ef27988f1', '7:00 pm', '8:00 pm', 1, 10, '2021-12-30 02:12:27', '2021-12-30 02:12:27'),
('0ba624c9-f5dd-40d9-a4b2-5bfa144d3bd6', '8:00 pm', '9:00 pm', 1, 11, '2021-12-30 02:14:35', '2021-12-30 02:14:35'),
('11d2c108-95f2-4c1e-8166-ba185d032fdc', '8:00 am', '9:00 am', 1, 1, '2021-12-28 11:43:58', '2021-12-28 11:43:58'),
('3d1f78f1-03ac-43ec-85b9-6d68e8daee44', '9:00 pm', '10:00 pm', 1, 12, '2021-12-30 02:13:41', '2021-12-30 02:14:03'),
('41a91891-c7b6-49dd-b154-ecd0d7dbe224', '4:00 pm', '5:00 pm', 1, 7, '2021-12-30 02:09:56', '2021-12-30 02:09:56'),
('626a1856-0762-4717-bf96-2cfcb5333640', '10:00 pm', '11:00 pm', 1, 13, '2021-12-30 02:15:14', '2021-12-30 02:15:14'),
('844f085a-746b-4987-a37b-c608597e3971', '3:00 pm', '4:00 pm', 1, 6, '2021-12-30 02:09:18', '2021-12-30 02:09:18'),
('b06e8712-5c8e-4e29-b35c-f9c2ea78b1f0', '12:00 pm', '1:00 pm', 1, 4, '2021-12-30 02:07:08', '2021-12-30 02:07:08'),
('cbf3bf68-936c-4843-ab8b-2bbf407901f2', '11:00 am', '12:00 pm', 1, 3, '2021-12-30 00:42:50', '2021-12-30 00:42:50'),
('d2486233-3113-4769-a04f-b68c43ae8198', '11:00 pm', '12:00 am', 1, 14, '2022-01-01 09:55:48', '2022-01-01 09:55:48'),
('d3dd8a17-5858-4dc4-8bd2-4ff6504b901d', '2:00 pm', '3:00 pm', 1, 5, '2021-12-30 02:08:00', '2021-12-30 02:08:00'),
('db43017d-ded7-45b7-82da-9c54e272760a', '10:00 am', '11:00 am', 1, 2, '2021-12-27 12:30:41', '2021-12-28 11:44:23'),
('df53f652-5d5c-4ca4-b5fd-f107e9ccf660', '6:00 pm', '7:00 pm', 1, 9, '2021-12-30 02:11:16', '2021-12-30 02:11:16'),
('f2216041-a2d0-422b-90ac-8c9c9afeb515', '5:00 pm', '6:00 pm', 1, 8, '2021-12-30 02:10:48', '2021-12-30 02:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Chimi Thinley', '17361551', 'chimithinley@outlook.com', NULL, '$2y$10$0MLM2Gatcm4TcX7qrdIwduPrB3osNl.2qNAp/C3ybZeif2IwPb3ii', NULL, NULL, NULL, NULL, NULL, '2021-12-27 12:29:23', '2021-12-27 12:29:23');

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
-- Indexes for table `bank_account_details`
--
ALTER TABLE `bank_account_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_user_id_index` (`user_id`),
  ADD KEY `booking_time_slot_id_index` (`time_slot_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_slot_status_index` (`status`),
  ADD KEY `display_order` (`display_order`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_time_slot_id_foreign` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slot` (`id`),
  ADD CONSTRAINT `booking_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
