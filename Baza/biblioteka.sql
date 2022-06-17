-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Cze 2022, 15:30
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `imie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `imie`) VALUES
(1, 'admin', 'admin', 'Jan Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czytelnicy`
--

CREATE TABLE `czytelnicy` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `imie` text NOT NULL,
  `urodziny` date DEFAULT NULL,
  `plec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `czytelnicy`
--

INSERT INTO `czytelnicy` (`id`, `login`, `password`, `imie`, `urodziny`, `plec`) VALUES
(2, 'user2', 'user2', 'Adrian Ziutek', '1992-04-08', 1),
(3, 'user3', 'user3', 'Mariusz Ziomek', NULL, 0),
(28, 'usersadf', 'user3', 'ja ktor', '2022-06-01', 1),
(29, 'user635', 'user3', 'sdaf', '2022-06-02', 1),
(30, 'shg', 'user3', 'cv', '2022-06-01', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gatunek`
--

CREATE TABLE `gatunek` (
  `ID` int(11) NOT NULL,
  `gatunek` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `gatunek`
--

INSERT INTO `gatunek` (`ID`, `gatunek`) VALUES
(1, 'Fantastyka'),
(2, 'Sci-Fi'),
(3, 'Romans'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `ID` int(11) NOT NULL,
  `tytul` text COLLATE utf8_polish_ci NOT NULL,
  `gatunek` int(11) NOT NULL,
  `autor` text COLLATE utf8_polish_ci NOT NULL,
  `stan` int(11) NOT NULL DEFAULT 1,
  `czytelnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`ID`, `tytul`, `gatunek`, `autor`, `stan`, `czytelnik`) VALUES
(1, 'Lew, czarownica i stara szafa', 1, 'C.S. Lewis', 2, 1),
(5, 'df', 1, 'sd', 2, 3),
(6, 'dfg', 1, 'sdfg', 2, 3),
(7, 'dfg', 1, 'sdfg', 2, 3),
(8, 'dsfg', 1, 'dsg', 2, 3),
(9, 'dsfg', 3, 'sd', 2, 3),
(13, 'ffgh', 2, 'fgh', 2, 3),
(15, 'g', 4, 'fgh', 2, 3),
(16, 'asd', 3, 'asd', 2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statystyka`
--

CREATE TABLE `statystyka` (
  `id` int(11) NOT NULL,
  `id_ksiazka` int(11) NOT NULL,
  `id_czytelnik` int(11) NOT NULL,
  `data` date NOT NULL,
  `typ` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `statystyka`
--

INSERT INTO `statystyka` (`id`, `id_ksiazka`, `id_czytelnik`, `data`, `typ`, `id_admin`) VALUES
(1, 3, 3, '2022-06-17', 2, 2),
(2, 6, 3, '0000-00-00', 2, 1),
(3, 8, 3, '0000-00-00', 2, 1),
(4, 13, 3, '0000-00-00', 2, 1),
(5, 1, 1, '0000-00-00', 2, 1),
(6, 1, 1, '0000-00-00', 2, 1),
(7, 1, 1, '0000-00-00', 2, 1),
(8, 1, 1, '0000-00-00', 2, 1),
(9, 1, 1, '0000-00-00', 2, 1),
(10, 1, 1, '0000-00-00', 2, 1),
(11, 1, 1, '0000-00-00', 2, 1),
(12, 1, 1, '0000-00-00', 2, 1),
(13, 1, 1, '0000-00-00', 2, 1),
(14, 1, 1, '0000-00-00', 2, 1),
(15, 1, 1, '0000-00-00', 2, 1),
(16, 1, 1, '0000-00-00', 2, 1),
(17, 1, 1, '0000-00-00', 2, 1),
(18, 1, 1, '0000-00-00', 2, 1),
(19, 1, 1, '0000-00-00', 2, 1),
(20, 1, 1, '2022-06-17', 2, 1),
(21, 1, 1, '2022-06-17', 2, 1),
(22, 1, 1, '2022-06-17', 2, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `czytelnicy`
--
ALTER TABLE `czytelnicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `gatunek`
--
ALTER TABLE `gatunek`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `statystyka`
--
ALTER TABLE `statystyka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `czytelnicy`
--
ALTER TABLE `czytelnicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT dla tabeli `gatunek`
--
ALTER TABLE `gatunek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `statystyka`
--
ALTER TABLE `statystyka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
