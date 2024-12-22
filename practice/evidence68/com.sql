-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 08:15 AM
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
-- Database: `company`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `man` (IN `n` VARCHAR(50), IN `a` VARCHAR(100), IN `c` VARCHAR(50))   BEGIN
INSERT INTO manufacturer SET id=null,name=n,address=a,contact_no=c;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro` (IN `n` VARCHAR(50), IN `p` INT(5), IN `mid` INT(15))   BEGIN
INSERT INTO product SET id=null,name=n,price=p,	manufacturer_id	=mid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_product`
-- (See below for the actual view)
--
CREATE TABLE `display_product` (
`serial` int(15)
,`product_name` varchar(50)
,`price` int(5)
,`address` varchar(100)
,`contact_no` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `address`, `contact_no`) VALUES
(4, 'mac', 'america', '9786'),
(5, 'samsung', 'china', '23456'),
(6, 'walton', 'bangladesh', '3456');

--
-- Triggers `manufacturer`
--
DELIMITER $$
CREATE TRIGGER `del_t` AFTER DELETE ON `manufacturer` FOR EACH ROW BEGIN
DELETE FROM product WHERE 	manufacturer_id=old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_display`
-- (See below for the actual view)
--
CREATE TABLE `new_display` (
`serial` int(15)
,`product_name` varchar(50)
,`price` int(5)
,`address` varchar(100)
,`contact_no` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  `manufacturer_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `manufacturer_id`) VALUES
(3, 'iphone', 234576, 4),
(4, 'phone', 7864, 4),
(5, 'blender', 3455, 6);

-- --------------------------------------------------------

--
-- Structure for view `display_product`
--
DROP TABLE IF EXISTS `display_product`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_product`  AS SELECT `manufacturer`.`id` AS `serial`, `product`.`name` AS `product_name`, `product`.`price` AS `price`, `manufacturer`.`address` AS `address`, `manufacturer`.`contact_no` AS `contact_no` FROM (`manufacturer` join `product`) WHERE `manufacturer`.`id` = `product`.`manufacturer_id` ;

-- --------------------------------------------------------

--
-- Structure for view `new_display`
--
DROP TABLE IF EXISTS `new_display`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_display`  AS SELECT `display_product`.`serial` AS `serial`, `display_product`.`product_name` AS `product_name`, `display_product`.`price` AS `price`, `display_product`.`address` AS `address`, `display_product`.`contact_no` AS `contact_no` FROM `display_product` WHERE `display_product`.`price` > 5000 ORDER BY `display_product`.`product_name` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
