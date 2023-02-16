-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Loomise aeg: Jaan 27, 2023 kell 10:52 EL
-- Serveri versioon: 10.4.21-MariaDB
-- PHP versioon: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `guzov`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `suusahyppajad`
--

CREATE TABLE `suusahyppajad` (
  `id` int(11) NOT NULL,
  `alustanud` varchar(50) DEFAULT NULL,
  `kaugus` int(11) DEFAULT 0,
  `valmis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Andmete tõmmistamine tabelile `suusahyppajad`
--

INSERT INTO `suusahyppajad` (`id`, `alustanud`, `kaugus`, `valmis`) VALUES
(7, 'Vlademir', 50, NULL);

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `suusahyppajad`
--
ALTER TABLE `suusahyppajad`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `suusahyppajad`
--
ALTER TABLE `suusahyppajad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
