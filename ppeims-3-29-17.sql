-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2017 at 11:07 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppeims`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `A_No` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`A_No`, `Username`, `Password`, `Fname`, `Lname`, `Position`) VALUES
(1, 'admin', '123', 'Rolando', 'Lemence', 'Safety Officer');

-- --------------------------------------------------------

--
-- Table structure for table `equipement_inventory`
--

CREATE TABLE IF NOT EXISTS `equipement_inventory` (
  `EI_No` int(11) NOT NULL,
  `Particulars` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Re_Ordering_Pt` int(11) NOT NULL,
  `Issued` int(11) NOT NULL,
  `Unit` varchar(50) NOT NULL,
  `Remarks` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipement_inventory`
--

INSERT INTO `equipement_inventory` (`EI_No`, `Particulars`, `Description`, `Stock`, `Re_Ordering_Pt`, `Issued`, `Unit`, `Remarks`) VALUES
(5, 'Hard Hat (Blue)', 'Lorem ipsum dolor sit amet.c', 15, 3, 0, 'pcs', 'for OJT '),
(6, 'Hard Hat (Yellow)', 'Lorem ipsum dolor sit amet.', 10, 4, 0, 'pcs', ''),
(7, 'Protective Eyewear', 'Lorem ipsum dolor sit amet.', 5, 3, 0, 'pcs', 'yeah'),
(8, 'Face Shield', 'Lorem ipsum dolor sit amet.', 11, 5, 0, 'pairs', ''),
(9, 'Safety Shoes', 'Lorem ipsum dolor sit amet.', 20, 3, 0, 'pcs', 'example'),
(13, 'watch ', 'Time will come', 10, 5, 0, 'pairs', 'beta testing'),
(15, 'ddd', 'ddd', 6, 3, 0, 'pcs', 'sample2');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `G_No` int(11) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`G_No`, `GroupName`, `Description`) VALUES
(7, 'OM-yeah', 'Office of the Plant Manager'),
(8, 'PTS', 'Plant Technical and Service'),
(10, 'Maintenance', 'df');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `P_No` int(11) NOT NULL,
  `PersonnelName` varchar(50) NOT NULL,
  `G_No` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`P_No`, `PersonnelName`, `G_No`) VALUES
(1, 'Juan Tamads', 6),
(2, 'Kobe Bryan', 3),
(4, 'lebron james', 1),
(5, 'Yassi Ompad', 8),
(6, 'Gene Manlimos', 7);

-- --------------------------------------------------------

--
-- Table structure for table `updated_transaction`
--

CREATE TABLE IF NOT EXISTS `updated_transaction` (
  `Tr_No` int(11) NOT NULL,
  `Tr_Date` date NOT NULL,
  `Pb` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updated_transaction`
--

INSERT INTO `updated_transaction` (`Tr_No`, `Tr_Date`, `Pb`, `Status`) VALUES
(1, '0000-00-00', '', '1'),
(15, '2017-03-09', 'J. avelino', '2'),
(16, '2017-03-29', 'R. Lemence', '1'),
(19, '2017-03-21', 'J. avelino', '2'),
(20, '2017-03-29', 'R. Lemence', '1'),
(21, '2017-03-21', 'R. Lemence', '2'),
(22, '2017-03-21', 'R. Lemence', '2'),
(23, '2017-03-28', 'R. Lemence', '2'),
(29, '2017-03-29', 'R. Lemence', '2');

--
-- Triggers `updated_transaction`
--
DELIMITER $$
CREATE TRIGGER `delete_UT_details` BEFORE DELETE ON `updated_transaction`
 FOR EACH ROW BEGIN    
DELETE FROM updated_transaction_details
WHERE (Tr_No = old.Tr_No);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `updated_transaction_details`
--

CREATE TABLE IF NOT EXISTS `updated_transaction_details` (
  `Tr_D_No` int(11) NOT NULL,
  `Particulars` varchar(50) NOT NULL,
  `Added_S` int(11) NOT NULL,
  `Subtracted_S` int(11) NOT NULL,
  `Unit` varchar(50) NOT NULL,
  `Total_S` int(11) NOT NULL,
  `Re_OrderPt` int(11) NOT NULL,
  `Expiration_Date` date NOT NULL,
  `Remarks` varchar(50) NOT NULL,
  `Tr_No` int(11) NOT NULL,
  `EI_No` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updated_transaction_details`
--

INSERT INTO `updated_transaction_details` (`Tr_D_No`, `Particulars`, `Added_S`, `Subtracted_S`, `Unit`, `Total_S`, `Re_OrderPt`, `Expiration_Date`, `Remarks`, `Tr_No`, `EI_No`) VALUES
(1, '', 0, 0, '', 0, 0, '0000-00-00', '', 1, 0),
(57, 'Hard Hat (Blue)', 2, 0, 'pcs', 15, 3, '2017-03-31', 'for OJT ', 29, 5),
(58, 'Safety Shoes', 3, 0, 'pcs', 20, 3, '2017-03-31', 'example', 29, 9),
(59, 'Hard Hat (Blue)', 0, 0, '', 0, 3, '0000-00-00', '', 20, 5),
(60, 'Hard Hat (Yellow)', 0, 0, '', 0, 3, '0000-00-00', '', 20, 6),
(61, 'ddd', 0, 0, '', 0, 3, '0000-00-00', '', 21, 15),
(62, 'watch ', 0, 0, '', 0, 3, '0000-00-00', '', 21, 13),
(63, 'ddd', 5, 0, 'pcs', 6, 3, '2017-03-15', 'sample2', 16, 15),
(64, 'watch ', 0, 0, '', 0, 3, '0000-00-00', '', 16, 13),
(67, 'ddd', 1, 0, 'pcs', 6, 3, '2017-03-31', 'sample2', 20, 15);

--
-- Triggers `updated_transaction_details`
--
DELIMITER $$
CREATE TRIGGER `Update_on_EI` BEFORE UPDATE ON `updated_transaction_details`
 FOR EACH ROW BEGIN
		UPDATE Equipement_Inventory
        
        SET Equipement_Inventory.Stock = Equipement_Inventory.Stock - 				old.Added_S + new.Added_S
	 	WHERE Equipement_Inventory.EI_No = new.EI_No;
    
    	UPDATE Equipement_Inventory
        SET Equipement_Inventory.Unit = new.Unit
	 	WHERE Equipement_Inventory.EI_No = new.EI_No;
        
        UPDATE Equipement_Inventory
        SET Equipement_Inventory.Remarks = new.Remarks
	 	WHERE Equipement_Inventory.EI_No = new.EI_No;
		
        UPDATE Equipement_Inventory
        SET Equipement_Inventory.Re_Ordering_Pt = new.Re_OrderPt
	 	WHERE Equipement_Inventory.EI_No = new.EI_No;
        
    
    
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`A_No`);

--
-- Indexes for table `equipement_inventory`
--
ALTER TABLE `equipement_inventory`
  ADD PRIMARY KEY (`EI_No`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`G_No`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `updated_transaction`
--
ALTER TABLE `updated_transaction`
  ADD PRIMARY KEY (`Tr_No`);

--
-- Indexes for table `updated_transaction_details`
--
ALTER TABLE `updated_transaction_details`
  ADD PRIMARY KEY (`Tr_D_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `A_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `equipement_inventory`
--
ALTER TABLE `equipement_inventory`
  MODIFY `EI_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `G_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `updated_transaction`
--
ALTER TABLE `updated_transaction`
  MODIFY `Tr_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `updated_transaction_details`
--
ALTER TABLE `updated_transaction_details`
  MODIFY `Tr_D_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
