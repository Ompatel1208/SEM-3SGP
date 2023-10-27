-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 06:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_wash`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinglist`
--

CREATE TABLE `bookinglist` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `providerId` int(11) NOT NULL,
  `vehicletypeId` int(11) NOT NULL,
  `schedule` datetime NOT NULL,
  `totalAmount` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookinglist`
--

INSERT INTO `bookinglist` (`id`, `userId`, `serviceId`, `providerId`, `vehicletypeId`, `schedule`, `totalAmount`, `status`) VALUES
(3, 11, 1, 2, 7, '2023-03-19 00:00:00', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `userId`, `message`, `subject`) VALUES
(3, 11, 'sfasf', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `otp_id` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `isActive` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `Id` int(11) NOT NULL,
  `service_Id` int(11) NOT NULL,
  `vehicle_Id` int(11) NOT NULL,
  `price` float(15,2) NOT NULL DEFAULT 0.00,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`Id`, `service_Id`, `vehicle_Id`, `price`, `status`) VALUES
(2, 1, 7, 200.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `mobile1` varchar(20) NOT NULL,
  `mobile2` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `map` text NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`Id`, `Name`, `Address`, `mobile1`, `mobile2`, `email`, `password`, `gst`, `map`, `isactive`) VALUES
(4, 'prodivder', 'testsat', '1234567898', '1234567890', 'provider@gmail.com', '123456', 'SSFsdfasdsf', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `serviceName` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `serviceName`, `description`, `isActive`) VALUES
(1, 'Car Washing 11', 'car washing is the proces of the clean the car', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `role` int(3) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `fname`, `lname`, `email`, `password`, `dob`, `city`, `mobile`, `role`, `status`) VALUES
(11, 'test', 'test', 'soniparth598@gmail.com', '123456', '2023-02-11', 'bhavnagar', '1234567890', 1, 1),
(12, 'admin', 'admin', 'admin@gmail.com', 'admin', '2023-02-01', 'Ahmedabad', '1234567890', 2, 1),
(13, 'prodivder', 'prodivder', 'provider@gmail.com', '123456', '2023-04-13', 'testsat', '1234567898', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_list`
--

CREATE TABLE `vehicle_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_list`
--

INSERT INTO `vehicle_list` (`id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(7, '2 wheeler', 1, 0, '2023-02-28 21:37:23', '2023-02-28 22:06:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinglist`
--
ALTER TABLE `bookinglist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vehicle_list`
--
ALTER TABLE `vehicle_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinglist`
--
ALTER TABLE `bookinglist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vehicle_list`
--
ALTER TABLE `vehicle_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
