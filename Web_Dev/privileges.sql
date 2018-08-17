-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2018 at 12:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arivl`
--

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `user_id` int(11) NOT NULL,
  `criteria` varchar(50) DEFAULT NULL,
  `estate` varchar(50) NOT NULL,
  `activeEstate` int(11) NOT NULL
) 

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`user_id`, `criteria`, `estate`, `activeEstate`) VALUES
(0, 'Guest', 'Arivl', 1),
(6, 'Admin', 'Arivl', 1),
(34, 'Guest', 'Arivl', 1),
(35, 'Guest', 'Arivl', 1),
(61, 'Resident', 'Arivl', 1),
(62, 'Resident', 'Arivl', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
