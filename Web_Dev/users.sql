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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `idNumber` varchar(50) NOT NULL,
  `license` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `active` int(11) NOT NULL,
  `guestRequest` int(11) NOT NULL,
  `resident` int(11) NOT NULL,
  `loggedOn` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `deleted` int(11) NOT NULL
) 

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `number`, `idNumber`, `license`, `email`, `active`, `guestRequest`, `resident`, `loggedOn`, `password`, `deleted`) VALUES
(1, 'Akua', 'Afrane-Okese', '+27766045178', '56475', 'Urban', 'u15019773@tuks.co.za', 0, 1, 0, 0, 'temp', 0),
(2, 'ian', 'matthews', '0670082010', '0', '540-gl GP', 'it@gmail.com', 0, 0, 1, 0, 'ityler', 0),
(3, 'ntiko', 'mathaba', '0682010', '546536', '54-gl GP', 'i@gmail.com\r\n        ', 0, 0, 1, 0, 'ntiko', 0),
(4, 'linda', 'zwane', '10', '245435', 'gl GP', 't@gmail.com', 1, 0, 1, 0, 'linda', 0),
(5, 'Akua', 'A', '710', '34535', '5 GP', 'ita@gmail.com', 1, 0, 1, 0, 'akua', 1),
(6, 'john', 'doe', '936', '46435', 'gp', 'a@gmail.com', 1, 1, 0, 0, 'temp', 0),
(11, 'www', 'www', '02', '6363', '554', 'dvisser@gold.org', 1, 0, 1, 0, 'temp', 0),
(16, 'the', 'one', '1', '0', '111', ' dvisser@gold.org', 0, 1, 0, 0, 'temp', 0),
(33, 'a', 'a', 'a', '0', 'a', 'a', 0, 1, 0, 0, 'temp', 0),
(34, 'b', 'b', 'b', '0', 'b', 'b', 1, 1, 0, 0, 'temp', 0),
(35, 'c', 'c', 'c', '0', 'c', 'c', 0, 1, 0, 0, 'temp', 0),
(61, 'f', 'f', 'f', 'f', 'f', 'f@g.com', 0, 0, 1, 0, 'temp', 0),
(62, 'g', 'g', 'g', 'g', 'g', 'g@g.com', 0, 0, 1, 0, 'temp', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
