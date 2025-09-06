-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-09-2025 a las 00:56:30
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
-- Base de datos: `sistemadeventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen`
--

CREATE TABLE `tb_almacen` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `stock_maximo` int(11) DEFAULT NULL,
  `precio_compra` varchar(255) NOT NULL,
  `precio_venta` varchar(255) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `id_usuario`, `id_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'P-00001', 'COCA QUINA', 'de 2 litros', 19, 20, 500, '9', '12.50', '2023-02-12', '2023-02-12-06-26-25__6020052-1000x1000.jpg', 1, 1, '2023-02-12 18:26:25', '0000-00-00 00:00:00'),
(2, 'P-00002', 'AUDIFONOS', 'Con cargado incorporado', 41, 10, 200, '80', '120', '2023-02-13', '2023-02-13-02-29-53__8810fb37cb2f03d30c7c467ec772b5ed6811e7e6.jpeg', 1, 11, '2023-02-13 14:29:53', '0000-00-00 00:00:00'),
(3, 'P-00003', 'VINO TINTO', 'VINO TINTO BLANCO DE 300 ml', 34, 10, 200, '50', '80', '2023-02-13', '2023-02-13-02-35-15__vino.JPG', 1, 1, '2023-02-13 14:35:15', '0000-00-00 00:00:00'),
(4, 'P-00004', 'PIQUEOS', 'Piqueos Picantes huff', 23, 10, 100, '2', '3', '2025-07-14', '2025-07-14-11-56-35__piqueos.jpg', 3, 3, '2025-07-14 11:56:35', '2025-09-04 17:48:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `id_carrito` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`id_carrito`, `nro_venta`, `id_producto`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(26, 1, 1, 1, '2025-09-04 17:54:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Bebidas', '2023-01-24 22:25:10', '2025-07-15 17:30:03'),
(2, 'Lacteos', '2023-01-25 14:39:50', '2025-07-15 17:29:54'),
(3, 'Comidas', '2023-01-25 14:40:27', '2025-07-15 17:30:33'),
(4, 'Dulces y Snacks', '2023-01-25 14:41:14', '2025-07-15 17:29:22'),
(5, 'Limpieza y Aseo Personal', '2023-01-25 14:43:06', '2025-07-15 17:30:20'),
(6, 'Bebidas Alcohólicas', '2023-01-25 14:44:51', '2025-07-15 17:34:04'),
(11, 'Panadería y Pastelería', '2023-01-29 23:01:42', '2025-07-15 17:34:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `nit_ci_cliente` varchar(255) NOT NULL,
  `celular_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `nit_ci_cliente`, `celular_cliente`, `email_cliente`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'luis paredes', '75861496', '935789126', 'luisparedes@gmail.com', '2025-07-14 20:54:43', '2025-07-14 20:54:43'),
(2, 'Jasmin Campos', '85467524', '987565412', 'jasmincampos@gmail.com', '2025-07-14 20:54:43', '2025-07-14 20:54:43'),
(3, 'alonso rios', '85479631', '987685125', 'alonsorios@gmail.com', '2025-07-15 16:37:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio_compra` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_compras`
--

INSERT INTO `tb_compras` (`id_compra`, `id_producto`, `nro_compra`, `fecha_compra`, `id_proveedor`, `comprobante`, `id_usuario`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 1, 1, '2023-02-12', 10, 'FACTURA', 1, '200', 50, '2023-02-12 23:37:24', '2023-02-12 23:37:24'),
(2, 3, 2, '2023-02-17', 10, 'FACTURA NRO 120', 1, '5000', 50, '2023-02-17 22:35:24', '0000-00-00 00:00:00'),
(3, 1, 3, '2023-02-17', 10, 'NOTA DE VENTA NRO 523', 1, '250', 100, '2023-02-17 22:37:33', '0000-00-00 00:00:00'),
(4, 3, 4, '2023-02-21', 10, 'FACTURA NRO 300', 1, '5000', 50, '2023-02-21 17:08:58', '0000-00-00 00:00:00'),
(5, 3, 5, '2023-02-21', 10, 'NOTA DE VENTA 0001', 1, '1000', 20, '2023-02-21 17:10:16', '2023-03-05 22:17:59'),
(6, 1, 6, '2023-02-21', 10, 'FACTURA NRO 320', 1, '2350', 150, '2023-02-21 17:11:12', '0000-00-00 00:00:00'),
(8, 1, 7, '2025-08-14', 12, '0001000', 3, '9', 25, '2025-08-14 19:11:27', '0000-00-00 00:00:00'),
(9, 3, 8, '2025-08-14', 12, '0005100', 3, '52', 23, '2025-08-14 19:12:10', '0000-00-00 00:00:00'),
(10, 4, 9, '2025-08-14', 11, '0001001', 3, '2', 25, '2025-08-14 19:12:59', '0000-00-00 00:00:00'),
(11, 2, 10, '2025-08-14', 10, '0001000', 3, '50', 15, '2025-08-14 19:17:16', '0000-00-00 00:00:00'),
(12, 3, 11, '2025-08-14', 11, '0001000', 3, '52', 18, '2025-08-14 19:17:59', '0000-00-00 00:00:00'),
(13, 1, 12, '2025-09-04', 10, '0001000', 3, '9', 25, '2025-09-04 17:30:02', '0000-00-00 00:00:00'),
(14, 3, 13, '2025-09-04', 12, '00051021', 3, '50', 34, '2025-09-04 17:33:18', '0000-00-00 00:00:00'),
(15, 2, 14, '2025-09-04', 11, '00051021', 3, '80', 42, '2025-09-04 17:34:10', '0000-00-00 00:00:00'),
(16, 4, 15, '2025-09-04', 11, '0001400', 3, '2', 26, '2025-09-04 17:49:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

CREATE TABLE `tb_proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `empresa` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_proveedores`
--

INSERT INTO `tb_proveedores` (`id_proveedor`, `nombre_proveedor`, `celular`, `telefono`, `empresa`, `email`, `direccion`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(10, 'Jose Quente', '75657007', '27736632', 'CASCADA', 'hilariweb@gmail.com', 'Av. del Maestro S/N', '2023-02-12 18:27:10', '0000-00-00 00:00:00'),
(11, 'Maria Quispe Montes', '74664754', '28837773', 'COPELMEX', 'maria@gmail.com', 'av. panamerica nro 540', '2023-02-14 16:23:39', '0000-00-00 00:00:00'),
(12, 'Jorge condor', '987546254', '987546254', 'A&M GLOBAL SOLUTIONS COMPANY S.A.C.', 'jorgecondor@gmail.com', 'Av. El Polo Mz. F lote 17 Urb. El Club Santa María de Huachipa Lima15', '2025-07-09 11:39:25', '2025-07-09 11:40:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'ADMINISTRADOR', '2023-01-23 23:15:19', '2023-01-23 23:15:19'),
(3, 'VENDEDOR', '2023-01-23 19:11:28', '2023-01-23 20:13:35'),
(4, 'CONTADOR', '2023-01-23 21:09:54', '0000-00-00 00:00:00'),
(5, 'ALMACEN', '2023-01-24 08:28:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_user` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombres`, `email`, `password_user`, `token`, `id_rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Oscar Valdes', 'oscarvaldes@gmail.com', '$2y$10$VIDXuo4wKCt/x5BHkwHZAOw9lJNirjyLbBHPa9AA4/xgOW.91y/DG', '', 1, '2023-01-24 15:16:01', '2025-07-15 17:36:51'),
(3, 'Jhon Ancgl', 'jhonanco@gmail.com', '$2y$10$RVxD4fWMzuFTq9YVngkQneXL1wPGGE4QmWV4OI6xrZHv2VIAyiWBK', '', 1, '2025-06-02 11:40:14', '2025-06-02 11:43:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

CREATE TABLE `tb_ventas` (
  `id_venta` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total_pagado` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_ventas`
--

INSERT INTO `tb_ventas` (`id_venta`, `nro_venta`, `id_cliente`, `total_pagado`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(17, 1, 3, 13, '2025-09-04 17:54:57', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_venta` (`nro_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_cliente_2` (`id_cliente`),
  ADD KEY `nro_venta` (`nro_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD CONSTRAINT `tb_almacen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD CONSTRAINT `tb_carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tb_roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD CONSTRAINT `tb_ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_ventas_ibfk_2` FOREIGN KEY (`nro_venta`) REFERENCES `tb_carrito` (`nro_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
