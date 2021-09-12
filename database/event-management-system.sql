-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2021 at 10:37 PM
-- Server version: 8.0.26-0ubuntu0.20.04.2
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event-management-system`
--
CREATE DATABASE IF NOT EXISTS `event-management-system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `event-management-system`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Event Name',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Event description',
  `start_time` timestamp NOT NULL COMMENT 'event start time',
  `end_time` timestamp NOT NULL COMMENT 'event end time',
  `day_of_the_week` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Day of the Week ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'user d',
  PRIMARY KEY (`id`),
  KEY `events_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `start_time`, `end_time`, `day_of_the_week`, `created_at`, `updated_at`, `user_id`) VALUES
(6, 'All Monday Morning Meeting...', 'Monday every meeting....', '2021-09-12 04:30:00', '2021-09-12 17:30:00', 'Monday', '2021-09-12 10:53:42', '2021-09-12 10:53:42', 2),
(7, 'Project SCRUM Meeting...', 'Every Thursday Meeting for Scrum', '2021-09-13 05:24:00', '2021-09-12 18:24:00', 'Thursday', '2021-09-12 10:54:52', '2021-09-12 10:54:52', 2),
(8, 'Sat Meet', 'All Saturday Meetings...', '2021-09-12 16:47:00', '2021-09-12 18:47:00', 'Saturday', '2021-09-12 11:17:17', '2021-09-12 11:17:17', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_12_091133_create_events_table', 2),
(6, '2021_09_12_123104_create_schedules_table', 3),
(7, '2021_09_12_123734_add_user_id_to_events_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` bigint UNSIGNED NOT NULL COMMENT 'event id',
  `date` datetime NOT NULL COMMENT 'event date',
  `starting_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'schedule event time',
  `ending_time` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'schedule event time',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedules_event_id_index` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `event_id`, `date`, `starting_time`, `ending_time`, `created_at`, `updated_at`) VALUES
(1, 6, '2021-09-13 10:00:00', '10:00', '23:00', NULL, NULL),
(2, 6, '2021-09-20 10:00:00', '10:00', '23:00', NULL, NULL),
(3, 6, '2021-09-27 10:00:00', '10:00', '23:00', NULL, NULL),
(4, 6, '2021-10-04 10:00:00', '10:00', '23:00', NULL, NULL),
(5, 6, '2021-10-11 10:00:00', '10:00', '23:00', NULL, NULL),
(6, 6, '2021-10-18 10:00:00', '10:00', '23:00', NULL, NULL),
(7, 6, '2021-10-25 10:00:00', '10:00', '23:00', NULL, NULL),
(8, 6, '2021-11-01 10:00:00', '10:00', '23:00', NULL, NULL),
(9, 6, '2021-11-08 10:00:00', '10:00', '23:00', NULL, NULL),
(10, 6, '2021-11-15 10:00:00', '10:00', '23:00', NULL, NULL),
(11, 6, '2021-11-22 10:00:00', '10:00', '23:00', NULL, NULL),
(12, 6, '2021-11-29 10:00:00', '10:00', '23:00', NULL, NULL),
(13, 6, '2021-12-06 10:00:00', '10:00', '23:00', NULL, NULL),
(14, 7, '2021-09-16 10:54:00', '10:54', '23:54', NULL, NULL),
(15, 7, '2021-09-23 10:54:00', '10:54', '23:54', NULL, NULL),
(16, 7, '2021-09-30 10:54:00', '10:54', '23:54', NULL, NULL),
(17, 7, '2021-10-07 10:54:00', '10:54', '23:54', NULL, NULL),
(18, 7, '2021-10-14 10:54:00', '10:54', '23:54', NULL, NULL),
(19, 7, '2021-10-21 10:54:00', '10:54', '23:54', NULL, NULL),
(20, 7, '2021-10-28 10:54:00', '10:54', '23:54', NULL, NULL),
(21, 7, '2021-11-04 10:54:00', '10:54', '23:54', NULL, NULL),
(22, 7, '2021-11-11 10:54:00', '10:54', '23:54', NULL, NULL),
(23, 7, '2021-11-18 10:54:00', '10:54', '23:54', NULL, NULL),
(24, 7, '2021-11-25 10:54:00', '10:54', '23:54', NULL, NULL),
(25, 7, '2021-12-02 10:54:00', '10:54', '23:54', NULL, NULL),
(26, 7, '2021-12-09 10:54:00', '10:54', '23:54', NULL, NULL),
(27, 8, '2021-09-18 22:17:00', '22:17', '00:17', NULL, NULL),
(28, 8, '2021-09-25 22:17:00', '22:17', '00:17', NULL, NULL),
(29, 8, '2021-10-02 22:17:00', '22:17', '00:17', NULL, NULL),
(30, 8, '2021-10-09 22:17:00', '22:17', '00:17', NULL, NULL),
(31, 8, '2021-10-16 22:17:00', '22:17', '00:17', NULL, NULL),
(32, 8, '2021-10-23 22:17:00', '22:17', '00:17', NULL, NULL),
(33, 8, '2021-10-30 22:17:00', '22:17', '00:17', NULL, NULL),
(34, 8, '2021-11-06 22:17:00', '22:17', '00:17', NULL, NULL),
(35, 8, '2021-11-13 22:17:00', '22:17', '00:17', NULL, NULL),
(36, 8, '2021-11-20 22:17:00', '22:17', '00:17', NULL, NULL),
(37, 8, '2021-11-27 22:17:00', '22:17', '00:17', NULL, NULL),
(38, 8, '2021-12-04 22:17:00', '22:17', '00:17', NULL, NULL),
(39, 8, '2021-12-11 22:17:00', '22:17', '00:17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Last name not required',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vikas', 'Ukani', 'vikas@gmail.com', NULL, '$2y$10$MarIJItu7l3PgUI6uvgqrONXM9MTb.AoeqGuloZnbxKStNStKSsxu', NULL, '2021-09-12 03:32:41', '2021-09-12 03:32:41'),
(2, 'New', 'User', 'new@gmail.com', NULL, '$2y$10$Kgq611a0YDx0GWCjE0gQCe9IBlJ6VT2SpgtBIMJHxOQSPuVDLT5B.', NULL, '2021-09-12 10:10:07', '2021-09-12 10:10:07'),
(3, 'ukani', 'vikas', 'ukani@gmail.com', NULL, '$2y$10$nB46s1xLoH6Ah5MfWbofjOI2R0dXWoXvtSIZwelJVyzSlajES0zlu', NULL, '2021-09-12 11:16:42', '2021-09-12 11:16:42');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
