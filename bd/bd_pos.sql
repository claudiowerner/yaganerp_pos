-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-08-2023 a las 03:48:11
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
  `anulado_por` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anula_categoria`
--

INSERT INTO `anula_categoria` (`id`, `id_cl`, `id_categoria`, `anulado_por`, `fecha`) VALUES
(1, 1, 1, 'Admin', '2023-06-26 14:26:35'),
(2, 1, 1, 'Admin', '2023-06-26 14:26:39');

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

--
-- Volcado de datos para la tabla `anula_productos`
--

INSERT INTO `anula_productos` (`id`, `id_cl`, `id_producto`, `anulado_por`, `fecha`) VALUES
(1, '1', 10, 'Admin', '2023-06-26 14:36:53'),
(2, '1', 1, 'Admin', '2023-06-26 16:35:35'),
(3, '1', 1, 'Admin', '2023-06-27 16:26:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anula_proveedor`
--

CREATE TABLE `anula_proveedor` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `anulado_por` varchar(10) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Volcado de datos para la tabla `anula_ventas`
--

INSERT INTO `anula_ventas` (`id`, `id_cl`, `id_venta`, `anulado_por`, `fecha`) VALUES
(1, '1', 30, 'Admin', '2023-07-28 19:44:13'),
(2, '1', 31, 'Admin', '2023-07-28 19:44:15'),
(3, '1', 32, 'Admin', '2023-07-28 19:44:16'),
(4, '1', 33, 'Admin', '2023-07-28 19:44:16'),
(5, '1', 34, 'Admin', '2023-07-28 19:44:17'),
(6, '1', 35, 'Admin', '2023-07-28 19:44:18'),
(7, '1', 36, 'Admin', '2023-07-28 19:44:19'),
(8, '1', 37, 'Admin', '2023-07-28 19:44:20'),
(9, '1', 38, 'Admin', '2023-07-28 19:44:21'),
(10, '1', 39, 'Admin', '2023-07-28 19:44:22'),
(11, '1', 40, 'Admin', '2023-07-28 19:44:24'),
(12, '1', 41, 'Admin', '2023-07-28 19:44:24'),
(13, '1', 42, 'Admin', '2023-07-28 19:44:25'),
(14, '1', 43, 'Admin', '2023-07-28 19:44:25'),
(15, '1', 44, 'Admin', '2023-07-28 19:44:25'),
(16, '1', 45, 'Admin', '2023-07-28 19:44:26');

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
  `id_cl` varchar(5) NOT NULL,
  `nom_caja` varchar(45) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `creado_por` varchar(45) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id`, `id_cl`, `nom_caja`, `estado`, `creado_por`, `fecha_reg`) VALUES
(1, '1', 'C01', 'S', '1', '2023-05-15'),
(2, '1', 'C02', 'S', '1', '2023-05-15'),
(3, '1', 'C03', 'S', '1', '2023-05-15'),
(4, '1', 'C04', 'S', '1', '2023-05-26'),
(5, '1', 'C05', 'S', '1', '2023-06-28'),
(6, '1', 'C06', 'S', '1', '2023-06-28');

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

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `id_cl`, `nombre_cat`, `estado`, `creado_por`, `fecha_reg`) VALUES
(1, '1', 'Galletas', 'S', 'Admin', '2023-06-15'),
(2, '1', 'CD', 'S', 'Admin', '2023-06-15'),
(3, '1', 'Vinilo', 'S', 'Admin', '2023-06-15'),
(4, '1', 'Cassette', 'S', 'Admin', '2023-06-15'),
(5, '1', 'Pan', 'S', 'Admin', '2023-06-20'),
(6, '1', 'Golosinas', 'S', 'Admin', '2023-06-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_caja`
--

CREATE TABLE `cierre_caja` (
  `id` int(11) NOT NULL,
  `id_cl` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `creado_por` varchar(5) NOT NULL,
  `desde` datetime NOT NULL,
  `hasta` datetime DEFAULT NULL,
  `estado` varchar(5) NOT NULL,
  `valor_total` varchar(145) NOT NULL,
  `fecha_reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cierre_caja`
--

INSERT INTO `cierre_caja` (`id`, `id_cl`, `nombre`, `creado_por`, `desde`, `hasta`, `estado`, `valor_total`, `fecha_reg`) VALUES
(1, 1, 'Caja 14-07-2023', '1', '2023-07-14 17:49:04', '2023-07-19 15:28:29', 'C', '165990', '2023-07-14 17:49:04'),
(2, 1, 'Caja 25-07-2023', '1', '2023-07-25 15:36:51', '0000-00-00 00:00:00', 'A', '645940', '2023-07-25 15:36:51');

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
(1, '1', '19150634-0', 'Supermercado de prueba', 'Prueba S.A.', 'Camping Playa Werner 0000', 'claudiowernern@hotmail.com', '+56978841411');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_negocio`
--

CREATE TABLE `clientes_negocio` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_cl` varchar(5) NOT NULL,
  `caja` varchar(25) NOT NULL,
  `nom_caja` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `boleta` varchar(50) NOT NULL,
  `forma_pago` int(11) NOT NULL,
  `id_cierre` varchar(5) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_cierre` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='	';

--
-- Volcado de datos para la tabla `correlativo`
--

INSERT INTO `correlativo` (`id`, `correlativo`, `id_cl`, `caja`, `nom_caja`, `usuario`, `valor`, `boleta`, `forma_pago`, `id_cierre`, `estado`, `fecha`, `fecha_cierre`) VALUES
(1, 1, '1', '1', 'C01', '1', '27000', '3', 1, '1', 'C', '2023-07-14 17:49:46', '2023-07-14 17:50:29'),
(2, 2, '1', '2', 'C02', '1', '35000', '4', 3, '1', 'C', '2023-07-14 17:50:53', '2023-07-14 17:51:06'),
(3, 3, '1', '3', 'C03', '1', '35000', '5', 2, '1', 'C', '2023-07-14 17:51:29', '2023-07-14 17:52:00'),
(4, 4, '1', '4', 'C04', '1', '14990', '6', 1, '1', 'C', '2023-07-14 17:54:31', '2023-07-14 17:54:48'),
(5, 5, '1', '1', 'C01', '1', '0', '6', 0, '1', 'N', '2023-07-15 18:12:55', '2023-07-19 15:28:29'),
(6, 6, '1', '2', 'C02', '1', '0', '6', 0, '1', 'N', '2023-07-15 18:29:18', '2023-07-19 15:28:29'),
(7, 7, '1', '1', 'C01', '1', '0', '6', 0, '1', 'N', '2023-07-15 18:32:33', '2023-07-19 15:28:29'),
(8, 8, '1', '1', 'C01', '1', '0', '6', 0, '1', 'N', '2023-07-15 19:12:36', '2023-07-19 15:28:29'),
(9, 9, '1', '1', 'C01', '1', '0', '6', 0, '1', 'N', '2023-07-15 19:16:46', '2023-07-19 15:28:29'),
(10, 10, '1', '1', 'C01', '1', '27000', '8', 3, '1', 'C', '2023-07-15 19:17:02', '2023-07-19 13:28:38'),
(11, 11, '1', '1', 'C01', '1', '27000', '7', 2, '1', 'C', '2023-07-19 20:15:44', '2023-07-18 20:46:14'),
(12, 12, '1', '1', 'C01', '1', '0', '8', 0, '1', 'N', '2023-07-19 13:33:41', '2023-07-19 15:28:29'),
(13, 13, '1', '1', 'C01', '2', '0', '8', 0, '1', 'N', '2023-07-19 15:27:52', '2023-07-19 15:28:29'),
(14, 14, '1', '1', 'C01', '1', '0', '8', 0, '2', 'A', '2023-07-25 15:36:55', '0000-00-00 00:00:00'),
(15, 15, '1', '1', 'C01', '1', '0', '8', 0, '2', 'A', '2023-07-26 16:37:18', '0000-00-00 00:00:00'),
(16, 16, '1', '2', 'C02', '1', '0', '8', 0, '2', 'A', '2023-07-27 18:46:52', '0000-00-00 00:00:00'),
(17, 17, '1', '1', 'C01', '1', '0', '8', 0, '2', 'A', '2023-07-27 18:58:06', '0000-00-00 00:00:00'),
(18, 18, '1', '1', 'C01', '1', '27000', '21', 1, '2', 'C', '2023-07-27 19:02:15', '2023-07-27 16:05:20'),
(19, 19, '1', '1', 'C01', '1', '0', '8', 0, '2', 'A', '2023-07-27 16:05:47', '0000-00-00 00:00:00'),
(20, 20, '1', '1', 'C01', '1', '0', '8', 0, '2', 'A', '2023-07-27 16:10:18', '0000-00-00 00:00:00'),
(21, 21, '1', '1', 'C01', '1', '0', '8', 0, '2', 'A', '2023-07-27 16:50:40', '0000-00-00 00:00:00'),
(22, 22, '1', '1', 'C01', '1', '0', '8', 0, '2', 'A', '2023-07-27 16:55:29', '0000-00-00 00:00:00'),
(23, 23, '1', '1', 'C01', '1', '0', '8', 0, '2', 'A', '2023-07-27 17:16:52', '0000-00-00 00:00:00'),
(24, 24, '1', '1', 'C01', '1', '99980', '9', 1, '2', 'C', '2023-07-27 17:23:28', '2023-07-27 17:24:22'),
(25, 25, '1', '1', 'C01', '1', '0', '9', 0, '2', 'A', '2023-07-27 17:26:13', '0000-00-00 00:00:00'),
(26, 26, '1', '1', 'C01', '1', '0', '9', 0, '2', 'A', '2023-07-27 17:34:18', '0000-00-00 00:00:00'),
(27, 27, '1', '1', 'C01', '1', '0', '9', 0, '2', 'A', '2023-07-27 17:38:19', '0000-00-00 00:00:00'),
(28, 28, '1', '1', 'C01', '1', '311990', '12', 2, '2', 'C', '2023-07-28 18:05:34', '2023-07-28 14:28:37'),
(29, 29, '1', '1', 'C01', '1', '106990', '13', 1, '2', 'C', '2023-07-28 18:22:41', '2023-07-27 19:38:38'),
(30, 30, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:41:10', '2023-07-28 19:44:13'),
(31, 31, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:13', '2023-07-28 19:44:15'),
(32, 32, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:15', '2023-07-28 19:44:16'),
(33, 33, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:16', '2023-07-28 19:44:16'),
(34, 34, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:16', '2023-07-28 19:44:17'),
(35, 35, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:17', '2023-07-28 19:44:18'),
(36, 36, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:18', '2023-07-28 19:44:19'),
(37, 37, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:19', '2023-07-28 19:44:20'),
(38, 38, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:20', '2023-07-28 19:44:21'),
(39, 39, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:21', '2023-07-28 19:44:22'),
(40, 40, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:22', '2023-07-28 19:44:24'),
(41, 41, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:24', '2023-07-28 19:44:24'),
(42, 42, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:24', '2023-07-28 19:44:25'),
(43, 43, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:25', '2023-07-28 19:44:25'),
(44, 44, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:25', '2023-07-28 19:44:25'),
(45, 45, '1', '1', 'C01', '1', '0', '9', 0, '2', 'N', '2023-07-28 19:44:25', '2023-07-28 19:44:26'),
(46, 46, '1', '1', 'C01', '1', '54000', '10', 3, '2', 'C', '2023-07-28 19:44:26', '2023-07-27 20:09:49'),
(47, 47, '1', '1', 'C01', '1', '27000', '11', 3, '2', 'C', '2023-07-28 20:10:11', '2023-07-27 20:10:46'),
(48, 48, '1', '1', 'C01', '1', '18980', '10', 3, '2', 'C', '2023-07-28 14:28:43', '2023-07-28 14:29:37'),
(49, 49, '1', '1', 'C01', '1', '0', '9', 0, '2', 'A', '2023-08-02 15:15:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas_corrientes`
--

CREATE TABLE `cuentas_corrientes` (
  `id` int(5) DEFAULT NULL,
  `id_cl` int(5) DEFAULT NULL,
  `rut` varchar(10) DEFAULT NULL,
  `id_venta` int(5) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_corriente`
--

CREATE TABLE `cuenta_corriente` (
  `id` int(10) NOT NULL,
  `id_cl` int(10) DEFAULT NULL,
  `rut` varchar(12) DEFAULT NULL,
  `correlativo` int(10) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta_corriente`
--

INSERT INTO `cuenta_corriente` (`id`, `id_cl`, `rut`, `correlativo`, `estado`, `fecha`) VALUES
(1, 1, '19150634-0', 14, 'A', '2023-07-25'),
(2, 1, '19150634-0', 16, 'A', '2023-07-26'),
(3, 1, '19150634-0', 17, 'A', '2023-07-26'),
(4, 1, '19150634-0', 22, 'A', '2023-07-27'),
(5, 1, '19150634-0', 23, 'A', '2023-07-27'),
(6, 1, '19150634-0', 26, 'A', '2023-07-27'),
(7, 1, '19150634-0', 27, 'A', '2023-07-27'),
(8, 1, '19150634-0', 28, 'A', '2023-07-27'),
(9, 1, '19150634-0', 28, 'A', '2023-07-27'),
(10, 1, '19150634-0', 28, 'A', '2023-07-27'),
(11, 1, '19150634-0', 28, 'A', '2023-07-27'),
(12, 1, '19150634-0', 28, 'A', '2023-07-27'),
(13, 1, '19150634-0', 28, 'A', '2023-07-27'),
(14, 1, '19150634-0', 28, 'A', '2023-07-27'),
(15, 1, '19150634-0', 28, 'A', '2023-07-27'),
(16, 1, '19150634-0', 28, 'A', '2023-07-27'),
(17, 1, '18752880-1', 29, 'A', '2023-07-27'),
(18, 1, '19150634-0', 27, 'A', '2023-07-28'),
(19, 1, '19150634-0', 27, 'A', '2023-07-28'),
(20, 1, '19150634-0', 27, 'A', '2023-07-28'),
(21, 1, '19150634-0', 27, 'A', '2023-07-28'),
(22, 1, '19150634-0', 27, 'A', '2023-07-28'),
(23, 1, '19150634-0', 27, 'A', '2023-07-28'),
(24, 1, '19150634-0', 27, 'A', '2023-07-28');

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
(3, 0, 'Tarj. Débito', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `id_proveedor` int(5) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `creado_por` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9, 1, 2, 'C', 1, '2023-08-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalle`
--

CREATE TABLE `pedidos_detalle` (
  `id` int(5) NOT NULL,
  `id_cl` int(5) NOT NULL,
  `id_pedido` int(5) NOT NULL,
  `producto` varchar(45) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `valor` int(9) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos_detalle`
--

INSERT INTO `pedidos_detalle` (`id`, `id_cl`, `id_pedido`, `producto`, `cantidad`, `valor`, `fecha_reg`) VALUES
(50, 1, 1, 'Chocolate', 1, 10000, '2023-08-07'),
(60, 1, 6, 'Cola de tigre', 10, 2000, '2023-08-07'),
(62, 1, 2, 'Crazy Frambuesa', 1, 12000, '2023-08-07'),
(63, 1, 2, 'Mega ', 1, 12000, '2023-08-07'),
(65, 1, 2, 'Iron Maiden', 1, 13000, '2023-08-07'),
(66, 1, 2, 'maxibom', 1, 12000, '2023-08-07'),
(67, 1, 1, 'jajajaja', 1, 1000, '2023-08-07'),
(68, 1, 1, 'qwe', 11, 1000, '2023-08-07'),
(70, 1, 1, 'Memoria Ram Kingston ', 12, 35990, '2023-08-08'),
(71, 1, 1, '123', 1, 1, '2023-08-08'),
(72, 1, 1, '123', 1, 1, '2023-08-08'),
(73, 1, 1, '123', 1, 12, '2023-08-08'),
(74, 1, 1, '123', 123, 123, '2023-08-08'),
(75, 1, 3, '123', 123, 123, '2023-08-08'),
(76, 1, 3, '234', 123, 123, '2023-08-08'),
(77, 1, 1, '123', 123, 123, '2023-08-08'),
(78, 1, 1, '456', 456, 456, '2023-08-08'),
(79, 1, 9, 'Chocolito', 5, 12590, '2023-08-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(5) NOT NULL,
  `id_cl` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `codigo_barra` varchar(100) NOT NULL,
  `nombre_prod` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `categoria` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cantidad` int(5) NOT NULL,
  `pesaje` varchar(5) NOT NULL,
  `unidad_medida` int(5) DEFAULT NULL,
  `valor_neto` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `valor_venta` varchar(7) CHARACTER SET latin2 COLLATE latin2_general_ci NOT NULL,
  `estado` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `creado_por` varchar(45) NOT NULL,
  `fecha_reg` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `id_cl`, `codigo_barra`, `nombre_prod`, `categoria`, `cantidad`, `pesaje`, `unidad_medida`, `valor_neto`, `valor_venta`, `estado`, `creado_por`, `fecha_reg`) VALUES
(1, '1', '840705109369', 'Foo Fighters - Glasstonbury 2017 - pt2', '3', 100, 'N', 1, '15000', '27000', 'S', '1', '2023-06-15'),
(2, '1', '7804612579427', '31 Minutos - 31 canciones de amor - 2012', '2', 98, 'N', 1, '3600', '8990', 'S', '1', '2023-06-15'),
(3, '1', '2292547192', 'Luis Miguel - Soy Como Quiero Ser', '2', 92, 'N', 1, '5000', '9990', 'S', '1', '2023-06-16'),
(4, '1', '5099747618642', 'Los Tres - Fome', '4', 100, 'N', 1, '20000', '35000', 'S', '1', '2023-06-16'),
(5, '1', '5099747609640', 'Los Tres - Unplugged', '4', 100, 'N', 1, '20000', '35000', 'S', '1', '2023-06-16'),
(6, '1', '886971408027', 'Soda Stereo - Último Concierto A', '2', 100, 'N', 1, '10000', '14990', 'S', '1', '2023-06-17'),
(7, '1', '886971408126', 'Soda Stereo - Último Concierto B', '2', 95, 'N', 1, '10000', '14990', 'S', '1', '2023-06-17'),
(8, '1', '7804612579434', '31 Minutos - Ratoncitos - 2012', '2', 93, 'N', 1, '5000', '8990', 'S', '1', '2023-06-17'),
(9, '1', '00000000000000', 'Pan', '5', 100, 'S', 2, '3500', '3500', 'S', '1', '2023-06-20'),
(16, '1', '7802800521135', 'Te Orjas', '4', 100, 'N', 1, '2500', '3000', 'S', '1', '2023-06-30'),
(17, '1', '720642442029', 'Guns n Roses - Use Your Illusion II ', '2', 100, 'N', 1, '5500', '11000', 'S', '1', '2023-07-03'),
(18, '1', '7808226007529', 'Difuntos Correa - Ilusionismo', '2', 100, 'N', 1, '12000', '18000', 'S', '1', '2023-07-03'),
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
  `nombre_proveedor` varchar(45) DEFAULT NULL,
  `rut` varchar(45) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Estructura de tabla para la tabla `unidades_medida`
--

CREATE TABLE `unidades_medida` (
  `id` int(5) NOT NULL,
  `nombre_medida` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `estado` varchar(5) NOT NULL,
  `permisos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `user`, `pass`, `tipo_usuario`, `id_cl`, `estado`, `permisos`) VALUES
(1, 'Admin', 'admin', 'admin', 1, 1, 'S', '1,2,3,4'),
(2, 'Cajero', 'cajero', 'cajero', 2, 1, 'S', '2,3,4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_cl` varchar(5) NOT NULL,
  `id_caja` varchar(5) NOT NULL,
  `nom_caja` varchar(25) NOT NULL,
  `usuario` int(5) NOT NULL,
  `producto` int(5) NOT NULL,
  `cantidad` varchar(20) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `forma_pago` varchar(45) DEFAULT NULL,
  `des` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='								';

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_venta`, `id_cl`, `id_caja`, `nom_caja`, `usuario`, `producto`, `cantidad`, `valor`, `estado`, `fecha`, `fecha_pago`, `forma_pago`, `des`) VALUES
(1, 1, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-14 17:49:55', '2023-07-14 17:50:00', '2', '0'),
(2, 2, '1', '2', 'C02', 1, 4, '1', '35000', 'C', '2023-07-14 17:50:59', '2023-07-14 17:51:06', '3', '0'),
(3, 3, '1', '3', 'C03', 1, 5, '1', '35000', 'C', '2023-07-14 17:51:48', '2023-07-14 17:52:00', '2', '0'),
(4, 4, '1', '4', 'C04', 1, 6, '1', '14990', 'C', '2023-07-14 17:54:43', '2023-07-14 17:54:48', '1', '0'),
(5, 11, '1', '1', 'C01', 1, 0, '1', '0', 'C', '2023-07-19 20:44:16', '2023-07-18 20:46:14', '2', '0'),
(6, 11, '1', '1', 'C01', 1, 0, '1', '0', 'C', '2023-07-19 20:44:17', '2023-07-18 20:46:14', '2', '0'),
(7, 11, '1', '1', 'C01', 1, 1, '1', '27000', 'N', '2023-07-19 20:44:19', '0000-00-00 00:00:00', '0', '0'),
(8, 11, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-19 20:46:07', '2023-07-18 20:46:14', '2', '0'),
(9, 10, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-19 13:28:30', '2023-07-19 13:28:38', '3', '0'),
(10, 14, '1', '1', 'C01', 1, 1, '1', '27000', 'N', '2023-07-25 15:40:56', '0000-00-00 00:00:00', '0', '0'),
(11, 14, '1', '1', 'C01', 1, 1, '1', '27000', 'N', '2023-07-25 15:44:22', '0000-00-00 00:00:00', '0', '0'),
(12, 14, '1', '1', 'C01', 1, 4, '1', '35000', 'A', '2023-07-25 15:44:26', '0000-00-00 00:00:00', '0', '0'),
(13, 16, '1', '2', 'C02', 1, 4, '1', '35000', 'A', '2023-07-27 18:46:57', '0000-00-00 00:00:00', '0', '0'),
(14, 16, '1', '2', 'C02', 1, 7, '1', '14990', 'A', '2023-07-27 18:47:00', '0000-00-00 00:00:00', '0', '0'),
(15, 16, '1', '2', 'C02', 1, 8, '1', '8990', 'A', '2023-07-27 18:47:05', '0000-00-00 00:00:00', '0', '0'),
(16, 16, '1', '2', 'C02', 1, 16, '1', '3000', 'A', '2023-07-27 18:47:11', '0000-00-00 00:00:00', '0', '0'),
(17, 17, '1', '1', 'C01', 1, 1, '1', '27000', 'A', '2023-07-27 18:58:22', '0000-00-00 00:00:00', '0', '0'),
(18, 18, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-27 15:38:37', '2023-07-27 15:45:40', '1', '0'),
(19, 19, '1', '1', 'C01', 1, 4, '1', '35000', 'A', '2023-07-27 16:05:57', '0000-00-00 00:00:00', '0', '0'),
(20, 19, '1', '1', 'C01', 1, 6, '1', '14990', 'A', '2023-07-27 16:06:00', '0000-00-00 00:00:00', '0', '0'),
(21, 21, '1', '1', 'C01', 1, 4, '1', '35000', 'A', '2023-07-27 16:55:59', '0000-00-00 00:00:00', '0', '0'),
(22, 22, '1', '1', 'C01', 1, 4, '1', '35000', 'A', '2023-07-27 16:56:51', '0000-00-00 00:00:00', '0', '0'),
(23, 22, '1', '1', 'C01', 1, 4, '1', '35000', 'A', '2023-07-27 16:57:52', '0000-00-00 00:00:00', '0', '0'),
(24, 22, '1', '1', 'C01', 1, 9, '1.254', '4389', 'A', '2023-07-27 16:58:10', '0000-00-00 00:00:00', '0', '0'),
(25, 23, '1', '1', 'C01', 1, 4, '1', '35000', 'A', '2023-07-27 17:16:56', '0000-00-00 00:00:00', '0', '0'),
(26, 23, '1', '1', 'C01', 1, 5, '1', '35000', 'A', '2023-07-27 17:16:59', '0000-00-00 00:00:00', '0', '0'),
(27, 23, '1', '1', 'C01', 1, 7, '1', '14990', 'A', '2023-07-27 17:17:09', '0000-00-00 00:00:00', '0', '0'),
(28, 23, '1', '1', 'C01', 1, 8, '1', '8990', 'A', '2023-07-27 17:17:16', '0000-00-00 00:00:00', '0', '0'),
(29, 24, '1', '1', 'C01', 1, 4, '1', '35000', 'C', '2023-07-27 17:23:58', '2023-07-27 17:24:22', '1', '0'),
(30, 24, '1', '1', 'C01', 1, 5, '1', '35000', 'C', '2023-07-27 17:24:02', '2023-07-27 17:24:22', '1', '0'),
(31, 24, '1', '1', 'C01', 1, 6, '1', '14990', 'C', '2023-07-27 17:24:07', '2023-07-27 17:24:22', '1', '0'),
(32, 24, '1', '1', 'C01', 1, 7, '1', '14990', 'C', '2023-07-27 17:24:12', '2023-07-27 17:24:22', '1', '0'),
(33, 26, '1', '1', 'C01', 1, 1, '1', '27000', 'A', '2023-07-27 17:34:25', '0000-00-00 00:00:00', '0', '0'),
(34, 26, '1', '1', 'C01', 1, 3, '1', '9990', 'A', '2023-07-27 17:34:30', '0000-00-00 00:00:00', '0', '0'),
(35, 27, '1', '1', 'C01', 1, 3, '1', '9990', 'P', '2023-07-27 17:38:23', '0000-00-00 00:00:00', '0', '0'),
(36, 27, '1', '1', 'C01', 1, 8, '1', '8990', 'P', '2023-07-27 17:38:29', '0000-00-00 00:00:00', '0', '0'),
(37, 28, '1', '1', 'C01', 1, 8, '1', '8990', 'N', '2023-07-28 18:05:41', '0000-00-00 00:00:00', '0', '0'),
(38, 28, '1', '1', 'C01', 1, 17, '1', '11000', 'N', '2023-07-28 18:10:32', '0000-00-00 00:00:00', '0', '0'),
(39, 29, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-28 18:23:16', '2023-07-27 19:36:53', '1', '0'),
(40, 29, '1', '1', 'C01', 1, 3, '1', '9990', 'C', '2023-07-28 18:23:36', '2023-07-27 19:36:53', '1', '0'),
(41, 29, '1', '1', 'C01', 1, 4, '2', '70000', 'C', '2023-07-28 18:23:42', '2023-07-27 19:36:53', '1', '0'),
(42, 30, '1', '1', 'C01', 1, 1, '15', '405000', 'N', '2023-07-28 19:43:17', '2023-07-28 19:44:13', '0', '0'),
(43, 30, '1', '1', 'C01', 1, 2, '20', '179800', 'N', '2023-07-28 19:43:28', '2023-07-28 19:44:13', '0', '0'),
(44, 46, '1', '1', 'C01', 1, 5, '15', '525000', 'N', '2023-07-28 19:46:02', '0000-00-00 00:00:00', '0', '0'),
(45, 46, '1', '1', 'C01', 1, 3, '1', '9990', 'N', '2023-07-28 19:59:30', '0000-00-00 00:00:00', '0', '0'),
(46, 46, '1', '1', 'C01', 1, 5, '1', '35000', 'N', '2023-07-28 20:00:31', '0000-00-00 00:00:00', '0', '0'),
(47, 46, '1', '1', 'C01', 1, 3, '1', '9990', 'N', '2023-07-28 20:02:23', '0000-00-00 00:00:00', '0', '0'),
(48, 46, '1', '1', 'C01', 1, 1, '1', '27000', 'N', '2023-07-28 20:07:40', '0000-00-00 00:00:00', '0', '0'),
(49, 46, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-28 20:08:21', '2023-07-27 20:09:49', '3', '0'),
(50, 46, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-28 20:09:14', '2023-07-27 20:09:49', '3', '0'),
(51, 47, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-28 20:10:15', '2023-07-27 20:10:26', '3', '0'),
(52, 47, '1', '1', 'C01', 1, 2, '1', '8990', 'A', '2023-07-28 20:11:07', '0000-00-00 00:00:00', '0', '0'),
(53, 28, '1', '1', 'C01', 1, 4, '1', '35000', 'N', '2023-07-28 20:20:36', '0000-00-00 00:00:00', '0', '0'),
(54, 28, '1', '1', 'C01', 1, 3, '1', '9990', 'N', '2023-07-28 20:24:00', '0000-00-00 00:00:00', '0', '0'),
(55, 28, '1', '1', 'C01', 1, 1, '1', '27000', 'N', '2023-07-28 20:25:30', '0000-00-00 00:00:00', '0', '0'),
(56, 28, '1', '1', 'C01', 1, 1, '7', '189000', 'N', '2023-07-28 20:26:12', '0000-00-00 00:00:00', '0', '0'),
(57, 28, '1', '1', 'C01', 1, 1, '8', '216000', 'N', '2023-07-28 20:26:49', '0000-00-00 00:00:00', '0', '0'),
(58, 28, '1', '1', 'C01', 1, 1, '15', '405000', 'N', '2023-07-28 20:29:19', '0000-00-00 00:00:00', '0', '0'),
(59, 28, '1', '1', 'C01', 1, 1, '8', '216000', 'N', '2023-07-28 20:35:38', '0000-00-00 00:00:00', '0', '0'),
(60, 28, '1', '1', 'C01', 1, 1, '8', '216000', 'N', '2023-07-28 20:36:09', '0000-00-00 00:00:00', '0', '0'),
(61, 28, '1', '1', 'C01', 1, 1, '1', '27000', 'N', '2023-07-28 20:37:22', '0000-00-00 00:00:00', '0', '0'),
(62, 28, '1', '1', 'C01', 1, 1, '10', '270000', 'C', '2023-07-28 20:39:42', '2023-07-28 14:28:37', '2', '0'),
(63, 28, '1', '1', 'C01', 1, 7, '1', '14990', 'C', '2023-07-28 14:27:48', '2023-07-28 14:28:37', '2', '0'),
(64, 28, '1', '1', 'C01', 1, 1, '1', '27000', 'C', '2023-07-28 14:28:07', '2023-07-28 14:28:37', '2', '0'),
(65, 48, '1', '1', 'C01', 1, 2, '1', '8990', 'C', '2023-07-28 14:29:19', '2023-07-28 14:29:37', '3', '0'),
(66, 48, '1', '1', 'C01', 1, 3, '1', '9990', 'C', '2023-07-28 14:29:28', '2023-07-28 14:29:37', '3', '0');

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
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `autorizacion`
--
ALTER TABLE `autorizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes_negocio`
--
ALTER TABLE `clientes_negocio`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `cuenta_corriente`
--
ALTER TABLE `cuenta_corriente`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedidos_detalle`
--
ALTER TABLE `pedidos_detalle`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
