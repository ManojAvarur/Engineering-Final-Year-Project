
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2021 at 11:28 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmato`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookie_data`
--

CREATE TABLE `cookie_data` (
  `cookie_user_unique_id` varchar(100) NOT NULL,
  `token_id_1` varchar(50) NOT NULL,
  `token_id_2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cookie_data`
--

INSERT INTO `cookie_data` (`cookie_user_unique_id`, `token_id_1`, `token_id_2`) VALUES
('ccac34d923330a2968f12e163d5a2cd6', '17a02c98b56360bb5365de17372a79d6', 'f1405bd5b79da5eeba392e54a4b60671');

-- --------------------------------------------------------

--
-- Table structure for table `sensor_data`
--

CREATE TABLE `sensor_data` (
  `time_stamp` datetime DEFAULT current_timestamp(),
  `sensor_user_unique_id` varchar(100) NOT NULL,
  `soil_moisture` float DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `humidity` float DEFAULT NULL,
  `irrigation_on_off_status` tinyint(1) DEFAULT NULL,
  `pump_on_off_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sensor_data`
--

INSERT INTO `sensor_data` (`time_stamp`, `sensor_user_unique_id`, `soil_moisture`, `temperature`, `humidity`, `irrigation_on_off_status`, `pump_on_off_status`) VALUES
('2021-07-01 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 69, 26, 63, 0, 0),
('2021-07-01 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 70, 28, 51, 1, 1),
('2021-07-01 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 56, 36, 80, 0, 1),
('2021-07-01 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 74, 34, 69, 0, 0),
('2021-07-01 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 54, 33, 78, 1, 0),
('2021-07-01 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 37, 33, 86, 0, 1),
('2021-07-01 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 69, 20, 75, 0, 0),
('2021-07-01 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 67, 30, 71, 0, 0),
('2021-07-01 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 55, 26, 73, 0, 0),
('2021-07-01 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 90, 28, 60, 1, 1),
('2021-07-01 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 59, 33, 47, 0, 0),
('2021-07-01 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 42, 36, 68, 0, 0),
('2021-07-02 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 62, 36, 84, 0, 0),
('2021-07-02 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 65, 30, 71, 0, 0),
('2021-07-02 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 81, 30, 63, 1, 0),
('2021-07-02 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 85, 36, 43, 0, 1),
('2021-07-02 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 46, 32, 73, 0, 1),
('2021-07-02 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 69, 30, 83, 0, 1),
('2021-07-02 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 51, 28, 86, 1, 0),
('2021-07-02 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 88, 29, 79, 0, 1),
('2021-07-02 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 61, 30, 78, 0, 0),
('2021-07-02 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 67, 21, 73, 0, 1),
('2021-07-02 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 64, 34, 53, 1, 0),
('2021-07-02 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 87, 24, 58, 0, 1),
('2021-07-03 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 54, 33, 70, 0, 1),
('2021-07-03 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 64, 30, 45, 0, 1),
('2021-07-03 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 77, 36, 43, 0, 1),
('2021-07-03 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 57, 20, 66, 1, 0),
('2021-07-03 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 89, 24, 59, 1, 0),
('2021-07-03 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 82, 22, 68, 1, 0),
('2021-07-03 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 31, 40, 48, 1, 0),
('2021-07-03 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 23, 27, 42, 1, 0),
('2021-07-03 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 41, 32, 51, 0, 0),
('2021-07-03 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 73, 39, 79, 1, 0),
('2021-07-03 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 25, 25, 40, 0, 1),
('2021-07-03 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 69, 33, 47, 1, 0),
('2021-07-04 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 30, 20, 80, 0, 1),
('2021-07-04 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 73, 34, 49, 0, 1),
('2021-07-04 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 36, 35, 65, 0, 1),
('2021-07-04 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 62, 26, 84, 0, 1),
('2021-07-04 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 21, 30, 49, 1, 1),
('2021-07-04 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 58, 31, 44, 1, 0),
('2021-07-04 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 44, 26, 75, 1, 1),
('2021-07-04 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 50, 22, 95, 1, 1),
('2021-07-04 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 72, 29, 75, 0, 0),
('2021-07-04 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 45, 30, 87, 0, 1),
('2021-07-04 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 62, 32, 61, 1, 1),
('2021-07-04 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 69, 40, 52, 0, 1),
('2021-07-05 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 23, 32, 47, 1, 0),
('2021-07-05 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 47, 25, 79, 0, 0),
('2021-07-05 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 72, 34, 54, 0, 0),
('2021-07-05 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 73, 27, 91, 0, 1),
('2021-07-05 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 79, 26, 57, 1, 1),
('2021-07-05 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 78, 25, 40, 1, 1),
('2021-07-05 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 77, 40, 79, 0, 1),
('2021-07-05 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 26, 35, 69, 0, 0),
('2021-07-05 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 86, 21, 60, 0, 0),
('2021-07-05 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 37, 38, 84, 0, 1),
('2021-07-05 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 67, 38, 94, 1, 0),
('2021-07-05 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 21, 28, 52, 0, 1),
('2021-07-06 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 62, 24, 45, 0, 0),
('2021-07-06 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 71, 37, 40, 0, 1),
('2021-07-06 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 58, 34, 78, 0, 1),
('2021-07-06 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 64, 34, 49, 1, 0),
('2021-07-06 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 50, 37, 40, 0, 0),
('2021-07-06 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 84, 36, 55, 0, 1),
('2021-07-06 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 61, 23, 53, 1, 1),
('2021-07-06 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 83, 33, 71, 1, 1),
('2021-07-06 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 66, 32, 71, 1, 0),
('2021-07-06 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 34, 31, 45, 0, 0),
('2021-07-06 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 44, 33, 92, 0, 0),
('2021-07-06 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 53, 35, 55, 0, 0),
('2021-07-07 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 79, 38, 49, 0, 0),
('2021-07-07 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 89, 22, 48, 0, 1),
('2021-07-07 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 20, 25, 62, 1, 0),
('2021-07-07 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 57, 25, 65, 0, 1),
('2021-07-07 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 74, 36, 72, 0, 0),
('2021-07-07 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 23, 39, 57, 1, 0),
('2021-07-07 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 31, 33, 92, 0, 0),
('2021-07-07 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 84, 32, 41, 1, 0),
('2021-07-07 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 60, 21, 59, 1, 1),
('2021-07-07 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 48, 38, 49, 1, 1),
('2021-07-07 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 73, 29, 64, 1, 0),
('2021-07-07 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 47, 21, 55, 1, 1),
('2021-07-08 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 51, 24, 65, 1, 1),
('2021-07-08 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 59, 34, 68, 0, 0),
('2021-07-08 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 31, 31, 92, 1, 0),
('2021-07-08 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 80, 39, 64, 0, 1),
('2021-07-08 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 32, 32, 94, 0, 1),
('2021-07-08 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 74, 30, 65, 1, 0),
('2021-07-08 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 74, 36, 52, 0, 0),
('2021-07-08 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 83, 37, 56, 0, 0),
('2021-07-08 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 20, 37, 55, 1, 1),
('2021-07-08 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 24, 32, 75, 1, 0),
('2021-07-08 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 46, 28, 48, 1, 0),
('2021-07-08 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 51, 26, 46, 0, 1),
('2021-07-09 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 73, 24, 57, 0, 1),
('2021-07-09 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 88, 30, 52, 0, 1),
('2021-07-09 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 42, 29, 47, 1, 0),
('2021-07-09 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 64, 21, 48, 0, 1),
('2021-07-09 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 43, 33, 53, 1, 0),
('2021-07-09 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 57, 35, 70, 1, 0),
('2021-07-09 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 87, 24, 50, 0, 1),
('2021-07-09 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 85, 26, 95, 0, 1),
('2021-07-09 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 81, 34, 68, 0, 1),
('2021-07-09 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 52, 23, 92, 1, 1),
('2021-07-09 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 33, 34, 74, 0, 1),
('2021-07-09 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 63, 28, 50, 1, 0),
('2021-07-10 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 35, 31, 90, 0, 0),
('2021-07-10 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 33, 21, 62, 0, 0),
('2021-07-10 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 81, 40, 86, 0, 0),
('2021-07-10 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 76, 35, 85, 0, 0),
('2021-07-10 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 69, 22, 59, 1, 1),
('2021-07-10 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 20, 29, 45, 1, 1),
('2021-07-10 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 41, 29, 48, 1, 0),
('2021-07-10 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 65, 39, 88, 1, 0),
('2021-07-10 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 43, 35, 65, 0, 1),
('2021-07-10 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 62, 30, 85, 1, 1),
('2021-07-10 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 87, 21, 80, 0, 0),
('2021-07-10 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 84, 36, 44, 1, 1),
('2021-07-11 00:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 26, 28, 44, 0, 0),
('2021-07-11 01:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 34, 35, 80, 1, 0),
('2021-07-11 02:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 36, 40, 69, 1, 1),
('2021-07-11 03:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 69, 26, 86, 1, 0),
('2021-07-11 04:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 62, 27, 63, 1, 1),
('2021-07-11 05:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 76, 28, 65, 1, 1),
('2021-07-11 06:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 38, 30, 81, 1, 1),
('2021-07-11 07:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 64, 26, 54, 1, 0),
('2021-07-11 08:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 63, 36, 94, 0, 0),
('2021-07-11 09:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 78, 28, 95, 0, 0),
('2021-07-11 10:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 42, 31, 40, 0, 1),
('2021-07-11 11:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 90, 37, 66, 0, 1);


-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_unique_id` varchar(100) NOT NULL,
  `user_full_name` char(50) NOT NULL,
  `user_phone_no` int(20) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_unique_id`, `user_full_name`, `user_phone_no`, `user_password`, `user_email_id`) VALUES
('ccac34d923330a2968f12e163d5a2cd6', 'Keerthana', 987654321, '747d8248a6f8b282fb7ce04afebde36785f2107cf4bc4bf2d7ce5eedf19d3fc4', 'human@farmato.io');

-- --------------------------------------------------------

--
-- Table structure for table `user_nodemcu_com`
--

CREATE TABLE `user_nodemcu_com` (
  `unc_user_unique_id` varchar(100) NOT NULL,
  `irrigation_manual_overide_request` tinyint(1) DEFAULT NULL,
  `sensor_data_request` tinyint(1) DEFAULT NULL,
  `user_freeze_flag` tinyint(1) DEFAULT NULL,
  `nodemcu_freeze_flag` tinyint(1) DEFAULT NULL,
  `temperature` float DEFAULT NULL,
  `humidity` float DEFAULT NULL,
  `soil_moisture` float DEFAULT NULL,
  `new_data_recieved_flag` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_nodemcu_com`
--

INSERT INTO `user_nodemcu_com` (`unc_user_unique_id`, `irrigation_manual_overide_request`, `sensor_data_request`, `user_freeze_flag`, `nodemcu_freeze_flag`, `temperature`, `humidity`, `soil_moisture`, `new_data_recieved_flag`) VALUES
('ccac34d923330a2968f12e163d5a2cd6', 0, 0, 0, 0, 30.9, 37, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookie_data`
--
ALTER TABLE `cookie_data`
  ADD KEY `cookie_user_unique_id` (`cookie_user_unique_id`);

--
-- Indexes for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD KEY `sensor_user_unique_id` (`sensor_user_unique_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_unique_id`);

--
-- Indexes for table `user_nodemcu_com`
--
ALTER TABLE `user_nodemcu_com`
  ADD KEY `unc_user_unique_id` (`unc_user_unique_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cookie_data`
--
ALTER TABLE `cookie_data`
  ADD CONSTRAINT `cookie_data_ibfk_1` FOREIGN KEY (`cookie_user_unique_id`) REFERENCES `user_login` (`user_unique_id`);

--
-- Constraints for table `sensor_data`
--
ALTER TABLE `sensor_data`
  ADD CONSTRAINT `sensor_data_ibfk_1` FOREIGN KEY (`sensor_user_unique_id`) REFERENCES `user_login` (`user_unique_id`);

--
-- Constraints for table `user_nodemcu_com`
--
ALTER TABLE `user_nodemcu_com`
  ADD CONSTRAINT `user_nodemcu_com_ibfk_1` FOREIGN KEY (`unc_user_unique_id`) REFERENCES `user_login` (`user_unique_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
