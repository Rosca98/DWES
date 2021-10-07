-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2021 a las 12:49:51
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videoclub`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actuan`
--

CREATE TABLE `actuan` (
  `id_pelicula` int(10) UNSIGNED NOT NULL,
  `id_persona` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actuan`
--

INSERT INTO `actuan` (`id_pelicula`, `id_persona`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dirigen`
--

CREATE TABLE `dirigen` (
  `id_pelicula` int(10) UNSIGNED NOT NULL,
  `id_persona` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escriben`
--

CREATE TABLE `escriben` (
  `id_pelicula` int(10) UNSIGNED NOT NULL,
  `id_persona` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id_pelicula` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `anyo` date NOT NULL,
  `cartel` varchar(255) NOT NULL,
  `trailer` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id_pelicula`, `titulo`, `genero`, `pais`, `anyo`, `cartel`, `trailer`) VALUES
(1, 'Harry Potter y La Piedra Filosofal', 'Literatura Fantastica', 'Reino Unido', '1997-06-26', 'http://localhost:8081/2daw/pruebaclase/2/images/h1.jpg', 'https://www.youtube.com/watch?v=VyHV0BRtdxo'),
(2, 'Harry Potter y la Camara de Los Secretos', 'Literatura Fantastica', 'Reino Unido', '2002-11-29', 'http://localhost:8081/2daw/pruebaclase/2/images/h2.jpg', 'https://www.youtube.com/watch?v=1bq0qff4iF8'),
(15, 'Spider-Man: Homecoming', 'Ciencia Ficcion', 'Estados Unidos', '2017-07-28', 'http://localhost:8081/2daw/pruebaclase/2/images/s1.jpg', 'https://www.youtube.com/watch?v=grusgXCahH8&t=57s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fotografia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `nombre`, `apellidos`, `fotografia`) VALUES
(1, 'Daniel ', 'Radcliff', 'http://localhost:8081/2daw/pruebaclase/2/images/h1.jpg'),
(3, 'Manuela', 'Watson', 'http://localhost:8081/2daw/pruebaclase/2/images/2020-11-04 14.16.24 eu.bbcollab.com a7e22c3ab7d2.png'),
(4, 'Tom', 'Holland', 'http://localhost:8081/2daw/pruebaclase/2/images/s1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producen`
--

CREATE TABLE `producen` (
  `id_pelicula` int(10) UNSIGNED NOT NULL,
  `id_persona` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actuan`
--
ALTER TABLE `actuan`
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `dirigen`
--
ALTER TABLE `dirigen`
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `escriben`
--
ALTER TABLE `escriben`
  ADD KEY `id_pelicula` (`id_pelicula`),
  ADD KEY `id_persona` (`id_persona`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id_pelicula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actuan`
--
ALTER TABLE `actuan`
  ADD CONSTRAINT `actuan_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id_pelicula`),
  ADD CONSTRAINT `actuan_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
