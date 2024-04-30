-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 05:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greendbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_data`
--

CREATE TABLE `city_data` (
  `id` int(11) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `currency_code` varchar(10) DEFAULT NULL,
  `currency_name` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(10) DEFAULT NULL,
  `sunrise` time DEFAULT NULL,
  `sunset` time DEFAULT NULL,
  `time_zone` varchar(20) DEFAULT NULL,
  `distance_km` decimal(10,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_data`
--

INSERT INTO `city_data` (`id`, `country`, `region`, `city`, `latitude`, `longitude`, `currency_code`, `currency_name`, `currency_symbol`, `sunrise`, `sunset`, `time_zone`, `distance_km`) VALUES
(1, 'BD', 'Dhaka', 'Baridhara', 23.8025000, 90.4212000, 'BDT', 'Bangladeshi Taka', '৳', '05:48:00', '18:15:00', '+06:00', 0.8519),
(2, 'BD', 'Dhaka', 'Baridhara', 23.8025000, 90.4212000, 'BDT', 'Bangladeshi Taka', '৳', '05:48:00', '18:15:00', '+06:00', 0.8519),
(3, 'BD', 'Dhaka', 'Baridhara', 23.8025000, 90.4212000, 'BDT', 'Bangladeshi Taka', '৳', '05:48:00', '18:15:00', '+06:00', 0.8519),
(4, 'BD', 'Dhaka', 'Baridhara', 23.8025000, 90.4212000, 'BDT', 'Bangladeshi Taka', '৳', '05:48:00', '18:15:00', '+06:00', 0.8519),
(5, 'LY', 'Al Kufrah', 'Ma`tan as Sarah', 21.6833000, 21.8667000, 'LYD', 'Libyan Dinar', 'LD', '06:23:00', '18:48:00', '+02:00', 37.8076),
(6, 'BD', 'Dhaka', 'Baridhara', 23.8025000, 90.4212000, 'BDT', 'Bangladeshi Taka', '৳', '05:48:00', '18:15:00', '+06:00', 0.8519),
(7, 'BD', 'Dhaka', 'Baridhara', 23.8025000, 90.4212000, 'BDT', 'Bangladeshi Taka', '৳', '05:38:00', '18:19:00', '+06:00', 0.8519),
(8, 'BD', 'Mymensingh', 'Netrakona', 24.8835000, 90.7290000, 'BDT', 'Bangladeshi Taka', '৳', '05:36:00', '18:18:00', '+06:00', 0.6164),
(9, 'BD', 'Mymensingh', 'Netrakona', 24.8835000, 90.7290000, 'BDT', 'Bangladeshi Taka', '৳', '05:36:00', '18:18:00', '+06:00', 0.6164),
(10, 'BD', 'Mymensingh', 'Netrakona', 24.8835000, 90.7290000, 'BDT', 'Bangladeshi Taka', '৳', '05:36:00', '18:18:00', '+06:00', 0.6164),
(11, 'AU', 'New South Wales', 'Avon Dam', -34.3500000, 150.6330000, 'AUD', 'Australian Dollar', '$', '06:19:00', '17:36:00', '+11:00', 5.3230),
(12, 'BD', 'Mymensingh', 'Jabar Khila', 25.0274000, 90.0206000, 'BDT', 'Bangladeshi Taka', '৳', '05:39:00', '18:21:00', '+06:00', 0.4791);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, '', '', '', '2024-04-13 21:36:29'),
(2, '', '', '', '2024-04-13 21:36:35'),
(3, '', '', '', '2024-04-13 21:38:41'),
(4, '', '', '', '2024-04-13 21:39:24'),
(5, 'Ahsanul Amin Shanto', 'ahsanulaminshanto@gmail.com', 'adsfc', '2024-04-13 21:39:38'),
(6, '', '', '', '2024-04-13 21:40:34'),
(7, '', '', '', '2024-04-13 21:41:20'),
(8, '', '', '', '2024-04-13 21:41:21'),
(9, '', '', '', '2024-04-13 21:42:12'),
(10, '', '', '', '2024-04-13 21:42:13'),
(11, '', '', '', '2024-04-13 21:42:13'),
(12, '', '', '', '2024-04-13 21:42:14'),
(13, '', '', '', '2024-04-13 21:42:18'),
(14, 'as', 'as@gmail', 'adsasa', '2024-04-13 21:43:28'),
(15, 'as', 'as@gmail', 'adsasa', '2024-04-13 21:43:47'),
(16, 'as', 'as@gmail', 'adsasa', '2024-04-13 21:44:10'),
(17, 'as', 'as@gmail', 'adsasa', '2024-04-13 21:44:33'),
(18, 'as', 'as@gmail', 'adsasa', '2024-04-13 21:44:47'),
(19, 'x', 'x@gmail.com', 'adsd', '2024-04-13 21:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `indoor_info`
--

CREATE TABLE `indoor_info` (
  `id` int(11) NOT NULL,
  `soil_type` varchar(255) NOT NULL,
  `light_mode` varchar(255) NOT NULL,
  `light_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indoor_info`
--

INSERT INTO `indoor_info` (`id`, `soil_type`, `light_mode`, `light_time`) VALUES
(1, 'asd', 'asd', 3),
(2, 'fsvfv', 'dv', 12),
(3, 'Silt Soil', 'medium', 2),
(4, 'Silt Soil', 'medium', 2),
(5, 'Silt Soil', 'medium', 2),
(6, 'Silt Soil', 'medium', 2),
(7, 'Loamy Soil', 'low', 6),
(8, 'Loamy Soil', 'low', 6),
(9, 'Loamy Soil', 'low', 6),
(10, 'Loamy Soil', 'low', 6),
(11, 'Loamy Soil', 'low', 6),
(12, 'Loamy Soil', 'low', 6),
(13, 'Sandy Soil', 'medium', 4),
(14, 'Sandy Soil', 'hard', 3),
(15, 'Loamy Soil', 'low', 6),
(16, 'Loamy Soil', 'low', 6),
(17, 'Loamy Soil', 'low', 6),
(18, 'Loamy Soil', 'low', 6),
(19, 'Loamy Soil', 'low', 6),
(20, 'Loamy Soil', 'low', 6),
(21, 'Loamy Soil', 'low', 6),
(22, 'Sandy Soil', 'hard', 2),
(23, 'Loamy Soil', 'low', 6),
(24, 'Loamy Soil', 'low', 6),
(25, 'Loamy Soil', 'low', 6),
(26, 'Loamy Soil', 'low', 7),
(27, 'Loamy Soil', 'low', 5),
(28, 'Loamy Soil', 'low', 6),
(29, 'Loamy Soil', 'low', 6),
(30, 'Loamy Soil', 'low', 6),
(31, 'Loamy Soil', 'low', 6),
(32, 'Loamy Soil', 'low', 567),
(33, 'Loamy Soil', 'low', 6),
(34, 'Loamy Soil', 'low', 6),
(35, 'Loamy Soil', 'low', 6),
(36, 'Loamy Soil', 'low', 6),
(37, 'Loamy Soil', 'low', 6);

-- --------------------------------------------------------

--
-- Table structure for table `outdoor_info`
--

CREATE TABLE `outdoor_info` (
  `id` int(11) NOT NULL,
  `soil_type` varchar(255) NOT NULL,
  `light` varchar(255) NOT NULL,
  `water_level` varchar(255) NOT NULL,
  `max_level_available` varchar(255) NOT NULL,
  `total_area` varchar(255) NOT NULL,
  `tree_type` varchar(255) NOT NULL,
  `soil_ph` varchar(255) NOT NULL,
  `nutrients` varchar(255) NOT NULL,
  `maintenance_frequency` varchar(255) NOT NULL,
  `alternative` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outdoor_info`
--

INSERT INTO `outdoor_info` (`id`, `soil_type`, `light`, `water_level`, `max_level_available`, `total_area`, `tree_type`, `soil_ph`, `nutrients`, `maintenance_frequency`, `alternative`, `address`) VALUES
(1, 'fdg', 'gsdf', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'df'),
(2, 'fsvfv', '', '', '', '', '', '', '', '', '', ''),
(3, 'aaaaaaa', 'aa', 'aa', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(4, 'fsvfv', '', '', '', '', '', '', '', '', '', ''),
(5, 'loam', 'aa', 'moderate', 'aa', 'large', 'aa', '6.5', 'aa', 'aa', 'aa', 'aa'),
(6, 'loam', 'aa', 'moderate', 'aa', 'large', 'aa', '6.5', 'aa', 'aa', 'aa', 'aa'),
(7, 'loam', 'aa', 'moderate', 'aa', 'large', 'aa', '6.5', 'aa', 'aa', 'aa', 'aa'),
(8, 'loam', 'a', 'moderate', 'a', 'large', 'a', 'a', 'a', 'a', 'a', 'a'),
(9, 'loam', 'a', 'moderate', 'a', 'large', 'a', 'a', 'a', 'a', 'a', 'a'),
(10, 'loam', 'b', 'moderate', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b'),
(11, 'loam', '11', 'moderate', 'dc', 'dac', 'ad', 'ad', 'ada', 'ad', 'ad', 'ad'),
(12, 'loam', 'aa', 'moderate', 'aa', 'large', 'aa', '6.5', 'ada', 'ad', 'ad', 'df'),
(13, 'loam', 'aa', 'moderate', 'aa', 'large', 'aa', '6.5', 'dfgh', 'dfgh', 'ad', 'df'),
(14, 'loam', 'asas', 'moderate', 'asas', 'as', 'as', 'as', 'as', 'as', 'as', 'as'),
(15, 'loam', 'a', 'moderate', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(16, 'loam', 'a', 'moderate', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(17, 'loam', '1', 'moderate', '1', '1', '1', '1', '1', '1', '1', '1'),
(18, 'loam', 'asas', 'moderate', 'dfgh', 'large', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'dfgh', 'aa'),
(19, 'loam', '', 'moderate', '', '', '', '', '', '', '', ''),
(20, 'loam', '', 'moderate', '', '', '', '', '', '', '', ''),
(21, 'loam', '', 'moderate', '', '', '', '', '', '', '', ''),
(22, 'loam', '', 'moderate', '', '', '', '', '', '', '', ''),
(23, 'loam', '', 'moderate', '', '', '', '', '', '', '', ''),
(24, 'loam', '', 'moderate', '', '', '', '', '', '', '', ''),
(25, 'sda', '', '', '', '', '', '', '', '', '', ''),
(26, 'sda', 'sa', 'asds', 'asdsa', 'ads', 'adss', '44', '44', '44', '44', '44'),
(27, 'loam ', '1', 'moderate', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `project_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `latitude`, `longitude`, `project_number`) VALUES
(4, 23.80919347, 90.41713021, 'PROJ660b16d997b1b'),
(5, 23.81228540, 90.41627190, 'PROJ660b16f148caa'),
(6, 23.81228540, 90.41627190, 'PROJ660b16f271579'),
(7, 23.81228540, 90.41627190, 'PROJ660b16f2d6369'),
(8, 23.81228540, 90.41627190, 'PROJ660b16f3222cf'),
(9, 23.81228540, 90.41627190, 'PROJ660b16f352702'),
(10, 23.81228540, 90.41627190, 'PROJ660b16f385a81'),
(11, 23.81228540, 90.41627190, 'PROJ660b16f3b9a79'),
(12, 23.81228540, 90.41627190, 'PROJ660b16f40c5c4'),
(13, 23.82219340, 90.42195360, 'PROJ660b172bd45f7'),
(14, 23.82219340, 90.42195360, 'PROJ660b2d50e52ed'),
(15, 23.82219340, 90.42195360, 'PROJ660b2d6655515'),
(16, 23.82219340, 90.42195360, 'PROJ660b2d68294a8'),
(17, 23.82219340, 90.42195360, 'PROJ660b2d69e4b88'),
(18, 23.82219340, 90.42195360, 'PROJ660b2d6a43294'),
(19, 23.82219340, 90.42195360, 'PROJ660b2d6b3b3bf'),
(20, 23.82219340, 90.42195360, 'PROJ660b2d6c10692'),
(21, 23.82219340, 90.42195360, 'PROJ660b2d6cb72f2'),
(22, 22.37520750, 91.83486060, 'PROJ660b92dd920fa'),
(23, 23.82219340, 90.42195360, 'PROJ660dba76dbdd8'),
(24, 25.02349030, 90.01859990, 'PROJ661b08f2d5f4f'),
(25, 24.88208620, 90.72308700, 'PROJ661b095ac7df5'),
(26, 24.88208620, 90.72308700, 'PROJ661b0bb02854f'),
(27, -34.39700000, 150.64400000, 'PROJ661b0d70ae91d'),
(28, 25.57373394, 92.11835067, 'PROJ661b0e3192c06'),
(29, -34.39700000, 150.64400000, 'PROJ661b0ebb45f7d'),
(30, 24.88208620, 90.72308700, 'PROJ661b0ec430e08'),
(31, 25.48451072, 93.29938095, 'PROJ661b0ed604ae5'),
(32, 24.88208620, 90.72308700, 'PROJ661b0fa3b3e5a'),
(33, 24.88208620, 90.72308700, 'PROJ661b0feaf3c0b'),
(34, 24.88208620, 90.72308700, 'PROJ661b1097ba51e'),
(35, 24.88208620, 90.72308700, 'PROJ661b10c1b111e'),
(36, 24.88208620, 90.72308700, 'PROJ661b10dfeb356'),
(37, 24.88208620, 90.72308700, 'PROJ661b115d3cf40'),
(38, -34.39700000, 150.64400000, 'PROJ661b12211cece'),
(39, 24.88208620, 90.72308700, 'PROJ661b125acf22e'),
(40, 25.02349030, 90.01859990, 'PROJ661b12bf7d3e2'),
(41, 0.00000000, 0.00000000, 'PROJ661be96390dbb');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `remember_me` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `address`, `email`, `remember_me`, `created_at`) VALUES
(1, 'a', '$2y$10$uVXQyWy7f8QEm3sPM9GtHeoizDWQ/kvjYInvOF2OXiY8MqNYfkkrq', 'a', 'ahsanulaminshanto@gmail.com', 0, '2024-04-01 18:31:23'),
(2, 'b', '$2y$10$SOmhNKQ0QHiNubTl2m85PeB3rOYScnwcmriCAdLBNpPKr5PH0gRSa', 'b', 'b@gmail.com', 1, '2024-04-13 20:50:59'),
(3, 'b', '$2y$10$mP8Frx0iJkdf1Tcrnn0T/On4u/XP2da4jf9B7jBrJQy8rZl0iXQVO', 'b', 'b@gmail.com', 1, '2024-04-13 20:53:53'),
(4, 'b', '$2y$10$ZU.boLCSJ3ZkzNE1Kp1jTu.TNVywXsBeZfZLRC5glKhTuQ4SK4ccu', 'b', 'b@gmail.com', 1, '2024-04-13 20:54:21'),
(5, 'b', '$2y$10$Abt4Nz8SvxYtTE7KkXdsLeXCGDrt3IDR6wpxC6HZM.LLBk9aLrO..', 'b', 'b@gmail.com', 1, '2024-04-13 20:55:33'),
(6, 'c', '$2y$10$6vyDFr3LnNK2gH5IghMqP.De4Vgq8U2zj2DWm3te7/IFNchu3TnI.', 'c', 'c@gmail', 1, '2024-04-13 20:57:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_data`
--
ALTER TABLE `city_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indoor_info`
--
ALTER TABLE `indoor_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outdoor_info`
--
ALTER TABLE `outdoor_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_data`
--
ALTER TABLE `city_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `indoor_info`
--
ALTER TABLE `indoor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `outdoor_info`
--
ALTER TABLE `outdoor_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
