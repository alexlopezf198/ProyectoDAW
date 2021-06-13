-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2021 a las 20:06:46
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
-- Base de datos: `proyectodaw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
  `id` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL,
  `id_usuario` varchar(9) NOT NULL,
  `id_tecnico` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencia`
--

INSERT INTO `incidencia` (`id`, `id_tipo`, `id_ubicacion`, `titulo`, `descripcion`, `fecha`, `estado`, `id_usuario`, `id_tecnico`) VALUES
(1, 1, 3, 'El ordenador del profesor no funciona', 'El ordenador del profesor ha dejado de funcionar, no arranca el Windows y no podemos dar clase.', '2021-06-13', 2, '21152548T', '21152548T'),
(2, 2, 2, 'Bombilla fundida', 'Hay una bombilla fundida en el techo.', '2021-06-13', 0, '21152548T', NULL),
(3, 3, 1, 'Papeles en el suelo', 'Hay muchos papeles en el suelo debido al taller que se realizó el 10 de Junio.', '2021-06-13', 0, '21152548T', NULL),
(4, 4, 2, 'No hay agua caliente', 'No tenemos agua caliente en el laboratorio, sale fría siempre y no podemos realizar bien los experimentos.', '2021-06-13', 0, '21152548T', NULL),
(5, 1, 1, 'No funciona el proyector', 'El proyector ha dejado de funcionar y no podemos dar clase.', '2021-06-13', 0, '21152548T', NULL),
(6, 1, 3, 'No funcionan los altavoces', 'Los altavoces del ordenador del profesor no funcionan y no podemos ver vídeos.', '2021-06-13', 1, '21152548T', '21152548T'),
(7, 4, 3, 'Los radiadores no funcionan', 'Hace mucho frío y los radiadores no funcionan, no se calientan.', '2021-06-13', 1, '21152548T', '21152548T'),
(8, 2, 2, 'No funciona un enchufe', 'Hay un enchufe que no funciona', '2021-06-13', 0, '21152548T', NULL),
(9, 3, 3, 'Purpurina en las mesas', 'Las mesas tienen purpurina porque los niños de 1º de ESO estuvieron en el aula.', '2021-06-13', 0, '21152548T', NULL),
(10, 2, 1, 'Las luces parpadean', 'Las luces del aula parpadean y los estudiantes no nos podemos concentrar.', '2021-06-13', 0, '21152548T', NULL),
(11, 4, 1, 'El grifo gotea', 'El grifo del lavamanos gotea constantemente y hace ruido.', '2021-06-13', 0, '21152548T', NULL),
(12, 1, 1, 'Portatil roto', 'El portatil de un estudiante se ha roto y necesitamos un recambio.', '2021-06-13', 0, '21152548T', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico-tipo`
--

CREATE TABLE `tecnico-tipo` (
  `dni_usuario` varchar(9) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `estaEliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`, `descripcion`, `estaEliminado`) VALUES
(1, 'Informática', 'Técnicos encargados de la reparación de ordenadores.', 0),
(2, 'Electricidad', 'Técnicos encargados en la reparación de problemas en la instalación eléctrica.', 0),
(3, 'Limpieza', 'Técnicos encargados en la limpieza y mantenimiento del establecimiento.', 0),
(4, 'Fontanería', 'Técnicos especializados en la reparación de la instalación del agua.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `estaEliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id`, `nombre`, `descripcion`, `estaEliminado`) VALUES
(1, 'Aula 12B', 'Aula de 1º Bachillerato Grupo B.', 0),
(2, 'Laboratorio', 'Lugar específico para la realización de pruebas en las materias de Física y Química.', 0),
(3, 'Aula 5A', 'Aula de 2º DAW Mañana.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `email` varchar(320) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `contrasenia` varchar(200) NOT NULL,
  `esTecnico` tinyint(1) NOT NULL,
  `esAdmin` tinyint(1) NOT NULL,
  `estaEliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellidos`, `email`, `provincia`, `localidad`, `fechaNacimiento`, `contrasenia`, `esTecnico`, `esAdmin`, `estaEliminado`) VALUES
('21152548T', 'Alejandro', 'López Arjona', 'alejandro98f1@gmail.com', 'Sevilla', 'Utrera', '1998-01-20', '$2y$10$lQD3vk22JEX13I4tph8/AuuCuSh2QRywRHL4YA57HsBtZk/nv/B7m', 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_ubicacion` (`id_ubicacion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tecnico` (`id_tecnico`);

--
-- Indices de la tabla `tecnico-tipo`
--
ALTER TABLE `tecnico-tipo`
  ADD PRIMARY KEY (`dni_usuario`,`id_tipo`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencia`
--
ALTER TABLE `incidencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `incidencia_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`),
  ADD CONSTRAINT `incidencia_ibfk_2` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id`),
  ADD CONSTRAINT `incidencia_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`dni`),
  ADD CONSTRAINT `incidencia_ibfk_4` FOREIGN KEY (`id_tecnico`) REFERENCES `usuario` (`dni`);

--
-- Filtros para la tabla `tecnico-tipo`
--
ALTER TABLE `tecnico-tipo`
  ADD CONSTRAINT `tecnico-tipo_ibfk_1` FOREIGN KEY (`dni_usuario`) REFERENCES `usuario` (`dni`),
  ADD CONSTRAINT `tecnico-tipo_ibfk_2` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
