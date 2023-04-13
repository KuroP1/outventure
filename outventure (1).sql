-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2023 at 11:20 PM
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
  `ProductPrice` int(11) DEFAULT NULL,
  `BuyQuantity` int(11) DEFAULT NULL,
  `ProductSize` varchar(255) DEFAULT NULL,
  `ProductColor` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `ProductName`, `ProductPrice`, `BuyQuantity`, `ProductSize`, `ProductColor`, `CategoryName`, `SubCategoryName`, `Username`) VALUES
(13, 'Elvis77', 3000, 3, 'XXL', 'Blue', 'TonyON99', 'Elvis', 'Kuro');

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
('Backpack'),
('Swimming'),
('TonyON99'),
('towel');

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `CommentID` int(11) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`CommentID`, `Comments`, `Username`, `ProductName`) VALUES
(1, 'asdadsasdasad', 'Kuro', 'Elvis77');

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
(110, '../uploads/IMG-643805a5072395.21084134.png', 'sdf'),
(111, '../uploads/IMG-643805a507c9c4.79727093.png', 'sdf'),
(114, '../uploads/IMG-643811003e1cd7.33205468.png', 'Lowe alpine Sirac 65L 男款登山露營背囊'),
(115, '../uploads/IMG-643811003e9993.55300382.png', 'Lowe alpine Sirac 65L 男款登山露營背囊'),
(116, '../uploads/IMG-643811003f1350.41432487.png', 'Lowe alpine Sirac 65L 男款登山露營背囊'),
(117, '../uploads/IMG-6438110c003164.25967924.png', 'Elvis77'),
(118, '../uploads/IMG-64381113b6edd8.78113713.png', 'asdasd'),
(119, '../uploads/IMG-64381113b77566.91365303.jpg', 'asdasd'),
(120, '../uploads/IMG-643811ade7a567.94444635.png', 'qweqwe '),
(121, '../uploads/IMG-643811ade86cc9.07853810.png', 'qweqwe ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderID` int(11) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `orderStatus` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Amount` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `BuyQuantity` int(11) NOT NULL,
  `ProductColor` varchar(255) NOT NULL,
  `ProductSize` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `OrderDate`, `OrderID`, `paymentMethod`, `orderStatus`, `Username`, `address`, `Amount`, `ProductName`, `BuyQuantity`, `ProductColor`, `ProductSize`) VALUES
(22, '2023-04-13', 400085, 'Alipay', 'Pending', 'Kuro', 'Central and Western,asd,qwe,qwe,qwe', 4000, 'Lowe alpine Sirac 65L 男款登山露營背囊', 2, 'Black', 'M'),
(23, '2023-04-13', 205962, 'Alipay', 'Pending', 'Kuro', 'Central and Western,asd,qwe,qwe,qwe', 6000, 'Lowe alpine Sirac 65L 男款登山露營背囊', 3, 'Black', 'XL'),
(24, '2023-04-13', 420137, 'FPS', 'Pending', 'Kuro', 'Central and Western,123,123,123,123', 200, 'qweqwe', 2, 'Blue', 'L'),
(25, '2023-04-13', 194350, 'FPS', 'Pending', 'Kuro', 'Central and Western,123,123,123,123', 100, 'qweqwe', 1, 'Black', 'S'),
(26, '2023-04-13', 967799, 'Cash On Delivery', 'Pending', 'Kuro', 'Central and Western,12312313,123123,123123123,1231231', 300, 'asdasd', 3, 'Blue', 'XL'),
(27, '2023-04-13', 961231, 'PayMe', 'Pending', 'Shiro', 'Islands,asd,A,1,2A', 4000, 'Lowe alpine Sirac 65L 男款登山露營背囊', 2, 'Blue', 'M'),
(28, '2023-04-13', 645981, 'PayMe', 'Processing', 'Shiro', 'Islands,asd,A,1,2A', 5000, 'Elvis77', 5, 'Blue', 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductDescription` varchar(255) DEFAULT NULL,
  `ProductPrice` int(11) DEFAULT NULL,
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

INSERT INTO `products` (`ProductID`, `ProductName`, `ProductDescription`, `ProductPrice`, `ProductQuantity`, `ProductSize`, `ProductColor`, `PositiveVote`, `CategoryName`, `SubCategoryName`) VALUES
(53, 'Lowe alpine Sirac 65L 男款登山露營背囊', 'qwopeyqwuiedjhvhjkgkjgjkhg ', 2000, 994, 'S, M, L, XL', 'Blue, Black, White', 0, 'Swimming', 'Swimsuit'),
(54, 'Elvis77', 'Elvis77Elvis77Elvis77Elvis77Elvis77Elvis77Elvis77Elvis77Elvis77Elvis77  ', 1000, 95, 'XXL', 'Blue', 0, 'TonyON99', 'Elvis'),
(55, 'asdasd', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd  ', 100, 100, 'XL', 'Blue', 0, 'Backpack', 'Elvis'),
(56, 'qweqwe ', 'ASad asd asd nmvasdgfg', 100, 100, 'S, M, L, XL', 'Blue, Black, White', 0, 'Swimming', 'Tony');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `SubCategoryID` int(11) NOT NULL,
  `SubCategoryName` varchar(255) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`SubCategoryID`, `SubCategoryName`, `CategoryName`) VALUES
(1, 'Hiking', 'Backpack'),
(2, 'Swimsuit', 'Swimming'),
(3, 'Casual', 'Backpack'),
(18, 'Elvis', 'Backpack'),
(19, 'Tony', 'Swimming'),
(20, 'hello', 'TonyON99'),
(21, 'Elvis', 'TonyON99'),
(22, 'wet', 'towel');

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
(1, 'Shiro', 'shiro123@gmail.com', '12345678', 0),
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
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`ImageID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`SubCategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `SubCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryName`) REFERENCES `categories` (`CategoryName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;