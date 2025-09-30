-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2025 at 01:40 PM
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
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Birthdate` date NOT NULL,
  `Address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblinfo`
--

INSERT INTO `tblinfo` (`id`, `UserID`, `Lastname`, `Firstname`, `Middlename`, `Email`, `Birthdate`, `Address`, `Contact`, `DateAdded`) VALUES
(1, 'USER-MO8FB', 'Sarah', 'Jane', 'Test', '', '2025-09-19', 'Just testing', '09636816736', '2025-09-26 03:26:17'),
(2, 'USER-RWXZ4', 'Delacruz', 'Juan', 'Cruz', 'jdc@gmwil.com', '2025-09-30', 'Lipa city', '091111111111', '2025-09-30 04:51:47');

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
  `Image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateAdded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`id`, `ProductID`, `ProductName`, `Description`, `Price`, `Ingredients`, `NutritionFacts`, `Image`, `DateAdded`) VALUES
(4, 'PRODUCT-TNQY1', 'Oatmeal', 'Oatmeal is a warm, hearty dish made from oats that are boiled in water or milk. It’s a versatile, wholesome, and nutrient-rich breakfast staple known for its creamy texture and mild nutty flavor. Oatmeal is valued for being filling, heart-healthy, and a great source of complex carbohydrates, fiber, and essential nutrients.', 50, 'Ingredients (for plain oatmeal)\r\n\r\n100% Whole grain rolled oats (or steel-cut/instant oats)\r\n\r\nWater or milk (for cooking)\r\n\r\nOptional: pinch of salt\r\n\r\n(When flavored or instant oatmeal: sugar, dried fruits, flavorings, or spices may be added depending on the product.)', 'Nutrition Facts (per 1 cup cooked oatmeal, ~234g, made with water)\r\nNutrient	Amount\r\nCalories	~154 kcal\r\nCarbohydrates	27 g\r\nDietary Fiber	4 g\r\nProtein	6 g\r\nFat	3 g\r\nSaturated Fat	0.5 g\r\nSugar	1 g (naturally occurring)\r\nIron	~2 mg (10% DV)\r\nMagnesium	~63 mg (15% DV)\r\nPotassium	~164 mg\r\nSodium	~115 mg (if salt added)\r\nCholesterol	0 mg', '', '2025-09-21'),
(5, 'PRODUCT-REKL9', 'Peanut Butter', 'Peanut butter is a creamy or crunchy spread made from ground roasted peanuts. It’s popular worldwide as a snack or breakfast food, often spread on bread, toast, or used in smoothies and baked goods. Peanut butter is rich in protein, healthy fats, and essential vitamins, making it both nutritious and energy-dense.', 150, 'Ingredients (for natural peanut butter)\r\n\r\nRoasted peanuts\r\n\r\nSalt (optional)\r\n\r\nA little oil (optional, usually peanut oil or palm oil in commercial brands)\r\n\r\nSugar (optional, depending on brand)', 'Nutrition Facts (per 2 tbsp, ~32g)\r\nNutrient	Amount\r\nCalories	~190 kcal\r\nCarbohydrates	7 g\r\nDietary Fiber	2 g\r\nProtein	8 g\r\nFat	16 g\r\nSaturated Fat	3 g\r\nSugar	3 g\r\nIron	~0.6 mg\r\nMagnesium	~49 mg\r\nPotassium	~208 mg\r\nSodium	~150 mg (varies by brand)\r\nCholesterol	0 mg', '', '2025-09-21'),
(6, 'PRODUCT-NOHC0', 'Yogurt', 'Greek yogurt is a thick, creamy dairy product made by straining regular yogurt to remove excess whey. This process results in a rich texture and higher protein content compared to regular yogurt. It’s commonly eaten as a snack, breakfast, or used in smoothies, desserts, and savory dishes.', 200, 'Ingredients (plain Greek yogurt)\r\n\r\nPasteurized milk\r\n\r\nLive active cultures (probiotics)', 'Nutrition Facts (per 1 cup, ~245g, plain nonfat)\r\nNutrient	Amount\r\nCalories	~100 kcal\r\nCarbohydrates	6 g\r\nDietary Fiber	0 g\r\nProtein	17 g\r\nFat	0 g (nonfat) / ~10 g (whole milk version)\r\nSaturated Fat	0 g (nonfat) / ~7 g (whole milk version)\r\nSugar	6 g (natural milk sugars)\r\nCalcium	~187 mg\r\nPotassium	~240 mg\r\nSodium	~61 mg\r\nCholesterol	0 mg (nonfat)', '', '2025-09-21'),
(8, 'PRODUCT-Z4E0R', 'Almond Butter', 'Almond butter is a smooth, creamy spread made from roasted almonds. It’s a nutritious alternative to peanut butter, offering healthy fats, protein, and essential vitamins. It can be enjoyed on toast, in smoothies, or as a dip for fruits and vegetables.', 300, 'Ingredients (natural almond butter)\r\n\r\nDry roasted almonds\r\n\r\n(Optional) Sea salt', 'Nutrition Facts (per 2 tbsp, ~32g)\r\nNutrient	Amount\r\nCalories	~190 kcal\r\nCarbohydrates	7 g\r\nDietary Fiber	3 g\r\nProtein	7 g\r\nFat	16 g\r\nSaturated Fat	1.5 g\r\nSugar	1 g (natural)\r\nCalcium	~80 mg\r\nIron	~1.1 mg\r\nMagnesium	~90 mg\r\nPotassium	~210 mg\r\nSodium	0–60 mg (depends on added salt)', '', '2025-09-21'),
(10, 'PRODUCT-L3SXZ', 'Coca-Cola', 'Coca-Cola is one of the world’s most popular carbonated soft drinks, known for its refreshing taste and distinctive caramel flavor. First introduced in 1886, it has become an iconic beverage enjoyed worldwide. Often consumed chilled, it pairs with meals, snacks, or as a quick refreshment.', 50, 'Ingredients (varies slightly by country)\r\n\r\nCarbonated water\r\n\r\nHigh fructose corn syrup (or sugar)\r\n\r\nCaramel color\r\n\r\nPhosphoric acid\r\n\r\nNatural flavors (including caffeine)\r\n\r\nCaffeine', 'Nutrition Facts (per 12 fl oz / 355 mL can)\r\nNutrient	Amount\r\nCalories	140 kcal\r\nCarbohydrates	39 g\r\nDietary Fiber	0 g\r\nProtein	0 g\r\nTotal Fat	0 g\r\nSaturated Fat	0 g\r\nSugar	39 g\r\nSodium	45 mg\r\nCaffeine	~34 mg', '', '2025-09-21'),
(11, 'PRODUCT-NB8I4', 'u', 'u', 67, 'yuyuy', 'asas', 'PRODUCT-NB8I4.jpg', '2025-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `tblqrcode`
--

CREATE TABLE `tblqrcode` (
  `id` int NOT NULL,
  `ProductID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProductCode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateGenerated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblqrcode`
--

INSERT INTO `tblqrcode` (`id`, `ProductID`, `ProductCode`, `DateGenerated`) VALUES
(1, 'PRODUCT-REKL9', 'PRODUCT-REKL92509210809331VvSDY', '2025-09-21 08:09:35'),
(2, 'PRODUCT-REKL9', 'PRODUCT-REKL92509210809332YMwFm', '2025-09-21 08:09:35'),
(3, 'PRODUCT-REKL9', 'PRODUCT-REKL925092108093331FU4Z', '2025-09-21 08:09:35'),
(4, 'PRODUCT-REKL9', 'PRODUCT-REKL92509210809334S7C2q', '2025-09-21 08:09:35'),
(5, 'PRODUCT-REKL9', 'PRODUCT-REKL92509210809335T8xoL', '2025-09-21 08:09:35'),
(6, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ2509230114101xYjRM', '2025-09-23 13:14:27'),
(7, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ2509230114102iyX16', '2025-09-23 13:14:27'),
(8, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ2509230114103eqkWj', '2025-09-23 13:14:27'),
(9, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141045LaKk', '2025-09-23 13:14:27'),
(10, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ2509230114105GsW7R', '2025-09-23 13:14:27'),
(11, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ2509230114106GcLI0', '2025-09-23 13:14:27'),
(12, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141075nadI', '2025-09-23 13:14:27'),
(13, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141082j1ur', '2025-09-23 13:14:27'),
(14, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ2509230114109SgEPz', '2025-09-23 13:14:27'),
(15, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141010jKYpN', '2025-09-23 13:14:27'),
(16, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141011GdYQ3', '2025-09-23 13:14:27'),
(17, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141012xJ2UT', '2025-09-23 13:14:27'),
(18, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141013YXchO', '2025-09-23 13:14:27'),
(19, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410144CP9N', '2025-09-23 13:14:27'),
(20, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410153fsjc', '2025-09-23 13:14:27'),
(21, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141016a1vX9', '2025-09-23 13:14:27'),
(22, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141017ctvJA', '2025-09-23 13:14:27'),
(23, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141018RHk23', '2025-09-23 13:14:27'),
(24, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141019E2EPo', '2025-09-23 13:14:27'),
(25, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410204WkSC', '2025-09-23 13:14:27'),
(26, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141021mT3Ei', '2025-09-23 13:14:27'),
(27, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141022Yhz1b', '2025-09-23 13:14:27'),
(28, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141023orhEQ', '2025-09-23 13:14:27'),
(29, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141024nlegT', '2025-09-23 13:14:27'),
(30, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141025Lc418', '2025-09-23 13:14:27'),
(31, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141026OYeJ2', '2025-09-23 13:14:27'),
(32, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410271RYZk', '2025-09-23 13:14:27'),
(33, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141028evoRX', '2025-09-23 13:14:27'),
(34, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141029zEdyC', '2025-09-23 13:14:27'),
(35, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141030n1Xz5', '2025-09-23 13:14:27'),
(36, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141031oo8rP', '2025-09-23 13:14:27'),
(37, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141032iOYqy', '2025-09-23 13:14:27'),
(38, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141033twubn', '2025-09-23 13:14:27'),
(39, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141034CCCaf', '2025-09-23 13:14:27'),
(40, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141035a3tQr', '2025-09-23 13:14:27'),
(41, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410362p0LG', '2025-09-23 13:14:27'),
(42, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141037ybFMH', '2025-09-23 13:14:27'),
(43, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141038iAMF8', '2025-09-23 13:14:27'),
(44, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141039FXJa7', '2025-09-23 13:14:27'),
(45, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141040Kudo9', '2025-09-23 13:14:27'),
(46, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410415ADfu', '2025-09-23 13:14:27'),
(47, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141042gxw2b', '2025-09-23 13:14:27'),
(48, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141043AMCX0', '2025-09-23 13:14:27'),
(49, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410446fHF1', '2025-09-23 13:14:27'),
(50, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141045FMRh5', '2025-09-23 13:14:27'),
(51, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141046ywnA5', '2025-09-23 13:14:27'),
(52, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410473YyjJ', '2025-09-23 13:14:27'),
(53, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141048OqQQx', '2025-09-23 13:14:27'),
(54, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410492xk2Z', '2025-09-23 13:14:27'),
(55, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141050I24AY', '2025-09-23 13:14:27'),
(56, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141051oO4FK', '2025-09-23 13:14:27'),
(57, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141052z7hpA', '2025-09-23 13:14:27'),
(58, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141053RTV3b', '2025-09-23 13:14:27'),
(59, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410548E9Pm', '2025-09-23 13:14:27'),
(60, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141055i2qOF', '2025-09-23 13:14:27'),
(61, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141056y2mX3', '2025-09-23 13:14:27'),
(62, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141057iGBu2', '2025-09-23 13:14:27'),
(63, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141058ubVXf', '2025-09-23 13:14:27'),
(64, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141059vFpqZ', '2025-09-23 13:14:27'),
(65, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141060z60d4', '2025-09-23 13:14:27'),
(66, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141061yLpFc', '2025-09-23 13:14:27'),
(67, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410623Lz22', '2025-09-23 13:14:27'),
(68, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410638XHAv', '2025-09-23 13:14:27'),
(69, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141064Lle4H', '2025-09-23 13:14:27'),
(70, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141065uwLV4', '2025-09-23 13:14:27'),
(71, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141066QXGsZ', '2025-09-23 13:14:27'),
(72, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141067khzIV', '2025-09-23 13:14:27'),
(73, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410687jF4J', '2025-09-23 13:14:27'),
(74, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141069IwgCQ', '2025-09-23 13:14:27'),
(75, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141070ENsNP', '2025-09-23 13:14:27'),
(76, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141071yAoIo', '2025-09-23 13:14:27'),
(77, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141072ebAqu', '2025-09-23 13:14:27'),
(78, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141073W1jdf', '2025-09-23 13:14:27'),
(79, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141074dCqsS', '2025-09-23 13:14:27'),
(80, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141075KBdQt', '2025-09-23 13:14:27'),
(81, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ2509230114107635yxX', '2025-09-23 13:14:27'),
(82, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141077LWSVI', '2025-09-23 13:14:27'),
(83, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141078Vdyar', '2025-09-23 13:14:27'),
(84, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141079Jjkj1', '2025-09-23 13:14:27'),
(85, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141080a1Nr8', '2025-09-23 13:14:27'),
(86, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141081KUK0D', '2025-09-23 13:14:27'),
(87, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141082lFMNX', '2025-09-23 13:14:27'),
(88, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410833neFg', '2025-09-23 13:14:27'),
(89, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141084dFex1', '2025-09-23 13:14:27'),
(90, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141085iG0w6', '2025-09-23 13:14:27'),
(91, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141086im5JT', '2025-09-23 13:14:27'),
(92, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141087JtYvp', '2025-09-23 13:14:27'),
(93, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141088iqdCK', '2025-09-23 13:14:27'),
(94, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141089EhhCz', '2025-09-23 13:14:27'),
(95, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141090O82yr', '2025-09-23 13:14:27'),
(96, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141091ODbKp', '2025-09-23 13:14:27'),
(97, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141092NriLz', '2025-09-23 13:14:27'),
(98, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141093tr9Za', '2025-09-23 13:14:27'),
(99, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141094Kx41A', '2025-09-23 13:14:27'),
(100, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141095OoGQY', '2025-09-23 13:14:27'),
(101, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141096rqF9k', '2025-09-23 13:14:27'),
(102, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141097ROSum', '2025-09-23 13:14:27'),
(103, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ25092301141098Uok7I', '2025-09-23 13:14:27'),
(104, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410991lBml', '2025-09-23 13:14:27'),
(105, 'PRODUCT-L3SXZ', 'PRODUCT-L3SXZ250923011410100ISnZZ', '2025-09-23 13:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblscanhistory`
--

CREATE TABLE `tblscanhistory` (
  `id` int NOT NULL,
  `ProductCode` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateScanned` datetime NOT NULL,
  `Status` int NOT NULL
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
(30, 'abcdefg', '2025-09-26 03:52:30', 0);

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
(1, 'USER-MO8FB', 'sarahtest', '1234', 'admin', 1),
(2, 'USER-RWXZ4', 'USER-RWXZ4', 'Juan', 'clerk', 1);

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
-- AUTO_INCREMENT for table `tblhistory`
--
ALTER TABLE `tblhistory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblinfo`
--
ALTER TABLE `tblinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblqrcode`
--
ALTER TABLE `tblqrcode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tblscanhistory`
--
ALTER TABLE `tblscanhistory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
