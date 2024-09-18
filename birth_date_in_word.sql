-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 06:11 AM
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
-- Database: `birth_date_in_word`
--

-- --------------------------------------------------------

--
-- Table structure for table `jjall`
--

CREATE TABLE `jjall` (
  `id` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `b_date` varchar(6) NOT NULL,
  `b_date_word` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jjall`
--

INSERT INTO `jjall` (`id`, `dob`, `b_date`, `b_date_word`) VALUES
(3, '2024-09-15', '150924', 'Fifteenth September Two Thousand and Twenty Four '),
(4, '2024-09-16', '160924', 'Sixteenth September Two Thousand and Twenty Four '),
(5, '2014-09-16', '160914', 'Sixteenth September Two Thousand and Fourteen '),
(6, '2024-09-18', '180924', 'Eighteenth September Two Thousand and Twenty Four '),
(7, '2024-09-18', '180924', 'Eighteenth September Two Thousand and Twenty Four '),
(8, '2014-09-08', '080914', 'Eighth September Two Thousand and Fourteen '),
(9, '2014-09-16', '160914', 'Sixteenth September Two Thousand and Fourteen '),
(10, '2014-09-16', '160914', 'Sixteenth September Two Thousand and Fourteen ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jjall`
--
ALTER TABLE `jjall`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jjall`
--
ALTER TABLE `jjall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
