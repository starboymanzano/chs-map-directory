-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2017 at 11:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chsmapdirectory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminNo` int(11) NOT NULL,
  `AdminFullName` varchar(50) NOT NULL,
  `AdminUsername` varchar(50) NOT NULL,
  `AdminPassword` varchar(50) NOT NULL,
  `AdminLastLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminNo`, `AdminFullName`, `AdminUsername`, `AdminPassword`, `AdminLastLogin`) VALUES
(1, 'Carlo Capili', 'freddie', 'c908a90d0fe5aec600e957b88efc04a4', '2017-08-06 17:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_type`
--

CREATE TABLE `announcement_type` (
  `TypeID` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement_type`
--

INSERT INTO `announcement_type` (`TypeID`, `TypeName`) VALUES
(1, 'Competition'),
(2, 'Drill'),
(3, 'Examination'),
(4, 'Graduation'),
(5, 'Holiday'),
(6, 'Meeting'),
(7, 'Religion'),
(8, 'Reminder'),
(9, 'Wellness');

-- --------------------------------------------------------

--
-- Table structure for table `past_announcement`
--

CREATE TABLE `past_announcement` (
  `AnnID` int(11) NOT NULL,
  `AnnTitle` varchar(100) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `AnnOrganizer` varchar(50) NOT NULL,
  `AnnVenue` varchar(100) NOT NULL,
  `AnnStartTime` text NOT NULL,
  `AnnEndTime` text NOT NULL,
  `AnnDesc` text NOT NULL,
  `AnnDateModified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `past_announcement`
--

INSERT INTO `past_announcement` (`AnnID`, `AnnTitle`, `TypeID`, `AnnOrganizer`, `AnnVenue`, `AnnStartTime`, `AnnEndTime`, `AnnDesc`, `AnnDateModified`) VALUES
(32, 'Dear Brother', 5, 'Lorem Ipsum', 'Lololol', '2017 Aug-01 06:57 PM', '2017 Aug-09 07:00 PM', 'Hoyhoyhoy', '2017-08-02 10:58:55'),
(1, 'Defense', 6, 'Defense', 'AMA', '2017 Aug-03 05:21 AM', '2017 Aug-05 05:25 AM', 'Defense', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `school_establishment`
--

CREATE TABLE `school_establishment` (
  `EstID` int(11) NOT NULL,
  `EstName` varchar(50) NOT NULL,
  `EstDesc` text NOT NULL,
  `EstWalkTime` varchar(20) NOT NULL,
  `EstDistance` varchar(30) NOT NULL,
  `EstImage` text NOT NULL,
  `EstDateModified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_establishment`
--

INSERT INTO `school_establishment` (`EstID`, `EstName`, `EstDesc`, `EstWalkTime`, `EstDistance`, `EstImage`, `EstDateModified`) VALUES
(3, 'Principal\'s Office', '', '', '', 'Principal.jpg', '2017-07-31 18:41:43'),
(4, 'Building A (Grade 9 and 10)', 'Serves as a class building of 3rd and 4th year known as Grade 9 and 10.', '40 seconds', '180 meters', 'building A.jpg', '2017-07-20 19:51:01'),
(5, 'Building B (Grade 8)', 'Serves as a class building of 2nd year students known as Grade 8', '20 seconds', '100 meters', 'building B.jpg', '2017-07-20 19:44:28'),
(6, 'Building C (Grade 7)', 'Serves as a class building of 1st year students known as Grade 7.', '1 minute', '150 meters', 'building C.jpg', '2017-07-20 22:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `school_profile`
--

CREATE TABLE `school_profile` (
  `SchoolSeqNo` int(11) NOT NULL,
  `SchoolEmail` varchar(100) NOT NULL,
  `SchoolTelNo` varchar(30) NOT NULL,
  `SchoolFaxNo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_profile`
--

INSERT INTO `school_profile` (`SchoolSeqNo`, `SchoolEmail`, `SchoolTelNo`, `SchoolFaxNo`) VALUES
(1, 'chs_infotech2000@yahoo.com', '(02) 323-1451', '(02) 323-1451');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_announcement`
--

CREATE TABLE `upcoming_announcement` (
  `AnnID` int(11) NOT NULL,
  `AnnTitle` varchar(100) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `AnnOrganizer` varchar(50) NOT NULL,
  `AnnVenue` varchar(100) NOT NULL,
  `AnnStartTime` text NOT NULL,
  `AnnEndTime` text NOT NULL,
  `AnnDesc` text NOT NULL,
  `AnnDateModified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminNo`);

--
-- Indexes for table `announcement_type`
--
ALTER TABLE `announcement_type`
  ADD PRIMARY KEY (`TypeID`);

--
-- Indexes for table `school_establishment`
--
ALTER TABLE `school_establishment`
  ADD PRIMARY KEY (`EstID`);

--
-- Indexes for table `school_profile`
--
ALTER TABLE `school_profile`
  ADD PRIMARY KEY (`SchoolSeqNo`);

--
-- Indexes for table `upcoming_announcement`
--
ALTER TABLE `upcoming_announcement`
  ADD PRIMARY KEY (`AnnID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `announcement_type`
--
ALTER TABLE `announcement_type`
  MODIFY `TypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `school_establishment`
--
ALTER TABLE `school_establishment`
  MODIFY `EstID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `school_profile`
--
ALTER TABLE `school_profile`
  MODIFY `SchoolSeqNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `upcoming_announcement`
--
ALTER TABLE `upcoming_announcement`
  MODIFY `AnnID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
