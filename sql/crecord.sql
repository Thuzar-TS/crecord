-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 11:05 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `project_id` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `remark` varchar(1000) NOT NULL,
  `createddate` varchar(10) NOT NULL,
  `modifieddate` varchar(10) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `recordstatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `project_id`, `address`, `phone_no`, `remark`, `createddate`, `modifieddate`, `userid`, `recordstatus`) VALUES
(1, 'Aye Aye', 2, 'Mandalay', '09-402616265', '', '03/15/2017', '16-03-2017', 's', 1),
(2, 'Aung Aung', 3, 'MDY', '09-4012244', '', '03/15/2017', '03/15/2017', 'sbo', 1),
(3, 'Mg Mg', 1, 'YGN', '09-4440789', '', '03/15/2017', '03/15/2017', 'sbo', 1),
(4, 'Min Min', 4, 'YGN', '0184256565', '', '03/15/2017', '03/15/2017', 'sbo', 1),
(5, 'Su Su', 6, 'Mandalay', '545655155', '', '03/15/2017', '03/15/2017', 'sbo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `createddate` varchar(10) NOT NULL,
  `modifieddate` varchar(10) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `recordstatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `createddate`, `modifieddate`, `userid`, `recordstatus`) VALUES
(1, 'TAcc', '03/15/2017', '16-03-2017', 'sbo', 1),
(2, 'POS System', '03/15/2017', '03/15/2017', 'sbo', 1),
(3, 'Restaurer ', '03/15/2017', '03/15/2017', 'sbo', 1),
(4, 'PaySysPro', '03/15/2017', '03/15/2017', 'sbo', 1),
(5, 'MYHMS ', '03/15/2017', '03/15/2017', 'sbo', 1),
(6, 'Synergy', '03/15/2017', '03/15/2017', 'sbo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `login_id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createddate` varchar(10) NOT NULL,
  `modifieddate` varchar(10) NOT NULL,
  `recordstatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `login_id`, `username`, `password`, `createddate`, `modifieddate`, `recordstatus`) VALUES
(1, 'sbo', 'Sabal Oo', '202cb962ac59075b964b07152d234b70', '3/15/2017', '3/15/2017', 1),
(2, 'thz', 'Thiha Zaw', '202cb962ac59075b964b07152d234b70', '3/16/2017', '3/16/2017', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
