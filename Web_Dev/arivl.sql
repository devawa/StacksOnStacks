-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2018 at 03:20 PM
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
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `user_id` int(11) NOT NULL,
  `registration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`user_id`, `registration`) VALUES
(62, '34435'),
(62, 'aka');

-- --------------------------------------------------------

--
-- Table structure for table `estates`
--

CREATE TABLE `estates` (
  `estate_name` varchar(50) NOT NULL,
  `estate_address` varchar(50) NOT NULL,
  `estate_email` varchar(50) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estates`
--

INSERT INTO `estates` (`estate_name`, `estate_address`, `estate_email`, `active`) VALUES
('Arivl', '25 Geog', 'arivl@gmail.com', 1),
('ArivlNew', '25 Ge Street', 'arivln@gmail.com', 1),
('aa', 'aa', 'john.doe@gmail.com', 1),
('Tuks', 'Roper', 'tuks@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `active` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`user_id`, `name`, `surname`, `password`, `age`, `id_number`, `number`, `active`) VALUES
(1, 'ian', 'matthews', 'ityler', 22, '2323v', '642992419', 1),
(3, 'Ntiko', 'mathaba', 'nt', 22, 'wegw', '222', 1),
(5, 'keith', 'gama', 'keith', 22, 'sdgsd', '212', 0);

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `user_id` int(11) NOT NULL,
  `criteria` varchar(50) DEFAULT NULL,
  `estate` varchar(50) NOT NULL,
  `activeEstate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

CREATE TABLE `super` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super`
--

INSERT INTO `super` (`user_id`, `name`, `surname`, `password`) VALUES
(1, 'ian', 'matthews', 'ityler');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `number`, `idNumber`, `license`, `email`, `active`, `guestRequest`, `resident`, `loggedOn`, `password`, `deleted`) VALUES
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
(62, 'g', 'g', 'g', 'g', 'g', 'g@g.com', 1, 0, 1, 0, 'temp', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`registration`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `estates`
--
ALTER TABLE `estates`
  ADD PRIMARY KEY (`estate_email`);

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `super`
--
ALTER TABLE `super`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `super`
--
ALTER TABLE `super`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
