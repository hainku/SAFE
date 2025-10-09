-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 02:35 PM
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
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Email` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `Category` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Ingredients` varchar(500) NOT NULL,
  `NutritionFacts` varchar(500) NOT NULL,
  `Image` varchar(300) NOT NULL,
  `DateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `ProductID`, `ProductName`, `Description`, `Category`, `Price`, `Ingredients`, `NutritionFacts`, `Image`, `DateAdded`) VALUES
(4, 'PRODUCT-TNQY1', 'Oatmeal', 'Oatmeal is a warm, hearty dish made from oats that are boiled in water or milk. It’s a versatile, wholesome, and nutrient-rich breakfast staple known for its creamy texture and mild nutty flavor. Oatmeal is valued for being filling, heart-healthy, and a great source of complex carbohydrates, fiber, and essential nutrients.', 'Beverages', 50, 'Ingredients (for plain oatmeal)\r\n\r\n100% Whole grain rolled oats (or steel-cut/instant oats)\r\n\r\nWater or milk (for cooking)\r\n\r\nOptional: pinch of salt\r\n\r\n(When flavored or instant oatmeal: sugar, dried fruits, flavorings, or spices may be added depending on the product.)', 'Nutrition Facts (per 1 cup cooked oatmeal, ~234g, made with water)\r\nNutrient	Amount\r\nCalories	~154 kcal\r\nCarbohydrates	27 g\r\nDietary Fiber	4 g\r\nProtein	6 g\r\nFat	3 g\r\nSaturated Fat	0.5 g\r\nSugar	1 g (naturally occurring)\r\nIron	~2 mg (10% DV)\r\nMagnesium	~63 mg (15% DV)\r\nPotassium	~164 mg\r\nSodium	~115 mg (if salt added)\r\nCholesterol	0 mg', '', '2025-09-21'),
(5, 'PRODUCT-REKL9', 'Peanut Butter', 'Peanut butter is a creamy or crunchy spread made from ground roasted peanuts. It’s popular worldwide as a snack or breakfast food, often spread on bread, toast, or used in smoothies and baked goods. Peanut butter is rich in protein, healthy fats, and essential vitamins, making it both nutritious and energy-dense.', 'Others', 150, 'Ingredients (for natural peanut butter)\r\n\r\nRoasted peanuts\r\n\r\nSalt (optional)\r\n\r\nA little oil (optional, usually peanut oil or palm oil in commercial brands)\r\n\r\nSugar (optional, depending on brand)', 'Nutrition Facts (per 2 tbsp, ~32g)\r\nNutrient	Amount\r\nCalories	~190 kcal\r\nCarbohydrates	7 g\r\nDietary Fiber	2 g\r\nProtein	8 g\r\nFat	16 g\r\nSaturated Fat	3 g\r\nSugar	3 g\r\nIron	~0.6 mg\r\nMagnesium	~49 mg\r\nPotassium	~208 mg\r\nSodium	~150 mg (varies by brand)\r\nCholesterol	0 mg', '', '2025-09-21'),
(6, 'PRODUCT-NOHC0', 'Yogurt', 'Greek yogurt is a thick, creamy dairy product made by straining regular yogurt to remove excess whey. This process results in a rich texture and higher protein content compared to regular yogurt. It’s commonly eaten as a snack, breakfast, or used in smoothies, desserts, and savory dishes.', 'Dairy', 200, 'Ingredients (plain Greek yogurt)\r\n\r\nPasteurized milk\r\n\r\nLive active cultures (probiotics)', 'Nutrition Facts (per 1 cup, ~245g, plain nonfat)\r\nNutrient	Amount\r\nCalories	~100 kcal\r\nCarbohydrates	6 g\r\nDietary Fiber	0 g\r\nProtein	17 g\r\nFat	0 g (nonfat) / ~10 g (whole milk version)\r\nSaturated Fat	0 g (nonfat) / ~7 g (whole milk version)\r\nSugar	6 g (natural milk sugars)\r\nCalcium	~187 mg\r\nPotassium	~240 mg\r\nSodium	~61 mg\r\nCholesterol	0 mg (nonfat)', '', '2025-09-21'),
(8, 'PRODUCT-Z4E0R', 'Almond Butter', 'Almond butter is a smooth, creamy spread made from roasted almonds. It’s a nutritious alternative to peanut butter, offering healthy fats, protein, and essential vitamins. It can be enjoyed on toast, in smoothies, or as a dip for fruits and vegetables.', 'Dairy', 300, 'Ingredients (natural almond butter)\r\n\r\nDry roasted almonds\r\n\r\n(Optional) Sea salt', 'Nutrition Facts (per 2 tbsp, ~32g)\r\nNutrient	Amount\r\nCalories	~190 kcal\r\nCarbohydrates	7 g\r\nDietary Fiber	3 g\r\nProtein	7 g\r\nFat	16 g\r\nSaturated Fat	1.5 g\r\nSugar	1 g (natural)\r\nCalcium	~80 mg\r\nIron	~1.1 mg\r\nMagnesium	~90 mg\r\nPotassium	~210 mg\r\nSodium	0–60 mg (depends on added salt)', '', '2025-09-21'),
(10, 'PRODUCT-L3SXZ', 'Coca Cola', 'Coca-Cola is one of the world’s most popular carbonated soft drinks, known for its refreshing taste and distinctive caramel flavor. First introduced in 1886, it has become an iconic beverage enjoyed worldwide. Often consumed chilled, it pairs with meals, snacks, or as a quick refreshment.', 'Others', 50, 'Ingredients (varies slightly by country) Carbonated water High fructose corn syrup (or sugar) Caramel color Phosphoric acid Natural flavors (including caffeine) Caffeine', '', '', '2025-09-21'),
(11, 'PRODUCT-NB8I4', 'u', 'u', '', 67, 'yuyuy', 'asas', 'PRODUCT-NB8I4.jpg', '2025-09-25'),
(12, 'PRODUCT-WEKTQ', 'Test', 'Test', 'Snacks', 49, 'test', 'Test', 'PRODUCT-WEKTQ.webp', '2025-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tblqrcode`
--

CREATE TABLE `tblqrcode` (
  `id` int(11) NOT NULL,
  `ProductID` varchar(50) NOT NULL,
  `ProductCode` varchar(100) NOT NULL,
  `DateGenerated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblqrcode`
--

INSERT INTO `tblqrcode` (`id`, `ProductID`, `ProductCode`, `DateGenerated`) VALUES
(1, 'PRODUCT-REKL9', 'PRODUCT-REKL92510011020581y7iTg', '2025-10-01 10:20:59'),
(2, 'PRODUCT-REKL9', 'PRODUCT-REKL92510011020582IlfS8', '2025-10-01 10:20:59'),
(3, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R25100509534913Qtlj', '2025-10-05 09:53:49'),
(4, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R2510050953492q3yix', '2025-10-05 09:53:49'),
(5, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R2510050953493m7lOG', '2025-10-05 09:53:49'),
(6, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R2510050953494PAd6p', '2025-10-05 09:53:49'),
(7, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R2510050953495hNR6b', '2025-10-05 09:53:49'),
(8, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R2510050953496XlmHX', '2025-10-05 09:53:49'),
(9, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R2510050953497NStCl', '2025-10-05 09:53:49'),
(10, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R25100509534988lPQb', '2025-10-05 09:53:49'),
(11, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R2510050953499JrRZQ', '2025-10-05 09:53:49'),
(12, 'PRODUCT-Z4E0R', 'PRODUCT-Z4E0R25100509534910CunVi', '2025-10-05 09:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblscanhistory`
--

CREATE TABLE `tblscanhistory` (
  `id` int(11) NOT NULL,
  `ProductCode` varchar(100) NOT NULL,
  `DateScanned` datetime NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblscanhistory`
--

INSERT INTO `tblscanhistory` (`id`, `ProductCode`, `DateScanned`, `Status`) VALUES
(1, 'PRODUCT-L3SXZ2509230114103eqkWj', '2025-09-25 07:25:02', 1),
(2, 'PRODUCT-REKL92509210809332YMwFm', '2025-09-25 07:25:16', 1),
(3, 'https://www.ncsc.admin.ch', '2025-09-25 07:25:46', 0),
(4, 'PRODUCT-REKL92509210809331VvSDY', '2025-09-25 08:12:44', 1),
(5, 'PRODUCT-REKL92509210809331VvSDY', '2025-09-25 08:12:44', 1),
(6, 'http://commons.wikimedia.org/wiki/Main_Page', '2025-09-25 08:13:05', 0),
(7, 'PRODUCT-REKL92509210809331VvSDY', '2025-09-25 08:17:04', 1),
(8, 'http://commons.wikimedia.org/wiki/Main_Page', '2025-09-25 08:17:15', 0),
(9, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:48:23', 1),
(10, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:48:24', 1),
(11, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:48:33', 1),
(12, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:48:41', 1),
(13, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:48:42', 1),
(14, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:48:42', 1),
(15, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:49:28', 1),
(16, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:49:35', 1),
(17, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:49:35', 1),
(18, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:56:08', 1),
(19, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 02:56:16', 1),
(20, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:04:03', 1),
(21, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:05:37', 1),
(22, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:07:49', 1),
(23, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:14:41', 1),
(24, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:15:27', 1),
(25, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:24:57', 1),
(26, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:25:10', 1),
(27, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:25:45', 1),
(28, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:27:12', 1),
(29, 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-26 03:36:25', 1),
(30, 'abcdefg', '2025-09-26 03:52:30', 0),
(31, 'PRODUCT-REKL92510011020581y7iTg', '2025-10-01 13:08:13', 1),
(32, 'PRODUCT-Z4E0R25100509534913Qtlj', '2025-10-05 11:48:33', 1),
(33, 'http://qrtiger.com', '2025-10-05 11:50:46', 0),
(34, 'http://qrtiger.com', '2025-10-05 12:11:42', 0);

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
(1, 'USER-MO8FB', 'sarahtest', '1234', 'admin', 1),
(2, 'USER-K92LT', 'USER-K92LT', 'Jane', 'clerk', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tblscanhistory`
--
ALTER TABLE `tblscanhistory`
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
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblhistory`
--
ALTER TABLE `tblhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblinfo`
--
ALTER TABLE `tblinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblqrcode`
--
ALTER TABLE `tblqrcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblscanhistory`
--
ALTER TABLE `tblscanhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
