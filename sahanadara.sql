-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 10:41 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahanadara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'y',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'Sanduni Rashmika', '297, KIRILLAWALA, WEBODA', 'sanduni@gmail.com', 'y', '');

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `msgId` int(11) NOT NULL,
  `msg` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `assignedSafe` tinyint(1) NOT NULL DEFAULT 0,
  `onlyOfficers` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`msgId`, `msg`, `timestamp`, `assignedSafe`, `onlyOfficers`) VALUES
(1, 'asdfsdf asdfsdfsf', '2022-01-06 20:31:52', 0, 0),
(2, 'er asdfad 222 aeff', '2022-01-06 20:34:43', 0, 0),
(3, 'er 33333 222 aeff', '2022-01-06 20:34:43', 1, 1),
(4, 'er a444444 222 aeff', '2022-01-06 20:34:43', 1, 1),
(5, 'er5555 aeff', '2022-01-06 20:34:43', 1, 0),
(6, 'er56666666666666666 aeff', '2022-01-06 20:34:43', 1, 0),
(7, 'er77777777777777aeff', '2022-01-06 20:34:43', 0, 1),
(8, 'er8888888888aeff', '2022-01-06 20:34:44', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `alertdisdivgn`
--

CREATE TABLE `alertdisdivgn` (
  `alertId` int(11) NOT NULL,
  `dsId` int(11) NOT NULL,
  `dvId` int(11) NOT NULL,
  `gndvId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alertdisdivgn`
--

INSERT INTO `alertdisdivgn` (`alertId`, `dsId`, `dvId`, `gndvId`) VALUES
(1, 3, 10, 5),
(1, 3, 10, 6),
(1, 3, 10, 7),
(2, 3, 10, 5),
(2, 3, 10, 6),
(3, 3, 10, 5),
(3, 3, 10, 7),
(4, 3, 10, 6),
(5, 3, 10, 5),
(6, 3, 10, 5),
(8, 3, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `deathcompensation`
--

CREATE TABLE `deathcompensation` (
  `deathId` int(11) NOT NULL,
  `gndvId` int(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `disaster` varchar(50) DEFAULT NULL,
  `disasterdate` date DEFAULT NULL,
  `deathdate` date DEFAULT NULL,
  `dname` varchar(50) DEFAULT NULL,
  `dnic` varchar(50) DEFAULT NULL,
  `daddress` varchar(50) DEFAULT NULL,
  `doccupation` varchar(50) DEFAULT NULL,
  `aname` varchar(50) DEFAULT NULL,
  `anic` varchar(50) DEFAULT NULL,
  `arelationship` varchar(50) DEFAULT NULL,
  `dvapproved` varchar(1) DEFAULT 'p',
  `dvremarks` varchar(50) DEFAULT NULL,
  `disapproved` varchar(1) DEFAULT 'p',
  `disremarks` varchar(50) DEFAULT NULL,
  `dmcapproved` varchar(1) NOT NULL DEFAULT 'p',
  `dmcremarks` varchar(50) DEFAULT '',
  `atelno` int(10) DEFAULT NULL,
  `collected` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deathcompensation`
--

INSERT INTO `deathcompensation` (`deathId`, `gndvId`, `timestamp`, `disaster`, `disasterdate`, `deathdate`, `dname`, `dnic`, `daddress`, `doccupation`, `aname`, `anic`, `arelationship`, `dvapproved`, `dvremarks`, `disapproved`, `disremarks`, `dmcapproved`, `dmcremarks`, `atelno`, `collected`) VALUES
(8, 5, '2022-03-21 23:43:50', 'rterty', '2022-03-16', '2022-03-02', 'wert', '245245', 'No. 252D,\nAnanda Maithree Rd,\nBellapitiya', 'wertwert', 'wertewrt', '523452345', 'Husband', 'p', NULL, 'a', 'asas', 'a', 'asdfdf sssssss', 2147483647, 1),
(11, 5, '2022-03-22 16:58:58', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 'a', 'asdfdf sssssss', 'p', NULL, 'p', '', 0, 0),
(12, 5, '2022-03-19 08:06:55', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 'p', NULL, 'p', NULL, 'p', '', 0, 0),
(13, 5, '2022-03-19 08:25:24', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 'p', NULL, 'p', NULL, 'p', '', 0, 0),
(14, 5, '2022-03-19 08:33:49', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 'p', NULL, 'p', NULL, 'p', '', 0, 0),
(15, 5, '2022-03-19 08:36:59', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', 'p', NULL, 'p', NULL, 'p', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deathheir`
--

CREATE TABLE `deathheir` (
  `heirid` int(11) NOT NULL,
  `deathid` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  `accno` int(20) DEFAULT NULL,
  `nic` varchar(20) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deathheir`
--

INSERT INTO `deathheir` (`heirid`, `deathid`, `name`, `bank`, `branch`, `accno`, `nic`, `relationship`) VALUES
(3, 8, 'Asela Devinda Pathir', 'rth', 'ertherth', 2147483647, '2345', 'rewert'),
(4, 8, 'University of Colomb', 'wertwert', 'wertwert', 3452345, '23452345', 'wertwert');

-- --------------------------------------------------------

--
-- Table structure for table `disaster`
--

CREATE TABLE `disaster` (
  `disId` int(5) NOT NULL,
  `dis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disaster`
--

INSERT INTO `disaster` (`disId`, `dis`) VALUES
(1, 'Flood'),
(2, 'Landslide'),
(3, 'Lightening');

-- --------------------------------------------------------

--
-- Table structure for table `dismgtofficer`
--

CREATE TABLE `dismgtofficer` (
  `disMgtOfficerID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'y',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dismgtofficer`
--

INSERT INTO `dismgtofficer` (`disMgtOfficerID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'Yohombu Abeysinghe', 'MAHENDRA, WELIKALA, POKUNUWITA', 'yohombu@gmail.com', 'y', ''),
(2, 'test 4 test', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu99@gmail.com', 'y', '0719867823');

-- --------------------------------------------------------

--
-- Table structure for table `distributeitem`
--

CREATE TABLE `distributeitem` (
  `recordId` int(3) NOT NULL,
  `safeHouseId` int(5) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `approvalStatus` char(1) DEFAULT 'p'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributeitem`
--

INSERT INTO `distributeitem` (`recordId`, `safeHouseId`, `createdDate`, `approvalStatus`) VALUES
(1, 1, '2022-03-23 22:46:59', 'p'),
(2, 1, '2022-03-23 22:46:59', 'p'),
(3, 1, '2022-03-23 22:55:58', 'p'),
(4, 1, '2022-03-23 22:56:20', 'p'),
(5, 1, '2022-03-23 22:56:59', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `distributeitemrecord`
--

CREATE TABLE `distributeitemrecord` (
  `recordId` int(3) NOT NULL,
  `itemRecord` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributeitemrecord`
--

INSERT INTO `distributeitemrecord` (`recordId`, `itemRecord`) VALUES
(2, 24),
(2, 25),
(3, 26),
(4, 28),
(5, 29),
(5, 30);

-- --------------------------------------------------------

--
-- Table structure for table `distributeservice`
--

CREATE TABLE `distributeservice` (
  `recordId` int(3) NOT NULL,
  `inventoryId` int(3) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `approvalStatus` char(1) DEFAULT 'p',
  `serviceRequestId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributeservice`
--

INSERT INTO `distributeservice` (`recordId`, `inventoryId`, `createdDate`, `approvalStatus`, `serviceRequestId`) VALUES
(1, 1, '2022-03-23 21:11:19', 'p', 2);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dsId` int(2) NOT NULL,
  `dsName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dsId`, `dsName`) VALUES
(15, 'Ampara'),
(18, 'Anuradhapura'),
(19, 'Badulla'),
(14, 'Batticaloa'),
(1, 'Colombo'),
(7, 'Galle'),
(2, 'Gampaha'),
(22, 'Hambanthota'),
(23, 'Jaffna'),
(3, 'Kalutara'),
(4, 'Kandy'),
(9, 'Kegalle'),
(13, 'Kilinochchi'),
(16, 'Kurunegala'),
(10, 'Mannar'),
(5, 'Matale'),
(8, 'Matara'),
(20, 'Monaragala'),
(12, 'Mulativu'),
(6, 'Nuwara-Eliya'),
(25, 'Polonnaruwa'),
(17, 'Puttalam'),
(21, 'Ratnapura'),
(24, 'Trincomalee'),
(11, 'Vavuniya');

-- --------------------------------------------------------

--
-- Table structure for table `districtofficecontact`
--

CREATE TABLE `districtofficecontact` (
  `districtofficeTelno` char(10) NOT NULL,
  `districtSOfficeID` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `districtsecretariat`
--

CREATE TABLE `districtsecretariat` (
  `districtSecretariatID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'y',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districtsecretariat`
--

INSERT INTO `districtsecretariat` (`districtSecretariatID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'District Officer', 'District Office,Kalutara', 'district@gmail.com', 'y', ''),
(4, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasind2u2@gmail.com', 'y', '0719867863'),
(5, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu6@gmail.com', 'y', '0719867863');

-- --------------------------------------------------------

--
-- Table structure for table `districtsoffice`
--

CREATE TABLE `districtsoffice` (
  `districtSOfficeID` int(3) NOT NULL,
  `districtSOfficeName` varchar(100) NOT NULL,
  `districtSOfficeAddress` varchar(50) NOT NULL,
  `dsId` int(2) DEFAULT NULL,
  `districtSecretariat` int(6) DEFAULT NULL,
  `dmc` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districtsoffice`
--

INSERT INTO `districtsoffice` (`districtSOfficeID`, `districtSOfficeName`, `districtSOfficeAddress`, `dsId`, `districtSecretariat`, `dmc`) VALUES
(3, 'District Office - Kalutara', 'Good Shed Rd, Kalutara', 3, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `dvId` int(3) NOT NULL,
  `dvName` varchar(40) NOT NULL,
  `dsId` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`dvId`, `dvName`, `dsId`) VALUES
(1, 'Panadura', 3),
(2, 'Bandaragama', 3),
(3, 'Horana', 3),
(4, 'Ingiriya', 3),
(5, 'Bulathsinhala', 3),
(6, 'Madurawala', 3),
(7, 'Millaniya', 3),
(8, 'Kalutara', 3),
(9, 'Beruwala', 3),
(10, 'Dodangoda', 3),
(11, 'Mathugama', 3),
(12, 'Agalawatta', 3),
(13, 'Palindanuwara', 3),
(14, 'Walallavita', 3);

-- --------------------------------------------------------

--
-- Table structure for table `divisionaloffice`
--

CREATE TABLE `divisionaloffice` (
  `divisionalOfficeId` int(3) NOT NULL,
  `divisionalSofficeName` varchar(100) NOT NULL,
  `divisionalSofficeAddress` varchar(50) NOT NULL,
  `dvId` int(3) DEFAULT NULL,
  `divisionalSecretariatID` int(6) DEFAULT NULL,
  `disasterManager` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisionaloffice`
--

INSERT INTO `divisionaloffice` (`divisionalOfficeId`, `divisionalSofficeName`, `divisionalSofficeAddress`, `dvId`, `divisionalSecretariatID`, `disasterManager`) VALUES
(1, 'Divisional Secretariat Office Dodangoda', 'Kalutara-Matugama Rd, Thudugala 12020', 10, 9, 1),
(3, 'Divisional Office Agalawatta', 'Divisional Office, Agalawatta', 12, NULL, NULL),
(4, 'Divisional Office Bandaragama', 'Divisional Office, Bandaragama', 2, NULL, NULL),
(5, 'Divisional Office Beruwala', 'Divisional Office, Beruwala', 9, NULL, NULL),
(6, 'Divisional Office Bulathsinhala', 'Divisional Office, Bulathsinhala', 5, NULL, NULL),
(7, 'Divisional Office Horana', 'Divisional Office, Horana', 3, 7, NULL),
(8, 'Divisional Office Ingiriya', 'Divisional Office, Ingiriya', 4, NULL, 2),
(9, 'Divisional Office Kalutara', 'Divisional Office, Kalutara', 8, NULL, NULL),
(10, 'Divisional Office Madurawala', 'Divisional Office, Madurawala', 6, NULL, NULL),
(11, 'Divisional Office Mathugama', 'Divisional Office, Mathugama', 11, NULL, NULL),
(12, 'Divisional Office Millaniya', 'Divisional Office, Millaniya', 7, NULL, NULL),
(13, 'Divisional Office Palindanuwara', 'Divisional Office, Palindanuwara', 13, NULL, NULL),
(14, 'Divisional Office Panadura', 'Divisional Office, Panadura', 1, NULL, NULL),
(15, 'Divisional Office Walallavita', 'Divisional Office, Walallavita', 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisionalofficecontact`
--

CREATE TABLE `divisionalofficecontact` (
  `divisionalSofficeTelno` char(10) NOT NULL,
  `divisionalOfficeId` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `divisionalsecretariat`
--

CREATE TABLE `divisionalsecretariat` (
  `divisionalSecretariatID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'y',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisionalsecretariat`
--

INSERT INTO `divisionalsecretariat` (`divisionalSecretariatID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'Divisional Secratariat', 'Divisional Secratariat,Horana', 'division@gmail.com', 'y', ''),
(5, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu2@gmail.com', 'y', '0719867863'),
(6, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu3@gmail.com', 'y', '0719867863'),
(7, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu4@gmail.com', 'y', '0719867863'),
(8, 'test 2 test 2', 'Hene Gedara Hena, Ullala', 'htnawsseenpasindu@gmail.com', 'y', '0719867863'),
(9, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu7@gmail.com', 'y', '0719867865');

-- --------------------------------------------------------

--
-- Table structure for table `dmc`
--

CREATE TABLE `dmc` (
  `dmcID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'n',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dmc`
--

INSERT INTO `dmc` (`dmcID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'DMC', 'Vidya Mawatha, Colombo 00700', 'dmc@gmail.com', 'n', '');

-- --------------------------------------------------------

--
-- Table structure for table `donationreqnotice`
--

CREATE TABLE `donationreqnotice` (
  `recordId` int(4) NOT NULL,
  `safehouseId` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `numOfFamilies` int(2) NOT NULL DEFAULT 0,
  `numOfPeople` int(3) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `approvedDate` datetime DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `appovalStatus` char(1) NOT NULL DEFAULT 'n',
  `remark` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donationreqnotice`
--

INSERT INTO `donationreqnotice` (`recordId`, `safehouseId`, `title`, `numOfFamilies`, `numOfPeople`, `createdDate`, `approvedDate`, `note`, `appovalStatus`, `remark`) VALUES
(1, 1, '12', 12, 12, '2022-03-17 22:28:32', NULL, 'yggiu', 'd', NULL),
(2, 2, 'test', 20, 20, '2022-03-18 15:56:34', NULL, '5ef', 'd', NULL),
(4, 1, 'test 2', 12, 35, '2022-03-18 16:00:12', NULL, 'err', 'd', NULL),
(5, 1, 'test 2', 5, 25, '2022-03-19 21:20:41', NULL, 'tessgs sh', 'd', NULL),
(6, 3, 'Bombuwala North Safe House Need Your Donations', 4, 20, '2022-03-20 00:24:12', NULL, '', 'd', NULL),
(9, 1, 'Bolossagama Safe House Need Your Donations', 1, 5, '2022-03-22 14:14:11', NULL, '', 'd', NULL),
(10, 3, 'Bombuwala North Safe House Need Your Donations', 4, 20, '2022-03-22 17:50:00', NULL, '', 'd', NULL),
(11, 3, 'Bombuwala North Safe House Need Your Donations', 4, 20, '2022-03-22 17:51:04', NULL, '', 'd', NULL),
(12, 1, 'Bolossagama Safe House Need Your Donations', 1, 5, '2022-03-22 17:57:35', NULL, '', 'd', NULL),
(13, 1, 'test', 12, 30, '2022-03-22 19:01:16', NULL, '', 'd', NULL),
(14, 3, 'Bombuwala North Safe House Need Your Donations', 4, 20, '2022-03-22 19:35:38', NULL, '', 'n', NULL),
(15, 3, 'Bombuwala North Safe House Need Your Donations', 4, 20, '2022-03-22 19:47:35', NULL, '', 'n', NULL),
(16, 1, 'Bolossagama Safe House Need Your Donations', 5, 25, '2022-03-24 13:04:50', NULL, '', 'n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fundraising`
--

CREATE TABLE `fundraising` (
  `recordId` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `goal` decimal(9,2) NOT NULL,
  `isActive` char(1) DEFAULT 'y',
  `createdTime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fundraisingrecords`
--

CREATE TABLE `fundraisingrecords` (
  `recordId` int(5) NOT NULL,
  `fundraisingId` int(4) NOT NULL,
  `donorName` varchar(30) NOT NULL,
  `amount` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gndivision`
--

CREATE TABLE `gndivision` (
  `gndvId` int(5) NOT NULL,
  `gnDvName` varchar(20) NOT NULL,
  `officeAddress` varchar(50) DEFAULT NULL,
  `telno` int(11) DEFAULT NULL,
  `safeHouseID` int(5) DEFAULT NULL,
  `gramaNiladariID` int(6) DEFAULT NULL,
  `dvId` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gndivision`
--

INSERT INTO `gndivision` (`gndvId`, `gnDvName`, `officeAddress`, `telno`, `safeHouseID`, `gramaNiladariID`, `dvId`) VALUES
(1, ' 719  Koholana South', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, 2, NULL, 10),
(2, '719 A Adhikarigoda', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(3, '719 B Koholana North', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(4, '720 Ukwatta', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(5, '721 Bolossagama', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, 1, 1, 10),
(6, '722 Serupita West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(7, '722 A Serupita East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(8, '724 Gamagoda East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(9, '724 A Gamagoda West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(10, '726 A Remunagoda Sou', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(11, '726 A Remunagoda Nor', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(12, '728 Bombuwala South ', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(13, '728 A Bombuwala Nort', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(14, '728 B Bombuwala Nort', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(15, '728 C Bombuwala Nort', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, 3, NULL, 10),
(16, '728 D Bombuwala Sout', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(17, '799 Puhabugoda East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(18, '799 A Eladuwa', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(19, '799 B Galpottawila', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(20, '799 C Puhambugoda We', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(21, '800 Dodangoda West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(22, '800 A Dodangoda East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(23, '800 B Sapugahawatta', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(24, '800 C Dodangoda West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(25, '800 D Dodangoda West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(26, '800 E Dodangoda West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(27, '800 F Dodangoda West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(28, '800 G Dodangoda East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(29, '800 H Dodangoda East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(30, '800 I Dodangoda East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(31, '801 Nehinna', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(32, '801 A Wadugama', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(33, '807 Nebada', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(34, '807 A Upper Nebada', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(35, '807 B Lower Nebada', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(36, '807 C Nebada West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(37, '807 D Wellatha', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(38, '807 E Wattahena', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(39, '808 Thudugala West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(40, '808 A Thudugala East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(41, '809 Thebuwana East', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(42, '809 Thebuwana West', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(43, '810 Pelapitiyagoda', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(44, '810 A Pelapitiyagoda', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
(45, '618 Wagawatta', 'wagawaththa, Poruwadanda', NULL, NULL, NULL, 4),
(46, '618 A Poruwadanda Ea', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(47, '618 B Kekulaliya', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(48, '618 C Poruwadanda We', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(49, '619 Urugala East', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(50, '619 A Nambapana', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(51, '619 B Urugala West', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(52, '620 Ingiriya East', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(53, '620 A Ingiriya West', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(54, '620 B Rayigamwatta', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(55, '620 C Ingiriya North', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(56, '620 D Nimalagama', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(57, '620 E Aduragala', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(58, '620 F Dombagaskanda', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(59, '620 G Maha Ingiriya', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(60, '621 Maputugala', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(61, '621 A Rathmalgoda Ea', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(62, '621 B Rathmalgoda We', 'Divisional Secretariat,Ingiriya', NULL, NULL, 7, 4),
(63, '622 Pelpitigoda', 'Divisional Secretariat,Ingiriya', NULL, NULL, 6, 4),
(64, '622 Handapangoda Sou', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(65, '623 A Handapangoda E', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(66, '623 B Handapangoda W', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(67, '624 Batugampala', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(68, '624 A Kekuladola', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(69, '625 Arakawila', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(70, '625 A Menerigama', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(71, '626 Kadanapitiya', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(72, '626 A Kottiyawatta', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(73, '627 Kurana South', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(74, '627 A Kotigala', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(75, '627 B Kurana North', 'Divisional Secretariat,Ingiriya', NULL, NULL, NULL, 4),
(76, '632 Kandana North', 'Grama Niladhari Office,Kandana North - 632', NULL, NULL, NULL, 3),
(77, '633A Ilimba', 'Grama Niladhari Office,Ilimba - 632A', NULL, NULL, 4, 3),
(78, '632B Kandana South', 'Grama Niladhari Office,Kandana South - 632B', NULL, NULL, NULL, 3),
(79, '633 Werawatta', 'Grama Niladhari Office,Werawatta - 633', NULL, NULL, NULL, 3),
(80, '633A Kananvila', 'Grama Niladhari Office,Kananvila - 633A', NULL, NULL, NULL, 3),
(81, '633B Walpita', 'Grama Niladhari Office,Walpita - 633B', NULL, NULL, NULL, 3),
(82, '634 Mahayala East', 'Grama Niladhari Office,Mahayala East - 634', NULL, NULL, NULL, 3),
(83, '634A Mahayala West', 'Grama Niladhari Office,Mahayala West - 634A', NULL, NULL, NULL, 3),
(84, '635 Madurawala East', 'Grama Niladhari Office,Madurawala East - 635', NULL, NULL, NULL, 3),
(85, '635A Madurawala West', 'Grama Niladhari Office,Madurawala West - 635A', NULL, NULL, NULL, 3),
(86, '636 Kudayala', 'Grama Niladhari Office,Kudayala - 636', NULL, NULL, NULL, 3),
(87, '637 Anguruwathota', 'Grama Niladhari Office,Anguruwathota - 637', NULL, NULL, NULL, 3),
(88, '648 Keselhenawa', 'Grama Niladhari Office,Keselhenawa - 648', NULL, NULL, NULL, 3),
(89, '648A Kudella', 'Grama Niladhari Office,Kudella - 648A', NULL, NULL, NULL, 3),
(90, '648B Hallankanda', 'Grama Niladhari Office,Hallankanda - 648B', NULL, NULL, NULL, 3),
(91, '650 Remuna', 'Grama Niladhari Office,Remuna - 650', NULL, NULL, NULL, 3),
(92, '650A Bellapitiya Eas', 'Grama Niladhari Office,Bellapitiya East - 650A', NULL, NULL, 5, 3),
(93, '650B Bellapitiya Wes', 'Grama Niladhari Office,Bellapitiya West - 650B', NULL, NULL, NULL, 3),
(94, '650C Peramunagama', 'Grama Niladhari Office,Peramunagama - 650C', NULL, NULL, NULL, 3),
(95, '650D Weliketella', 'Grama Niladhari Office,Weliketella - 650D', NULL, NULL, NULL, 3),
(96, '650E Elawella', 'Grama Niladhari Office,Elawella - 650E', NULL, NULL, NULL, 3),
(97, '650F Mahena South', 'Grama Niladhari Office,Mahena South - 650F', NULL, NULL, NULL, 3),
(98, '811 Karannagoda', 'Grama Niladhari Office,Karannagoda - 811', NULL, NULL, NULL, 3),
(99, '811A Pahala Karannag', 'Grama Niladhari Office,Pahala Karannagoda - 811A', NULL, NULL, NULL, 3),
(100, '811B Ihala Karannago', 'Grama Niladhari Office,Ihala Karannagoda - 811B', NULL, NULL, NULL, 3),
(101, '815 Nahalla', 'Grama Niladhari Office,Nahalla - 815', NULL, NULL, NULL, 3),
(102, '815A Katuhena', 'Grama Niladhari Office,Katuhena - 815A', NULL, NULL, NULL, 3),
(103, '815B Pahalagoda', 'Grama Niladhari Office,Pahalagoda - 815B', NULL, NULL, NULL, 3),
(104, '815C Ihalagoda', 'Grama Niladhari Office,Ihalagoda - 815C', NULL, NULL, NULL, 3),
(105, '816 Warakagoda East', 'Grama Niladhari Office,Warakagoda East - 816', NULL, NULL, NULL, 3),
(106, '816A Warakagoda West', 'Grama Niladhari Office,Warakagoda West - 816A', NULL, NULL, NULL, 3),
(107, '816B Warakagoda Nort', 'Grama Niladhari Office,Warakagoda North - 816B', NULL, NULL, NULL, 3),
(108, '816C Warakagoda Sout', 'Grama Niladhari Office,Warakagoda South - 816C', NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gnfinalincident`
--

CREATE TABLE `gnfinalincident` (
  `finalIncidentId` int(5) NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `disaster` int(11) NOT NULL,
  `location` varchar(60) NOT NULL,
  `cause` varchar(100) NOT NULL,
  `fam` int(11) DEFAULT 0,
  `people` int(11) DEFAULT 0,
  `death` int(11) DEFAULT 0,
  `injured` int(11) DEFAULT 0,
  `evafam` int(11) DEFAULT 0,
  `hospitalized` int(11) DEFAULT 0,
  `evapeople` int(11) DEFAULT 0,
  `hfull` int(11) DEFAULT 0,
  `hpartial` int(11) DEFAULT 0,
  `enterprise` int(11) DEFAULT 0,
  `infras` int(11) DEFAULT 0,
  `numofsafe` int(11) DEFAULT 0,
  `sfpeople` int(11) DEFAULT 0,
  `sfnumber` int(11) DEFAULT 0,
  `dryrationsRs` int(11) DEFAULT 0,
  `cookingRs` int(11) DEFAULT 0,
  `emergencyRs` int(11) DEFAULT 0,
  `remarks` varchar(50) DEFAULT NULL,
  `gndvid` int(6) NOT NULL,
  `disoffapproved` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `incidentId` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gnmsg`
--

CREATE TABLE `gnmsg` (
  `msgId` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` varchar(300) NOT NULL,
  `gndvId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gnmsg`
--

INSERT INTO `gnmsg` (`msgId`, `timestamp`, `message`, `gndvId`) VALUES
(1, '2021-12-27 21:10:34', 'asdasasdasd', 5),
(2, '2021-12-27 21:25:30', '22222', 5),
(3, '2022-01-06 19:13:42', 'asasas', 5),
(4, '2022-01-06 22:12:30', 'fgfg', 5),
(5, '2022-01-06 22:57:52', 'sdfsdf ssdaf', 5),
(6, '2022-01-06 23:01:36', 'dfdff affdf', 5),
(7, '2022-01-06 23:08:08', 'aaaaaaaaaaaaaaaaaaaa', 5),
(8, '2022-01-06 23:08:27', 'ffffff', 5),
(9, '2022-01-06 23:08:46', 'ggg', 5),
(10, '2022-01-06 23:09:44', 'sdsd', 5),
(11, '2022-01-06 23:10:01', 'hhh', 5),
(12, '2022-01-09 15:46:40', 'sddfsgdfsgfg', 5),
(13, '2022-01-09 15:46:49', 'sdfgsdfgsdfg dfgsdfgsdfg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `gramaniladari`
--

CREATE TABLE `gramaniladari` (
  `gramaNiladariID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'y',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gramaniladari`
--

INSERT INTO `gramaniladari` (`gramaNiladariID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'Asela Pathirage', 'NO 252/D,, ANANDA MAITHREE MAWATHA,, BELLAPITIYA, HORANA.', 'asela@gmail.com', 'y', '0767877818'),
(2, 'gn gn', 'Hene Gedara Hena, Ullala', 'htnaweegujgnpasindu@gmail.com', 'y', '0719867863'),
(3, 'test test', 'Hene Gedara Hena, Ullala', 'htnaweenpsasindu@gmail.com', 'y', '0719867863'),
(4, 'test test', 'Hene Gedara Hena, Ullala', 'htnaweenpsfasindu@gmail.com', 'y', '0719867863'),
(5, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu@gmail.com', 'y', '0719867863'),
(6, 'test  Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu6@gmail.com', 'y', '0719867863'),
(7, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu7@gmail.com', 'y', '0719867863');

-- --------------------------------------------------------

--
-- Table structure for table `incident`
--

CREATE TABLE `incident` (
  `incidentId` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `dvId` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incident`
--

INSERT INTO `incident` (`incidentId`, `title`, `description`, `dvId`, `isActive`) VALUES
(1, 'sample', 'des', 10, 1),
(2, 'ttttt2222', 'asdfadfasd sdfsdf', 10, 0),
(3, 'rr3434', 'rewrtert wertwert', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `incidentgn`
--

CREATE TABLE `incidentgn` (
  `incidentId` int(5) NOT NULL,
  `gndvId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incidentgn`
--

INSERT INTO `incidentgn` (`incidentId`, `gndvId`) VALUES
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 5),
(2, 6),
(3, 3),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `initialincident`
--

CREATE TABLE `initialincident` (
  `initialId` int(10) NOT NULL,
  `disaster` int(5) NOT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `cause` varchar(50) DEFAULT NULL,
  `fam` int(11) DEFAULT 0,
  `people` int(11) DEFAULT 0,
  `death` int(11) DEFAULT 0,
  `injured` int(11) DEFAULT 0,
  `missing` int(11) DEFAULT 0,
  `hfull` int(11) DEFAULT 0,
  `hpartial` int(11) DEFAULT 0,
  `enterprise` int(11) DEFAULT 0,
  `infra` int(11) DEFAULT 0,
  `safefam` int(11) DEFAULT 0,
  `safepeople` int(11) DEFAULT 0,
  `safenumber` int(11) DEFAULT 0,
  `remarks` varchar(100) DEFAULT NULL,
  `gndvId` int(5) NOT NULL,
  `disoffapproved` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `incidentId` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `initialincident`
--

INSERT INTO `initialincident` (`initialId`, `disaster`, `date`, `location`, `cause`, `fam`, `people`, `death`, `injured`, `missing`, `hfull`, `hpartial`, `enterprise`, `infra`, `safefam`, `safepeople`, `safenumber`, `remarks`, `gndvId`, `disoffapproved`, `timestamp`, `incidentId`) VALUES
(1, 1, '2022-01-23', 'dfgdfgdfg', 'asdasdasd', 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 5, 0, '2022-01-13 08:11:40', NULL),
(2, 1, '2022-01-13', 'Sri Lanka', '55tyhyhyh', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 5, 0, '2022-01-13 10:14:44', NULL),
(3, 1, '2022-01-13', 'asdasdasdasd', 'sample', 7, 25, 5, 7, 0, 0, 0, 0, 0, 4, 6, 1, '', 5, 0, '2022-01-13 10:15:51', NULL),
(4, 1, '2022-01-29', 'Sri Lanka', 'sadfsadf', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 5, 0, '2022-01-13 10:19:52', NULL),
(5, 0, '2022-01-13', '', 'sadfsadf', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 5, 0, '2022-01-13 12:58:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryId` int(3) NOT NULL,
  `inventoryAddress` varchar(60) NOT NULL,
  `dvId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryId`, `inventoryAddress`, `dvId`) VALUES
(1, 'Divisional Office, Dodangoda', 10),
(2, 'Divisional Office, Horane', 3),
(3, 'Divisional Office, Palindanuwara', 13),
(4, 'Divisional Office, Walallavita', 14);

-- --------------------------------------------------------

--
-- Table structure for table `inventoryitem`
--

CREATE TABLE `inventoryitem` (
  `recId` int(3) NOT NULL,
  `itemId` int(2) DEFAULT NULL,
  `inventoryId` int(3) DEFAULT NULL,
  `quantity` decimal(6,2) NOT NULL DEFAULT 0.00,
  `transactionDate` datetime NOT NULL DEFAULT current_timestamp(),
  `remarks` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventoryitem`
--

INSERT INTO `inventoryitem` (`recId`, `itemId`, `inventoryId`, `quantity`, `transactionDate`, `remarks`) VALUES
(1, 6, 1, '50.00', '2022-03-21 16:48:05', ''),
(2, 6, 1, '-10.00', '2022-03-22 16:48:12', ''),
(3, 6, 1, '-10.00', '2022-03-22 17:08:48', ''),
(4, 6, 1, '-5.00', '2022-03-22 17:16:37', ''),
(5, 4, 1, '50.00', '2022-03-21 17:17:12', ''),
(6, 27, 1, '100.00', '2022-03-21 17:17:18', ''),
(7, 7, 1, '2.00', '2022-03-21 17:17:24', ''),
(8, 5, 1, '200.00', '2022-03-21 17:17:31', ''),
(9, 1, 1, '1.00', '2022-03-21 17:17:39', ''),
(10, 2, 1, '3.00', '2022-03-21 17:27:36', ''),
(11, 2, 1, '-1.00', '2022-03-23 01:28:20', ''),
(12, 27, 1, '-50.00', '2022-03-23 12:46:57', ''),
(13, 1, 1, '-1.00', '2022-03-23 21:11:19', ''),
(14, 7, 1, '-1.00', '2022-03-23 21:54:58', ''),
(15, 6, 1, '-10.00', '2022-03-23 21:54:58', ''),
(16, 5, 1, '-25.00', '2022-03-23 21:56:12', ''),
(17, 9, 1, '50.00', '2022-03-22 22:01:36', ''),
(18, 9, 1, '-2.00', '2022-03-23 22:01:52', ''),
(19, 9, 1, '-2.00', '2022-03-23 22:05:09', ''),
(20, 9, 1, '-2.00', '2022-03-23 22:05:32', ''),
(21, 9, 1, '-2.00', '2022-03-23 22:05:48', ''),
(22, 3, 1, '10.00', '2022-03-22 22:46:35', ''),
(23, 1, 1, '2.00', '2022-03-22 22:46:51', ''),
(24, 1, 1, '-1.00', '2022-03-23 22:46:59', ''),
(25, 3, 1, '-2.00', '2022-03-23 22:46:59', ''),
(26, 1, 1, '-1.00', '2022-03-23 22:55:58', ''),
(27, 1, 1, '2.00', '2022-03-22 22:56:10', ''),
(28, 1, 1, '-1.00', '2022-03-23 22:56:20', ''),
(29, 1, 1, '-1.00', '2022-03-23 22:56:59', ''),
(30, 3, 1, '-5.00', '2022-03-23 22:56:59', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventorymgtofficer`
--

CREATE TABLE `inventorymgtofficer` (
  `inventoryMgtOfficerID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'y',
  `assignedDate` datetime NOT NULL,
  `inventoryID` int(3) NOT NULL,
  `empTele` char(10) NOT NULL,
  `resignedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventorymgtofficer`
--

INSERT INTO `inventorymgtofficer` (`inventoryMgtOfficerID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `assignedDate`, `inventoryID`, `empTele`, `resignedDate`) VALUES
(1, 'Naween Pasindu', 'Hene Gedara Hena,Ullala,Kamburupitiya', 'htnaweenpasindu@gmail.com', 'y', '2021-10-21 20:47:22', 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(2) NOT NULL,
  `itemName` varchar(40) NOT NULL,
  `unitType` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `unitType`) VALUES
(1, 'Generator', 4),
(2, 'Boat', 4),
(3, 'Tent', 4),
(4, 'Gasoline ', 3),
(5, 'Rice', 1),
(6, 'Lentils', 1),
(7, '500 l Water Tank', 4),
(8, 'Mini generator', 4),
(9, 'Soya', 1),
(10, 'Water Bowser', 4),
(23, 'Wheel Chair', 4),
(26, 'Petrol', 3),
(27, 'Diesel', 3),
(28, 'Hand Hanitizer', 4),
(29, 'Face Mask', 4),
(31, 'Safety Jacket', 4);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `empId` int(6) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `empPassword` varchar(50) DEFAULT NULL,
  `keyAuth` char(10) NOT NULL,
  `roleId` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`empId`, `nid`, `empPassword`, `keyAuth`, `roleId`) VALUES
(1, '542707836f5f6f33c09557eedaabb007', 'ef6402771dda8b4d756ff0a5d52cd2a8', 'ASpAcHWhgF', 1),
(1, '732117f1eb812a658ebc83a24ef628c6', '5d93ceb70e2bf5daa84ec3d0cd2c731a', 'qErJ9ERAbE', 2),
(1, '2819743b0c0935037d2bc9cf1c68f217', 'd32934b31349d77e70957e057b1bcd28', 'fjktb7i18h', 3),
(1, 'f1db2109cd14c5285f2b125e441e60fb', 'd32934b31349d77e70957e057b1bcd28', '5qh4pf1ick', 4),
(1, '627e959497b80e7fa95d10194f813ba5', '47982c18f4861b2edf96bfe9f73f12bf', 'o48gatdqbk', 5),
(1, '29ad81bf880b526979eeee461fc16580', 'd32934b31349d77e70957e057b1bcd28', 'ni1saocfq5', 6),
(1, '735fd4e6cae4fa6000d0372d7d6a47c1', 'd32934b31349d77e70957e057b1bcd28', 'c6emf4qdj5', 7),
(1, 'be9793b20f2e3bfb32dd79460a9d83d6', 'd32934b31349d77e70957e057b1bcd28', 'dhp3secg8a', 8),
(2, '6d6effd7dc0d98612c6a55f9e7130082', '77882f4f713fe0e6e3eb33cc62508a72', '8JdvmR4afR', 1),
(2, '1ad700ce5f87f8dc4506784d53a3f685', '7233ed1e298b367e56ac39ff22a3ebdc', 'vrEEbWJAfq', 3),
(2, 'ab30489bb5771436ff53be2915a98451', '5fe6b431c86370dd7843ac95c833bbb0', '8hbq62ctd7', 4),
(2, '4311d281769e23a6893578afa6ef91ea', 'e436e72a66a933ced03f390f9f73bdb3', 'AlWEH3ESf2', 6),
(3, '09ac79a619ab6fe93ecd5990c4c0e857', 'fa1b6caccf1d40a65be440cd438bb9ad', 'SE0FSfn1i4', 1),
(4, '09ac79a619ab6fe93ecd5990c4c0e857', '063b261f68d8cdde3b3f3d60e0b56cb8', 'sJo4anmaAg', 1),
(4, 'd41d8cd98f00b204e9800998ecf8427e', 'a6af2c057668c3a37a35811eb085ab67', 'nA2dA5SSlS', 3),
(5, '731a528c0ac7ccfe928f7c50d7816205', 'a609ad7d5b8837f412e2425866b3a631', 'Gdklg8fncq', 1),
(5, '20aee3a5f4643755a79ee5f6a73050ac', '832fe1cc447051ec0137d846a5c3dd23', 'hRSEqhgj7G', 3),
(5, '731a528c0ac7ccfe928f7c50d7816205', '53e5506045a86e2f826c026d63b252c6', '5dEdSco13b', 4),
(6, 'd41d8cd98f00b204e9800998ecf8427e', 'be6662caf143ef8fe836673edad54dae', 'Gci1GHQqhR', 1),
(6, '731a528c0ac7ccfe928f7c50d7816205', '5a561fd5bfff44f94dfc955253e2a917', 'aEJcHWEvtH', 4),
(7, '731a528c0ac7ccfe928f7c50d7816205', 'c5a7026d54ad1ec0a6988b1be355533f', 'S40fWkEEEi', 1),
(7, '731a528c0ac7ccfe928f7c50d7816205', 'b848f2e08fc7a2c737009c90215bb8ea', 'tdH4E07LEf', 4),
(8, '731a528c0ac7ccfe928f7c50d7816205', 'f2dcd5d1f22c796a348685b6737845b6', 'bdjsgEEcAf', 4),
(9, '50a8c58ae8e27d7373190557d5b2bceb', 'd32934b31349d77e70957e057b1bcd28', 'RGhkSWEccE', 4);

-- --------------------------------------------------------

--
-- Table structure for table `noticeitem`
--

CREATE TABLE `noticeitem` (
  `noticeId` int(4) NOT NULL,
  `itemName` varchar(20) NOT NULL,
  `quantitity` decimal(6,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noticeitem`
--

INSERT INTO `noticeitem` (`noticeId`, `itemName`, `quantitity`) VALUES
(1, 'Lentils', '50.00'),
(1, 'Tent', '10.00'),
(4, 'Tent', '5.00'),
(6, 'Boat', '1.00'),
(9, 'Tent', '5.00'),
(10, 'Boat', '0.00'),
(11, 'Boat', '1.00'),
(12, 'Tent', '5.00'),
(13, 'Lentils', '20.00'),
(13, 'Rice', '50.00'),
(14, 'Boat', '1.00'),
(15, 'Boat', '0.00'),
(16, 'Tent', '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `propapp`
--

CREATE TABLE `propapp` (
  `propcomId` int(11) NOT NULL,
  `detype` varchar(50) DEFAULT NULL,
  `deev` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propapp`
--

INSERT INTO `propapp` (`propcomId`, `detype`, `deev`) VALUES
(1, 'werwer', 234234),
(2, '', 0),
(3, 'sdfsdf', 45),
(4, 'sadfadsf', 34),
(5, 'wer', 44),
(5, '234234', 34);

-- --------------------------------------------------------

--
-- Table structure for table `propcomprop`
--

CREATE TABLE `propcomprop` (
  `propcomId` int(11) NOT NULL,
  `dptype` varchar(20) DEFAULT NULL,
  `dpdes` varchar(50) DEFAULT NULL,
  `dpta` double DEFAULT NULL,
  `dpda` double DEFAULT NULL,
  `dpvod` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propcomprop`
--

INSERT INTO `propcomprop` (`propcomId`, `dptype`, `dpdes`, `dpta`, `dpda`, `dpvod`) VALUES
(1, 'Roof', '4545', 45, 45, NULL),
(1, 'Foundation', '45erert', 45, 5, NULL),
(1, 'Floor', '', 0, 0, NULL),
(2, 'Floor', '', 0, 0, NULL),
(3, 'Floor', 'asdfadf', 34343434, 232323, 23),
(3, 'Roof', '343', 0, 34, 0),
(4, 'Floor', 'asdf', 34, 345, 45),
(4, 'Floor', 'rtrt', 0, 45, 0),
(5, 'Floor', 'asdf', 23, 234, 23),
(5, 'Floor', 'afdfasdf', 234, 234, 34);

-- --------------------------------------------------------

--
-- Table structure for table `propertycompensation`
--

CREATE TABLE `propertycompensation` (
  `propcomId` int(11) NOT NULL,
  `gndvId` int(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `disaster` varchar(50) DEFAULT NULL,
  `aname` varchar(50) DEFAULT NULL,
  `anic` varchar(20) DEFAULT NULL,
  `aaddress` varchar(50) DEFAULT NULL,
  `atpnumber` int(20) DEFAULT NULL,
  `arelationship` varchar(50) DEFAULT NULL,
  `tla` double DEFAULT NULL,
  `htype` varchar(50) DEFAULT NULL,
  `totcomp` double DEFAULT NULL,
  `hname` varchar(50) DEFAULT NULL,
  `hbank` varchar(50) DEFAULT NULL,
  `hacc` varchar(50) DEFAULT NULL,
  `hbranch` varchar(50) DEFAULT NULL,
  `collected` tinyint(1) NOT NULL DEFAULT 0,
  `dvapproved` varchar(1) NOT NULL DEFAULT 'p',
  `dvremarks` varchar(50) DEFAULT NULL,
  `disapproved` varchar(1) NOT NULL DEFAULT 'p',
  `disremarks` varchar(50) DEFAULT NULL,
  `dmcapproved` varchar(1) NOT NULL DEFAULT 'p',
  `dmcremarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertycompensation`
--

INSERT INTO `propertycompensation` (`propcomId`, `gndvId`, `timestamp`, `disaster`, `aname`, `anic`, `aaddress`, `atpnumber`, `arelationship`, `tla`, `htype`, `totcomp`, `hname`, `hbank`, `hacc`, `hbranch`, `collected`, `dvapproved`, `dvremarks`, `disapproved`, `disremarks`, `dmcapproved`, `dmcremarks`) VALUES
(1, 5, '2022-03-22 20:46:13', '6', '1', '2', '33', 4, '5', 3, 'Storey', 20000, 'Asela Devinda Pathirage', 'wqer', '234234234', 'wer', 0, 'a', NULL, 'a', 'sdfasdfsdfsdf', 'p', ''),
(2, 5, '2022-03-23 06:12:43', '', 'dfgdfgdfg', '', '', 0, '', 0, 'Single building', 0, '', '', '', '', 0, 'a', 'asdfdf sssssss', 'a', 'asdfdf sssssss', 'p', NULL),
(3, 5, '2022-03-20 05:57:49', '2345245asdfadf', 'asdfsdf', '2435345', 'No. 252D,\nAnanda Maithree Rd,\nBellapitiya', 767877818, 'asdfadf', 4555, 'Single building', 147, 'Asela Devinda Pathirage', 'dfgdfg', '234234234', 'dfgdfg', 0, 'p', NULL, 'p', NULL, 'p', NULL),
(4, 5, '2022-03-22 20:47:00', '', 'aerf', 'asdf', '', 0, '', 0, 'Single building', 180, 'asdf', 'asdf', '234', 'sadf', 1, 'a', NULL, 'a', NULL, 'a', 'sadfsdf'),
(5, 5, '2022-03-20 06:18:03', '', '', '', '', 0, '', 0, 'Single building', 203, 'Asela Devinda Pathirage', 'dfg', '234234234', 'sdf', 0, 'p', NULL, 'p', NULL, 'p', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `propservice`
--

CREATE TABLE `propservice` (
  `propcomId` int(11) NOT NULL,
  `dstype` varchar(50) DEFAULT NULL,
  `dsev` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propservice`
--

INSERT INTO `propservice` (`propcomId`, `dstype`, `dsev`) VALUES
(1, 'werqwerqwer', 234),
(1, 'qwerwer', 234234),
(2, '', 0),
(3, 'sdfsdf', 45),
(4, 'asdfsadf', 56),
(5, 'wer', 23),
(5, 'sfsdf', 45);

-- --------------------------------------------------------

--
-- Table structure for table `relief`
--

CREATE TABLE `relief` (
  `reliefId` int(5) NOT NULL,
  `date` date NOT NULL,
  `description` int(11) DEFAULT NULL,
  `incidentId` int(5) DEFAULT NULL,
  `f1` int(11) DEFAULT 0,
  `f2` int(11) DEFAULT 0,
  `f3` int(11) DEFAULT 0,
  `f4` int(11) DEFAULT 0,
  `f5` int(11) DEFAULT 0,
  `cooked` int(11) DEFAULT 0,
  `emergency` int(11) DEFAULT 0,
  `fam` int(11) DEFAULT 0,
  `people` int(11) DEFAULT 0,
  `death` int(11) DEFAULT 0,
  `injured` int(11) DEFAULT 0,
  `missing` int(11) DEFAULT 0,
  `remarks` int(11) DEFAULT 0,
  `gndvId` int(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relief`
--

INSERT INTO `relief` (`reliefId`, `date`, `description`, `incidentId`, `f1`, `f2`, `f3`, `f4`, `f5`, `cooked`, `emergency`, `fam`, `people`, `death`, `injured`, `missing`, `remarks`, `gndvId`, `timestamp`) VALUES
(1, '2022-01-13', 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, '2022-01-13 13:18:24');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `reqId` int(3) NOT NULL,
  `requestDate` datetime NOT NULL DEFAULT current_timestamp(),
  `requestDuration` datetime NOT NULL,
  `requestDiscription` varchar(300) NOT NULL,
  `requestedBy` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requestsitem`
--

CREATE TABLE `requestsitem` (
  `reqId` int(3) NOT NULL,
  `acceptedBy` int(3) NOT NULL,
  `itemId` int(2) NOT NULL,
  `quantity` decimal(6,2) NOT NULL,
  `sendBackBefore` date DEFAULT '1111-11-11'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resetpass`
--

CREATE TABLE `resetpass` (
  `recordId` int(5) NOT NULL,
  `empId` int(6) NOT NULL,
  `roleId` int(2) NOT NULL,
  `createdTime` datetime NOT NULL,
  `valueIdentity` varchar(50) NOT NULL,
  `active` char(1) DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `residentId` int(10) NOT NULL,
  `residentName` varchar(45) NOT NULL,
  `residentTelNo` char(10) DEFAULT NULL,
  `residentAddress` varchar(50) DEFAULT NULL,
  `gndvId` int(5) DEFAULT NULL,
  `residentNIC` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `responsibleperson`
--

CREATE TABLE `responsibleperson` (
  `responsiblePersonID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'y',
  `safeHouseID` int(5) NOT NULL,
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsibleperson`
--

INSERT INTO `responsibleperson` (`responsiblePersonID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `safeHouseID`, `empTele`) VALUES
(1, 'Responsible Person', 'No 5,School Road,Bolossagama', 'responsible@gmail.com', 'y', 1, '0767877999'),
(2, 'test test', 'test at test', 'test@gmail.com', 'y', 2, '0111111111');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(2) NOT NULL,
  `roleName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `roleName`) VALUES
(1, 'Grama Niladari'),
(2, 'Inventory Manager'),
(3, 'District Secretariat'),
(4, 'Divisional Secretariat'),
(5, 'Admin'),
(6, 'Disaster Management Officer'),
(7, 'DMC'),
(8, 'Responsible Person');

-- --------------------------------------------------------

--
-- Table structure for table `safehouse`
--

CREATE TABLE `safehouse` (
  `safeHouseID` int(5) NOT NULL,
  `safeHouseAddress` varchar(50) NOT NULL,
  `safeHouseName` varchar(30) NOT NULL,
  `isUsing` char(1) DEFAULT 'n',
  `days` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safehouse`
--

INSERT INTO `safehouse` (`safeHouseID`, `safeHouseAddress`, `safeHouseName`, `isUsing`, `days`) VALUES
(1, 'No 10,School Road, Bolossagama', 'Bolossagama Safe House', 'y', 0),
(2, 'Test', 'test Safe House', 'n', 0),
(3, 'test address test', 'Bombuwala North Safe House', 'y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `safehousecontact`
--

CREATE TABLE `safehousecontact` (
  `safeHouseTelno` char(10) NOT NULL,
  `safeHouseID` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safehousecontact`
--

INSERT INTO `safehousecontact` (`safeHouseTelno`, `safeHouseID`) VALUES
('0345165219', 1),
('0341115219', 2),
('0354545466', 3);

-- --------------------------------------------------------

--
-- Table structure for table `safehousestatus`
--

CREATE TABLE `safehousestatus` (
  `r_id` int(5) NOT NULL,
  `safehouseId` int(5) DEFAULT NULL,
  `adultMale` int(3) DEFAULT NULL,
  `adultFemale` int(3) DEFAULT NULL,
  `children` int(3) DEFAULT NULL,
  `disabledPerson` int(2) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safehousestatus`
--

INSERT INTO `safehousestatus` (`r_id`, `safehouseId`, `adultMale`, `adultFemale`, `children`, `disabledPerson`, `note`, `createdDate`) VALUES
(1, 1, 10, 10, 10, 10, 'test', '2022-03-16 12:15:28'),
(2, 3, 5, 5, 5, 5, 'test 2', '2022-03-16 12:15:41'),
(3, 1, 12, 12, 12, 12, 'test 2', '2022-03-16 12:16:00'),
(4, 2, 15, 18, 6, 0, 'run', '2022-03-16 12:30:58'),
(5, 1, 15, 18, 6, 0, '', '2022-03-16 12:31:55'),
(6, 1, 2, 2, 1, 0, 'xddxg', '2022-03-16 19:57:15'),
(7, 1, 10, 12, 3, 0, '', '2022-03-23 13:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `safehousestatusrequesteditem`
--

CREATE TABLE `safehousestatusrequesteditem` (
  `statusId` int(5) NOT NULL,
  `itemId` int(2) NOT NULL,
  `quantity` decimal(6,2) NOT NULL DEFAULT 0.00,
  `status` char(1) NOT NULL DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safehousestatusrequesteditem`
--

INSERT INTO `safehousestatusrequesteditem` (`statusId`, `itemId`, `quantity`, `status`) VALUES
(5, 1, '1.00', 's'),
(2, 2, '1.00', 's'),
(5, 3, '2.00', 'n'),
(7, 3, '2.00', 's'),
(4, 5, '20.00', 'n'),
(6, 5, '5.00', 's'),
(7, 5, '20.00', 's'),
(7, 6, '10.00', 's'),
(4, 7, '1.00', 'n'),
(6, 7, '1.00', 's'),
(7, 9, '2.00', 's');

-- --------------------------------------------------------

--
-- Table structure for table `servicedistributeitemrecord`
--

CREATE TABLE `servicedistributeitemrecord` (
  `recordId` int(3) NOT NULL,
  `itemRecordId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicedistributeitemrecord`
--

INSERT INTO `servicedistributeitemrecord` (`recordId`, `itemRecordId`) VALUES
(1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `r_id` int(4) NOT NULL,
  `inventoryId` int(3) NOT NULL,
  `requestedDate` date NOT NULL,
  `currentStatus` char(1) DEFAULT 'p',
  `acceptedBy` int(3) DEFAULT NULL,
  `acceptedDate` datetime DEFAULT NULL,
  `requestingFrom` int(3) DEFAULT 0,
  `note` varchar(200) DEFAULT NULL,
  `createdDate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`r_id`, `inventoryId`, `requestedDate`, `currentStatus`, `acceptedBy`, `acceptedDate`, `requestingFrom`, `note`, `createdDate`) VALUES
(1, 2, '2022-03-29', 'p', NULL, NULL, 0, '', '2022-03-23'),
(2, 2, '2022-03-26', 'p', NULL, NULL, 0, '', '2022-03-23'),
(3, 3, '2022-03-25', 'p', NULL, NULL, 0, '', '2022-03-23'),
(4, 4, '2022-03-22', 'p', NULL, NULL, 0, '', '2022-03-23'),
(5, 1, '2022-03-30', 'p', NULL, NULL, 0, '', '2022-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `servicerequestitem`
--

CREATE TABLE `servicerequestitem` (
  `r_id` int(4) NOT NULL,
  `itemId` int(2) NOT NULL,
  `quantity` decimal(6,2) DEFAULT NULL,
  `acceptedBy` int(3) DEFAULT NULL,
  `acceptedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicerequestitem`
--

INSERT INTO `servicerequestitem` (`r_id`, `itemId`, `quantity`, `acceptedBy`, `acceptedDate`) VALUES
(1, 10, '1.00', NULL, NULL),
(2, 1, '1.00', NULL, NULL),
(3, 3, '4.00', NULL, NULL),
(3, 5, '100.00', NULL, NULL),
(3, 6, '20.00', NULL, NULL),
(4, 8, '1.00', NULL, NULL),
(5, 5, '50.00', NULL, NULL),
(5, 31, '10.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unitId` int(2) NOT NULL,
  `unitName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unitId`, `unitName`) VALUES
(1, 'kg'),
(2, 'm'),
(3, 'litre'),
(4, 'units');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`msgId`);

--
-- Indexes for table `alertdisdivgn`
--
ALTER TABLE `alertdisdivgn`
  ADD PRIMARY KEY (`alertId`,`dsId`,`dvId`,`gndvId`),
  ADD KEY `fk_dis` (`dsId`),
  ADD KEY `fk_gn` (`gndvId`),
  ADD KEY `fk_div` (`dvId`),
  ADD KEY `alertId` (`alertId`);

--
-- Indexes for table `deathcompensation`
--
ALTER TABLE `deathcompensation`
  ADD PRIMARY KEY (`deathId`),
  ADD KEY `fk_gndvId8` (`gndvId`);

--
-- Indexes for table `deathheir`
--
ALTER TABLE `deathheir`
  ADD PRIMARY KEY (`heirid`),
  ADD KEY `fk_deathId` (`deathid`);

--
-- Indexes for table `disaster`
--
ALTER TABLE `disaster`
  ADD PRIMARY KEY (`disId`);

--
-- Indexes for table `dismgtofficer`
--
ALTER TABLE `dismgtofficer`
  ADD PRIMARY KEY (`disMgtOfficerID`),
  ADD UNIQUE KEY `empEmail` (`empEmail`);

--
-- Indexes for table `distributeitem`
--
ALTER TABLE `distributeitem`
  ADD PRIMARY KEY (`recordId`),
  ADD KEY `safeHouseId` (`safeHouseId`);

--
-- Indexes for table `distributeitemrecord`
--
ALTER TABLE `distributeitemrecord`
  ADD PRIMARY KEY (`recordId`,`itemRecord`),
  ADD KEY `itemRecord` (`itemRecord`);

--
-- Indexes for table `distributeservice`
--
ALTER TABLE `distributeservice`
  ADD PRIMARY KEY (`recordId`),
  ADD KEY `inventoryId` (`inventoryId`),
  ADD KEY `serviceRequestId` (`serviceRequestId`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dsId`),
  ADD UNIQUE KEY `dsName` (`dsName`);

--
-- Indexes for table `districtofficecontact`
--
ALTER TABLE `districtofficecontact`
  ADD PRIMARY KEY (`districtofficeTelno`),
  ADD KEY `districtSOfficeID` (`districtSOfficeID`);

--
-- Indexes for table `districtsecretariat`
--
ALTER TABLE `districtsecretariat`
  ADD PRIMARY KEY (`districtSecretariatID`),
  ADD UNIQUE KEY `empEmail` (`empEmail`);

--
-- Indexes for table `districtsoffice`
--
ALTER TABLE `districtsoffice`
  ADD PRIMARY KEY (`districtSOfficeID`),
  ADD KEY `districtSecretariat` (`districtSecretariat`),
  ADD KEY `dmc` (`dmc`),
  ADD KEY `dsId` (`dsId`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`dvId`),
  ADD UNIQUE KEY `dvName` (`dvName`),
  ADD KEY `dsId` (`dsId`);

--
-- Indexes for table `divisionaloffice`
--
ALTER TABLE `divisionaloffice`
  ADD PRIMARY KEY (`divisionalOfficeId`),
  ADD KEY `divisionalSecretariatID` (`divisionalSecretariatID`),
  ADD KEY `disasterManager` (`disasterManager`),
  ADD KEY `dvId` (`dvId`);

--
-- Indexes for table `divisionalofficecontact`
--
ALTER TABLE `divisionalofficecontact`
  ADD PRIMARY KEY (`divisionalSofficeTelno`),
  ADD KEY `divisionalOfficeId` (`divisionalOfficeId`);

--
-- Indexes for table `divisionalsecretariat`
--
ALTER TABLE `divisionalsecretariat`
  ADD PRIMARY KEY (`divisionalSecretariatID`);

--
-- Indexes for table `dmc`
--
ALTER TABLE `dmc`
  ADD PRIMARY KEY (`dmcID`),
  ADD UNIQUE KEY `empEmail` (`empEmail`);

--
-- Indexes for table `donationreqnotice`
--
ALTER TABLE `donationreqnotice`
  ADD PRIMARY KEY (`recordId`),
  ADD KEY `safehouseId` (`safehouseId`);

--
-- Indexes for table `fundraising`
--
ALTER TABLE `fundraising`
  ADD PRIMARY KEY (`recordId`);

--
-- Indexes for table `fundraisingrecords`
--
ALTER TABLE `fundraisingrecords`
  ADD PRIMARY KEY (`recordId`),
  ADD KEY `FK_fundraisingrecords` (`fundraisingId`);

--
-- Indexes for table `gndivision`
--
ALTER TABLE `gndivision`
  ADD PRIMARY KEY (`gndvId`),
  ADD UNIQUE KEY `gnDvName` (`gnDvName`),
  ADD UNIQUE KEY `gramaNiladariID` (`gramaNiladariID`),
  ADD UNIQUE KEY `tel` (`telno`),
  ADD KEY `safeHouseID` (`safeHouseID`),
  ADD KEY `dvId` (`dvId`);

--
-- Indexes for table `gnfinalincident`
--
ALTER TABLE `gnfinalincident`
  ADD PRIMARY KEY (`finalIncidentId`),
  ADD KEY `fk_gndvId5` (`gndvid`),
  ADD KEY `fk_incident8` (`incidentId`);

--
-- Indexes for table `gnmsg`
--
ALTER TABLE `gnmsg`
  ADD PRIMARY KEY (`msgId`);

--
-- Indexes for table `gramaniladari`
--
ALTER TABLE `gramaniladari`
  ADD PRIMARY KEY (`gramaNiladariID`);

--
-- Indexes for table `incident`
--
ALTER TABLE `incident`
  ADD PRIMARY KEY (`incidentId`),
  ADD KEY `fk_dvId` (`dvId`);

--
-- Indexes for table `incidentgn`
--
ALTER TABLE `incidentgn`
  ADD PRIMARY KEY (`incidentId`,`gndvId`),
  ADD KEY `fk_gnid` (`gndvId`);

--
-- Indexes for table `initialincident`
--
ALTER TABLE `initialincident`
  ADD PRIMARY KEY (`initialId`),
  ADD KEY `fk_gndvId` (`gndvId`),
  ADD KEY `fk_inicide` (`incidentId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryId`),
  ADD UNIQUE KEY `inventoryAddress` (`inventoryAddress`),
  ADD KEY `dvId` (`dvId`);

--
-- Indexes for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  ADD PRIMARY KEY (`recId`),
  ADD KEY `inventoryId` (`inventoryId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `inventorymgtofficer`
--
ALTER TABLE `inventorymgtofficer`
  ADD PRIMARY KEY (`inventoryMgtOfficerID`),
  ADD KEY `inventoryID` (`inventoryID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`),
  ADD UNIQUE KEY `itemName` (`itemName`),
  ADD KEY `unitType` (`unitType`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`empId`,`roleId`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `noticeitem`
--
ALTER TABLE `noticeitem`
  ADD PRIMARY KEY (`noticeId`,`itemName`);

--
-- Indexes for table `propapp`
--
ALTER TABLE `propapp`
  ADD KEY `fk_propId4` (`propcomId`);

--
-- Indexes for table `propcomprop`
--
ALTER TABLE `propcomprop`
  ADD KEY `fk_proId` (`propcomId`);

--
-- Indexes for table `propertycompensation`
--
ALTER TABLE `propertycompensation`
  ADD PRIMARY KEY (`propcomId`),
  ADD KEY `fk_gndvId9` (`gndvId`);

--
-- Indexes for table `propservice`
--
ALTER TABLE `propservice`
  ADD KEY `fk_propId2` (`propcomId`);

--
-- Indexes for table `relief`
--
ALTER TABLE `relief`
  ADD PRIMARY KEY (`reliefId`),
  ADD KEY `fk_incId1` (`incidentId`),
  ADD KEY `fk_gndv2` (`gndvId`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`reqId`),
  ADD KEY `requestedBy` (`requestedBy`);

--
-- Indexes for table `requestsitem`
--
ALTER TABLE `requestsitem`
  ADD PRIMARY KEY (`reqId`,`acceptedBy`,`itemId`),
  ADD KEY `acceptedBy` (`acceptedBy`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `resetpass`
--
ALTER TABLE `resetpass`
  ADD PRIMARY KEY (`recordId`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`residentId`),
  ADD KEY `gndvId` (`gndvId`);

--
-- Indexes for table `responsibleperson`
--
ALTER TABLE `responsibleperson`
  ADD PRIMARY KEY (`responsiblePersonID`),
  ADD UNIQUE KEY `empEmail` (`empEmail`),
  ADD KEY `safeHouseID` (`safeHouseID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `safehouse`
--
ALTER TABLE `safehouse`
  ADD PRIMARY KEY (`safeHouseID`),
  ADD UNIQUE KEY `safeHouseAddress` (`safeHouseAddress`);

--
-- Indexes for table `safehousecontact`
--
ALTER TABLE `safehousecontact`
  ADD PRIMARY KEY (`safeHouseTelno`),
  ADD KEY `safeHouseID` (`safeHouseID`);

--
-- Indexes for table `safehousestatus`
--
ALTER TABLE `safehousestatus`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `safehouseId` (`safehouseId`);

--
-- Indexes for table `safehousestatusrequesteditem`
--
ALTER TABLE `safehousestatusrequesteditem`
  ADD PRIMARY KEY (`itemId`,`statusId`),
  ADD KEY `safehousestatusrequesteditem_ibfk_1` (`statusId`);

--
-- Indexes for table `servicedistributeitemrecord`
--
ALTER TABLE `servicedistributeitemrecord`
  ADD PRIMARY KEY (`recordId`,`itemRecordId`),
  ADD KEY `itemRecordId` (`itemRecordId`);

--
-- Indexes for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `inventoryId` (`inventoryId`),
  ADD KEY `acceptedBy` (`acceptedBy`);

--
-- Indexes for table `servicerequestitem`
--
ALTER TABLE `servicerequestitem`
  ADD PRIMARY KEY (`r_id`,`itemId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unitId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deathcompensation`
--
ALTER TABLE `deathcompensation`
  MODIFY `deathId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deathheir`
--
ALTER TABLE `deathheir`
  MODIFY `heirid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disaster`
--
ALTER TABLE `disaster`
  MODIFY `disId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dismgtofficer`
--
ALTER TABLE `dismgtofficer`
  MODIFY `disMgtOfficerID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distributeitem`
--
ALTER TABLE `distributeitem`
  MODIFY `recordId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `distributeservice`
--
ALTER TABLE `distributeservice`
  MODIFY `recordId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dsId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `districtsecretariat`
--
ALTER TABLE `districtsecretariat`
  MODIFY `districtSecretariatID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districtsoffice`
--
ALTER TABLE `districtsoffice`
  MODIFY `districtSOfficeID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `dvId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `divisionaloffice`
--
ALTER TABLE `divisionaloffice`
  MODIFY `divisionalOfficeId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `divisionalsecretariat`
--
ALTER TABLE `divisionalsecretariat`
  MODIFY `divisionalSecretariatID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dmc`
--
ALTER TABLE `dmc`
  MODIFY `dmcID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donationreqnotice`
--
ALTER TABLE `donationreqnotice`
  MODIFY `recordId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fundraising`
--
ALTER TABLE `fundraising`
  MODIFY `recordId` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundraisingrecords`
--
ALTER TABLE `fundraisingrecords`
  MODIFY `recordId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gndivision`
--
ALTER TABLE `gndivision`
  MODIFY `gndvId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `gnfinalincident`
--
ALTER TABLE `gnfinalincident`
  MODIFY `finalIncidentId` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gnmsg`
--
ALTER TABLE `gnmsg`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gramaniladari`
--
ALTER TABLE `gramaniladari`
  MODIFY `gramaNiladariID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `incident`
--
ALTER TABLE `incident`
  MODIFY `incidentId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `initialincident`
--
ALTER TABLE `initialincident`
  MODIFY `initialId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  MODIFY `recId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `inventorymgtofficer`
--
ALTER TABLE `inventorymgtofficer`
  MODIFY `inventoryMgtOfficerID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `propertycompensation`
--
ALTER TABLE `propertycompensation`
  MODIFY `propcomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `relief`
--
ALTER TABLE `relief`
  MODIFY `reliefId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `reqId` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestsitem`
--
ALTER TABLE `requestsitem`
  MODIFY `reqId` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resetpass`
--
ALTER TABLE `resetpass`
  MODIFY `recordId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `residentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `responsibleperson`
--
ALTER TABLE `responsibleperson`
  MODIFY `responsiblePersonID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `safehouse`
--
ALTER TABLE `safehouse`
  MODIFY `safeHouseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `safehousestatus`
--
ALTER TABLE `safehousestatus`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `servicerequest`
--
ALTER TABLE `servicerequest`
  MODIFY `r_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alertdisdivgn`
--
ALTER TABLE `alertdisdivgn`
  ADD CONSTRAINT `fk_alerId` FOREIGN KEY (`alertId`) REFERENCES `alert` (`msgId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dis` FOREIGN KEY (`dsId`) REFERENCES `district` (`dsId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_div` FOREIGN KEY (`dvId`) REFERENCES `division` (`dvId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gn` FOREIGN KEY (`gndvId`) REFERENCES `gndivision` (`gndvId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deathcompensation`
--
ALTER TABLE `deathcompensation`
  ADD CONSTRAINT `fk_gndvId8` FOREIGN KEY (`gndvId`) REFERENCES `gndivision` (`gndvId`);

--
-- Constraints for table `deathheir`
--
ALTER TABLE `deathheir`
  ADD CONSTRAINT `fk_deathId` FOREIGN KEY (`deathid`) REFERENCES `deathcompensation` (`deathId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distributeitem`
--
ALTER TABLE `distributeitem`
  ADD CONSTRAINT `distributeitem_ibfk_1` FOREIGN KEY (`safeHouseId`) REFERENCES `safehouse` (`safeHouseID`);

--
-- Constraints for table `distributeitemrecord`
--
ALTER TABLE `distributeitemrecord`
  ADD CONSTRAINT `distributeitemrecord_ibfk_1` FOREIGN KEY (`recordId`) REFERENCES `distributeitem` (`recordId`),
  ADD CONSTRAINT `distributeitemrecord_ibfk_2` FOREIGN KEY (`itemRecord`) REFERENCES `inventoryitem` (`recId`);

--
-- Constraints for table `distributeservice`
--
ALTER TABLE `distributeservice`
  ADD CONSTRAINT `distributeservice_ibfk_1` FOREIGN KEY (`inventoryId`) REFERENCES `inventory` (`inventoryId`),
  ADD CONSTRAINT `distributeservice_ibfk_2` FOREIGN KEY (`serviceRequestId`) REFERENCES `servicerequest` (`r_id`);

--
-- Constraints for table `districtofficecontact`
--
ALTER TABLE `districtofficecontact`
  ADD CONSTRAINT `districtofficecontact_ibfk_1` FOREIGN KEY (`districtSOfficeID`) REFERENCES `districtsoffice` (`districtSOfficeID`);

--
-- Constraints for table `districtsoffice`
--
ALTER TABLE `districtsoffice`
  ADD CONSTRAINT `districtsoffice_ibfk_1` FOREIGN KEY (`districtSecretariat`) REFERENCES `districtsecretariat` (`districtSecretariatID`),
  ADD CONSTRAINT `districtsoffice_ibfk_2` FOREIGN KEY (`dmc`) REFERENCES `dmc` (`dmcID`),
  ADD CONSTRAINT `districtsoffice_ibfk_3` FOREIGN KEY (`dsId`) REFERENCES `district` (`dsId`);

--
-- Constraints for table `division`
--
ALTER TABLE `division`
  ADD CONSTRAINT `division_ibfk_1` FOREIGN KEY (`dsId`) REFERENCES `district` (`dsId`);

--
-- Constraints for table `divisionaloffice`
--
ALTER TABLE `divisionaloffice`
  ADD CONSTRAINT `divisionaloffice_ibfk_1` FOREIGN KEY (`divisionalSecretariatID`) REFERENCES `divisionalsecretariat` (`divisionalSecretariatID`),
  ADD CONSTRAINT `divisionaloffice_ibfk_2` FOREIGN KEY (`disasterManager`) REFERENCES `dismgtofficer` (`disMgtOfficerID`),
  ADD CONSTRAINT `divisionaloffice_ibfk_3` FOREIGN KEY (`dvId`) REFERENCES `division` (`dvId`);

--
-- Constraints for table `divisionalofficecontact`
--
ALTER TABLE `divisionalofficecontact`
  ADD CONSTRAINT `divisionalofficecontact_ibfk_1` FOREIGN KEY (`divisionalOfficeId`) REFERENCES `divisionaloffice` (`divisionalOfficeId`);

--
-- Constraints for table `donationreqnotice`
--
ALTER TABLE `donationreqnotice`
  ADD CONSTRAINT `donationreqnotice_ibfk_1` FOREIGN KEY (`safehouseId`) REFERENCES `safehouse` (`safeHouseID`);

--
-- Constraints for table `fundraisingrecords`
--
ALTER TABLE `fundraisingrecords`
  ADD CONSTRAINT `FK_fundraisingrecords` FOREIGN KEY (`fundraisingId`) REFERENCES `fundraising` (`recordId`) ON DELETE CASCADE;

--
-- Constraints for table `gndivision`
--
ALTER TABLE `gndivision`
  ADD CONSTRAINT `gndivision_ibfk_1` FOREIGN KEY (`safeHouseID`) REFERENCES `safehouse` (`safeHouseID`),
  ADD CONSTRAINT `gndivision_ibfk_3` FOREIGN KEY (`dvId`) REFERENCES `division` (`dvId`),
  ADD CONSTRAINT `gndivision_ibfk_4` FOREIGN KEY (`gramaNiladariID`) REFERENCES `gramaniladari` (`gramaNiladariID`);

--
-- Constraints for table `gnfinalincident`
--
ALTER TABLE `gnfinalincident`
  ADD CONSTRAINT `fk_gndvId5` FOREIGN KEY (`gndvid`) REFERENCES `gramaniladari` (`gramaNiladariID`),
  ADD CONSTRAINT `fk_incident8` FOREIGN KEY (`incidentId`) REFERENCES `incident` (`incidentId`);

--
-- Constraints for table `incident`
--
ALTER TABLE `incident`
  ADD CONSTRAINT `fk_dvId` FOREIGN KEY (`dvId`) REFERENCES `division` (`dvId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incidentgn`
--
ALTER TABLE `incidentgn`
  ADD CONSTRAINT `fk_gnid` FOREIGN KEY (`gndvId`) REFERENCES `gndivision` (`gndvId`),
  ADD CONSTRAINT `fk_incId` FOREIGN KEY (`incidentId`) REFERENCES `incident` (`incidentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `initialincident`
--
ALTER TABLE `initialincident`
  ADD CONSTRAINT `fk_gndvId` FOREIGN KEY (`gndvId`) REFERENCES `gndivision` (`gndvId`),
  ADD CONSTRAINT `fk_inicide` FOREIGN KEY (`incidentId`) REFERENCES `incident` (`incidentId`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`dvId`) REFERENCES `division` (`dvId`);

--
-- Constraints for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  ADD CONSTRAINT `inventoryitem_ibfk_1` FOREIGN KEY (`inventoryId`) REFERENCES `inventory` (`inventoryId`),
  ADD CONSTRAINT `inventoryitem_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`);

--
-- Constraints for table `inventorymgtofficer`
--
ALTER TABLE `inventorymgtofficer`
  ADD CONSTRAINT `inventorymgtofficer_ibfk_1` FOREIGN KEY (`inventoryID`) REFERENCES `inventory` (`inventoryId`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`unitType`) REFERENCES `unit` (`unitId`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`roleId`);

--
-- Constraints for table `noticeitem`
--
ALTER TABLE `noticeitem`
  ADD CONSTRAINT `noticeitem_ibfk_1` FOREIGN KEY (`noticeId`) REFERENCES `donationreqnotice` (`recordId`);

--
-- Constraints for table `propapp`
--
ALTER TABLE `propapp`
  ADD CONSTRAINT `fk_propId4` FOREIGN KEY (`propcomId`) REFERENCES `propertycompensation` (`propcomId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `propcomprop`
--
ALTER TABLE `propcomprop`
  ADD CONSTRAINT `fk_proId` FOREIGN KEY (`propcomId`) REFERENCES `propertycompensation` (`propcomId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `propertycompensation`
--
ALTER TABLE `propertycompensation`
  ADD CONSTRAINT `fk_gndvId9` FOREIGN KEY (`gndvId`) REFERENCES `gndivision` (`gndvId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `propservice`
--
ALTER TABLE `propservice`
  ADD CONSTRAINT `fk_propId2` FOREIGN KEY (`propcomId`) REFERENCES `propertycompensation` (`propcomId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relief`
--
ALTER TABLE `relief`
  ADD CONSTRAINT `fk_gndv2` FOREIGN KEY (`gndvId`) REFERENCES `gndivision` (`gndvId`),
  ADD CONSTRAINT `fk_incId1` FOREIGN KEY (`incidentId`) REFERENCES `incident` (`incidentId`);

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`requestedBy`) REFERENCES `inventory` (`inventoryId`);

--
-- Constraints for table `requestsitem`
--
ALTER TABLE `requestsitem`
  ADD CONSTRAINT `requestsitem_ibfk_1` FOREIGN KEY (`reqId`) REFERENCES `requests` (`reqId`),
  ADD CONSTRAINT `requestsitem_ibfk_2` FOREIGN KEY (`acceptedBy`) REFERENCES `inventory` (`inventoryId`),
  ADD CONSTRAINT `requestsitem_ibfk_3` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`);

--
-- Constraints for table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `resident_ibfk_1` FOREIGN KEY (`gndvId`) REFERENCES `gndivision` (`gndvId`);

--
-- Constraints for table `responsibleperson`
--
ALTER TABLE `responsibleperson`
  ADD CONSTRAINT `responsibleperson_ibfk_1` FOREIGN KEY (`safeHouseID`) REFERENCES `safehouse` (`safeHouseID`);

--
-- Constraints for table `safehousecontact`
--
ALTER TABLE `safehousecontact`
  ADD CONSTRAINT `safehousecontact_ibfk_1` FOREIGN KEY (`safeHouseID`) REFERENCES `safehouse` (`safeHouseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `safehousestatus`
--
ALTER TABLE `safehousestatus`
  ADD CONSTRAINT `safehousestatus_ibfk_1` FOREIGN KEY (`safehouseId`) REFERENCES `safehouse` (`safeHouseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `safehousestatusrequesteditem`
--
ALTER TABLE `safehousestatusrequesteditem`
  ADD CONSTRAINT `safehousestatusrequesteditem_ibfk_1` FOREIGN KEY (`statusId`) REFERENCES `safehousestatus` (`r_id`),
  ADD CONSTRAINT `safehousestatusrequesteditem_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`);

--
-- Constraints for table `servicedistributeitemrecord`
--
ALTER TABLE `servicedistributeitemrecord`
  ADD CONSTRAINT `servicedistributeitemrecord_ibfk_1` FOREIGN KEY (`itemRecordId`) REFERENCES `inventoryitem` (`recId`),
  ADD CONSTRAINT `servicedistributeitemrecord_ibfk_2` FOREIGN KEY (`recordId`) REFERENCES `distributeservice` (`recordId`);

--
-- Constraints for table `servicerequest`
--
ALTER TABLE `servicerequest`
  ADD CONSTRAINT `servicerequest_ibfk_1` FOREIGN KEY (`inventoryId`) REFERENCES `inventory` (`inventoryId`),
  ADD CONSTRAINT `servicerequest_ibfk_2` FOREIGN KEY (`acceptedBy`) REFERENCES `inventory` (`inventoryId`);

--
-- Constraints for table `servicerequestitem`
--
ALTER TABLE `servicerequestitem`
  ADD CONSTRAINT `servicerequestitem_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `servicerequest` (`r_id`),
  ADD CONSTRAINT `servicerequestitem_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `password_reset_token_exipiring_event` ON SCHEDULE EVERY 30 MINUTE STARTS '2021-11-20 19:04:09' ON COMPLETION PRESERVE ENABLE COMMENT 'Clean up token every 30 minutes daily!' DO DELETE FROM resetpass WHERE resetpass.createdTime < DATE_SUB(NOW(), INTERVAL 1 DAY)$$

CREATE DEFINER=`root`@`localhost` EVENT `increament_days_spent` ON SCHEDULE EVERY 24 HOUR STARTS '2022-01-23 00:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'increament days of spent' DO UPDATE safehouse SET days = days + 1$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
