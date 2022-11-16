-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2022 at 10:25 AM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `static_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `importproduct`
--

CREATE TABLE `importproduct` (
  `ImportID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `DateOfImport` text NOT NULL,
  `NumberOfProduct` int(20) NOT NULL,
  `CostPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mart`
--

CREATE TABLE `mart` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `SellingPrice` float NOT NULL,
  `DateOfOrder` text COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `mart`
--

INSERT INTO `mart` (`OrderID`, `UserID`, `ProductID`, `SellingPrice`, `DateOfOrder`) VALUES
(13, 1, 40856, 20.5, '16/11/2022'),
(14, 1, 40856, 20.5, '16/11/2022'),
(15, 1, 10459, 98, '16/11/2022'),
(16, 1, 40856, 20.5, '16/11/2022'),
(17, 1, 40856, 20.5, '16/11/2022'),
(18, 1, 10459, 98, '16/11/2022'),
(19, 1, 74185, 185, '16/11/2022'),
(20, 1, 35890, 54.75, '16/11/2022');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `NameOfProduct` text NOT NULL,
  `SellingPice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `NameOfProduct`, `SellingPice`) VALUES
(10459, 'Sweet', 98),
(35890, 'Chip', 54.75),
(36985, 'Lay', 23),
(40856, 'Candy', 20.5),
(74185, 'Fish and Chip', 185);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(5) NOT NULL,
  `NameOfUser` text NOT NULL,
  `Password` int(20) NOT NULL,
  `Status` enum('Admin','Seller','Customer') NOT NULL,
  `Email` text NOT NULL,
  `Tel` int(10) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `NameOfUser`, `Password`, `Status`, `Email`, `Tel`, `Address`) VALUES
(1, 'AM', 159753, 'Admin', 'am@gmail.com', 987654321, '1578 kanlayanawat'),
(23574, 'Min', 12345678, 'Seller', '', 0, ''),
(98745, 'PP', 987654, 'Customer', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `importproduct`
--
ALTER TABLE `importproduct`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `mart`
--
ALTER TABLE `mart`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mart`
--
ALTER TABLE `mart`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `importproduct`
--
ALTER TABLE `importproduct`
  ADD CONSTRAINT `importproduct_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
