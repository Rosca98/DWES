-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2021 a las 17:47:55
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `idReservation` int(11) NOT NULL,
  `idResource` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idTimeSlot` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservations`
--

INSERT INTO `reservations` (`idReservation`, `idResource`, `idUser`, `idTimeSlot`, `date`, `remarks`) VALUES
(23, 9, 8, 2, '2021-10-31 12:34:39', ''),
(25, 10, 1, 17, '2021-11-01 13:02:52', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE `resources` (
  `idResource` int(3) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resources`
--

INSERT INTO `resources` (`idResource`, `name`, `description`, `location`, `image`) VALUES
(6, 'Carro Portatiles 1', 'Carro de Portatiles de uso publico', 'Biblioteca', ''),
(7, 'Carro Portatiles 2', 'Carro de Portatiles de uso publico', 'Biblioteca', ''),
(8, 'Carro Portatiles 3', 'Carro de Portatiles de uso publico', 'Biblioteca', ''),
(9, 'Sala 1', 'Sala de Reuniones 1', 'Sala 1', ''),
(10, 'Sala 2', 'Sala de Reuniones 2', 'Sala 2', ''),
(11, 'Proyector', 'Proyector de uso publico', 'Secretaria', 'http://localhost/2daw/reserva/assets/img/2020-11-05 14.01.21 app.diagrams.net b2aff8ee3c13.png'),
(12, 'Salon de Actos', 'Salon de Actos', 'Salon de Actos', 'http://localhost/2daw/reserva/assets/img/tomhardy.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `timeslots`
--

CREATE TABLE `timeslots` (
  `idTimeSlot` int(11) NOT NULL,
  `dayOfWeek` enum('Lunes','Martes','Miercoles','Jueves','Viernes') DEFAULT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `timeslots`
--

INSERT INTO `timeslots` (`idTimeSlot`, `dayOfWeek`, `startTime`, `endTime`) VALUES
(2, 'Lunes', '08:05:00', '09:05:00'),
(13, 'Lunes', '09:05:00', '10:05:00'),
(14, 'Lunes', '10:05:00', '11:05:00'),
(15, 'Lunes', '11:35:00', '12:35:00'),
(16, 'Lunes', '12:35:00', '13:35:00'),
(17, 'Lunes', '13:35:00', '14:35:00'),
(18, 'Martes', '08:05:00', '09:05:00'),
(19, 'Martes', '09:05:00', '10:05:00'),
(20, 'Martes', '10:05:00', '11:05:00'),
(21, 'Martes', '11:35:00', '12:35:00'),
(22, 'Martes', '12:35:00', '13:35:00'),
(23, 'Martes', '13:35:00', '14:35:00'),
(24, 'Miercoles', '08:05:00', '09:05:00'),
(25, 'Miercoles', '09:05:00', '10:05:00'),
(26, 'Miercoles', '10:05:00', '11:05:00'),
(27, 'Miercoles', '11:35:00', '12:35:00'),
(28, 'Miercoles', '12:35:00', '13:35:00'),
(29, 'Miercoles', '13:35:00', '14:35:00'),
(30, 'Jueves', '08:05:00', '09:05:00'),
(31, 'Jueves', '09:05:00', '10:05:00'),
(32, 'Jueves', '10:05:00', '11:05:00'),
(33, 'Jueves', '11:35:00', '12:35:00'),
(34, 'Jueves', '12:35:00', '13:35:00'),
(35, 'Jueves', '13:35:00', '14:35:00'),
(36, 'Viernes', '08:05:00', '09:05:00'),
(37, 'Viernes', '09:05:00', '10:05:00'),
(38, 'Viernes', '10:05:00', '11:05:00'),
(39, 'Viernes', '11:35:00', '12:35:00'),
(40, 'Viernes', '12:35:00', '13:35:00'),
(41, 'Viernes', '13:35:00', '14:35:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `type` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`, `realname`, `type`) VALUES
(1, 'cristian', '81dc9bdb52d04dc20036dbd8313ed055', 'cristian rosca', '0'),
(8, 'nuevo', '81dc9bdb52d04dc20036dbd8313ed055', 'nuevo', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`idReservation`),
  ADD KEY `idResource` (`idResource`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idTimeSlot` (`idTimeSlot`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`idResource`);

--
-- Indices de la tabla `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`idTimeSlot`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
  MODIFY `idResource` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `idTimeSlot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`idResource`) REFERENCES `resources` (`idResource`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`),
  ADD CONSTRAINT `reservations_ibfk_3` FOREIGN KEY (`idTimeSlot`) REFERENCES `timeslots` (`idTimeSlot`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
