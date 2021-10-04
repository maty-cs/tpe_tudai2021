-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2021 a las 19:12:37
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria` varchar(45) NOT NULL,
  `descripcion` varchar(512) NOT NULL,
  `conservacion` varchar(45) NOT NULL,
  `tiempo_preparacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria`, `descripcion`, `conservacion`, `tiempo_preparacion`) VALUES
('Postres', 'Cuando se habla de postres se entiende alguna preparación dulce, bien sean cremas, helados, bombones, entre otros. Los postres han sido siempre el broche de oro de una comida. Un buen postre, resaltará la satisfacción de los alimentos anteriores. En muchos casos se planean como una agradable sorpresa', 'Entre 3 y 4 días', 45),
('Tortas', 'Es una comida dulce elaborada con una masa a base de harina, manteca, huevos, azúcar, leche, y otros ingredientes, que se cuece al horno y se rellena o se cubre de crema, chocolate, frutas u otros productos que elijas.\', \'En la heladera puede durar hasta 5 días y en el congelador hasta 2 meses', 'En la heladera puede durar hasta 5 días y en ', 120);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
