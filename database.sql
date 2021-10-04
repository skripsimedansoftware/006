-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Sep 30, 2021 at 01:23 AM
=======
-- Generation Time: Oct 02, 2021 at 01:39 AM
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
<<<<<<< HEAD
-- Database: `spk-pembagian-project`
=======
-- Database: `konglo-batik`
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `alternative_criteria`
--

CREATE TABLE `alternative_criteria` (
  `id` int(4) NOT NULL,
  `criteria_id` int(4) NOT NULL,
  `weight` double NOT NULL
=======
-- Table structure for table `custom-size`
--

CREATE TABLE `custom-size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order-id` int(11) NOT NULL,
  `part` enum('chest','waist','hip','shoulder','collar-to-hem','sleeve-length') NOT NULL,
  `size` int(3) NOT NULL
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `alternative_data`
--

CREATE TABLE `alternative_data` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `criteria`
--

CREATE TABLE `criteria` (
  `id` int(4) NOT NULL,
  `name` varchar(60) NOT NULL,
  `weight` double NOT NULL,
  `attribute` enum('cost','benefit') NOT NULL
=======
-- Table structure for table `design-motif`
--

CREATE TABLE `design-motif` (
  `id` int(4) NOT NULL,
  `title` int(11) NOT NULL,
  `attachment` tinytext NOT NULL,
  `description` tinytext NOT NULL,
  `status` enum('draft','publish') NOT NULL
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `email_confirm`
--

CREATE TABLE `email_confirm` (
  `id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL,
  `user_uid` varchar(40) NOT NULL,
  `confirm_code` int(6) NOT NULL,
  `expire_date` datetime NOT NULL,
  `status` enum('unconfirmed','confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(4) NOT NULL,
  `name` varchar(40) NOT NULL,
  `category` int(4) NOT NULL,
  `area` varchar(20) DEFAULT NULL,
  `budget` double NOT NULL,
  `deadline` date DEFAULT NULL,
  `status` enum('in-progress','not-completed','finished') NOT NULL
=======
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text DEFAULT NULL
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `project_category`
--

CREATE TABLE `project_category` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL
=======
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(6) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_time` datetime NOT NULL,
  `sleeve-length-type` enum('long','short') NOT NULL,
  `use-custom-size` tinyint(1) NOT NULL DEFAULT 0,
  `size-type` int(4) DEFAULT NULL,
  `custom-size` bigint(20) UNSIGNED DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `estimated_workmanship` int(4) DEFAULT NULL,
  `price` double NOT NULL,
  `payment-status` enum('unpaid','paid') NOT NULL DEFAULT 'unpaid',
  `payment-method` enum('cash','bank-transfer','midtrans') NOT NULL,
  `status` enum('canceled','waiting-for-confirmation','confirmed','rejected','on-progress','finished') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(4) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment-confirmation`
--

CREATE TABLE `payment-confirmation` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `attachment` varchar(60) DEFAULT NULL,
  `description` tinytext DEFAULT NULL,
  `status` enum('accept','decline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment-midtrans`
--

CREATE TABLE `payment-midtrans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `response` text DEFAULT NULL,
  `status` enum('unpaid','paid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `size-detail`
--

CREATE TABLE `size-detail` (
  `id` int(4) NOT NULL,
  `size-type` int(4) NOT NULL,
  `part` enum('chest','waist','hip','shoulder','collar-to-hem','sleeve-length-long','sleeve-length-short') NOT NULL,
  `size` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `size-type`
--

CREATE TABLE `size-type` (
  `id` int(4) NOT NULL,
  `type` enum('man','woman','boy','girl') NOT NULL,
  `code` varchar(20) NOT NULL,
  `show-index` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
<<<<<<< HEAD
  `id` int(2) NOT NULL,
  `role` enum('admin','studio','freelancer') NOT NULL,
=======
  `id` bigint(20) UNSIGNED NOT NULL,
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
  `email` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `full_name` varchar(40) NOT NULL,
<<<<<<< HEAD
=======
  `whatsapp` varchar(16) DEFAULT NULL,
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

<<<<<<< HEAD
INSERT INTO `user` (`id`, `role`, `email`, `username`, `password`, `full_name`, `photo`) VALUES
(1, 'admin', 'agungmasda29@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'user-profile-1.jpg');
=======
INSERT INTO `user` (`id`, `email`, `username`, `password`, `full_name`, `whatsapp`, `photo`) VALUES
(1, 'agungmasda29@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', NULL, 'user-profile-1.png');
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d

--
-- Indexes for dumped tables
--

--
<<<<<<< HEAD
-- Indexes for table `alternative_criteria`
--
ALTER TABLE `alternative_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alternative_data`
--
ALTER TABLE `alternative_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criteria`
--
ALTER TABLE `criteria`
=======
-- Indexes for table `custom-size`
--
ALTER TABLE `custom-size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design-motif`
--
ALTER TABLE `design-motif`
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_confirm`
--
ALTER TABLE `email_confirm`
  ADD PRIMARY KEY (`id`);

--
<<<<<<< HEAD
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_category`
--
ALTER TABLE `project_category`
=======
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment-confirmation`
--
ALTER TABLE `payment-confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment-midtrans`
--
ALTER TABLE `payment-midtrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size-detail`
--
ALTER TABLE `size-detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size-type`
--
ALTER TABLE `size-type`
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `alternative_criteria`
--
ALTER TABLE `alternative_criteria`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alternative_data`
--
ALTER TABLE `alternative_data`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `criteria`
--
ALTER TABLE `criteria`
=======
-- AUTO_INCREMENT for table `custom-size`
--
ALTER TABLE `custom-size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `design-motif`
--
ALTER TABLE `design-motif`
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_confirm`
--
ALTER TABLE `email_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_category`
--
ALTER TABLE `project_category`
=======
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment-confirmation`
--
ALTER TABLE `payment-confirmation`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment-midtrans`
--
ALTER TABLE `payment-midtrans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size-detail`
--
ALTER TABLE `size-detail`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size-type`
--
ALTER TABLE `size-type`
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
<<<<<<< HEAD
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 45472d17ba434b0556288a07fe1cc1764314df7d
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
