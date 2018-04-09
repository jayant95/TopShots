-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 01:42 AM
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
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `ID` int(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `wins` int(8) NOT NULL,
  `losses` int(8) NOT NULL,
  `w_pct` float NOT NULL,
  `efg_pct` float NOT NULL,
  `off_rating` float NOT NULL,
  `def_rating` float NOT NULL,
  `ast_pct` float NOT NULL,
  `ast_to` float NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `conference` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`ID`, `name`, `wins`, `losses`, `w_pct`, `efg_pct`, `off_rating`, `def_rating`, `ast_pct`, `ast_to`, `shortname`, `conference`) VALUES
(1, 'Atlanta Hawks', 43, 39, 0.524, 0.504, 102.3, 103.1, 0.621, 1.5, 'ATL', 'East'),
(2, 'Boston Celtics', 53, 29, 0.646, 0.525, 108.6, 105.5, 0.653, 1.9, 'BOS', 'East'),
(3, 'Brooklyn Nets', 20, 62, 0.244, 0.507, 101.9, 108, 0.566, 1.29, 'BKN', 'East'),
(4, 'Charlotte Hornets', 36, 46, 0.439, 0.501, 106.4, 106.1, 0.611, 2.01, 'CHA', 'West'),
(5, 'Chicago Bulls', 41, 41, 0.524, 0.487, 104.6, 104.5, 0.584, 1.66, 'CHI', 'East'),
(6, 'Cleveland Cavaliers', 51, 31, 0.622, 0.547, 110.9, 108, 0.567, 1.66, 'CLE', 'East'),
(7, 'Dallas Mavericks', 33, 49, 0.402, 0.505, 103.7, 106.3, 0.574, 1.75, 'DAL', 'West'),
(8, 'Denver Nuggets', 40, 42, 0.488, 0.53, 110, 110.5, 0.615, 1.69, 'DEN', 'West'),
(9, 'Detroit Pistons', 37, 45, 0.451, 0.492, 103.3, 105.3, 0.53, 1.78, 'DET', 'East'),
(10, 'Golden State Warriors', 67, 15, 0.817, 0.563, 113.2, 101.1, 0.705, 2.06, 'GSW', 'West'),
(11, 'Houston Rockets', 55, 27, 0.671, 0.545, 111.8, 106.4, 0.626, 1.67, 'HOU', 'West'),
(12, 'Indiana Pacers', 42, 40, 0.512, 0.516, 106.2, 106.3, 0.572, 1.63, 'IND', 'East'),
(13, 'LA Clippers', 51, 31, 0.622, 0.537, 110.3, 105.8, 0.57, 1.74, 'LAC', 'West'),
(14, 'Los Angeles Lakers', 26, 56, 0.317, 0.501, 103.4, 110.6, 0.532, 1.38, 'LAL', 'West'),
(15, 'Memphis Grizzlies', 43, 39, 0.524, 0.491, 104.7, 104.5, 0.584, 1.65, 'MEM', 'West'),
(16, 'Miami Heat', 41, 41, 0.5, 0.512, 105.2, 104.1, 0.544, 1.58, 'MIA', 'East'),
(17, 'Milwaukee Bucks', 42, 40, 0.512, 0.527, 106.9, 106.4, 0.624, 1.73, 'MIL', 'East'),
(18, 'Minnesota Timberwolves', 31, 51, 0.378, 0.511, 108.1, 109.1, 0.6, 1.69, 'MIN', 'West'),
(19, 'New Orleans Pelicans', 34, 48, 0.415, 0.504, 103.3, 104.9, 0.582, 1.77, 'NOP', 'West'),
(20, 'New York Knicks', 31, 51, 0.378, 0.496, 104.7, 108.7, 0.551, 1.57, 'NYK', 'East'),
(21, 'Oklahoma City Thunder', 47, 35, 0.573, 0.5, 105, 105.1, 0.532, 1.4, 'OKC', 'West'),
(22, 'Orlando Magic', 29, 53, 0.353, 0.489, 101.2, 108, 0.58, 1.67, 'ORL', 'East'),
(23, 'Philadelphia 76ers', 28, 54, 0.341, 0.501, 100.7, 106.4, 0.631, 1.43, 'PHI', 'East'),
(24, 'Phoenix Suns', 24, 58, 0.293, 0.493, 103.9, 109.3, 0.491, 1.27, 'PHX', 'West'),
(25, 'Portland Trail Blazers', 41, 41, 0.5, 0.52, 107.8, 107.8, 0.534, 1.54, 'POR', 'West'),
(26, 'Sacramento Kings', 32, 50, 0.39, 0.516, 104.6, 109.1, 0.594, 1.54, 'SAC', 'East'),
(27, 'San Antonio Spurs', 61, 21, 0.744, 0.524, 108.8, 100.9, 0.606, 1.77, 'SAS', 'West'),
(28, 'Toronto Raptors', 51, 31, 0.622, 0.517, 109.8, 104.9, 0.472, 1.46, 'TOR', 'East'),
(29, 'Utah Jazz', 51, 31, 0.622, 0.526, 107.4, 102.7, 0.544, 1.48, 'UTA', 'West'),
(30, 'Washington Wizards', 49, 33, 0.598, 0.528, 108.5, 106.9, 0.577, 1.68, 'WAS', 'East');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
