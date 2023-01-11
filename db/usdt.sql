-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2023 at 07:15 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u727820269_cnyhkd`
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
(1, 'Monoget Saha', '27.147.190.199', 'assets/images/admin/55116_2630878.png', 'monoget1@gmail.com', '123456', 'admin', '2022-12-13 06:03:24'),
(2, 'Super Admin', '103.107.160.134', 'assets/images/admin/55116_2630878.png', 'test@usdt.com', '@BCD1234', 'admin', '2022-12-13 06:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `balance` double(10,2) NOT NULL,
  `conversion_rate` double(10,4) NOT NULL,
  `balance_type` varchar(15) NOT NULL DEFAULT 'Deposit',
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES
(1, 1, 500000.00, 0.8700, 'Deposit', '2023-01-03 16:58:05'),
(2, 1, 29000.00, 0.8700, 'Deposit', '2023-01-03 16:58:51'),
(3, 2, 23397.00, 0.8975, 'Deposit', '2023-01-05 12:23:16'),
(4, 2, 26068.00, 0.8975, 'Stake', '2023-01-05 12:26:27'),
(5, 2, 23396.03, 0.8975, 'Deposit', '2023-01-05 12:28:02'),
(6, 3, 250000.00, 0.8618, 'Deposit', '2023-01-05 12:44:20'),
(7, 3, 290090.51, 0.8618, 'Stake', '2023-01-05 12:45:02'),
(8, 3, 50000.00, 0.8618, 'Deposit', '2023-01-05 13:00:45'),
(9, 3, 58018.10, 0.8618, 'Stake', '2023-01-05 13:01:14'),
(10, 4, 50000.00, 0.8618, 'Deposit', '2023-01-05 13:02:07'),
(11, 4, 58018.10, 0.8618, 'Stake', '2023-01-05 13:02:22'),
(12, 2, 26069.08, 0.8975, 'Stake', '2023-01-05 13:05:32'),
(13, 2, 23397.00, 0.8975, 'Deposit', '2023-01-05 13:09:15'),
(14, 3, 300000.00, 1.0000, 'Deposit', '2023-01-06 15:57:10'),
(15, 5, 300000.00, 0.8510, 'Deposit', '2023-01-10 16:07:22'),
(16, 5, 352526.44, 0.8510, 'Stake', '2023-01-10 16:07:54'),
(17, 4, 18969.00, 0.8508, 'Deposit', '2023-01-10 17:46:56'),
(18, 4, 24886.00, 0.8508, 'Deposit', '2023-01-10 17:47:53'),
(19, 4, 51545.61, 0.8618, 'Stake', '2023-01-10 18:06:23'),
(20, 6, 79000.00, 0.8278, 'Deposit', '2023-01-11 12:57:30'),
(21, 7, 40930.00, 0.8446, 'Deposit', '2023-01-11 13:11:03'),
(22, 8, 16173.00, 0.8508, 'Deposit', '2023-01-11 13:20:38'),
(23, 8, 19009.17, 0.8508, 'Stake', '2023-01-11 13:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `trasferee` varchar(200) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `client_name`, `phone`, `trasferee`, `inserted_at`, `updated_at`) VALUES
(1, 'MEI9203', 'MEI9203', '', '2023-01-03 16:57:33', '2023-01-03 08:57:33'),
(2, 'Coco 永亨', '69407527', '', '2023-01-05 12:19:20', '2023-01-05 04:19:20'),
(3, 'YE5377 ', 'YE5377 ', '', '2023-01-05 12:42:05', '2023-01-05 04:42:05'),
(4, 'CAO3641', 'CAO3641', '', '2023-01-05 13:01:34', '2023-01-05 05:01:34'),
(5, 'MI9500', 'MI9500', '', '2023-01-10 16:04:14', '2023-01-10 08:04:14'),
(6, 'CTT1558', 'CTT1558', '', '2023-01-11 12:55:29', '2023-01-11 04:55:29'),
(7, 'YYH1558', 'YYH1558', '', '2023-01-11 13:07:59', '2023-01-11 05:07:59'),
(8, 'CAO 1558', 'CAO 1558', '', '2023-01-11 13:19:34', '2023-01-11 05:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_cny`
--

CREATE TABLE `deposit_cny` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `conversion_rate` double(10,4) NOT NULL,
  `input_method` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `bank_holder` varchar(100) NOT NULL,
  `amount` double(15,2) NOT NULL,
  `proof_image` varchar(250) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_cny`
--

INSERT INTO `deposit_cny` (`id`, `client_id`, `conversion_rate`, `input_method`, `account_number`, `bank_name`, `bank_holder`, `amount`, `proof_image`, `inserted_at`, `updated_at`) VALUES
(1, 1, 0.8700, '', '', '', '', 500000.00, '', '2023-01-03 16:58:05', '2023-01-03 08:58:05'),
(2, 1, 0.8700, '', '', '', '', 29000.00, '', '2023-01-03 16:58:51', '2023-01-03 08:58:51'),
(3, 2, 0.8975, '中國工商銀行 6212⋯⋯1582  孙艳红', '6217003170026146086', '建设银行惠州惠城支行', '闫媛媛', 23397.00, '', '2023-01-05 12:23:16', '2023-01-05 04:23:16'),
(4, 3, 0.8618, '', '', '', '', 250000.00, '', '2023-01-05 12:44:20', '2023-01-05 04:44:20'),
(5, 3, 0.8618, '', '', '', '', 50000.00, '', '2023-01-05 13:00:45', '2023-01-05 05:00:45'),
(6, 4, 0.8618, '', '', '', '', 50000.00, '', '2023-01-05 13:02:07', '2023-01-05 05:02:07'),
(7, 3, 1.0000, '', '', '', '', 300000.00, '', '2023-01-06 15:57:10', '2023-01-06 07:57:10'),
(8, 5, 0.8510, '', '', '', '', 300000.00, '', '2023-01-10 16:07:22', '2023-01-10 08:07:22'),
(9, 4, 0.8508, '', '', '', '', 18969.00, '', '2023-01-10 17:46:56', '2023-01-10 09:46:56'),
(10, 4, 0.8508, '', '', '', '', 24886.00, '', '2023-01-10 17:47:53', '2023-01-10 09:47:53'),
(11, 6, 0.8278, '', '', '', '', 79000.00, '', '2023-01-11 12:57:30', '2023-01-11 04:57:30'),
(12, 7, 0.8446, '', '', '', '', 40930.00, '', '2023-01-11 13:11:03', '2023-01-11 05:11:03'),
(13, 8, 0.8508, '', '', '', '', 16173.00, '', '2023-01-11 13:20:38', '2023-01-11 05:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `stake`
--

CREATE TABLE `stake` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `conversion_rate` double(10,4) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `staking_days` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stake`
--

INSERT INTO `stake` (`id`, `client_id`, `conversion_rate`, `amount`, `staking_days`, `status`, `inserted_at`, `updated_at`) VALUES
(2, 3, 0.8618, 290090.51, 7, 'Pending', '2023-01-05 12:45:02', '2023-01-05 04:45:02'),
(3, 3, 0.8618, 58018.10, 7, 'Pending', '2023-01-05 13:01:14', '2023-01-05 05:01:14'),
(4, 4, 0.8618, 58018.10, 3, 'Pending', '2023-01-05 13:02:22', '2023-01-05 05:02:22'),
(6, 5, 0.8510, 352526.44, 3, 'Pending', '2023-01-10 16:07:54', '2023-01-10 08:07:54'),
(7, 4, 0.8618, 51545.61, 7, 'Pending', '2023-01-10 18:06:23', '2023-01-10 10:06:23'),
(8, 8, 0.8508, 19009.17, 3, 'Pending', '2023-01-11 13:21:54', '2023-01-11 05:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `proof` varchar(250) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `conversion_rate` double(10,4) NOT NULL,
  `inserted_at` datetime NOT NULL
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
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_cny`
--
ALTER TABLE `deposit_cny`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stake`
--
ALTER TABLE `stake`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
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
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deposit_cny`
--
ALTER TABLE `deposit_cny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stake`
--
ALTER TABLE `stake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
