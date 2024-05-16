-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-05-2024 a las 05:54:49
-- Versión del servidor: 10.6.17-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `primarys_crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fechaInsert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id`, `usuario_id`, `nombre`, `fechaInsert`) VALUES
(1, 1, 'chile 1', '2023-12-10 03:49:28'),
(2, 1, 'dataInfo', '2023-12-22 06:39:18'),
(3, 1, 'data2info', '2023-12-22 06:47:56'),
(4, 1, 'data3info', '2023-12-22 06:50:15'),
(5, 1, 'data4info', '2023-12-22 06:51:48'),
(6, 1, 'data5info', '2023-12-22 06:53:57'),
(7, 1, 'jonathan', '2024-05-11 01:48:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Presupuestado'),
(3, 'TORAX LATERAL'),
(4, 'TORAX AP'),
(5, 'TORAX PA'),
(6, 'CRANEO LATERAL'),
(7, 'CRANEO AP'),
(8, 'S.N.P'),
(9, 'HUESOS PROPIOS DE LA NARIZ'),
(10, 'CAVUM'),
(11, 'COLUMNA CERVICAL LATERAL '),
(12, 'COLUMNA CERVICAL AP'),
(13, 'COLUMNA DORSAL LATERAL'),
(14, 'COLUMNA DORSAL AP'),
(15, 'COLUMNA DORSAL LATERAL '),
(16, 'COLUMNA LUMBAR LATERAL'),
(17, 'COLUMNA LUMBAR AP'),
(18, 'COLUMNA LUMBAR LATERAL '),
(19, 'COLUMNA DORSO LUMBAR LATERAL'),
(20, 'COLUMNA DORSO LUMBAR AP'),
(21, 'COLUMNA DORSO LUMBAR LATERAL'),
(22, 'SACRO COXIS AP'),
(23, 'SACRO COXIS LATERAL'),
(24, 'CADERA PANORAMICA'),
(25, 'CADERA DERECHA'),
(26, 'CADERA IZQUIERDA'),
(27, 'CADERA AXIAL PANORAMICA'),
(28, 'CADERA AXIAL DERECHA '),
(29, 'CADERA AXIAL IZQUIERDA'),
(30, 'FEMUR DERECHO AP'),
(31, 'FEMUR DERECHO LATERAL'),
(32, 'FEMUR IZQUIERDO AP'),
(33, 'FEMUR IZQUIERDO LATERAL'),
(34, 'RODILLA DERECHA AP'),
(35, 'RODILLA DERECHA LATERAL'),
(36, 'RODILLA IZQUIERDA AP'),
(37, 'RODILLA IZQUIERDA LATERAL'),
(38, 'RODILLA DERECHA AXIAL '),
(39, 'RODILLA IZQUIERDA AXIAL '),
(40, 'PIERNA DERECHA AP'),
(41, 'PIERNA DERECHA LATERAL '),
(42, 'PIERNA IZQUIERDA AP'),
(43, 'PIERNA IZQUIERDA LATERAL'),
(44, 'TOBILLO DERECHO AP'),
(45, 'TOBILLO DERECHO LATERAL '),
(46, 'TOBILLO DERECHO OBLICUO'),
(47, 'TOBILLO IZQUIERDO OBLICUO'),
(48, 'PIE DERECHO AP'),
(49, 'PIE DERECHO LATERAL'),
(50, 'PIE DERECHO OBLICUO'),
(51, 'PIE IZQUIERDO AP'),
(52, 'PIE IZQUIERDO LATERAL'),
(53, 'PIE IZQUIERDO OBLICUO'),
(54, 'ABDOMEN AP DE PIE'),
(55, 'ABDOMEN AP ACOSTADO'),
(56, 'HOMBRO DERECHO AP'),
(57, 'HOMBRO DERECHO LATERAL'),
(58, 'HOMBRO DERECHO AXIAL'),
(59, 'HOMBRO IZQUIERDO AP'),
(60, 'HOMBRO IZQUIERDO AP'),
(61, 'HOMBRO IZQUIERDO LATERAL'),
(62, 'HOMBRO IZQUIERDO AXIAL'),
(63, 'HUMERO DERECHO AP '),
(64, 'HUMERO DERECHO LATERAL'),
(65, 'HUMERO DERECHO OBLICUO'),
(66, 'HUMERO IZQUIERDO AP'),
(67, 'HUMERO IZQUIERDO LATERAL'),
(68, 'HUMERO IZQUIERDO AXIAL'),
(69, 'ANTE BRAZO DERECHO AP'),
(70, 'ANTE BRAZO DERECHO LATERAL'),
(71, 'ANTE BRAZO DERECHO OBLICUO'),
(72, 'ANTE BRAZO IZQUIERDO AP'),
(73, 'ANTE BRAZO IZQUIERDO LATERAL'),
(74, 'ANTE BRAZO IZQUIERDO OBLICUO'),
(75, 'MUÃ‘ECA DERECHA AP'),
(76, 'MUÃ‘ECA DERECHA LATERAL'),
(77, 'MUÃ‘ECA DERECHA OBLICUA'),
(78, 'MUÃ‘ECA IZQUIERDA AP'),
(79, 'MUÃ‘ECA IZQUIERDA LATERAL'),
(80, 'MUÃ‘ECA IZQUIERDA AXIAL'),
(81, 'MANO DERECHA AP'),
(82, 'MANO DERECHA LATERAL'),
(83, 'MANO DERECHA OBLICUA'),
(84, 'MANO IZQUIERDA AP'),
(85, 'MANO IZQUIERDA LATERAL'),
(86, 'MANO IZQUIERDA OBLICUA'),
(87, 'DEDO DERECHO AP'),
(88, 'DEDO DERECHO LATERAL'),
(89, 'DEDO DERECHO OBLICUO'),
(90, 'DEDO IZQUIERDO AP'),
(91, 'DEDO IZQUIERDO LATERAL'),
(92, 'DEDO IZQUIERDO OBLICUO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `archivo_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `usuario_id`, `archivo_id`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(14, 1, 1, 'guayasamin.jpeg', 'jpeg', 'uploads/1/guayasamin.jpeg', '2024-01-24 09:05:23'),
(15, 1, 7, 'onligrand.jpg', 'jpg', 'uploads/7/onligrand.jpg', '2024-05-11 02:26:19'),
(16, 1, 7, 'TORAX.JPEG', 'JPEG', 'uploads/7/TORAX.JPEG', '2024-05-11 02:33:39'),
(17, 1, 7, 'TORAX.JPEG', 'JPEG', 'uploads/7/TORAX.JPEG', '2024-05-11 02:33:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `kind`
--

INSERT INTO `kind` (`id`, `name`) VALUES
(1, 'Solicitud de Pago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modules`
--

INSERT INTO `modules` (`id`, `name`) VALUES
(1, 'TESORERIA'),
(2, 'CARTERA'),
(3, 'CONTABILIDAD'),
(4, 'FACTURACION'),
(5, 'IMPUESTOS'),
(6, 'INVENTARIO'),
(7, 'ACTIVOS FIJOS'),
(8, 'NOMINA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `priority`
--

CREATE TABLE `priority` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `priority`
--

INSERT INTO `priority` (`id`, `name`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id`, `name`, `description`) VALUES
(1, 'FRUTAS', NULL),
(2, 'GENERAL', NULL),
(3, 'CARNICOS', NULL),
(4, 'REFRIGERACION', NULL),
(5, 'FRUTAS', NULL),
(6, 'COSMETICOS', NULL),
(7, 'SUPERMERCADOS', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Pendiente'),
(2, 'En Desarrollo'),
(3, 'Terminado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `kind_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `asigned_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `priority_id` int(11) NOT NULL DEFAULT 1,
  `status_id` int(11) NOT NULL DEFAULT 1,
  `modules_id` int(11) DEFAULT NULL,
  `adjunto` text DEFAULT NULL,
  `usuario` varchar(60) NOT NULL,
  `fecha_sol` date NOT NULL,
  `fecha_pag` date NOT NULL,
  `valor` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `title`, `description`, `updated_at`, `created_at`, `kind_id`, `user_id`, `asigned_id`, `project_id`, `category_id`, `priority_id`, `status_id`, `modules_id`, `adjunto`, `usuario`, `fecha_sol`, `fecha_pag`, `valor`) VALUES
(1, 'pablo ibarra ', 'deeoefnifnkdnlsmksbnjbskfnkdlwekndsknskvnsknsdkfdsjfer', '2023-12-07 06:44:46', '2023-12-07 06:40:58', 1, 1, NULL, 4, 1, 1, 3, 1, '', 'patricia ', '2023-12-07', '2023-12-14', 2000000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `kind` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `lastname`, `email`, `password`, `is_active`, `kind`, `created_at`, `foto`) VALUES
(1, 'admin', 'administrador', 'Primarysoft', 'admin@primarysoft.group', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 1, 1, '2023-11-19 20:34:33', 'admin'),
(2, 'natura', 'NA TU RA ', 'SA', 'contador@naturaecu.com', 'a77604020ed79acfb8ffd598f9de4e866cd6f6c0', 1, 2, '2023-11-19 20:56:08', 'natura');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkArchivoUsuario_idx` (`usuario_id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkDocumentoArchivo_idx` (`archivo_id`),
  ADD KEY `fkUsuariosDocumentos_idx` (`usuario_id`);

--
-- Indices de la tabla `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `priority_id` (`priority_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kind_id` (`kind_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `ticket_ibfk_7_idx` (`modules_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `fkArchivoUsuario` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `fkDocumentosArchivos` FOREIGN KEY (`archivo_id`) REFERENCES `archivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkDocumentosUsuarios` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`priority_id`) REFERENCES `priority` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`id`),
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  ADD CONSTRAINT `ticket_ibfk_7` FOREIGN KEY (`modules_id`) REFERENCES `modules` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
