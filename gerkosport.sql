-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2015 a las 17:33:47
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gerkosport`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE IF NOT EXISTS `alerta` (
  `ale_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_codigo` int(11) NOT NULL,
  `map_codigo` int(11) NOT NULL,
  `ale_falta` int(11) NOT NULL,
  `ale_existe` int(11) NOT NULL,
  `ale_total` int(11) NOT NULL,
  `ale_estado` varchar(20) NOT NULL,
  PRIMARY KEY (`ale_codigo`),
  KEY `ped_codigo` (`ped_codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`ale_codigo`, `ped_codigo`, `map_codigo`, `ale_falta`, `ale_existe`, `ale_total`, `ale_estado`) VALUES
(31, 10, 10, 43, 0, 43, 'Habilitado'),
(32, 10, 9, 5, 0, 5, 'Habilitado'),
(33, 8, 10, 24, 0, 24, 'Habilitado'),
(34, 9, 10, 3, 0, 3, 'Habilitado'),
(35, 9, 9, 1, 0, 1, 'Habilitado'),
(36, 11, 10, 74, 0, 74, 'Habilitado'),
(37, 11, 9, 24, 0, 24, 'Habilitado'),
(38, 12, 10, 13, 0, 13, 'Habilitado'),
(39, 12, 9, 3, 0, 3, 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_materia`
--

CREATE TABLE IF NOT EXISTS `almacen_materia` (
  `almm_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `almm_cantidad` int(11) NOT NULL,
  `map_codigo` int(11) NOT NULL,
  PRIMARY KEY (`almm_codigo`),
  KEY `map_codigo` (`map_codigo`),
  KEY `map_codigo_2` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `almacen_materia`
--

INSERT INTO `almacen_materia` (`almm_codigo`, `almm_cantidad`, `map_codigo`) VALUES
(8, 583, 8),
(9, 0, 9),
(10, 450, 10),
(11, 325, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(100) NOT NULL,
  `cat_descripcion` varchar(300) NOT NULL,
  PRIMARY KEY (`cat_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_codigo`, `cat_nombre`, `cat_descripcion`) VALUES
(5, 'categoria1', 'descripcion de categoria 1'),
(6, 'categoria 2', 'descripcion de categoria 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nombre` varchar(100) NOT NULL,
  `cli_nit` int(11) NOT NULL,
  `cli_telefono` int(11) NOT NULL,
  PRIMARY KEY (`cli_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_codigo`, `cli_nombre`, `cli_nit`, `cli_telefono`) VALUES
(7, 'Cliente1', 5184736, 77458745),
(8, 'Cliente2', 2147483647, 95854525);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE IF NOT EXISTS `detalle_pedido` (
  `detp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ped_codigo` int(11) NOT NULL,
  `pro_codigo` int(11) NOT NULL,
  `detp_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`detp_codigo`),
  KEY `pro_codigo` (`pro_codigo`),
  KEY `ped_codigo` (`ped_codigo`),
  KEY `ped_codigo_2` (`ped_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`detp_codigo`, `ped_codigo`, `pro_codigo`, `detp_cantidad`) VALUES
(13, 8, 7, 4),
(14, 8, 8, 5),
(15, 9, 6, 1),
(16, 9, 8, 1),
(17, 10, 5, 1),
(18, 10, 6, 2),
(19, 10, 7, 3),
(20, 10, 8, 4),
(21, 10, 12, 5),
(22, 11, 7, 7),
(23, 11, 5, 8),
(24, 12, 5, 1),
(25, 12, 7, 1),
(26, 12, 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_salida_mp`
--

CREATE TABLE IF NOT EXISTS `detalle_salida_mp` (
  `dsmp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `dsmp_cantidad` int(11) NOT NULL,
  `smp-codigo` int(11) NOT NULL,
  `map_codigo` int(11) NOT NULL,
  PRIMARY KEY (`dsmp_codigo`),
  KEY `smp-codigo` (`smp-codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Volcado de datos para la tabla `detalle_salida_mp`
--

INSERT INTO `detalle_salida_mp` (`dsmp_codigo`, `dsmp_cantidad`, `smp-codigo`, `map_codigo`) VALUES
(78, 43, 22, 10),
(79, 21, 22, 11),
(80, 12, 22, 8),
(81, 5, 22, 9),
(82, 27, 23, 11),
(83, 9, 23, 8),
(84, 24, 23, 10),
(85, 3, 24, 11),
(86, 1, 24, 8),
(87, 3, 24, 10),
(88, 1, 24, 9),
(89, 74, 25, 10),
(90, 24, 25, 9),
(91, 47, 25, 8),
(92, 21, 25, 11),
(93, 13, 26, 10),
(94, 3, 26, 11),
(95, 6, 26, 8),
(96, 3, 26, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_materia_prima`
--

CREATE TABLE IF NOT EXISTS `ingreso_materia_prima` (
  `imap_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `map_codigo` int(11) NOT NULL,
  `imap_cantidad` int(11) NOT NULL,
  `imap_cant_bolsa` int(11) NOT NULL,
  `imap_fecha_ingreso` varchar(20) NOT NULL,
  PRIMARY KEY (`imap_codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `ingreso_materia_prima`
--

INSERT INTO `ingreso_materia_prima` (`imap_codigo`, `map_codigo`, `imap_cantidad`, `imap_cant_bolsa`, `imap_fecha_ingreso`) VALUES
(6, 11, 3, 100, '28/4/2015'),
(7, 10, 2, 85, '28/4/2015'),
(8, 9, 5, 99, '28/4/2015'),
(9, 8, 3, 50, '28/4/2015'),
(10, 10, 1, 85, '28/4/2015'),
(11, 8, 25, 8, '6/9/2015'),
(12, 10, 5, 90, '31/10/2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE IF NOT EXISTS `materia_prima` (
  `map_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cat_codigo` int(11) NOT NULL,
  `prov_codigo` int(11) NOT NULL,
  `map_nombre` varchar(100) NOT NULL,
  `map_precio` float NOT NULL,
  `map_un_medida` varchar(20) NOT NULL,
  PRIMARY KEY (`map_codigo`),
  KEY `cat_codigo` (`cat_codigo`),
  KEY `prov_codigo` (`prov_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`map_codigo`, `cat_codigo`, `prov_codigo`, `map_nombre`, `map_precio`, `map_un_medida`) VALUES
(8, 5, 7, 'materiaprima1', 50, 'Unidades'),
(9, 6, 7, 'materiaprima2', 90, 'Metros'),
(10, 5, 8, 'materia prima3', 150, 'Unidades'),
(11, 6, 7, 'materiaprima4', 125, 'Unidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `ped_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_codigo` int(11) NOT NULL,
  `ped_prec_total` float NOT NULL,
  `ped_cant_total` int(11) NOT NULL,
  `ped_fecha` varchar(20) NOT NULL,
  `ped_estado` varchar(20) NOT NULL,
  `ped_fecha_entrega` varchar(20) NOT NULL,
  PRIMARY KEY (`ped_codigo`),
  KEY `cli_codigo` (`cli_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_codigo`, `cli_codigo`, `ped_prec_total`, `ped_cant_total`, `ped_fecha`, `ped_estado`, `ped_fecha_entrega`) VALUES
(8, 8, 840, 9, '2015-04-29', 'FALTA MATERIAL', '0000-00-00'),
(9, 8, 290, 2, '2015-04-29', 'FALTA MATERIAL', '0000-00-00'),
(10, 7, 1325, 15, '2015-04-29', 'FALTA MATERIAL', '0000-00-00'),
(11, 8, 2220, 15, '2015-09-06', 'FALTA MATERIAL', '0000-00-00'),
(12, 8, 305, 3, '2015-10-31', 'FALTA MATERIAL', '2015-11-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `pro_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(200) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`pro_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_codigo`, `pro_nombre`, `pro_precio`, `pro_descripcion`) VALUES
(5, 'Producto1', 225, 'descripcion de producto con 3 materias primas'),
(6, 'Producto2', 170, 'descripcion de producto 2 con 2 materias primas'),
(7, 'Mochila Nike', 60, 'mochila nike stampado de frente'),
(8, 'mochila grande', 120, 'mochila de mp 1 y 4'),
(12, 'producto5', 20, 'solo una materia prima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_materia`
--

CREATE TABLE IF NOT EXISTS `producto_materia` (
  `prm_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `pro_codigo` int(11) NOT NULL,
  `map_codigo` int(11) NOT NULL,
  `prm_cantidad` int(11) NOT NULL,
  PRIMARY KEY (`prm_codigo`),
  KEY `pro-codigo` (`pro_codigo`),
  KEY `map_codigo` (`map_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `producto_materia`
--

INSERT INTO `producto_materia` (`prm_codigo`, `pro_codigo`, `map_codigo`, `prm_cantidad`) VALUES
(3, 8, 8, 1),
(4, 8, 11, 3),
(5, 5, 8, 5),
(6, 5, 9, 3),
(7, 5, 10, 4),
(8, 6, 9, 1),
(9, 6, 10, 3),
(10, 7, 10, 6),
(11, 7, 8, 1),
(12, 7, 11, 3),
(17, 12, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `prov_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `prov_nombre` varchar(100) NOT NULL,
  `prov_pais` varchar(50) NOT NULL,
  `prov_descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`prov_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`prov_codigo`, `prov_nombre`, `prov_pais`, `prov_descripcion`) VALUES
(7, 'proveedor1', 'china', 'provedor1'),
(8, 'proveedor2', 'japon', 'proveedor2'),
(9, 'ads', 'sdf', 'dfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida_materia_prima`
--

CREATE TABLE IF NOT EXISTS `salida_materia_prima` (
  `smp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `smp_fecha_salida` varchar(20) NOT NULL,
  `ped_codigo` int(11) NOT NULL,
  PRIMARY KEY (`smp_codigo`),
  KEY `detp_codigo` (`ped_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `salida_materia_prima`
--

INSERT INTO `salida_materia_prima` (`smp_codigo`, `smp_fecha_salida`, `ped_codigo`) VALUES
(22, '2015-10-31', 10),
(23, '2015-10-31', 8),
(24, '2015-10-31', 9),
(25, '2015-10-31', 11),
(26, '2015-10-31', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(100) NOT NULL,
  `usu_apellido` varchar(100) NOT NULL,
  `usu_telefono` int(11) NOT NULL,
  `usu_direccion` varchar(100) NOT NULL,
  `usu_login` varchar(20) NOT NULL,
  `usu_password` varchar(20) NOT NULL,
  `usu_cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`usu_codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_nombre`, `usu_apellido`, `usu_telefono`, `usu_direccion`, `usu_login`, `usu_password`, `usu_cargo`) VALUES
(1, 'Vladimir ', 'Copa Barreto', 4577889, 'Av. Petrolera', 'admin', 'admin', 'Administrador'),
(2, 'Jhoselin', 'Torrico Moya', 4577654, 'C/ Lanza #234', 'jhotito', 'jhoto34', 'Encargado de Produccion');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD CONSTRAINT `alerta_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alerta_ibfk_2` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `almacen_materia`
--
ALTER TABLE `almacen_materia`
  ADD CONSTRAINT `almacen_materia_ibfk_1` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`);

--
-- Filtros para la tabla `detalle_salida_mp`
--
ALTER TABLE `detalle_salida_mp`
  ADD CONSTRAINT `detalle_salida_mp_ibfk_1` FOREIGN KEY (`smp-codigo`) REFERENCES `salida_materia_prima` (`smp_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_salida_mp_ibfk_2` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingreso_materia_prima`
--
ALTER TABLE `ingreso_materia_prima`
  ADD CONSTRAINT `ingreso_materia_prima_ibfk_1` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD CONSTRAINT `materia_prima_ibfk_1` FOREIGN KEY (`cat_codigo`) REFERENCES `categoria` (`cat_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `materia_prima_ibfk_2` FOREIGN KEY (`prov_codigo`) REFERENCES `proveedor` (`prov_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cli_codigo`) REFERENCES `cliente` (`cli_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_materia`
--
ALTER TABLE `producto_materia`
  ADD CONSTRAINT `producto_materia_ibfk_2` FOREIGN KEY (`map_codigo`) REFERENCES `materia_prima` (`map_codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_materia_ibfk_3` FOREIGN KEY (`pro_codigo`) REFERENCES `producto` (`pro_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `salida_materia_prima`
--
ALTER TABLE `salida_materia_prima`
  ADD CONSTRAINT `salida_materia_prima_ibfk_1` FOREIGN KEY (`ped_codigo`) REFERENCES `pedido` (`ped_codigo`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
