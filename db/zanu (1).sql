-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 06:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zanu`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(8) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `password`, `fname`, `lname`, `gender`, `email`, `is_active`, `role`) VALUES
(1108090, '$2y$10$FVIiMatlACk82j2ttzjp2eukDi6GdO/0sXl5P8QMeCVVcTf11e28y', 'tinotenda', 'ndaipa', 'male', 'ndaipa85@gmail.com', 1, 'admin'),
(10514726, '$2y$10$Gi5AUsI02PknZ9zIgz7qNeOlFDMmkgl.JSWCDVnkICFdebEYv/pCe', 'John', 'Doe', 'Male', 'jdoe@gmail.com', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `province_id` int(4) NOT NULL,
  `district` varchar(10) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `cell` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `id_no`, `firstname`, `lastname`, `DOB`, `gender`, `department`, `province_id`, `district`, `branch`, `cell`) VALUES
(10153830, '63455657', 'John', 'Doe', '0000-00-00', 'Male', 'youth', 1, 'dist1', 'branch1', 'cellA'),
(10246823, '63678890000', 'John', 'Doe001', '0000-00-00', 'Female', 'men', 6, 'dist1', 'branch3', 'cellC'),
(10275838, '63455657111', 'John', 'Doe09', '2018-07-11', 'Male', 'youth', 1, 'dist1', 'branch1', 'cellA'),
(10603602, '634556578', 'John', 'Doe1', '2019-10-30', 'Male', 'youth', 3, 'dist1', 'branch1', 'cellA'),
(10781429, '6345565712', 'John', 'Doe5', '2019-10-30', 'Female', 'youth', 9, 'dist1', 'branch1', 'cellA'),
(10839340, '634556571209', 'John', 'Doe12', '2019-10-30', 'Female', 'youth', 5, 'dist1', 'branch1', 'cellA'),
(10958713, '634556574', 'John', 'Doe45', '2019-10-30', 'Male', 'youth', 6, 'dist4', 'branch3', 'cellD');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`province_id`, `province_name`) VALUES
(1, 'Harare'),
(2, 'Bulawayo'),
(3, 'Mash East'),
(4, 'Mash Central'),
(5, 'Mash West'),
(6, 'Masvingo'),
(7, 'Midlands'),
(8, 'Mat North'),
(9, 'Mat South');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`province_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
