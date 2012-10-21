-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-10-2011 a las 06:50:39
-- Versión del servidor: 5.1.44
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Contactos`
--

CREATE TABLE IF NOT EXISTS `Contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fono` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `Contactos`
--

INSERT INTO `Contactos` (`id`, `nombre`, `fono`, `email`, `direccion`) VALUES
(13, 'Iván Olivares R.', '5697655845', 'iolivares10@gmail.com', 'Don Milenko 305-B');
