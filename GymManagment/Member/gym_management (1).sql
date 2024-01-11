-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2024 at 10:16 PM
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
-- Database: `gym_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `diet`
--

CREATE TABLE `diet` (
  `dietID` int(5) NOT NULL,
  `dietDescription` varchar(500) DEFAULT NULL,
  `calories` int(5) DEFAULT NULL,
  `carbs` int(5) DEFAULT NULL,
  `proteins` int(5) DEFAULT NULL,
  `fats` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diet`
--

INSERT INTO `diet` (`dietID`, `dietDescription`, `calories`, `carbs`, `proteins`, `fats`) VALUES
(1, 'Chicken Breast', 165, 0, 31, 4),
(2, 'Broccoli', 55, 11, 4, 1),
(3, 'Brown Rice', 216, 44, 5, 2),
(4, 'Banana', 105, 27, 1, 0),
(5, 'Almonds', 579, 22, 21, 50),
(6, 'Oats', 389, 66, 17, 7),
(7, 'Eggs', 155, 1, 13, 11),
(8, 'Sweet Potato', 86, 20, 2, 0),
(9, 'Avocado', 160, 9, 2, 15),
(10, 'Salmon', 208, 0, 20, 13);

-- --------------------------------------------------------

--
-- Table structure for table `dietlog`
--

CREATE TABLE `dietlog` (
  `logID` int(5) NOT NULL,
  `date` date NOT NULL,
  `caloriesConsumed` int(5) NOT NULL,
  `carbsConsumed` int(5) NOT NULL,
  `proteinsConsumed` int(5) NOT NULL,
  `fatsConsumed` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `dietPlan` int(10) DEFAULT NULL,
  `workoutPlan` int(10) DEFAULT NULL,
  `height` int(3) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  `workoutLog` int(10) DEFAULT NULL,
  `dietLog` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `username`, `password`, `dietPlan`, `workoutPlan`, `height`, `weight`, `workoutLog`, `dietLog`) VALUES
(1, 'Keith', '$2y$10$4iC0oHdv1VhMh3vHf6', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainerID` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `dietPlan` int(10) DEFAULT NULL,
  `workoutPlan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `workoutID` int(6) NOT NULL,
  `workoutDescription` varchar(500) NOT NULL,
  `duration` int(3) DEFAULT NULL,
  `caloriesBurned` int(6) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout`
--

INSERT INTO `workout` (`workoutID`, `workoutDescription`, `duration`, `caloriesBurned`, `name`) VALUES
(11, 'An exercise involving raising and lowering the body using the arms', 10, 10, 'Push-ups'),
(12, 'An upper body strength exercise', 10, 15, 'Pull-ups'),
(13, 'A lower body workout targeting thighs, hips, buttocks, quads', 15, 8, 'Squats'),
(14, 'Strengthening, sculpting and building several muscles', 10, 9, 'Lunges'),
(15, 'An isometric core strength exercise', 5, 5, 'Planks'),
(16, 'A full body workout focusing on coordination, stamina, speed', 15, 12, 'Jump Rope'),
(17, 'An abdominal endurance training exercise', 10, 9, 'Sit-ups'),
(18, 'A full body exercise used in strength training', 15, 10, 'Burpees'),
(19, 'A weight training exercise', 20, 20, 'Deadlifts'),
(20, 'A chest building exercise', 15, 15, 'Bench Press'),
(21, 'An exercise involving raising and lowering the body using the arms', 10, 10, 'Push-ups'),
(22, 'An upper body strength exercise', 10, 15, 'Pull-ups'),
(23, 'A lower body workout targeting thighs, hips, buttocks, quads', 15, 8, 'Squats'),
(24, 'Strengthening, sculpting and building several muscles', 10, 9, 'Lunges'),
(25, 'An isometric core strength exercise', 5, 5, 'Planks'),
(26, 'A full body workout focusing on coordination, stamina, speed', 15, 12, 'Jump Rope'),
(27, 'An abdominal endurance training exercise', 10, 9, 'Sit-ups'),
(28, 'A full body exercise used in strength training', 15, 10, 'Burpees'),
(29, 'A weight training exercise', 20, 20, 'Deadlifts'),
(30, 'A chest building exercise', 15, 15, 'Bench Press'),
(31, 'An exercise involving raising and lowering the body using the arms', 10, 10, 'Push-ups'),
(32, 'An upper body strength exercise', 10, 15, 'Pull-ups'),
(33, 'A lower body workout targeting thighs, hips, buttocks, quads', 15, 8, 'Squats'),
(34, 'Strengthening, sculpting and building several muscles', 10, 9, 'Lunges'),
(35, 'An isometric core strength exercise', 5, 5, 'Planks'),
(36, 'A full body workout focusing on coordination, stamina, speed', 15, 12, 'Jump Rope'),
(37, 'An abdominal endurance training exercise', 10, 9, 'Sit-ups'),
(38, 'A full body exercise used in strength training', 15, 10, 'Burpees'),
(39, 'A weight training exercise', 20, 20, 'Deadlifts'),
(40, 'A chest building exercise', 15, 15, 'Bench Press');

-- --------------------------------------------------------

--
-- Table structure for table `workoutlog`
--

CREATE TABLE `workoutlog` (
  `logID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `caloriesBurned` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diet`
--
ALTER TABLE `diet`
  ADD PRIMARY KEY (`dietID`);

--
-- Indexes for table `dietlog`
--
ALTER TABLE `dietlog`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainerID`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`workoutID`);

--
-- Indexes for table `workoutlog`
--
ALTER TABLE `workoutlog`
  ADD PRIMARY KEY (`logID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diet`
--
ALTER TABLE `diet`
  MODIFY `dietID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dietlog`
--
ALTER TABLE `dietlog`
  MODIFY `logID` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `trainerID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `workoutID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `workoutlog`
--
ALTER TABLE `workoutlog`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
