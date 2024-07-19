-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-07-2024 a las 00:46:49
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
-- Base de datos: `webpos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_cajas`
--

CREATE TABLE `anula_cajas` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anula_cajas`
--

INSERT INTO `anula_cajas` (`id`, `id_cl`, `id_caja`, `anulado_por`, `fecha`) VALUES
(1, 1, 9, 1, '2024-07-19 18:15:56');

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
(1, 1, 8, 1, '2024-07-19 18:21:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_clientes`
--

CREATE TABLE `anula_clientes` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anula_clientes`
--

INSERT INTO `anula_clientes` (`id`, `id_cl`, `id_cliente`, `anulado_por`, `fecha`) VALUES
(1, 1, 11, 1, '2024-07-19 18:36:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_pedidos`
--

CREATE TABLE `anula_pedidos` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anula_pedidos`
--

INSERT INTO `anula_pedidos` (`id`, `id_cl`, `id_pedido`, `anulado_por`, `fecha`) VALUES
(1, 1, 1, 1, '2024-07-19 18:39:44');

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
(1, 1, 1, '1', '2024-07-12 00:00:00'),
(2, 1, 1, '1', '2024-07-12 00:00:00'),
(3, 1, 5, '1', '2024-07-12 00:00:00'),
(4, 1, 6, '1', '2024-07-12 00:00:00'),
(5, 1, 7, '1', '2024-07-12 00:00:00'),
(6, 1, 8, '1', '2024-07-12 16:57:43'),
(7, 1, 9, '1', '2024-07-12 16:59:29'),
(8, 1, 11, '1', '2024-07-12 17:49:40'),
(9, 1, 64, '1', '2024-07-19 18:18:35'),
(10, 1, 40, '1', '2024-07-19 18:18:47'),
(11, 1, 41, '1', '2024-07-19 18:18:50'),
(12, 1, 42, '1', '2024-07-19 18:18:56'),
(13, 1, 43, '1', '2024-07-19 18:19:00'),
(14, 1, 107, '1', '2024-07-19 18:19:09'),
(15, 1, 45, '1', '2024-07-19 18:19:16'),
(16, 1, 44, '1', '2024-07-19 18:19:21'),
(17, 1, 76, '1', '2024-07-19 18:19:23'),
(18, 1, 100, '1', '2024-07-19 18:19:25'),
(19, 1, 101, '1', '2024-07-19 18:19:28'),
(20, 1, 90, '1', '2024-07-19 18:19:31'),
(21, 1, 47, '1', '2024-07-19 18:19:33'),
(22, 1, 46, '1', '2024-07-19 18:19:37'),
(23, 1, 63, '1', '2024-07-19 18:24:07');

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
(1, 1, 1, '1', '2024-07-02 20:54:09'),
(2, 1, 0, '1', '2024-07-17 00:00:00'),
(3, 1, 2, '1', '2024-07-17 00:00:00'),
(4, 1, 3, '1', '2024-07-17 00:00:00'),
(5, 1, 3, '1', '2024-07-17 00:00:00'),
(6, 1, 5, '1', '2024-07-17 00:00:00'),
(7, 1, 9, '1', '2024-07-17 00:00:00'),
(8, 1, 7, '1', '2024-07-17 00:00:00'),
(9, 1, 6, '1', '2024-07-17 00:00:00'),
(10, 1, 8, '1', '2024-07-17 21:42:13'),
(11, 1, 1, '1', '2024-07-19 18:41:39');

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
-- Estructura de tabla para la tabla `anula_usuario`
--

CREATE TABLE `anula_usuario` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `anulado_por` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `anula_usuario`
--

INSERT INTO `anula_usuario` (`id`, `id_cl`, `id_usuario`, `anulado_por`, `fecha`) VALUES
(1, 1, 14, 1, '2024-07-19'),
(2, 1, 15, 1, '2024-07-19'),
(3, 1, 16, 1, '2024-07-19'),
(4, 1, 17, 1, '2024-07-19'),
(5, 1, 18, 1, '2024-07-19');

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
(1, 1, 4, 'Admin', '2024-06-17 18:28:02'),
(2, 1, 4, 'Admin', '2024-06-17 18:28:06'),
(3, 1, 4, 'Admin', '2024-06-17 18:28:10'),
(4, 1, 20, 'Admin', '2024-06-18 14:31:30'),
(5, 1, 21, 'Admin', '2024-06-18 14:32:42'),
(6, 1, 13, 'Admin', '2024-07-01 14:00:58'),
(7, 1, 13, 'Admin', '2024-07-01 14:01:03'),
(8, 1, 15, 'Admin', '2024-07-01 14:52:35'),
(9, 1, 16, 'Admin', '2024-07-01 15:17:13'),
(10, 1, 16, 'Admin', '2024-07-01 15:17:18'),
(11, 1, 21, 'Admin', '2024-07-01 15:40:00'),
(12, 1, 21, 'Admin', '2024-07-01 15:40:29'),
(13, 1, 22, 'Admin', '2024-07-01 15:46:57'),
(14, 1, 22, 'Admin', '2024-07-01 15:48:11'),
(15, 1, 22, 'Admin', '2024-07-01 15:48:59'),
(16, 1, 26, 'Admin', '2024-07-01 16:22:53'),
(17, 1, 27, 'Admin', '2024-07-01 16:26:53'),
(18, 1, 28, 'Admin', '2024-07-01 16:27:49'),
(19, 1, 25, 'Admin', '2024-07-01 16:27:53'),
(20, 1, 24, 'Admin', '2024-07-01 16:28:09'),
(21, 1, 24, 'Admin', '2024-07-01 16:28:12'),
(22, 1, 29, 'Admin', '2024-07-01 16:28:13'),
(23, 1, 29, 'Admin', '2024-07-01 16:28:15'),
(24, 1, 30, 'Admin', '2024-07-01 16:28:16'),
(25, 1, 30, 'Admin', '2024-07-01 16:28:36'),
(26, 1, 31, 'Admin', '2024-07-01 16:28:54'),
(27, 1, 31, 'Admin', '2024-07-01 16:29:10'),
(28, 1, 32, 'Admin', '2024-07-01 16:29:22'),
(29, 1, 33, 'Admin', '2024-07-01 16:30:10'),
(30, 1, 34, 'Admin', '2024-07-01 16:30:12'),
(31, 1, 35, 'Admin', '2024-07-01 16:30:13');

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
(1, '1', '123', 'N');

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
(1, 1, 'Caja 01', 'N', '1', '2024-05-14'),
(2, 1, 'N', 'N', '1', '2024-06-08'),
(3, 1, 'Caja 03', 'N', '1', '2024-06-08'),
(4, 1, 'Caja 04', 'N', '1', '2024-06-08'),
(5, 1, 'Caja 5', 'N', '1', '2024-06-08'),
(6, 1, 'Caja 02', 'N', '1', '2024-07-08'),
(7, 1, 'Caja 03', 'N', '1', '2024-07-08'),
(8, 1, 'Caja 02', 'A', '1', '2024-07-14'),
(9, 1, 'caja 022', 'N', '1', '2024-07-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `nombre_cat` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `id_cl`, `nombre_cat`, `estado`, `creado_por`, `fecha_reg`) VALUES
(1, 1, 'CD1', 'S', '1', '2024-06-14'),
(2, 1, 'Galletas', 'N', '1', '2024-07-04'),
(3, 1, 'CD', 'N', '1', '2024-07-11'),
(4, 1, '10', 'N', '1', '2024-07-11'),
(5, 1, '105', 'N', '1', '2024-07-11'),
(6, 1, 'Cassette', 'S', '1', '2024-07-11'),
(7, 1, 'Videojuegos', 'S', '1', '2024-07-14'),
(8, 1, 'Categoria de prueba', 'N', '1', '2024-07-20'),
(9, 1, 'asasdasdasdasd', 'S', '1', '2024-07-20');

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
(1, 1, 'Venta de CDs', '1', '2024-05-15 01:36:04', '2024-06-26 04:01:26', 'C', '500', '2024-05-15 01:36:04'),
(2, 1, 'Venta de CDs', '1', '2024-06-25 22:01:46', '2024-07-14 20:08:23', 'C', '900', '2024-06-25 22:01:46'),
(3, 1, 'Venta día 14-07-2024', '1', '2024-07-14 14:09:57', '2024-07-14 20:10:02', 'C', '0', '2024-07-14 14:09:57'),
(4, 1, 'Venta día 14-07-2024 2', '1', '2024-07-14 14:10:24', '0000-00-00 00:00:00', 'A', '0', '2024-07-14 14:10:24');

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
  `giro` int(11) NOT NULL,
  `direccion` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telefono` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `plan_comprado` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `rut`, `estado`, `nom_fantasia`, `razon_social`, `giro`, `direccion`, `correo`, `telefono`, `plan_comprado`, `fecha_pago`, `fecha_registro`) VALUES
(1, 'La Tiendita de Werner', '19150634-0', 'S', 'La Tiendita de Werner', 'Claudio Werner', 11111, 'Camping Playa Werner S/N', 'claudiowernern@hotmail.com', '+56978841411', 1, '2024-05-15', '2024-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_negocio`
--

CREATE TABLE `clientes_negocio` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
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
(1, 1, '7367889-7', 'María Cecilia', 'Neira Gomez', 'N', 1, '2024-07-09'),
(2, 1, '19150634-0', 'Claudio Francisco', 'Werner Neira', 'N', 1, '2024-07-09'),
(3, 1, '18752880-1', 'Constanza Sabina', 'Werner Neira', 'N', 1, '2024-07-09'),
(4, 1, '4494605-k', 'Claudio Federico', 'Werner Hornig', 'N', 1, '2024-07-09'),
(5, 1, '4494605-K', 'Claudio Federico', 'Werner Hornig', 'N', 1, '2024-07-10'),
(6, 1, '18752880-1', 'Constanza Sabina', 'Werner Neira', 'N', 1, '2024-07-10'),
(7, 1, '7367889-7', 'María Cecilia', 'Neira Gomez', 'N', 1, '2024-07-10'),
(8, 1, '19150634-0', 'Claudio Francisco', 'Werner Neira', 'N', 1, '2024-07-10'),
(9, 1, '19150634-0', 'Claudio Francisco', 'Werner Neira', 'S', 1, '2024-07-11'),
(10, 1, '19833559-2', 'Jose', 'Cárdenas', 'N', 1, '2024-07-14'),
(11, 1, '18752880-1', 'Constanza Sabina', 'Werner Neira', 'N', 1, '2024-07-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativo`
--

CREATE TABLE `correlativo` (
  `id` int(11) NOT NULL,
  `correlativo` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `caja` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `boleta` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `forma_pago` int(11) NOT NULL,
  `id_cierre` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='	';

--
-- Volcado de datos para la tabla `correlativo`
--

INSERT INTO `correlativo` (`id`, `correlativo`, `id_cl`, `caja`, `usuario`, `boleta`, `valor`, `forma_pago`, `id_cierre`, `estado`, `fecha`, `fecha_cierre`) VALUES
(1, 1, 1, '1', '1', '1', 1200, 1, '2', 'C', '2024-06-28 12:44:08', '2024-06-28 12:45:34'),
(2, 2, 1, '1', '1', '1', 2000, 1, '2', 'C', '2024-06-28 12:45:43', '2024-06-28 13:17:30'),
(3, 3, 1, '1', '1', '1', 4800, 2, '2', 'C', '2024-06-28 12:47:45', '2024-06-28 14:31:07'),
(4, 4, 1, '1', '1', '1', 2200, 1, '2', 'C', '2024-06-28 12:51:22', '2024-06-28 14:06:40'),
(5, 5, 1, '1', '1', '1', 3000, 1, '2', 'C', '2024-06-28 12:51:28', '2024-06-28 13:17:30'),
(6, 6, 1, '1', '1', '1', 3600, 1, '2', 'C', '2024-06-28 14:32:06', '2024-06-28 14:32:48'),
(7, 7, 1, '1', '1', '1', 4800, 1, '2', 'C', '2024-06-28 14:38:25', '2024-06-28 20:13:58'),
(8, 8, 1, '1', '1', '1', 2400, 1, '2', 'C', '2024-06-28 14:40:51', '2024-06-28 20:13:58'),
(9, 9, 1, '1', '1', '2', 500, 2, '2', 'C', '2024-06-28 14:41:48', '2024-06-28 20:20:06'),
(10, 10, 1, '1', '1', '2', 1200, 1, '2', 'C', '2024-06-29 20:20:06', '2024-06-28 21:05:50'),
(11, 11, 1, '1', '1', '2', 2400, 1, '2', 'C', '2024-06-29 20:20:53', '2024-06-28 21:05:50'),
(12, 12, 1, '1', '1', '2', 4000, 1, '2', 'C', '2024-06-29 20:21:57', '2024-06-28 21:07:02'),
(13, 13, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-06-29 21:05:32', '2024-07-14 20:08:23'),
(14, 14, 1, '1', '1', '2', 400, 1, '2', 'C', '2024-07-01 14:00:59', '2024-07-01 15:37:39'),
(15, 15, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 14:01:03', '2024-07-14 20:08:23'),
(16, 16, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 14:52:35', '2024-07-14 20:08:23'),
(17, 17, 1, '1', '1', '2', 400, 1, '2', 'C', '2024-07-01 15:17:13', '2024-07-01 15:37:39'),
(18, 18, 1, '1', '1', '2', 400, 1, '2', 'C', '2024-07-01 15:17:18', '2024-07-01 15:22:26'),
(19, 19, 1, '1', '1', '2', 800, 1, '2', 'C', '2024-07-01 15:36:57', '2024-07-01 15:37:39'),
(20, 20, 1, '1', '1', '2', 1000, 1, '2', 'C', '2024-07-01 15:39:24', '2024-07-01 15:44:30'),
(21, 21, 1, '1', '1', '2', 1000, 0, '2', 'C', '2024-07-01 15:39:44', '2024-07-01 15:40:29'),
(22, 22, 1, '1', '1', '2', 2000, 3, '2', 'C', '2024-07-01 15:40:00', '2024-07-01 15:48:59'),
(23, 23, 1, '1', '1', '2', 3000, 3, '2', 'C', '2024-07-01 15:40:29', '2024-07-01 15:47:40'),
(24, 24, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 15:46:57', '2024-07-14 20:08:23'),
(25, 25, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 15:48:11', '2024-07-14 20:08:23'),
(26, 26, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 15:48:59', '2024-07-14 20:08:23'),
(27, 27, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:22:53', '2024-07-14 20:08:23'),
(28, 28, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:26:53', '2024-07-14 20:08:23'),
(29, 29, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:28:09', '2024-07-14 20:08:23'),
(30, 30, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:28:13', '2024-07-14 20:08:23'),
(31, 31, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:28:17', '2024-07-14 20:08:23'),
(32, 32, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:28:54', '2024-07-14 20:08:23'),
(33, 33, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:29:22', '2024-07-14 20:08:23'),
(34, 34, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:30:07', '2024-07-14 20:08:23'),
(35, 35, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:30:10', '2024-07-14 20:08:23'),
(36, 36, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:30:12', '2024-07-14 20:08:23'),
(37, 37, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-01 16:30:13', '2024-07-14 20:08:23'),
(38, 38, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-08 16:55:39', '2024-07-14 20:08:23'),
(39, 39, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-09 19:41:53', '2024-07-14 20:08:23'),
(40, 40, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-09 19:41:54', '2024-07-14 20:08:23'),
(41, 1, 0, '1', '', '1', 0, 0, '', 'C', '2024-07-10 19:45:57', '0000-00-00 00:00:00'),
(42, 41, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-10 20:40:43', '2024-07-14 20:08:23'),
(43, 42, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-10 20:40:44', '2024-07-14 20:08:23'),
(44, 43, 1, '1', '1', '2', 20000, 2, '2', 'C', '2024-07-10 20:45:51', '2024-07-10 18:20:40'),
(45, 44, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-10 20:48:50', '2024-07-14 20:08:23'),
(46, 45, 1, '1', '1', '2', 9000, 2, '2', 'C', '2024-07-10 20:50:24', '2024-07-10 19:11:21'),
(47, 46, 1, '1', '1', '2', 2100, 0, '2', 'C', '2024-07-11 18:20:12', '0000-00-00 00:00:00'),
(48, 47, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-11 13:14:57', '2024-07-14 20:08:23'),
(49, 48, 1, '1', '1', '2', 0, 0, '2', 'N', '2024-07-14 14:07:58', '2024-07-14 20:08:23'),
(50, 49, 1, '8', '1', '2', 2800, 1, '4', 'C', '2024-07-14 14:12:05', '2024-07-14 14:15:05'),
(51, 50, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-14 14:12:06', '0000-00-00 00:00:00'),
(52, 51, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:11:50', '0000-00-00 00:00:00'),
(53, 52, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:18:22', '0000-00-00 00:00:00'),
(54, 53, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:24:36', '0000-00-00 00:00:00'),
(55, 54, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:25:26', '0000-00-00 00:00:00'),
(56, 55, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:26:47', '0000-00-00 00:00:00'),
(57, 56, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:27:59', '0000-00-00 00:00:00'),
(58, 57, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:32:30', '0000-00-00 00:00:00'),
(59, 58, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:34:00', '0000-00-00 00:00:00'),
(60, 59, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:34:50', '0000-00-00 00:00:00'),
(61, 60, 1, '8', '1', '2', 0, 0, '4', 'A', '2024-07-19 14:36:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_corriente`
--

CREATE TABLE `cuenta_corriente` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `estado` varchar(4) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta_corriente`
--

INSERT INTO `cuenta_corriente` (`id`, `id_cl`, `rut`, `id_venta`, `estado`, `fecha_registro`) VALUES
(1, 1, '4494605-k', 43, 'C', '2024-07-09'),
(2, 1, '19150634-0', 45, 'N', '2024-07-10'),
(3, 1, '19150634-0', 46, 'A', '2024-07-11'),
(4, 1, '19833559-2', 49, 'N', '2024-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giros`
--

CREATE TABLE `giros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `tributa` int(11) DEFAULT NULL,
  `net` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `giros`
--

INSERT INTO `giros` (`id`, `nombre`, `iva`, `tributa`, `net`) VALUES
(11111, 'CULTIVO DE TRIGO', 1, 1, 1),
(11112, 'CULTIVO DE MAIZ', 1, 1, 1),
(11113, 'CULTIVO DE AVENA', 1, 1, 1),
(11114, 'CULTIVO DE ARROZ', 1, 1, 1),
(11115, 'CULTIVO DE CEBADA', 1, 1, 1),
(11119, 'CULTIVO DE OTROS CEREALES', 1, 1, 1),
(11121, 'CULTIVO FORRAJEROS EN PRADERAS NATURALES', 1, 1, 1),
(11122, 'CULTIVO FORRAJEROS EN PRADERAS MEJORADAS O SEMBRADAS', 1, 1, 1),
(11131, 'CULTIVO DE POROTOS O FRIJOL', 1, 1, 1),
(11132, 'CULTIVO, PRODUCCIÓN DE LUPINO', 1, 1, 1),
(11139, 'CULTIVO DE OTRAS LEGUMBRES', 1, 1, 1),
(11141, 'CULTIVO DE PAPAS', 1, 1, 1),
(11142, 'CULTIVO DE CAMOTES O BATATAS', 1, 1, 1),
(11149, 'CULTIVO DE OTROS TUBÉRCULOS N.C.P', 1, 1, 1),
(11151, 'CULTIVO DE RAPS', 1, 1, 1),
(11152, 'CULTIVO DE MARAVILLA', 1, 1, 1),
(11159, 'CULTIVO DE OTRAS OLEAGINOSAS N.C.P.', 1, 1, 1),
(11160, 'PRODUCCIÓN DE SEMILLAS DE CEREALES, LEGUMBRES, OLEAGINOSAS', 1, 1, 1),
(11191, 'CULTIVO DE REMOLACHA', 1, 1, 1),
(11192, 'CULTIVO DE TABACO', 1, 1, 1),
(11193, 'CULTIVO DE FIBRAS VEGETALES INDUSTRIALES', 1, 1, 1),
(11194, 'CULTIVO DE PLANTAS AROMÁTICAS O MEDICINALES', 1, 1, 1),
(11199, 'OTROS CULTIVOS N.C.P.', 1, 1, 1),
(11211, 'CULTIVO TRADICIONAL DE HORTALIZAS FRESCAS', 1, 1, 1),
(11212, 'CULTIVO DE HORTALIZAS EN INVERNADEROS Y CULTIVOS HIDROPONICOS', 1, 1, 1),
(11213, 'CULTIVO ORGÁNICO DE HORTALIZAS', 1, 1, 1),
(11220, 'CULTIVO DE PLANTAS VIVAS Y PRODUCTOS DE LA FLORICULTURA', 1, 1, 1),
(11230, 'PRODUCCIÓN DE SEMILLAS DE FLORES, PRADOS, FRUTAS Y HORTALIZAS', 1, 1, 1),
(11240, 'PRODUCCIÓN EN VIVEROS; EXCEPTO ESPECIES FORESTALES', 1, 1, 1),
(11250, 'CULTIVO Y RECOLECCIÓN DE HONGOS, TRUFAS Y SAVIA; PRODUCCIÓN DE JARABE DE ARCE DE AZÚCAR Y AZÚCAR', 1, 1, 1),
(11311, 'CULTIVO DE UVA DESTINADA A PRODUCCIÓN DE PISCO Y AGUARDIENTE', 1, 1, 1),
(11312, 'CULTIVO DE UVA DESTINADA A PRODUCCIÓN DE VINO', 1, 1, 1),
(11313, 'CULTIVO DE UVA DE MESA', 1, 1, 1),
(11321, 'CULTIVO DE FRUTALES EN ÁRBOLES O ARBUSTOS CON CICLO DE VIDA MAYOR A UNA TEMPORADA', 1, 1, 1),
(11322, 'CULTIVO DE FRUTALES MENORES EN PLANTAS CON CICLO DE VIDA DE UNA TEMPORADA', 1, 1, 1),
(11330, 'CULTIVO DE PLANTAS CUYAS HOJAS O FRUTAS SE UTILIZAN PARA PREPARAR BEBIDAS', 1, 1, 1),
(11340, 'CULTIVO DE ESPECIAS', 1, 1, 1),
(12111, 'CRÍA DE GANADO BOVINO PARA LA PRODUCCIÓN LECHERA', 1, 1, 1),
(12112, 'CRÍA DE GANADO PARA PRODUCCIÓN DE CARNE, O COMO GANADO REPRODUCTOR', 1, 1, 1),
(12120, 'CRÍA DE GANADO OVINO Y/O EXPLOTACIÓN LANERA', 1, 1, 1),
(12130, 'CRÍA DE EQUINOS (CABALLARES, MULARES)', 1, 1, 1),
(12210, 'CRÍA DE PORCINOS', 1, 1, 1),
(12221, 'CRÍA DE AVES DE CORRAL PARA LA PRODUCCIÓN DE CARNE', 1, 1, 1),
(12222, 'CRÍA DE AVES DE CORRAL PARA LA PRODUCCIÓN DE HUEVOS', 1, 1, 1),
(12223, 'CRÍA DE AVES FINAS O NO TRADICIONALES', 1, 1, 1),
(12230, 'CRÍA DE ANIMALES DOMÉSTICOS; PERROS Y GATOS', 1, 1, 1),
(12240, 'APICULTURA', 1, 1, 1),
(12250, 'RANICULTURA, HELICICULTURA U OTRA ACTIVIDAD CON ANIMALES MENORES O INSECTOS', 1, 1, 1),
(12290, 'OTRAS EXPLOTACIONES DE ANIMALES NO CLASIFICADOS EN OTRA PARTE, INCLUIDO SUS SUBPRODUCTOS', 1, 1, 1),
(13000, 'EXPLOTACIÓN MIXTA', 1, 1, 1),
(14011, 'SERVICIO DE CORTE Y ENFARDADO DE FORRAJE', 1, 1, 1),
(14012, 'SERVICIO DE RECOLECCIÓN, EMPACADO, TRILLA, DESCASCARAMIENTO Y DESGRANE; Y SIMILARES', 1, 1, 1),
(14013, 'SERVICIO DE ROTURACIÓN SIEMBRA Y SIMILARES', 1, 1, 1),
(14014, 'DESTRUCCIÓN DE PLAGAS; PULVERIZACIONES, FUMIGACIONES U OTRAS', 1, 1, 1),
(14015, 'COSECHA, PODA, AMARRE Y LABORES DE ADECUACIÓN DE LA PLANTA U OTRAS', 1, 1, 1),
(14019, 'OTROS SERVICIOS AGRÍCOLAS N.C.P.', 1, 1, 1),
(14021, 'SERVICIOS DE ADIESTRAMIENTO, GUARDERÍA Y CUIDADOS DE MASCOTAS; EXCEPTO ACTIVIDADES VETERINARIAS', 1, 1, 1),
(14022, 'SERVICIOS GANADEROS, EXCEPTO ACTIVIDADES VETERINARIAS', 1, 1, 1),
(15010, 'CAZA DE MAMÍFEROS MARINOS; EXCEPTO BALLENAS', 1, 1, 1),
(15090, 'CAZA ORDINARIA Y MEDIANTE TRAMPAS, Y ACTIVIDADES DE SERVICIOS CONEXAS', 1, 1, 1),
(20010, 'EXPLOTACIÓN DE BOSQUES', 1, 1, 1),
(20020, 'RECOLECCIÓN DE PRODUCTOS FORESTALES SILVESTRES', 1, 1, 1),
(20030, 'EXPLOTACIÓN DE VIVEROS DE ESPECIES FORESTALES', 1, 1, 1),
(20041, 'SERVICIOS DE FORESTACIÓN', 1, 1, 1),
(20042, 'SERVICIOS DE CORTA DE MADERA', 1, 1, 1),
(20043, 'SERVICIOS DE CONTROL DE INCENDIOS FORESTALES', 1, 1, 1),
(20049, 'OTRAS ACTIVIDADES DE SERVICIOS CONEXAS A LA SILVICULTURA N.C.P.', 1, 1, 1),
(51010, 'CULTIVO DE ESPECIES ACUÁTICAS EN CUERPO DE AGUA DULCE', 1, 1, 1),
(51020, 'REPRODUCCIÓN Y CRIANZAS DE PECES MARINOS', 1, 1, 1),
(51030, 'CULTIVO, REPRODUCCIÓN Y CRECIMIENTOS DE VEGETALES ACUÁTICOS', 1, 1, 1),
(51040, 'REPRODUCCIÓN Y CRÍA DE MOLUSCOS Y CRUSTACEOS.', 1, 1, 1),
(51090, 'SERVICIOS RELACIONADOS CON LA ACUICULTURA, NO INCLUYE SERVICIOS PROFESIONALES Y DE EXTRACCIÓN', 1, 1, 1),
(52010, 'PESCA INDUSTRIAL', 1, 1, 1),
(52020, 'ACTIVIDAD PESQUERA DE BARCOS FACTORÍAS', 1, 1, 1),
(52030, 'PESCA ARTESANAL. EXTRACCIÓN DE RECURSOS ACUÁTICOS EN GENERAL; INCLUYE BALLENAS', 1, 1, 1),
(52040, 'RECOLECCIÓN DE PRODUCTOS MARINOS, COMO PERLAS NATURALES, ESPONJAS, CORALES Y ALGAS.', 1, 1, 1),
(52050, 'SERVICIOS RELACIONADOS CON LA PESCA, NO INCLUYE SERVICIOS PROFESIONALES', 1, 1, 1),
(100000, 'EXTRACCIÓN, AGLOMERACIÓN DE CARBÓN DE PIEDRA, LIGNITO Y TURBA', 1, 1, 1),
(111000, 'EXTRACCIÓN DE PETRÓLEO CRUDO Y GAS NATURAL', 1, 1, 1),
(112000, 'ACTIVIDADES DE SERVICIOS RELACIONADAS CON LA EXTRACCIÓN DE PETRÓLEO Y GAS', 1, 1, 1),
(120000, 'EXTRACCIÓN DE MINERALES DE URANIO Y TORIO', 1, 1, 1),
(131000, 'EXTRACCIÓN DE MINERALES DE HIERRO', 1, 1, 1),
(132010, 'EXTRACCIÓN DE ORO Y PLATA', 1, 1, 1),
(132020, 'EXTRACCIÓN DE ZINC Y PLOMO', 1, 1, 1),
(132030, 'EXTRACCIÓN DE MANGANESO', 1, 1, 1),
(132090, 'EXTRACCIÓN DE OTROS MINERALES METALÍFEROS N.C.P.', 1, 1, 1),
(133000, 'EXTRACCIÓN DE COBRE', 1, 1, 1),
(141000, 'EXTRACCIÓN DE PIEDRA, ARENA Y ARCILLA', 1, 1, 1),
(142100, 'EXTRACCIÓN DE NITRATOS Y YODO', 1, 1, 1),
(142200, 'EXTRACCIÓN DE SAL', 1, 1, 1),
(142300, 'EXTRACCIÓN DE LITIO Y CLORUROS, EXCEPTO SAL', 1, 1, 1),
(142900, 'EXPLOTACIÓN DE OTRAS MINAS Y CANTERAS N.C.P.', 1, 1, 1),
(151110, 'PRODUCCIÓN, PROCESAMIENTO DE CARNES ROJAS Y PRODUCTOS CÁRNICOS', 1, 1, 1),
(151120, 'CONSERVACIÓN DE CARNES ROJAS (FRIGORÍFICOS)', 1, 1, 1),
(151130, 'PRODUCCIÓN, PROCESAMIENTO Y CONSERVACIÓN DE CARNES DE AVE Y OTRAS CARNES DISTINTAS A LAS ROJAS', 1, 1, 1),
(151140, 'ELABORACIÓN DE CECINAS, EMBUTIDOS Y CARNES EN CONSERVA.', 1, 1, 1),
(151210, 'PRODUCCIÓN DE HARINA DE PESCADO', 1, 1, 1),
(151221, 'FABRICACIÓN DE PRODUCTOS ENLATADOS DE PESCADO Y MARISCOS', 1, 1, 1),
(151222, 'ELABORACIÓN DE CONGELADOS DE PESCADOS Y MARISCOS', 1, 1, 1),
(151223, 'ELABORACIÓN DE PRODUCTOS AHUMADOS, SALADOS, DESHIDRATADOS Y OTROS PROCESOS SIMILARES', 1, 1, 1),
(151230, 'ELABORACIÓN DE PRODUCTOS EN BASE A VEGETALES ACUÁTICOS', 1, 1, 1),
(151300, 'ELABORACIÓN Y CONSERVACIÓN DE FRUTAS, LEGUMBRES Y HORTALIZAS', 1, 1, 1),
(151410, 'ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN VEGETAL', 1, 1, 1),
(151420, 'ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN ANIMAL, EXCEPTO LAS MANTEQUILLAS', 1, 1, 1),
(151430, 'ELABORACIÓN DE ACEITES Y GRASAS DE ORIGEN MARINO', 1, 1, 1),
(152010, 'ELABORACIÓN DE LECHE, MANTEQUILLA, PRODUCTOS LÁCTEOS Y DERIVADOS', 1, 1, 1),
(152020, 'ELABORACIÓN DE QUESOS', 1, 1, 1),
(152030, 'FABRICACIÓN DE POSTRES A BASE DE LECHE (HELADOS, SORBETES Y OTROS SIMILARES)', 1, 1, 1),
(153110, 'ELABORACIÓN DE HARINAS DE TRIGO', 1, 1, 1),
(153120, 'ACTIVIDADES DE MOLIENDA DE ARROZ', 1, 1, 1),
(153190, 'ELABORACIÓN DE OTRAS MOLINERAS Y ALIMENTOS A BASE DE CEREALES', 1, 1, 1),
(153210, 'ELABORACIÓN DE ALMIDONES Y PRODUCTOS DERIVADOS DEL ALMIDÓN', 1, 1, 1),
(153220, 'ELABORACIÓN DE GLUCOSA Y OTROS AZÚCARES DIFERENTES DE LA REMOLACHA', 1, 1, 1),
(153300, 'ELABORACIÓN DE ALIMENTOS PREPARADOS PARA ANIMALES', 1, 1, 1),
(154110, 'FABRICACIÓN DE PAN, PRODUCTOS DE PANADERÍA Y PASTELERÍA', 1, 1, 1),
(154120, 'FABRICACIÓN DE GALLETAS', 1, 1, 1),
(154200, 'ELABORACIÓN DE AZÚCAR DE REMOLACHA O CANA', 1, 1, 1),
(154310, 'ELABORACIÓN DE CACAO Y CHOCOLATES', 1, 1, 1),
(154320, 'FABRICACIÓN DE PRODUCTOS DE CONFITERÍA', 1, 1, 1),
(154400, 'ELABORACIÓN DE MACARRONES, FIDEOS, ALCUZCUZ Y PRODUCTOS FARINACEOS SIMILARES', 1, 1, 1),
(154910, 'ELABORACIÓN DE TE, CAFÉ, INFUSIONES', 1, 1, 1),
(154920, 'ELABORACIÓN DE LEVADURAS NATURALES O ARTIFICIALES', 1, 1, 1),
(154930, 'ELABORACIÓN DE VINAGRES, MOSTAZAS, MAYONESAS Y CONDIMENTOS EN GENERAL', 1, 1, 1),
(154990, 'ELABORACIÓN DE OTROS PRODUCTOS ALIMENTICIOS NO CLASIFICADOS EN OTRA PARTE', 1, 1, 1),
(155110, 'ELABORACIÓN DE PISCOS (INDUSTRIAS PISQUERAS)', 1, 1, 1),
(155120, 'ELABORACIÓN DE BEBIDAS ALCOHÓLICAS Y DE ALCOHOL ETÍLICO A PARTIR DE SUSTANCIAS FERMENTADAS Y OTROS', 1, 1, 1),
(155200, 'ELABORACIÓN DE VINOS', 1, 1, 1),
(155300, 'ELABORACIÓN DE BEBIDAS MALTEADAS, CERVEZAS Y MALTAS', 1, 1, 1),
(155410, 'ELABORACIÓN DE BEBIDAS NO ALCOHÓLICAS', 1, 1, 1),
(155420, 'ENVASADO DE AGUA MINERAL NATURAL, DE MANANTIAL Y POTABLE PREPARADA', 1, 1, 1),
(155430, 'ELABORACIÓN DE HIELO', 1, 1, 1),
(160010, 'FABRICACIÓN DE CIGARROS Y CIGARRILLOS', 1, 1, 1),
(160090, 'FABRICACIÓN DE OTROS PRODUCTOS DEL TABACO', 1, 1, 1),
(171100, 'PREPARACIÓN DE HILATURA DE FIBRAS TEXTILES; TEJEDURA PROD. TEXTILES', 1, 1, 1),
(171200, 'ACABADO DE PRODUCTOS TEXTIL', 1, 1, 1),
(172100, 'FABRICACIÓN DE ARTÍCULOS CONFECCIONADOS DE MATERIAS TEXTILES, EXCEPTO PRENDAS DE VESTIR', 1, 1, 1),
(172200, 'FABRICACIÓN DE TAPICES Y ALFOMBRA', 1, 1, 1),
(172300, 'FABRICACIÓN DE CUERDAS, CORDELES, BRAMANTES Y REDES', 1, 1, 1),
(172910, 'FABRICACIÓN DE TEJIDOS DE USO INDUSTRIAL COMO TEJIDOS IMPREGNADOS, MOLTOPRENE, BATISTA, ETC.', 1, 1, 1),
(172990, 'FABRICACIÓN DE OTROS PRODUCTOS TEXTILES N.C.P.', 1, 1, 1),
(173000, 'FABRICACIÓN DE TEJIDOS DE PUNTO', 1, 1, 1),
(181010, 'FABRICACIÓN DE PRENDAS DE VESTIR TEXTILES Y SIMILARES', 1, 1, 1),
(181020, 'FABRICACIÓN DE PRENDAS DE VESTIR DE CUERO NATURAL, ARTIFICIAL, PLÁSTICO', 1, 1, 1),
(181030, 'FABRICACIÓN DE ACCESORIOS DE VESTIR', 1, 1, 1),
(181040, 'FABRICACIÓN DE ROPA DE TRABAJO', 1, 1, 1),
(182000, 'ADOBO Y TENIDOS DE PIELES; FABRICACIÓN DE ARTÍCULOS DE PIEL', 1, 1, 1),
(191100, 'CURTIDO Y ADOBO DE CUEROS', 1, 1, 1),
(191200, 'FABRICACIÓN DE MALETAS, BOLSOS DE MANO Y SIMILARES; ARTÍCULOS DE TALABARTERÍA Y GUARNICIONERÍA', 1, 1, 1),
(192000, 'FABRICACIÓN DE CALZADO', 1, 1, 1),
(201000, 'ASERRADO Y ACEPILLADURA DE MADERAS', 1, 1, 1),
(202100, 'FABRICACIÓN DE TABLEROS, PANELES Y HOJAS DE MADERA PARA ENCHAPADO', 1, 1, 1),
(202200, 'FABRICACIÓN DE PARTES Y PIEZAS DE CARPINTERÍA PARA EDIFICIOS Y CONSTRUCCIONES', 1, 1, 1),
(202300, 'FABRICACIÓN DE RECIPIENTES DE MADERA', 1, 1, 1),
(202900, 'FABRICACIÓN DE OTROS PRODUCTOS DE MADERA; ARTÍCULOS DE CORCHO, PAJA Y MATERIALES TRENZABLES', 1, 1, 1),
(210110, 'FABRICACIÓN DE CELULOSA Y OTRAS PASTAS DE MADERA', 1, 1, 1),
(210121, 'FABRICACIÓN DE PAPEL DE PERIÓDICO', 1, 1, 1),
(210129, 'FABRICACIÓN DE PAPEL Y CARTÓN N.C.P.', 1, 1, 1),
(210200, 'FABRICACIÓN DE PAPEL Y CARTÓN ONDULADO Y DE ENVASES DE PAPEL Y CARTÓN', 1, 1, 1),
(210900, 'FABRICACIÓN DE OTROS ARTÍCULOS DE PAPEL Y CARTÓN', 1, 1, 1),
(221101, 'EDICIÓN PRINCIPALMENTE DE LIBROS', 1, 1, 1),
(221109, 'EDICIÓN DE FOLLETOS, PARTITURAS Y OTRAS PUBLICACIONES', 1, 1, 1),
(221200, 'EDICIÓN DE PERIÓDICOS, REVISTAS Y PUBLICACIONES PERIÓDICAS', 1, 1, 1),
(221300, 'EDICIÓN DE GRABACIONES', 1, 1, 1),
(221900, 'OTRAS ACTIVIDADES DE EDICIÓN', 1, 1, 1),
(222101, 'IMPRESIÓN PRINCIPALMENTE DE LIBROS', 1, 1, 1),
(222109, 'OTRAS ACTIVIDADES DE IMPRESIÓN N.C.P.', 1, 1, 1),
(222200, 'ACTIVIDADES DE SERVICIO RELACIONADA CON LA IMPRESIÓN', 1, 1, 1),
(223000, 'REPRODUCCIÓN DE GRABACIONES', 1, 1, 1),
(231000, 'FABRICACIÓN DE PRODUCTOS DE HORNOS COQUE', 1, 1, 1),
(232000, 'FABRICACIÓN DE PRODUCTOS DE REFINACIÓN DE PETRÓLEO', 1, 1, 1),
(233000, 'ELABORACIÓN DE COMBUSTIBLE NUCLEAR', 1, 1, 1),
(241110, 'FABRICACIÓN DE CARBÓN VEGETAL, Y BRIQUETAS DE CARBÓN VEGETAL', 1, 1, 1),
(241190, 'FABRICACIÓN DE SUSTANCIAS QUÍMICAS BÁSICAS, EXCEPTO ABONOS Y COMPUESTOS DE NITRÓGENO', 1, 1, 1),
(241200, 'FABRICACIÓN DE ABONOS Y COMPUESTOS DE NITRÓGENO', 1, 1, 1),
(241300, 'FABRICACIÓN DE PLÁSTICOS EN FORMAS PRIMARIAS Y DE CAUCHO SINTÉTICO', 1, 1, 1),
(242100, 'FABRICACIÓN DE PLAGUICIDAS Y OTROS PRODUCTOS QUÍMICOS DE USO AGROPECUARIO', 1, 1, 1),
(242200, 'FABRICACIÓN DE PINTURAS, BARNICES Y PRODUCTOS DE REVESTIMIENTO SIMILARES', 1, 1, 1),
(242300, 'FABRICACIÓN DE PRODUCTOS FARMACEUTICOS, SUSTANCIAS QUÍMICAS MEDICINALES Y PRODUCTOS BOTÁNICOS', 1, 1, 1),
(242400, 'FABRICACIONES DE JABONES Y DETERGENTES, PREPARADOS PARA LIMPIAR, PERFUMES Y PREPARADOS DE TOCADOR', 1, 1, 1),
(242910, 'FABRICACIÓN DE EXPLOSIVOS Y PRODUCTOS DE PIROTECNIA', 1, 1, 1),
(242990, 'FABRICACIÓN DE OTROS PRODUCTOS QUÍMICOS N.C.P.', 1, 1, 1),
(243000, 'FABRICACIÓN DE FIBRAS MANUFACTURADAS', 1, 1, 1),
(251110, 'FABRICACIÓN DE CUBIERTAS Y CÁMARAS DE CAUCHO', 1, 1, 1),
(251120, 'RECAUCHADO Y RENOVACIÓN DE CUBIERTAS DE CAUCHO', 1, 1, 1),
(251900, 'FABRICACIÓN DE OTROS PRODUCTOS DE CAUCHO', 1, 1, 1),
(252010, 'FABRICACIÓN DE PLANCHAS, LÁMINAS, CINTAS, TIRAS DE PLÁSTICO', 1, 1, 1),
(252020, 'FABRICACIÓN DE TUBOS, MANGUERAS PARA LA CONSTRUCCIÓN', 1, 1, 1),
(252090, 'FABRICACIÓN DE OTROS ARTÍCULOS DE PLÁSTICO', 1, 1, 1),
(261010, 'FABRICACIÓN, MANIPULADO Y TRANSFORMACIÓN DE VIDRIO PLANO', 1, 1, 1),
(261020, 'FABRICACIÓN DE VIDRIO HUECO', 1, 1, 1),
(261030, 'FABRICACIÓN DE FIBRAS DE VIDRIO', 1, 1, 1),
(261090, 'FABRICACIÓN DE ARTÍCULOS DE VIDRIO N.C.P.', 1, 1, 1),
(269101, 'FABRICACIÓN DE PRODUCTOS DE CERÁMICA NO REFRACTARIA PARA USO NO ESTRUCTURAL CON FINES ORNAMENTALES', 1, 1, 1),
(269109, 'FABRICACIÓN DE PRODUCTOS DE CERÁMICA NO REFRACTARIA PARA USO NO ESTRUCTURAL N.C.P.', 1, 1, 1),
(269200, 'FABRICACIÓN DE PRODUCTOS DE CERÁMICAS REFRACTARIA', 1, 1, 1),
(269300, 'FABRICACIÓN DE PRODUCTOS DE ARCILLA Y CERÁMICAS NO REFRACTARIAS PARA USO ESTRUCTURAL', 1, 1, 1),
(269400, 'FABRICACIÓN DE CEMENTO, CAL Y YESO', 1, 1, 1),
(269510, 'ELABORACIÓN DE HORMIGÓN, ARTÍCULOS DE HORMIGÓN Y MORTERO (MEZCLA PARA CONSTRUCCIÓN)', 1, 1, 1),
(269520, 'FABRICACIÓN DE PRODUCTOS DE FIBROCEMENTO Y ASBESTOCEMENTO', 1, 1, 1),
(269530, 'FABRICACIÓN DE PANELES DE YESO PARA LA CONSTRUCCIÓN', 1, 1, 1),
(269590, 'FABRICACIÓN DE ARTÍCULOS DE CEMENTO Y YESO N.C.P.', 1, 1, 1),
(269600, 'CORTE, TALLADO Y ACABADO DE LA PIEDRA', 1, 1, 1),
(269910, 'FABRICACIÓN DE MEZCLAS BITUMINOSAS A BASE DE ASFALTO, DE BETUNES NATURALES, Y PRODUCTOS SIMILARES', 1, 1, 1),
(269990, 'FABRICACIÓN DE OTROS PRODUCTOS MINERALES NO METÁLICOS N.C.P', 1, 1, 1),
(271000, 'INDUSTRIAS BASICAS DE HIERRO Y ACERO', 1, 1, 1),
(272010, 'ELABORACIÓN DE PRODUCTOS DE COBRE EN FORMAS PRIMARIAS.', 1, 1, 1),
(272020, 'ELABORACIÓN DE PRODUCTOS DE ALUMINIO EN FORMAS PRIMARIAS', 1, 1, 1),
(272090, 'FABRICACIÓN DE PRODUCTOS PRIMARIOS DE METALES PRECIOSOS Y DE OTROS METALES NO FERROSOS N.C.P.', 1, 1, 1),
(273100, 'FUNDICIÓN DE HIERRO Y ACERO', 1, 1, 1),
(273200, 'FUNDICIÓN DE METALES NO FERROSOS', 1, 1, 1),
(281100, 'FABRICACIÓN DE PRODUCTOS METÁLICOS DE USO ESTRUCTURAL', 1, 1, 1),
(281211, 'FABRICACIÓN DE RECIPIENTES DE GAS COMPRIMIDO O LICUADO', 1, 1, 1),
(281219, 'FABRICACIÓN DE TANQUES, DEPÓSITOS Y RECIPIENTES DE METAL N.C.P.', 1, 1, 1),
(281280, 'REPARACIÓN DE TANQUES, DEPÓSITOS Y RECIPIENTES DE METAL', 1, 1, 1),
(281310, 'FABRICACIÓN DE GENERADORES DE VAPOR, EXCEPTO CALDERAS DE AGUA CALIENTE PARA CALEFACCIÓN', 1, 1, 1),
(281380, 'REPARACIÓN DE GENERADORES DE VAPOR, EXCEPTO CALDERAS DE AGUA CALIENTE PARA CALEFACCIÓN CENTRAL', 1, 1, 1),
(289100, 'FORJA, PRENSADO, ESTAMPADO Y LAMINADO DE METAL; INCLUYE PULVIMETALURGIA', 1, 1, 1),
(289200, 'TRATAMIENTOS Y REVESTIMIENTOS DE METALES; OBRAS DE INGENIERÍA MECÁNICA EN GENERAL', 1, 1, 1),
(289310, 'FABRICACIÓN DE ARTÍCULOS DE CUCHILLERÍA', 1, 1, 1),
(289320, 'FABRICACIÓN DE HERRAMIENTAS DE MANO Y ARTÍCULOS DE FERRETERÍA', 1, 1, 1),
(289910, 'FABRICACIÓN DE CABLES, ALAMBRES Y PRODUCTOS DE ALAMBRE', 1, 1, 1),
(289990, 'FABRICACIÓN DE OTROS PRODUCTOS ELABORADOS DE METAL N.C.P.', 1, 1, 1),
(291110, 'FABRICACIÓN DE MOTORES Y TURBINAS, EXCEPTO PARA AERONAVES, VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS', 1, 1, 1),
(291180, 'REPARACIÓN DE MOTORES Y TURBINAS, EXCEPTO PARA AERONAVES, VEHÍCULOS AUTOMOTORES Y MOTOCICLETAS', 1, 1, 1),
(291210, 'FABRICACIÓN DE BOMBAS, GRIFOS, VÁLVULAS, COMPRESORES, SISTEMAS HIDRÁULICOS', 1, 1, 1),
(291280, 'REPARACIÓN DE BOMBAS, COMPRESORES, SISTEMAS HIDRÁULICOS, VÁLVULAS Y ARTÍCULOS DE GRIFERÍA', 1, 1, 1),
(291310, 'FABRICACIÓN DE COJINETES, ENGRANAJES, TRENES DE ENGRANAJES Y PIEZAS DE TRANSMISIÓN', 1, 1, 1),
(291380, 'REPARACIÓN DE COJINETES, ENGRANAJES, TRENES DE ENGRANAJES Y PIEZAS DE TRANSMISIÓN', 1, 1, 1),
(291410, 'FABRICACIÓN DE HORNOS, HOGARES Y QUEMADORES', 1, 1, 1),
(291480, 'REPARACIÓN DE HORNOS, HOGARES Y QUEMADORES', 1, 1, 1),
(291510, 'FABRICACIÓN DE EQUIPO DE ELEVACIÓN Y MANIPULACIÓN', 1, 1, 1),
(291580, 'REPARACIÓN DE EQUIPO DE ELEVACIÓN Y MANIPULACIÓN', 1, 1, 1),
(291910, 'FABRICACIÓN DE OTRO TIPO DE MAQUINARIAS DE USO GENERAL', 1, 1, 1),
(291980, 'REPARACIÓN OTROS TIPOS DE MAQUINARIA Y EQUIPOS DE USO GENERAL', 1, 1, 1),
(292110, 'FABRICACIÓN DE MAQUINARIA AGROPECUARIA Y FORESTAL', 1, 1, 1),
(292180, 'REPARACIÓN DE MAQUINARIA AGROPECUARIA Y FORESTAL', 1, 1, 1),
(292210, 'FABRICACIÓN DE MÁQUINAS HERRAMIENTAS', 1, 1, 1),
(292280, 'REPARACIÓN DE MÁQUINAS HERRAMIENTAS', 1, 1, 1),
(292310, 'FABRICACIÓN DE MAQUINARIA METALÚRGICA', 1, 1, 1),
(292380, 'REPARACIÓN DE MAQUINARIA PARA LA INDUSTRIA METALÚRGICA', 1, 1, 1),
(292411, 'FABRICACIÓN DE MAQUINARIA PARA MINAS Y CANTERAS Y PARA OBRAS DE CONSTRUCCIÓN', 1, 1, 1),
(292412, 'FABRICACIÓN DE PARTES PARA MÁQUINAS DE SONDEO O PERFORACIÓN', 1, 1, 1),
(292480, 'REPARACIÓN DE MAQUINARIA PARA LA EXPLOTACIÓN DE PETRÓLEO, MINAS, CANTERAS, Y OBRAS DE CONSTRUCCIÓN', 1, 1, 1),
(292510, 'FABRICACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACOS', 1, 1, 1),
(292580, 'REPARACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACOS', 1, 1, 1),
(292610, 'FABRICACIÓN DE MAQUINARIA PARA LA ELABORACIÓN DE PRENDAS TEXTILES, PRENDAS DE VESTIR Y CUEROS', 1, 1, 1),
(292680, 'REPARACIÓN DE MAQUINARIA PARA LA INDUSTRIA TEXTIL, DE LA CONFECCIÓN, DEL CUERO Y DEL CALZADO', 1, 1, 1),
(292710, 'FABRICACIÓN DE ARMAS Y MUNICIONES', 1, 1, 1),
(292780, 'REPARACIÓN DE ARMAS', 1, 1, 1),
(292910, 'FABRICACIÓN DE OTROS TIPOS DE MAQUINARIAS DE USO ESPECIAL', 1, 1, 1),
(292980, 'REPARACIÓN DE OTROS TIPOS DE MAQUINARIA DE USO ESPECIAL', 1, 1, 1),
(293000, 'FABRICACIÓN DE APARATOS DE USO DOMÉSTICO N.C.P.', 1, 1, 1),
(300010, 'FABRICACIÓN Y ARMADO DE COMPUTADORES Y HARDWARE EN GENERAL', 1, 1, 1),
(300020, 'FABRICACIÓN DE MAQUINARIA DE OFICINA, CONTABILIDAD, N.C.P.', 1, 1, 1),
(311010, 'FABRICACIÓN DE MOTORES, GENERADORES Y TRANSFORMADORES ELÉCTRICOS', 1, 1, 1),
(311080, 'REPARACIÓN DE MOTORES, GENERADORES Y TRANSFORMADORES ELÉCTRICOS', 1, 1, 1),
(312010, 'FABRICACIÓN DE APARATOS DE DISTRIBUCIÓN Y CONTROL', 1, 1, 1),
(312080, 'REPARACIÓN DE APARATOS DE DISTRIBUCIÓN Y CONTROL', 1, 1, 1),
(313000, 'FABRICACIÓN DE HILOS Y CABLES AISLADOS', 1, 1, 1),
(314000, 'FABRICACIÓN DE ACUMULADORES DE PILAS Y BATERÍAS PRIMARIAS', 1, 1, 1),
(315010, 'FABRICACIÓN DE LÁMPARAS Y EQUIPO DE ILUMINACIÓN', 1, 1, 1),
(315080, 'REPARACIÓN DE EQUIPO DE ILUMINACIÓN', 1, 1, 1),
(319010, 'FABRICACIÓN DE OTROS TIPOS DE EQUIPO ELÉCTRICO N.C.P.', 1, 1, 1),
(319080, 'REPARACIÓN DE OTROS TIPOS DE EQUIPO ELÉCTRICO N.C.P.', 1, 1, 1),
(321010, 'FABRICACIÓN DE COMPONENTES ELECTRÓNICOS', 1, 1, 1),
(321080, 'REPARACIÓN DE COMPONENTES ELECTRÓNICOS', 1, 1, 1),
(322010, 'FABRICACIÓN DE TRANSMISORES DE RADIO Y TELEVISIÓN, APARATOS PARA TELEFONÍA Y TELEGRAFÍA CON HILOS', 1, 1, 1),
(322080, 'REPARACIÓN DE TRANSMISORES DE RADIO Y TELEVISIÓN, APARATOS PARA TELEFONÍA Y TELEGRAFÍA CON HILOS', 1, 1, 1),
(323000, 'FABRICACIÓN DE RECEPTORES (RADIO Y TV); APARATOS DE GRABACIÓN Y REPRODUCCIÓN (AUDIO Y VIDEO)', 1, 1, 1),
(331110, 'FABRICACIÓN DE EQUIPO MÉDICO Y QUIRÚRGICO, Y DE APARATOS ORTOPÉDICOS', 1, 1, 1),
(331120, 'LABORATORIOS DENTALES', 1, 1, 1),
(331180, 'REPARACIÓN DE EQUIPO MÉDICO Y QUIRÚRGICO, Y DE APARATOS ORTOPÉDICOS', 1, 1, 1),
(331210, 'FABRICACIÓN DE INSTRUMENTOS Y APARATOS PARA MEDIR, VERIFICAR, ENSAYAR, NAVEGAR Y OTROS FINES', 1, 1, 1),
(331280, 'REPARACIÓN DE INSTRUMENTOS Y APARATOS PARA MEDIR, VERIFICAR, ENSAYAR, NAVEGAR Y OTROS FINES', 1, 1, 1),
(331310, 'FABRICACIÓN DE EQUIPOS DE CONTROL DE PROCESOS INDUSTRIALES', 1, 1, 1),
(331380, 'REPARACIÓN DE EQUIPOS DE CONTROL DE PROCESOS INDUSTRIALES', 1, 1, 1),
(332010, 'FABRICACIÓN Y/O REPARACIÓN DE LENTES Y ARTÍCULOS OFTALMOLÓGICOS', 1, 1, 1),
(332020, 'FABRICACIÓN DE INSTRUMENTOS DE OPTICA N.C.P. Y EQUIPOS FOTOGRÁFICOS', 1, 1, 1),
(332080, 'REPARACIÓN DE INSTRUMENTOS DE OPTICA N.C.P Y EQUIPO FOTOGRÁFICOS', 1, 1, 1),
(333000, 'FABRICACIÓN DE RELOJES', 1, 1, 1),
(341000, 'FABRICACIÓN DE VEHÍCULOS AUTOMOTORES', 1, 1, 1),
(342000, 'FABRICACIÓN DE CARROCERÍAS PARA VEHÍCULOS AUTOMOTORES; FABRICACIÓN DE REMOLQUES Y SEMI REMOLQUES', 1, 1, 1),
(343000, 'FABRICACIÓN DE PARTES Y ACCESORIOS PARA VEHÍCULOS AUTOMOTORES Y SUS MOTORES', 1, 1, 1),
(351110, 'CONSTRUCCIÓN Y REPARACIÓN DE BUQUES; ASTILLEROS', 1, 1, 1),
(351120, 'CONSTRUCCIÓN DE EMBARCACIONES MENORES', 1, 1, 1),
(351180, 'REPARACIÓN DE EMBARCACIONES MENORES', 1, 1, 1),
(351210, 'CONSTRUCCIÓN DE EMBARCACIONES DE RECREO Y DEPORTE', 1, 1, 1),
(351280, 'REPARACIÓN DE EMBARCACIONES DE RECREO Y DEPORTES', 1, 1, 1),
(352000, 'FABRICACIÓN DE LOCOMOTORAS Y DE MATERIAL RODANTE PARA FERROCARRILES Y TRANVÍAS', 1, 1, 1),
(353010, 'FABRICACIÓN DE AERONAVES Y NAVES ESPACIALES', 1, 1, 1),
(353080, 'REPARACIÓN DE AERONAVES Y NAVES ESPACIALES', 1, 1, 1),
(359100, 'FABRICACIÓN DE MOTOCICLETAS', 1, 1, 1),
(359200, 'FABRICACIÓN DE BICICLETAS Y DE SILLONES DE RUEDAS PARA INVALIDOS', 1, 1, 1),
(359900, 'FABRICACIÓN DE OTROS EQUIPOS DE TRANSPORTE N.C.P.', 1, 1, 1),
(361010, 'FABRICACIÓN DE MUEBLES PRINCIPALMENTE DE MADERA', 1, 1, 1),
(361020, 'FABRICACIÓN DE OTROS MUEBLES N.C.P., INCLUSO COLCHONES', 1, 1, 1),
(369100, 'FABRICACIÓN DE JOYAS Y PRODUCTOS CONEXOS', 1, 1, 1),
(369200, 'FABRICACIÓN DE INSTRUMENTOS DE MÚSICA', 1, 1, 1),
(369300, 'FABRICACIÓN DE ARTÍCULOS DE DEPORTE', 1, 1, 1),
(369400, 'FABRICACIÓN DE JUEGOS Y JUGUETES', 1, 1, 1),
(369910, 'FABRICACIÓN DE PLUMAS Y LÁPICES DE TODA CLASE Y ARTÍCULOS DE ESCRITORIO EN GENERAL', 1, 1, 1),
(369920, 'FABRICACIÓN DE BROCHAS, ESCOBAS Y CEPILLOS', 1, 1, 1),
(369930, 'FABRICACIÓN DE FÓSFOROS', 1, 1, 1),
(369990, 'FABRICACIÓN DE ARTÍCULOS DE OTRAS INDUSTRIAS N.C.P.', 1, 1, 1),
(371000, 'RECICLAMIENTO DE DESPERDICIOS Y DESECHOS METÁLICOS', 1, 1, 1),
(372010, 'RECICLAMIENTO DE PAPEL', 1, 1, 1),
(372020, 'RECICLAMIENTO DE VIDRIO', 1, 1, 1),
(372090, 'RECICLAMIENTO DE OTROS DESPERDICIOS Y DESECHOS N.C.P.', 1, 1, 1),
(401011, 'GENERACIÓN HIDROELÉCTRICA', 1, 1, 1),
(401012, 'GENERACIÓN EN CENTRALES TERMOELÉCTRICA DE CICLOS COMBINADOS', 1, 1, 1),
(401013, 'GENERACIÓN EN OTRAS CENTRALES TERMOELÉCTRICAS', 1, 1, 1),
(401019, 'GENERACIÓN EN OTRAS CENTRALES N.C.P.', 1, 1, 1),
(401020, 'TRANSMISIÓN DE ENERGÍA ELÉCTRICA', 1, 1, 1),
(401030, 'DISTRIBUCIÓN DE ENERGIA ELÉCTRICA', 1, 1, 1),
(402000, 'FABRICACIÓN DE GAS; DISTRIBUCIÓN DE COMBUSTIBLES GASEOSOS POR TUBERÍAS', 1, 1, 1),
(403000, 'SUMINISTRO DE VAPOR Y AGUA CALIENTE', 1, 1, 1),
(410000, 'CAPTACIÓN, DEPURACIÓN Y DISTRIBUCIÓN DE AGUA', NULL, 1, 1),
(451010, 'PREPARACIÓN DEL TERRENO, EXCAVACIONES Y MOVIMIENTOS DE TIERRAS', 1, 1, 1),
(451020, 'SERVICIOS DE DEMOLICIÓN Y EL DERRIBO DE EDIFICIOS Y OTRAS ESTRUCTURAS', 1, 1, 1),
(452010, 'CONSTRUCCIÓN DE EDIFICIOS COMPLETOS O DE PARTES DE EDIFICIOS', 1, 1, 1),
(452020, 'OBRAS DE INGENIERÍA', 1, 1, 1),
(453000, 'ACONDICIONAMIENTO DE EDIFICIOS', 1, 1, 1),
(454000, 'OBRAS MENORES EN CONSTRUCCIÓN (CONTRATISTAS, ALBANILES, CARPINTEROS)', 1, 1, 1),
(455000, 'ALQUILER DE EQUIPO DE CONSTRUCCIÓN O DEMOLICIÓN DOTADO DE OPERARIOS', 1, 1, 1),
(501010, 'VENTA AL POR MAYOR DE VEHÍCULOS AUTOMOTORES (IMPORTACIÓN, DISTRIBUCIÓN) EXCEPTO MOTOCICLETAS', 1, 1, 1),
(501020, 'VENTA O COMPRAVENTA AL POR MENOR DE VEHÍCULOS AUTOMOTORES NUEVOS O USADOS; EXCEPTO MOTOCICLETAS', 1, 1, 1),
(502010, 'SERVICIO DE LAVADO DE VEHÍCULOS AUTOMOTORES', NULL, 1, 1),
(502020, 'SERVICIOS DE REMOLQUE DE VEHÍCULOS (GRUAS)', 1, 1, 1),
(502080, 'MANTENIMIENTO Y REPARACIÓN DE VEHÍCULOS AUTOMOTORES', NULL, 1, 1),
(503000, 'VENTA DE PARTES, PIEZAS Y ACCESORIOS DE VEHÍCULOS AUTOMOTORES', 1, 1, 1),
(504010, 'VENTA DE MOTOCICLETAS', 1, 1, 1),
(504020, 'VENTA DE PIEZAS Y ACCESORIOS DE MOTOCICLETAS', 1, 1, 1),
(504080, 'REPARACIÓN DE MOTOCICLETAS', NULL, 1, 1),
(505000, 'VENTA AL POR MENOR DE COMBUSTIBLE PARA AUTOMOTORES', 1, 1, 1),
(511010, 'CORRETAJE DE PRODUCTOS AGRÍCOLAS', 1, 1, 1),
(511020, 'CORRETAJE DE GANADO (FERIAS DE GANADO)', 1, 1, 1),
(511030, 'OTROS TIPOS DE CORRETAJES O REMATES N.C.P. (NO INCLUYE SERVICIOS DE MARTILLERO)', 1, 1, 1),
(512110, 'VENTA AL POR MAYOR DE ANIMALES VIVOS', 1, 1, 1),
(512120, 'VENTA AL POR MAYOR DE PRODUCTOS PECUARIOS (LANAS, PIELES, CUEROS SIN PROCESAR); EXCEPTO ALIMENTOS', 1, 1, 1),
(512130, 'VENTA AL POR MAYOR DE MATERIAS PRIMAS AGRÍCOLAS', 1, 1, 1),
(512210, 'MAYORISTA DE FRUTAS Y VERDURAS', 1, 1, 1),
(512220, 'MAYORISTAS DE CARNES', 1, 1, 1),
(512230, 'MAYORISTAS DE PRODUCTOS DEL MAR (PESCADO, MARISCOS, ALGAS)', 1, 1, 1),
(512240, 'MAYORISTAS DE VINOS Y BEBIDAS ALCOHÓLICAS Y DE FANTASÍA', 1, 1, 1),
(512250, 'VENTA AL POR MAYOR DE CONFITES', 1, 1, 1),
(512260, 'VENTA AL POR MAYOR DE TABACO Y PRODUCTOS DERIVADOS', 1, 1, 1),
(512290, 'VENTA AL POR MAYOR DE HUEVOS, LECHE, ABARROTES, Y OTROS ALIMENTOS N.C.P.', 1, 1, 1),
(513100, 'VENTA AL POR MAYOR DE PRODUCTOS TEXTILES, PRENDAS DE VESTIR Y CALZADO', 1, 1, 1),
(513910, 'VENTA AL POR MAYOR DE MUEBLES', 1, 1, 1),
(513920, 'VENTA AL POR MAYOR DE ARTÍCULOS ELÉCTRICOS Y ELECTRÓNICOS PARA EL HOGAR', 1, 1, 1),
(513930, 'VENTA AL POR MAYOR DE ARTÍCULOS DE PERFUMERÍA, COSMÉTICOS, JABONES Y PRODUCTOS DE LIMPIEZA', 1, 1, 1),
(513940, 'VENTA AL POR MAYOR DE PAPEL Y CARTÓN', 1, 1, 1),
(513951, 'VENTA AL POR MAYOR DE LIBROS', 1, 1, 1),
(513952, 'VENTA AL POR MAYOR DE REVISTAS Y PERIÓDICOS', 1, 1, 1),
(513960, 'VENTA AL POR MAYOR DE PRODUCTOS FARMACEUTICOS', 1, 1, 1),
(513970, 'VENTA AL POR MAYOR DE INSTRUMENTOS CIENTÍFICOS Y QUIRÚRGICOS', 1, 1, 1),
(513990, 'VENTA AL POR MAYOR DE OTROS ENSERES DOMÉSTICOS N.C.P.', 1, 1, 1),
(514110, 'VENTA AL POR MAYOR DE COMBUSTIBLES LÍQUIDOS', 1, 1, 1),
(514120, 'VENTA AL POR MAYOR DE COMBUSTIBLES SÓLIDOS', 1, 1, 1),
(514130, 'VENTA AL POR MAYOR DE COMBUSTIBLES GASEOSOS', 1, 1, 1),
(514140, 'VENTA AL POR MAYOR DE PRODUCTOS CONEXOS A LOS COMBUSTIBLES', 1, 1, 1),
(514200, 'VENTA AL POR MAYOR DE METALES Y MINERALES METALÍFEROS', 1, 1, 1),
(514310, 'VENTA AL POR MAYOR DE MADERA NO TRABAJADA Y PRODUCTOS RESULTANTES DE SU ELABORACIÓN PRIMARIA', 1, 1, 1),
(514320, 'VENTA AL POR MAYOR DE MATERIALES DE CONSTRUCCIÓN, ARTÍCULOS DE FERRETERÍA Y RELACIONADOS', 1, 1, 1),
(514910, 'VENTA AL POR MAYOR DE PRODUCTOS QUÍMICOS', 1, 1, 1),
(514920, 'VENTA AL POR MAYOR DE DESECHOS METÁLICOS (CHATARRA)', 1, 1, 1),
(514930, 'VENTA AL POR MAYOR DE INSUMOS VETERINARIOS', 1, 1, 1),
(514990, 'VENTA AL POR MAYOR DE OTROS PRODUCTOS INTERMEDIOS, DESPERDICIOS Y DESECHOS N.C.P.', 1, 1, 0),
(515001, 'VENTA AL POR MAYOR DE MAQUINARIA AGRÍCOLA Y FORESTAL', 1, 1, 1),
(515002, 'VENTA AL POR MAYOR DE MAQUINARIA METALÚRGICA', 1, 1, 1),
(515003, 'VENTA AL POR MAYOR DE MAQUINARIA PARA LA MINERÍA', 1, 1, 1),
(515004, 'VENTA AL POR MAYOR DE MAQUINARIA PARA LA CONSTRUCCIÓN', 1, 1, 1),
(515005, 'VENTA AL POR MAYOR DE MAQUINARIA PARA LA ELABORACIÓN DE ALIMENTOS, BEBIDAS Y TABACO', 1, 1, 1),
(515006, 'VENTA AL POR MAYOR DE MAQUINARIA PARA TEXTILES Y CUEROS', 1, 1, 1),
(515007, 'VENTA AL POR MAYOR DE MÁQUINAS Y EQUIPOS DE OFICINA; INCLUYE MATERIALES CONEXOS', 1, 1, 1),
(515008, 'VENTA AL POR MAYOR DE MAQUINARIA Y EQUIPO DE TRANSPORTE EXCEPTO VEHÍCULOS AUTOMOTORES', 1, 1, 1),
(515009, 'VENTA AL POR MAYOR DE MAQUINARIA, HERRAMIENTAS, EQUIPO Y MATERIALES N.C.P.', 1, 1, 1),
(519000, 'VENTA AL POR MAYOR DE OTROS PRODUCTOS N.C.P.', 1, 1, 0),
(521111, 'GRANDES ESTABLECIMIENTOS (VENTA DE ALIMENTOS); HIPERMERCADOS', 1, 1, 1),
(521112, 'ALMACENES MEDIANOS (VENTA DE ALIMENTOS); SUPERMERCADOS, MINIMARKETS', 1, 1, 1),
(521120, 'ALMACENES PEQUENOS (VENTA DE ALIMENTOS)', 1, 1, 1),
(521200, 'GRANDES TIENDAS - PRODUCTOS DE FERRETERÍA Y PARA EL HOGAR', 1, 1, 1),
(521300, 'GRANDES TIENDAS - VESTUARIO Y PRODUCTOS PARA EL HOGAR', 1, 1, 1),
(521900, 'VENTA AL POR MENOR DE OTROS PRODUCTOS EN PEQUENOS ALMACENES NO ESPECIALIZADOS', 1, 1, 1),
(522010, 'VENTA AL POR MENOR DE BEBIDAS Y LICORES (BOTILLERÍAS)', 1, 1, 1),
(522020, 'VENTA AL POR MENOR DE CARNES (ROJAS, BLANCAS, OTRAS) PRODUCTOS CÁRNICOS Y SIMILARES', 1, 1, 1),
(522030, 'COMERCIO AL POR MENOR DE VERDURAS Y FRUTAS (VERDULERÍA)', 1, 1, 1),
(522040, 'VENTA AL POR MENOR DE PESCADOS, MARISCOS Y PRODUCTOS CONEXOS', 1, 1, 1),
(522050, 'VENTA AL POR MENOR DE PRODUCTOS DE PANADERÍA Y PASTELERÍA', 1, 1, 1),
(522060, 'VENTA AL POR MENOR DE ALIMENTOS PARA MASCOTAS Y ANIMALES EN GENERAL', 1, 1, 1),
(522070, 'VENTA AL POR MENOR DE AVES Y HUEVOS', 1, 1, 1),
(522090, 'VENTA AL POR MENOR DE PRODUCTOS DE CONFITERÍAS, CIGARRILLOS, Y OTROS', 1, 1, 1),
(523111, 'FARMACIAS - PERTENECIENTES A CADENA DE ESTABLECIMIENTOS', 1, 1, 1),
(523112, 'FARMACIAS INDEPENDIENTES', 1, 1, 1),
(523120, 'VENTA AL POR MENOR DE PRODUCTOS MEDICINALES', 1, 1, 1),
(523130, 'VENTA AL POR MENOR DE ARTÍCULOS ORTOPÉDICOS', 1, 1, 1),
(523140, 'VENTA AL POR MENOR DE ARTÍCULOS DE TOCADOR Y COSMÉTICOS', 1, 1, 1),
(523210, 'VENTA AL POR MENOR DE CALZADO', 1, 1, 1),
(523220, 'VENTA AL POR MENOR DE PRENDAS DE VESTIR EN GENERAL, INCLUYE ACCESORIOS', 1, 1, 1),
(523230, 'VENTA AL POR MENOR DE LANAS, HILOS Y SIMILARES', 1, 1, 1),
(523240, 'VENTA AL POR MENOR DE MALETERÍAS, TALABARTERÍAS Y ARTÍCULOS DE CUERO', 1, 1, 1),
(523250, 'VENTA AL POR MENOR DE ROPA INTERIOR Y PRENDAS DE USO PERSONAL', 1, 1, 1),
(523290, 'COMERCIO AL POR MENOR DE TEXTILES PARA EL HOGAR Y OTROS PRODUCTOS TEXTILES N.C.P.', 1, 1, 1),
(523310, 'VENTA AL POR MENOR DE ARTÍCULOS ELECTRODOMÉSTICOS Y ELECTRÓNICOS PARA EL HOGAR', 1, 1, 1),
(523320, 'VENTA AL POR MENOR DE CRISTALES, LOZAS, PORCELANA, MENAJE (CRISTALERÍAS)', 1, 1, 1),
(523330, 'VENTA AL POR MENOR DE MUEBLES; INCLUYE COLCHONES', 1, 1, 1),
(523340, 'VENTA AL POR MENOR DE INSTRUMENTOS MUSICALES (CASA DE MÚSICA)', 1, 1, 1),
(523350, 'VENTA AL POR MENOR DE DISCOS, CASSETTES, DVD Y VIDEOS', 1, 1, 1),
(523360, 'VENTA AL POR MENOR DE LÁMPARAS, APLIQUÉS Y SIMILARES', 1, 1, 1),
(523390, 'VENTA AL POR MENOR DE APARATOS, ARTÍCULOS, EQUIPO DE USO DOMÉSTICO N.C.P.', 1, 1, 1),
(523410, 'VENTA AL POR MENOR DE ARTÍCULOS DE FERRETERÍA Y MATERIALES DE CONSTRUCCIÓN', 1, 1, 1),
(523420, 'VENTA AL POR MENOR DE PINTURAS, BARNICES Y LACAS', 1, 1, 1),
(523430, 'COMERCIO AL POR MENOR DE PRODUCTOS DE VIDRIO', 1, 1, 1),
(523911, 'COMERCIO AL POR MENOR DE ARTÍCULOS FOTOGRÁFICOS', 1, 1, 1),
(523912, 'COMERCIO AL POR MENOR DE ARTÍCULOS ÓPTICOS', 1, 1, 1),
(523921, 'COMERCIO POR MENOR DE JUGUETES', 1, 1, 1),
(523922, 'COMERCIO AL POR MENOR DE LIBROS', 1, 1, 1),
(523923, 'COMERCIO AL POR MENOR DE REVISTAS Y DIARIOS', 1, 1, 1),
(523924, 'COMERCIO DE ARTÍCULOS DE SUMINISTROS DE OFICINAS Y ARTÍCULOS DE ESCRITORIO EN GENERAL', 1, 1, 1),
(523930, 'COMERCIO AL POR MENOR DE COMPUTADORAS, SOFTWARES Y SUMINISTROS', 1, 1, 1),
(523941, 'COMERCIO AL POR MENOR DE ARMERÍAS, ARTÍCULOS DE CAZA Y PESCA', 1, 1, 1),
(523942, 'COMERCIO AL POR MENOR DE BICICLETAS Y SUS REPUESTOS', 1, 1, 1),
(523943, 'COMERCIO AL POR MENOR DE ARTÍCULOS DEPORTIVOS', 1, 1, 1),
(523950, 'COMERCIO AL POR MENOR DE ARTÍCULOS DE JOYERÍA, FANTASÍAS Y RELOJERÍAS', 1, 1, 1),
(523961, 'VENTA AL POR MENOR DE GAS LICUADO EN BOMBONAS', 1, 1, 1),
(523969, 'VENTA AL POR MENOR DE CARBÓN, LENA Y OTROS COMBUSTIBLES DE USO DOMÉSTICO', 1, 1, 1),
(523991, 'COMERCIO AL POR MENOR DE ARTÍCULOS TÍPICOS (ARTESANÍAS)', 1, 1, 1),
(523992, 'VENTA AL POR MENOR DE FLORES, PLANTAS, ÁRBOLES, SEMILLAS, ABONOS', 1, 1, 1),
(523993, 'VENTA AL POR MENOR DE MASCOTAS Y ACCESORIOS', 1, 1, 1),
(523999, 'VENTAS AL POR MENOR DE OTROS PRODUCTOS EN ALMACENES ESPECIALIZADOS N.C.P.', 1, 1, 1),
(524010, 'COMERCIO AL POR MENOR DE ANTIGUEDADES', 1, 1, 1),
(524020, 'COMERCIO AL POR MENOR DE ROPA USADA', 1, 1, 1),
(524090, 'COMERCIO AL POR MENOR DE ARTÍCULOS Y ARTEFACTOS USADOS N.C.P.', 1, 1, 1),
(525110, 'VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA POR CORREO', 1, 1, 1),
(525120, 'VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA TELEFÓNICA', 1, 1, 1),
(525130, 'VENTA AL POR MENOR EN EMPRESAS DE VENTA A DISTANCIA VÍA INTERNET; COMERCIO ELECTRÓNICO', 1, 1, 1),
(525200, 'VENTA AL POR MENOR EN PUESTOS DE VENTA Y MERCADOS', 1, 1, 1),
(525911, 'VENTA AL POR MENOR REALIZADA POR INDEPENDIENTES EN TRANSPORTE PÚBLICO (LEY 20.388)', 1, 1, 1),
(525919, 'VENTA AL POR MENOR NO REALIZADA EN ALMACENES DE PRODUCTOS PROPIOS N.C.P.', 1, 1, 1),
(525920, 'MÁQUINAS EXPENDEDORAS', 1, 1, 1),
(525930, 'VENTA AL POR MENOR A CAMBIO DE UNA RETRIBUCIÓN O POR CONTRATA', 1, 1, 1),
(525990, 'OTROS TIPOS DE VENTA AL POR MENOR NO REALIZADA EN ALMACENES N.C.P.', 1, 1, 1),
(526010, 'REPARACIÓN DE CALZADO Y OTROS ARTÍCULOS DE CUERO', NULL, 1, 1),
(526020, 'REPARACIONES ELÉCTRICAS Y ELECTRÓNICAS', NULL, 1, 1),
(526030, 'REPARACIÓN DE RELOJES Y JOYAS', NULL, 1, 1),
(526090, 'OTRAS REPARACIONES DE EFECTOS PERSONALES Y ENSERES DOMÉSTICOS N.C.P.', NULL, 1, 1),
(551010, 'HOTELES', 1, 1, 1),
(551020, 'MOTELES', 1, 1, 1),
(551030, 'RESIDENCIALES', 1, 1, 1),
(551090, 'OTROS TIPOS DE HOSPEDAJE TEMPORAL COMO CAMPING, ALBERGUES, POSADAS, REFUGIOS Y SIMILARES', 1, 1, 1),
(552010, 'RESTAURANTES', 1, 1, 1),
(552020, 'ESTABLECIMIENTOS DE COMIDA RÁPIDA (BARES, FUENTES DE SODA, GELATERÍAS, PIZZERÍAS Y SIMILARES)', 1, 1, 1),
(552030, 'CASINOS Y CLUBES SOCIALES', 1, 1, 1),
(552040, 'SERVICIOS DE COMIDA PREPARADA EN FORMA INDUSTRIAL', 1, 1, 1),
(552050, 'SERVICIOS DE BANQUETES, BODAS Y OTRAS CELEBRACIONES', 1, 1, 1),
(552090, 'SERVICIOS DE OTROS ESTABLECIMIENTOS QUE EXPENDEN COMIDAS Y BEBIDAS', 1, 1, 1),
(601001, 'TRANSPORTE INTERURBANO DE PASAJEROS POR FERROCARRILES', 1, 1, 1),
(601002, 'TRANSPORTE DE CARGA POR FERROCARRILES', 1, 1, 1),
(602110, 'TRANSPORTE URBANO DE PASAJEROS VÍA FERROCARRIL (INCLUYE METRO)', 0, 1, 1),
(602120, 'TRANSPORTE URBANO DE PASAJEROS VÍA AUTOBUS (LOCOMOCIÓN COLECTIVA)', 0, 1, 1),
(602130, 'TRANSPORTE INTERURBANO DE PASAJEROS VÍA AUTOBUS', 0, 1, 1),
(602140, 'TRANSPORTE URBANO DE PASAJEROS VÍA TAXI COLECTIVO', 0, 1, 1),
(602150, 'SERVICIOS DE TRANSPORTE ESCOLAR', 0, 1, 1),
(602160, 'SERVICIOS DE TRANSPORTE DE TRABAJADORES', 0, 1, 1),
(602190, 'OTROS TIPOS DE TRANSPORTE REGULAR DE PASAJEROS POR VÍA TERRESTRE N.C.P.', 0, 1, 1),
(602210, 'TRANSPORTES POR TAXIS LIBRES Y RADIOTAXIS', 0, 1, 1),
(602220, 'SERVICIOS DE TRANSPORTE A TURISTAS', 0, 1, 1),
(602230, 'TRANSPORTE DE PASAJEROS EN VEHÍCULOS DE TRACCIÓN HUMANA Y ANIMAL', 0, 1, 1),
(602290, 'OTROS TIPOS DE TRANSPORTE NO REGULAR DE PASAJEROS N.C.P.', 0, 1, 1),
(602300, 'TRANSPORTE DE CARGA POR CARRETERA', 1, 1, 1),
(603000, 'TRANSPORTE POR TUBERÍAS', 1, 1, 1),
(611001, 'TRANSPORTE MARÍTIMO Y DE CABOTAJE DE PASAJEROS', 1, 1, 1),
(611002, 'TRANSPORTE MARÍTIMO Y DE CABOTAJE DE CARGA', 1, 1, 1),
(612001, 'TRANSPORTE DE PASAJEROS POR VÍAS DE NAVEGACIÓN INTERIORES', 1, 1, 1),
(612002, 'TRANSPORTE DE CARGA POR VÍAS DE NAVEGACIÓN INTERIORES', 1, 1, 1),
(621010, 'TRANSPORTE REGULAR POR VÍA AÉREA DE PASAJEROS', 1, 1, 1),
(621020, 'TRANSPORTE REGULAR POR VÍA AÉREA DE CARGA', 1, 1, 1),
(622001, 'TRANSPORTE NO REGULAR POR VÍA AÉREA DE PASAJEROS', 1, 1, 1),
(622002, 'TRANSPORTE NO REGULAR POR VÍA AÉREA DE CARGA', 1, 1, 1),
(630100, 'MANIPULACIÓN DE LA CARGA', 1, 1, 1),
(630200, 'SERVICIOS DE ALMACENAMIENTO Y DEPÓSITO', 1, 1, 1),
(630310, 'TERMINALES TERRESTRES DE PASAJEROS', 1, 1, 1),
(630320, 'ESTACIONAMIENTO DE VEHÍCULOS Y PARQUÍMETROS', 1, 1, 1),
(630330, 'PUERTOS Y AEROPUERTOS', 1, 1, 1),
(630340, 'SERVICIOS PRESTADOS POR CONCESIONARIOS DE CARRETERAS', 1, 1, 1),
(630390, 'OTRAS ACTIVIDADES CONEXAS AL TRANSPORTE N.C.P.', 1, 1, 1),
(630400, 'AGENCIAS Y ORGANIZADORES DE VIAJES; ACTIVIDADES DE ASISTENCIA A TURISTAS N.C.P.', 1, 1, 1),
(630910, 'AGENCIAS DE ADUANAS', NULL, 1, 1),
(630920, 'AGENCIAS DE TRANSPORTE', NULL, 1, 1),
(641100, 'ACTIVIDADES POSTALES NACIONALES', NULL, 1, 1),
(641200, 'ACTIVIDADES DE CORREO DISTINTAS DE LAS ACTIVIDADES POSTALES NACIONALES', NULL, 1, 1),
(642010, 'SERVICIOS DE TELEFONÍA FIJA', 1, 1, 1),
(642020, 'SERVICIOS DE TELEFONÍA MÓVIL', 1, 1, 1),
(642030, 'PORTADORES TELEFÓNICOS (LARGA DISTANCIA NACIONAL E INTERNACIONAL)', 1, 1, 1),
(642040, 'SERVICIOS DE TELEVISIÓN NO ABIERTA', 1, 1, 1),
(642050, 'PROVEEDORES DE INTERNET', 1, 1, 1),
(642061, 'CENTROS DE LLAMADOS; INCLUYE ENVÍO DE FAX', 1, 1, 1),
(642062, 'CENTROS DE ACCESO A INTERNET', 1, 1, 1),
(642090, 'OTROS SERVICIOS DE TELECOMUNICACIONES N.C.P.', 1, 1, 1),
(651100, 'BANCA CENTRAL', 1, 1, 0),
(651910, 'BANCOS', 1, 1, 0),
(651920, 'FINANCIERAS', 1, 1, 1),
(651990, 'OTROS TIPOS DE INTERMEDIACIÓN MONETARIA N.C.P.', 1, 1, 1),
(659110, 'LEASING FINANCIERO', 1, 1, 1),
(659120, 'LEASING HABITACIONAL', 1, 1, 1),
(659210, 'FINANCIAMIENTO DEL FOMENTO DE LA PRODUCCIÓN', 1, 1, 0),
(659220, 'ACTIVIDADES DE CRÉDITO PRENDARIO', 1, 1, 1),
(659231, 'FACTORING', 1, 1, 1),
(659232, 'SECURITIZADORAS', 1, 1, 0),
(659290, 'OTROS INSTITUCIONES FINANCIERAS N.C.P.', 1, 1, 1),
(659911, 'ADMINISTRADORAS DE FONDOS DE INVERSIÓN', 1, 1, 1),
(659912, 'ADMINISTRADORAS DE FONDOS MUTUOS', 1, 1, 1),
(659913, 'ADMINISTRADORAS DE FICES (FONDOS DE INVERSIÓN DE CAPITAL EXTRANJERO)', 1, 1, 1),
(659914, 'ADMINISTRADORAS DE FONDOS PARA LA VIVIENDA', 1, 1, 1),
(659915, 'ADMINISTRADORAS DE FONDOS PARA OTROS FINES Y/O GENERALES', 1, 1, 1),
(659920, 'SOCIEDADES DE INVERSIÓN Y RENTISTAS DE CAPITALES MOBILIARIOS EN GENERAL', 0, 1, 1),
(660101, 'PLANES DE SEGURO DE VIDA', 1, 1, 0),
(660102, 'PLANES DE REASEGUROS DE VIDA', 1, 1, 0),
(660200, 'ADMINISTRADORAS DE FONDOS DE PENSIONES (AFP)', 1, 1, 0),
(660301, 'PLANES DE SEGUROS GENERALES', 1, 1, 0),
(660302, 'PLANES DE REASEGUROS GENERALES', 1, 1, 0),
(660400, 'ISAPRES', 1, 1, 0),
(671100, 'ADMINISTRACIÓN DE MERCADOS FINANCIEROS', 1, 1, 1),
(671210, 'CORREDORES DE BOLSA', 1, 1, 1),
(671220, 'AGENTES DE VALORES', 1, 1, 1),
(671290, 'OTROS SERVICIOS DE CORRETAJE', 1, 1, 1),
(671910, 'CÁMARA DE COMPENSACIÓN', 1, 1, 1),
(671921, 'ADMINISTRADORA DE TARJETAS DE CRÉDITO', 1, 1, 1),
(671929, 'EMPRESAS DE ASESORÍA, CONSULTORÍA FINANCIERA Y DE APOYO AL GIRO', NULL, 1, 1),
(671930, 'CLASIFICADORES DE RIESGOS', 1, 1, 1),
(671940, 'CASAS DE CAMBIO Y OPERADORES DE DIVISA', NULL, 1, 1),
(671990, 'OTRAS ACTIVIDADES AUXILIARES DE LA INTERMEDIACIÓN FINANCIERA N.C.P.', 1, 1, 1),
(672010, 'CORREDORES DE SEGUROS', NULL, 1, 1),
(672020, 'AGENTES Y LIQUIDADORES DE SEGUROS', 0, 2, 1),
(672090, 'OTRAS ACTIVIDADES AUXILIARES DE LA FINANCIACIÓN DE PLANES DE SEGUROS Y DE PENSIONES N.C.P.', NULL, NULL, 1),
(701001, 'ARRIENDO DE INMUEBLES AMOBLADOS O CON EQUIPOS Y MAQUINARIAS', 1, 1, 1),
(701009, 'COMPRA, VENTA Y ALQUILER (EXCEPTO AMOBLADOS) DE INMUEBLES PROPIOS O ARRENDADOS', 0, 1, 1),
(702000, 'CORREDORES DE PROPIEDADES', NULL, NULL, 1),
(711101, 'ALQUILER DE AUTOS Y CAMIONETAS SIN CHOFER', 1, 1, 1),
(711102, 'ALQUILER DE OTROS EQUIPOS DE TRANSPORTE POR VÍA TERRESTRE SIN OPERARIOS', 1, 1, 1),
(711200, 'ALQUILER DE TRANSPORTE POR VÍA ACUÁTICA SIN TRIPULACIÓN', 1, 1, 1),
(711300, 'ALQUILER DE EQUIPO DE TRANSPORTE POR VÍA AÉREA SIN TRIPULANTES', 1, 1, 1),
(712100, 'ALQUILER DE MAQUINARIA Y EQUIPO AGROPECUARIO', 1, 1, 1),
(712200, 'ALQUILER DE MAQUINARIA Y EQUIPO DE CONSTRUCCIÓN E INGENIERÍA CIVIL', 1, 1, 1),
(712300, 'ALQUILER DE MAQUINARIA Y EQUIPO DE OFICINA (SIN OPERARIOS NI SERVICIO ADMINISTRATIVO)', 1, 1, 1),
(712900, 'ALQUILER DE OTROS TIPOS DE MAQUINARIAS Y EQUIPOS N.C.P.', 1, 1, 1),
(713010, 'ALQUILER DE BICICLETAS Y ARTÍCULOS PARA DEPORTES', 1, 1, 1),
(713020, 'ARRIENDO DE VIDEOS, JUEGOS DE VIDEO, Y EQUIPOS REPRODUCTORES DE VIDEO, MÚSICA Y SIMILARES', 1, 1, 1),
(713030, 'ALQUILER DE MOBILIARIO PARA EVENTOS (SILLAS, MESAS, MESONES, VAJILLAS, TOLDOS Y RELACIONADOS)', 1, 1, 1),
(713090, 'ALQUILER DE OTROS EFECTOS PERSONALES Y ENSERES DOMÉSTICOS N.C.P.', 1, 1, 1),
(722000, 'ASESORES Y CONSULTORES EN INFORMÁTICA (SOFTWARE)', 0, 2, 1),
(724000, 'PROCESAMIENTO DE DATOS Y ACTIVIDADES RELACIONADAS CON BASES DE DATOS', NULL, 1, 1),
(725000, 'MANTENIMIENTO Y REPARACIÓN DE MAQUINARIA DE OFICINA, CONTABILIDAD E INFORMÁTICA', 1, 1, 1),
(726000, 'EMPRESAS DE SERVICIOS INTEGRALES DE INFORMÁTICA', NULL, 1, 1),
(731000, 'INVESTIGACIONES Y DESARROLLO EXPERIMENTAL EN EL CAMPO DE LAS CIENCIAS NATURALES Y LA INGENIERÍA', NULL, 1, 1),
(732000, 'INVESTIGACIONES Y DESARROLLO EXPERIMENTAL EN EL CAMPO DE LAS CIENCIAS SOCIALES Y LAS HUMANIDADES', NULL, 1, 1),
(741110, 'SERVICIOS JURÍDICOS', 0, 2, 1),
(741120, 'SERVICIO NOTARIAL', 0, 2, 0),
(741130, 'CONSERVADOR DE BIENES RAICES', 0, 2, 0),
(741140, 'RECEPTORES JUDICIALES', 0, 2, 1),
(741190, 'ARBITRAJES, SÍNDICOS, PERITOS Y OTROS', 0, 2, 1),
(741200, 'ACTIVIDADES DE CONTABILIDAD, TENEDURÍA DE LIBROS Y AUDITORÍA; ASESORAMIENTOS TRIBUTARIOS', 0, 2, 1),
(741300, 'INVESTIGACIÓN DE MERCADOS Y REALIZACIÓN DE ENCUESTAS DE OPINIÓN PÚBLICA', NULL, NULL, 1),
(741400, 'ACTIVIDADES DE ASESORAMIENTO EMPRESARIAL Y EN MATERIA DE GESTIÓN', 0, NULL, 1),
(742110, 'SERVICIOS DE ARQUITECTURA Y TÉCNICO RELACIONADO', 0, 2, 1),
(742121, 'EMPRESAS DE SERVICIOS GEOLÓGICOS Y DE PROSPECCIÓN', 1, 1, 1),
(742122, 'SERVICIOS PROFESIONALES EN GEOLOGÍA Y PROSPECCIÓN', 0, 2, 1),
(742131, 'EMPRESAS DE SERVICIOS DE TOPOGRAFÍA Y AGRIMENSURA', 1, 1, 1),
(742132, 'SERVICIOS PROFESIONALES DE TOPOGRAFÍA Y AGRIMENSURA', 0, 2, 1),
(742141, 'SERVICIOS DE INGENIERÍA PRESTADOS POR EMPRESAS N.C.P.', 1, 1, 1),
(742142, 'SERVICIOS DE INGENIERÍA PRESTADOS POR PROFESIONALES N.C.P.', 0, 2, 1),
(742190, 'OTROS SERVICIOS DESARROLLADOS POR PROFESIONALES', 0, 2, 1),
(742210, 'SERVICIO DE REVISIÓN TÉCNICA DE VEHÍCULOS AUTOMOTORES', 1, 1, 1),
(742290, 'OTROS SERVICIOS DE ENSAYOS Y ANALISIS TÉCNICOS', NULL, 1, 1),
(743001, 'EMPRESAS DE PUBLICIDAD', 1, 1, 1),
(743002, 'SERVICIOS PERSONALES EN PUBLICIDAD', 0, 2, 1),
(749110, 'SERVICIOS SUMINISTRO DE PERSONAL; EMPRESAS SERVICIOS TRANSITORIOS', 1, 1, 1),
(749190, 'SERVICIOS DE RECLUTAMIENTO DE PERSONAL', 1, 1, 1),
(749210, 'ACTIVIDADES DE INVESTIGACIÓN', NULL, NULL, 1),
(749221, 'SERVICIOS INTEGRALES DE SEGURIDAD', NULL, 1, 1),
(749222, 'TRANSPORTE DE VALORES', 1, 1, 1),
(749229, 'SERVICIOS PERSONALES RELACIONADOS CON SEGURIDAD', 0, 2, 1),
(749310, 'EMPRESAS DE LIMPIEZA DE EDIFICIOS RESIDENCIALES Y NO RESIDENCIALES', 1, 1, 1),
(749320, 'DESRATIZACIÓN Y FUMIGACIÓN NO AGRÍCOLA', NULL, 1, 1),
(749401, 'SERVICIOS DE REVELADO, IMPRESIÓN, AMPLIACIÓN DE FOTOGRAFÍAS', 1, 1, 1),
(749402, 'ACTIVIDADES DE FOTOGRAFÍA PUBLICITARIA', NULL, NULL, 1),
(749409, 'SERVICIOS PERSONALES DE FOTOGRAFÍA', 0, 2, 1),
(749500, 'SERVICIOS DE ENVASADO Y EMPAQUE', 1, 1, 1),
(749911, 'SERVICIOS DE COBRANZA DE CUENTAS', NULL, 1, 1),
(749912, 'EVALUACIÓN Y CALIFICACIÓN DEL GRADO DE SOLVENCIA', NULL, 1, 1),
(749913, 'ASESORÍAS EN LA GESTIÓN DE LA COMPRA O VENTA DE PEQUENAS Y MEDIANAS EMPRESAS', NULL, 1, 1),
(749921, 'DISENADORES DE VESTUARIO', NULL, NULL, 1),
(749922, 'DISENADORES DE INTERIORES', NULL, NULL, 1),
(749929, 'OTROS DISENADORES N.C.P.', NULL, NULL, 1),
(749931, 'EMPRESAS DE TAQUIGRAFÍA, REPRODUCCIÓN, DESPACHO DE CORRESPONDENCIA, Y OTRAS LABORES DE OFICINA', 1, 1, 1),
(749932, 'SERVICIOS PERSONALES DE TRADUCCIÓN, INTERPRETACIÓN Y LABORES DE OFICINA', 0, 2, 1),
(749933, 'EMPRESAS DE TRADUCCIÓN E INTERPRETACIÓN', 1, 1, 1),
(749934, 'SERVICIOS DE FOTOCOPIAS', 1, 1, 1),
(749940, 'AGENCIAS DE CONTRATACIÓN DE ACTORES', 1, 1, 1),
(749950, 'ACTIVIDADES DE SUBASTA (MARTILLEROS)', 1, 1, 1),
(749961, 'GALERÍAS DE ARTE', 1, 1, 1),
(749962, 'FERIAS DE EXPOSICIONES CON FINES EMPRESARIALES', NULL, 1, 1),
(749970, 'SERVICIOS DE CONTESTACIÓN DE LLAMADAS (CALL CENTER)', 1, 1, 1),
(749990, 'OTRAS ACTIVIDADES EMPRESARIALES N.C.P.', 1, 1, 1),
(751110, 'GOBIERNO CENTRAL', NULL, 1, 0),
(751120, 'MUNICIPALIDADES', NULL, 1, 0),
(751200, 'ACTIVIDADES DEL PODER JUDICIAL', NULL, 1, 0),
(751300, 'ACTIVIDADES DEL PODER LEGISLATIVO', NULL, 1, 0),
(752100, 'RELACIONES EXTERIORES', NULL, 1, 0),
(752200, 'ACTIVIDADES DE DEFENSA', NULL, 1, 0),
(752300, 'ACTIVIDADES DE MANTENIMIENTO DEL ORDEN PÚBLICO Y DE SEGURIDAD', NULL, 1, 1),
(753010, 'ACTIVIDADES DE PLANES DE SEGURIDAD SOCIAL DE AFILIACIÓN OBLIGATORIA RELACIONADOS CON SALUD', NULL, 1, 0),
(753020, 'CAJAS DE COMPENSACIÓN', NULL, 1, 1),
(753090, 'OTRAS ACTIVIDADES DE PLANES DE SEGURIDAD SOCIAL DE AFILIACIÓN OBLIGATORIA', NULL, 1, 0),
(801010, 'ESTABLECIMIENTOS DE ENSEÑANZA PREESCOLAR', 1, 1, 1),
(801020, 'ESTABLECIMIENTOS DE ENSEÑANZA PRIMARIA', 1, 1, 1),
(802100, 'ESTABLECIMIENTOS DE ENSEÑANZA SECUNDARIA DE FORMACIÓN GENERAL', 1, 1, 1),
(802200, 'ESTABLECIMIENTOS DE ENSEÑANZA SECUNDARIA DE FORMACIÓN TÉCNICA Y PROFESIONAL', 1, 1, 1),
(803010, 'UNIVERSIDADES', 1, 1, 0),
(803020, 'INSTITUTOS PROFESIONALES', 1, 1, 0),
(803030, 'CENTROS DE FORMACIÓN TÉCNICA', 1, 1, 1),
(809010, 'ESTABLECIMIENTOS DE ENSEÑANZA PRIMARIA Y SECUNDARIA PARA ADULTOS', 1, 1, 1),
(809020, 'ESTABLECIMIENTOS DE ENSEÑANZA PREUNIVERSITARIA', 1, 1, 1),
(809030, 'EDUCACIÓN EXTRAESCOLAR (ESCUELA DE CONDUCCIÓN, MÚSICA, MODELAJE, ETC.)', 1, 1, 1),
(809041, 'EDUCACIÓN A DISTANCIA (INTERNET, CORRESPONDENCIA, OTRAS)', 0, 1, 1),
(809049, 'SERVICIOS PERSONALES DE EDUCACIÓN', 0, 2, 1),
(851110, 'HOSPITALES Y CLÍNICAS', 1, 1, 0),
(851120, 'CLÍNICAS PSIQUIATRICAS, CENTROS DE REHABILITACIÓN, ASILOS Y CLÍNICAS DE REPOSO', 1, 1, 1),
(851211, 'SERVICIOS DE MÉDICOS EN FORMA INDEPENDIENTE', 0, 2, 1),
(851212, 'ESTABLECIMIENTOS MÉDICOS DE ATENCIÓN AMBULATORIA (CENTROS MÉDICOS)', NULL, 1, 1),
(851221, 'SERVICIOS DE ODONTÓLOGOS EN FORMA INDEPENDIENTE', 0, 2, 1),
(851222, 'CENTROS DE ATENCIÓN ODONTOLÓGICA', NULL, 1, 1),
(851910, 'LABORATORIOS CLÍNICOS; INCLUYE BANCOS DE SANGRE', NULL, 1, 1),
(851920, 'OTROS PROFESIONALES DE LA SALUD', 0, 2, 1),
(851990, 'OTRAS ACTIVIDADES EMPRESARIALES RELACIONADAS CON LA SALUD HUMANA', NULL, 1, 1),
(852010, 'ACTIVIDADES DE CLÍNICAS VETERINARIAS', NULL, 1, 1),
(852021, 'SERVICIOS DE MÉDICOS VETERINARIOS EN FORMA INDEPENDIENTE', 0, 2, 1),
(852029, 'SERVICIOS DE OTROS PROFESIONALES INDEPENDIENTES EN EL ÁREA VETERINARIA', 0, 2, 1),
(853100, 'SERVICIOS SOCIALES CON ALOJAMIENTO', NULL, 1, 1),
(853200, 'SERVICIOS SOCIALES SIN ALOJAMIENTO', NULL, 1, 1),
(900010, 'SERVICIOS DE VERTEDEROS', 1, 1, 1),
(900020, 'BARRIDO DE EXTERIORES', 1, 1, 1),
(900030, 'RECOGIDA Y ELIMINACIÓN DE DESECHOS', 1, 1, 1),
(900040, 'SERVICIOS DE EVACUACIÓN DE RILES Y AGUAS SERVIDAS', 1, 1, 1),
(900050, 'SERVICIOS DE TRATAMIENTO DE RILES Y AGUAS SERVIDAS', 1, 1, 1),
(900090, 'OTRAS ACTIVIDADES DE MANEJO DE DESPERDICIOS', 1, 1, 1),
(911100, 'ACTIVIDADES DE ORGANIZACIONES EMPRESARIALES Y DE EMPLEADORES', NULL, 1, 1),
(911210, 'COLEGIOS PROFESIONALES', NULL, 1, 0),
(911290, 'ACTIVIDADES DE OTRAS ORGANIZACIONES PROFESIONALES', NULL, 1, 1),
(912000, 'ACTIVIDADES DE SINDICATOS', NULL, 1, 1),
(919100, 'ACTIVIDADES DE ORGANIZACIONES RELIGIOSAS', NULL, 1, 0),
(919200, 'ACTIVIDADES DE ORGANIZACIONES POLÍTICAS', NULL, 1, 1),
(919910, 'CENTROS DE MADRES Y UNIDADES VECINALES Y COMUNALES', NULL, 1, 0),
(919920, 'CLUBES SOCIALES', NULL, 1, 0),
(919930, 'SERVICIOS DE INSTITUTOS DE ESTUDIOS, FUNDACIONES, CORPORACIONES DE DESARROLLO (EDUCACIÓN, SALUD)', NULL, 1, 0),
(919990, 'ACTIVIDADES DE OTRAS ASOCIACIONES N.C.P.', NULL, 1, 1),
(921110, 'PRODUCCIÓN DE PELÍCULAS CINEMATOGRÁFICAS', NULL, 1, 1),
(921120, 'DISTRIBUIDORA CINEMATOGRÁFICAS', 1, 1, 1),
(921200, 'EXHIBICIÓN DE FILMES Y VIDEOCINTAS', 1, 1, 1),
(921310, 'ACTIVIDADES DE TELEVISIÓN', NULL, 1, 1),
(921320, 'ACTIVIDADES DE RADIO', NULL, 1, 1),
(921411, 'SERVICIOS DE PRODUCCIÓN DE RECITALES Y OTROS EVENTOS MUSICALES MASIVOS', NULL, 1, 1),
(921419, 'SERVICIOS DE PRODUCCIÓN TEATRAL Y OTROS N.C.P.', NULL, 1, 1),
(921420, 'ACTIVIDADES EMPRESARIALES DE ARTISTAS', 1, 1, 1),
(921430, 'ACTIVIDADES ARTÍSTICAS; FUNCIONES DE ARTISTAS, ACTORES, MÚSICOS, CONFERENCISTAS, OTROS', 0, 2, 1),
(921490, 'AGENCIAS DE VENTA DE BILLETES DE TEATRO, SALAS DE CONCIERTO Y DE TEATRO', NULL, 1, 1),
(921911, 'INSTRUCTORES DE DANZA', 0, 2, 1),
(921912, 'ACTIVIDADES DE DISCOTECAS, CABARET, SALAS DE BAILE Y SIMILARES', 1, 1, 1),
(921920, 'ACTIVIDADES DE PARQUES DE ATRACCIONES Y CENTROS SIMILARES', 1, 1, 1),
(921930, 'ESPECTÁCULOS CIRCENSES, DE TÍTERES U OTROS SIMILARES', 1, 1, 1),
(921990, 'OTRAS ACTIVIDADES DE ENTRETENIMIENTO N.C.P.', NULL, NULL, 1),
(922001, 'AGENCIAS DE NOTICIAS', NULL, 1, 1),
(922002, 'SERVICIOS PERIODÍSTICOS PRESTADO POR PROFESIONALES', 0, 2, 1),
(923100, 'ACTIVIDADES DE BIBLIOTECAS Y ARCHIVOS', NULL, 1, 1),
(923200, 'ACTIVIDADES DE MUSEOS Y PRESERVACIÓN DE LUGARES Y EDIFICIOS HISTÓRICOS', NULL, 1, 1),
(923300, 'ACTIVIDADES DE JARDINES BOTÁNICOS Y ZOOLÓGICOS Y DE PARQUES NACIONALES', NULL, 1, 1),
(924110, 'EXPLOTACIÓN DE INSTALACIONES ESPECIALIZADAS PARA LAS PRACTICAS DEPORTIVAS', NULL, 1, 1),
(924120, 'ACTIVIDADES DE CLUBES DE DEPORTES Y ESTADIOS', NULL, 1, 1),
(924131, 'FUTBOL PROFESIONAL', NULL, 1, 1),
(924132, 'FUTBOL AMATEUR', NULL, 1, 1),
(924140, 'HIPÓDROMOS', 1, 1, 1),
(924150, 'PROMOCIÓN Y ORGANIZACIÓN DE ESPECTÁCULOS DEPORTIVOS', NULL, 1, 1),
(924160, 'ESCUELAS PARA DEPORTES', 1, 1, 1),
(924190, 'OTRAS ACTIVIDADES RELACIONADAS AL DEPORTE N.C.P.', NULL, 1, 1),
(924910, 'SISTEMAS DE JUEGOS DE AZAR MASIVOS.', 1, 1, 0),
(924920, 'ACTIVIDADES DE CASINO DE JUEGOS', 1, 1, 0),
(924930, 'SALAS DE BILLAR, BOWLING, POOL Y JUEGOS ELECTRÓNICOS', 1, 1, 1),
(924940, 'CONTRATACIÓN DE ACTORES PARA CINE, TV, Y TEATRO', 1, 1, 1),
(924990, 'OTROS SERVICIOS DE DIVERSIÓN Y ESPARCIMIENTOS N.C.P.', NULL, NULL, 1),
(930100, 'LAVADO Y LIMPIEZA DE PRENDAS DE TELA Y DE PIEL, INCLUSO LAS LIMPIEZAS EN SECO', 1, 1, 1),
(930200, 'PELUQUERÍAS Y SALONES DE BELLEZA', NULL, NULL, 1),
(930310, 'SERVICIOS FUNERARIOS', 1, 1, 1),
(930320, 'SERVICIOS EN CEMENTERIOS', 1, 1, 1),
(930330, 'SERVICIOS DE CARROZAS FÚNEBRES (TRANSPORTE DE CADÁVERES)', 1, 1, 1),
(930390, 'OTRAS ACTIVIDADES DE SERVICIOS FUNERARIOS Y OTRAS ACTIVIDADES CONEXAS', 1, 1, 1),
(930910, 'ACTIVIDADES DE MANTENIMIENTO FÍSICO CORPORAL (BAÑOS, TURCOS, SAUNAS)', 1, 1, 1),
(930990, 'OTRAS ACTIVIDADES DE SERVICIOS PERSONALES N.C.P.', 0, 2, 1),
(950001, 'HOGARES PRIVADOS INDIVIDUALES CON SERVICIO DOMÉSTICO', 0, NULL, 0),
(950002, 'CONSEJO DE ADMINISTRACIÓN DE EDIFICIOS Y CONDOMINIOS', 0, 1, 0),
(990000, 'ORGANIZACIONES Y ÓRGANOS EXTRATERRITORIALES', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `margen_ganancia`
--

CREATE TABLE `margen_ganancia` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `porcentaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `margen_ganancia`
--

INSERT INTO `margen_ganancia` (`id`, `id_cl`, `porcentaje`) VALUES
(1, 1, 1);

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
(3, 0, 'Tarj. Débito', 'S'),
(4, 0, 'Transferencia', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monto_caja`
--

CREATE TABLE `monto_caja` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `id_cierre` int(11) NOT NULL,
  `motivo` int(11) NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `monto_caja`
--

INSERT INTO `monto_caja` (`id`, `id_cl`, `id_caja`, `id_cierre`, `motivo`, `monto`) VALUES
(1, 1, 1, 10, 1, 30000),
(2, 1, 1, 10, 3, -15000),
(3, 1, 1, 10, 3, 15000),
(4, 1, 1, 10, 3, 12000),
(5, 1, 1, 10, 3, 80000),
(6, 1, 1, 10, 3, -30000),
(7, 1, 1, 10, 3, -15000),
(8, 1, 1, 10, 3, -77000),
(9, 1, 1, 10, 3, 77000),
(10, 1, 1, 10, 2, 2400),
(11, 1, 1, 10, 2, 1200),
(12, 1, 1, 10, 2, 2400),
(13, 1, 1, 10, 3, -2000),
(14, 1, 1, 10, 2, 6000),
(15, 1, 1, 10, 2, 12000),
(16, 1, 1, 10, 2, 4000),
(17, 1, 1, 10, 2, 2000),
(18, 1, 1, 10, 2, 12000),
(19, 1, 1, 10, 2, 8000),
(20, 1, 1, 10, 2, 4000),
(21, 1, 1, 11, 1, 15000),
(22, 1, 1, 11, 2, 28300),
(23, 1, 1, 11, 2, 300),
(24, 1, 1, 11, 2, 500),
(25, 1, 1, 11, 2, 500),
(26, 1, 1, 11, 2, 2000),
(27, 1, 1, 11, 2, 1500),
(28, 1, 1, 11, 2, 8000),
(29, 1, 1, 11, 2, 700),
(30, 1, 1, 11, 2, 1000),
(31, 1, 1, 11, 2, 5000),
(32, 1, 1, 11, 2, 4500),
(33, 1, 1, 11, 2, 5000),
(34, 1, 1, 11, 2, 3000),
(35, 1, 1, 12, 1, 15000),
(36, 1, 1, 12, 2, 5000),
(37, 1, 1, 12, 2, 2000),
(38, 1, 1, 12, 2, 800),
(39, 1, 1, 12, 2, 1600),
(40, 1, 1, 12, 2, 1000),
(41, 1, 1, 12, 2, 900),
(42, 1, 1, 12, 3, 5000),
(43, 1, 1, 12, 2, 5100),
(44, 1, 1, 12, 2, 800),
(45, 1, 1, 12, 2, 2000),
(46, 1, 1, 12, 2, 400),
(47, 1, 1, 12, 2, 30400),
(48, 1, 1, 12, 2, 13000),
(49, 1, 1, 12, 2, 5000),
(50, 1, 1, 12, 2, 3500),
(51, 1, 1, 13, 1, 15000),
(52, 1, 1, 13, 2, 5000),
(53, 1, 1, 13, 2, 3000),
(54, 1, 1, 13, 2, 5500),
(55, 1, 1, 13, 2, 500),
(56, 1, 1, 13, 2, 500),
(57, 1, 1, 13, 2, 2000),
(58, 1, 1, 13, 2, 11500),
(59, 1, 1, 14, 1, 15000),
(60, 1, 1, 14, 2, 1200),
(61, 1, 1, 14, 2, 5000),
(62, 1, 1, 14, 2, 500),
(63, 1, 1, 14, 2, 5000),
(64, 1, 1, 14, 2, 2300),
(65, 1, 1, 14, 2, 5000),
(66, 1, 1, 14, 2, 500),
(67, 1, 1, 14, 2, 3500),
(68, 1, 1, 14, 2, 900),
(69, 1, 1, 14, 2, 200),
(70, 1, 1, 14, 2, 5000),
(71, 1, 1, 14, 2, 1000),
(72, 1, 1, 14, 2, 5700),
(73, 1, 1, 14, 2, 5650),
(74, 1, 1, 14, 2, 3000),
(75, 1, 1, 15, 1, 15000),
(76, 1, 1, 15, 2, 5000),
(77, 1, 1, 15, 2, 4600),
(78, 1, 1, 15, 2, 1300),
(79, 1, 1, 15, 2, 2500),
(80, 1, 1, 15, 2, 700),
(81, 1, 1, 15, 2, 200),
(82, 1, 1, 15, 2, 3000),
(83, 1, 1, 15, 2, 2700),
(84, 1, 1, 15, 2, 2900),
(85, 1, 1, 15, 2, 800),
(86, 1, 1, 15, 2, 1500),
(87, 1, 1, 15, 3, -10000),
(88, 1, 1, 15, 2, 5000),
(89, 1, 1, 15, 2, 5000),
(90, 1, 1, 17, 1, 15000),
(91, 1, 1, 17, 2, 5000),
(92, 1, 1, 17, 2, 3000),
(93, 1, 1, 17, 2, 1500),
(94, 1, 1, 17, 2, 4400),
(95, 1, 1, 17, 2, 3200),
(96, 1, 1, 17, 2, 3600),
(97, 1, 1, 17, 2, 2500),
(98, 1, 1, 17, 2, 1000),
(99, 1, 1, 17, 2, 3000),
(100, 1, 1, 17, 2, 5000),
(101, 1, 1, 17, 2, 2000),
(102, 1, 1, 17, 2, 9200),
(103, 1, 1, 17, 2, 13900),
(104, 1, 1, 17, 2, 2100),
(105, 1, 1, 17, 2, 800),
(106, 1, 1, 17, 2, 3600),
(107, 1, 1, 17, 2, 1300),
(109, 1, 1, 17, 2, 1600),
(110, 1, 1, 1, 1, 20000),
(111, 1, 1, 1, 3, -10000),
(112, 1, 1, 1, 3, 10000),
(113, 1, 1, 1, 2, 800),
(114, 1, 1, 1, 2, 400),
(115, 1, 1, 1, 2, 800),
(116, 1, 1, 1, 2, 400),
(117, 1, 1, 1, 2, 800),
(118, 1, 1, 1, 2, 1200),
(119, 1, 1, 1, 2, 400),
(120, 1, 1, 1, 2, 1600),
(121, 1, 1, 1, 2, 400),
(122, 1, 1, 1, 2, 400),
(123, 1, 1, 1, 2, 4000),
(124, 1, 1, 1, 2, 400),
(125, 1, 1, 1, 2, 1200),
(126, 1, 1, 1, 2, 400),
(127, 1, 1, 1, 2, 2500),
(128, 1, 1, 1, 3, -20000),
(129, 1, 1, 1, 3, 20000),
(130, 1, 1, 2, 1, 20000),
(131, 1, 1, 2, 4, 1200),
(132, 1, 1, 2, 4, 2400),
(133, 1, 1, 2, 4, 4000),
(134, 1, 1, 2, 4, 400),
(135, 1, 1, 2, 4, 400),
(136, 1, 1, 2, 4, 400),
(137, 1, 1, 2, 4, 800),
(138, 1, 1, 2, 4, 1000),
(139, 1, 8, 4, 1, 20000),
(140, 1, 8, 4, 3, -10000),
(141, 1, 8, 4, 3, 10000),
(142, 1, 8, 4, 4, 2800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_mov_monto_caja`
--

CREATE TABLE `motivo_mov_monto_caja` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motivo_mov_monto_caja`
--

INSERT INTO `motivo_mov_monto_caja` (`id`, `descripcion`) VALUES
(1, 'INICIO DE CAJA'),
(2, 'VENTA EN EFECTIVO'),
(3, 'MOVIMIENTO DE DINERO'),
(4, 'PAGO DE CUENTA EN EFECTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_cliente`
--

CREATE TABLE `pago_cliente` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `plan` int(11) NOT NULL,
  `metodo_pago` int(11) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL,
  `estado` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago_cliente`
--

INSERT INTO `pago_cliente` (`id`, `id_cl`, `plan`, `metodo_pago`, `fecha_desde`, `fecha_hasta`, `estado`) VALUES
(1, 1, 2, 1, '2023-12-20', '2023-12-20', ''),
(2, 1, 1, 1, '2024-05-15', '2024-05-15', 'S'),
(3, 1, 1, 1, '2024-05-15', '2024-05-15', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pass_provisoria`
--

CREATE TABLE `pass_provisoria` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `nombre_pedido` varchar(250) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado_pago` varchar(5) NOT NULL,
  `fac_con_iva` varchar(5) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_cl`, `nombre_pedido`, `id_proveedor`, `estado`, `estado_pago`, `fac_con_iva`, `creado_por`, `fecha_registro`) VALUES
(1, 1, 'Nombre de pedido', 1, 'N', 'C', 'A', 1, '2024-07-08'),
(2, 1, 'Nombre pedido 2', 1, 'N', 'C', 'A', 1, '2024-07-08'),
(3, 1, 'Pedido Final Fantasy', 4, 'N', 'A', 'A', 1, '2024-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalle`
--

CREATE TABLE `pedidos_detalle` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `producto` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos_detalle`
--

INSERT INTO `pedidos_detalle` (`id`, `id_cl`, `id_pedido`, `producto`, `cantidad`, `valor`, `estado`, `fecha_reg`) VALUES
(1, 1, 1, 'xd', 10, 100000, 'S', '2024-07-08'),
(2, 1, 2, 'Soda stereo', 100, 9500, 'S', '2024-07-08'),
(3, 1, 3, 'Final Fantasy', 1, 74990, 'S', '2024-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(5) NOT NULL,
  `usuarios` int(11) NOT NULL,
  `cajas` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `nombre`, `estado`, `usuarios`, `cajas`, `valor`) VALUES
(1, 'Plan 1 usuarios + 1 cajas', 'S', 5, 5, 19990),
(2, 'Plan 2 usuario + 2 cajas', 'S', 1, 5, 20990),
(3, 'Plan 3 usuarios + 3 cajas', 'S', 3, 3, 30000),
(4, 'Plan 4 usuarios + 4 cajas', 'S', 4, 4, 21500),
(5, 'Plan 5 usuarios + 5 cajas', 'S', 5, 5, 30000),
(6, 'Plan 6 usuarios + 6 cajas', 'S', 6, 6, 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `codigo_barra` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nombre_prod` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `proveedor` varchar(45) NOT NULL,
  `categoria` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `pesaje` varchar(5) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `unidad_medida` int(11) DEFAULT NULL,
  `valor_neto` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `margen_ganancia` int(11) NOT NULL,
  `monto_ganancia` int(11) NOT NULL,
  `valor_venta` varchar(7) CHARACTER SET latin2 COLLATE latin2_general_ci NOT NULL,
  `descuento` int(11) NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `id_cl`, `codigo_barra`, `nombre_prod`, `proveedor`, `categoria`, `cantidad`, `pesaje`, `unidad_medida`, `valor_neto`, `margen_ganancia`, `monto_ganancia`, `valor_venta`, `descuento`, `estado`, `creado_por`, `fecha_reg`) VALUES
(1, '1', '8445290912336', 'Criollitas', '2', '6', -4, 'S', 1, '840', 43, 360, '1200', 0, 'N', '1', '2023-12-22'),
(2, '1', '7801620009700', 'Agua mineral 600ml', '2', '9', 10, 'N', 1, '689', 45, 311, '1000', 0, 'S', '1', '2023-12-22'),
(3, '1', '7801610382028', 'Agua tónica schweppes', '2', '9', 0, 'N', 1, '1379', 45, 621, '2000', 0, 'S', '1', '2023-12-22'),
(4, '1', '7801610001622', 'Coca - Cola 1.5lts', '2', '9', 12, 'N', 1, '1379', 45, 621, '2000', 0, 'S', '1', '2023-12-22'),
(5, '1', '7613287755810', 'Chokita', '1', '1', -12, 'N', 1, '138', 190, 262, '400', 0, 'N', '1', '2023-12-22'),
(6, '1', '7613039496275', 'Galleta maravilla 120g', '2', '1', 0, 'N', 1, '560', 79, 440, '1000', 0, 'N', '1', '2023-12-22'),
(7, '1', '7802420127663', 'Ramitas Marco-Polo', '2', '6', 5, 'N', 1, '386', 81, 314, '700', 0, 'N', '1', '2023-12-22'),
(8, '1', '7613039257333', 'Galleta limón Mckay', '2', '1', 5, 'N', 1, '560', 79, 440, '1000', 0, 'N', '1', '2023-12-22'),
(9, '1', '8445290793348', 'Galleta Tritón Pack x2', '2', '1', -1, 'N', 1, '1000', 100, 1000, '2000', 0, 'N', '1', '2023-12-22'),
(10, '1', '7802215503535', 'Galleta din-don mini', '2', '1', 0, 'S', 1, '334', 50, 166, '500', 0, 'S', '1', '2023-12-22'),
(11, '1', '7613031651412', 'Galleta mini mantequilla', '2', '1', 5, 'N', 1, '311', 29, 89, '400', 0, 'N', '1', '2023-12-22'),
(12, '1', '7801610591123', 'Fanta 591ml', '2', '9', 5, 'N', 1, '770', 30, 230, '1000', 0, 'S', '1', '2023-12-22'),
(13, '1', '7802800533572', 'Kryzpo queso', '2', '6', -1, 'N', 1, '1723', 45, 777, '2500', 0, 'S', '1', '2023-12-22'),
(14, '1', '7802230082503', 'Alteza bocado', '2', '1', 0, 'N', 1, '1252', 36, 448, '1700', 0, 'S', '1', '2023-12-22'),
(15, '1', '7802230082527', 'Alteza frutilla', '2', '1', -2, 'N', 1, '1252', 36, 448, '1700', 0, 'S', '1', '2023-12-22'),
(17, '1', '7802420003875', 'Crunchis Marco Polo', '2', '6', 9994, 'N', 1, '454', 54, 246, '700', 0, 'S', '1', '2023-12-22'),
(18, '1', '7613031651443', 'Galleta mini Niza', '2', '1', 0, 'N', 1, '311', 29, 89, '400', 0, 'S', '1', '2023-12-22'),
(19, '1', '7801875000583', 'Te Supremo Verde', '2', '9', 2, 'N', 1, '1336', 50, 664, '2000', 0, 'S', '1', '2023-12-22'),
(20, '1', '7613031651474', 'Galleta mini Coco', '2', '1', 0, 'N', 1, '311', 29, 89, '400', 0, 'S', '1', '2023-12-22'),
(21, '1', '7804000001691', 'Pack 5 Barr manzana', '2', '1', 0, 'N', 1, '1756', 42, 744, '2500', 0, 'S', '1', '2023-12-22'),
(22, '1', '7804000001684', 'Barra manzana En Linea', '2', '10', 5, 'N', 1, '351', 42, 149, '500', 0, 'S', '1', '2023-12-22'),
(23, '1', '7802420001574', 'Snack Mix Marco Polo', '2', '6', 3, 'N', 1, '462', 52, 238, '700', 0, 'S', '1', '2023-12-22'),
(24, '1', '7804000002223', 'Pack 5 Barr Cranberries', '2', '10', 1, 'N', 1, '1756', 42, 744, '2500', 0, 'S', '1', '2023-12-22'),
(25, '1', '7804000002216', 'Barra cranberries En Linea', '2', '10', 5, 'N', 1, '351', 42, 149, '500', 0, 'S', '1', '2023-12-22'),
(26, '1', '7804624850033', 'Carbón Lider 2.5KG', '2', '11', 8, 'N', 1, '3200', 56, 1800, '5000', 0, 'S', '1', '2023-12-22'),
(27, '1', '7802910306202', 'Yogu-Yogu 200ml', '2', '9', 12, 'N', 1, '335', 49, 165, '500', 0, 'S', '1', '2023-12-22'),
(28, '1', '7802950006209', 'Milo 200ml', '2', '9', 12, 'N', 1, '496', 41, 204, '700', 0, 'S', '1', '2023-12-22'),
(29, '1', '7802800533589', 'Kryzpo Crema Cebolla', '2', '6', 1, 'N', 1, '1723', 45, 777, '2500', 0, 'S', '1', '2023-12-25'),
(30, '1', '7613033495335', 'Cola de tigre', '1', '12', 5, 'N', 1, '433', 62, 267, '700', 0, 'S', '1', '2023-12-25'),
(31, '1', '7613032180096', 'Trululú', '1', '12', 40, 'N', 1, '433', 62, 267, '700', 0, 'S', '1', '2023-12-25'),
(32, '1', '78006027', 'LollyPop', '1', '12', 17, 'N', 1, '591', 18, 109, '700', 0, 'S', '1', '2023-12-25'),
(33, '1', '7613032180157', 'Centella', '1', '12', 9918, 'N', 1, '235', 28, 65, '300', 0, 'S', '1', '2023-12-25'),
(34, '1', '7613032186852', 'Helado Chocolito', '1', '12', 99, 'N', 1, '589', 36, 211, '800', 0, 'S', '1', '2023-12-30'),
(35, '1', '8445290729156', 'Pura fruta chocolate', '1', '12', 54, 'N', 1, '655', 37, 245, '900', 0, 'S', '1', '2023-12-30'),
(36, '1', '7613035737754', 'Helado Bilz y Pap', '1', '12', 14, 'N', 1, '497', 81, 403, '900', 0, 'S', '1', '2023-12-30'),
(37, '1', '78006140', 'Helado Crocanty', '1', '12', 15, 'N', 1, '589', 36, 211, '800', 0, 'S', '1', '2023-12-30'),
(38, '1', '7801610676356', 'Six pack Fanta Zero 350cc', '3', '9', 1, 'N', 1, '4782', 44, 2118, '6900', 0, 'S', '1', '2023-12-31'),
(39, '1', '7801610671016', 'Fanta Zero Lata 350cc', '3', '9', 3, 'N', 1, '797', 51, 403, '1200', 0, 'S', '1', '2023-12-31'),
(40, '1', '7801610001196', 'Coca Cola lata 350cc', '3', '8', 10, 'N', 1, '797', 51, 403, '1200', 0, 'N', '1', '2023-12-31'),
(41, '1', '7801610001202', 'Six pack Coca Cola 350cc', '1', '8', 2, 'N', 1, '4782', 44, 2118, '6900', 0, 'N', '1', '2023-12-31'),
(42, '1', '7801610223192', 'Sprite Zero lata 350cc', '3', '8', 6, 'N', 1, '797', 51, 403, '1200', 0, 'N', '1', '2023-12-31'),
(43, '1', '7801610223208', 'Six pack Sprite 350cc', '1', '8', 1, 'N', 1, '4782', 44, 2118, '6900', 0, 'N', '1', '2023-12-31'),
(44, '1', '7801610484661', 'Schweppes lata 350cc', '3', '8', 1, 'N', 1, '4782', 44, 2118, '6900', 0, 'N', '1', '2023-12-31'),
(45, '1', '7801610483602', 'Schweppes lata 350cc 2', '3', '8', 6, 'N', 1, '797', 51, 403, '1200', 0, 'N', '1', '2023-12-31'),
(46, '1', '7802820600100', 'Vital 600cc', '3', '8', 0, 'N', 1, '671', 49, 329, '1000', 0, 'N', '1', '2023-12-31'),
(47, '1', '7801620853204', 'Crush Zero 1.5lts', '3', '8', 10, 'N', 1, '1924', 4, 76, '2000', 0, 'N', '1', '2023-12-31'),
(48, '1', 'Quitasoles', 'Quitasol ', '1', '12', 99983, 'N', 1, '1000', 100, 1000, '2000', 0, 'S', '1', '2024-01-01'),
(49, '1', '78023994', 'Bon o bon amarillo', '1', '1', -49, 'N', 1, '125', 100, 125, '250', 0, 'S', '1', '2024-01-01'),
(50, '1', '78024106', 'Bon o bon blanco', '2', '1', -8, 'N', 1, '125', 100, 125, '250', 0, 'S', '1', '2024-01-01'),
(51, '1', '7802215515590', 'Donuts blanca bolsa 130grs', '2', '1', 0, 'N', 1, '800', 88, 700, '1500', 0, 'S', '1', '2024-01-01'),
(52, '1', '7622201693114', 'Galleta Oreo', '1', '1', 0, 'N', 1, '700', 71, 500, '1200', 0, 'S', '1', '2024-01-01'),
(53, '1', '7802215515019', 'Galleta Gretel', '2', '1', 0, 'N', 1, '990', 21, 210, '1200', 0, 'S', '1', '2024-01-01'),
(54, '1', '7802215502569', 'Gall Sunny', '1', '1', 0, 'N', 1, '750', 60, 450, '1200', 0, 'S', '1', '2024-01-01'),
(55, '1', '7802000015120', 'De Todito Evercrisp', '1', '6', 17, 'N', 1, '545', 47, 255, '800', 0, 'S', '1', '2024-01-12'),
(56, '1', '7802000017476', 'Doritos Queso', '4', '6', 17, 'N', 1, '545', 47, 255, '800', 0, 'S', '1', '2024-01-12'),
(57, '1', '7802408007239', 'Ramitas Normales Fruna', '4', '6', 20, 'N', 1, '258', 94, 242, '500', 0, 'S', '1', '2024-01-12'),
(58, '1', 'gr-tutti-frutti', 'Grosso tutti-frutti', '4', '6', 95, 'N', 1, '55', 82, 45, '100', 0, 'S', '1', '2024-01-12'),
(59, '1', 'gr-menta', 'Grosso menta', '1', '6', 98, 'N', 1, '55', 82, 45, '100', 0, 'S', '1', '2024-01-12'),
(60, '1', '7806500221128', 'Servilleta Elite', '5', '13', 4, 'N', 1, '610', 64, 390, '1000', 0, 'S', '1', '2024-01-12'),
(61, '1', 'confort', 'Confort /unidad', '5', '13', 4, 'N', 1, '548', 82, 452, '1000', 0, 'S', '1', '2024-01-12'),
(62, '1', 'fosforos', 'Fosforos', '5', '13', 10, 'N', 1, '250', 100, 250, '500', 0, 'S', '1', '2024-01-12'),
(63, '1', '7613030612339', 'Super8 Normal', '6', '6', 47, 'N', 1, '192', 160, 308, '500', 0, 'N', '1', '2024-01-13'),
(64, '1', '7613033567773', 'Svelty Huesos', '6', '8', 2, 'N', 1, '5576', 43, 2424, '8000', 0, 'N', '1', '2024-01-13'),
(65, '1', '7613035835986', 'Kuky Chipchipers Blanco', '6', '1', 5, 'N', 1, '1107', 81, 893, '2000', 0, 'S', '1', '2024-01-13'),
(66, '1', '7802950012316', 'Salsa tomate Tuco', '6', '13', 4, 'N', 1, '1176', 70, 824, '2000', 0, 'S', '1', '2024-01-13'),
(67, '1', '7613039589069', 'Tritón Mini Limón', '6', '1', 5, 'N', 1, '302', 32, 98, '400', 0, 'S', '1', '2024-01-13'),
(68, '1', '7802230081162', 'Kuky Clásica', '6', '1', 5, 'N', 1, '768', 30, 232, '1000', 0, 'S', '1', '2024-01-13'),
(69, '1', '7613032425616', 'Svelty Move+', '6', '13', 2, 'N', 1, '5450', 47, 2550, '8000', 0, 'S', '1', '2024-01-13'),
(70, '1', '7613032590369', 'Galleta Niza Normal', '6', '1', 0, 'N', 1, '632', 58, 368, '1000', 0, 'S', '1', '2024-01-13'),
(71, '1', '7802950072679', 'Trencito impulsivo', '6', '6', 18, 'N', 1, '166', 51, 84, '250', 0, 'S', '1', '2024-01-13'),
(72, '1', '7613034891730', 'ChipChipers Chocolate', '6', '1', 5, 'N', 1, '1107', 81, 893, '2000', 0, 'S', '1', '2024-01-13'),
(73, '1', '8445290262646', 'Leche Nido Polvo', '6', '13', 2, 'N', 1, '6067', 48, 2933, '9000', 0, 'S', '1', '2024-01-13'),
(74, '1', 'leqa', 'Saco de leña', '7', '14', 6, 'N', 1, '3333', 50, 1667, '5000', 0, 'S', '1', '2024-01-13'),
(75, '1', 'hielo', 'Hielo', '7', '12', 1000, 'N', 1, '800', 88, 700, '1500', 0, 'S', '1', '2024-01-13'),
(76, '1', '7801620009694', 'Agua Cachantún 600cc', '4', '8', 100, 'N', 1, '300', 233, 700, '1000', 0, 'N', '1', '2024-01-14'),
(77, '1', '78098152', 'Sal Lobos', '2', '13', 10, 'N', 1, '500', 100, 500, '1000', 0, 'S', '1', '2024-01-20'),
(78, '1', '7802230086969', 'Tritón chocolate', '2', '1', -3, 'N', 1, '600', 67, 400, '1000', 0, 'S', '1', '2024-01-21'),
(79, '1', '7500435237895', 'Magistral lavaloza', '2', '13', 10, 'N', 1, '1590', 26, 410, '2000', 0, 'S', '1', '2024-01-21'),
(80, '1', '7802230086952', 'Triton vainilla', '2', '1', 1, 'N', 1, '600', 67, 400, '1000', 0, 'S', '1', '2024-01-21'),
(81, '1', '7802215503399', 'Mini Dulcitas Costa', '2', '1', 5, 'N', 1, '227', 76, 173, '400', 0, 'S', '1', '2024-01-26'),
(82, '1', '7802215503863', 'Mini Limón Costa', '2', '1', 5, 'N', 1, '227', 76, 173, '400', 0, 'S', '1', '2024-01-26'),
(83, '1', '7802215503429', 'Mini Palmeritas Costa', '2', '1', 0, 'N', 1, '227', 76, 173, '400', 0, 'S', '1', '2024-01-26'),
(84, '1', '7802215503450', 'Mini Vino Costa', '2', '1', 227, 'N', 1, '227', 76, 173, '400', 0, 'S', '1', '2024-01-26'),
(85, '1', '7802215503405', 'Mini Mantequilla Costa', '2', '1', 5, 'N', 1, '227', 76, 173, '400', 0, 'S', '1', '2024-01-26'),
(86, '1', '7802225688567', 'Arcor Choc Kiss', '2', '1', 30, 'N', 1, '187', 60, 113, '300', 0, 'S', '1', '2024-01-26'),
(87, '1', '7509546076300', 'Lady Speed Stick', '2', '13', 2, 'N', 1, '2000', 75, 1500, '3500', 0, 'S', '1', '2024-01-26'),
(88, '1', '7791290794054', 'CIF lavalozas limón', '2', '16', 5, 'N', 1, '1500', 67, 1000, '2500', 0, 'S', '1', '2024-01-26'),
(89, '1', '7806500174110', 'Pañuelos Elite', '2', '13', 6, 'N', 1, '181', 121, 219, '400', 0, 'S', '1', '2024-01-28'),
(90, '1', '7801620852955', 'Agua Cachantún  1.6L', '2', '8', 2, 'N', 1, '600', 233, 1400, '2000', 0, 'N', '1', '2024-01-28'),
(91, '1', '7809583500302', 'Carbón Quincho', '2', '14', 10, 'N', 1, '1690', 196, 3310, '5000', 0, 'S', '1', '2024-02-01'),
(92, '1', '7802215511615', 'Galletas Soda', '5', '1', 3, 'N', 1, '500', 50, 250, '750', 0, 'S', '1', '2024-02-03'),
(93, '1', '7803200804132', 'Mayonesa Hellmanns', '3', '13', 2, 'N', 1, '2177', 130, 2823, '5000', 0, 'S', '1', '2024-02-03'),
(94, '1', '78028100112029', 'Aceite Belmont', '3', '13', 2, 'N', 1, '2512', 99, 2488, '5000', 0, 'S', '1', '2024-02-03'),
(95, '1', 'esponja', 'esponja', '2', '13', 20, 'N', 1, '250', 100, 250, '500', 0, 'S', '1', '2024-02-04'),
(96, '1', '7801610005521', 'Sprite 2.5lts', '2', '9', 2, 'N', 1, '2000', 50, 1000, '3000', 0, 'S', '1', '2024-02-04'),
(97, '1', '7702026180287', 'Toallitas Nosotras', '2', '13', 1, 'N', 1, '1490', 101, 1510, '3000', 0, 'S', '1', '2024-02-04'),
(99, '1', '7801620852689', 'Pepsi Lata 350cc', '1', '1', 0, 'N', 1, '800', 50, 400, '1200', 0, 'S', '1', '2024-02-04'),
(100, '1', '7801620300203', 'Bebida PAP 350cc', '2', '8', 6, 'N', 1, '600', 100, 600, '1200', 0, 'N', '1', '2024-02-08'),
(101, '1', '7801620360153', 'Canada Dry Ginger Ale 350cc', '2', '8', 6, 'N', 1, '600', 100, 600, '1200', 0, 'N', '1', '2024-02-08'),
(102, '1', '7613032443221', 'McKay Mini Morocha', '2', '1', -2, 'N', 1, '240', 67, 160, '400', 0, 'S', '1', '2024-02-09'),
(103, '1', '7613035760561', 'Mini Sahnenuss Helado', '2', '12', 5, 'N', 1, '1029', 55, 571, '1600', 0, 'S', '1', '2024-02-09'),
(104, '1', '7613287171726', 'Mini KitKat helado', '1', '12', 10, 'N', 1, '1040', 54, 560, '1600', 0, 'S', '1', '2024-02-09'),
(105, '1', '7702026177669', 'Toallitas Húmedas Nosotras', '2', '13', 10, 'N', 1, '1890', 59, 1110, '3000', 0, 'S', '1', '2024-02-09'),
(106, '1', '7804676650582', 'Toallas Húm Baby Sequitos', '1', '13', 1, 'N', 1, '1000', 200, 2000, '3000', 0, 'S', '1', '2024-02-09'),
(107, '1', '7801610323236', 'Coca Cola 3LTS', '2', '8', 3, 'N', 1, '2350', 28, 650, '3000', 0, 'N', '1', '2024-02-10'),
(108, '1', '7801875000588', 'Caja 01', '', '1', 10, 'N', 1, '9500', 100, 9500, '19000', 0, 'S', '1', '2024-07-11'),
(109, '1', '7801875000589', 'Caja 01', '', '1', 10, 'N', 1, '9500', 100, 9500, '19000', 0, 'S', '1', '2024-07-11'),
(110, '1', '844529091233', 'Final Fantasy', '4', '7', 10, 'N', 1, '9500', 742, 70500, '80000', 0, 'S', '1', '2024-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `nombre_proveedor` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rut` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `id_cl`, `nombre_proveedor`, `rut`, `estado`, `fecha_registro`) VALUES
(1, 1, 'Sony Music', '19150634-0', 'N', '2024-06-14'),
(2, 1, 'Plaza Independencia SpA.', '18752880-1', 'N', '2024-07-03'),
(3, 1, 'DiscoGS', '19150634-0', 'N', '2024-07-05'),
(4, 1, 'Angel Sepúlveda', '19150634-0', 'S', '2024-07-14'),
(5, 1, 'Claudio Werner', '19150634-0', 'N', '2024-07-17'),
(6, 1, 'Constanza Werner', '18752880-1', 'N', '2024-07-17'),
(7, 1, 'Claudio Werner', '19150634-0', 'N', '2024-07-17'),
(8, 1, 'Claudio Werner', '19150634-0', 'N', '2024-07-17'),
(9, 1, 'Claudio Werner', '4494605-k', 'N', '2024-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_minimo_producto`
--

CREATE TABLE `stock_minimo_producto` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `estado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stock_minimo_producto`
--

INSERT INTO `stock_minimo_producto` (`id`, `id_cl`, `estado`, `stock_minimo`) VALUES
(3, 1, 'S', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago_cliente`
--

CREATE TABLE `tipo_pago_cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_pago_cliente`
--

INSERT INTO `tipo_pago_cliente` (`id`, `nombre`) VALUES
(1, 'EFECTIVO'),
(2, 'TRANSFERENCIA'),
(3, 'TARJ. DÉBITO'),
(4, 'TARJ. CRÉDITO'),
(5, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades_medida`
--

CREATE TABLE `unidades_medida` (
  `id` int(11) NOT NULL,
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
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `estado` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `permisos` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fecha_reg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `user`, `pass`, `tipo_usuario`, `id_cl`, `estado`, `permisos`, `fecha_reg`) VALUES
(1, 'Admin', 'admin1', '$2y$10$hH.e2CNF7S3q6AuN6Yn1NuJL/04O4QzMXoBbjvdsw71XQ1/axlkeG', 1, 1, '', '1,2', '0000-00-00 00:00:00'),
(12, 'Admin', 'admin1', '$2y$10$VbU7YUru0XW./5ZKh0k9wO6qCXw944HeyVFhi5N8vcX06KDANheOG', 1, 1, 'S', '1,2', '0000-00-00 00:00:00'),
(13, 'Claudio', 'claudio1', '$2y$10$PhZl2jd3t4LfRYS1nVy/..liaDaJCDc1I.cdrE1Wa9FmjcCu96rRi', 2, 1, 'N', '2', '2024-07-18 12:32:39'),
(14, 'Claudio', 'claudio31', '$2y$10$Q0W6EEEPXroKWc4XruuOzuOA7lp5.Ymg5N5ZRrLsnL676CISBjgP6', 2, 1, 'N', '2', '0000-00-00 00:00:00'),
(15, 'Claudio', 'claudio321', '$2y$10$BOub1uPaoqw1HgIAl3Z6oeMJS94138ezC0wdA/0Ns8.vF1SB9h.wq', 2, 1, 'N', '2', '2024-07-18 12:34:08'),
(16, 'Claudio', 'claudio3211', '$2y$10$I0waDD22BTVRXBk2GYlLVueJrBGIEDRfxmSS/eODwJMEtMqko8Moe', 2, 1, 'N', '2', '2024-07-18 12:35:35'),
(17, 'Claudio', 'ventas11', '$2y$10$WfD24og0o10I3bcTngyfZOhl3mBYmQNpDdcIuGecUGBMVzjz68sSK', 2, 1, 'N', '2', '2024-07-19 13:42:36'),
(18, 'Claudio', 'admin11', '$2y$10$7ifDknDFnXeMrIH2k2R9we0B0YswTy2wEhJ3eNLOADI9h6WemkkNa', 2, 1, 'N', '2', '2024-07-19 13:44:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_caja` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descto` int(11) NOT NULL,
  `valorDescto` int(11) NOT NULL,
  `estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `forma_pago` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='								';

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_venta`, `id_cl`, `id_caja`, `usuario`, `producto`, `cantidad`, `valor`, `descto`, `valorDescto`, `estado`, `fecha`, `fecha_pago`, `forma_pago`) VALUES
(1, 1, '1', '1', 1, 20, '1', '400', 0, 0, 'C', '2024-06-28 12:44:42', '2024-06-28 12:45:34', '1'),
(2, 1, '1', '1', 1, 20, '1', '400', 0, 0, 'C', '2024-06-28 12:44:43', '2024-06-28 12:45:34', '1'),
(3, 1, '1', '1', 1, 20, '1', '400', 0, 0, 'C', '2024-06-28 12:44:44', '2024-06-28 12:45:34', '1'),
(4, 2, '1', '1', 1, 20, '1', '400', 0, 0, 'C', '2024-06-28 12:47:14', '2024-06-28 13:17:30', '1'),
(5, 2, '1', '1', 1, 20, '1', '400', 0, 0, 'C', '2024-06-28 12:47:16', '2024-06-28 13:17:30', '1'),
(6, 2, '1', '1', 1, 20, '1', '400', 0, 0, 'C', '2024-06-28 12:47:18', '2024-06-28 13:17:30', '1'),
(7, 2, '1', '1', 1, 20, '1', '400', 0, 0, 'C', '2024-06-28 12:47:21', '2024-06-28 13:17:30', '1'),
(8, 2, '1', '1', 1, 20, '1', '400', 0, 0, 'C', '2024-06-28 12:47:23', '2024-06-28 13:17:30', '1'),
(9, 5, '1', '1', 1, 51, '1', '1500', 0, 0, 'C', '2024-06-28 12:52:52', '2024-06-28 13:17:30', '1'),
(10, 5, '1', '1', 1, 51, '1', '1500', 0, 0, 'C', '2024-06-28 12:52:54', '2024-06-28 13:17:30', '1'),
(11, 4, '1', '1', 1, 53, '1', '1200', 0, 0, 'C', '2024-06-28 13:20:00', '2024-06-28 14:06:40', '1'),
(12, 4, '1', '1', 1, 70, '1', '1000', 0, 0, 'C', '2024-06-28 13:20:12', '2024-06-28 14:06:40', '1'),
(13, 3, '1', '1', 1, 54, '1', '1200', 0, 0, 'C', '2024-06-28 14:06:51', '2024-06-28 14:31:07', '2'),
(14, 3, '1', '1', 1, 54, '1', '1200', 0, 0, 'C', '2024-06-28 14:06:53', '2024-06-28 14:31:07', '2'),
(15, 3, '1', '1', 1, 54, '1', '1200', 0, 0, 'C', '2024-06-28 14:06:55', '2024-06-28 14:31:07', '2'),
(16, 3, '1', '1', 1, 54, '1', '1200', 0, 0, 'C', '2024-06-28 14:06:56', '2024-06-28 14:31:07', '2'),
(17, 6, '1', '1', 1, 53, '1', '1200', 0, 0, 'C', '2024-06-28 14:32:20', '2024-06-28 14:32:48', '1'),
(18, 6, '1', '1', 1, 53, '1', '1200', 0, 0, 'C', '2024-06-28 14:32:23', '2024-06-28 14:32:48', '1'),
(19, 6, '1', '1', 1, 53, '1', '1200', 0, 0, 'C', '2024-06-28 14:32:24', '2024-06-28 14:32:48', '1'),
(20, 7, '1', '1', 1, 99, '1', '1200', 0, 0, 'C', '2024-06-28 14:38:47', '2024-06-28 20:13:58', '1'),
(21, 7, '1', '1', 1, 99, '1', '1200', 0, 0, 'C', '2024-06-28 14:38:48', '2024-06-28 20:13:58', '1'),
(22, 7, '1', '1', 1, 99, '1', '1200', 0, 0, 'C', '2024-06-28 14:38:49', '2024-06-28 20:13:58', '1'),
(23, 7, '1', '1', 1, 99, '1', '1200', 0, 0, 'C', '2024-06-28 14:38:50', '2024-06-28 20:13:58', '1'),
(24, 8, '1', '1', 1, 83, '1', '400', 0, 0, 'C', '2024-06-28 14:41:03', '2024-06-28 20:13:58', '1'),
(25, 8, '1', '1', 1, 83, '1', '400', 0, 0, 'C', '2024-06-28 14:41:04', '2024-06-28 20:13:58', '1'),
(26, 8, '1', '1', 1, 83, '1', '400', 0, 0, 'C', '2024-06-28 14:41:04', '2024-06-28 20:13:58', '1'),
(27, 8, '1', '1', 1, 83, '1', '400', 0, 0, 'C', '2024-06-28 14:41:05', '2024-06-28 20:13:58', '1'),
(28, 8, '1', '1', 1, 83, '1', '400', 0, 0, 'C', '2024-06-28 14:41:05', '2024-06-28 20:13:58', '1'),
(29, 8, '1', '1', 1, 83, '1', '400', 0, 0, 'C', '2024-06-28 14:41:05', '2024-06-28 20:13:58', '1'),
(30, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:48', '0000-00-00 00:00:00', '0'),
(31, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:48', '0000-00-00 00:00:00', '0'),
(32, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:49', '0000-00-00 00:00:00', '0'),
(33, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:49', '0000-00-00 00:00:00', '0'),
(34, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:49', '0000-00-00 00:00:00', '0'),
(35, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:49', '0000-00-00 00:00:00', '0'),
(36, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:49', '0000-00-00 00:00:00', '0'),
(37, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:50', '0000-00-00 00:00:00', '0'),
(38, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:50', '0000-00-00 00:00:00', '0'),
(39, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:50', '0000-00-00 00:00:00', '0'),
(40, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:50', '0000-00-00 00:00:00', '0'),
(41, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:50', '0000-00-00 00:00:00', '0'),
(42, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:50', '0000-00-00 00:00:00', '0'),
(43, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:51', '0000-00-00 00:00:00', '0'),
(44, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:51', '0000-00-00 00:00:00', '0'),
(45, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:51', '0000-00-00 00:00:00', '0'),
(46, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:51', '0000-00-00 00:00:00', '0'),
(47, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:51', '0000-00-00 00:00:00', '0'),
(48, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:52', '0000-00-00 00:00:00', '0'),
(49, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:52', '0000-00-00 00:00:00', '0'),
(50, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:53', '0000-00-00 00:00:00', '0'),
(51, 9, '1', '1', 1, 50, '1', '250', 0, 0, 'N', '2024-06-29 20:14:53', '0000-00-00 00:00:00', '0'),
(52, 9, '1', '1', 1, 50, '1', '250', 0, 250, 'C', '2024-06-29 20:14:54', '2024-06-28 20:20:06', '2'),
(53, 9, '1', '1', 1, 50, '1', '250', 0, 250, 'C', '2024-06-29 20:14:54', '2024-06-28 20:20:06', '2'),
(54, 9, '1', '1', 1, 102, '1', '400', 0, 400, 'C', '2024-06-29 20:18:59', '2024-06-28 20:20:06', '2'),
(55, 10, '1', '1', 1, 102, '1', '400', 0, 0, 'C', '2024-06-29 20:20:23', '2024-06-28 21:05:50', '1'),
(56, 10, '1', '1', 1, 102, '1', '400', 0, 0, 'C', '2024-06-29 20:20:26', '2024-06-28 21:05:50', '1'),
(57, 10, '1', '1', 1, 102, '1', '400', 0, 0, 'C', '2024-06-29 20:20:28', '2024-06-28 21:05:50', '1'),
(58, 10, '1', '1', 1, 99, '1', '1200', 0, 0, 'C', '2024-06-29 20:20:42', '2024-06-28 21:05:50', '1'),
(59, 11, '1', '1', 1, 99, '1', '1200', 0, 0, 'C', '2024-06-29 20:21:00', '2024-06-28 21:05:50', '1'),
(60, 11, '1', '1', 1, 99, '1', '1200', 0, 0, 'C', '2024-06-29 20:21:04', '2024-06-28 21:05:50', '1'),
(61, 11, '1', '1', 1, 70, '1', '1000', 0, 0, 'C', '2024-06-29 20:21:50', '2024-06-28 21:05:50', '1'),
(62, 12, '1', '1', 1, 70, '1', '1000', 0, 0, 'C', '2024-06-29 20:21:59', '2024-06-28 21:07:02', '1'),
(63, 12, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-06-29 20:22:06', '2024-06-28 21:07:02', '1'),
(64, 12, '1', '1', 1, 70, '1', '1000', 0, 0, 'C', '2024-06-29 20:22:09', '2024-06-28 21:07:02', '1'),
(65, 12, '1', '1', 1, 70, '1', '1000', 0, 0, 'C', '2024-06-29 20:22:13', '2024-06-28 21:07:02', '1'),
(66, 15, '1', '1', 1, 67, '1', '400', 0, 0, 'N', '2024-07-01 14:52:23', '2024-07-01 14:52:35', '0'),
(67, 16, '1', '1', 1, 67, '1', '400', 0, 0, 'N', '2024-07-01 15:00:05', '2024-07-01 15:17:18', '0'),
(68, 16, '1', '1', 1, 67, '1', '400', 0, 0, 'N', '2024-07-01 15:05:02', '2024-07-01 15:17:18', '0'),
(69, 16, '1', '1', 1, 67, '1', '400', 0, 0, 'N', '2024-07-01 15:08:20', '2024-07-01 15:17:18', '0'),
(70, 16, '1', '1', 1, 67, '1', '400', 0, 0, 'N', '2024-07-01 15:08:51', '2024-07-01 15:17:18', '0'),
(71, 16, '1', '1', 1, 67, '1', '400', 0, 0, 'N', '2024-07-01 15:12:10', '2024-07-01 15:17:18', '0'),
(72, 18, '1', '1', 1, 67, '1', '400', 0, 0, 'C', '2024-07-01 15:19:03', '2024-07-01 15:22:26', '1'),
(73, 17, '1', '1', 1, 67, '1', '400', 0, 0, 'C', '2024-07-01 15:23:23', '2024-07-01 15:37:39', '1'),
(74, 14, '1', '1', 1, 67, '1', '400', 0, 0, 'C', '2024-07-01 15:36:45', '2024-07-01 15:37:39', '1'),
(75, 19, '1', '1', 1, 67, '1', '400', 0, 0, 'C', '2024-07-01 15:37:01', '2024-07-01 15:37:39', '1'),
(76, 19, '1', '1', 1, 67, '1', '400', 0, 0, 'C', '2024-07-01 15:37:10', '2024-07-01 15:37:39', '1'),
(77, 20, '1', '1', 1, 68, '1', '1000', 0, 0, 'C', '2024-07-01 15:39:37', '2024-07-01 15:44:30', '1'),
(78, 21, '1', '1', 1, 78, '1', '1000', 0, 0, 'N', '2024-07-01 15:39:48', '2024-07-01 15:40:29', '0'),
(79, 21, '1', '1', 1, 78, '1', '1000', 0, 0, 'N', '2024-07-01 15:40:16', '2024-07-01 15:40:29', '0'),
(80, 21, '1', '1', 1, 78, '1', '1000', 0, 0, 'N', '2024-07-01 15:40:17', '2024-07-01 15:40:29', '0'),
(81, 21, '1', '1', 1, 78, '1', '1000', 0, 0, 'N', '2024-07-01 15:40:19', '2024-07-01 15:40:29', '0'),
(82, 21, '1', '1', 1, 78, '1', '1000', 0, 0, 'N', '2024-07-01 15:40:19', '2024-07-01 15:40:29', '0'),
(83, 21, '1', '1', 1, 78, '1', '1000', 0, 0, 'N', '2024-07-01 15:40:19', '2024-07-01 15:40:29', '0'),
(84, 21, '1', '1', 1, 78, '1', '1000', 0, 0, 'N', '2024-07-01 15:40:19', '2024-07-01 15:40:29', '0'),
(85, 23, '1', '1', 1, 68, '1', '1000', 0, 0, 'C', '2024-07-01 15:46:04', '2024-07-01 15:47:40', '3'),
(86, 23, '1', '1', 1, 68, '1', '1000', 0, 0, 'C', '2024-07-01 15:46:05', '2024-07-01 15:47:40', '3'),
(87, 23, '1', '1', 1, 68, '1', '1000', 0, 0, 'C', '2024-07-01 15:46:05', '2024-07-01 15:47:40', '3'),
(88, 23, '1', '1', 1, 84, '1', '400', 0, 0, 'C', '2024-07-01 15:46:18', '2024-07-01 15:47:40', '3'),
(89, 23, '1', '1', 1, 84, '1', '400', 0, 0, 'C', '2024-07-01 15:46:18', '2024-07-01 15:47:40', '3'),
(90, 23, '1', '1', 1, 84, '1', '400', 0, 0, 'C', '2024-07-01 15:46:19', '2024-07-01 15:47:40', '3'),
(91, 22, '1', '1', 1, 68, '1', '1000', 0, 0, 'N', '2024-07-01 15:47:07', '2024-07-01 15:48:59', '3'),
(92, 22, '1', '1', 1, 78, '1', '1000', 0, 0, 'N', '2024-07-01 15:47:13', '2024-07-01 15:48:59', '3'),
(93, 39, '1', '1', 1, 78, '1', '1000', 0, 0, 'A', '2024-07-09 19:42:18', '0000-00-00 00:00:00', '0'),
(94, 41, '1', '1', 1, 62, '1', '500', 0, 0, 'A', '2024-07-10 20:40:53', '0000-00-00 00:00:00', '0'),
(95, 41, '1', '1', 1, 78, '1', '1000', 0, 0, 'A', '2024-07-10 20:41:09', '0000-00-00 00:00:00', '0'),
(96, 41, '1', '1', 1, 80, '1', '1000', 0, 0, 'A', '2024-07-10 20:41:15', '0000-00-00 00:00:00', '0'),
(97, 42, '1', '1', 1, 78, '1', '1000', 0, 0, 'A', '2024-07-10 20:46:12', '0000-00-00 00:00:00', '0'),
(98, 42, '1', '1', 1, 78, '1', '1000', 0, 0, 'A', '2024-07-10 20:46:13', '0000-00-00 00:00:00', '0'),
(99, 42, '1', '1', 1, 78, '1', '1000', 0, 0, 'A', '2024-07-10 20:46:13', '0000-00-00 00:00:00', '0'),
(100, 42, '1', '1', 1, 78, '1', '1000', 0, 0, 'A', '2024-07-10 20:46:13', '0000-00-00 00:00:00', '0'),
(101, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:54', '2024-07-10 18:20:40', '2'),
(102, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:55', '2024-07-10 18:20:40', '2'),
(103, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:55', '2024-07-10 18:20:40', '2'),
(104, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:55', '2024-07-10 18:20:40', '2'),
(105, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:55', '2024-07-10 18:20:40', '2'),
(106, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:55', '2024-07-10 18:20:40', '2'),
(107, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:56', '2024-07-10 18:20:40', '2'),
(108, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:56', '2024-07-10 18:20:40', '2'),
(109, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:56', '2024-07-10 18:20:40', '2'),
(110, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:56', '2024-07-10 18:20:40', '2'),
(111, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:56', '2024-07-10 18:20:40', '2'),
(112, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:56', '2024-07-10 18:20:40', '2'),
(113, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:57', '2024-07-10 18:20:40', '2'),
(114, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:57', '2024-07-10 18:20:40', '2'),
(115, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:57', '2024-07-10 18:20:40', '2'),
(116, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:57', '2024-07-10 18:20:40', '2'),
(117, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:57', '2024-07-10 18:20:40', '2'),
(118, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:58', '2024-07-10 18:20:40', '2'),
(119, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:58', '2024-07-10 18:20:40', '2'),
(120, 43, '1', '1', 1, 78, '1', '1000', 0, 0, 'C', '2024-07-10 20:48:58', '2024-07-10 18:20:40', '2'),
(121, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:03', '2024-07-10 19:11:21', '2'),
(122, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:04', '2024-07-10 19:11:21', '2'),
(123, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:04', '2024-07-10 19:11:21', '2'),
(124, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:04', '2024-07-10 19:11:21', '2'),
(125, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:04', '2024-07-10 19:11:21', '2'),
(126, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:04', '2024-07-10 19:11:21', '2'),
(127, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:05', '2024-07-10 19:11:21', '2'),
(128, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:05', '2024-07-10 19:11:21', '2'),
(129, 45, '1', '1', 1, 80, '1', '1000', 0, 0, 'C', '2024-07-11 18:33:05', '2024-07-10 19:11:21', '2'),
(130, 46, '1', '1', 1, 7, '1', '700', 0, 0, 'P', '2024-07-11 13:15:13', '0000-00-00 00:00:00', '0'),
(131, 46, '1', '1', 1, 7, '1', '700', 0, 0, 'P', '2024-07-11 13:15:13', '0000-00-00 00:00:00', '0'),
(132, 46, '1', '1', 1, 7, '1', '700', 0, 0, 'P', '2024-07-11 13:15:14', '0000-00-00 00:00:00', '0'),
(133, 49, '1', '8', 1, 17, '4', '2800', 0, 0, 'C', '2024-07-14 14:13:03', '2024-07-14 14:15:05', '1'),
(134, 50, '1', '8', 1, 17, '1', '700', 0, 0, 'N', '2024-07-19 14:11:54', '0000-00-00 00:00:00', '0'),
(135, 51, '1', '8', 1, 17, '1', '700', 0, 0, 'A', '2024-07-19 14:18:54', '0000-00-00 00:00:00', '0'),
(136, 52, '1', '8', 1, 17, '1', '700', 0, 0, 'A', '2024-07-19 14:24:41', '0000-00-00 00:00:00', '0'),
(137, 53, '1', '8', 1, 17, '1', '700', 0, 0, 'A', '2024-07-19 14:25:29', '0000-00-00 00:00:00', '0'),
(138, 54, '1', '8', 1, 17, '1', '700', 0, 0, 'A', '2024-07-19 14:26:51', '0000-00-00 00:00:00', '0'),
(139, 55, '1', '8', 1, 17, '1', '700', 0, 0, 'N', '2024-07-19 14:28:03', '0000-00-00 00:00:00', '0'),
(140, 56, '1', '8', 1, 17, '1', '700', 0, 0, 'N', '2024-07-19 14:32:44', '0000-00-00 00:00:00', '0'),
(141, 56, '1', '8', 1, 17, '1', '700', 0, 0, 'N', '2024-07-19 14:33:22', '0000-00-00 00:00:00', '0'),
(142, 57, '1', '8', 1, 17, '1', '700', 0, 0, 'N', '2024-07-19 14:34:03', '0000-00-00 00:00:00', '0'),
(143, 58, '1', '8', 1, 17, '1', '700', 0, 0, 'N', '2024-07-19 14:34:52', '0000-00-00 00:00:00', '0'),
(144, 59, '1', '8', 1, 17, '1', '700', 0, 0, 'N', '2024-07-19 14:36:12', '0000-00-00 00:00:00', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anula_cajas`
--
ALTER TABLE `anula_cajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_categoria`
--
ALTER TABLE `anula_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_clientes`
--
ALTER TABLE `anula_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_pedidos`
--
ALTER TABLE `anula_pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_productos`
--
ALTER TABLE `anula_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_proveedor`
--
ALTER TABLE `anula_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_turnos`
--
ALTER TABLE `anula_turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `anula_usuario`
--
ALTER TABLE `anula_usuario`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cl` (`id_cl`);

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
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
-- Indices de la tabla `clientes_negocio`
--
ALTER TABLE `clientes_negocio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuenta_corriente`
--
ALTER TABLE `cuenta_corriente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `giros`
--
ALTER TABLE `giros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `margen_ganancia`
--
ALTER TABLE `margen_ganancia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monto_caja`
--
ALTER TABLE `monto_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motivo_mov_monto_caja`
--
ALTER TABLE `motivo_mov_monto_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago_cliente`
--
ALTER TABLE `pago_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pass_provisoria`
--
ALTER TABLE `pass_provisoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `stock_minimo_producto`
--
ALTER TABLE `stock_minimo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_pago_cliente`
--
ALTER TABLE `tipo_pago_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
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
-- AUTO_INCREMENT de la tabla `anula_cajas`
--
ALTER TABLE `anula_cajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `anula_categoria`
--
ALTER TABLE `anula_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `anula_clientes`
--
ALTER TABLE `anula_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `anula_pedidos`
--
ALTER TABLE `anula_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `anula_productos`
--
ALTER TABLE `anula_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `anula_proveedor`
--
ALTER TABLE `anula_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `anula_turnos`
--
ALTER TABLE `anula_turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `anula_usuario`
--
ALTER TABLE `anula_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `anula_ventas`
--
ALTER TABLE `anula_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `autorizacion`
--
ALTER TABLE `autorizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes_negocio`
--
ALTER TABLE `clientes_negocio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `cuenta_corriente`
--
ALTER TABLE `cuenta_corriente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `margen_ganancia`
--
ALTER TABLE `margen_ganancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `monto_caja`
--
ALTER TABLE `monto_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT de la tabla `motivo_mov_monto_caja`
--
ALTER TABLE `motivo_mov_monto_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pago_cliente`
--
ALTER TABLE `pago_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pass_provisoria`
--
ALTER TABLE `pass_provisoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `stock_minimo_producto`
--
ALTER TABLE `stock_minimo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidades_medida`
--
ALTER TABLE `unidades_medida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
