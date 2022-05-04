-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 06:45 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(6) NOT NULL,
  `naziv` varchar(75) NOT NULL,
  `cijena` decimal(8,2) NOT NULL,
  `zaliha` decimal(8,2) NOT NULL DEFAULT 100.00,
  `količina` varchar(30) DEFAULT NULL,
  `prodano` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tip` varchar(30) NOT NULL DEFAULT 'topli'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `naziv`, `cijena`, `zaliha`, `količina`, `prodano`, `tip`) VALUES
(1, 'Bezkofeinska', '10.00', '100.00', 'šalica', '0.00', 'topli'),
(2, 'Kakao', '10.00', '99.00', 'šalica', '1.00', 'topli'),
(3, 'Topla čokolada', '12.00', '100.00', 'šalica', '0.00', 'topli'),
(4, 'Šlag', '1.00', '99.00', 'šalica', '1.00', 'topli'),
(5, 'Bijela kava', '11.00', '91.00', 'šalica', '9.00', 'topli'),
(11, 'Kava', '8.00', '97.00', 'šalica', '3.00', 'topli'),
(12, 'Kava s mlijekom', '9.00', '97.00', 'šalica', '3.00', 'topli'),
(13, 'Kava sa šlagom', '9.00', '97.00', 'šalica', '3.00', 'topli'),
(14, 'Kava mlijeko & šlag', '10.00', '97.00', 'šalica', '3.00', 'topli'),
(19, 'Med', '2.00', '87.00', '12g', '13.00', 'topli'),
(20, 'Čaj kamilica', '8.00', '91.00', 'šalica', '8.00', 'topli'),
(21, 'Čaj menta', '8.00', '100.00', 'šalica', '0.00', 'topli'),
(22, 'Čaj jabuka-cimet', '8.00', '97.00', 'šalica', '3.00', 'topli'),
(23, 'Čaj borovnica', '8.00', '99.00', 'šalica', '0.00', 'topli'),
(24, 'Čaj jagoda-vanilija', '8.00', '100.00', 'šalica', '0.00', 'topli'),
(25, 'Čaj zeleni', '8.00', '97.00', 'šalica', '1.00', 'topli'),
(26, 'Čaj crni', '8.00', '100.00', 'šalica', '0.00', 'topli'),
(40, 'Cappucinno Classic', '11.00', '99.00', 'šalica', '1.00', 'topli'),
(41, 'Cappucinno Čokolada', '11.00', '99.00', 'šalica', '1.00', 'topli'),
(42, 'Cappucinno Vanilija', '11.00', '99.00', 'šalica', '1.00', 'topli'),
(43, 'Cappucinno Bananacinno', '11.00', '98.00', 'šalica', '2.00', 'topli'),
(44, 'Cappucinno Kokos-Bij.čok.', '11.00', '97.00', 'šalica', '3.00', 'topli'),
(45, 'Cappucinno Irish', '11.00', '94.00', 'šalica', '5.00', 'topli'),
(46, 'Cappucinno Lješnjak', '11.00', '96.00', 'šalica', '5.00', 'topli'),
(51, 'Coca-Cola', '14.00', '98.00', '0.33', '2.00', 'bezalk'),
(52, 'Coca-Cola Zero', '14.00', '100.00', '0.33', '0.00', 'bezalk'),
(53, 'Fanta', '14.00', '100.00', '0.33', '0.00', 'bezalk'),
(54, 'Sprite', '14.00', '98.50', '0.33', '1.50', 'bezalk'),
(55, 'Cocta', '14.00', '94.00', '0.33', '6.00', 'bezalk'),
(56, 'Jana vitamin limun', '13.00', '98.00', '0.2', '2.00', 'bezalk'),
(57, 'Jana vitamin naranča', '13.00', '99.00', '0.2', '1.00', 'bezalk'),
(58, 'Schweppes tangerina', '14.00', '88.00', '0.33', '12.00', 'bezalk'),
(59, 'Schweppes bitter-lemon', '14.00', '89.00', '0.33', '11.00', 'bezalk'),
(60, 'Schweppes tonic', '14.00', '90.00', '0.33', '10.00', 'bezalk'),
(62, 'Juice naranča', '14.00', '97.00', '0.2', '3.00', 'bezalk'),
(63, 'Juice marelica', '14.00', '99.00', '0.2', '1.00', 'bezalk'),
(64, 'Juice jabuka', '14.00', '99.00', '0.2', '1.00', 'bezalk'),
(65, 'Juice jagoda', '14.00', '99.00', '0.2', '1.00', 'bezalk'),
(66, 'Juice crni ribizl', '14.00', '99.00', '0.2', '1.00', 'bezalk'),
(73, 'Hidra Citrus', '15.00', '99.00', '0.5', '1.00', 'bezalk'),
(74, 'Hidra Naranča', '15.00', '99.00', '0.5', '1.00', 'bezalk'),
(80, 'Jamnica mineralna', '20.00', '6.00', '1.0', '7.60', 'bezalk'),
(82, 'Juicy-vita naranča', '10.00', '98.00', '0.3/0.5', '2.00', 'bezalk'),
(83, 'Juicy-vita limun', '10.00', '99.00', '0.3/0.5', '1.00', 'bezalk'),
(84, 'Juicy-vita bazga-limun', '10.00', '99.00', '0.3/0.5', '1.00', 'bezalk'),
(85, 'Juicy-vita grejp', '10.00', '99.00', '0.3/0.5', '1.00', 'bezalk'),
(93, 'Točena Coca-Cola', '40.00', '96.05', '1.0', '3.95', 'bezalk'),
(94, 'Turska Coca-Cola', '3.00', '100.00', '0.1', '9.00', 'bezalk'),
(95, 'Ledeni čaj brusnica', '12.00', '100.00', '0.2', '0.00', 'bezalk'),
(96, 'Orangina', '14.00', '99.00', '0.33', '1.00', 'bezalk'),
(97, 'Red-Bull', '20.00', '98.00', '0.2', '2.00', 'bezalk'),
(98, 'Jana prirodna', '10.00', '98.00', '0.2', '2.00', 'bezalk'),
(102, 'Somersby jabuka', '18.00', '98.00', '0.33', '2.00', 'pivo'),
(103, 'Somersby lubenica', '18.00', '97.00', '0.33', '3.00', 'pivo'),
(104, 'Ožujsko 0.5', '15.00', '95.00', '0.5', '5.00', 'pivo'),
(105, 'Ožujsko 0.33', '14.00', '99.00', '0.33', '1.00', 'pivo'),
(106, 'Osječko 0.5', '15.00', '100.00', '0.5', '0.00', 'pivo'),
(107, 'Osječko 0.33', '14.00', '100.00', '0.33', '0.00', 'pivo'),
(108, 'Staropramen', '16.00', '97.00', '0.5', '3.00', 'pivo'),
(109, 'Stella Artois', '16.00', '100.00', '0.33', '0.00', 'pivo'),
(110, 'Tomislav', '16.00', '99.00', '0.5', '1.00', 'pivo'),
(141, 'Jack Daniels', '15.00', '99.91', '0.03', '0.09', 'alk'),
(142, 'Ballantines', '15.00', '99.91', '0.03', '0.09', 'alk'),
(143, 'Jegermeister', '12.00', '99.91', '0.03', '0.09', 'alk'),
(144, 'Stock 84', '9.00', '100.00', '0.03', '0.00', 'alk'),
(145, 'Vodka', '9.00', '6.00', '0.03', '0.03', 'alk'),
(146, 'Pelinkovac', '9.00', '99.94', '0.03', '0.06', 'alk'),
(147, 'Lavov', '9.00', '100.00', '0.03', '0.00', 'alk'),
(148, 'Rakija šljivovica', '9.00', '100.00', '0.03', '0.00', 'alk'),
(149, 'Rakija medica', '9.00', '100.00', '0.03', '0.00', 'alk'),
(150, 'Rakija travarica', '9.00', '99.91', '0.03', '0.09', 'alk'),
(151, 'Rakija komovica', '9.00', '7.00', '0.03', '0.00', 'alk'),
(152, 'Rakija višnjevac', '9.00', '100.00', '0.03', '0.00', 'alk'),
(153, 'Rakija orahovac', '9.00', '100.00', '0.03', '0.00', 'alk'),
(169, 'Amaro 18', '9.00', '99.97', '0.03', '0.03', 'alk'),
(170, 'Konjak', '7.00', '100.00', '0.03', '0.00', 'alk'),
(171, 'Tequilla', '12.00', '100.00', '0.03', '0.00', 'alk'),
(172, 'Rakija viljamovka', '10.00', '99.94', '0.03', '0.06', 'alk'),
(173, 'Blacky', '9.00', '99.82', '0.03', '0.18', 'alk'),
(174, 'Dalmatino', '9.00', '99.85', '0.03', '0.15', 'alk'),
(175, 'Southern Comfort', '12.00', '99.97', '0.03', '0.03', 'alk'),
(176, 'Malibu', '12.00', '99.94', '0.03', '0.06', 'alk'),
(177, 'Campari', '12.00', '100.00', '0.03', '0.00', 'alk'),
(178, 'Gin', '9.00', '99.61', '0.03', '0.39', 'alk'),
(179, 'Rum', '9.00', '99.96', '0.03', '0.04', 'alk'),
(190, 'Martini', '17.00', '100.00', '0.1', '0.00', 'alk'),
(201, 'Graševina Belje', '70.00', '7.00', '1.0', '7.50', 'vina'),
(202, 'Graševina Kutjevo', '80.00', '97.20', '1.0', '2.80', 'vina'),
(203, 'Frankovka Belje', '70.00', '96.80', '1.0', '3.20', 'vina'),
(204, 'Pol-pol Belje 0.2', '9.00', '100.00', '0.2', '0.00', 'vina'),
(205, 'Pol-pol Belje 0.3', '13.50', '100.00', '0.3', '0.00', 'vina'),
(206, 'Pol-pol Kutjevo 0.2', '10.00', '100.00', '0.2', '0.00', 'vina'),
(207, 'Pol-pol Kutjevo 0.3', '15.00', '100.00', '0.3', '0.00', 'vina'),
(208, 'Bambus 0.2', '11.00', '100.00', '0.2', '0.00', 'vina'),
(209, 'Bambus 0.3', '16.50', '100.00', '0.3', '0.00', 'vina'),
(301, 'Jack Daniels-Cola', '19.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(302, 'Ballantines-Cola', '19.00', '99.87', 'čaša', '0.13', 'mje_alk'),
(303, 'Jeger-Cola', '16.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(304, 'Stock-Cola', '13.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(305, 'Energy-Vodka', '11.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(306, 'Juice-Vodka', '16.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(307, 'Konjak-Cola', '11.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(308, 'Pelin-Cola', '13.00', '99.90', 'čaša', '0.10', 'mje_alk'),
(309, 'Lavov-Cola', '13.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(310, 'Amaro-Cola', '13.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(311, 'Southern-Sprite', '19.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(312, 'Malibu-Juice', '19.00', '100.00', 'čaša', '0.00', 'mje_alk'),
(313, 'Rum-Cola', '13.00', '99.80', 'čaša', '0.20', 'mje_alk'),
(314, 'Gin-Tonic', '16.00', '99.50', 'čaša', '0.50', 'mje_alk'),
(315, 'Gin-Bitter lemon', '16.00', '99.50', 'čaša', '0.50', 'mje_alk'),
(316, 'Gin-Tangerina', '16.00', '99.50', 'čaša', '0.50', 'mje_alk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
