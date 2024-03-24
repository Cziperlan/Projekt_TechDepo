-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 24. 21:02
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webshop2`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tb_dataforum`
--

CREATE TABLE `tb_dataforum` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `comment` varchar(150) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `tb_dataforum`
--

INSERT INTO `tb_dataforum` (`id`, `name`, `comment`, `date`, `reply_id`) VALUES
(18, 'Ábel', 'Cigiztem!4!!', 'February 18 2024, 02:25:35 PM', 0),
(19, 'Módos', 'Na most megvagy te kis szaros!', 'February 18 2024, 02:27:15 PM', 18);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `tb_dataforum`
--
ALTER TABLE `tb_dataforum`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `tb_dataforum`
--
ALTER TABLE `tb_dataforum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
