-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2022 at 03:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(20) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `car_nameplate` varchar(50) NOT NULL,
  `car_img` varchar(50) DEFAULT 'NA',
  `ac_price` float NOT NULL,
  `non_ac_price` float NOT NULL,
  `ac_price_per_day` float NOT NULL,
  `non_ac_price_per_day` float NOT NULL,
  `car_availability` varchar(10) NOT NULL,
  `MOP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_nameplate`, `car_img`, `ac_price`, `non_ac_price`, `ac_price_per_day`, `non_ac_price_per_day`, `car_availability`, `MOP`) VALUES
(17, 'NISSAN', '123', 'assets/img/cars/Fortuner.png', 20, 50, 10, 100, 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `clientcars`
--

CREATE TABLE `clientcars` (
  `car_id` int(20) NOT NULL,
  `client_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientcars`
--

INSERT INTO `clientcars` (`car_id`, `client_username`) VALUES
(17, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_username` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_email` varchar(25) NOT NULL,
  `client_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `client_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_username`, `client_name`, `client_phone`, `client_email`, `client_address`, `client_password`) VALUES
('Admin', 'carlo', '8569874125', 'carlo@gmail.com', 'Surathkal', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_username` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`) VALUES
('oliver', 'oliver manarpaac', '9541257862', 'omanarpaac@gmail.com', 'LB', 'oliver');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(20) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `dl_number` varchar(50) NOT NULL,
  `driver_phone` varchar(15) NOT NULL,
  `driver_address` varchar(50) NOT NULL,
  `driver_gender` varchar(10) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `driver_availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `dl_number`, `driver_phone`, `driver_address`, `driver_gender`, `client_username`, `driver_availability`) VALUES
(14, 'Rene Serwyn Gimutao', '69', '+639282308166', 'Bay. Laguna', 'Male', 'Admin', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `e_mail`, `message`) VALUES
('dave', 'dave@gmail.com', 'Love IT');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `feedback` text NOT NULL,
  `suggestions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `name`, `email`, `phone`, `feedback`, `suggestions`) VALUES
(1, 'tep', '', '', 'excellent', 'maganda sya maganda');

-- --------------------------------------------------------

--
-- Table structure for table `rentedcars`
--

CREATE TABLE `rentedcars` (
  `id` int(100) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `car_id` int(20) NOT NULL,
  `driver_id` int(20) NOT NULL,
  `booking_date` date NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `car_return_date` date DEFAULT NULL,
  `fare` double NOT NULL,
  `charge_type` varchar(25) NOT NULL DEFAULT 'days',
  `distance` double DEFAULT NULL,
  `no_of_days` int(50) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `return_status` varchar(10) NOT NULL,
  `MOP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentedcars`
--

INSERT INTO `rentedcars` (`id`, `customer_username`, `car_id`, `driver_id`, `booking_date`, `rent_start_date`, `rent_end_date`, `car_return_date`, `fare`, `charge_type`, `distance`, `no_of_days`, `total_amount`, `return_status`, `MOP`) VALUES
(574681263, 'John Stephen Reaño Sibasib', 17, 14, '2022-05-18', '2022-05-19', '2022-05-25', '2022-05-18', 100, 'days', NULL, 6, 600, 'R', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`email`, `password`, `code`, `status`, `name`) VALUES
('johnsibasib@gmail.com', '$2y$10$I4yGOIcZL/GFS2TNGXhwPOl9lwChYF3J6PMk6rNEpYfu..JE.0p9a', 0, 'verified', 'John Stephen Reaño Sibasib');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `car_nameplate` (`car_nameplate`);

--
-- Indexes for table `clientcars`
--
ALTER TABLE `clientcars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_username`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_username`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `dl_number` (`dl_number`),
  ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentedcars`
--
ALTER TABLE `rentedcars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `driver_id` (`driver_id`),
  ADD KEY `rentedcars_ibfk_1` (`customer_username`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rentedcars`
--
ALTER TABLE `rentedcars`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574681264;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientcars`
--
ALTER TABLE `clientcars`
  ADD CONSTRAINT `clientcars_ibfk_1` FOREIGN KEY (`client_username`) REFERENCES `clients` (`client_username`),
  ADD CONSTRAINT `clientcars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`client_username`) REFERENCES `clients` (`client_username`);

--
-- Constraints for table `rentedcars`
--
ALTER TABLE `rentedcars`
  ADD CONSTRAINT `rentedcars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `rentedcars_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
