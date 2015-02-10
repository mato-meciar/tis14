-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Hostiteƒæ: localhost
-- Vygenerovan√©: St 14.Jan 2015, 18:15
-- Verzia serveru: 5.6.12-log
-- Verzia PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datab√°za: `fmfi`
--
CREATE DATABASE IF NOT EXISTS `fmfi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fmfi`;

-- --------------------------------------------------------

--
-- ≈†trukt√∫ra tabuƒæky pre tabuƒæku `osoba`
--

CREATE TABLE IF NOT EXISTS `osoba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `priezvisko` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `meno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `miestnost` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `klapka` int(11) NOT NULL,
  `katedra` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- S≈•ahujem d√°ta pre tabuƒæku `osoba`
--

INSERT INTO `osoba` (`id`, `priezvisko`, `meno`, `email`, `miestnost`, `klapka`, `katedra`, `foto`) VALUES
(1, 'mrkva', 'peter', 'peter.mrkva@omg.sk', 'i-30', 322, 'informatika', ''),
(2, 'kovac', 'jozef', 'jozo@trdlo.sk', 'm-200', 522, 'matematika', '');

-- --------------------------------------------------------

--
-- ≈†trukt√∫ra tabuƒæky pre tabuƒæku `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) COLLATE utf8_unicode_520_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_520_ci NOT NULL,
  `salt` varbinary(32) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci AUTO_INCREMENT=3 ;

--
-- S≈•ahujem d√°ta pre tabuƒæku `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `salt`, `admin`) VALUES
(2, 'admin', '8e95215145f10a75162057867c7e6a064ea32a855288028a01cc689acbdb98d6', 'Ú∆óñNDÛ6ÑÊœÌùçøçJn„Œ“ƒπzbŸ∂', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
