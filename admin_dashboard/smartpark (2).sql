-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2019 at 12:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartpark`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_slots`
--

CREATE TABLE `available_slots` (
  `slot_no` int(10) NOT NULL,
  `slot_availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_slots`
--

INSERT INTO `available_slots` (`slot_no`, `slot_availability`) VALUES
(0, 1),
(1, 0),
(2, 1),
(3, 0),
(4, 1),
(5, 1),
(6, 1),
(7, 0),
(8, 1),
(9, 0),
(10, 1),
(11, 1),
(12, 1),
(13, 0),
(14, 1),
(15, 0),
(16, 1),
(17, 0),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 0),
(23, 1),
(24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parking_details`
--

CREATE TABLE `parking_details` (
  `id` int(10) NOT NULL,
  `rego_plate` varchar(10) DEFAULT NULL,
  `entry_time` timestamp NULL DEFAULT NULL,
  `exit_time` timestamp NULL DEFAULT NULL,
  `slot_no` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking_details`
--

INSERT INTO `parking_details` (`id`, `rego_plate`, `entry_time`, `exit_time`, `slot_no`, `date`) VALUES
(1, '939WEP', '2019-06-04 01:15:00', '2019-06-04 04:00:00', 1, '2019-05-01'),
(2, '954SMN', '2019-06-04 09:25:00', '2019-06-04 12:26:00', 2, '2019-05-15'),
(3, 'TXF983', '2019-06-20 15:10:00', '2019-06-20 23:18:00', 2, '2019-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'testuser', 'testuserpass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_slots`
--
ALTER TABLE `available_slots`
  ADD PRIMARY KEY (`slot_no`);

--
-- Indexes for table `parking_details`
--
ALTER TABLE `parking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parking_details`
--
ALTER TABLE `parking_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
