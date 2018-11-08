-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-11-2018 a las 16:38:50
-- Versión del servidor: 10.0.27-MariaDB-cll-lve
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sanepita_hermandad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `direccion` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `observaciones` text,
  `participantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ev_he` (`participantes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `direccion`, `fecha`, `tipo`, `observaciones`, `participantes`) VALUES
(1, 'Merienda', 'C/ Alfonso Miranda', '2018-11-05', 'Donaciones', 'Traed el agua', 1),
(2, 'Merienda', 'C/ Alfonso Miranda', '2018-11-05', 'Donaciones', 'Traed el agua', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hermanos`
--

CREATE TABLE IF NOT EXISTS `hermanos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(20) DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  `finscripcion` date DEFAULT NULL,
  `rol` int(11) DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `hermanos`
--

INSERT INTO `hermanos` (`id`, `nombre`, `apellidos`, `fnacimiento`, `finscripcion`, `rol`) VALUES
(1, 'Manuel', 'Rodriguez', '2004-05-15', '2018-11-12', 3),
(2, 'Manuel', 'Rodriguez', '2004-05-15', '2018-11-12', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fentrada` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` text,
  `hermano` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `importe` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pa_he` (`hermano`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `concepto`, `hermano`, `fecha`, `importe`) VALUES
(1, NULL, NULL, NULL, NULL),
(2, 'Pago Anual', 1, '2018-11-06', 210),
(3, 'Pago anual', 1, '2018-11-13', 210.17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE IF NOT EXISTS `reuniones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(20) DEFAULT NULL,
  `observarciones` text,
  `participantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `re_he` (`participantes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `ev_he` FOREIGN KEY (`participantes`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pa_he` FOREIGN KEY (`hermano`) REFERENCES `hermanos` (`id`);

--
-- Filtros para la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD CONSTRAINT `re_he` FOREIGN KEY (`participantes`) REFERENCES `hermanos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
