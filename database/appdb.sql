-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2014 at 10:16 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` char(30) NOT NULL,
  `adminPassword` char(30) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mycircle`
--

CREATE TABLE IF NOT EXISTS `mycircle` (
  `username` char(50) NOT NULL,
  `friendname` char(100) NOT NULL,
  `firstName` char(50) NOT NULL,
  `lastName` char(200) NOT NULL,
  `startLocation` char(200) NOT NULL,
  `endLocation` char(200) NOT NULL,
  `cellNo` char(20) NOT NULL,
  `email` char(50) NOT NULL,
  UNIQUE KEY `username` (`username`,`friendname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mycircle`
--

INSERT INTO `mycircle` (`username`, `friendname`, `firstName`, `lastName`, `startLocation`, `endLocation`, `cellNo`, `email`) VALUES
('ejaz', 'shaista', 'Shaista', 'Iqbal', 'Karachi', 'Lahore', '2147483647', 'shaista@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `travelinfo`
--

CREATE TABLE IF NOT EXISTS `travelinfo` (
  `username` char(30) NOT NULL,
  `startPointLatitude` int(20) NOT NULL,
  `endPointLatitude` int(20) NOT NULL,
  `travelFrequency` char(20) NOT NULL,
  `arrivalTime` date NOT NULL,
  `departureTime` date NOT NULL,
  `endPointLongitude` int(20) NOT NULL,
  `startPointLongitude` int(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` char(30) NOT NULL,
  `password` char(30) NOT NULL,
  `firstName` char(30) NOT NULL,
  `lastName` char(30) NOT NULL,
  `email` char(30) NOT NULL,
  `cellNo` int(30) NOT NULL,
  `driver` char(10) NOT NULL,
  `licenseNo` char(30) NOT NULL,
  `cnicNo` char(30) NOT NULL,
  `address` char(50) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `gender` char(10) NOT NULL,
  `privacy` char(10) NOT NULL,
  `startLocation` char(200) NOT NULL,
  `endLocation` char(200) NOT NULL,
  `startDate` char(200) NOT NULL,
  `endDate` char(200) NOT NULL,
  `travelFrequency` char(50) NOT NULL,
  `vehicleType` char(50) NOT NULL,
  `fuelSystem` char(50) NOT NULL,
  `empId` char(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `firstName`, `lastName`, `email`, `cellNo`, `driver`, `licenseNo`, `cnicNo`, `address`, `dateOfBirth`, `gender`, `privacy`, `startLocation`, `endLocation`, `startDate`, `endDate`, `travelFrequency`, `vehicleType`, `fuelSystem`, `empId`) VALUES
('1500', '123', 'Muhmmad', 'Siddique', 'siddique@gmail.com', 2147483647, 'No', '', '', 'Islamabad', '0000-00-00', 'male', 'public', '', '', '', '', '', '', '', ''),
('ejaz', '123', 'Ejaz', 'Ahmed', 'ejaz@gmail.com', 2147483647, 'Yes', '897987987979', '078089890800', 'Islamabad', '0000-00-00', 'male', 'public', 'Islamabad', 'Lahore', '22/08/2014', '23/08/2014', 'Weekly', 'Car', 'Petrol', ''),
('shaista', '123', 'Shaista', 'Iqbal', 'shaista@gmail.com', 2147483647, 'Yes', '9809809800890', '00980980890808', 'Islamabad', '0000-00-00', 'female', 'public', 'Karachi', 'Lahore', '10/10/14', '13/10/14', 'Yearly', 'Car', 'Diesel', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `username` char(30) NOT NULL,
  `vehicleNo` char(30) NOT NULL,
  `fuleSystem` char(30) NOT NULL,
  `owner` char(30) NOT NULL,
  `capacity` char(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `travelinfo`
--
ALTER TABLE `travelinfo`
  ADD CONSTRAINT `travelinfo_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
