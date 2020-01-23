-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 01:39 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `address` text NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `token` varchar(100) NOT NULL,
  `createdDate` date NOT NULL,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`, `address`, `role`, `token`, `createdDate`, `modifiedDate`, `status`, `addedBy`) VALUES
(1, 'test', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Pune', 'user', '', '2020-01-23', '2020-01-23 12:29:54', 'active', 0),
(3, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'goa', 'admin', '', '2020-01-23', '2020-01-23 12:30:03', 'active', 0),
(4, 'demo', 'demo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'pune', 'user', '', '2020-01-23', '2020-01-23 12:31:25', 'active', 0),
(5, 'user', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'lo', 'user', '', '2020-01-23', '2020-01-23 12:32:07', 'active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
