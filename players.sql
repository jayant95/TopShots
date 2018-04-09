-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 12:51 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topshots`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `age` smallint(6) DEFAULT NULL,
  `gamesPlayed` smallint(6) DEFAULT NULL,
  `wins` smallint(6) DEFAULT NULL,
  `losses` smallint(6) DEFAULT NULL,
  `minutes` double DEFAULT NULL,
  `points` double DEFAULT NULL,
  `fgMade` double DEFAULT NULL,
  `fgAttempted` double DEFAULT NULL,
  `fgPercentage` double DEFAULT NULL,
  `3PM` double DEFAULT NULL,
  `3PA` double DEFAULT NULL,
  `3Ppercentage` double DEFAULT NULL,
  `ftMade` double DEFAULT NULL,
  `ftAttempted` double DEFAULT NULL,
  `ftPercentage` double DEFAULT NULL,
  `offRebounds` double DEFAULT NULL,
  `defRebounds` double DEFAULT NULL,
  `rebounds` double DEFAULT NULL,
  `assists` double DEFAULT NULL,
  `turnovers` double DEFAULT NULL,
  `steals` double DEFAULT NULL,
  `blocks` double DEFAULT NULL,
  `fouls` double DEFAULT NULL,
  `plusMinus` double DEFAULT NULL,
  `twitter` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `team`, `age`, `gamesPlayed`, `wins`, `losses`, `minutes`, `points`, `fgMade`, `fgAttempted`, `fgPercentage`, `3PM`, `3PA`, `3Ppercentage`, `ftMade`, `ftAttempted`, `ftPercentage`, `offRebounds`, `defRebounds`, `rebounds`, `assists`, `turnovers`, `steals`, `blocks`, `fouls`, `plusMinus`, `twitter`) VALUES
(1, 'Russell Westbrook', 'OKC', 28, 81, 46, 35, 34.6, 31.6, 10.2, 24, 42.5, 2.5, 7.2, 34.3, 8.8, 10.4, 84.5, 1.7, 9, 10.7, 10.4, 5.4, 1.6, 0.4, 2.3, 3.1, 'https://twitter.com/russwest44?ref_src=twsrc%5Etfw'),
(2, 'James Harden', 'HOU', 27, 81, 54, 27, 36.4, 29.1, 8.3, 18.9, 44, 3.2, 9.3, 34.7, 9.2, 10.9, 84.7, 1.2, 7, 8.1, 11.2, 5.7, 1.5, 0.5, 2.7, 5.2, 'https://twitter.com/JHarden13?ref_src=twsrc%5Etfw'),
(3, 'Isaiah Thomas', 'BOS', 28, 76, 51, 25, 33.8, 28.9, 9, 19.4, 46.3, 3.2, 8.5, 37.9, 7.8, 8.5, 90.9, 0.6, 2.1, 2.7, 5.9, 2.8, 0.9, 0.2, 2.2, 3.6, 'https://twitter.com/isaiahthomas?ref_src=twsrc%5Etfw'),
(4, 'Anthony Davis', 'NOP', 24, 75, 31, 44, 36.1, 28, 10.3, 20.3, 50.5, 0.5, 1.8, 29.9, 6.9, 8.6, 80.2, 2.3, 9.5, 11.8, 2.1, 2.4, 1.3, 2.2, 2.2, 0.7, 'https://twitter.com/AntDavis23?ref_src=twsrc%5Etfw'),
(5, 'DeMar DeRozan', 'TOR', 27, 74, 47, 27, 35.4, 27.3, 9.7, 20.9, 46.7, 0.4, 1.7, 26.6, 7.4, 8.7, 84.2, 0.9, 4.3, 5.2, 3.9, 2.4, 1.1, 0.2, 1.8, 2, 'https://twitter.com/DeMar_DeRozan?ref_src=twsrc%5Etfw'),
(6, 'Damian Lillard', 'POR', 26, 75, 38, 37, 35.9, 27, 8.8, 19.8, 44.4, 2.9, 7.7, 37, 6.5, 7.3, 89.5, 0.6, 4.3, 4.9, 5.9, 2.6, 0.9, 0.3, 2, 1.1, 'https://twitter.com/Dame_Lillard?ref_src=twsrc%5Etfw'),
(7, 'DeMarcus Cousins', 'NOP', 26, 72, 30, 42, 34.2, 27, 9, 19.9, 45.2, 1.8, 5, 36.1, 7.2, 9.3, 77.2, 2.1, 8.9, 11, 4.6, 3.7, 1.4, 1.3, 3.9, -0.3, 'https://twitter.com/boogiecousins?ref_src=twsrc%5Etfw'),
(8, 'LeBron James', 'CLE', 32, 74, 51, 23, 37.8, 26.4, 9.9, 18.2, 54.8, 1.7, 4.6, 36.3, 4.8, 7.2, 67.4, 1.3, 7.3, 8.6, 8.7, 4.1, 1.2, 0.6, 1.8, 6.5, 'https://twitter.com/KingJames?ref_src=twsrc%5Etfw'),
(9, 'Stephen Curry', 'GSW', 29, 79, 65, 14, 33.4, 25.3, 8.5, 18.3, 46.8, 4.1, 10, 41.1, 4.1, 4.6, 89.8, 0.8, 3.7, 4.5, 6.6, 3, 1.8, 0.2, 2.3, 12.8, 'https://twitter.com/stephencurry30?ref_src=twsrc%5Etfw'),
(10, 'Kyrie Irving', 'CLE', 25, 72, 47, 25, 35.1, 25.2, 9.3, 19.7, 47.3, 2.5, 6.1, 40.1, 4.1, 4.6, 90.5, 0.7, 2.5, 3.2, 5.8, 2.5, 1.2, 0.3, 2.2, 4.6, 'https://twitter.com/kyrieirving?ref_src=twsrc%5Etfw'),
(11, 'Karl-Anthony Towns', 'MIN', 21, 82, 31, 51, 37, 25.1, 9.8, 18, 54.2, 1.2, 3.4, 36.7, 4.3, 5.2, 83.2, 3.6, 8.7, 12.3, 2.7, 2.6, 0.7, 1.3, 2.9, -0.3, NULL),
(13, 'Kevin Durant', 'GSW', 28, 62, 51, 11, 33.4, 25.1, 8.9, 16.5, 53.7, 1.9, 5, 37.5, 5.4, 6.2, 87.5, 0.6, 7.6, 8.3, 4.8, 2.2, 1.1, 1.6, 1.9, 11.5, 'https://twitter.com/KDTrey5?ref_src=twsrc%5Etfw'),
(14, 'Jimmy Butler', 'CHI', 27, 76, 40, 36, 37, 23.9, 7.5, 16.5, 45.5, 1.2, 3.3, 36.7, 7.7, 8.9, 86.5, 1.7, 4.5, 6.2, 5.5, 2.1, 1.9, 0.4, 1.5, 2.7, NULL),
(15, 'Paul George', 'IND', 27, 75, 39, 36, 35.9, 23.7, 8.3, 18, 46.1, 2.6, 6.6, 39.3, 4.5, 5, 89.8, 0.8, 5.8, 6.6, 3.3, 2.9, 1.6, 0.4, 2.7, 2.3, NULL),
(16, 'Andrew Wiggins', 'MIN', 22, 82, 31, 51, 37.2, 23.6, 8.6, 19.1, 45.2, 1.3, 3.5, 35.6, 5, 6.6, 76, 1.2, 2.8, 4, 2.3, 2.3, 1, 0.4, 2.2, -0.2, NULL),
(17, 'Kemba Walker', 'CHA', 27, 79, 36, 43, 34.7, 23.2, 8.1, 18.3, 44.4, 3, 7.6, 39.9, 3.8, 4.5, 84.7, 0.6, 3.3, 3.9, 5.5, 2.1, 1.1, 0.3, 1.5, 2.4, NULL),
(18, 'John Wall', 'WAS', 26, 78, 48, 30, 36.4, 23.1, 8.3, 18.4, 45.1, 1.1, 3.5, 32.7, 5.4, 6.8, 80.1, 0.8, 3.4, 4.2, 10.7, 4.1, 2, 0.6, 1.9, 3.2, NULL),
(19, 'Bradley Beal', 'WAS', 24, 77, 48, 29, 34.9, 23.1, 8.3, 17.2, 48.2, 2.9, 7.2, 40.4, 3.7, 4.4, 82.5, 0.7, 2.4, 3.1, 3.5, 2, 1.1, 0.3, 2.2, 4.3, NULL),
(20, 'CJ McCollum', 'POR', 25, 80, 40, 40, 34.9, 23, 8.7, 18, 48, 2.3, 5.5, 42.1, 3.4, 3.7, 91.2, 0.8, 2.9, 3.6, 3.6, 2.2, 0.9, 0.5, 2.5, 0.8, NULL),
(21, 'Giannis Antetokounmpo', 'MIL', 22, 80, 42, 38, 35.6, 22.9, 8.2, 15.7, 52.1, 0.6, 2.3, 27.2, 5.9, 7.7, 77, 1.8, 7, 8.8, 5.4, 2.9, 1.6, 1.9, 3.1, 0.6, NULL),
(22, 'Carmelo Anthony', 'NYK', 33, 74, 29, 45, 34.3, 22.4, 8.1, 18.8, 43.3, 2, 5.7, 35.9, 4.1, 4.9, 83.3, 0.8, 5.1, 5.9, 2.9, 2.1, 0.8, 0.5, 2.7, -3, NULL),
(23, 'Kyle Lowry', 'TOR', 31, 60, 36, 24, 37.4, 22.4, 7.1, 15.3, 46.4, 3.2, 7.8, 41.2, 5, 6.1, 81.9, 0.8, 4, 4, 7, 2.9, 1.5, 0.3, 2.8, 6, NULL),
(24, 'Klay Thompson', 'GSW', 27, 78, 66, 12, 34, 22.3, 8.3, 17.6, 46.8, 3.4, 8.3, 41.4, 2.4, 2.8, 85.3, 0.6, 3, 3.7, 2.1, 1.6, 0.8, 0.5, 1.8, 10.3, NULL),
(25, 'Devin Booker', 'PHX', 20, 78, 24, 54, 35, 22.1, 7.8, 18.3, 42.3, 1.9, 5.2, 36.3, 4.7, 5.7, 83.2, 0.6, 2.6, 3.2, 3.4, 3.1, 0.9, 0.3, 3.1, -2.9, NULL),
(26, 'Gordon Hayward', 'UTA', 27, 73, 46, 27, 34.5, 21.9, 7.5, 15.8, 47.1, 2, 5.1, 39.8, 5, 5.9, 84.4, 0.7, 4.7, 5.4, 3.5, 1.9, 1, 0.3, 1.6, 4.8, NULL),
(27, 'Blake Griffin', 'LAC', 28, 61, 40, 21, 34, 21.6, 7.9, 15.9, 49.3, 0.6, 1.9, 33.6, 5.2, 6.9, 76, 1.8, 6.3, 8.1, 4.9, 2.3, 0.9, 0.3, 2.6, 7.2, NULL),
(28, 'Eric Bledsoe', 'PHX', 27, 66, 22, 44, 33, 21.1, 6.8, 15.7, 43.4, 1.6, 4.7, 33.5, 5.9, 6.9, 84.7, 0.8, 4.1, 4.8, 6.3, 3.4, 1.4, 0.5, 2.5, -2.8, NULL),
(29, 'Brook Lopez', 'BKN', 29, 75, 20, 55, 29.6, 20.5, 7.4, 15.6, 47.4, 1.8, 5.2, 34.6, 3.9, 4.9, 81, 1.6, 3.8, 5.4, 2.3, 2.5, 0.5, 1.7, 2.6, -2.1, NULL),
(30, 'Mike Conley', 'MEM', 29, 69, 35, 34, 33.2, 20.5, 6.7, 14.6, 46, 2.5, 6.1, 40.8, 4.6, 5.3, 85.9, 0.4, 3, 3.5, 6.3, 2.3, 1.3, 0.3, 1.8, 2.7, NULL),
(31, 'Goran Dragic', 'MIA', 31, 73, 40, 33, 33.7, 20.3, 7.3, 15.4, 47.5, 1.6, 4, 40.5, 4.1, 5.2, 79, 0.8, 3, 3.8, 5.8, 2.9, 1.2, 0.2, 2.7, 0.9, NULL),
(32, 'Joel Embiid', 'PHI', 23, 31, 13, 18, 25.4, 20.2, 6.5, 13.8, 46.6, 1.2, 3.2, 36.7, 6.2, 7.9, 78.3, 2, 5.9, 7.8, 2.1, 3.8, 0.9, 2.5, 3.6, 2.2, NULL),
(33, 'Jabari Parker', 'MIL', 22, 51, 22, 29, 33.9, 20.1, 7.8, 16, 49, 1.3, 3.5, 36.5, 3.2, 4.3, 74.3, 1.5, 4.6, 6.2, 2.8, 1.8, 1, 0.4, 2.2, -1.7, NULL),
(34, 'Marc Gasol', 'MEM', 32, 74, 40, 34, 34.2, 19.5, 7.2, 15.7, 45.9, 1.4, 3.6, 38.8, 3.8, 4.5, 83.7, 0.8, 5.5, 6.3, 4.6, 2.2, 0.9, 1.3, 2.3, 0.9, NULL),
(35, 'Harrison Barnes', 'DAL', 25, 79, 32, 47, 35.5, 19.2, 7.6, 16.2, 46.8, 1, 2.8, 35.1, 3.1, 3.6, 86.1, 1.2, 3.8, 5, 1.5, 1.3, 0.8, 0.2, 1.6, -1.7, NULL),
(36, 'Kevin Love', 'CLE', 28, 60, 40, 20, 31.4, 19, 6.2, 14.5, 42.7, 2.4, 6.5, 37.3, 4.3, 4.9, 87.1, 2.5, 8.6, 11.1, 1.9, 2, 0.9, 0.4, 2.1, 5.6, NULL),
(37, 'Zach Lavine', 'MIN', 22, 47, 16, 31, 37.2, 18.9, 6.9, 15.1, 45.9, 2.6, 6.6, 38.7, 2.5, 3, 83.6, 0.4, 3, 3.4, 3, 1.8, 0.9, 0.2, 2.2, -2.5, NULL),
(38, 'Rudy Gay', 'SAC', 30, 30, 11, 19, 33.8, 18.7, 6.7, 14.7, 45.5, 1.4, 3.8, 37.2, 3.9, 4.6, 85.5, 1.2, 5.2, 6.3, 2.8, 2.5, 1.5, 0.9, 2.6, 2.3, NULL),
(39, 'Dwyane Wade', 'CHI', 35, 60, 29, 31, 29.9, 18.3, 6.9, 15.9, 43.4, 0.8, 2.4, 31, 3.7, 4.7, 79.4, 1.1, 3.5, 4.5, 3.8, 2.3, 1.4, 0.7, 1.9, -1.2, NULL),
(40, 'Danillo Gallinari', 'DEN', 28, 63, 31, 32, 33.9, 18.2, 5.3, 11.9, 44.7, 2, 5.1, 38.9, 5.5, 6.1, 90.2, 0.6, 4.5, 5.2, 2.1, 1.3, 0.6, 0.2, 1.5, 2.5, NULL),
(41, 'Kristaps Porzingis', 'NYK', 21, 66, 26, 40, 32.8, 18.1, 6.7, 14.9, 45, 1.7, 4.8, 35.7, 3, 3.8, 78.6, 1.7, 5.5, 7.2, 1.5, 1.8, 0.7, 2, 3.7, -1.5, NULL),
(42, 'Chris Paul', 'LAC', 32, 61, 43, 18, 31.5, 18.1, 6.1, 12.9, 47.6, 2, 5, 41.1, 3.8, 4.3, 89.2, 0.7, 4.3, 5, 9.2, 2.4, 2, 0.1, 2.4, 9.5, NULL),
(43, 'Paul Millsap', 'ATL', 32, 69, 40, 29, 34, 18.1, 6.2, 14.1, 44.2, 1.1, 3.5, 31.1, 4.5, 5.9, 76.8, 1.6, 6.1, 7.7, 3.7, 2.3, 1.3, 0.9, 2.7, 1.9, NULL),
(44, 'Derrick Rose', 'NYK', 28, 64, 26, 38, 32.5, 18, 7.2, 15.3, 47.1, 0.2, 0.9, 21.7, 3.5, 4, 87.4, 1, 2.8, 3.8, 4.4, 2.3, 0.7, 0.3, 1.3, -2.6, NULL),
(45, 'Dennis Schroder', 'ATL', 23, 79, 42, 37, 31.5, 17.9, 6.9, 15.4, 45.1, 1.3, 3.7, 34, 2.8, 3.2, 85.5, 0.5, 2.6, 3.1, 6.3, 3.3, 0.9, 0.2, 1.9, -1, NULL),
(46, 'Lou Williams', 'HOU', 30, 81, 34, 47, 24.6, 17.5, 5.3, 12.3, 42.9, 2, 5.5, 36.5, 5, 5.6, 88, 0.3, 2.2, 2.5, 3, 2, 1, 0.2, 1.1, 0.6, NULL),
(47, 'LaMarcus Aldridge', 'SAS', 31, 72, 52, 20, 32.4, 17.3, 6.9, 14.6, 47.7, 0.3, 0.8, 41.1, 3.1, 3.8, 81.2, 2.4, 4.9, 7.3, 1.9, 1.4, 0.6, 1.2, 2.2, 3.8, NULL),
(48, 'Evan Fournier', 'ORL', 24, 68, 23, 45, 32.8, 17.2, 6, 13.7, 43.9, 1.9, 5.3, 35.6, 3.3, 4.1, 80.5, 0.6, 2.4, 3.1, 3, 2.1, 1, 0.1, 2.6, -2.9, NULL),
(49, 'Hassan Whiteside', 'MIA', 28, 77, 39, 38, 32.6, 17, 7, 12.6, 55.7, 0, 0, 0, 2.9, 4.6, 62.8, 3.8, 10.3, 14.1, 0.7, 2, 0.7, 2.1, 2.9, 1.3, NULL),
(50, 'George Hill', 'UTA', 31, 49, 33, 16, 31.5, 16.9, 5.9, 12.4, 47.7, 1.9, 4.8, 40.3, 3.2, 4, 80.1, 0.5, 2.9, 3.4, 4.2, 1.7, 1, 0.2, 2.3, 5.2, NULL),
(51, 'Nikola Jokic', 'DEN', 22, 73, 37, 36, 27.9, 16.7, 6.8, 11.7, 57.8, 0.6, 1.9, 32.4, 2.6, 3.1, 82.5, 2.9, 6.9, 9.8, 4.9, 2.3, 0.8, 0.8, 2.9, 4.1, NULL),
(52, 'Avery Bradley', 'BOS', 26, 55, 34, 21, 33.4, 16.3, 6.5, 14.1, 46.3, 2, 5, 39, 1.2, 1.7, 73.1, 1.2, 4.9, 6.1, 2.2, 1.6, 1.2, 0.2, 2.6, 1.3, NULL),
(53, 'Eric Gordon', 'HOU', 28, 75, 50, 25, 31, 16.2, 5.5, 13.5, 40.6, 3.3, 8.8, 37.2, 2, 2.3, 84, 0.4, 2.3, 2.7, 2.5, 1.6, 0.6, 0.5, 2, 3.9, NULL),
(54, 'Tobias Harris', 'DET', 24, 82, 37, 45, 31.3, 16.1, 6.2, 13, 48.1, 1.3, 3.8, 34.7, 2.3, 2.8, 84.1, 0.8, 4.3, 5.1, 1.7, 1.2, 0.7, 0.5, 1.6, 0, NULL),
(55, 'Victor Oladipo', 'OKC', 25, 67, 39, 28, 33.2, 15.9, 6.1, 13.9, 44.2, 1.9, 5.3, 36.1, 1.7, 2.3, 75.3, 0.6, 3.8, 4.3, 2.6, 1.8, 1.2, 0.3, 2.3, 2.6, NULL),
(56, 'Dion Waiters', 'MIA', 25, 46, 27, 19, 30.1, 15.8, 6.1, 14.4, 42.4, 1.8, 4.7, 39.5, 1.8, 2.8, 64.6, 0.4, 2.9, 3.3, 4.3, 2.2, 0.9, 0.4, 2.1, 1.8, NULL),
(57, 'Avery Bradley', 'BOS', 26, 55, 34, 21, 33.4, 16.3, 6.5, 14.1, 46.3, 2, 5, 39, 1.2, 1.7, 73.1, 1.2, 4.9, 6.1, 2.2, 1.6, 1.2, 0.2, 2.6, 1.3, NULL),
(58, 'Wilson Chandler', 'DEN', 30, 71, 35, 36, 30.9, 15.7, 6.1, 13.2, 46.1, 1.5, 4.6, 33.7, 2, 2.7, 72.7, 1.5, 5, 6.5, 2, 1.6, 0.7, 0.4, 2.4, -0.5, NULL),
(59, 'DAngelo Russell', 'LAL', 21, 63, 21, 42, 28.7, 15.6, 5.6, 13.8, 40.5, 2.1, 6.1, 35.2, 2.3, 3, 78.2, 0.5, 3, 3.5, 4.8, 2.8, 1.4, 0.3, 2.1, -5.7, NULL),
(60, 'Jrue Holiday', 'NOP', 27, 67, 32, 35, 32.7, 15.4, 6, 13.3, 45.4, 1.5, 4.2, 35.6, 1.8, 2.5, 70.8, 0.7, 3.3, 3.9, 7.3, 2.9, 1.5, 0.7, 2, 0.6, NULL),
(61, 'Jeff Teague', 'IND', 29, 82, 42, 40, 32.4, 15.3, 4.9, 11.1, 44.2, 1.1, 3.1, 35.7, 4.4, 5.1, 86.7, 0.4, 3.6, 4, 7.8, 2.6, 1.2, 0.4, 2, 0.6, NULL),
(62, 'Nicolas Batum', 'CHA', 28, 77, 35, 42, 34, 15.1, 5.1, 12.7, 40.3, 1.8, 5.3, 33.3, 3.2, 3.7, 85.6, 0.6, 5.6, 6.2, 5.9, 2.5, 1.1, 0.4, 1.4, 0.9, NULL),
(63, 'JJ Redick', 'LAC', 33, 78, 50, 28, 28.2, 15, 5.1, 11.4, 44.5, 2.6, 6, 42.9, 2.3, 2.6, 89.1, 0.1, 2.1, 2.2, 1.4, 1.3, 0.7, 0.2, 1.6, 6, NULL),
(64, 'Gary Harris', 'DEN', 22, 57, 29, 28, 31.3, 14.9, 5.6, 11.2, 50.2, 1.9, 4.5, 42, 1.8, 2.4, 77.6, 0.8, 2.3, 3.1, 2.9, 1.3, 1.2, 0.1, 1.6, 1.4, NULL),
(65, 'Serge Ibaka', 'TOR', 27, 79, 37, 42, 30.7, 14.8, 6, 12.4, 48, 1.6, 4, 39.1, 1.4, 1.6, 85.6, 1.6, 5.2, 6.8, 0.9, 1.3, 1.5, 1.6, 2.7, -1.8, NULL),
(66, 'Jordan Clarkson', 'LAL', 25, 82, 26, 56, 29.2, 14.7, 5.8, 13.1, 44.5, 1.4, 4.3, 32.9, 1.6, 2, 79.8, 0.6, 2.4, 3, 2.6, 2, 1.1, 0.1, 1.8, -5.1, NULL),
(67, 'Khris Middleton', 'MIL', 25, 29, 19, 10, 30.7, 14.7, 5.2, 11.5, 45, 1.6, 3.6, 43.3, 2.8, 3.2, 88, 0.4, 3.9, 4.2, 3.4, 2.2, 1.4, 0.2, 2.7, 3.1, NULL),
(68, 'Nikola Vucevic', 'ORL', 26, 75, 27, 48, 38.8, 14.6, 6.4, 13.7, 46.8, 0.3, 1, 30.7, 1.4, 2.1, 66.9, 2.3, 8, 10.4, 2.8, 1.6, 1, 1, 2.4, -1.9, NULL),
(69, 'Jeremy Lin', 'BKN', 28, 36, 13, 23, 24.5, 14.5, 4.9, 11.1, 43.8, 1.6, 4.3, 37.2, 3.2, 3.9, 81.6, 0.3, 3.4, 3.8, 5.1, 2.4, 1.2, 0.4, 2.2, -2.3, NULL),
(70, 'Myles Turner', 'IND', 21, 81, 42, 39, 31.4, 14.5, 5.5, 10.7, 51.5, 0.5, 1.4, 34.8, 3, 3.7, 80.9, 1.7, 5.6, 7.3, 1.3, 1.3, 0.9, 2.1, 3.2, 1.8, NULL),
(71, 'Tim Haradway Jr.', 'ATL', 25, 79, 42, 37, 27.3, 14.5, 5.3, 11.5, 45.5, 1.9, 5.3, 35.7, 2.1, 2.7, 76.6, 0.4, 2.4, 2.8, 2.3, 1.3, 0.7, 0.2, 1.3, 2, NULL),
(72, 'Reggie Jackson', 'DET', 27, 52, 23, 29, 27.4, 14.5, 5.5, 13, 41.9, 1.3, 3.5, 35.9, 2.3, 2.6, 86.6, 0.4, 1.8, 2.2, 5.2, 2.2, 0.7, 0.1, 2.5, -4.3, NULL),
(73, 'TJ Warren', 'PHX', 23, 66, 20, 46, 31, 14.4, 6.1, 12.3, 49.5, 0.4, 1.5, 26.5, 1.8, 2.3, 77.3, 1.9, 3.2, 5.1, 1.1, 0.9, 1.2, 0.6, 2.7, -4.3, NULL),
(74, 'Enes Kanter', 'OKC', 25, 72, 43, 29, 21.3, 14.3, 5.6, 10.2, 54.5, 0.1, 0.5, 13.2, 3.1, 4, 78.6, 2.7, 4, 6.7, 0.9, 1.7, 0.4, 0.5, 2.1, 0.8, NULL),
(75, 'Dirk Nowitzki', 'DAL', 39, 54, 23, 31, 26.4, 14.2, 5.5, 12.6, 43.7, 1.5, 3.9, 37.8, 1.8, 2.1, 87.5, 0.4, 6.1, 6.5, 1.5, 0.9, 0.6, 0.7, 2.1, -0.3, NULL),
(76, 'Zach Randolph', 'MEM', 35, 73, 38, 35, 24.5, 14.1, 5.9, 13.2, 44.9, 0.3, 1.3, 22.3, 1.9, 2.6, 73.1, 2.5, 5.7, 8.2, 1.7, 1.4, 0.5, 0.1, 1.9, 1, NULL),
(77, 'Jordan Crawford', 'NOP', 28, 19, 9, 10, 23.3, 14.1, 5.5, 11.5, 48.2, 1.9, 5, 38.9, 1.1, 1.4, 76.9, 0.2, 1.6, 1.8, 3, 1.3, 0.6, 0.1, 1.6, 0.9, NULL),
(78, 'Rudy Gobert', 'UTA', 25, 81, 51, 30, 33.9, 14, 5.1, 7.7, 66.1, 0, 0, 0, 3.8, 5.9, 65.3, 3.9, 8.9, 12.8, 1.2, 1.8, 0.6, 2.6, 3, 5.4, NULL),
(79, 'Al Horford', 'BOS', 31, 68, 46, 22, 32.3, 14, 5.6, 11.8, 47.3, 1.3, 3.6, 35.5, 1.6, 2, 80, 1.4, 5.4, 6.8, 5, 1.7, 0.8, 1.3, 2, 3.2, NULL),
(80, 'Marcus Morris', 'DET', 27, 79, 36, 43, 32.5, 14, 5.3, 12.7, 41.8, 1.5, 4.5, 33.1, 1.8, 2.3, 78.4, 1, 3.7, 4.6, 2, 1.1, 0.7, 0.3, 2.1, -1.3, NULL),
(81, 'Markieff Morris', 'WAS', 27, 76, 45, 31, 31.2, 14, 5.3, 11.7, 45.7, 0.9, 2.6, 36.2, 2.4, 2.8, 83.7, 1.4, 5.1, 6.5, 1.7, 1.7, 1.1, 0.6, 3.3, 2.4, NULL),
(82, 'Jae Crowder', 'BOS', 26, 72, 48, 24, 32.4, 13.9, 4.6, 10, 46.3, 2.2, 5.5, 39.8, 2.4, 3, 81.1, 0.7, 5.1, 5.8, 2.2, 1.1, 1, 0.3, 2.2, 4.8, NULL),
(83, 'Kentavious Caldwell-Pope', 'DET', 24, 76, 33, 43, 33.3, 13.8, 4.9, 12.2, 39.9, 2, 5.8, 35, 2, 2.4, 83.2, 0.7, 2.5, 3.3, 2.5, 1.1, 1.2, 0.2, 1.6, -2, NULL),
(84, 'Bojan Bogdanovic', 'WAS', 28, 81, 23, 58, 25.7, 13.7, 4.6, 10.4, 44.5, 1.8, 4.8, 36.7, 2.7, 3, 89.3, 0.5, 3, 3.4, 1.4, 1.6, 0.4, 0.1, 1.8, -3.2, NULL),
(85, 'Tyler Johnson', 'MIA', 25, 73, 35, 38, 29.8, 13.7, 4.9, 11.3, 43.3, 1.3, 3.4, 37.2, 2.7, 3.5, 76.8, 0.7, 3.3, 4, 3.2, 1.2, 1.2, 0.6, 2.4, 0.5, NULL),
(86, 'Will Barton', 'DEN', 26, 60, 31, 29, 28.4, 13.7, 4.9, 11.1, 44.3, 1.5, 3.9, 37, 2.4, 3.2, 75.3, 1, 3.4, 4.3, 3.4, 1.6, 0.8, 0.5, 1.8, -1.3, NULL),
(87, 'Andre Drummond', 'DET', 23, 81, 36, 45, 29.7, 13.6, 6, 11.2, 53, 0, 0.1, 28.6, 1.7, 4.4, 38.6, 4.3, 9.5, 13.8, 1.1, 1.9, 1.5, 1.1, 2.9, -3.4, NULL),
(88, 'Ryan Anderson', 'HOU', 29, 72, 50, 22, 29.4, 13.6, 4.5, 10.7, 41.8, 2.8, 7, 40.3, 1.8, 2.1, 86, 1.6, 3, 4.6, 0.9, 0.8, 0.4, 0.2, 2, 5.7, NULL),
(89, 'Dwight Howard', 'ATL', 31, 74, 37, 37, 29.7, 13.5, 5.2, 8.3, 63.3, 0, 0, 0, 3.1, 5.7, 53.3, 4, 8.7, 12.7, 1.4, 2.3, 0.9, 1.2, 2.7, -1.5, NULL),
(90, 'Wesley Matthews', 'DAL', 30, 73, 29, 44, 34.2, 13.5, 4.6, 11.6, 39.3, 2.4, 6.6, 36.3, 2, 2.5, 81.6, 0.2, 3.3, 3.5, 2.9, 1.4, 1.1, 0.2, 2.2, -2.7, NULL),
(91, 'Otto Porter Jr.', 'WAS', 24, 80, 48, 32, 32.6, 13.4, 5.2, 10, 51.6, 1.9, 4.3, 43.4, 1.2, 1.5, 83.2, 1.5, 5, 6.4, 1.5, 0.6, 1.5, 0.5, 2.4, 2.4, NULL),
(92, 'Darren Collison', 'SAC', 29, 68, 26, 42, 30.3, 13.2, 5, 10.5, 47.6, 1.1, 2.6, 41.7, 2.2, 2.5, 86, 0.3, 1.9, 2.2, 4.6, 1.7, 1, 0.1, 1.8, -1.9, NULL),
(93, 'Nick Young', 'LAL', 32, 60, 19, 41, 25.9, 13.2, 4.5, 10.6, 43, 2.8, 7, 40.4, 1.3, 1.5, 85.6, 0.4, 1.9, 2.3, 1, 0.6, 0.6, 0.2, 2.3, -3.5, NULL),
(94, 'Julius Randle', 'LAL', 22, 74, 24, 50, 28.8, 13.2, 5.1, 10.4, 48.8, 0.2, 0.9, 27, 2.8, 3.8, 72.3, 2, 6.6, 8.6, 3.6, 2.3, 0.7, 0.5, 3.4, -6.1, NULL),
(95, 'Sean Kilpatrick', 'BKN', 27, 70, 14, 56, 25.1, 13.1, 4.4, 10.5, 41.5, 1.5, 4.4, 34.1, 2.9, 3.5, 84.3, 0.3, 3.7, 4, 2.2, 1.9, 0.6, 0.1, 1.7, -3.2, NULL),
(96, 'Ersan Ilyasova', 'ATL', 30, 82, 35, 47, 26.1, 13.1, 4.7, 10.9, 43.1, 1.7, 4.9, 35.3, 2, 2.5, 77.8, 1.4, 4.5, 5.9, 1.7, 1.4, 0.7, 0.3, 2.6, -0.4, NULL),
(97, 'Robert Covington', 'PHI', 26, 67, 27, 40, 31.6, 12.9, 4.4, 10.9, 39.9, 2, 6.1, 33.3, 2.1, 2.6, 88.2, 1.4, 5.1, 6.5, 1.5, 2, 1.9, 1, 3, -2.3, NULL),
(98, 'Dario Saric', 'PHI', 23, 81, 28, 53, 26.3, 12.8, 4.7, 11.4, 41.1, 1.3, 4.2, 31.1, 2.1, 2.7, 78.2, 1.4, 5, 6.3, 2.2, 2.3, 0.7, 0.4, 2, -3.8, NULL),
(99, 'James Johnson', 'MIA', 30, 76, 40, 36, 27.4, 12.8, 4.8, 10.1, 47.9, 1.1, 3.4, 34.4, 2, 2.8, 70.7, 0.9, 4.1, 4.9, 3.6, 2.3, 1, 1.1, 2.6, 1.8, NULL),
(100, 'Seth Curry', 'DAL', 26, 70, 30, 40, 29, 12.8, 4.8, 10, 48.1, 2, 4.6, 42.5, 1.2, 1.4, 85, 0.4, 2.2, 2.6, 2.7, 1.3, 1.1, 0.1, 1.8, -0.5, NULL),
(101, 'Elfrid Payton', 'ORL', 23, 82, 29, 53, 29.4, 12.8, 5.2, 11.1, 47.1, 0.5, 1.8, 27.4, 1.8, 2.6, 69.2, 1.1, 3.6, 4.7, 6.5, 2.2, 1.1, 0.5, 2.2, -1.8, NULL),
(102, 'Aaron Gordon', 'ORL', 21, 80, 29, 51, 28.7, 12.7, 4.9, 10.8, 45.4, 1, 3.3, 28.8, 2, 2.7, 71.9, 1.5, 3.6, 5.1, 1.9, 1.1, 0.8, 0.5, 2.2, -2, NULL),
(103, 'DeAndre Jordan', 'LAC', 28, 81, 51, 30, 31.7, 12.7, 5.1, 7.1, 71.4, 0, 0, 0, 2.5, 5.2, 48.2, 3.7, 10.1, 13.8, 1.2, 1.4, 0.6, 1.7, 2.6, 5.7, NULL),
(104, 'Rodney Hood', 'UTA', 24, 59, 40, 19, 27, 12.7, 4.6, 11.3, 40.8, 1.9, 5.2, 37.1, 1.5, 1.9, 78.3, 0.3, 3.2, 3.4, 1.6, 1.1, 0.6, 0.2, 2.2, 1.8, NULL),
(105, 'Clint Capela', 'HOU', 23, 65, 44, 21, 23.9, 12.6, 5.6, 8.7, 64.3, 0, 0, 0, 1.4, 2.7, 53.1, 2.7, 5.4, 8.1, 1, 1.3, 0.5, 1.2, 2.8, 3.3, NULL),
(106, 'Pau Gasol', 'SAS', 36, 64, 47, 17, 25.4, 12.4, 4.7, 9.4, 50.2, 0.9, 1.6, 53.8, 2, 2.9, 70.7, 1.7, 6.2, 7.8, 2.3, 1.3, 0.4, 1.1, 1.7, 3.5, NULL),
(107, 'Jamal Crawford', 'LAC', 37, 82, 51, 31, 26.3, 12.3, 4.4, 10.6, 41.3, 1.4, 3.9, 36, 2.1, 2.5, 85.7, 0.2, 1.4, 1.6, 2.6, 1.6, 0.7, 0.2, 1.4, 0.3, NULL),
(108, 'Austin Rivers', 'LAC', 24, 74, 43, 31, 27.8, 12, 4.4, 9.9, 44.2, 1.5, 4, 37.1, 1.8, 2.6, 69.1, 0.3, 1.9, 2.2, 2.8, 1.6, 0.6, 0.1, 2.5, 0, NULL),
(109, 'Jonas Valanciunas', 'TOR', 25, 80, 50, 30, 25.8, 12, 4.9, 8.8, 55.7, 0, 0, 50, 2.2, 2.7, 81.1, 2.8, 6.7, 9.5, 0.7, 1.3, 0.5, 0.8, 2.7, 1.4, NULL),
(110, 'Jahil Okafor', 'PHI', 21, 50, 15, 35, 22.7, 11.8, 4.8, 9.4, 51.4, 0, 0, 0, 2.1, 3.2, 67.1, 1.6, 3.2, 4.8, 1.2, 1.8, 0.4, 1, 2.4, -6.4, NULL),
(111, 'Greg Monroe', 'MIL', 27, 81, 42, 39, 22.5, 11.7, 4.8, 9, 53.3, 0, 0, 0, 2.2, 3, 74.1, 2.1, 4.5, 6.6, 2.3, 1.7, 1.1, 0.5, 2.1, 1.7, NULL),
(112, 'Trevor Ariza', 'HOU', 32, 80, 53, 27, 34.7, 11.7, 4.1, 10, 40.9, 2.4, 6.9, 34.4, 1.2, 1.6, 73.8, 0.7, 5.1, 5.7, 2.2, 0.9, 1.8, 0.3, 1.7, 4.6, NULL),
(113, 'Frank Kaminsky', 'CHA', 24, 75, 31, 44, 26.1, 11.7, 4.3, 10.7, 39.9, 1.5, 4.7, 32.8, 1.6, 2.1, 75.6, 0.8, 3.7, 4.5, 2.2, 1, 0.6, 0.5, 1.9, 0.6, NULL),
(114, 'Steven Adams', 'OKC', 23, 80, 47, 33, 29.9, 11.3, 4.7, 8.2, 57.1, 0, 0, 0, 2, 3.2, 61.1, 3.5, 4.2, 7.7, 1.1, 1.8, 1.1, 1, 2.4, 2.4, NULL),
(115, 'Marvin Williams', 'CHA', 31, 76, 32, 44, 30.2, 11.2, 3.9, 9.3, 42.2, 1.6, 4.7, 35, 1.7, 2, 87.3, 1.2, 5.4, 6.6, 1.4, 0.8, 0.8, 0.7, 1.8, -0.4, NULL),
(116, 'Ricky Rubio', 'MIN', 26, 75, 28, 47, 32.9, 11.1, 3.5, 8.7, 40.2, 0.8, 2.6, 30.6, 3.4, 3.8, 89.1, 0.9, 3.2, 4.1, 9.1, 2.6, 1.7, 0.1, 2.7, -0.1, NULL),
(117, 'Brandon Knight', 'PHX', 25, 54, 16, 38, 21.1, 11, 3.9, 9.7, 39.8, 0.8, 2.6, 32.4, 2.4, 2.9, 85.7, 0.5, 1.7, 2.2, 2.4, 1.6, 0.5, 0.1, 1.6, -6.1, NULL),
(118, 'Jerryd Bayless', 'PHI', 28, 3, 1, 2, 23.8, 11, 3.7, 10.7, 34.4, 0.7, 1.7, 40, 3, 3.3, 90, 1, 3, 4, 4.3, 3, 0, 0, 1.3, -7, NULL),
(119, 'Terrence Ross', 'ORL', 26, 78, 39, 39, 25.1, 11, 4.2, 9.6, 43.7, 1.8, 5, 36.3, 0.8, 1, 83.1, 0.2, 2.4, 2.6, 1.1, 0.9, 1.1, 0.4, 1.8, 1.6, NULL),
(120, 'Thaddeus Young', 'IND', 29, 74, 40, 34, 30.2, 11, 4.9, 9.3, 52.7, 0.6, 1.6, 38.1, 0.6, 1.2, 52.3, 1.8, 4.3, 6.1, 1.6, 1.3, 1.5, 0.4, 1.8, 0.9, NULL),
(121, 'Kent Bazemore', 'ATL', 27, 73, 39, 34, 26.9, 11, 4, 9.9, 40.9, 1.3, 3.6, 34.6, 1.6, 2.3, 70.8, 0.6, 2.5, 3.2, 2.4, 1.7, 1.2, 0.7, 2.3, -1.5, NULL),
(122, 'Emmanuel Mudiay', 'DEN', 21, 55, 25, 30, 25.6, 11, 3.8, 10, 37.7, 1, 3.2, 31.5, 2.4, 3, 78.4, 0.5, 2.7, 3.2, 3.9, 2.2, 0.7, 0.2, 1.7, -2.4, NULL),
(123, 'Deron Williams', 'CLE', 33, 64, 25, 39, 25.9, 11, 4.1, 9.4, 43.8, 1.3, 3.7, 36.3, 1.4, 1.7, 82.6, 0.2, 2.1, 2.3, 5.6, 2.2, 0.5, 0.1, 2.2, -1.4, NULL),
(124, 'Justice Winslow', 'MIA', 21, 18, 4, 14, 34.7, 10.9, 4.4, 12.5, 35.6, 0.4, 1.9, 20, 1.6, 2.6, 61.7, 1.3, 3.9, 5.2, 3.7, 1.8, 1.4, 0.3, 2.9, -0.3, NULL),
(125, 'J.J. Barea', 'DAL', 33, 35, 11, 24, 22, 10.9, 4.1, 9.8, 41.4, 1.5, 4.2, 35.8, 1.3, 1.5, 86.3, 0.3, 2.1, 2.4, 5.5, 1.8, 0.4, 0, 0.9, 0.3, NULL),
(126, 'Taj Gibson', 'OKC', 32, 78, 41, 37, 25.5, 10.8, 4.7, 9.1, 51.5, 0, 0.2, 23.1, 1.4, 2, 71.5, 2, 4.2, 6.2, 0.9, 1.3, 0.5, 0.8, 2.1, 0, NULL),
(127, 'Courtney Lee', 'NYK', 31, 77, 29, 48, 31.9, 10.8, 4.2, 9.1, 45.6, 1.4, 3.5, 40.1, 1.1, 1.3, 86.7, 0.7, 2.7, 3.4, 2.3, 0.9, 1.1, 0.3, 1.8, -3, NULL),
(128, 'Terrence Jones', 'MIL', 25, 54, 20, 34, 23.5, 10.8, 4.3, 9.1, 47, 0.4, 1.4, 25.3, 1.9, 3.1, 60.6, 1.2, 4.5, 5.7, 1.1, 0.9, 0.7, 1, 1.2, -1.1, NULL),
(129, 'Marcin Gortat', 'WAS', 33, 82, 49, 33, 31.2, 10.8, 4.8, 8.2, 57.9, 0, 0, 0, 1.3, 1.9, 64.8, 2.9, 7.5, 10.4, 1.5, 1.5, 0.5, 0.7, 2.6, 2.5, NULL),
(130, 'CJ Miles', 'IND', 30, 76, 39, 37, 23.4, 10.7, 3.7, 8.5, 43.4, 2.2, 5.4, 41.3, 1.1, 1.2, 90.3, 0.4, 2.6, 3, 0.6, 0.5, 0.6, 0.3, 2, 0.9, NULL),
(131, 'Allen Crabbe', 'POR', 25, 79, 39, 40, 28.5, 10.7, 3.8, 8.2, 46.8, 1.7, 3.8, 44.4, 1.3, 1.6, 84.7, 0.2, 2.6, 2.9, 1.2, 0.8, 0.7, 0.3, 2.2, -1.5, NULL),
(132, 'Alex Poythress', 'PHI', 23, 6, 0, 6, 26.1, 10.7, 4.2, 9, 46.3, 1, 3.2, 31.6, 1.3, 1.7, 80, 1.8, 3, 4.8, 0.8, 0.5, 0.5, 0.3, 2.3, -6, NULL),
(133, 'Niokla Mirotic', 'CHI', 26, 70, 37, 33, 24, 10.6, 3.7, 8.9, 41.3, 1.8, 5.4, 34.2, 1.4, 1.8, 77.3, 0.9, 4.6, 5.5, 1.1, 1.1, 0.8, 0.8, 1.8, 2.8, NULL),
(134, 'Marcus Smart', 'BOS', 23, 79, 51, 28, 30.4, 10.6, 3.4, 9.5, 35.9, 1.2, 4.2, 28.3, 2.6, 3.2, 81.2, 1, 2.9, 3.9, 4.6, 2, 1.6, 0.4, 2.4, 1.6, NULL),
(135, 'Buddy Hield', 'SAC', 23, 82, 31, 51, 23, 10.6, 4, 9.4, 42.6, 1.8, 4.6, 39.1, 0.8, 0.9, 84.2, 0.4, 2.9, 3.3, 1.5, 1.2, 0.5, 0.1, 1.4, -2.6, NULL),
(136, 'Marco Belinelli', 'CHA', 31, 74, 34, 40, 24, 10.5, 3.6, 8.3, 42.9, 1.4, 3.8, 36, 2, 2.3, 89.3, 0.2, 2.2, 2.4, 2, 0.9, 0.6, 0.1, 1.2, 0.6, NULL),
(137, 'Wayne Ellington', 'MIA', 29, 62, 35, 27, 24.2, 10.5, 3.7, 9, 41.6, 2.4, 6.4, 37.8, 0.6, 0.7, 86, 0.3, 1.8, 2.1, 1.1, 0.5, 0.6, 0.1, 1.1, 1.4, NULL),
(138, 'Mason Plumlee', 'DEN', 27, 81, 38, 43, 26.5, 10.4, 4.1, 7.7, 53.6, 0, 0.1, 0, 2.1, 3.7, 58, 2.1, 5.4, 7.5, 3.5, 1.7, 0.9, 1.1, 2.8, 0, NULL),
(139, 'Robin Lopez', 'CHI', 29, 81, 40, 41, 28, 10.4, 4.7, 9.6, 49.3, 0, 0, 0, 0.9, 1.3, 72.1, 3, 3.4, 6.4, 1, 1.1, 0.2, 1.4, 1.9, 0.9, NULL),
(140, 'Cody Zeller', 'CHA', 24, 62, 33, 29, 27.8, 10.3, 4.1, 7.1, 57.1, 0, 0, 0, 2.1, 3.2, 67.9, 2.2, 4.4, 6.5, 1.6, 1, 1, 0.9, 3, 3.4, NULL),
(141, 'Tyreke Evans', 'SAC', 27, 40, 17, 23, 19.7, 10.3, 3.8, 9.3, 40.5, 1.1, 3, 35.6, 1.7, 2.3, 75, 0.3, 3.1, 3.4, 3.1, 1.5, 0.9, 0.2, 1.5, -3.8, NULL),
(142, 'Jon Leuer', 'DET', 28, 75, 34, 41, 25.9, 10.2, 4.1, 8.6, 48, 0.7, 2.2, 29.3, 1.3, 1.5, 86.7, 1.4, 4, 5.4, 1.5, 0.9, 0.4, 0.3, 1.9, -1, NULL),
(143, 'Malcolm Brogdon', 'MIL', 24, 75, 38, 37, 26.4, 10.2, 3.9, 8.5, 45.7, 1, 2.6, 40.4, 1.5, 1.7, 86.5, 0.6, 2.2, 2.8, 4.2, 1.5, 1.1, 0.2, 1.9, 1.2, NULL),
(144, 'Draymond Green', 'GSW', 27, 76, 62, 14, 32.5, 10.2, 3.6, 8.6, 41.8, 1.1, 3.5, 30.8, 2, 2.8, 70.9, 1.3, 6.6, 7.9, 7, 2.4, 2, 1.4, 2.9, 10.8, NULL),
(145, 'Jusef Nurkic', 'POR', 22, 65, 34, 31, 24.1, 10.2, 4.2, 8.2, 50.7, 0, 0, 0, 1.8, 3.2, 57.1, 2.4, 4.8, 7.2, 1.9, 2.2, 0.8, 1.1, 2.5, -0.8, NULL),
(146, 'Josh Richardson', 'MIA', 23, 53, 23, 30, 30.5, 10.2, 3.8, 9.7, 39.4, 1.4, 4.3, 33, 1.1, 1.5, 77.9, 0.7, 2.5, 3.2, 2.6, 1.2, 1.1, 0.7, 2.5, 0.1, NULL),
(147, 'Tony Parker', 'SAS', 35, 63, 46, 17, 25.2, 10.1, 4.2, 9, 46.6, 0.4, 1.1, 33.3, 1.3, 1.9, 72.6, 0.1, 1.7, 1.8, 4.5, 1.4, 0.5, 0, 1.5, 2.8, NULL),
(148, 'Kyle Korver', 'CLE', 36, 67, 33, 34, 26.2, 10.1, 3.6, 7.7, 46.4, 2.4, 5.4, 45.1, 0.6, 0.6, 90.5, 0.1, 2.7, 2.8, 1.6, 1, 0.5, 0.3, 1.6, -2.5, NULL),
(149, 'Yogi Ferrell', 'DAL', 24, 46, 18, 28, 26, 10, 3.5, 8.6, 40.6, 1.5, 3.8, 38.6, 1.6, 1.9, 83.1, 0.4, 2, 2.4, 3.7, 1.5, 0.9, 0.2, 2, -2.6, NULL),
(150, 'Maurice Harkless', 'POR', 24, 77, 38, 39, 28.9, 10, 4.1, 8.1, 50.3, 0.9, 2.5, 35.1, 1, 1.6, 62.1, 1.6, 2.8, 4.4, 1.1, 1.1, 1.1, 0.9, 2.8, 0.6, NULL),
(151, 'Trevor Booker', 'BKN', 29, 71, 18, 53, 24.7, 10, 4.3, 8.3, 51.6, 0.4, 1.1, 32.1, 1, 1.5, 67.3, 2, 6, 8, 1.9, 1.8, 1.1, 0.4, 2.1, -4.7, NULL),
(152, 'Gorgui Dieng', 'MIN', 27, 82, 31, 51, 32.4, 10, 4, 8.1, 50.2, 0.2, 0.5, 37.2, 1.7, 2, 81.4, 2.3, 5.6, 7.9, 1.9, 1.3, 1.1, 1.2, 3.1, 0.4, NULL),
(153, 'Shabazz Muhammad', 'MIN', 24, 78, 29, 49, 19.4, 9.9, 3.7, 7.7, 48.2, 0.6, 1.9, 33.8, 1.9, 2.4, 77.4, 1.1, 1.7, 2.8, 0.4, 0.7, 0.3, 0.1, 1.1, -1, NULL),
(154, 'Jamal Murray', 'DEN', 20, 82, 40, 42, 21.5, 9.9, 3.6, 8.9, 40.4, 1.4, 4.2, 33.4, 1.3, 1.5, 88.3, 0.5, 2.1, 2.6, 2.1, 1.4, 0.6, 0.3, 1.5, 0.9, NULL),
(155, 'Ty Lawson', 'SAC', 29, 69, 25, 44, 25.1, 9.9, 3.4, 7.6, 45.4, 0.5, 1.7, 28.8, 2.5, 3.1, 79.7, 0.6, 2, 2.6, 4.8, 1.9, 1.1, 0.1, 1.7, -2.3, NULL),
(156, 'Richaun Holmes', 'PHI', 23, 57, 16, 41, 20.9, 9.8, 4, 7.2, 55.8, 0.5, 1.4, 35.1, 1.3, 1.8, 69.9, 1.6, 3.8, 5.5, 1, 1, 0.7, 1, 2.4, -4, NULL),
(157, 'Jeremy Lamb', 'CHA', 25, 62, 27, 35, 18.4, 9.7, 3.6, 7.9, 46, 0.7, 2.4, 28.1, 1.8, 2.1, 85.3, 0.5, 3.8, 4.3, 1.2, 0.6, 0.4, 0.4, 1.6, -0.6, NULL),
(158, 'Kenneth Faried', 'DEN', 27, 61, 29, 32, 21.2, 9.6, 3.7, 6.8, 54.8, 0, 0.1, 0, 2.1, 3.1, 69.3, 3, 4.6, 7.6, 0.9, 1, 0.7, 0.7, 2, -1, NULL),
(159, 'ETwaun Moore', 'NOP', 28, 73, 32, 41, 24.9, 9.6, 3.9, 8.5, 45.7, 1.1, 2.8, 37, 0.8, 1, 77, 0.5, 1.6, 2.1, 2.2, 0.8, 0.7, 0.4, 1.8, -1.5, NULL),
(160, 'Patrick Beverley', 'HOU', 28, 67, 46, 21, 30.7, 9.5, 3.4, 8.1, 42, 1.6, 4.3, 38.2, 1.1, 1.4, 76.8, 1.4, 4.4, 5.9, 4.2, 1.5, 1.5, 0.4, 3.3, 5.3, NULL),
(161, 'Derrick Favors', 'UTA', 25, 50, 33, 17, 23.7, 9.5, 4.1, 8.3, 48.7, 0.1, 0.2, 30, 1.3, 2.2, 61.5, 1.8, 4.3, 6.1, 1.1, 1.2, 0.9, 0.8, 2.1, 1.1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
