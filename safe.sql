-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2025 at 08:10 AM
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
  `ProductCode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `Description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` double NOT NULL,
  `Ingredients` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NutritionFacts` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `ProductID`, `ProductName`, `Description`, `Price`, `Ingredients`, `NutritionFacts`, `DateAdded`) VALUES
(4, 'PRODUCT-TNQY1', 'Oatmeal', 'Oatmeal is a warm, hearty dish made from oats that are boiled in water or milk. It’s a versatile, wholesome, and nutrient-rich breakfast staple known for its creamy texture and mild nutty flavor. Oatmeal is valued for being filling, heart-healthy, and a great source of complex carbohydrates, fiber, and essential nutrients.', 50, 'Ingredients (for plain oatmeal)\r\n\r\n100% Whole grain rolled oats (or steel-cut/instant oats)\r\n\r\nWater or milk (for cooking)\r\n\r\nOptional: pinch of salt\r\n\r\n(When flavored or instant oatmeal: sugar, dried fruits, flavorings, or spices may be added depending on the product.)', 'Nutrition Facts (per 1 cup cooked oatmeal, ~234g, made with water)\r\nNutrient	Amount\r\nCalories	~154 kcal\r\nCarbohydrates	27 g\r\nDietary Fiber	4 g\r\nProtein	6 g\r\nFat	3 g\r\nSaturated Fat	0.5 g\r\nSugar	1 g (naturally occurring)\r\nIron	~2 mg (10% DV)\r\nMagnesium	~63 mg (15% DV)\r\nPotassium	~164 mg\r\nSodium	~115 mg (if salt added)\r\nCholesterol	0 mg', '2025-09-21'),
(5, 'PRODUCT-REKL9', 'Peanut Butter', 'Peanut butter is a creamy or crunchy spread made from ground roasted peanuts. It’s popular worldwide as a snack or breakfast food, often spread on bread, toast, or used in smoothies and baked goods. Peanut butter is rich in protein, healthy fats, and essential vitamins, making it both nutritious and energy-dense.', 150, 'Ingredients (for natural peanut butter)\r\n\r\nRoasted peanuts\r\n\r\nSalt (optional)\r\n\r\nA little oil (optional, usually peanut oil or palm oil in commercial brands)\r\n\r\nSugar (optional, depending on brand)', 'Nutrition Facts (per 2 tbsp, ~32g)\r\nNutrient	Amount\r\nCalories	~190 kcal\r\nCarbohydrates	7 g\r\nDietary Fiber	2 g\r\nProtein	8 g\r\nFat	16 g\r\nSaturated Fat	3 g\r\nSugar	3 g\r\nIron	~0.6 mg\r\nMagnesium	~49 mg\r\nPotassium	~208 mg\r\nSodium	~150 mg (varies by brand)\r\nCholesterol	0 mg', '2025-09-21'),
(6, 'PRODUCT-NOHC0', 'Yogurt', 'Greek yogurt is a thick, creamy dairy product made by straining regular yogurt to remove excess whey. This process results in a rich texture and higher protein content compared to regular yogurt. It’s commonly eaten as a snack, breakfast, or used in smoothies, desserts, and savory dishes.', 200, 'Ingredients (plain Greek yogurt)\r\n\r\nPasteurized milk\r\n\r\nLive active cultures (probiotics)', 'Nutrition Facts (per 1 cup, ~245g, plain nonfat)\r\nNutrient	Amount\r\nCalories	~100 kcal\r\nCarbohydrates	6 g\r\nDietary Fiber	0 g\r\nProtein	17 g\r\nFat	0 g (nonfat) / ~10 g (whole milk version)\r\nSaturated Fat	0 g (nonfat) / ~7 g (whole milk version)\r\nSugar	6 g (natural milk sugars)\r\nCalcium	~187 mg\r\nPotassium	~240 mg\r\nSodium	~61 mg\r\nCholesterol	0 mg (nonfat)', '2025-09-21'),
(8, 'PRODUCT-Z4E0R', 'Almond Butter', 'Almond butter is a smooth, creamy spread made from roasted almonds. It’s a nutritious alternative to peanut butter, offering healthy fats, protein, and essential vitamins. It can be enjoyed on toast, in smoothies, or as a dip for fruits and vegetables.', 300, 'Ingredients (natural almond butter)\r\n\r\nDry roasted almonds\r\n\r\n(Optional) Sea salt', 'Nutrition Facts (per 2 tbsp, ~32g)\r\nNutrient	Amount\r\nCalories	~190 kcal\r\nCarbohydrates	7 g\r\nDietary Fiber	3 g\r\nProtein	7 g\r\nFat	16 g\r\nSaturated Fat	1.5 g\r\nSugar	1 g (natural)\r\nCalcium	~80 mg\r\nIron	~1.1 mg\r\nMagnesium	~90 mg\r\nPotassium	~210 mg\r\nSodium	0–60 mg (depends on added salt)', '2025-09-21'),
(10, 'PRODUCT-L3SXZ', 'Coca-Cola', 'Coca-Cola is one of the world’s most popular carbonated soft drinks, known for its refreshing taste and distinctive caramel flavor. First introduced in 1886, it has become an iconic beverage enjoyed worldwide. Often consumed chilled, it pairs with meals, snacks, or as a quick refreshment.', 50, 'Ingredients (varies slightly by country)\r\n\r\nCarbonated water\r\n\r\nHigh fructose corn syrup (or sugar)\r\n\r\nCaramel color\r\n\r\nPhosphoric acid\r\n\r\nNatural flavors (including caffeine)\r\n\r\nCaffeine', 'Nutrition Facts (per 12 fl oz / 355 mL can)\r\nNutrient	Amount\r\nCalories	140 kcal\r\nCarbohydrates	39 g\r\nDietary Fiber	0 g\r\nProtein	0 g\r\nTotal Fat	0 g\r\nSaturated Fat	0 g\r\nSugar	39 g\r\nSodium	45 mg\r\nCaffeine	~34 mg', '2025-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `tblqrcode`
--

CREATE TABLE `tblqrcode` (
  `id` int NOT NULL,
  `ProductID` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ProductCode` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `DateGenerated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblqrcode`
--

INSERT INTO `tblqrcode` (`id`, `ProductID`, `ProductCode`, `DateGenerated`) VALUES
(1, 'PRODUCT-REKL9', 'PRODUCT-REKL92509210809331VvSDY', '2025-09-21 08:09:35'),
(2, 'PRODUCT-REKL9', 'PRODUCT-REKL92509210809332YMwFm', '2025-09-21 08:09:35'),
(3, 'PRODUCT-REKL9', 'PRODUCT-REKL925092108093331FU4Z', '2025-09-21 08:09:35'),
(4, 'PRODUCT-REKL9', 'PRODUCT-REKL92509210809334S7C2q', '2025-09-21 08:09:35'),
(5, 'PRODUCT-REKL9', 'PRODUCT-REKL92509210809335T8xoL', '2025-09-21 08:09:35');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblinfo`
--
ALTER TABLE `tblinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblqrcode`
--
ALTER TABLE `tblqrcode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
