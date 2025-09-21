-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2025 at 06:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `id` int(11) NOT NULL,
  `ProductID` varchar(30) NOT NULL,
  `ProductCode` varchar(50) NOT NULL,
  `DateScanned` datetime NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblinfo`
--

CREATE TABLE `tblinfo` (
  `id` int(11) NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Middlename` varchar(30) NOT NULL,
  `Birthdate` date NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `id` int(11) NOT NULL,
  `ProductID` varchar(30) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Price` double NOT NULL,
  `Ingredients` varchar(500) NOT NULL,
  `NutritionFacts` varchar(500) NOT NULL,
  `DateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `ProductID`, `ProductName`, `Description`, `Price`, `Ingredients`, `NutritionFacts`, `DateAdded`) VALUES
(4, 'PRODUCT-TNQY1', 'Oatmeal', 'Oatmeal is a warm, hearty dish made from oats that are boiled in water or milk. It’s a versatile, wholesome, and nutrient-rich breakfast staple known for its creamy texture and mild nutty flavor. Oatmeal is valued for being filling, heart-healthy, and a great source of complex carbohydrates, fiber, and essential nutrients.', 50, 'Ingredients (for plain oatmeal)\r\n\r\n100% Whole grain rolled oats (or steel-cut/instant oats)\r\n\r\nWater or milk (for cooking)\r\n\r\nOptional: pinch of salt\r\n\r\n(When flavored or instant oatmeal: sugar, dried fruits, flavorings, or spices may be added depending on the product.)', 'Nutrition Facts (per 1 cup cooked oatmeal, ~234g, made with water)\r\nNutrient	Amount\r\nCalories	~154 kcal\r\nCarbohydrates	27 g\r\nDietary Fiber	4 g\r\nProtein	6 g\r\nFat	3 g\r\nSaturated Fat	0.5 g\r\nSugar	1 g (naturally occurring)\r\nIron	~2 mg (10% DV)\r\nMagnesium	~63 mg (15% DV)\r\nPotassium	~164 mg\r\nSodium	~115 mg (if salt added)\r\nCholesterol	0 mg', '2025-09-21'),
(5, 'PRODUCT-REKL9', 'Peanut Butter', 'Peanut butter is a creamy or crunchy spread made from ground roasted peanuts. It’s popular worldwide as a snack or breakfast food, often spread on bread, toast, or used in smoothies and baked goods. Peanut butter is rich in protein, healthy fats, and essential vitamins, making it both nutritious and energy-dense.', 150, 'Ingredients (for natural peanut butter)\r\n\r\nRoasted peanuts\r\n\r\nSalt (optional)\r\n\r\nA little oil (optional, usually peanut oil or palm oil in commercial brands)\r\n\r\nSugar (optional, depending on brand)', 'Nutrition Facts (per 2 tbsp, ~32g)\r\nNutrient	Amount\r\nCalories	~190 kcal\r\nCarbohydrates	7 g\r\nDietary Fiber	2 g\r\nProtein	8 g\r\nFat	16 g\r\nSaturated Fat	3 g\r\nSugar	3 g\r\nIron	~0.6 mg\r\nMagnesium	~49 mg\r\nPotassium	~208 mg\r\nSodium	~150 mg (varies by brand)\r\nCholesterol	0 mg', '2025-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `tblqrcode`
--

CREATE TABLE `tblqrcode` (
  `id` int(11) NOT NULL,
  `ProductID` varchar(50) NOT NULL,
  `ProductCode` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblqrcode`
--

INSERT INTO `tblqrcode` (`id`, `ProductID`, `ProductCode`) VALUES
(1, 'PRODUCT-P1C60', 0),
(2, 'PRODUCT-0HY8G', 7),
(3, 'PRODUCT-VZY4S', 0),
(4, 'PRODUCT-TNQY1', 0),
(5, 'PRODUCT-REKL9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `UserID` varchar(15) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `UserID`, `Username`, `Password`, `Role`, `Status`) VALUES
(1, 'Sarah123', 'sarahtest', '1234', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblhistory`
--
ALTER TABLE `tblhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinfo`
--
ALTER TABLE `tblinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblqrcode`
--
ALTER TABLE `tblqrcode`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tblhistory`
--
ALTER TABLE `tblhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblinfo`
--
ALTER TABLE `tblinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblqrcode`
--
ALTER TABLE `tblqrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
