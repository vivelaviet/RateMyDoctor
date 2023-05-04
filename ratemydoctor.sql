-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 06:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratemydoctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Place` varchar(45) DEFAULT NULL,
  `DoctorID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `appointmentview`
-- (See below for the actual view)
--
CREATE TABLE `appointmentview` (
`AppointmentID` int(11)
,`Date` date
,`Time` time
,`Place` varchar(45)
,`DoctorID` int(11)
,`CustomerID` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Insurance` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Password`, `Age`, `Insurance`) VALUES
(1, 'Steve', 'John', '1234', 12, 'Healthcare');

-- --------------------------------------------------------

--
-- Stand-in structure for view `customerview`
-- (See below for the actual view)
--
CREATE TABLE `customerview` (
`CustomerID` int(11)
,`FirstName` varchar(45)
,`LastName` varchar(45)
,`Password` varchar(45)
,`Age` int(11)
,`Insurance` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DoctorID` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Specialization` varchar(45) DEFAULT NULL,
  `Location` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DoctorID`, `FirstName`, `LastName`, `Specialization`, `Location`) VALUES
(5, 'Bilbo', 'Baggins', 'The Ring', 'Mordor'),
(3, 'Steve', 'Lasengle', 'Twitter', 'Tangled'),
(6, 'Steve', 'Tina', 'Local', 'Too'),
(2, 'Tina', 'Nguyen', 'Wonderscience', 'Aggieland');

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctorview`
-- (See below for the actual view)
--
CREATE TABLE `doctorview` (
`DoctorID` int(11)
,`FirstName` varchar(45)
,`LastName` varchar(45)
,`Specialization` varchar(45)
,`Location` varchar(45)
);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `EducationID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `Level` varchar(45) DEFAULT NULL,
  `Subject` varchar(45) DEFAULT NULL,
  `Institution` varchar(45) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `MedicalHistoryID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pastemployment`
--

CREATE TABLE `pastemployment` (
  `PastEmploymentID` int(11) NOT NULL,
  `DoctorID` int(11) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `CompanyName` varchar(45) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `RatingID` int(11) NOT NULL,
  `Score` int(11) NOT NULL,
  `Comment` varchar(45) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `DoctorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `ratingview`
-- (See below for the actual view)
--
CREATE TABLE `ratingview` (
`RatingID` int(11)
,`Score` int(11)
,`Comment` varchar(45)
,`Date` date
,`DoctorID` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `appointmentview`
--
DROP TABLE IF EXISTS `appointmentview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appointmentview`  AS SELECT `appointment`.`AppointmentID` AS `AppointmentID`, `appointment`.`Date` AS `Date`, `appointment`.`Time` AS `Time`, `appointment`.`Place` AS `Place`, `appointment`.`DoctorID` AS `DoctorID`, `appointment`.`CustomerID` AS `CustomerID` FROM `appointment` ;

-- --------------------------------------------------------

--
-- Structure for view `customerview`
--
DROP TABLE IF EXISTS `customerview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customerview`  AS SELECT `customer`.`CustomerID` AS `CustomerID`, `customer`.`FirstName` AS `FirstName`, `customer`.`LastName` AS `LastName`, `customer`.`Password` AS `Password`, `customer`.`Age` AS `Age`, `customer`.`Insurance` AS `Insurance` FROM `customer` ;

-- --------------------------------------------------------

--
-- Structure for view `doctorview`
--
DROP TABLE IF EXISTS `doctorview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctorview`  AS SELECT `doctor`.`DoctorID` AS `DoctorID`, `doctor`.`FirstName` AS `FirstName`, `doctor`.`LastName` AS `LastName`, `doctor`.`Specialization` AS `Specialization`, `doctor`.`Location` AS `Location` FROM `doctor` ;

-- --------------------------------------------------------

--
-- Structure for view `ratingview`
--
DROP TABLE IF EXISTS `ratingview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ratingview`  AS SELECT `ratings`.`RatingID` AS `RatingID`, `ratings`.`Score` AS `Score`, `ratings`.`Comment` AS `Comment`, `ratings`.`Date` AS `Date`, `ratings`.`DoctorID` AS `DoctorID` FROM `ratings` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD UNIQUE KEY `FastAppointment` (`Place`),
  ADD KEY `DoctorID` (`DoctorID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `FastCustomer` (`FirstName`,`LastName`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DoctorID`),
  ADD UNIQUE KEY `FastDoctorSearch` (`FirstName`,`LastName`,`Location`,`Specialization`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`EducationID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`MedicalHistoryID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `pastemployment`
--
ALTER TABLE `pastemployment`
  ADD PRIMARY KEY (`PastEmploymentID`),
  ADD KEY `DoctorID` (`DoctorID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`RatingID`),
  ADD UNIQUE KEY `FastRatings` (`Comment`,`RatingID`) USING BTREE,
  ADD KEY `DoctorID` (`DoctorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `DoctorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `EducationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `MedicalHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pastemployment`
--
ALTER TABLE `pastemployment`
  MODIFY `PastEmploymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pastemployment`
--
ALTER TABLE `pastemployment`
  ADD CONSTRAINT `pastemployment_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctor` (`DoctorID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
