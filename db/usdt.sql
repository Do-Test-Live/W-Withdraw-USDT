-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 11:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usdt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'sales',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `ip`, `image`, `email`, `password`, `role`, `updated_at`) VALUES
(1, 'Monoget Saha', '27.147.190.199', 'assets/images/admin/45219_image001.jpg', 'monoget1@gmail.com', '123456', 'admin', '2022-12-10 10:29:53'),
(2, 'Super Admin', '103.107.160.134', 'public/images/profile/pic1.jpg', 'test@superadmin.com', '@BCD1234', 'admin', '2022-12-08 10:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `buysell`
--

CREATE TABLE `buysell` (
  `id` int(11) NOT NULL,
  `buy_price` double(10,2) NOT NULL,
  `sell_price` double(10,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buysell`
--

INSERT INTO `buysell` (`id`, `buy_price`, `sell_price`, `updated_at`) VALUES
(1, 0.00, 0.00, '2022-12-10 10:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_usdt`
--

CREATE TABLE `deposit_usdt` (
  `id` int(11) NOT NULL,
  `d_usdt` double(10,2) NOT NULL,
  `w_usdt` double(10,2) NOT NULL,
  `days` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_usdt`
--

CREATE TABLE `withdraw_usdt` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` double(10,2) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buysell`
--
ALTER TABLE `buysell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_usdt`
--
ALTER TABLE `deposit_usdt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_usdt`
--
ALTER TABLE `withdraw_usdt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buysell`
--
ALTER TABLE `buysell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposit_usdt`
--
ALTER TABLE `deposit_usdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_usdt`
--
ALTER TABLE `withdraw_usdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
