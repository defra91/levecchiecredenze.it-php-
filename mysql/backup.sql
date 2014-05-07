-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
-- Generato il: Mag 07, 2014 alle 09:42
-- Versione del server: 5.5.36
-- Versione PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
--

-- --------------------------------------------------------

--
-- Struttura della tabella `contatore_visite`
--

CREATE TABLE IF NOT EXISTS `contatore_visite` (
  `id_visita` int(10) NOT NULL AUTO_INCREMENT,
  `ip_utilizzato` varchar(50) NOT NULL,
  `browser` varchar(50) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id_visita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8843 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `eventi`
--

CREATE TABLE IF NOT EXISTS `eventi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `inizio` date NOT NULL,
  `fine` date NOT NULL,
  `descrizione` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

CREATE TABLE IF NOT EXISTS `immagini` (
  `id_immagine` int(10) NOT NULL AUTO_INCREMENT,
  `nome_immagine` varchar(100) NOT NULL,
  `percorso_immagine` varchar(100) NOT NULL,
  `risoluzione_immagine` varchar(100) NOT NULL,
  `dimensione_immagine` double(10,2) NOT NULL,
  `estensione_immagine` varchar(100) NOT NULL,
  `categoria_immagine` varchar(100) NOT NULL,
  `alt` varchar(100) DEFAULT NULL,
  `titolo` varchar(100) DEFAULT NULL,
  `ultima_modifica` datetime NOT NULL,
  PRIMARY KEY (`id_immagine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `iscrizioni`
--

CREATE TABLE IF NOT EXISTS `iscrizioni` (
  `id_utente` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `cognome` varchar(100) DEFAULT NULL,
  `e_mail` varchar(200) DEFAULT NULL,
  `data_registrazione` datetime DEFAULT NULL,
  PRIMARY KEY (`id_utente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=862 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(10) NOT NULL AUTO_INCREMENT,
  `titolo` text,
  `testo` text,
  `data` datetime DEFAULT NULL,
  `lingua` varchar(5) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE IF NOT EXISTS `utenti` (
  `id_utente` int(10) NOT NULL AUTO_INCREMENT,
  `nome_utente` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_utente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
