-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2017 at 12:31 AM
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
(1, 'admin', '12', 'Rolando', 'Lemence', 'Safety Officer');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipement_inventory`
--

INSERT INTO `equipement_inventory` (`EI_No`, `Particulars`, `Description`, `Stock`, `Re_Ordering_Pt`, `Issued`, `Unit`, `Remarks`) VALUES
(5, 'Hard Hat (Blue)', 'Lorem ipsum dolor sit amet.c', 16, 1, 0, 'pcs', ''),
(6, 'Hard Hat (3 in 1)', 'hard hat + ear plug + head light', 18, 25, 0, 'set', ''),
(7, 'Protective Eyewear', 'Lorem ipsum dolor sit amet.', 13, 25, 0, 'pcs', ''),
(8, 'Face Shield', 'Lorem ipsum dolor sit amet.', 18, 2, 0, 'pairs', ''),
(9, 'Safety Shoes', 'Lorem ipsum dolor sit amet.', 14, 5, 0, 'pcs', ''),
(13, 'watch ', 'Time will come', 17, 25, 0, 'pairs', '');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `G_No` int(11) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`G_No`, `GroupName`, `Description`) VALUES
(7, 'Office of the Plant Manager', 'opm - AGUS 6/7 complex'),
(8, 'Plant Tehcnical and Service', 'Techinical Services of the plant'),
(10, 'Agus 6 HEP-Maintenance', 'Operation and maintenance for AGUS 6'),
(11, 'Agus 7 HEP-Maintenance', 'Operation and maintenance for AGUS 7');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_report`
--

CREATE TABLE IF NOT EXISTS `inventory_report` (
  `irid` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `prepared_by` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_report_details`
--

CREATE TABLE IF NOT EXISTS `inventory_report_details` (
  `irdid` int(11) NOT NULL,
  `irid` int(11) NOT NULL,
  `Particular` text NOT NULL,
  `In_Stock` text NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issuance`
--

CREATE TABLE IF NOT EXISTS `issuance` (
  `isno` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_modified` date NOT NULL,
  `total_personnel` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issuance`
--

INSERT INTO `issuance` (`isno`, `status`, `date_modified`, `total_personnel`) VALUES
(0, 1, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_issued`
--

CREATE TABLE IF NOT EXISTS `item_issued` (
  `iino` int(11) NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `issued` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `date_received` date NOT NULL,
  `pino` int(11) NOT NULL,
  `EI_No` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Triggers `item_issued`
--
DELIMITER $$
CREATE TRIGGER `add_	total_item_issued` BEFORE INSERT ON `item_issued`
 FOR EACH ROW UPDATE personnel_issued
        SET personnel_issued.total_item_issued = personnel_issued.total_item_issued + 1
        
WHERE personnel_issued.pino = new.pino
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_item_issued` BEFORE DELETE ON `item_issued`
 FOR EACH ROW UPDATE personnel_issued
        SET personnel_issued.total_item_issued = personnel_issued.total_item_issued - 1
        
WHERE personnel_issued.pino = old.pino
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `P_No` int(11) NOT NULL,
  `PersonnelName` varchar(50) NOT NULL,
  `G_No` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`P_No`, `PersonnelName`, `G_No`) VALUES
(13, 'Alfeche-Wilfredo-Ansis', 10),
(14, 'Bas-Edgar-Nitendo', 11),
(15, 'Cabusas-Auxiliador-Yangyang', 11),
(16, 'Smith-Jiyoon-Gitungo', 8),
(17, 'Hiceta-Henry-Basmayor', 7),
(18, 'Avelino-Jedox-Mansano', 8);

-- --------------------------------------------------------

--
-- Table structure for table `personnel_issued`
--

CREATE TABLE IF NOT EXISTS `personnel_issued` (
  `pino` int(11) NOT NULL,
  `personnel_name` varchar(50) NOT NULL,
  `work_center` varchar(50) NOT NULL,
  `total_item_issued` int(11) NOT NULL,
  `isno` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Triggers `personnel_issued`
--
DELIMITER $$
CREATE TRIGGER `add_on_total` BEFORE INSERT ON `personnel_issued`
 FOR EACH ROW UPDATE issuance
        SET issuance.total_personnel = issuance.total_personnel + 1
        
WHERE issuance.isno = new.isno
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sub_on_total` BEFORE DELETE ON `personnel_issued`
 FOR EACH ROW UPDATE issuance
        
        SET issuance.total_personnel = issuance.total_personnel - 1
        
        WHERE issuance.isno = old.isno
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `updated_transaction`
--

CREATE TABLE IF NOT EXISTS `updated_transaction` (
  `Tr_No` int(11) NOT NULL,
  `Tr_Date` date NOT NULL,
  `Pb` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updated_transaction`
--

INSERT INTO `updated_transaction` (`Tr_No`, `Tr_Date`, `Pb`, `Status`) VALUES
(0, '2000-04-01', '', '1');

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
  `Re_OrderPt` int(11) NOT NULL,
  `Expiration_Date` date NOT NULL,
  `Remarks` varchar(50) NOT NULL,
  `Tr_No` int(11) NOT NULL,
  `EI_No` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Triggers `updated_transaction_details`
--
DELIMITER $$
CREATE TRIGGER `Delete_on_update` BEFORE DELETE ON `updated_transaction_details`
 FOR EACH ROW BEGIN    

		UPDATE Equipement_Inventory
        
        SET Equipement_Inventory.Stock = Equipement_Inventory.Stock - 				old.Added_S
	 	WHERE Equipement_Inventory.EI_No = old.EI_No;
END
$$
DELIMITER ;
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
-- Indexes for table `inventory_report`
--
ALTER TABLE `inventory_report`
  ADD PRIMARY KEY (`irid`);

--
-- Indexes for table `inventory_report_details`
--
ALTER TABLE `inventory_report_details`
  ADD PRIMARY KEY (`irdid`);

--
-- Indexes for table `issuance`
--
ALTER TABLE `issuance`
  ADD PRIMARY KEY (`isno`);

--
-- Indexes for table `item_issued`
--
ALTER TABLE `item_issued`
  ADD PRIMARY KEY (`iino`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `personnel_issued`
--
ALTER TABLE `personnel_issued`
  ADD PRIMARY KEY (`pino`);

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
  MODIFY `EI_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `G_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `inventory_report`
--
ALTER TABLE `inventory_report`
  MODIFY `irid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `inventory_report_details`
--
ALTER TABLE `inventory_report_details`
  MODIFY `irdid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `issuance`
--
ALTER TABLE `issuance`
  MODIFY `isno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `item_issued`
--
ALTER TABLE `item_issued`
  MODIFY `iino` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `personnel_issued`
--
ALTER TABLE `personnel_issued`
  MODIFY `pino` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `updated_transaction`
--
ALTER TABLE `updated_transaction`
  MODIFY `Tr_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `updated_transaction_details`
--
ALTER TABLE `updated_transaction_details`
  MODIFY `Tr_D_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
