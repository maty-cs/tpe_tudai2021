-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 00:14:21
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe_web2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usertable`
--

CREATE TABLE `usertable` (
  `id_user` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `clave` varchar(210) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usertable`
--

INSERT INTO `usertable` (`id_user`, `email`, `clave`, `admin`) VALUES
(1, 'mcrespo0703@gmail.com', '$2y$10$MfK./3T63ZJqfhQ1XQKRPOre9AKKepJBQJa3DqzyT/SMyEDQrKE0W', 0),
(3, 'admin@gmail.com', '$2a$12$WK8w/9T8Q.enylYcHIn4NuLb5/NWxPqqT2PUgvxTTYeeK1GL0P94G', 1),
(8, 'testaccount@gmail.com', '$2y$10$YEr4eV52UWGf.mVSaHo33eTHeIR6xRqYL6bW41EuJ0NNFJlmeuD/C', 0),
(9, 'admin2@gmail.com', '$2y$10$DSn.Y5Pd8qB29Dz.wxmSKuSmgB4gdL8jZCpbPKB/ooQPlOaRByTp6', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
