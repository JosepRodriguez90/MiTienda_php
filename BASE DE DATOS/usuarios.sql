-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2021 a las 19:36:24
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nick` varchar(20) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `email` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nick`, `password`, `email`) VALUES
('Josep', '1234', 'jsprodriguez90@gmail.com'),
('', '', ''),
('goku', '1234', 'Gohan@gmail.com'),
('admin', '1234', 'admin@suplementosjosep.com'),
('hola', '1234', 'hola@gmail.com'),
('nelson', '1234', 'nelson@gmail.com'),
('aaa', '1234', 'aaa@dgrdgrg'),
('bbb', '1234', 'bbb@ggrgr'),
('ccc', '1234', 'ccc@gfgfd'),
('usuario', '1234', 'usuario@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
