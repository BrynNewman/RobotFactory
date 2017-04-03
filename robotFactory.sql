-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2017 at 08:40 AM
-- Server version: 5.7.13
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `robotFactory`
--


-- --------------------------------------------------------
--
-- Table structure for storing session info
-- alive = 1 means the session is still alive 
-- alive = 0 means the session is dead

DROP TABLE IF EXISTS `utility`;
CREATE TABLE `utility` (

  counter INT AUTO_INCREMENT PRIMARY KEY,
  apiKey VARCHAR(255) UNIQUE NOT NULL,
  alive BOOL DEFAULT 1      
      
);


-- --------------------------------------------------------
--
-- Table structure for table `parts`
-- is used for holding all the robots parts
--


DROP TABLE IF EXISTS `parts`;
CREATE TABLE `parts` (
  `partID` varchar(10) NOT NULL,
  `partCode` varchar(2) NOT NULL,
  `caCode` varchar(8),
  `plantBuiltAt` varchar(10) NOT NULL,
  `dateTimeBuilt` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts`
--
/*
INSERT INTO `parts` (`partID`, `partCode`, `caCode`, `plantBuiltAt`, `dateTimeBuilt`) VALUES
	('A4556', 'A1', '462271', 'Strawberry', "2017-03-05 06:43:22.0"),
	('A4543', 'A2', '156786', 'PeanutButter', "2017-03-08 05:08:12.0"),
	('A4379', 'A3', '1235468', 'Strawberry', "2017-03-01 14:20:13.0"),
	('B5564', 'B2', '4456218', 'Rubarb', "2017-03-31 02:01:45.0"), 
	('B4302', 'C3', '1253215', 'Jam', "2017-03-12 06:05:10.0"),
	('C0098', 'M1', '4456210', 'PeanutButter', "2017-14-10 02:00:00"),
	('B0012', 'M1', 'AF55DD', 'PeanutButter', "2017-12-14 20:21:41"),
	('B4453', 'A1', '123ABCD', 'Jam', "2017-03-17 08:15:27"),
	('A5543', 'A2', 'AFFDCB12', 'Strawberry', "2017-03-30 19:53:15"),
	('C5468', 'B2', '123ABC', 'Strawberry', "2017-03-18 07:12:18"),
	('C9982', 'C2', '88591A', 'Rubarb', "2017-03-26 14:03:21"),
	('B4456', 'B3', '55F4D9A', 'Strawberry', "2017-03-23 14:30:33"),
	('C6652', 'C1', '12345678', 'PeanutButter', "2017-03-22 09:00:27"),
	('B2231', 'B3', 'E0000001', 'Strawberry', "2017-03-08 12:00:17"),
	('A8845', 'R1', 'F0000002', 'PeanutButter', "2017-03-05 02:46:08"),
	('A7754', 'M3', 'C0000003', 'PeanutButter', "2017-03-15 00:55:16"),
	('M7750', 'R3', 'B0000004', 'Jam', "2017-03-18 6:00:00"),
	('P5564', 'a3', 'A0000005', 'Strawberry', "2017-03-15 06:00:00");
*/

-- --------------------------------------------------------

--
-- Table structure for table `completeBots`
--

DROP TABLE IF EXISTS `completeBots`;
CREATE TABLE `completeBots` (
  `model` varchar(1) DEFAULT NULL,
  `headCaCode` varchar(8) NOT NULL,
  `torsoCaCode` varchar(8) NOT NULL,
  `bottomCaCode` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `completeBots`
--

INSERT INTO `completeBots` (`model`, `headCaCode`, `torsoCaCode`, `bottomCaCode`) VALUES
('A', 'CA57555', 'BABE47', 'BEEFCA9E'),
('A', 'F335564', '123C0A7', 'B0A754ED'),
('M', 'ADDBEE', 'CAFE101', '132456A'),
('R', 'B55612', 'FFFEEE', 'FEAD05');

-- --------------------------------------------------------

--
-- Table structure for table `salesHistory`
--

DROP TABLE IF EXISTS `salesHistory`;
CREATE TABLE `salesHistory` (

  `id` int(2)	NOT NULL,
  `cost` int(3),
  `transactionType`	varchar(8),
  `item` varchar(9) NOT NULL,
  `series` varchar(9)	DEFAULT NULL, 
  `model` varchar(1) DEFAULT NULL,
  `piece` varchar(6) DEFAULT NULL,
  `shipment` varchar(14) DEFAULT NULL,
  `timeofTransaction` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salesHistory`
--

/*
INSERT INTO `salesHistory`(`cost`, `transactionType`, `item`, `series`, `model`, `piece`, `shipment`, `timeofTransaction`) VALUES
(100, 'purchase', 'parts Box', '', '', '', 'head office', "2017-03-31 09:00:00"),
(25, 'sale', 'bot', 'household', 'C', '', 'nectarine', "2017-03-27 15:43:22"), 
(50, 'sale', 'bot', 'butler', 'M', '', 'head office', "2017-03-20 09:33:18"), 
(100, 'sale', 'bot', 'companion', 'W', '', 'huckleberry', "2017-03-14 20:45:29"), 
(25, 'sale', 'bot', 'companion', 'W', '', 'mango', "2017-03-03 18:46:30"),
(25, 'sale', 'bot', 'companion', 'W', '', 'apple', "2017-03-16 10:12:26"),
(100, 'purchase', 'parts Box', '', '', '', 'ugli', '2017-03-25 11:50:16'),
(5, 'return', 'part', 'household', 'A', 'torso', 'head office', "2017-03-22 12:15:04");
*/


INSERT INTO `salesHistory`(`id`,`cost`, `transactionType`, `item`, `series`, `model`, `piece`, `shipment`, `timeofTransaction`) VALUES
(1, 100, 'purchase', 'parts Box', '', '', '', 'head office', "2017-03-31 09:00:00"),
(2, 25, 'sale', 'bot', 'household', 'C', '', 'nectarine', "2017-03-27 15:43:22"), 
(3, 50, 'sale', 'bot', 'butler', 'M', '', 'head office', "2017-03-20 09:33:18"), 
(4, 100, 'sale', 'bot', 'companion', 'W', '', 'huckleberry', "2017-03-14 20:45:29"), 
(5, 25, 'sale', 'bot', 'companion', 'W', '', 'mango', "2017-03-03 18:46:30"),
(6, 25, 'sale', 'bot', 'companion', 'W', '', 'apple', "2017-03-16 10:12:26"),
(7, 100, 'purchase', 'parts Box', '', '', '', 'ugli', '2017-03-25 11:50:16'),
(8, 5, 'return', 'part', 'household', 'A', 'torso', 'head office', "2017-03-22 12:15:04");


-- --------------------------------------------------------


--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`partID`),
  ADD UNIQUE KEY `partID` (`partID`),
  ADD UNIQUE KEY `caCode` (`caCode`);

--
-- Indexes for table `completeBots`
--
ALTER TABLE `completeBots`
  ADD PRIMARY KEY (`headCaCode`),
  ADD UNIQUE KEY `headCaCode` (`headCaCode`),
  ADD UNIQUE KEY `torsoCaCode` (`torsoCaCode`),
  ADD UNIQUE KEY `bottomCaCode` (`bottomCaCode`);

--
-- Indexes for table `salesHistory`
--
ALTER TABLE `salesHistory`
  ADD PRIMARY KEY (`id`),
   MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
