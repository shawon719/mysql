-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 06:51 PM
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
-- Database: `brandproductdb_newadd`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `br` (IN `n` VARCHAR(100), IN `c` VARCHAR(100))   BEGIN
INSERT INTO brandtab SET id=null,name=n,contact=c;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro` (IN `pr_name` VARCHAR(100), IN `price` INT, IN `b_id` INT)   BEGIN
INSERT INTO producttab(name, price, brand_id) VALUES(pr_name, price, b_id);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brandtab`
--

CREATE TABLE `brandtab` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brandtab`
--

INSERT INTO `brandtab` (`id`, `name`, `contact`) VALUES
(11, 'mac', '98636'),
(12, 'hp', '0529584');

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_details`
-- (See below for the actual view)
--
CREATE TABLE `products_details` (
`id` int(11)
,`P_name` varchar(100)
,`price` int(11)
,`name` varchar(100)
,`contact` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `producttab`
--

CREATE TABLE `producttab` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttab`
--

INSERT INTO `producttab` (`id`, `name`, `price`, `brand_name`, `brand_id`) VALUES
(21, 'macbook', 59825, '', 11),
(22, 'keyboard', 6524, '', 12);

-- --------------------------------------------------------

--
-- Structure for view `products_details`
--
DROP TABLE IF EXISTS `products_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_details`  AS SELECT `brandtab`.`id` AS `id`, `producttab`.`name` AS `P_name`, `producttab`.`price` AS `price`, `brandtab`.`name` AS `name`, `brandtab`.`contact` AS `contact` FROM (`brandtab` join `producttab`) WHERE `brandtab`.`id` = `producttab`.`brand_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brandtab`
--
ALTER TABLE `brandtab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttab`
--
ALTER TABLE `producttab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brandtab`
--
ALTER TABLE `brandtab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `producttab`
--
ALTER TABLE `producttab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
