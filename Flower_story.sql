-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 05:51 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower_story`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `PhoneNumbe` int(15) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `FirstName`, `LastName`, `UserName`, `Password`, `PhoneNumbe`, `Address`, `Email`) VALUES
(123, 'Eman ', ' Aljezani', 'Eman', '1234', 504910625, 'Dammam, King Fahd Neighborhood', 'Tayb-alqalb-e@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `roses`
--

CREATE TABLE `roses` (
  `ProductID` varchar(10) CHARACTER SET utf8 NOT NULL,
  `ProdcutName` varchar(20) NOT NULL,
  `ProdcutColor` varchar(20) NOT NULL,
  `ProdcutSize` varchar(20) NOT NULL,
  `ProdcutStock` int(11) DEFAULT NULL,
  `ProdcutPic` varchar(65) DEFAULT NULL,
  `ProductPrice` double NOT NULL,
  `ProdcutDetailes` varchar(65) DEFAULT NULL,
  `ProdcutType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roses`
--

INSERT INTO `roses` (`ProductID`, `ProdcutName`, `ProdcutColor`, `ProdcutSize`, `ProdcutStock`, `ProdcutPic`, `ProductPrice`, `ProdcutDetailes`, `ProdcutType`) VALUES
('B1', 'Graduation balloon', 'Black&white', 'small', 3, 'grad.jpg', 30, 'Square', 'Hellium'),
('B2', 'Birthday balloon', 'Red', 'Medium ', 5, 'bday.jpg', 23, 'Round', 'Not Hellium'),
('B3', 'Baby Boy balloon', 'Blue', 'medium', 8, 'boy.jpg', 23, 'Square', 'Helium'),
('B4', 'Baby Girl Balloon', 'Pink', 'medium', 6, 'girl.jpg', 23, 'Round', 'Helium'),
('B5', 'Love Balloon', 'Red', 'Medium', 20, 'love.jpg', 30, 'Square', 'NOT Helium'),
('B6', 'Regular Balloon', 'All colors', 'Medium', 9, 'regularb.jpg', 23, 'Round', 'Helium'),
('F1', 'Jory', 'Red', 'Big', 5, 'redDamask.jpg', 9, 'Living period 7 days', 'Natural '),
('F10', 'Gypsum', 'White', 'Big', 8, 'gypsoFlower.png', 7, 'Living period 10 days', 'Natural '),
('F2', 'Jory', 'White', 'Big', 1, 'whiteDamask.jpg', 6, 'Living period 7 days', 'not Natural '),
('F3', 'Jory', 'Pink', 'Big', 4, 'pinkDamask.jpg', 4, 'Living period 7 days', 'Natural '),
('F4', 'Jory', 'Yellow', 'Big', 10, 'yellowDamask.jpg', 3, 'Living period 7 days', 'Natural '),
('F5', 'Jory', 'Orange', 'Small', 6, 'orangeDamask.jpg', 6, 'Living period 7 days', ' not Natural '),
('F6', 'Jory', 'Fuchsia', 'Big', 6, 'fuciaDamask.jpg', 23, 'Living period 7 days', 'Natural '),
('F7', 'Grace', 'White', 'Small', 13, 'whiteGrace.jpg', 20, 'Living period 10 days', 'not Natural '),
('F8', 'Grace', 'Yellow', 'Big', 15, 'yelloeGrace.jpg', 23, 'Living period 10 days', 'Natural '),
('F9', 'Grace', 'Purple', 'Small', 7, 'purpleGrace.jpg', 12, 'Living period 10 days', 'Natural ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`) KEY_BLOCK_SIZE=11;

--
-- Indexes for table `roses`
--
ALTER TABLE `roses`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
