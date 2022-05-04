-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2022 at 09:11 AM
-- Server version: 8.0.27-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toniwebc_zavrsni`
--

-- --------------------------------------------------------

--
-- Table structure for table `narudzbe`
--

CREATE TABLE `narudzbe` (
  `id` int NOT NULL,
  `user` varchar(50) NOT NULL,
  `ime_prez` varchar(80) NOT NULL,
  `proizvodi` varchar(10000) NOT NULL,
  `napomena` varchar(200) NOT NULL,
  `cijena` decimal(11,2) NOT NULL,
  `vrijeme` datetime DEFAULT CURRENT_TIMESTAMP,
  `dostava_t` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `za_t` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `adresa` varchar(200) NOT NULL,
  `mjesto` varchar(50) NOT NULL,
  `broj` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `narudzbe`
--

INSERT INTO `narudzbe` (`id`, `user`, `ime_prez`, `proizvodi`, `napomena`, `cijena`, `vrijeme`, `dostava_t`, `za_t`, `status`, `date`, `adresa`, `mjesto`, `broj`) VALUES
(0, '0', '', '', '', 0.00, NULL, '2022-03-30 09:05:22', '', '', '', '', '', '0'),
(100, 'toni14nexe', 'Toni Kolarić', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Kava produžena</td><td>1</td><td>8.00</td></tr><tr><td>Kava s mlijekom mala s hladnim</td><td>3</td><td>27.00</td></tr></table>', '', 35.00, '2022-03-30 09:01:02', '2022-03-30 09:05:39', '', 'Predano dostavi', '30.03.2022.', 'Vinogradska 33A', 'Donja Motičina', '0913067273'),
(101, 'toni14nexe', 'Toni Kolarić', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Kava s mlijekom velika s toplim</td><td>5</td><td>45.00</td></tr></table>', '', 45.00, '2022-03-30 09:01:27', '2022-03-30 09:05:54', NULL, 'Otkazano', '30.03.2022.', 'Vinogradska 33A', 'Donja Motičina', '0913067273'),
(102, 'toni14nexe', 'Toni Kolarić', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Coca-Cola</td><td>1</td><td>14.00</td></tr><tr><td>Kava mlijeko & šlag velika s toplim</td><td>1</td><td>10.00</td></tr><tr><td>Kava s mlijekom mala s toplim</td><td>1</td><td>9.00</td></tr><tr><td>Kava sa šlagom velika</td><td>1</td><td>9.00</td></tr></table>', '', 42.00, '2022-03-30 09:02:09', '2022-03-30 09:08:17', '40min', 'Poziv', '30.03.2022.', 'Vinogradska 33A', 'Donja Motičina', '0913067273'),
(103, 'toni14nexe', 'Toni Kolarić', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Bambus 0.2</td><td>1.00</td><td>11.00</td></tr><tr><td>Ožujsko 0.33</td><td>2.00</td><td>28.00</td></tr></table>', '', 39.00, '2022-03-30 09:02:54', '2022-03-30 09:06:37', '15min', 'U izradi', '30.03.2022.', 'Vinogradska 33A', 'Donja Motičina', '0913067273'),
(104, 'toni14nexe', 'Toni Kolarić', '<table style=\'width:100%;border: 3px solid white;\'><tr><td>NAZIV</td><td>KOL</td><td>CIJENA</td></tr><tr><td>Coca-Cola</td><td>2.00</td><td>28.00</td></tr><tr><td>Kava s mlijekom velika s hladnim</td><td>2.00</td><td>18.00</td></tr><tr><td>Ožujsko 0.33</td><td>1.00</td><td>14.00</td></tr></table>', 'Može limuna u coca-colu!', 60.00, '2022-03-30 09:03:46', NULL, NULL, 'Poslana narudžba', '30.03.2022.', 'Vinogradska 33A', 'Donja Motičina', '0913067273');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `naziv` varchar(75) NOT NULL,
  `cijena` decimal(8,2) NOT NULL,
  `zaliha` decimal(8,2) NOT NULL DEFAULT '100.00',
  `količina` varchar(30) DEFAULT NULL,
  `prodano` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tip` varchar(30) NOT NULL DEFAULT 'topli'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `naziv`, `cijena`, `zaliha`, `količina`, `prodano`, `tip`) VALUES
(1, 'Bezkofeinska', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(2, 'Kakao', 10.00, 0.00, 'šalica', 0.00, 'topli'),
(3, 'Topla čokolada', 12.00, 0.00, 'šalica', 0.00, 'topli'),
(4, 'Šlag', 1.00, 100.00, 'šalica', 0.00, 'topli'),
(5, 'Bijela kava', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(11, 'Kava', 8.00, 78.00, 'šalica', 22.00, 'topli'),
(12, 'Kava s mlijekom', 9.00, 78.00, 'šalica', 22.00, 'topli'),
(13, 'Kava sa šlagom', 9.00, 78.00, 'šalica', 22.00, 'topli'),
(14, 'Kava mlijeko & šlag', 10.00, 78.00, 'šalica', 22.00, 'topli'),
(19, 'Med', 2.00, 100.00, '12g', 0.00, 'topli'),
(20, 'Čaj kamilica', 8.00, 100.00, 'šalica', 0.00, 'topli'),
(21, 'Čaj menta', 8.00, 100.00, 'šalica', 0.00, 'topli'),
(22, 'Čaj jabuka-cimet', 8.00, 100.00, 'šalica', 0.00, 'topli'),
(23, 'Čaj borovnica', 8.00, 100.00, 'šalica', 0.00, 'topli'),
(24, 'Čaj jagoda-vanilija', 8.00, 100.00, 'šalica', 0.00, 'topli'),
(25, 'Čaj zeleni', 8.00, 100.00, 'šalica', 0.00, 'topli'),
(26, 'Čaj crni', 8.00, 100.00, 'šalica', 0.00, 'topli'),
(40, 'Cappucinno Classic', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(41, 'Cappucinno Čokolada', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(42, 'Cappucinno Vanilija', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(43, 'Cappucinno Bananacinno', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(44, 'Cappucinno Kokos-Bij.čok.', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(45, 'Cappucinno Irish', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(46, 'Cappucinno Lješnjak', 11.00, 100.00, 'šalica', 0.00, 'topli'),
(51, 'Coca-Cola', 14.00, 97.00, '0.33', 3.00, 'bezalk'),
(52, 'Coca-Cola Zero', 14.00, 100.00, '0.33', 0.00, 'bezalk'),
(53, 'Fanta', 14.00, 100.00, '0.33', 0.00, 'bezalk'),
(54, 'Sprite', 14.00, 100.00, '0.33', 0.00, 'bezalk'),
(55, 'Cocta', 14.00, 100.00, '0.33', 0.00, 'bezalk'),
(56, 'Jana vitamin limun', 13.00, 100.00, '0.2', 0.00, 'bezalk'),
(57, 'Jana vitamin naranča', 13.00, 100.00, '0.2', 0.00, 'bezalk'),
(58, 'Schweppes tangerina', 14.00, 100.00, '0.33', 0.00, 'bezalk'),
(59, 'Schweppes bitter-lemon', 14.00, 100.00, '0.33', 0.00, 'bezalk'),
(60, 'Schweppes tonic', 14.00, 100.00, '0.33', 0.00, 'bezalk'),
(62, 'Juice naranča', 14.00, 100.00, '0.2', 0.00, 'bezalk'),
(63, 'Juice marelica', 14.00, 100.00, '0.2', 0.00, 'bezalk'),
(64, 'Juice jabuka', 14.00, 100.00, '0.2', 0.00, 'bezalk'),
(65, 'Juice jagoda', 14.00, 100.00, '0.2', 0.00, 'bezalk'),
(66, 'Juice crni ribizl', 14.00, 100.00, '0.2', 0.00, 'bezalk'),
(73, 'Hidra Citrus', 15.00, 100.00, '0.5', 0.00, 'bezalk'),
(74, 'Hidra Naranča', 15.00, 100.00, '0.5', 0.00, 'bezalk'),
(80, 'Jamnica mineralna', 20.00, 100.00, '1.0', 0.00, 'bezalk'),
(82, 'Juicy-vita naranča', 10.00, 100.00, '0.3/0.5', 0.00, 'bezalk'),
(83, 'Juicy-vita limun', 10.00, 100.00, '0.3/0.5', 0.00, 'bezalk'),
(84, 'Juicy-vita bazga-limun', 10.00, 100.00, '0.3/0.5', 0.00, 'bezalk'),
(85, 'Juicy-vita grejp', 10.00, 100.00, '0.3/0.5', 0.00, 'bezalk'),
(93, 'Točena Coca-Cola', 40.00, 99.90, '1.0', 0.10, 'bezalk'),
(94, 'Turska Coca-Cola', 3.00, 100.00, '0.1', 0.00, 'bezalk'),
(95, 'Ledeni čaj brusnica', 12.00, 100.00, '0.2', 0.00, 'bezalk'),
(96, 'Orangina', 14.00, 100.00, '0.33', 0.00, 'bezalk'),
(97, 'Red-Bull', 20.00, 100.00, '0.2', 0.00, 'bezalk'),
(98, 'Jana prirodna', 10.00, 100.00, '0.2', 0.00, 'bezalk'),
(102, 'Somersby jabuka', 18.00, 100.00, '0.33', 0.00, 'pivo'),
(103, 'Somersby lubenica', 18.00, 100.00, '0.33', 0.00, 'pivo'),
(104, 'Ožujsko 0.5', 15.00, 100.00, '0.5', 0.00, 'pivo'),
(105, 'Ožujsko 0.33', 14.00, 97.00, '0.33', 3.00, 'pivo'),
(106, 'Osječko 0.5', 15.00, 100.00, '0.5', 0.00, 'pivo'),
(107, 'Osječko 0.33', 14.00, 100.00, '0.33', 0.00, 'pivo'),
(108, 'Staropramen', 16.00, 100.00, '0.5', 0.00, 'pivo'),
(109, 'Stella Artois', 16.00, 100.00, '0.33', 0.00, 'pivo'),
(110, 'Tomislav', 16.00, 100.00, '0.5', 0.00, 'pivo'),
(141, 'Jack Daniels', 15.00, 100.00, '0.03', 0.00, 'alk'),
(142, 'Ballantines', 15.00, 100.00, '0.03', 0.00, 'alk'),
(143, 'Jegermeister', 12.00, 100.00, '0.03', 0.00, 'alk'),
(144, 'Stock 84', 9.00, 100.00, '0.03', 0.00, 'alk'),
(145, 'Vodka', 9.00, 100.00, '0.03', 0.00, 'alk'),
(146, 'Pelinkovac', 9.00, 100.00, '0.03', 0.00, 'alk'),
(147, 'Lavov', 9.00, 100.00, '0.03', 0.00, 'alk'),
(148, 'Rakija šljivovica', 9.00, 100.00, '0.03', 0.00, 'alk'),
(149, 'Rakija medica', 9.00, 100.00, '0.03', 0.00, 'alk'),
(150, 'Rakija travarica', 9.00, 100.00, '0.03', 0.00, 'alk'),
(151, 'Rakija komovica', 9.00, 100.00, '0.03', 0.00, 'alk'),
(152, 'Rakija višnjevac', 9.00, 100.00, '0.03', 0.00, 'alk'),
(153, 'Rakija orahovac', 9.00, 100.00, '0.03', 0.00, 'alk'),
(169, 'Amaro 18', 9.00, 100.00, '0.03', 0.00, 'alk'),
(170, 'Konjak', 7.00, 100.00, '0.03', 0.00, 'alk'),
(171, 'Tequilla', 12.00, 100.00, '0.03', 0.00, 'alk'),
(172, 'Rakija viljamovka', 10.00, 100.00, '0.03', 0.00, 'alk'),
(173, 'Blacky', 9.00, 100.00, '0.03', 0.00, 'alk'),
(174, 'Dalmatino', 9.00, 100.00, '0.03', 0.00, 'alk'),
(175, 'Southern Comfort', 12.00, 100.00, '0.03', 0.00, 'alk'),
(176, 'Malibu', 12.00, 100.00, '0.03', 0.00, 'alk'),
(177, 'Campari', 12.00, 100.00, '0.03', 0.00, 'alk'),
(178, 'Gin', 9.00, 100.00, '0.03', 0.00, 'alk'),
(179, 'Rum', 9.00, 100.00, '0.03', 0.00, 'alk'),
(190, 'Martini', 17.00, 100.00, '0.1', 0.00, 'alk'),
(201, 'Graševina Belje', 70.00, 100.00, '1.0', 0.00, 'vina'),
(202, 'Graševina Kutjevo', 80.00, 100.00, '1.0', 0.00, 'vina'),
(203, 'Frankovka Belje', 70.00, 99.90, '1.0', 0.10, 'vina'),
(204, 'Pol-pol Belje 0.2', 9.00, 100.00, '0.2', 0.00, 'vina'),
(205, 'Pol-pol Belje 0.3', 13.50, 100.00, '0.3', 0.00, 'vina'),
(206, 'Pol-pol Kutjevo 0.2', 10.00, 100.00, '0.2', 0.00, 'vina'),
(207, 'Pol-pol Kutjevo 0.3', 15.00, 100.00, '0.3', 0.00, 'vina'),
(208, 'Bambus 0.2', 11.00, 100.00, '0.2', 1.00, 'vina'),
(209, 'Bambus 0.3', 16.50, 100.00, '0.3', 0.00, 'vina'),
(301, 'Jack Daniels-Cola', 19.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(302, 'Ballantines-Cola', 19.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(303, 'Jeger-Cola', 16.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(304, 'Stock-Cola', 13.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(305, 'Energy-Vodka', 11.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(306, 'Juice-Vodka', 16.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(307, 'Konjak-Cola', 11.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(308, 'Pelin-Cola', 13.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(309, 'Lavov-Cola', 13.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(310, 'Amaro-Cola', 13.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(311, 'Southern-Sprite', 19.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(312, 'Malibu-Juice', 19.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(313, 'Rum-Cola', 13.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(314, 'Gin-Tonic', 16.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(315, 'Gin-Bitter lemon', 16.00, 100.00, 'čaša', 0.00, 'mje_alk'),
(316, 'Gin-Tangerina', 16.00, 100.00, 'čaša', 0.00, 'mje_alk');

-- --------------------------------------------------------

--
-- Table structure for table `radno_vrijeme`
--

CREATE TABLE `radno_vrijeme` (
  `id` int NOT NULL,
  `naziv` varchar(15) NOT NULL,
  `pocetak_sat` int NOT NULL,
  `pocetak_min` int NOT NULL,
  `zavrsetak_sat` int NOT NULL,
  `zavrsetak_min` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `radno_vrijeme`
--

INSERT INTO `radno_vrijeme` (`id`, `naziv`, `pocetak_sat`, `pocetak_min`, `zavrsetak_sat`, `zavrsetak_min`) VALUES
(5, 'Fri', 7, 0, 23, 0),
(1, 'Mon', 7, 0, 23, 0),
(0, 'otv', 0, 0, 0, 0),
(6, 'Sat', 7, 0, 23, 0),
(7, 'Sun', 7, 0, 23, 0),
(4, 'Thu', 7, 0, 23, 0),
(2, 'Tue', 7, 0, 23, 0),
(3, 'Wed', 7, 0, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresa` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mjesto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `broj` varchar(18) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `vkey` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `verified` int DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `adresa`, `mjesto`, `broj`, `password`, `vkey`, `verified`, `createdate`, `role`) VALUES
(0, '', '', 'admin', 'admin', '', '', NULL, '0192023a7bbd73250516f069df18b500', 'admin', 1, '2022-03-06 15:09:15', 'admin'),
(1, '', '', 'konobar', 'konobar', '', '', NULL, '25d55ad283aa400af464c76d713c07ad', 'konobar', 1, '2022-02-28 13:31:00', 'konobar'),
(2, 'Toni', 'Kolarić', 'toni14nexe', 'toni14nexe@gmail.com', 'Vinogradska 33A', 'Donja Motičina', '0913067273', '25d55ad283aa400af464c76d713c07ad', 'ca85f1d0cea8d9d29e96cbb345a53a73', 1, '2022-03-30 08:44:04', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `narudzbe`
--
ALTER TABLE `narudzbe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `radno_vrijeme`
--
ALTER TABLE `radno_vrijeme`
  ADD PRIMARY KEY (`naziv`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `narudzbe`
--
ALTER TABLE `narudzbe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
