-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Maj 2017, 16:07
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `d14_kukiz_krzysztof`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bd_cat_przy`
--

CREATE TABLE `bd_cat_przy` (
  `cat_przy_id` int(11) NOT NULL,
  `cat_przy_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Zrzut danych tabeli `bd_cat_przy`
--

INSERT INTO `bd_cat_przy` (`cat_przy_id`, `cat_przy_name`) VALUES
(1, 'Przychody');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bd_cat_wyd`
--

CREATE TABLE `bd_cat_wyd` (
  `cat_wyd_id` int(11) NOT NULL,
  `cat_wyd_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Zrzut danych tabeli `bd_cat_wyd`
--

INSERT INTO `bd_cat_wyd` (`cat_wyd_id`, `cat_wyd_name`) VALUES
(1, 'Mieszkanie'),
(2, 'Ubezbieczenie'),
(3, 'Transport');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bd_chil_przy`
--

CREATE TABLE `bd_chil_przy` (
  `chil_przy_id` int(11) NOT NULL,
  `cat_przy_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `bd_chil_przy`
--

INSERT INTO `bd_chil_przy` (`chil_przy_id`, `cat_przy_id`, `name`, `value`) VALUES
(1, 1, 'Przychód 1', '2030'),
(2, 1, 'Przychód 2', '107');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `bd_chil_wyd`
--

CREATE TABLE `bd_chil_wyd` (
  `chil_wyd_id` int(11) NOT NULL,
  `cat_wyd_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `bd_chil_wyd`
--

INSERT INTO `bd_chil_wyd` (`chil_wyd_id`, `cat_wyd_id`, `name`, `value`) VALUES
(1, 1, 'Woda', '24'),
(2, 2, '3', '4'),
(3, 3, '4', '5'),
(4, 2, 'Nowa wartość', '100'),
(5, 2, 'Nowa wartość', '100');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `bd_cat_przy`
--
ALTER TABLE `bd_cat_przy`
  ADD PRIMARY KEY (`cat_przy_id`);

--
-- Indexes for table `bd_cat_wyd`
--
ALTER TABLE `bd_cat_wyd`
  ADD PRIMARY KEY (`cat_wyd_id`);

--
-- Indexes for table `bd_chil_przy`
--
ALTER TABLE `bd_chil_przy`
  ADD PRIMARY KEY (`chil_przy_id`);

--
-- Indexes for table `bd_chil_wyd`
--
ALTER TABLE `bd_chil_wyd`
  ADD PRIMARY KEY (`chil_wyd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `bd_cat_przy`
--
ALTER TABLE `bd_cat_przy`
  MODIFY `cat_przy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT dla tabeli `bd_cat_wyd`
--
ALTER TABLE `bd_cat_wyd`
  MODIFY `cat_wyd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `bd_chil_przy`
--
ALTER TABLE `bd_chil_przy`
  MODIFY `chil_przy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `bd_chil_wyd`
--
ALTER TABLE `bd_chil_wyd`
  MODIFY `chil_wyd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
