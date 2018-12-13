-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-12-2018 a las 23:19:25
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finaltrayecto`
--

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
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$6rXK7QAWNrM8e2iYBsP3HeOz4gQiViJO4a9kbPNKgEv1ImnlIy8Di', '2018-12-23', '2018-12-13 22:17:55', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hermanos`
--
ALTER TABLE `hermanos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hermanos`
--
ALTER TABLE `hermanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
