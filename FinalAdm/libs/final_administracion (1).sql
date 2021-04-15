-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-04-2021 a las 11:18:39
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `final_administracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acompañantes_huesped`
--

CREATE TABLE `acompañantes_huesped` (
  `id` int(11) NOT NULL,
  `id_huesped_reservador` int(11) DEFAULT NULL,
  `cedula` varchar(13) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nombre` varchar(13) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apellido` varchar(13) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefono` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `celular` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `correo` varchar(18) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contraseña` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `cedula` varchar(22) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `celular` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contraseña` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `rol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `cedula`, `nombre`, `apellido`, `telefono`, `celular`, `correo`, `contraseña`, `rol`) VALUES
(1, '40229138520', 'jUan', 'Matos', '57414751', '57414751', '57414751', 'jdm123', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `id_sucursales` int(11) NOT NULL,
  `cédula` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `teléfono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `celular` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contraseña` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rol_hotel` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `rol` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `id_sucursales`, `cédula`, `nombre`, `apellido`, `teléfono`, `celular`, `correo`, `contraseña`, `rol_hotel`, `rol`) VALUES
(6, 2, '123123', 'Vanessa', 'Montero Leonardo', '809-545-5434', '809-545-5434', 'vane@vane', '1234', 'Servicio al Cliente', '2'),
(9, 3, '123123', 'Helen', 'Montas Castillo', '6546', '0505', 'helen@helen', 'hm123', 'Contador', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `id_sucursales` int(11) DEFAULT NULL,
  `categoria` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_habitacion` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `costo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_huesped`
--

CREATE TABLE `log_huesped` (
  `id_logs` int(11) NOT NULL,
  `usuario_operario` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario_afectado` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `accion` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `log_huesped`
--

INSERT INTO `log_huesped` (`id_logs`, `usuario_operario`, `usuario_afectado`, `accion`, `fecha_hora`) VALUES
(1, 'Administrador', 'Empleado', 'Agregó Empleado', '2021-04-15 11:03:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_habitaciones` int(11) DEFAULT NULL,
  `id_huesped` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones_habitaciones`
--

CREATE TABLE `reservaciones_habitaciones` (
  `id` int(11) NOT NULL,
  `id_pago` int(6) DEFAULT NULL,
  `id_habitaciones` int(6) DEFAULT NULL,
  `id_HReservador` int(6) DEFAULT NULL,
  `id_sucursales` int(6) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `monto_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservadores_huesped`
--

CREATE TABLE `reservadores_huesped` (
  `id` int(11) NOT NULL,
  `cédula` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `teléfono` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `celular` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contraseña` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'huesped'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservadores_huesped`
--

INSERT INTO `reservadores_huesped` (`id`, `cédula`, `provincia`, `nombre`, `apellido`, `teléfono`, `celular`, `correo`, `contraseña`, `rol`) VALUES
(1, '78547', '', 'Juan', 'Matos', '809-545-4323', '809-545-4323', 'juan@juan', 'juan', '3'),
(2, '40229138520', '', 'Karinaa', 'Morel', '8095957742', '809-545-5434', 'kari@kari', 'kari', '3'),
(3, '001-0117281-5', '', 'Karinaa', 'Morel', '8095957742', '809-545-5434', 'kari@kari', 'kari', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_hotel`
--

CREATE TABLE `roles_hotel` (
  `id` int(11) NOT NULL,
  `nombre` varchar(35) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles_hotel`
--

INSERT INTO `roles_hotel` (`id`, `nombre`) VALUES
(1, 'Servicio al Cliente'),
(2, 'Contador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `provincia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `provincia`) VALUES
(1, 'Santo Domingo'),
(2, 'Santiago'),
(3, 'Samaná'),
(4, 'La Romana'),
(5, 'Puerto Plata');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acompañantes_huesped`
--
ALTER TABLE `acompañantes_huesped`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_huesped_reservador` (`id_huesped_reservador`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursales` (`id_sucursales`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sucursales` (`id_sucursales`);

--
-- Indices de la tabla `log_huesped`
--
ALTER TABLE `log_huesped`
  ADD PRIMARY KEY (`id_logs`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitaciones` (`id_habitaciones`),
  ADD KEY `id_huesped` (`id_huesped`);

--
-- Indices de la tabla `reservaciones_habitaciones`
--
ALTER TABLE `reservaciones_habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitaciones` (`id_habitaciones`),
  ADD KEY `id_HReservador` (`id_HReservador`),
  ADD KEY `id_pago` (`id_pago`),
  ADD KEY `id_sucursales` (`id_sucursales`);

--
-- Indices de la tabla `reservadores_huesped`
--
ALTER TABLE `reservadores_huesped`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_hotel`
--
ALTER TABLE `roles_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acompañantes_huesped`
--
ALTER TABLE `acompañantes_huesped`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log_huesped`
--
ALTER TABLE `log_huesped`
  MODIFY `id_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservaciones_habitaciones`
--
ALTER TABLE `reservaciones_habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservadores_huesped`
--
ALTER TABLE `reservadores_huesped`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles_hotel`
--
ALTER TABLE `roles_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acompañantes_huesped`
--
ALTER TABLE `acompañantes_huesped`
  ADD CONSTRAINT `fk_huesped_reservador` FOREIGN KEY (`id_huesped_reservador`) REFERENCES `reservadores_huesped` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_sucursales`) REFERENCES `sucursales` (`id`);

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_ibfk_1` FOREIGN KEY (`id_sucursales`) REFERENCES `sucursales` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_habitaciones`) REFERENCES `habitaciones` (`id`),
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_huesped`) REFERENCES `reservadores_huesped` (`id`);

--
-- Filtros para la tabla `reservaciones_habitaciones`
--
ALTER TABLE `reservaciones_habitaciones`
  ADD CONSTRAINT `reservaciones_habitaciones_ibfk_1` FOREIGN KEY (`id_habitaciones`) REFERENCES `habitaciones` (`id`),
  ADD CONSTRAINT `reservaciones_habitaciones_ibfk_2` FOREIGN KEY (`id_HReservador`) REFERENCES `reservadores_huesped` (`id`),
  ADD CONSTRAINT `reservaciones_habitaciones_ibfk_3` FOREIGN KEY (`id_pago`) REFERENCES `pagos` (`id`),
  ADD CONSTRAINT `reservaciones_habitaciones_ibfk_4` FOREIGN KEY (`id_sucursales`) REFERENCES `sucursales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
