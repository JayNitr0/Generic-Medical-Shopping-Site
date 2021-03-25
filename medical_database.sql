-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 08:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id (unique)` int(11) NOT NULL,
  `line_total` int(11) NOT NULL,
  `tax_percentage` int(11) NOT NULL,
  `shipping_address_id` text NOT NULL,
  `payment_method (foreign key)` text NOT NULL,
  `Status (processing/shipped/delivered/cancelled)` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `card_type` varchar(64) NOT NULL,
  `card_number` int(32) NOT NULL,
  `exp_date` varchar(32) NOT NULL,
  `cvv` varchar(32) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `cardholder__first` int(255) NOT NULL,
  `cardholder_last` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first` varchar(128) NOT NULL,
  `user_last` varchar(128) NOT NULL,
  `user_phone_number` varchar(32) NOT NULL,
  `user_email_address` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  `user_permission` varchar(32) NOT NULL,
  `user_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first`, `user_last`, `user_phone_number`, `user_email_address`, `user_password`, `user_permission`, `user_verified`) VALUES
(1, 'Alec', 'Dipasquale', '732-762-5294', 'alecdipasquale@gmail.com', '123456', 'Privledged', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email_address` (`user_email_address`),
  ADD UNIQUE KEY `user_phone_number` (`user_phone_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
