-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-12-2017 a las 15:57:14
-- Versión del servidor: 5.5.58-cll
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bandeco4_db_security`
--
CREATE DATABASE IF NOT EXISTS `bandeco4_db_security` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bandeco4_db_security`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `fk_ligue` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `nombre`, `fk_ligue`, `estado`) VALUES
(1, 'Atletico Rafaela', 2, 1),
(2, 'Arsenal Sarandi', 2, 1),
(3, 'América', 1, 1),
(4, 'Monterrey', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

DROP TABLE IF EXISTS `jugador`;
CREATE TABLE IF NOT EXISTS `jugador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `fk_user`, `estado`) VALUES
(1, 'Primero', 1, 1),
(2, 'segundo', 1, 1),
(3, 'tercero', 1, 1),
(4, 'juanssss', 3, 1),
(5, 'maria', 3, 0),
(6, 'juan', 3, 1),
(7, 'carlos', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador_x_equipo`
--

DROP TABLE IF EXISTS `jugador_x_equipo`;
CREATE TABLE IF NOT EXISTS `jugador_x_equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_equipo` int(11) NOT NULL,
  `fk_jugador` int(11) NOT NULL,
  `fk_torneo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador_x_equipo`
--

INSERT INTO `jugador_x_equipo` (`id`, `fk_equipo`, `fk_jugador`, `fk_torneo`, `estado`, `fk_user`) VALUES
(6, 3, 3, 1, 1, 1),
(5, 2, 2, 1, 1, 1),
(4, 1, 1, 1, 1, 1),
(7, 1, 1, 2, 1, 1),
(8, 2, 2, 2, 1, 1),
(9, 3, 3, 2, 1, 1),
(10, 1, 4, 3, 1, 3),
(11, 2, 6, 3, 1, 3),
(12, 3, 7, 3, 1, 3),
(13, 1, 1, 4, 1, 1),
(14, 2, 2, 4, 1, 1),
(15, 3, 3, 4, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligue`
--

DROP TABLE IF EXISTS `ligue`;
CREATE TABLE IF NOT EXISTS `ligue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ligue`
--

INSERT INTO `ligue` (`id`, `nombre`, `estado`) VALUES
(1, 'BANCOMER MX - Liga Mexicana', 0),
(2, 'Liga Argentina', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

DROP TABLE IF EXISTS `partido`;
CREATE TABLE IF NOT EXISTS `partido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_jugador_x_equipo_1` int(11) NOT NULL,
  `puntos_jugador_1` int(11) NOT NULL,
  `fk_jugador_x_equipo_2` int(11) NOT NULL,
  `puntos_jugador_2` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `fk_torneo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id`, `fk_jugador_x_equipo_1`, `puntos_jugador_1`, `fk_jugador_x_equipo_2`, `puntos_jugador_2`, `turno`, `fk_torneo`, `estado`, `fk_user`) VALUES
(1, 6, 0, 5, 1, 1, 1, 1, 1),
(2, 6, 2, 4, 3, 2, 1, 1, 1),
(3, 5, 1, 4, 2, 3, 1, 1, 1),
(4, 7, 1, 8, 0, 1, 2, 1, 1),
(5, 7, 3, 9, 0, 2, 2, 1, 1),
(6, 8, 0, 9, 4, 3, 2, 1, 1),
(7, 10, 1, 11, 0, 1, 3, 1, 3),
(8, 10, 4, 12, 2, 2, 3, 1, 3),
(9, 11, 2, 12, 0, 3, 3, 1, 3),
(10, 13, 0, 14, 0, 1, 4, 1, 1),
(11, 13, 0, 15, 0, 0, 4, 1, 1),
(12, 14, 0, 15, 0, 0, 4, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE IF NOT EXISTS `torneo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `fk_user` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`id`, `nombre`, `fecha`, `fk_user`, `estado`, `turno`) VALUES
(1, 'torneo 1', '2017-12-07', 1, 1, 3),
(2, 'dddd', '2017-12-07', 1, 1, 3),
(3, 'primer torneo', '2017-12-08', 3, 1, 3),
(4, 'Hola Mundo', '2017-12-09', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_login`
--

DROP TABLE IF EXISTS `user_login`;
CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL DEFAULT '0',
  `user_name` varchar(200) NOT NULL DEFAULT '',
  `user_last_name` varchar(200) NOT NULL DEFAULT '',
  `user_pass` varchar(200) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `user_email` varchar(200) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `user_session` int(11) NOT NULL DEFAULT '0',
  `user_roll` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `user_name`, `user_last_name`, `user_pass`, `date`, `user_email`, `user_status`, `user_session`, `user_roll`) VALUES
(1, 'admin', 'Pedro', 'Ledezma', 'YWRtaW4=', '0000-00-00', 'pedrolh01@hotmail.com', 1, 0, 1),
(2, 'eli', 'Elisa', 'Birkman', 'ZWxp', '0000-00-00', 'elisa@gmail.com', 1, 0, 0),
(3, 'pablo', 'Pablo', 'Ledezmaaaa', 'aG9sYQ==', '0000-00-00', 'pablo@gmail.com', 0, 0, 0),
(4, 'oscar', 'Oscar', 'Ledezma', 'b3NjYXI=', '0000-00-00', 'oscar@gmail.com', 0, 0, 0),
(5, 'luvy', 'Luvy', 'Herrera', 'bHV2eQ==', '0000-00-00', 'luvy@gmail.com', 1, 0, 1),
(6, 'patri', 'Patrick', 'Araya', 'cGF0cmk=', '0000-00-00', 'patri@gmail.com', 1, 0, 0),
(7, 'karla', 'Karla', 'Rojas', 'a2FybGE=', '0000-00-00', 'karla@gmail.com', 1, 0, 0),
(8, 'katie', 'Katie', 'Gomez', 'a2F0aWU=', '0000-00-00', 'katie@gmail.com', 1, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
