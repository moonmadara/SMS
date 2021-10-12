-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 06:50 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555556, 'adminuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-12-09 07:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblallotment`
--

CREATE TABLE `tblallotment` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Block` varchar(10) DEFAULT NULL,
  `FlatNum` int(10) DEFAULT NULL,
  `EContactnum` bigint(10) DEFAULT NULL,
  `Noofmember` int(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `AllotmentDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblallotment`
--

INSERT INTO `tblallotment` (`ID`, `Name`, `ContactNumber`, `Block`, `FlatNum`, `EContactnum`, `Noofmember`, `Address`, `AllotmentDate`) VALUES
(2, 'Hari', 7894564569, 'B', 201, 7894564579, 2019, '', '2019-12-11 08:55:49'),
(3, 'Rahul Chandra', 7777797979, 'A', 102, 4644646546, 4, 'Thana-Rohtas G-899 Bihar', '2019-12-11 11:43:29'),
(4, 'Kabir Rajvansh', 3146541327, 'A', 103, 4564646546, 2, 'iuyihuiyiuyhui', '2019-12-11 11:44:39'),
(5, 'Lokesh Kumar', 3256589812, 'B', 203, 6446464656, 5, 'yiuyiyuhiyiygvuyftyytcgfddxfg', '2019-12-11 11:45:30'),
(6, 'Om Prakash', 4564649879, 'C', 304, 6546798124, 5, 'tutttuytuytuy', '2019-12-11 11:46:01'),
(7, 'Mohini Singh', 8774549465, 'E', 503, 6446776498, 2, 'tyutuututut765tyrdytryrr', '2019-12-11 11:46:45'),
(8, 'Test', 4654464646, 'A', 107, 4464644464, 5, 'Varanasi', '2019-12-24 06:44:26'),
(9, 'Anuj Kumar', 9354778033, 'A', 201, 9354778033, 5, 'New Delhi India', '2019-12-29 17:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblbill`
--

CREATE TABLE `tblbill` (
  `ID` int(10) NOT NULL,
  `Block` varchar(20) DEFAULT NULL,
  `FlatNum` int(10) DEFAULT NULL,
  `PricepUnit` int(10) DEFAULT NULL,
  `UnitCons` int(10) DEFAULT NULL,
  `Echarge` varchar(50) DEFAULT NULL,
  `BillDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbill`
--

INSERT INTO `tblbill` (`ID`, `Block`, `FlatNum`, `PricepUnit`, `UnitCons`, `Echarge`, `BillDate`) VALUES
(5, 'A', 102, 10, 100, '1000', '2019-12-12 17:08:07'),
(6, 'A', 102, 12, 50, '600', '2019-12-12 17:13:15'),
(7, 'A', 101, 100, 20, '2000', '2019-12-19 17:14:33'),
(8, 'A', 101, 8, 400, '3200', '2019-12-20 04:29:37'),
(9, 'B', 201, 8, 200, '1600', '2019-12-24 05:02:32'),
(10, 'A', 107, 8, 200, '1600', '2019-12-24 06:51:02'),
(11, 'A', 103, 4, 700, '2800', '2019-12-29 16:30:02'),
(12, 'B', 203, 12, 120, '1440', '2019-12-29 16:36:38'),
(13, 'A', 201, 5, 1200, '6000', '2019-12-29 17:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblblocks`
--

CREATE TABLE `tblblocks` (
  `ID` int(10) NOT NULL,
  `BlockName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblblocks`
--

INSERT INTO `tblblocks` (`ID`, `BlockName`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F'),
(7, 'G'),
(9, 'H'),
(10, 'I'),
(11, 'J'),
(12, 'K'),
(13, 'L'),
(14, 'M'),
(15, 'N'),
(16, 'O'),
(17, 'P'),
(18, 'Q'),
(19, 'R'),
(20, 'S'),
(21, 'T'),
(22, 'U'),
(23, 'V'),
(24, 'W'),
(25, 'X'),
(26, 'Y'),
(27, 'Z');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplain`
--

CREATE TABLE `tblcomplain` (
  `ID` int(10) NOT NULL,
  `RequestID` int(10) DEFAULT NULL,
  `UserID` int(10) DEFAULT NULL,
  `ComplainType` varchar(200) DEFAULT NULL,
  `ComplainDes` mediumtext DEFAULT NULL,
  `CompRaisedate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `ResolvedDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomplain`
--

INSERT INTO `tblcomplain` (`ID`, `RequestID`, `UserID`, `ComplainType`, `ComplainDes`, `CompRaisedate`, `AdminRemark`, `Status`, `ResolvedDate`) VALUES
(1, 279266349, 2, 'Other', 'Intercom is not working', '2019-12-23 06:28:39', 'Your Issue has been resolved', 'Resolved', '2019-12-23 07:51:48'),
(2, 297649716, 5, 'Other', 'Floor of common area not clean properly', '2019-12-24 06:14:55', 'We are looking at this matter', 'In Progress', '2019-12-24 07:04:06'),
(3, 386338533, 8, 'Carpenter', 'Front Door Not working', '2019-12-24 07:12:56', NULL, NULL, NULL),
(4, 801134490, 9, 'Electrical', ' electric board not working', '2019-12-29 17:20:27', 'Board fixed.', 'Resolved', '2019-12-29 17:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblflat`
--

CREATE TABLE `tblflat` (
  `ID` int(10) NOT NULL,
  `FlatNum` int(50) DEFAULT NULL,
  `Floor` varchar(50) DEFAULT NULL,
  `Block` varchar(50) DEFAULT NULL,
  `FlatType` varchar(120) DEFAULT NULL,
  `MCharge` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblflat`
--

INSERT INTO `tblflat` (`ID`, `FlatNum`, `Floor`, `Block`, `FlatType`, `MCharge`, `CreationDate`) VALUES
(1, 101, 'First Floor', 'A', '1 bhk', '1500', '2019-12-09 13:00:18'),
(2, 102, 'First Floor', 'A', '2 bhk', '2000', '2019-12-09 13:01:17'),
(3, 103, 'First Floor', 'A', '3 bhk', '3000', '2019-12-09 13:02:06'),
(4, 104, 'First Floor', 'A', '4 bhk', '3500', '2019-12-09 13:02:42'),
(5, 105, '1st Floor', 'A', '5 bhk', '4000', '2019-12-09 13:03:24'),
(6, 106, '1st floor', 'A', 'Duplex', '5000', '2019-12-10 05:30:11'),
(7, 107, '1 st floor', 'A', 'Suits', '5500', '2019-12-10 05:31:07'),
(8, 201, '2 nd floor', 'B', '1 bhk', '1500', '2019-12-10 05:33:01'),
(9, 202, '2nd floor', 'B', '2 bhk', '2000', '2019-12-10 05:33:50'),
(10, 203, '2 nd floor', 'B', '3 bhk', '3000', '2019-12-10 05:34:52'),
(11, 204, '2 nd floor', 'B', '4 bhk', '3500', '2019-12-10 05:35:59'),
(12, 205, '2 nd floor', 'B', '5 bhk', '4000', '2019-12-10 05:36:34'),
(13, 206, '2 nd floor', 'B', 'Duplex', '5000', '2019-12-10 05:56:14'),
(14, 207, '2nd floor', 'B', 'Suits', '5500', '2019-12-10 05:57:08'),
(15, 301, '3 rd floor', 'C', '1 bhk', '1500', '2019-12-10 05:58:54'),
(16, 302, '3 rd floor', 'C', '2 bhk', '2000', '2019-12-10 06:00:52'),
(17, 303, '3 rd floor', 'C', '3 bhk', '3000', '2019-12-10 06:01:48'),
(18, 304, '3 rd floor', 'C', '4 bhk', '3500', '2019-12-10 06:11:55'),
(19, 305, '3 rd floor', 'C', '5 bhk', '4000', '2019-12-10 06:12:52'),
(20, 306, '3rd floor', 'C', 'Duplex', '5000', '2019-12-10 06:14:26'),
(21, 307, '3 rd floor', 'C', 'Suits', '5500', '2019-12-10 06:15:15'),
(22, 401, '4 th floor', 'D', '1 bhk', '1500', '2019-12-10 06:17:43'),
(23, 402, '4 th floor', 'D', '2 bhk', '2000', '2019-12-10 06:18:43'),
(24, 403, '4 th floor', 'D', '3 bhk', '3000', '2019-12-10 06:19:15'),
(25, 404, '4 th floor', 'D', '4 bhk', '3500', '2019-12-10 06:21:37'),
(26, 405, '4 th floor', 'D', '5 bhk', '4000', '2019-12-10 06:22:36'),
(27, 406, '4 th floor', 'D', 'Duplex', '4500', '2019-12-10 06:23:48'),
(28, 407, '4 th floor', 'D', 'Suits', '5000', '2019-12-10 06:27:53'),
(29, 501, '5 th floor', 'E', '1 bhk', '1500', '2019-12-10 06:30:03'),
(30, 502, '5 th floor', 'E', '2 bhk', '2000', '2019-12-10 06:30:52'),
(31, 503, '5 th floor', 'E', '3 bhk', '3000', '2019-12-10 06:31:34'),
(32, 504, '5 th floor', 'E', '4 bhk', '3500', '2019-12-10 06:32:12'),
(33, 505, '5 th floor', 'E', '5 bhk', '4000', '2019-12-10 06:33:37'),
(34, 506, '5 th floor', 'E', 'Duplex', '4500', '2019-12-10 06:35:21'),
(35, 507, '5 th floor', 'E', 'Suits', '5000', '2019-12-10 06:37:58'),
(36, 601, '6 th floor', 'F', '1 bhk', '1500', '2019-12-10 06:39:20'),
(37, 602, '6 th floor', 'F', '2 bhk', '2000', '2019-12-10 06:39:54'),
(38, 603, '6 th floor', 'F', '3 bhk', '3000', '2019-12-10 06:40:41'),
(39, 604, '6 th floor', 'F', '4 bhk', '3500', '2019-12-10 06:41:24'),
(40, 605, '6 th floor', 'F', '5 bhk', '4000', '2019-12-10 06:42:23'),
(41, 606, '6 th floor', 'F', 'Duplex', '4500', '2019-12-10 06:43:41'),
(42, 606, '6 th floor', 'F', 'Duplex', '4500', '2019-12-10 06:49:57'),
(43, 607, '6 th floor', 'F', 'Suits', '5000', '2019-12-10 06:54:55'),
(44, 102, '1 st floor', 'D', 'Suits', '6500', '2019-12-24 04:43:20'),
(45, 201, 'Second Floor', 'A', '3 bhk', '3200', '2019-12-29 16:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblvisitor`
--

CREATE TABLE `tblvisitor` (
  `ID` int(10) NOT NULL,
  `VisitorName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `WhomtoMeet` varchar(200) DEFAULT NULL,
  `ReasontoMeet` mediumtext DEFAULT NULL,
  `Block` varchar(50) DEFAULT NULL,
  `FlatNo` varchar(50) DEFAULT NULL,
  `EnterDate` timestamp NULL DEFAULT current_timestamp(),
  `remark` varchar(200) DEFAULT NULL,
  `outtime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblvisitor`
--

INSERT INTO `tblvisitor` (`ID`, `VisitorName`, `MobileNumber`, `Address`, `WhomtoMeet`, `ReasontoMeet`, `Block`, `FlatNo`, `EnterDate`, `remark`, `outtime`) VALUES
(1, 'Abir Rajvansh', 7798777898, 'X-128 New delhi', 'Mr. Raghav', 'Friend', 'H-909', '9 th floor', '2019-12-16 05:24:02', 'Ok', '2019-12-16 06:04:12'),
(2, 'Joginder', 6546876546, 'Mayur Vihar ph 3', 'Mr. Sanjay', 'Delivery of Vegetables', 'A', '101', '2019-12-16 05:25:27', NULL, '2019-12-19 07:03:39'),
(3, 'Rohan', 4646546446, 'Kailash Puram New Delhi', 'Raginii', 'Relative', 'A', '102', '2019-12-19 06:45:44', 'Done', '2019-12-19 06:48:08'),
(4, 'Rakesh', 8979789789, 'yutjhyudccty', 'XYZ', 'Delivery', 'A', '107', '2019-12-24 07:14:53', NULL, NULL),
(5, 'Test', 4466546546, 'oiuoiuhuihyiui', 'kiououoi', 'ghiuyuui', 'A', '107', '2019-12-24 07:15:22', 'ok', '2019-12-24 07:18:14'),
(6, 'Amit kumar', 4569871133, 'New Delhi', 'Anuj', 'Personal', 'A', '201', '2019-12-29 17:22:31', 'Out', '2019-12-29 17:23:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblallotment`
--
ALTER TABLE `tblallotment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Block` (`Block`),
  ADD KEY `FlatNum` (`FlatNum`);

--
-- Indexes for table `tblbill`
--
ALTER TABLE `tblbill`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Block` (`Block`),
  ADD KEY `FlatNum` (`FlatNum`);

--
-- Indexes for table `tblblocks`
--
ALTER TABLE `tblblocks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcomplain`
--
ALTER TABLE `tblcomplain`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `tblflat`
--
ALTER TABLE `tblflat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Block` (`Block`),
  ADD KEY `FlatNo` (`FlatNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblallotment`
--
ALTER TABLE `tblallotment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblbill`
--
ALTER TABLE `tblbill`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblblocks`
--
ALTER TABLE `tblblocks`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblcomplain`
--
ALTER TABLE `tblcomplain`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblflat`
--
ALTER TABLE `tblflat`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tblvisitor`
--
ALTER TABLE `tblvisitor`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
