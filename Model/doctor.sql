-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 12:51 PM
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
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `status`, `date`) VALUES
(1, 1, 1, 'Completed', '2023-10-31'),
(2, 2, 3, 'Scheduled', '2023-11-01'),
(3, 1, 1, 'Scheduled', '2023-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` text NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `phone`, `address`, `blood_group`, `password`) VALUES
(1, 'Himu', 'himu@email.com', 1234567890, 'Dhaka', 'A+', '@1234'),
(2, 'Shehab', 'shehab@email.com', 1234567890, 'Dhaka', 'B+', '@1234');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `history` text NOT NULL,
  `medicine` text DEFAULT NULL,
  `test` text DEFAULT NULL,
  `recommendation` text NOT NULL,
  `date` date NOT NULL,
  `doctor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `patient_id`, `history`, `medicine`, `test`, `recommendation`, `date`, `doctor`) VALUES
(1, 1, 'Dengue', 'Napa extends', 'CBC', 'rest', '2023-11-05', 'Maliha Tasnuva'),
(2, 2, 'Heart Attcak', 'n/a', 'ECG', 'admit', '2023-11-04', 'Maliha Tasnuva'),
(3, 1, 'Cold', 'Alatrol', 'n/a', 'rest', '2023-11-04', 'Maliha Tasnuva'),
(4, 2, 'back pain', 'painkiller', 'xray', 'rest', '2023-11-05', 'Maliha Tasnuva'),
(5, 2, 'fever', 'napa', 'n/a', 'rest', '2023-11-05', 'Lukaku'),
(6, 1, 'pain', 'napa', 'xray', 'rest', '2023-11-05', 'Maliha Tasnuva'),
(7, 1, 'Fever', 'napa', 'n/a', 'rest', '2023-11-05', 'Maliha Tasnuva'),
(8, 2, 'cold', 'alatrol', 'n/a', 'n/a', '2023-11-01', 'Lukaku');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `designation`, `password`) VALUES
(1, 'Maliha Tasnuva', 'maliha@gmail.com', 'MBBS, Mental Doctor', '@1234'),
(2, 'Admin', 'admin@email.com', 'M.B.B.S.', '@1234'),
(3, 'Lukaku', 'lakaka@email.com', 'fcps', '@1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
