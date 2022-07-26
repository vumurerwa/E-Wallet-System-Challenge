-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 06:18 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-wallet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `total_amount` int(11) NOT NULL DEFAULT 1000,
  `fees_reduction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `user_phone`, `total_amount`, `fees_reduction`) VALUES
(1, '0788476567', 35500, 0),
(2, '0783627352', 6500, 0),
(3, '0735467866', 99600, 400);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `u_id` int(11) NOT NULL,
  `u_full_name` varchar(30) NOT NULL,
  `u_email` varchar(33) NOT NULL,
  `u_pass` varchar(33) NOT NULL,
  `u_phone` varchar(30) NOT NULL,
  `u_photo` longtext NOT NULL,
  `u_gender` varchar(7) NOT NULL,
  `u_status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`u_id`, `u_full_name`, `u_email`, `u_pass`, `u_phone`, `u_photo`, `u_gender`, `u_status`) VALUES
(1, 'Umurerwa Viviane', 'vivianeumurerwa@gmail.com', '123', '0788476567', 'avatar3.png', 'F', 1),
(2, 'Test User ', 'test@gmail.com', 'test@gmail.com', '0783627352', 'avatar5.png', 'M', 1),
(3, 'Test User 3', 'test3@gmail.com', 'test3@gmail.com', '0735467866', 'photo3.jpg', 'F', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
