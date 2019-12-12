-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2019 a las 21:06:28
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_academia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `id_curso` int(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `promedio` int(2) NOT NULL,
  `edad` int(2) NOT NULL,
  `habilidad` text NOT NULL,
  `telefono` int(13) NOT NULL,
  `carrera_terminada` tinyint(1) NOT NULL,
  `imagen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `id_curso`, `nombre`, `apellido`, `promedio`, `edad`, `habilidad`, `telefono`, `carrera_terminada`, `imagen`) VALUES
(1, 5, 'alumno', 'test', 1, 33, 'ninguna', 0, 0, 'imagesusuario/5dedb718c8dae.jpg'),
(2, 1, 'lawea', 'Cabrera', 9, 11, 'dasdas', 32323, 0, 'imagesusuario/5dedac519717b.jpg'),
(3, 1, 'Gabriel', 'tellechea', 2, 18, 'fasdasdas', 34432424, 0, 'imagesusuario/5deda32ce1874.jpg'),
(4, 1, 'roberto xddddd', 'Iriart', 5, 5, '515', 23232, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(100) NOT NULL,
  `id_alumno` int(100) NOT NULL,
  `comentario` varchar(1000) NOT NULL,
  `estrellas` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_alumno`, `comentario`, `estrellas`) VALUES
(2, 1, 'owooo', 2),
(3, 1, 'putteando por ahi', 5),
(4, 1, 'putteando por ahi', 5),
(5, 1, 'uytutyuty', 2),
(6, 1, 'uytutyuty', 2),
(7, 1, 'test', 2),
(8, 3, 'owo', 2),
(9, 1, 'dasdas', 2),
(10, 1, 'dasdsadas', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(2) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `profesor` varchar(40) NOT NULL,
  `agno_correspondiente` int(2) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre`, `profesor`, `agno_correspondiente`, `descripcion`) VALUES
(1, 'pilotaje', 'nadie', 1, 'ninguna'),
(2, 'tecnicas de res', 'dios', 2, 'buen juego'),
(3, 'natacion', 'el oceano', 2, 'que el mar se apiade de ti'),
(4, 'natacion', 'mar', 2, 'que el oceano se apiade de ti'),
(5, 'apicultura', 'abejas', 3, 'control sobre la miel del mundo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(100) NOT NULL,
  `imagen` varchar(64) NOT NULL,
  `id_alumno` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `imagen`, `id_alumno`) VALUES
(2, 'imagesusuario/15741af2b283.jpg', 1),
(3, 'imagesusuario/5dee75eebec59.jpg', 1),
(4, 'imagesusuario/5dee7613505fe.jpg', 2),
(5, 'imagesusuario/5dee761d59ece.jpg', 2),
(6, 'imagesusuario/5dee77284986b.jpg', 1),
(7, 'imagesusuario/5dee7742d41e6.jpg', 2),
(8, 'imagesusuario/5dee8a716f4cd.jpg', 1),
(9, 'imagesusuario/5dee8a80197a8.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nivel` int(1) NOT NULL,
  `pregunta` varchar(40) NOT NULL,
  `respuesta` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `nivel`, `pregunta`, `respuesta`) VALUES
(12, 'usuario@administrador.com', 'admin', 1, '', ''),
(13, 'usuario@comun.com', 'user', 2, '', ''),
(14, 'juan', '1234', 2, 'Como se llamó tu primer mascota?', 'gato');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `FK_id_curso` (`id_curso`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `FK_id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
