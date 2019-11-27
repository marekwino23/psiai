-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Lis 2019, 22:32
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.1.32

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
-- Struktura tabeli dla tabeli `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(14) NOT NULL,
  `email` varchar(16) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `email`, `msg`) VALUES
(1, 'Marek', 'marekwino12@gmai', 'Siemka'),
(9, 'Marek', 'marekw1996@gmail', 'udna sprawa prosze pana');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `publishes`
--

CREATE TABLE `publishes` (
  `id` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `createdWith` varchar(50) DEFAULT NULL,
  `participation` varchar(11) DEFAULT NULL,
  `doi` varchar(36) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `numOfPoints` varchar(11) DEFAULT NULL,
  `conference` text DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `publishes`
--

INSERT INTO `publishes` (`id`, `year`, `title`, `createdWith`, `participation`, `doi`, `date`, `numOfPoints`, `conference`, `user_id`) VALUES
(1, 2012, 'Romeo i Julia', 'Szekspir', '30', '97', '2018-03-08', '12', 'Stargard', 5),
(2, 2011, 'Romeo i Oskar', 'Artur Kaczmarczyk', '15', '30', '2016-02-05', '60', 'Szczecin', 5),
(3, 2013, 'Rowerek', 'Kaczmarczyk 95% Janusz 5%', '12', '191', '2012-03-05', '12', 'berlin', 5),
(4, 2010, 'Romeo i Oskar', 'Janusz, Artur Kaczmarczyk', '95%, 5%', '191', '2012-03-05', '60', 'Berlin', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `uniwersity` text DEFAULT NULL,
  `typ` enum('user','admin','','') NOT NULL,
  `publishes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `uniwersity`, `typ`, `publishes_id`) VALUES
(1, 'wm41648@zut.edu.pl', 'a6e6bf7a9407ac3a0fe51cc1ff454209', 'PUM', 'admin', 0),
(3, 'przemek.zagloba@gmail.com', 'a533085fa15e31769d1f4bcee3470492', 'pum', 'user', 0),
(5, 'dawid@gmail.com', 'c7424b4f43a592c9939b17c9e60f3ea9', 'zut', 'user', 0);

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
  ADD CONSTRAINT `publishes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
