-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 21, 2022 at 04:59 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndsoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `CreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ParentId` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `ParentId` (`ParentId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Id`, `Name`, `CreatedDate`, `ParentId`) VALUES
(1, 'Abhijeet', '2022-09-21 22:19:09', 0),
(2, 'abritio', '2022-09-21 22:19:45', 1),
(3, 'Bala', '2022-09-21 22:20:06', 2),
(4, 'sadhashiv', '2022-09-21 22:20:34', 2),
(5, 'sachin', '2022-09-21 22:20:50', 4),
(6, 'Sid', '2022-09-21 22:21:08', 1),
(7, 'Raghven', '2022-09-21 22:21:37', 6),
(8, 'Awind', '2022-09-21 22:21:54', 7),
(9, 'David', '2022-09-21 22:22:11', 8),
(10, 'sarvesh', '2022-09-21 22:22:39', 9),
(11, 'anup', '2022-09-21 22:23:02', 8),
(12, 'Manjiri', '2022-09-21 22:23:21', 6),
(13, 'vasim kudle', '2022-09-21 22:24:07', 1),
(14, 'Sunel', '2022-09-21 22:24:17', 0),
(15, 'Mohit', '2022-09-21 22:24:35', 14);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
