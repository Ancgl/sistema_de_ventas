-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2025 a las 21:41:36
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
(4, 'P-00004', 'PIQUEOS', 'Piqueos Picantes huff', 23, 10, 100, '2', '3', '2025-07-14', '2025-07-14-11-56-35__piqueos.jpg', 3, 4, '2025-07-14 11:56:35', '2025-09-24 17:55:55'),
(5, 'P-00005', 'Papas Lays Clásicas', 'Papas Lays Clásicas en bolsa 180g', 15, 5, 30, '2', '2', '2025-09-24', '2025-09-24-06-06-19__papalays.jpg', 3, 4, '2025-09-24 18:06:19', '2025-09-24 18:07:37'),
(6, 'P-00003', 'Coca Cola ', 'Coca Cola Original 1 lt ', 19, 5, 25, '6', '8', '2025-10-11', '2025-10-11-12-42-50__Coca-Cola- 1ltr.jpg', 3, 1, '2025-10-11 12:42:50', '0000-00-00 00:00:00'),
(7, 'P-00004', 'Inca Cola ', 'Inka Cola Original 1 lt ', 20, 5, 25, '6', '8', '2025-10-11', '2025-10-11-12-43-55__Inca Kola 1ltr.jpg', 3, 1, '2025-10-11 12:43:55', '0000-00-00 00:00:00'),
(8, 'P-00005', 'Yogurt Lucuma', 'Gloria yogurt lucuma 1 kg 1 KG', 10, 3, 20, '5', '6.8', '2025-10-11', '2025-10-11-12-49-54__Yogurt lucuma.png', 3, 2, '2025-10-11 12:49:54', '0000-00-00 00:00:00'),
(9, 'P-00006', ' Mantequilla Sin Sal*200G', 'Laive Mantequilla Barra Sin Sal*200G', 15, 2, 10, '6', '9', '2025-10-11', '2025-10-11-12-53-32__matequilla.jpg', 3, 2, '2025-10-11 12:53:32', '0000-00-00 00:00:00'),
(10, 'P-00007', 'PAN CHANCAY', 'Pan Chancay (Bolsa 4 Unidades)', 10, 2, 15, '5', '7', '2025-10-11', '2025-10-11-12-58-47__CHANCAY_GRANDE-1.jpg', 3, 11, '2025-10-11 12:58:47', '2025-10-11 12:59:56'),
(11, 'P-00008', 'Pan Integral', 'Pan Integral Mediano Unión Bolsa 360 GR.', 10, 3, 15, '4', '5.5', '2025-10-11', '2025-10-11-01-06-34__integral.jpg', 3, 11, '2025-10-11 13:06:34', '2025-10-11 13:06:44'),
(12, 'P-00009', 'ACEITE VEGETAL900 ML.', 'Aceite Vegetal Mirasol X 900 ML.', 9, 2, 20, '6', '7.8', '2025-10-11', '2025-10-11-01-12-22__aceite-vegetaljpg.jpg', 3, 2, '2025-10-11 13:12:09', '2025-10-11 13:12:22'),
(13, 'P-00010', 'Arroz Costeño 750 g.', 'Arroz Superior Costeño Bolsa 750 g.', 10, 2, 20, '3', '4.5', '2025-10-11', '2025-10-11-01-21-10__ARROZ.jpg', 3, 13, '2025-10-11 13:21:10', '2025-10-11 16:18:49'),
(14, 'P-00011', 'Mermelada de Fresa 800 g.', 'Mermelada de Fresa Fanny Doy pack 800 g.', 13, 3, 20, '6', '7.7', '2025-10-11', '2025-10-11-04-14-46__Mermeladafresa.jpg', 3, 6, '2025-10-11 16:14:46', '2025-10-11 16:16:52'),
(15, 'P-00012', 'Azúcar Rubia 1Kg', 'Azúcar Rubia CARTAVIO Bolsa 1Kg', 10, 2, 20, '4', '5', '2025-10-11', '2025-10-11-04-18-15__azucr1kg.png', 3, 13, '2025-10-11 16:18:15', '2025-10-11 16:18:33'),
(16, 'P-00013', 'Mikes Limón  lata 355 ml', 'Mikes Hard Lemonade Limón en lata 355 ml', 12, 5, 50, '3', '4.5', '2025-10-11', '2025-10-11-04-29-41__mikes.jpg', 3, 1, '2025-10-11 16:29:41', '0000-00-00 00:00:00'),
(17, 'P-00014', 'Guarana 3L', 'Gaseosa Guaraná Botella 3L.', 8, 3, 15, '5.00', '6.90', '2025-10-29', '2025-10-30-01-30-49__guarana.jpg', 3, 1, '2025-10-29 17:49:11', '2025-10-30 13:31:46');

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
(51, 1, 6, 1, '2025-11-04 15:08:05', '2025-11-04 15:08:05'),
(52, 1, 16, 3, '2025-11-04 15:08:12', '2025-11-04 15:08:12'),
(53, 2, 12, 1, '2025-11-04 15:08:48', '2025-11-04 15:08:48'),
(54, 2, 17, 2, '2025-11-04 15:08:58', '2025-11-04 15:08:58');

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
(6, 'Dulces y Untables', '2023-01-25 14:44:51', '2025-10-11 16:16:34'),
(11, 'Panadería y Pastelería', '2023-01-29 23:01:42', '2025-07-15 17:34:34'),
(13, 'Abarrotes', '2025-10-11 12:21:07', '0000-00-00 00:00:00');

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
(1, 'Luis Paredes Actualizado', '75861555', '935789126', 'luisparedes@gmail.com', '2025-07-14 20:54:43', '2025-07-14 20:54:43'),
(2, 'Jasmin Campos Guerrera', '85467524', '987565412', 'jasmincampos@gmail.com', '2025-07-14 20:54:43', '2025-07-14 20:54:43'),
(3, 'Alonso Rios Chapoñan', '85479631', '987685125', 'alonsorios@gmail.com', '2025-07-15 16:37:34', '0000-00-00 00:00:00'),
(4, 'Andrea Gomez Rivera', '54179600', '987688100', 'andreagomezr@gmail.com', '2025-09-06 12:16:27', '0000-00-00 00:00:00');

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
(18, 14, 1, '2025-10-11', 12, '0000001', 3, '6', 5, '2025-10-11 17:20:24', '0000-00-00 00:00:00'),
(19, 17, 2, '2025-10-29', 11, '0001001', 3, '1.50', 5, '2025-10-29 17:54:05', '0000-00-00 00:00:00');

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
(11, 'Maria Quispe Montes', '74664754', '28837773', 'COPELMEX AVICOLA S.A.C', 'mariaquispe@gmail.com', 'av. panamerica nro 540455 rios', '2023-02-14 16:23:39', '2025-09-27 15:23:34'),
(12, 'Jorge condor Paulino', '987546254', '987546254', 'CORPORACION SIMEONE S.A.C.', 'jorgecondor@gmail.com', 'Av. El Polo El Club Santa María de Huachipa Lima15', '2025-07-09 11:39:25', '2025-09-27 15:22:37');

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
(3, 'VENDEDOR', '2023-01-23 19:11:28', '2023-01-23 20:13:35');

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
(1, 'Ayque Yareta Roger', 'ayqueyareta@gmail.com', '$2y$10$anRXVDruHsu8Py5A/oImjO30tthPh4TLCj7zh2D84Rm9tXD5B25YG', '', 1, '2023-01-24 15:16:01', '2025-09-30 11:35:54'),
(3, 'Jhon Anco Galvez', 'jhonanco@gmail.com', '$2y$10$RVxD4fWMzuFTq9YVngkQneXL1wPGGE4QmWV4OI6xrZHv2VIAyiWBK', '', 1, '2025-06-02 11:40:14', '2025-09-27 15:19:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

CREATE TABLE `tb_ventas` (
  `id_venta` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total_pagado` decimal(10,2) DEFAULT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_ventas`
--

INSERT INTO `tb_ventas` (`id_venta`, `nro_venta`, `id_cliente`, `total_pagado`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(26, 1, 1, 21.50, '2025-11-04 15:08:25', '2025-11-04 15:08:25'),
(27, 2, 3, 21.60, '2025-11-04 15:09:08', '2025-11-04 15:09:08');

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
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
