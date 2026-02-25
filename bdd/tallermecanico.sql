-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2026 a las 22:00:19
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
-- Base de datos: `tallermecanico`
--
CREATE DATABASE IF NOT EXISTS `tallermecanico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tallermecanico`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `patente` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `anio` year(4) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` datetime DEFAULT current_timestamp(),
  `fecha_edicion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_borrado` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id`, `id_cliente`, `patente`, `marca`, `modelo`, `anio`, `estado`, `activo`, `fecha_alta`, `fecha_edicion`, `fecha_borrado`, `id_usuario`) VALUES
(1, 1, 'run 199', 'Ford', 'Focus', '2010', 'Entrado', 1, '2026-02-08 01:53:36', '2026-02-22 02:02:05', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` datetime DEFAULT current_timestamp(),
  `fecha_edicion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_borrado` datetime DEFAULT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `telefono`, `email`, `direccion`, `activo`, `fecha_alta`, `fecha_edicion`, `fecha_borrado`, `id_usuario`) VALUES
(1, 'Ezequiel', 'Mansilla', '3442401173', 'diiego.mansilla@gmail.com', 'Arenales 1012', 1, '2026-02-07 11:42:06', '2026-02-07 11:51:28', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_reparacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_factura` varchar(10) NOT NULL,
  `monto` float NOT NULL,
  `estado_pago` tinyint(4) NOT NULL DEFAULT 0,
  `fecha_pago` date DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` datetime DEFAULT current_timestamp(),
  `fecha_edicion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `id_cliente`, `id_reparacion`, `id_usuario`, `tipo_factura`, `monto`, `estado_pago`, `fecha_pago`, `metodo_pago`, `activo`, `fecha_alta`, `fecha_edicion`, `fecha_borrado`) VALUES
(1, 1, 1, 1, 'fc', 20000, 1, '2026-02-24', 'efectivo', 1, '2026-02-23 02:01:04', '2026-02-24 13:35:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_proveedores`
--

CREATE TABLE `movimientos_proveedores` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `tipo_factura` varchar(20) NOT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `fecha` date NOT NULL,
  `monto` varchar(50) NOT NULL,
  `estado_pago` tinyint(4) NOT NULL DEFAULT 0,
  `fecha_pago` date DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `observaciones` varchar(150) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` datetime DEFAULT current_timestamp(),
  `fecha_edicion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimientos_proveedores`
--

INSERT INTO `movimientos_proveedores` (`id`, `id_proveedor`, `tipo_factura`, `numero`, `fecha`, `monto`, `estado_pago`, `fecha_pago`, `metodo_pago`, `observaciones`, `id_usuario`, `activo`, `fecha_alta`, `fecha_edicion`, `fecha_borrado`) VALUES
(5, 1, 'nod', '12345678', '2026-02-21', '30000', 1, '2026-02-24', 'efectivo', 'Bulones', 1, 1, '2026-02-21 23:09:12', '2026-02-24 21:02:19', NULL),
(7, 1, 'fb', '87654321', '2026-02-22', '40000', 0, NULL, NULL, 'Batería', 1, 1, '2026-02-22 00:11:16', '2026-02-22 00:11:16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `razon_social` varchar(90) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(90) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` datetime DEFAULT current_timestamp(),
  `fecha_edicion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_borrado` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `razon_social`, `telefono`, `email`, `activo`, `fecha_alta`, `fecha_edicion`, `fecha_borrado`, `id_usuario`) VALUES
(1, 'John Deer', '213647566', 'john@deere.com', 1, '2026-02-09 00:50:44', '2026-02-25 13:33:26', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `id` int(11) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` datetime DEFAULT current_timestamp(),
  `fecha_edicion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`id`, `id_auto`, `id_usuario`, `descripcion`, `fecha`, `monto`, `activo`, `fecha_alta`, `fecha_edicion`, `fecha_borrado`) VALUES
(1, 1, 1, 'Mecanica en general', '2026-02-18', 20000, 1, '2026-02-18 17:05:50', '2026-02-18 17:54:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_alta` datetime DEFAULT current_timestamp(),
  `fecha_edicion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_borrado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `dni`, `email`, `username`, `password`, `rol`, `activo`, `fecha_alta`, `fecha_edicion`, `fecha_borrado`) VALUES
(1, 'Diego Ezequiel', 'Mansilla', '35558343', 'diegoman956@hotmail.com', 'dem343', '$2y$10$sngmSsW822XmFR5zl0jc3u26YdefIbb5oiy0UVynlgzmazKQPuAay', 'Administrador', 1, '2026-02-06 18:38:02', '2026-02-19 13:41:00', NULL),
(2, 'Admin', 'Admin', '00000000', 'admin@taller.com', 'admin', '$2y$10$Wr4Q0YAYCYUtJgAhJEVY0uMvwc2alRUjtAL5EtARjJL.emd5YXb/m', 'Administrador', 1, '2026-02-25 08:38:35', '2026-02-25 12:40:35', NULL),
(3, 'Jose', 'Del Valle', '32142104', 'jose@delvalle.com', 'josedv', '$2y$10$0GVG3tLN1T99cKqmyuFK4.rwPEdrNmde2hPVc6/VHzB3rCWbs6yTe', 'Tesorero', 1, '2026-02-25 08:39:05', '2026-02-25 08:40:11', NULL),
(4, 'Marcelo', 'Gonzalez', '40456233', 'mgonzalez@team.com', 'margon', '$2y$10$rWjsI6ekyNgqHWEP6BLwWOKBe9Rd4CS3i6ulW4poR.i.lTuUXnGh2', 'Cliente', 1, '2026-02-25 08:42:54', '2026-02-25 08:42:54', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autos_ibfk_1` (`id_cliente`),
  ADD KEY `autos_ibfk_2` (`id_usuario`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_ibfk_1` (`id_usuario`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facturas_ibfk_1` (`id_cliente`),
  ADD KEY `facturas_ibfk_2` (`id_reparacion`),
  ADD KEY `facturas_ibfk_3` (`id_usuario`);

--
-- Indices de la tabla `movimientos_proveedores`
--
ALTER TABLE `movimientos_proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedores_ibfk_1` (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedores_ibfk_2` (`id_usuario`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparaciones_ibfk_1` (`id_auto`),
  ADD KEY `reparaciones_ibfk_2` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `movimientos_proveedores`
--
ALTER TABLE `movimientos_proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `autos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`id_reparacion`) REFERENCES `reparaciones` (`id`),
  ADD CONSTRAINT `facturas_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `movimientos_proveedores`
--
ALTER TABLE `movimientos_proveedores`
  ADD CONSTRAINT `proveedores_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD CONSTRAINT `reparaciones_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `autos` (`id`),
  ADD CONSTRAINT `reparaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
