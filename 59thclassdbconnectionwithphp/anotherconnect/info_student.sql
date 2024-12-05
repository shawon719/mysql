-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 08:26 AM
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
-- Database: `info_student_dbconn`
--

-- --------------------------------------------------------

--
-- Table structure for table `trainee_details`
--

CREATE TABLE `trainee_details` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainee_details`
--

INSERT INTO `trainee_details` (`id`, `username`, `email`) VALUES
(1, 'sharmony', 's.sawon2001@gmail.com'),
(2, 'rinjin', 'fkjaf@gmail.com'),
(3, 'ruka', 'fadkf@gmail.com'),
(4, 'samia', 'adffa@gmail.com'),
(5, 'sumaiya', 'dasfafa@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trainee_details`
--
ALTER TABLE `trainee_details`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
