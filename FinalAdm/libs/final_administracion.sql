-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-04-2021 a las 03:37:34
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
(6, 2, '123123', 'Karina', 'Montero Leonardo', '809-545-5434', '809-545-5434', 'vane@vane', '1234', 'Servicio al Cliente', '2'),
(13, 2, '123123', 'Helen', 'Montero Leonardo', '8095957742', '809-545-5434', 'helen@helen', '1234', 'Contador', '2'),
(14, 2, '003-0105933-3', 'Leuris', 'Morel', '8095957742', '809-545-5434', 'leuris@leuris', '1234', 'Servicio al Cliente', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `id_sucursales` int(11) DEFAULT NULL,
  `categoria` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `url` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `status_habitacion` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `costo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `id_sucursales`, `categoria`, `url`, `cantidad`, `status_habitacion`, `costo`) VALUES
(1, 2, 'Presidencial', 'img/habitacionPresidencial.jpg', 10, 'Disponible', 10500),
(2, 3, 'Individual', 'img/habitacionIndividual.jpg', 10, 'Disponible', 3500),
(3, 2, 'Doble', 'img/habitacionDoble.jpg', 10, 'Disponible', 6500),
(4, 3, 'Estudio', 'img/habitacionEstudio.jpg', 10, 'Disponible', 8500),
(5, 2, 'King', 'img/habitacionKing.jpg', 10, 'Disponible', 5500),
(6, 3, 'Queen', 'img/habitacioneQueen.jpg', 10, 'Disponible', 5500);

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
(1, 'Administrador', 'Empleado', 'Agregó Empleado', '2021-04-15 11:03:08'),
(2, 'Administrador', 'Empleado', 'Agregó Empleado', '2021-04-15 15:23:33'),
(3, 'Administrador', 'Empleado', 'Modificó Empleado', '2021-04-15 15:23:50'),
(4, 'Administrador', 'Empleado', 'Eliminó Empleado', '2021-04-15 15:23:58'),
(5, 'Administrador', 'Empleado', 'Eliminó Empleado', '2021-04-15 16:14:20'),
(6, 'Administrador', 'Sucursal', 'Agregó Sucursal', '2021-04-15 17:00:14'),
(7, 'Administrador', 'Sucursal', 'Agregó Sucursal', '2021-04-15 17:01:20'),
(8, 'Administrador', 'Sucursal', 'Agregó Sucursal', '2021-04-15 17:16:03'),
(9, 'Administrador', 'Sucursal', 'Agregó Sucursal', '2021-04-15 17:19:54'),
(10, 'Administrador', 'Sucursal', 'Agregó Sucursal', '2021-04-15 17:28:42'),
(11, 'Administrador', 'Sucursal', 'Eliminó Sucursal (4)', '2021-04-15 17:30:47'),
(12, 'Administrador', 'Empleado', 'Agregó Empleado', '2021-04-15 18:01:36'),
(13, 'Administrador', 'Empleado', 'Modificó Empleado', '2021-04-15 18:02:00'),
(14, 'Administrador', 'Empleado', 'Eliminó Empleado', '2021-04-15 18:02:04'),
(15, 'Administrador', 'Empleado', 'Agregó Empleado', '2021-04-15 18:02:31'),
(16, 'Administrador', 'Sucursal', 'Agregó Sucursal', '2021-04-15 18:57:51'),
(17, 'Administrador', 'Sucursal', 'Agregó Sucursal', '2021-04-15 18:58:07'),
(18, 'Administrador', 'Empleado', 'Eliminó Empleado', '2021-04-16 02:05:05'),
(19, 'Administrador', 'Empleado', 'Eliminó Empleado', '2021-04-16 02:05:55'),
(20, 'Administrador', 'Empleado', 'Modificó Empleado', '2021-04-16 02:06:08'),
(21, 'Administrador', 'Empleado', 'Agregó Empleado', '2021-04-17 21:56:45'),
(22, 'Administrador', 'Empleado', 'Modificó Empleado', '2021-04-17 21:57:36'),
(23, 'Administrador', 'Empleado', 'Agregó Empleado', '2021-04-17 21:58:18'),
(24, 'Administrador', 'Empleado', 'Modificó Empleado', '2021-04-17 21:58:38'),
(25, 'Administrador', 'Empleado', 'Modificó Empleado', '2021-04-17 21:59:37'),
(26, 'Administrador', 'Empleado', 'Agregó Empleado', '2021-04-19 12:56:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
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
  `id_habitaciones` int(6) DEFAULT NULL,
  `id_HReservador` int(6) DEFAULT NULL,
  `id_sucursales` int(6) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `monto_total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservaciones_habitaciones`
--

INSERT INTO `reservaciones_habitaciones` (`id`, `id_habitaciones`, `id_HReservador`, `id_sucursales`, `fecha_inicio`, `fecha_fin`, `monto_total`) VALUES
(1, 5, 2, 2, '2021-04-16', '2021-04-30', 3500),
(2, 5, 1, 2, '2021-04-19', '2021-04-29', 3500),
(3, 1, 1, 2, '2021-04-20', '2021-04-25', 10500),
(4, 1, 1, 3, '2021-04-21', '2021-04-22', 10500),
(5, 3, 1, 3, '2021-04-19', '2021-04-22', 6500),
(6, 6, 1, 2, '2021-04-23', '2021-04-29', 5500),
(9, 5, 1, 2, '2021-04-29', '2021-05-01', 5500),
(10, 3, 1, 3, '2021-04-21', '2021-04-23', 6500);

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
(1, '78547', 'Santo Domingo', 'Juan', 'Matos', '809-545-4323', '809-545-4323', 'juan@juan', 'juan', '3'),
(2, '40229138520', 'Santiago', 'Karinaa', 'Morel', '8095957742', '809-545-5434', 'kari@kari', 'kari', '3'),
(3, '001-0117281-5', 'Valverde Mao', 'Karinaa', 'Morel', '8095957742', '809-545-5434', 'kari@kari', 'kari', '3');

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
  `direccion` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `provincia` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `direccion`, `provincia`) VALUES
(2, 'Calle 7, Valle Verde', 'Santiago'),
(3, 'Calle 8 #02, La Loma', 'La Altagracia');

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
  ADD KEY `id_huesped` (`id_huesped`);

--
-- Indices de la tabla `reservaciones_habitaciones`
--
ALTER TABLE `reservaciones_habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitaciones` (`id_habitaciones`),
  ADD KEY `id_HReservador` (`id_HReservador`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `log_huesped`
--
ALTER TABLE `log_huesped`
  MODIFY `id_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservaciones_habitaciones`
--
ALTER TABLE `reservaciones_habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`id_huesped`) REFERENCES `reservadores_huesped` (`id`);

--
-- Filtros para la tabla `reservaciones_habitaciones`
--
ALTER TABLE `reservaciones_habitaciones`
  ADD CONSTRAINT `reservaciones_habitaciones_ibfk_1` FOREIGN KEY (`id_habitaciones`) REFERENCES `habitaciones` (`id`),
  ADD CONSTRAINT `reservaciones_habitaciones_ibfk_2` FOREIGN KEY (`id_HReservador`) REFERENCES `reservadores_huesped` (`id`),
  ADD CONSTRAINT `reservaciones_habitaciones_ibfk_4` FOREIGN KEY (`id_sucursales`) REFERENCES `sucursales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
