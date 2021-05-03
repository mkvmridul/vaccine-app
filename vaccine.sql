-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2021 at 04:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccine`
--

-- --------------------------------------------------------

--
-- Table structure for table `Vaccine`
--

CREATE TABLE `Vaccine` (
  `vaccineGroup` varchar(5) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Vaccine`
--

INSERT INTO `Vaccine` (`vaccineGroup`, `name`, `type`) VALUES
('A', 'Unknown', 'Placebo'),
('B', 'SLCV2020', 'Vaccine');

-- --------------------------------------------------------

--
-- Table structure for table `Volunteer`
--

CREATE TABLE `Volunteer` (
  `email` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `address` longtext DEFAULT NULL,
  `health_condition` longtext DEFAULT NULL,
  `passwordHash` longtext NOT NULL,
  `vaccineGroup` varchar(45) DEFAULT NULL,
  `dose` float DEFAULT NULL,
  `infected` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Volunteer`
--

INSERT INTO `Volunteer` (`email`, `fullName`, `gender`, `age`, `address`, `health_condition`, `passwordHash`, `vaccineGroup`, `dose`, `infected`) VALUES
('2@gmail', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, '1'),
('2@gmailw', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, '1'),
('abc123@le.ac.uk', 'John Smith', 'male', 28, '123 London Road, Leicester, LE1 1GF', 'N/A', '', 'A', NULL, '1'),
('b@gmail', 'a', NULL, 1, 'a', 'a', 'a', NULL, NULL, '1'),
('c@gmail', 'a', '1', 1, 'a', '1', '1', '1', 1, '1'),
('mkvmridul@gmail.com', 'Mridul Verma', 'male', 20, 'Delhi', NULL, '$2y$10$MhpBh2yLwAzqLOfAG3QFn.3Sot8qAjboBN.oQxtyPDTsDYAf6y7sK', 'B', 1, '1'),
('roxshivamjbj2222singh@gmail.com', 'Shivam Singh', 'male', 18, '11 F Block Krishna Puram', NULL, '$2y$10$jaMxZNvkuYn52x2knDKRAO.zqZbtpPa32LqeMj6V4xe.Q4GsH516m', 'A', 1, '1'),
('roxshivamjbjsingh@gmail.com', 'Shivam Singh', 'male', 18, '11 F Block Krishna Puram', NULL, '$2y$10$jaMxZNvkuYn52x2knDKRAO.zqZbtpPa32LqeMj6V4xe.Q4GsH516m', 'A', 1, '1'),
('roxshivamsingh@gmail.com', 'Shivam Singh', 'male', 18, '11 F Block Krishna Puram', NULL, '$2y$10$jaMxZNvkuYn52x2knDKRAO.zqZbtpPa32LqeMj6V4xe.Q4GsH516m', 'B', 0.5, '1'),
('srtrhewgsdvf@vdfbgdrgefsd.com', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Vaccine`
--
ALTER TABLE `Vaccine`
  ADD PRIMARY KEY (`vaccineGroup`);

--
-- Indexes for table `Volunteer`
--
ALTER TABLE `Volunteer`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
