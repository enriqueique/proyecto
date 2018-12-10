-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2018 a las 22:36:04
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sanepita`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(25) DEFAULT NULL,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `direccion`, `fecha`, `tipo`, `observaciones`) VALUES
(2, 'Prestashop', 'calle industria 3, 41006, Sevilla', '2018-12-08 12:45:43', 'Convivencia', ''),
(4, 'Joomla', 'Calle monte', '2018-12-08 12:45:59', 'Asuntos Internos', 'Ya esta corregdo'),
(6, 'asd', 'asd', '2018-12-10 20:33:12', 'Conferencia', 'asd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hermanos`
--

CREATE TABLE `hermanos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellidos` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  `finscripcion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` int(11) DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hermanos`
--

INSERT INTO `hermanos` (`id`, `nombre`, `apellidos`, `email`, `password`, `fnacimiento`, `finscripcion`, `rol`) VALUES
(1, 'Enrique', 'Vazquez', 'creameritoquique@gmail.com', '$2y$10$MY1dVcYS7aWzqqPKsBu5cu9ZtPU054QTAAowxXP9iafkmVT8P85la', '2018-11-15', '2018-10-07 22:00:00', 1),
(12, 'Prueba', 'Prueba', 'prueba@prueba.com', '$2y$10$OIJbnWQBySdVHBBrVW0BsuM.hyZx2YSgx.vSNGAVYqJYXaVogencS', '2018-11-29', '2018-11-22 00:18:10', 3),
(13, 'test', 'tet', 'test@test.com', '$2y$10$128Bwkv0wBBdbb8JI55gwewaagbyBE/P0B55fvdxEZw0vd5LLRGaS', '2018-12-22', '2018-12-10 21:27:10', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `he_ev`
--

CREATE TABLE `he_ev` (
  `id` int(11) NOT NULL,
  `asistencia` int(11) DEFAULT NULL,
  `evento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `he_ev`
--

INSERT INTO `he_ev` (`id`, `asistencia`, `evento`) VALUES
(5, 1, 2),
(41, 1, 6),
(42, 12, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `he_pa`
--

CREATE TABLE `he_pa` (
  `id` int(11) NOT NULL,
  `hermano` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `he_pa`
--

INSERT INTO `he_pa` (`id`, `hermano`, `pago`) VALUES
(1, 1, 5),
(8, 1, 7),
(9, 12, 7),
(10, 12, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `he_re`
--

CREATE TABLE `he_re` (
  `id` int(11) NOT NULL,
  `participante` int(11) DEFAULT NULL,
  `reunion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `he_re`
--

INSERT INTO `he_re` (`id`, `participante`, `reunion`) VALUES
(8, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `concepto` text,
  `fecha` date DEFAULT NULL,
  `importe` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `concepto`, `fecha`, `importe`) VALUES
(5, 'Pago Anual', '2018-12-11', 3.2),
(7, 'otras', '2018-12-11', 12.3),
(8, 'Prueba', '2018-12-05', 12.3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reuniones`
--

CREATE TABLE `reuniones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(25) DEFAULT NULL,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reuniones`
--

INSERT INTO `reuniones` (`id`, `nombre`, `fecha`, `tipo`, `observaciones`) VALUES
(1, '1awdawd', '2018-12-06 00:12:00', 'funciona', 'adawd'),
(2, 'asdasasd', '2018-12-10 20:29:12', 'Banda', '                                    asdasda  \r\n                                '),
(3, 'asasd', '2018-12-10 20:29:04', 'Semana Santa', '                                                                        asd  \r\n                                  \r\n                                ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utileria`
--

CREATE TABLE `utileria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `cantidad` varchar(25) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `fentrada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `utileria`
--

INSERT INTO `utileria` (`id`, `nombre`, `cantidad`, `estado`, `fentrada`) VALUES
(1, 'asdasda', '12 cajas', 'En Revisión', '2018-12-18'),
(2, 'asd', 'asd', 'En Mantenimiento', '2018-12-04'),
(3, 'Prueba', '123 cajas', 'En Reparación', '2018-12-05'),
(4, 'wqeqewq', 'sdaaz', 'En Mantenimiento', '2018-12-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hermanos`
--
ALTER TABLE `hermanos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `he_ev`
--
ALTER TABLE `he_ev`
  ADD PRIMARY KEY (`id`),
  ADD KEY `he_ev` (`asistencia`),
  ADD KEY `ev_nu` (`evento`);

--
-- Indices de la tabla `he_pa`
--
ALTER TABLE `he_pa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `he_pa` (`hermano`),
  ADD KEY `pa_nu` (`pago`);

--
-- Indices de la tabla `he_re`
--
ALTER TABLE `he_re`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pa_re` (`participante`),
  ADD KEY `re_nu` (`reunion`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `utileria`
--
ALTER TABLE `utileria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `hermanos`
--
ALTER TABLE `hermanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `he_ev`
--
ALTER TABLE `he_ev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `he_pa`
--
ALTER TABLE `he_pa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `he_re`
--
ALTER TABLE `he_re`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `reuniones`
--
ALTER TABLE `reuniones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `utileria`
--
ALTER TABLE `utileria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `he_ev`
--
ALTER TABLE `he_ev`
  ADD CONSTRAINT `ev_nu` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `he_ev` FOREIGN KEY (`asistencia`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `he_pa`
--
ALTER TABLE `he_pa`
  ADD CONSTRAINT `he_pa` FOREIGN KEY (`hermano`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pa_nu` FOREIGN KEY (`pago`) REFERENCES `pagos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `he_re`
--
ALTER TABLE `he_re`
  ADD CONSTRAINT `pa_re` FOREIGN KEY (`participante`) REFERENCES `hermanos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `re_nu` FOREIGN KEY (`reunion`) REFERENCES `reuniones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
