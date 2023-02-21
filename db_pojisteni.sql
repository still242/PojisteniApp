-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 21. úno 2023, 17:21
-- Verze serveru: 10.4.25-MariaDB
-- Verze PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `db_pojisteni`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `pojistenec`
--

CREATE TABLE `pojistenec` (
  `pojistenec_id` int(11) NOT NULL,
  `jmeno` varchar(31) COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(31) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_czech_ci NOT NULL,
  `telefon` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `adresa` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `mesto` varchar(35) COLLATE utf8_czech_ci NOT NULL,
  `psc` varchar(10) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pojistenec`
--

INSERT INTO `pojistenec` (`pojistenec_id`, `jmeno`, `prijmeni`, `email`, `telefon`, `adresa`, `mesto`, `psc`) VALUES
(20, 'Jan', 'Novák', 'jan.novak@seznam.cz', '777481526', 'Vodnická 488/20', 'Valašské Meziříčí', '75513');

-- --------------------------------------------------------

--
-- Struktura tabulky `pojisteni`
--

CREATE TABLE `pojisteni` (
  `pojisteni_id` int(11) NOT NULL,
  `pojisteni` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `castka` int(20) NOT NULL,
  `predmet_pojisteni` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `pojisteni_od` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `pojisteni_do` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `pojistenec_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pojisteni`
--

INSERT INTO `pojisteni` (`pojisteni_id`, `pojisteni`, `castka`, `predmet_pojisteni`, `pojisteni_od`, `pojisteni_do`, `pojistenec_id`) VALUES
(41, 'Pojisteni vozidel', 500000, 'dodávka', '2023-02-22', '2024-02-21', 20);

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `uzivatelske_jmeno` text COLLATE utf8_czech_ci NOT NULL,
  `heslo` varchar(242) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `pojistenec`
--
ALTER TABLE `pojistenec`
  ADD PRIMARY KEY (`pojistenec_id`);

--
-- Indexy pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  ADD PRIMARY KEY (`pojisteni_id`),
  ADD KEY `pojistenec_id` (`pojistenec_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `pojistenec`
--
ALTER TABLE `pojistenec`
  MODIFY `pojistenec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  MODIFY `pojisteni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `pojisteni`
--
ALTER TABLE `pojisteni`
  ADD CONSTRAINT `pojisteni_ibfk_1` FOREIGN KEY (`pojistenec_id`) REFERENCES `pojistenec` (`pojistenec_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
