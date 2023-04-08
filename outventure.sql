-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2023 at 01:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `outventure`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductThumbnail` varchar(255) DEFAULT NULL,
  `BuyQuantity` int(11) DEFAULT NULL,
  `ProductSize` varchar(255) DEFAULT NULL,
  `ProductColor` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `ProductPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `ProductName`, `ProductThumbnail`, `BuyQuantity`, `ProductSize`, `ProductColor`, `CategoryName`, `SubCategoryName`, `Username`, `ProductPrice`) VALUES
(1, 'asdadaas', NULL, 2, 'xdxxf', 'xdxdds', '1', 'asd', 'elvis', 123),
(2, 'asdaas', NULL, 3, 'xdxf', 'xdxdds', '1', 'assss', 'elvis', 23),
(3, 'dllm', NULL, 4, 'dllm', 'dllm', '1', 'dllm', 'elvis', 55),
(4, 'xdxd', NULL, 2, 'xdxd', 'xdxd', '1', 'xdxd', 'tony', 77);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryName`) VALUES
('1');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `ImageID` int(11) NOT NULL,
  `ImagePath` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ImageID`, `ImagePath`, `ProductName`) VALUES
(27, 'uploads/IMG-64304a6920d892.15230912.jpg', 'Lowe alpine Sirac 65L 男款登山露營背囊'),
(28, 'uploads/IMG-64304a6921afc8.27412156.jpg', 'Lowe alpine Sirac 65L 男款登山露營背囊');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductDescription` varchar(255) DEFAULT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductThumbnail` varchar(255) DEFAULT NULL,
  `ProductQuantity` int(11) DEFAULT NULL,
  `ProductSize` varchar(255) DEFAULT NULL,
  `ProductColor` varchar(255) DEFAULT NULL,
  `PositiveVote` int(11) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `ProductDescription`, `ProductPrice`, `ProductThumbnail`, `ProductQuantity`, `ProductSize`, `ProductColor`, `PositiveVote`, `CategoryName`, `SubCategoryName`) VALUES
(42, 'Lowe alpine Sirac 65L 男款登山露營背囊', 'The Sirac 65 is ideal for long backpacking trips and self-sufficient treks over difficult terrain.', 0, '', 100, 'XL', 'Blacks', NULL, NULL, ''),
(43, 'ASd', 'asdasdasdasdasdasda', 123, NULL, 12, 'xd', 'xd', NULL, '1', 'asd'),
(44, 'Tony', 'TOnyas', 22, NULL, 999, 'xdgf', 'asdq', NULL, '1', 'asds');

-- --------------------------------------------------------

--
-- Table structure for table `SubCategories`
--

CREATE TABLE `SubCategories` (
  `SubCategoryID` int(11) NOT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `SubCategories`
--

INSERT INTO `SubCategories` (`SubCategoryID`, `SubCategoryName`, `CategoryName`) VALUES
(1, 'Hiking', 'Backpack');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`, `isAdmin`) VALUES
(1, 'Shirosss', '12@1.com', '12345678', 0),
(2, 'Kuro', '2@1.com', '12345678', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryName`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `SubCategories`
--
ALTER TABLE `SubCategories`
  ADD PRIMARY KEY (`SubCategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `SubCategories`
--
ALTER TABLE `SubCategories`
  MODIFY `SubCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryName`) REFERENCES `categories` (`CategoryName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
