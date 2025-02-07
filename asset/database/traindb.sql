-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 11:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `id` int(20) NOT NULL,
  `ticket_no` int(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`) VALUES
(1, 'Akshay', 'akshay12@gmail.com', 'Booking tickets by using this site is very good'),
(2, 'ashutosh tiwari', 'ashutoshtiwari110504@gmail.com', 'easy booking system\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `passanger`
--

CREATE TABLE `passanger` (
  `pno` int(20) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_age` int(3) NOT NULL,
  `p_gender` varchar(3) NOT NULL,
  `seat_no` int(10) DEFAULT NULL,
  `ticket_no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `passanger`
--

INSERT INTO `passanger` (`pno`, `p_name`, `p_age`, `p_gender`, `seat_no`, `ticket_no`) VALUES
(1, 'Ajay Rathod', 21, 'm', 0, 1),
(2, 'Sujil Ahire', 23, 'm', 0, 2),
(3, 'Prax Nande', 7, 'm', 0, 2),
(4, 'Sujil Ahire', 23, 'm', 0, 3),
(5, 'Prax Nande', 9, 'm', 0, 3),
(6, 'Sujil Ahire', 22, 'm', 0, 4),
(7, 'Prax Nande', 9, 'm', 0, 4),
(8, 'ashu', 20, 'm', 0, 5),
(9, 'ashu', 82, 'm', 0, 6),
(10, 'ashu', 52, 'm', 0, 7),
(11, 'ashu', 56, 'm', 0, 8),
(12, 'ashu', 80, 'm', 0, 9),
(13, 'ashu', 30, 'm', 0, 10),
(14, 'ashu', 50, 'm', 0, 11),
(15, 'ashu', 42, 'm', 0, 12),
(16, 'ashu', 22, 'm', 0, 13),
(17, 'ashu', 12, 'm', 0, 14),
(18, 'ashu', 56, 'm', 0, 15),
(19, 'ashu', 26, 'm', 0, 16),
(20, 'ashu', 56, 'm', 0, 17),
(21, 'ashu', 63, 'm', 0, 18),
(22, 'ashu', 23, 'm', 0, 19),
(23, 'ashu', 20, 'm', 0, 20),
(24, 'anjali', 50, 'm', 0, 20),
(25, 'Ashutosh', 20, 'm', 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `station_no` int(20) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `fare` int(10) NOT NULL,
  `arrival_time` varchar(20) NOT NULL,
  `depart_time` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `train_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`station_no`, `source`, `destination`, `fare`, `arrival_time`, `depart_time`, `duration`, `train_no`) VALUES
(11, 'Mumbai', 'Ahmedabad', 800, '05:55', '23:25', '17.5', 12267),
(12, 'Aurangabad', 'Secunderabad', 350, '06:35', '20:15', '13.7', 22204),
(13, 'Madurai', 'Chennai', 700, '07:20', '22:40', '15.3', 22206),
(14, 'Jammu', 'Delhi', 1200, '05:05', '19:40', '14.6', 12426),
(15, 'NewDelhi', 'Lucknow', 900, '06:40', '20:50', '14.2', 12430),
(16, 'Ludhiana', 'Delhi', 600, '22:10', '16:40', '5.5', 12038),
(17, 'Aurangabad', 'Mumbai', 500, '08:30', '23:30', '15', 12307),
(18, 'Aurangabad', 'Mumbai', 500, '10:00', '1:00', '9', 22206),
(19, 'Mumbai', 'Banaras', 1500, '02:29', '21:00', '18.5', 12154),
(20, 'Mumbai', 'New Delhi', 2500, '08:35', '16:55', '16:20', 12951),
(21, 'Mumbai', 'New Delhi', 2300, '17:40', '10:55', '17:15', 12953),
(22, 'Howrah', 'New Delhi', 2000, '16:50', '10:05', '17:15', 12301),
(23, 'Sealdah', 'New Delhi', 2200, '20:05', '13:30', '17:25', 12259),
(24, 'New Delhi', 'Bhopal', 1000, '06:00', '10:40', '4:40', 12002),
(25, 'Delhi', 'Agra', 750, '08:10', '09:50', '1:40', 12049),
(26, 'Ahmedabad', 'Vadodara', 100, '06:25', '08:00', '1:35', 59442),
(27, 'Bengaluru', 'New Delhi', 1800, '18:40', '19:15', '48:35', 12627),
(28, 'Bengaluru', 'Patna', 2000, '18:15', '01:00', '30:45', 12295),
(29, 'Howrah', 'Chennai', 1500, '23:45', '07:20', '31:35', 12839),
(30, 'Delhi', 'Jaipur', 600, '08:00', '10:00', '4.0', 12154),
(31, 'Mumbai', 'Pune', 450, '06:15', '09:00', '3.0', 12154),
(32, 'Chennai', 'Bengaluru', 650, '06:45', '10:30', '4.0', 12154),
(33, 'Ahmedabad', 'Mumbai', 800, '07:00', '11:15', '5.5', 12154),
(34, 'Delhi', 'Agra', 700, '07:40', '11:00', '3.5', 12154),
(35, 'Kolkata', 'Delhi', 1400, '09:30', '14:00', '18.5', 12154),
(36, 'Bengaluru', 'Howrah', 2000, '10:10', '14:00', '30.0', 12154),
(37, 'Jaipur', 'Delhi', 600, '10:30', '14:30', '5.0', 12154),
(38, 'Mumbai', 'Chennai', 1100, '12:10', '18:00', '24.0', 12154),
(39, 'Lucknow', 'Delhi', 950, '13:00', '17:30', '6.5', 12430),
(40, 'Hyderabad', 'Mumbai', 1200, '14:00', '19:00', '15.0', 12430),
(41, 'Bengaluru', 'Madurai', 1500, '14:30', '20:00', '17.5', 12430),
(42, 'Surat', 'Mumbai', 500, '15:00', '17:45', '2.5', 12430),
(43, 'Nagpur', 'Mumbai', 600, '16:30', '19:30', '3.5', 12430),
(44, 'Delhi', 'Pune', 850, '18:00', '21:10', '3.0', 12430),
(45, 'Mumbai', 'Bengaluru', 1200, '19:30', '22:00', '3.5', 12154),
(46, 'Chennai', 'Hyderabad', 500, '21:00', '23:00', '3.0', 12154),
(47, 'Jaipur', 'Mumbai', 700, '23:00', '01:30', '5.0', 12430),
(48, 'Delhi', 'Lucknow', 900, '06:00', '08:30', '6.5', 12154),
(49, 'Howrah', 'Mumbai', 950, '07:15', '09:45', '6.0', 12430),
(50, 'Patna', 'Delhi', 850, '08:30', '11:00', '5.5', 12154),
(275, 'Mumbai', 'Pune', 130, '06:40', '09:12', '2:32', 12002),
(276, 'Pune', 'Mumbai', 130, '19:05', '21:37', '2:32', 12002),
(277, 'Delhi', 'Jaipur', 385, '06:05', '10:05', '4:00', 12045),
(278, 'Jaipur', 'Delhi', 385, '17:30', '21:30', '4:00', 12068),
(279, 'Chennai', 'Bengaluru', 435, '06:00', '10:30', '4:30', 12625),
(280, 'Bengaluru', 'Chennai', 435, '18:00', '22:30', '4:30', 12625),
(281, 'Howrah', 'New Delhi', 1570, '16:55', '10:00', '17:05', 12301),
(282, 'New Delhi', 'Howrah', 1570, '16:55', '10:00', '17:05', 12301),
(283, 'Mumbai', 'Ahmedabad', 790, '06:25', '13:10', '6:45', 12009),
(284, 'Ahmedabad', 'Mumbai', 790, '14:30', '21:15', '6:45', 12010),
(285, 'Bengaluru', 'Mysuru', 120, '11:00', '13:30', '2:30', 12627),
(286, 'Mysuru', 'Bengaluru', 120, '16:00', '18:30', '2:30', 12627),
(287, 'Hyderabad', 'Vijayawada', 375, '06:25', '11:55', '5:30', 12710),
(288, 'Vijayawada', 'Hyderabad', 375, '17:20', '22:50', '5:30', 12710),
(289, 'Kolkata', 'Bhubaneswar', 460, '06:05', '13:25', '7:20', 12839),
(290, 'Bhubaneswar', 'Kolkata', 460, '15:35', '22:55', '7:20', 12839),
(291, 'Mumbai', 'New Delhi', 1500, '16:35', '08:35', '16:00', 12951),
(292, 'New Delhi', 'Mumbai', 1500, '16:55', '08:55', '16:00', 12951),
(293, 'Bengaluru', 'Patna', 1800, '18:15', '23:55', '53:40', 12295),
(294, 'Patna', 'Bengaluru', 1800, '02:15', '08:00', '53:45', 12295),
(295, 'Chennai', 'Madurai', 450, '21:40', '06:20', '8:40', 12620),
(296, 'Madurai', 'Chennai', 450, '21:15', '05:55', '8:40', 12620),
(297, 'Ahmedabad', 'Vadodara', 100, '06:25', '08:00', '1:35', 59442),
(298, 'Vadodara', 'Ahmedabad', 100, '21:00', '22:35', '1:35', 59442);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_no` int(20) NOT NULL COMMENT '1000',
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `phno` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `train_no` int(6) NOT NULL,
  `station_no` int(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_no`, `status`, `date`, `phno`, `email`, `train_no`, `station_no`, `username`) VALUES
(1, 'cancelled', '2018-05-26', 9922123833, 'aks123@gmail.com', 12307, 17, 'ak143'),
(2, 'booked', '2019-09-22', 9922032033, 'aks143@gmail.com', 22206, 18, 'ak143'),
(3, 'booked', '2019-09-22', 9922032033, 'aks143@gmail.com', 22206, 18, 'ak143'),
(4, 'booked', '2019-09-22', 9922032033, 'aks143@gmail.com', 22206, 18, 'ak143'),
(5, 'booked', '2025-01-23', 9922032033, 'aks143@gmail.com', 22206, 18, 'aks143'),
(6, 'cancelled', '2025-01-31', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(7, 'booked', '2025-02-19', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(8, 'booked', '2025-02-19', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(9, 'booked', '2025-02-22', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(10, 'booked', '2025-02-28', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(11, 'booked', '2025-02-22', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(12, 'booked', '2025-02-28', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(13, 'booked', '2025-02-21', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(14, 'booked', '2025-02-02', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(15, 'booked', '2025-02-02', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(16, 'booked', '2025-02-26', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(17, 'booked', '2025-02-02', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(18, 'booked', '2025-02-28', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(19, 'booked', '2025-02-02', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(20, 'booked', '2025-02-05', 9922032033, 'aks143@gmail.com', 12154, 19, 'aks143'),
(21, 'booked', '2025-02-11', 9096452696, 'ashu@gmail.com', 12154, 19, 'ashu');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_no` int(6) NOT NULL,
  `train_name` varchar(100) NOT NULL,
  `seat_avail` int(3) NOT NULL,
  `class` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_no`, `train_name`, `seat_avail`, `class`) VALUES
(12002, 'New Delhi - Bhopal Shatabdi Express', 80, 'ALL'),
(12009, 'Mumbai Central - Ahmedabad Shatabdi Express', 120, 'CC'),
(12010, 'Ahmedabad - Mumbai Central Shatabdi Express', 110, 'CC'),
(12038, 'Shatabdi Express', 80, 'ALL'),
(12045, 'Delhi-Jaipur Express', 80, 'ALL'),
(12049, 'Gatimaan Express (Delhi - Agra)', 70, 'ALL'),
(12051, 'Delhi-Agra Express', 90, 'ALL'),
(12068, 'Jaipur-Delhi Express', 80, 'ALL'),
(12102, 'Mumbai-Pune Express', 70, 'ALL'),
(12137, 'Punjab Mail', 180, 'SL'),
(12138, 'Punjab Mail', 170, 'SL'),
(12154, 'Ashu Express', 34, 'ALL'),
(12155, 'Mumbai-Chennai Express', 50, 'ALL'),
(12181, 'Nagpur-Mumbai Express', 60, 'ALL'),
(12215, 'Delhi Sarai Rohilla - Bandra Terminus Garib Rath Express', 200, '3A'),
(12216, 'Bandra Terminus - Delhi Sarai Rohilla Garib Rath Express', 190, '3A'),
(12244, 'Ahmedabad-Mumbai Express', 100, 'ALL'),
(12256, 'Surat-Mumbai Express', 80, 'ALL'),
(12259, 'Duronto Express (Sealdah - New Delhi)', 90, 'ALL'),
(12261, 'Howrah - Mumbai CST Duronto Express', 100, '2A'),
(12262, 'Mumbai CST - Howrah Duronto Express', 95, '2A'),
(12267, 'MUMBAI CENTRAL - AHMEDABAD AC Duronto Exp', 45, 'ALL'),
(12283, 'Ernakulam - Nizamuddin Duronto Express', 130, '3A'),
(12284, 'Nizamuddin - Ernakulam Duronto Express', 125, '3A'),
(12295, 'Sanghamitra Express (Bengaluru - Patna)', 140, 'ALL'),
(12301, 'Howrah Rajdhani (Howrah - New Delhi)', 110, 'ALL'),
(12304, 'Kolkata-Delhi Express', 120, 'ALL'),
(12305, 'Howrah - New Delhi Rajdhani Express', 80, '1A'),
(12306, 'New Delhi - Howrah Rajdhani Express', 75, '1A'),
(12307, 'JODHPUR SF Express', 50, 'ALL'),
(12381, 'Howrah - New Delhi Poorva Express', 220, 'SL'),
(12382, 'New Delhi - Howrah Poorva Express', 210, 'SL'),
(12423, 'Dibrugarh - New Delhi Rajdhani Express', 90, '2A'),
(12424, 'New Delhi - Dibrugarh Rajdhani Express', 85, '2A'),
(12426, 'DELHI Rajdhani Express', 40, 'ALL'),
(12430, ' LUCKNOW SF Express', 45, 'ALL'),
(12432, 'Lucknow-Delhi Express', 45, 'ALL'),
(12505, 'Guwahati - Anand Vihar Northeast Express', 200, 'SL'),
(12506, 'Anand Vihar - Guwahati Northeast Express', 190, 'SL'),
(12620, 'Bengaluru-Madurai Express', 130, 'ALL'),
(12625, 'Chennai-Bengaluru Express', 60, 'ALL'),
(12627, 'Karnataka Express (Bengaluru - New Delhi)', 150, 'ALL'),
(12655, 'Bengaluru-Howrah Express', 150, 'ALL'),
(12710, 'Hyderabad-Mumbai Express', 110, 'ALL'),
(12801, 'Puri - New Delhi Purushottam Express', 180, '3A'),
(12802, 'New Delhi - Puri Purushottam Express', 175, '3A'),
(12833, 'Ahmedabad - Howrah Express', 230, 'SL'),
(12834, 'Howrah - Ahmedabad Express', 220, 'SL'),
(12839, 'Chennai Mail (Howrah - Chennai)', 160, 'ALL'),
(12859, 'Mumbai CST - Howrah Gitanjali Express', 150, '2A'),
(12860, 'Howrah - Mumbai CST Gitanjali Express', 145, '2A'),
(12905, 'Howrah - Porbandar Express', 210, 'SL'),
(12906, 'Porbandar - Howrah Express', 200, 'SL'),
(12909, 'Bandra Terminus - Hazrat Nizamuddin Garib Rath Express', 240, '3A'),
(12910, 'Hazrat Nizamuddin - Bandra Terminus Garib Rath Express', 230, '3A'),
(12925, 'Paschim Express', 190, 'SL'),
(12926, 'Paschim Express', 180, 'SL'),
(12951, 'Rajdhani Express (Mumbai - New Delhi)', 120, 'ALL'),
(12953, 'August Kranti Rajdhani Express (Mumbai - New Delhi)', 100, 'ALL'),
(12957, 'Ahmedabad - New Delhi Swarna Jayanti Rajdhani Express', 70, '1A'),
(12958, 'New Delhi - Ahmedabad Swarna Jayanti Rajdhani Express', 65, '1A'),
(14003, 'New Delhi - Malda Town Express', 220, 'SL'),
(14004, 'Malda Town - New Delhi Express', 210, 'SL'),
(15905, 'Dibrugarh - Kanniyakumari Vivek Express', 250, 'SL'),
(15906, 'Kanniyakumari - Dibrugarh Vivek Express', 240, 'SL'),
(16031, 'Chennai Egmore - Sengottai Express', 180, 'SL'),
(16032, 'Sengottai - Chennai Egmore Express', 170, 'SL'),
(16093, 'Chennai Egmore - Lucknow Express', 200, '3A'),
(16094, 'Lucknow - Chennai Egmore Express', 190, '3A'),
(17229, 'Sabari Express', 210, 'SL'),
(17230, 'Sabari Express', 200, 'SL'),
(18477, 'Puri - Yog Nagari Rishikesh Express', 230, 'SL'),
(18478, 'Yog Nagari Rishikesh - Puri Express', 220, 'SL'),
(19019, 'Bandra Terminus - Dehradun Express', 190, '3A'),
(19020, 'Dehradun - Bandra Terminus Express', 180, '3A'),
(20503, 'Dibrugarh - New Delhi Rajdhani Express', 85, '2A'),
(20504, 'New Delhi - Dibrugarh Rajdhani Express', 80, '2A'),
(22204, ' VISAKHAPATNAM Express', 40, 'ALL'),
(22206, ' CHENNAI Express', 33, 'ALL'),
(59442, 'Ahmedabad Passenger', 200, 'ALL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `security_question` varchar(100) NOT NULL,
  `security_answare` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `email`, `mobile_number`, `security_question`, `security_answare`) VALUES
('aks143', '123', 'Akshay', '', 'Rathod', 'M', '2018-06-26', 'aks143@gmail.com', 9922032033, '1', '13123'),
('ashu', 'ashu', 'ashutosh', 'devkant', 'tiwari', 'M', '2004-06-11', 'ashu@gmail.com', 9096452696, '2', 'flipper');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cancel`
--
ALTER TABLE `cancel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancel_ibfk_2` (`username`),
  ADD KEY `cancel_ibfk_1` (`ticket_no`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passanger`
--
ALTER TABLE `passanger`
  ADD PRIMARY KEY (`pno`),
  ADD KEY `ticket_fk` (`ticket_no`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`station_no`),
  ADD KEY `FOREIGN KEY` (`train_no`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_no`),
  ADD KEY `ticket_ibfk_1` (`train_no`),
  ADD KEY `ticket_ibfk_2` (`username`),
  ADD KEY `station_fk` (`station_no`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passanger`
--
ALTER TABLE `passanger`
  MODIFY `pno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `station_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_no` int(20) NOT NULL AUTO_INCREMENT COMMENT '1000', AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancel`
--
ALTER TABLE `cancel`
  ADD CONSTRAINT `cancel_ibfk_1` FOREIGN KEY (`ticket_no`) REFERENCES `ticket` (`ticket_no`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `cancel_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `passanger`
--
ALTER TABLE `passanger`
  ADD CONSTRAINT `ticket_fk` FOREIGN KEY (`ticket_no`) REFERENCES `ticket` (`ticket_no`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `station`
--
ALTER TABLE `station`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`train_no`) REFERENCES `train` (`train_no`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
