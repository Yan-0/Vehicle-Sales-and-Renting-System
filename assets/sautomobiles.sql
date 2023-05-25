-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 11:12 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sautomobiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL,
  `booked_by` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` text NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `address` varchar(50) NOT NULL,
  `booked_vehicle` varchar(50) NOT NULL,
  `booking_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booked_by`, `phone`, `country`, `email`, `address`, `booked_vehicle`, `booking_status`) VALUES
(9, 'Raunak Khadka', '9851122343', 'Nepal', 'raunak@gmail.com', 'Kathmandu', 'Harley-Davidson-SportsterS', 'pending'),
(10, 'Shreyan Bhandari', '9861960112', 'Nepal', 'shreyanbhandari36@gmail.com', 'Sundarbasti, Bhangal', 'Toyota-LC300', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rented_by` varchar(100) NOT NULL,
  `pickup_loc` varchar(255) NOT NULL,
  `dropoff_loc` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `end_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `rented_by`, `pickup_loc`, `dropoff_loc`, `vehicle_type`, `duration`, `start_date`, `end_date`) VALUES
(13, 'Dhiraj Jha', 'Tribhuvan International Airport', 'Chitwan', 'Car', '1 days, 0 hours, 1 minutes', '2023-05-13 08:48:00.000000', '2023-05-14 08:49:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `address` varchar(255) NOT NULL DEFAULT 'Kathmandu',
  `country` varchar(255) NOT NULL DEFAULT 'Nepal',
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `fullname`, `phone`, `email`, `address`, `country`, `user_type`) VALUES
(1, '0319b1d4bea02df4a314d6e0a1dd4151', 'Shreyan Bhandari', '9861960112', 'shreyanbhandari36@gmail.com', 'Budhanilkantha', 'Nepal', 'admin'),
(2, '432639de2357c9d560a9c3d022d3fc8a', 'Dhiraj Jha', '9800123456', 'dhiraj@gmail.com', 'Kathmandu', 'Nepal', 'user'),
(12, '6468b73a6a7122591320ef4114e9cf8e', 'Raunak Khadka', '9851122343', 'raunak@gmail.com', 'Kathmandu', 'Nepal', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(20) NOT NULL,
  `vehicle_model` varchar(100) NOT NULL,
  `make_year` int(10) NOT NULL,
  `color` text NOT NULL,
  `vehicle_type` varchar(50) NOT NULL,
  `vehicle_price` int(50) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `vehicle_model`, `make_year`, `color`, `vehicle_type`, `vehicle_price`, `image_name`) VALUES
(1, 'BMW Series 6', 2023, 'Silver', 'Sedan', 43000, ''),
(2, 'Toyota LC300', 2023, 'White', 'SUV', 89990, ''),
(3, 'Mercedes-Benz E-Class', 2021, 'Gunmetal Grey', 'Sedan', 57800, ''),
(4, 'Ford F-150 Raptor', 2023, 'Black', 'Pickup Truck', 109145, ''),
(5, 'Jeep Compass', 2023, 'Dual Tone', 'SUV', 35745, ''),
(6, 'Toyota GR Supra', 2022, 'White', 'Sports Car', 63280, ''),
(7, 'Hyundai Ioniq 6', 2023, 'Tan', 'Sedan', 57800, ''),
(8, 'Harley-Davidson Sportster S', 2023, 'Dual Tone (Black/White)', 'Cruiser Bike', 15599, '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_requested`
--

CREATE TABLE `vehicle_requested` (
  `request_id` int(255) NOT NULL,
  `requested_by` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `make_year` int(10) NOT NULL,
  `vehicle_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_requested`
--

INSERT INTO `vehicle_requested` (`request_id`, `requested_by`, `brand`, `model`, `make_year`, `vehicle_color`) VALUES
(13, 'Shreyan Bhandari', 'Ford', 'Ranger', 2023, 'Black'),
(14, 'Dhiraj Jha', 'BMW', 'I7', 2023, 'Grey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_key` (`fullname`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `vehicle_requested`
--
ALTER TABLE `vehicle_requested`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle_requested`
--
ALTER TABLE `vehicle_requested`
  MODIFY `request_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
