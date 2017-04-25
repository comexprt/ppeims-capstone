-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 10:26 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

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

CREATE TABLE `administrator` (
  `A_No` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`A_No`, `Username`, `Password`, `Fname`, `Lname`, `Position`) VALUES
(1, 'admin', '123', 'Rolando', 'Lemence		', 'Safety Officer');

-- --------------------------------------------------------

--
-- Table structure for table `equipement_inventory`
--

CREATE TABLE `equipement_inventory` (
  `EI_No` int(11) NOT NULL,
  `Particulars` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Re_Ordering_Pt` int(11) NOT NULL,
  `Issued` int(11) NOT NULL,
  `Unit` varchar(50) NOT NULL,
  `Remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipement_inventory`
--

INSERT INTO `equipement_inventory` (`EI_No`, `Particulars`, `Description`, `Stock`, `Re_Ordering_Pt`, `Issued`, `Unit`, `Remarks`) VALUES
(1, 'Hard Hat (Blue)', '', 0, 0, 0, 'pcs', ''),
(2, 'Hard Hat (Yellow)', '', 0, 0, 0, 'pcs', ''),
(3, 'Protective Eyewear', '', 0, 0, 0, 'pcs', ''),
(4, 'Face Shield', '', 0, 0, 0, 'pcs', ''),
(5, 'Safety Shoes', '', 0, 0, 0, 'pcs', ''),
(6, 'Respirator (Full Face)', '', 0, 0, 0, 'pcs', ''),
(7, 'Respirator (Cartridge)', '', 0, 0, 0, 'pcs', ''),
(8, 'Hand Glove (Knitted)', '', 0, 0, 0, 'pcs', ''),
(9, 'High Voltage Glove', '', 0, 0, 0, 'pcs', ''),
(10, 'Chemical Glove', '', 5, 5, 0, 'pcs', ''),
(11, 'Welder Hand Glove', '', 0, 0, 0, 'pcs', ''),
(12, 'Welding Mask', '', 0, 0, 0, 'pcs', ''),
(13, 'Dust Mask (N95)', '', 20, 5, 0, 'pcs', ''),
(14, 'Safety Harness w/ Lanyard', '', 0, 0, 0, 'pcs', ''),
(15, 'Ear Plug', '', 40, 5, 0, 'pcs', ''),
(16, 'Rain Suit', '', 0, 0, 0, 'set', ''),
(17, 'Rubber Boots', '', 0, 0, 0, 'pcs', ''),
(18, 'Reflectorized Vest', '', 0, 0, 0, 'pcs', ''),
(19, 'Working Clothes', '', 0, 0, 0, 'pcs', ''),
(20, 'Chemical Suit (Disposable)', '', 13, 5, 0, 'pcs', ''),
(21, 'Gas Filter', '', 0, 0, 0, 'pcs', ''),
(22, 'First Aid Kit (White)', '', 0, 0, 0, 'set', ''),
(23, 'First Aid Kit (Red)', '', 0, 0, 0, 'set', ''),
(24, 'Gas Mask (Half Face)', '', 0, 0, 0, 'pcs', ''),
(25, 'Fire Escape Mask', '', 0, 0, 0, 'pcs', ''),
(26, 'SCBA', '', 0, 0, 0, 'set', '');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `G_No` int(11) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`G_No`, `GroupName`, `Description`) VALUES
(1, 'Office of the Plant Manager', ''),
(2, 'Maintenance-Agus 6 HEP', ''),
(3, 'Maintenance-Agus 7 HEP', ''),
(4, 'Maintenance', '');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `iid` int(11) NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`iid`, `image_name`) VALUES
(1, 'image_preview.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_report`
--

CREATE TABLE `inventory_report` (
  `irid` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `prepared_by` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory_report`
--

INSERT INTO `inventory_report` (`irid`, `date_create`, `prepared_by`, `status`) VALUES
(1, '2017-04-26', 'R. Lemence		', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_report_details`
--

CREATE TABLE `inventory_report_details` (
  `irdid` int(11) NOT NULL,
  `irid` int(11) NOT NULL,
  `Particular` text NOT NULL,
  `In_Stock` text NOT NULL,
  `Remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory_report_details`
--

INSERT INTO `inventory_report_details` (`irdid`, `irid`, `Particular`, `In_Stock`, `Remarks`) VALUES
(1, 1, 'Chemical Glove', '6 pcs', ''),
(2, 1, 'Chemical Suit (Disposable)', '13 pcs', ''),
(3, 1, 'Dust Mask (N95)', '20 pcs', ''),
(4, 1, 'Ear Plug', '40 pcs', ''),
(5, 1, 'Face Shield', '0 pcs', ''),
(6, 1, 'Fire Escape Mask', '0 pcs', ''),
(7, 1, 'First Aid Kit (Red)', '0 set', ''),
(8, 1, 'First Aid Kit (White)', '0 set', ''),
(9, 1, 'Gas Filter', '0 pcs', ''),
(10, 1, 'Gas Mask (Half Face)', '0 pcs', ''),
(11, 1, 'Hand Glove (Knitted)', '0 pcs', ''),
(12, 1, 'Hard Hat (Blue)', '0 pcs', ''),
(13, 1, 'Hard Hat (Yellow)', '0 pcs', ''),
(14, 1, 'High Voltage Glove', '0 pcs', ''),
(15, 1, 'Protective Eyewear', '0 pcs', ''),
(16, 1, 'Rain Suit', '0 set', ''),
(17, 1, 'Reflectorized Vest', '0 pcs', ''),
(18, 1, 'Respirator (Cartridge)', '0 pcs', ''),
(19, 1, 'Respirator (Full Face)', '0 pcs', ''),
(20, 1, 'Rubber Boots', '0 pcs', ''),
(21, 1, 'Safety Harness w/ Lanyard', '0 pcs', ''),
(22, 1, 'Safety Shoes', '0 pcs', ''),
(23, 1, 'SCBA', '0 set', ''),
(24, 1, 'Welder Hand Glove', '0 pcs', ''),
(25, 1, 'Welding Mask', '0 pcs', ''),
(26, 1, 'Working Clothes', '0 pcs', '');

-- --------------------------------------------------------

--
-- Table structure for table `issuance`
--

CREATE TABLE `issuance` (
  `isno` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_modified` date NOT NULL,
  `total_personnel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issuance`
--

INSERT INTO `issuance` (`isno`, `status`, `date_modified`, `total_personnel`) VALUES
(0, 1, '0000-00-00', 0),
(1, 1, '2016-01-20', 3),
(2, 1, '2016-01-25', 2),
(3, 1, '2016-01-30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_issued`
--

CREATE TABLE `item_issued` (
  `iino` int(11) NOT NULL,
  `particulars` varchar(50) NOT NULL DEFAULT '',
  `in_stock` int(11) NOT NULL DEFAULT '0',
  `issued` int(11) NOT NULL DEFAULT '0',
  `unit` varchar(10) NOT NULL DEFAULT '',
  `date_received` date NOT NULL DEFAULT '0000-00-00',
  `pino` int(11) NOT NULL DEFAULT '0',
  `EI_No` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_issued`
--

INSERT INTO `item_issued` (`iino`, `particulars`, `in_stock`, `issued`, `unit`, `date_received`, `pino`, `EI_No`) VALUES
(1, 'Chemical Glove', 10, 1, 'pcs', '2016-01-20', 1, 10),
(2, 'Chemical Glove', 9, 1, 'pcs', '2016-01-19', 2, 10),
(3, 'Chemical Glove', 8, 1, 'pcs', '2016-01-19', 3, 10),
(4, 'Chemical Suit (Disposable)', 15, 1, 'pcs', '2016-01-25', 4, 20),
(5, 'Chemical Suit (Disposable)', 14, 1, 'pcs', '2016-01-24', 5, 20),
(6, 'Chemical Glove', 7, 1, 'pcs', '2016-01-25', 4, 10),
(7, 'Chemical Glove', 6, 1, 'pcs', '2016-01-30', 6, 10),
(9, 'Chemical Suit (Disposable)', 13, 0, 'pcs', '0000-00-00', 7, 20);

--
-- Triggers `item_issued`
--
DELIMITER $$
CREATE TRIGGER `add_	total_item_issued` BEFORE INSERT ON `item_issued` FOR EACH ROW UPDATE personnel_issued
        SET personnel_issued.total_item_issued = personnel_issued.total_item_issued + 1
        
WHERE personnel_issued.pino = new.pino
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_item_issued` BEFORE DELETE ON `item_issued` FOR EACH ROW UPDATE personnel_issued
        SET personnel_issued.total_item_issued = personnel_issued.total_item_issued - 1
        
WHERE personnel_issued.pino = old.pino
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `P_No` int(11) NOT NULL,
  `PersonnelName` varchar(50) NOT NULL,
  `G_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`P_No`, `PersonnelName`, `G_No`) VALUES
(1, 'Hiceta-Henry-Badelles', 1),
(2, 'Encabo-Romeo-Alagar', 4),
(3, 'Alfeche-Wilfredo-Aligno', 2),
(4, 'Bas-Edgar-Nayre', 2),
(5, 'Cabusas-Auxiliador-Ybarbia', 2),
(6, 'Cardines-Alfredo-Jumawan', 2),
(7, 'Enriquez-Nelson-Dahino', 2),
(8, 'Gillo-Ruperto-Subrino', 2),
(9, 'Macalisang-Evan-Dela Cruz', 2),
(10, 'Mamauag-Robert-Subang', 2),
(11, 'Obatay-Tomas-Baga-an', 2),
(12, 'Perez-Lorna-Lomarda', 2),
(13, 'Hinaloc-Reynaldo-Wahing', 3),
(14, 'Hoyohoy-Cerillo, Sr.-Abellana', 3),
(15, 'Jabay-Manuel-Baguio', 3),
(16, 'Mabala-Antonio-Berdon', 3),
(17, 'Mejias-Edmund-Edrozo', 3);

-- --------------------------------------------------------

--
-- Table structure for table `personnel_issued`
--

CREATE TABLE `personnel_issued` (
  `pino` int(11) NOT NULL,
  `personnel_name` varchar(50) NOT NULL DEFAULT '',
  `work_center` varchar(50) NOT NULL DEFAULT '',
  `total_item_issued` int(11) NOT NULL DEFAULT '0',
  `isno` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnel_issued`
--

INSERT INTO `personnel_issued` (`pino`, `personnel_name`, `work_center`, `total_item_issued`, `isno`) VALUES
(1, 'Alfeche-Wilfredo-Aligno', 'Maintenance-Agus 6 HEP', 1, 1),
(2, 'Bas-Edgar-Nayre', 'Maintenance-Agus 6 HEP', 1, 1),
(3, 'Cabusas-Auxiliador-Ybarbia', 'Maintenance-Agus 6 HEP', 1, 1),
(4, 'Alfeche-Wilfredo-Aligno', 'Maintenance-Agus 6 HEP', 2, 2),
(5, 'Bas-Edgar-Nayre', 'Maintenance-Agus 6 HEP', 1, 2),
(6, 'Alfeche-Wilfredo-Aligno', 'Maintenance-Agus 6 HEP', 1, 3),
(7, 'Bas-Edgar-Nayre', 'Maintenance-Agus 6 HEP', 1, 3);

--
-- Triggers `personnel_issued`
--
DELIMITER $$
CREATE TRIGGER `add_on_total` BEFORE INSERT ON `personnel_issued` FOR EACH ROW UPDATE issuance
        SET issuance.total_personnel = issuance.total_personnel + 1
        
WHERE issuance.isno = new.isno
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sub_on_total` BEFORE DELETE ON `personnel_issued` FOR EACH ROW UPDATE issuance
        
        SET issuance.total_personnel = issuance.total_personnel - 1
        
        WHERE issuance.isno = old.isno
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `updated_transaction`
--

CREATE TABLE `updated_transaction` (
  `Tr_No` int(11) NOT NULL,
  `Tr_Date` date NOT NULL,
  `Pb` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `total_equipment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updated_transaction`
--

INSERT INTO `updated_transaction` (`Tr_No`, `Tr_Date`, `Pb`, `Status`, `total_equipment`) VALUES
(0, '2000-04-10', '', '0', 0),
(1, '2016-01-01', '0', '1', 2),
(2, '2016-01-15', '0', '1', 2);

--
-- Triggers `updated_transaction`
--
DELIMITER $$
CREATE TRIGGER `delete_UT_details` BEFORE DELETE ON `updated_transaction` FOR EACH ROW BEGIN    
DELETE FROM updated_transaction_details
WHERE (Tr_No = old.Tr_No);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `updated_transaction_details`
--

CREATE TABLE `updated_transaction_details` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updated_transaction_details`
--

INSERT INTO `updated_transaction_details` (`Tr_D_No`, `Particulars`, `Added_S`, `Subtracted_S`, `Unit`, `Re_OrderPt`, `Expiration_Date`, `Remarks`, `Tr_No`, `EI_No`) VALUES
(1, 'Chemical Glove', 10, 0, 'pcs', 5, '2017-01-01', '', 1, 10),
(2, 'Chemical Suit (Disposable)', 15, 0, 'pcs', 5, '2017-01-01', '', 1, 20),
(3, 'Dust Mask (N95)', 20, 0, 'pcs', 5, '2017-01-15', '', 2, 13),
(4, 'Ear Plug', 40, 0, 'pcs', 5, '2017-01-15', '', 2, 15);

--
-- Triggers `updated_transaction_details`
--
DELIMITER $$
CREATE TRIGGER `Delete_on_update` BEFORE DELETE ON `updated_transaction_details` FOR EACH ROW BEGIN
        UPDATE Equipement_Inventory
        SET Equipement_Inventory.Stock = Equipement_Inventory.Stock - 				old.Added_S
	 	WHERE Equipement_Inventory.EI_No = old.EI_No;
        
        UPDATE updated_transaction SET updated_transaction.total_equipment = updated_transaction.total_equipment - 1 WHERE updated_transaction.Tr_No = old.Tr_No;
        
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_on_EI` BEFORE UPDATE ON `updated_transaction_details` FOR EACH ROW BEGIN
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
DELIMITER $$
CREATE TRIGGER `add_on_equipment_total` BEFORE INSERT ON `updated_transaction_details` FOR EACH ROW UPDATE updated_transaction
	SET updated_transaction.total_equipment = updated_transaction.total_equipment + 1
WHERE updated_transaction.Tr_No = new.Tr_No
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
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`iid`);

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
  MODIFY `A_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `equipement_inventory`
--
ALTER TABLE `equipement_inventory`
  MODIFY `EI_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `G_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inventory_report`
--
ALTER TABLE `inventory_report`
  MODIFY `irid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inventory_report_details`
--
ALTER TABLE `inventory_report_details`
  MODIFY `irdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `issuance`
--
ALTER TABLE `issuance`
  MODIFY `isno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item_issued`
--
ALTER TABLE `item_issued`
  MODIFY `iino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `personnel_issued`
--
ALTER TABLE `personnel_issued`
  MODIFY `pino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `updated_transaction`
--
ALTER TABLE `updated_transaction`
  MODIFY `Tr_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `updated_transaction_details`
--
ALTER TABLE `updated_transaction_details`
  MODIFY `Tr_D_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
