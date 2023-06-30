-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2023 a las 03:52:14
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
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"yaganerp_webservices\",\"table\":\"metodo_pago\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-06-30 01:52:11', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\",\"NavigationWidth\":278}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Base de datos: `yaganerp_pos`
--
CREATE DATABASE IF NOT EXISTS `yaganerp_pos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `yaganerp_pos`;

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

--
-- Volcado de datos para la tabla `autorizacion`
--

INSERT INTO `autorizacion` (`id`, `id_cl`, `clave`, `estado`) VALUES
(1, '1', '123456', 'S');

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
(1, '1', 'C01', 'A', '1', '2023-05-15'),
(2, '1', 'C02', 'A', '1', '2023-05-15'),
(3, '1', 'C03', 'S', '1', '2023-05-15'),
(4, '1', 'C04', 'S', '1', '2023-05-26');

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
  `piso` varchar(45) NOT NULL,
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

INSERT INTO `cierre_caja` (`id`, `id_cl`, `piso`, `nombre`, `creado_por`, `desde`, `hasta`, `estado`, `valor_total`, `fecha_reg`) VALUES
(1, 1, '1', 'Caja 15-16-2023', '1', '2023-06-15 13:23:12', '0000-00-00 00:00:00', 'A', '2147390', '2023-06-15 13:23:12');

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
(1, 1, '1', '1', 'C01', '1', '29980', '2', 0, '1', 'C', '2023-06-28 21:24:56', '2023-06-28 16:00:15'),
(2, 2, '1', '2', 'C02', '1', '140990', '3', 0, '1', 'C', '2023-06-29 17:10:34', '2023-06-29 21:26:16');

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
(1, '1', '840705109369', 'Foo Fighters - Glasstonbury 2017 - pt2', '3', -18, 'N', 1, '15000', '27000', 'S', '1', '2023-06-15'),
(2, '1', '7804612579427', '31 Minutos - 31 canciones de amor - 2012', '2', -13, 'N', 1, '3600', '8990', 'S', '1', '2023-06-15'),
(3, '1', '2292547192', 'Luis Miguel - Soy Como Quiero Ser', '2', 10, 'N', 1, '5000', '9990', 'S', '1', '2023-06-16'),
(4, '1', '5099747618642', 'Los Tres - Fome', '4', 10, 'N', 1, '20000', '35000', 'S', '1', '2023-06-16'),
(5, '1', '5099747609640', 'Los Tres - Unplugged', '4', -64, 'N', 1, '20000', '35000', 'S', '1', '2023-06-16'),
(6, '1', '886971408027', 'Soda Stereo - Último Concierto A', '2', -38, 'N', 1, '10000', '14990', 'S', '1', '2023-06-17'),
(7, '1', '886971408126', 'Soda Stereo - Último Concierto B', '2', -25, 'N', 1, '10000', '14990', 'S', '1', '2023-06-17'),
(8, '1', '7804612579434', '31 Minutos - Ratoncitos - 2012', '2', 20, 'N', 1, '5000', '8990', 'S', '1', '2023-06-17'),
(9, '1', '00000000000000', 'Pan', '5', 20, 'S', 2, '3500', '3500', 'S', '1', '2023-06-20');

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
(2, 'Vendedor', 'vendedor', 'vendedor', 2, 1, 'S', '2,3,4');

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
(1, 1, '1', '1', 'C01', 1, 6, '1', '14990', 'N', '2023-06-28 21:25:04', '0000-00-00 00:00:00', '0', '0'),
(2, 1, '1', '1', 'C01', 1, 6, '1', '14990', 'C', '2023-06-28 21:25:43', '2023-06-28 16:00:15', '2', '0'),
(3, 1, '1', '1', 'C01', 1, 7, '1', '14990', 'N', '2023-06-28 21:26:19', '0000-00-00 00:00:00', '0', '0'),
(4, 1, '1', '1', 'C01', 1, 7, '1', '14990', 'C', '2023-06-28 21:26:23', '2023-06-28 16:00:15', '2', '0'),
(5, 2, '1', '2', 'C02', 1, 1, '1', '27000', 'C', '2023-06-29 17:10:39', '2023-06-29 21:26:16', '2', '0'),
(6, 2, '1', '2', 'C02', 1, 2, '1', '8990', 'C', '2023-06-29 17:10:44', '2023-06-29 21:26:16', '2', '0'),
(7, 2, '1', '2', 'C02', 1, 5, '1', '35000', 'C', '2023-06-29 17:10:47', '2023-06-29 21:26:16', '2', '0'),
(8, 2, '1', '2', 'C02', 1, 5, '1', '35000', 'C', '2023-06-29 17:10:48', '2023-06-29 21:26:16', '2', '0'),
(9, 2, '1', '2', 'C02', 1, 5, '1', '35000', 'C', '2023-06-29 17:10:48', '2023-06-29 21:26:16', '2', '0'),
(16, 2, '1', '2', 'C02', 1, 5, '1', '35000', 'N', '2023-06-29 17:10:51', '0000-00-00 00:00:00', '0', '0');

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
-- Indices de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `correlativo`
--
ALTER TABLE `correlativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Base de datos: `yaganerp_webservices`
--
CREATE DATABASE IF NOT EXISTS `yaganerp_webservices` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `yaganerp_webservices`;

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
