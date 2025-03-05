-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 00:01:13
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym_cpic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Yoga', 'Clase de yoga para mejorar la flexibilidad y la relajación.'),
(2, 'Spinning', 'Clase de ciclismo indoor para mejorar la resistencia cardiovascular.'),
(3, 'CrossFit', 'Entrenamiento de alta intensidad que combina fuerza y cardio.'),
(4, 'Pilates', 'Clase de pilates para fortalecer el core y mejorar la postura.'),
(5, 'Boxeo', 'Clase de boxeo para mejorar la coordinación y la fuerza.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroformacion`
--

CREATE TABLE `centroformacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centroformacion`
--

INSERT INTO `centroformacion` (`id`, `nombre`) VALUES
(1, 'Procesos Industriale'),
(2, 'Formacion Cafetera'),
(3, 'Automatizacion'),
(4, 'Servicios y Comercio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controlprogreso`
--

CREATE TABLE `controlprogreso` (
  `id` int(10) UNSIGNED NOT NULL,
  `fechaRealizacion` date NOT NULL,
  `peso` decimal(10,0) DEFAULT NULL,
  `cintura` decimal(10,0) DEFAULT NULL,
  `cadera` decimal(10,0) DEFAULT NULL,
  `musloDerecho` decimal(10,0) DEFAULT NULL,
  `musloIzquierdo` decimal(10,0) DEFAULT NULL,
  `brazoDerecho` decimal(10,0) DEFAULT NULL,
  `brazoIzquierdo` decimal(10,0) DEFAULT NULL,
  `antebrazoDerecho` decimal(10,0) DEFAULT NULL,
  `antebrazoIzquierdo` decimal(10,0) DEFAULT NULL,
  `pantorrillaDerecha` decimal(10,0) DEFAULT NULL,
  `pantorrillaIzquierda` decimal(10,0) DEFAULT NULL,
  `examenMedico` varchar(255) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `fechaExamen` date DEFAULT NULL,
  `fkIdUsuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(10) UNSIGNED NOT NULL,
  `ficha` varchar(15) NOT NULL,
  `cantAprendices` tinyint(3) UNSIGNED DEFAULT NULL,
  `estado` varchar(15) NOT NULL,
  `fechaIniLectiva` date DEFAULT NULL,
  `fechaFinLectiva` date DEFAULT NULL,
  `fkIdProgForm` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaformacion`
--

CREATE TABLE `programaformacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(15) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
  `FkIdCentroFormacion` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programaformacion`
--

INSERT INTO `programaformacion` (`id`, `codigo`, `nombre`, `FkIdCentroFormacion`) VALUES
(1, '67890', 'Técnico en Produccion agricola', 2),
(2, '11223', 'Tecnólogo en Gestión Empresari', 4),
(3, '44556', 'Técnico en automatizacion', 3),
(4, '77889', 'Tecnólogo en Desarrollo de Sof', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroingreso`
--

CREATE TABLE `registroingreso` (
  `id` int(10) UNSIGNED NOT NULL,
  `fechaIn` datetime NOT NULL,
  `fechaOut` datetime DEFAULT NULL,
  `fkIdUserGym` int(10) UNSIGNED NOT NULL,
  `fkIdActividad` int(10) UNSIGNED DEFAULT NULL,
  `fkIdTrainer` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'admin'),
(2, 'trainer'),
(3, 'client'),
(4, 'store');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuariogym`
--

CREATE TABLE `tipousuariogym` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipoDocumento` char(2) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `genero` char(1) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `eps` varchar(20) DEFAULT NULL,
  `tipoSangre` char(3) DEFAULT NULL,
  `peso` decimal(10,0) DEFAULT NULL,
  `estatura` decimal(10,0) DEFAULT NULL,
  `telefonoEmergencia` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `fkIdRol` int(10) UNSIGNED NOT NULL,
  `fkIdGrupo` int(10) UNSIGNED DEFAULT NULL,
  `fkIdCentroFormacion` int(10) UNSIGNED DEFAULT NULL,
  `fkIdTipoUserGym` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centroformacion`
--
ALTER TABLE `centroformacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `controlprogreso`
--
ALTER TABLE `controlprogreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdUser` (`fkIdUsuario`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FkIdProgForm` (`fkIdProgForm`);

--
-- Indices de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FkIdCentroFormacion` (`FkIdCentroFormacion`);

--
-- Indices de la tabla `registroingreso`
--
ALTER TABLE `registroingreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdUserGymReg` (`fkIdUserGym`),
  ADD KEY `fkIdActividad` (`fkIdActividad`),
  ADD KEY `fkIdTrainer` (`fkIdTrainer`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuariogym`
--
ALTER TABLE `tipousuariogym`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdRol` (`fkIdRol`),
  ADD KEY `fkIdGrupo` (`fkIdGrupo`),
  ADD KEY `fkIdCentroFormacion2` (`fkIdCentroFormacion`),
  ADD KEY `fkIdTipoUserGym` (`fkIdTipoUserGym`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `centroformacion`
--
ALTER TABLE `centroformacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `controlprogreso`
--
ALTER TABLE `controlprogreso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `registroingreso`
--
ALTER TABLE `registroingreso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipousuariogym`
--
ALTER TABLE `tipousuariogym`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `controlprogreso`
--
ALTER TABLE `controlprogreso`
  ADD CONSTRAINT `fkIdUser` FOREIGN KEY (`fkIdUsuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `FkIdProgForm` FOREIGN KEY (`fkIdProgForm`) REFERENCES `programaformacion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  ADD CONSTRAINT `FkIdCentroFormacion` FOREIGN KEY (`FkIdCentroFormacion`) REFERENCES `centroformacion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registroingreso`
--
ALTER TABLE `registroingreso`
  ADD CONSTRAINT `fkIdActividad` FOREIGN KEY (`fkIdActividad`) REFERENCES `actividad` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkIdTrainer` FOREIGN KEY (`fkIdTrainer`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkIdUserGymReg` FOREIGN KEY (`fkIdUserGym`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fkIdCentroFormacion2` FOREIGN KEY (`fkIdCentroFormacion`) REFERENCES `centroformacion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkIdGrupo` FOREIGN KEY (`fkIdGrupo`) REFERENCES `grupo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkIdRol` FOREIGN KEY (`fkIdRol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fkIdTipoUserGym` FOREIGN KEY (`fkIdTipoUserGym`) REFERENCES `tipousuariogym` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
