-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 07:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` int NOT NULL,
  `user_id` int NOT NULL,
  `dealership_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `job_id`, `user_id`, `dealership_id`, `created_at`, `updated_at`) VALUES
(1, 'Alfa Romeo', 0, 0, 0, NULL, NULL),
(2, 'Aston Martin', 0, 0, 0, NULL, NULL),
(3, 'BMW & Mini', 0, 0, 0, NULL, NULL),
(4, 'Bugatti', 0, 0, 0, NULL, NULL),
(5, 'Ferrari', 0, 0, 0, NULL, NULL),
(6, 'JLR- Jaguar Landrover', 0, 0, 0, NULL, NULL),
(7, 'Lamborghini', 0, 0, 0, NULL, NULL),
(8, 'Maserati', 0, 0, 0, NULL, NULL),
(9, 'Mercedes-Benz', 0, 0, 0, NULL, NULL),
(10, 'Porsche', 0, 0, 0, NULL, NULL),
(11, 'AUDI', 0, 0, 0, NULL, NULL),
(12, 'Chrysler Jeep, Dodge', 0, 0, 0, NULL, NULL),
(13, 'CITROËN', 0, 0, 0, NULL, NULL),
(14, 'Daewoo', 0, 0, 0, NULL, NULL),
(15, 'Daihatsu', 0, 0, 0, NULL, NULL),
(16, 'Fiat', 0, 0, 0, NULL, NULL),
(17, 'Ford', 0, 0, 0, NULL, NULL),
(18, 'GWM', 0, 0, 0, NULL, NULL),
(19, 'Geely', 0, 0, 0, NULL, NULL),
(20, 'Honda', 0, 0, 0, NULL, NULL),
(21, 'Hyundai', 0, 0, 0, NULL, NULL),
(22, 'JAC', 0, 0, 0, NULL, NULL),
(23, 'KIA', 0, 0, 0, NULL, NULL),
(24, 'KTM', 0, 0, 0, NULL, NULL),
(25, 'Lexus', 0, 0, 0, NULL, NULL),
(26, 'Mitsubishi', 0, 0, 0, NULL, NULL),
(27, 'Nissan', 0, 0, 0, NULL, NULL),
(28, 'Opel', 0, 0, 0, NULL, NULL),
(29, 'Peugeot', 0, 0, 0, NULL, NULL),
(30, 'Porsche', 0, 0, 0, NULL, NULL),
(31, 'Renault', 0, 0, 0, NULL, NULL),
(32, 'Subaru', 0, 0, 0, NULL, NULL),
(33, 'Suzuki', 0, 0, 0, NULL, NULL),
(34, 'Tesla', 0, 0, 0, NULL, NULL),
(35, 'Toyota', 0, 0, 0, NULL, NULL),
(36, 'TATA', 0, 0, 0, NULL, NULL),
(37, 'VW', 0, 0, 0, NULL, NULL),
(38, 'Volvo', 0, 0, 0, NULL, NULL),
(39, 'Yamaha', 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Management', 0, 0, NULL, NULL),
(2, 'Sales', 0, 0, NULL, NULL),
(3, 'Service & Repair Workshop', 0, 0, NULL, NULL),
(4, 'Parts Sales and Supply', 0, 0, NULL, NULL),
(5, 'Administration', 0, 0, NULL, NULL),
(6, 'Financing Application Facilities', 0, 0, NULL, NULL),
(7, 'Human Resources', 0, 0, NULL, NULL),
(8, 'Marketing', 0, 0, NULL, NULL),
(9, 'Senior Management', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dealerships`
--

CREATE TABLE `dealerships` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `dname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `brand_other` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','suspended','pending','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dealerships`
--

INSERT INTO `dealerships` (`id`, `user_id`, `dname`, `slug`, `address`, `province`, `phone`, `website`, `logo`, `cover_photo`, `slogan`, `group_id`, `brand_id`, `brand_other`, `description`, `vat_no`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 'BMW Kempton Park', 'bmw-kempton-park', '90 Adam Street, Naturena', '', '+27723599890', 'www.test.co.za', '1697262588.png', '1697262574.jpg', 'pp', 14, 0, '', 'just', '', '2022-01-09 21:18:57', '2023-12-15 13:05:01', 'active'),
(2, 5, 'Audi Kempton Park', 'audi-kempton-park', '1 Buffalo Thorn Crescent', '', '0664545592', 'www.bmw.co.za', '1641905534.jpg', '1641905577.jpg', 'we give cars', 10, 0, '', 'We are looking for resilient, young and dynamic sales consultants to join our ever growing team at the head office in Bedfordview.', '', '2022-01-11 10:50:44', '2024-01-11 02:55:09', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'None', NULL, NULL),
(2, 'A-MotorCycle', NULL, NULL),
(3, 'B-Vehilce(Standard)', NULL, NULL),
(4, 'EB-GCM of 5,500 Kg and Trailer', NULL, NULL),
(5, 'C1', NULL, NULL),
(6, 'C', NULL, NULL),
(7, 'EC1', NULL, NULL),
(8, 'EC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Action', NULL, NULL),
(2, 'AGG', NULL, NULL),
(3, 'Alberante', NULL, NULL),
(4, 'Atlantis Motors', NULL, NULL),
(5, 'Aurinia', NULL, NULL),
(6, 'Autohaus', NULL, NULL),
(7, 'NMI', NULL, NULL),
(8, 'CFAO', NULL, NULL),
(9, 'BB Group', NULL, NULL),
(10, 'Bidvest McCarthy', NULL, NULL),
(11, 'Club Motors', NULL, NULL),
(12, 'CMH Combined Motor Holdings', NULL, NULL),
(13, 'Fury', NULL, NULL),
(14, 'Gateway', NULL, NULL),
(15, 'Global', NULL, NULL),
(16, 'Godrich', NULL, NULL),
(17, 'Group 1', NULL, NULL),
(18, 'Halfway', NULL, NULL),
(19, 'Hatfield', NULL, NULL),
(20, 'Haval SA', NULL, NULL),
(21, 'IMP-Imperial', NULL, NULL),
(22, 'IMP-Cargo Motors,', NULL, NULL),
(23, 'IMP-Auto Pedigree', NULL, NULL),
(24, 'IMP-Lindsay Saker', NULL, NULL),
(25, 'Kempston', NULL, NULL),
(26, 'KMGT', NULL, NULL),
(27, 'Lazarus', NULL, NULL),
(28, 'Leo Haese', NULL, NULL),
(29, 'Mekor', NULL, NULL),
(30, 'MGM Group', NULL, NULL),
(31, 'NTT', NULL, NULL),
(32, 'Philwest', NULL, NULL),
(33, 'Rola', NULL, NULL),
(34, 'SMH', NULL, NULL),
(35, 'Star', NULL, NULL),
(36, 'Supergroup', NULL, NULL),
(37, 'Tavcor', NULL, NULL),
(38, 'Trust Auto', NULL, NULL),
(39, 'Westvaal', NULL, NULL),
(40, 'Eastvaal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dealership_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duties` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_vacancy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years_experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_date` date NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `dealership_id`, `brand_id`, `salary_range`, `title`, `duties`, `qualification`, `number_of_vacancy`, `years_experience`, `slug`, `description`, `category_id`, `position`, `province`, `address`, `type`, `last_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '5', '2', '', 'R6000-R10000', 'Dynamic Sales Executive', 'Duties and Responsibilities:\r\n	• Actively engage with prospective customers\r\n	• Develop an in-depth understanding of our ever-changing car inventory and use that knowledge to encourage customers to make a purchase\r\n	• Always well- informed about the stock', 'Sales: 1 year (Required)', '2', '1-2 years', 'dynamic-sales-executive', 'We at Hyundai Kempton Park are hiring!\r\nAre you a young and motivated, energetic salesman/woman with a strong command of the English language? Do you have experience working directly with dealerships? Generating your own leads?\r\nDo you want your work ethic, drive and ambition to determine how much money you make?\r\nThen look no further!\r\nWe are looking for resilient, young and dynamic sales consultants to join our ever growing team at the head office in Bedfordview.', 2, 'Sales Executive', '3', '1 Buffalo Thorn Crescent', 'Permanent', '2022-02-05', 1, '2022-01-11 10:51:49', '2022-01-11 10:51:49'),
(2, '2', '1', '12', 'Market Related', 'Management', 'Test', 'None', '50', '2-5 years', 'management', 'Test', 1, 'Managing Director', '3', '90 Adam Street, Naturena', 'Permanent', '2023-08-18', 1, '2023-08-11 20:02:35', '2023-08-11 20:02:35'),
(3, '2', '1', '16', 'Market Related', 'Salesman', 'Sale cars', 'none', '50', '2-5 years', 'salesman', 'Sale cars', 2, 'Salesman', '2', '90 Adam Street, Naturena', 'Permanent', '2023-09-03', 0, '2023-08-13 07:22:46', '2023-10-14 03:50:05'),
(4, '2', '1', '36', 'Market Related', 'Sales Executive', 'YES', 'Need Matric', '2', '1-2 years', 'sales-executive', 'Need one desperately', 2, 'Sales Executive', 'Gauteng', 'dealership address', 'Permanent', '2024-01-01', 0, '2023-12-06 10:39:50', '2023-12-06 10:53:13'),
(5, '2', '1', '13', 'Market Related', 'Sales Executive', 'NEW', 'YES', '2', '5-10 years', 'sales-executive', 'MEW', 2, 'Sales Executive', 'Gauteng', 'dealership address', 'Permanent', '2023-12-26', 0, '2023-12-06 10:57:18', '2023-12-06 10:57:18'),
(6, '2', '1', '19', 'R6000-R10000', 'dawd', 'daw', 'daw', '2', 'None', 'dawd', 'ad', 1, 'Sales Executive', 'Free State', 'daw', 'Contract/Temp', '2023-12-27', 0, '2023-12-06 10:58:09', '2023-12-06 11:06:24'),
(7, '2', '1', '32', 'Basic plus Commission', 'Car Sales', 'asd', 'adawdawda', '3', '1-2 years', 'car-sales', 's', 1, 'da', 'Free State', 'adwda', 'Permanent', '2023-12-20', 1, '2023-12-06 11:00:14', '2023-12-06 11:00:14'),
(8, '2', '1', '17', 'R6000-R10000', 'awdaawdawdawdawd', 'awdawdaw', 'awdawd', '3', '1-2 years', 'awdaawdawdawdawd', 'awdawdaw', 1, 'awdaw', 'Free State', 'daw', 'Contract/Temp', '2023-12-28', 1, '2023-12-06 11:05:25', '2023-12-06 11:05:25'),
(9, '2', '1', '13', 'R60 000 plus', 'wwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwww', 'wwwwwwwwwwww', '2', 'None', 'wwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwwwwwww', 1, 'wwwwwwwww', 'Mpumalanga', 'wwwwww', 'Contract/Temp', '2023-12-25', 0, '2023-12-06 11:06:02', '2023-12-06 11:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `job_user`
--

CREATE TABLE `job_user` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_user`
--

INSERT INTO `job_user` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-01-11 10:53:38', '2022-01-11 10:53:38'),
(2, 1, 4, '2023-08-12 04:13:32', '2023-08-12 04:13:32'),
(3, 2, 4, '2023-08-13 06:58:41', '2023-08-13 06:58:41'),
(4, 3, 4, '2023-08-13 07:23:56', '2023-08-13 07:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `job_users`
--

CREATE TABLE `job_users` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_users`
--

INSERT INTO `job_users` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, NULL, NULL),
(2, 3, 4, NULL, NULL),
(3, 8, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Zulu', NULL, NULL),
(2, 'Xhosa', NULL, NULL),
(3, 'Afrikaans', NULL, NULL),
(4, 'English', NULL, NULL),
(5, 'Sepedi', NULL, NULL),
(6, 'Sotho', NULL, NULL),
(7, 'Tswana', NULL, NULL),
(8, 'Venda', NULL, NULL),
(9, 'Ndebele', NULL, NULL),
(10, 'Xitsonga', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_12_09_082705_create_dealerships_table', 1),
(6, '2021_12_09_082742_create_categories_table', 1),
(7, '2021_12_09_082957_create_jobs_table', 1),
(8, '2021_12_09_083349_create_job_user_table', 1),
(9, '2021_12_09_083419_create_favourites_table', 1),
(10, '2021_12_09_095108_create_groups_table', 1),
(12, '2021_12_22_125000_create_brands_table', 1),
(13, '2021_12_22_125359_create_salary_ranges_table', 1),
(14, '2021_12_30_055104_create_drivers_table', 1),
(15, '2021_12_30_065241_create_provinces_table', 1),
(16, '2022_01_03_134605_create_titles_table', 1),
(17, '2022_01_09_085739_create_roles_table', 1),
(18, '2022_01_09_085910_create_role_user_table', 1),
(19, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(20, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(21, '2021_12_09_082620_create_profiles_table', 2),
(22, '2021_12_17_091311_add_phone_number_to_profiles_table', 3),
(23, '2023_10_04_070002_create_job_users_table', 4),
(24, '2023_10_09_164408_create_work_experiences_table', 4),
(25, '2023_10_13_035700_create_languages_table', 5),
(26, '2023_12_10_064029_add_status_column_to_dealerships', 6),
(27, '2023_12_12_081424_add_status_column_to_profiles', 6),
(28, '2024_02_26_163833_create_permission_tables', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(6, 'approve dealer', 'web', '2024-02-26 09:52:26', '2024-02-26 09:52:26'),
(7, 'reject dealer', 'web', '2024-02-26 09:52:26', '2024-02-26 09:52:26'),
(8, 'make controller', 'web', NULL, '2024-02-27 12:42:04'),
(9, 'role has permission', 'web', '2024-02-27 09:13:34', '2024-02-27 18:53:34'),
(11, 'edit user', 'web', '2024-02-27 18:54:06', '2024-02-27 18:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `profile_status` int DEFAULT NULL,
  `race` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealer_experience` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `education` text COLLATE utf8mb4_unicode_ci,
  `title_job1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_job1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_job1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_job2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employer_job2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_job2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_liscence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fl1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fl2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fl3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fourth_language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fl4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notice_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payslips` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','suspended','pending','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `avatar`, `category_id`, `brand_id`, `profile_status`, `race`, `dealer_experience`, `deleted_at`, `title_id`, `name`, `surname`, `title`, `identification_number`, `slug`, `bio`, `education`, `title_job1`, `employer_job1`, `date_job1`, `title_job2`, `employer_job2`, `date_job2`, `driver_liscence`, `first_language`, `fl1`, `second_language`, `fl2`, `third_language`, `fl3`, `fourth_language`, `fl4`, `salary_range`, `notice_period`, `province`, `group_id`, `employment_status`, `address`, `phone_number`, `gender`, `software`, `cover_letter`, `cv`, `certificates`, `payslips`, `other_documents`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, NULL, 2, 3, 1, 'Black', NULL, NULL, NULL, 'Martin', 'Owens', 'Mechanic', '0000000000', 'seeker', 'Nothins Much', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-11 17:46:06', 'suspended'),
(2, 4, '1697275478.jpeg', 1, 1, 1, 'White', NULL, NULL, NULL, 'Mighty', 'Vukeya', 'Sales Person', '11111111', 'seeker', NULL, NULL, 'Sales wrap', 'bmw ranbudg', 'jan 2010 - jan 2023', 'Salesman', 'audi sandton', 'jan 2020 - feb 2023', NULL, 'Zulu', '100', 'Zulu', '100', 'Zulu', '100', 'Zulu', '100', 'negotiable', 'Immediate\'s', NULL, '4', 'Employed', '72', '3599890', 'Male', NULL, 'profile_cover_letter2_20231215203256.png', 'profile_cv2_20231215203256.png', 'profile_certificates2_20231215203256.png', 'profile_payslips2_20231215203256.png', 'profile_other_documents2_20231215203256.png', NULL, '2023-12-15 18:33:36', 'active'),
(3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '970919975680', '970919975680', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-24 21:33:20', '2024-02-24 21:33:20', 'pending'),
(4, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12345678', '12345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 19:20:51', '2024-02-28 19:20:51', 'pending'),
(6, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123321', '123321', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-28 19:50:28', '2024-02-28 19:50:28', 'pending'),
(11, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kas osis mpk kls X.docx', 'mmt osis sertijab.jpeg', 'mmt osis sertijab.jpeg', 'mmt osis sertijab.jpeg', '2024-03-01 06:24:42', '2024-03-01 06:24:42', 'pending'),
(12, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kas osis mpk kls X.docx', 'mmt osis sertijab.jpeg', 'mmt osis sertijab.jpeg', 'mmt osis sertijab.jpeg', '2024-03-01 06:28:03', '2024-03-01 06:28:03', 'pending'),
(13, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Kas osis mpk kls X.docx', 'mmt osis sertijab.jpeg', 'mmt osis sertijab.jpeg', 'mmt osis sertijab.jpeg', '2024-03-01 06:41:19', '2024-03-01 06:41:19', 'pending'),
(14, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'C:\\Users\\ASUS\\AppData\\Local\\Temp\\phpD1C9.tmp', 'C:\\Users\\ASUS\\AppData\\Local\\Temp\\phpD1D9.tmp', 'C:\\Users\\ASUS\\AppData\\Local\\Temp\\phpD1DA.tmp', 'C:\\Users\\ASUS\\AppData\\Local\\Temp\\phpD1DB.tmp', '2024-03-01 07:44:56', '2024-03-01 07:44:56', 'pending'),
(15, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cv_56.docx', 'certificates_56.png', 'payslips_56.png', 'other_documents_56.png', '2024-03-01 10:24:49', '2024-03-01 10:24:49', 'pending'),
(16, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cv_65.docx', 'certificates_65.png', 'payslips_65.png', 'other_documents_65.png', '2024-03-01 10:49:19', '2024-03-01 10:49:19', 'pending'),
(17, 82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dealer Principal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cv_82.docx', 'certificates_82.png', 'payslips_82.png', 'other_documents_82.png', '2024-03-01 11:16:36', '2024-03-01 11:16:36', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Eastern Cape', NULL, NULL),
(2, 'Free State', NULL, NULL),
(3, 'Gauteng', NULL, NULL),
(4, 'KwaZulu-Natal', NULL, NULL),
(5, 'Limpopo', NULL, NULL),
(6, 'Mpumalanga', NULL, NULL),
(7, 'Northern Cape', NULL, NULL),
(8, 'North West', NULL, NULL),
(9, 'Western Cape', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', NULL, NULL),
(2, 'Super User', 'web', NULL, NULL),
(3, 'Admin Account', 'web', NULL, NULL),
(8, 'make', 'web', '2024-02-28 01:49:19', '2024-02-28 01:49:19'),
(9, 'ahsiap', 'web', '2024-02-29 02:09:35', '2024-02-29 02:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(6, 1),
(7, 1),
(8, 2),
(8, 3),
(9, 3),
(7, 8),
(8, 8),
(6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2022-01-09 09:39:41', '2022-01-09 09:39:41'),
(2, 4, 1, '2024-02-08 14:24:49', '2024-02-28 14:24:49'),
(16, 24, 8, NULL, NULL),
(19, 28, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_ranges`
--

CREATE TABLE `salary_ranges` (
  `id` bigint UNSIGNED NOT NULL,
  `range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Dealer Principal', '1', NULL, NULL),
(2, 'New Car Sales Manager', '1', NULL, NULL),
(3, 'Used Car Sales Manager', '1', NULL, NULL),
(4, 'Parts Manager', '1', NULL, NULL),
(5, 'Service/Workshop Manager', '1', NULL, NULL),
(6, 'Aftersales Manager', '1', NULL, NULL),
(7, 'Service Admin Manager', '1', NULL, NULL),
(8, 'Marketing Manager', '1', NULL, NULL),
(9, 'CRM', '1', NULL, NULL),
(10, 'Financial Manager', '1', NULL, NULL),
(11, 'HR Manager', '1', NULL, NULL),
(12, 'Snr Exec New', '2', NULL, NULL),
(13, 'Sales Exec New', '2', NULL, NULL),
(14, 'Sales Exec Used', '2', NULL, NULL),
(15, 'Fleet/ Corperate Sales ', '2', NULL, NULL),
(16, 'Sales Rep', '2', NULL, NULL),
(17, 'Stock Controller', '2', NULL, NULL),
(18, 'Driver', '2', NULL, NULL),
(19, 'Apprentice', '3', NULL, NULL),
(20, ' Diesel/Commercial Technician', '3', NULL, NULL),
(21, 'Technician', '3', NULL, NULL),
(22, 'Diagnostic Technician', '3', NULL, NULL),
(23, 'Master Technician', '3', NULL, NULL),
(24, 'Foreman', '3', NULL, NULL),
(25, ' Working Foreman', '3', NULL, NULL),
(26, ' Workshop Controller', '3', NULL, NULL),
(27, 'Service Advisor', '3', NULL, NULL),
(28, 'Aftersales Consultant', '3', NULL, NULL),
(29, 'Bookings Clerk', '3', NULL, NULL),
(30, 'Cashier', '3', NULL, NULL),
(31, 'Costing Clerk', '3', NULL, NULL),
(32, 'Warranty Clerk', '3', NULL, NULL),
(33, 'Costing and warranty clerk', '3', NULL, NULL),
(34, 'Service Admin', '3', NULL, NULL),
(35, 'RSA- Repair Shop Assistant', '3', NULL, NULL),
(36, 'Invoice Clerk', '3', NULL, NULL),
(37, 'Customer relations Officer', '3', NULL, NULL),
(38, 'Parts Counter Sales', '4', NULL, NULL),
(39, 'Parts Sales', '4', NULL, NULL),
(40, 'Parts Rep', '4', NULL, NULL),
(41, 'Parts Picker', '4', NULL, NULL),
(42, 'Dealership Accountant', '5', NULL, NULL),
(43, 'Bookkeeper', '5', NULL, NULL),
(44, 'Creditor Clerk', '5', NULL, NULL),
(45, 'Debtor Clerk', '5', NULL, NULL),
(46, 'Account Clerk', '5', NULL, NULL),
(47, 'Invoice Clerk', '5', NULL, NULL),
(48, 'F&I- Finance & Insurance Manager', '6', NULL, NULL),
(49, 'F&I- Finance & Insurance Assistant', '6', NULL, NULL),
(50, 'Payroll Clerk', '7', NULL, NULL),
(51, 'HR Clerk', '7', NULL, NULL),
(52, 'HR Administrator', '7', NULL, NULL),
(53, 'Junior HR Administrator', '7', NULL, NULL),
(54, 'Product Planning Manager', '8', NULL, NULL),
(55, 'Franchise Executive', '9', NULL, NULL),
(56, 'Regional  Sales Manager', '9', NULL, NULL),
(57, 'Regional Parts Manager', '9', NULL, NULL),
(58, 'Regional Service Manager', '9', NULL, NULL),
(59, 'Regional Aftersales Manager', '9', NULL, NULL),
(60, 'CEO', '9', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'admin', 'admin', 'admin@gmail.com', '2024-02-14 14:18:05', '$2y$10$ebPrf3QPxqdWVYC.a0X1cu93MSM3hgr.2MZ9whwwZZxcKLqNTJ8vi', NULL, NULL, NULL, NULL),
(4, 'Chante', 'seeker', 'seeker@gmail.com', '2023-08-12 04:13:00', '$2a$04$jn.4hCElgm8t2Tna2kwJkOjXSKlGJ2O.YLPD8dyE0YK6CJO7Hv.xa', NULL, '2022-01-09 21:29:11', '2023-08-12 04:13:00', NULL),
(24, 'dedena', 'seeker', 'deden@gmail.com', NULL, '$2y$10$Pj/DukT02Jf8XJJvkBbiO..btSZb6ToK0y1P/Rl09yK5qlQUbFNNm', NULL, '2024-02-28 01:50:07', '2024-02-28 02:32:10', NULL),
(25, 'Ega desta', 'seeker', 'egadestavianodesta@gmail.com', NULL, '$2y$10$9DxKrUNfBEly44LyeOwhketCW0gf2ILSdd2r50k3cUvhVs7iTd8wK', NULL, '2024-02-28 19:20:51', '2024-02-28 19:20:51', NULL),
(27, 'dummy', 'seeker', 'dummy@gmail.com', NULL, '$2y$10$oqENU1ZuGzKoerwp1qP8lepwr1haCkP5aYfTf82522ZU48Tg0Fgo.', NULL, '2024-02-28 19:50:28', '2024-02-28 19:50:28', NULL),
(37, 'Vinxx', 'seeker', 'vinxxo981@gmail.com', NULL, 'password', NULL, '2024-03-01 06:23:58', '2024-03-01 06:23:58', NULL),
(38, 'hbd3hnd 3', 'seeker', 'hyebfghfhfey@jnx.com', NULL, 'password', NULL, '2024-03-01 07:21:02', '2024-03-01 07:44:27', NULL),
(56, 'dumum', 'seeker', 'dumum@gmail.com', NULL, '$2y$10$roTwxxEaCTIi5QX99WCYDeEmNKiR2/bsynx0liy5DHtSvYoAFT4zi', NULL, '2024-03-01 10:24:49', '2024-03-01 10:24:49', NULL),
(65, 'mac stone', 'seeker', 'stone@gmail.com', NULL, '$2y$10$KejEvKRk9XezmWQjzB7me.XyYTYfYYLM8Oz1w0Wz4UgzlOW5QHEvi', NULL, '2024-03-01 10:49:19', '2024-03-01 10:49:19', NULL),
(66, 'bjirr', 'seeker', 'bjirr@gmail.com', NULL, '$2y$10$nZ.hR7oNTCokPU7qLh0cau10VjSYpLndGF4F6b92CfMwsktxBkFyW', NULL, '2024-03-01 10:53:37', '2024-03-01 10:53:37', NULL),
(82, 'jamet', 'seeker', 'jamet@gmail.com', NULL, '$2y$10$Px5WLD3ZNeI/nULqvFN8nukwO2SCYB5Mb/y5WCmz71tvHhDs5zONK', NULL, '2024-03-01 11:16:36', '2024-03-01 11:16:36', NULL),
(91, 'devan', 'seeker', 'devan@gmail.com', NULL, '$2y$10$.huPvbpdUYxd18WjI99MtOWwxZEo6N26GEwaddky6UTK/u.i.MRda', NULL, '2024-03-01 12:00:15', '2024-03-01 12:00:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `present` tinyint(1) NOT NULL DEFAULT '0',
  `manager` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `user_id`, `title`, `company`, `start_date`, `end_date`, `present`, `manager`, `phone`, `created_at`, `updated_at`) VALUES
(1, 4, 'Mechanic', 'Bmw', '2023-10-10', NULL, 1, 'Mighty', '0605260535', '2023-10-12 18:27:50', '2023-10-12 18:27:50'),
(3, 4, 'Sales executive', 'Toyota', '2024-01-09', '2024-01-11', 0, 'Ben', '071 241 5391', '2024-01-08 16:56:37', '2024-01-08 16:56:37');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `dealerships`
--
ALTER TABLE `dealerships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_user`
--
ALTER TABLE `job_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_users`
--
ALTER TABLE `job_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_ranges`
--
ALTER TABLE `salary_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dealerships`
--
ALTER TABLE `dealerships`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job_user`
--
ALTER TABLE `job_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_users`
--
ALTER TABLE `job_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `salary_ranges`
--
ALTER TABLE `salary_ranges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
