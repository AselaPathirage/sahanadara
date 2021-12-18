-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2021 at 04:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
  `isAssigned` char(1) DEFAULT 'n',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'Sanduni Rashmika', '297, KIRILLAWALA, WEBODA', 'sanduni@gmail.com', 'n', '');

-- --------------------------------------------------------

--
-- Table structure for table `dismgtofficer`
--

CREATE TABLE `dismgtofficer` (
  `disMgtOfficerID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'n',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dismgtofficer`
--

INSERT INTO `dismgtofficer` (`disMgtOfficerID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'Yohombu Abeysinghe', 'MAHENDRA, WELIKALA, POKUNUWITA', 'yohombu@gmail.com', 'n', ''),
(2, 'test 4 test', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu99@gmail.com', 'n', '0719867823');

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
  `isAssigned` char(1) DEFAULT 'n',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districtsecretariat`
--

INSERT INTO `districtsecretariat` (`districtSecretariatID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'District Officer', 'District Office,Kalutara', 'district@gmail.com', 'n', ''),
(4, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasind2u2@gmail.com', 'n', '0719867863'),
(5, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu6@gmail.com', 'n', '0719867863');

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
(1, 'Divisional Secretariat Office Dodangoda', 'Kalutara-Matugama Rd, Thudugala 12020', 10, 8, 1),
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
  `isAssigned` char(1) DEFAULT 'n',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisionalsecretariat`
--

INSERT INTO `divisionalsecretariat` (`divisionalSecretariatID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'Divisional Secratariat', 'Divisional Secratariat,Horana', 'division@gmail.com', 'n', ''),
(5, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu2@gmail.com', 'n', '0719867863'),
(6, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu3@gmail.com', 'n', '0719867863'),
(7, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu4@gmail.com', 'n', '0719867863'),
(8, 'test 2 test 2', 'Hene Gedara Hena, Ullala', 'htnawsseenpasindu@gmail.com', 'n', '0719867863');

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
  `note` varchar(200) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `gndivision`
--

CREATE TABLE `gndivision` (
  `gndvId` int(5) NOT NULL,
  `gnDvName` varchar(20) NOT NULL,
  `officeAddress` varchar(50) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `safeHouseID` int(5) DEFAULT NULL,
  `gramaNiladariID` int(6) DEFAULT NULL,
  `dvId` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gndivision`
--

INSERT INTO `gndivision` (`gndvId`, `gnDvName`, `officeAddress`, `startDate`, `safeHouseID`, `gramaNiladariID`, `dvId`) VALUES
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
(15, '728 C Bombuwala Nort', 'Divisional Secretariat, Dodangoda,Kalutara,South', NULL, NULL, NULL, 10),
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
-- Table structure for table `gramaniladari`
--

CREATE TABLE `gramaniladari` (
  `gramaNiladariID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'n',
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gramaniladari`
--

INSERT INTO `gramaniladari` (`gramaNiladariID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `empTele`) VALUES
(1, 'Asela Pathirage', 'NO 252/D,, ANANDA MAITHREE MAWATHA,, BELLAPITIYA, HORANA.', 'asela@gmail.com', 'n', ''),
(2, 'gn gn', 'Hene Gedara Hena, Ullala', 'htnaweegujgnpasindu@gmail.com', 'n', '0719867863'),
(3, 'test test', 'Hene Gedara Hena, Ullala', 'htnaweenpsasindu@gmail.com', 'n', '0719867863'),
(4, 'test test', 'Hene Gedara Hena, Ullala', 'htnaweenpsfasindu@gmail.com', 'n', '0719867863'),
(5, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu@gmail.com', 'n', '0719867863'),
(6, 'test  Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu6@gmail.com', 'n', '0719867863'),
(7, 'Naween Lakshan', 'Hene Gedara Hena, Ullala', 'htnaweenpasindu7@gmail.com', 'n', '0719867863');

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
(2, 'Divisional Office, Horane', 3);

-- --------------------------------------------------------

--
-- Table structure for table `inventoryitem`
--

CREATE TABLE `inventoryitem` (
  `recId` int(3) NOT NULL,
  `itemId` int(2) DEFAULT NULL,
  `inventoryId` int(3) DEFAULT NULL,
  `quantity` decimal(6,2) NOT NULL DEFAULT 0.00,
  `transactionDate` datetime NOT NULL,
  `remarks` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventoryitem`
--

INSERT INTO `inventoryitem` (`recId`, `itemId`, `inventoryId`, `quantity`, `transactionDate`, `remarks`) VALUES
(1, 5, 1, '50.00', '2021-10-11 00:14:15', ''),
(2, 3, 1, '1.00', '2021-10-26 00:14:15', ''),
(3, 6, 1, '100.00', '2021-10-22 00:14:47', ''),
(5, 5, 1, '30.00', '2021-10-28 00:19:47', ''),
(7, 5, 1, '200.00', '2021-10-24 01:11:47', ''),
(8, 5, 1, '200.00', '2021-10-24 01:11:47', ''),
(9, 5, 1, '2.00', '2021-10-24 01:12:51', ''),
(10, 5, 1, '20.00', '2021-10-24 01:13:27', ''),
(11, 5, 1, '10.00', '2021-10-24 01:14:26', ''),
(12, 5, 1, '10.00', '2021-10-24 01:14:56', ''),
(13, 5, 1, '-200.00', '2021-10-24 01:47:53', ''),
(14, 5, 1, '-200.00', '2021-10-24 01:57:50', ''),
(15, 1, 1, '2.00', '2021-10-24 02:08:57', ''),
(16, 2, 1, '3.00', '2021-10-24 02:09:06', ''),
(17, 3, 1, '10.00', '2021-10-24 02:34:57', ''),
(18, 4, 1, '200.00', '2021-10-24 02:35:13', ''),
(19, 5, 1, '200.00', '2021-10-24 03:11:14', ''),
(20, 5, 1, '-22.00', '2021-10-24 03:11:22', ''),
(21, 3, 1, '1.00', '2021-10-26 23:33:57', ''),
(22, 3, 1, '-1.00', '2021-10-26 23:34:42', ''),
(23, 26, 1, '50.00', '2021-10-27 00:03:25', ''),
(24, 2, 1, '-1.00', '2021-10-27 13:41:59', ''),
(25, 2, 1, '-1.00', '2021-10-27 13:43:09', ''),
(26, 2, 1, '2.00', '2021-10-27 13:44:11', ''),
(27, 2, 1, '-1.00', '2021-10-27 13:44:20', ''),
(28, 5, 1, '-50.00', '2021-10-27 13:45:37', ''),
(29, 6, 1, '-25.00', '2021-10-27 14:12:04', ''),
(30, 5, 1, '-50.00', '2021-10-27 14:14:51', ''),
(31, 5, 1, '-50.00', '2021-10-27 14:23:08', ''),
(32, 4, 1, '-25.00', '2021-10-27 14:27:57', ''),
(33, 3, 1, '-1.00', '2021-10-27 14:31:28', ''),
(34, 6, 1, '-15.00', '2021-10-27 14:33:49', ''),
(35, 6, 1, '-25.00', '2021-10-27 14:50:35', ''),
(36, 5, 1, '-25.00', '2021-10-27 15:02:34', ''),
(37, 4, 1, '-25.00', '2021-10-27 15:03:34', ''),
(38, 5, 1, '-5.00', '2021-10-27 15:13:16', ''),
(39, 5, 1, '-5.00', '2021-10-27 15:13:31', ''),
(40, 5, 1, '-5.00', '2021-10-27 15:14:20', ''),
(41, 5, 1, '-5.00', '2021-10-27 15:14:33', ''),
(42, 4, 1, '-5.00', '2021-10-27 15:25:40', ''),
(43, 3, 1, '-1.00', '2021-10-27 15:26:27', ''),
(44, 4, 1, '-5.00', '2021-10-27 15:27:32', ''),
(45, 3, 1, '-1.00', '2021-10-27 15:47:15', ''),
(46, 3, 1, '-1.00', '2021-10-27 15:48:02', ''),
(47, 3, 1, '-1.00', '2021-10-27 15:48:49', ''),
(48, 3, 1, '-1.00', '2021-10-27 15:49:56', ''),
(49, 4, 1, '-5.00', '2021-10-27 15:54:53', ''),
(50, 5, 1, '-5.00', '2021-10-27 15:57:38', ''),
(51, 2, 1, '-1.00', '2021-10-27 15:57:50', ''),
(52, 26, 1, '-50.00', '2021-10-27 16:11:18', ''),
(53, 26, 1, '50.00', '2021-10-27 16:19:19', ''),
(54, 5, 1, '-100.00', '2021-10-27 16:21:23', ''),
(55, 26, 1, '-50.00', '2021-10-27 16:23:21', ''),
(56, 26, 1, '50.00', '2021-10-27 16:25:21', ''),
(57, 26, 1, '-50.00', '2021-10-27 16:27:02', ''),
(58, 26, 1, '50.00', '2021-10-27 16:27:17', ''),
(59, 9, 1, '50.00', '2021-10-27 16:27:31', ''),
(60, 6, 1, '15.00', '2021-10-27 16:50:57', ''),
(61, 23, 1, '5.00', '2021-10-27 20:14:34', ''),
(62, 9, 1, '-5.50', '2021-10-27 20:14:55', ''),
(63, 23, 1, '2.00', '2021-10-27 21:12:27', ''),
(64, 9, 1, '20.00', '2021-10-27 21:12:41', ''),
(65, 6, 1, '-2.30', '2021-10-27 21:13:44', ''),
(66, 10, 1, '1.00', '2021-10-27 21:44:49', ''),
(67, 6, 1, '-25.00', '2021-10-27 21:45:10', ''),
(68, 2, 2, '1.00', '2021-11-18 17:29:02', ''),
(69, 2, 2, '-2.00', '2021-11-18 18:02:46', ''),
(70, 31, 2, '5.00', '2021-11-18 18:53:31', ''),
(71, 2, 1, '2.00', '2021-12-06 19:33:47', ''),
(72, 28, 1, '50.00', '2021-12-16 23:21:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventorymgtofficer`
--

CREATE TABLE `inventorymgtofficer` (
  `inventoryMgtOfficerID` int(6) NOT NULL,
  `empName` varchar(100) NOT NULL,
  `empAddress` varchar(100) NOT NULL,
  `empEmail` varchar(50) NOT NULL,
  `isAssigned` char(1) DEFAULT 'n',
  `assignedDate` datetime NOT NULL,
  `inventoryID` int(3) NOT NULL,
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventorymgtofficer`
--

INSERT INTO `inventorymgtofficer` (`inventoryMgtOfficerID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `assignedDate`, `inventoryID`, `empTele`) VALUES
(1, 'Naween Pasindu', 'Hene Gedara Hena,Ullala,Kamburupitiya', 'htnaweenpasindu@gmail.com', 'y', '2021-10-21 20:47:22', 1, '');

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
(31, 'Safety Jacket', 4),
(32, 'test 4', 4);

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
(8, '731a528c0ac7ccfe928f7c50d7816205', 'f2dcd5d1f22c796a348685b6737845b6', 'bdjsgEEcAf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `noticeitem`
--

CREATE TABLE `noticeitem` (
  `noticeId` int(4) NOT NULL,
  `itemId` int(2) NOT NULL,
  `quantitity` decimal(6,2) NOT NULL DEFAULT 0.00
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
  `isAssigned` char(1) DEFAULT 'n',
  `safeHouseID` int(5) NOT NULL,
  `empTele` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responsibleperson`
--

INSERT INTO `responsibleperson` (`responsiblePersonID`, `empName`, `empAddress`, `empEmail`, `isAssigned`, `safeHouseID`, `empTele`) VALUES
(1, 'Responsible Person', 'No 5,School Road,Bolossagama', 'responsible@gmail.com', 'y', 1, ''),
(2, 'test test', 'test at test', 'test@gmail.com', 'n', 2, '0111111111');

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
  `isUsing` char(1) DEFAULT 'n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safehouse`
--

INSERT INTO `safehouse` (`safeHouseID`, `safeHouseAddress`, `safeHouseName`, `isUsing`) VALUES
(1, 'No 10,School Road, Bolossagama', 'Bolossagama Safe House', 'y'),
(2, 'Test', 'test Safe House', 'n');

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
('0346165219', 1),
('0341115219', 2);

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
(1, 1, 10, 12, 5, 0, NULL, '2021-12-16 21:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `safehousestatusrequesteditem`
--

CREATE TABLE `safehousestatusrequesteditem` (
  `statusId` int(5) NOT NULL,
  `itemId` int(2) NOT NULL,
  `quantity` decimal(6,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `servicerequest`
--

CREATE TABLE `servicerequest` (
  `r_id` int(4) NOT NULL,
  `inventoryId` int(3) NOT NULL,
  `requestedDate` datetime NOT NULL,
  `currentStatus` char(1) DEFAULT 'p',
  `acceptedBy` int(3) DEFAULT NULL,
  `acceptedDate` datetime DEFAULT NULL,
  `requestingFrom` int(3) DEFAULT 0,
  `note` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicerequest`
--

INSERT INTO `servicerequest` (`r_id`, `inventoryId`, `requestedDate`, `currentStatus`, `acceptedBy`, `acceptedDate`, `requestingFrom`, `note`) VALUES
(1, 1, '2021-11-18 20:26:01', 'p', NULL, '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `servicerequestitem`
--

CREATE TABLE `servicerequestitem` (
  `r_id` int(4) NOT NULL,
  `itemId` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `dismgtofficer`
--
ALTER TABLE `dismgtofficer`
  ADD PRIMARY KEY (`disMgtOfficerID`),
  ADD UNIQUE KEY `empEmail` (`empEmail`);

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
-- Indexes for table `gndivision`
--
ALTER TABLE `gndivision`
  ADD PRIMARY KEY (`gndvId`),
  ADD UNIQUE KEY `gnDvName` (`gnDvName`),
  ADD KEY `safeHouseID` (`safeHouseID`),
  ADD KEY `gramaNiladariID` (`gramaNiladariID`),
  ADD KEY `dvId` (`dvId`);

--
-- Indexes for table `gramaniladari`
--
ALTER TABLE `gramaniladari`
  ADD PRIMARY KEY (`gramaNiladariID`);

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
  ADD PRIMARY KEY (`noticeId`,`itemId`),
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
  ADD PRIMARY KEY (`itemId`,`statusId`);

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
-- AUTO_INCREMENT for table `dismgtofficer`
--
ALTER TABLE `dismgtofficer`
  MODIFY `disMgtOfficerID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `divisionalSecretariatID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dmc`
--
ALTER TABLE `dmc`
  MODIFY `dmcID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donationreqnotice`
--
ALTER TABLE `donationreqnotice`
  MODIFY `recordId` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gndivision`
--
ALTER TABLE `gndivision`
  MODIFY `gndvId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `gramaniladari`
--
ALTER TABLE `gramaniladari`
  MODIFY `gramaNiladariID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventoryitem`
--
ALTER TABLE `inventoryitem`
  MODIFY `recId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `inventorymgtofficer`
--
ALTER TABLE `inventorymgtofficer`
  MODIFY `inventoryMgtOfficerID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `resetpass`
--
ALTER TABLE `resetpass`
  MODIFY `recordId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `residentId` int(10) NOT NULL AUTO_INCREMENT;

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
  MODIFY `safeHouseID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `safehousestatus`
--
ALTER TABLE `safehousestatus`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `servicerequest`
--
ALTER TABLE `servicerequest`
  MODIFY `r_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unitId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `gndivision`
--
ALTER TABLE `gndivision`
  ADD CONSTRAINT `gndivision_ibfk_1` FOREIGN KEY (`safeHouseID`) REFERENCES `safehouse` (`safeHouseID`),
  ADD CONSTRAINT `gndivision_ibfk_2` FOREIGN KEY (`gramaNiladariID`) REFERENCES `gramaniladari` (`gramaNiladariID`),
  ADD CONSTRAINT `gndivision_ibfk_3` FOREIGN KEY (`dvId`) REFERENCES `division` (`dvId`);

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
  ADD CONSTRAINT `noticeitem_ibfk_1` FOREIGN KEY (`noticeId`) REFERENCES `donationreqnotice` (`recordId`),
  ADD CONSTRAINT `noticeitem_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`);

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
  ADD CONSTRAINT `safehousecontact_ibfk_1` FOREIGN KEY (`safeHouseID`) REFERENCES `safehouse` (`safeHouseID`);

--
-- Constraints for table `safehousestatus`
--
ALTER TABLE `safehousestatus`
  ADD CONSTRAINT `safehousestatus_ibfk_1` FOREIGN KEY (`safehouseId`) REFERENCES `safehouse` (`safeHouseID`);

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
  ADD CONSTRAINT `servicerequestitem_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `servicerequest` (`inventoryId`),
  ADD CONSTRAINT `servicerequestitem_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
