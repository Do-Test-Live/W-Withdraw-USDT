-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2022 at 06:41 AM
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
-- Database: `u727820269_usdt`
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
(1, 0.00, 0.00, '2022-12-11 07:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_cny`
--

CREATE TABLE `deposit_cny` (
  `id` int(11) NOT NULL,
  `client_name` varchar(250) NOT NULL,
  `conversion_rate` double(10,4) NOT NULL,
  `input_method` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `bank_name` varchar(250) NOT NULL,
  `bank_holder` varchar(100) NOT NULL,
  `amount` double(15,4) NOT NULL,
  `w_amount` double(15,4) NOT NULL,
  `staking_days` int(11) NOT NULL,
  `transferee` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_cny`
--

INSERT INTO `deposit_cny` (`id`, `client_name`, `conversion_rate`, `input_method`, `account_number`, `bank_name`, `bank_holder`, `amount`, `w_amount`, `staking_days`, `transferee`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 'Jason', 1.1100, 'bank transfer', '', 'hang seng', 'chan ta man', 10000.0000, 10000.0000, 3, '', 'Approve', '2022-12-13 01:30:32', '2022-12-15 04:20:55'),
(2, 'Han', 1.2000, 'Bank', '123455', 'hang seng', 'Chan ', 10000.0000, 10000.0000, 3, '', 'Approve', '2022-12-13 14:06:42', '2022-12-15 04:20:58'),
(3, '-', 1.0000, '', '622908 398060 544311', '興業銀行珠海分行', '卓少君', 0.0000, 0.0000, 0, '', 'Approve', '2022-12-14 14:47:23', '2022-12-15 07:02:53'),
(4, 'WU YING ', 1.1500, 'Bank', '622908 398060 544311', '興業銀行珠海分行', '卓少君', 0.0000, 0.0000, 0, '', 'Approve', '2022-12-14 15:40:35', '2022-12-15 09:44:57'),
(5, 'Shirley', 1.1200, 'Bank', '622908 398060 544311', '興業銀行珠海分行', '卓少君', 50000.0000, 50000.0000, 0, '', 'Pending', '2022-12-14 18:05:30', '2022-12-15 04:21:07'),
(6, 'Shirley', 1.1200, 'Bank', '622908 398060 544311', '興業銀行珠海分行', '卓少君', 9252.0000, 9252.0000, 0, '', 'Pending', '2022-12-14 18:06:22', '2022-12-20 11:23:16'),
(7, 'Shirley', 1.1200, 'Bank', '622908 398060 544311', '興業銀行珠海分行', '卓少君', 15559.0000, 15559.0000, 1, '', 'Pending', '2022-12-14 18:23:45', '2022-12-15 04:21:12'),
(8, 'test', 0.8800, 'bank', '123', 'bank', '', 0.0000, 0.0000, 1, '', 'Pending', '2022-12-15 12:16:20', '2022-12-15 04:21:14'),
(9, 'test2', 0.8800, 'bank', 'bank', '', '', 100.0000, 100.0000, 1, 'test22', 'Pending', '2022-12-15 12:37:18', '2022-12-15 04:37:18'),
(10, 'HX', 0.8600, 'Bank', '', '農業銀行', '唐東紅', 198000.0000, 198000.0000, 7, '唐坤龍', 'Pending', '2022-12-15 17:47:42', '2022-12-15 09:47:42'),
(11, 'HX', 0.8600, 'Bank', '', '農業銀行', '唐東紅', 47379.0000, 47379.0000, 7, '唐坤龍', 'Pending', '2022-12-15 17:48:14', '2022-12-15 09:48:14'),
(12, 'HX', 0.8600, '', '', '', '陸海霞', 170900.0000, 170900.0000, 7, '唐坤龍', 'Pending', '2022-12-15 17:49:02', '2022-12-15 09:49:02'),
(13, 'HX', 0.8600, '', '', '', '陸海霞', 121500.0000, 121500.0000, 7, '唐坤龍', 'Pending', '2022-12-15 17:49:48', '2022-12-15 09:49:48'),
(14, 'MEI', 0.8800, '', '', '', '熊麗洋', 85000.0000, 85000.0000, 1, '趙明洋', 'Pending', '2022-12-15 17:51:18', '2022-12-15 09:51:18'),
(15, 'MEI', 0.8800, '', '', '', '熊麗洋', 45000.0000, 45000.0000, 1, '闫媛媛', 'Approve', '2022-12-15 17:55:44', '2022-12-20 04:37:04'),
(16, '未知', 0.8800, '', '', '', '郝正萍', 131820.0000, 131820.0000, 1, '郑甘露', 'Approve', '2022-12-16 10:48:11', '2022-12-20 04:36:59'),
(17, 'test', 0.8900, 'Bank', 'Bank', 'B', 'B', 1.0000, 1.0000, 1, 'Test', 'Approve', '2022-12-16 17:42:12', '2022-12-20 04:36:52'),
(18, 'test', 0.8900, '1', '1', '1', '1', 1.0000, 1.0000, 1, '1', 'Approve', '2022-12-16 18:46:33', '2022-12-20 04:36:45'),
(19, '1', 0.8888, '1', '1', '1', '1', 1.0000, 1.0000, 1, '1', 'Approve', '2022-12-16 20:08:24', '2022-12-18 14:40:12'),
(20, 'MEI', 0.8820, 'Bank', '', '', '蒲明义', 100000.0000, 100000.0000, 1, '熊丽洋', 'Pending', '2022-12-18 22:38:19', '2022-12-18 14:38:19'),
(21, 'Winny', 0.8600, '', '', '', '', 300000.0000, 300000.0000, 6, '', 'Pending', '2022-12-18 22:41:40', '2022-12-18 14:41:40'),
(22, '友邦入款70', 0.8600, '', '', '北京银行', '唐坤龙', 500000.0000, 500000.0000, 3, '张锰', 'Pending', '2022-12-18 22:42:49', '2022-12-19 07:16:17'),
(23, '友邦入款70', 0.8600, '', '', '', '唐坤龙', 200000.0000, 200000.0000, 3, '张锰', 'Pending', '2022-12-18 22:43:13', '2022-12-19 07:16:42'),
(24, 'MEI', 0.8835, '', '6226 0978 0609 5437', '招商銀行，深圳高新園支行', '郝正萍', 200000.0000, 200000.0000, 1, '田玉虎', 'Pending', '2022-12-19 15:19:05', '2022-12-19 07:19:05'),
(25, 'MEI', 0.8844, '平安银行 6422', '6217……3387', '建设银行', '蒲明义', 60000.0000, 60000.0000, 1, '李桂兰', 'Pending', '2022-12-20 13:24:51', '2022-12-20 05:36:17'),
(26, 'MEI', 0.8844, '招商银行 6214……9777', '6226……5437', '招商银行', '郝正萍', 250000.0000, 250000.0000, 1, '宫佳丽', 'Pending', '2022-12-20 13:25:56', '2022-12-20 05:35:36'),
(27, 'MEI', 0.8844, '建设银行6214……2333', '6226……5437', '招商银行', '郝正萍', 250000.0000, 250000.0000, 1, '宫佳丽', 'Pending', '2022-12-20 13:27:41', '2022-12-20 05:35:18'),
(28, 'MEI', 0.8844, '', '9542', '工商银行', '蒲明义', 50000.0000, 50000.0000, 1, '', 'Pending', '2022-12-20 13:29:16', '2022-12-20 05:34:52'),
(29, 'MEI', 0.8844, '平安银行 8393', '6217……6086', '建设银行', '闫媛媛', 70000.0000, 70000.0000, 1, '陈小云', 'Pending', '2022-12-20 13:30:20', '2022-12-20 05:34:14'),
(30, 'MEI', 0.8844, '平安银行 8393', '6216………4899', '中国银行', '闫媛媛', 23808.0000, 23808.0000, 1, '陈小云', 'Pending', '2022-12-20 13:31:07', '2022-12-20 05:33:11'),
(31, '？Tensun', 1.0000, '中国邮政储蓄 6217……7108', '622848……1775', '中国农业银行', '闫媛媛', 51899.0000, 51899.0000, 0, '周伟成', 'Pending', '2022-12-20 18:01:53', '2022-12-20 10:01:53'),
(32, '？Tensun', 1.0000, '招商银行 6214……1511', '6228……1775', '中国农业银行', '闫媛媛', 48301.0000, 48301.0000, 0, '王雅娜', 'Pending', '2022-12-20 18:03:18', '2022-12-22 15:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_usdt`
--

CREATE TABLE `deposit_usdt` (
  `id` int(11) NOT NULL,
  `d_usdt` double(10,2) NOT NULL,
  `w_usdt` double(10,2) NOT NULL,
  `usdt_price` varchar(50) NOT NULL,
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
  `amount` double(10,4) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw_usdt`
--

INSERT INTO `withdraw_usdt` (`id`, `date`, `amount`, `inserted_at`, `updated_at`) VALUES
(1, '2022-12-13', 10000.0000, '2022-12-13 01:30:37', '2022-12-12 17:30:37'),
(2, '2022-12-14', 10000.0000, '2022-12-14 18:54:36', '2022-12-14 10:54:36'),
(3, '2022-12-15', 38281.0000, '2022-12-15 15:02:04', '2022-12-15 07:02:04'),
(4, '2022-12-18', 0.0000, '2022-12-18 22:40:12', '2022-12-20 11:23:36'),
(5, '2022-12-20', 0.0000, '2022-12-20 12:36:45', '2022-12-20 11:23:30'),
(6, '2022-12-22', 0.0000, '2022-12-22 23:05:20', '2022-12-22 15:05:35');

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
-- Indexes for table `deposit_cny`
--
ALTER TABLE `deposit_cny`
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
-- AUTO_INCREMENT for table `deposit_cny`
--
ALTER TABLE `deposit_cny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `deposit_usdt`
--
ALTER TABLE `deposit_usdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_usdt`
--
ALTER TABLE `withdraw_usdt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
