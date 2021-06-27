-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 00:58:05
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plan_veh_solidario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `modelo`) VALUES
(2, 'FIAT', 'MONDEO'),
(3, 'FIAT', 'UNO'),
(27, 'FORD', 'FIESTA'),
(4, 'FORD', 'KA'),
(8, 'GILERA', 'SMASH'),
(9, 'MOTOMEL', 'BLITZ'),
(5, 'RENAULT', 'CLIO'),
(7, 'RENAULT', 'SCENIC'),
(6, 'VOLKSWAGEN', 'BORA'),
(25, 'VOLKSWAGEN', 'GOL'),
(1, 'VOLKSWAGEN', 'UP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `pers_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `dni` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`pers_id`, `nombre`, `apellido`, `dni`) VALUES
(1, 'Barbara', 'Gonzalez', 29834211),
(2, 'Laura', 'Vera', 33928288),
(3, 'Juan', 'Perez', 11222333),
(5, 'Pedro', 'Fernandez', 98765487),
(6, 'Lucia', 'Galan', 11999333),
(7, 'Sara', 'OConnor', 23121050);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id_plan` int(5) NOT NULL,
  `cant_cuotas` int(2) NOT NULL,
  `interes_valor` decimal(3,3) NOT NULL,
  `interes_detalle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `cant_cuotas`, `interes_valor`, `interes_detalle`) VALUES
(1, 12, '0.025', '30%'),
(2, 24, '0.029', '35%'),
(3, 36, '0.033', '40%'),
(4, 48, '0.037', '45%'),
(5, 60, '0.041', '50%'),
(6, 72, '0.045', '55%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_psw` varchar(200) NOT NULL,
  `user_perfil` varchar(25) NOT NULL,
  `pers_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`user_id`, `user_psw`, `user_perfil`, `pers_id`) VALUES
(1, 'e686859d8a43300614ee7767fc287d6d227cb16cd1204f11150f8207302edeb7e15883561621a13a9c54e63a913528a8ec759eb00fb8cfd445e8cbc66b32edf4', 'A', 3),
(2, 'ab4a301aa40357605ddce7b47ed7bcba32206defa7e8a6638528cecf7c4f2a8991fc51fa459e2d328c54af0051161557f280d9e8175606ee7b53da9a53de6866', 'A', 5),
(7, '3bd0ec7e54237c798afb6ede6ebc0feaadce5ab191d7d2f6310ad92072f332251aa7e66af79ee9e8f77e62ef2df0dde0e8872ca92e2d4a57adc334c6f8f830b9', 'A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_veh` int(5) NOT NULL,
  `patente` varchar(7) NOT NULL,
  `marca` bigint(20) UNSIGNED NOT NULL,
  `anio` int(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  `monto` int(10) NOT NULL,
  `kilometros` int(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `tipo` enum('AUTOMOVIL','CICLOMOTOR','','') NOT NULL,
  `puertas` varchar(1) NOT NULL,
  `cilindradas` varchar(3) NOT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_veh`, `patente`, `marca`, `anio`, `color`, `monto`, `kilometros`, `estado`, `tipo`, `puertas`, `cilindradas`, `imagen`) VALUES
(14, 'abc456', 2, 2019, 'gris', 220000, 50000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a2.jpg'),
(15, 'abc789', 3, 2018, 'rojo', 150000, 16000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a3.jpg'),
(16, 'bcd123', 3, 2020, 'negro', 190000, 19000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a4.jpg'),
(17, 'bcd456', 27, 2019, 'azul', 270000, 50000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a5.jpg'),
(18, 'bcd789', 27, 2018, 'cobre', 300000, 34000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a6.jpg'),
(19, 'cde123', 4, 2019, 'turquesa', 170000, 34000, 'DISPONIBLE', 'AUTOMOVIL', '3', '-', 'a7.jpg'),
(20, 'cde456', 4, 2018, 'negro', 185000, 12000, 'DISPONIBLE', 'AUTOMOVIL', '3', '-', 'a8.jpg'),
(21, 'a678tyu', 8, 2016, 'azul', 35000, 34000, 'DISPONIBLE', 'CICLOMOTOR', '-', '110', 'a9.jpg'),
(22, 'a123ghj', 8, 2018, 'rojo', 27000, 50000, 'DISPONIBLE', 'CICLOMOTOR', '-', '110', 'a10.jpg'),
(23, 'a456fgv', 8, 2018, 'blanco', 125000, 12000, 'DISPONIBLE', 'CICLOMOTOR', '-', '110', 'a11.jpg'),
(24, 'a345ert', 9, 2019, 'rojo', 25000, 34000, 'DISPONIBLE', 'CICLOMOTOR', '-', '110', 'a12.jpg'),
(25, 'a456wrt', 9, 2019, 'azul', 35000, 6778, 'DISPONIBLE', 'CICLOMOTOR', '-', '110', 'a13.jpg'),
(26, 'a345eri', 9, 2016, 'negro', 20000, 50000, 'DISPONIBLE', 'CICLOMOTOR', '-', '110', 'a14.jpg'),
(27, 'efg123', 5, 2019, 'rojo', 235000, 50000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a15.jpg'),
(28, 'efg456', 5, 2016, 'naranja', 245000, 38000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a16.jpg'),
(29, 'efg789', 7, 2012, 'bordó', 200000, 19000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a17.jpg'),
(30, 'fgh123', 7, 2019, 'azul', 185000, 36000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a18.jpg'),
(31, 'fgh456', 25, 2018, 'negro', 110000, 12000, 'DISPONIBLE', 'AUTOMOVIL', '3', '-', 'a19.jpg'),
(32, 'fgh789', 25, 2016, 'azul', 200000, 50000, 'DISPONIBLE', 'AUTOMOVIL', '3', '-', 'a20.jpg'),
(33, 'ghi123', 1, 2016, 'verde', 156000, 19000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'a22.jpg'),
(34, 'ghi456', 1, 2019, 'amarillo', 230000, 50000, 'DISPONIBLE', 'AUTOMOVIL', '5', '-', 'a21.jpg'),
(36, 'abc123', 6, 2019, 'blanco', 200000, 12000, 'DISPONIBLE', 'AUTOMOVIL', '4', '-', 'autos6.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`),
  ADD UNIQUE KEY `id_marca` (`id_marca`),
  ADD UNIQUE KEY `idx_marca_mod` (`nombre`,`modelo`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`pers_id`),
  ADD UNIQUE KEY `pers_id` (`pers_id`) USING BTREE;

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id_plan`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `pers_id` (`pers_id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_veh`),
  ADD KEY `idx_marca_id` (`marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `pers_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id_plan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_veh` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`pers_id`) REFERENCES `personas` (`pers_id`);

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`marca`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
