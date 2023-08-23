-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2023 a las 22:56:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webpos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_categoria`
--

CREATE TABLE `anula_categoria` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `anula_categoria`
--

INSERT INTO `anula_categoria` (`id`, `id_cl`, `id_categoria`, `anulado_por`, `fecha`) VALUES
(1, 1, 1, 0, '2023-06-26 14:26:35'),
(2, 1, 1, 0, '2023-06-26 14:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_productos`
--

CREATE TABLE `anula_productos` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anula_productos`
--

INSERT INTO `anula_productos` (`id`, `id_cl`, `id_producto`, `anulado_por`, `fecha`) VALUES
(1, 1, 10, 'Admin', '2023-06-26 14:36:53'),
(2, 1, 1, 'Admin', '2023-06-26 16:35:35'),
(3, 1, 1, 'Admin', '2023-06-27 16:26:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_proveedor`
--

CREATE TABLE `anula_proveedor` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `anulado_por` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anula_proveedor`
--

INSERT INTO `anula_proveedor` (`id`, `id_cl`, `id_proveedor`, `anulado_por`, `fecha`) VALUES
(1, 1, 1, '1', '2023-07-29 00:00:00'),
(2, 1, 1, '1', '2023-07-29 18:48:50'),
(3, 1, 1, '1', '2023-07-29 18:49:42'),
(4, 1, 1, '1', '2023-07-29 18:52:25'),
(5, 1, 4, '1', '2023-07-29 18:52:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_turnos`
--

CREATE TABLE `anula_turnos` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_ventas`
--

CREATE TABLE `anula_ventas` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anula_ventas`
--

INSERT INTO `anula_ventas` (`id`, `id_cl`, `id_venta`, `anulado_por`, `fecha`) VALUES
(1, 1, 4, 'Admin', '2023-08-14 15:27:59'),
(2, 1, 8, 'Admin', '2023-08-14 15:59:48'),
(3, 1, 11, 'Admin', '2023-08-14 16:55:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizacion`
--

CREATE TABLE `autorizacion` (
  `id` int(11) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `clave` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autorizacion`
--

INSERT INTO `autorizacion` (`id`, `id_cl`, `clave`, `estado`) VALUES
(1, '1', '123456', 'N');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `nom_caja` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `id_cl`, `nom_caja`, `estado`, `creado_por`, `fecha_reg`) VALUES
(1, 1, 'C01', 'A', '1', '2023-05-15'),
(2, 1, 'C02', 'S', '1', '2023-05-15'),
(3, 1, 'C03', 'S', '1', '2023-05-15'),
(4, 1, 'C04', 'S', '1', '2023-05-26'),
(5, 1, 'C05', 'S', '1', '2023-06-28'),
(6, 1, 'C06', 'S', '1', '2023-06-28'),
(7, 1, '', 'S', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `nombre_cat` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `id_cl`, `nombre_cat`, `estado`, `creado_por`, `fecha_reg`) VALUES
(1, 1, 'Galletas', 'S', 'Admin', '2023-06-15'),
(2, 1, 'CD', 'S', 'Admin', '2023-06-15'),
(3, 1, 'Vinilo', 'S', 'Admin', '2023-06-15'),
(4, 1, 'Cassette', 'S', 'Admin', '2023-06-15'),
(5, 1, 'Pan', 'S', 'Admin', '2023-06-20'),
(6, 1, 'Golosinas', 'S', 'Admin', '2023-06-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_caja`
--

CREATE TABLE `cierre_caja` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `nombre` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `desde` datetime NOT NULL,
  `hasta` datetime DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor_total` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cierre_caja`
--

INSERT INTO `cierre_caja` (`id`, `id_cl`, `nombre`, `creado_por`, `desde`, `hasta`, `estado`, `valor_total`, `fecha_reg`) VALUES
(1, 1, 'Caja 14-07-2023', '1', '2023-07-14 17:49:04', '2023-07-19 15:28:29', 'C', '165990', '2023-07-14 17:49:04'),
(2, 1, 'Caja 25-07-2023', '1', '2023-07-25 15:36:51', '2023-08-11 00:51:00', 'C', '757770', '2023-07-25 15:36:51'),
(3, 1, 'Caja 11-08-2023', '1', '2023-08-11 10:29:07', '0000-00-00 00:00:00', 'A', '773811', '2023-08-11 10:29:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rut` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) NOT NULL,
  `nom_fantasia` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `razon_social` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `direccion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plan_comprado` int(11) NOT NULL,
  `fecha_pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `rut`, `estado`, `nom_fantasia`, `razon_social`, `direccion`, `correo`, `telefono`, `plan_comprado`, `fecha_pago`) VALUES
(1, 'Claudio Werner', '19150634-0', 'S', 'Supermercado de prueba', 'Prueba S.A.', 'Camping Playa Werner 0000', 'claudiowernern@hotmail.com', '978841411', 2, '2023-08-21'),
(2, 'Maria Cecilia Neira Gomez', '7367889-7', 'N', 'Camping Playa Werner', 'CAMPING WERNER', 'Camping Playa Werner S/N', 'playawerner@gmail.com', '978841411', 0, '2023-08-21'),
(4, 'Claudio Francisco Werner Neira', '4494605-k', 'N', '10', '10', 'Camping Playa Werner S/N', 'claudiowernern@hotmail.com', '652242114', 0, '2023-08-21'),
(5, '', '', 'S', '', '', '', '', '', 0, '0000-00-00'),
(6, '', '', 'S', '', '', '', '', '', 0, '0000-00-00'),
(7, 'Claudio Francisco ', '19150634-0', 'S', 'fantasia', 'fantasia', 'Camping Playa Werner S/N', 'correo', '978841411', 1, '2023-08-22'),
(8, 'Constanza Werner', '19.150.634-0', 'S', '9789625', '9875665', 'Camping Playa Werner S/N', 'playawerner@gmail.com', '978841411', 1, '2023-08-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_negocio`
--

CREATE TABLE `clientes_negocio` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `rut` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes_negocio`
--

INSERT INTO `clientes_negocio` (`id`, `id_cl`, `rut`, `nombre`, `apellido`, `estado`, `creado_por`, `fecha_registro`) VALUES
(1, 1, '19150634-0', 'Claudio Francisco', 'Werner Neira', 'S', 1, '2023-07-25'),
(2, 1, '7367889-7', 'María Cecilia', 'Neira Gomez', 'S', 1, '2023-07-25'),
(3, 1, '18752880-1', 'Constanza Sabina', 'Werner Neira', 'S', 1, '2023-07-25'),
(4, 1, '987', '', '', 'S', 1, '2023-07-26'),
(5, 1, '4494605-k', 'Claudio Federico', 'Werner Hornig', 'S', 1, '2023-07-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativo`
--

CREATE TABLE `correlativo` (
  `id` int(11) NOT NULL,
  `correlativo` int(11) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `caja` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom_caja` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `boleta` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `forma_pago` int(11) NOT NULL,
  `id_cierre` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='	';

--
-- Volcado de datos para la tabla `correlativo`
--

INSERT INTO `correlativo` (`id`, `correlativo`, `id_cl`, `caja`, `nom_caja`, `usuario`, `valor`, `boleta`, `forma_pago`, `id_cierre`, `estado`, `fecha`, `fecha_cierre`) VALUES
(1, 1, 1, '1', 'C01', '1', '26970', '15', 2, '3', 'C', '2023-08-14 13:35:40', '2023-08-14 15:30:02'),
(2, 2, 1, '1', 'C01', '1', '44951', '15', 2, '3', 'C', '2023-08-14 13:57:17', '2023-08-14 15:29:41'),
(3, 3, 1, '1', 'C01', '1', '175000', '15', 3, '3', 'C', '2023-08-14 14:00:21', '2023-08-14 15:29:21'),
(4, 4, 1, '1', 'C01', '1', '59960', '13', 3, '3', 'N', '2023-08-14 14:03:15', '2023-08-14 15:27:59'),
(5, 5, 1, '1', 'C01', '1', '35000', '12', 2, '3', 'C', '2023-08-14 14:13:34', '2023-08-14 15:27:00'),
(6, 6, 1, '1', 'C01', '1', '29980', '16', 2, '3', 'C', '2023-08-14 15:27:59', '2023-08-14 15:57:32'),
(7, 7, 1, '2', 'C02', '1', '140000', '17', 2, '3', 'C', '2023-08-14 15:58:47', '2023-08-14 15:59:03'),
(8, 8, 1, '1', 'C01', '1', '0', '17', 0, '3', 'N', '2023-08-14 15:59:42', '2023-08-14 15:59:48'),
(9, 9, 1, '1', 'C01', '1', '29980', '21', 2, '3', 'C', '2023-08-14 15:59:48', '2023-08-14 16:33:58'),
(10, 10, 1, '1', 'C01', '1', '35000', '21', 2, '3', 'C', '2023-08-14 16:01:37', '2023-08-14 16:34:22'),
(11, 11, 1, '1', 'C01', '1', '0', '24', 1, '3', 'N', '2023-08-14 16:47:41', '2023-08-14 16:55:23'),
(12, 12, 1, '1', 'C01', '1', '12000', '40', 1, '3', 'C', '2023-08-14 16:55:25', '2023-08-14 18:18:18'),
(13, 13, 1, '2', 'C02', '1', '0', '40', 0, '3', 'A', '2023-08-15 18:24:55', '0000-00-00 00:00:00'),
(14, 14, 1, '2', 'C02', '1', '44970', '41', 3, '3', 'C', '2023-08-15 18:25:18', '2023-08-14 18:29:34'),
(15, 15, 1, '2', 'C02', '1', '70000', '44', 2, '3', 'C', '2023-08-15 18:30:29', '2023-08-14 19:10:15'),
(16, 16, 1, '1', 'C01', '1', '0', '44', 0, '3', 'A', '2023-08-15 19:10:20', '0000-00-00 00:00:00'),
(17, 17, 1, '2', 'C02', '1', '0', '44', 0, '3', 'A', '2023-08-15 19:10:44', '0000-00-00 00:00:00'),
(18, 18, 1, '2', 'C02', '1', '0', '44', 0, '3', 'A', '2023-08-15 19:26:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_corrientes`
--

CREATE TABLE `cuentas_corrientes` (
  `id` int(5) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `rut` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_venta` int(5) NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `cuentas_corrientescol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `nombre_metodo_pago` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id`, `id_cl`, `nombre_metodo_pago`, `estado`) VALUES
(1, 0, 'Efectivo', 'S'),
(2, 0, 'Tarj. Crédito', 'S'),
(3, 0, 'Tarj. Débito', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `id_proveedor` int(5) NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_cl`, `id_proveedor`, `estado`, `creado_por`, `fecha_registro`) VALUES
(1, 1, 5, 'C', 1, '2023-08-07'),
(2, 1, 1, 'C', 1, '2023-08-07'),
(3, 1, 4, 'C', 1, '2023-08-07'),
(4, 1, 4, 'C', 1, '2023-08-07'),
(5, 1, 1, 'C', 1, '2023-08-07'),
(6, 1, 4, 'C', 1, '2023-08-07'),
(7, 1, 3, 'A', 1, '2023-08-07'),
(8, 1, 5, 'A', 1, '2023-08-08'),
(9, 1, 2, 'C', 1, '2023-08-08'),
(10, 1, 5, 'C', 1, '2023-08-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalle`
--

CREATE TABLE `pedidos_detalle` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `id_pedido` int(5) NOT NULL,
  `producto` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int(5) NOT NULL,
  `valor` int(9) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos_detalle`
--

INSERT INTO `pedidos_detalle` (`id`, `id_cl`, `id_pedido`, `producto`, `cantidad`, `valor`, `fecha_reg`) VALUES
(50, 1, 1, 'Chocolate', 1, 5000, '2023-08-07'),
(60, 1, 6, 'Cola de tigre', 10, 2000, '2023-08-07'),
(62, 1, 2, 'Crazy Frambuesa', 1, 12000, '2023-08-07'),
(63, 1, 2, 'Mega ', 1, 12000, '2023-08-07'),
(65, 1, 2, 'Iron Maiden', 1, 13000, '2023-08-07'),
(66, 1, 2, 'maxibom', 1, 12000, '2023-08-07'),
(67, 1, 1, 'jajajaja', 1, 1000, '2023-08-07'),
(68, 1, 1, 'qwe', 1, 1000, '2023-08-07'),
(70, 1, 1, 'Memoria Ram Kingston ', 1, 35990, '2023-08-08'),
(71, 1, 1, '123', 1, 1000, '2023-08-08'),
(72, 1, 1, '123', 1, 1000, '2023-08-08'),
(73, 1, 1, '123', 1, 1000, '2023-08-08'),
(74, 1, 1, '123', 1, 1000, '2023-08-08'),
(75, 1, 3, '123', 123, 1000, '2023-08-08'),
(76, 1, 3, '234', 123, 1000, '2023-08-08'),
(77, 1, 1, '123', 1, 1000, '2023-08-08'),
(79, 1, 9, 'Chocolito', 5, 12590, '2023-08-08'),
(80, 1, 10, 'Cascos de segutidad', 1, 12000, '2023-08-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) NOT NULL,
  `usuarios` int(5) NOT NULL,
  `cajas` int(5) NOT NULL,
  `valor` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre`, `estado`, `usuarios`, `cajas`, `valor`) VALUES
(1, 'Plan 3 usuarios + 3 cajas', 'S', 5, 5, 19990),
(2, 'Plan 1 usuario + 5 cajas', 'S', 1, 5, 20990),
(3, 'Plan 3 usuarios + 3 cajas', 'S', 3, 3, 30000),
(4, 'Plan 4 usuarios + 4 cajas', 'S', 4, 4, 21500),
(5, 'Plan 5 usuarios + 5 cajas', 'S', 5, 5, 30000),
(6, 'Plan 6 usuarios + 6 cajas', 'S', 6, 6, 20000),
(7, '', 'N', 0, 0, 0),
(8, '', 'N', 0, 0, 0),
(9, '', 'N', 0, 0, 0),
(10, '', 'N', 0, 0, 0),
(11, '', 'S', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(5) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `codigo_barra` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nombre_prod` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `categoria` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cantidad` int(5) NOT NULL,
  `pesaje` varchar(5) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `unidad_medida` int(5) DEFAULT NULL,
  `valor_neto` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor_venta` varchar(7) CHARACTER SET latin2 COLLATE latin2_general_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `id_cl`, `codigo_barra`, `nombre_prod`, `categoria`, `cantidad`, `pesaje`, `unidad_medida`, `valor_neto`, `valor_venta`, `estado`, `creado_por`, `fecha_reg`) VALUES
(1, '1', '840705109369', 'Foo Fighters - Glasstonbury 2017 - pt2', '3', -5, 'N', 1, '15000', '27000', 'S', '1', '2023-06-15'),
(2, '1', '7804612579427', '31 Minutos - 31 canciones de amor - 2012', '2', -90, 'N', 1, '3600', '8990', 'S', '1', '2023-06-15'),
(3, '1', '2292547192', 'Luis Miguel - Soy Como Quiero Ser', '2', -1, 'N', 1, '5000', '9990', 'S', '1', '2023-06-16'),
(4, '1', '5099747618642', 'Los Tres - Fome', '4', -166, 'N', 1, '20000', '35000', 'S', '1', '2023-06-16'),
(5, '1', '5099747609640', 'Los Tres - Unplugged', '4', 36, 'N', 1, '20000', '35000', 'S', '1', '2023-06-16'),
(6, '1', '886971408027', 'Soda Stereo - Último Concierto A', '2', 16, 'N', 1, '10000', '14990', 'S', '1', '2023-06-17'),
(7, '1', '886971408126', 'Soda Stereo - Último Concierto B', '2', 92, 'N', 1, '10000', '14990', 'S', '1', '2023-06-17'),
(8, '1', '7804612579434', '31 Minutos - Ratoncitos - 2012', '2', 72, 'N', 1, '5000', '8990', 'S', '1', '2023-06-17'),
(9, '1', '00000000000000', 'Pan', '5', 13, 'S', 2, '3500', '3500', 'S', '1', '2023-06-20'),
(16, '1', '7802800521135', 'Te Orjas', '4', 99, 'N', 1, '2500', '3000', 'S', '1', '2023-06-30'),
(17, '1', '720642442029', 'Guns n Roses - Use Your Illusion II ', '2', 89, 'N', 1, '5500', '11000', 'S', '1', '2023-07-03'),
(18, '1', '7808226007529', 'Difuntos Correa - Ilusionismo', '2', 75, 'N', 1, '12000', '18000', 'S', '1', '2023-07-03'),
(19, '1', '', 'plátano', '6', 100, 'S', 2, '2300', '2300', 'S', '1', '2023-07-15'),
(20, '1', '', 'Equipo de Música', '6', 0, 'N', 1, '100000', '150000', 'S', '1', '2023-07-28'),
(21, '1', '', '', '', 0, '', 0, '', '', 'S', '1', '2023-07-28'),
(22, '1', '', '', '', 0, '', 0, '', '', 'S', '1', '2023-07-28'),
(23, '1', '', '', '', 0, '', 0, '', '', 'S', '1', '2023-07-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `id_cl` int(5) DEFAULT NULL,
  `nombre_proveedor` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rut` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `id_cl`, `nombre_proveedor`, `rut`, `estado`, `fecha_registro`) VALUES
(1, 1, 'Savory', '19150634-0', 'S', '2023-07-28'),
(2, 1, 'Covepa S.A.', '19150634-0', 'S', '2023-07-28'),
(3, 1, 'Evercrisp', '18752880-1', 'S', '2023-07-28'),
(4, 1, 'Maryun S.A.', '4494605-k', 'S', '2023-07-28'),
(5, 1, 'Mella S.A.', '19150634-0', 'S', '2023-07-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_minimo_producto`
--

CREATE TABLE `stock_minimo_producto` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stock_minimo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stock_minimo_producto`
--

INSERT INTO `stock_minimo_producto` (`id`, `id_cl`, `estado`, `stock_minimo`) VALUES
(2, 1, 'S', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_medida`
--

CREATE TABLE `unidades_medida` (
  `id` int(5) NOT NULL,
  `nombre_medida` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidades_medida`
--

INSERT INTO `unidades_medida` (`id`, `nombre_medida`) VALUES
(1, 'Unid'),
(2, 'KG'),
(3, 'mms'),
(4, 'cms'),
(5, 'mts');

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
  `estado` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `permisos` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `user`, `pass`, `tipo_usuario`, `id_cl`, `estado`, `permisos`) VALUES
(1, 'Admin', 'admin1', 'admin1', 1, 1, 'S', '1,2,3,4'),
(2, 'Cajero', 'cajero', 'cajero', 2, 1, 'S', '2,3,4'),
(4, 'Admin', 'admin7', 'admin7', 1, 7, 'S', '1,2,3,4'),
(5, 'Admin', 'admin8', 'admin8', 1, 8, 'S', '1,2,3,4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_caja` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nom_caja` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` int(5) NOT NULL,
  `producto` int(5) NOT NULL,
  `cantidad` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `forma_pago` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `des` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='								';

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_venta`, `id_cl`, `id_caja`, `nom_caja`, `usuario`, `producto`, `cantidad`, `valor`, `estado`, `fecha`, `fecha_pago`, `forma_pago`, `des`) VALUES
(1, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:19:47', '2023-08-14 19:10:15', '0', '0'),
(2, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:19:48', '2023-08-14 19:10:15', '0', '0'),
(3, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:19:49', '2023-08-14 19:10:15', '0', '0'),
(4, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:19:49', '2023-08-14 19:10:15', '0', '0'),
(5, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:58:49', '2023-08-14 19:10:15', '0', '0'),
(6, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:58:52', '2023-08-14 19:10:15', '0', '0'),
(7, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:58:52', '2023-08-14 19:10:15', '0', '0'),
(8, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:58:52', '2023-08-14 19:10:15', '0', '0'),
(9, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:58:53', '2023-08-14 19:10:15', '0', '0'),
(10, 5, '1', '3', 'C01', 1, 4, '1', '35000', 'C', '2023-08-14 14:58:53', '2023-08-14 19:10:15', '0', '0'),
(11, 5, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:26:54', '2023-08-14 19:10:15', '0', '0'),
(12, 4, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:27:27', '2023-08-14 19:10:15', '0', '0'),
(13, 4, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:27:27', '2023-08-14 19:10:15', '0', '0'),
(14, 4, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:27:27', '2023-08-14 19:10:15', '0', '0'),
(15, 4, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:27:27', '2023-08-14 19:10:15', '0', '0'),
(16, 6, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:28:04', '2023-08-14 19:10:15', '0', '0'),
(17, 6, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:28:05', '2023-08-14 19:10:15', '0', '0'),
(18, 3, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:29:16', '2023-08-14 19:10:15', '0', '0'),
(19, 3, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:29:16', '2023-08-14 19:10:15', '0', '0'),
(20, 3, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:29:16', '2023-08-14 19:10:15', '0', '0'),
(21, 3, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:29:16', '2023-08-14 19:10:15', '0', '0'),
(22, 3, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:29:16', '2023-08-14 19:10:15', '0', '0'),
(23, 2, '1', '3', 'C01', 1, 8, '1', '8990', 'C', '2023-08-14 15:29:35', '2023-08-14 19:10:15', '0', '0'),
(24, 2, '1', '3', 'C01', 1, 8, '1', '8990', 'C', '2023-08-14 15:29:35', '2023-08-14 19:10:15', '0', '0'),
(25, 2, '1', '3', 'C01', 1, 8, '1', '8990', 'C', '2023-08-14 15:29:36', '2023-08-14 19:10:15', '0', '0'),
(26, 2, '1', '3', 'C01', 1, 8, '1', '8990', 'C', '2023-08-14 15:29:36', '2023-08-14 19:10:15', '0', '0'),
(27, 2, '1', '3', 'C01', 1, 8, '1', '8990', 'C', '2023-08-14 15:29:36', '2023-08-14 19:10:15', '0', '0'),
(28, 1, '1', '3', 'C01', 1, 8, '1', '8990', 'C', '2023-08-14 15:29:56', '2023-08-14 19:10:15', '0', '0'),
(29, 1, '1', '3', 'C01', 1, 8, '1', '8990', 'C', '2023-08-14 15:29:56', '2023-08-14 19:10:15', '0', '0'),
(30, 1, '1', '3', 'C01', 1, 8, '1', '8990', 'C', '2023-08-14 15:29:56', '2023-08-14 19:10:15', '0', '0'),
(31, 6, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:30:14', '2023-08-14 19:10:15', '0', '0'),
(32, 6, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:30:14', '2023-08-14 19:10:15', '0', '0'),
(33, 6, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:30:15', '2023-08-14 19:10:15', '0', '0'),
(34, 6, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:30:15', '2023-08-14 19:10:15', '0', '0'),
(35, 6, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:30:15', '2023-08-14 19:10:15', '0', '0'),
(36, 6, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 15:30:15', '2023-08-14 19:10:15', '0', '0'),
(37, 6, '1', '3', 'C01', 1, 7, '1', '14990', 'C', '2023-08-14 15:57:26', '2023-08-14 19:10:15', '0', '0'),
(38, 6, '1', '3', 'C01', 1, 7, '1', '14990', 'C', '2023-08-14 15:57:26', '2023-08-14 19:10:15', '0', '0'),
(39, 7, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:58:57', '2023-08-14 19:10:15', '0', '0'),
(40, 7, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:58:57', '2023-08-14 19:10:15', '0', '0'),
(41, 7, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:58:57', '2023-08-14 19:10:15', '0', '0'),
(42, 7, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 15:58:58', '2023-08-14 19:10:15', '0', '0'),
(43, 10, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 16:13:21', '2023-08-14 19:10:15', '0', '0'),
(44, 10, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 16:13:21', '2023-08-14 19:10:15', '0', '0'),
(45, 10, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 16:14:26', '2023-08-14 19:10:15', '0', '0'),
(46, 10, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 16:14:26', '2023-08-14 19:10:15', '0', '0'),
(47, 9, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 16:33:53', '2023-08-14 19:10:15', '0', '0'),
(48, 9, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 16:33:53', '2023-08-14 19:10:15', '0', '0'),
(49, 10, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 16:34:17', '2023-08-14 19:10:15', '0', '0'),
(50, 11, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 16:48:38', '2023-08-14 19:10:15', '0', '0'),
(51, 11, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-14 16:48:39', '2023-08-14 19:10:15', '0', '0'),
(52, 11, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-14 16:50:54', '2023-08-14 19:10:15', '0', '0'),
(53, 14, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-15 18:29:28', '2023-08-14 19:10:15', '0', '0'),
(54, 14, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-15 18:29:28', '2023-08-14 19:10:15', '0', '0'),
(55, 14, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-15 18:29:29', '2023-08-14 19:10:15', '0', '0'),
(56, 16, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-15 18:38:40', '2023-08-14 19:10:15', '0', '0'),
(57, 15, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-15 18:38:58', '2023-08-14 19:10:15', '1', '0'),
(58, 15, '1', '3', 'C01', 1, 6, '1', '14990', 'C', '2023-08-15 18:38:59', '2023-08-14 19:10:15', '1', '0'),
(59, 16, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-15 18:41:32', '2023-08-14 19:10:15', '0', '0'),
(60, 15, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-15 18:42:17', '2023-08-14 19:10:15', '1', '0'),
(61, 15, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-15 18:42:18', '2023-08-14 19:10:15', '1', '0'),
(62, 15, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-15 19:10:09', '2023-08-14 19:10:15', '1', '0'),
(63, 15, '1', '3', 'C01', 1, 5, '1', '35000', 'C', '2023-08-15 19:10:09', '2023-08-14 19:10:15', '1', '0'),
(64, 16, '1', '1', 'C01', 1, 9, '1.25', '4375', 'A', '2023-08-15 20:05:49', '0000-00-00 00:00:00', '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anula_categoria`
--
ALTER TABLE `anula_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anula_categoria` (`id_cl`);

--
-- Indices de la tabla `anula_productos`
--
ALTER TABLE `anula_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anula_productos` (`id_cl`);

--
-- Indices de la tabla `anula_proveedor`
--
ALTER TABLE `anula_proveedor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anula_proveedor` (`id_cl`);

--
-- Indices de la tabla `anula_turnos`
--
ALTER TABLE `anula_turnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anula_turnos` (`id_cl`);

--
-- Indices de la tabla `anula_ventas`
--
ALTER TABLE `anula_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anula_ventas` (`id_cl`);

--
-- Indices de la tabla `autorizacion`
--
ALTER TABLE `autorizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cajas` (`id_cl`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorias` (`id_cl`);

--
-- Indices de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cierre_caja` (`id_cl`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes_negocio`
--
ALTER TABLE `clientes_negocio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientes_negocio` (`id_cl`);

--
-- Indices de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_correlativo` (`id_cl`);

--
-- Indices de la tabla `cuentas_corrientes`
--
ALTER TABLE `cuentas_corrientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuentas_corrientes` (`id_cl`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedidos_detalle` (`id_cl`);

--
-- Indices de la tabla `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proveedores` (`id_cl`);

--
-- Indices de la tabla `stock_minimo_producto`
--
ALTER TABLE `stock_minimo_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock_minimo_producto` (`id_cl`);

--
-- Indices de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios` (`id_cl`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `anula_productos`
--
ALTER TABLE `anula_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `anula_proveedor`
--
ALTER TABLE `anula_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `anula_turnos`
--
ALTER TABLE `anula_turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anula_ventas`
--
ALTER TABLE `anula_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `autorizacion`
--
ALTER TABLE `autorizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes_negocio`
--
ALTER TABLE `clientes_negocio`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `stock_minimo_producto`
--
ALTER TABLE `stock_minimo_producto`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anula_categoria`
--
ALTER TABLE `anula_categoria`
  ADD CONSTRAINT `fk_anula_categoria` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `anula_productos`
--
ALTER TABLE `anula_productos`
  ADD CONSTRAINT `fk_anula_productos` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `anula_proveedor`
--
ALTER TABLE `anula_proveedor`
  ADD CONSTRAINT `fk_anula_proveedor` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `anula_turnos`
--
ALTER TABLE `anula_turnos`
  ADD CONSTRAINT `fk_anula_turnos` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `anula_ventas`
--
ALTER TABLE `anula_ventas`
  ADD CONSTRAINT `fk_anula_ventas` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD CONSTRAINT `fk_cajas` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  ADD CONSTRAINT `fk_cierre_caja` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `clientes_negocio`
--
ALTER TABLE `clientes_negocio`
  ADD CONSTRAINT `fk_clientes_negocio` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `correlativo`
--
ALTER TABLE `correlativo`
  ADD CONSTRAINT `fk_correlativo` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `cuentas_corrientes`
--
ALTER TABLE `cuentas_corrientes`
  ADD CONSTRAINT `fk_cuentas_corrientes` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_detalle` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `fk_proveedores` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `stock_minimo_producto`
--
ALTER TABLE `stock_minimo_producto`
  ADD CONSTRAINT `fk_stock_minimo_producto` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios` FOREIGN KEY (`id_cl`) REFERENCES `cliente` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
