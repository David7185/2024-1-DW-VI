-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2024 a las 00:48:20
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_1_dw2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1`
--

CREATE TABLE `tabla1` (
  `id` int(50) NOT NULL,
  `Campo2` varchar(11) DEFAULT NULL,
  `Campo3` int(11) DEFAULT NULL,
  `Campo4` date DEFAULT NULL,
  `Campo5` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla1`
--

INSERT INTO `tabla1` (`id`, `Campo2`, `Campo3`, `Campo4`, `Campo5`) VALUES
(1, 'A', 12, '2024-04-09', 2.5),
(2, 'B', 13, '2016-04-14', 3.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2`
--

CREATE TABLE `tabla2` (
  `id` int(50) NOT NULL,
  `id1` int(50) NOT NULL,
  `id3` int(50) NOT NULL,
  `id4` int(50) NOT NULL,
  `Campo2` varchar(11) DEFAULT NULL,
  `Campo3` int(11) DEFAULT NULL,
  `Campo4` date DEFAULT NULL,
  `Campo5` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla2`
--

INSERT INTO `tabla2` (`id`, `id1`, `id3`, `id4`, `Campo2`, `Campo3`, `Campo4`, `Campo5`) VALUES
(1, 1, 1, 1, 'WZ', 23, '2017-04-12', 8.7),
(2, 2, 2, 2, 'FR', 96, '2020-04-09', 4.24),
(3, 2, 1, 2, 'Q', 234, '2016-07-21', 2.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla3`
--

CREATE TABLE `tabla3` (
  `id` int(50) NOT NULL,
  `Campo2` varchar(11) DEFAULT NULL,
  `Campo3` int(11) DEFAULT NULL,
  `Campo4` date DEFAULT NULL,
  `Campo5` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla3`
--

INSERT INTO `tabla3` (`id`, `Campo2`, `Campo3`, `Campo4`, `Campo5`) VALUES
(1, 'A', 15, '2018-04-04', 3.8),
(2, 'B', 20, '2024-02-07', 5.8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla4`
--

CREATE TABLE `tabla4` (
  `id` int(50) NOT NULL,
  `Campo2` varchar(11) DEFAULT NULL,
  `Campo3` int(11) DEFAULT NULL,
  `Campo4` date DEFAULT NULL,
  `Campo5` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla4`
--

INSERT INTO `tabla4` (`id`, `Campo2`, `Campo3`, `Campo4`, `Campo5`) VALUES
(1, 'Z', 84, '2014-04-03', 9.6),
(2, 'EZ', 54, '2019-02-19', 8.5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla2`
--
ALTER TABLE `tabla2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id1` (`id1`),
  ADD KEY `id3` (`id3`),
  ADD KEY `id4` (`id4`);

--
-- Indices de la tabla `tabla3`
--
ALTER TABLE `tabla3`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tabla4`
--
ALTER TABLE `tabla4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tabla2`
--
ALTER TABLE `tabla2`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tabla3`
--
ALTER TABLE `tabla3`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tabla4`
--
ALTER TABLE `tabla4`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla2`
--
ALTER TABLE `tabla2`
  ADD CONSTRAINT `tabla2_ibfk_1` FOREIGN KEY (`id1`) REFERENCES `tabla1` (`id`),
  ADD CONSTRAINT `tabla2_ibfk_2` FOREIGN KEY (`id3`) REFERENCES `tabla3` (`id`),
  ADD CONSTRAINT `tabla2_ibfk_3` FOREIGN KEY (`id4`) REFERENCES `tabla4` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
