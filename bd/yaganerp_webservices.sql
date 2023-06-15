-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2023 a las 19:25:32
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yaganerp_webservices`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_categoria`
--

CREATE TABLE `anula_categoria` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_productos`
--

CREATE TABLE `anula_productos` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(45) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `anulado_por` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_turnos`
--

CREATE TABLE `anula_turnos` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `anulado_por` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_ventas`
--

CREATE TABLE `anula_ventas` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(45) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `anulado_por` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizacion`
--

CREATE TABLE `autorizacion` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambio_mesa`
--

CREATE TABLE `cambio_mesa` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `correlativo` int(5) NOT NULL,
  `cambio_por` varchar(45) NOT NULL,
  `fecha_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(5) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `nombre_cat` varchar(45) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `creado_por` varchar(45) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_caja`
--

CREATE TABLE `cierre_caja` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `piso` varchar(45) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `creado_por` varchar(5) NOT NULL,
  `desde` datetime NOT NULL,
  `hasta` datetime DEFAULT NULL,
  `estado` varchar(5) NOT NULL,
  `valor_neto` varchar(145) NOT NULL,
  `propina` varchar(145) NOT NULL,
  `valor_total` varchar(145) NOT NULL,
  `fecha_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `nom_fantasia` varchar(45) NOT NULL,
  `razon_social` varchar(45) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `rut`, `nom_fantasia`, `razon_social`, `direccion`, `correo`, `telefono`) VALUES
(1, '1', '19150634-0', 'Restaurant de prueba', 'Prueba S.A.', 'Camping Playa Werner 0000', 'claudiowernern@hotmail.com', '+56978841411');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) DEFAULT NULL,
  `nombre_convenio` varchar(45) DEFAULT NULL,
  `estado` char(5) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativo`
--

CREATE TABLE `correlativo` (
  `id` int(11) NOT NULL,
  `correlativo` int(11) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `mesa` varchar(25) NOT NULL,
  `nom_mesa` varchar(45) NOT NULL,
  `piso` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `tipo_venta` varchar(5) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `propina` varchar(45) NOT NULL,
  `boleta` varchar(50) NOT NULL,
  `forma_pago` int(11) NOT NULL,
  `id_cierre` varchar(5) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_convenios`
--

CREATE TABLE `detalle_convenios` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) DEFAULT NULL,
  `id_convenio` int(5) DEFAULT NULL,
  `usuario_convenio` varchar(12) DEFAULT NULL,
  `id_venta` int(5) DEFAULT NULL,
  `monto_consumido` int(10) DEFAULT NULL,
  ` fecha_registro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `num_mesa` varchar(15) NOT NULL,
  `nom_mesa` varchar(45) NOT NULL,
  `piso` varchar(45) NOT NULL,
  `ubicacion` varchar(5) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `creado_por` varchar(45) NOT NULL,
  `estado_gral` varchar(5) NOT NULL,
  `estado_pedido` varchar(5) NOT NULL,
  `fecha_reg` date NOT NULL,
  `unificada` varchar(5) NOT NULL DEFAULT 'N',
  `fecha_unificacion` date NOT NULL,
  `quien_unifico` varchar(5) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `id_cl`, `usuario`, `num_mesa`, `nom_mesa`, `piso`, `ubicacion`, `estado`, `creado_por`, `estado_gral`, `estado_pedido`, `fecha_reg`, `unificada`, `fecha_unificacion`, `quien_unifico`) VALUES
(1, '1', '1', '1', 'M01', '1', '1', 'S', '1', 'A', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(2, '1', '1', '2', 'M02', '1', '1', 'S', '1', 'A', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(3, '1', '1', '3', 'M03', '1', '1', 'S', '1', 'S', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(4, '1', '1', '1', 'M01', '1', '2', 'S', '1', 'S', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(5, '1', '1', '2', 'M02', '1', '2', 'S', '1', 'S', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(6, '1', '1', '3', 'M03', '1', '2', 'S', '1', 'S', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(7, '1', '1', '1', 'M01', '1', '3', 'S', '1', 'S', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(8, '1', '1', '2', 'M02', '1', '3', 'S', '1', 'S', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(9, '1', '1', '3', 'M03', '1', '3', 'S', '1', 'S', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(10, '1', '1', '4', 'M04', '1', '3', 'S', '1', 'S', 'S', '2023-04-21', 'N', '0000-00-00', '0'),
(11, '1', '1', '4', 'M04', '1', '1', 'S', '1', 'S', 'S', '2023-05-06', 'N', '0000-00-00', '0'),
(12, '1', '1', '5', 'M05', '1', '1', 'S', '1', 'S', 'S', '2023-05-06', 'N', '0000-00-00', '0'),
(13, '1', '1', '6', 'M06', '1', '1', 'S', '1', 'S', 'S', '2023-05-06', 'N', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa_unificada`
--

CREATE TABLE `mesa_unificada` (
  `id` int(11) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `usuario` int(5) NOT NULL,
  `num_mesa` int(5) NOT NULL,
  `unificada_con` int(5) NOT NULL,
  `ubicacion` int(5) NOT NULL,
  `creado_por` int(5) NOT NULL,
  `estado_gral` varchar(5) NOT NULL,
  `estado_pedido` varchar(5) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id` int(11) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `nombre_metodo_pago` varchar(45) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id`, `id_cl`, `nombre_metodo_pago`, `estado`) VALUES
(1, 0, 'Efectivo', 'S'),
(2, 0, 'Tarj. Crédito', 'S'),
(3, 0, 'Tarj. Débito', 'S'),
(4, 1, 'Convenio', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pisos`
--

CREATE TABLE `pisos` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `creado_por` varchar(45) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 CHECKSUM=1 COLLATE=latin1_swedish_ci DELAY_KEY_WRITE=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(5) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre_prod` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `categoria` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cantidad` int(5) NOT NULL,
  `valor_neto` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor_venta` varchar(7) CHARACTER SET latin2 COLLATE latin2_general_ci NOT NULL,
  `es_acompanamiento` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tiene_acompanamiento` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `comanda_cocina` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `comanda_bar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_minimo_producto`
--

CREATE TABLE `stock_minimo_producto` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `stock_minimo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `stock_minimo_producto`
--

INSERT INTO `stock_minimo_producto` (`id`, `id_cl`, `estado`, `stock_minimo`) VALUES
(2, 1, 'S', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `piso` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N',
  `user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usuario` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `permisos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_convenios`
--

CREATE TABLE `usuarios_convenios` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) DEFAULT NULL,
  `id_convenio` int(5) DEFAULT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `monto_autorizado` int(10) DEFAULT NULL,
  `monto_restante` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `id_caja` varchar(5) NOT NULL,
  `mesa` varchar(25) NOT NULL,
  `nom_mesa` varchar(25) NOT NULL,
  `piso` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `usuario` int(5) NOT NULL,
  `producto` int(5) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `propina` varchar(45) NOT NULL,
  `tipo_venta` varchar(5) NOT NULL,
  `forma_venta` varchar(45) NOT NULL,
  `impreso` varchar(5) NOT NULL,
  `forma_pago` int(11) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `des` varchar(100) NOT NULL,
  `obs` varchar(350) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='								';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anula_categoria`
--
ALTER TABLE `anula_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_productos`
--
ALTER TABLE `anula_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_turnos`
--
ALTER TABLE `anula_turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_ventas`
--
ALTER TABLE `anula_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autorizacion`
--
ALTER TABLE `autorizacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cambio_mesa`
--
ALTER TABLE `cambio_mesa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_convenios`
--
ALTER TABLE `detalle_convenios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesa_unificada`
--
ALTER TABLE `mesa_unificada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pisos`
--
ALTER TABLE `pisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `stock_minimo_producto`
--
ALTER TABLE `stock_minimo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_convenios`
--
ALTER TABLE `usuarios_convenios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anula_categoria`
--
ALTER TABLE `anula_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anula_productos`
--
ALTER TABLE `anula_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anula_turnos`
--
ALTER TABLE `anula_turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anula_ventas`
--
ALTER TABLE `anula_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autorizacion`
--
ALTER TABLE `autorizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cambio_mesa`
--
ALTER TABLE `cambio_mesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_convenios`
--
ALTER TABLE `detalle_convenios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mesa_unificada`
--
ALTER TABLE `mesa_unificada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pisos`
--
ALTER TABLE `pisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `stock_minimo_producto`
--
ALTER TABLE `stock_minimo_producto`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios_convenios`
--
ALTER TABLE `usuarios_convenios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
