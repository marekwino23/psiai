-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Lis 2019, 10:01
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

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
  `doi` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `numOfPoints` int(11) DEFAULT NULL,
  `conference` text DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `publishes`
--

INSERT INTO `publishes` (`id`, `year`, `title`, `createdWith`, `participation`, `doi`, `date`, `numOfPoints`, `conference`, `user_id`) VALUES
(1, 2011, 'Green green green green green', 'Me, Myself', 50, '0', '2011-11-11', 651, 'NewYorkTimes', 6),
(2, 2015, 'No one knows the power of the Kingdom', 'Who, Knows', 74, '0', '2015-10-25', 612, 'InMyBedroom', 6),
(3, 2012, 'A way powerfull publish', 'Who, Knows', 51, '0', '2012-12-01', 659, 'Krakow', 6),
(4, 2013, 'Huwaei is the best phone JK', 'Not, Me', 50, 'doi.org/hopeitworks', '2013-05-15', 627, 'GarDamn', 6);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `publishes`
--
ALTER TABLE `publishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publishes_ibfk_1` (`user_id`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `publishes`
--
ALTER TABLE `publishes`
  ADD CONSTRAINT `publishes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
