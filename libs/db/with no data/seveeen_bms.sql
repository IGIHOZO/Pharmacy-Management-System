-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 04:34 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seveeen_bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bms_costs`
--

CREATE TABLE `bms_costs` (
  `cost_id` int(11) NOT NULL,
  `cost_product_id` int(11) NOT NULL,
  `cost_insurance_id` int(11) NOT NULL,
  `cost_value` int(11) NOT NULL,
  `cost_bus` int(11) NOT NULL,
  `cost_status` varchar(5) NOT NULL,
  `cost_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bms_expenses`
--

CREATE TABLE `bms_expenses` (
  `expense_id` int(255) NOT NULL,
  `expense_name` varchar(80) NOT NULL,
  `expense_price` int(10) NOT NULL,
  `expense_status` text NOT NULL,
  `bms_exp_bus` int(11) NOT NULL,
  `exp_sub` int(30) NOT NULL,
  `expense_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bms_insurances`
--

CREATE TABLE `bms_insurances` (
  `insurance_id` int(11) NOT NULL,
  `insurance_name` varchar(30) NOT NULL,
  `insurance_bus` int(11) NOT NULL,
  `insurance_status` varchar(5) NOT NULL,
  `insurance_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bms_products`
--

CREATE TABLE `bms_products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_set_type` varchar(10) NOT NULL,
  `product_category` varchar(10) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_quantity` double NOT NULL,
  `product_set_quantity` int(255) NOT NULL,
  `pro_status` text NOT NULL,
  `bms_pr_bus` int(11) NOT NULL,
  `pro_sub` int(30) NOT NULL,
  `re_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bms_product_take_out`
--

CREATE TABLE `bms_product_take_out` (
  `ktout_id` int(255) NOT NULL,
  `ktout_product_id` int(255) NOT NULL,
  `ktout_product_quantity` double NOT NULL,
  `ktout_product_price` int(10) NOT NULL,
  `ktout_product_payed` varchar(255) NOT NULL,
  `product_creditor` varchar(30) NOT NULL,
  `ktout_product_status` text NOT NULL,
  `bms_kt_bus` int(11) NOT NULL,
  `ktout_sub` int(30) NOT NULL,
  `ktout_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ktout_insurance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bms_spr_relate`
--

CREATE TABLE `bms_spr_relate` (
  `spr_relate_id` int(11) NOT NULL,
  `spr_relate_spr` int(11) NOT NULL,
  `spr_relate_sub_comp` int(11) NOT NULL,
  `spr_relate_status` text NOT NULL,
  `spr_relate_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bms_sub_users`
--

CREATE TABLE `bms_sub_users` (
  `sub_id` int(255) NOT NULL,
  `sub_full_name` varchar(30) NOT NULL,
  `sub_user_name` varchar(30) NOT NULL,
  `sub_password` varchar(30) NOT NULL,
  `sub_bus_id` int(255) NOT NULL,
  `sub_status` text NOT NULL,
  `sub_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bms_users`
--

CREATE TABLE `bms_users` (
  `user_id` int(255) NOT NULL,
  `bms_usr_full_name` varchar(255) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(30) NOT NULL,
  `user_status` text NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bms_costs`
--
ALTER TABLE `bms_costs`
  ADD PRIMARY KEY (`cost_id`);

--
-- Indexes for table `bms_expenses`
--
ALTER TABLE `bms_expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `bms_insurances`
--
ALTER TABLE `bms_insurances`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `bms_products`
--
ALTER TABLE `bms_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `bms_product_take_out`
--
ALTER TABLE `bms_product_take_out`
  ADD PRIMARY KEY (`ktout_id`);

--
-- Indexes for table `bms_spr_relate`
--
ALTER TABLE `bms_spr_relate`
  ADD PRIMARY KEY (`spr_relate_id`);

--
-- Indexes for table `bms_sub_users`
--
ALTER TABLE `bms_sub_users`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `bms_users`
--
ALTER TABLE `bms_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bms_costs`
--
ALTER TABLE `bms_costs`
  MODIFY `cost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `bms_expenses`
--
ALTER TABLE `bms_expenses`
  MODIFY `expense_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bms_insurances`
--
ALTER TABLE `bms_insurances`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `bms_products`
--
ALTER TABLE `bms_products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `bms_product_take_out`
--
ALTER TABLE `bms_product_take_out`
  MODIFY `ktout_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=783;
--
-- AUTO_INCREMENT for table `bms_spr_relate`
--
ALTER TABLE `bms_spr_relate`
  MODIFY `spr_relate_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bms_sub_users`
--
ALTER TABLE `bms_sub_users`
  MODIFY `sub_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `bms_users`
--
ALTER TABLE `bms_users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
