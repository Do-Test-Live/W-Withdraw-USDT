-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 01:13 PM
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
(1, 'Monoget Saha', '27.147.190.199', 'assets/images/admin/55116_2630878.png', 'monoget1@gmail.com', '123456', 'admin', '2022-12-13 06:03:24'),
(2, 'Super Admin', '103.107.160.134', 'assets/images/admin/55116_2630878.png', 'test@usdt.com', '@BCD1234', 'admin', '2022-12-13 06:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `balance` double(10,4) NOT NULL,
  `conversion_rate` double(10,4) NOT NULL,
  `balance_type` varchar(15) NOT NULL DEFAULT 'Deposit',
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`id`, `client_id`, `balance`, `conversion_rate`, `balance_type`, `inserted_at`) VALUES
(1, 0, 2000.0000, 0.8000, 'Deposit', '2023-01-01 15:53:51'),
(2, 1, 20000.0000, 0.8000, 'Deposit', '2023-01-01 15:56:28'),
(3, 1, 5000.0000, 0.8000, 'Withdraw', '2023-01-01 15:58:51'),
(4, 1, 5000.0000, 0.8000, 'Stake', '2023-01-01 15:59:21'),
(5, 2, 100000.0000, 0.8800, 'Deposit', '2023-01-01 16:02:12'),
(6, 2, 3000.0000, 0.8600, 'Deposit', '2023-01-01 17:46:15');

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
(1, 'test client1', '12345678', 'test trans1, test trans2, ', '2023-01-01 15:52:33', '2023-01-01 07:52:33'),
(2, 'test2', '98765432', '', '2023-01-01 16:01:54', '2023-01-01 08:01:54');

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
  `amount` double(15,4) NOT NULL,
  `proof_image` varchar(250) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_cny`
--

INSERT INTO `deposit_cny` (`id`, `client_id`, `conversion_rate`, `input_method`, `account_number`, `bank_name`, `bank_holder`, `amount`, `proof_image`, `inserted_at`, `updated_at`) VALUES
(1, 0, 0.8000, 'bank transfer', '123', 'hang seng', 'chan ta man', 2000.0000, '', '2023-01-01 15:53:51', '2023-01-01 07:53:51'),
(2, 1, 0.8000, 'bank transfer', '', 'hang seng', 'chan ta man', 20000.0000, '', '2023-01-01 15:56:28', '2023-01-01 07:56:28'),
(3, 2, 0.8800, 'bank transfer', '123', 'hang seng', 'chan ta man', 100000.0000, '', '2023-01-01 16:02:12', '2023-01-01 08:02:12'),
(4, 2, 0.8600, 'bank transfer', '123', 'hang seng', '', 3000.0000, '', '2023-01-01 17:46:15', '2023-01-01 09:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `stake`
--

CREATE TABLE `stake` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `conversion_rate` double(10,4) NOT NULL,
  `amount` double(10,4) NOT NULL,
  `staking_days` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stake`
--

INSERT INTO `stake` (`id`, `client_id`, `conversion_rate`, `amount`, `staking_days`, `status`, `inserted_at`, `updated_at`) VALUES
(2, 1, 0.8000, 5000.0000, 3, 'Pending', '2023-01-01 15:59:00', '2023-01-01 07:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `proof` varchar(250) NOT NULL,
  `amount` double(10,4) NOT NULL,
  `conversion_rate` double(10,4) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `client_id`, `proof`, `amount`, `conversion_rate`, `inserted_at`) VALUES
(1, 1, 'assets/images/proof/99947_testing.jpg', 5000.0000, 0.8000, '2023-01-01 15:58:51');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deposit_cny`
--
ALTER TABLE `deposit_cny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stake`
--
ALTER TABLE `stake`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
