-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 00:14:01
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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `id_product` int(45) DEFAULT NULL,
  `puntaje` int(5) NOT NULL,
  `fecha` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `usuario`, `comentario`, `id_product`, `puntaje`, `fecha`) VALUES
(2, 'test@gmail.com', 'Este es un comentario de prueba :$', NULL, 1, '2021-11-17 16:15:09.000000'),
(4, 'mcrespo0703@gmail.com', 'Comentario a modificar (xd aparecerá si se modificó) xd', NULL, 5, '2021-11-17 18:33:06.000000'),
(5, 'test@gmail.com', 'Comentario creado por Postman', NULL, 5, '2021-11-17 18:34:06.000000'),
(6, 'mcrespo0703@gmail.com', 'Comentario enviado desde JS para API REST', NULL, 4, '2021-11-19 15:27:16.000000'),
(7, 'testaccount@gmail.com', 'este es otro test desde JS a API REST', NULL, 3, '2021-11-19 15:33:44.000000'),
(8, 'admin@gmail.com', 'un mensaje de administrador por JS para API REST!', NULL, 3, '2021-11-19 16:29:34.000000'),
(11, 'admin@gmail.com', 'comentario 11 a eliminar', NULL, 1, '2021-11-19 20:13:20.000000'),
(23, 'admin@gmail.com', 'comentario de js a producto especifico', NULL, 3, '2021-11-22 23:57:39.000000'),
(29, 'admin@gmail.com', 'Rico el tiramisú', 15, 4, '2021-11-23 17:51:30.000000'),
(30, 'admin@gmail.com', 'Rico el brownie', 19, 3, '2021-11-24 17:25:21.000000'),
(31, 'admin@gmail.com', 'Bueno el chantilly', 16, 4, '2021-11-24 17:27:31.000000'),
(37, 'admin@gmail.com', 'esto es una prueba', 16, 1, '2021-11-24 17:37:29.000000'),
(38, 'admin@gmail.com', 'Muy buena la torta', 17, 4, '2021-11-24 19:05:51.000000'),
(39, 'admin@gmail.com', 'Exquisita', 17, 5, '2021-11-24 19:05:59.000000'),
(40, 'admin@gmail.com', 'Horrible', 17, 1, '2021-11-24 19:06:07.000000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_id_producto` (`id_product`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_product`) REFERENCES `productos` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
