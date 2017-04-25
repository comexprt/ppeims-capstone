-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2017 at 02:28 AM
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
(1, 'Hard Hat (Blue)', '', 30, 10, 0, 'pcs', ''),
(2, 'Hard Hat (Yellow)', '', 20, 10, 0, 'pcs', ''),
(3, 'Protective Eyewear', '', 18, 5, 0, 'pcs', ''),
(4, 'Face Shield', '', 25, 20, 0, 'pcs', ''),
(5, 'Safety Shoes', '', 0, 0, 0, 'pairs', ''),
(6, 'Respirator (Full Face)', '', 29, 15, 0, 'pcs', ''),
(7, 'Respirator (Cartridge)', '', 50, 10, 0, 'pcs', ''),
(8, 'Hand Glove (Knitted)', '', 24, 10, 0, 'pairs', ''),
(9, 'High Voltage Glove', '', 25, 10, 0, 'pcs', ''),
(10, 'Chemical Glove', '', 35, 5, 0, 'pcs', ''),
(11, 'Welder Hand Glove', '', 20, 5, 0, 'pcs', ''),
(12, 'Welding Mask', '', 30, 10, 0, 'pcs', ''),
(13, 'Dust Mask (N95)', '', 45, 10, 0, 'pcs', ''),
(14, 'Safety Harness w/ Lanyard', '', 0, 0, 0, 'pcs', ''),
(15, 'Ear Plug', '', 20, 15, 0, 'pcs', ''),
(16, 'Rain Suit', '', 55, 10, 0, 'set', ''),
(17, 'Rubber Boots', '', 14, 5, 0, 'pcs', ''),
(18, 'Reflectorized Vest', '', 25, 5, 0, 'pcs', ''),
(19, 'Working Clothes', '', 0, 0, 0, 'pcs', ''),
(20, 'Working Clothes', '', 35, 10, 0, 'pcs', ''),
(21, 'Chemical Suit (Disposable)', '', 40, 5, 0, 'pcs', ''),
(22, 'Gas Filter', '', 18, 10, 0, 'pcs', ''),
(23, 'First Aid Kit (White)', '', 10, 5, 0, 'set', ''),
(24, 'First Aid Kit (Red)', '', 50, 10, 0, 'set', ''),
(25, 'Gas Mask (Half Face)', '', 13, 5, 0, 'pcs', ''),
(26, 'Fire Escape Mask', '', 29, 10, 0, 'pcs', ''),
(27, 'SCBA', '', 30, 10, 0, 'set', '');

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
(2, '2017-04-24', 'R. Lemence		', 0),
(3, '2017-04-24', 'R. Lemence		', 0),
(4, '2017-04-24', 'R. Lemence		', 0);

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
(28, 2, 'Chemical Glove', '38 pcs', 'used by Contractors'),
(29, 2, 'Chemical Suit (Disposable)', '45 pcs', 'used by CHO'),
(30, 2, 'Dust Mask (N95)', '48 pcs', ''),
(31, 2, 'Ear Plug', '25 pcs', ''),
(32, 2, 'Face Shield', '30 pcs', ''),
(33, 2, 'Fire Escape Mask', '0 pcs', ''),
(34, 2, 'First Aid Kit (Red)', '0 set', ''),
(35, 2, 'First Aid Kit (White)', '0 set', ''),
(36, 2, 'Gas Filter', '0 pcs', ''),
(37, 2, 'Gas Mask (Half Face)', '0 pcs', ''),
(38, 2, 'Hand Glove (Knitted)', '0 pairs', ''),
(39, 2, 'Hard Hat (Blue)', '0 pcs', ''),
(40, 2, 'Hard Hat (Yellow)', '0 pcs', ''),
(41, 2, 'High Voltage Glove', '25 pcs', ''),
(42, 2, 'Protective Eyewear', '18 pcs', ''),
(43, 2, 'Rain Suit', '55 set', ''),
(44, 2, 'Reflectorized Vest', '25 pcs', ''),
(45, 2, 'Respirator (Cartridge)', '50 pcs', ''),
(46, 2, 'Respirator (Full Face)', '29 pcs', ''),
(47, 2, 'Rubber Boots', '14 pcs', ''),
(48, 2, 'Safety Harness w/ Lanyard', '0 pcs', ''),
(49, 2, 'Safety Shoes', '0 pairs', ''),
(50, 2, 'SCBA', '30 set', ''),
(51, 2, 'Welder Hand Glove', '20 pcs', ''),
(52, 2, 'Welding Mask', '30 pcs', ''),
(53, 2, 'Working Clothes', '35 pcs', ''),
(54, 2, 'Working Clothes', '0 pcs', ''),
(55, 3, 'Chemical Glove', '38 pcs', ''),
(56, 3, 'Chemical Suit (Disposable)', '45 pcs', ''),
(57, 3, 'Dust Mask (N95)', '48 pcs', ''),
(58, 3, 'Ear Plug', '25 pcs', ''),
(59, 3, 'Face Shield', '30 pcs', ''),
(60, 3, 'Fire Escape Mask', '0 pcs', ''),
(61, 3, 'First Aid Kit (Red)', '0 set', ''),
(62, 3, 'First Aid Kit (White)', '0 set', ''),
(63, 3, 'Gas Filter', '0 pcs', ''),
(64, 3, 'Gas Mask (Half Face)', '0 pcs', ''),
(65, 3, 'Hand Glove (Knitted)', '0 pairs', ''),
(66, 3, 'Hard Hat (Blue)', '0 pcs', ''),
(67, 3, 'Hard Hat (Yellow)', '0 pcs', ''),
(68, 3, 'High Voltage Glove', '25 pcs', ''),
(69, 3, 'Protective Eyewear', '18 pcs', ''),
(70, 3, 'Rain Suit', '55 set', ''),
(71, 3, 'Reflectorized Vest', '25 pcs', ''),
(72, 3, 'Respirator (Cartridge)', '50 pcs', ''),
(73, 3, 'Respirator (Full Face)', '29 pcs', ''),
(74, 3, 'Rubber Boots', '14 pcs', ''),
(75, 3, 'Safety Harness w/ Lanyard', '0 pcs', ''),
(76, 3, 'Safety Shoes', '0 pairs', ''),
(77, 3, 'SCBA', '30 set', ''),
(78, 3, 'Welder Hand Glove', '20 pcs', ''),
(79, 3, 'Welding Mask', '30 pcs', ''),
(80, 3, 'Working Clothes', '35 pcs', ''),
(81, 3, 'Working Clothes', '0 pcs', ''),
(82, 4, 'Chemical Glove', '38 pcs', ''),
(83, 4, 'Chemical Suit (Disposable)', '45 pcs', ''),
(84, 4, 'Dust Mask (N95)', '48 pcs', ''),
(85, 4, 'Ear Plug', '25 pcs', ''),
(86, 4, 'Face Shield', '30 pcs', ''),
(87, 4, 'Fire Escape Mask', '0 pcs', ''),
(88, 4, 'First Aid Kit (Red)', '0 set', ''),
(89, 4, 'First Aid Kit (White)', '0 set', ''),
(90, 4, 'Gas Filter', '0 pcs', ''),
(91, 4, 'Gas Mask (Half Face)', '0 pcs', ''),
(92, 4, 'Hand Glove (Knitted)', '0 pairs', ''),
(93, 4, 'Hard Hat (Blue)', '0 pcs', ''),
(94, 4, 'Hard Hat (Yellow)', '0 pcs', ''),
(95, 4, 'High Voltage Glove', '25 pcs', ''),
(96, 4, 'Protective Eyewear', '18 pcs', ''),
(97, 4, 'Rain Suit', '55 set', ''),
(98, 4, 'Reflectorized Vest', '25 pcs', ''),
(99, 4, 'Respirator (Cartridge)', '50 pcs', ''),
(100, 4, 'Respirator (Full Face)', '29 pcs', ''),
(101, 4, 'Rubber Boots', '14 pcs', ''),
(102, 4, 'Safety Harness w/ Lanyard', '0 pcs', ''),
(103, 4, 'Safety Shoes', '0 pairs', ''),
(104, 4, 'SCBA', '30 set', ''),
(105, 4, 'Welder Hand Glove', '20 pcs', ''),
(106, 4, 'Welding Mask', '30 pcs', ''),
(107, 4, 'Working Clothes', '35 pcs', ''),
(108, 4, 'Working Clothes', '0 pcs', '');

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
(2, 1, '2017-04-24', 5),
(4, 1, '2017-04-24', 5),
(5, 1, '2017-04-24', 6),
(6, 1, '2017-04-24', 5),
(7, 1, '2017-04-24', 5),
(8, 1, '2017-04-25', 4),
(9, 1, '2017-04-25', 5);

-- --------------------------------------------------------

--
-- Table structure for table `item_issued`
--

CREATE TABLE `item_issued` (
  `iino` int(11) NOT NULL,
  `particulars` varchar(50) NOT NULL,
  `in_stock` int(11) NOT NULL,
  `issued` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `date_received` date NOT NULL,
  `pino` int(11) NOT NULL,
  `EI_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_issued`
--

INSERT INTO `item_issued` (`iino`, `particulars`, `in_stock`, `issued`, `unit`, `date_received`, `pino`, `EI_No`) VALUES
(1, 'Chemical Glove', 20, 5, 'pcs', '2017-04-26', 1, 10),
(2, 'Chemical Suit (Disposable)', 20, 5, 'pcs', '2017-04-23', 1, 21),
(9, 'Chemical Glove', 15, 5, 'pcs', '2017-04-23', 2, 10),
(10, 'Chemical Suit (Disposable)', 15, 5, 'pcs', '2017-04-24', 2, 21),
(12, 'Face Shield', 50, 5, 'pcs', '2017-04-24', 2, 4),
(13, 'Face Shield', 45, 5, 'pcs', '2017-04-23', 3, 4),
(14, 'Ear Plug', 40, 5, 'pcs', '2017-04-24', 4, 15),
(15, 'Face Shield', 40, 1, 'pcs', '2017-04-24', 4, 4),
(16, 'Chemical Glove', 10, 1, 'pcs', '2017-04-24', 6, 10),
(17, 'Chemical Suit (Disposable)', 10, 1, 'pcs', '2017-04-24', 6, 21),
(19, 'Ear Plug', 35, 1, 'pcs', '2017-04-23', 3, 15),
(20, 'Dust Mask (N95)', 30, 1, 'pcs', '2017-04-23', 7, 13),
(21, 'Ear Plug', 34, 1, 'pcs', '2017-04-24', 7, 15),
(22, 'Face Shield', 38, 1, 'pcs', '2017-04-24', 7, 4),
(23, 'Dust Mask (N95)', 29, 1, 'pcs', '2017-04-24', 8, 13),
(24, 'Ear Plug', 33, 2, 'pcs', '2017-04-23', 8, 15),
(25, 'Face Shield', 37, 1, 'pcs', '2017-04-23', 8, 4),
(26, 'Dust Mask (N95)', 28, 1, 'pcs', '2017-04-24', 9, 13),
(29, 'Face Shield', 36, 2, 'pcs', '2017-04-24', 10, 4),
(30, 'Ear Plug', 31, 1, 'pcs', '2017-04-24', 11, 15),
(31, 'Chemical Glove', 40, 2, 'pcs', '2017-04-24', 12, 10),
(32, 'Chemical Suit (Disposable)', 50, 2, 'pcs', '2017-04-24', 13, 21),
(33, 'Dust Mask (N95)', 50, 2, 'pcs', '2017-04-24', 14, 13),
(34, 'Ear Plug', 30, 2, 'pcs', '2017-04-24', 15, 15),
(35, 'Face Shield', 35, 2, 'pcs', '2017-04-24', 16, 4),
(36, 'High Voltage Glove', 30, 2, 'pcs', '2017-04-24', 17, 9),
(37, 'Protective Eyewear', 20, 1, 'pcs', '2017-04-24', 18, 3),
(38, 'Ear Plug', 28, 1, 'pcs', '2017-04-24', 19, 15),
(39, 'Face Shield', 33, 2, 'pcs', '2017-04-23', 20, 4),
(40, 'High Voltage Glove', 28, 2, 'pcs', '2017-04-24', 21, 9),
(41, 'Protective Eyewear', 19, 1, 'pcs', '2017-04-24', 21, 3),
(42, 'Chemical Suit (Disposable)', 48, 3, 'pcs', '2017-04-24', 22, 21),
(43, 'Rubber Boots', 15, 1, 'pcs', '2017-04-23', 23, 17),
(44, 'Respirator (Full Face)', 30, 1, 'pcs', '2017-04-24', 24, 6),
(45, 'High Voltage Glove', 26, 1, 'pcs', '2017-04-24', 25, 9),
(46, 'Face Shield', 31, 1, 'pcs', '2017-04-24', 26, 4),
(47, 'Ear Plug', 27, 2, 'pcs', '2017-04-24', 27, 15),
(51, 'Gas Filter', 20, 2, 'pcs', '2017-04-24', 28, 22),
(52, 'Gas Mask (Half Face)', 15, 2, 'pcs', '2017-04-24', 28, 25),
(53, 'Hand Glove (Knitted)', 25, 1, 'pairs', '2017-04-24', 29, 8),
(54, 'Ear Plug', 25, 5, 'pcs', '2017-04-25', 30, 15),
(55, 'Face Shield', 30, 1, 'pcs', '2017-04-25', 31, 4),
(56, 'Fire Escape Mask', 30, 1, 'pcs', '2017-04-25', 31, 26),
(57, 'Chemical Glove', 38, 3, 'pcs', '2017-04-25', 34, 10),
(58, 'Chemical Suit (Disposable)', 45, 3, 'pcs', '2017-04-25', 35, 21),
(59, 'Dust Mask (N95)', 48, 3, 'pcs', '2017-04-25', 36, 13),
(60, 'Chemical Suit (Disposable)', 42, 2, 'pcs', '2017-04-25', 37, 21),
(61, 'Face Shield', 29, 4, 'pcs', '2017-04-25', 38, 4);

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
  `personnel_name` varchar(50) NOT NULL,
  `work_center` varchar(50) NOT NULL,
  `total_item_issued` int(11) NOT NULL,
  `isno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnel_issued`
--

INSERT INTO `personnel_issued` (`pino`, `personnel_name`, `work_center`, `total_item_issued`, `isno`) VALUES
(1, 'Alfeche-Wilfredo-Aligno', 'Maintenance-Agus 6 HEP', 2, 2),
(2, 'Bas-Edgar-Nayre', 'Maintenance-Agus 6 HEP', 3, 2),
(3, 'Encabo-Romeo-Alagar', 'Maintenance', 2, 2),
(4, 'Hiceta-Henry-Badelles', 'Office of the Plant Manager', 2, 2),
(6, 'Hinaloc-Reynaldo-Wahing', 'Maintenance-Agus 7 HEP', 2, 2),
(7, 'Alfeche-Wilfredo-Aligno', 'Maintenance-Agus 6 HEP', 3, 4),
(8, 'Bas-Edgar-Nayre', 'Maintenance-Agus 6 HEP', 3, 4),
(9, 'Cabusas-Auxiliador-Ybarbia', 'Maintenance-Agus 6 HEP', 1, 4),
(10, 'Cardines-Alfredo-Jumawan', 'Maintenance-Agus 6 HEP', 1, 4),
(11, 'Encabo-Romeo-Alagar', 'Maintenance', 1, 4),
(12, 'Alfeche-Wilfredo-Aligno', 'Maintenance-Agus 6 HEP', 1, 5),
(13, 'Bas-Edgar-Nayre', 'Maintenance-Agus 6 HEP', 1, 5),
(14, 'Cabusas-Auxiliador-Ybarbia', 'Maintenance-Agus 6 HEP', 1, 5),
(15, 'Hinaloc-Reynaldo-Wahing', 'Maintenance-Agus 7 HEP', 1, 5),
(16, 'Hoyohoy-Cerillo, Sr.-Abellana', 'Maintenance-Agus 7 HEP', 1, 5),
(17, 'Jabay-Manuel-Baguio', 'Maintenance-Agus 7 HEP', 1, 5),
(18, 'Hiceta-Henry-Badelles', 'Office of the Plant Manager', 1, 6),
(19, 'Hinaloc-Reynaldo-Wahing', 'Maintenance-Agus 7 HEP', 1, 6),
(20, 'Hoyohoy-Cerillo, Sr.-Abellana', 'Maintenance-Agus 7 HEP', 1, 6),
(21, 'Jabay-Manuel-Baguio', 'Maintenance-Agus 7 HEP', 2, 6),
(22, 'Mabala-Antonio-Berdon', 'Maintenance-Agus 7 HEP', 1, 6),
(23, 'Encabo-Romeo-Alagar', 'Maintenance', 1, 7),
(24, 'Jabay-Manuel-Baguio', 'Maintenance-Agus 7 HEP', 1, 7),
(25, 'Mabala-Antonio-Berdon', 'Maintenance-Agus 7 HEP', 1, 7),
(26, 'Obatay-Tomas-Baga-an', 'Maintenance-Agus 6 HEP', 1, 7),
(27, 'Perez-Lorna-Lomarda', 'Maintenance-Agus 6 HEP', 1, 7),
(28, 'Alfeche-Wilfredo-Aligno', 'Maintenance-Agus 6 HEP', 2, 8),
(29, 'Bas-Edgar-Nayre', 'Maintenance-Agus 6 HEP', 1, 8),
(30, 'Cabusas-Auxiliador-Ybarbia', 'Maintenance-Agus 6 HEP', 1, 8),
(31, 'Cardines-Alfredo-Jumawan', 'Maintenance-Agus 6 HEP', 2, 8),
(34, 'Encabo-Romeo-Alagar', 'Maintenance', 1, 9),
(35, 'Hiceta-Henry-Badelles', 'Office of the Plant Manager', 1, 9),
(36, 'Hinaloc-Reynaldo-Wahing', 'Maintenance-Agus 7 HEP', 1, 9),
(37, 'Hoyohoy-Cerillo, Sr.-Abellana', 'Maintenance-Agus 7 HEP', 1, 9),
(38, 'Jabay-Manuel-Baguio', 'Maintenance-Agus 7 HEP', 1, 9);

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
(0, '2000-04-01', '', '1', 0),
(3, '2017-04-24', '0', '1', 5),
(4, '2017-04-24', '0', '1', 5),
(5, '2017-04-24', '0', '1', 3),
(6, '2017-04-24', '0', '1', 2),
(7, '2017-04-24', '0', '1', 7),
(8, '2017-04-25', '0', '1', 8),
(9, '0000-00-00', '0', '3', 0);

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
(11, 'Chemical Glove', 20, 0, 'pcs', 5, '2017-08-31', '', 3, 10),
(12, 'Chemical Suit (Disposable)', 20, 0, 'pcs', 5, '2017-08-31', '', 3, 21),
(13, 'Dust Mask (N95)', 30, 0, 'pcs', 10, '2017-09-30', '', 3, 13),
(14, 'Ear Plug', 40, 0, 'pcs', 15, '2017-09-30', '', 3, 15),
(15, 'Face Shield', 50, 0, 'pcs', 20, '2017-10-31', '', 3, 4),
(18, 'SCBA', 30, 0, 'set', 10, '2018-04-24', '', 4, 27),
(19, 'Welder Hand Glove', 20, 0, 'pcs', 5, '2018-04-24', '', 4, 11),
(20, 'Welding Mask', 30, 0, 'pcs', 10, '2018-04-24', '', 4, 12),
(21, 'Working Clothes', 35, 0, 'pcs', 10, '2018-04-24', '', 4, 20),
(23, 'Rain Suit', 15, 0, 'set', 5, '2018-04-24', '', 4, 16),
(29, 'Chemical Glove', 21, 0, 'pcs', 5, '2018-04-24', '', 5, 10),
(30, 'Chemical Suit (Disposable)', 31, 0, 'pcs', 5, '2018-04-24', '', 5, 21),
(31, 'Dust Mask (N95)', 23, 0, 'pcs', 10, '2018-04-24', '', 5, 13),
(32, 'Chemical Glove', 10, 0, 'pcs', 5, '2018-04-24', '', 6, 10),
(33, 'Chemical Suit (Disposable)', 10, 0, 'pcs', 5, '2018-04-24', '', 6, 21),
(34, 'High Voltage Glove', 30, 0, 'pcs', 10, '2018-04-24', '', 7, 9),
(35, 'Protective Eyewear', 20, 0, 'pcs', 5, '2018-04-24', '', 7, 3),
(36, 'Rain Suit', 40, 0, 'set', 10, '2018-04-24', '', 7, 16),
(37, 'Reflectorized Vest', 25, 0, 'pcs', 5, '2018-04-24', '', 7, 18),
(38, 'Respirator (Cartridge)', 50, 0, 'pcs', 10, '2018-04-24', '', 7, 7),
(39, 'Respirator (Full Face)', 30, 0, 'pcs', 15, '2018-04-25', '', 7, 6),
(40, 'Rubber Boots', 15, 0, 'pcs', 5, '2017-12-31', '', 7, 17),
(41, 'Fire Escape Mask', 30, 0, 'pcs', 10, '2018-04-25', '', 8, 26),
(42, 'First Aid Kit (Red)', 50, 0, 'set', 10, '2019-04-25', '', 8, 24),
(43, 'First Aid Kit (White)', 10, 0, 'set', 5, '2018-04-25', '', 8, 23),
(44, 'Gas Filter', 20, 0, 'pcs', 10, '2018-04-25', '', 8, 22),
(45, 'Gas Mask (Half Face)', 15, 0, 'pcs', 5, '2017-12-25', '', 8, 25),
(46, 'Hand Glove (Knitted)', 25, 0, 'pairs', 10, '2018-04-25', '', 8, 8),
(47, 'Hard Hat (Blue)', 30, 0, 'pcs', 10, '2018-04-25', '', 8, 1),
(48, 'Hard Hat (Yellow)', 20, 0, 'pcs', 10, '2018-04-25', '', 8, 2);

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
  MODIFY `EI_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
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
  MODIFY `irid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inventory_report_details`
--
ALTER TABLE `inventory_report_details`
  MODIFY `irdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `issuance`
--
ALTER TABLE `issuance`
  MODIFY `isno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `item_issued`
--
ALTER TABLE `item_issued`
  MODIFY `iino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `P_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `personnel_issued`
--
ALTER TABLE `personnel_issued`
  MODIFY `pino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `updated_transaction`
--
ALTER TABLE `updated_transaction`
  MODIFY `Tr_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `updated_transaction_details`
--
ALTER TABLE `updated_transaction_details`
  MODIFY `Tr_D_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
