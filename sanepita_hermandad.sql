-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2018 at 06:11 PM
-- Server version: 10.0.27-MariaDB-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sanepita_hermandad`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `direccion` varchar(25) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(25) DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `hermanos`
--

CREATE TABLE IF NOT EXISTS `hermanos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(25) DEFAULT NULL,
  `password` varchar(25) NOT NULL,
  `fnacimiento` date NOT NULL,
  `finscripcion` date DEFAULT NULL,
  `rol` int(11) DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hermanos`
--

INSERT INTO `hermanos` (`id`, `nombre`, `apellidos`, `password`, `fnacimiento`, `finscripcion`, `rol`) VALUES
(1, 'Enrique', 'Vazquez', 'cc00728f2a551c23ef917dfd7', '2018-11-15', '2018-10-08', 1),
(2, 'Manuel', 'Fernandez', 'cc00728f2a551c23ef917dfd7', '2018-11-13', '2018-11-13', 3),
(3, 'Mario', 'Salas', 'cc00728f2a551c23ef917dfd7', '2018-11-13', '2018-11-05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `he_ev`
--

CREATE TABLE IF NOT EXISTS `he_ev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asistencia` int(11) DEFAULT NULL,
  `evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `he_ev` (`asistencia`),
  KEY `ev_nu` (`evento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `he_pa`
--

CREATE TABLE IF NOT EXISTS `he_pa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hermano` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `he_pa` (`hermano`),
  KEY `pa_nu` (`pago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `he_re`
--

CREATE TABLE IF NOT EXISTS `he_re` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `participante` int(11) DEFAULT NULL,
  `reunion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pa_re` (`participante`),
  KEY `re_nu` (`reunion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` text,
  `fecha` date DEFAULT NULL,
  `importe` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `reuniones`
--

CREATE TABLE IF NOT EXISTS `reuniones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(25) NOT NULL,
  `observaciones` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `utileria`
--

CREATE TABLE IF NOT EXISTS `utileria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `cantidad` varchar(25) DEFAULT '1',
  `estado` varchar(25) DEFAULT NULL,
  `fentrada` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `he_ev`
--
ALTER TABLE `he_ev`
  ADD CONSTRAINT `ev_nu` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `he_ev` FOREIGN KEY (`asistencia`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `he_pa`
--
ALTER TABLE `he_pa`
  ADD CONSTRAINT `he_pa` FOREIGN KEY (`hermano`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_nu` FOREIGN KEY (`pago`) REFERENCES `pagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `he_re`
--
ALTER TABLE `he_re`
  ADD CONSTRAINT `pa_re` FOREIGN KEY (`participante`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `re_nu` FOREIGN KEY (`reunion`) REFERENCES `reuniones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
