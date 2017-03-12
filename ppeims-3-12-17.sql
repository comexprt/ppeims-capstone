-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2017 at 09:56 AM
-- Server version: 5.6.30
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
-- Table structure for table `Administrator`
--

CREATE TABLE IF NOT EXISTS `Administrator` (
  `A_No` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Administrator`
--

INSERT INTO `Administrator` (`A_No`, `Username`, `Password`, `Fname`, `Lname`, `Position`) VALUES
(1, 'admin', '123', 'Jedox', 'avelino', 'Property Officer');

-- --------------------------------------------------------

--
-- Table structure for table `Equipement_Inventory`
--

CREATE TABLE IF NOT EXISTS `Equipement_Inventory` (
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
-- Dumping data for table `Equipement_Inventory`
--

INSERT INTO `Equipement_Inventory` (`EI_No`, `Particulars`, `Description`, `Stock`, `Re_Ordering_Pt`, `Issued`, `Unit`, `Remarks`) VALUES
(5, 'Hard Hat (Blue)', 'Lorem ipsum dolor sit amet.c', 0, 0, 0, 'pcs', ''),
(6, 'Hard Hat (Yellow)', 'Lorem ipsum dolor sit amet.', 0, 0, 0, 'pcs', ''),
(7, 'Protective Eyewear', 'Lorem ipsum dolor sit amet.', 5, 3, 0, 'pcs', 'yeah'),
(8, 'Face Shield', 'Lorem ipsum dolor sit amet.', 11, 5, 0, 'pairs', ''),
(9, 'Safety Shoes', 'Lorem ipsum dolor sit amet.', 17, 1, 0, 'pcs', 'example'),
(13, 'watch ', 'Time will come', 10, 5, 0, 'pairs', 'beta testing');

-- --------------------------------------------------------

--
-- Table structure for table `Group`
--

CREATE TABLE IF NOT EXISTS `Group` (
  `G_No` int(11) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Group`
--

INSERT INTO `Group` (`G_No`, `GroupName`, `Description`) VALUES
(7, 'OM', 'Office of the Plant Manager'),
(8, 'PTS', 'Plant Technical and Service');

-- --------------------------------------------------------

--
-- Table structure for table `Personnel`
--

CREATE TABLE IF NOT EXISTS `Personnel` (
  `P_No` int(11) NOT NULL,
  `PersonnelName` varchar(50) NOT NULL,
  `G_No` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Personnel`
--

INSERT INTO `Personnel` (`P_No`, `PersonnelName`, `G_No`) VALUES
(1, 'Juan Tamads', 6),
(2, 'Kobe Bryan', 3),
(4, 'lebron james', 1),
(5, 'Yassi Ompad', 8),
(6, 'Gene Manlimos', 7);

-- --------------------------------------------------------

--
-- Table structure for table `Updated_Transaction`
--

CREATE TABLE IF NOT EXISTS `Updated_Transaction` (
  `Tr_No` int(11) NOT NULL,
  `Tr_Date` date NOT NULL,
  `Pb` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Updated_Transaction`
--

INSERT INTO `Updated_Transaction` (`Tr_No`, `Tr_Date`, `Pb`, `Status`) VALUES
(1, '0000-00-00', '', '0'),
(14, '2017-03-09', '', '0'),
(15, '2017-03-09', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Updated_Transaction_Details`
--

CREATE TABLE IF NOT EXISTS `Updated_Transaction_Details` (
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Updated_Transaction_Details`
--

INSERT INTO `Updated_Transaction_Details` (`Tr_D_No`, `Particulars`, `Added_S`, `Subtracted_S`, `Unit`, `Total_S`, `Re_OrderPt`, `Expiration_Date`, `Remarks`, `Tr_No`, `EI_No`) VALUES
(1, '', 0, 0, '', 0, 0, '0000-00-00', '', 1, 0),
(32, 'Safety Shoes', 0, 0, '', 0, 3, '0000-00-00', '', 14, 9),
(33, 'Protective Eyewear', 0, 0, '', 0, 3, '0000-00-00', '', 14, 7),
(34, 'Hard Hat (Blue)', 0, 0, '', 0, 3, '0000-00-00', '', 15, 5),
(35, 'watch ', 0, 0, '', 0, 3, '0000-00-00', '', 15, 13);

--
-- Triggers `Updated_Transaction_Details`
--
DELIMITER $$
CREATE TRIGGER `Insert_UTD` BEFORE INSERT ON `updated_transaction_details`
 FOR EACH ROW BEGIN

	
    SET @last_Tr_No = (SELECT Tr_No FROM `Updated_Transaction` ORDER BY Tr_No DESC LIMIT 1);
	SET @Status = (SELECT Status FROM `Updated_Transaction` ORDER BY Tr_No DESC LIMIT 1);
                       
  
                       
    IF @Status >= 1 THEN
    	SET new.Tr_No = @last_Tr_No;
    
    ELSE
    
    Insert INTO Updated_Transaction (Updated_Transaction.Tr_Date,Updated_Transaction.Pb, Updated_Transaction.Status) 
	values (CURDATE(),"","1") ; 


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
-- Indexes for table `Administrator`
--
ALTER TABLE `Administrator`
  ADD PRIMARY KEY (`A_No`);

--
-- Indexes for table `Equipement_Inventory`
--
ALTER TABLE `Equipement_Inventory`
  ADD PRIMARY KEY (`EI_No`);

--
-- Indexes for table `Group`
--
ALTER TABLE `Group`
  ADD PRIMARY KEY (`G_No`);

--
-- Indexes for table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`P_No`);

--
-- Indexes for table `Updated_Transaction`
--
ALTER TABLE `Updated_Transaction`
  ADD PRIMARY KEY (`Tr_No`);

--
-- Indexes for table `Updated_Transaction_Details`
--
ALTER TABLE `Updated_Transaction_Details`
  ADD PRIMARY KEY (`Tr_D_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Administrator`
--
ALTER TABLE `Administrator`
  MODIFY `A_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Equipement_Inventory`
--
ALTER TABLE `Equipement_Inventory`
  MODIFY `EI_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `Group`
--
ALTER TABLE `Group`
  MODIFY `G_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Personnel`
--
ALTER TABLE `Personnel`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Updated_Transaction`
--
ALTER TABLE `Updated_Transaction`
  MODIFY `Tr_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Updated_Transaction_Details`
--
ALTER TABLE `Updated_Transaction_Details`
  MODIFY `Tr_D_No` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
