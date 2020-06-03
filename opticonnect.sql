-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 07:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opticonnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_master`
--

CREATE TABLE `account_master` (
  `sellerid` int(10) NOT NULL,
  `account_number` int(12) NOT NULL,
  `bank_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `username` varchar(16) COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`username`, `name`, `password`) VALUES
('Kanan123', 'Kanan', 'Kanan234'),
('Tom', 'Tom Clancy', 'Tom123'),
('amogh', 'amogha', 'amogh123'),
('vishi', 'vish', 'vish123'),
('vishibhavsar', 'vishvesh', 'vb789');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customerid` int(10) NOT NULL,
  `quantity` int(2) NOT NULL,
  `sellerid` int(10) NOT NULL,
  `sellername` varchar(50) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customerid`, `quantity`, `sellerid`, `sellername`, `product_id`, `product_name`, `price`) VALUES
(1, 1, 1, 'Amogha', 1, 'MTV Cateye Green', 600);

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE `customer_master` (
  `customerid` int(10) NOT NULL,
  `name` char(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `username` varchar(16) NOT NULL,
  `address` mediumtext NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_master`
--

INSERT INTO `customer_master` (`customerid`, `name`, `password`, `email`, `phone`, `username`, `address`, `isactive`) VALUES
(1, 'Amogha Varsha', 'Amogha1!', 'kamoghavarsha@gmail.com', '7623040547', 'amovar1218', 'C 601 Shagun Castle Near Jayma Society, Ahmedabad satellite 380015', 1),
(2, 'Vishvesh Bhavsar', 'vb123', NULL, '9426707954', 'vishibhavsar', '304 Kedar flats Near Gopi Annashetra Nava Vadaj Ahmedabad 380013', 1),
(3, 'poojan', 'poojan123', 'poojankc345@gmail.com', '8369291629', 'poojanc', 'Behind GST Compound,New Ranip\r\n89,Gate 5, Satva Homes', 1),
(4, 'Tom Clancy', 'Tom123', 'tom897@gmail.com', '6726181728', 'Tom', 'California,new Edison Street', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `transaction_id` int(10) NOT NULL,
  `consignment_number` varchar(10) COLLATE utf8_bin NOT NULL,
  `Delivery_company` varchar(50) COLLATE utf8_bin NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`transaction_id`, `consignment_number`, `Delivery_company`, `customer_id`) VALUES
(2, '1234567890', 'DHL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lens`
--

CREATE TABLE `lens` (
  `customerid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `lsign` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `rsign` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `laxis` float NOT NULL DEFAULT 0,
  `ladd` float NOT NULL DEFAULT 0,
  `lsph` float NOT NULL DEFAULT 0,
  `lcycle` float NOT NULL DEFAULT 0,
  `rsph` float NOT NULL DEFAULT 0,
  `radd` float NOT NULL DEFAULT 0,
  `raxis` float NOT NULL DEFAULT 0,
  `rcycle` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lens`
--

INSERT INTO `lens` (`customerid`, `productid`, `lsign`, `rsign`, `laxis`, `ladd`, `lsph`, `lcycle`, `rsph`, `radd`, `raxis`, `rcycle`) VALUES
(1, 1, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `producttype_id` int(1) NOT NULL,
  `producttype_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`producttype_id`, `producttype_name`) VALUES
(1, 'Spectacles'),
(2, 'Sunglasses'),
(3, 'Contact Lens'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `product_subtype`
--

CREATE TABLE `product_subtype` (
  `producttype_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_name` char(50) NOT NULL,
  `product_image` mediumtext NOT NULL,
  `product_description` mediumtext NOT NULL,
  `brand` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `seller_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COMMENT='For Brands of main products';

--
-- Dumping data for table `product_subtype`
--

INSERT INTO `product_subtype` (`producttype_id`, `product_id`, `product_name`, `product_image`, `product_description`, `brand`, `Price`, `seller_id`) VALUES
(2, 2, 'MTV Oversized Black Grey', 'images\\Sunglasses\\MTV_Oversized_Black_Grey_1.jpg', '', 'MTv', 1000, 3),
(2, 3, 'Oakley Tainted Sunglasses', 'images\\Sunglasses\\Oakley_Tinted_Sunglasses_1.jpg', 'sdvlsdlcn SNdcjSHnvkDs', 'Oakley', 4700, 1),
(1, 4, 'Tommy Hilfigher Rectangular Black', 'images/Spectacles/Tommy_Hilfigher_Rectangular_Black_3.jpg', '', 'Tommy Hilghfigher', 1000, 3),
(1, 5, 'Tommy Hilghfigher Rectangular Brown', 'images\\Spectacles\\Tommy_Hilfigher_Rectangular_Brown_3.jpg', '', 'Tommy Hilghfigher', 900, 3),
(1, 6, 'Toomy Hilghfigher Oval', 'images\\Spectacles\\Tommy_Hilfigher_Oval_3.jpg', '', 'Aqualens', 2000, 3),
(1, 7, 'Tommy Hilghfigher Modified Oval', 'images\\Spectacles\\Tommy_Hilfigher_Modified_Oval_1.jpg', '', 'Pure Vision', 2500, 1),
(2, 8, 'MTV Oversized Demi Brown', 'images\\Sunglasses\\MTV_Oversized_Demi_Brown_1.jpg', '', 'MTv', 1500, 1),
(2, 9, 'MTV Rectangular Green Grey', 'images\\Sunglasses\\MTV_Rectangular_Green_Grey_1.jpg', '', 'MTv', 2000, 1),
(2, 10, 'MTV Round Black', 'images\\Sunglasses\\MTV_Round_Black_1.jpg', '', 'MTv', 1400, 1),
(2, 11, 'MTV Round Light Brown', 'images\\Sunglasses\\MTV_Round_Light_Brown_1.jpg', '', 'MTv', 1000, 1),
(2, 12, 'MTV Wayfarer Black', 'images\\Sunglasses\\MTV_Wayfarer_Black_1.jpg', '', 'MTv', 900, 1),
(2, 13, 'MTV Wayfarer Light Brown', 'images\\Sunglasses\\MTV_Wayfarer_Light_Brown_1.jpg', '', 'MTv', 1400, 1),
(2, 14, 'MTv Rectangular Green', 'images\\Sunglasses\\MTvRectangular_Green_1.jpg', '', 'MTv', 1500, 1),
(1, 15, 'Vogue Full Rim Rectangle Frame', 'images\\Spectacles\\Vogue_Full_Rim_Rectangle_Frame_3.jpeg', '', 'Vogue', 2500, 3),
(1, 16, 'Rayban RX 3596 Blue', 'images\\Spectacles\\Rayban_RX_3596_Blue_3.jpg', '', 'Rayban', 2500, 3),
(1, 17, 'Rayban RX 6303 Silver-blue', 'images\\Spectacles\\Rayban_RX_6303_Silver-blue_3.jpg', '', 'Rayban', 3500, 3),
(1, 18, 'Rayban RX 5337', 'images\\Spectacles\\Rayban_RX_5337_3.jpg', '', 'Rayban', 3000, 3),
(1, 19, 'Tag Heuer blue-black', 'images\\Spectacles\\Tag_Heuer_blue-black_3.jpg', '', 'Tag Heuer', 3200, 3),
(1, 20, 'Calvin Klein Demi Brown', 'images\\Spectacles\\Calvin_Klein_Demi_Brown_3.jpg', '', 'Calvin Klein', 3200, 3),
(1, 21, 'Calvin Klein Black', 'images\\Spectacles\\Calvin_Klein_Black_3.jpg', '', 'Calvin Klein', 8000, 3),
(1, 22, 'Calvin Klein Transparent', 'images\\Spectacles\\Calvin_Klein_Transparent_3.jpg', '', 'Calvin Klein', 6000, 3),
(1, 23, 'Vincent Chase Black frames', 'images\\Spectacles\\Vincent_Chase_Black_frames_3.jpg', 'dsfasdascaSac', 'Vincent chase', 2500, 3),
(1, 24, 'Vincent Chase Black', 'images\\Spectacles\\Vincent_Chase_Black_frames_3.jpg', 'dsfasdascaSac', 'Vincent chase', 2500, 3),
(2, 25, 'Vincent Chase Green Sport', 'images\\Sunglasses\\Vincent_Chase_Green_Sport_1.jpg', 'dlfnlkzxncksdnksjsd', 'Vincent Chase', 4000, 1),
(2, 26, 'Vincent Chase Sport Sunglasses', 'images/Sunglasses/Vincent_Chase_Sport_Sunglasses_3.jpg', '', 'Vincent chase', 2000, 3),
(4, 31, 'Optrex', 'images/Accessories/Optrex_3.png', 'for Better Eye Visibility and For Eye Dryness and remove the Dust from eye ', 'Optrex', 200, 3),
(4, 32, 'Eyeglass Cleaner', 'images/Accessories/Eyeglass_Cleaner_3.png', 'eyecleaner  for Smudge Proof Classes ', 'Eyeglass Cleaner', 250, 3),
(4, 33, 'Cleaning cloth for frames', 'images/Accessories/Cleaning_cloth_for_frames_2.png', 'Nylon cloth for Cleaning the Spectales on the go', 'Cleaning cloth for frames', 100, 2),
(4, 34, 'Eye Mantra', 'images/Accessories/Eye_Mantra_3.jpg', 'Eye Mantra eye drops is an Ayurvedic drops which contains the goodness of 12 natural ingredients.\r\nIt is safe to use and helps to treat the eye problems in an effective way.', 'Eye Mantra', 130, 3),
(4, 35, 'patanajali Drishti', 'images/Accessories/patanajali_Drishti_3.jpg', 'No Side Effects\r\n', 'patanajali Drishti', 100, 3),
(4, 36, 'OptiPlix Hard Shell', 'images/Accessories/OptiPlix_Hard_Shell_3.jpg', 'EASILY FIND & STORE YOUR EYEGLASSES: Our hard case eyeglass holder is manufactured to keep your glasses safe no matter what and their colors make it easier for you to locate them so you will never spend countless time looking for your glasses. Your endless search of locating your missing glasses is now over!\r\nKEEPS YOUR GLASSES CLEAN & SAFE: Due to a special lining, our glasses case protects your lenses from scratches and its arms from bending and breaking. The soft lining is also great for protecting your lenses from dirt and residue, thus keeping them clean.', 'OptiPlix Hard Shell ', 400, 3),
(4, 37, 'Eyeglasses Pouches', 'images/Accessories/Eyeglasses_Pouches_3.jpg', 'Soft Microfiber\r\nSunglasses Glasses Pouches Case Bag Black', 'Eyeglasses Pouches', 300, 3),
(4, 38, 'MK Microfiber', 'images/Accessories/MK_Microfiber_3.jpg', 'Best glasses lens cleaner for your sunglasses or prescription eyewear, such as reading glasses, bifocals, eye loupes, or magnifying glass lenses no cleaning spray required\r\nThe microfiber cleaning cloth wipes effectively wipe away dust, dirt, and smudges without fluid solution unlike pre-moistened cleaning wipes, these do not produce trash waste with every use--better for your glasses, and better for the environment', 'MK Microfiber', 220, 3),
(4, 39, 'organic Cleaning', 'images/Accessories/organic_Cleaning_3.jpg', 'cleaning gel for spectacles, sunglasses.', 'organic Cleaning', 250, 3),
(4, 40, 'Lens Cloth', 'images/Accessories/Lens_Cloth_3.jpg', 'Material:Microfiber\r\nRandom color\r\nSoft and mop surfaces without any damage, can effectively remove oil', 'Lens Cloth', 300, 3),
(4, 41, 'Spectacle eyeglass', 'images/Accessories/Spectacle_eyeglass_3.jpg', 'Uniquely designed and printed by us, embellished with sequins, glitter and embroidered to add a touch of class and royalty.\r\nHandmade and meticulously crafted to perfection. Eco-friendly colors used and made from ruggedized cotton cloth canvas.', 'Spectacle eyeglass', 300, 3),
(3, 42, 'Bausch & Lomb Soflens', 'images/Contact_lens/Bausch_&_Lomb_Soflens_3.jpg', 'Deliver clear vision with the everyday comfort\r\nMade from a protein resistant material that combines excellent performance, comfort and visual acuity', 'Bausch & Lomb Soflens', 800, 3),
(3, 43, 'Freshlook', 'images/Contact_lens/Freshlook_3.jpg', 'Daily disposable convenience for fresh lens every day\r\nLightstream manufacturing technology for consistent fitting and comfort with every lens, every day', 'Freshlook ', 700, 3),
(3, 44, 'Crystal Eye', 'images/Contact_lens/Crystal_Eye_3.jpg', 'Store it in a proper case, always use fresh solution and do not wear it overnight', 'Crystal Eye', 689, 3),
(3, 45, 'Optify Contact Lens Solution', 'images/Contact_lens/Optify_Contact_Lens_Solution_3.jpg', 'Lens care solution for contact lens\r\nFresh lens feeling, everyday', 'Optify Contact Lens Solution', 200, 3),
(3, 46, 'Aqua Soft', 'images/Contact_lens/Aqua_Soft_3.jpg', 'My Aqua Soft Solution Conditions, Cleans, Removes Protein, Disinfects, Rinses And Stores Soft Contact Lenses Including Silicone Hydrogel Contact Lenses.', 'Aqua Soft ', 490, 3),
(3, 47, 'CleanZol 6', 'images/Contact_lens/CleanZol_6_3.jpg', 'Superior disinfection\r\nBetter cleaning', 'CleanZol 6', 200, 3),
(3, 48, 'Aqualens Comfort', 'images/Contact_lens/Aqualens_Comfort_3.jpg', 'Locks in moisture and retains it in dry environments.\r\nFights lens dehydration due to pollution & varying environmental conditions', 'Aqualens Comfort', 230, 3),
(3, 49, 'Sparkle Eye', 'images/Contact_lens/Sparkle_Eye_3.jpg', 'Removes proteins and disinfects\r\nLens care solution for contact lens', 'Sparkle Eye', 200, 3),
(3, 50, 'Tropical Colors', 'images/Contact_lens/Tropical_Colors_3.jpg', ' clear vision with the everyday comfort', 'Tropical Colors', 475, 3),
(3, 51, 'Charming Eyes', 'images/Contact_lens/Charming_Eyes_3.jpg', 'clear vision with the everyday comfort', 'Charming Eyes', 570, 3),
(3, 52, 'O-LENS', 'images/Contact_lens/O-LENS_3.jpg', 'Creates Unlimited Eye-styling with unique & various designs of color contact lens', 'O-LENS', 1300, 3),
(3, 53, 'Stericon Pharma Gp', 'images/Contact_lens/Stericon_Pharma_Gp_3.jpg', 'Ultra Moist Cleaning\r\nConditioning', 'Stericon Pharma Gp', 150, 3);

-- --------------------------------------------------------

--
-- Table structure for table `seller_master`
--

CREATE TABLE `seller_master` (
  `sellerid` int(10) NOT NULL,
  `seller_name` char(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  `company_reg` mediumtext NOT NULL,
  `password` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `username` varchar(16) NOT NULL,
  `address` mediumtext NOT NULL,
  `isactive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_master`
--

INSERT INTO `seller_master` (`sellerid`, `seller_name`, `owner`, `company_reg`, `password`, `email`, `phone`, `username`, `address`, `isactive`) VALUES
(1, 'Amogha', 'AmoghaVarsha', 'images/Company regstration/amovar12189.png', 'Amogha1!', NULL, '7623040547', 'amovar12189', 'asjdcsadvcshgavgdhdvhgsvcghasvghdvcgahs hgdschagsgdhca sjdchg sgadhchasd', 1),
(2, 'Rajesh Kumar', 'Kumar Optic', 'images/Company registration/kumar12.jpg', 'kumar123!', NULL, '9426707954', 'kumar12', 'ajsvdnbsavavghsvhxgavmbsnv bnanvsgxanvn zb cs vb avb vbscxgsagh', 1),
(3, 'Optilens', 'Kamlesh Bhupal', 'images/Company  registration/optilens.jpg', 'KB123', 'kb1234@gmail.com', '9999999999', 'optilens', 'sxckasljcklasnd,mnamsn mndmncbsmadbcmasnbdhcbddshmbc mashbdmabsd ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(10) NOT NULL,
  `customerid` int(10) DEFAULT NULL,
  `productid` int(10) DEFAULT NULL,
  `productname` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sellerid` int(10) DEFAULT NULL,
  `price` int(5) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `lsign` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `rsign` varchar(2) COLLATE utf8_bin DEFAULT NULL,
  `laxis` float DEFAULT NULL,
  `ladd` float DEFAULT NULL,
  `lsph` float DEFAULT NULL,
  `lcycle` float DEFAULT NULL,
  `rsph` float DEFAULT NULL,
  `radd` float DEFAULT NULL,
  `raxis` float DEFAULT NULL,
  `rcycle` float DEFAULT NULL,
  `Payment_Method` varchar(40) COLLATE utf8_bin NOT NULL,
  `isdelset` tinyint(1) NOT NULL DEFAULT 0,
  `address` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `customerid`, `productid`, `productname`, `sellerid`, `price`, `quantity`, `order_date`, `lsign`, `rsign`, `laxis`, `ladd`, `lsph`, `lcycle`, `rsph`, `radd`, `raxis`, `rcycle`, `Payment_Method`, `isdelset`, `address`) VALUES
(2, 1, 16, 'Rayban RX 3596 Blue', 3, 12500, 5, '2018-12-22 20:00:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, ''),
(8, 2, 33, 'Cleaning cloth for frames', 2, 100, 1, '2020-03-16 12:04:26', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 'Pay On Delivery', 0, ''),
(9, 2, 15, 'Vogue Full Rim Rectangle Frame', 3, 2500, 1, '2020-04-21 16:59:07', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 'Pay On Delivery', 0, ''),
(9, 2, 42, 'Bausch & Lomb Soflens', 3, 800, 4, '2020-04-21 16:59:07', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 'Pay On Delivery', 0, ''),
(10, 2, 42, 'Bausch & Lomb Soflens', 3, 800, 1, '2020-04-21 17:11:50', '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 'Pay On Delivery', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_identifier`
--

CREATE TABLE `transaction_identifier` (
  `transactionid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transaction_identifier`
--

INSERT INTO `transaction_identifier` (`transactionid`, `customerid`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 2),
(9, 2),
(10, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_master`
--
ALTER TABLE `account_master`
  ADD KEY `actionref` (`sellerid`);

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `sellerref` (`sellerid`),
  ADD KEY `productref` (`product_id`),
  ADD KEY `consumerref` (`customerid`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
  ADD PRIMARY KEY (`customerid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD UNIQUE KEY `transactionid` (`transaction_id`),
  ADD KEY `customerref` (`customer_id`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`producttype_id`);

--
-- Indexes for table `product_subtype`
--
ALTER TABLE `product_subtype`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `itemref` (`producttype_id`) USING BTREE,
  ADD KEY `sref` (`seller_id`);

--
-- Indexes for table `seller_master`
--
ALTER TABLE `seller_master`
  ADD PRIMARY KEY (`sellerid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD KEY `userref` (`customerid`),
  ADD KEY `productidref` (`productid`),
  ADD KEY `selleridref` (`sellerid`);

--
-- Indexes for table `transaction_identifier`
--
ALTER TABLE `transaction_identifier`
  ADD PRIMARY KEY (`transactionid`),
  ADD KEY `cref` (`customerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
  MODIFY `customerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_subtype`
--
ALTER TABLE `product_subtype`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `seller_master`
--
ALTER TABLE `seller_master`
  MODIFY `sellerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_master`
--
ALTER TABLE `account_master`
  ADD CONSTRAINT `account_master_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `seller_master` (`sellerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customer_master` (`customerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `customerref` FOREIGN KEY (`customer_id`) REFERENCES `customer_master` (`customerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `product_subtype`
--
ALTER TABLE `product_subtype`
  ADD CONSTRAINT `pref` FOREIGN KEY (`producttype_id`) REFERENCES `producttype` (`producttype_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sref` FOREIGN KEY (`seller_id`) REFERENCES `seller_master` (`sellerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `productidref` FOREIGN KEY (`productid`) REFERENCES `product_subtype` (`product_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `selleridref` FOREIGN KEY (`sellerid`) REFERENCES `seller_master` (`sellerid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `userref` FOREIGN KEY (`customerid`) REFERENCES `customer_master` (`customerid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_identifier`
--
ALTER TABLE `transaction_identifier`
  ADD CONSTRAINT `cref` FOREIGN KEY (`customerid`) REFERENCES `customer_master` (`customerid`) ON DELETE CASCADE ON UPDATE NO ACTION;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table account_master
--

--
-- Metadata for table admin_master
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'opticonnect', 'admin_master', '{\"sorted_col\":\"`admin_master`.`username`  ASC\"}', '2020-04-26 05:39:29');

--
-- Metadata for table cart
--

--
-- Metadata for table customer_master
--

--
-- Metadata for table delivery
--

--
-- Metadata for table lens
--

--
-- Metadata for table producttype
--

--
-- Metadata for table product_subtype
--

--
-- Metadata for table seller_master
--

--
-- Metadata for table transaction
--

--
-- Metadata for table transaction_identifier
--

--
-- Metadata for database opticonnect
--

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_descr`) VALUES
('opticonnect', 'Relational _Schema');

SET @LAST_PAGE = LAST_INSERT_ID();

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('opticonnect', 'account_master', @LAST_PAGE, 590, 372),
('opticonnect', 'admin_master', @LAST_PAGE, 25, 257),
('opticonnect', 'cart', @LAST_PAGE, 323, 90),
('opticonnect', 'customer_master', @LAST_PAGE, 50, 12),
('opticonnect', 'delivery', @LAST_PAGE, 33, 414),
('opticonnect', 'lens', @LAST_PAGE, 839, 309),
('opticonnect', 'product_subtype', @LAST_PAGE, 542, 155),
('opticonnect', 'producttype', @LAST_PAGE, 595, 37),
('opticonnect', 'seller_master', @LAST_PAGE, 859, 43),
('opticonnect', 'transaction', @LAST_PAGE, 323, 294),
('opticonnect', 'transaction_identifier', @LAST_PAGE, 323, 7);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
