-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2022 at 02:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poll_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `poll_id` int(10) NOT NULL,
  `poll_title` varchar(100) NOT NULL,
  `poll_content` varchar(250) NOT NULL,
  `poll_own` int(10) NOT NULL,
  `poll_status` int(1) NOT NULL DEFAULT 1,
  `poll_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`poll_id`, `poll_title`, `poll_content`, `poll_own`, `poll_status`, `poll_timestamp`) VALUES
(3, 'test', 'ertertertert', 1, 1, '2022-10-20 13:21:42'),
(4, 'test2', 'content test', 1, 1, '2022-10-20 13:44:22'),
(5, 'test3', '2342424', 1, 1, '2022-10-20 13:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `polls_options`
--

CREATE TABLE `polls_options` (
  `pollop_id` int(10) NOT NULL,
  `pollop_own` int(10) NOT NULL,
  `pollop_text` varchar(150) NOT NULL,
  `pollop_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `polls_vote`
--

CREATE TABLE `polls_vote` (
  `pollvote_id` int(200) NOT NULL,
  `pollvote_own` int(10) NOT NULL,
  `pollvote_idown` int(10) NOT NULL,
  `pollvote_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `u_img` varchar(100) NOT NULL DEFAULT 'test.jpg',
  `u_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `u_img`, `u_timestamp`) VALUES
(1, 'tdev', '1234', 'test.jpg', '2022-10-20 12:09:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`poll_id`),
  ADD KEY `poll_own` (`poll_own`);

--
-- Indexes for table `polls_options`
--
ALTER TABLE `polls_options`
  ADD PRIMARY KEY (`pollop_id`),
  ADD KEY `pollop_own` (`pollop_own`);

--
-- Indexes for table `polls_vote`
--
ALTER TABLE `polls_vote`
  ADD PRIMARY KEY (`pollvote_id`),
  ADD KEY `pollvote_own` (`pollvote_own`,`pollvote_idown`),
  ADD KEY `pollvote_idown` (`pollvote_idown`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `poll_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `polls_options`
--
ALTER TABLE `polls_options`
  MODIFY `pollop_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls_vote`
--
ALTER TABLE `polls_vote`
  MODIFY `pollvote_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_ibfk_1` FOREIGN KEY (`poll_own`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `polls_options`
--
ALTER TABLE `polls_options`
  ADD CONSTRAINT `polls_options_ibfk_1` FOREIGN KEY (`pollop_own`) REFERENCES `polls` (`poll_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `polls_vote`
--
ALTER TABLE `polls_vote`
  ADD CONSTRAINT `polls_vote_ibfk_1` FOREIGN KEY (`pollvote_own`) REFERENCES `polls` (`poll_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `polls_vote_ibfk_2` FOREIGN KEY (`pollvote_idown`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
