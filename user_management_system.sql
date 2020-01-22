-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 03:56 PM
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
-- Table structure for table `password_recovery`
--

CREATE TABLE `password_recovery` (
  `recovery_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `deleted` enum('yes','no') NOT NULL DEFAULT 'no',
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `createdDate` date NOT NULL,
  `modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `addedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`, `address`, `role`, `createdDate`, `modifiedDate`, `status`, `addedBy`) VALUES
(1, 'disha', 'disha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'mumbai', 'admin', '2020-01-22', '2020-01-22 06:09:04', 'active', 0),
(2, 'sagar', 'sagar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'mumbai', 'admin', '2020-01-22', '2020-01-22 06:24:22', 'active', 0),
(3, 'vidya', 'vidya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'mumbai', 'admin', '2020-01-22', '2020-01-22 06:26:15', 'active', 0),
(4, 'raj', 'raj@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'mumbai', 'user', '2020-01-22', '2020-01-22 06:27:43', 'active', 0),
(5, 'neha jagtap', 'neha@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'delhi', 'admin', '2020-01-22', '2020-01-22 11:41:39', 'active', 0),
(6, 'nisha', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'delhi', 'admin', '2020-01-22', '2020-01-22 11:43:58', 'active', 0),
(7, 'ghgh', 'pradeep@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'pune', 'admin', '2020-01-22', '2020-01-22 12:17:46', 'active', 0),
(8, 'xcxc', 'jashajs@sdskd.com', '10b8e822d03fb4fd946188e852a4c3e2', 'zzsd', 'admin', '2020-01-22', '2020-01-22 12:21:32', 'active', 0),
(9, 'Vidya Satpute', 'admin@example.coms', '6024bb4b0cdaeeb3fffd6e7c920ca30e', 'dsds', 'admin', '2020-01-22', '2020-01-22 12:28:31', 'active', 0),
(10, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'admin', '2020-01-22', '2020-01-22 14:33:15', 'active', 0),
(11, 'ghgh', 'sdsjds@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'pune', 'admin', '2020-01-22', '2020-01-22 14:37:02', 'active', 0),
(12, 'ghgh', 'sdsjssds@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'pune', 'user', '2020-01-22', '2020-01-22 14:38:15', 'active', 0),
(13, 'xcxc', 'root@dfdf.com', 'e10adc3949ba59abbe56e057f20f883e', 'sdsdsd', 'user', '2020-01-22', '2020-01-22 14:39:07', 'active', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_recovery`
--
ALTER TABLE `password_recovery`
  ADD PRIMARY KEY (`recovery_id`);

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
-- AUTO_INCREMENT for table `password_recovery`
--
ALTER TABLE `password_recovery`
  MODIFY `recovery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
