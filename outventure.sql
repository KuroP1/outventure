-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 08:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
('Cookwear'),
('Tent');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `CommentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `Comment`, `Username`, `ProductName`, `CommentDate`) VALUES
(1, 'asdadsasdasad', 'Kuro', 'Elvis77', '2023-04-14'),
(2, 'asdasdasdasfafsdsgseg', 'Kuro', 'Elvis77', '2023-04-15'),
(3, 'asdasda', 'root', 'Elvis77', '2023-04-14'),
(4, 'asdadsasdasdads', 'root', 'Elvis77', '2023-04-14'),
(5, 'NIGGEr\r\n', 'root', 'Elvis77', '2023-04-14'),
(6, 'NIGGGGG', 'root', 'Elvis77', '2023-04-14'),
(7, 'NIGGGGG', 'root', 'Elvis77', '2023-04-14'),
(8, 'dllm', 'root', 'Elvis77', '2023-04-14'),
(9, 'bo', 'root', 'Elvis77', '2023-04-14'),
(10, 'This is good', 'BoGor918', 'EVERNEW TITANIUM MUG POT 900 ECA267R', '2023-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `FavouriteID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`FavouriteID`, `Username`, `ProductName`) VALUES
(34, 'Kuro', 'Elvis77'),
(36, 'BoGor918', 'EXPED Lightning 45 Backpack'),
(37, 'BoGor918', 'Lowe alpine Eclipse 35 Daypack'),
(38, 'BoGor918', 'Gregory LITTLE STEPS DAY'),
(39, 'BoGor918', 'AMEISEYE Aquarius 40L');

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
(129, '../uploads/IMG-6438e54d70eaa9.72813195.jpg', 'EXPED Lightning 45 Backpack'),
(130, '../uploads/IMG-6438e54d71cd66.83807341.jpg', 'EXPED Lightning 45 Backpack'),
(131, '../uploads/IMG-6438e54d727157.72333363.jpg', 'EXPED Lightning 45 Backpack'),
(132, '../uploads/IMG-6438e54d72ea98.77572261.jpg', 'EXPED Lightning 45 Backpack'),
(133, '../uploads/IMG-6438e54d737b91.33810119.jpg', 'EXPED Lightning 45 Backpack'),
(137, '../uploads/IMG-6438e6af3d6d02.01554140.jpg', 'Karrimor SF Nordic ODIN 75L Rucksack'),
(138, '../uploads/IMG-6438e6af3e3606.28900550.jpg', 'Karrimor SF Nordic ODIN 75L Rucksack'),
(139, '../uploads/IMG-6438e76f5a2fe2.59662306.jpg', 'Lowe alpine Eclipse 35 Daypack'),
(140, '../uploads/IMG-6438e76f5b0055.44144349.jpg', 'Lowe alpine Eclipse 35 Daypack'),
(141, '../uploads/IMG-6438e7f5289d05.53816589.jpg', 'AMEISEYE Aquarius 40L'),
(142, '../uploads/IMG-6438e7f5296ee8.51220414.jpg', 'AMEISEYE Aquarius 40L'),
(143, '../uploads/IMG-6438e8650c8921.35447058.jpg', 'Gregory Lady Bird A979 2 way bucket'),
(144, '../uploads/IMG-6438e8650d7828.78571459.jpg', 'Gregory Lady Bird A979 2 way bucket'),
(145, '../uploads/IMG-6438e8bb974720.75060476.jpg', 'Gregory LITTLE STEPS DAY'),
(146, '../uploads/IMG-6438e8bb97edb4.48402469.jpg', 'Gregory LITTLE STEPS DAY'),
(147, '../uploads/IMG-6438e938f2cb68.81554218.jpg', 'Rucksack Check Bag Backpacker｜Travel'),
(148, '../uploads/IMG-6438e9d9e4a216.19215532.jpg', 'Osprey AirCover'),
(149, '../uploads/IMG-6438e9d9e58a75.42350671.jpg', 'Osprey AirCover'),
(150, '../uploads/IMG-6438e9d9e61153.08818086.jpg', 'Osprey AirCover'),
(151, '../uploads/IMG-6438ea570e4c18.21776981.jpg', 'Lowe Alpine Space Case 7'),
(152, '../uploads/IMG-6438ea570f4eb8.58419491.jpg', 'Lowe Alpine Space Case 7'),
(153, '../uploads/IMG-6438ea84102a55.17190637.jpg', 'Ultimate Direction Unisex Mountain Belt 5.0'),
(154, '../uploads/IMG-6438eac5e27100.44441705.jpg', ' SOTO WindMaster SOD-320'),
(156, '../uploads/IMG-6438eb0652b703.94994588.jpg', 'SOTO G-Stove ST-320'),
(157, '../uploads/IMG-6438eb5d03a486.71859192.jpg', 'Chums Dutch Oven 10inch'),
(158, '../uploads/IMG-6438ebe7727b92.60082041.jpg', ' Kovea Hard 2.3 Cookset'),
(159, '../uploads/IMG-6438ec37a1e317.10803735.jpg', 'ARISU Casting Griddle '),
(160, '../uploads/IMG-6438ec8e400094.26536191.jpg', 'SOTO ST-3100 Minimal Grill'),
(161, '../uploads/IMG-6438ecd4466465.64507375.jpg', 'EVERNEW TITANIUM MUG POT 900 ECA267R'),
(162, '../uploads/IMG-6438ed1f06e9e4.93826274.jpg', 'EVERNEW TITANIUM TEA POT 800 ECA318'),
(163, '../uploads/IMG-6438ed6049d980.93504660.jpg', 'Coleman 6-Person Steel Creek™ Fast Pitch™ Dome Camping Tent with Screen Room'),
(164, '../uploads/IMG-6438ed9ba5eba2.36301249.jpg', 'Nemo aurora backpacking tent & footprint'),
(165, '../uploads/IMG-6438ed9ba6d0d1.60532097.jpg', 'Nemo aurora backpacking tent & footprint'),
(166, '../uploads/IMG-6438edee1d5890.20912647.jpg', 'Captain Stag Frit Parasol Shade UD-0053'),
(167, '../uploads/IMG-6438ee3002f283.44901681.jpg', 'Kelty Cabana Shade Tent'),
(168, '../uploads/IMG-6438ee9f28c199.07086866.jpg', 'Chums Pop Up Sunshade 3 CH62-1632-Z193-00'),
(169, '../uploads/IMG-6438efa2d634e1.86006812.jpg', 'Portable Foldable Tent | Picnic | Beach'),
(170, '../uploads/IMG-6438efa2d71f64.43535595.jpg', 'Portable Foldable Tent | Picnic | Beach'),
(171, '../uploads/IMG-6438efa2d7c025.26379669.jpg', 'Portable Foldable Tent | Picnic | Beach');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
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
(52, '2023-04-14 08:04:15', 53593, 'FPS', 'Delivered', 'BoGor918', 'Central and Western,8 Mau Yip Road, Tseung Kwan O, Kowloon, Hong Kong,3,42,A', 1690, 'EXPED Lightning 45 Backpack', 1, 'Black', 'S'),
(53, '2023-04-14 08:04:15', 53593, 'FPS', 'Delivered', 'BoGor918', 'Central and Western,8 Mau Yip Road, Tseung Kwan O, Kowloon, Hong Kong,3,42,A', 1100, 'AMEISEYE Aquarius 40L', 2, 'Blue', 'M'),
(54, '2023-04-14 08:04:15', 53593, 'FPS', 'Delivered', 'BoGor918', 'Central and Western,8 Mau Yip Road, Tseung Kwan O, Kowloon, Hong Kong,3,42,A', 1100, 'AMEISEYE Aquarius 40L', 2, 'Pink', 'M'),
(55, '2023-04-14 08:04:15', 53593, 'FPS', 'Delivered', 'BoGor918', 'Central and Western,8 Mau Yip Road, Tseung Kwan O, Kowloon, Hong Kong,3,42,A', 763, 'Rucksack Check Bag Backpacker｜Travel', 7, 'Black', 'XL');

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
(59, 'EXPED Lightning 45 Backpack', 'Main Fabric: \\\\n 210 D HMPE ripstop nylon \\\\n PU coated \\\\n 1\'500 mm water column \\\\n Oeko-Tex® 100 certified \\\\n Main Fabric 2: \\\\n 600 D recycled Oxford polyester \\\\n PU coated \\\\n 1\'500 mm water column \\\\n bluesign® certified \\\\n PFC free \\\\n Pack Susp', 1690, 44, 'S, M, L', 'Black, Green', 1, 'Backpack', 'Hiking'),
(61, 'Karrimor SF Nordic ODIN 75L Rucksack', 'KS500e is a 500 Denier Nylon fabric coated with a waterproof elastomeric polyurethane (PU) coating for improved tear strength and flex resistance. Finished with a durable water repellent (DWR) which adds water resistance to the fabric. Camouflage models a', 3375, 100, 'XXL', 'Black, Green', 0, 'Backpack', 'Hiking'),
(62, 'Lowe alpine Eclipse 35 Daypack', 'This all-terrain 35-liter daypack with cover is built around the lightweight, breathable Air Contour™ back system, making it ideal for hiking and climbing adventures as well as light travel. The pack is compatible with a 3 liter hydration bladder and feat', 490, 19, 'S, M, L, XL', 'Blue, Black', 1, 'Backpack', 'Camping'),
(63, 'AMEISEYE Aquarius 40L', 'When going on a long trip, sometimes I want a large backpack with back and forth. This time, I will introduce this 40L backpack to you. The main compartment is large enough to accommodate general travel and camping supplies, and the back rack Use a breath', 550, 16, 'M', 'Blue, Pink', 1, 'Backpack', 'Camping'),
(64, 'Gregory Lady Bird A979 2 way bucket', 'Bucket bag with unique styling, shoulder bag or hand bag dual-purpose design, large-capacity main compartment and front hidden zipper compartment, with zipper pouch', 576, 20, 'S', 'Pink, Black', 0, 'Backpack', 'Casual'),
(65, 'Gregory LITTLE STEPS DAY', 'Classic style children\'s backpack. Diagonal zip front pockets. Equipped with a buckle for placing trekking poles and a zipper mesh pocket inside the strap.', 712, 10, 'S, M', 'Garden, Black', 1, 'Backpack', 'Casual'),
(66, 'Rucksack Check Bag Backpacker｜Travel', 'Capacity \\\\n 1-2 quilts \\\\n 8-11 sets of winter shirts \\\\n Weight: 0.4kg \\\\n Fabric: Oxford cloth \\\\n Material: Foldable', 109, -2, 'XL', 'Black', 0, 'Backpack', 'Travel'),
(67, 'Osprey AirCover', 'MAIN: 210D Nylon Double Ripstop \\\\n ACCENT: Not Applicable \\\\n BOTTOM: 210D Nylon Double Ripstop', 310, 100, 'S, M, L, XL', 'Blue, Black', 0, 'Backpack', 'Travel'),
(68, 'Lowe Alpine Space Case 7', 'The waist pocket has 4 zipper pockets + 2 water bottle mesh pockets + 1 outer storage compartment, and there are a total of 7 loadable compartments.', 270, 20, 'S, M, L', 'Blue, Red', 0, 'Backpack', 'Running'),
(69, 'Ultimate Direction Unisex Mountain Belt 5.0', 'Flex Mono Mesh compression waist belt provides secure and breathable fit \\\\n Single rear Woven Rip Stop Mesh pouch securely holds a Flexform™ II 500', 343, 10, 'S', 'Blue', 0, 'Backpack', 'Running'),
(70, ' SOTO WindMaster SOD-320', 'The Soto WindMaster stove is designed so that the pot is closer to the flame, making it more efficient in windy weather. Resulting in increased efficiency and therefore faster and longer boil times. The concave design of the burner head creates the effect', 559, 20, 'S', 'Grey', 0, 'Cookwear', 'Stove'),
(71, 'SOTO G-Stove ST-320', 'Storage size The world\'s thinnest thickness is only 25mm! \\\\n Brand-new shape design, high performance and lightweight realization \\\\n V-shaped protection plates on the left and right sides of the burner, both windproof and heat insulating  ', 472, 10, 'S', 'Grey', 0, 'Cookwear', 'Stove'),
(72, 'Chums Dutch Oven 10inch', 'Chums Dutch Oven 10inch with Red and Yellow color cook set ', 584, 100, 'M', 'Yellow + Red', 0, 'Cookwear', 'Cookset'),
(73, ' Kovea Hard 2.3 Cookset', 'The Hard 23 cookware includes one 1L pot with lid and one 1.8L pot with lid, a frying pan, 3 plastic dishes, a ladle, and a rice scooper. The pots and pans have a hard anodized coating and are durable enough for the outdoors. This is a compact and practic', 345, 100, 'M', 'Grey', 0, 'Cookwear', 'Cookset'),
(74, 'ARISU Casting Griddle ', 'Three-dimensional annual ring pattern design - allows the oil to spread evenly on the plate, cooking with a little oil', 298, 15, 'S, M, L', 'Black', 0, 'Cookwear', 'Pan'),
(75, 'SOTO ST-3100 Minimal Grill', 'You can also enjoy teppanyaki grilling outdoors. The small grill pan is easy to carry and is suitable for special folding tables. The cast iron material has good thermal conductivity and makes grilled food more delicious. The special striped surface makes', 442, 100, 'S, M, L, XL', 'Black', 0, 'Cookwear', 'Pan'),
(76, 'EVERNEW TITANIUM MUG POT 900 ECA267R', 'Hand-pressed by highly experienced Japanese craftsmen \\\\n The bottom ridge perfectly matches the diameter of EVERNEW DX stand for maximum stability \\\\n A pour spout for perfect pouring', 485, 20, 'XL', 'Grey', 0, 'Cookwear', 'Kettle'),
(77, 'EVERNEW TITANIUM TEA POT 800 ECA318', 'Hand-pressed by highly experienced Japanese craftsmen \\\\n The bottom ridge perfectly matches the diameter of EVERNEW DX stand for maximum stability \\\\n A pour spout for perfect pouring ', 610, 100, 'S, M, L', 'Grey', 0, 'Cookwear', 'Kettle'),
(78, 'Coleman 6-Person Steel Creek™ Fast Pitch™ Dome Camping Tent with Screen Room', 'The 6-Person Steel Creek™ Fast Pitch™ Dome Camping Tent with Screen Room lets you enjoy the great outdoors without the bugs.', 2199, 30, 'XL', 'Green', 0, 'Tent', 'CampingTent'),
(79, 'Nemo aurora backpacking tent & footprint', 'Featuring vibrant color, angular patterning reminiscent of mountainscapes, and a competitive price, the new Aurora™ screams fun and livability.', 2350, 15, 'M, L', 'LightBlue, Green', 0, 'Tent', 'CampingTent'),
(80, 'Captain Stag Frit Parasol Shade UD-0053', 'Great for a variety of occasions, such as outdoors, parks, sports events, etc. \\\\n Easy to unfold and fold quickly \\\\n This is a new type that eliminates the middle pole and creates a wide space.', 480, 10, 'S', 'Blue', 0, 'Tent', 'BeachTents'),
(81, 'Kelty Cabana Shade Tent', 'Whether you want to keep your panting doggo out of the sun, your toddler’s lunch out of the sand or PRYING EYES away from your swimsuit quick-change, the Cabana has got you covered. Now with Kelty Quick Corners for easy, breezy setup—and featuring a priva', 990, 1, 'XL', 'Blue', 0, 'Tent', 'BeachTents'),
(82, 'Chums Pop Up Sunshade 3 CH62-1632-Z193-00', 'power of love \\\\n H 127 X W 198 X L 147 (+89)cm \\\\n Material: 185T taffeta Polyurethane Coating', 539, 20, 'XL', 'Pink', 0, 'Tent', 'BeachTents'),
(83, 'Portable Foldable Tent | Picnic | Beach', 'Special price, membership and VIP discounts do not apply \\\\n Portable Foldable Tent | Picnic | Beach \\\\n 165*150(寬)*110cm', 159, 200, 'S', 'Grape, Banana. Melon', 0, 'Tent', 'BeachTents');

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
(22, 'Camping', 'Backpack'),
(23, 'Casual', 'Backpack'),
(24, 'Travel', 'Backpack'),
(26, 'Running', 'Backpack'),
(32, 'CampingTent', 'Tent'),
(33, 'BeachTents', 'Tent'),
(36, 'Stove', 'Cookwear'),
(37, 'Cookset', 'Cookwear'),
(38, 'Pan', 'Cookwear'),
(39, 'Kettle', 'Cookwear');

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
(2, 'admin', 'admin@admin.com', '12345678', 1),
(7, 'BoGor918', 'boscocheung1234@gmail.com', 'Bc010918', NULL);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`FavouriteID`);

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
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `FavouriteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `SubCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
