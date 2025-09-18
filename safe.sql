-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2025 at 01:24 PM
-- Server version: 8.0.34
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `safe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblhistory`
--

CREATE TABLE `tblhistory` (
  `id` int NOT NULL,
  `ProductID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateScanned` datetime NOT NULL,
  `Status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblinfo`
--

CREATE TABLE `tblinfo` (
  `id` int NOT NULL,
  `UserID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Middlename` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Birthdate` date NOT NULL,
  `Address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int NOT NULL,
  `ProductID` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProductName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` double NOT NULL,
  `Ingredients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NutritionFacts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Authentic` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fake` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int NOT NULL,
  `UserID` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblinfo`
--
ALTER TABLE `tblinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblinfo`
--
ALTER TABLE `tblinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
