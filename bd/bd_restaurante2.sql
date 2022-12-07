-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2022 a las 00:41:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargo`
--

CREATE TABLE `tbl_cargo` (
  `id_cargo` int(11) NOT NULL,
  `nom_cargo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_cargo`
--

INSERT INTO `tbl_cargo` (`id_cargo`, `nom_cargo`) VALUES
(1, 'Camarero'),
(2, 'Mantenimiento'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `id_empleado` int(11) NOT NULL,
  `nom_empleado` varchar(20) NOT NULL,
  `ape_empleado` varchar(20) NOT NULL,
  `dni_empleado` varchar(9) NOT NULL,
  `password` text NOT NULL,
  `fk_cargo_empleado` int(11) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`id_empleado`, `nom_empleado`, `ape_empleado`, `dni_empleado`, `password`, `fk_cargo_empleado`, `email`) VALUES
(7, 'Sergio', 'Garcia', '47864649Q', '1234', 3, 'sergi@gmail.com'),
(9, 'Marcos', 'Alonso', '47864650V', '1234', 1, 'marcos@gmail.com'),
(10, 'Alejandro', 'Lay', '46785678F', '1234', 2, 'alejandro@gmail.com'),
(12, 'Luis', 'Enrique', '76864598K', '1234', 1, 'lenrique@gmail.com'),
(20, 'Alberto', 'De Santos', '47864650V', '1234', 1, 'adesantos@gmail.com'),
(21, 'Sergi', 'vegano', '85774523W', '1234', 1, 'test1@gmail.com'),
(22, 'Raul', 'Muñoz', '47864649Q', '1234', 1, 'rmunoz@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `id_inc` int(11) NOT NULL,
  `nom_inc` varchar(200) NOT NULL,
  `estado_inc` tinyint(1) NOT NULL,
  `fk_mesa_inc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_incidencia`
--

INSERT INTO `tbl_incidencia` (`id_inc`, `nom_inc`, `estado_inc`, `fk_mesa_inc`) VALUES
(4, 'test', 0, 1),
(5, 'test', 0, 2),
(6, 'test', 0, 1),
(7, 'sdf', 0, 1),
(8, 'sdf', 0, 1),
(9, 'dfgf', 0, 2),
(10, 'test', 0, 1),
(11, 'test', 0, 2),
(12, 'test', 0, 1),
(13, 'test', 0, 1),
(14, 'pata rota', 0, 1),
(15, 'pata rota', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesa`
--

CREATE TABLE `tbl_mesa` (
  `id_mesa` int(11) NOT NULL,
  `num_mesa` int(2) NOT NULL,
  `estado_mesa` enum('0','1','2') NOT NULL,
  `fk_num_sala` int(11) DEFAULT NULL,
  `capacidad_mesa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_mesa`
--

INSERT INTO `tbl_mesa` (`id_mesa`, `num_mesa`, `estado_mesa`, `fk_num_sala`, `capacidad_mesa`) VALUES
(1, 1, '0', 1, 4),
(2, 2, '0', 1, 4),
(3, 3, '0', 1, 6),
(4, 4, '0', 2, 4),
(5, 5, '0', 2, 8),
(6, 6, '0', 3, 10),
(7, 7, '0', 1, 8),
(8, 8, '0', 1, 2),
(9, 9, '0', 1, 2),
(10, 10, '0', 1, 2),
(11, 11, '0', 1, 2),
(12, 12, '0', 1, 2),
(13, 13, '0', 1, 4),
(14, 14, '0', 1, 4),
(15, 15, '0', 1, 4),
(16, 16, '0', 1, 4),
(17, 17, '0', 1, 6),
(18, 18, '0', 1, 6),
(19, 19, '0', 1, 6),
(20, 20, '0', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registro`
--

CREATE TABLE `tbl_registro` (
  `id_registro` int(11) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time DEFAULT NULL,
  `id_mesa` int(11) NOT NULL,
  `num_comensales` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_registro`
--

INSERT INTO `tbl_registro` (`id_registro`, `cliente`, `fecha`, `hora`, `id_mesa`, `num_comensales`) VALUES
(34, 'Eric', '2022-12-09', '14:00:00', 6, 7),
(35, 'Monica', '2022-12-10', '22:00:00', 1, 3),
(36, 'Sergi', '2022-12-22', '15:00:00', 3, 3),
(37, 'Álvar', '2022-12-08', '14:00:00', 2, 3),
(38, 'Eustakio', '2022-12-08', '15:00:00', 2, 3),
(41, 'Alberto', '2022-12-22', '20:00:00', 5, 7),
(42, 'Victor', '2022-12-09', '13:00:00', 7, 6),
(45, 'Camp Nous', '2022-12-08', '15:00:00', 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sala`
--

CREATE TABLE `tbl_sala` (
  `id_sala` int(11) NOT NULL,
  `nom_sala` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_sala`
--

INSERT INTO `tbl_sala` (`id_sala`, `nom_sala`) VALUES
(1, 'Principal - 1'),
(2, 'Comedor - 2'),
(3, 'Privada - 3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `fk_cargo_empleado` (`fk_cargo_empleado`);

--
-- Indices de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`id_inc`),
  ADD KEY `fk_mesa_inc` (`fk_mesa_inc`);

--
-- Indices de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_num_sala` (`fk_num_sala`);

--
-- Indices de la tabla `tbl_registro`
--
ALTER TABLE `tbl_registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `id_inc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_registro`
--
ALTER TABLE `tbl_registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD CONSTRAINT `tbl_empleado_ibfk_1` FOREIGN KEY (`fk_cargo_empleado`) REFERENCES `tbl_cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `tbl_incidencia_ibfk_1` FOREIGN KEY (`fk_mesa_inc`) REFERENCES `tbl_mesa` (`id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD CONSTRAINT `tbl_mesa_ibfk_1` FOREIGN KEY (`fk_num_sala`) REFERENCES `tbl_sala` (`id_sala`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
