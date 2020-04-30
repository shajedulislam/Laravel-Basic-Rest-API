-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 12:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petsheba_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(299) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_04_29_202439_create_petowner_user_table', 1),
(2, '2020_04_29_202543_create_petservice_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petowner_user`
--

CREATE TABLE `petowner_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petservice_user`
--

CREATE TABLE `petservice_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_type` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petowner_user`
--
ALTER TABLE `petowner_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petservice_user`
--
ALTER TABLE `petservice_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petowner_user`
--
ALTER TABLE `petowner_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petservice_user`
--
ALTER TABLE `petservice_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
