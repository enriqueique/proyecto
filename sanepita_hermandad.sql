-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2018 at 10:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanepita`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
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
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `direccion`, `fecha`, `tipo`, `observaciones`) VALUES
(1, 'WordPress1', 'Calle Industria', '2018-11-25 20:40:55', NULL, 'La reunión se realizará en el bar el cartuchito.'),
(2, 'Prestashop', 'calle industria 3, 41006, Sevilla', '2018-11-10 14:20:00', NULL, ''),
(4, 'Joomla', 'Calle monte', '2018-11-14 21:02:00', NULL, 'Curso joomla desde cero');

-- --------------------------------------------------------

--
-- Table structure for table `hermanos`
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
-- Dumping data for table `hermanos`
--

INSERT INTO `hermanos` (`id`, `nombre`, `apellidos`, `email`, `password`, `fnacimiento`, `finscripcion`, `rol`) VALUES
(1, 'Enrique', 'Vazquez', 'creameritoquique@gmail.com', '$2y$10$qFoi87YHPADyq5.JM8LPdurrf1CW2aZTeLHNBIFnUqb9oKOwRWbN2', '2018-11-15', '2018-10-07 22:00:00', 1),
(12, 'Prueba', 'Prueba', 'prueba@prueba.com', '$2y$10$OIJbnWQBySdVHBBrVW0BsuM.hyZx2YSgx.vSNGAVYqJYXaVogencS', '2018-11-29', '2018-11-22 00:18:10', 3);

-- --------------------------------------------------------

--
-- Table structure for table `he_ev`
--

CREATE TABLE `he_ev` (
  `id` int(11) NOT NULL,
  `asistencia` int(11) DEFAULT NULL,
  `evento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `he_ev`
--

INSERT INTO `he_ev` (`id`, `asistencia`, `evento`) VALUES
(1, 1, 1),
(2, 12, 1),
(3, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `he_pa`
--

CREATE TABLE `he_pa` (
  `id` int(11) NOT NULL,
  `hermano` int(11) DEFAULT NULL,
  `pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `he_re`
--

CREATE TABLE `he_re` (
  `id` int(11) NOT NULL,
  `participante` int(11) DEFAULT NULL,
  `reunion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `concepto` text,
  `fecha` date DEFAULT NULL,
  `importe` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reuniones`
--

CREATE TABLE `reuniones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` varchar(25) DEFAULT NULL,
  `observaciones` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utileria`
--

CREATE TABLE `utileria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `cantidad` varchar(25) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `fentrada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utileria`
--

INSERT INTO `utileria` (`id`, `nombre`, `cantidad`, `estado`, `fentrada`) VALUES
(1, 'vela', '2', 'Nuevo', '2018-11-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hermanos`
--
ALTER TABLE `hermanos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `he_ev`
--
ALTER TABLE `he_ev`
  ADD PRIMARY KEY (`id`),
  ADD KEY `he_ev` (`asistencia`),
  ADD KEY `ev_nu` (`evento`);

--
-- Indexes for table `he_pa`
--
ALTER TABLE `he_pa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `he_pa` (`hermano`),
  ADD KEY `pa_nu` (`pago`);

--
-- Indexes for table `he_re`
--
ALTER TABLE `he_re`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pa_re` (`participante`),
  ADD KEY `re_nu` (`reunion`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reuniones`
--
ALTER TABLE `reuniones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utileria`
--
ALTER TABLE `utileria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hermanos`
--
ALTER TABLE `hermanos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `he_ev`
--
ALTER TABLE `he_ev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `he_pa`
--
ALTER TABLE `he_pa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `he_re`
--
ALTER TABLE `he_re`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reuniones`
--
ALTER TABLE `reuniones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utileria`
--
ALTER TABLE `utileria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
