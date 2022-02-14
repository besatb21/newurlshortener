-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 14, 2022 at 07:11 PM
-- Server version: 8.0.26
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urlshortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblshort`
--

CREATE TABLE `tblshort` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `shortcode` varchar(64) NOT NULL,
  `url` varchar(2083) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblshort`
--

INSERT INTO `tblshort` (`id`, `user_id`, `shortcode`, `url`, `created_at`, `updated_at`) VALUES
(1, 9, '10ef0bd34f', 'https://www.php.net/manual/en/function.password-hash.php', NULL, NULL),
(2, NULL, 'df861b6cae', 'https://www.mysqltutorial.org/mysql-limit.aspx', NULL, NULL),
(3, NULL, '9c1c3eeb91', 'https://www.mysqltutorial.org/mysql-limit.aspx', NULL, NULL),
(4, NULL, 'e77ebad802', 'http://localhost:8001/urlshortener/index.php', NULL, NULL),
(5, NULL, '5ba6eb68ad', 'http://localhost:8001/urlshortener/index.php', NULL, NULL),
(6, NULL, 'bbd5da674a', 'http://localhost:8001/urlshortener/index.php', NULL, NULL),
(7, NULL, '4d22497298', 'http://localhost:8001/urlshortener/index.php', NULL, NULL),
(8, NULL, '98d74b5f1c', 'http://localhost:8001/urlshortener/index.php', NULL, NULL),
(9, NULL, 'e72607f6ac', 'http://localhost:8001/urlshortener/index.php', NULL, NULL),
(10, 9, '69deb8eb67', 'https://git-scm.com/book/en/v2/Git-on-the-Server-Setting-Up-the-Server', NULL, NULL),
(11, NULL, 'fef49ee8aa', 'https://www.php.net/manual/en/function.get-class.php', NULL, NULL),
(12, 9, 'dfb743a142', 'https://en.wikipedia.org/wiki/Ejabberd', NULL, NULL),
(13, NULL, 'ae1a1bd5c3', 'http://localhost:8001/urlshortener/index.php', NULL, NULL),
(14, NULL, '13db1728f3', 'https://github.com/rabbitmq', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`, `disabled`) VALUES
(8, 'test', '$2y$10$/sOnAu6pTO6BPrQ4P.bG6.bxD0GeoMHfMno0fcLfEA6JsZ/2/TQpK', 0, NULL, NULL, NULL),
(9, 'hndregjoni', '$2y$10$TQ7KCR.fLc2eC9GY6jwsdO1pW.g0SBzslxGEAZaWI/PxjZd6JEBWK', 0, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblshort`
--
ALTER TABLE `tblshort`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblshort`
--
ALTER TABLE `tblshort`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
