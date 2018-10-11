-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 06:43 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

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
  `registration` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`user_id`, `registration`) VALUES
(62, 'aka'),
(62, 'MGB284GP');

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
('Arivl', '', '', 1),
('ArivlNew', '', '', 1),
('Tuks', '', '', 1),
('estate', '', '', 0),
('TMM', '956 Park Street', 'tmm@lofts.com', 1),
('Festival Edge', '12 Festival Street', 'joh.doe@gmail.com', 1),
('The Wall', '1135 Francis Baard Street, Hatfield, Pretoria, Sou', 'thewall@gmail.com', 1);

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
  `number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`user_id`, `name`, `surname`, `password`, `age`, `id_number`, `number`) VALUES
(1, 'ian', 'matthews', 'ityler', 22, '2323v', '642992419'),
(4, 'Akua', 'Afrane-\r\n        okese', 'akua', 22, 'abc', '111'),
(5, 'keith', 'gama', 'keith', 22, 'sdgsd', '212');

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
(62, 'Resident', 'Arivl', 1),
(63, 'Resident', 'Arivl', 1),
(65, 'Guest', 'Arivl', 1),
(66, 'Resident', 'ArivlNew', 1),
(67, 'Resident', 'Tuks', 1);

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
(6, 'John', 'Doe', '08123456789', '1401250378945', 'MGB879GP', 'johndoe@gmail.com', 1, 1, 0, 0, 'temp', 0),
(34, 'Brandon', 'Blue', '076123456789', '8902458741369', 'LBB788GP', 'brandonblue@gmail.com', 1, 1, 0, 0, 'temp', 0),
(35, 'Carol', 'Chabangu', '0839133030', '6401256987413', 'WJV464GP', 'carolc@gmail.com', 0, 1, 0, 0, 'temp', 0),
(61, 'Fred', 'Fullham', '0601479523', '8804256971583', 'WST988GP', 'fred88@gmail.com', 0, 0, 1, 0, 'temp', 0),
(62, 'Gini', 'Gaba', '0795413897', '9608774123658', 'COS330GP', 'gini@gmail.com', 1, 0, 1, 0, 'temp', 0),
(63, 'Bongani', 'Mthembu', '0837158890', '95082369874152', 'COS326GP', 'bongani@gmail.com', 0, 0, 1, 0, 'temp', 0),
(64, 'Zukhanye', 'Gcilitshana', '0741234795', '9607315412894', 'COS222GP', 'zuks@gmail.com', 0, 0, 1, 0, 'temp', 0),
(65, 'Ian', 'Matthews', '0879652178', '9611227894235', 'COS212GP', 'tyler@gmail.com', 0, 1, 0, 0, 'temp', 0);

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `user_id`, `filename`, `type`) VALUES
(6, 62, 'profile_user.jpg', 'image');

--
-- Indexes for dumped tables
--

CREATE TABLE `history` (
  `_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `access` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`_id`, `user_id`, `access`) VALUES
(1, 6, '2018-09-20 18:18:08'),
(2, 6, '2018-10-11 15:13:17'),
(3, 6, '2018-10-11 15:13:20'),
(4, 6, '2018-10-11 15:13:23'),
(5, 6, '2018-10-11 15:16:28'),
(6, 6, '2018-10-11 15:16:30'),
(7, 6, '2018-10-11 15:16:33'),
(8, 6, '2018-10-11 15:17:45'),
(9, 6, '2018-10-11 15:18:32'),
(10, 6, '2018-10-11 15:18:35'),
(11, 6, '2018-10-11 15:18:38');

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD KEY `user_id` (`user_id`);


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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
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
