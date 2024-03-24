-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 24. 22:48
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
-- Adatbázis: `webshop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `felhasznalo_id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `defaddress` varchar(255) NOT NULL,
  `Szállítási_cím` varchar(255) DEFAULT NULL,
  `tel` varchar(20) NOT NULL,
  `Bankkártya_szám` bigint(16) DEFAULT NULL,
  `CVC` tinyint(4) DEFAULT NULL,
  `lejárat` varchar(5) DEFAULT NULL,
  `Regisztráció_ideje` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `tos` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`felhasznalo_id`, `username`, `lastname`, `firstname`, `email`, `pwd`, `defaddress`, `Szállítási_cím`, `tel`, `Bankkártya_szám`, `CVC`, `lejárat`, `Regisztráció_ideje`, `admin`, `tos`) VALUES
(1, 'Testing', 'Doe', 'John', 'asdasd@gmail.com', '$2a$12$jhFTJO4kIP77chUm0V.GzOlG.E5Y1sShuuY4p.2mYb5dCJskRcNn2', '9021, Győr Valami utca', NULL, '+36905683237', NULL, NULL, NULL, '2024-03-21 15:29:12', 0, 0),
(5, 'Cziperlan', 'Czipri', 'Gergő', 'czippgergo@gmail.com', '$2y$12$keYHNueLxnkru5hjhJrd1ud4iaFba.om2wkcHkJWZiFg/hUddIfbC', '9021, Győr Igen Igen', NULL, '+36 40 783 2849', NULL, NULL, NULL, '2024-03-22 19:27:33', 0, 1),
(6, 'JackDaniels', 'Daniels', 'Jack', 'jack_daniels@gmail.com', '$2y$12$uodQX/XUFqcLYdP/CB8WU.iOqLhJFAXo9dIz4JzNR9joA.TxOi9yW', 'Igen', NULL, '+36 40 789 3723', NULL, NULL, NULL, '2024-03-23 18:49:25', 0, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`felhasznalo_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `felhasznalo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
