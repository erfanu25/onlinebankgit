-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 04:12 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obankdb`
--
CREATE DATABASE IF NOT EXISTS `obankdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `obankdb`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `account_number` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `balance` int(18) DEFAULT NULL,
  `address` varchar(400) NOT NULL,
  `ac_type` varchar(20) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Pending',
  `nid` varchar(16) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `nationality` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_number`, `username`, `pass`, `balance`, `address`, `ac_type`, `status`, `nid`, `dob`, `email`, `phone`, `gender`, `nationality`) VALUES
(1, '24568', 'erfan', '81dc9bdb52d04dc20036dbd8313ed055', 254, 'dhaka', 'active', 'Active', '4545454545', '2017-03-07', 'mderfan2@gmail.com', '1521438868', 'male', 'bangladeshi'),
(7, '13572163201', 'Ashfaq', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'Dhaka', 'Current', 'Active', '8654535345', '2018-04-09', 'hello@gmail.com', '0162178448', 'Male', 'Bangladeshi'),
(9, '19917673201', 'gdf', '264388973aaa9b2f9eb2aa84a9c7382e', NULL, 'dfgdf', 'Current', 'Pending', 'fdg', '2018-04-09', 'gfg', 'fgdfg', 'Male', 'Bangladeshi'),
(10, '13378325201', 'fdf', 'f0118e9bd2c4fb29c64ee03abce698b8', NULL, 'fdd', 'Current', 'Pending', 'fdf', '2018-04-09', 'dfd', 'dfdf', 'Male', 'Bangladeshi'),
(12, '17601217201', 'fgfhh', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'dhdf', 'Current', 'Pending', 'dfhfdh', '2018-04-17', 'dfhd', 'fdhfd', 'Male', 'Bangladeshi'),
(13, '11356788101', 'Md Erfan Ullah Bhuiy', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'Dhaka Cant.', 'Savings', 'Active', '199754645645', '1995-11-22', 'mderfan4.me@gmail.com', '1623038732', 'Male', 'Bangladeshi');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `user_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `nid` varchar(16) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`user_id`, `username`, `password`, `type`, `name`, `nid`, `dob`, `email`, `phone`, `gender`) VALUES
(1, 'emp', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'Erfan', '4646555', '2018-04-05', 'mderfan2@gmail.com', '1521438868', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `fund_transfer`
--

CREATE TABLE `fund_transfer` (
  `id` int(11) NOT NULL,
  `reciever_bank` varchar(40) NOT NULL,
  `reciever_name` varchar(40) NOT NULL,
  `reciever_ac_no` varchar(40) NOT NULL,
  `sender_name` varchar(40) NOT NULL,
  `sender_ac_no` varchar(40) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` int(8) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund_transfer`
--

INSERT INTO `fund_transfer` (`id`, `reciever_bank`, `reciever_name`, `reciever_ac_no`, `sender_name`, `sender_ac_no`, `date`, `amount`, `note`) VALUES
(5, 'City Bank', 'Rafiqul', '45678921', 'erfan', '24568', '2018-04-04 00:08:55', 256, 'testing'),
(9, 'Sonali Bank', 'Rafiqul', '26484645', 'erfan', '24568', '2018-04-04 00:13:28', 1000, 'Fees'),
(10, 'City Bank', 'Karim', '45678921', 'erfan', '24568', '2018-04-06 09:29:40', 2000, 'bill');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `account_number` varchar(13) NOT NULL,
  `transaction_id` int(12) DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `account_number`, `transaction_id`, `amount`, `type`, `date`, `description`) VALUES
(41, '24568', 5444, 256, 'Deposite', '2018-04-03 22:48:43', 'Deposite'),
(42, '24568', 45684, 1000, 'Deposite', '2018-04-03 22:49:31', 'Deposite'),
(43, '24568', 2164, 500, 'Deposite', '2018-04-03 23:30:49', 'Deposite'),
(59, '26484645', NULL, 1000, 'Deposite', '2018-04-04 00:12:40', 'Transfer to Sonali Bank 26484645'),
(60, '24568', 2444, 5000, 'Deposite', '2018-04-04 00:13:04', 'Deposite'),
(65, '24568', 15883220, 56465, 'Bill', '2018-04-04 00:52:11', 'Online Payment'),
(66, '24568', 11312366, 456, 'Bill', '2018-04-04 00:52:17', 'Online Payment'),
(67, '24568', 11784285, 4566, 'Bill', '2018-04-04 00:52:32', 'Online Payment'),
(69, '24568', 13668850, 1234, 'Bill', '2018-04-04 00:53:47', 'Online Payment'),
(71, '24568', 15811557, 500, 'Bill', '2018-04-04 00:58:02', 'Online Payment'),
(72, '24568', 12327089, 500, 'Bill', '2018-04-04 00:58:49', 'Online Payment'),
(73, '24568', 11224368, 500, 'Bill', '2018-04-04 00:58:56', 'Online Payment'),
(74, '24568', 12647013, 30, 'Bill', '2018-04-04 01:00:12', 'Online Payment'),
(75, '24568', 19041153, 30, 'Bill', '2018-04-04 01:00:45', 'Online Payment'),
(76, '24568', 11825594, 30, 'Bill', '2018-04-04 01:02:22', 'Online Payment'),
(77, '24568', 16685969, 20, 'Bill', '2018-04-04 01:03:40', 'Online Payment'),
(78, '24568', 13524469, 50, 'Bill', '2018-04-04 01:03:46', 'Online Payment'),
(79, '24568', 14782055, 10, 'Bill', '2018-04-04 01:04:13', 'Online Payment'),
(80, '24568', 13807379, 10, 'Bill', '2018-04-04 01:07:06', 'Online Payment'),
(81, '24568', 11395812, 10, 'Bill', '2018-04-04 01:11:13', 'Online Payment'),
(82, '24568', 17135199, 10, 'Bill', '2018-04-04 01:15:55', 'Online Payment'),
(83, '24568', 16767858, 20, 'Bill', '2018-04-04 01:18:32', 'Online Payment'),
(84, '24568', 19733993, 20, 'Bill', '2018-04-04 01:21:31', 'Online Payment'),
(85, '24568', 1565, 234, 'Deposite', '2018-04-06 09:22:13', 'Deposite'),
(86, '24568', 5466, 500, 'Deposite', '2018-04-06 09:28:02', 'Deposite'),
(87, '24568', NULL, 2000, 'Withdraw', '2018-04-06 09:29:40', 'Transfer In From 24568'),
(88, '45678921', NULL, 2000, 'Deposite', '2018-04-06 09:29:40', 'Transfer to City Bank 45678921'),
(89, '24568', 18406025, 300, 'Bill', '2018-04-06 09:33:07', 'Online Payment');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `token` varchar(16) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'dfdf', 'dfdsfds', '2018-04-06 19:47:50'),
(2, 'email', 'token', '2018-04-06 19:51:04'),
(3, 'mderfan2@gmail.com', '12427875', '2018-04-06 20:12:21'),
(4, 'mderfan2@gmail.com', '10253288', '2018-04-06 20:12:42'),
(5, 'mderfan2@gmail.com', '14227763', '2018-04-06 20:15:16'),
(6, 'mderfan2@gmail.com', '13366315', '2018-04-06 20:16:21'),
(7, 'mderfan2@gmail.com', '18098387', '2018-04-06 20:22:29'),
(8, 'mderfan2@gmail.com', '18277723', '2018-04-06 20:33:11'),
(9, 'mderfan2@gmail.com', '10624924', '2018-04-06 20:46:58'),
(10, 'mderfan2@gmail.com', '18117786', '2018-04-06 20:48:34'),
(11, 'mderfan2@gmail.com', '17736426', '2018-04-06 20:56:19'),
(12, 'mderfan2@gmail.com', '18142790', '2018-04-06 21:00:30'),
(13, 'mderfan2@gmail.com', '18401178', '2018-04-06 21:02:58'),
(14, 'mderfan2@gmail.com', '11284573', '2018-04-06 21:03:29'),
(15, 'mderfan2@gmail.com', '16903825', '2018-04-06 21:05:33'),
(16, 'mderfan2@gmail.com', '14027748', '2018-04-06 21:08:17'),
(17, 'mderfan2@gmail.com', '13497958', '2018-04-06 21:09:31'),
(18, 'mderfan2@gmail.com', '16562770', '2018-04-06 21:13:04'),
(19, 'mderfan2@gmail.com', '10555547', '2018-04-06 21:15:05'),
(20, 'mderfan2@gmail.com', '13507130', '2018-04-06 21:20:46'),
(21, 'mderfan2@gmail.com', '13897938', '2018-04-07 01:52:58'),
(22, 'mderfan2@gmail.com', '16045994', '2018-04-07 01:57:30'),
(23, 'mderfan2@gmail.com', '12993399', '2018-04-07 19:34:51'),
(24, 'mderfan4.me@gmail.co', '20153598', '2018-04-07 19:42:33'),
(25, 'mderfan2@gmail.com', '14648146', '2018-04-07 20:09:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD UNIQUE KEY `account_number` (`account_number`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `fund_transfer`
--
ALTER TABLE `fund_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fund_transfer`
--
ALTER TABLE `fund_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
