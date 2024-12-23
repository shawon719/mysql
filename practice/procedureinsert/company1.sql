-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2024 at 06:07 PM
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
-- Database: `company11`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_prod` (IN `pn` VARCHAR(100), IN `pp` DOUBLE(10,2), IN `pid` INT(15))   BEGIN
INSERT INTO producttable SET id=null,p_name=pn,price=pp,pro_id=pid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `manu` (IN `mname` VARCHAR(100), IN `con` INT(15))   BEGIN 
INSERT INTO manufacturetabl SET id=null,m_name=mname,contact=con;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturetabl`
--

CREATE TABLE `manufacturetabl` (
  `id` int(15) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `contact` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturetabl`
--

INSERT INTO `manufacturetabl` (`id`, `m_name`, `contact`) VALUES
(5, 'asus', 678),
(7, 'apple', 675434567),
(8, 'lenovo', 345678);

-- --------------------------------------------------------

--
-- Table structure for table `producttable`
--

CREATE TABLE `producttable` (
  `id` int(15) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `manu_name` varchar(100) NOT NULL,
  `pro_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttable`
--

INSERT INTO `producttable` (`id`, `p_name`, `price`, `manu_name`, `pro_id`) VALUES
(1, 'monitor', 34567.00, '', 1),
(2, 'keyboard', 765.00, '', 2),
(3, 'mouse', 8765.00, '', 3),
(4, 'monitor', 34567.00, '', 4),
(5, 'keyboard', 765.00, '', 5),
(6, 'printer', 7654.00, '', 6),
(7, 'mac book', 99999999.99, '', 7),
(8, 'keyboard', 32456.00, '', 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_products`
-- (See below for the actual view)
--
CREATE TABLE `view_products` (
`serial` int(15)
,`p_name` varchar(100)
,`price` double(10,2)
,`m_name` varchar(100)
,`contact` int(15)
);

-- --------------------------------------------------------

--
-- Structure for view `view_products`
--
DROP TABLE IF EXISTS `view_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_products`  AS SELECT `manufacturetabl`.`id` AS `serial`, `producttable`.`p_name` AS `p_name`, `producttable`.`price` AS `price`, `manufacturetabl`.`m_name` AS `m_name`, `manufacturetabl`.`contact` AS `contact` FROM (`manufacturetabl` join `producttable`) WHERE `manufacturetabl`.`id` = `producttable`.`pro_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manufacturetabl`
--
ALTER TABLE `manufacturetabl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttable`
--
ALTER TABLE `producttable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manufacturetabl`
--
ALTER TABLE `manufacturetabl`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `producttable`
--
ALTER TABLE `producttable`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
