-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-05-2020 a las 12:45:17
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sotr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_deportistas`
--

DROP TABLE IF EXISTS `datos_deportistas`;
CREATE TABLE IF NOT EXISTS `datos_deportistas` (
  `id` int(6) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_m` varchar(30) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `correo_contacto` varchar(40) NOT NULL,
  `fecha` datetime NOT NULL,
  `carrera` varchar(30) NOT NULL,
  `campus` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `nacionalidad` varchar(30) NOT NULL,
  `deporte` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_deportistas`
--

INSERT INTO `datos_deportistas` (`id`, `nombre`, `apellido_p`, `apellido_m`, `codigo`, `correo_contacto`, `fecha`, `carrera`, `campus`, `direccion`, `distrito`, `nacionalidad`, `deporte`) VALUES
(3, 'Sergio', 'Salas', 'Arriaran', 'u200215322', 'sergio.salas@upc.pe', '1985-03-05 00:00:00', 'Ing. Electronica', 'Monterrico', 'Mz b lt 3 La Molina', 'La Molima', 'Peruano', 'Entrenador'),
(2, 'Andree', 'Guillen', 'Galarza', 'u201415380', 'sdraker1234@gmail.com', '1997-03-26 00:00:00', 'Ing. Electronica', 'San Miguel', 'Mz b lt 3 La Luz', 'San Martin de Porres', 'Peruano', 'futbol'),
(4, 'angel', 'galarza', 'perr', 'u201632085', 'angel@upc.edu', '2020-04-08 00:00:00', 'ing industrial', 'villa', 'Mz b lt 22', 'san juan', 'bolibiano', 'natacion'),
(5, 'Gabriel', 'Guillen', 'Galarza', 'u201712680', 'gabrielxsx2015@hotmail.com', '2000-01-04 00:00:00', 'Ing sistema', 'Monterrico', 'Mz b lt 24', 'San Martin de Porres', 'peruano', 'natacion'),
(1, 'gabriel', 'guillen', 'galarza', 'u201712681', 'gabriel@gmail.com', '2020-04-08 00:00:00', 'Ing sistema', 'Monterrico', 'Mz b lt 23', 'san martin de porres', 'Peruana', 'voley');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenamiento`
--

DROP TABLE IF EXISTS `entrenamiento`;
CREATE TABLE IF NOT EXISTS `entrenamiento` (
  `usuario` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `id` int(6) NOT NULL,
  `nom_ejercicio` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `discos_usados` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `espacio` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `tiempo_duracion` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `repeticiones` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `secuencia` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `distancia` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `entrenamiento`
--

INSERT INTO `entrenamiento` (`usuario`, `id`, `nom_ejercicio`, `discos_usados`, `espacio`, `tiempo_duracion`, `repeticiones`, `secuencia`, `distancia`) VALUES
('angel@upc.edu', 4, '', '', '', '', '', '', ''),
('gabriel@gmail.com', 1, 'Danza', '45', 'abierto', '50 min', '2', 'diario', '10 '),
('gabrielxsx2015@hotmail.com', 5, 'abdominales', '10|', 'abierto', '5 horas', '3', '1 vez por semana', '50'),
('sdraker1234@gmail.com', 2, 'correr', '18', 'abierto', '18 min', '10', 'diario', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadistica`
--

DROP TABLE IF EXISTS `estadistica`;
CREATE TABLE IF NOT EXISTS `estadistica` (
  `id` int(6) NOT NULL,
  `codigo` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `ejercicio` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `tiempo_promedio` int(6) NOT NULL,
  `N_luz_promedio` int(6) NOT NULL,
  `N_color_azul` int(6) NOT NULL,
  `N_apgar_luz` int(6) NOT NULL,
  `Duracion` int(6) NOT NULL,
  `Tiempo_max` int(6) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estadistica`
--

INSERT INTO `estadistica` (`id`, `codigo`, `ejercicio`, `tiempo_promedio`, `N_luz_promedio`, `N_color_azul`, `N_apgar_luz`, `Duracion`, `Tiempo_max`, `fecha`) VALUES
(2, 'u201415380', 'Concentracion aerea', 30, 10, 4, 3, 90, 10, '2020-02-01 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 33, 9, 5, 6, 100, 10, '2020-03-01 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 36, 13, 2, 5, 103, 10, '2020-03-03 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 31, 11, 6, 7, 80, 10, '2020-03-06 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 35, 10, 2, 8, 89, 10, '2020-03-07 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 33, 7, 8, 9, 104, 10, '2020-03-08 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 35, 10, 4, 7, 90, 10, '2020-03-10 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 32, 10, 4, 9, 101, 10, '2020-03-11 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 29, 9, 3, 5, 97, 10, '2020-03-12 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 38, 13, 4, 8, 110, 10, '2020-03-13 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 35, 10, 3, 5, 97, 10, '2020-03-14 00:00:00'),
(2, 'u201415380', 'Concentracion aerea', 35, 11, 4, 6, 102, 10, '2020-03-15 00:00:00'),
(2, 'u201415380', 'Disco', 10, 2, 4, 6, 102, 10, '2020-05-07 16:54:42'),
(2, 'u201415380', 'Disco', 10, 2, 4, 6, 102, 10, '2020-05-07 16:57:45'),
(5, 'u201712680', 'Disco', 10, 2, 4, 6, 102, 10, '2020-05-07 17:09:42'),
(5, 'u201712680', 'Disco', 10, 2, 4, 6, 102, 10, '2020-05-07 17:14:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infodeporte`
--

DROP TABLE IF EXISTS `infodeporte`;
CREATE TABLE IF NOT EXISTS `infodeporte` (
  `id` int(8) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `deporte` varchar(50) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `entrenador` varchar(30) NOT NULL,
  `c_nacional` varchar(30) NOT NULL,
  `c_internacional` varchar(30) NOT NULL,
  `an_entre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `infodeporte`
--

INSERT INTO `infodeporte` (`id`, `usuario`, `deporte`, `puesto`, `entrenador`, `c_nacional`, `c_internacional`, `an_entre`) VALUES
(1, 'gabriel@gmail.com', 'voley', '', '', '', '', ''),
(2, 'sdraker1234@gmail.com', 'futbol', '', '', '', '', ''),
(4, 'angel@upc.edu', 'natacion', '', '', '', '', ''),
(5, 'gabrielxsx2015@hotmail.com', 'natacion', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

DROP TABLE IF EXISTS `recomendaciones`;
CREATE TABLE IF NOT EXISTS `recomendaciones` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `ejercicio` varchar(80) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_rec` datetime NOT NULL,
  `entrenador` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `recomendaciones` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `recomendaciones`
--

INSERT INTO `recomendaciones` (`id`, `usuario`, `ejercicio`, `fecha_rec`, `entrenador`, `recomendaciones`) VALUES
(2, 'sdraker1234@gmail.com', 'Discos en campo de futbol tiros aereos', '2020-05-23 15:50:30', 'Vaan Gal', 'No dejar de lado su curso de operativos'),
(2, 'sdraker1234@gmail.com', 'Discos en campo de futbol tiros aereos', '2020-06-23 15:50:30', 'Bielsa', 'No usar el celular en el horario de entrenamiento'),
(2, 'sdraker1234@gmail.com', 'Discos en campo de futbol tiros aereos', '2020-07-23 15:50:30', 'Comizo', 'Hidratarse más'),
(2, 'sdraker1234@gmail.com', 'Disparos al arco', '2020-08-23 15:50:30', 'Bengoechea', 'Mirar a los lados antes de cubrirse'),
(2, 'sdraker1234@gmail.com', 'Disparos al arco', '2020-09-23 15:50:30', 'Julio Cesar', 'Aumentar su velocidad'),
(2, 'sdraker1234@gmail.com', 'Disparos al arco', '2020-10-23 15:50:30', 'Marcarian', 'Trabajar en la resistencia del juego '),
(2, 'sdraker1234@gmail.com', 'Discos en campo de futbol a ras de suelo', '2020-11-23 15:50:30', 'Pepa Valdezari', 'Poner mas empeño en el entrenamiento'),
(2, 'sdraker1234@gmail.com', 'Discos en campo de futbol a ras de suelo', '2020-12-23 15:50:30', 'Simeone', 'Mejorar la calidad de trote'),
(2, 'sdraker1234@gmail.com', 'Danza', '2020-05-07 16:34:03', 'Karena', 'Caminar'),
(2, 'sdraker1234@gmail.com', 'abdominales', '2020-05-07 17:07:11', 'yo', 'dormir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(8) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `administrativo` enum('S','N') NOT NULL,
  PRIMARY KEY (`usuario`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `codigo`, `administrativo`) VALUES
(4, 'angel@upc.edu', 'Ü#sÎzÛæ3OŒŒoG4ê=', 'u201632085', 'N'),
(1, 'gabriel@gmail.com', '–ÝþUÏeŒÒ\0¤¯0$', 'u201712681', 'N'),
(5, 'gabrielxsx2015@hotmail.com', 'Ft›¨ÂÑ7Ó¬l>âh”ß}', 'u201712680', 'N'),
(2, 'sdraker1234@gmail.com', '[fï1¨ÐBÂi|©%Q¶u', 'u201415380', 'N'),
(3, 'sergio.salas@upc.pe', ')Ítºÿüß¢ E-gÓ:', 'u200215322', 'S');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `datos_deportistas` (`codigo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
