-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2016 a las 04:22:18
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
  `idaula` int(10) NOT NULL,
  `nombreaula` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`idaula`, `nombreaula`) VALUES
(1, 'AULA 100'),
(2, 'AULA 101'),
(3, 'AULA 103'),
(4, 'AULA102');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `idreserva` int(4) NOT NULL,
  `idaula` int(4) NOT NULL,
  `idusuario` varchar(10) CHARACTER SET utf8 NOT NULL,
  `fecha` varchar(10) CHARACTER SET utf8 NOT NULL,
  `hora` varchar(5) CHARACTER SET utf8 NOT NULL,
  `cola` varchar(80) CHARACTER SET utf32 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `idaula`, `idusuario`, `fecha`, `hora`, `cola`) VALUES
(270, 1, 'a@a.com', '22-02-2016', '08:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `email` varchar(80) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `activo` tinyint(1) NOT NULL,
  `personal` tinyint(1) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`email`, `clave`, `alias`, `fecha_alta`, `activo`, `personal`, `administrador`) VALUES
('a@a.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'administrador', '2016-02-17 20:44:00', 1, 1, 1),
('b@b.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'Usuario', '2016-02-22 02:07:08', 1, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`idaula`),
  ADD UNIQUE KEY `nombreaula` (`nombreaula`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `idaula` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=274;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
