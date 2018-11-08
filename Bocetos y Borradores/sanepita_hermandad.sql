-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-11-2018 a las 16:13:04
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
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hermano` int(11) DEFAULT NULL,
  `reunion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `he_as` (`hermano`),
  KEY `re_nu` (`reunion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `direccion` varchar(25) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(25) DEFAULT NULL,
  `observaciones` varchar(80) DEFAULT NULL,
  `participantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ev_he` (`participantes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `direccion`, `fecha`, `tipo`, `observaciones`, `participantes`) VALUES
(1, 'comida', 'parque', '2018-11-12', 'donativos', 'traed candelabros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hermanos`
--

CREATE TABLE IF NOT EXISTS `hermanos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `apellidos` varchar(25) DEFAULT NULL,
  `contraseña` varchar(25) DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  `finscripcion` date DEFAULT NULL,
  `rol` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `hermanos`
--

INSERT INTO `hermanos` (`id`, `nombre`, `apellidos`, `contraseña`, `fnacimiento`, `finscripcion`, `rol`) VALUES
(1, 'Pruebas', 'uno', 'dos', '2018-11-12', '2018-11-13', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hermano` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `he_pa` (`hermano`),
  KEY `pa_nu` (`pago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `cantidad` varchar(25) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participacion`
--

CREATE TABLE IF NOT EXISTS `participacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `participante` int(11) DEFAULT NULL,
  `evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pa_ev` (`participante`),
  KEY `ev_nu` (`evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE IF NOT EXISTS `reuniones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(25) DEFAULT NULL,
  `observaciones` text,
  `participantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `re_he` (`participantes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `he_as` FOREIGN KEY (`hermano`) REFERENCES `hermanos` (`id`),
  ADD CONSTRAINT `re_nu` FOREIGN KEY (`reunion`) REFERENCES `reuniones` (`id`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `ev_he` FOREIGN KEY (`participantes`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `he_pa` FOREIGN KEY (`hermano`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_nu` FOREIGN KEY (`pago`) REFERENCES `pagos` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pa_he` FOREIGN KEY (`hermano`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `participacion`
--
ALTER TABLE `participacion`
  ADD CONSTRAINT `ev_nu` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_ev` FOREIGN KEY (`participante`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD CONSTRAINT `re_he` FOREIGN KEY (`participantes`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
