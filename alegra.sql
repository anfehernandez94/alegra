-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2017 a las 19:07:06
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alegra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `nit` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `tel01` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `tel02` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `fax` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `price_list` int(11) DEFAULT NULL,
  `seller` int(11) DEFAULT NULL,
  `payment_term` int(11) DEFAULT NULL,
  `client` tinyint(1) DEFAULT NULL,
  `provider` tinyint(1) DEFAULT NULL,
  `comment` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
  `account_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `name`, `nit`, `address`, `city`, `email`, `tel01`, `tel02`, `fax`, `phone`, `price_list`, `seller`, `payment_term`, `client`, `provider`, `comment`, `account_status`) VALUES
(9, 'AndrÃ©s', '123456', 'Cra 25', 'Angostura ciudad grande de nombre pequeÃ±o', 'asdasd@mail.com', '12345667 ext 2000 ', '562', '12345', '(+57) 222 555 222', 2, 2, 6, 1, NULL, 'Sin observaciones particulares', NULL),
(10, 'Industrias Guamito', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Galletas Crok', '900.222.222 - 8', 'Zona franca sur - SecciÃ³n 12', 'BogotÃ¡', 'crok@crok.com.co', '(+57 1) 325 25 26', '(+57 2) 953 33 33', NULL, '(+57) 300 123 4567', 2, 2, 5, 1, 1, 'Deliciosas', 1),
(12, 'Dulces MarÃ­a', '123456778897878', 'Cra 42 con Transversal 29 Barrio Colonia - Edificio Surex local 290', 'MedellÃ­n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'Empresa sin sal', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_term`
--

CREATE TABLE `payment_term` (
  `id` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `payment_term`
--

INSERT INTO `payment_term` (`id`, `description`) VALUES
(1, 'Vencimiento manual'),
(2, 'De contado'),
(3, '8 dÃ­as'),
(4, '15 dÃ­as'),
(5, '30 dÃ­as'),
(6, '60 dÃ­as');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `description` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `price_list`
--

INSERT INTO `price_list` (`id`, `description`) VALUES
(1, 'General'),
(2, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seller`
--

INSERT INTO `seller` (`id`, `name`) VALUES
(1, 'Ninguno'),
(2, 'AndrÃ©s HernÃ¡ndez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `price_list` (`price_list`),
  ADD KEY `seller` (`seller`),
  ADD KEY `payment_term` (`payment_term`);

--
-- Indices de la tabla `payment_term`
--
ALTER TABLE `payment_term`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `payment_term`
--
ALTER TABLE `payment_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`price_list`) REFERENCES `price_list` (`id`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`seller`) REFERENCES `seller` (`id`),
  ADD CONSTRAINT `client_ibfk_3` FOREIGN KEY (`payment_term`) REFERENCES `payment_term` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
