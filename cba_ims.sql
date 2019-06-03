-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 06:36 AM
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
(1, 9, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `stock`, `created_at`, `updated_at`, `total`) VALUES
(1, 'PHP', 1699, '2019-06-02 07:39:17', '2019-06-02 07:39:44', 1700);

-- --------------------------------------------------------

--
-- Table structure for table `bulk_sms`
--

CREATE TABLE `bulk_sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `msg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulk_sms`
--

INSERT INTO `bulk_sms` (`id`, `msg`, `created_at`, `updated_at`) VALUES
(1, 'hello', '2019-05-30 07:07:36', '2019-05-30 07:07:36');

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
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'c language', '30', 2, 8000, 2, '2019-05-29 14:01:31', '2019-05-29 14:01:31', 'c-language'),
(2, 'PHP', '180', 4, 8000, 1, '2019-05-30 11:01:57', '2019-05-30 11:01:57', 'php');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE `docs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `books` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enrollment_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `certificate_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `books`, `id_card`, `certificate`, `enrollment_id`, `course_id`, `course_id_2`, `created_at`, `updated_at`, `certificate_number`) VALUES
(2, NULL, '1', '1', 2, '1', '2', '2019-05-30 11:02:36', '2019-06-02 06:19:19', '77892548547');

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
  `enrolled` int(11) DEFAULT NULL,
  `course_id_2` int(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `course_id`, `name`, `address`, `tel_no`, `edu`, `follow_up`, `remarks`, `created_at`, `updated_at`, `slug`, `father_name`, `gender`, `email`, `school_name`, `batch_id`, `enrolled`, `course_id_2`) VALUES
(1, 1, 'Hardil singh', '662/7 Mehar chand Road', '9417464646', '10', '2019-02-16', 'hi hardil', '2019-05-29 14:02:10', '2019-06-02 07:00:00', 'hardil-singh', 'Kanwaljit singh', 'male', 'hardilsingh87@gmail.com', 'dps', 1, 1, 1),
(2, 1, 'Hardil Singh', '662/7 Mehar chand Road Gurdaspur', '7340910031', '+12', '2019-05-30', NULL, '2019-05-30 11:02:31', '2019-05-30 11:02:36', 'hardil-singh-1', 'Kanwaljit singh', 'male', 'hardilsingh87@gmail.com', 'dps', 1, 1, 2);

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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reg_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_join` date DEFAULT NULL,
  `course_id_2` int(10) UNSIGNED DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `date_join_2` date DEFAULT NULL,
  `date_end_2` date DEFAULT NULL,
  `completed_1` int(11) NOT NULL DEFAULT '0',
  `completed_2` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `course_id`, `batch_id`, `name`, `father_name`, `address`, `tel_no`, `gender`, `email`, `edu`, `school_name`, `refer_mode`, `created_at`, `updated_at`, `reg_no`, `slug`, `date_join`, `course_id_2`, `date_end`, `date_join_2`, `date_end_2`, `completed_1`, `completed_2`) VALUES
(2, 1, 1, 'Hardil Singh', 'Kanwaljit singh', '662/7 Mehar chand Road Gurdaspur', '7340910031', 'male', 'hardilsingh87@gmail.com', '+12', 'dps', NULL, '2019-05-30 11:02:35', '2019-05-30 11:05:22', 'CBA/1559214154', 'hardil-singh', '2019-05-30', 2, '2019-06-30', '2019-05-30', '2019-05-30', 0, 1);

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
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id_2` int(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_managers`
--

INSERT INTO `fee_managers` (`id`, `enrollment_id`, `total_fee`, `paid_fee`, `balance`, `created_at`, `updated_at`, `course_id`, `discounted_fee`, `discount`, `due_date`, `slug`, `course_id_2`) VALUES
(2, 2, 8000, 13000, 900, '2019-05-30 11:02:36', '2019-06-02 07:59:57', 1, 15900, 100, '2019-05-30', 'hardil-singh', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `category`, `qty`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'computer', 6, '2019-05-30 07:09:40', '2019-05-30 07:09:40', 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `issueds`
--

CREATE TABLE `issueds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `enrollment_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issueds`
--

INSERT INTO `issueds` (`id`, `enrollment_id`, `book_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 789, '2019-06-02 07:39:27', '2019-06-02 07:39:27');

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
(16, '2019_05_14_110937_create_jobs_table', 7),
(17, '2019_05_16_144122_add_2_course_to_enrollment_table', 8),
(18, '2019_05_17_112133_create_inventories_table', 9),
(19, '2019_05_17_121431_add_slug_to_inventory', 10),
(20, '2019_05_17_131859_create_docs_table', 11),
(21, '2019_05_17_151528_add_cetificate_number', 12),
(22, '2019_05_21_105455_create_notifications_table', 13),
(23, '2019_05_22_144559_create_bulk_sms_table', 14),
(24, '2019_05_27_111851_books', 15),
(25, '2019_05_27_125432_create_issueds_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hardilsingh87@gmail.com', '$2y$10$GQI.r0vcol.zY5rFdGyxLuLT0u1LKqatybrOmNFMWLHW/GsESmdt2', '2019-05-17 05:31:29');

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

--
-- Dumping data for table `reciepts`
--

INSERT INTO `reciepts` (`id`, `enrollment_id`, `total_fee`, `fee_manager_id`, `balance`, `discount`, `paid_fee`, `created_at`, `updated_at`, `due_date`) VALUES
(2, 2, 8000, 2, 13900, 100, 2000, '2019-05-30 11:02:46', '2019-05-30 11:02:46', '2019-05-30'),
(3, 2, 8000, 2, 900, 100, 13000, '2019-06-02 07:59:58', '2019-06-02 07:59:58', '2019-05-30');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_active`) VALUES
(401, 'Hardil Singh', 'hardilsingh87@gmail.com', NULL, '$2y$10$8G9ttcB2481ssejema/FDOR.iCTIzb3g092FMpdeEdLl.Zamr/pjC', 'lPQuhWCQdKpfMc7NxGTgVMMB0HXJ5XzwUlUCprqXkOqEhgLeDZDfT3UmmEer', '2019-05-29 10:59:55', '2019-05-29 10:59:55', 1),
(402, 'CBA Infotech', 'cbainfotechgsp@gmail.com', NULL, '$2y$10$/Hd33dH9wQ.RzR0bSiyRjOhpLq0oo74Mnzsmhoqn7/STBDYw2ivRO', NULL, '2019-05-29 11:03:33', '2019-05-29 11:03:33', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulk_sms`
--
ALTER TABLE `bulk_sms`
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
-- Indexes for table `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docs_enrollment_id_foreign` (`enrollment_id`);

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
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issueds`
--
ALTER TABLE `issueds`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bulk_sms`
--
ALTER TABLE `bulk_sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fee_managers`
--
ALTER TABLE `fee_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issueds`
--
ALTER TABLE `issueds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sidebars`
--
ALTER TABLE `sidebars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `docs`
--
ALTER TABLE `docs`
  ADD CONSTRAINT `docs_enrollment_id_foreign` FOREIGN KEY (`enrollment_id`) REFERENCES `enrollments` (`id`) ON DELETE CASCADE;

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
