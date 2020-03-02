-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2020 at 09:53 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `LoginMember`
--

CREATE TABLE `LoginMember` (
  `TraineeID` varchar(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `PasswordHash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LoginMember`
--

INSERT INTO `LoginMember` (`TraineeID`, `Username`, `PasswordHash`) VALUES
('69292', 'darcher17', '468cf6ed6c70b740f0dca820313b89fe4be68b88cd06bbf6f58ab7df33321de1'),
('90435', 'csmith19', 'a9f5b9b343bd78c563a97f875bc9272b2c3f9a25f2e8f749915b397892dca3ab'),
('95671', 'hchen21', '5ee42be7dd6cdfca6379edcaf5e360533fb2bee54ef4af6d7b2ff18b5a305e15'),
('99999', 'guest', '2055ddd818846a0f31b6aaded71968dfa154d010a90ddd84b9695c8c85612fac');

-- --------------------------------------------------------

--
-- Table structure for table `ResidentIDDefinition`
--

CREATE TABLE `ResidentIDDefinition` (
  `TraineeID` varchar(11) NOT NULL,
  `FirstName` varchar(25) NOT NULL,
  `MiddleName` varchar(25) DEFAULT '',
  `LastName` varchar(25) NOT NULL,
  `IsCurrentTrainee` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ResidentIDDefinition`
--

INSERT INTO `ResidentIDDefinition` (`TraineeID`, `FirstName`, `MiddleName`, `LastName`, `IsCurrentTrainee`) VALUES
('69292', 'Darlene', '', 'Archer', 'Y'),
('90435', 'Clayton', '', 'Smith', 'Y'),
('95671', 'Harry', '', 'Chien', 'Y'),
('99999', 'Guest', '', 'Resident', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `TeachingFileData`
--

CREATE TABLE `TeachingFileData` (
  `Category` varchar(25) NOT NULL,
  `CaseUUID` varchar(64) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `Notes` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TeachingFileData`
--

INSERT INTO `TeachingFileData` (`Category`, `CaseUUID`, `Description`, `Notes`) VALUES
('Glioblastoma', '31b546f9-89b5aab5-a94ae131-8b595e18-2ca46cf7', 'Case 3', 'TCGA-02-0006'),
('Lung Cancer', '61d93907-fe195778-f9f673f8-73a00911-4d7b66e2', 'Case 1', 'LIDC-IDRI-0013'),
('Glioblastoma', '6c45824d-1f0896f3-ee7021e3-d76cfed0-ffc188df', 'Case 2', 'TCGA-02-0009'),
('Lung Cancer', '78872b16-54d854fe-e3620134-253a576f-e49acda0', 'Case 4', 'LIDC-IDRI-0016'),
('Lung Cancer', 'b6ecfca2-fc5b6d38-8a2fa819-0b3639bc-559bea7c', 'Case 3', 'LIDC-IDRI-0014'),
('Glioblastoma', 'cb75889b-5abcf586-f1b3207f-b0b6d70d-afd6789f', 'Case 1', 'TCGA-02-0046'),
('Lung Cancer', 'd517b071-fc9e5886-c14c9fa8-2a5b82bb-9154439f', 'Case 2', 'LIDC-IDRI-0015');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `LoginMember`
--
ALTER TABLE `LoginMember`
  ADD PRIMARY KEY (`TraineeID`);

--
-- Indexes for table `ResidentIDDefinition`
--
ALTER TABLE `ResidentIDDefinition`
  ADD PRIMARY KEY (`TraineeID`);

--
-- Indexes for table `TeachingFileData`
--
ALTER TABLE `TeachingFileData`
  ADD PRIMARY KEY (`CaseUUID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

