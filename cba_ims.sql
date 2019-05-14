-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 10:01 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cba_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 9, 11, NULL, NULL),
(2, 11, 1, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 3, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `centres`
--

CREATE TABLE `centres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centres`
--

INSERT INTO `centres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CBA', NULL, NULL),
(2, 'CDAC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(10) UNSIGNED NOT NULL,
  `hours` int(10) UNSIGNED NOT NULL,
  `fee` int(10) UNSIGNED NOT NULL,
  `centre_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `duration`, `hours`, `fee`, `centre_id`, `created_at`, `updated_at`, `slug`) VALUES
(2, 'c language', 30, 2, 2500, 2, '2019-05-10 05:07:37', '2019-05-13 05:27:47', 'c-language');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `follow_up` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `enrolled` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `course_id`, `name`, `address`, `tel_no`, `edu`, `follow_up`, `remarks`, `created_at`, `updated_at`, `slug`, `father_name`, `gender`, `email`, `school_name`, `batch_id`, `enrolled`) VALUES
(21, 2, 'Hardil Singh', '662/7 Mehar chand Road Gurdaspur', '7340910031', '+12', '2019-05-20', NULL, '2019-05-14 05:59:31', '2019-05-14 05:59:35', 'hardil-singh', 'Kanwaljit singh', 'male', 'hardilsingh87@gmail.com', 'dps', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `batch_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_join` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `course_id`, `batch_id`, `name`, `father_name`, `address`, `tel_no`, `gender`, `email`, `edu`, `school_name`, `refer_mode`, `created_at`, `updated_at`, `reg_no`, `slug`, `date_join`) VALUES
(29, 2, 2, 'Hardil Singh', 'Kanwaljit singh', '662/7 Mehar chand Road Gurdaspur', '7340910031', 'male', 'hardilsingh87@gmail.com', '+12', 'dps', NULL, '2019-05-14 05:59:35', '2019-05-14 06:10:19', 'CBA/1557813575', 'hardil-singh', '2016-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `fee_managers`
--

CREATE TABLE `fee_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrollment_id` bigint(20) UNSIGNED NOT NULL,
  `total_fee` int(11) DEFAULT NULL,
  `paid_fee` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `discounted_fee` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_managers`
--

INSERT INTO `fee_managers` (`id`, `enrollment_id`, `total_fee`, `paid_fee`, `balance`, `created_at`, `updated_at`, `course_id`, `discounted_fee`, `discount`, `due_date`, `slug`) VALUES
(29, 29, NULL, NULL, NULL, '2019-05-14 05:59:35', '2019-05-14 05:59:35', 2, NULL, NULL, NULL, 'hardil-singh');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_06_064036_create_courses_table', 1),
(4, '2019_05_06_070459_create_centers_table', 1),
(5, '2019_05_06_100345_create_enrollments_table', 1),
(6, '2019_05_06_101316_create_batches_table', 1),
(7, '2019_05_06_144531_add_reg_number_to_enrollmet_table', 1),
(8, '2019_05_06_160234_create_fee_managers_table', 1),
(9, '2019_05_07_103540_create_enquiries_table', 1),
(10, '2019_05_08_170155_create_reciepts_table', 1),
(11, '2019_05_10_101627_add_slug_to_course_table', 2),
(12, '2019_05_10_104056_add_slug_col', 3),
(13, '2019_05_10_104617_add_slug_to_course_table', 4),
(14, '2019_05_10_105056_add_slug_col', 5),
(15, '2019_05_12_162432_create_sidebars_table', 6),
(16, '2019_05_14_110937_create_jobs_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reciepts`
--

CREATE TABLE `reciepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrollment_id` bigint(20) UNSIGNED NOT NULL,
  `total_fee` int(11) NOT NULL,
  `fee_manager_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `paid_fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sidebars`
--

CREATE TABLE `sidebars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidebars`
--

INSERT INTO `sidebars` (`id`, `name`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'fas fa-user-shield', NULL, NULL),
(2, 'Search Profile', 'profile', 'fas fa-user-circle', NULL, NULL),
(3, 'enquiries\r\n', 'enquiry', 'fas fa-question', NULL, NULL),
(4, 'Students', 'students', 'fas fa-user-graduate', NULL, NULL),
(5, 'courses', 'course', 'fas fa-book', NULL, NULL),
(6, 'Fee Manager', 'feemanager', 'fas fa-rupee-sign', NULL, NULL),
(7, 'Enrollment Form', 'enroll', 'fas fa-signature', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hardil Singh', 'hardilsingh87@gmail.com', NULL, '$2y$10$FbwQEkYW/bAOEjqChbfF3uXsmKj1nR7N7ynWeTNqtDCpgqGH3u.pC', 'M9TfVYpGo46zmzU10KV60sWoE41mVvLH618iA5FPjxpA3yCwauiN4Y8IOIBh', '2019-05-08 12:32:25', '2019-05-08 12:32:25'),
(2, 'cbainfotech', 'cbainfotechgsp@gmail.com', NULL, '$2y$10$daP7dL0fl4NsCeZ6Ni9INe5j3SKu1/nKgHL1LXIR2KgsoGR8cannC', 'G749pyyOG73wwQ5OcUlKeq2N2T0MhlVYbIJ0W86SASD3PyfMkiP9dBEpoilB', '2019-05-10 01:55:53', '2019-05-10 01:55:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_managers`
--
ALTER TABLE `fee_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_managers_enrollment_id_foreign` (`enrollment_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reciepts_enrollment_id_foreign` (`enrollment_id`);

--
-- Indexes for table `sidebars`
--
ALTER TABLE `sidebars`
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
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `fee_managers`
--
ALTER TABLE `fee_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sidebars`
--
ALTER TABLE `sidebars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee_managers`
--
ALTER TABLE `fee_managers`
  ADD CONSTRAINT `fee_managers_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD CONSTRAINT `reciepts_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
