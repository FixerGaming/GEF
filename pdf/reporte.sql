-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2017 a las 02:03:48
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(9) DEFAULT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `paterno` varchar(45) DEFAULT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `recibo_honorario` varchar(15) DEFAULT NULL,
  `area` text,
  `fecnaci` date DEFAULT NULL,
  `sueldo` text,
  `activo` char(1) DEFAULT 'A' COMMENT 'A = ACTIVO , I = INACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombres`, `paterno`, `materno`, `correo`, `recibo_honorario`, `area`, `fecnaci`, `sueldo`, `activo`) VALUES
(1, 48006887, 'Miguel Angel', 'Caro', 'Rojas', 'makrz12@gmail.com', '10480068870', 'Contabildad', '1993-06-12', '1500', 'A'),
(2, 45356879, 'Andy', 'Leyton', 'Valdivia', 'andyleyton@gmail.com', '10453568790', 'RRHH', '1988-03-09', '1500', 'A'),
(3, 83756932, 'Roberto', 'Farfan', 'Santillan', 'rfarfan@gmail.com', '10837569320', 'Sistemas', '1988-03-09', '1800', 'I'),
(12, 97656932, 'Pedro', 'Ramires', 'Preco', 'pramires@gmail.com', '10976569320', 'Diseño', '1988-03-09', '1450', 'A'),
(15, 83756932, 'Roberto', 'Flores', 'Santillan', 'rflores@gmail.com', '10837569320', 'Marketing', '1988-03-09', '2500', 'A'),
(16, 48006887, 'Admin', 'Trador', 'Eres', 'rfarfan@gmail.com', '10837569320', 'Gerencia', '0000-00-00', '3000', 'A'),
(17, 97656932, 'Pedro', 'Ramires', 'Preco', 'pramires@gmail.com', '10976569320', 'Diseño', '1988-03-09', '1450', 'A');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
