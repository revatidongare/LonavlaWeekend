-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2020 at 01:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lonavla_weekend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `manage_contacts`
--

CREATE TABLE `manage_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(255) CHARACTER SET latin1 NOT NULL,
  `subject` varchar(255) CHARACTER SET latin1 NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `guest_num` int(11) NOT NULL,
  `mark_as_read` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_contacts`
--

INSERT INTO `manage_contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `from_date`, `to_date`, `room_type`, `guest_num`, `mark_as_read`) VALUES
(3, 'Revati Dongare', 'revatid15@gmail.com', '9082963663', 'Test', 'test to insert a row', '2020-03-23', '2020-03-25', 'villa', 0, 1),
(4, 'Revati Dongare', 'revatid15@gmail.com', '8108031533', 'Test', 'hiiiii this is just testing', '0000-00-00', '0000-00-00', 'suite room', 0, 1),
(5, 'Revati Dongare', 'revatid15@gmail.com', '08108031533', 'IT', 'hi', '0000-00-00', '0000-00-00', '', 0, 0),
(6, 'Revati Dongare', 'revatid15@gmail.com', '8108031533', 'IT', 'hi', '2020-03-25', '2020-03-27', 'classic', 2, 0),
(7, 'Revati Dongare', 'revatid15@gmail.com', '8108031533', 'IT', 'hi', '2020-03-25', '2020-03-27', 'classic', 2, 0),
(8, 'Revati Dongare', 'revatid15@gmail.com', '8108031533', 'IT', '1', '2020-03-19', '2020-03-17', 'Select Room Type', 2, 0),
(9, 'Revati Dongare', 'revatid15@gmail.com', '08108031533', 'IT', '', '2020-03-18', '2020-03-14', 'Select Room Type', 2, 0),
(10, 'Revati Dongare', 'revatid15@gmail.com', '08108031533', 'IT', '', '2020-03-19', '2020-03-09', 'suite', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL,
  `room_rate` int(11) NOT NULL,
  `weekend_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `name`, `description`, `room_rate`, `weekend_rate`) VALUES
(1, 'classicc Room', '1bhk', 2001, 4000),
(2, 'Suite Room', '2 Rooms', 5000, 6000),
(4, 'vilaa', 'this is villa', 3000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `title`, `description`, `image`, `flag`) VALUES
(1, 'slider1', 'this is 1st slider(conf room)', 'slider1.jpg', 1),
(2, 'slider2', 'this is 2nd slider(room)', 'slider2.jpg', 1),
(3, 'slider3', 'this is 3rd slider', '1584526132.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_contacts`
--
ALTER TABLE `manage_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manage_contacts`
--
ALTER TABLE `manage_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
