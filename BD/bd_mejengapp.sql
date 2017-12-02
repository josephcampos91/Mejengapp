-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2017 at 03:09 PM
-- Server version: 5.5.58-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandeco4_db_security`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipo`
--

CREATE TABLE `equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fk_ligue` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipo`
--

INSERT INTO `equipo` (`id`, `nombre`, `fk_ligue`) VALUES
(1, 'Atletico Rafaela', 2),
(2, 'Arsenal Sarandi', 2),
(3, 'América', 1),
(4, 'Monterrey', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jugador`
--

CREATE TABLE `jugador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `fk_user`) VALUES
(1, 'camion', 5),
(2, 'juego', 5),
(3, 'como se llama', 5),
(4, 'hola', 5),
(5, 'como', 5),
(6, 'hola', 5),
(7, 'pablo', 1),
(8, 'elisa', 1),
(9, 'edgar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jugador_x_equipo`
--

CREATE TABLE `jugador_x_equipo` (
  `id` int(11) NOT NULL,
  `fk_equipo` int(11) NOT NULL,
  `fk_jugador` int(11) NOT NULL,
  `fk_torneo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ligue`
--

CREATE TABLE `ligue` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ligue`
--

INSERT INTO `ligue` (`id`, `nombre`) VALUES
(1, 'BANCOMER MX - Liga Mexicana'),
(2, 'Liga Argentina');

-- --------------------------------------------------------

--
-- Table structure for table `partido`
--

CREATE TABLE `partido` (
  `id` int(11) NOT NULL,
  `fk_jugador_x_equipo_1` int(11) NOT NULL,
  `goles_jugador_1` int(11) NOT NULL,
  `puntos_jugador_1` int(11) NOT NULL,
  `fk_jugador_x_equipo_2` int(11) NOT NULL,
  `goles_jugador_2` int(11) NOT NULL,
  `puntos_jugador_2` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `fk_torneo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `torneo`
--

CREATE TABLE `torneo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `turno_actual` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `torneo`
--

INSERT INTO `torneo` (`id`, `nombre`, `fecha`, `fk_user`) VALUES
(1, '0', '2017-11-29', 1),
(2, '0', '2017-11-29', 1),
(3, '0', '2017-11-29', 1),
(4, '0', '2017-11-29', 1),
(5, 'como', '2017-11-29', 1),
(6, 'torneo', '2017-11-29', 1),
(7, 'sdfsddfdf', '2017-11-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL DEFAULT '0',
  `user_name` varchar(200) NOT NULL DEFAULT '',
  `user_last_name` varchar(200) NOT NULL DEFAULT '',
  `user_pass` varchar(200) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `user_email` varchar(200) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `user_session` int(11) NOT NULL DEFAULT '0',
  `user_roll` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `user_name`, `user_last_name`, `user_pass`, `date`, `user_email`, `user_status`, `user_session`, `user_roll`) VALUES
(1, 'user', 'First Name', 'Last Name', 'cGFzcw==', '0000-00-00', 'email@gmail.com', 0, 0, 0),
(2, 'user2', 'nombre 2', 'apellido 2', 'cGFzczI=', '0000-00-00', 'email2@gmail.com', 0, 0, 0),
(3, 'nickkk', 'gato', 'gatoapellido', 'Y2xhdmU=', '0000-00-00', 'em', 0, 0, 0),
(4, 'josu', 'josue', 'apellido', 'Y2xhdmU=', '0000-00-00', 'josu@gmail.com', 0, 0, 0),
(5, 'elisa', 'juan', 'magan', 'ZWxp', '0000-00-00', 'lkj', 0, 0, 0),
(6, 'fiore', 'fiorella', 'hern', 'aG9sYQ==', '0000-00-00', 'hola', 0, 0, 0),
(7, 'pan', 'pancho', 'lkj', 'cGFu', '0000-00-00', 'lkj', 0, 0, 0),
(8, 'lkj', 'lkjl', 'lkj', 'bGtq', '0000-00-00', 'lkj', 0, 0, 0),
(9, 'lkj', 'como', 'lkj', 'bGtq', '0000-00-00', 'lkj', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jugador_x_equipo`
--
ALTER TABLE `jugador_x_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jugador_x_equipo`
--
ALTER TABLE `jugador_x_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `partido`
--
ALTER TABLE `partido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `torneo`
--
ALTER TABLE `torneo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
