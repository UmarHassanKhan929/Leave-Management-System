-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 08:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaveman`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_leave`
--

CREATE TABLE `faculty_leave` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `leave_days` int(11) DEFAULT NULL,
  `date_from` varchar(20) DEFAULT NULL,
  `hod_approval` varchar(20) DEFAULT NULL,
  `faculty_message` varchar(100) NOT NULL,
  `hod_message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_leave`
--

INSERT INTO `faculty_leave` (`id`, `user_id`, `leave_days`, `date_from`, `hod_approval`, `faculty_message`, `hod_message`) VALUES
(1, 3, 2, '2021-07-16', 'approved', 'Any', 'Given'),
(2, 3, 3, '2021-07-16', 'approved', 'any nay', 'Okay'),
(3, 3, 3, '2021-07-03', 'approved', 'any anya ny', 'given');

-- --------------------------------------------------------

--
-- Table structure for table `student_leave`
--

CREATE TABLE `student_leave` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `leave_days` int(11) DEFAULT NULL,
  `date_from` varchar(30) NOT NULL,
  `faculty_approval` varchar(20) DEFAULT NULL,
  `hod_approval` varchar(20) DEFAULT NULL,
  `student_message` varchar(100) NOT NULL,
  `hod_message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_leave`
--

INSERT INTO `student_leave` (`id`, `user_id`, `leave_days`, `date_from`, `faculty_approval`, `hod_approval`, `student_message`, `hod_message`) VALUES
(1, 1, 2, '2021-07-14', 'approved', 'approved', 'Weeding', 'Okay'),
(2, 1, 12, '2021-07-14', 'approved', 'rejected', 'Weeding', 'Okay'),
(3, 1, 2, '2021-07-07', 'approved', 'approved', 'any', 'okay given'),
(4, 1, 12, '2021-07-16', 'approved', 'rejected', 'any more', 'no'),
(5, 1, 1, '2021-07-23', 'approved', 'approved', 'any', 'Okay'),
(6, 1, 12, '2021-07-23', 'approved', 'rejected', 'any', 'Okay no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `leave_quota` int(10) NOT NULL DEFAULT 0,
  `leave_left` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `status`, `leave_quota`, `leave_left`) VALUES
(1, 'umar hassan khan', 'umar', 'umar@gmail.com', 'student', 16, 15),
(2, 'mazin san', 'mazin', 'mazin@gmail.com', 'hod', 0, 0),
(3, 'mujtaba haider', 'mujtaba', 'mujtaba@gmail.com', 'faculty', 17, 14),
(4, 'shariq arif', 'shariq', 'shariq@gmail.com', 'admin', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_leave`
--
ALTER TABLE `faculty_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_leave`
--
ALTER TABLE `student_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_leave`
--
ALTER TABLE `faculty_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_leave`
--
ALTER TABLE `student_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculty_leave`
--
ALTER TABLE `faculty_leave`
  ADD CONSTRAINT `faculty_leave_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_leave`
--
ALTER TABLE `student_leave`
  ADD CONSTRAINT `student_leave_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
