-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2015 a las 04:43:22
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ia`
--
CREATE DATABASE IF NOT EXISTS `ia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id_city` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_state` int(10) unsigned NOT NULL,
  `city` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_city`),
  KEY `FK_state` (`id_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id_city`, `id_state`, `city`) VALUES
(1, 1, 'Aguascalientes'),
(2, 2, 'Baja California'),
(3, 3, 'La Paz'),
(4, 4, 'Campeche'),
(5, 5, 'Tuxtla Gutierrez'),
(6, 6, 'Chihuahua'),
(7, 7, 'Saltillo'),
(8, 8, 'Colima'),
(9, 9, 'Ciudad de Mexico'),
(10, 10, 'Durango'),
(11, 11, 'Guanajuato'),
(12, 12, 'Chilpancingo'),
(13, 13, 'Pachuca'),
(14, 14, 'Guadalajara'),
(15, 15, 'Toluca'),
(16, 16, 'Morelia'),
(17, 17, 'Cuernavaca'),
(18, 18, 'Tepic'),
(19, 19, 'Monterrey'),
(20, 20, 'Oaxaca'),
(21, 21, 'Puebla'),
(22, 22, 'Queretaro'),
(23, 23, 'Chetumal'),
(24, 24, 'San Luis Potosi'),
(25, 25, 'Culiacan'),
(26, 26, 'Sonora'),
(27, 27, 'Villahermosa'),
(28, 28, 'Ciudad Victoria'),
(29, 29, 'Tlaxcala'),
(30, 30, 'Xalapa'),
(31, 31, 'Merida'),
(32, 32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id_gallery` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `qty_votes` int(10) DEFAULT NULL,
  `sum_votes` int(10) DEFAULT NULL,
  `average` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_gallery`),
  KEY `FK_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `galleries`
--

INSERT INTO `galleries` (`id_gallery`, `id_user`, `image`, `uploaded_at`, `qty_votes`, `sum_votes`, `average`) VALUES
(12, 26, 'images/galleries/26_5001.jpg', '2015-06-29 04:39:29', NULL, NULL, NULL),
(13, 26, 'images/galleries/26_2947.jpg', '2015-06-29 04:40:02', NULL, NULL, NULL),
(14, 26, 'images/galleries/26_8809.jpg', '2015-06-29 04:40:23', NULL, NULL, NULL),
(15, 26, 'images/galleries/26_6982.jpg', '2015-06-29 04:41:18', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id_state` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_state`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id_state`, `state`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Chiapas'),
(6, 'Chihuahua'),
(7, 'Coahuila'),
(8, 'Colima'),
(9, 'Distrito Federal'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'México'),
(16, 'Michoacán'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo León'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Querétaro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potosí'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatán'),
(32, 'Zacatecas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_city` int(10) unsigned NOT NULL,
  `id_rol` int(10) unsigned DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lastname_1` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lastname_2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `gender` varchar(1) CHARACTER SET latin1 DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `street` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `number_home` int(5) DEFAULT NULL,
  `location` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `zip` int(6) DEFAULT NULL,
  `vote` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `FK_city` (`id_city`),
  KEY `FK_rol` (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `id_city`, `id_rol`, `image`, `username`, `lastname_1`, `lastname_2`, `gender`, `birthday`, `email`, `password`, `street`, `number_home`, `location`, `zip`, `vote`) VALUES
(26, 16, 1, 'images/profiles/jessica_erandi_5344.jpg', 'Jessica Erandi', 'Villa', 'Bárcenas', 'F', '1992-03-17', 'suhkha92@gmail.com', '3d0752d06968abbe2f6e560173181605', 'Zirahuén', 125, '23 de Marzo', 58337, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `FK_state` FOREIGN KEY (`id_state`) REFERENCES `states` (`id_state`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_city` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`),
  ADD CONSTRAINT `FK_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
