-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-02-2020 a las 14:45:20
-- Versión del servidor: 10.4.12-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mopadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombres_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombres_cliente`, `apellidos_cliente`, `cedula_cliente`, `correo_cliente`, `direccion_cliente`, `telefono_cliente`) VALUES
(1, 'Francisco Javier', 'Zambrano Santacruz', '1233189817', 'franciscozambrano@outlook.es', 'Clle 18 Cr 50 Ciudadela Universitaria Torobajo', '+573105927383'),
(3, 'Claudia Lorena', 'Santacruz Muñoz', '27094929', 'claudiasm@hotmail.com', 'Casa 5 Puerres Diagonal Iglesia Canchala', '+573143825092');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200212162821', '2020-02-12 16:28:37'),
('20200212163125', '2020-02-12 16:31:41'),
('20200212183500', '2020-02-12 18:35:14'),
('20200212195020', '2020-02-12 19:50:37'),
('20200212222604', '2020-02-12 22:26:33'),
('20200212223422', '2020-02-12 22:34:40'),
('20200212223734', '2020-02-12 22:37:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  `hora_inicio_reserva` int(11) NOT NULL,
  `hora_fin_reserva` int(11) NOT NULL,
  `cliente_reserva_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id`, `sala_id`, `hora_inicio_reserva`, `hora_fin_reserva`, `cliente_reserva_id`) VALUES
(1, 2, 10, 12, 1),
(2, 2, 14, 15, 1),
(3, 1, 16, 18, 1),
(4, 3, 10, 12, 3),
(6, 1, 8, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nombre_sala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `nombre_sala`) VALUES
(3, 'Sala adolescentes'),
(2, 'Sala adultos'),
(1, 'Sala niños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@mopa.com', '[\"ROLE_ADMIN\",\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$TXdpY3ltZU1EZTNqcWdxRw$g7rddG4SOXXP6CO4BJ+8xyZxzMKR8gZSXi/cBBeM+b8'),
(2, 'prueba@prueba.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Qzh1VUhVczJhdk1GSmNiTw$nJ0QPwmbQA4FngF/TndKRFn3SggshVgUNRi7m/t2zDk');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F41C9B25F34FC796` (`cedula_cliente`);

--
-- Indices de la tabla `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_188D2E3BC51CDF3F` (`sala_id`),
  ADD KEY `IDX_188D2E3B4A6F32CE` (`cliente_reserva_id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_E226041C2CC44EEB` (`nombre_sala`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_188D2E3B4A6F32CE` FOREIGN KEY (`cliente_reserva_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `FK_188D2E3BC51CDF3F` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
