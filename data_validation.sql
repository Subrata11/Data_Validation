-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2018 at 07:01 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data_validation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Email`, `Password`) VALUES
(0, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL,
  `Full_Name` varchar(1000) NOT NULL,
  `Roll_No` int(10) NOT NULL,
  `Fathers_Name` varchar(1000) NOT NULL,
  `Birth_Date` date NOT NULL,
  `Address` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Phone_No` varchar(20) NOT NULL,
  `Edu_Qua` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `Full_Name`, `Roll_No`, `Fathers_Name`, `Birth_Date`, `Address`, `Email`, `Phone_No`, `Edu_Qua`) VALUES
(0, 'Subrata Kumer Paul', 13015411, 'Parimal Paul', '1993-03-14', 'rajshahi', 'sdjkl@gmail.com', '01738061325', 'Bsc engg'),
(0, 'Subrata Kumer Paul', 13015411, 'Parimal Paul', '1993-03-14', 'rajshahi', 'sdjkl@gmail.com', '01738061325', 'Bsc engg'),
(0, 'Subrata Kumer Paul', 13015411, 'Parimal Paul', '1993-03-14', 'rajshahi', 'sdjkl@gmail.com', '01738061325', 'Bsc engg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
