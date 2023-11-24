-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 05:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group10database`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID_member` int(11) NOT NULL,
  `Name` char(255) NOT NULL,
  `Height` int(11) NOT NULL,
  `Weight` int(11) NOT NULL,
  `PIN` int(11) NOT NULL,
  `ID_Trainer` int(11) DEFAULT NULL,
  `ID_NutritionPlan` int(11) DEFAULT NULL,
  `ID_Program` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID_member`, `Name`, `Height`, `Weight`, `PIN`, `ID_Trainer`, `ID_NutritionPlan`, `ID_Program`) VALUES
(13, 'James', 170, 65, 1111, 1, 1, NULL),
(14, 'Starkk', 160, 55, 2222, 1, 2, NULL),
(15, 'Billy', 180, 75, 3333, 2, 3, NULL),
(16, 'Ashesley', 165, 60, 4444, 2, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nutritionplan`
--

CREATE TABLE `nutritionplan` (
  `NutritionPlanID` int(11) NOT NULL,
  `Name` char(255) NOT NULL,
  `Calories` int(11) NOT NULL,
  `Protein` int(11) NOT NULL,
  `Fat` int(11) NOT NULL,
  `Other` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Dumping data for table `nutritionplan`
--

INSERT INTO `nutritionplan` (`NutritionPlanID`, `Name`, `Calories`, `Protein`, `Fat`, `Other`) VALUES
(1, 'Chicken Meat', 200, 25, 10, 5),
(2, 'Pork Meat', 300, 18, 25, 8),
(3, 'Beef Meat', 250, 30, 15, 10),
(4, 'Vegetables', 100, 5, 1, 15),
(5, 'Fruits', 150, 1, 0, 30),
(6, 'Dairy Products', 200, 15, 10, 12),
(7, 'Grains', 180, 8, 2, 20),
(8, 'Nuts', 120, 6, 10, 8),
(9, 'Legumes', 160, 9, 2, 15),
(10, 'Other Food', 100, 3, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ProgramID` int(11) NOT NULL,
  `ProgramName` char(255) NOT NULL,
  `Description` text NOT NULL,
  `Duration` int(11) NOT NULL,
  `NutritionPlan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ProgramID`, `ProgramName`, `Description`, `Duration`, `NutritionPlan`) VALUES
(1, '', 'Weight Loss', 30, 1),
(2, '', 'Muscle Gain', 60, 2),
(3, '', 'Cardio Fitness', 45, 3),
(4, '', 'Wellness Program', 90, 4);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `TrainerID` int(11) NOT NULL,
  `TrainerName` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`TrainerID`, `TrainerName`) VALUES
(1, 'John Doe'),
(2, 'Jane Smith'),
(3, 'Bob Johnson'),
(4, 'Alice Williams');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID_member`),
  ADD KEY `ID_Trainer` (`ID_Trainer`),
  ADD KEY `ID_NutritionPlane` (`ID_NutritionPlan`),
  ADD KEY `ID_Program` (`ID_Program`);

--
-- Indexes for table `nutritionplan`
--
ALTER TABLE `nutritionplan`
  ADD PRIMARY KEY (`NutritionPlanID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ProgramID`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`TrainerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nutritionplan`
--
ALTER TABLE `nutritionplan`
  MODIFY `NutritionPlanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `ProgramID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `TrainerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`ID_Trainer`) REFERENCES `trainer` (`TrainerID`),
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`ID_NutritionPlan`) REFERENCES `nutritionplan` (`NutritionPlanID`),
  ADD CONSTRAINT `member_ibfk_3` FOREIGN KEY (`ID_Program`) REFERENCES `program` (`ProgramID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
