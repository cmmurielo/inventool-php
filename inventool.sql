-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-09-2022 a las 02:11:46
-- Versión del servidor: 8.0.30-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventool`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int UNSIGNED NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`) VALUES
(1666, 'Accesorios Destornilladores Eléctricos'),
(1667, 'Sierras Eléctricas y Accesorios'),
(1668, 'Sierras Circulares y Sable'),
(1669, 'Herramientas Eléctricas e Inalámbricas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `documento` bigint UNSIGNED NOT NULL,
  `tipoDocumento` enum('CC','CE','PAP','NIP','NIT','TI') NOT NULL,
  `tipoPersona` enum('NATURAL','JURIDICA') NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`documento`, `tipoDocumento`, `tipoPersona`, `nombre`, `apellido`, `telefono`, `email`, `ciudad`, `direccion`) VALUES
(93412419, 'CC', 'NATURAL', 'GERMAN EDUARDO', 'HOMEZ RODRIGUEZ', '3103325336', 'gehomez@misena.edu.co', 'SIBATé', 'CARRERA 9 # 10-55'),
(1053808142, 'CC', 'NATURAL', 'LUISA FERNANDA', 'BUCURU', '3134351212', 'lfbucuru@mail.com', 'MANIZALES', 'CRA 35 # 105 - 87'),
(1053812639, 'CC', 'NATURAL', 'CARLOS MARIO', 'MURIEL GALVIS', '3117766871', 'cmmurielo@gmail.com', 'DOSQUEBRADAS', 'MZ D CS 8, ALTOS DE LA SOLEDAD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `factura_id` bigint UNSIGNED NOT NULL,
  `producto_codigo` bigint UNSIGNED NOT NULL,
  `cantidad` int NOT NULL,
  `descuento` int UNSIGNED NOT NULL DEFAULT '0',
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`factura_id`, `producto_codigo`, `cantidad`, `descuento`, `valor`) VALUES
(10000001, 268413, 1, 5, 53105),
(10000002, 268413, 1, 0, 55900);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `factura_id` bigint UNSIGNED NOT NULL,
  `fechaFactura` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_documento` bigint UNSIGNED NOT NULL,
  `usuarios_usuario` varchar(16) NOT NULL,
  `valor` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`factura_id`, `fechaFactura`, `cliente_documento`, `usuarios_usuario`, `valor`) VALUES
(10000000, '2022-08-21 18:28:32', 1053812639, 'admin', 0),
(10000001, '2022-08-21 22:14:15', 1053812639, 'admin', 55900),
(10000002, '2022-08-28 19:03:28', 93412419, 'admin', 55900);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil_id` int NOT NULL,
  `nombre` enum('ADMIN','VENDEDOR','GERENTE','INVENTARIO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`perfil_id`, `nombre`) VALUES
(1, 'ADMIN'),
(2, 'VENDEDOR'),
(3, 'INVENTARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_codigo` bigint UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `costo` float NOT NULL,
  `saldoBodega` int NOT NULL,
  `cantidadMinima` int NOT NULL,
  `cantidadMaxima` int NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `categoria_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_codigo`, `nombre`, `descripcion`, `costo`, `saldoBodega`, `cantidadMinima`, `cantidadMaxima`, `imagen`, `categoria_id`) VALUES
(268413, 'Set Puntas Touch Case 18 Piezas Ref DW2174', 'Incluye: 18 piezas - (1) Guía magnética compacta - (3) puntas de 3-1/2 pulgadas: Cruz #1 y #2, Cuadrada SQ\" - (6) Puntas de 2 pulgadas: Cruz #2 (5 piezas), Cuadrada SQ2 - (8) Puntas de 1 pulgada: Cruz #1, #2 (2 piezas) y #3, Plana SL8 (2 piezas), Cuadrada SQ2 (2 piezas) - Estuche Plástico', 55900, 3, 2, 10, '268413.jpg', 1666),
(543292, 'SIERRA CIRCULAR 7-1/4-PULG 20V SIN BATERíA DEWALT', 'Sierra Circular 7-1/4-pulg 20V Sin Batería Dewalt | Herramientas y Maquinarias\r\n', 989000, 2, 1, 5, '543292.jpg', 1667);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `producto_codigo` bigint UNSIGNED NOT NULL,
  `proveedor_documento` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `producto_proveedor`
--

INSERT INTO `producto_proveedor` (`producto_codigo`, `proveedor_documento`) VALUES
(268413, 8914088230),
(543292, 9013382970);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `documento` bigint UNSIGNED NOT NULL,
  `tipoDocumento` enum('CC','CE','PAP','NIP','NIT','TI') NOT NULL,
  `tipoPersona` enum('NATURAL','JURIDICA') NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `estado` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`documento`, `tipoDocumento`, `tipoPersona`, `nombre`, `telefono`, `email`, `ciudad`, `direccion`, `estado`) VALUES
(8914088230, 'NIT', 'JURIDICA', ' NORMARH S A S', '6063363365', 'mail@mail.com', 'PEREIRA', 'AV 30 DE AGOSTO 37 65 , PEREIRA, RISARALDA', 1),
(9013382970, 'NIT', 'NATURAL', 'MULTIEQUIPOS EL PROVEEDOR SAS', '313 2749600', 'mail1@mail.com', 'BOGOTÁ', 'CL. 11 #14-62', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(16) NOT NULL,
  `contrasena` varchar(256) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `perfil_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasena`, `nombre`, `apellido`, `perfil_id`) VALUES
('admin', '$2y$10$4g5g7hT9N4zb.zvsIzDl/uwuueq9sI0ndNTGhbQIpY6AvLDvyjPFG', 'USUARIO ADMINISTRADOR', '', 1),
('inventario', '$2y$10$xwnmm3l38sH5G0XvxD8KYuHABij2kocFOUtsqkBo1IAJtMZtGmDsO', 'USUARIO INVENTARIO', '', 3),
('ventas', '$2y$10$WajwmWN5CtU3qi9B3.V9eucqSIDru0zaHj5jBhor8DaQeN7dMrlae', 'USUARIO VENTAS', '', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD KEY `fk_detalle_factura_facturas1_idx` (`factura_id`),
  ADD KEY `fk_detalle_factura_productos1_idx` (`producto_codigo`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`factura_id`),
  ADD UNIQUE KEY `id_factura_UNIQUE` (`factura_id`),
  ADD KEY `fk_facturas_clientes1_idx` (`cliente_documento`),
  ADD KEY `fk_facturas_usuarios1_idx` (`usuarios_usuario`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`perfil_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_codigo`),
  ADD UNIQUE KEY `codigo_UNIQUE` (`producto_codigo`),
  ADD KEY `fk_categorias_id_categoria_idx` (`categoria_id`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD PRIMARY KEY (`producto_codigo`,`proveedor_documento`),
  ADD KEY `fk_producto_proveedor_productos1_idx` (`producto_codigo`),
  ADD KEY `fk_producto_proveedor_proveedores1_idx` (`proveedor_documento`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`documento`),
  ADD UNIQUE KEY `documento_UNIQUE` (`documento`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`),
  ADD UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  ADD KEY `fk_usuario_perfil_idx` (`perfil_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1670;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `perfil_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `fk_detalle_factura_facturas1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`factura_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_factura_productos1` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`producto_codigo`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_clientes1` FOREIGN KEY (`cliente_documento`) REFERENCES `clientes` (`documento`),
  ADD CONSTRAINT `fk_facturas_usuarios1` FOREIGN KEY (`usuarios_usuario`) REFERENCES `usuarios` (`usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categorias_id_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `fk_producto_proveedor_productos1` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`producto_codigo`),
  ADD CONSTRAINT `fk_producto_proveedor_proveedores1` FOREIGN KEY (`proveedor_documento`) REFERENCES `proveedores` (`documento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`perfil_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
