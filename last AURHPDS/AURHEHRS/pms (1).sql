-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 02:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `drug`
--

CREATE TABLE `drug` (
  `drug_no` int(11) NOT NULL,
  `drug_name` varchar(255) NOT NULL,
  `expired_date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `drug`
--

INSERT INTO `drug` (`drug_no`, `drug_name`, `expired_date`, `description`) VALUES
(1, 'Anpi', '2021-01-30', 'for lung'),
(2, 'mezil', '2021-01-18', 'bb'),
(4, 'amoxa', '2021-01-28', 'aasfdasf'),
(5, 'Parastamol', '2023-10-24', 'for headache'),
(6, 'diclo', '2026-10-17', 'for special order in little amout');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `no` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phy_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`no`, `username`, `password`, `role`, `phy_id`, `patient_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, NULL),
(2, 'doc', '9a09b4dfda82e3e665e31092d1c3ec8d', 'physician', 2, NULL),
(3, 'rec', 'ab3591f9a153f0ce687461855ea7275d', 'Reception', 3, NULL),
(11, 'lab', 'f9664ea1803311b35f81d07d8c9e072d', 'lab technician', 12, NULL),
(12, 'drug', '05b2815ccf6592b0f62fe89851e114fa', 'drug_store', 13, NULL),
(13, 'fayisas', '202cb962ac59075b964b07152d234b70', 'drug_store', 14, NULL),
(14, 'pa', 'e529a9cea4a728eb9c5828b13b22844c', 'patient', NULL, 10),
(15, '12agt', '12agt', 'patient', NULL, 11),
(16, 'chala', 'chala', 'patient', NULL, 12),
(17, 'Abera Kumsa', 'a8d6dcd131a68bb5084054a8324d13ca', 'lab technician', 15, NULL),
(18, 'sol1221', 'sol1221', 'patient', NULL, 13),
(19, 'ugr/51121/13', 'f29b4cd9f187ae97321b2b90b105d14e', 'patient', NULL, 14),
(20, 'hadmin', 'ba6a75c21a4f4ab39d23c0a8ca33fa0f', 'hadmin', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `no` int(11) NOT NULL,
  `dis_type` varchar(255) NOT NULL,
  `lab_test_type` varchar(255) NOT NULL,
  `lab_result` varchar(255) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `drug_id` int(11) DEFAULT NULL,
  `phy_id` int(11) NOT NULL,
  `lab_status` tinyint(4) NOT NULL,
  `come_id` int(11) NOT NULL,
  `drug_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`no`, `dis_type`, `lab_test_type`, `lab_result`, `pat_id`, `drug_id`, `phy_id`, `lab_status`, `come_id`, `drug_status`) VALUES
(1, 'covid 19', 'parasitology', 'some thing\r\n1. a\r\n2. blsafdj', 8, 1, 2, 1, 1, 0),
(2, 'some things', 'parasitology', 'lksjdjfl lskkdjf \r\n1. lskdfjj Postive\r\n2.l lksdlfkasd Postive', 9, 1, 2, 1, 2, 0),
(4, 'view bay medical assistance', 'parasitology', 'nothing are there', 11, NULL, 2, 1, 3, 0),
(5, 'view bay medical assistance', 'heamatology', 'nothing are there', 11, NULL, 2, 1, 3, 0),
(6, 'check a typhoid', 'parasitology', 'it positive', 11, 2, 2, 1, 4, 0),
(7, 'Heart disease ', 'heamatology', 'it need further ........', 13, 4, 2, 1, 5, 0),
(8, 'check up for lung', 'parasitology', 'TV positve', 14, 4, 2, 1, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `pat_id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `pat_name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `martal_status` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`pat_id`, `patient_id`, `pat_name`, `age`, `sex`, `date`, `martal_status`, `address`, `phone`) VALUES
(1, 'abebech17', 'abebe beso bela', 17, 'Female', '0000-00-00', NULL, NULL, NULL),
(3, 'bontu44', 'Bontu Girma', 44, 'Female', '0000-00-00', NULL, NULL, NULL),
(4, 'chaltu22', 'Mulu Girma', 33, 'Female', '0000-00-00', NULL, NULL, NULL),
(5, 'dhadacha22', 'Dhadacha Sori', 41, 'Male', '0000-00-00', NULL, NULL, NULL),
(8, 'signmoti11', 'Segni Moti Oli', 11, 'Male', '2021-01-12', NULL, NULL, NULL),
(9, 'abera21', 'Abera Bekala Yilma', 21, 'Male', '2021-01-13', NULL, NULL, NULL),
(10, 'dureti19', 'Someone Derese', 19, 'Female', '2022-09-09', NULL, NULL, NULL),
(11, 'ab15', 'abc', 15, 'Female', '2024-05-03', NULL, NULL, NULL),
(12, 'chala', 'Chala Koricha', 34, 'Male', '2024-05-03', 'Single', 'Ambo', '0987654321'),
(13, 'sol1221', 'Solomon Amen', 24, 'Male', '2024-05-03', 'Single', 'Ambo', '0968542153'),
(14, 'ugr/51121/13', 'Efrata Teresa', 34, 'Female', '2024-05-11', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `symptom_req`
--

CREATE TABLE `symptom_req` (
  `s_id` int(11) NOT NULL,
  `symptom_level` text NOT NULL,
  `phy_id` int(11) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `datesss` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `symptom_req`
--

INSERT INTO `symptom_req` (`s_id`, `symptom_level`, `phy_id`, `pat_id`, `datesss`) VALUES
(1, 'I am feeling a little bit sick.', 2, 10, '2022-09-09 11:43:14'),
(2, 'Come again for check up', 2, 1, '2024-05-23 03:06:12'),
(3, 'seb gfd ', 2, 2, '2024-05-25'),
(4, 'ngdcffbn  kmj', 2, 1, '2024-05-18'),
(5, 'dfgfg', 2, 13, '2024-05-24'),
(6, 'gsdgfss      sedfgd', 2, 13, '2024-05-31'),
(7, 'it need a second round treatment for this come to 05/22/2024', 2, 14, '2024-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `phy_id` int(11) NOT NULL,
  `phy_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`phy_id`, `phy_name`) VALUES
(1, 'Admin'),
(2, 'doctor'),
(3, 'receptor'),
(7, 'asd'),
(8, 'adfas'),
(9, 'bb'),
(10, 'aa'),
(11, 'aadf'),
(12, 'asfdaa'),
(13, 'drug'),
(14, 'fayisa'),
(15, 'Abera Kumsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drug`
--
ALTER TABLE `drug`
  ADD PRIMARY KEY (`drug_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no`),
  ADD KEY `phy_id` (`phy_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`no`),
  ADD KEY `pat_id` (`pat_id`),
  ADD KEY `drug_id` (`drug_id`),
  ADD KEY `phy_id` (`phy_id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `symptom_req`
--
ALTER TABLE `symptom_req`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `phy_id` (`phy_id`),
  ADD KEY `pat_id` (`pat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`phy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drug`
--
ALTER TABLE `drug`
  MODIFY `drug_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `symptom_req`
--
ALTER TABLE `symptom_req`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `phy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`phy_id`) REFERENCES `user` (`phy_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient_info` (`pat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD CONSTRAINT `patient_history_ibfk_1` FOREIGN KEY (`pat_id`) REFERENCES `patient_info` (`pat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_history_ibfk_2` FOREIGN KEY (`drug_id`) REFERENCES `drug` (`drug_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_history_ibfk_3` FOREIGN KEY (`phy_id`) REFERENCES `user` (`phy_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
