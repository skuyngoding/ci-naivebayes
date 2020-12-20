-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 05:47 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naivebayes_pembeli`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_latih`
--

CREATE TABLE `data_latih` (
  `id` int(11) NOT NULL,
  `umur` tinyint(4) NOT NULL,
  `pendapatan` tinyint(4) NOT NULL,
  `pelajar` tinyint(4) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `beli` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_latih`
--

INSERT INTO `data_latih` (`id`, `umur`, `pendapatan`, `pelajar`, `rating`, `beli`) VALUES
(1, 1, 3, 1, 1, 1),
(2, 1, 3, 1, 2, 1),
(3, 2, 3, 1, 1, 2),
(4, 3, 2, 1, 1, 2),
(5, 3, 1, 2, 1, 2),
(6, 3, 1, 2, 2, 1),
(7, 2, 1, 2, 2, 2),
(8, 1, 2, 1, 1, 1),
(9, 1, 1, 2, 1, 2),
(10, 3, 2, 2, 1, 2),
(11, 1, 2, 2, 2, 2),
(12, 2, 2, 1, 2, 2),
(13, 2, 3, 2, 1, 2),
(14, 3, 2, 1, 2, 1),
(15, 1, 3, 2, 1, 2),
(26, 2, 3, 1, 2, 2),
(27, 1, 3, 2, 2, 2),
(28, 2, 3, 2, 2, 2),
(29, 2, 2, 2, 2, 2),
(30, 1, 2, 2, 1, 2),
(31, 3, 3, 1, 2, 2),
(32, 3, 3, 2, 2, 2),
(33, 1, 2, 1, 2, 1),
(34, 1, 1, 2, 2, 2),
(35, 2, 2, 2, 1, 2),
(36, 2, 2, 2, 1, 2),
(37, 3, 3, 2, 1, 2),
(38, 3, 2, 1, 1, 1),
(39, 2, 1, 2, 1, 2),
(40, 3, 3, 2, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_latih`
--
ALTER TABLE `data_latih`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_latih`
--
ALTER TABLE `data_latih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
