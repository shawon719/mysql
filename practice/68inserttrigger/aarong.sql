-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 05:26 AM
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
-- Database: `aarong`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `bradd` (IN `n` VARCHAR(100), IN `con` VARCHAR(100))   BEGIN
INSERT INTO brand SET id=null,br_name=n,contact=con;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proadd` (IN `n` VARCHAR(100), IN `p` DOUBLE(10,2), IN `bid` INT(11))   BEGIN
INSERT INTO product SET id=null,product_name=n,price=p,brand_id=bid;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `br_name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `br_name`, `contact`) VALUES
(17, 'taga', '9678574'),
(18, 'aarong jama', '890765'),
(19, 'aarong shoe', '9678574');

--
-- Triggers `brand`
--
DELIMITER $$
CREATE TRIGGER `delete_t` AFTER DELETE ON `brand` FOR EACH ROW BEGIN
DELETE FROM product WHERE brand_id=old.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `conditional_tab`
-- (See below for the actual view)
--
CREATE TABLE `conditional_tab` (
`serial` int(11)
,`product` varchar(100)
,`price` double(10,2)
,`br_name` varchar(100)
,`contact` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `price`, `brand_name`, `brand_id`) VALUES
(16, 'kurti', 6985.00, '', 17),
(17, 'one piece', 4000.00, '', 18),
(18, 'nike', 7985.00, '', 19);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_view`
-- (See below for the actual view)
--
CREATE TABLE `product_view` (
`serial` int(11)
,`product` varchar(100)
,`price` double(10,2)
,`br_name` varchar(100)
,`contact` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `conditional_tab`
--
DROP TABLE IF EXISTS `conditional_tab`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `conditional_tab`  AS SELECT `product_view`.`serial` AS `serial`, `product_view`.`product` AS `product`, `product_view`.`price` AS `price`, `product_view`.`br_name` AS `br_name`, `product_view`.`contact` AS `contact` FROM `product_view` WHERE `product_view`.`price` > 5000 ORDER BY `product_view`.`product` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `product_view`
--
DROP TABLE IF EXISTS `product_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_view`  AS SELECT `brand`.`id` AS `serial`, `product`.`product_name` AS `product`, `product`.`price` AS `price`, `brand`.`br_name` AS `br_name`, `brand`.`contact` AS `contact` FROM (`brand` join `product`) WHERE `brand`.`id` = `product`.`brand_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
