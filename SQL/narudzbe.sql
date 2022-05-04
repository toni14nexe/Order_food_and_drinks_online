-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 06:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zavrsni`
--

-- --------------------------------------------------------

--
-- Table structure for table `narudzbe`
--

CREATE TABLE `narudzbe` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `proizvodi` varchar(10000) NOT NULL,
  `napomena` varchar(200) NOT NULL,
  `cijena` decimal(11,2) NOT NULL,
  `vrijeme` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narudzbe`
--

INSERT INTO `narudzbe` (`id`, `user`, `proizvodi`, `napomena`, `cijena`, `vrijeme`, `status`) VALUES
(101, 'toni14nexe', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Bijela kava </td><td>1</td><td>11.00</td></tr></table>', '', '11.00', '2022-02-28 03:27:46', 'Poslana narudžba'),
(102, 'toni14nexe', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Ballantines</td><td>1</td><td>15.00</td></tr><tr><td>Bijela kava </td><td>3</td><td>33.00</td></tr><tr><td>Sprite</td><td>1</td><td>14.00</td></tr></table>', 'Može s više mlijeka!', '62.00', '2022-02-28 03:28:56', 'Poslana narudžba'),
(103, 'toni14nexe', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Bijela kava </td><td>1</td><td>11.00</td></tr><tr><td>Čaj kamilica</td><td>2</td><td>16.00</td></tr></table>', '', '27.00', '2022-02-28 03:59:09', 'Poslana narudžba'),
(104, 'toni14nexe', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Jana prirodna</td><td>2.00</td><td>20.00</td></tr></table>', 'Možee', '20.00', '2022-02-28 04:04:27', 'Poslana narudžba'),
(105, 'toni14nexe', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Cappucinno irish</td><td>2</td><td>22.00</td></tr></table>', '', '22.00', '2022-02-28 16:41:28', 'Poslana narudžba'),
(106, 'toni14nexe', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Jegermeister</td><td>2</td><td>24.00</td></tr><tr><td>Med </td><td>4</td><td>8.00</td></tr><tr><td>Red-Bull</td><td>2</td><td>40.00</td></tr></table>', '', '72.00', '2022-02-28 17:15:17', 'Poslana narudžba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `narudzbe`
--
ALTER TABLE `narudzbe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `narudzbe`
--
ALTER TABLE `narudzbe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
