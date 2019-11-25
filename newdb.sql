-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Lis 2019, 21:10
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `newdb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `publishes`
--

CREATE TABLE `publishes` (
  `id` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `createdWith` varchar(50) DEFAULT NULL,
  `participation` int(11) DEFAULT NULL,
  `doi` varchar(36) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `numOfPoints` int(11) DEFAULT NULL,
  `conference` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `publishes`
--

INSERT INTO `publishes` (`id`, `year`, `title`, `createdWith`, `participation`, `doi`, `date`, `numOfPoints`, `conference`) VALUES
(1, 2012, 'qwert', 'qwer', 15, 'qwwwwwwwer', '0000-00-00', 12, 0),
(2, 2012, '12233344', 'qasdrff', 12, 'awffrfrfrfw', '0000-00-00', 40, NULL),
(3, 2012, 'asdeed', 'aeweea', 0, 'aww', '0000-00-00', 40, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` tinyint(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `uniwersity` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `uniwersity`) VALUES
(1, 3, 'qweertgfgf', 'zut'),
(2, 4, 'wwrretrt', 'erewrewwerewer'),
(3, 5, 'zut', 'zut'),
(4, 6, 'qwerty', 'zut'),
(5, NULL, 'qwretqywurjiklyo;p\'[\'', NULL),
(6, NULL, 'sghhttrrth', 'zut');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `publishes`
--
ALTER TABLE `publishes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `publishes`
--
ALTER TABLE `publishes`
  ADD CONSTRAINT `publishes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
