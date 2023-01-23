-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 09:50 AM
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
-- Database: `meetingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `phase` varchar(50) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `number_person` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`id`, `picture`, `room_name`, `floor`, `phase`, `dept`, `number_person`) VALUES
(1, 'assets/images/big-room1.png', 'Big Room 1', 'Floor 6', 'Phase B', 'Ict Dept', 'Upto 15 People'),
(2, 'assets/images/medium-room1.png', 'Medium Room 1', 'Floor 6', 'Phase A', 'Business Management', 'Upto 10 People'),
(3, 'assets/images/medium-room2.jpg', 'Medium Room 2', 'Floor 5', 'Phase A', 'Security Dept', 'Upto 10 People'),
(4, 'assets/images/small-room1.png', 'Small Room 1', 'Floor 4', 'Phase B', 'Audit Dept', 'Upto 8 People'),
(5, 'assets/images/small-room2.png', 'Small Room 2', 'Floor 1', 'Phase A', 'Finance Dept', 'Upto 8 People');

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation`
--

CREATE TABLE `room_reservation` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `meeting_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `book_date` date NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_reservation`
--

INSERT INTO `room_reservation` (`id`, `room_id`, `meeting_date`, `start_time`, `end_time`, `book_date`, `user_name`) VALUES
(1, 0, '2022-11-09', '01:05:00', '04:05:00', '0000-00-00', 'k8'),
(2, 0, '2022-11-09', '01:05:00', '04:05:00', '0000-00-00', 'k8'),
(3, 0, '2022-11-24', '10:01:00', '00:01:00', '0000-00-00', 'k8');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `user_name`, `password`, `date`, `profile_pic`) VALUES
(1, 61436456, 'k9@domain.com', 'k9', '12345', '2022-11-22 18:52:03', 'assets/images/default_profile.jpg'),
(2, 140702347, 'k8@domain.com', 'K8', '12345', '2022-11-23 18:21:27', 'assets/images/default_profile.jpg'),
(3, 83661, 'richard@domain.com', 'richy', '12345', '2022-11-22 18:52:03', 'assets/images/default_profile.jpg'),
(4, 35575039, 'mumiaderick@gmail.com', 'derick', '123456', '2022-11-23 18:21:27', 'assets/images/default_profile.jpg'),
(5, 61080149494086297, 'kpl.user@domain.com', 'kpl.user', '12345', '2022-11-22 18:52:03', 'assets/images/default_profile.jpg'),
(6, 559065203221686, 'derick@gmail.com', 'derick', '123456', '2022-11-23 18:41:55', 'assets/images/default_profile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_reservation`
--
ALTER TABLE `room_reservation`
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
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_reservation`
--
ALTER TABLE `room_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
