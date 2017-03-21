-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2017 at 06:28 AM
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
(5, 'Hard Hat (Blue)', 'Lorem ipsum dolor sit amet.c', 0, 0, 0, 'pcs', ''),
(6, 'Hard Hat (Yellow)', 'Lorem ipsum dolor sit amet.', 0, 0, 0, 'pcs', ''),
(7, 'Protective Eyewear', 'Lorem ipsum dolor sit amet.', 5, 3, 0, 'pcs', 'yeah'),
(8, 'Face Shield', 'Lorem ipsum dolor sit amet.', 11, 5, 0, 'pairs', ''),
(9, 'Safety Shoes', 'Lorem ipsum dolor sit amet.', 17, 1, 0, 'pcs', 'example'),
(13, 'watch ', 'Time will come', 10, 5, 0, 'pairs', 'beta testing'),
(15, 'ddd', 'ddd', 0, 0, 0, 'pcs', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updated_transaction`
--

INSERT INTO `updated_transaction` (`Tr_No`, `Tr_Date`, `Pb`, `Status`) VALUES
(1, '0000-00-00', '', '1'),
(15, '2017-03-09', 'J. avelino', '1'),
(16, '2017-03-21', 'J. avelino', '1'),
(19, '2017-03-21', 'J. avelino', '2'),
(20, '2017-03-21', 'J. avelino', '1'),
(21, '2017-03-21', 'R. Lemence', '1'),
(22, '2017-03-21', 'R. Lemence', '2');

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updated_transaction_details`
--

INSERT INTO `updated_transaction_details` (`Tr_D_No`, `Particulars`, `Added_S`, `Subtracted_S`, `Unit`, `Total_S`, `Re_OrderPt`, `Expiration_Date`, `Remarks`, `Tr_No`, `EI_No`) VALUES
(1, '', 0, 0, '', 0, 0, '0000-00-00', '', 1, 0),
(34, 'Hard Hat (Blue)', 0, 0, '', 0, 3, '0000-00-00', '', 15, 5),
(35, 'watch ', 0, 0, '', 0, 3, '0000-00-00', '', 15, 13),
(40, 'Hard Hat (Blue)', 0, 0, '', 0, 3, '0000-00-00', '', 15, 5),
(41, 'Safety Shoes', 0, 0, '', 0, 3, '0000-00-00', '', 16, 9),
(44, 'Hard Hat (Blue)', 0, 0, '', 0, 3, '0000-00-00', '', 19, 5),
(45, 'Hard Hat (Blue)', 0, 0, '', 0, 3, '0000-00-00', '', 20, 5),
(46, 'Face Shield', 0, 0, '', 0, 3, '0000-00-00', '', 20, 8),
(47, 'Face Shield', 0, 0, '', 0, 3, '0000-00-00', '', 21, 8),
(48, 'Face Shield', 0, 0, '', 0, 3, '0000-00-00', '', 22, 8),
(49, 'watch ', 0, 0, '', 0, 3, '0000-00-00', '', 22, 13);

--
-- Triggers `updated_transaction_details`
--
DELIMITER $$
CREATE TRIGGER `Insert_UTD` BEFORE INSERT ON `updated_transaction_details`
 FOR EACH ROW BEGIN

	
    SET @last_Tr_No = (SELECT Tr_No FROM `Updated_Transaction` ORDER BY Tr_No DESC LIMIT 1);
	SET @Status = (SELECT Status FROM `Updated_Transaction` ORDER BY Tr_No DESC LIMIT 1);
                       
  
                       
    IF @Status <= 0 THEN
    	SET new.Tr_No = @last_Tr_No;
    
    ELSE
    
    Insert INTO Updated_Transaction (Updated_Transaction.Tr_Date,Updated_Transaction.Pb, Updated_Transaction.Status) 
	values (CURDATE(),"","0") ; 


	SET @lastUID = (SELECT Tr_No FROM Updated_Transaction ORDER BY Tr_No DESC LIMIT 1);
    SET new.Tr_No = @lastUID;
    
    
    END IF;
    
    

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_on_EI` BEFORE UPDATE ON `updated_transaction_details`
 FOR EACH ROW BEGIN
		UPDATE Equipement_Inventory
        
        SET Equipement_Inventory.Stock = new.Total_S
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
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `updated_transaction`
--
ALTER TABLE `updated_transaction`
  MODIFY `Tr_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `updated_transaction_details`
--
ALTER TABLE `updated_transaction_details`
  MODIFY `Tr_D_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
