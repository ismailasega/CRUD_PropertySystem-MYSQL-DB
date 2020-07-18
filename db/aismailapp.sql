-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 02:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aismailapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `Id` int(11) NOT NULL,
  `County` text NOT NULL,
  `Country` text NOT NULL,
  `Town` text NOT NULL,
  `Postcode` int(20) NOT NULL,
  `Description` text NOT NULL,
  `FullDetailsURL` varchar(50) NOT NULL,
  `DisplayableAddress` varchar(50) NOT NULL,
  `Image` blob NOT NULL,
  `ImageURL` varchar(50) NOT NULL,
  `ThumbnailURL` varchar(50) NOT NULL,
  `Latitude` int(50) NOT NULL,
  `Longitude` int(50) NOT NULL,
  `Numberofbedrooms` int(50) NOT NULL,
  `Numberofbathrooms` int(50) NOT NULL,
  `Price` int(50) NOT NULL,
  `PropertyType` varchar(50) NOT NULL,
  `ForSale_ForRent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`Id`, `County`, `Country`, `Town`, `Postcode`, `Description`, `FullDetailsURL`, `DisplayableAddress`, `Image`, `ImageURL`, `ThumbnailURL`, `Latitude`, `Longitude`, `Numberofbedrooms`, `Numberofbathrooms`, `Price`, `PropertyType`, `ForSale_ForRent`) VALUES
(4, 'Nakawa', 'Uganda', 'Kampala', 256, 'On the third flow', 'Condor', 'Kisaasi', '', 'http://google.com', 'http://google.com', 78172873, 9780000, 0, 0, 50000, 'Flat', 'Rent'),
(5, 'Kitoro', 'Uganda', 'Entebbe', 98, '', '', 'Mityana', '', '', '', 0, 0, 0, 0, 0, 'Bungalow', ''),
(6, 'Bukomnsimbi', 'Uganda', 'Butambala', 90898, 'Condo', '', 'Kiniya', '', '', '', 0, 0, 0, 0, 9889, 'Bungalow', 'Rent'),
(7, 'Bukoto', 'Kenya', 'katende', 9090, 'studio', '', 'Kisilamu', 0x322e706e67, '', '', 0, 0, 5, 1, 1050, 'Bungalow', 'Sale'),
(9, '', '', '', 0, '', '', '', '', '', '', 0, 0, 0, 0, 0, 'Bungalow', 'Rent');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
