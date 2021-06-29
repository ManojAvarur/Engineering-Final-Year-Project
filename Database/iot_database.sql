-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2021 at 10:57 PM
-- Server version: 10.3.22-MariaDB-log
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `289131`
--

-- --------------------------------------------------------

--
-- Table structure for table `sensor_data`
--

CREATE TABLE `sensor_data` (
  `time_stamp` datetime DEFAULT current_timestamp(),
  `sensor_data_user_id` varchar(100) NOT NULL,
  `soil_moisture` float DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `humidity` float DEFAULT NULL,
  `water_level` int(11) DEFAULT NULL,
  `pump_status` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test_iot`
--

CREATE TABLE `test_iot` (
  `temparature` float NOT NULL,
  `humidity` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_iot`
--

INSERT INTO `test_iot` (`temparature`, `humidity`) VALUES
(52, 28.2),
(52, 28.1),
(52, 28.1),
(52, 28.1),
(52, 28.1),
(52, 28.1),
(52, 28.1),
(52, 28.1),
(52, 28.1),
(52, 28.1),
(52, 28),
(52, 28),
(51, 28),
(51, 28),
(51, 28),
(51, 28),
(51, 28),
(51, 28),
(51, 28),
(51, 28),
(51, 28),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(51, 27.9),
(50, 27.9),
(50, 27.9),
(50, 27.9),
(50, 27.9),
(50, 27.8),
(50, 27.8),
(50, 27.8),
(50, 27.8),
(50, 27.8),
(50, 27.8),
(50, 27.8),
(50, 27.8),
(49, 27.8),
(49, 27.8),
(49, 27.8),
(49, 27.8),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.7),
(50, 27.8),
(50, 27.7),
(50, 27.7),
(50, 27.8),
(50, 27.8),
(51, 27.8),
(51, 27.8),
(51, 27.8),
(51, 27.8),
(51, 27.8),
(51, 27.8),
(51, 27.8),
(51, 27.8);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` varchar(100) NOT NULL,
  `full_name` char(50) NOT NULL,
  `phone_no` int(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD KEY `sensor_data_user_id` (`sensor_data_user_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
