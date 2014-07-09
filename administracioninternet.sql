-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2014 a las 02:32:24
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `administracioninternet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_administrador` varchar(30) NOT NULL,
  `contrasena_administrador` varchar(30) NOT NULL,
  `nombre_administrador` varchar(100) NOT NULL,
  `apellidos_administrador` varchar(100) NOT NULL,
  `tipo_administrador` int(3) NOT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id_administrador`, `usuario_administrador`, `contrasena_administrador`, `nombre_administrador`, `apellidos_administrador`, `tipo_administrador`) VALUES
(1, 'admin', 'tokenApatzingan', 'Administrador', 'Principal', 1),
(25, 'fgdfg', 'dfgdfgdfg', 'sdfgd', 'fgdfgd', 2),
(26, 'fghfgh', 'fghfgh', 'fg', 'hfgh', 2),
(27, '64564', '456456456', '4564', '56456456', 2),
(28, 'zaza', 'zaza', 'Esme', 'zaza', 2),
(30, '23123', '123123123', '1534789789789789789', '1231', 2),
(31, 'asdasd', 'asdasdasdasd', '789', 'Asd', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(100) NOT NULL,
  `apellido_paterno_cliente` varchar(100) NOT NULL,
  `apellido_materno_cliente` varchar(100) NOT NULL,
  `telefono_cliente` varchar(20) DEFAULT NULL,
  `correo_cliente` varchar(100) DEFAULT NULL,
  `calle_cliente` varchar(100) NOT NULL,
  `colonia_cliente` varchar(45) NOT NULL,
  `codigo_postal_cliente` int(5) DEFAULT NULL,
  `ciudad_cliente` varchar(100) NOT NULL,
  `municipio_cliente` varchar(100) NOT NULL,
  `referencias_cliente` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `apellido_paterno_cliente`, `apellido_materno_cliente`, `telefono_cliente`, `correo_cliente`, `calle_cliente`, `colonia_cliente`, `codigo_postal_cliente`, `ciudad_cliente`, `municipio_cliente`, `referencias_cliente`) VALUES
(26, 'Dgfdfg', 'Df', 'F', '6861328366', '', 'Plaza de la Constitucion # GDF', 'Centro', 6000, 'Distrito Federal', 'Cuauhtemoc', ''),
(27, 'Xdf', 'Sdfsdf', 'Sdfsdfsdf', '456456456456456', 'dfgdfgdfg@c.com', 'Plaza de la Constitucion # GDF', 'Centro', 6000, 'Distrito Federal', 'Cuauhtemoc', ''),
(28, 'Fhfghfghfghfgh', 'Fghfgh', 'Fghfghfgh', '', '', 'Plaza de la Constitucion # GDF', 'Centro', 6000, 'Distrito Federal', 'Cuauhtemoc', ''),
(29, 'Gersain', 'Aguilar', 'Pardo', '', '', 'Plaza de la Constitucion # GDF', 'Centro', 6000, 'Distrito Federal', 'Cuauhtemoc', ''),
(30, 'Gersain', 'Aguilar', 'Editado', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(31, 'Bnm', 'Bnm', 'Bnm', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(32, 'Fgh', 'Fgh', 'Fgh', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(33, 'Ghj', 'Ghj', 'Ghj', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(34, 'Gersain', 'Aguilar', 'Pardo', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(35, 'Dfgh', 'Fgh', 'Fghfghfghfghfghfghgg', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(36, 'Gersain', 'Sdf', 'Sdf', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(37, 'Dfg', 'Fgh', 'Fgh', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(38, 'Dsgf', 'Dfg', 'Dfgdfgdfg', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(39, 'Dsgf', 'Dfg', 'Dfgdfgdfg', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(40, 'Dsgf', 'Dfg', 'Dfgdfgdfg', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(41, 'Xcv', 'Xcv', 'Xcv', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(42, 'Xcv', 'Xcv', 'Xcv', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(43, 'Xcv', 'Xcv', 'Xcv', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(44, 'Xcv', 'Xcv', 'Xcv', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(45, 'Vxc', 'Xcv', 'Xcvxcvxcv', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(46, 'Dfg', 'Dfg', 'Dfg', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(47, 'Cvbcvbcvbcvb', 'Cvbcvbcvbcvb', 'Cvbcvb', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(48, 'Dfgh', 'Dfg', 'Dfg', '6861328366', 'perrogde@gmail.com', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(49, 'Zsxd', 'Zxczxczxc', 'Zxczxczxc', 'zczdfdsf', '6861328366', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(50, 'Swdfsdfsdf', 'Sdfs', 'Sdfsdfsdf', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(51, 'Cvbcvbcvb', 'Vbcvbcvb', 'Cvbcvbc', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(52, 'Cvbcvbcvb', 'Vbcvbcvb', 'Cvbcvbc', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(53, 'Cvbcvbcvb', 'Vbcvbcvb', 'Cvbcvbc', '', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(54, 'Vbn', 'Vbn', 'Vbn', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(55, 'Maria esmeralda', 'Aguilar', 'Rivera', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(56, 'Gggg', 'Ggggg', 'Ggg', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(57, 'Dfgdfgdfgdf', 'Gdfg', 'Dfgdfgdfg', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(58, 'Gersain', 'De la rosa', 'ASD', '6861328366', '', 'Ejido # 146', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', ''),
(59, 'Gersian', 'Asdas', 'Dasdasdasd', '', '', 'Ejido # 145Bis', 'Miguel Hidalgo 1a. Seccion', 14260, 'Distrito Federal', 'Tlalpan', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mails_remenber`
--

CREATE TABLE IF NOT EXISTS `mails_remenber` (
  `id_remenber_mail` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_envio` date NOT NULL,
  `fecha_remember` varchar(12) NOT NULL,
  `email_cliente` varchar(50) NOT NULL,
  PRIMARY KEY (`id_remenber_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `concepto` varchar(100) NOT NULL,
  `fecha_pago` date NOT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_cliente`, `cantidad`, `concepto`, `fecha_pago`) VALUES
(1, 28, 29, '06-2014', '2014-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE IF NOT EXISTS `peticiones` (
  `id_peticion` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `fecha_realizada_peticion` date NOT NULL,
  `fecha_solicitada_peticion` date NOT NULL,
  `hora_deseada_visita` varchar(200) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `usuario_peticion` varchar(100) NOT NULL,
  `hash_peticion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_peticion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`id_peticion`, `id_cliente`, `fecha_realizada_peticion`, `fecha_solicitada_peticion`, `hora_deseada_visita`, `status`, `usuario_peticion`, `hash_peticion`) VALUES
(9, 26, '2014-06-08', '2014-06-12', '', 'ok', 'Cliente', '5393C96B5482C'),
(10, 27, '2014-06-08', '2014-06-13', '', 'ok', 'Cliente', '5393CEFA7E511'),
(11, 28, '2014-06-08', '2014-06-12', '', 'ok', 'Cliente', '5393E29262373'),
(12, 29, '2014-06-08', '2014-06-13', '', 'ok', 'Cliente', '5393E2B5AB4E2'),
(13, 30, '2014-06-23', '2014-06-12', '09:00 pm', 'ok', 'Administrador Principal', '5393E4A71C714'),
(14, 31, '2014-06-08', '2014-06-12', '', 'ok', 'Administrador: ', '5393F0B1D357C'),
(15, 32, '2014-06-08', '2014-06-12', '', '0', 'Administrador: ', '5393F11104E0C'),
(16, 33, '2014-06-08', '2014-06-21', '', '0', 'Administrador: ', '5393F21290FBA'),
(17, 34, '2014-06-08', '2014-06-13', '', '0', 'Cliente', '5394B7108050D'),
(18, 35, '2014-06-08', '2014-06-14', '', 'ok', 'Cliente', '5394BE1E244C8'),
(19, 36, '2014-06-08', '2014-06-08', NULL, '0', 'Administrador: ', '5394C15FE5AA3'),
(20, 37, '2014-06-08', '2014-06-14', NULL, '0', 'Administrador: ', '5394C1E844BCC'),
(21, 40, '2014-06-08', '2014-06-10', NULL, '0', 'Administrador: ', '5394C511CA447'),
(22, 44, '2014-06-08', '2014-06-12', NULL, '0', 'Administrador P', '5394C5A816632'),
(23, 45, '2014-06-08', '2014-06-19', NULL, '0', 'Administrador Principal', '5394C5F52E7E4'),
(24, 46, '2014-06-08', '2014-06-13', NULL, '0', 'Administrador Principal', '5394D24277F8E'),
(25, 47, '2014-06-08', '2014-06-12', NULL, 'Pendiente', 'Administrador Principal', '5394D28514B12'),
(26, 48, '2014-06-08', '2014-06-11', NULL, 'Pendiente', 'Administrador Principal', '5394EEF5CD4B6'),
(27, 49, '2014-06-08', '2014-06-09', NULL, 'Pendiente', 'Administrador Principal', '5394EFEA07781'),
(28, 50, '2014-06-08', '2014-06-11', NULL, 'Pendiente', 'Administrador Principal', '5394F080CF3ED'),
(29, 52, '2014-06-08', '2014-06-13', '1:00 AM', 'Pendiente', 'Administrador Principal', '5394F10915F4A'),
(30, 53, '2014-06-08', '2014-06-13', '1:00 AM', 'Pendiente', 'Administrador Principal', '5394F124A6451'),
(31, 54, '2014-06-10', '2014-06-11', '2:00 AM', 'Pendiente', 'Administrador Principal', '539653DB78B97'),
(32, 55, '2014-06-10', '2014-06-16', '3:00 AM', 'Pendiente', 'Administrador Principal', '5396543F734BF'),
(33, 56, '2014-06-10', '2014-06-19', '09:58 pm', 'Pendiente', 'Cliente', '539674504A0FB'),
(34, 57, '2014-06-10', '2014-06-10', '09:00 pm', 'Pendiente', 'Cliente', '5396784E39861'),
(35, 58, '2014-06-18', '2014-06-19', '08:00 pm', 'ok', 'Administrador Principal', '53A1F6DE532F8'),
(36, 59, '2014-06-23', '2014-06-24', '10:00 pm', 'Pendiente', 'Administrador Principal', '53A76F7B0907C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE IF NOT EXISTS `prestamos` (
  `id_prestamo` int(11) NOT NULL AUTO_INCREMENT,
  `id_productos` int(11) NOT NULL,
  `mac_address_prestamo` varchar(45) NOT NULL,
  `numero_serie_prestamo` varchar(45) NOT NULL,
  `descripcion_cantidad_prestamo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_prestamo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_productos`, `mac_address_prestamo`, `numero_serie_prestamo`, `descripcion_cantidad_prestamo`) VALUES
(31, 2, 'sdf', 'sdf', 'sdf'),
(32, 1, '6786786', '678678678', '66 metros'),
(33, 1, 'gf', 'd', 'f'),
(34, 1, 'gf', 'd', 'f'),
(35, 3, '45646545645asd', 'sdfsdf', 'sdfsdfsdf'),
(36, 5, 'g', 'bgv', 'fvbg'),
(37, 4, 'dfg', 'dfg', 'dfg'),
(38, 5, 'dfg', 'dfg', 'dfg'),
(39, 5, 'fgh', 'fgh', 'fgh'),
(40, 5, 'f', 's', 'd'),
(41, 5, 'g', 'g', 'g'),
(42, 5, 'fgh', 'fgh', 'fgh'),
(43, 5, '0820125466', 'asdasdasd', '0'),
(44, 1, 'h', 'h', 'h'),
(45, 3, 'v', 'v', 'v'),
(46, 2, 'sdf', 'sdf', 'sdf'),
(47, 2, 'asd', 'asdasdasd', 'asd'),
(48, 1, 'sdf', 'sdf', 'sdf'),
(49, 2, 'g', 'g', 'g'),
(50, 2, 'asd', 'asdasd', 'asdasd'),
(51, 5, 'sdfsd', 'fsdfsdf', 'sdfsdf'),
(52, 2, 'asdsdasd', 'asdasd', 'asdasdasd'),
(53, 1, 'asd', 'asd', 'asd'),
(54, 1, 'sdf', 'sdf', 'sdf'),
(55, 5, 'dfg', 'dfg', 'dfg'),
(56, 3, 'sdfgdfg', 'dfgdfgd', 'fgdfgdfg'),
(57, 5, 'j', 'ghj', 'ghj'),
(58, 5, 'j', 'ghj', 'ghj'),
(59, 5, 'j', 'ghj', 'ghj'),
(60, 5, 'j', 'ghj', 'ghj'),
(61, 5, 'j', 'ghj', 'ghj'),
(62, 5, 'fgh', 'fgh', 'fgh'),
(63, 5, 'fgh', 'fgh', 'fgh'),
(64, 5, 'fgh', 'fgh', 'fgh'),
(65, 5, 'fgh', 'fgh', 'fgh'),
(66, 4, 'fg', 'hjghj', 'ghj'),
(67, 2, 'dfg', 'fgh', 'fgh'),
(68, 1, 'hgj', 'hjk', 'hjk'),
(69, 3, 'fgdh', 'fgh', 'fgh'),
(70, 5, 'dsgf', 'dfg', 'dfg'),
(71, 5, 'dfg', 'dfg', 'dfgdfg'),
(72, 5, 'y', 'tyu', 'tyutyu'),
(73, 3, 'g', 'g', 'g'),
(74, 4, 'vb', 'v', 'b'),
(75, 2, 'g', 'g', 'g'),
(76, 5, 'fgh', 'fgh', 'fgh'),
(77, 2, 'f', 'f', 'f'),
(78, 1, 'dfg', 'dfg', 'fg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`) VALUES
(1, 'Cable 50 MTS'),
(2, 'Cable ethernet'),
(3, 'Antena de 1.5 KM'),
(4, 'Antena 2.0 Km '),
(5, 'ANTENA 2.5 KM'),
(7, 'Antena de 5.0 KM'),
(29, 'Antenita bonita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_prestamo` varchar(100) NOT NULL,
  `fecha_expedicion_servicio` date NOT NULL,
  `fecha_instalacion_servicio` date NOT NULL,
  `status_servicio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `id_cliente`, `id_prestamo`, `fecha_expedicion_servicio`, `fecha_instalacion_servicio`, `status_servicio`) VALUES
(18, 26, '40', '2014-06-10', '2014-07-07', 'Administrador'),
(19, 26, '43', '2014-06-18', '2014-07-07', 'Administrador'),
(20, 26, '44', '2014-06-18', '2014-07-07', 'Administrador'),
(22, 29, '46', '2014-06-21', '2014-05-21', 'Administrador'),
(23, 26, '47', '2014-05-21', '2014-05-07', 'Administrador'),
(24, 58, '48', '2014-06-21', '2014-05-07', 'Administrador'),
(25, 27, '49', '2014-06-22', '2014-05-07', 'Administrador'),
(26, 35, '50', '2014-06-22', '2014-05-07', 'Administrador'),
(27, 35, '51', '2014-06-22', '2014-05-07', 'Administrador'),
(28, 35, '52', '2014-06-22', '2014-05-07', 'Administrador'),
(29, 28, '53', '2014-06-22', '2014-07-07', 'Administrador'),
(36, 30, '68', '2014-05-23', '2014-07-07', 'Administrador'),
(45, 30, '77', '2014-05-23', '2014-07-07', 'Administrador'),
(46, 31, '78', '2014-05-23', '2014-07-07', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessiones`
--

CREATE TABLE IF NOT EXISTS `sessiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario_session` varchar(100) NOT NULL,
  `apellidos_usuario_session` varchar(100) NOT NULL,
  `usuario_session` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `sid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `sessiones`
--

INSERT INTO `sessiones` (`id`, `nombre_usuario_session`, `apellidos_usuario_session`, `usuario_session`, `fecha`, `hora`, `sid`) VALUES
(6, 'Administrador', 'Principal', '1', '2014-07-02', '01:07:15', 'a8fbb0204a35abbc8fb0a7057c8ca95b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_administrador`
--

CREATE TABLE IF NOT EXISTS `tipo_administrador` (
  `id_tipo_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_admin` int(11) NOT NULL,
  `nombre_tipo_administrador` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_administrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_administrador`
--

INSERT INTO `tipo_administrador` (`id_tipo_administrador`, `id_tipo_admin`, `nombre_tipo_administrador`) VALUES
(1, 1, 'Administrador principal'),
(2, 2, 'Tecnicos de instalacion');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
